$(document).ready(function(){
	/* User Input height */
	var height = $("#pg_bbcnews_holder").parent().height();
	var test = $(".pg_contentnews").parent().parent().parent().height();
    var realHeight = test - 55;
	$(".pg_bbcnews_content_wrap ").css("height", realHeight);
	$(".pg_bbcnews_content_wrap ").css("overflow-x", "hidden");
	$(".pg_bbcnews_content_wrap ").css("overflow-y","auto");
	
	
});


var frontPageDisplay = {
	tab1: function()
	{
		$("#pg_bbcnews_tab_2, #pg_bbcnews_tab_3").removeClass("on");
		$("#pg_bbcnews_tab_2, #pg_bbcnews_tab_3").addClass("off");
		$("#pg_bbcnews_tab_1").addClass("on");
		$("#bbcnews_tab1").show();
		$("#bbcnews_tab2, #bbcnews_tab3").hide();
		
	},
	
	tab2: function()
	{
		$("#pg_bbcnews_tab_1, #pg_bbcnews_tab_3").removeClass("on");
		$("#pg_bbcnews_tab_1, #pg_bbcnews_tab_3").addClass("off");
		$("#pg_bbcnews_tab_2").addClass("on");
		$("#bbcnews_tab1, #bbcnews_tab3").hide();
		$("#bbcnews_tab2").show();
		
	},
	
	tab3: function()
	{
		$("#pg_bbcnews_tab_1, #pg_bbcnews_tab_2").removeClass("on");
		$("#pg_bbcnews_tab_1, #pg_bbcnews_tab_2").addClass("off");
		$("#pg_bbcnews_tab_3").addClass("on");
		$("#bbcnews_tab1, #bbcnews_tab2").hide();
		$("#bbcnews_tab3").show();
	}
}



















