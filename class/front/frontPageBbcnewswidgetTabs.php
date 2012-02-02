<?php
class frontPageBbcnewswidgetTabs extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$connectDB = new modelSetup();
		$aList = $connectDB->getData();
		
		$this->importCSS('bbcnews.front.blue');
		$this->importJS('bbcnews.front');
		
				
		$this->assign('pbs_tab_1', $aList['pbs_tab_1']);
		$this->assign('pbs_tab_2', $aList['pbs_tab_2']);
		$this->assign('pbs_tab_3', $aList['pbs_tab_3']);
		
		$this->assign('event_tab_1', "frontPageDisplay.tab1();");
		$this->assign('event_tab_2', "frontPageDisplay.tab2();");
		$this->assign('event_tab_3', "frontPageDisplay.tab3();");
		
	}
	
	
		
}


