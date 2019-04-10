<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleImportListenerTest.php
 * @version     1.0.0
 * @since       10.04.19 - 15:41
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleImportEvent;
use Esit\Composertoolbox\Classes\Listener\Import\OnHandleImportListener;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class OnHandleImportListenerTest
 * @package Esit\Composertoolbox\Tests\Listener\Import
 */
class OnHandleImportListenerTest extends \EsitTestCase
{


    /**
     * @dataProvider onHandleImportListener_loadFileContent_dataProvider
     * @param $files
     * @param $datafield
     * @param $signature
     * @param $algo
     * @param $content
     * @param $expected
     * @throws \ReflectionException
     */
    public function testLoadFileContent($files, $datafield, $signature, $content, $expected): void
    {
        $listener   = new OnHandleImportListener();
        $event      = new OnHandleImportEvent();
        $di         = $this->createMock(EventDispatcher::class);
        $di->method('dispatch')->willReturn($expected);

        $event->setFiles($files);
        $event->setDatafield($datafield);
        $event->setSignature($signature);
        $event->setContent($content);

        $listener->loadFileContent($event, '', $di);
        $this->assertEquals($expected, $event->getContent());
    }


    /**
     * @return array
     */
    public function onHandleImportListener_loadFileContent_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleImportListenerTest_handleDatabaseQuery_dataProvider
     * @param $signature
     * @param $content
     * @param $count
     * @param $expected
     * @throws \ReflectionException
     */
    public function testHandleDatabaseQuery($signature, $content, $count, $expected): void
    {
        $listener   = new OnHandleImportListener();
        $event      = new OnHandleImportEvent();
        $di         = $this->createMock(EventDispatcher::class);
        $di->method('dispatch')->willReturn($expected);

        $event->setSignature($signature);
        $event->setContent($content);
        $event->setSignatureCount($count);

        $listener->handleDatabaseQuery($event, '', $di);
        $this->assertEquals($expected, $event->getSignatureCount());
    }


    /**
     * @return array
     */
    public function onHandleImportListenerTest_handleDatabaseQuery_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleImportListenerTest_handleComposerJson_dataProvider
     * @param $content
     * @param $count
     * @param $callDispatcher
     * @throws \ReflectionException
     */
    public function testHandleComposerJson($content, $count, $callDispatcher): void
    {
        $listener   = new OnHandleImportListener();
        $event      = new OnHandleImportEvent();
        $di         = $this->getMockBuilder(EventDispatcher::class)->setMethods(['dispatch'])->getMock();

        $event->setContent($content);
        $event->setSignatureCount($count);

        if (true === $callDispatcher) {
            $di->expects($this->once())->method('dispatch');
        } else {
            $di->expects($this->never())->method('dispatch');
        }

        $listener->handleComposerJson($event, '', $di);
    }


    /**
     * @return array
     */
    public function onHandleImportListenerTest_handleComposerJson_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }
}
