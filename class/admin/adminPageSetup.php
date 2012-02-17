<?php
class adminPageSetup extends Controller_Admin
{
	
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
			
		usbuilder()->getFormAction('bbcnewswidget_save','adminExecSaveSetup');
				
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