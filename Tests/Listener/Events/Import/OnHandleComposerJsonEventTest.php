<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleComposerJsonEventTest.php
 * @version     1.0.0
 * @since       10.04.19 - 10:29
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Events\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleComposerJsonEvent;

/**
 * Class OnHandleComposerJsonEventTest
 * @package Esit\Composertoolbox\Tests\Listener\Events\Import
 */
class OnHandleComposerJsonEventTest extends \EsitTestCase
{


    /**
     * @covers OnHandleComposerJsonEvent::setMergedContent
     */
    public function testGetMergedContent(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleComposerJsonEvent();
        $event->setMergedContent($exepted);
        $rtn        = $event->getMergedContent();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleComposerJsonEvent::setContent
     */
    public function testGetContent(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleComposerJsonEvent();
        $event->setContent($exepted);
        $rtn        = $event->getContent();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleComposerJsonEvent::setContentString
     */
    public function testGetContentString(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleComposerJsonEvent();
        $event->setContentString($exepted);
        $rtn        = $event->getContentString();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleComposerJsonEvent::setAllowdFields
     */
    public function testGetAllowdFields(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleComposerJsonEvent();
        $event->setAllowdFields($exepted);
        $rtn        = $event->getAllowdFields();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleComposerJsonEvent::setComposerContent
     */
    public function testGetComposerContent(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleComposerJsonEvent();
        $event->setComposerContent($exepted);
        $rtn        = $event->getComposerContent();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleComposerJsonEvent::setFilename
     */
    public function testGetFilename(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleComposerJsonEvent();
        $event->setFilename($exepted);
        $rtn        = $event->getFilename();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleComposerJsonEvent::setId
     */
    public function testGetId(): void
    {
        $exepted    = 12;
        $event      = new OnHandleComposerJsonEvent();
        $event->setId($exepted);
        $rtn        = $event->getId();
        $this->assertEquals($exepted, $rtn);
    }
}
