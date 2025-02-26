<?php
    // meta tag robots
    osc_add_hook('header','aiclassy_follow_construct');
    $home_page = aiclassy_default_home_page();
?>
<?php osc_current_web_theme_path('header.php') ;
?>
	<script type="text/javascript" src="<?php echo osc_base_url().'oc-content/themes/aiclassy/js/slider.js' ?>"></script>
<div class="clear"></div>
<div class="row content">
	<?php switch($home_page ){ 
		case('category'): ?>
			<div class="col-lg-12">
				<?php aiclassy_show_flash_message(); ?>
			</div>
			<?php aiclassy_draw_categories_list_panel(); 
			break;
		case('map'): ?>
			<div class="col-lg-12">
				<?php aiclassy_show_flash_message(); ?>
				<div class="row">
					<div class="col-lg-4">
						<div class="visible-xs"><?php aiclassy_draw_top_regions(); ?></div>
						<div class="row map-sidebar visible-lg">
							<div class="row "><?php aiclassy_draw_search_form_1(); ?></div>
						</div>
					</div>
					<div class="col-lg-8 hidden-xs"><?php aiclassy_draw_panel_map();  ?></div>
					<div class="col-lg-4 hidden-lg">
						<div class="row"><?php aiclassy_draw_search_form_1(); ?></div>
					</div>
				</div>
			</div>
			<?php 
			break;
		case('category-navbar'):
		//empty now
			break;
	} ?>
	<div id="full-slider" class="col-lg-12 content-right">
		<?php if($home_page == 'slider'){
			osc_run_hook('main-banner'); 
			if(osc_get_preference('position@search', 'aiclassy_theme')=='slider'  && osc_is_home_page())
				aiclassy_draw_search_form_1('horizontal'); 
			}?>
	</div>
	<div class="col-lg-3 content-left">
		<div class="row">
			<?php if($home_page != 'map'){
				if(osc_get_preference('position@search', 'aiclassy_theme')=='vertical')
					aiclassy_draw_search_form_1('vertical');
			}?>
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
		<?php if($home_page == 'banner'){
			aiclassy_show_flash_message();
			osc_run_hook('main-banner'); 
		} elseif($home_page == 'category-navbar'){
			aiclassy_draw_carousel_items();
		}
		if(aiclassy_check_advertisement_area('layer_top')){
			if(osc_get_preference('navbar@theme', 'aiclassy_theme') != 'advs'){
				aiclassy_draw_advertisement_area('layer_top');
			}
		}
		$btn_list = '';
		$btn_grid = 'active';
		if(Params::getParam('sShowsAs') == 'list'){
			$btn_list = 'active';
			$btn_grid = '';
		}?>
		<div class="row">
			<div class="col-md-12 actions">
				<div class="btn-group btn-sm pull-right">
					<a class="btn btn-primary btn-sm <?=$btn_list;?>" href="<?php echo osc_esc_html(osc_base_url(true)."?sShowsAs=list");?>"><span class="glyphicon glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
					<a class="btn btn-primary btn-sm <?=$btn_grid;?>" href="<?php echo osc_esc_html(osc_base_url(true)."?sShowsAs=gallery"); ?>"><span class="glyphicon glyphicon glyphicon-th" aria-hidden="true"></span></a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php aiclassy_draw_home_layers(); ?>
	</div>
	<div class="col-md-12 hidden-lg content-left">
		<div class="row responsive-area-target">
			<div></div>
		</div>
	</div>
</div><!-- main -->

<div class="clear"><!-- do not close, use main clossing tag for this case -->
<?php osc_current_web_theme_path('footer.php') ; ?>
