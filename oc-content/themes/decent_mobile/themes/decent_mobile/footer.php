<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com).
	*
	*/
?>
		<script type="text/javascript">
			$(document).ready(function(){
				var isSafari = navigator.vendor.indexOf("Apple")==0 && /\sSafari\//.test(navigator.userAgent); // true or false
				<?php if ( (osc_is_home_page() ))  { ?>
						var swiper1 = new Swiper('.premium_slider', {
						slidesPerView: <?php echo osc_esc_js(osc_get_preference('slidesperview', 'decent_mobile')); ?>,
						freeMode: <?php  if(osc_esc_js(osc_get_preference('slider_freemode', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
						loop: <?php  if(osc_esc_js(osc_get_preference('slider_loop', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
					});
						var swiper2 = new Swiper('.latest_slider', {
						slidesPerView: <?php echo osc_esc_js(osc_get_preference('slidesperview', 'decent_mobile')); ?>,
						freeMode: <?php  if(osc_esc_js(osc_get_preference('slider_freemode', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
						loop: <?php  if(osc_esc_js(osc_get_preference('slider_loop', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
					});

				<?php } ?>
				<?php if ( (osc_is_ad_page() ))  { ?>
										
						if(isSafari == false){
						var swiper4 = new Swiper('.details_slider', {
						effect: 'flip',
						loop: <?php  if(osc_esc_js(osc_get_preference('slider_loop', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
						pagination: '.swiper-pagination',
						paginationType: 'progress'
					
						});
						}else{
					var swiper4 = new Swiper('.details_slider', {
						effect: 'flip',
						loop: <?php  if(osc_esc_js(osc_get_preference('slider_loop', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
					
						});
						}
					var swiper3 = new Swiper('.related_slider', {
						slidesPerView: <?php echo osc_esc_js(osc_get_preference('slidesperview', 'decent_mobile')); ?>,
						freeMode: <?php  if(osc_esc_js(osc_get_preference('slider_freemode', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
						loop: <?php  if(osc_esc_js(osc_get_preference('slider_loop', 'decent_mobile')=='1')){echo 'true';}else{echo 'false';} ?>,
					});
				<?php } ?>
			});
		</script>
		<script type="text/javascript">
			var watchlist_url = '<?php echo osc_ajax_plugin_url("decent_mobile/themes/decent_mobile/ajax_favorite.php"); ?>';
			jQuery(document).ready(function($) {
			$(document).on('click', ".favoritelist", function () {
				var id = $(this).attr("id");
				var dataString = 'id='+ id ;
				var parent = $(this);

				$(this).fadeOut(300);
				$.ajax({
					type: "POST",
					 dataType: "text",
					url: watchlist_url,
					data: dataString,
					cache: false,

					success: function(html) {
					parent.html(html);
					parent.fadeIn(300);
					parent.addClass('watch_saved').removeClass('favoritelist');
					}
				});
			});
			return false
		});
	</script>

	<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('snap.js') ?>"></script>
	<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('polyfill.object-fit.js') ?>"></script>
	<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('script.js') ?>"></script>
	<script>
		<?php if(osc_get_preference('touch_drag', 'decent_mobile')=='0') { ?>
			snapper.settings({
				 touchToDrag: false,
			});
		<?php } ?>
	</script>

	<?php if ( (!osc_is_ad_page() ))  { ?>

	<!--Location-Modal -->
		 <?php View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=') ) ; ?>
		 <?php if(osc_count_list_regions() > 0) {?>
		<div class="modal fade" id="location" tabindex="-1" role="dialog">
			<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
				<h4 class="modal-title" id="myModalLabel"><?php _e("Location", 'decent_mobile'); ?></h4>
			  </div>
			  <div class="modal-body">
				<div class="list-group">
				<?php while(osc_has_list_regions()) { ?>
					<a href="<?php echo osc_search_url(array('sRegion' => osc_list_region_name()));?>" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo osc_list_region_name();?> <span class="badge">(<?php echo osc_list_region_items();?>)<span/></a>
				<?php } ?>
				</div>
			  </div>
			</div>
		  </div>
		 </div>
		  
		 <?php } ?>

		<?php if ( osc_count_web_enabled_locales() > 1) { ?>
		<!--Language-Modal -->
		<div class="modal fade" id="lang" tabindex="-1" role="dialog">
			<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
				<h4 class="modal-title" id="myModalLabel"><?php _e("Language", 'decent_mobile'); ?></h4>
			  </div>
			  <div class="modal-body" style="padding: 5px;">
			  	<div class="category-section">
					<br><br>
					<div class="double_view" >
					<ul class="clearfix">

					<?php osc_goto_first_locale(); ?>

							<?php $i = 0;  ?>
							<?php while ( osc_has_web_enabled_locales() ) { ?>
								<li><a style="    padding: 10px 0px 10px 0px;" class="txt_color_2 section_bg <?php if( $i == 0 ) { echo "first"; } ?>" id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>">
								<?php
									$lng_ico = osc_current_web_theme_url('images/'.osc_locale_code().'.png');
									$file_headers = @get_headers($lng_ico);
									if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
										echo '<span class=" ico_color fa fa-language"></span>';
									}
									else {
									
										echo '<img src="'.$lng_ico.'">';
									}?>
								    <span> <?php echo osc_locale_name(); ?></span></a></li>
								<?php $i++; ?>
							<?php } ?>

					</ul>
					</div>
					<br><br>
				</div>
			  </div>
			</div>
		  </div>
		 </div>
		 <?php } ?>
		 
		</div><!-- /container-fluid -->
	   </div><!-- /content -->
		<div id="flashmessage_container">
			<div class="icon-wrapper">
			  <?php osc_show_flash_message() ; ?>
			</div>
		</div>
	<?php } ?>		

    </body>
</html>