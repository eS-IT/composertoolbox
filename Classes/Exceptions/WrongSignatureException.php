<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  WrongSignatureException.php
 * @version     1.0.0
 * @since       09.03.19 - 18:25
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Exceptions;

/**
 * Class WrongSignatureException
 * @package Esit\Composertoolbox\Classes\Exceptions
 */
final class WrongSignatureException extends \InvalidArgumentException implements ComposerToolboxExeption
{
}
