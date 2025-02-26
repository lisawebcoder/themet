<?php
/*
Plugin Name: Feature Banner
Plugin URI: http://aiosclassthemes.com/
Description: This plugin add featur banner functionalty for aiclass theme for osclass. AIClassy theme is developed by
<a href="http://aiosclassthemes.com/">aiosclassthemes.com</a>.
Version: 1.0.2
Author: aiosclassthemes
Author URI: http://aiosclassthemes.com/
Short Name: banner_plugin
Plugin update URI: 
*/

require_once 'ModelFeature.php';

// Adds some plugin-specific search conditions
function banner_search_conditions($params = null) {

}

function banner_call_after_install() {
    // Insert here the code you want to execute after the plugin's install
    // for example you might want to create a table or modify some values
    
    // In this case we'll create a table to store the Example attributes
    ModelBanner::newInstance()->import('feature_banner/struct.sql') ;
}

function banner_call_after_uninstall() {
    // Insert here the code you want to execute after the plugin's uninstall
    // for example you might want to drop/remove a table or modify some values
    
    // In this case we'll remove the table we created to store Example attributes
    ModelBanner::newInstance()->uninstall();
}

function banner_admin_menu() {
    if(osc_version()<320) {
        echo '<h3><a href="#">'.__('Banner plugin', 'feature_banner').'</a></h3>
        <ul>
			<li><a href="'.osc_admin_render_plugin_url("feature_banner/conf.php").'?section=types">&raquo; ' . __('Banners', 'feature_banner') . '</a></li>
        </ul>';
    } else {
        osc_add_admin_submenu_divider('plugins', __('Banner plugin', 'feature_banner'), 'feature_banner', 'administrator');
        osc_add_admin_submenu_page('plugins', __('Banners', 'feature_banner'), osc_admin_render_plugin_url("feature_banner/conf.php"), 'banner_conf', 'administrator');
    }
}


function banner_admin_configuration() {
    // Standard configuration page for plugin which extend item's attributes
    header("Location: ".osc_admin_render_plugin_url("feature_banner/conf.php"));
	die();
}


function banner_item_style(){
    //osc_plugin_url(__FILE__).'img/
    echo "<link href=\"".osc_plugin_url(__FILE__)."css/style.css\" rel=\"stylesheet\" type=\"text/css\" />";
}
function banner_slide_show(){ 
	/*$res=getBannerCount();
	 print_r($res);*/
	$ban_list = ModelBanner::newInstance()->getBannerListArray() ;
	if(count($ban_list)>1){
    $ban_URL  = ModelBanner::newInstance()->getbanner_uploadURL();
		echo '<div id="slides">';
          
		  foreach ($ban_list as $ban) {
				echo '<img alt="'.$ban['s_name'].'" src="'.$ban_URL.$ban['s_path'].'" onclick="window.open(\''.$ban['s_link'].'\')" />';
		  }
		echo   '<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
				<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
			  </div>';
	  }
}

// This is needed in order to be able to activate the plugin
osc_register_plugin(osc_plugin_path(__FILE__), 'banner_call_after_install');
// This is a hack to show a Configure link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__) . "_configure", 'banner_admin_configuration');
// This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
osc_add_hook(osc_plugin_path(__FILE__) . "_uninstall", 'banner_call_after_uninstall');


if(osc_version()<320) {
    osc_add_hook('admin_menu', 'banner_admin_menu');
} else {
    osc_add_hook('admin_menu_init', 'banner_admin_menu');
}

osc_add_hook('main-banner', 'banner_slide_show');

// Add styles
osc_add_hook('header', 'banner_item_style');
?>
