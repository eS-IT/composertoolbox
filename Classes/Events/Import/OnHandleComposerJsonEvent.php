<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleComposerJsonEvent.php
 * @version     1.0.0
 * @since       04.03.19 - 19:32
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Events\Import;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class OnHandleComposerJsonEvent
 * @package Esit\Composertoolbox\Classes\Events\Import
 */
class OnHandleComposerJsonEvent extends Event
{


    /**
     * Name des Events
     */
    public const NAME = 'composertoolbox.on.handle.composer.json.event';


    /**
     * Id des zu löschenden Datensatzes.
     * Ist die Id gesetzt, werden die Einträge aus der composer.json entfernt und nicht eingefügt!
     * @var int
     */
    protected $id = 0;


    /**
     * Dateiname (TL_ROOT/composer.json)
     * @var string
     */
    protected $filename = '';


    /**
     * Inhalt der hoch geladenen Datei
     * @var string
     */
    protected $contentString = '';


    /**
     * Array mit dem geparsten Inhalt der hoch geladenen Datei.
     * @var array
     */
    protected $content = [];


    /**
     * Array mit dem geparsten Inhalt der composer.json
     * @var array
     */
    protected $composerContent = [];


    /**
     * Zusammengeführter Ihnalt der comopser.json und der hoch geladenen Datei.
     * @var array
     */
    protected $mergedContent = [];


    /**
     * Array mit den aufgetretenen Fehlern.
     * @var array
     */
    protected $errors = [];


    /**
     * Die erlaubten Abschnitte, die in der composer.json bearbeitet werden dürfen.
     * @var array
     */
    protected $allowdFields = ['require', 'require-dev', 'repositories'];


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }


    /**
     * @param string $filename
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }


    /**
     * @return string
     */
    public function getContentString(): string
    {
        return $this->contentString;
    }


    /**
     * @param string $contentString
     */
    public function setContentString(string $contentString): void
    {
        $this->contentString = $contentString;
    }


    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }


    /**
     * @param array $content
     */
    public function setContent(array $content): void
    {
        $this->content = $content;
    }


    /**
     * @return array
     */
    public function getComposerContent(): array
    {
        return $this->composerContent;
    }


    /**
     * @param array $composerContent
     */
    public function setComposerContent(array $composerContent): void
    {
        $this->composerContent = $composerContent;
    }


    /**
     * @return array
     */
    public function getMergedContent(): array
    {
        return $this->mergedContent;
    }


    /**
     * @param array $mergedContent
     */
    public function setMergedContent(array $mergedContent): void
    {
        $this->mergedContent = $mergedContent;
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
     * Fügt einen Fehler hinzu.
     * @param string $error
     */
    public function addError(string $error): void
    {
        $this->errors[] = $error;
    }


    /**
     * @return array
     */
    public function getAllowdFields(): array
    {
        return $this->allowdFields;
    }


    /**
     * @param array $allowdFields
     */
    public function setAllowdFields(array $allowdFields): void
    {
        $this->allowdFields = $allowdFields;
    }
}
