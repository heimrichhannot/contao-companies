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
		if (($objActivities = static::getActivities($intCompany)) !== null)
		{
			$strResult = '';

			while ($objActivities->next())
			{
				$objTemplate = new \FrontendTemplate('company_activity_default');
				$objTemplate->setData($objActivities->row());

				$strResult .= $objTemplate->parse();
			}
		}
	}

}