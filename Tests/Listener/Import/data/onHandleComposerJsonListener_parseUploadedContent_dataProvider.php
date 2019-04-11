<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleComposerJsonListener_parseUploadedContent_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 16:38
 */
return [
    'emptyTest' => [
        '$content'  => '',
        '$expected' => []
    ],
    'NotJsonTest' => [
        '$content'  => '<$"%%&/$%/()%()&>',
        '$expected' => []
    ],
    'EmptyJsonTest' => [
        '$content'  => '{}',
        '$expected' => []
    ],
    'JsonTest' => [
        '$content'  => '{"one":"Eins", "two":"Zwei"}',
        '$expected' => ['one' => 'Eins', 'two' => 'Zwei']
    ]
];