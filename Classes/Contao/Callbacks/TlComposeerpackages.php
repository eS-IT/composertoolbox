<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  TlComposeerpackages.php
 * @version     1.0.0
 * @since       06.03.19 - 16:49
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Contao\Callbacks;

use Contao\System;
use Esit\Composertoolbox\Classes\Events\Import\OnHandleComposerJsonEvent;

/**
 * Class TlComposeerpackages
 * @package Esit\Composertoolbox\Classes\Contao\Callbacks
 */
class TlComposeerpackages
{


    /**
     * Fügt die Packete aus dem Abschnitt require dem Lanbel hinzu.
     * @param $row
     * @param $label
     * @return string
     */
    public function addPackageToLabel($row, $label): string
    {
        if (isset($row['importdata'])) {
            $data = \json_decode($row['importdata'], true);

            if (\is_array($data) && isset($data['require']) && \is_array($data['require'])) {
                $packages = \array_keys($data['require']);

                if (\is_array($packages)) {
                    $label .= ' - ';
                    $label .= \implode(' - ', $packages);
                }
            }
        }

        return $label;
    }


    /**
     * Löscht die Einträge aus der comopser.json, wenn ein Datensatz aus der Datenbank entfernt wird.
     * @param $dc
     */
    public function deleteFromComposer($dc): void
    {
        $di     = System::getContainer()->get('event_dispatcher');
        $event  = new OnHandleComposerJsonEvent();
        $event->setId((int) $dc->activeRecord->id);
        $event->setContentString($dc->activeRecord->importdata);

        $di->dispatch($event::NAME, $event);
    }
}
