<?php
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2014
 * @license     EULA
 * @package     esitlib
 * @filesource  EsitTestCase.php
 * @version     2.0.0
 * @since       06.03.14 - 16:47
 */

use Contao\TestCase\ContaoTestCase;

/**
 * Class EsitTestCase
 */
class EsitTestCase extends ContaoTestCase
{


    /**
     * File with data.
     * @var string
     */
    protected $strDataProviderFile = '';


    /**
     * DataProvider
     * @var null
     */
    protected $varDataProvider = null;


    /**
     * EsitTestCase constructor.
     * @param null   $name
     * @param array  $data
     * @param string $dataName
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->initializeContao();
    }


    /**
     * setup the environment
     */
    protected function setUp()
    {
    }


    /**
     * tear down the environment
     */
    protected function tearDown()
    {
    }


    /**
     * Initialisiert Contao
     * @param string $tlMode
     * @param string $tlScript
     */
    protected function initializeContao($tlMode = 'TEST', $tlScript = 'EsitTestCase'): void
    {
        $framework = $this->mockContaoFramework();
        $framework->method('initialize');

        if (!defined('TL_MODE')) {
            define('TL_MODE', $tlMode);
            define('TL_SCRIPT', $tlScript);
            $initializePath = DOC_ROOT . "/system/initialize.php";

            if (is_file($initializePath)) {
                require($initializePath);
            }
        }
    }


    /**
     * Lädt eien Klasse über den DIC.
     * @param $class
     * @return mixed
     */
    protected function getClass($class)
    {
        $dc = \Contao\System::getContainer();
        return $dc->get($class);
    }


    /**
     * Universeller DataProvider
     * @param        $strMethod
     * @param string $ext
     * @return array|mixed
     */
    public function uniDataProvider($strMethod, $ext = 'php')
    {
        $arrMethod  = explode('::', $strMethod);
        $content    = [];

        if (is_array($arrMethod) && count($arrMethod)) {
            $strMethod      = array_pop($arrMethod);
            $backtrace      = debug_backtrace();
            $file           = $backtrace[0]['file'];
            $parts          = explode('/', $file);
            array_pop($parts);
            $path           = implode('/', $parts);
            $providerFile   = "$path/data/$strMethod.$ext";

            try {
                if (is_file($providerFile)) {
                    $content = include($providerFile);
                }
            } catch (\Exception $e) {
                self::logToFile($e->getMessage() . ' - ' . $e->getFile() . ' [' . $e->getLine() . ']');
                return [];
            }
        }

        return (is_array($content) && count($content)) ? $content : [];
    }


    /**
     * Speichert einen Wert in einer Datei.
     * @param $varValue
     * @param string $strFile
     */
    public static function logToFile($varValue, $strFile = '/tmp/phplogfile.txt'): void
    {
        if ($varValue) {
            $strContent = date('d.m.Y H:i:s') . "\n";

            if (is_array($varValue)) {
                $strContent.= var_export($varValue, true) . "\n";
            } else {
                $strContent.= $varValue . "\n\n";
            }

            file_put_contents($strFile, $strContent, FILE_APPEND);
        }
    }


    /**
     * Gibt einen String auf dem Bildschirm aus.
     * @param $varValue
     */
    public static function dumpValue($varValue): void
    {
        echo "\n";
        var_dump($varValue);
        echo "\n";
    }
}
