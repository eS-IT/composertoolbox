<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  SignatureNotUniqueInDatabaseException.php
 * @version     1.0.0
 * @since       09.03.19 - 18:14
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Exceptions;

/**
 * Class SignatureNotUniqueInDatabaseException
 * @package Esit\Composertoolbox\Classes\Exceptions
 */
final class SignatureNotUniqueInDatabaseException extends \InvalidArgumentException implements ComposerToolboxExeption
{
}
