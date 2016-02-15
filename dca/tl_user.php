<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_user'];

/**
 * Palettes
 */
foreach (array_keys($arrDca['palettes']) as $strPalette)
	$arrDca['palettes'][$strPalette] = str_replace('email', 'email,userCompanies', $arrDca['palettes'][$strPalette]);

/**
 * Fields
 */
$arrDca['fields']['userCompanies'] = array(
	'label'         => &$GLOBALS['TL_LANG']['tl_user']['userCompanies'],
	'filter'        => true,
	'exclude'       => true,
	'inputType'     => 'select',
	'foreignKey'    => 'tl_company.title',
	'relation'      => array('type'=>'belongsToMany', 'load'=>'eager'),
	'eval'          => array('tl_class' => 'w100', 'chosen' => true, 'includeBlankOption' => true, 'multiple' => true, 'style' => 'width: 100%'),
	'sql'           => "blob NULL"
);


class tl_user_companies extends \Backend {

}
