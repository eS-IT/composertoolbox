<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleComposerJsonListener_checkAllowedFields_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 17:15
 */
return [
    'emptyTest' => [
        '$allowedFields'  => []
    ],
    'ArrayTest' => [
        '$allowedFields'  => ['Test']
    ]
];