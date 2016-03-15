<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_settings'];

/**
 * Palette
 */
$arrDca['palettes']['default'] .= ';{companies_legend},companyMemberFields,companyChangeMandatoryMemberFields;';

/**
 * Subpalettes
 */
$arrDca['palettes']['__selector__'][] = 'companyChangeMandatoryMemberFields';
$arrDca['subpalettes']['companyChangeMandatoryMemberFields'] = 'companyMandatoryMemberFields';

/**
 * Fields
 */
$arrDca['fields']['companyMemberFields'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['companyMemberFields'],
	'exclude'                 => true,
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('HeimrichHannot\Companies\Companies', 'getMemberFields'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 clr')
);

$arrDca['fields']['companyChangeMandatoryMemberFields'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['companyChangeMandatoryMemberFields'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class' => 'w50', 'submitOnChange' => true)
);

$arrDca['fields']['companyMandatoryMemberFields'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['companyMandatoryMemberFields'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('HeimrichHannot\Companies\Companies', 'getMemberFields'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 clr')
);