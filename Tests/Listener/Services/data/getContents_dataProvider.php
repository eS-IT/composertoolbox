<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  getContents_dataProvider.php
 * @version     1.0.0
 * @since       10.04.19 - 08:37
 */
use Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException;

return [
    'emptyStringTest' => [
        '$filename'     => '',
        '$result'       => '',
        '$exception'    => NoFileUploadetException::class
    ],
    'givenFilenameTest' => [
        '$filename'     => '/tmp/test.txt',
        '$result'       => '',
        '$exception'    => NoFileUploadetException::class
    ],
    'givenFileTest' => [
        '$filename'     => '/tmp/test.txt',
        '$result'       => 'test',
        '$exception'    => NoFileUploadetException::class
    ]
];