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
use Esit\Composertoolbox\Classes\Exceptions\NoAllowedFileTypes;
use Esit\Composertoolbox\Classes\Exceptions\NoFileUploadetException;
use Esit\Composertoolbox\Classes\Exceptions\NoSignatureGiven;
use Esit\Composertoolbox\Classes\Exceptions\WrongFileTypeException;
use Esit\Composertoolbox\Classes\Exceptions\WrongSignatureException;
use Esit\Composertoolbox\Classes\Serives\Filesystem;

/**
 * Class OnHandleUploadedFileListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandleUploadedFileListener
{


    /**
     * @var Filesystem
     */
    protected $filesystem;


    /**
     * OnHandleUploadedFileListener constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }


    /**
     * Überprüft, ob eine Datei hochgeladen wurde.
     * @param OnHandleUploadedFileEvent $event
     */
    public function checkUpload(OnHandleUploadedFileEvent $event): void
    {
        $file = $event->getFile();

        if (!isset($file['tmp_name']) || empty($file['tmp_name']) || !$this->filesystem->exists($file['tmp_name'])) {
            throw new NoFileUploadetException('nofile');
        }
    }


    /**
     * Überprüft, ob die hoch geladene Datei den richtigen Typ hat.
     * @param OnHandleUploadedFileEvent $event
     */
    public function checkFiletype(OnHandleUploadedFileEvent $event): void
    {
        $file           = $event->getFile();
        $allowedTyps    = $event->getAllowedFiletyps();

        if (!isset($file['name']) || empty($file['name'])) {
            throw new NoFileUploadetException('nofile');
        }

        if (0 === \count($allowedTyps)) {
            throw new NoAllowedFileTypes('noallowedfiletypes');
        }

        $ext = \pathinfo($file['name'], \PATHINFO_EXTENSION);

        if (!isset($file['name']) || !\in_array($ext, $allowedTyps, true)) {
            throw new WrongFileTypeException('nojsonfile');
        }
    }


    /**
     * Überprüft die Signatue der hoch geladenen Datei.
     * @param OnHandleUploadedFileEvent $event
     */
    public function checkSignature(OnHandleUploadedFileEvent $event): void
    {
        $algo       = $event->getHashAlgorithm();
        $file       = $event->getFile();
        $signature  = $event->getSignature();

        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            throw new NoFileUploadetException('nofile');
        }

        if ('' === $signature) {
            throw new NoSignatureGiven('nosignaturegiven');
        }

        $fileHash = $this->filesystem->hash($algo, $file['tmp_name']);

        if ($fileHash !== $signature) {
            throw new WrongSignatureException('signatureerror');
        }
    }


    /**
     * Lädt den Inhalt der hoch geladenen Datei.
     * @param OnHandleUploadedFileEvent $event
     */
    public function loadFileContent(OnHandleUploadedFileEvent $event): void
    {
        $file = $event->getFile();

        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            throw new NoFileUploadetException('nofile');
        }

        if (isset($file['tmp_name'])) {
            $event->setContent($this->filesystem->getContents($file['tmp_name']));
        }
    }
}
