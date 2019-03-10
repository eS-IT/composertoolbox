<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  NoHashiingAlgorithm.php
 * @version     1.0.0
 * @since       10.03.19 - 16:40
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Exceptions;

/**
 * Class NoHashingAlgorithm
 * @package Esit\Composertoolbox\Classes\Exceptions
 */
final class NoHashingAlgorithm extends \InvalidArgumentException implements ComposerToolboxExeption
{
}
