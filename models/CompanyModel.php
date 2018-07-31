<?php

namespace HeimrichHannot\Companies;

class CompanyModel extends \Model
{

	protected static $strTable = 'tl_company';

	public static function getActivities($intCompany)
	{
		return ActivityModel::findBy(['tl_company_activity.pid=?', 'tl_company_activity.tstamp>0'], [$intCompany], [
			'order' => 'tl_company_activity.dateTime DESC'
        ]);
	}

	public static function getParsedActivities($intCompany, \Module $objModule = null)
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
				$objTemplate->module = $objModule;

				$strResult .= $objTemplate->parse();
			}
		}

		return $strResult;
	}

}