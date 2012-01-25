var frontPageDisplay = {

	getNews: function(cat)
	{	
		
		var prev_on = $('.pg_bbcnews_nav').find('.on');
		prev_on.attr('class', 'off');

		$('#pg_bbcnews_tab_'+cat).attr('class', 'on');
		$('#pg_bbcnews_tab_'+cat).blur();

		$('.pg_contentnews').remove();

		var isLoading = $('#pg_bbcnews_ajaxloader1').is(':visible');
		if(isLoading) return false;

		$('.pg_bbcnews_content_wrap').append('<div id="pg_bbcnews_ajaxloader1"><img src="../_sdk/img/bbcnewswidget/ajax-loader.gif" /></div>');

		
		$.ajax({
			url: usbuilder.getUrl("apiContentFront"),
			type: "POST",
			data : {ctgry : cat}
		}).done(function(data) { 	
			frontPageDisplay.ajaxCallBackJson(data.Data);
        });

	
	},

	ajaxCallBackJson: function(result)
	{
		var news = result.news;
		var limit = $('#pg_bbcnews_list_limit').val();
		var str = "";
	
		$('#pg_bbcnews_ajaxloader1').remove();
		$('.pg_bbcnews_content_wrap').append('<ul class="pg_contentnews">');
		
		$.each(news, function(key, val){

			str += '<li><p class="pg_title"><a href="'+ val.link +'" target="_blank">' + val.title + '</a></p>';
			str += '<p class="pg_content"><a href="' + val.link + '" target="_blank" class="pg_bbcnews_image" ><img src="' + val.thumbnail + '" alt="" style="border:0;" /></a><span class="bbc_news_datepost">' + val.date + '</span><br /><span>' + val.description + '</span><br />';
			str += '<a href="' + val.link + '" class="pg_more"  target="_blank">more</a></p></li>';

			if(limit == key+1) return false;
		});
			
		$('.pg_contentnews').append(str);
		
	}

};

$(document).ready(function(){


});