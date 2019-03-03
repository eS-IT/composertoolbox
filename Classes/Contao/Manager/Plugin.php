<?php declare(strict_types = 1);
/**
 * @package     composertoolbox
 * @filesource  Plugin.php
 * @version     1.0.0
 * @since       03.03.2019 - 17:05
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @see        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
namespace Esit\Composertoolbox\Classes\Contao\Manager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

/**
 * Class Plugin
 * @package Esit\Composertoolbox\Classes\Contao\Manager
 */
class Plugin implements BundlePluginInterface
{


    /**
     * @param  ParserInterface                                             $parser
     * @return array|\Contao\ManagerPlugin\Bundle\Config\ConfigInterface[]
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(\Esit\Composertoolbox\EsitComposertoolboxBundle::class)
                ->setLoadAfter([\Contao\CoreBundle\ContaoCoreBundle::class])
        ];
    }
}
