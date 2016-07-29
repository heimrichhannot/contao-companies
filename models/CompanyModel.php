<?php

namespace HeimrichHannot\Companies;

class CompanyModel extends \Model
{

	protected static $strTable = 'tl_company';

	public static function getActivities($intCompany)
	{
		return ActivityModel::findByPid($intCompany);
	}

	public static function getParsedActivities($intCompany)
	{
		$strResult = '';
		\Controller::loadDataContainer('tl_company_activity');
		\System::loadLanguageFile('tl_company_activity');

		if (($objActivities = static::getActivities($intCompany)) !== null)
		{
			while ($objActivities->next())
			{
				$objTemplate = new \FrontendTemplate('company_activity_default');
				$objTemplate->setData($objActivities->row());

				$strResult .= $objTemplate->parse();
			}
		}

		return $strResult;
	}

}