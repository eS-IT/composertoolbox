<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleImportEvent.php
 * @version     1.0.0
 * @since       05.03.19 - 10:51
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Events\Import;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class OnHandleImportEvent
 * @package Esit\Composertoolbox\Classes\Events\Import
 */
class OnHandleImportEvent extends Event
{


    /**
     * Name des Events
     */
    public const NAME = 'composertoolbox.on.handle.import.event';


    /**
     * Inhalt von $_FILES
     * @var array
     */
    protected $files = [];


    /**
     * Name des Formularfelds für den Upload
     * @var string
     */
    protected $nameDatafield = '';


    /**
     * Signatur
     * @var string
     */
    protected $signature = '';


    /**
     * Array mit den aufgetretenen Fehlern
     * @var array
     */
    protected $errors = [];


    /**
     * Inhalt für die Ausgabe
     * @var string
     */
    protected $content = '';


    /**
     * Anzahl der Einträge mit der hoch geladenen Signatur, die bereits in der DB vorhanden sind.
     * Ist die Signatur schon vorhanden, wird die Verarbeitung abgebrochen!
     * @var int
     */
    protected $signatureCount = 0;


    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }


    /**
     * @param array $files
     */
    public function setFiles(array $files): void
    {
        $this->files = $files;
    }


    /**
     * @return string
     */
    public function getNameDatafield(): string
    {
        return $this->nameDatafield;
    }


    /**
     * @param string $nameDatafield
     */
    public function setNameDatafield(string $nameDatafield): void
    {
        $this->nameDatafield = $nameDatafield;
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
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }


    /**
     * @param array $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
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


    /**
     * @return int
     */
    public function getSignatureCount(): int
    {
        return $this->signatureCount;
    }


    /**
     * @param int $signatureCount
     */
    public function setSignatureCount(int $signatureCount): void
    {
        $this->signatureCount = $signatureCount;
    }
}
