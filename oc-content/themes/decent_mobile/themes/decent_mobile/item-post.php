<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/

	 $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit') {
        $action = 'item_edit_post';
        $edit = true;
    }
	    osc_enqueue_script('jquery-validate');

?>
    <?php osc_current_web_theme_path('header.php') ; ?>
        <?php ItemForm::location_javascript_new(); ?>

        <!-- end only item-post.php -->
		<script type="text/javascript">
		$(document).ready(function(){ 
			$("#myTab a").click(function(e){
				e.preventDefault();
				$(this).tab('show');
			});
		});
		</script>
		<style type="text/css">
			.bs-example{
				margin: 20px;
			}
		</style>

	<div class="posting-wrap">
	<div class="posting-inner">
    	<div class="post-title">
        	<h1><?php _e('Post Your ad for FREE!', 'decent_mobile'); ?></h1>
            <p><?php _e('Advertising with us cost you for absolutely nothing.', 'decent_mobile'); ?></p>
        </div>
		            <ul id="error_list"></ul>

                <form name="item" action="<?php echo osc_base_url(true);?>"   method="post" enctype="multipart/form-data" id="item-post">
                    <input type="hidden" name="action" value="<?php echo $action; ?>" />
                        <input type="hidden" name="page" value="item" />
                    <?php if($edit){ ?>
                        <input type="hidden" name="id" value="<?php echo osc_esc_html(osc_item_id());?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_esc_html(osc_item_secret());?>" />
                    <?php } ?>

                    <h2><?php _e('General Information', 'decent_mobile'); ?></h2>
                    <fieldset data-role="fieldcontain">
                        <label for="catId"><?php _e('Category', 'decent_mobile'); ?> *</label>
                            <?php ItemForm::category_multiple_selects(null, null, __('Select a category', 'decent_mobile')); ?>
                    </fieldset>
                    <?php MblItemForm::multilanguage_title_description(); ?>
                    
                    <?php if( osc_price_enabled_at_items() ) { ?>
                    <fieldset data-role="fieldcontain">
						<div class="col-xs-6">
                        <label for="price"><?php _e('Price', 'decent_mobile'); ?></label>
                        <?php ItemForm::price_input_text(); ?>
						</div>
						<div class="col-xs-6">
                        <label for="currency"><?php _e('Currency', 'decent_mobile'); ?> </label>
                        <?php ItemForm::currency_select(); ?>
						</div>
                    </fieldset>
                    <hr/>
                    <?php } ?>
                    
                    <?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if( osc_images_enabled_at_items() ) {
                            ItemForm::ajax_photos();
                         } ?>
                    <?php } ?>
                    
                    <div class="box location">
                        <h2><?php _e('Listing Location', 'decent_mobile'); ?></h2>
                        <div class="row">
                            <label for="countryId"><?php _e('Country', 'decent_mobile'); ?></label>
                            <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="regionId"><?php _e('Region', 'decent_mobile'); ?></label>
                            <?php ItemForm::region_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city"><?php _e('City', 'decent_mobile'); ?></label>
                            <?php ItemForm::city_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city"><?php _e('City Area', 'decent_mobile'); ?></label>
                            <?php ItemForm::city_area_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="address"><?php _e('Address', 'decent_mobile'); ?></label>
                            <?php ItemForm::address_text(osc_user()); ?>
                        </div>
                    </div>
                    <hr/>
					<fieldset data-role="fieldcontain">
                     <?php ItemForm::plugin_post_item(); ?> 
					 </fieldset>
					 
                    <!-- seller info -->
                    <?php if(!osc_is_web_user_logged_in() ) { ?>
                    <fieldset data-role="fieldcontain">
                        <h2><?php _e('Seller\'s information', 'decent_mobile'); ?></h2>
                        <fieldset data-role="fieldcontain">
                            <label for="contactName"><?php _e('Name', 'decent_mobile'); ?></label>
                            <?php ItemForm::contact_name_text() ; ?>
                        </fieldset>
                        <fieldset data-role="fieldcontain">
                            <label for="contactEmail"><?php _e('E-mail', 'decent_mobile'); ?> *</label>
                            <?php ItemForm::contact_email_text() ; ?>
                        </fieldset>
                        <fieldset data-role="fieldcontain">
                          
                            <?php ItemForm::show_email_checkbox() ; ?> <?php _e('Show e-mail on the item page', 'decent_mobile'); ?>
                        </fieldset>
                    </fieldset>
                    <hr/>
                    <?php }; ?>    
                        
                    <?php if( osc_recaptcha_items_enabled() ) {?>
                    <fieldset data-role="fieldcontain">
                        <?php osc_show_recaptcha(); ?>
                    </fieldset>
                    <hr/>
                    <?php }?>   
                     
                    <fieldset data-role="fieldcontain">
                    <button  type="submit"  class="btn txt_color_1 btn_color_2 btn-block"><?php echo osc_esc_html(__('Publish', 'decent_mobile')); ?></button>
                    </fieldset>
                 </form>
				 <br />
		</div>
	</div>

        <?php osc_current_web_theme_path('footer.php') ; ?>
