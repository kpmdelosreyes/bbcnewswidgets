<?php
class frontPageBbcnewswidget extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$connectDB = new modelSetup();
		$aList = $connectDB->getData();

		$this->assign('pbs_list_limit', $aList['pbs_list_limit']);
		
	}
}
