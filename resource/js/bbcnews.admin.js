var PLUGIN_Bbcnews_vars = {
	sel_curr_value : "",
	submit : false
};

var adminPageSetup = {
		
		saveSetting : function()
		{
			if(oValidator.formName.getMessage('bbcnewswidgets_save'))
			{
				this.setCatOrder();
				document.bbcnewswidgets_save.submit();
			}
			else{
				oValidator.generalPurpose.getMessage(false, "Field(s) with asterisk(*) are mandatory.");
			}
			
		},
		
		moveUp : function(no)
		{
			var sel_src = $('#pg_bbcnews_cat_sel_' + no).val();
			var sel_tgt = $('#pg_bbcnews_cat_sel_' + (no-1)).val();
	
			var data = {
				'num' : no,
				's_src' : sel_src,
				's_tgt' : sel_tgt,
				'method' : 'up'
			};
	
			adminPageSetup.swap(data);
		},
	
		moveDown : function(no)
		{
			var sel_src = $('#pg_bbcnews_cat_sel_' + no).val();
			var sel_tgt = $('#pg_bbcnews_cat_sel_' + (no+1)).val();
	
			var data = {
				'num' : no,
				's_src' : sel_src,
				's_tgt' : sel_tgt,
				'method' : 'down'
			};
	
			adminPageSetup.swap(data);
		},
	
		swap : function(data)
		{
			var src = data['method'] == "up" ? data['num']-1 : data['num']+1;
			$('#pg_bbcnews_cat_sel_' + data['num']).val(data['s_tgt']);
			$('#pg_bbcnews_cat_sel_' + src).val(data['s_src']);
		},
		
		reset : function()
		{
			var opts = adminPageSetup.optStr();

			$('#show_html_value').children().remove().append(opts);
			$('#show_html_value').append(opts);
			$("input[name='pg_bbcnews_display_limit']").val(5);
		
		},	
		

		
		selectChange : function(curr_num, curr_val)
		{
			var tabnum = $('#pg_bbcnews_tab_td ul').children().size();
			var tgt = "";
	
			for(i = 0; i < tabnum; i++) {
				var sel_val = $('#pg_bbcnews_cat_sel_' + (i+1)).val();
	
				if(curr_num != (i+1) && sel_val == curr_val) {
					$('#pg_bbcnews_cat_sel_' + (i+1)).val(PLUGIN_Bbcnews_vars.sel_curr_value);
				}
			}
		},
	
		
		
		catOrder : function(meth)
		{
			var curr_opt = $('#show_html_value option:selected');
			var curr  = curr_opt.val();
			if(meth == 'down') curr_opt.insertAfter(curr_opt.next());
			else curr_opt.insertBefore(curr_opt.prev());
	
		},
		
		setCatOrder : function()
		{
			var opt = $('#show_html_value option');
	
			$.each(opt, function(k, v){
				var val = $(v).val();
	
				if(k > 2) return false;
				else $('#pg_bbcnews_cat_sel_' + (k+1)).val(val);
			});
		},
		
		
		
		optStr : function()
		{
			var str = '<option value="News" class="category_opt">News</option>';
				str += '<option value="Business" class="category_opt">Business</option>';
				str += '<option value="Sci-Environment" class="category_opt">Sci-Environment</option>';
				str += '<option value="Health" class="category_opt">Health</option>';
				str += '<option value="Tech" class="category_opt">Tech</option>';
				str += '<option value="Entertainment" class="category_opt">Entertainment</option>';
				str += '<option value="Sports" class="category_opt">Sports</option>';
	
			return str;
		}
};

$(document).ready(function(){
	
	$('#pg_bbcnews_cat_sel').click(function(){
		PLUGIN_Bbcnews_vars.sel_curr_value = $(this).val();
	});

});