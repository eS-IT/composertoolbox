<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  TlComposeerpackages.php
 * @version     1.0.0
 * @since       03.03.19 - 17:39
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Contao\Dca;

use Contao\BackendTemplate;
use Contao\Config;
use Contao\Environment;
use Contao\Input;
use Contao\System;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleImportEvent;
use Esit\Composertoolbox\Classes\Exceptions\ComposerToolboxExeption;

/**
 * Class TlComposeerpackages
 * @package Composertoolbox\Classes\Contao\Dca
 */
class TlComposeerpackages
{


    /**
     * Template
     * @var string
     */
    protected $templateName = 'be_composerimport';


    /**
     * @var BackendTemplate
     */
    protected $template;


    /**
     * @var \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher
     */
    protected $dispatcher;


    /**
     * TlComposeerpackages constructor.
     */
    public function __construct()
    {
        $this->template     = new BackendTemplate($this->templateName);
        $this->dispatcher   = System::getContainer()->get('event_dispatcher');
    }


    /**
     * Generate the output
     * @return string
     */
    public function compile(): string
    {
        $formId                         = 'composerimportform';
        $datafield                      = 'importdata';
        $signaturefield                 = 'importhash';
        $maxlength                      = Config::get('maxFileSize') ?: '2048000';
        $scriptName                     = Environment::get('scriptName');
        $link                           = 'app';
        $link .= (\substr_count($scriptName, 'app_dev.php') > 0) ? '_dev.php' : '.php';
        $this->template->backlink       = $link . '/contao?do=composertoolbox';
        $this->template->formId         = $formId;
        $this->template->maxFileSize    = $maxlength;
        $this->template->dataField      = $datafield;
        $this->template->hashField      = $signaturefield;
        $this->template->langOutput     = $GLOBALS['TL_LANG']['MSC']['composerimport']['output'];

        if ($formId === $_POST['FORM_SUBMIT']) {
            $signature = Input::post($signaturefield);

            try {
                $this->template->jsondata   = $this->handleImport($_FILES, $datafield, $signaturefield, $signature);
                $this->template->errors     = [];
            } catch (ComposerToolboxExeption $e) {
                $errors[]                   = $e;
                $this->template->errors     = $errors;
            }
        }

        return $this->template->parse();
    }


    /**
     * Verarbeitet das Formular.
     * @param $files
     * @param $datafield
     * @param $signaturefield
     * @param $signature
     * @return string
     */
    protected function handleImport($files, $datafield, $signaturefield, $signature): string
    {
        $event = new OnHandleImportEvent();
        $event->setFiles($files);
        $event->setTable('tl_composeerpackages');
        $event->setTimefield('importtime');
        $event->setDatafield($datafield);
        $event->setSignaturfield($signaturefield);
        $event->setSignature($signature);

        $this->dispatcher->dispatch($event::NAME, $event);

        return $event->getContent();
    }
}
