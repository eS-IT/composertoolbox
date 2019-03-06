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

use Esit\Composertoolbox\Classes\Events\Import\OnHandelDatabaseQueriesEvent;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleComposerJsonEvent;
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
        $datafield  = $event->getNameDatafield();
        $signature  = $event->getSignature();
        $errors     = $event->getErrors();

        if ('' !== $signature && isset($files[$datafield])) {
            $uploadEvent = new OnHandleUploadedFileEvent();
            $uploadEvent->setFile($files[$datafield]);
            $uploadEvent->setSignature($signature);

            $di->dispatch($uploadEvent::NAME, $uploadEvent);

            $errors = \array_merge($errors, $uploadEvent->getErrors());
            $event->setErrors($errors);
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
        $errors     = $event->getErrors();

        if ('' !== $content && '' !== $signature && 0 === \count($errors)) {
            $dbEvent = new OnHandelDatabaseQueriesEvent();
            $dbEvent->setTable('tl_composeerpackages');
            $dbEvent->setContent($content);
            $dbEvent->setSignature($signature);

            $di->dispatch($dbEvent::NAME, $dbEvent);

            $errors = \array_merge($errors, $dbEvent->getErrors());
            $event->setErrors($errors);
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
        $errors         = $event->getErrors();
        $content        = $event->getContent();
        $signatureCount = $event->getSignatureCount();

        if ('' !== $content && 0 === $signatureCount) {
            $ComposerEvent = new OnHandleComposerJsonEvent();
            $ComposerEvent->setContentString($content);

            $di->dispatch($ComposerEvent::NAME, $ComposerEvent);

            $errors = \array_merge($errors, $ComposerEvent->getErrors());
        }

        $event->setErrors($errors);
    }
}
