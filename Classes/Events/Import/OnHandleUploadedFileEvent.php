<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleUploadedFile.php
 * @version     1.0.0
 * @since       04.03.19 - 17:53
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Events\Import;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class OnHandleUploadedFileEvent
 * @package Esit\Composertoolbox\Classes\Events\Import
 */
class OnHandleUploadedFileEvent extends Event
{

    /**
     * Name des Events
     */
    public const NAME = 'composertoolbox.on.handle.uploaded.file.event';


    /**
     * Der zuverwendende Hashingalgorithmus für den Vergleich der Signatur
     * @var string
     */
    protected $hashAlgorithm = 'sha512';


    /**
     * Erlaubte Dateitypen für den Upload
     * @var array
     */
    protected $allowedFiletyps = ['json'];


    /**
     * Daten der hoch geladenen Datei aus $_FILES
     * @var array
     */
    protected $file = [];


    /**
     * Hoch geladene Signatur für die hoch geladene Datei
     * @var string
     */
    protected $signature = '';


    /**
     * Inhalt der hoch geladenen Datei
     * @var string
     */
    protected $content = '';


    /**
     * @return string
     */
    public function getHashAlgorithm(): string
    {
        return $this->hashAlgorithm;
    }


    /**
     * @param string $hashAlgorithm
     */
    public function setHashAlgorithm(string $hashAlgorithm): void
    {
        $this->hashAlgorithm = $hashAlgorithm;
    }


    /**
     * @return array
     */
    public function getAllowedFiletyps(): array
    {
        return $this->allowedFiletyps;
    }


    /**
     * @param array $allowedFiletyps
     */
    public function setAllowedFiletyps(array $allowedFiletyps): void
    {
        $this->allowedFiletyps = $allowedFiletyps;
    }


    /**
     * @return array
     */
    public function getFile(): array
    {
        return $this->file;
    }


    /**
     * @param array $file
     */
    public function setFile(array $file): void
    {
        $this->file = $file;
    }


    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }


    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }


    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
