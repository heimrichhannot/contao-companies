<?php

$GLOBALS['TL_DCA']['tl_company_archive'] = array
(
	'config'   => array
	(
		'dataContainer'     => 'Table',
		'ctable'            => array('tl_company'),
		'enableVersioning'  => true,
		'onload_callback' => array
		(
			'setDateAdded' => array('HeimrichHannot\Haste\Dca\General', 'setDateAdded', true),
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),
	'list'     => array
	(
		'label' => array(
			'fields' => array('title', 'id'),
			'label_callback' => array('tl_company_archive', 'listRecords')
		),
		'sorting'           => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'global_operations' => array
		(
			'all'    => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();"'
			),
		),
		'operations'        => array
		(
			'edit'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['edit'],
				'href'  => 'do=companies&table=tl_company',
				'icon'  => 'edit.gif'
			),
			'editheader' => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['editheader'],
				'href'  => 'act=edit',
				'icon'  => 'header.gif'
			),
			'copy'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_company_archive']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			),
		)
	),
	'palettes' => array(
		'default' => 'title'
	),
	'fields'   => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'dateAdded' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
			'sorting'                 => true,
			'flag'                    => 6,
			'eval'                    => array('rgxp'=>'datim', 'doNotCopy' => true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company_archive']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		)
	)
);


class tl_company_archive extends \Backend
{

	public static function listRecords($arrRow)
	{
		return sprintf('<div class="tl_content_left">%s</div>',
				$arrRow['title']);
	}

}
