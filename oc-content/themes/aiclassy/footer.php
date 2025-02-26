
</div><!-- content -->
<?php osc_run_hook('after-main'); ?>
</div>
<!-- footer -->
<?php if(aiclassy_check_advertisement_area('layer_bottom')){
					aiclassy_draw_advertisement_area('layer_bottom');
				} ?>
<?php osc_show_widgets('footer'); ?>
<div class="footer" id="footer">
        <div class="well well-sm">
          <div class="pull-left">
            <ul class="nav nav-pills">
              <li><a href="<?php echo osc_esc_html(osc_item_post_url_in_category()) ; ?>"><span class="glyphicon glyphicon-plus"></span> <?php _e("Add classified", 'aiclassy');?></a></li>
			  
			  <?php osc_run_hook('left-side-footer-end'); ?>
            </ul>
          </div>
          <div class="pull-left">
			  <ul class="nav nav-pills">
					<?php 
					$fblink = osc_get_preference('sociallink@facebook', 'aiclassy_theme');
					if($fblink) {?>
					<li><a target="_blank" href="<?php echo osc_esc_html($fblink); ?>" style="padding-top: 5px; padding-bottom: 5px;"><i class="fa fa-facebook-square fa-2x"></i></a></li>
					<?php }
					$twlink = osc_get_preference('sociallink@twitter', 'aiclassy_theme');
					if($twlink) {?>
					<li><a target="_blank" href="<?php echo osc_esc_html($twlink); ?>" style="padding-top: 5px; padding-bottom: 5px;"><i class="fa fa-twitter-square fa-2x"></i></a></li>
					<?php }
					$lilink = osc_get_preference('sociallink@linkedin', 'aiclassy_theme');
					if($lilink) {?>
					<li><a target="_blank" href="<?php echo osc_esc_html($lilink); ?>" style="padding-top: 5px; padding-bottom: 5px;"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
					<?php }
					$gplink = osc_get_preference('sociallink@googleplus', 'aiclassy_theme');
					if($gplink) {?>
					<li><a target="_blank" href="<?php echo osc_esc_html($gplink); ?>" style="padding-top: 5px; padding-bottom: 5px;"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
					<?php } ?>
			  </ul>
          </div>
          
          <div class="pull-right">
            <ul class="nav nav-pills">
				<?php osc_run_hook('right-side-footer-start'); ?>
				<li class="lang">
				
				</li>
				<?php if(osc_get_preference('languagedisplay@gen', 'aiclassy_theme')=='footer'){
					if ( osc_count_web_enabled_locales() > 1) { ?>
					<li class="lang">
					<?php osc_goto_first_locale(); ?>
					<strong><?php _e('Language:', 'aiclassy'); ?></strong>
					<?php $i = 0;  ?>
					<?php while ( osc_has_web_enabled_locales() ) { ?>
					<span><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_esc_html(osc_change_language_url ( osc_locale_code() )); ?>"><?php echo osc_locale_name(); ?></a></span><?php if( $i == 0 ) { echo " &middot; "; } ?>
						<?php $i++; ?>
					<?php } ?>
					<div class="clear"></div>
					</li>
				<?php }
				} 
					osc_reset_static_pages();
					while( osc_has_static_pages() ) { ?>
						<li>
							<a href="<?php echo osc_esc_html(osc_static_page_url()); ?>"><?php echo osc_static_page_title(); ?></a>
						</li>
					<?php
					}
					?>
              <li><a href="<?php echo osc_esc_html(osc_contact_url()); ?>"><?php _e('Contact', 'aiclassy'); ?></a></li>
            </ul>
          </div>
          <div class="clearfix">&nbsp;</div>
        </div>
        <div class="pull-right">
          <!--<p class="text-muted"><small>Copyright &copy; 2013-2014, - All Rights Reserved.</small></p>-->
        </div>
</div>
<?php 
osc_run_hook('footer');
//if( osc_is_home_page() || osc_is_search_page() || osc_is_static_page()  ) { ?>

