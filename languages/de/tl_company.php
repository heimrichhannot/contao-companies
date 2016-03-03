<?php

$arrLang = &$GLOBALS['TL_LANG']['tl_company'];

/**
 * Fields
 */
$arrLang['title'] = array('Titel', 'Geben Sie den Titel der Firma ein');
$arrLang['userEditors'] = array('Benutzerredakteure', 'Wählen Sie hier die Benutzer aus, die die Firma bearbeiten dürfen.');
$arrLang['memberEditors'] = array('Mitgliederredakteure', 'Wählen Sie hier die Mitglieder aus, die die Firma bearbeiten dürfen. Die Logik für die Prüfung der Berechtigung muss im Frontend durch das Modul zur Frontend-Bearbeitung (bspw. <i>heimrichhannot/contao-frontendedit</i>) umgesetzt werden.');
$arrLang['street'] = array('Straße', 'Geben Sie den Straßennamen und die Hausnummer ein.');
$arrLang['street2'] = array('Weitere Adressangaben', 'Geben Sie hier weitere Angaben zur Adresse ein.');
$arrLang['postal'] = array('Postleitzahl', 'Geben Sie hier die Postleitzahl ein.');
$arrLang['city'] = array('Ort', 'Geben Sie hier einen Ort ein.');
$arrLang['state'] = array('Bundesstaat/Bundesland', 'Bitte geben Sie den Namen des Bundesstaates/Bundeslandes ein.');
$arrLang['country'] = array('Land', 'Wählen Sie hier ein Land aus.');
$arrLang['coordinates'] = array('Koordinaten', 'Geben Sie hier die Koordinaten des Event-Orts in der Form "Latitude,Longitude" ein (ohne Anführungsstriche).');
$arrLang['published'] = array('Veröffentlichen', 'Klicken Sie hier, um die Firma zu veröffentlichen.');

/**
 * Legends
 */
$arrLang['general_legend'] = 'Allgemeines';
$arrLang['address_legend'] = 'Adresse';
$arrLang['publish_legend'] = 'Veröffentlichung';

/**
 * Buttons
 */
$arrLang['new'] = array('Neue Firma', 'Firma erstellen');
$arrLang['edit'] = array('Firma bearbeiten', 'Firma ID %s bearbeiten');
$arrLang['copy'] = array('Firma duplizieren', 'Firma ID %s duplizieren');
$arrLang['cut'] = array('Firma verschieben', 'Firma ID %s verschieben');
$arrLang['delete'] = array('Firma löschen', 'Firma ID %s löschen');
$arrLang['toggle'] = array('Firma veröffentlichen', 'Firma ID %s veröffentlichen/verstecken');
$arrLang['show'] = array('Firma-Details', 'Firma-Details ID %s anzeigen');
