<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  NoValidSectionToSave.php
 * @version     1.0.0
 * @since       09.03.19 - 18:13
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Exceptions\Database;

use Esit\Composertoolbox\Classes\Exceptions\ComposerToolboxExeption;

/**
 * Class NoValidSectionToSaveException
 * @package Esit\Composertoolbox\Classes\Exceptions\Database
 */
final class NoValidSectionToSaveException extends \InvalidArgumentException implements ComposerToolboxExeption
{
}
