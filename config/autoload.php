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
ClassLoader::addNamespaces(array
(
	'HeimrichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'HeimrichHannot\Companies\Companies'           => 'system/modules/companies/classes/Companies.php',

	// Models
	'HeimrichHannot\Companies\CompanyArchiveModel' => 'system/modules/companies/models/CompanyArchiveModel.php',
	'HeimrichHannot\Companies\CompanyModel'        => 'system/modules/companies/models/CompanyModel.php',
));
