<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  exists_dataProvider.php
 * @version     1.0.0
 * @since       10.04.19 - 09:27
 */
use Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException;

return [
    'emptyTest' => [
        '$filename'     => '',
        '$expected'     => false,
        '$exception'    => NoFileUploadetException::class
    ],
    'FilenameButNoFile' => [
        '$filename'     => '/tmp/existstest.txt',
        '$expected'     => false,
        '$exception'    => ''
    ],
    'FilenameAndFile' => [
        '$filename'     => '/tmp/existstest.txt',
        '$expected'     => true,
        '$exception'    => ''
    ]
];