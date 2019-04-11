<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleComposerJsonListener_saveComposerJson_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 17:21
 */
use Esit\Composertoolbox\Classes\Exceptions\FileSaveException;

return [
    'FileNotExistsTest' => [
        '$putContents'   => false
    ],
    'FileExistsTest' => [
        '$putContents'   => true
    ]
];