<?php
class modelSetup extends modelSample
{
	public function getData()
	{
		$sQuery = "SELECT * FROM bbcnewswidget_settings";
		return $this->query($sQuery, "row");
	}
	
	public function insertContents($aData)
	{
		
		$sQuery = "INSERT INTO bbcnewswidget_settings(pbs_tab_1, pbs_tab_2, pbs_tab_3, pbs_list_limit)
				   VALUES('".$aData['pg_bbcnews_cat_sel_1']."', '".$aData['pg_bbcnews_cat_sel_2']."', '".$aData['pg_bbcnews_cat_sel_3']."', '".$aData['pg_bbcnews_display_limit']."' )";
		
		return $this->query($sQuery);
		
	}
	
	public function updateContents($aData)
	{
		$sQuery = "UPDATE bbcnewswidget_settings SET pbs_tab_1='".$aData['pg_bbcnews_cat_sel_1']."', pbs_tab_2='".$aData['pg_bbcnews_cat_sel_2']."', pbs_tab_3='".$aData['pg_bbcnews_cat_sel_3']."', 
					pbs_list_limit='".$aData['pg_bbcnews_display_limit']."'";
			
		return $this->query($sQuery);
	}
	
	
}