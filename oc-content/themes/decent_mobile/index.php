<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com).
	*
	*/

/*
Plugin Name: Decent Mobile Theme
Plugin URI: http://osclassmobile.com
Description: Decent Mobile Theme
Version: 1.0.0
Author: Disnap Tech
Author URI: http://disnap.com/
Short Name: decent_mobile
Plugin update URI: mobile-theme-android-app_2
*/
    function decent_mobile_call_after_install() {
			//Favorite Ads
			$conn = getConnection();
			$path = osc_plugin_resource('decent_mobile/favorite/struct.sql');
			$sql  = file_get_contents($path);
			$conn->osc_dbImportSQL($sql);
			
			//Touch to Drag
			osc_set_preference('touch_drag', '1', 'decent_mobile', 'BOOLEAN');
			//Header logo
			osc_set_preference('floating_header', '1', 'decent_mobile', 'BOOLEAN');
			//Header location
			osc_set_preference('header_location', '1', 'decent_mobile', 'BOOLEAN');
			//Homepage banner
			osc_set_preference('show_main_banner', '1', 'decent_mobile', 'BOOLEAN');
			//Homepage category display style
			osc_set_preference('category_display_style', 'grid', 'decent_mobile', 'STRING');
			osc_set_preference('categories_in_row', '3', 'decent_mobile', 'INTEGER');

			//Theme Color Scheme & Setting 
			osc_set_preference('theme_color', '#028bd1', 'decent_mobile', 'STRING');
			osc_set_preference('body_background', '#f3f3f3', 'decent_mobile', 'STRING');
			osc_set_preference('section_background', '#ffffff', 'decent_mobile', 'STRING');
			osc_set_preference('heading_color', '#354a5f', 'decent_mobile', 'STRING');
			osc_set_preference('text_color_1', '#ffffff', 'decent_mobile', 'STRING');
			osc_set_preference('text_color_2', '#5e5e5e', 'decent_mobile', 'STRING');
			osc_set_preference('btn_color_2', '#028bd1', 'decent_mobile', 'STRING');
			
			osc_set_preference('post_btn_bg', '#fceb42', 'decent_mobile', 'STRING');
			osc_set_preference('post_btn_color', '#494949', 'decent_mobile', 'STRING');
			osc_set_preference('post_btn_border', '#e1b70c', 'decent_mobile', 'STRING');
			
			//Slider settings
			osc_set_preference('home_premium_slider', '1', 'decent_mobile', 'BOOLEAN');
			osc_set_preference('home_latest_slider', '1', 'decent_mobile', 'BOOLEAN');
			osc_set_preference('detail_related_slider', '1', 'decent_mobile', 'BOOLEAN');
			
			osc_set_preference('slidesperview', '3', 'decent_mobile', 'INTEGER');
			osc_set_preference('slider_freemode', '1', 'decent_mobile', 'BOOLEAN');
			osc_set_preference('slider_loop', '1', 'decent_mobile', 'BOOLEAN');

			//Detail Page
			osc_set_preference('detail_public_info', '1', 'decent_mobile', 'BOOLEAN');
			osc_set_preference('detail_publisher_info', '1', 'decent_mobile', 'BOOLEAN');
			
		
			//Category Icon
			osc_set_preference('show_cat_id', '0', 'decent_mobile', 'BOOLEAN');
			osc_set_preference('cat_icon_color', '8BC34A', 'decent_mobile', 'STRING');
			

    }
	    function decent_mobile_call_after_uninstall() {
			Preference::newInstance()->delete( array("s_section" => "decent_mobile") );
			Preference::newInstance()->delete( array("s_section" => "decent_mobile_category_icon") );
			//Drop Favorte Ads
			$conn = getConnection();
			$conn->osc_dbExec('DROP TABLE %st_item_favorite_ads', DB_TABLE_PREFIX);
    }
	function decent_mobile_admin() {
        osc_admin_render_plugin('decent_mobile/admin/index.php');
    }
    function decent_mobile_action() {
		
        switch( Params::getParam('specific') ) {
            case('general'):
				//Touch to Drag Setting
				osc_set_preference('touch_drag', Params::getParam('touch_drag'), 'decent_mobile');
				//Heder style settings
				osc_set_preference('floating_header', Params::getParam('floating_header'), 'decent_mobile');
				//Heder location settings
				osc_set_preference('header_location', Params::getParam('header_location'), 'decent_mobile');
				//Homepage main banner
				osc_set_preference('show_main_banner', Params::getParam('show_main_banner'), 'decent_mobile');
				//Home premium ads slider settings
                osc_set_preference('home_premium_slider', Params::getParam('home_premium_slider'), 'decent_mobile');
				//Home latest ads slider settings
                osc_set_preference('home_latest_slider', Params::getParam('home_latest_slider'), 'decent_mobile');

				//Details  
                osc_set_preference('detail_related_slider', Params::getParam('detail_related_slider'), 'decent_mobile');
                osc_set_preference('detail_public_info', Params::getParam('detail_public_info'), 'decent_mobile');
                osc_set_preference('detail_publisher_info', Params::getParam('detail_publisher_info'), 'decent_mobile');

				
                osc_add_flash_ok_message(__('Decent mobile theme settings updated correctly',  'decent_mobile'), 'admin');
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;
            case('theme'):
				//Theme Color Scheme & Setting
                osc_set_preference('theme_color', Params::getParam('theme_color'), 'decent_mobile');
                osc_set_preference('body_background', Params::getParam('body_background'), 'decent_mobile');
                osc_set_preference('section_background', Params::getParam('section_background'), 'decent_mobile');
                osc_set_preference('heading_color', Params::getParam('heading_color'), 'decent_mobile');
                osc_set_preference('text_color_1', Params::getParam('text_color_1'), 'decent_mobile');
                osc_set_preference('text_color_2', Params::getParam('text_color_2'), 'decent_mobile');
                osc_set_preference('btn_color_2', Params::getParam('btn_color_2'), 'decent_mobile');
				
                osc_set_preference('post_btn_bg', Params::getParam('post_btn_bg'), 'decent_mobile');
                osc_set_preference('post_btn_color', Params::getParam('post_btn_color'), 'decent_mobile');
                osc_set_preference('post_btn_border', Params::getParam('post_btn_border'), 'decent_mobile');

				
                osc_add_flash_ok_message(__('Decent mobile theme settings updated correctly',  'decent_mobile'), 'admin');
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;
            case('slider'):
				
				//Slider settings
				osc_set_preference('slidesperview', Params::getParam('slidesperview'), 'decent_mobile');
                osc_set_preference('slider_freemode', Params::getParam('slider_freemode'), 'decent_mobile');
                osc_set_preference('slider_loop', Params::getParam('slider_loop'), 'decent_mobile');
				
                osc_add_flash_ok_message(__('Decent mobile theme settings updated correctly',  'decent_mobile'), 'admin');
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;
			case('upload_logo'):
			    $package = Params::getFiles('mobile_logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    $img = ImageResizer::fromFile($package['tmp_name']);
                    $ext = $img->getExt();
                    $logo_name     = 'mobile_logo';
                    $logo_name    .= '.'.$ext;
                    $path = osc_uploads_path() . $logo_name ;
                    $img->saveToFile($path);

                    osc_set_preference('mobile_logo', $logo_name, 'decent_mobile');

                    osc_add_flash_ok_message(__('The logo image has been uploaded correctly',   'decent_mobile'), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again",   'decent_mobile'), 'admin');
                }
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;
			case('remove'):
                $logo = osc_get_preference('mobile_logo','decent_mobile');
                $path = osc_uploads_path() . $logo ;
                if(file_exists( $path ) ) {
                    @unlink( $path );
                    osc_delete_preference('mobile_logo','decent_mobile');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The logo image has been removed',  'decent_mobile'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found",  'decent_mobile'), 'admin');
                }
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;
			case('upload_homeimage'):
                $package = Params::getFiles('homeimage');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    $img = ImageResizer::fromFile($package['tmp_name']);
                    $ext = $img->getExt();
                    $logo_name     = 'homeimage';
                    $logo_name    .= '.'.$ext;
                    $path = osc_uploads_path() . $logo_name ;
                    $img->saveToFile($path);

                    osc_set_preference('homeimage', $logo_name, 'decent_mobile');

                    osc_add_flash_ok_message(__('The banner image has been uploaded correctly',  'decent_mobile'), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again",  'decent_mobile'), 'admin');
                }
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;  
			case('remove_homeimage'):
                $logo = osc_get_preference('homeimage','decent_mobile');
                $path = osc_uploads_path() . $logo ;
                if(file_exists( $path ) ) {
                    @unlink( $path );
                    osc_delete_preference('homeimage','decent_mobile');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The banner image has been removed',  'decent_mobile'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found",  'decent_mobile'), 'admin');
                }
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
            break;
			case('categories_icons'):
				//Home category style
				osc_set_preference('category_display_style', Params::getParam('category_display_style'), 'decent_mobile');
				osc_set_preference('categories_in_row', Params::getParam('categories_in_row'), 'decent_mobile');
				//Category ID & Color
				osc_set_preference('show_cat_id',  Params::getParam('show_cat_id'), 'decent_mobile');
				osc_set_preference('cat_icon_color',  Params::getParam('cat_icon_color'), 'decent_mobile');
				//Category icon 
				$cat_icon  = Params::getParam('cat-icon');
				if($cat_icon){
					foreach($cat_icon as $cat_id => $icon_code)
					{
						osc_set_preference('cat-icon-'.$cat_id, $icon_code, 'decent_mobile_category_icon');
					}
				}
				osc_add_flash_ok_message(__('Category icons settings updated correctly',  'decent_mobile'), 'admin');
                echo osc_redirect_to(osc_admin_render_plugin_url().osc_plugin_folder(__FILE__).'admin/index.php');
			break;
		}
    }

	if( !function_exists('osc_uploads_url') ){
		function osc_uploads_url($item = ''){
			return osc_base_url().'oc-content/uploads/'.$item;
		}
	}
    if( !function_exists('decent_mobile_logo_url') ) {
        function decent_mobile_logo_url() {
            $logo = osc_get_preference('mobile_logo','decent_mobile');
            if( $logo ) {
                return osc_uploads_url($logo);
            }
            return false;
        }
    }
    if( !function_exists('decent_mobile_logo_header') ) {
        function decent_mobile_logo_header() {
             $logo = osc_get_preference('mobile_logo','decent_mobile');
             $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_esc_html( osc_page_title() ) . '" src="' . decent_mobile_logo_url() . '"></a>';
             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
                return $html;
             } else {
                return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';
            }
        }
    }

		if( !function_exists('decent_mobile_homeimage_url') ) {
        function decent_mobile_homeimage_url() {
            $logo = osc_get_preference('homeimage','decent_mobile');
            if( $logo ) {
                return osc_uploads_url($logo);
            }
            return false;
        }
    }
	if( !function_exists('homepage_image') ) {
        function homepage_image() {
             $logo = osc_get_preference('homeimage','decent_mobile');
             $html = '<img border="0" alt="' . osc_esc_html( osc_page_title() ) . '" src="' . decent_mobile_homeimage_url() . '">';
             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
                return $html;
             } else {
                return false;
            }
        }
    }

    osc_add_hook('init_admin', 'decent_mobile_action');
	
    function load_decent_mobile_theme( ) 
    {
        
        if(Params::getParam('desktop') != '') {
            if(Params::getParam('desktop') == 1) {
                Cookie::newInstance()->push('osc-decent_mobile-desktop', 'desktop') ;
                Cookie::newInstance()->set() ;
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                } 
                header('Location: ' . osc_base_url());
                exit;
            } else {
                Cookie::newInstance()->pop('osc-decent_mobile-desktop', 'decent_mobile') ;
                Cookie::newInstance()->set() ;
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                } 
                header('Location: ' . osc_base_url());
                exit;
            }
        }
        
        require_once dirname( osc_plugin_path(__FILE__) ) . '/UserAgentClass.php' ;
        $userAgent = new UserAgent() ;
        
        $desktopVersion = Cookie::newInstance()->get_value('osc-decent_mobile-desktop');
        
        if ( $userAgent->is_mobile() && $desktopVersion != 'desktop' ) {
            WebThemes::newInstance()->setPath( dirname( osc_plugin_path(__FILE__) ) . '/themes/' ) ;
            WebThemes::newInstance()->setCurrentTheme('decent_mobile') ;
            $functions_path = WebThemes::newInstance()->getCurrentThemePath() . 'functions.php';
            if(file_exists($functions_path)) {
                require_once $functions_path;
            }
        }
    }
    
    function show_switch() 
    {
        require_once dirname( osc_plugin_path(__FILE__) ) . '/UserAgentClass.php' ;
        $userAgent = new UserAgent() ;
        
        if ( $userAgent->is_mobile() ) {
            $url = osc_base_url(true).'?desktop=decent_mobile'; 
            echo '<a href="'.$url.'" data-role="none" class="ui-link">'. __('Switch to mobile version','decent_mobile').'</a>';
        }   
    }    

	
		
function decent_admin_menu() { 

	 osc_admin_menu_plugins(__('Decent Mobile Theme', 'decent_mobile'), osc_admin_render_plugin_url('decent_mobile/admin/index.php'), 'decent_mobile_submenu');
}


    // This is needed in order to be able to activate the plugin
    osc_register_plugin(osc_plugin_path(__FILE__), 'decent_mobile_call_after_install') ;
    // This is a hack to show a Uninstall link at plugins table (you could also use some other hook to show a custom option panel)
    osc_add_hook(osc_plugin_path(__FILE__) . '_uninstall', 'decent_mobile_call_after_uninstall') ;
    osc_add_hook(osc_plugin_path(__FILE__)."_configure", 'decent_mobile_admin');

    osc_add_hook('before_html', 'load_decent_mobile_theme') ;
	osc_add_hook('admin_menu_init','decent_admin_menu');
    
?>
