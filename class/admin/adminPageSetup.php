<?php
class adminPageSetup extends Controller_Admin
{
	
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$sFormScript = usbuilder()->getFormAction('bbcnewswidgets_save','adminExecSaveSetup');
		$this->writeJs($sFormScript);
		
		usbuilder()->validator(array('form' => 'bbcnewswidgets_save'));
		$this->category();
		
		$this->importJS('bbcnews.admin');
		$this->importCSS('default');
		
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