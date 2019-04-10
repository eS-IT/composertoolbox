<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  hash_dataProvider.php
 * @version     1.0.0
 * @since       10.04.19 - 09:34
 */
use Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException;
use Esit\Composertoolbox\Classes\Exceptions\NoHashingAlgorithm;

return [
    'EmptyTest' => [
        '$algo'         => '',
        '$filename'     => '',
        '$data'         => '',
        '$exception'    => NoHashingAlgorithm::class
    ],
    'noFileTest' => [
        '$algo'         => 'md5',
        '$filename'     => '',
        '$data'         => '',
        '$exception'    => NoFileUploadetException::class
    ],
    'noAlgoTest' => [
        '$algo'         => '',
        '$filename'     => '/tmp/testhash.txt',
        '$data'         => '',
        '$exception'    => NoHashingAlgorithm::class
    ],
    'noDataTest' => [
        '$algo'         => 'md5',
        '$filename'     => '/tmp/testhash.txt',
        '$data'         => '',
        '$exception'    => NoFileUploadetException::class   // Weil keine Daten!
    ],
    'dataTest' => [
        '$algo'         => 'md5',
        '$filename'     => '/tmp/testhash.txt',
        '$data'         => 'myHashTestData',
        '$exception'    => ''
    ]
];