<script type="text/javascript">
	$(".sCountry").bind("change", function(e, xhr, settings){
		var pk_c_code = $(this).val();
         var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
         var result = '';
		 var s_region=$( this ).parent().next().find( ".sRegion" );
		 $(s_region).empty();
         if(pk_c_code != '') {
            $.ajax({
               type: "POST",
               url: url,
               dataType: 'json',
               success: function(data){
                  var length = data.length;
                  if(length > 0) {
                     result += '<option value=""><?php echo osc_esc_js(__("Select a region...")); ?></option>';
                     for(key in data) {
                        result += '<option value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                     }
                     $(s_region).append(result);
                     //$(s_region).before('<select name="sRegion" class="form-control sRegion" id="sRegion" >'+result+'</select>');
                     //$(s_region).remove();
                   } else {
					   $(s_region).append(all_regions);
					   
                    // $(s_region).before('<input type="text" class="form-control sRegion" name="sRegion" id="sRegion" />');
                    // $(s_region).remove();
                   }
              }
           });
        } else {
			$(s_region).append(all_regions);
           // add empty select
          // $(s_region).before('<input type="text" class="form-control sRegion" name="sRegion" id="sRegion" />');
           //$(s_region).remove();
        }
	});
	$( ".sRegion" ).change(function() {
		if($( ".sCity" ).length){
			var pk_c_code = $(this).val();
			 var url = '<?php echo osc_base_url(true)."?page=page&id=".aiclassy_get_page_id('customajax')."&action=cities&regionId="; ?>' + pk_c_code;
			 var result = '';
			 var s_city=$( this ).parent().next().find( ".sCity" );
			 if(pk_c_code != ''  ) {
				$(s_city).attr('disabled',true);
				$.ajax({
				   type: "POST",
				   url: url,
				   dataType: 'json',
				   success: function(data){
					   var length = data.length;
					   if(length > 0) {
						 result += '<option selected value=""><?php echo osc_esc_js(__("Select a city...")); ?></option>';
						 for(key in data) {
							result += '<option value="' + data[key].city_id + '">' + data[key].city_name + '</option>';
						 }
						 $(s_city).before('<select name="sCity" class="form-control sCity" id="sCity" >'+result+'</select>');
						 $(s_city).remove();
						} else {
						 $(s_city).before('<input type="text" name="sCity" class="form-control sCity" id="sCity" />');
						 $(s_city).remove();
					   }
				   }
			   });
			} else {
			   // add empty select
			   $(s_city).before('<input type="text" class="form-control sCity" name="sCity" id="sCity" />');
			   $(s_city).remove();
			}
		}
	});
	
	//~ $(".dropdown").click(function(){
			//~ $(".navbargrid .thumbnail").toggle();
		//~ });
	
	$(function () {
		wow = new WOW(
		  {
			animateClass: 'animated',
			offset:       100
		  }
		);
		wow.init();
	});
	<?php if((aiclassy_default_home_page() == 'banner-category' || aiclassy_default_home_page() == 'slider') && osc_is_home_page() ){ ?>
		if (window.screen.width < 800) {
			$('.above').hide();
			$('.searchbar').show();
		} else {
			$('.above').show();
			$('.searchbar').hide();
		}
	<?php } ?>	
	$( ".tab-content div:first-child" ).addClass( "in active" );
	<?php if(osc_get_preference('animation@gen', 'aiclassy_theme') == 'yes'){?>
		animationClasses();
		<?php if(aiclassy_default_home_page() == 'category'){ ?>
			animationClasses2();
		<?php
		}		
	} ?>
</script>
<?php //} ?>
    <script src="<?php echo osc_current_web_theme_url('js/ttmenu.js') ; ?>"></script>
<div style="font-size: .725em;">This website is proudly using the <a title="Osclass web" href="http://osclass.online/"> <strong>Osclass</strong> classifieds scripts</a> software</div>
</div>
</body></html>
