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

/**
 * Class TlComposeerpackages
 * @package Esit\Composertoolbox\Classes\Contao\Callbacks
 */
class TlComposeerpackages
{
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
}
