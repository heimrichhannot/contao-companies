<?php

namespace HeimrichHannot\Companies;

class Companies {
	public static function getCompanyMembers()
	{
		$arrOptions = array();

		if (($objMembers = \MemberModel::findByType('company')) !== null)
		{
			$arrOptions = array_combine($objMembers->fetchEach('id'), $objMembers->fetchEach('company'));
		}

		asort($arrOptions);

		return $arrOptions;
	}
}