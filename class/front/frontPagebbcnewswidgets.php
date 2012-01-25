<?php
class frontPagebbcnewswidget extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$connectDB = new modelSetup();
		$aList = $connectDB->getData();
		
		$_aOrder = array();
		foreach($aList as $key)
		{
			$_aOrder[] = array("tab1" => $key['pbs_tab_1'],
							   "tab2" => $key['pbs_tab_2'],
							   "tab3" => $key['pbs_tab_3'],
							   "limit" => $key['pbs_list_limit']
							  );
		}
		
		$aOrder = array();
		foreach($_aOrder as $key => $val) {
			$sClass = $key == 0 ? "on" : "off";
			$sText = $val == "Sci-Environment" ? "Sci-Enviro" : $val;
			
			$aOrder[] = array(
					'class' => $sClass,
					'label' => $val,
					'text' => $sText
			);
		}
	 	
		$aData = $this->rssContent($aOrder[0]['label']['tab1']);
		
		$sHtml .= '
					<div id="pg_bbcnews_holder" >
		                 <ul class="pg_bbcnews_nav">';
		
							foreach($aOrder as $key){
							$sHtml .= '<li><a href="#" onclick="frontPageDisplay.getNews(\''.$key['label']['tab1'].'\')" id="pg_bbcnews_tab_'.$key['label']['tab1'].'" class="'.$key['class'].'"><span>'.$key['text']['tab1'].'</span></a></li>
									   <li><a href="#" onclick="frontPageDisplay.getNews(\''.$key['label']['tab2'].'\')" id="pg_bbcnews_tab_'.$key['label']['tab2'].'" class="'.$key['class'].'"><span>'.$key['text']['tab2'].'</span></a></li>
									   <li><a href="#" onclick="frontPageDisplay.getNews(\''.$key['label']['tab3'].'\')" id="pg_bbcnews_tab_'.$key['label']['tab3'].'" class="'.$key['class'].'"><span>'.$key['text']['tab3'].'</span></a></li>';
																	
							}									
							$sHtml .= '</ul><div class="pg_bbcnews_content_wrap"><ul class="pg_contentnews">';
							$count = 1;
							foreach($aData as $key){
									$sHtml .= '<li><p class="pg_title"><a href="'.$key['link'].'" target="_blank">'.$key['title'].'</a></p>
												<p class="pg_content">
												<a href="'.$key['link'].'" target="_blank" class="pg_bbcnews_image"><img src="'.$key['thumbnail'].'" alt="Image" class="pg_news_img" /></a>
											
												<span class="bbc_news_datepost">'.$key['date'].'</span><br />
												<span>'.$key['description'].'</span><br />
												<a href="'.$key['link'].'" class="pg_more"  target="_blank">more</a>										
											
												</p>
												</li>';
							if($count >= $aOrder[0]['label']['limit'])
								break;
							else
								$count++;			
							
							}
		$sHtml .= '</ul></div></div><div id="pg_bbcnews_init_front" /><input type="hidden" name="pg_bbcnews_list_limit" id="pg_bbcnews_list_limit" value="'.$aOrder[0]['label']['limit'].'" /></div>';

		
		$this->importJS('bbcnews.front');
		$this->importCSS('bbcnews.front.blue');
		
		
		$this->assign("bbcnewswidgets",$sHtml);
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