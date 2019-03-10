<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  testCheckUpload_dataProvider.php
 * @version     1.0.0
 * @since       10.03.19 - 11:55
 */
return [
    'emtyArrayFileNotExistsTest' => [
        '$file'         => [],
        '$fileexists'   => false,
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emtyStringFileNotExistsTest' => [
        '$file'         => [''],
        '$fileexists'   => false,
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'ArrayFieldEmptyFileNotExistsTest' => [
        '$file'         => ['tmp_name' => ''],
        '$fileexists'   => false,
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emtyArrayFileExistsTest' => [
        '$file'         => [],
        '$fileexists'   => true,
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emtyStringFileExistsTest' => [
        '$file'         => [''],
        '$fileexists'   => true,
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'ArrayFieldEmptyFileExistsTest' => [
        '$file'         => ['tmp_name' => ''],
        '$fileexists'   => true,
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],/* Hier wird keine Exceptions geworfen!
    'rightArrayFileExistsTest' => [
        '$file'         => ['tmp_name' => '/tmp/test.txt'],
        '$fileexists'   => true,
        '$exception'    => ''
    ]/**/
];