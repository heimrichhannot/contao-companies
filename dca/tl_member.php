<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_member'];

/**
 * Palettes
 */
$arrDca['palettes']['default'] = str_replace('{address_legend:hide}', '{address_legend:hide},memberCompanies', $arrDca['palettes']['default']);

/**
 * Fields
 */
$arrDca['fields']['memberCompanies'] = [
	'label'         => &$GLOBALS['TL_LANG']['tl_member']['memberCompanies'],
	'filter'        => true,
	'exclude'       => true,
	'inputType'     => 'select',
	'foreignKey'    => 'tl_company.title',
	'relation'      => ['type' =>'belongsToMany', 'load' =>'eager'],
	'eval'          => ['tl_class' => 'w100', 'chosen' => true, 'includeBlankOption' => true, 'multiple' => true, 'style' => 'width: 100%'],
	'sql'           => "blob NULL"
];


class tl_member_companies extends \Backend {

}
