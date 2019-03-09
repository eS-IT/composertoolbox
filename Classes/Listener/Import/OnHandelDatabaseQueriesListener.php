<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  OnHandelDatabaseQueriesListener.php
 * @version     1.0.0
 * @since       04.03.19 - 18:55
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Listener\Import;

use Doctrine\DBAL\Connection;
use Esit\Composertoolbox\Classes\Events\Import\OnHandelDatabaseQueriesEvent;
use Esit\Composertoolbox\Classes\Exceptions\Database\NoValidSectionToSaveException;
use Esit\Composertoolbox\Classes\Exceptions\Database\SignatureNotUniqueInDatabaseException;

/**
 * Class OnHandelDatabaseQueriesListener
 * @package Esit\Composertoolbox\Classes\Listener\Import
 */
class OnHandelDatabaseQueriesListener
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
     * @param OnHandelDatabaseQueriesEvent $event
     */
    public function checkSignatureInDb(OnHandelDatabaseQueriesEvent $event): void
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
     * @param OnHandelDatabaseQueriesEvent $event
     */
    public function saveDataIntoDb(OnHandelDatabaseQueriesEvent $event): void
    {
        if (0 === $event->getSignatureCount()) {
            $table      = $event->getTable();
            $signature  = $event->getSignature();
            $content    = $event->getContent();
            $timeField  = $event->getTimefield();
            $sigField   = $event->getSignaturfield();
            $dataField  = $event->getDatafield();

            if ('' !== $signature && '' !== $content) {
                if (\substr_count($content, 'require') || \substr_count($content, 'repository')) {
                    $query = $this->connection->createQueryBuilder();
                    $query->insert($table)->values([$timeField => '?', $sigField => '?', $dataField => '?']);
                    $query->setParameters([\time(), $signature, $content]);
                    $query->execute();
                } else {
                    throw new NoValidSectionToSaveException('novalidsections');
                }
            }
        } else {
            throw new SignatureNotUniqueInDatabaseException('signaturenotunique');
        }
    }
}
