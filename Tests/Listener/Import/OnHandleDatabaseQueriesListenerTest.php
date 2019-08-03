<?php declare(strict_types=1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleDatabaseQueriesListenerTest.php
 * @version     1.0.0
 * @since       11.04.19 - 18:12
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Tests\Listener\Import;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Statement;
use Doctrine\DBAL\Query\QueryBuilder;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleDatabaseQueriesEvent;
use Esit\Composertoolbox\Classes\Listener\Import\OnHandleDatabaseQueriesListener;
use Esit\Composertoolbox\EsitTestCase;

/**
 * Class OnHandleDatabaseQueriesListenerTest
 * @package Esit\Composertoolbox\Tests\Listener\Import
 */
class OnHandleDatabaseQueriesListenerTest extends EsitTestCase
{


    /**
     * @dataProvider onHandleDatabaseQueriesListener_checkSignatureInDb_dataProvider
     * @param $fetch
     * @param $expected
     * @throws \ReflectionException
     */
    public function testCheckSignatureInDb($fetch, $expected): void
    {
        $event = new OnHandleDatabaseQueriesEvent();

        $result = $this->createMock(Statement::class);
        $result->method('fetch')->willReturn($fetch);

        $query = $this->createMock(QueryBuilder::class);
        $query->method('select')->willReturn($query);
        $query->method('from')->willReturn($query);
        $query->method('where')->willReturn($query);
        $query->method('execute')->willReturn($result);

        $connection = $this->createMock(Connection::class);
        $connection->method('createQueryBuilder')->willReturn($query);

        $listener = new OnHandleDatabaseQueriesListener($connection);
        $listener->checkSignatureInDb($event);

        $this->assertEquals($expected, $event->getSignatureCount());
    }


    /**
     * @return array
     */
    public function onHandleDatabaseQueriesListener_checkSignatureInDb_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }


    /**
     * @dataProvider onHandleDatabaseQueriesListener_saveDataIntoDb_dataProvider
     * @param $signatureCount
     * @param $signature
     * @param $content
     * @param $exception
     * @throws \ReflectionException
     */
    public function testSaveDataIntoDb($signatureCount, $signature, $content, $exception): void
    {
        $event = new OnHandleDatabaseQueriesEvent();
        $event->setSignatureCount($signatureCount);
        $event->setSignature($signature);
        $event->setContent($content);

        $query = $this->createMock(QueryBuilder::class);
        $query->method('insert')->willReturn($query);
        $query->method('values')->willReturn($query);
        $query->method('setParameters')->willReturn($query);
        $query->method('execute')->willReturn('');

        $connection = $this->createMock(Connection::class);
        $connection->method('createQueryBuilder')->willReturn($query);

        $listener = new OnHandleDatabaseQueriesListener($connection);

        if ('' !== $exception) {
            $this->expectException($exception);
        }

        $listener->saveDataIntoDb($event);

        if ('' === $exception) {
            // Damit der Test nicht als risky markiert wird, wenn keine Exception geworfen wird!
            $this->assertTrue(true);
        }
    }


    /**
     * @return array
     */
    public function onHandleDatabaseQueriesListener_saveDataIntoDb_dataProvider(): array
    {
        return $this->uniDataProvider(__METHOD__);
    }
}
