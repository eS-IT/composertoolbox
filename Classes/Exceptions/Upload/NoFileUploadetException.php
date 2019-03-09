<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  NoFileUploadetException.php
 * @version     1.0.0
 * @since       09.03.19 - 18:15
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Exceptions\Upload;

use Esit\Composertoolbox\Classes\Exceptions\ComposerToolboxExeption;

/**
 * Class NoFileUploadetException
 * @package Esit\Composertoolbox\Classes\Exceptions\Upload
 */
final class NoFileUploadetException extends \InvalidArgumentException implements ComposerToolboxExeption
{
}
