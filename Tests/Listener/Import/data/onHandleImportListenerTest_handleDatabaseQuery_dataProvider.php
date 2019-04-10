<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleImportListenerTest_handleDatabaseQuery_dataProvider.php
 * @version     1.0.0
 * @since       10.04.19 - 16:44
 */
return [
    'emptyTest' => [
        '$signature'    => '',
        '$content'      => '',
        '$count'        => 12,
        '$expected'     => 12
    ],
    'NoSignatureTest' => [
        '$signature'    => '',
        '$content'      => 'content',
        '$count'        => 12,
        '$expected'     => 12
    ],
    'NoContentTest' => [
        '$signature'    => '0123456789abcdef',
        '$content'      => '',
        '$count'        => 12,
        '$expected'     => 12
    ],
    'SignatureTest' => [
        '$signature'    => '0123456789abcdef',
        '$content'      => 'content',
        '$count'        => 12,
        '$expected'     => 0
    ]
];