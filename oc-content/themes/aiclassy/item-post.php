<?php

    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    aiclassy_add_body_class(' item-post');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit'){
        $action = 'item_edit_post';
        $edit = true;
    }
    osc_current_web_theme_path('header.php') ;
    ItemForm::location_javascript();
    //ItemForm::location_javascript_new(); 
    ?>
<div class="clear"></div>
	<div class="row content">
        <div class="col-lg-3 content-left">
          <div class="row">
			  <?php 
			   if(osc_get_preference('position@search', 'aiclassy_theme')=='vertical')
				aiclassy_draw_search_form_1('vertical'); ?>
			  <div class="responsive-area-origen">
				<?php aiclassy_draw_categories_list_3();
				aiclassy_sidebar_listing();
				if( osc_get_preference('facebook@page', 'aiclassy_theme') == 'show' ) {
					facebook_like_page();
				}
				aiclassy_draw_advertisement_area('general_sidebar');?>
			</div>
          </div>
          
        </div>
        <div class="col-lg-9 content-right">
			<?php aiclassy_draw_breadcrumb(); ?>
			<?php aiclassy_show_flash_message(); ?>
          
          <h2><?php _e('Add classified', 'aiclassy'); ?></h2>
          <?php osc_show_widgets('listing-post-top'); ?>
          
          <ul id="error_list"></ul>
          <form role="form" name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data" id="item-post">
			  <input type="hidden" name="action" value="<?php echo $action; ?>" />
              <input type="hidden" name="page" value="item" />
              <?php if($edit){ ?>
                 <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                 <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
              <?php } ?>
            
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><?php _e('Classified details', 'aiclassy'); ?></h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="control-label" for="select_1"><?php _e('Category', 'aiclassy'); ?></label>
                  <div class="clear"></div>
                  <?php multiple_category_selects(null, null, __('Select a category', 'aiclassy'));
                  //ItemForm::category_select(null, null, __('Select a category', 'aiclassy')); 
                  //ItemForm::category_multiple_selects(null, null, __('Select a category', 'aiclassy'));?>
                </div>
                <div class="clear"></div>
                <?php $current_locale = osc_current_user_locale(); ?>
                <div id="no-has-placeholder" class="form-group">
                  <label for="title[<?php echo $current_locale; ?>]"><?php _e('Title', 'aiclassy'); ?></label>
                  <?php ItemForm::title_input('title',$current_locale,  aiclassy_item_title() ); ?>
                </div>
                <div class="form-group">
                  <label for="description[<?php echo $current_locale; ?>]"><?php _e('Description', 'aiclassy'); ?></label>
                  <?php ItemForm::description_textarea('description',$current_locale, aiclassy_item_description() ); ?>
                </div>
                </div>
            </div>
            <?php
                 if($edit) {
					 ?>
					 <div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title"><?php _e('Classified more information', 'aiclassy'); ?></h3>
						</div>
						<div class="panel-body"><div class="col-md-4 col-sm-6">
					 <?php
                    ItemForm::plugin_edit_item();
                    ?>
						</div></div>
					</div>
					<?php
                 } else {
					 ?>
					 <div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title"><?php _e('Classified more information', 'aiclassy'); ?></h3>
						</div>
						<div class="panel-body">
							<div class="col-md-4 col-sm-6">
					 <?php
                    ItemForm::plugin_post_item();
                    ?>
                    </div>
						</div>
					</div>
					<?php
                 }
             ?>
             <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><?php _e('Classified Location', 'aiclassy'); ?></h3>
              </div>
              <div class="panel-body">
				  <?php if( osc_price_enabled_at_items() ) { ?>
                <div class="form-group control-group-price">
                  <label><?php _e('Price', 'aiclassy'); ?></label>
                  <div class="row">
					  <div class="col-sm-4">
						  <div class="form-inline">
							<div class="form-group">
							  <div class="input-group" style="width: 150px;">
								<?php ItemForm::price_input_text(); ?>
								<span class="input-group-addon currency-aiclassy"></span>
							  </div>
							</div>
						  </div>
					  </div>
					  <div class="col-sm-4">
						  <?php ItemForm::currency_select(); ?>
					  </div>
                  </div>
                   
                </div>
                <?php } ?>
                <div class="row">
				  <div class="col-md-6">
					<div class="form-group">
					  <label for="countryId"><?php _e('Country', 'aiclassy'); ?></label>
				      <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
				    </div>
				    <div class="form-group">
				  	  <label for="region"><?php _e('Region', 'aiclassy'); ?></label>
					  <?php ItemForm::region_select(osc_get_regions(osc_user_country_code()), osc_user()) ; ?>
				    </div>
				    <div class="form-group">
					  <label for="city"><?php _e('City', 'aiclassy'); ?></label>
					  <?php $edit ? ItemForm::city_text(osc_user()) : ItemForm::city_select(osc_get_cities(osc_user_region_id()), osc_user()) ?>
				    </div>
				    <div class="form-group">
					  <label for="cityArea"><?php _e('City Area', 'aiclassy'); ?></label>
					   <?php ItemForm::city_area_text(osc_user()); ?>
				    </div>
				    <div class="form-group">
					   <label for="address"><?php _e('Address', 'aiclassy'); ?></label>
					   <?php ItemForm::address_text(osc_user()); ?>
				    </div> 
				  </div>
                </div>
               
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><?php _e('Classified images', 'aiclassy'); ?></h3>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <?php if( osc_images_enabled_at_items() ) {
                            ItemForm::ajax_photos();
                  } ?>
                </div>
              </div>
            </div>
            <?php if(!$edit && !osc_is_web_user_logged_in()){ ?>
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><?php _e('Your personal details', 'aiclassy'); ?></h3>
              </div>
              
              <div class="panel-body">
                <div class="form-group">
                  <label for="contactName"><?php _e('Name', 'aiclassy'); ?></label>
                  <?php ItemForm::contact_name_text(); ?>
                </div>
                <div class="form-group">
                  <label for="contactEmail"><?php _e('E-mail', 'aiclassy'); ?></label>
                  <?php ItemForm::contact_email_text(); ?>
                </div>
              </div>
              
            </div>
            <?php } ?>
             
            <div class="well">
				<?php osc_show_widgets('listing-post-bottom'); ?>
              
              <div class="">
                <label><?php ItemForm::show_email_checkbox(); ?> <?php _e('Show e-mail on the listing page', 'aiclassy'); ?></label>
              </div>
              <div class="">
                <label><input type="checkbox" required > <?php _e('I agree to the', 'aiclassy'); ?> 
					<a  target="_blank" href="<?php osc_get_static_page(osc_get_preference('tclink', 'aiclassy_theme'));echo osc_static_page_url();  ?>" ><?php _e('Terms of Use', 'aiclassy'); ?></a>
				</label>
              </div>
              <?php if( osc_recaptcha_items_enabled() ) { ?>
                    <div class="controls">
                       <?php osc_show_recaptcha(); ?>
                    </div>
              <?php }?>
              <button type="submit" class="btn btn-success"><?php if($edit) { _e("Update", 'aiclassy'); } else { _e("Publish", 'aiclassy'); } ?></button>
            </div>
          </form>
        </div>
		<div class="col-md-12 hidden-lg content-left">
		  <div class="row responsive-area-target">
			  <div></div>
		  </div>
		</div>
      </div>
      <script type="text/javascript">
            $('#price').bind('hide-price', function(){
                $('.control-group-price').hide();
            });

            $('#price').bind('show-price', function(){
                $('.control-group-price').show();
            });

    <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
		$().ready(function(){
			$("#price").blur(function(event) {
				var price = $("#price").prop("value");
				<?php if(osc_locale_thousands_sep()!='') { ?>
				while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
					price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
				}
				<?php }; ?>
				<?php if(osc_locale_dec_point()!='') { ?>
				var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
				if(tmp.length>2) {
					price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
				}
				<?php }; ?>
				$("#price").prop("value", price);
			});
			$("#select_1").trigger('change');
			$("#select_2").trigger('change');
			$("#select_3").trigger('change');
			$("#select_4").trigger('change');
		});
    <?php }; ?>   
	
	</script>

<?php osc_current_web_theme_path('footer.php'); ?>
