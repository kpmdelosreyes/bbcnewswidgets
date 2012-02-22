<?php
class frontPageBbcnewswidget extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		usbuilder()->init($this, $aArgs);
		
		$aList = common()->modelContents()->getData();

		$this->assign('pbs_list_limit', $aList['pbs_list_limit']);
		
	}
}
