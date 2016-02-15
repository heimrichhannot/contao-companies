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
	'HeimichHannot',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'HeimichHannot\CalendarRooms\CalendarRoomArchiveModel' => 'system/modules/calendar_rooms/models/CalendarRoomArchiveModel.php',
	'HeimichHannot\CalendarRooms\CalendarRoomModel'        => 'system/modules/calendar_rooms/models/CalendarRoomModel.php',
));
