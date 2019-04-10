<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleImportListener_loadFileContent_dataProvider.php
 * @version     1.0.0
 * @since       10.04.19 - 16:15
 */

return [
    'EmptyTest' => [
        '$files'        => [''],
        '$datafield'    => '',
        '$signature'    => '',
        '$content'      => '',
        '$expected'     => ''
    ],
    'ContentTest' => [
        '$files'        => [''],
        '$datafield'    => '',
        '$signature'    => '',
        '$content'      => 'content',
        '$expected'     => 'content'
    ],
    'DatafieldTest' => [
        '$files'        => [''],
        '$datafield'    => 'test',
        '$signature'    => '',
        '$content'      => 'content',
        '$expected'     => 'content'
    ],
    'NoSignatureTest' => [
        '$files'        => ['test' => ['filename' => 'filetest']],
        '$datafield'    => 'test',
        '$signature'    => '',
        '$content'      => 'content',
        '$expected'     => 'content'
    ],
    'DataFieldNotFoundTest' => [
        '$files'        => [''],
        '$datafield'    => 'test',
        '$signature'    => '12346789abcdef',
        '$content'      => 'content',
        '$expected'     => 'content'
    ],
    'DatafieldFoundTest' => [
        '$files'        => ['test' => ['filename' => 'filetest']],
        '$datafield'    => 'test',
        '$signature'    => '12346789abcdef',
        '$content'      => 'content',
        '$expected'     => ''
    ]
];