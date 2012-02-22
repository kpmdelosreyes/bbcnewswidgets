<?php
class modelSetup extends modelSample
{
	public function getData($aOption)
	{
		$sQuery = "SELECT * FROM bbcnewswidget_settings WHERE seq = " . $aOption['seq'];
		return $this->query($sQuery, "row");
	}
	
	public function insertContents($aData)
	{
		
		$sQuery = "INSERT INTO bbcnewswidget_settings(seq, pbs_tab_1, pbs_tab_2, pbs_tab_3, pbs_list_limit)
				   VALUES('".$aData['seq']."','".$aData['pg_bbcnews_cat_sel_1']."', '".$aData['pg_bbcnews_cat_sel_2']."', '".$aData['pg_bbcnews_cat_sel_3']."', '".$aData['pg_bbcnews_display_limit']."' )";
		
		return $this->query($sQuery);
		
	}
	
	public function updateContents($aData)
	{
		$sQuery = "UPDATE bbcnewswidget_settings SET pbs_tab_1='".$aData['pg_bbcnews_cat_sel_1']."', pbs_tab_2='".$aData['pg_bbcnews_cat_sel_2']."', pbs_tab_3='".$aData['pg_bbcnews_cat_sel_3']."', 
					pbs_list_limit='".$aData['pg_bbcnews_display_limit']."' WHERE seq = " .$aData['seq'] ;
			
		return $this->query($sQuery);
	}
	
	function getSeqCount()
	{
		$sQuery = "SELECT seq, count(seq) AS value FROM bbcnewswidget_settings GROUP BY seq ORDER BY seq asc;";
		return $this->query($sQuery);
	}
	
	function deleteContentsBySeq($aSeq)
	{
		$sSeqs = implode(',', $aSeq);
		$sQuery = "Delete from bbcnewswidget_settings where seq in($sSeqs)";
		$mResult = $this->query($sQuery);
		return $mResult;
	}
	
}