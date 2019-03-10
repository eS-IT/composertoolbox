<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  checkSignature_dataProvider.php
 * @version     1.0.0
 * @since       10.03.19 - 16:16
 */
return [
    'emptyTest' => [
        '$file'         => [],
        '$signature'    => '',
        '$algo'         => '',
        '$filehash'     => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'worngFileKeyTest' => [
        '$file'         => ['test' => ''],
        '$signature'    => '',
        '$algo'         => '',
        '$filehash'     => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emptyFileTest' => [
        '$file'         => ['tmp_name' => ''],
        '$signature'    => '',
        '$algo'         => '',
        '$filehash'     => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emptySgnatureTest' => [
        '$file'         => ['tmp_name' => '/tmp/test.txt'],
        '$signature'    => '',
        '$algo'         => '',
        '$filehash'     => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoSignatureGiven::class
    ],
    'emptyFileHashTest' => [
        '$file'         => ['tmp_name' => '/tmp/test.txt'],
        '$signature'    => '0123456789ABCDEF',
        '$algo'         => 'testalgo',
        '$filehash'     => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\WrongSignatureException::class
    ],/* Hier wird keine Exception geworfen
    'FileHashTest' => [
        '$file'         => ['tmp_name' => '/tmp/test.txt'],
        '$signature'    => '0123456789ABCDEF',
        '$algo'         => 'testalgo',
        '$filehash'     => '0123456789ABCDEF',
        '$exception'    => ''
    ]/**/
];