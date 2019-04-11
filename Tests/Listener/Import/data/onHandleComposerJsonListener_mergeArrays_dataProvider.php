<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleComposerJsonListener_mergeArrays_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 17:36
 */
return [
    'emptyTest' => [
        '$content'          => [],
        '$newContent'       => [],
        '$allowedFields'    => [],
        '$delId'            => 12,
        '$expected'         => []
    ],
    'idIsNotNullTest' => [
        '$content'          => ['extra' => ['composertoolbox' => ['require' => ['esit/composertoolbox' => '^1.0']]]],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4']],
        '$allowedFields'    => ['require'],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4']]
    ],
    'noToolboxTest' => [
        '$content'          => ['extra' => ['composertoolbox' => []]],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4']],
        '$allowedFields'    => ['require'],
        '$delId'            => 0,
        '$expected'         => ['require' => ['contao/contao' => '^4.4']]
    ],
    'noExtraTest' => [
        '$content'          => ['extra' => []],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4']],
        '$allowedFields'    => ['require'],
        '$delId'            => 0,
        '$expected'         => ['require' => ['contao/contao' => '^4.4']]
    ],
    'noRequireTest' => [
        '$content'          => ['extra' => ['composertoolbox' => ['require' => ['esit/composertoolbox' => '^1.0']]]],
        '$newContent'       => [],
        '$allowedFields'    => ['require'],
        '$delId'            => 0,
        '$expected'         => ['require' => ['esit/composertoolbox' => '^1.0']]
    ],
    'mergeTest' => [
        '$content'          => ['extra' => ['composertoolbox' => ['require' => ['esit/composertoolbox' => '^1.0']]]],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4']],
        '$allowedFields'    => ['require'],
        '$delId'            => 0,
        '$expected'         => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0']]
    ]
];