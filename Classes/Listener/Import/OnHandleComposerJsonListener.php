<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleComposerJsonListener.php
 * @version     1.0.0
 * @since       04.03.19 - 19:44
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Listener\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleComposerJsonEvent;
use Esit\Composertoolbox\Classes\Exceptions\FileSaveException;
use Esit\Composertoolbox\Classes\Serives\Filesystem;

/**
 * Class OnHandleComposerJsonListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandleComposerJsonListener
{
    protected $filesystem;


    public function __construct(Filesystem $fs)
    {
        $this->filesystem = $fs;
    }


    /**
     * Erstellt den Pfad zur composer.json.
     * @param OnHandleComposerJsonEvent $event
     */
    public function setFilename(OnHandleComposerJsonEvent $event): void
    {
        $event->setFilename(TL_ROOT . '/composer.json');
    }


    /**
     * Wandelt den Inhalt der hoch geladenen Datei in ein Array um.
     * @param OnHandleComposerJsonEvent $event
     */
    public function parseUploadedContent(OnHandleComposerJsonEvent $event): void
    {
        $content = $event->getContentString();
        $content = \json_decode($content, true);

        if (\is_array($content)) {
            $event->setContent($content);
        }
    }


    /**
     * Lädt den Inhalt der composer.json.
     * @param OnHandleComposerJsonEvent $event
     */
    public function loadComposerJson(OnHandleComposerJsonEvent $event): void
    {
        $file = $event->getFilename();

        if (\is_file($file)) {
            $content = $this->filesystem->getContents($file);
            $content = \json_decode($content, true);

            if (\is_array($content)) {
                $event->setComposerContent($content);
                $event->setMergedContent($content); // Alten Inhalt der composer.json übernehmen!
            }
        }
    }


    /**
     * Fügt die Daten der hoch geladenen Datei in die comopser.json ein.
     * @param OnHandleComposerJsonEvent $event
     */
    public function mergeArrays(OnHandleComposerJsonEvent $event): void
    {
        $content        = $event->getContent();
        $comopsoer      = $event->getComposerContent();
        $newContent     = $event->getMergedContent();
        $allowedFields  = $event->getAllowdFields();
        $delId          = $event->getId();

        if (0 === $delId &&
            \is_array($content) &&
            \is_array($comopsoer) &&
            \is_array($allowedFields) &&
            \count($content) &&
            \count($comopsoer) &&
            \count($allowedFields)
        ) {
            foreach ($allowedFields as $field) {
                if (isset($content[$field])) {
                    if (isset($newContent[$field])) {
                        $newContent[$field] = \array_merge($newContent[$field], $content[$field]);
                    } else {
                        $newContent[$field] = $content[$field];
                    }
                }
            }
        }

        $event->setMergedContent($newContent);
    }


    /**
     * Löschte die Packete aus der composer.json, wenn ein Datensatz gelöscht wird.
     * @param OnHandleComposerJsonEvent $event
     */
    public function deleteSections(OnHandleComposerJsonEvent $event): void
    {
        $content        = $event->getContent();
        $comopsoer      = $event->getComposerContent();
        $newContent     = $event->getMergedContent();
        $allowedFields  = $event->getAllowdFields();
        $delId          = $event->getId();

        if (0 !== $delId &&
            \is_array($content) &&
            \is_array($comopsoer) &&
            \is_array($allowedFields) &&
            \count($content) &&
            \count($comopsoer) &&
            \count($allowedFields)
        ) {
            foreach ($allowedFields as $field) {
                if (isset($content[$field]) && \is_array($content[$field])) {
                    $packages = \array_keys($content[$field]);

                    if (\is_array($packages)) {
                        foreach ($packages as $package) {
                            if (isset($newContent[$field][$package])) {
                                // Packete entfernen
                                unset($newContent[$field][$package]);
                            }
                        }
                    }

                    if (!\count($newContent[$field])) {
                        // Leere Sektionen lösschen
                        unset($newContent[$field]);
                    }
                }
            }
        }

        $event->setMergedContent($newContent);
    }


    /**
     * Speichert die composer.json.
     * @param OnHandleComposerJsonEvent $event
     */
    public function saveComposerJson(OnHandleComposerJsonEvent $event): void
    {
        $file       = $event->getFilename();
        $newContent = $event->getMergedContent();
        $newContent = \json_encode($newContent, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES);
        $rtn        = $this->filesystem->putContents($file, $newContent);

        if (false === $rtn) {
            throw new FileSaveException('savecomposererror');
        }
    }
}
