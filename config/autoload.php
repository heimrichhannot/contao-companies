<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(
    [
	'HeimrichHannot',
    ]);


/**
 * Register the classes
 */
ClassLoader::addClasses(
    [
	// Models
	'HeimrichHannot\Companies\ActivityModel'       => 'system/modules/companies/models/ActivityModel.php',
	'HeimrichHannot\Companies\CompanyArchiveModel' => 'system/modules/companies/models/CompanyArchiveModel.php',
	'HeimrichHannot\Companies\CompanyModel'        => 'system/modules/companies/models/CompanyModel.php',

	// Classes
	'HeimrichHannot\Companies\Companies'           => 'system/modules/companies/classes/Companies.php',
    ]);


/**
 * Register the templates
 */
TemplateLoader::addFiles(
    [
	'company_activity_default' => 'system/modules/companies/templates',
    ]);
