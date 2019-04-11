<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleDatabaseQueriesListener_checkSignatureInDb_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 18:24
 */
return [
    'CountIsZero' => [
        '$fetch'    => ['count' => 0],
        '$expected' => 0
    ],
    'CountIsTwelf' => [
        '$fetch'    => ['count' => 12],
        '$expected' => 12
    ]
];