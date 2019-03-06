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
        $hashfield                      = 'inputhash';
        $maxlength                      = Config::get('maxFileSize') ?: '2048000';
        $scriptName                     = Environment::get('scriptName');
        $link                           = 'app';
        $link .= (\substr_count($scriptName, 'app_dev.php') > 0) ? '_dev.php' : '.php';
        $this->template->backlink       = $link . '/contao?do=composertoolbox';
        $this->template->formId         = $formId;
        $this->template->maxFileSize    = $maxlength;
        $this->template->dataField      = $datafield;
        $this->template->hashField      = $hashfield;
        $this->template->langOutput     = $GLOBALS['TL_LANG']['MSC']['composerimport']['output'];

        if ($formId === $_POST['FORM_SUBMIT']) {
            $event                      = $this->handleImport($_FILES, $datafield, Input::post($hashfield));
            $this->template->errors     = $event->getErrors();
            $this->template->jsondata   = $event->getContent();
        }

        return $this->template->parse();
    }


    /**
     * Verarbeitet das Formular.
     * @param $files
     * @param $datafield
     * @param $signature
     * @return OnHandleImportEvent
     */
    protected function handleImport($files, $datafield, $signature): OnHandleImportEvent
    {
        $event = new OnHandleImportEvent();
        $event->setFiles($files);
        $event->setNameDatafield($datafield);
        $event->setSignature($signature);

        $this->dispatcher->dispatch($event::NAME, $event);

        return $event;
    }
}
