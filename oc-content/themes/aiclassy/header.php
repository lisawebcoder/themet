<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo aiclassy_language_direction(); ?>" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php') ; ?>
        <script type="text/javascript" src="<?php echo osc_base_url().'oc-content/themes/aiclassy/js/WOW-master/dist/wow.js' ?>"></script>
        <script type="text/javascript" src="<?php echo osc_base_url().'oc-content/themes/aiclassy/js/animation.js' ?>"></script>
		<?php 
        	$home_page = aiclassy_default_home_page();
        	if($home_page != 'map'){ ?>
        		<script type="text/javascript" src="<?php echo osc_base_url().'oc-content/themes/aiclassy/js/jssor.slider.mini.js' ?>"></script>

        <?php	} 
        ?>    </head>
<body <?php aiclassy_body_class(); ?>>
<?php $sitenavbar=osc_get_preference('navbar@theme', 'aiclassy_theme');
if($sitenavbar == 'fixed'){ aiclassy_header(); } 
else if($sitenavbar == 'advs'){ aiclassy_header_2(); } ?>
<div class="container wrapper">
<div style="padding-top: 10px;"></div>
<?php osc_show_widgets('header'); ?>

    
    
<?php osc_run_hook('before-content'); ?>
<div class="" id="content">
    <?php osc_run_hook('before-main'); ?>
    <div id="main">
		<?php
		if(osc_get_preference('location@item', 'aiclassy_theme')=='show'){
			$city=$region=null;
			if(Params::getParam('sCity')){
				$city=osc_search_city();
			}
			if(Params::getParam('sRegion')){
				$region=osc_search_region();					  
			}
			aiclassy_set_cookie($city,$region);
			
		}
		$home_page = aiclassy_default_home_page();
		if($home_page == 'slider'){
			if(osc_get_preference('position@search', 'aiclassy_theme')=='horizontal')
				aiclassy_draw_search_form_1('horizontal');
			else if(osc_get_preference('position@search', 'aiclassy_theme')=='slider' && !(osc_is_home_page()))
				aiclassy_draw_search_form_1('horizontal');
		} else {
			if($home_page != 'banner-category'){
				if(osc_get_preference('position@search', 'aiclassy_theme')=='horizontal' || osc_get_preference('position@search', 'aiclassy_theme')=='slider')
					aiclassy_draw_search_form_1('horizontal');
			} elseif($home_page == 'banner-category' && !(osc_is_home_page())){
				if(osc_get_preference('position@search', 'aiclassy_theme')=='horizontal' || osc_get_preference('position@search', 'aiclassy_theme')=='slider')
					aiclassy_draw_search_form_1('horizontal');
			}
		}
		 ?>
        
