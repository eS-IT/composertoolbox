<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandelDatabaseQueriesEvent.php
 * @version     1.0.0
 * @since       04.03.19 - 18:49
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Events\Import;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class OnHandelDatabaseQueriesEvent
 * @package Esit\Composertoolbox\Classes\Events\Import
 */
class OnHandelDatabaseQueriesEvent extends Event
{


    /**
     * Name des Events
     */
    public const NAME = 'composertoolbox.on.handle.database.queries.event';


    /**
     * Name der Tabelle, in der die Daten gespeichert werden
     * @var string
     */
    protected $table = '';


    /**
     * Inhalt der hoch geladenen Datei
     * @var string
     */
    protected $content = '';


    /**
     * Hoch geladene Signatur
     * @var string
     */
    protected $signature = '';


    /**
     * Array mit den aufgetretene Fehlern
     * @var array
     */
    protected $errors = [];


    /**
     * Anzahl wie oft die hoch geladene Signatur schon in der Datenbank vorkommt.
     * Muss 0 sein, damit die Daten verarbeitet werden. Ist die Signatur bereits
     * vorhanden, wird die Verarbeitung abgebrochen.
     * @var int
     */
    protected $signatureCount = 0;


    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
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
}
