<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com).
	*
	*/
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php $decent_mobile_path = osc_admin_render_plugin_url().osc_plugin_folder(__FILE__)."index.php"; ?>
<style>
#color_schemes {
	
}
.color_box div {
    width: 100px;
    height: 40px;
}
</style>			<h2 class="render-title"><?php _e('Theme Color Scheme & Setting',  'decent_mobile'); ?></h2>
			
			<form action="<?php echo $decent_mobile_path; ?>" method="post" class="nocsrf">
					<div id="color_schemes">

			  <input type="hidden" name="specific" value="theme" />
			  <fieldset class="fieldset">
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Select color Scheme ',  'decent_mobile'); ?>
					</div>
					<div class="form-controls color_box">
						<table width="100%">
							<tr>
								<td width="15%"><div class="parrot" style="background: #93d540; cursor: pointer;"></div></td>
								<td width="15%"><div class="maroon" style="background: #B7275C; cursor: pointer;"></div></td>
								<td width="15%"><div class="purple" style="background: #483d8b; cursor: pointer;"></div></td>
								<td width="15%"><div class="seegreen" style="background: #03A76A; cursor: pointer;"></div></td>
								<td width="15%"><div class="lyme" style="background: #ff7f50; cursor: pointer;"></div></td>
								<td width="15%"><div class="blue" style="background: #028bd1; cursor: pointer;"></div></td>
							</tr>
						</table>
					</div>
				  </div>
				</div>
				<br />
				<br />
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Theme Color ',  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="theme_color" id="theme_color" value="<?php echo osc_esc_html(osc_get_preference('theme_color', 'decent_mobile')); ?>">
						<input type="text" name="txt_theme_color" id="txt_theme_color" value="<?php echo osc_esc_html(osc_get_preference('theme_color', 'decent_mobile')); ?>"
					</div>
				  </div>
				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Body Background',  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="body_background"  id="body_background" value="<?php echo osc_esc_html(osc_get_preference('body_background', 'decent_mobile')); ?>">
						<input type="text"  name="txt_body_background" id="txt_body_background" value="<?php echo osc_esc_html(osc_get_preference('body_background', 'decent_mobile')); ?>">
					</div>
				  </div>

				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Section Background',  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="section_background"  id="section_background" value="<?php echo osc_esc_html(osc_get_preference('section_background', 'decent_mobile')); ?>">
						<input type="text"  name="txt_section_background"  id="txt_section_background" value="<?php echo osc_esc_html(osc_get_preference('section_background', 'decent_mobile')); ?>">
					</div>
				  </div>

				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Heading's Color ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="heading_color"  id="heading_color" value="<?php echo osc_esc_html(osc_get_preference('heading_color', 'decent_mobile')); ?>">
						<input type="text"  name="txt_heading_color"  id="txt_heading_color" value="<?php echo osc_esc_html(osc_get_preference('heading_color', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Text Color (1) ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="text_color_1"  id="text_color_1" value="<?php echo osc_esc_html(osc_get_preference('text_color_1', 'decent_mobile')); ?>">
						<input type="text"  name="txt_text_color_1"   id="txt_text_color_1" value="<?php echo osc_esc_html(osc_get_preference('text_color_1', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Text Color (2) ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="text_color_2"  id="text_color_2" value="<?php echo osc_esc_html(osc_get_preference('text_color_2', 'decent_mobile')); ?>">
						<input type="text"  name="txt_text_color_2"  id="txt_text_color_2" value="<?php echo osc_esc_html(osc_get_preference('text_color_2', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Button Color ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="btn_color_2"  id="btn_color_2" value="<?php echo osc_esc_html(osc_get_preference('btn_color_2', 'decent_mobile')); ?>">
						<input type="text"  name="txt_btn_color_2"  id="txt_btn_color_2" value="<?php echo osc_esc_html(osc_get_preference('btn_color_2', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
				
				<br >
				<br >
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Post Button Background ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="post_btn_bg"  id="post_btn_bg" value="<?php echo osc_esc_html(osc_get_preference('post_btn_bg', 'decent_mobile')); ?>">
						<input type="text"  name="txt_post_btn_bg"  id="txt_post_btn_bg" value="<?php echo osc_esc_html(osc_get_preference('post_btn_bg', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Post Button Text Color ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="post_btn_color"  id="post_btn_color" value="<?php echo osc_esc_html(osc_get_preference('post_btn_color', 'decent_mobile')); ?>">
						<input type="text"  name="txt_post_btn_color"  id="txt_post_btn_color" value="<?php echo osc_esc_html(osc_get_preference('post_btn_color', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e("Post Button Border ",  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="color"  name="post_btn_border"  id="post_btn_border" value="<?php echo osc_esc_html(osc_get_preference('post_btn_border', 'decent_mobile')); ?>">
						<input type="text"  name="txt_post_btn_border"  id="txt_post_btn_border" value="<?php echo osc_esc_html(osc_get_preference('post_btn_border', 'decent_mobile')); ?>">
					</div>
				  </div>
				</div>
			  </fieldset>
				<div class="form-actions">
					<input type="submit" id="submit_theme" value="<?php echo osc_esc_html(__('Save changes',  'decent_mobile')); ?>" class="btn btn-submit btn-success">
				</div>
				</div>
			</form>
		<script>
			$(document).ready(function() {
				$(".parrot").click(function(){
					$('#theme_color').attr('value', '#93d540');
					$('#txt_theme_color').attr('value', '#93d540');
					
					$('#body_background').attr('value', '#f3f3f3');
					$('#txt_body_background').attr('value', '#f3f3f3');
					
					$('#section_background').attr('value', '#ffffff');
					$('#txt_section_background').attr('value', '#ffffff');
					
					$('#heading_color').attr('value', '#354a5f');
					$('#txt_heading_color').attr('value', '#354a5f');
					
					$('#text_color_1').attr('value', '#0b6a00');
					$('#txt_text_color_1').attr('value', '#0b6a00');
					
					$('#text_color_2').attr('value', '#5e5e5e');
					$('#txt_text_color_2').attr('value', '#5e5e5e');
					
					$('#btn_color_2').attr('value', '#93d540');
					$('#txt_btn_color_2').attr('value', '#93d540');
					
					$('#post_btn_bg').attr('value', '#ffeb3b');
					$('#txt_post_btn_bg').attr('value', '#ffeb3b');
					
					$('#post_btn_color').attr('value', '#272727');
					$('#txt_post_btn_color').attr('value', '#272727');
					
					$('#post_btn_border').attr('value', '#4caf50');
					$('#txt_post_btn_border').attr('value', '#4caf50');
				});
				$(".maroon").click(function(){
					$('#theme_color').attr('value', '#b1125e');
					$('#txt_theme_color').attr('value', '#b1125e');
					
					$('#body_background').attr('value', '#f3f3f3');
					$('#txt_body_background').attr('value', '#f3f3f3');
					
					$('#section_background').attr('value', '#ffffff');
					$('#txt_section_background').attr('value', '#ffffff');
					
					$('#heading_color').attr('value', '#354a5f');
					$('#txt_heading_color').attr('value', '#354a5f');
					
					$('#text_color_1').attr('value', '#ffffff');
					$('#txt_text_color_1').attr('value', '#ffffff');
					
					$('#text_color_2').attr('value', '#5e5e5e');
					$('#txt_text_color_2').attr('value', '#5e5e5e');
					
					$('#btn_color_2').attr('value', '#b1125e');
					$('#txt_btn_color_2').attr('value', '#b1125e');
					
					$('#post_btn_bg').attr('value', '#8bc34a');
					$('#txt_post_btn_bg').attr('value', '#8bc34a');
					
					$('#post_btn_color').attr('value', '#ffffff');
					$('#txt_post_btn_color').attr('value', '#ffffff');
					
					$('#post_btn_border').attr('value', '#4caf50');
					$('#txt_post_btn_border').attr('value', '#4caf50');
				});
				$(".purple").click(function(){
					$('#theme_color').attr('value', '#483d8b');
					$('#txt_theme_color').attr('value', '#483d8b');
					
					$('#body_background').attr('value', '#f3f3f3');
					$('#txt_body_background').attr('value', '#f3f3f3');
					
					$('#section_background').attr('value', '#ffffff');
					$('#txt_section_background').attr('value', '#ffffff');
					
					$('#heading_color').attr('value', '#354a5f');
					$('#txt_heading_color').attr('value', '#354a5f');
					
					$('#text_color_1').attr('value', '#ffffff');
					$('#txt_text_color_1').attr('value', '#ffffff');
					
					$('#text_color_2').attr('value', '#5e5e5e');
					$('#txt_text_color_2').attr('value', '#5e5e5e');
					
					$('#btn_color_2').attr('value', '#483d8b');
					$('#txt_btn_color_2').attr('value', '#483d8b');
					
					$('#post_btn_bg').attr('value', '#8BC34A');
					$('#txt_post_btn_bg').attr('value', '#8BC34A');
					
					$('#post_btn_color').attr('value', '#ffffff');
					$('#txt_post_btn_color').attr('value', '#ffffff');
					
					$('#post_btn_border').attr('value', '#4CAF50');
					$('#txt_post_btn_border').attr('value', '#4CAF50');
				});
				$(".seegreen").click(function(){
					$('#theme_color').attr('value', '#03A76A');
					$('#txt_theme_color').attr('value', '#03A76A');
					
					$('#body_background').attr('value', '#f3f3f3');
					$('#txt_body_background').attr('value', '#f3f3f3');
					
					$('#section_background').attr('value', '#ffffff');
					$('#txt_section_background').attr('value', '#ffffff');
					
					$('#heading_color').attr('value', '#354a5f');
					$('#txt_heading_color').attr('value', '#354a5f');
					
					$('#text_color_1').attr('value', '#FFFFFF');
					$('#txt_text_color_1').attr('value', '#FFFFFF');
					
					$('#text_color_2').attr('value', '#5e5e5e');
					$('#txt_text_color_2').attr('value', '#5e5e5e');
					
					$('#btn_color_2').attr('value', '#03A76A');
					$('#txt_btn_color_2').attr('value', '#03A76A');
					
					$('#post_btn_bg').attr('value', '#FFEB3B');
					$('#txt_post_btn_bg').attr('value', '#FFEB3B');
					
					$('#post_btn_color').attr('value', '#353535');
					$('#txt_post_btn_color').attr('value', '#353535');
					
					$('#post_btn_border').attr('value', '#FFC107');
					$('#txt_post_btn_border').attr('value', '#FFC107');
				});
				$(".lyme").click(function(){
					$('#theme_color').attr('value', '#ff7f50');
					$('#txt_theme_color').attr('value', '#ff7f50');
					
					$('#body_background').attr('value', '#f3f3f3');
					$('#txt_body_background').attr('value', '#f3f3f3');
					
					$('#section_background').attr('value', '#ffffff');
					$('#txt_section_background').attr('value', '#ffffff');
					
					$('#heading_color').attr('value', '#354a5f');
					$('#txt_heading_color').attr('value', '#354a5f');
					
					$('#text_color_1').attr('value', '#FFFFFF');
					$('#txt_text_color_1').attr('value', '#FFFFFF');
					
					$('#text_color_2').attr('value', '#5e5e5e');
					$('#txt_text_color_2').attr('value', '#5e5e5e');
					
					$('#btn_color_2').attr('value', '#ff7f50');
					$('#txt_btn_color_2').attr('value', '#ff7f50');
					
					$('#post_btn_bg').attr('value', '#8BC34A');
					$('#txt_post_btn_bg').attr('value', '#8BC34A');
					
					$('#post_btn_color').attr('value', '#ffffff');
					$('#txt_post_btn_color').attr('value', '#ffffff');
					
					$('#post_btn_border').attr('value', '#4CAF50');
					$('#txt_post_btn_border').attr('value', '#4CAF50');
				});
				$(".blue").click(function(){
					$('#theme_color').attr('value', '#028bd1');
					$('#txt_theme_color').attr('value', '#028bd1');
					
					$('#body_background').attr('value', '#f3f3f3');
					$('#txt_body_background').attr('value', '#f3f3f3');
					
					$('#section_background').attr('value', '#ffffff');
					$('#txt_section_background').attr('value', '#ffffff');
					
					$('#heading_color').attr('value', '#354a5f');
					$('#txt_heading_color').attr('value', '#354a5f');
					
					$('#text_color_1').attr('value', '#ffffff');
					$('#txt_text_color_1').attr('value', '#ffffff');
					
					$('#text_color_2').attr('value', '#5e5e5e');
					$('#txt_text_color_2').attr('value', '#5e5e5e');
					
					$('#btn_color_2').attr('value', '#028bd1');
					$('#txt_btn_color_2').attr('value', '#028bd1');
					
					$('#post_btn_bg').attr('value', '#fceb42');
					$('#txt_post_btn_bg').attr('value', '#fceb42');
					
					$('#post_btn_color').attr('value', '#494949');
					$('#txt_post_btn_color').attr('value', '#494949');
					
					$('#post_btn_border').attr('value', '#e1b70c');
					$('#txt_post_btn_border').attr('value', '#e1b70c');
				});
					$('#color_schemes input').on('input',function(e){
						var id_name = $(this).attr("id");
						if(id_name.slice(0,4)=='txt_'){
							var id_value = $(this).val();
							var color_pkr = id_name.substring(4);
							$('#'+color_pkr).attr('value', id_value );
						}else{
							var id_value = $(this).val();
							$('#txt_'+id_name).attr('value', id_value );
						}

						
					});
				$("#submit_theme").mouseover(function() {
				   var cate_id = $('#catids').val(); // Get category ID
				   var cate_icon_color = $('#cat_icon_color').val(); // Get category color name
				   var cate_icon_code = $('#cat_icon_code').val(); // Get category color code
				$('#cat_id_icon').attr('value', cate_icon_color + '|'+ cate_icon_code );
				$('#cat_id_icon').attr('name', 'cat-icon[' + cate_id + ']');
				});
			});
		</script>