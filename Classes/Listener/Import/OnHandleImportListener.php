<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleImportListener.php
 * @version     1.0.0
 * @since       05.03.19 - 10:53
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Listener\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleComposerJsonEvent;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleDatabaseQueriesEvent;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleImportEvent;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleUploadedFileEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class OnHandleImportListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandleImportListener
{


    /**
     * Lädt den Inhalt der hoch geladenen Datei.
     * @param OnHandleImportEvent      $event
     * @param                          $name
     * @param EventDispatcherInterface $di
     */
    public function loadFileContent(OnHandleImportEvent $event, $name, EventDispatcherInterface $di): void
    {
        $files      = $event->getFiles();
        $datafield  = $event->getDatafield();
        $signature  = $event->getSignature();
        $algprithm  = $event->getHashAlgorithm();

        if ('' !== $signature && isset($files[$datafield])) {
            $uploadEvent = new OnHandleUploadedFileEvent();
            $uploadEvent->setFile($files[$datafield]);
            $uploadEvent->setSignature($signature);
            $uploadEvent->setHashAlgorithm($algprithm);

            $di->dispatch($uploadEvent::NAME, $uploadEvent);

            $event->setContent($uploadEvent->getContent());
        }
    }


    /**
     * Verarbeitet die Datenbankanfragen.
     * @param OnHandleImportEvent      $event
     * @param                          $name
     * @param EventDispatcherInterface $di
     */
    public function handleDatabaseQuery(OnHandleImportEvent $event, $name, EventDispatcherInterface $di): void
    {
        $content    = $event->getContent();
        $signature  = $event->getSignature();

        if ('' !== $content && '' !== $signature) {
            $dbEvent = new OnHandleDatabaseQueriesEvent();
            $dbEvent->setTable($event->getTable());
            $dbEvent->setTimefield($event->getTimefield());
            $dbEvent->setSignaturfield($event->getSignaturfield());
            $dbEvent->setDatafield($event->getDatafield());
            $dbEvent->setContent($content);
            $dbEvent->setSignature($signature);

            $di->dispatch($dbEvent::NAME, $dbEvent);

            $event->setSignatureCount($dbEvent->getSignatureCount());
        }
    }


    /**
     * Ruft die Verarbeitung der composer.json auf.
     * @param OnHandleImportEvent      $event
     * @param                          $name
     * @param EventDispatcherInterface $di
     */
    public function handleComposerJson(OnHandleImportEvent $event, $name, EventDispatcherInterface $di): void
    {
        $content        = $event->getContent();
        $signatureCount = $event->getSignatureCount();

        if ('' !== $content && 0 === $signatureCount) {
            $composerEvent = new OnHandleComposerJsonEvent();
            $composerEvent->setContentString($content);
            $composerEvent->setFilename($event->getComposerFilename());

            $di->dispatch($composerEvent::NAME, $composerEvent);
        }
    }
}
