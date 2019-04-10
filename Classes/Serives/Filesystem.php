<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  Filesystem.php
 * @version     1.0.0
 * @since       10.03.19 - 12:56
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Serives;

use Esit\Composertoolbox\Classes\Exceptions\NoFileDataGiven;
use Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException;
use Esit\Composertoolbox\Classes\Exceptions\NoHashingAlgorithm;

/**
 * Class Filesystem
 * Fassade für die internen PHP-Funktionen.
 * @package Esit\Composertoolbox\Classes\Serives
 */
class Filesystem
{


    /**
     * @param  string       $filename
     * @param  bool         $includePath
     * @param  null         $context
     * @param  int          $offset
     * @return false|string
     */
    public function getContents(
        string $filename,
        bool $includePath = false,
        $context = null,
        int $offset = 0
    ) {
        if (empty($filename)) {
            throw new NoFileUploadetException('nofile');
        }


        if (!$this->exists($filename)) {
            throw new NoFileUploadetException('filenotfound');
        }

        return \file_get_contents($filename, $includePath, $context, $offset);
    }


    /**
     * @param  string   $filename
     * @param           $data
     * @param  int      $flags
     * @param  null     $ressource
     * @return bool|int
     */
    public function putContents(string $filename, $data, $flags = 0, $ressource = null)
    {
        if (empty($filename)) {
            throw new NoFileUploadetException('nofile');
        }

        if (empty($data)) {
            throw new NoFileDataGiven('nofiledatagivven');
        }

        return \file_put_contents($filename, $data, $flags, $ressource);
    }


    /**
     * @param  string $filename
     * @return bool
     */
    public function exists(string $filename): bool
    {
        if (empty($filename)) {
            throw new NoFileUploadetException('nofile');
        }

        return \file_exists($filename);
    }


    /**
     * @param  string $algo
     * @param  string $filename
     * @param  bool   $raw
     * @return string
     */
    public function hash(string $algo, string $filename, bool $raw = false): string
    {
        if ('' === $algo) {
            throw new NoHashingAlgorithm('nohashingalgorithm');
        }

        if (empty($filename) || !\is_file($filename) || !\is_readable($filename)) {
            throw new NoFileUploadetException('nofile');
        }

        return \hash_file($algo, $filename, $raw);
    }
}
