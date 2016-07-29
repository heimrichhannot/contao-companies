<?php

$arrLang = &$GLOBALS['TL_LANG']['tl_company_activity'];

/**
 * Fields
 */
$arrLang['tstamp'] = array('Änderungsdatum', '');
$arrLang['type'] = array('Typ', 'Wählen Sie hier den Typ der Aktivität aus.');
$arrLang['typeOptions'] = array(
	'acquisition' => 'Akquise',
	'customerCare' => 'Kundenpflege',
	'maintenance' => 'Wartung & Service',
	'other' => 'Sonstiges'
);
$arrLang['medium'] = array('Kommunikationsmittel', 'Wählen Sie hier die Art der Kommunikation aus.');
$arrLang['mediumOptions'] = array(
	'email' => 'E-Mail',
	'phone' => 'Telefon',
	'web' => 'Web',
	'conversation' => 'Persönliches Gespräch'
);
$arrLang['partners'] = array('Gesprächspartner', 'Geben Sie hier die Namen der Gesprächspartner ein.');
$arrLang['dateTime'] = array('Zeitpunkt', 'Wählen Sie hier aus, wann die Aktivität stattgefunden hat.');
$arrLang['duration'] = array('Dauer (in Minuten)', 'Geben Sie hier die Dauer der Aktivität an.');
$arrLang['description'] = array('Beschreibung', 'Beschreiben Sie hier den Inhalt der Aktivität.');

/**
 * Legends
 */


/**
 * Buttons
 */
$arrLang['new'] = array('Neue Aktivität', 'Aktivität erstellen');
$arrLang['edit'] = array('Aktivität bearbeiten', 'Aktivität ID %s bearbeiten');
$arrLang['copy'] = array('Aktivität duplizieren', 'Aktivität ID %s duplizieren');
$arrLang['delete'] = array('Aktivität löschen', 'Aktivität ID %s löschen');
$arrLang['show'] = array('Aktivitätendetails', 'Aktivitätendetails ID %s anzeigen');
