<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php $decent_mobile_path = osc_admin_render_plugin_url().osc_plugin_folder(__FILE__)."index.php"; ?>

			<h2 class="render-title">
			  <?php _e('Mobile Category Settings',  'decent_mobile'); ?>
			</h2>
			<form action="<?php echo $decent_mobile_path; ?>" method="post" class="nocsrf">
			  <input type="hidden" name="specific" value="categories_icons" />
			  <input type="hidden"  id="cat_id_icon" value=""/>
			  	<fieldset class="fieldset">
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Select a Category Style',  'decent_mobile'); ?>
						</div>
						<div class="form-controls" style="text-align: center">
							<table width="100%">
								<tr>
									<td width="33%"><img src="<?php echo  osc_base_url()."oc-content/plugins/".osc_plugin_folder(__FILE__).'images/list_view.png'; ?>"></td>
									<td width="33%"><img src="<?php echo  osc_base_url()."oc-content/plugins/".osc_plugin_folder(__FILE__).'images/grid_view.png'; ?>"></td>
									<td width="33%"><img src="<?php echo  osc_base_url()."oc-content/plugins/".osc_plugin_folder(__FILE__).'images/double_view.png'; ?>"></td>
								</tr>
								<tr>
									<td>							
									<input type="radio" <?php  if(osc_get_preference('category_display_style', 'decent_mobile')=='list'){echo 'checked="checked"';} ?> name="category_display_style" value="list"></td>
									<td>							
									<input type="radio" <?php  if(osc_get_preference('category_display_style', 'decent_mobile')=='grid'){echo 'checked="checked"';} ?> name="category_display_style" value="grid">
									<input type="text"  id="categories_in_row" name="categories_in_row" placeholder="<?php echo osc_esc_html(__('Categories in a row', 'decent_mobile')); ?>" value="<?php echo osc_get_preference('categories_in_row', 'decent_mobile'); ?>"></td>
									<td>							
									<input type="radio" <?php  if(osc_get_preference('category_display_style', 'decent_mobile')=='double'){echo 'checked="checked"';} ?> name="category_display_style" value="double">
									</td>
								</tr>
							</table>
						</div>
					  </div>
					</div>

				</fieldset>
			  	<fieldset class="fieldset">
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Show Category ID',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="show_cat_id" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('show_cat_id', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="show_cat_id" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>

				</fieldset>
			  	<fieldset class="fieldset">
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Category ID',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="text"  id="catids" name="catid" value=""> <?php _e('(Hint: In order to know category ID please enable the above option "Show Category ID")',  'decent_mobile'); ?>

						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Category Icon Code',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							fa fa-<input type="text"  id="cat_icon_code" name="cat_icon_code" value=""> <?php _e("(Please find a variety of icon's <a href='http://fontawesome.io/icons/' target='_blank'>Click Here </a>)",  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e("Category Icon Color",  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							#<input type="text"  id="cat_icon_color" name="cat_icon_color" placeholder="<?php echo osc_esc_html(__('e.g 8BC34A', 'decent_mobile')); ?>" value="<?php  echo osc_esc_html(osc_get_preference('cat_icon_color', 'decent_mobile')); ?>">
						</div>
					  </div>
					</div>
				</fieldset>
					<br >
					<div class="form-row">
						<?php _e('(Note: In order to remove the category icon just put the category ID in "Category ID" and submit)',  'decent_mobile'); ?>
					</div>
			<div class="form-actions">
				<input type="submit" id="submit_category" value="<?php   echo osc_esc_html(__('Save changes',  'decent_mobile')); ?>" class="btn btn-submit btn-success">
			  </div>
			</form>
		<script>
			$(document).ready(function() {
				$("#submit_category").mouseover(function() {
				   var cate_id = $('#catids').val(); // omit "var" to make it global
				   var cate_icon_color = $('#cat_icon_color').val(); // omit "var" to make it global
				   var cate_icon_code = $('#cat_icon_code').val(); // omit "var" to make it global
				$('#cat_id_icon').attr('value', cate_icon_color + '|'+ cate_icon_code );
				$('#cat_id_icon').attr('name', 'cat-icon[' + cate_id + ']');
				});
			});
		</script>