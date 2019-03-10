<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  loadFileContent_dataProvider.php
 * @version     1.0.0
 * @since       10.03.19 - 17:19
 */
return [
    'emptyArrayTest' => [
        '$file'         => [],
        '$content'      => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'wrongArrayKeyTetst' => [
        '$file'         => ['test' => '/tmp/test.txt'],
        '$content'      => '',
        '$exception'    => \Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException::class
    ],
    'contentTest' => [
        '$file'         => ['tmp_name' => '/tmp/test.txt'],
        '$content'      => 'content',
        '$exception'    => ''
    ]
];