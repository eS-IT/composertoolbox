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
     * Name der Tabelle, in der die Daten gespeichert werden
     * @var string
     */
    protected $table = '';


    /**
     * Inhalt von $_FILES
     * @var array
     */
    protected $files = [];


    /**
     * Name des Datenbankfelds für die Importzeit.
     * @var string
     */
    protected $timefield = '';


    /**
     * Name des Dantenbankfelds für die Signatur.
     * @var string
     */
    protected $signaturfield = '';


    /**
     * Name des Datenbankfelds für die Importdaten.
     * @var string
     */
    protected $datafield = '';


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
    public function getTable(): string
    {
        return $this->table;
    }


    /**
     * @return string
     */
    public function getTimefield(): string
    {
        return $this->timefield;
    }


    /**
     * @param string $timefield
     */
    public function setTimefield(string $timefield): void
    {
        $this->timefield = $timefield;
    }


    /**
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }


    /**
     * @return string
     */
    public function getSignaturfield(): string
    {
        return $this->signaturfield;
    }


    /**
     * @param string $signaturfield
     */
    public function setSignaturfield(string $signaturfield): void
    {
        $this->signaturfield = $signaturfield;
    }


    /**
     * @return string
     */
    public function getDatafield(): string
    {
        return $this->datafield;
    }


    /**
     * @param string $datafield
     */
    public function setDatafield(string $datafield): void
    {
        $this->datafield = $datafield;
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
