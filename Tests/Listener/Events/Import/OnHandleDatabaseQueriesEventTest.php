<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleDatabaseQueriesEventTest.php
 * @version     1.0.0
 * @since       10.04.19 - 10:21
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Events\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleDatabaseQueriesEvent;

/**
 * Class OnHandleDatabaseQueriesEventTest
 * @package Esit\Composertoolbox\Tests\Listener\Events\Import
 */
class OnHandleDatabaseQueriesEventTest extends \EsitTestCase
{


    /**
     * @covers OnHandleDatabaseQueriesEvent::setDatafield
     */
    public function testGetDatafield(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setDatafield($exepted);
        $rtn        = $event->getDatafield();
        $this->assertEquals($exepted, $rtn);

    }


    /**
     * @covers OnHandleDatabaseQueriesEvent::setTimefield
     */
    public function testGetTimefield(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setTimefield($exepted);
        $rtn        = $event->getTimefield();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleDatabaseQueriesEvent::setSignature
     */
    public function testGetSignature(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setSignature($exepted);
        $rtn        = $event->getSignature();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleDatabaseQueriesEvent::setSignaturfield
     */
    public function testGetSignaturfield(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setSignaturfield($exepted);
        $rtn        = $event->getSignaturfield();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleDatabaseQueriesEvent::setContent
     */
    public function testGetContent(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setContent($exepted);
        $rtn        = $event->getContent();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleDatabaseQueriesEvent::setSignatureCount
     */
    public function testGetSignatureCount(): void
    {
        $exepted    = 12;
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setSignatureCount($exepted);
        $rtn        = $event->getSignatureCount();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleDatabaseQueriesEvent::setTable
     */
    public function testGetTable(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleDatabaseQueriesEvent();
        $event->setTable($exepted);
        $rtn        = $event->getTable();
        $this->assertEquals($exepted, $rtn);
    }
}
