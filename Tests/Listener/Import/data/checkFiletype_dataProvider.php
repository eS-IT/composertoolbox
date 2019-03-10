<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  checkFiletype_dataProvider.php
 * @version     1.0.0
 * @since       10.03.19 - 12:43
 */
return [
    'emtyFileArrayNoAllowedTypsTest' => [
        '$file'         => [],
        '$allowedTyps'  => [],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emtyStringFileArrayNoAllowedTypsTest' => [
        '$file'         => [''],
        '$allowedTyps'  => [''],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'emtyFileArrayAllowedTypsTest' => [
        '$file'         => [],
        '$allowedTyps'  => ['json'],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'wrongFileArrayNoAllowedTypsTest' => [
        '$file'         => ['test' => ''],
        '$allowedTyps'  => [],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'wrongFileArrayAllowedTypsTest' => [
        '$file'         => ['name' => ''],
        '$allowedTyps'  => ['json'],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'FileArrayNoAllowedTypsTest' => [
        '$file'         => ['name' => '/tmp/test.json'],
        '$allowedTyps'  => [],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\NoAllowedFileTypes::class
    ],
    'FileArrayWrongAllowedTypsTest' => [
        '$file'         => ['name' => '/tmp/test.json'],
        '$allowedTyps'  => ['txt', 'jpg'],
        '$exception'    => Esit\Composertoolbox\Classes\Exceptions\WrongFileTypeException::class
    ],/* Hier wird keine Exception geworfen
    'FileArrayAllowedTypsTest' => [
        '$file'         => ['name' => '/tmp/test.json'],
        '$allowedTyps'  => ['txt', 'jpg', 'json'],
        '$exception'    => ''
    ]/**/
];