<?php
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2014
 * @license     EULA
 * @package     esitlib
 * @filesource  bootstrap.php
 * @version     2.0.0
 * @since       21.03.14 - 09:54
 */

/**
 * include esit_contaoTestCase
 */

$buildDir                   = __DIR__ . '/..';
$rootDir                    = __DIR__ . '/../..';
$testCase                   = __DIR__ . '/EsitTestCase.php';
$arrPaths                   = explode('/src/Esit/', __DIR__);
define('DOC_ROOT', $arrPaths[0]);
$globalComposerAutoloadPath = DOC_ROOT . '/vendor/autoload.php';    // Wird während der Entwixklung verwendet
$localComposerAutoload      = $rootDir . "/vendor/autoload.php";    // Wird in der GitLab-Pipline verwendet
$localAutoloadPath          = $rootDir . "/autoload.php";           // Wird verwendet, wenn nichts anderes gefunden wird.
$autoloadFound              = false;

if (is_file($globalComposerAutoloadPath)) {
    // Globalen Composer Autoload einbinden
    include_once($globalComposerAutoloadPath);
    $autoloadFound = true;
} else {
    if (is_file($localComposerAutoload)) {
        // Lokalen Composer Autoload einbinden
        include_once($localComposerAutoload);
        $autoloadFound = true;
    } else {
        if (is_file("$buildDir/tools/phpab")) {
            system("$buildDir/tools/phpab -o $localAutoloadPath $rootDir/Classes");
            if (is_file($localAutoloadPath)) {
                // Lokalen Autoload einbinden
                include_once($localAutoloadPath);
                $autoloadFound = true;
            }
        }
    }
}

if (false === $autoloadFound) {
    throw new \Exception("No autoload found");
}

if (is_file($testCase)) {
    include_once($testCase);
} else {
    throw new \Exception('Testcase is missing: ' . $testCase);
}