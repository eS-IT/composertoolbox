<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleComposerJsonListener_deleteSections_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 17:52
 */
return [
    'emptyTest' => [
        '$content'          => [],
        '$newContent'       => [],
        '$allowedFields'    => [],
        '$delId'            => 0,
        '$expected'         => []
    ],
    'idIsNotNullTest' => [
        '$content'          => ['require' => ['esit/composertoolbox' => '^1.0']],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0']],
        '$allowedFields'    => ['require'],
        '$delId'            => 0,
        '$expected'         => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0']]
    ],
    'noAllowedFieldTest' => [
        '$content'          => ['require' => ['esit/composertoolbox' => '^1.0']],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0']],
        '$allowedFields'    => [],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0']]
    ],
    'AllowedFieldIsNotInContent' => [
        '$content'          => ['require' => ['esit/composertoolbox' => '^1.0']],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']],
        '$allowedFields'    => ['require_dev'],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']]
    ],
    'AllowedFieldInContentIsNoArray' => [
        '$content'          => ['require' => ['esit/composertoolbox' => '^1.0'], 'require_dev' => ''],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']],
        '$allowedFields'    => ['require_dev'],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']]
    ],
    'UnsetPackeage' => [
        '$content'          => ['require' => ['esit/composertoolbox' => '^1.0']],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']],
        '$allowedFields'    => ['require'],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4'], 'require_dev' => ['phpunit/phpunit' => '^8']]
    ],
    'UnsetSection' => [
        '$content'          => ['require_dev' => ['phpunit/phpunit' => '^8']],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']],
        '$allowedFields'    => ['require', 'require_dev'],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0']]
    ],
    'UnsetSectionAndOnePackage' => [
        '$content'          => ['require' => ['esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']],
        '$newContent'       => ['require' => ['contao/contao' => '^4.4', 'esit/composertoolbox' => '^1.0'], 'require_dev' => ['phpunit/phpunit' => '^8']],
        '$allowedFields'    => ['require', 'require_dev'],
        '$delId'            => 12,
        '$expected'         => ['require' => ['contao/contao' => '^4.4']]
    ]
];