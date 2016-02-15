<?php

/**
* Backend modules
*/
$GLOBALS['BE_MOD']['accounts']['companies'] = array(
	'tables' => array('tl_company_archive', 'tl_company'),
	'icon'   => 'system/modules/companies/assets/img/icon.png'
);

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_company_archive'] = '\HeimichHannot\Companies\CompanyArchiveModel';
$GLOBALS['TL_MODELS']['tl_company'] = '\HeimichHannot\Companies\CompanyModel';