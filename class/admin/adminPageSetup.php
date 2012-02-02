<?php
class adminPageSetup extends Controller_Admin
{
	
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$sFormScript = usbuilder()->getFormAction('bbcnewswidget_save','adminExecSaveSetup');
		$this->writeJs($sFormScript);
		
		usbuilder()->validator(array('form' => 'bbcnewswidget_save'));
		$this->category();
		
		$this->importJS('bbcnews.admin');
		$this->importCSS('bbcnews.admin');
		
	    $this->View(__CLASS__);
		
	}
	
	public function category()
	{
		require_once 'util/feed.php';
		$feedContents = new BbcnewsUtilFeed();
		$oFeed = $feedContents->catList();
		
		$this->assign("category" , $oFeed);
	}
	
	
	
	
}