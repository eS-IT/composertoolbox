<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleUploadedFileEventTest.php
 * @version     1.0.0
 * @since       10.04.19 - 10:47
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Events\Import;

use Esit\Composertoolbox\Classes\Events\Import\OnHandleUploadedFileEvent;

/**
 * Class OnHandleUploadedFileEventTest
 * @package Esit\Composertoolbox\Tests\Listener\Events\Import
 */
class OnHandleUploadedFileEventTest extends \EsitTestCase
{


    /**
     * @covers OnHandleUploadedFileEvent::setSignature
     */
    public function testGetSignature(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleUploadedFileEvent();
        $event->setSignature($exepted);
        $rtn        = $event->getSignature();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleUploadedFileEvent::setAllowedFiletyps
     */
    public function testGetAllowedFiletyps(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleUploadedFileEvent();
        $event->setAllowedFiletyps($exepted);
        $rtn        = $event->getAllowedFiletyps();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleUploadedFileEvent::setFile
     */
    public function testGetFile(): void
    {
        $exepted    = ['test'];
        $event      = new OnHandleUploadedFileEvent();
        $event->setFile($exepted);
        $rtn        = $event->getFile();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleUploadedFileEvent::setContent
     */
    public function testGetContent(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleUploadedFileEvent();
        $event->setContent($exepted);
        $rtn        = $event->getContent();
        $this->assertEquals($exepted, $rtn);
    }


    /**
     * @covers OnHandleUploadedFileEvent::setHashAlgorithm
     */
    public function testGetHashAlgorithm(): void
    {
        $exepted    = 'test';
        $event      = new OnHandleUploadedFileEvent();
        $event->setHashAlgorithm($exepted);
        $rtn        = $event->getHashAlgorithm();
        $this->assertEquals($exepted, $rtn);
    }
}
