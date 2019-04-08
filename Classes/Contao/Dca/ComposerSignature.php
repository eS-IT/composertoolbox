<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  ComposerSignature.php
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
use Contao\System;

/**
 * Class ComposerSignature
 * @package Esit\Composertoolbox\Classes\Contao\Dca
 */
class ComposerSignature
{


    /**
     * Template
     * @var string
     */
    protected $templateName = 'be_composersignature';


    /**
     * @var BackendTemplate
     */
    protected $template;


    /**
     * @var \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher
     */
    protected $dispatcher;


    /**
     * ComposerImporter constructor.
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
        $upluadField                    = 'uploadedfile';
        $maxlength                      = Config::get('maxFileSize') ?: '2048000';
        $scriptName                     = Environment::get('scriptName');
        $link                           = 'app';
        $link .= (\substr_count($scriptName, 'app_dev.php') > 0) ? '_dev.php' : '.php';
        $this->template->backlink       = $link . '/contao?do=composertoolbox';
        $this->template->formId         = $formId;
        $this->template->upluadField    = $upluadField;
        $this->template->maxFileSize    = $maxlength;
        $this->template->langOutput     = $GLOBALS['TL_LANG']['MSC']['composerimport']['output'];

        if ($formId === $_POST['FORM_SUBMIT'] && isset($_FILES[$upluadField]['tmp_name'])) {
            if (\is_file($_FILES[$upluadField]['tmp_name'])) {
                $algo                               = $GLOBALS['ESIT']['COMPOSERTOOLBOX']['algorithm'] ?: 'sha512';
                $this->template->generatedSignature = \hash_file($algo, $_FILES[$upluadField]['tmp_name']);
            }
        }

        return $this->template->parse();
    }
}
