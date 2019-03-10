<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleUploadedFileListenerTest.php
 * @version     1.0.0
 * @since       10.03.19 - 11:36
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleUploadedFileEvent;
use Esit\Composertoolbox\Classes\Listener\Import\OnHandleUploadedFileListener;
use Esit\Composertoolbox\Classes\Serives\Filesystem;

/**
 * Class OnHandleUploadedFileListenerTest
 * @package Esit\Composertoolbox\Tests\Listener\Import
 */
class OnHandleUploadedFileListenerTest extends \EsitTestCase
{


    /**
     * @dataProvider checkUpload_dataProvider
     * @param array  $file
     * @param bool   $fileexists
     * @param string $exception
     * @throws \ReflectionException
     */
    public function testCheckUpload(array $file, bool $fileexists, string $exception): void
    {
        $fs                     = $this->createMock(Filesystem::class);
        $fs->method('exists')->willReturn($fileexists);
        $onHandleUploadedFile   = new OnHandleUploadedFileListener($fs);
        $event                  = new OnHandleUploadedFileEvent();
        $event->setFile($file);
        $this->expectException($exception);
        $onHandleUploadedFile->checkUpload($event);
    }


    /**
     * @return array
     */
    public function checkUpload_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider checkFiletype_dataProvider
     * @param array  $file
     * @param array  $allowedTyps
     * @param string $exception
     * @throws \ReflectionException
     */
    public function testCheckFiletype(array $file, array $allowedTyps, string $exception): void
    {
        $fs                     = $this->createMock(Filesystem::class);
        $onHandleUploadedFile   = new OnHandleUploadedFileListener($fs);
        $event                  = new OnHandleUploadedFileEvent();
        $event->setFile($file);
        $event->setAllowedFiletyps($allowedTyps);
        $this->expectException($exception);
        $onHandleUploadedFile->checkFiletype($event);
    }


    /**
     * @return array
     */
    public function checkFiletype_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider checkSignature_dataProvider
     * @param array  $file
     * @param string $signature
     * @param string $filehash
     * @param string $algo
     * @param string $exception
     * @throws \ReflectionException
     */
    public function testCheckSignature(
        array $file,
        string $signature,
        string $algo,
        string $filehash,
        string $exception
    ): void {
        $fs                     = $this->createMock(Filesystem::class);
        $fs->method('hash')->willReturn($filehash);
        $onHandleUploadedFile   = new OnHandleUploadedFileListener($fs);
        $event                  = new OnHandleUploadedFileEvent();
        $event->setFile($file);
        $event->setSignature($signature);
        $event->setHashAlgorithm($algo);
        $this->expectException($exception);
        $onHandleUploadedFile->checkSignature($event);
    }


    /**
     * @return array
     */
    public function checkSignature_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider loadFileContent_dataProvider
     * @param array  $file
     * @param string $content
     * @param string $exception
     * @throws \ReflectionException
     */
    public function testLoadFileContent(array $file, string $content, string $exception): void
    {
        $fs                     = $this->createMock(Filesystem::class);
        $fs->method('getContents')->willReturn($content);
        $onHandleUploadedFile   = new OnHandleUploadedFileListener($fs);
        $event                  = new OnHandleUploadedFileEvent();
        $event->setFile($file);

        if ('' !== $exception) {
            $this->expectException($exception);
        }

        $onHandleUploadedFile->loadFileContent($event);

        if ('' === $exception) {
            $this->assertEquals($event->getContent(), $content);
        }
    }


    /**
     * @return array
     */
    public function loadFileContent_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }
}
