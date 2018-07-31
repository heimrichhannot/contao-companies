<?php

$GLOBALS['TL_DCA']['tl_company'] = [
    'config'      => [
        'dataContainer'    => 'Table',
        'ptable'           => 'tl_company_archive',
        'enableVersioning' => true,
        'sql'              => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
        'onload_callback'  => [
            ['tl_company', 'initPalette'],
            ['HeimrichHannot\Haste\Dca\General', 'setDateAdded', true]
        ],
    ],
    'list'        => [
        'label'             => [
            'fields' => ['title', 'id']
        ],
        'sorting'           => [
            'mode'        => 1,
            'fields'      => ['title'],
            'flag'        => 1,
            'panelLayout' => 'filter;search,limit'
        ],
        'global_operations' => [
            'all' => [
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();"'
            ],
        ],
        'operations'        => [
            'edit'       => [
                'label' => &$GLOBALS['TL_LANG']['tl_company']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ],
            'copy'       => [
                'label' => &$GLOBALS['TL_LANG']['tl_company']['copy'],
                'href'  => 'act=copy',
                'icon'  => 'copy.gif'
            ],
            'cut'        => [
                'label' => &$GLOBALS['TL_LANG']['tl_company']['cut'],
                'href'  => 'act=paste&amp;mode=cut',
                'icon'  => 'cut.gif'
            ],
            'delete'     => [
                'label'      => &$GLOBALS['TL_LANG']['tl_company']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ],
            'activities' => [
                'label' => &$GLOBALS['TL_LANG']['tl_company']['activities'],
                'href'  => 'do=companies&table=tl_company_activity',
                'icon'  => '/system/modules/companies/assets/img/icon_activities.png'
            ],
            'toggle'     => [
                'label'           => &$GLOBALS['TL_LANG']['tl_company']['toggle'],
                'icon'            => 'visible.gif',
                'attributes'      => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback' => ['tl_company', 'toggleIcon']
            ],
            'show'       => [
                'label' => &$GLOBALS['TL_LANG']['tl_company']['show'],
                'href'  => 'act=show',
                'icon'  => 'show.gif'
            ],
        ]
    ],
    'palettes'    => [
        '__selector__' => ['addLogo', 'addContacts', 'addMemberContacts', 'addMemberContacts'],
        'default'      => '{general_legend},title,addLogo;{editor_legend},userEditors,memberEditors;{address_legend},street,street2,postal,city,state,country,coordinates,phone,fax,email,website;{contact_legend},addContacts,addUserContacts,addMemberContacts;{publish_legend},published;'
    ],
    'subpalettes' => [
        'addLogo'           => 'logo',
        'addContacts'       => '',
        'addMemberContacts' => 'memberContacts',
        'addUserContacts'   => 'userContacts'
    ],
    'fields'      => [
        'id'                => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'pid'               => [
            'foreignKey' => 'tl_company_archive.title',
            'sql'        => "int(10) unsigned NOT NULL default '0'",
            'relation'   => ['type' => 'belongsTo', 'load' => 'eager']
        ],
        'tstamp'            => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'dateAdded'         => [
            'label'   => &$GLOBALS['TL_LANG']['MSC']['dateAdded'],
            'sorting' => true,
            'flag'    => 6,
            'eval'    => ['rgxp' => 'datim', 'doNotCopy' => true],
            'sql'     => "int(10) unsigned NOT NULL default '0'"
        ],
        'published'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['published'],
            'exclude'   => true,
            'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50', 'doNotCopy' => true],
            'sql'       => "char(1) NOT NULL default '0'"
        ],
        'title'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['title'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50', 'mandatory' => true],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'addLogo'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['addLogo'],
            'exclude'   => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50', 'submitOnChange' => true],
            'sql'       => "char(1) NOT NULL default ''"
        ],
        'logo'              => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['logo'],
            'exclude'   => true,
            'inputType' => 'fileTree',
            'eval'      => ['fieldType' => 'radio', 'filesOnly' => true, 'extensions' => Config::get('validImageTypes'), 'mandatory' => true],
            'sql'       => "binary(16) NULL"
        ],
        'memberEditors'     => [
            'label'            => &$GLOBALS['TL_LANG']['tl_company']['memberEditors'],
            'inputType'        => 'select',
            'options_callback' => ['HeimrichHannot\Haste\Dca\General', 'getMembersAsOptions'],
            'eval'             => ['multiple' => true, 'chosen' => true, 'tl_class' => 'w50'],
            'sql'              => "blob NULL"
        ],
        'userEditors'       => [
            'label'            => &$GLOBALS['TL_LANG']['tl_company']['userEditors'],
            'inputType'        => 'select',
            'options_callback' => ['HeimrichHannot\Haste\Dca\General', 'getUsersAsOptions'],
            'eval'             => ['multiple' => true, 'chosen' => true, 'tl_class' => 'w50 clr'],
            'sql'              => "blob NULL"
        ],
        'addContacts'       => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['addContacts'],
            'exclude'   => true,
            'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50 clr', 'submitOnChange' => true],
            'sql'       => "char(1) NOT NULL default ''"
        ],
        'addMemberContacts' => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['addMemberContacts'],
            'exclude'   => true,
            'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50 clr', 'submitOnChange' => true],
            'sql'       => "char(1) NOT NULL default ''"
        ],
        'memberContacts'    => [
            'label'            => &$GLOBALS['TL_LANG']['tl_company']['memberContacts'],
            'inputType'        => 'select',
            'options_callback' => ['HeimrichHannot\Haste\Dca\General', 'getMembersAsOptions'],
            'eval'             => ['multiple' => true, 'chosen' => true, 'tl_class' => 'w50', 'mandatory' => true],
            'sql'              => "blob NULL"
        ],
        'addUserContacts'   => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['addUserContacts'],
            'exclude'   => true,
            'filter'    => true,
            'inputType' => 'checkbox',
            'eval'      => ['tl_class' => 'w50 clr', 'submitOnChange' => true],
            'sql'       => "char(1) NOT NULL default ''"
        ],
        'userContacts'      => [
            'label'            => &$GLOBALS['TL_LANG']['tl_company']['userContacts'],
            'inputType'        => 'select',
            'options_callback' => ['HeimrichHannot\Haste\Dca\General', 'getUsersAsOptions'],
            'eval'             => ['multiple' => true, 'chosen' => true, 'tl_class' => 'w50 clr', 'mandatory' => true],
            'sql'              => "blob NULL"
        ],
        'street'            => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['street'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'street2'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['street2'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'postal'            => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['postal'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'city'              => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['city'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'state'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['state'],
            'exclude'   => true,
            'filter'    => true,
            'sorting'   => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'country'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['country'],
            'exclude'   => true,
            'filter'    => true,
            'sorting'   => true,
            'inputType' => 'select',
            'options'   => System::getCountries(),
            'eval'      => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50', 'submitOnChange' => true],
            'sql'       => "varchar(2) NOT NULL default ''"
        ],
        'coordinates'       => [
            'label'         => &$GLOBALS['TL_LANG']['tl_company']['coordinates'],
            'exclude'       => true,
            'inputType'     => 'text',
            'save_callback' => [
                ['HeimrichHannot\Haste\Dca\General', 'setCoordinatesForDc']
            ],
            'eval'          => ['maxlength' => 255, 'tl_class' => 'w50'],
            'sql'           => "varchar(255) NOT NULL default ''"
        ],
        'phone'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['phone'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 64, 'rgxp' => 'phone', 'decodeEntities' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(64) NOT NULL default ''"
        ],
        'fax'               => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['fax'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 64, 'rgxp' => 'phone', 'decodeEntities' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(64) NOT NULL default ''"
        ],
        'email'             => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['email'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['maxlength' => 255, 'rgxp' => 'email', 'decodeEntities' => true, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'website'           => [
            'label'     => &$GLOBALS['TL_LANG']['tl_company']['website'],
            'exclude'   => true,
            'search'    => true,
            'inputType' => 'text',
            'eval'      => ['rgxp' => 'url', 'maxlength' => 255, 'tl_class' => 'w50'],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
    ]
];

// if not set, all fields are used
\HeimrichHannot\Companies\Companies::importMemberFields();


class tl_company extends \Backend
{
    public static function initPalette()
    {
        $objCompany = \HeimrichHannot\Companies\CompanyModel::findByPk(\Input::get('id'));
        $arrDca     = &$GLOBALS['TL_DCA']['tl_company'];

        switch ($objCompany->country) {
            case 'de':
                $arrDca['fields']['state']['inputType']                  = 'select';
                $arrDca['fields']['state']['eval']['includeBlankOption'] = true;
                $arrDca['fields']['state']['options']                    = $GLOBALS['TL_LANG']['COUNTIES'][$objCompany->country];

                asort($arrDca['fields']['state']['options']);
                break;
            default:
                break;
        }
    }

    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        $objUser = \BackendUser::getInstance();

        if (strlen(Input::get('tid'))) {
            $this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1));
            \Controller::redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$objUser->isAdmin && !$objUser->hasAccess('tl_company::published', 'alexf')) {
            return '';
        }

        $href .= '&amp;tid=' . $row['id'] . '&amp;state=' . ($row['published'] ? '' : 1);

        if (!$row['published']) {
            $icon = 'invisible.gif';
        }

        return '<a href="' . $this->addToUrl($href) . '" title="' . specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . '</a> ';
    }

    public function toggleVisibility($intId, $blnVisible)
    {
        $objUser     = \BackendUser::getInstance();
        $objDatabase = \Database::getInstance();

        // Check permissions to publish
        if (!$objUser->isAdmin && !$objUser->hasAccess('tl_company::published', 'alexf')) {
            \Controller::log('Not enough permissions to publish/unpublish item ID "' . $intId . '"', 'tl_company toggleVisibility', TL_ERROR);
            \Controller::redirect('contao/main.php?act=error');
        }

        $objVersions = new Versions('tl_company', $intId);
        $objVersions->initialize();

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_company']['fields']['published']['save_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_company']['fields']['published']['save_callback'] as $callback) {
                $this->import($callback[0]);
                $blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
            }
        }

        // Update the database
        $objDatabase->prepare("UPDATE tl_company SET tstamp=" . time() . ", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
            ->execute($intId);

        $objVersions->create();
        \Controller::log('A new version of record "tl_company.id=' . $intId . '" has been created' . $this->getParentEntries('tl_company', $intId), 'tl_company toggleVisibility()', TL_GENERAL);
    }

}
