<?php

$GLOBALS['TL_DCA']['tl_company'] = array
(
	'config'   => array
	(
		'dataContainer'     => 'Table',
		'ptable'            => 'tl_company_archive',
		'enableVersioning'  => true,
		'onsubmit_callback' => array
		(
			'setDateAdded' => array('HeimrichHannot\Haste\Dca\General', 'setDateAdded'),
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
		'onload_callback'  => array(array('tl_company', 'initPalette')),
	),
	'list'     => array
	(
		'label' => array(
			'fields' => array('title', 'id')
		),
		'sorting'           => array
		(
			'mode'                  => 1,
			'fields'                => array('title'),
			'flag'                  => 1,
			'panelLayout'           => 'filter;search,limit'
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
				'label' => &$GLOBALS['TL_LANG']['tl_company']['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'copy'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
			),
			'cut' => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company']['cut'],
				'href'  => 'act=paste&amp;mode=cut',
				'icon'  => 'cut.gif'
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_company']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'toggle' => array
			(
				'label'           => &$GLOBALS['TL_LANG']['tl_company']['toggle'],
				'icon'            => 'visible.gif',
				'attributes'      => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback' => array('tl_company', 'toggleIcon')
			),
			'show'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_company']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			),
		)
	),
	'palettes' => array(
		'default' => '{general_legend},title,userEditors,memberEditors,userContacts,useMemberContacts,memberContacts;{address_legend},street,street2,postal,city,state,country,coordinates,phone,fax,email,website;{publish_legend},published;'
	),
	'fields'   => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_company_archive.title',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
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
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50', 'doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class' => 'w50', 'mandatory' => true),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'memberEditors' => array
		(
			'label'   => &$GLOBALS['TL_LANG']['tl_company']['memberEditors'],
			'inputType' => 'select',
			'options_callback' => array('HeimrichHannot\Haste\Dca\General', 'getMembersAsOptions'),
			'eval'    => array('multiple' => true, 'chosen' => true, 'tl_class' => 'w50'),
			'sql'     => "blob NULL"
		),
		'userEditors' => array
		(
			'label'   => &$GLOBALS['TL_LANG']['tl_company']['userEditors'],
			'inputType' => 'select',
			'options_callback' => array('HeimrichHannot\Haste\Dca\General', 'getUsersAsOptions'),
			'eval'    => array('multiple' => true, 'chosen' => true, 'tl_class' => 'w50 clr'),
			'sql'     => "blob NULL"
		),
		'useMemberContacts' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['useMemberContacts'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 clr', 'submitOnChange' => true),
			'sql'                     => "char(1) NOT NULL default '0'"
		),
		'memberContacts' => array
		(
			'label'   => &$GLOBALS['TL_LANG']['tl_company']['memberContacts'],
			'inputType' => 'select',
			'options_callback' => array('HeimrichHannot\Haste\Dca\General', 'getMembersAsOptions'),
			'eval'    => array('multiple' => true, 'chosen' => true, 'tl_class' => 'w50'),
			'sql'     => "blob NULL"
		),
		'userContacts' => array
		(
			'label'   => &$GLOBALS['TL_LANG']['tl_company']['userContacts'],
			'inputType' => 'select',
			'options_callback' => array('HeimrichHannot\Haste\Dca\General', 'getUsersAsOptions'),
			'eval'    => array('multiple' => true, 'chosen' => true, 'tl_class' => 'w50 clr'),
			'sql'     => "blob NULL"
		),
		'street' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['street'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'street2' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['street2'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'postal' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['postal'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'city' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['city'],
			'exclude'   => true,
			'search'    => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'state' => array(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['state'],
			'exclude'   => true,
			'filter'    => true,
			'sorting'   => true,
			'inputType' => 'text',
			'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'country' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['country'],
			'exclude'   => true,
			'filter'    => true,
			'sorting'   => true,
			'inputType' => 'select',
			'options'   => System::getCountries(),
			'eval'      => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50', 'submitOnChange' => true),
			'sql'       => "varchar(2) NOT NULL default ''"
		),
		'coordinates' => array
		(
			'label'     => &$GLOBALS['TL_LANG']['tl_company']['coordinates'],
			'exclude'   => true,
			'inputType' => 'text',
			'save_callback' => array(
				array('HeimrichHannot\Haste\Dca\General', 'setCoordinatesForDc')
			),
			'eval'      => array('maxlength' => 255, 'tl_class' => 'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'phone' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['phone'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'rgxp'=>'phone', 'decodeEntities'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'fax' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['fax'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>64, 'rgxp'=>'phone', 'decodeEntities'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'email' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['email'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'rgxp'=>'email', 'decodeEntities'=>true, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'website' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_company']['website'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'url', 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
	)
);

// if not set, all fields are used
\HeimrichHannot\Companies\Companies::importMemberFields();


class tl_company extends \Backend
{
	public static function initPalette()
	{
		$objCompany = \HeimrichHannot\Companies\CompanyModel::findByPk(\Input::get('id'));
		$arrDca = &$GLOBALS['TL_DCA']['tl_company'];

		switch ($objCompany->country)
		{
			case 'de':
				$arrDca['fields']['state']['inputType'] = 'select';
				$arrDca['fields']['state']['eval']['includeBlankOption'] = true;
				$arrDca['fields']['state']['options'] = $GLOBALS['TL_LANG']['COUNTIES'][$objCompany->country];

				asort($arrDca['fields']['state']['options']);
				break;
			default:
				break;
		}

		if (!$objCompany->useMemberContacts)
		{
			$arrDca['palettes']['default'] = str_replace('memberContacts,', '', $arrDca['palettes']['default']);
		}
		else
		{
			$arrDca['palettes']['default'] = preg_replace('@contact[^,]*,@', '', $arrDca['palettes']['default']);
		}
	}

	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$objUser = \BackendUser::getInstance();

		if (strlen(Input::get('tid')))
		{
			$this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1));
			\Controller::redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$objUser->isAdmin && !$objUser->hasAccess('tl_company::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label).'</a> ';
	}

	public function toggleVisibility($intId, $blnVisible)
	{
		$objUser = \BackendUser::getInstance();
		$objDatabase = \Database::getInstance();

		// Check permissions to publish
		if (!$objUser->isAdmin && !$objUser->hasAccess('tl_company::published', 'alexf'))
		{
			\Controller::log('Not enough permissions to publish/unpublish item ID "'.$intId.'"', 'tl_company toggleVisibility', TL_ERROR);
			\Controller::redirect('contao/main.php?act=error');
		}

		$objVersions = new Versions('tl_company', $intId);
		$objVersions->initialize();

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_company']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_company']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$objDatabase->prepare("UPDATE tl_company SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
				->execute($intId);

		$objVersions->create();
		\Controller::log('A new version of record "tl_company.id='.$intId.'" has been created'.$this->getParentEntries('tl_company', $intId), 'tl_company toggleVisibility()', TL_GENERAL);
	}

}
