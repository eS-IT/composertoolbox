<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  FilesystemTest.php
 * @version     1.0.0
 * @since       10.04.19 - 08:34
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Services;

use Esit\Composertoolbox\Classes\Serives\Filesystem;

/**
 * Class FilesystemTest
 * @package Esit\Composertoolbox\Tests\Listener\Services
 */
class FilesystemTest extends \EsitTestCase
{


    /**
     * @dataProvider getContents_dataProvider
     * @param string $filename
     * @param        $expected
     * @param string $exception
     */
    public function testGetContents(string $filename, $expected, string $exception): void
    {
        if (!empty($filename) && !is_writable(dirname($filename))) {
            $this->markTestSkipped('File not writable on this system!');
        }

        if (is_file($filename)) {
            unlink($filename);
        }

        $fs = new Filesystem();

        if (false !== $expected && empty($expected)) {
            $this->expectException($exception);
        }

        if (!empty($expected) && !empty($filename)) {
            file_put_contents($filename, $expected);
        }

        $rtn = $fs->getContents($filename);

        $this->assertEquals($expected, $rtn);

        if (is_file($filename)) {
            unlink($filename);
        }
    }


    /**
     * @return array
     */
    public function getContents_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider putContents_dataProvider
     * @param string $filename
     * @param        $data
     * @param string $exception
     */
    public function testPutContents(string $filename, $data, string $exception): void
    {
        if (!empty($filename) && !is_writable(dirname($filename))) {
            $this->markTestSkipped('File not writable on this system!');
        }

        if (is_file($filename)) {
            unlink($filename);
        }

        $fs = new Filesystem();

        if (empty($data)) {
            $this->expectException($exception);
        }

        $rtn = $fs->putContents($filename, $data);

        $this->assertEquals(strlen($data), $rtn);

        if (is_file($filename)) {
            unlink($filename);
        }
    }


    /**
     * @return array
     */
    public function putContents_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider exists_dataProvider
     * @param string $filename
     * @param bool   $expected
     * @param string $exception
     */
    public function testExists(string $filename, bool $expected, string $exception): void
    {
        if (!empty($filename) && !is_writable(dirname($filename))) {
            $this->markTestSkipped('File not writable on this system!');
        }

        if (is_file($filename)) {
            unlink($filename);
        }

        if (empty($filename) && !empty($exception)) {
            $this->expectException($exception);
        }

        if (!empty($filename) && $expected) {
            touch($filename);
        }

        $fs     = new Filesystem();
        $rtn    = $fs->exists($filename);

        $this->assertEquals($expected, $rtn);

        if (is_file($filename)) {
            unlink($filename);
        }
    }


    /**
     * @return array
     */
    public function exists_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider hash_dataProvider
     * @param string $algo
     * @param string $filename
     * @param string $data
     * @param string $exception
     */
    public function testHash(string $algo, string $filename, string  $data, string $exception): void
    {
        if (!empty($filename) && !is_writable(dirname($filename))) {
            $this->markTestSkipped('File not writable on this system!');
        }

        if (is_file($filename)) {
            unlink($filename);
        }

        if (!empty($exception)) {
            $this->expectException($exception);
        }

        if (!empty($filename) && !empty($data)) {
            file_put_contents($filename, $data);
        }

        $fs         = new Filesystem();
        $rtn        = $fs->hash($algo, $filename);
        $expected   = hash($algo, $data);

        $this->assertEquals($expected, $rtn);

        if (is_file($filename)) {
            unlink($filename);
        }
    }


    /**
     * @return array
     */
    public function hash_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }
}
