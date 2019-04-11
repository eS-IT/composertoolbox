<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleComposerJsonListener_loadComposerJson_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 16:45
 */
return [
    'emptyTest' => [
        '$exists'   => false,
        '$content'  => '',
        '$expected' => []
    ],
    'emptyButExistsTest' => [
        '$exists'   => true,
        '$content'  => '',
        '$expected' => []
    ],
    'ExistsButNoJsonTest' => [
        '$exists'   => true,
        '$content'  => '!"§$%&/(=)/&',
        '$expected' => []
    ],
    'JsonButNotExistsTest' => [
        '$exists'   => false,
        '$content'  => '{"one":"Eins", "two":"Zwei"}',
        '$expected' => []
    ],
    'ExistsAndJsonTest' => [
        '$exists'   => true,
        '$content'  => '{"one":"Eins", "two":"Zwei"}',
        '$expected' => ['one' => 'Eins', 'two' => 'Zwei']
    ]
];