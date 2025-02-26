<?php
	$category = osc_search_category();
	
     if(isset($category) && !empty($category) ) {
         $category['pk_i_id'] = $category[0];
     }else{
		 $category =null;
	 }
	$region = osc_search_region();
	/*echo $region;
     if(isset($region) && !empty($region) ) {
         $region['pk_i_id'] = $region[0];
     }else{
		 $region =null;
	 }*/
?>
		<div class="col-lg-3 content-left">
			<button type="button" data-toggle="collapse" data-target="#responsive-sidebar" class="btn btn-info btn-sm btn-block collapsed hidden-lg advance-search-toggle">advance search</button>
          
          <div id="responsive-sidebar" class="row in">
			  <div class="col-md-12">
					<div class="well">
					<form id="sidebarSearch" action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
						<input type="hidden" name="page" value="search"/>
						<input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
						<input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
						<?php foreach(osc_search_user() as $userId) { ?>
						<input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
						<?php } ?>
							
							<div class="form-group">
								<label for="sPattern"><?php _e('Your search', 'aiclassy'); ?></label>
								<input class="form-control" type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" />
							</div>
							<div class="form-group">
								<label for="sCategory"><?php _e('Category', 'aiclassy'); ?></label>
								<?php aiclassy_draw_category_select_2('form-control',__('Category', 'aiclassy'),'sCategory',$category) ; ?>
							</div>
							<?php if(aiclassy_count_country_select() > 1){ ?>
							<div class="form-group">
								<label for="sCountry"><?php _e('Country', 'aiclassy'); ?></label>
								<?php aiclassy_draw_country_select('form-control',__("Select a country..."),'sCountry',$region) ; ?>
							</div>
							<?php } ?>
							<div class="form-group">
								<label for="sRegion"><?php _e('Region', 'aiclassy'); ?></label>
								<?php aiclassy_draw_region_select('form-control',__("Select a region..."),'sRegion',$region) ; ?>
							</div>
							<div class="form-group">
								<label for="sCity"><?php _e('City', 'aiclassy'); ?></label>
								<input class="form-control sCity" type="text" id="sCity" name="sCity" value="<?php if(osc_get_preference('location@item', 'aiclassy_theme')=='show') {echo Cookie::newInstance()->get_value('sCity');}else {echo osc_esc_html(osc_search_city());} ?>" />
							</div>
						<?php if( osc_images_enabled_at_items() ) { ?>
							
							<div class="form-group">
								<label for="bPic"><?php _e('Show only', 'aiclassy') ; ?></label><br/>
								<label for="withPicture"><input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> />  <?php _e('listings with pictures', 'aiclassy') ; ?></label>
							</div>
						<?php } ?>
						<?php if( osc_price_enabled_at_items() ) { ?>
							<div class="form-group price-slice">
								<h3><?php _e('Price', 'aiclassy') ; ?></h3>
								<div class="row">
									<div class="col-sm-6">
										<span><?php _e('Min', 'aiclassy') ; ?>.</span>
										<input class="form-control" type="text" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
									</div>
									<div class="col-sm-6">
										<span><?php _e('Max', 'aiclassy') ; ?>.</span>
										<input class="form-control" type="text" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
									</div>
								</div>
								
							</div>
						<?php } ?>
						<div class="plugin-hooks">
							<?php
							if(osc_search_category_id()) {
								osc_run_hook('search_form', osc_search_category_id()) ;
							} else {
								osc_run_hook('search_form') ;
							}
							?>
						</div>
						<?php
						$aCategories = osc_search_category();
						foreach($aCategories as $cat_id) { ?>
							<input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
						<?php } ?>
						<div class="actions">
							<button type="submit" class="btn btn-danger btn-sm pull-right"><?php _e('Apply', 'aiclassy') ; ?></button>
							<div class="clear"></div>
							<br>
						</div>
					</form>
					</div>
					<div class="form-group well">
					<?php osc_alert_form(); ?>
					</div>
					<div class="form-group well">
						<h5><?php _e('Refine category', 'aadclassy') ; ?></h5>
						<?php aiclassy_sidebar_refine_category_search($category['pk_i_id']); ?>
					</div>
					<div class="clear"></div>
					<div class="responsive-area-origen row">
						<?php
						if( osc_get_preference('facebook@page', 'aiclassy_theme') == 'show' ) {
							facebook_like_page();
						}
						aiclassy_draw_advertisement_area('general_sidebar');?>
					</div>					
				</div>
			</div>
			
        </div>
        
