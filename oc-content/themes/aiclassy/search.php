<?php

	
	$category = __get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }
     
    // meta tag robots
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','aiclassy_nofollow_construct');
    } else {
        osc_add_hook('header','aiclassy_follow_construct');
    }

    aiclassy_add_body_class('search1');
    $listClass = '';
    $buttonClass = '';
    $btn_list = 'active';
    $btn_grid = '';
    if(osc_search_show_as() == 'gallery'){
          $listClass = 'listing-grid-aiclassy_items';
          $buttonClass = 'active';
           $btn_list = '';
			$btn_grid = 'active';
    }
    osc_add_hook('left-sidebar','sidebar');
    function sidebar(){
        osc_current_web_theme_path('search-sidebar.php');
    }
    osc_add_hook('footer','autocompleteCity');
    function autocompleteCity(){ ?>
    <script type="text/javascript">
		$('.searchbar').hide();
    $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php echo osc_esc_html( __('Selected', 'aiclassy') ); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php echo osc_esc_html( __('Nothing selected, input was', 'aiclassy') ); ?> " + this.value );
                        }
                    });
                });
    </script>
    <?php
    }
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<div class="clear"></div>
	<div class="row content">
        <?php osc_run_hook('left-sidebar'); ?>
        <div class="col-lg-9 content-right">
			<?php aiclassy_draw_breadcrumb(); ?>
            <?php osc_run_hook('search_ads_listing_top'); ?>
				<div class="search">
					<h2><?php echo search_title(); ?></h2>
					<?php if(osc_count_items() == 0) { ?>
						<p class="empty well" ><?php printf(__('There are no results matching "%s"', 'aiclassy'), osc_search_pattern()) ; ?></p>
						<?php 
						aiclassy_popular_ads_start();
						if( osc_count_items() == 0) { ?>
							
						<?php } else { 
							echo '<h5>'.__('Popular classifieds','aiclassy').'</h5>';
							View::newInstance()->_exportVariableToView("listType", 'items');
							View::newInstance()->_exportVariableToView("listClass",'listing-grid-aiclassy_items');
							osc_current_web_theme_path('loop.php');
						} 
						aiclassy_popular_ads_end();
					} else { ?>
					<div class="row">
						<div class="col-md-12 actions">
							<span class="counter-search"><?php
							$search_number = aiclassy_search_number();
							printf(__('%1$d - %2$d of %3$d listings', 'aiclassy'), $search_number['from'], $search_number['to'], $search_number['of']);
							?></span>
							 <?php /* <a href="#" data-bclass-toggle="display-filters" class="resp-toogle show-filters-btn"><?php _e('Show filters','aiclassy'); ?></a>
							  <span class="doublebutton <?php echo $buttonClass; ?>">
								   <a href="" class="list-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span><?php _e('List','aiclassy'); ?></span></a>
								   <a href="" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span><?php _e('Grid','aiclassy'); ?></span></a>
							  </span>*/ ?>
							  
							<div class="btn-group btn-sm pull-right">
								<a class="btn btn-primary btn-sm <?=$btn_list;?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'list'))); ?>"><span class="glyphicon glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
								<a class="btn btn-primary btn-sm <?=$btn_grid;?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sShowAs'=> 'gallery'))); ?>"><span class="glyphicon glyphicon glyphicon-th" aria-hidden="true"></span></a>
							</div>
							<!--     START sort by       -->
							<div class="btn-group btn-sm pull-right">
								<?php
							  $orders = osc_list_orders();
							  $current = '';
							  foreach($orders as $label => $params) {
								  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
								  if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
									  $current = $label;
								  }
							  }
							  ?>
							  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<?php _e('Sort by', 'aiclassy');echo ' '.$current; ?> <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" role="menu">
								  <?php $i = 0;
								  foreach($orders as $label => $params) {
									  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
									  <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
										  <li class="active"><a  href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
									  <?php } else { ?>
										  <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
									  <?php }
									  $i++; 
									  } ?>
							  </ul>
							</div>
							<?php /*<span class="see_by">
							  <span><?php _e('Sort by', 'aiclassy'); ?>:</span>
							  <?php
							  $orders = osc_list_orders();
							  $current = '';
							  foreach($orders as $label => $params) {
								  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
								  if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
									  $current = $label;
								  }
							  }
							  ?>
							  <label><?php echo $current; ?><b class="arrow-envelope"><b class="arrow-down"></b></b></label>
							  <?php $i = 0; ?>
							  <ul>
								  <?php
								  foreach($orders as $label => $params) {
									  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
									  <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
										  <li><a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
									  <?php } else { ?>
										  <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
									  <?php } ?>
									  <?php $i++; ?>
								  <?php } ?>
								</ul>
							</span>*/ ?>
							<!--     END sort by       -->
									
							<div class="clear"></div>
						</div>
					
						<div class="clear"></div>
					</div>
					<div class="premiums">
					<?php
						osc_get_premiums(4);
						if(osc_count_premiums() > 0) {
							echo '<h5>'.__('Premium listings','aiclassy').'</h5>';
							View::newInstance()->_exportVariableToView("listType", 'premiums');
							View::newInstance()->_exportVariableToView("listClass", $listClass);
							osc_current_web_theme_path('loop.php');
						}
					?>
					</div>
					 <?php if(osc_count_items() > 0) {
						echo '<h5>'.__('Search results','aiclassy').'</h5>';
						View::newInstance()->_exportVariableToView("listType", 'items');
						View::newInstance()->_exportVariableToView("listClass",$listClass);
						osc_current_web_theme_path('loop.php');
						?>

						<div class="clear"></div>
						<?php
						if(osc_rewrite_enabled()){
						$footerLinks = osc_search_footer_links();
						if(count($footerLinks)>0) {
						?>
						<div id="related-searches">
							<h5><?php _e('Other searches that may interest you','aiclassy'); ?></h5>
							<ul class="footer-links">
							  <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
							  <?php if($f['total'] < 3) continue; ?>
								<li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
							  <?php } ?>
							</ul>
						</div>
						<?php }
						} ?>
							<?php echo aiclassy_search_pagination(); ?>
						
					<?php } 
					} ?>
				</div>
						
		</div>
		
		<div class="col-lg-12">
			<div class="responsive-area-target">
			</div>
		</div>
	</div>
     
<?php osc_current_web_theme_path('footer.php') ; ?>
