<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleImportEventTest.php
 * @version     1.0.0
 * @since       10.04.19 - 10:41
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Events\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleImportEvent;

/**
 * Class OnHandleImportEventTest
 * @package Esit\Composertoolbox\Tests\Listener\Events\Import
 */
class OnHandleImportEventTest extends \EsitTestCase
{


    /**
     * @covers OnHandleImportEvent::setTable
     */
    public function testGetTable(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setTable($exepted);
        $rtn        = $event->getTable();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setFiles
     */
    public function testGetFiles(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleImportEvent();
        $event->setFiles($exepted);
        $rtn        = $event->getFiles();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setComposerFilename
     */
    public function testGetComposerFilename(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setComposerFilename($exepted);
        $rtn        = $event->getComposerFilename();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setHashAlgorithm
     */
    public function testGetHashAlgorithm(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setHashAlgorithm($exepted);
        $rtn        = $event->getHashAlgorithm();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setSignatureCount
     */
    public function testGetSignatureCount(): void
    {
        $exepted    = 12;
        $event      = new OnHandleImportEvent();
        $event->setSignatureCount($exepted);
        $rtn        = $event->getSignatureCount();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setTimefield
     */
    public function testGetTimefield(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setTimefield($exepted);
        $rtn        = $event->getTimefield();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setSignature
     */
    public function testGetSignature(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setSignature($exepted);
        $rtn        = $event->getSignature();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setContent
     */
    public function testGetContent(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setContent($exepted);
        $rtn        = $event->getContent();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setSignaturfield
     */
    public function testGetSignaturfield(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setSignaturfield($exepted);
        $rtn        = $event->getSignaturfield();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleImportEvent::setDatafield
     */
    public function testGetDatafield(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleImportEvent();
        $event->setDatafield($exepted);
        $rtn        = $event->getDatafield();
        $this->assertEquals($exepted, $rtn);
    }
}
