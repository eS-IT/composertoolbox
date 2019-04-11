<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  NoComposerDataGiven.php
 * @version     1.0.0
 * @since       10.03.19 - 17:05
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Exceptions;

/**
 * Class NoComposerDataGiven
 * @package Esit\Composertoolbox\Classes\Exceptions
 */
final class NoComposerDataGiven extends \InvalidArgumentException implements ComposerToolboxExeption
{
}
