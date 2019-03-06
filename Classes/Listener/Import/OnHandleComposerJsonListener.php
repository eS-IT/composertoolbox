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

/**
 * Class OnHandleComposerJsonListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandleComposerJsonListener
{


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
            $content = \file_get_contents($file);
            $content = \json_decode($content, true);

            if (\is_array($content)) {
                $event->setComposerContent($content);
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

        if (\is_array($content) &&
            \is_array($comopsoer) &&
            \is_array($allowedFields) &&
            \count($content) &&
            \count($comopsoer) &&
            \count($allowedFields) &&
            !\count($newContent)
        ) {
            // Nur ausführen, wenn noch nichts gemerged wurde!
            // Ist bereits etwas in $newontent, die Verarbeitugn auslassen!

            $newContent = $comopsoer;   // Alten Inhalt der composer.json übernehmen!

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
     * Speichert die composer.json.
     * @param OnHandleComposerJsonEvent $event
     */
    public function saveComposerJson(OnHandleComposerJsonEvent $event): void
    {
        $errors     = $event->getErrors();

        if (0 === \count($errors)) {
            $file       = $event->getFilename();
            $newContent = $event->getMergedContent();
            $newContent = \json_encode($newContent, \JSON_PRETTY_PRINT);
            $rtn        = \file_put_contents($file, $newContent);

            if (false === $rtn) {
                $event->addError('savecomposererror');
            }
        }
    }
}
