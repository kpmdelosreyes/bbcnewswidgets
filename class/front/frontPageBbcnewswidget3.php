<?php
class frontPageBbcnewswidget3 extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$connectDB = new modelSetup();
		$aList = $connectDB->getData();

		$aData = $this->rssContent($aList['pbs_tab_3']);
		$i = 1;
	    $aData1 = array();
		foreach($aData as $key)
		{

			if($i <= $aList['pbs_list_limit'])
			{
				 $aData1[] = array(
                    'title' => $key['title'],
                    'description' => $key['description'],
                    'date' => $key['date'],
                    'link' => $key['link'],
			 		'thumbnail' => $key['thumbnail']
                 );
			}
			$i++;
		}
	
		$this->loopFetch($aData1);
		
	}
	
	public function rssContent($sCat)
	{
		require_once 'util/feed.php';
		$getCurl = new BbcnewsUtilFeed();
		$aCategory = $getCurl->category();
	
		foreach($aCategory as $key=>$val) {
			$_iKey = array_search($sCat, $val);

			if($_iKey) $iKey = $key;
		}

		$sLink = $aCategory[$iKey]['link'];
		
		$aNews = $getCurl->parseRss($sLink);
		
		return $aNews;
		
	} 
	
		
}

