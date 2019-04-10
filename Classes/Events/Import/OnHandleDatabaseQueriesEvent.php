<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleDatabaseQueriesEvent.php
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
 * Class OnHandleDatabaseQueriesEvent
 * @package Esit\Composertoolbox\Classes\Events\Import
 */
class OnHandleDatabaseQueriesEvent extends Event
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
}
