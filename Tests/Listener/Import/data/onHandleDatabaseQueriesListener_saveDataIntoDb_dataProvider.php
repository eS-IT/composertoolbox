<?php declare(strict_types=1);
/**
 * @author      pfroch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 * @package     composertoolbox
 * @filesource  onHandleDatabaseQueriesListener_saveDataIntoDb_dataProvider.php
 * @version     1.0.0
 * @since       11.04.19 - 18:21
 */
use Esit\Composertoolbox\Classes\Exceptions\NoValidSectionToSaveException;
use Esit\Composertoolbox\Classes\Exceptions\SignatureNotUniqueInDatabaseException;

return [
    'signaturCountIsTwelve' => [
        '$signatureCount'   => 12,
        '$signature'        => '',
        '$content'          => '',
        '$exception'        => SignatureNotUniqueInDatabaseException::class
    ],
    'signaturCountIsTwelveDataAreEqual' => [
        '$signatureCount'   => 12,
        '$signature'        => '012346789abcdef',
        '$content'          => 'test',
        '$exception'        => SignatureNotUniqueInDatabaseException::class
    ],
    'signaturCountIsZeroButNoData' => [
        '$signatureCount'   => 0,
        '$signature'        => '',
        '$content'          => '',
        '$exception'        => NoValidSectionToSaveException::class
    ],
    'signaturCountIsZeroButNoContent' => [
        '$signatureCount'   => 0,
        '$signature'        => '012346789abcdef',
        '$content'          => '',
        '$exception'        => NoValidSectionToSaveException::class
    ],
    'signaturCountIsZeroButNoSignature' => [
        '$signatureCount'   => 0,
        '$signature'        => '',
        '$content'          => 'test',
        '$exception'        => NoValidSectionToSaveException::class
    ],
    'signaturCountIsZeroAndThereAreData' => [
        '$signatureCount'   => 0,
        '$signature'        => '012346789abcdef',
        '$content'          => 'test',
        '$exception'        => ''
    ]
];