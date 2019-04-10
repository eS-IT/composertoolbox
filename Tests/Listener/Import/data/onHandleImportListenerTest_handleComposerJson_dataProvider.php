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
    'NoContentButCountTest' => [
        '$content'          => '',
        '$count'            => 12,
        '$callDispatcher'   => false
    ],
    'CountTooMuchTest' => [
        '$content'          => 'content',
        '$count'            => 12,
        '$callDispatcher'   => false
    ],
    'NoContentTest' => [
        '$content'          => '',
        '$count'            => 0,
        '$callDispatcher'   => false
    ],
    'contentTest' => [
        '$content'          => 'content',
        '$count'            => 0,
        '$callDispatcher'   => true
    ]
];