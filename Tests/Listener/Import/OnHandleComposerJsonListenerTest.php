<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleComposerJsonListenerTest.php
 * @version     1.0.0
 * @since       11.04.19 - 16:16
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleComposerJsonEvent;
use Esit\Composertoolbox\Classes\Exceptions\FileSaveException;
use Esit\Composertoolbox\Classes\Exceptions\NoComposerDataGiven;
use Esit\Composertoolbox\Classes\Exceptions\NoFileDataGiven;
use Esit\Composertoolbox\Classes\Exceptions\NoValidSectionToSaveException;
use Esit\Composertoolbox\Classes\Listener\Import\OnHandleComposerJsonListener;
use Esit\Composertoolbox\Classes\Serives\Filesystem;

/**
 * Class OnHandleComposerJsonListenerTest
 * @package Esit\Composertoolbox\Tests\Listener\Import\data
 */
class OnHandleComposerJsonListenerTest extends \EsitTestCase
{


    /**
     * @dataProvider onHandleComposerJsonListener_parseUploadedContent_dataProvider
     * @param $content
     * @param $expected
     * @throws \ReflectionException
     */
    public function testParseUploadedContent(string $content, $expected): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setContentString($content);

        $listener->parseUploadedContent($event);

        $this->assertEquals($expected, $event->getContent());
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_parseUploadedContent_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_loadComposerJson_dataProvider
     * @param bool   $exists
     * @param string $content
     * @param        $expected
     * @throws \ReflectionException
     */
    public function testLoadComposerJson(bool $exists, string $content, $expected): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $fs->method('exists')->willReturn($exists);
        $fs->method('getContents')->willReturn($content);

        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setFilename('/tmp/testfile.test');

        $listener->loadComposerJson($event);

        $this->assertEquals($expected, $event->getComposerContent());
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_loadComposerJson_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_checkNewContent_dataProvider
     * @param $content
     * @throws \ReflectionException
     */
    public function testCheckNewContent($content): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setContent($content);

        if (!\is_array($content) || !\count($content)) {
            $this->expectException(NoFileDataGiven::class);
        }

        $listener->checkNewContent($event);

        if (\is_array($content) && \count($content)) {
            // Damit der Test nicht als risky markiert wird, wenn keine Exception geworfen wird!
            $this->assertTrue(true);
        }
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_checkNewContent_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_checkComposerContent_dataProvider
     * @param $composoer
     * @throws \ReflectionException
     */
    public function testCheckComposerContent($composoer): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setComposerContent($composoer);

        if (!\is_array($composoer) || !\count($composoer)) {
            $this->expectException(NoComposerDataGiven::class);
        }

        $listener->checkComposerContent($event);

        if (\is_array($composoer) && \count($composoer)) {
            // Damit der Test nicht als risky markiert wird, wenn keine Exception geworfen wird!
            $this->assertTrue(true);
        }
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_checkComposerContent_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_checkAllowedFields_dataProvider
     * @param $allowedFields
     * @throws \ReflectionException
     */
    public function testCheckAllowedFields($allowedFields): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setAllowdFields($allowedFields);

        if (!\is_array($allowedFields) || !\count($allowedFields)) {
            $this->expectException(NoValidSectionToSaveException::class);
        }

        $listener->checkAllowedFields($event);

        if (\is_array($allowedFields) && \count($allowedFields)) {
            // Damit der Test nicht als risky markiert wird, wenn keine Exception geworfen wird!
            $this->assertTrue(true);
        }
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_checkAllowedFields_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_mergeArrays_dataProvider
     * @param $content
     * @param $newContent
     * @param $allowedFields
     * @param $delId
     * @param $expected
     * @throws \ReflectionException
     */
    public function testMergeArrays($content, $newContent, $allowedFields, $delId, $expected): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setContent($content);
        $event->setMergedContent($newContent);
        $event->setAllowdFields($allowedFields);
        $event->setId($delId);

        $listener->mergeArrays($event);

        $this->assertEquals($expected, $event->getMergedContent());
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_mergeArrays_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_deleteSections_dataProvider
     * @param $content
     * @param $newContent
     * @param $allowedFields
     * @param $delId
     * @param $expected
     * @throws \ReflectionException
     */
    public function testDeleteSections($content, $newContent, $allowedFields, $delId, $expected): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setContent($content);
        $event->setMergedContent($newContent);
        $event->setAllowdFields($allowedFields);
        $event->setId($delId);

        $listener->deleteSections($event);

        $this->assertEquals($expected, $event->getMergedContent());
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_deleteSections_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleComposerJsonListener_saveComposerJson_dataProvider
     * @param bool $putContents
     * @throws \ReflectionException
     */
    public function testSaveComposerJson(bool $putContents): void
    {
        $fs         = $this->createMock(Filesystem::class);
        $fs->method('putContents')->willReturn($putContents);
        $listener   = new OnHandleComposerJsonListener($fs);
        $event      = new OnHandleComposerJsonEvent();
        $event->setFilename('/tmp/testfile.test');
        $event->setMergedContent(['test']);

        if (false === $putContents) {
            $this->expectException(FileSaveException::class);
        }

        $listener->saveComposerJson($event);

        if (true === $putContents) {
            // Damit der Test nicht als risky markiert wird, wenn keine Exception geworfen wird!
            $this->assertTrue(true);
        }
    }


    /**
     * @return array
     */
    public function onHandleComposerJsonListener_saveComposerJson_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }
}
