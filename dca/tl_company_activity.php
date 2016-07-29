<?php

$GLOBALS['TL_DCA']['tl_company_activity'] = array
(
	'config'   => array
	(
		'dataContainer'     => 'Table',
		'ptable'            => 'tl_company',
		'enableVersioning'  => true,
		'onsubmit_callback' => array
		(
			array('HeimrichHannot\Haste\Dca\General', 'setDateAdded'),
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
		'label' => array
		(
			'fields' => array('id'),
			'format' => '%s'
		),
		'sorting'           => array
		(
			'mode'                  => 0,
			'fields'                => array('dateAdded'),
			'panelLayout'           => 'filter;search,limit'
		),
		'global_operations' => array
		(
		),
		'operations' => array
		(
			'edit'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_activity']['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'copy'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_activity']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_company_activity']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company_activity']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			),
		)
	),
	'palettes' => array(
		'__selector__' => array(),
		'default' => 'type,medium,partners,dateTime,description,duration'
	),
	'fields'   => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_company.title',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company_activity']['tstamp'],
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
		'type' => array(
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['type'],
			'exclude'   => true,
			'filter'    => true,
			'inputType' => 'select',
			'options'   => array('acquisition', 'customerCare', 'maintenance', 'other'),
			'reference' => &$GLOBALS['TL_LANG']['tl_company_activity']['typeOptions'],
			'eval'      => array('mandatory' => true, 'tl_class' => 'w50'),
			'sql'       => "varchar(16) NOT NULL default ''"
		),
		'medium' => array(
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['medium'],
			'exclude'   => true,
			'filter'    => true,
			'inputType' => 'select',
			'options'   => array('email', 'phone', 'web', 'conversation'),
			'reference' => &$GLOBALS['TL_LANG']['tl_company_activity']['mediumOptions'],
			'eval'      => array('mandatory' => true, 'tl_class' => 'w50'),
			'sql'       => "varchar(16) NOT NULL default ''"
		),
		'dateTime' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['dateTime'],
			'default'   => time(),
			'exclude'   => true,
			'filter'    => true,
			'sorting'   => true,
			'flag'      => 8,
			'inputType' => 'text',
			'eval'      => array('rgxp'     => 'datim', 'doNotCopy' => true, 'datepicker' => true,
								 'mandatory' => true, 'tl_class' => 'w50 wizard'
			),
			'sql'       => "int(10) unsigned NOT NULL default '0'"
		),
		'duration' => array(
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['duration'],
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('rgxp' => 'digit', 'mandatory' => true, 'tl_class' => 'w50'),
			'sql'       => "int(10) unsigned NOT NULL default '0'"
		),
		'partners' => array(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company_activity']['partners'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'description' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['description'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'textarea',
			'eval'      => array('tl_class' => 'clr'),
			'sql'       => "text NULL"
		),
	)
);


class tl_company_activity extends \Backend
{

}
