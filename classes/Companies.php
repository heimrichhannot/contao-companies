<?php

namespace HeimrichHannot\Companies;

use HeimrichHannot\Haste\Util\Arrays;

class Companies {

	public static function getCompanyMembers()
	{
		$arrOptions = [];

		if (($objMembers = \MemberModel::findByType('company')) !== null)
		{
			$arrOptions = array_combine($objMembers->fetchEach('id'), $objMembers->fetchEach('company'));
		}

		asort($arrOptions);

		return $arrOptions;
	}

	public static function getMemberFields()
	{
		\Controller::loadDataContainer('tl_member');
		\System::loadLanguageFile('tl_member');

		$arrOptions = [];
		$arrSkipFields = ['id', 'pid', 'tstamp', 'dateAdded'];

		foreach ($GLOBALS['TL_DCA']['tl_member']['fields'] as $strName => $arrData) {
			if (!in_array($strName, $arrSkipFields))
				$arrOptions[$strName] = $GLOBALS['TL_LANG']['tl_member'][$strName][0] ?: $strName;
		}

		return $arrOptions;
	}

	public static function importMemberFields()
	{
		$arrDca = &$GLOBALS['TL_DCA']['tl_company'];

		\Controller::loadDataContainer('tl_member');
		\System::loadLanguageFile('tl_member');

		// fields
		$blnChangeMandatoryAddressFields = \Config::get('companyChangeMandatoryMemberFields');
		$arrMandatoryAddressFields = deserialize(\Config::get('companyMandatoryMemberFields'), true);
		$arrAddressFields = \Config::get('companyMemberFields');

		if ($arrAddressFields === null)
			$arrAddressFields = serialize(array_keys(static::getMemberFields()));

		$arrFields = [];
		foreach (deserialize($arrAddressFields, true) as $strName)
		{
			$strNameContact = 'contact' . ucfirst($strName);
			$arrFields[$strNameContact] = $GLOBALS['TL_DCA']['tl_member']['fields'][$strName];

			if ($blnChangeMandatoryAddressFields && is_array($arrMandatoryAddressFields))
				$arrFields[$strNameContact]['eval']['mandatory'] = in_array($strName, $arrMandatoryAddressFields);
		}

		Arrays::insertInArrayByName($arrDca['fields'], 'tstamp', $arrFields, 1);
	}
}