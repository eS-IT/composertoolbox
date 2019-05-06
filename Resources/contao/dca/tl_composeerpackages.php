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
 * @since       03.03.19 - 17:15
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
 * Table tl_composeerpackages
 */
$GLOBALS['TL_DCA'][$strName] = array
(
    // Config
    'config'      => array
    (
        'dataContainer'     => 'Table',
        'enableVersioning'  => false,
        'closed'            => true,
        'notEditable'       => true,
        'notSortable'       => true,
        'notCopyable'       => true,
        'notCreatable'      => true,
        'ondelete_callback' => [[\Esit\Composertoolbox\Classes\Contao\Callbacks\TlComposeerpackages::class, 'deleteFromComposer']],
        'sql'               => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),
    // List
    'list'        => array
    (
        'sorting'           => array
        (
            'mode'        => 1,
            'fields'      => array('importtime'),
            'panelLayout' => 'sort,filter;search,limit',
            'flag'        => 6
        ),
        'label'             => array
        (
            'fields'            => array('importtime'),
            'format'            => '%s',
            'label_callback'    => [Esit\Composertoolbox\Classes\Contao\Callbacks\TlComposeerpackages::class, 'addPackageToLabel']
        ),
        'global_operations' => array
        (/*
            'all' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            )*/
            'insert' => array
            (
                'label'      => &$GLOBALS['TL_LANG'][$strName]['insert'],
                'href'       => 'key=insert',
                'icon'       => 'new.svg',
                'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            )
        ),
        'operations'        => array
        (/*
            'edit'   => array
            (
                'label' => &$GLOBALS['TL_LANG'][$strName]['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ),
            'copy'   => array
            (
                'label' => &$GLOBALS['TL_LANG'][$strName]['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.gif'
            ),*/
            'delete' => array
            (
                'label'      => &$GLOBALS['TL_LANG'][$strName]['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show'   => array
            (
                'label' => &$GLOBALS['TL_LANG'][$strName]['show'],
                'href'  => 'act=show',
                'icon'  => 'show.gif'
            )
        )
    ),
    // Select
    'select'      => array
    (
        'buttons_callback' => array()
    ),
    // Edit
    'edit'        => array
    (
        'buttons_callback' => array()
    ),
    // Palettes
    'palettes'    => array
    (
        '__selector__' => array(''),
        'default'      => '{import_legend},importtime,importhash;{importdata_legend},importdata;'
    ),
    // Subpalettes
    'subpalettes' => array
    (
        '' => ''
    ),
    // Fields
    'fields'      => array
    (
        'id'     => array
        (
            'sql' => 'int(10) unsigned NOT NULL auto_increment'
        ),
        'tstamp' => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'importtime'  => array
        (
            'label'     => &$GLOBALS['TL_LANG'][$strName]['importtime'],
            'exclude'   => true,
            'flag'      => 6,
            'inputType' => 'text',
            'eval'      => array('mandatory'=>true, 'rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'       => "varchar(10) NOT NULL default ''"
        ),
        'importhash'  => array
        (
            'label'     => &$GLOBALS['TL_LANG'][$strName]['importhash'],
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array('mandatory'=>true, 'tl_class'=>'w50'),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'importdata'  => array
        (
            'label'     => &$GLOBALS['TL_LANG'][$strName]['importdata'],
            'exclude'   => true,
            'inputType' => 'textarea',
            'eval'      => array('mandatory'=>true, 'tl_class'=>'clr'),
            'sql'       => 'text NOT NULL'
        )
    )
);

$container = \Contao\System::getContainer();

if ($container->hasParameter('composertoolbox_signature')) {
    $showSignature = $container->getParameter('composertoolbox_signature');

    if ($showSignature) {
        $GLOBALS['TL_DCA'][$strName]['list']['global_operations']['signature'] = [
            'label'      => &$GLOBALS['TL_LANG'][$strName]['signature'],
            'href'       => 'key=signature',
            'icon'       => 'editor.svg',
            'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
        ];
    }
}