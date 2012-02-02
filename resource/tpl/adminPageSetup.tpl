			<!-- message box -->			
			 <div id="message_box" class="">
     			<p><span></span></p>
    		 </div>		
			<!-- // message box -->
			
			<!--<h3 class="extension_plugin_name">BBC News</h3>
			<h3>Settings</h3>-->

			<p class="require"><span class="neccesary">*</span>Required</p>
			<!-- input area -->			
			<form class="bbcnewswidget_save" id="bbcnewswidget_save" name="bbcnewswidget_save" method="POST" >
				<table border="1" cellspacing="0" class="table_input_vr">
						<colgroup>
							<col width="115px" />
							<col width="*" />
						</colgroup>
							<tr>
								<th>Category</th>
								<td class="move">
									<p>
									   <a href="javascript: adminPageSetup.catOrder('up');"><img src="/_sdk/img/bbcnewswidget/u131_original.png" alt="" /></a>
									   <a href="javascript: adminPageSetup.catOrder('down');"><img src="/_sdk/img/bbcnewswidget/u137_original.png" alt="" /></a>
									</p>
									<select title="select rows" class="rows menu" id="show_html_value" size="2" name="pg_bbcnews_category" >
										<?php foreach ($category as $key => $value): ?>
										<option value="<?php echo $value;?>" class="category_opt"><?php echo $value;?></option>
										<?php endforeach; ?>
									</select>
									<p>The top 3 categories will be displayed on this site.</p>
								</td>
							</tr>
							<tr>
								<th><label for="show_html_value">Shows Rows</label></th>
								<td>
									<span class="neccesary">*</span> 
									<input id="text" name="pg_bbcnews_display_limit" style="width:20px;" type="text" fw-filter="isFill&isNumberRange[1][10]" fw-label="pg_bbcnews_display_limit" maxlength="2" value="" class="_validate" />
								</td>
							</tr>
													
							
					</table>
					<div id="pg_bbcnews_init_values">
						<input type="hidden" name="pg_bbcnews_cat_sel_1" id="pg_bbcnews_cat_sel_1" value="" />
						<input type="hidden" name="pg_bbcnews_cat_sel_2" id="pg_bbcnews_cat_sel_2" value="" />
						<input type="hidden" name="pg_bbcnews_cat_sel_3" id="pg_bbcnews_cat_sel_3" value="" />
					</div>
			</form>


			<div class="tbl_lb_wide_btn">
				<a href="#" class="btn_apply" title="Save changes" onclick="adminPageSetup.saveSetting();">Save</a>
				<a href="#" class="add_link" title="Reset to default" onclick="adminPageSetup.reset();">Reset to Default</a>
			</div>
</div>		