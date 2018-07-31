<?php

$arrDca = &$GLOBALS['TL_DCA']['tl_settings'];

/**
 * Palette
 */
$arrDca['palettes']['default'] .= ';{companies_legend},companyMemberFields,companyChangeMandatoryMemberFields;';

/**
 * Subpalettes
 */
$arrDca['palettes']['__selector__'][]                        = 'companyChangeMandatoryMemberFields';
$arrDca['subpalettes']['companyChangeMandatoryMemberFields'] = 'companyMandatoryMemberFields';

/**
 * Fields
 */
$arrDca['fields']['companyMemberFields'] =
    [
        'label'            => &$GLOBALS['TL_LANG']['tl_settings']['companyMemberFields'],
        'exclude'          => true,
        'inputType'        => 'checkboxWizard',
        'options_callback' => ['HeimrichHannot\Companies\Companies', 'getMemberFields'],
        'eval'             => ['multiple' => true, 'tl_class' => 'w50 autoheight clr']
    ];

$arrDca['fields']['companyChangeMandatoryMemberFields'] =
    [
        'label'     => &$GLOBALS['TL_LANG']['tl_settings']['companyChangeMandatoryMemberFields'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => ['tl_class' => 'w50 autoheight', 'submitOnChange' => true]
    ];

$arrDca['fields']['companyMandatoryMemberFields'] =
    [
        'label'            => &$GLOBALS['TL_LANG']['tl_settings']['companyMandatoryMemberFields'],
        'exclude'          => true,
        'inputType'        => 'checkbox',
        'options_callback' => ['HeimrichHannot\Companies\Companies', 'getMemberFields'],
        'eval'             => ['multiple' => true, 'tl_class' => 'w50 autoheight clr']
    ];