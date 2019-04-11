<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandleDatabaseQueriesListener.php
 * @version     1.0.0
 * @since       04.03.19 - 18:55
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Listener\Import;

use Doctrine\DBAL\Connection;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleDatabaseQueriesEvent;
use Esit\Composertoolbox\Classes\Exceptions\NoValidSectionToSaveException;
use Esit\Composertoolbox\Classes\Exceptions\SignatureNotUniqueInDatabaseException;

/**
 * Class OnHandleDatabaseQueriesListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandleDatabaseQueriesListener
{


    /**
     * @var Connection
     */
    protected $connection;


    /**
     * OnHandelDatabaseQueriesListener constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }


    /**
     * Prüft ob die Signatur bereits in der Datenbank vorhanden ist.
     * @param OnHandleDatabaseQueriesEvent $event
     */
    public function checkSignatureInDb(OnHandleDatabaseQueriesEvent $event): void
    {
        $table      = $event->getTable();
        $signature  = $event->getSignature();
        $query      = $this->connection->createQueryBuilder();
        $sigField   = $event->getSignaturfield();
        $query->select('COUNT(id) AS count')->from($table)->where("$sigField = '$signature'");
        $result     = $query->execute();
        $data       = $result->fetch(\PDO::FETCH_ASSOC);
        $count      = (int) $data['count'];

        $event->setSignatureCount($count);
    }


    /**
     * Fügt die Daten in die Datenbank ein.
     * @param OnHandleDatabaseQueriesEvent $event
     */
    public function saveDataIntoDb(OnHandleDatabaseQueriesEvent $event): void
    {
        if (0 === $event->getSignatureCount()) {
            $table      = $event->getTable();
            $signature  = $event->getSignature();
            $content    = $event->getContent();
            $timeField  = $event->getTimefield();
            $sigField   = $event->getSignaturfield();
            $dataField  = $event->getDatafield();

            if ('' !== $signature && '' !== $content) {
                $query = $this->connection->createQueryBuilder();
                $query->insert($table)->values([$timeField => '?', $sigField => '?', $dataField => '?']);
                $query->setParameters([\time(), $signature, $content]);
                $query->execute();
            } else {
                throw new NoValidSectionToSaveException('novalidsections');
            }
        } else {
            throw new SignatureNotUniqueInDatabaseException('signaturenotunique');
        }
    }
}
