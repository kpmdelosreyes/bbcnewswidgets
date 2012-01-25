<?php
class BbcnewsUtilFeed
{
	public function catList()
	{
		return array('News', 'Business', 'Health', 'Sci-Environment', 'Tech', 'Entertainment', 'Sports');
	}

	public function category()
	{
		$aCategory = array();

		$aCategory[] = array(
			'name' => 'News',
			'link' => 'http://feeds.bbci.co.uk/news/rss.xml'
		);

		$aCategory[] = array(
			'name' => 'Business',
			'link' => 'http://feeds.bbci.co.uk/news/business/rss.xml'
		);

		$aCategory[] = array(
			'name' => 'Health',
			'link' => 'http://feeds.bbci.co.uk/news/health/rss.xml'
		);

		$aCategory[] = array(
			'name' => 'Sci-Environment',
			'link' => 'http://feeds.bbci.co.uk/news/science_and_environment/rss.xml'
		);

		$aCategory[] = array(
			'name' => 'Tech',
			'link' => 'http://feeds.bbci.co.uk/news/technology/rss.xml'
		);

		$aCategory[] = array(
			'name' => 'Entertainment',
			'link' => 'http://feeds.bbci.co.uk/news/entertainment_and_arts/rss.xml'
		);

		$aCategory[] = array(
			'name' => 'Sports',
			'link' => 'http://newsrss.bbc.co.uk/rss/sportonline_uk_edition/front_page/rss.xml'
		);

		return $aCategory;
	}

	public function parseRss($sLink)
	{
		$sContent = $this->download_page($sLink);
		$oRss = new SimpleXMLElement($sContent);

		$aData = array();
		foreach ($oRss->channel->item as $item) {
			
			$sTitle = (string) $item->title;
			$sDesc = (string) $item->description;
			$sPubDate = (string) $item->pubDate;
			$sLink = (string) $item->link;

			$media = $item->children('http://search.yahoo.com/mrss/');
			if($media->thumbnail) {
				$aThumb = $media->thumbnail->attributes();
				$sThumbnail = (string) $aThumb['url'];
			} else {
				$sThumbnail = SERVER_PLUGIN_URL . "Bbcnews/1.0.0/images/bbc-logo.jpg";
			}

			$aData[] = array(
				'title' => $sTitle,
				'description' => $sDesc,
				'date' => $sPubDate,
				'link' => $sLink,
				'thumbnail' => $sThumbnail
			);
		}

		return $aData;
	}

	public function download_page($path)
	{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$path);

        curl_setopt($ch, CURLOPT_FAILONERROR,1);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        $retValue = curl_exec($ch);                      
        curl_close($ch);

        return $retValue;
	}
}
?>