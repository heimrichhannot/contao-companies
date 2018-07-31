<?php

$GLOBALS['TL_DCA']['tl_company_activity'] =
    [
	'config'   =>
        [
		'dataContainer'     => 'Table',
		'ptable'            => 'tl_company',
		'enableVersioning'  => true,
		'onload_callback' =>
            [
			['HeimrichHannot\Haste\Dca\General', 'setDateAdded', true],
            ],
		'sql' =>
            [
			'keys' =>
                [
				'id' => 'primary'
                ]
            ]
        ],
	'list'     =>
        [
		'label' =>
            [
			'fields' => ['type', 'dateAdded'],
			'format' => '%s (%s)'
            ],
		'sorting'           =>
            [
			'mode'                  => 1,
			'fields'                => ['dateAdded'],
			'panelLayout'           => 'filter;search,limit'
            ],
		'global_operations' =>
            [
			'all'    =>
                [
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();"'
                ],
            ],
		'operations' =>
            [
			'edit'   =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_activity']['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
                ],
			'copy'   =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_activity']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
                ],
			'delete' =>
                [
				'label'      => &$GLOBALS['TL_LANG']['tl_company_activity']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
                ],
			'show'   =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_activity']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
                ],
            ]
        ],
	'palettes' => [
		'__selector__' => [],
		'default' => 'dateTime,type,medium,partners,description,duration'
    ],
	'fields'   =>
        [
		'id' =>
            [
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
            ],
		'pid' =>
            [
			'foreignKey'              => 'tl_company.title',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => ['type' =>'belongsTo', 'load' =>'eager']
            ],
		'tstamp' =>
            [
			'label'                   => &$GLOBALS['TL_LANG']['tl_company_activity']['tstamp'],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
            ],
		'dateAdded' =>
            [
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
			'sorting'                 => true,
			'flag'                    => 6,
			'eval'                    => ['rgxp' =>'datim', 'doNotCopy' => true],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
            ],
		'dateTime' =>
            [
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['dateTime'],
			'default'   => time(),
			'exclude'   => true,
			'filter'    => true,
			'sorting'   => true,
			'flag'      => 8,
			'inputType' => 'text',
			'eval'      => [
                'rgxp'      => 'datim', 'doNotCopy' => true,
                'mandatory' => true, 'tl_class' => 'w50 wizard'
            ],
			'sql'       => "int(10) unsigned NOT NULL default '0'"
            ],
		'type' => [
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['type'],
			'exclude'   => true,
			'filter'    => true,
			'inputType' => 'select',
			'options'   => ['acquisition', 'customerCare', 'maintenance', 'other'],
			'reference' => &$GLOBALS['TL_LANG']['tl_company_activity']['typeOptions'],
			'eval'      => ['mandatory' => true, 'tl_class' => 'w50 clr'],
			'sql'       => "varchar(16) NOT NULL default ''"
        ],
		'medium' => [
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['medium'],
			'exclude'   => true,
			'filter'    => true,
			'inputType' => 'select',
			'options'   => ['email', 'phone', 'web', 'conversation'],
			'reference' => &$GLOBALS['TL_LANG']['tl_company_activity']['mediumOptions'],
			'eval'      => ['mandatory' => true, 'tl_class' => 'w50'],
			'sql'       => "varchar(16) NOT NULL default ''"
        ],
		'duration' => [
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['duration'],
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['rgxp' => 'digit', 'mandatory' => true, 'tl_class' => 'w50'],
			'sql'       => "int(10) unsigned NOT NULL default '0'"
        ],
		'partners' => [
			'label'                   => &$GLOBALS['TL_LANG']['tl_company_activity']['partners'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => ['maxlength' => 255, 'tl_class' => 'w50'],
			'sql'                     => "varchar(255) NOT NULL default ''"
        ],
		'description' =>
            [
			'label'     => &$GLOBALS['TL_LANG']['tl_company_activity']['description'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'textarea',
			'eval'      => ['tl_class' => 'clr'],
			'sql'       => "text NULL"
            ],
        ]
    ];


class tl_company_activity extends \Backend
{

}
