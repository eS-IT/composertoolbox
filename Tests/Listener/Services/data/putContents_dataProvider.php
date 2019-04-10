<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  putContents_dataProvider.php
 * @version     1.0.0
 * @since       10.04.19 - 09:08
 */
use Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException;
use Esit\Composertoolbox\Classes\Exceptions\NoFileDataGiven;

return [
    'emptyTest' => [
        '$filename'     => '',
        '$data'         => '',
        '$exception'    => NoFileUploadetException::class
    ],
    'noDataTest' => [
        '$filename'     => '/tmp/putttest.txt',
        '$data'         => '',
        '$exception'    => NoFileDataGiven::class
    ],
    'dataTest' => [
        '$filename'     => '/tmp/putttest.txt',
        '$data'         => 'mytestdata',
        '$exception'    => NoFileDataGiven::class
    ]
];