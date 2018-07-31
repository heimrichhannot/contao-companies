<?php

$GLOBALS['TL_DCA']['tl_company_archive'] =
    [
	'config'   =>
        [
		'dataContainer'     => 'Table',
		'ctable'            => ['tl_company'],
		'enableVersioning'  => true,
		'onload_callback' =>
            [
			'setDateAdded' => ['HeimrichHannot\Haste\Dca\General', 'setDateAdded', true],
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
		'label' => [
			'fields' => ['title', 'id'],
			'label_callback' => ['tl_company_archive', 'listRecords']
        ],
		'sorting'           =>
            [
			'mode'                    => 1,
			'fields'                  => ['title'],
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
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
		'operations'        =>
            [
			'edit'   =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['edit'],
				'href'  => 'do=companies&table=tl_company',
				'icon'  => 'edit.gif'
                ],
			'editheader' =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['editheader'],
				'href'  => 'act=edit',
				'icon'  => 'header.gif'
                ],
			'copy'   =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
                ],
			'delete' =>
                [
				'label'      => &$GLOBALS['TL_LANG']['tl_company_archive']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
                ],
			'show'   =>
                [
				'label' => &$GLOBALS['TL_LANG']['tl_company_archive']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
                ],
            ]
        ],
	'palettes' => [
		'default' => 'title'
    ],
	'fields'   =>
        [
		'id' =>
            [
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
            ],
		'tstamp' =>
            [
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
		'title' =>
            [
			'label'                   => &$GLOBALS['TL_LANG']['tl_company_archive']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => ['mandatory' =>true, 'maxlength' =>255],
			'sql'                     => "varchar(255) NOT NULL default ''"
            ]
        ]
    ];


class tl_company_archive extends \Backend
{

	public static function listRecords($arrRow)
	{
		return sprintf('<div class="tl_content_left">%s</div>',
				$arrRow['title']);
	}

}
