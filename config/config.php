<?php

/**
* Backend modules
*/
$GLOBALS['BE_MOD']['accounts']['companies'] = array(
	'tables' => array('tl_company_archive', 'tl_company', 'tl_company_activity'),
	'icon'   => 'system/modules/companies/assets/img/icon.png'
);

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_company_archive'] = '\HeimrichHannot\Companies\CompanyArchiveModel';
$GLOBALS['TL_MODELS']['tl_company'] = '\HeimrichHannot\Companies\CompanyModel';
$GLOBALS['TL_MODELS']['tl_company_activity'] = '\HeimrichHannot\Companies\ActivityModel';