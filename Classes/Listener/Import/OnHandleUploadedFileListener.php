<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleUploadedFileListener.php
 * @version     1.0.0
 * @since       04.03.19 - 17:56
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Listener\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleUploadedFileEvent;

/**
 * Class OnHandleUploadedFileListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandleUploadedFileListener
{


    /**
     * Überprüft, ob eine Datei hochgeladen wurde.
     * @param OnHandleUploadedFileEvent $event
     */
    public function checkUpload(OnHandleUploadedFileEvent $event): void
    {
        $errors         = $event->getErrors();
        $file           = $event->getFile();

        if (!\is_array($file) || !isset($file['tmp_name']) || !\is_file($file['tmp_name'])) {
            $errors[] = 'nofile';
        }

        $event->setErrors($errors);
    }


    /**
     * Überprüft, ob die hoch geladene Datei den richtigen Typ hat.
     * @param OnHandleUploadedFileEvent $event
     */
    public function checkFiletype(OnHandleUploadedFileEvent $event): void
    {
        $errors         = $event->getErrors();
        $file           = $event->getFile();
        $allowedTyps    = $event->getAllowedFiletyps();
        $ext            = \pathinfo($file['name'], \PATHINFO_EXTENSION);

        if (\is_array($file)) {
            if (!isset($file['name']) || !\in_array($ext, $allowedTyps, true)) {
                $errors[] = 'nojsonfile';
            }
        }

        $event->setErrors($errors);
    }


    /**
     * Überprüft die Signatue der hoch geladenen Datei.
     * @param OnHandleUploadedFileEvent $event
     */
    public function checkSignature(OnHandleUploadedFileEvent $event): void
    {
        $errors     = $event->getErrors();
        $file       = $event->getFile();
        $signature  = $event->getSignature();
        $algo       = $event->getHashAlgorithm();

        if (\is_array($file) && isset($file['tmp_name'])) {
            $fileName = $file['tmp_name'];
            $fileHash = \hash_file($algo, $fileName);

            if ($fileHash !== $signature) {
                $errors[] = 'signatureerror';
                $event->stopPropagation();
            }
        }

        $event->setErrors($errors);
    }


    /**
     * Lädt den Inhalt der hoch geladenen Datei.
     * @param OnHandleUploadedFileEvent $event
     */
    public function loadFileContent(OnHandleUploadedFileEvent $event): void
    {
        $file = $event->getFile();

        if (\is_array($file) && isset($file['tmp_name'])) {
            $event->setContent(\file_get_contents($file['tmp_name']));
        }
    }
}
