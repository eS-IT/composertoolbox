<?php
/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 *
 * @package     composertoolbox
 * @filesource  tl_composeerpackages.php
 * @version     1.0.0
 * @since       03.03.19 - 17:22
 * @author      Patrick Froch <info@easySolutionsIT.de>
 * @link        http://easySolutionsIT.de
 * @copyright   e@sy Solutions IT 2019
 * @license     EULA
 */
/**
 * Set Tablename
 */
$strName = 'tl_composeerpackages';


/**
 * Set Elementname
 */
$strElement = 'Element';


/**
 * Fields
 */
$GLOBALS['TL_LANG'][$strName]['importtime']         = array('Importzeit', 'Bitte geben Sie die Importzeit ein.');
$GLOBALS['TL_LANG'][$strName]['importhash']         = array('Signatur der Importdatei', 'Bitte geben Sie die Signatur der Importdatei ein.');
$GLOBALS['TL_LANG'][$strName]['importdata']         = array('Daten', 'Bitte geben Sie die Daten ein.');


/**
 * Legends
 */
$GLOBALS['TL_LANG'][$strName]['import_legend']      = 'Einstellungen';
$GLOBALS['TL_LANG'][$strName]['importdata_legend']  = 'Daten';


/**
 * Operations
 */
$GLOBALS['TL_LANG'][$strName]['insert']             = ['Daten importieren', 'Daten importieren'];
$GLOBALS['TL_LANG'][$strName]['signature']          = ['Signatur erstellen', 'Signatur erstellen'];


/**
 * Reference
 */
//$GLOBALS['TL_LANG'][$strName]['']   = array();


/**
 * Buttons
 */
$GLOBALS['TL_LANG'][$strName]['new']        = array('Neues ' . $strElement, 'Neues ' . $strElement . ' anlegen');
$GLOBALS['TL_LANG'][$strName]['edit']       = array($strElement . ' bearbeiten', $strElement . ' mit der ID %s bearbeiten');
$GLOBALS['TL_LANG'][$strName]['copy']       = array($strElement . ' kopieren', $strElement . ' mit der ID %s kopieren');
$GLOBALS['TL_LANG'][$strName]['delete']     = array($strElement . ' löschen', $strElement . ' mit der ID %s löschen');
$GLOBALS['TL_LANG'][$strName]['show']       = array($strElement . ' anzeigen', 'Details des ' . $strElement . 's mit der ID %s anzeigen');