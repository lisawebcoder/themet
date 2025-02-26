<?php
/**

DEFINES

*/
    define('aiclassy_THEME_VERSION', '2.3.5');
    require_once 'feature_banner/ModelFeature.php';
    if( !osc_get_preference('keyword_placeholder', 'aiclassy_theme') ) {
        osc_set_preference('keyword_placeholder', 'Search', 'aiclassy_theme');
    }
    if( !osc_get_preference('defaultcolorscheme', 'aiclassy_theme') ) {
        osc_set_preference('defaultcolorscheme', 'flatly', 'aiclassy_theme');
    }
    
    /*/////////////////////*/
    if(Params::getParam('AIcolorscheme')){
		$AIcolor = array('flatly','cerulean','cosmo','cyborg','darkly','journal','paper','sandstone','simplex','slate','spacelab','superhero','yeti','united','lumen');
		if(in_array(Params::getParam('AIcolorscheme') ,$AIcolor)){
			Cookie::newInstance()->set_expires( 3600 ) ;
            Cookie::newInstance()->push('AIcolorscheme', Params::getParam('AIcolorscheme')) ;
            Cookie::newInstance()->set() ;
		}
	}
    if(Params::getParam('AIClassyheader')){
		$headerstyle = array('default','inverse');
		if(in_array(Params::getParam('AIClassyheader') ,$headerstyle)){
			Cookie::newInstance()->set_expires( 3600 ) ;
            Cookie::newInstance()->push('AIClassyheader', Params::getParam('AIClassyheader')) ;
            Cookie::newInstance()->set() ;
		}
	}
	
	function aiclassy_set_cookie($city=null,$region=null){
		if($city != Cookie::newInstance()->get_value('sCity') && $city != null) {	
			Cookie::newInstance()->set_expires( 3600 ) ;
			Cookie::newInstance()->push('sCity', $city);
			Cookie::newInstance()->set() ;
		}
		if($region != Cookie::newInstance()->get_value('sRegion') && $region != null) {	
			Cookie::newInstance()->set_expires( 3600 ) ;
			Cookie::newInstance()->push('sRegion', $region);
			Cookie::newInstance()->set() ;
		}
	}
    
	
    /*/////////////////////*/
    osc_register_script('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.pack.js'), array('jquery'));
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('fancybox');

    osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/font-awesome-4.2.0/css/font-awesome.min.css'));
    /*// used for date/dateinterval aiclassy fields*/
    osc_enqueue_script('php-date');
    if(!OC_ADMIN) {
        osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
        osc_enqueue_style('aiclassy-fine-uploader-css', osc_current_web_theme_url('css/ajax-uploader.css'));
    }
    osc_enqueue_script('jquery-fineuploader');

/**

FUNCTIONS

*/
    /**
     * Triger when theme installed first time
     *
     * 
     */
    if( !function_exists('aiclassy_theme_install') ) {
        function aiclassy_theme_install() {
            osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'aiclassy_theme');
            osc_set_preference('tclink', Params::getParam('tclink'), 'aiclassy_theme');
            osc_set_preference('defaultcolorscheme', Params::getParam('defaultcolorscheme'), 'aiclassy_theme');
            osc_set_preference('contact_us_map_link', 'https://mapsengine.google.com/map/u/0/embed?mid=zu4s91A4cnLo.kCAG34ybmnHs', 'aiclassy_theme');
            osc_set_preference('version', aiclassy_THEME_VERSION, 'aiclassy_theme');
            osc_set_preference('Homepage_display_option', 'banner', 'aiclassy_theme');
            osc_set_preference('footer_link', '1', 'aiclassy_theme');
            osc_set_preference('donation', '0', 'aiclassy_theme');
            osc_set_preference('defaultShowAs@all', 'gallery', 'aiclassy_theme');
            osc_set_preference('defaultShowAs@search', 'gallery');
            osc_set_preference('languagedisplay@gen', 'header', 'aiclassy_theme');
            osc_set_preference('advertise_link','http://aicheapwebhosting.com/', 'aiclassy_theme');
            
			osc_set_preference('noof_premium_listing', '4', 'aiclassy_theme');
            osc_set_preference('noof_popular_listing', '4', 'aiclassy_theme');
            osc_set_preference('noof_new_listing', '4', 'aiclassy_theme');
            osc_set_preference('noof_side_listing', '4', 'aiclassy_theme');
            osc_set_preference('layer_display_1', 'premium', 'aiclassy_theme');
            osc_set_preference('layer_display_2', 'newest', 'aiclassy_theme');
            osc_set_preference('layer_display_3', 'popular', 'aiclassy_theme');
            osc_set_preference('layer_sidebar', 'premium', 'aiclassy_theme');
            
            osc_set_preference('category@search', 'yes', 'aiclassy_theme');
            osc_set_preference('country@search', 'yes', 'aiclassy_theme');
            osc_set_preference('region@search', 'yes', 'aiclassy_theme');
            osc_set_preference('city@search', 'yes', 'aiclassy_theme');
            
            osc_set_preference('sociallink@facebook', 'https://www.facebook.com/aiosclassthemes', 'aiclassy_theme');
            osc_set_preference('sociallink@twitter', 'https://www.twitter.com/#', 'aiclassy_theme');
            osc_set_preference('sociallink@linkedin', 'https://www.linkedin.com/#', 'aiclassy_theme');
            
            
            osc_set_preference('reportlisting@item', 'show', 'aiclassy_theme');
            osc_set_preference('location@item', 'hide', 'aiclassy_theme');
            osc_set_preference('animation@gen', 'no', 'aiclassy_theme');
            osc_set_preference('header@theme', 'default' , 'aiclassy_theme');
            osc_set_preference('navbar@theme', 'fixed' , 'aiclassy_theme');
            osc_set_preference('slider@theme', 'images' , 'aiclassy_theme');
            osc_set_preference('facebook@page', 'hide' , 'aiclassy_theme');
            osc_set_preference('advertisements@dispay', 'hide' , 'aiclassy_theme');
            
            osc_reset_preferences();
            ModelBanner::newInstance()->import('aiclassy/feature_banner/struct.sql') ;
            /*//V2.2.0*/
            aiclassy_make_custom_page('terms-condition','Terms & condition');
            osc_set_preference('tclink', 'terms-condition', 'aiclassy_theme');
            aiclassy_make_custom_page('customajax','customajax',0);
            if (!is_dir(aiclassy_upload_path())) { 
				umask(0000);
				mkdir(aiclassy_upload_path(), 0755);
				mkdir(aiclassy_upload_path_favicon(), 0755);
				mkdir(aiclassy_upload_path_ads(), 0755);
				mkdir(aiclassy_upload_path_banner(), 0755);
			}
			/*//V2.2.3*/
			osc_set_preference('sociallink@googleplus', '#', 'aiclassy_theme');
			osc_set_preference('position@search', 'vertical', 'aiclassy_theme');
			profile_picture_install();
        }
    }
    /**
     * Triger when theme have an upldated version
     *
     */
    /*// update options*/
    if( !function_exists('aiclassy_theme_update') ) {
        function aiclassy_theme_update() {
			
            osc_set_preference('version', aiclassy_THEME_VERSION, 'aiclassy_theme');
            if( !osc_get_preference('defaultcolorscheme', 'aiclassy_theme') ) {
				osc_set_preference('defaultcolorscheme', 'flatly', 'aiclassy_theme');
			}
            if( !osc_get_preference('contact_us_map_link', 'aiclassy_theme') ) {
				osc_set_preference('contact_us_map_link', 'https://mapsengine.google.com/map/u/0/embed?mid=zu4s91A4cnLo.kCAG34ybmnHs', 'aiclassy_theme');
			}
            if( !osc_get_preference('Homepage_display_option', 'aiclassy_theme') ) {
				osc_set_preference('Homepage_display_option', 'banner', 'aiclassy_theme');
			}
			if( !osc_get_preference('languagedisplay@gen', 'aiclassy_theme') ) {
				osc_set_preference('languagedisplay@gen', 'header', 'aiclassy_theme');
			}
            if( !osc_get_preference('noof_premium_listing', 'aiclassy_theme') ) {
				osc_set_preference('noof_premium_listing', '4', 'aiclassy_theme');
			}
            if( !osc_get_preference('noof_popular_listing', 'aiclassy_theme') ) {
				osc_set_preference('noof_popular_listing', '4', 'aiclassy_theme');
			}
            if( !osc_get_preference('noof_new_listing', 'aiclassy_theme') ) {
				osc_set_preference('noof_new_listing', '4', 'aiclassy_theme');
			}
            if( !osc_get_preference('noof_side_listing', 'aiclassy_theme') ) {
				osc_set_preference('noof_side_listing', '4', 'aiclassy_theme');
			}
            if( !osc_get_preference('layer_display_1', 'aiclassy_theme') ) {
				osc_set_preference('layer_display_1', 'premium', 'aiclassy_theme');
			}
            if( !osc_get_preference('layer_display_2', 'aiclassy_theme') ) {
				osc_set_preference('layer_display_2', 'newest', 'aiclassy_theme');
			}
            if( !osc_get_preference('layer_display_3', 'aiclassy_theme') ) {
				osc_set_preference('layer_display_3', 'popular', 'aiclassy_theme');
			} 
            if( !osc_get_preference('layer_sidebar', 'aiclassy_theme') ) {
				osc_set_preference('layer_sidebar', 'premium', 'aiclassy_theme');
			} 
			if( !osc_get_preference('sociallink@facebook', 'aiclassy_theme') ) {
				osc_set_preference('sociallink@facebook', 'https://www.facebook.com/aiosclassthemes', 'aiclassy_theme');
			}
			if( !osc_get_preference('sociallink@twitter', 'aiclassy_theme') ) {
				osc_set_preference('sociallink@twitter', 'https://www.twitter.com/#', 'aiclassy_theme');
			}  
			if( !osc_get_preference('sociallink@linkedin', 'aiclassy_theme') ) {
				osc_set_preference('sociallink@linkedin', 'https://www.linkedin.com/#', 'aiclassy_theme');
			} 
			if( !osc_get_preference('keyword_placeholder', 'aiclassy_theme') ) {
				osc_set_preference('keyword_placeholder', 'Search', 'aiclassy_theme');
			} 
			if( !osc_get_preference('tclink', 'aiclassy_theme') ) {
				osc_set_preference('tclink', '', 'aiclassy_theme');
			} 
			if( !osc_get_preference('advertise_link', 'aiclassy_theme') ) {
				osc_set_preference('advertise_link','http://aicheapwebhosting.com/', 'aiclassy_theme');
			} 
			if( !osc_get_preference('header@theme', 'aiclassy_theme') ) {
				osc_set_preference('header@theme', 'default' , 'aiclassy_theme');
			}
			if( !osc_get_preference('navbar@theme', 'aiclassy_theme') ) {
				osc_set_preference('navbar@theme', 'fixed' , 'aiclassy_theme');
			}
			if( !osc_get_preference('slider@theme', 'aiclassy_theme') ) {
				osc_set_preference('slider@theme', 'images' , 'aiclassy_theme');
			}
			if( !osc_get_preference('reportlisting@item', 'aiclassy_theme') ) {
				osc_set_preference('reportlisting@item', 'show', 'aiclassy_theme');
			}
			if( !osc_get_preference('location@item', 'aiclassy_theme') ) {
				osc_set_preference('location@item', 'hide', 'aiclassy_theme');
			}
			if( !osc_get_preference('facebook@page', 'aiclassy_theme') ) {
				osc_set_preference('facebook@page', 'hide', 'aiclassy_theme');
			}
			if( !osc_get_preference('advertisements@dispay', 'aiclassy_theme') ) {
				osc_set_preference('advertisements@dispay', 'hide', 'aiclassy_theme');
			}
			if( !osc_get_preference('animation@gen', 'aiclassy_theme') ) {
				osc_set_preference('animation@gen', 'no', 'aiclassy_theme');
			}
			if(!osc_get_preference('category@search', 'aiclassy_theme')){
				osc_set_preference('category@search', 'yes', 'aiclassy_theme');
				osc_set_preference('country@search', 'yes', 'aiclassy_theme');
				osc_set_preference('region@search', 'yes', 'aiclassy_theme');
				osc_set_preference('city@search', 'yes', 'aiclassy_theme');
			}
            osc_delete_preference('default_logo', 'aiclassy_theme');
            osc_delete_preference('nooflistingtoshow', 'aiclassy_theme');
            
            
            /*$logo_prefence = osc_get_preference('logo', 'aiclassy_theme');
            $logo_name     = 'logo';
            $temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/logo.jpg';
            if( file_exists( $temp_name ) && !$logo_prefence) {

                $img = ImageResizer::fromFile($temp_name);
                $ext = $img->getExt();
                $logo_name .= '.'.$ext;
                $img->saveToFile(osc_uploads_path().$logo_name);
                @unlink($temp_name);
                osc_set_preference('logo', $logo_name, 'aiclassy_theme');
            }*/
            
            
            osc_reset_preferences();
            ModelBanner::newInstance()->import('aiclassy/feature_banner/struct.sql') ;
            
           /*//V2.2.0*/
            aiclassy_make_custom_page('terms-condition','Terms & condition');
            osc_set_preference('tclink', 'terms-condition', 'aiclassy_theme');
            aiclassy_make_custom_page('customajax','customajax',0);
            if (!is_dir(aiclassy_upload_path())) { 
				umask(0000);
				mkdir(aiclassy_upload_path(), 0755);
				mkdir(aiclassy_upload_path_favicon(), 0755);
				mkdir(aiclassy_upload_path_ads(), 0755);
				mkdir(aiclassy_upload_path_banner(), 0755);
			}
            /*//V2.2.3*/
			if( !osc_get_preference('sociallink@googleplus', 'aiclassy_theme') ) 
				osc_set_preference('sociallink@googleplus', '#', 'aiclassy_theme');
			if( !osc_get_preference('position@search', 'aiclassy_theme') ) 
				osc_set_preference('position@search', 'vertical', 'aiclassy_theme');
			profile_picture_install();
        }
    }
    /**
     * check installed version of aiclassy theme if exists
     *
     */
    if(!function_exists('check_install_aiclassy_theme')) {
        function check_install_aiclassy_theme() {
            $current_version = osc_get_preference('version', 'aiclassy_theme');
            /*//check if current version is installed or need an update<*/
            if( !$current_version ) {
                aiclassy_theme_install();
            } else if($current_version < aiclassy_THEME_VERSION){
                aiclassy_theme_update();
            }
        }
    }
	/**
     * add class to body tag
     *
     * @param string $classes
     * @return array 
     */
    if(!function_exists('aiclassy_add_body_class_construct')) {
        function aiclassy_add_body_class_construct($classes){
            $aiclassyBodyClass = aiclassyBodyClass::newInstance();
            $classes = array_merge($classes, $aiclassyBodyClass->get());
            return $classes;
        }
    }
    /**
     * Print body class attribute with classes.
     * 
     * @param string $echo Optional parameter.
     * @return print string with all body classes concatenated
     */
    if(!function_exists('aiclassy_body_class')) {
        function aiclassy_body_class($echo = true){
            osc_add_filter('aiclassy_bodyClass','aiclassy_add_body_class_construct');
            $classes = osc_apply_filter('aiclassy_bodyClass', array());
            if($echo && count($classes)){
                echo 'class="'.implode(' ',$classes).'"';
            } else {
                return $classes;
            }
        }
    }
    /**
     * Add new body class to body class array.
     *
     * @param string $class required parameter.
     */
    if(!function_exists('aiclassy_add_body_class')) {
        function aiclassy_add_body_class($class){
            
            $aiclassyBodyClass = aiclassyBodyClass::newInstance();
            $aiclassyBodyClass->add($class);
        }
    }
    /**
     * Print header class.
     *
     * @param string $echo Optional parameter.
     * @return print string with header class
     */
    if(!function_exists('aiclassy_header_class')) {
        function aiclassy_header_class($echo = true){
            $AIClassyheader ='default';
			if( Cookie::newInstance()->get_value('AIClassyheader') != '' ) {
				$session_var = Cookie::newInstance()->get_value('AIClassyheader');
				$headerstyle 		= array('default','inverse');
				if(in_array( $session_var,$headerstyle))
					$AIClassyheader = $session_var ;
			}else{
				if(getPreference('header@theme','aiclassy_theme'))
					$AIClassyheader = getPreference('header@theme','aiclassy_theme');
			}
            if($echo){
                echo $AIClassyheader;
            } else {
                return $AIClassyheader;
            }
        }
    }
    /**
        * Hook for header, meta tags robots nofollos
        */
    if(!function_exists('aiclassy_nofollow_construct')) {
        
        function aiclassy_nofollow_construct() {
            echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
            echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;

        }
    }
    /**
     * Hook for header, meta tags robots follow
     * 
     * 
     */
    if( !function_exists('aiclassy_follow_construct') ) {
        
        function aiclassy_follow_construct() {
            echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
            echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;

        }
    }
    /**
     * Print logo html.
     *
     */
    if( !function_exists('logo_header') ) {
        function logo_header() {
             $logo = osc_get_preference('logo','aiclassy_theme');
             $html = '<a href="'.osc_esc_html(osc_base_url()).'"><img border="0" alt="' . osc_page_title() . '" src="' . aiclassy_logo_url() . '"></a>';
             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {
                
                return '<a class="navbar-brand" rel="home" href="'.osc_esc_html(osc_base_url()).'" title="'. meta_title() .'" style="padding: 0px;">
					<img style="" alt="' . osc_page_title() . '" src="' . aiclassy_logo_url() . '" />
				  </a>';
             } else {
                return '<a class="navbar-brand" href="'.osc_esc_html(osc_base_url()).'">'.osc_page_title().'</a>';
            }
        }
    }
    /**
     * get uploaded site logo url if exists
     *
     * 
     * @return string logo_url
     */
    if( !function_exists('aiclassy_logo_url') ) {
        function aiclassy_logo_url() {
            $logo = osc_get_preference('logo','aiclassy_theme');
            if( $logo ) {
                return osc_uploads_url($logo);
            }
            return false;
        }
    }
    /**
     * Print Favicon links html
     *
     */
    if( !function_exists('aiclassy_draw_site_favicon') ) {
        function aiclassy_draw_site_favicon() {
			$Favicon_preference = osc_get_preference('favicon', 'aiclassy_theme');
            if(!$Favicon_preference){ ?>
				<link rel="shortcut icon" href="<?php echo osc_current_web_theme_url('favicon/favicon-48.png'); ?>" />
				<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo osc_current_web_theme_url('favicon/favicon-144.png'); ?>" />
				<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo osc_current_web_theme_url('favicon/favicon-114.png'); ?>" />
				<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo osc_current_web_theme_url('favicon/favicon-72.png'); ?>" />
				<link rel="apple-touch-icon-precomposed" href="<?php echo osc_current_web_theme_url('favicon/favicon-57.png'); ?>" />
			<?php }else{ ?>
				<link rel="shortcut icon" href="<?php echo aiclassy_upload_url_favicon().'favicon-48.'.$Favicon_preference.'?'.rand(0, pow(10, 5)); ?>" />
				<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo aiclassy_upload_url_favicon().'favicon-144.'.$Favicon_preference.'?'.rand(0, pow(10, 5)); ?>" />
				<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo aiclassy_upload_url_favicon().'favicon-114.'.$Favicon_preference.'?'.rand(0, pow(10, 5)); ?>" />
				<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo aiclassy_upload_url_favicon().'favicon-72.'.$Favicon_preference.'?'.rand(0, pow(10, 5)); ?>" />
				<link rel="apple-touch-icon-precomposed" href="<?php echo aiclassy_upload_url_favicon().'favicon-57.'.$Favicon_preference.'?'.rand(0, pow(10, 5)); ?>" />
			<?php } 
        }
    }
    /**
     * Include single listing print file
     *
     * @param boolen $class Optional parameter.
     * @param boolen $admin Optional parameter.
     * @param boolen $premium Optional parameter.
     * @param boolen $aiclassy_class Optional parameter.
     */
    if( !function_exists('aiclassy_draw_item') ) {
        function aiclassy_draw_item($class = false,$admin = false, $premium = false,$aiclassy_class = false) {
            $filename = 'loop-single';
            if($premium){
                $filename .='-premium';
            }
            require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';
        }
    }
    /**
     * Print 3 newest listing html.
     *
     * @param string $class Optional parameter.
     */
    if( !function_exists('aiclassy_draw_item_1') ) {
		function aiclassy_draw_item_1($class=""){ 
			echo '<div class="col-lg-12 col-md-6  col-sm-6 '.$class.' " >';
				echo '<h4>'.__("Newest classifieds", 'aiclassy').'</h4>';
				newest_3_listings();
				//popular_3_listings();
				if( osc_count_items() == 0) { ?>
					<div class="clear"></div>
					<p class="empty"><?php _e("There aren't listings available at this moment", 'aiclassy'); ?></p>
				<?php } else {
					View::newInstance()->_exportVariableToView("listType", 'items');
					View::newInstance()->_exportVariableToView("listClass",'aiclassy_items');
					osc_current_web_theme_path('loop.php');
					
					?>
					<p class="text-right show-more"><a href="<?php echo osc_esc_html(osc_search_show_all_url()) ; ?>"><?php _e("More", 'aiclassy'); ?></a></p>
					<div class="clear"></div>
					
				<?php } 
			echo '</div>';
			echo '<div class="clear"></div>';
        }
    }
    /**
     * Print carousel of new premium items html.
     *
     */
    if( !function_exists('aiclassy_draw_carousel_items') ) {
        function aiclassy_draw_carousel_items($class="responsive"){ ?>				
			<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('assets/slick/slick.css') ; ?>"/>
			<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url(	'assets/slick/slick-theme.css') ; ?>"/>
			<script type="text/javascript" src="<?php echo osc_current_web_theme_url('assets/slick/slick.min.js') ; ?>"></script>					
			<?php 
			$aItems=osc_get_premiums(intval(osc_get_preference('noof_premium_listing', 'aiclassy_theme')));
			if(aiclassy_default_home_page() == 'banner-category') $class="responsive-2";
			if(count($aItems) > 0) {
				echo '<h5>'.__('Premium classifieds','aiclassy').'</h5>';?>
				<div class="<?php echo $class; ?>" >
				<?php
					View::newInstance()->_exportVariableToView('items', $aItems);
					View::newInstance()->_exportVariableToView("listClass",'carousel-grid-aiclassy_items');
					osc_current_web_theme_path('loop.php');
					echo '</div>';
			}
			?>
			<script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/item-carousel.js') ; ?>"></script>		
		<?php 
		}
    }
    /**
     * Print new listing html.
     *
     */
    if( !function_exists('aiclassy_draw_home_items') ) {
        function aiclassy_draw_home_items(){
			newest_listings_show();
			if( osc_count_items() == 0) { 
				echo '<h5>'.__('Newest classifieds','aiclassy').'</h5>'; ?>
				<div class="clear"></div>
				<p class="empty"><?php _e("There aren't listings available at this moment", 'aiclassy'); ?></p>
			<?php } else { 
				View::newInstance()->_exportVariableToView("listType", 'items');
				if($_REQUEST['sShowsAs']!='list'){
					echo '<h5>'.__('Newest classifieds','aiclassy').'</h5>';
					View::newInstance()->_exportVariableToView("listClass",'listing-grid-aiclassy_items');
					osc_current_web_theme_path('loop.php');
				} else {						
					View::newInstance()->_exportVariableToView("listClass",'');
					if(osc_get_preference('layer_display_1', 'aiclassy_theme')!= 'carousel')
					echo '<div class="tab-pane fade" id="newest">';
					else
					echo '<div class="tab-pane fade" id="newest">';
					echo '<h5>'.__('Newest classifieds','aiclassy').'</h5>';
					osc_current_web_theme_path('loop.php');
					echo '</div>';
				}
			}
		}
    }
    /**
     * get display style of listing
     *
     * @return string with listing style
     */
    if( !function_exists('aiclassy_show_as') ){
        function aiclassy_show_as(){
            $p_sShowAs    = Params::getParam('sShowAs');
            $aValidShowAsValues = array('list', 'gallery');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = aiclassy_default_show_as();
            }
            return $p_sShowAs;
        }
    }
     /**
     * check advertisment area at specific position
     *
     * @param string $postion parameter.
     * @return boolen 
     */
    if( !function_exists('aiclassy_check_advertisement_area') ){
        function aiclassy_check_advertisement_area($postion=""){
			switch($postion){
				case( 'layer_top'):
					return aiclassy_confirm_advertisement_area(getPreference('adlink@layerTop','aiclassy_theme'),getPreference('adfile@layerTop','aiclassy_theme'));
				break;
				case( 'layer_bottom'):
					return aiclassy_confirm_advertisement_area(getPreference('adlink@layerBottom','aiclassy_theme'),getPreference('adfile@layerBottom','aiclassy_theme'));
				break;
				case( 'item_right_side'):
					return aiclassy_confirm_advertisement_area(getPreference('adlink@itemRightSide','aiclassy_theme'),getPreference('adfile@itemRightSide','aiclassy_theme'));
				break;
				default:
					return false;
				break;
			}
        }
    }
    /**
     * check advertisment area setting at specific position
     *
     * @param string $a_link parameter.
     * @param string $a_file parameter.
     * @return boolen 
     */
    if( !function_exists('aiclassy_confirm_advertisement_area') ){
        function aiclassy_confirm_advertisement_area($a_link,$a_file){
            $path = osc_uploads_path() . $a_file ;
            if(!file_exists( $path ) && !$a_link && !$a_file) {
				return false;
			}else{
				return true;
			}
        }
    }
    /**
     * get default display style of listing
     *
     * @return string with listing style
     */
    if( !function_exists('aiclassy_default_show_as') ){
        function aiclassy_default_show_as(){
            return getPreference('defaultShowAs@all','aiclassy_theme');
        }
    }
    /**
     * get default color scheme
     *
     * @return string with color scheme name
     */
    if( !function_exists('aiclassy_default_color_scheme') ){
        function aiclassy_default_color_scheme(){
			$AIcolorscheme ='flatly';
			if( Cookie::newInstance()->get_value('AIcolorscheme') != '' ) {
				$session_var = Cookie::newInstance()->get_value('AIcolorscheme');
				$AIcolor = array('flatly','cerulean','cosmo','cyborg','darkly','journal','paper','sandstone','simplex','slate','spacelab','superhero','yeti','united','lumen');
				if(in_array( $session_var,$AIcolor))
					$AIcolorscheme = $session_var ;
			}else{
				if(getPreference('defaultcolorscheme','aiclassy_theme'))
					$AIcolorscheme = getPreference('defaultcolorscheme','aiclassy_theme');
			}
            return $AIcolorscheme;
        }
    }
    /**
     * get default home page layout
     *
     * @return string with home page layout name
     */
    if( !function_exists('aiclassy_default_home_page') ){
        function aiclassy_default_home_page(){
            return getPreference('Homepage_display_option','aiclassy_theme');
        }
    }
    /**
     * 
     *
     * 
     */
    if( !function_exists('aiclassy_draw_categories_list') ) {
        function aiclassy_draw_categories_list(){
			
        }
    }
    /**
     * get select category box for post listing
     *
     * @return html of select categories
     */
    if( !function_exists('aiclassy_draw_select_categories_list') ) {
        function aiclassy_draw_select_categories_list(){ ?>
        <select id="catId" name="catId" class="form-control">
			<option value=""><?php _e("Select a category", 'aiclassy');?></option>
				<?php
				 osc_goto_first_category();
				 while ( osc_has_categories() ) {
                    $_slug      = osc_category_slug();
                    $_url       = osc_esc_html(osc_search_category_url());
                    $_name      = osc_category_name();
                    $_total_items = osc_category_total_items();?>
                    <optgroup label="<?php echo $_name ; ?>">
                    <?php if ( osc_count_subcategories() > 0 ) {
						while ( osc_has_subcategories() ) { ?>
                             <option value="<?php echo osc_category_id(); ?>">&nbsp;&nbsp;<?php echo osc_category_name() ; ?></option>
                        <?php }
                    } ?>
                 </optgroup>
             
        
				<?php
				}
				?>
        </select>
        <?php
        }
    }
    /**
     * get category dropdown on left sidebar
     *
     * @param string $class optional parameter.
     * @return html of category dropdown on left sidebar
     */    
    if( !function_exists('aiclassy_draw_categories_list_2') ) {
        function aiclassy_draw_categories_list_2($class=""){
			if(osc_get_preference('category@sidebar', 'aiclassy_theme')=='show'){ ?>
				<div class="col-lg-12 col-md-6 col-sm-6 <?php echo $class; ?>">
					<!-- <h4><?php //_e("Categories", 'aiclassy');?></h4> -->
					<div id="MainMenu">
						<div class="list-group panel categories">
						 <?php
						 osc_goto_first_category();
						 while ( osc_has_categories() ) {
							$_slug      = osc_category_slug();
							$_url       = osc_esc_html(osc_search_category_url());
							$_name      = osc_category_name();
							$_total_items = osc_category_total_items();
							$_catid		= osc_category_id();
							if ( osc_count_subcategories() > 0 ) { ?>
								<a data-parent="#MainMenu" data-toggle="collapse" class="category <?php echo $_catid; ?> list-group-item list-group-item-default collapsed caret-up-down" href="#category-<?php echo $_catid; ?>">
									<?php echo $_name ; ?> <span class="glyphicon glyphicon-chevron-down" ></span>
								</a>
								<div class="collapse list-subgroups" id="category-<?php echo $_catid; ?>">
								<?php while ( osc_has_subcategories() ) {
									if( osc_category_total_items() > 0 ) { ?>
										<a href="<?php echo osc_esc_html(osc_search_category_url()) ; ?>" class="list-group-item list-subgroup-item category sub-category <?php echo osc_category_id() ; ?>"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a>
									<?php } else { ?>
										<a class="list-group-item list-subgroup-item category sub-category <?php echo osc_category_id() ; ?>" href="#"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a> 
									<?php }
								} ?>
								</div>
								<?php }else{ ?>
									<a   class="category <?php echo $_catid; ?> list-group-item list-group-item-success " href="<?php echo $_url; ?>">
										<?php echo $_name ; ?> 
									</a>
								<?php }
							}
						?>
						</div><!--end .list-group.panel.categories div-->
					</div><!--end #MainMenu div-->
				</div>
			<?php
			}
        }
    }

        if( !function_exists('aiclassy_draw_categories_list_4') ) {
        function aiclassy_draw_categories_list_4($class=""){
            if(osc_get_preference('category@sidebar', 'aiclassy_theme')=='show'){ ?>
        <div class="container">
        <div class="hero">
            <div id="vertical" class="hovermenu ttmenu dark-style menu-color-gradient">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <!--<a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>-->
                    </div><!-- end navbar-header -->
        
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                         <?php
                         osc_goto_first_category();
                         $j = 0; 
                         while ( osc_has_categories() ) {
                            $_slug      = osc_category_slug();
                            $_url       = osc_esc_html(osc_search_category_url());
                            $_name      = osc_category_name();
                            $_total_items = osc_category_total_items();
                            $_catid     = osc_category_id();
                            if ( osc_count_subcategories() > 0 ) { ?>
                                <li class="dropdown ttmenu-full"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?php echo $_name ; ?> <b class="dropme"></b></a>
                                    <ul id="first-menu" class="dropdown-menu vertical-menu">
                                        <li>
                                        <div class="ttmenu-content">
                                            <div class="tabbable row">
                                                <div class="col-md-3">
                                                    <ul class="nav nav-pills nav-stacked">

                                                    <?php
                                                    $i = 0 ; 
                                                     while ( osc_has_subcategories() ) { 
														$scat     = osc_category_id(); ?>
                                                        <li <?php if($i == 0 ) echo 'class=active'; ?> ><a href="#tabs<?php echo $j; ?>-pane<?php echo ++$i; ?>" data-toggle="tab"><?php echo osc_category_name() ; ?></a></li>
                                                        <?php 
                                                    } ?>
                                                </ul>
                                            </div><!-- end col -->
                                            <div class="col-md-9">
                                                <div class="tab-content">
                                                <?php 
                                                $i = 0 ; 
                                                while ( osc_has_subcategories() ) { 
													$scat     = osc_category_id(); ?>
                                                    <div id="tabs<?php echo $j; ?>-pane<?php echo ++$i; ?>" class="tab-pane <?php if($i == 1 ) echo 'active'; ?>">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div class="box">
                                                                    <ul>
                                                                        <li><h4><?php echo __("Featured classifieds", 'aiclassy'); ?></h4></li>
                                                                        <?php aiclassy_draw_item_4('popular',$scat); ?>
                                                                    </ul>
                                                                </div><!-- end box -->
                                                            </div><!-- end col -->
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <div class="box">
                                                                        <ul>
                                                                            <li><h4><?php echo __("Newest classifieds", 'aiclassy'); ?></h4></li>
                                                                           <?php aiclassy_draw_item_4('new',$scat); ?>
                                                                        </ul>
                                                                    </div><!-- end box -->
                                                            </div><!-- end col -->
                                                        </div><!-- end row --> 
                                                    </div>                                                                         
                                    <?php 
                                } ?> 
                                                </div><!-- /.tab-content -->
                                            </div><!-- end col -->
                                        </div><!-- /.tabbable -->
                                    </div><!-- end ttmenu-content -->
                                    </li>
                                </ul>                               
                            </li>
                                <?php }else{ ?>
                                    <a   class="category <?php echo $_catid; ?> list-group-item list-group-item-success " href="<?php echo $_url; ?>">
                                        <?php echo $_name ; ?> 
                                    </a>
                                <?php }
                                $j++;
                            } 
                        ?>
 
                            <!-- end aiclassy menu -->
                        </ul><!-- end nav navbar-nav -->
                    </div><!--/.nav-collapse -->
                </div><!-- end navbar navbar-default clearfix -->
            </div><!-- end menu 1 -->  
        </div><!-- end hero -->  
    </div><!-- /container -->
            <?php
            }
        }
    }
    /**
     * get multilevel category dropdown on left sidebar
     *
     * @param string $class optional parameter.
     * @return html of category dropdown on left sidebar
     */
    if( !function_exists('aiclassy_draw_categories_list_3') ) {
        function aiclassy_draw_categories_list_3($class=""){
			if(osc_get_preference('category@sidebar', 'aiclassy_theme')=='show'){ ?>
				<div class="col-lg-12 col-md-6 col-sm-6 <?php echo $class; ?>">
					<!-- <h4><?php //_e("Categories", 'aiclassy');?></h4> -->
					<div id="MainMenu">
						<div class="list-group panel categories">
						 <?php
						 $category=osc_get_categories();
						 
						 if ( $category == '' ) return -1;
						 
						$myDropdown ='';
						foreach($category as $arr){						 
							
							$myDropdown .= createDropDown($arr);
						}
						echo $myDropdown;
			?>
						</div><!--end .list-group.panel.categories div-->
					</div><!--end #MainMenu div-->
				</div>
			<?php }
        }
    }
    /**
     * get category for left sidebar
     *
     * @param array $arr parameter.
     * @return html of a category dropdown for left sidebar
     */
    function createDropDown($arr){
      $str = '';
      
      if(is_array($arr)){
		  $str .= '<a data-parent="#MainMenu" data-toggle="collapse" class="category '. $arr['pk_i_id'] .' list-group-item list-group-item-default collapsed caret-up-down" href="#category-'. $arr['pk_i_id'] .'">
		  '. $arr['s_name'] .'<span class="glyphicon glyphicon-chevron-down" ></span>
		  </a>';
		  $str .= '<div class="collapse list-subgroups" id="category-'.$arr['pk_i_id'] .'">';
		 
         if(!empty($arr['categories'])){
			 //~ echo '<pre>';
			 //~ echo print_r($arr['categories']);
			 //~ echo '</pre>';
			 //~ exit();
			//~ $str .='<ul class="dropdown-menu" role="menu">';
			$str .= createsubDropDown($arr['categories']);   
			              //~ 
			//~ $str .="</ul>";
         }
         $str .= "</div>";               
      }
     return $str;  
	}
	/**
     * get sub categories for a category
     *
     * @param array $arr parameter.
     * @return html of a sub category for a category
     */
	function createsubDropDown($arr){
	  $str = '';
	  if(is_array($arr)){	
		 foreach ($arr as $arr2) {
			 $url = osc_search_url(array('sCategory' => $arr2['pk_i_id'])); 
			 $items=osc_field($arr2,"i_num_items", "");
			 $name = $arr2['s_name'];
			 $id = $arr2['pk_i_id'];
			 if($items>0){
				 $str .= '<a href="'.$url.'" class="list-group-item list-subgroup-item category sub-category '.$id.'">'.$name.' <span>('.$items.')</span></a>';
			 }
			 else{
				 $str .= '<a href="#" class="list-group-item list-subgroup-item category sub-category '.$id.'">'.$name.' <span>('.$items.')</span></a>';
			 }
			
			  if(!empty($arr2['categories'])){
				 //$str .='<i class="fa fa-level-up fa-rotate-90 fa-lg"></i><div class="indent">';
				 $str .='<div class="indent" style="margin-left: 15px;">';
				 $str .= createsubDropDown($arr2['categories']);                   
				 $str .="</div>";
			  }
		 }
		 //$str .= "</li>";               
	  }
	 return $str;  
	}	
    /**
     * get region search url
     *
     * @param string $region_id parameter.
     * @return string region search url
     */ 
    if( !function_exists('map_region_url') ) {
		function map_region_url($region_id) {
			$regionData = Region::newInstance()->findByPrimaryKey($region_id);
			if( function_exists('osc_subdomain_type') ) {
				if(osc_subdomain_type()=='region' || osc_subdomain_type()=='category' || osc_subdomain_type()=='country') {
					return osc_update_search_url(array('sRegion' => $regionData['s_name']));
				} else {
					// If osc_subdomain_type == 'city', redirect to base domain.
					if(osc_rewrite_enabled()) {
						$url    = osc_base_url();
					} else {
						$url    = osc_base_url(true);
					}

					// remove subdomain from url
					if(osc_subdomain_type()!='') {
						$aParts = explode('.', $url);
						unset($aParts[0]);
						// http or https
						$url = 'http://';
						if( isset($_SERVER['HTTPS']) ) {
							if( strtolower($_SERVER['HTTPS']) == 'on' ){
								$url = 'https://';
							}
						}
						$url .= implode('.', $aParts);
					}
					if(osc_rewrite_enabled()) {
						if (osc_get_preference('seo_url_search_prefix') != '') {
							$url .= osc_get_preference('seo_url_search_prefix') . '/';
						}
						$url .= osc_sanitizeString($regionData['s_name']) . '-r' . $regionData['pk_i_id'];

					} else {
						$url .= '?page=search&sRegion='. $regionData['s_name']; // osc_update_search_url(array('sRegion' => $regionData['s_name']));

					}
					return osc_esc_html($url);
				}
			} else {
				return osc_esc_html(osc_search_url(array('sRegion' => $regionData['s_name'])));
			}
		}
	}
	 /**
     * Print category navbar on top
     *
     * @param string $class optional parameter.
     * @return html of category navbar on top
     */ 
	if( !function_exists('aiclassy_draw_panel_categories_navbar') ) {
        function aiclassy_draw_panel_categories_navbar($class=""){ 
			$active_p_id = null;
			$active_c_id = null;
			$location = osc_get_osclass_location();
			if($location=='search'){
				$category = osc_search_category();
				if(isset($category) && !empty($category) ) {
					 $category = Category::newInstance()->findByPrimaryKey($category[0]);
					 if(!empty($category['fk_i_parent_id'])){
						$active_p_id = $category['fk_i_parent_id'];
						$active_c_id = $category['pk_i_id'];
					 }else{
						 $active_p_id = $category['pk_i_id'];
					 }
				 }
			}elseif($location=='item'){
				//$active_p_id = 
				//$active_c_id = 
			}
			osc_goto_first_category();
			$i      = 0;
			$catcount=0;
			while ( osc_has_categories() ) {
				$_slug      = osc_category_slug();
				$_url       = osc_esc_html(osc_search_category_url());
				$_name      = osc_category_name();
				$_total_items = osc_category_total_items();
				$_catid		= osc_category_id();
				$_catid == $active_p_id ? $main_active = 'active' : $main_active = '' ;
				if ( osc_count_subcategories() > 0 ) { ?>
					<li class="dropdown <?php echo $main_active; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_name ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php while ( osc_has_subcategories() ) {
								osc_category_id() == $active_c_id ? $sub_active = 'active' : $sub_active = '' ;
								if( osc_category_total_items() > 0 ) { ?>
									<li class="<?php echo $sub_active; ?>"><a href="<?php echo osc_esc_html(osc_search_category_url()) ; ?>"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a></li>
									
								<?php } else { ?>
									<li class="<?php echo $sub_active; ?>"><a href="#"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a></li>
									
								<?php }
							} ?>
						</ul>
					</li>
				<?php }else{ ?>
					<li class="<?php echo $main_active; ?>"><a class="<?php echo $_catid; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?> </a></li>
				<?php } 
			}
        }
    }/**
     * Print category navbar on top
     *
     * @param string $class optional parameter.
     * @return html of category navbar on top
     */ 
	if( !function_exists('aiclassy_draw_panel_categories_navbar_new') ) {
        function aiclassy_draw_panel_categories_navbar_new($class=""){ 
			$active_p_id = null;
			$active_c_id = null;
			$location = osc_get_osclass_location();
			if($location=='search'){
				$category = osc_search_category();
				if(isset($category) && !empty($category) ) {
					 $category = Category::newInstance()->findByPrimaryKey($category[0]);
					 if(!empty($category['fk_i_parent_id'])){
						$active_p_id = $category['fk_i_parent_id'];
						$active_c_id = $category['pk_i_id'];
					 }else{
						 $active_p_id = $category['pk_i_id'];
					 }
				 }
			}elseif($location=='item'){
				//$active_p_id = 
				//$active_c_id = 
			}
			osc_goto_first_category();
			$i      = 0;
			$catcount=0;
			while ( osc_has_categories() ) {
				$_slug      = osc_category_slug();
				$_url       = osc_esc_html(osc_search_category_url());
				$_name      = osc_category_name();
				$_total_items = osc_category_total_items();
				$_catid		= osc_category_id();
				$_catid == $active_p_id ? $main_active = 'active' : $main_active = '' ;
				if ( osc_count_subcategories() > 0 ) { ?>
					<li class="dropdown <?php echo $main_active; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $_name ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php while ( osc_has_subcategories() ) {
								osc_category_id() == $active_c_id ? $sub_active = 'active' : $sub_active = '' ;
								if( osc_category_total_items() > 0 ) { ?>
									<li class="<?php echo $sub_active; ?>"><a href="<?php echo osc_esc_html(osc_search_category_url()) ; ?>"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a></li>
									
								<?php } else { ?>
									<li class="<?php echo $sub_active; ?>"><a href="#"><?php echo osc_category_name() ; ?> <span>(<?php echo osc_category_total_items() ; ?>)</span></a></li>
									
								<?php }
							} ?>
						</ul>
					</li>
				<?php }else{ ?>
					<li class="<?php echo $main_active; ?>"><a class="<?php echo $_catid; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?> </a></li>
				<?php } 
			}
        }
    }
    /**
     * Print category navbar on top
     *
     * @param string $class optional parameter.
     * @return html of category navbar on top
     */ 
	if( !function_exists('aiclassy_draw_panel_categories_navbar4') ) {
        function aiclassy_draw_panel_categories_navbar4($class=""){
			$active_p_id = null;
			$active_c_id = null;
			osc_goto_first_category();
			$i      = 0;
			$catcount=0;
			while ( osc_has_categories() ) {
				$_catid		= osc_category_id();
				osc_query_item(array(
					"category" => $_catid,
					"results_per_page" => "2"
				));?>
				<li class="dropdown <?php echo $main_active; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo osc_category_name(); ?> <span class="caret"></span></a>
						<ul class="dropdown-menu"><div class='col-md-12'><?php
				while ( osc_has_custom_items() ) {?>			
						<div class="col-md-5 thumbnail <?php if(osc_item_is_premium()){ echo ' premium'; } ?>" style="margin: 5px;">
						 <?php if( osc_images_enabled_at_items() ) { ?>
						 <a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>">
							<?php if(osc_count_item_resources()) { ?>
								<img class="media-object" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"  />
							<?php } else { ?>
								<img class="media-object" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"  />
							<?php } ?>
							</a>
						<?php } ?>
						 <div class="caption text-center">
						   <p><small><a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><?php echo osc_highlight( osc_item_title() ,20) ; ?></a></small></p>
						   <p><small><strong><?php if( osc_price_enabled_at_items() ) { ?><?php echo osc_highlight(osc_format_price(osc_item_price()),20); ?><?php } ?></strong></small></p>
						 </div>
					   </div>
					<?php					
				}
				echo '</div></ul></li>';
				//echo "<pre>";print_r(osc_count_custom_items());echo "</pre><br>";
				//break;
									
			}
			//exit();
        }
    }
    /**
     * Print Multilevel category navbar on top
     *
     * @param string $class optional parameter.
     * @return html of category navbar on top
     */
    if( !function_exists('aiclassy_draw_panel_categories_navbar3') ) {
        function aiclassy_draw_panel_categories_navbar3($class=""){
			$category=osc_get_categories();
			if ( $category == '' ) return -1;        
			//if ( !isset($category['categories']) ) return 0;
			//if ( !is_array($category['categories']) ) return 0;
			
			$myMenu ='';
			foreach($category as $arr){
				$myMenu .= createMenu($arr);
			}
			echo $myMenu;
			
        }
    }
    /**
     * Print category for navbar on top
     *
     * @param array $arr parameter.
     * @return html of a category for navbar on top
     */
   	function createMenu($arr){
	  $str = '';
	  if(is_array($arr)){
		  
		 $str .= '<li class="dropdown"><a class="dropdown-toggle" aria-expanded="false"  role="button"  data-toggle="dropdown" href="#">'.$arr['s_name'] .'<b class="caret"></b></a>';
		 if(!empty($arr['categories'])){
			$str .='<ul class="dropdown-menu" role="menu">';
			$str .= createsubMenu($arr['categories']);   
						  
			$str .="</ul>";
		 }
		 $str .= "</li>";               
	  }
	 return $str;  
	}
	/**
     * Print sub categories for Categories
     *
     * @param array $arr parameter.
     * @return html of a sub categories for categories
     */
	function createsubMenu($arr){
	  //
				 
	  $str = '';
	  if(is_array($arr)){	
		 foreach ($arr as $arr2) {
			 $url = osc_search_url(array('sCategory' => $arr2['pk_i_id'])); 
			 $items=osc_field($arr2,"i_num_items", "");
			 if(count($arr2['categories'])>0){
				
				 $str .= '<li class="dropdown-submenu"><a href="'.$url.'">' . $arr2['s_name'] . ' <span>('.$items.')</span></a>';
			}
			else{
				
				$str .= '<li class=""><a href="'.$url.'">' . $arr2['s_name'] . ' <span>('.$items.')</span></a>';
			}
			 if(!empty($arr2['categories'])){
				$str .='<ul class="dropdown-menu">';
				$str .= createsubMenu($arr2['categories']);                   
				$str .="</ul>";
			 }
		 }
		 $str .= "</li>";               
	  }
	  //echo '<pre>';print_r($str);exit();
	 return $str;  
	}

    /**
     * Print Map layout section on home page
     *
     * @return html of Map layout section on home page
     */ 
    if( !function_exists('aiclassy_draw_panel_map') ) {
        function aiclassy_draw_panel_map(){
			if(osc_get_preference('country@map', 'aiclassy_theme')){ ?>
			<div class="row">
				<div class="col-lg-12">
				<script src="<?=osc_current_web_theme_js_url('jquery.uniform.js');?>" type="text/javascript" ></script>
				<div id="main-map" style="margin:15px auto;" >
                    <?php osc_current_web_theme_path('map/'.osc_get_preference('country@map', 'aiclassy_theme').'.php') ; ?>
				</div>
				<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.maphilight.min.js') ; ?>"></script>
				
				<script type="text/javascript">
				$(function() {
					var linksRegions = new Array();
					var statsRegions = new Array();
				<?php
					$regions = json_decode(osc_get_preference('region_maps','aiclassy_theme'),true);
					if($regions){
						foreach($regions as $key => $value){
							$regionData  = Region::newInstance()->findByPrimaryKey($value);
							$regionStats = RegionStats::newInstance()->findByRegionId($value);
							echo "    linksRegions['$key'] = '".map_region_url($value)."';".PHP_EOL;
							echo "    statsRegions['$key'] = {name:'".osc_esc_js($regionData['s_name'])."', count:'".$regionStats['i_num_items']."'};".PHP_EOL;
						}
					}
				?>
					//find all regions map has assigned a location
					$('area').each(function(){
						var $_hasClass  = $(this).attr('class'); //catching
						var $_index     = $('area:not([class^="group"])').index($(this));
						var colorStatus = true;

						$(this).click(function(){
							var key = $_index;
							if(typeof $_hasClass != 'undefined' && $_hasClass != ''){
								 key = $_hasClass;
							}
							if(typeof linksRegions[key] != 'undefined'){
								window.location.href = linksRegions[key];
							}
							return false;
						}).hover(function(e){
							var key     = $_index;
							var canvas  = undefined;
							if(typeof $_hasClass != 'undefined' && $_hasClass != ''){
								 key = $_hasClass;
							}
							if(typeof statsRegions[key] != 'undefined') {
								var $ext_x=80,$ext_y=145;
								if ( $('.map-sidebar.visible-lg').is(':visible') && $('html').attr('dir')=='ltr') {
									$ext_x=500;$ext_y=80;
								}
								$('#map-tooltip').html(statsRegions[key].name + ': '+statsRegions[key].count + ' ads').css({
									top: e.pageY-$ext_y,
									left: e.pageX-$ext_x
								}).show();
								canvas = document.getElementById("map-hover");
								canvas.width = canvas.width;
								options = {
									lineColor:  '#de9200',
									fillColor:  '#ffa800',
									fade: true,
									wrapClass: 'transistion'
								}
								if($(this).attr('class') != '' && typeof $(this).attr('class') != 'undefined'){
									$('.'+$(this).attr('class')).each(function(){
										drawCanvas('map-hover', $(this).attr('coords'), options);
									});
								} else {
									drawCanvas('map-hover', $(this).attr('coords'), options);
								}
							}
						},function(){
							canvas       = document.getElementById("map-hover");
							canvas.width = canvas.width;
							$('#map-tooltip').hide();
						});
					});
				});
				</script>
				<div id="map-tooltip"></div>
				</div>
			</div>
			<div class="clear"></div>
		<?php }
		}
	}
	 /**
     * Print top listing regions
     *
     * @param int $i_count optional parameter.
     * @param string $s_country optional parameter.
     * @return html of top listing regions
     */ 
    if( !function_exists('aiclassy_draw_top_regions') ) {
        function aiclassy_draw_top_regions($i_count = 20,$s_country = '%%%%'){ 
			$i_loop_count =0 ;
			if(osc_get_preference('country@map', 'aiclassy_theme'))
				$s_country = osc_get_preference('country@map', 'aiclassy_theme');
			View::newInstance()->_exportVariableToView('list_regions', RegionStats::newInstance()->listRegions($s_country,'>','items DESC') );
			
			if(View::newInstance()->_count('list_regions')>0){
				 ?>
				<div class="panel panel-default">
                 <div class="panel-heading">
                  <strong><?php _e('Top listing regions','aiclassy') ; ?></strong>
                 </div>
                 <div class="list-group">
                 <?php while(osc_has_list_regions()) { ?>
					 <a class="list-group-item list-subgroup-item" href="<?php echo osc_esc_html(osc_search_url(array('sRegion' => osc_list_region_name())));?>"><?php echo osc_list_region_name() ; ?> <span class="badge">(<?php echo osc_list_region_items() ; ?>)</span></a>
					<?php $i_loop_count++; 
					if ($i_loop_count==$i_count) {
						break;
					} 
					} ?>
                 </div>
                </div>
				<?php 
			}
			View::newInstance()->_erase('list_regions') ;
		}
	}
	/**
     * Print Category layout section on home page
     *
     * @return html of Category layout section on home page
     */ 
    if( !function_exists('aiclassy_draw_categories_list_panel') ) {
        function aiclassy_draw_categories_list_panel(){ ?>
        <div class="row">
         <?php
         //cell_3
        $total_categories   = osc_count_categories();
        $col1_max_cat       = ceil($total_categories/4);

         osc_goto_first_category();
         $i      = 0;

         while ( osc_has_categories() ) { ?>
            <div class="col-md-3 col-sm-6">
				<div class="panel panel-default">
                 <div class="panel-heading">
                    <?php
                    $_slug      = osc_category_slug();
                    $_url       = osc_esc_html(osc_search_category_url());
                    $_name      = osc_category_name();
                    $_total_items = osc_category_total_items();
                    $_id = osc_category_id();
                    if ( osc_count_subcategories() > 0 ) { ?>
                    <span class="collapse resp-toogle"><i class="fa fa-caret-right fa-lg"></i></span>
                    <?php } ?>
                    <a class="category <?php echo $_id; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?></a> <span>(<?php echo $_total_items ; ?>)</span><a class="badge view-all pull-right" rel='<?php echo $_id; ?>'><i class="fa fa-plus"></i></a>
                 </div>
                 <?php if ( osc_count_subcategories() > 0 ) { ?>
                   <div class="list-group home-panel-category <?php echo $_id; ?>" style="min-height:113px;">
                         <?php while ( osc_has_subcategories() ) { ?>
                             
                             <?php if( osc_category_total_items() > 0 ) { ?>
                                 <a class="list-group-item list-subgroup-item home-panel-subcategory <?php echo osc_category_id() ; ?>" href="<?php echo osc_esc_html(osc_search_category_url()) ; ?>"><?php echo osc_category_name() ; ?> <span class="badge"><?php echo osc_category_total_items() ; ?></span></a>
                             <?php } else { ?>
                                 <a class="list-group-item list-subgroup-item home-panel-subcategory <?php echo osc_category_id() ; ?>" href="#"><?php echo osc_category_name() ; ?> <span class="badge"><?php echo osc_category_total_items() ; ?></span></a>
                             <?php } ?>
                         <?php } ?>
                   </div>
                 <?php } ?>
				</div> 
			</div> <!--end col-md-3-->
        <?php
                $i++;
            }
            
        ?>
        </div>
        <?php
        }
    }
    /**
     * Print breadcrumb
     *
     * @return html of breadcrumb
     */ 
    if( !function_exists('aiclassy_draw_breadcrumb') ) {
        function aiclassy_draw_breadcrumb() { 
			$breadcrumb = osc_breadcrumb('', false, get_breadcrumb_lang());
			if( $breadcrumb !== '') {
				echo $breadcrumb; ?>
				<div class="clear"></div>
			  <?php
			}
			aiclassy_show_flash_message();
		}
    }
    /**
     * Print advertisement area
     *
     * @param string $class parameter.
     * @return html of advertisement area.
     */ 
    if(!function_exists('aiclassy_draw_advertisement_area')) {
        function aiclassy_draw_advertisement_area($class=""){
			$pref_image		= 'advertise_image';
            $pref_link		= 'advertise_link';
            $ad =array();
            $ad['formate']	= 'rectangle';
			$ad['height']	= '255';
            switch($class){
				case('general_sidebar'):
					$pref_image		= 'advertise_image';
					$pref_link		= 'advertise_link';
					$ad['formate']	= 'rectangle';
					$ad['height']	= '255';
				break;
				case('layer_top'):
					$pref_image		= 'adfile@layerTop';
					$pref_link		= 'adlink@layerTop';
					$ad['formate']	= 'horizontal';
					$ad['height']	= '95';
				break;
				case('layer_bottom'):
					$pref_image		= 'adfile@layerBottom';
					$pref_link		= 'adlink@layerBottom';
					$ad['formate']	= 'horizontal';
					$ad['height']	= '95';
				break;
				case('item_right_side'):
					$pref_image		= 'adfile@itemRightSide';
					$pref_link		= 'adlink@itemRightSide';
					$ad['formate']	= 'vertical';
					$ad['height']	= '605';
				break;
			}
			$f_advertise_image = osc_get_preference($pref_image,'aiclassy_theme');
			$s_advertise_link = osc_get_preference($pref_link,'aiclassy_theme');
			$path = false ;
			if(isset($f_advertise_image) && !empty($f_advertise_image)) $path = osc_uploads_path() . $f_advertise_image ;

            if(file_exists( $path )) {
				echo '<div class="col-md-12 advertise '.$class.' text-center" >
						<a href="'.$s_advertise_link.'" target="_blank"> 
							<img src="'.osc_uploads_url() . $f_advertise_image.'" alt="'.$s_advertise_link.'" />
						</a>
					  </div>';
			}elseif($s_advertise_link=='adsense'){ 
				if(osc_get_preference('idClient@adsenseAll', 'aiclassy_theme') && osc_get_preference('type@adsenseAll', 'aiclassy_theme')){ ?>
				<div class="col-lg-12 adsense <?=$class;?>  text-center">
					<ins class="adsbygoogle" style="display:block;height:<?=$ad['height'];?>px;" 
					data-ad-client="ca-<?=osc_get_preference('idClient@adsenseAll', 'aiclassy_theme');?>" 
					data-ad-type="<?=osc_get_preference('type@adsenseAll', 'aiclassy_theme');?>" 
					data-ad-format = '<?=$ad['formate'];?>'; ></ins>
					
				</div>
				<?php }  
			}elseif(isset($s_advertise_link)){ ?>
				<div class="col-lg-12 general <?=$class;?>  text-center">
					<?php //print_r($pref_link);exit(); ?>
					<?php echo osc_get_preference($pref_link,'aiclassy_theme'); ?>
				</div><?php 
			}else{
				if($pref_link=="advertise_link" && $s_advertise_link=='http://aicheapwebhosting.com/')
				echo '<div class="col-md-12 advertise '.$class.' text-center" >
						<a href="'.$s_advertise_link.'" target="_blank" > 
							<img src="'.osc_current_web_theme_url('images/cheapwebhosting.jpg').'" alt="'.$s_advertise_link.'" />
						</a>
					  </div>';
			}
        }
    }
    /**
     * get select category box for search panel
     *
     * @parem string $c_class optional
     * @parem string $default_item optional
     * @parem string $name optional
     * @parem array  $category optional
     * @return html of select categories
     */
    function aiclassy_draw_category_select($c_class="", $default_item = null, $name = "sCategory",$category = null){
		$categories = Category::newInstance()->toTree();
		if($default_item == null) $default_item = __('Category','aiclassy');
        echo '<select name="' . $name . '" id="' . $name . '" class="' . $c_class . ' ' . $name . '" >';
        if(isset($default_item)  && $default_item!='') {
           echo '<option value="">' . $default_item . '</option>';
        }
        foreach($categories as $c) {
            echo '<option value="' . $c['pk_i_id'] . '"' . ( ($category['pk_i_id'] == $c['pk_i_id']) ? 'selected="selected"' : '' ) . '>' . $c['s_name'] . '</option>';
            if(isset($c['categories']) && is_array($c['categories'])) {
               CategoryForm::subcategory_select($c['categories'], $category, $default_item, 1);
            }
        }
        echo '</select>';
    }
    /**
     * get select region box for search panel
     *
     * @parem string $c_class optional
     * @parem string $default_item optional
     * @parem string $name optional
     * @parem array  $region optional
     * @return html of select region
     */
	function aiclassy_draw_region_select($class="", $default_item = null, $name = "sRegion",$region=null){
		View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '!=', 'region_name ASC') ) ;
		if($default_item==null) $default_item = __("Select a region...");
		if( osc_count_list_regions() > 0 ) {
			echo '<select name="'.$name.'" id="'.$name.'" class="'.$class.' '.$name.'"  >' ;
			if(isset($default_item) && $default_item!='') {
				echo '<option value="">' . $default_item . '</option>';
			}
			if(osc_get_preference('location@item', 'aiclassy_theme')=='show') {
				while( osc_has_list_regions() ) {
					$region = osc_list_region_name();
					if(Cookie::newInstance()->get_value('sRegion')==$region){
						echo '<option value="' . osc_list_region_id() . '" selected="selected" >' . $region . '</option>' ;
					}else{
						echo '<option value="' . osc_list_region_id() . '" >' . $region . '</option>' ;
					}
				}
			} else{
				while( osc_has_list_regions() ) {
					echo '<option value="' . osc_list_region_id() . '" ' . ( ($region == osc_list_region_name()) ? 'selected="selected"' : '' ) . '>' . osc_list_region_name() . '</option>' ;
				}
			}
			echo '</select>' ;
		}
		View::newInstance()->_erase('list_regions') ;
	}
	/**
     * get select city box for search panel
     *
     * @parem string $c_class optional
     * @parem string $default_item optional
     * @parem string $name optional
     * @parem array  $city optional
     * @return html of select city
     */
	function aiclassy_draw_city_select($class="", $default_item = null, $name = "sCity",$city=null){
		View::newInstance()->_exportVariableToView('list_cities', Search::newInstance()->listCities('%%%%', '!=', 'city_name ASC') ) ;
		if($default_item==null) $default_item = __("Select a city...");
		if( osc_count_list_cities() > 0 ) {
			echo '<select name="'.$name.'" id="'.$name.'" class="'.$class.' '.$name.'"  >' ;
			if(isset($default_item) && $default_item!='') {
				echo '<option value="">' . $default_item . '</option>';
			}
			if(osc_get_preference('location@item', 'aiclassy_theme')=='show') {
				while( osc_has_list_cities() ) {
					$city = osc_list_city_name();
					if(Cookie::newInstance()->get_value('sCity')==$city){
						echo '<option value="' . osc_list_city_id() . '" selected="selected" >' . $city . '</option>' ;
					}else{
						echo '<option value="' . osc_list_city_id() . '" >' . $city . '</option>' ;
					}
				}
			} else{
				while( osc_has_list_cities() ) {
					echo '<option value="' . osc_list_city_id() . '" ' . ( ($city == osc_list_city_name()) ? 'selected="selected"' : '' ) . '>' . osc_list_city_name() . '</option>' ;
				}
			}
			echo '</select>' ;
		}
		View::newInstance()->_erase('list_cities') ;
	}
	/**
     * get select country box for search panel
     *
     * @parem string $c_class optional
     * @parem string $default_item optional
     * @parem string $name optional
     * @return html of select region
     */
	function aiclassy_draw_country_select($class="", $default_item = null, $name = "sCountry") {
			if ( !View::newInstance()->_exists('list_countries') ) {
				View::newInstance()->_exportVariableToView('list_countries', Search::newInstance()->listCountries('>=', 'country_name ASC') ) ;
			}
			if($default_item==null) $default_item = __("Select a country...");
			$country_count = osc_count_list_countries();
			if( $country_count > 1 ) {
				echo '<select name="'.$name.'" id="'.$name.'" class="'.$class.' '.$name.'" >' ;
				echo '<option value="">' . $default_item . '</option>' ;
				while( osc_has_list_countries() ) {
					echo '<option value="' . osc_list_country_code() . '">' . osc_list_country_name() . '</option>' ;
				}
				echo '</select>' ;
			}elseif($country_count == 1){
				while( osc_has_list_countries() ) {
					echo '<input type="hidden" value="' . osc_list_country_code() . '" name="'.$name.'" id="'.$name.'" class="'.$name.'" />' ;
				}
			}
			View::newInstance()->_erase('list_countries') ;
		}
	/**
     * get country count
     *
     * @return int country count
     */
	function aiclassy_count_country_select(){
		View::newInstance()->_exportVariableToView('list_countries', Search::newInstance()->listCountries('>=', 'country_name ASC') ) ;
		return osc_count_list_countries();
	}
	/**
     * Print Search from
     *
     * @parem string $position optional
     * @return html of Search from
     */
    if( !function_exists('aiclassy_draw_search_form_1') ) {
        function aiclassy_draw_search_form_1($position=null){
			
			$search_category = osc_get_preference('category@search', 'aiclassy_theme');
			$search_country  = osc_get_preference('country@search', 'aiclassy_theme');
			$search_region   = osc_get_preference('region@search', 'aiclassy_theme');
			$search_city   = osc_get_preference('city@search', 'aiclassy_theme');
			$i = 1;
			if($search_category=='yes')
				$i++;
			if($search_country=='yes' && aiclassy_count_country_select() > 1)
				$i++;
			if($search_region=='yes')
				$i++;
			if($search_city=='yes')
				$i++;
			$input_class_name='col-lg-12';
			$select_class_name='col-lg-12';
			$btn_class_name='col-lg-12';
			$form_class='';
			if($position=='horizontal'){
				if($i==1){
					$input_class_name='col-lg-9';
					$select_class_name='';
					$btn_class_name='col-lg-3';
				}
				if($i==2){
					$input_class_name='col-lg-5';
					$select_class_name='col-lg-5';
					$btn_class_name='col-lg-2';
				}
				if($i==3){
					$input_class_name='col-lg-4';
					$select_class_name='col-lg-3';
					$btn_class_name='col-lg-2';
				}
				if($i==4){
					$input_class_name='col-lg-4';
					$select_class_name='col-lg-2';
					$btn_class_name='col-lg-2';
				}
				$form_class='horizontal-form';
			}   
			$pad = 'nopadding'; ?>			
			<?php if($position!='horizontal'){ $pad=""; ?> <div class="searchbar col-lg-12 <?php echo $pad ?>"> <?php } else { ?> <div class="searchbar col-lg-12 <?php echo $pad ?>"> <?php } ?> 			
			<div class="well well-sm">
			  <form action="<?php echo osc_esc_html(osc_base_url(true)); ?>" method="get" class="search nocsrf row <?php echo $form_class; ?>">
				<input type="hidden" name="page" value="search"/>
				<div class="form-group <?php echo $input_class_name; ?> col-md-6">
				  <input type="text" id="query" name="sPattern" class="form-control no-has-placeholder" placeholder="<?php echo  osc_get_preference('keyword_placeholder', 'aiclassy_theme') ?>" />				  
				</div>
				<?php if($search_category=='yes'){ ?>
				<div class="form-group <?php echo $select_class_name; ?>  col-md-6">
					<?php aiclassy_draw_category_select_2('form-control',null,'sCategory',null) ; ?>
				</div>
				<?php } ?>
				<?php if($search_country=='yes' && aiclassy_count_country_select() > 1 ){ ?>
				<div class="form-group <?php echo $select_class_name; ?> col-md-6">
					<?php aiclassy_draw_country_select('form-control', __('Country', 'aiclassy'),'sCountry') ; ?>
				</div>
				<?php } ?>
				<?php if($search_region=='yes' ){ ?>
				<div class="form-group <?php echo $select_class_name; ?> col-md-6">
					<?php aiclassy_draw_region_select('form-control', __('Region', 'aiclassy'),'sRegion') ; ?>
				</div>
				<?php } ?>
				<?php if($search_city=='yes' ){ ?>
				<div class="form-group <?php echo $select_class_name; ?> col-md-6">
					<?php aiclassy_draw_city_select('form-control', __('City', 'aiclassy'),'sCity') ; ?>
				</div>
				<?php } ?>
				<div class="form-group <?php echo $btn_class_name; ?> col-md-6 ">
					<input type="submit" class="btn btn-danger btn-search pull-right js-submit " value="<?php _e("Search", 'aiclassy');?>" />
					<small>
						<a href="<?php echo osc_esc_html(osc_search_url()) ; ?>" class="btn-advanced-search pull-right"><?php _e("Advanced", 'aiclassy');?></a>
					</small>
					
				</div>
				
				
			  </form>
			</div>
        </div>
        <?php
        }
    }
	/**
     * Print Search from
     *
     * @parem string $position optional
     * @return html of Search from
     */
    if( !function_exists('aiclassy_draw_search_form_2') ) {
        function aiclassy_draw_search_form_2($position=null){ ?>
			<div class="col-sm-12 nopadding">		
				<div class="well well-sm">
				  <form action="<?php echo osc_esc_html(osc_base_url(true)); ?>" method="get" class="search nocsrf row  horizontal-form">
					<input type="hidden" name="page" value="search"/>
					<div class="form-group col-sm-10">
					  <input type="text" id="query" name="sPattern" class="form-control no-has-placeholder" autocomplete="off" placeholder="<?php echo  osc_get_preference('keyword_placeholder', 'aiclassy_theme') ?>" />				  
					</div>
					<div class="form-group col-sm-2">
						<input type="submit" class="btn btn-danger btn-search pull-right js-submit " value="<?php _e("Search", 'aiclassy');?>" />					
					</div>
				  </form>
				</div>
			</div>
        <?php
        }
    }
    
    if( !function_exists('aiclassy_search_number') ) {
        /**
          *
          * @return array
          */
        function aiclassy_search_number() {
            $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);
            $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());
            if( $search_to > osc_search_total_items() ) {
                $search_to = osc_search_total_items();
            }

            return array(
                'from' => $search_from,
                'to'   => $search_to,
                'of'   => osc_search_total_items()
            );
        }
    }
    /*
     * Helpers used at view
     */
    if( !function_exists('aiclassy_item_title') ) {
        function aiclassy_item_title() {
            $title = osc_item_title();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('title') != "" ) {
                    $title_ = Session::newInstance()->_getForm('title');
                    if( @$title_[$locale['pk_c_code']] != "" ){
                        $title = $title_[$locale['pk_c_code']];
                    }
                }
            }
            return $title;
        }
    }
    if( !function_exists('aiclassy_item_description') ) {
        function aiclassy_item_description() {
            $description = osc_item_description();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('description') != "" ) {
                    $description_ = Session::newInstance()->_getForm('description');
                    if( @$description_[$locale['pk_c_code']] != "" ){
                        $description = $description_[$locale['pk_c_code']];
                    }
                }
            }
            return $description;
        }
    }
    if( !function_exists('related_listings') ) {
        function related_listings() {
            View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addRegion(osc_item_region());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '3');

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == 3 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '3');

            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            return 0;
        }
    }
    if( !function_exists('newest_3_listings') ) {
        function newest_3_listings($scat) {
            View::newInstance()->_exportVariableToView('items', array());
  			$mSearch = new Search();
			if($scat) {
				$mSearch->addCategory($scat); 
				$mSearch->limit('0', '3');
			} else {
				$mSearch = new Search();
				$mSearch->limit('0', osc_get_preference('noof_side_listing', 'aiclassy_theme'));
			}
            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                
                return $iTotalItems;
            }
            unset($mSearch);

            return 0;
        }
    }
    if( !function_exists('newest_listings_show') ) {
        function newest_listings_show(){
			$iListingNumber = osc_get_preference('noof_new_listing', 'aiclassy_theme');
            View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->limit('0', $iListingNumber);

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == 3 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            $mSearch = new Search();
            $mSearch->limit('0', $iListingNumber);

            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            return 0;
        }
    }

    if( !function_exists('osc_is_contact_page') ) {
        function osc_is_contact_page() {
            if( Rewrite::newInstance()->get_location() === 'contact' ) {
                return true;
            }
            return false;
        }
    }
    

    if( !function_exists('get_breadcrumb_lang') ) {
        function get_breadcrumb_lang() {
            $lang = array();
            $lang['item_add']               = __('Add classified', 'aiclassy');
            $lang['item_edit']              = __('Edit your listing', 'aiclassy');
            $lang['item_send_friend']       = __('Send to a friend', 'aiclassy');
            $lang['item_contact']           = __('Contact publisher', 'aiclassy');
            $lang['search']                 = __('Search results', 'aiclassy');
            $lang['search_pattern']         = __('Search results: %s', 'aiclassy');
            $lang['user_dashboard']         = __('Dashboard', 'aiclassy');
            $lang['user_dashboard_profile'] = __("%s's profile", 'aiclassy');
            $lang['user_account']           = __('Account', 'aiclassy');
            $lang['user_items']             = __('Listings', 'aiclassy');
            $lang['user_alerts']            = __('Alerts', 'aiclassy');
            $lang['user_profile']           = __('Update account', 'aiclassy');
            $lang['user_change_email']      = __('Change email', 'aiclassy');
            $lang['user_change_username']   = __('Change username', 'aiclassy');
            $lang['user_change_password']   = __('Change password', 'aiclassy');
            $lang['login']                  = __('Sign In', 'aiclassy');
            $lang['login_recover']          = __('Recover password', 'aiclassy');
            $lang['login_forgot']           = __('Change password', 'aiclassy');
            $lang['register']               = __('Create a new account', 'aiclassy');
            $lang['contact']                = __('Contact', 'aiclassy');
            return $lang;
        }
    }

    if(!function_exists('user_dashboard_redirect')) {
        function user_dashboard_redirect() {
            $page   = Params::getParam('page');
            $action = Params::getParam('action');
            if($page=='user' && $action=='dashboard') {
                if(ob_get_length()>0) {
                    ob_end_flush();
                }
                header("Location: ".osc_user_list_items_url(), TRUE,301);
            }
        }
        osc_add_hook('init', 'user_dashboard_redirect');
    }

    if( !function_exists('get_user_menu') ) {
        function get_user_menu() {
            $options   = array();
            $options[] = array(
                'name' => __('Public Profile'),
                 'url' => osc_esc_html(osc_user_public_profile_url(osc_logged_user_id())),
               'class' => 'opt_publicprofile'
            );
            $options[] = array(
                'name'  => __('Listings', 'aiclassy'),
                'url'   => osc_esc_html(osc_user_list_items_url()),
                'class' => 'opt_items'
            );
            $options[] = array(
                'name' => __('Alerts', 'aiclassy'),
                'url' => osc_esc_html(osc_user_alerts_url()),
                'class' => 'opt_alerts'
            );
            $options[] = array(
                'name'  => __('Account', 'aiclassy'),
                'url'   => osc_esc_html(osc_user_profile_url()),
                'class' => 'opt_account'
            );
            $options[] = array(
                'name'  => __('Change email', 'aiclassy'),
                'url'   => osc_esc_html(osc_change_user_email_url()),
                'class' => 'opt_change_email'
            );
            $options[] = array(
                'name'  => __('Change username', 'aiclassy'),
                'url'   => osc_esc_html(osc_change_user_username_url()),
                'class' => 'opt_change_username'
            );
            $options[] = array(
                'name'  => __('Change password', 'aiclassy'),
                'url'   => osc_esc_html(osc_change_user_password_url()),
                'class' => 'opt_change_password'
            );
            $options[] = array(
                'name'  => __('Delete account', 'aiclassy'),
                'url'   => '#',
                'class' => 'opt_delete_account'
            );

            return $options;
        }
    }
    if( !function_exists('aiclassy_draw_home_layer_display') ) {
		function aiclassy_draw_home_layer_display($type="") {
			$class="active";
			if($type=='popular'){
				//echo 'popular';
				aiclassy_popular_ads_start();
				if( osc_count_items() == 0) { ?>
					<div class="clear"></div>
					<p class="empty"><?php _e("There aren't listings available at this moment", 'aiclassy'); ?></p>
				<?php } else { 					
					View::newInstance()->_exportVariableToView("listType", 'items');
					if($_REQUEST['sShowsAs']!='list'){
						echo '<h5>'.__('Popular classifieds','aiclassy').'</h5>';
						View::newInstance()->_exportVariableToView("listClass",'listing-grid-aiclassy_items');
						osc_current_web_theme_path('loop.php');
					}
					else{						
						View::newInstance()->_exportVariableToView("listClass",'');
						echo '<div class="tab-pane fade" id="'.$type.'">';
						echo '<h5>'.__('Popular classifieds','aiclassy').'</h5>';
						osc_current_web_theme_path('loop.php');
						echo '</div>';
					}
					
				} 
				aiclassy_popular_ads_end();
				
			}elseif($type=='newest'){
				//echo 'newest';
				aiclassy_draw_home_items();
			}elseif($type=='premium'){
				//echo 'premium';
				//osc_premium() ;
				//echo intval(osc_get_preference('noof_premium_listing', 'aiclassy_theme'));
				osc_get_premiums(intval(osc_get_preference('noof_premium_listing', 'aiclassy_theme')));
				//echo '<pre>';print_r(osc_count_premiums());exit();
				if(osc_count_premiums() > 0) {					
					View::newInstance()->_exportVariableToView("listType", 'premiums');
					if($_REQUEST['sShowsAs']!='list')
					{
						echo '<h5>'.__('Premium classifieds','aiclassy').'</h5>';
						View::newInstance()->_exportVariableToView("listClass",'listing-grid-main'.' premium-list');
						osc_current_web_theme_path('loop.php');
					}else{
						View::newInstance()->_exportVariableToView("listClass",''.' premium-list');
						echo '<div class="tab-pane fade" id="'.$type.'">';
						echo '<h5>'.__('Premium classifieds','aiclassy').'</h5>';
						osc_current_web_theme_path('loop.php');
						echo '</div>';
					}
				}
			}
			elseif($type=='carousel'){
				aiclassy_draw_carousel_items();
			}
			
		}
	}
	if( !function_exists('aiclassy_draw_home_layers') ) {
		function aiclassy_draw_home_layers() {
			$layer_1=osc_get_preference('layer_display_1', 'aiclassy_theme');
			$layer_2=osc_get_preference('layer_display_2', 'aiclassy_theme');
			$layer_3=osc_get_preference('layer_display_3', 'aiclassy_theme');
			$class="active";
			//echo '<pre>'; var_dump($_REQUEST["sShowAs"]); 
			//echo '</pre>'; print_r($_REQUEST["sShowAs"]); exit(); 
			if($_REQUEST["sShowsAs"]=='list'){				
					if($layer_1 != 'carousel'){
						echo '<div class="with-nav-tabs"><ul class="nav nav-tabs">';
						if($layer_1!='none'){
						echo '<li class="'.$class.'"><a href="#'.$layer_1.'" data-toggle="tab" style="padding-left: 8px; padding-right: 8px;">'.__(ucfirst($layer_1), "aiclassy").'</a></li>';$class="";}
						if($layer_2!='none'){
						echo '<li class="'.$class.'"><a href="#'.$layer_2.'" data-toggle="tab" style="padding-left: 8px; padding-right: 8px;">'.__(ucfirst($layer_2), "aiclassy").'</a></li>';$class="";}
						if($layer_3!='none'){
						echo '<li class="'.$class.'"><a href="#'.$layer_3.'" data-toggle="tab" style="padding-left: 8px; padding-right: 8px;">'.__(ucfirst($layer_3), "aiclassy").'</a></li>';$class="";}
						echo '</ul></div><div class="tab-content" style="margin-top:10px;">';
						//layer one
						aiclassy_draw_home_layer_display($layer_1);
					}else{
						//layer one
						aiclassy_draw_home_layer_display($layer_1);
						echo '<div class="with-nav-tabs"><ul class="nav nav-tabs">';
						if($layer_2!='none'){
						echo '<li class="'.$class.'"><a href="#'.$layer_2.'" data-toggle="tab" style="padding-left: 8px; padding-right: 8px;">'.__(ucfirst($layer_2), "aiclassy").'</a></li>';$class="";}
						if($layer_3!='none'){
						echo '<li class="'.$class.'"><a href="#'.$layer_3.'" data-toggle="tab" style="padding-left: 8px; padding-right: 8px;">'.__(ucfirst($layer_3), "aiclassy").'</a></li>';$class="";}
						echo '</ul></div><div class="tab-content" style="margin-top:10px;">';
					}
				
				
				//layer two
				aiclassy_draw_home_layer_display($layer_2);
				//layer three
				aiclassy_draw_home_layer_display($layer_3);
				echo '</div>';
			} else{
				//layer one
				aiclassy_draw_home_layer_display($layer_1);
				//layer two
				aiclassy_draw_home_layer_display($layer_2);
				//layer three
				aiclassy_draw_home_layer_display($layer_3);
			}
		}
	}
	if( !function_exists('aiclassy_popular_ads_num_ads') ) {
		// HELPER - retreives preference for number of ads to display
		function aiclassy_popular_ads_num_ads() {
			return(osc_get_preference('noof_popular_listing', 'aiclassy_theme')) ;
		}
	}
	if( !function_exists('aiclassy_popular_ads_start') ) {
		// function for displaying text on the Item page
		function aiclassy_popular_ads_start() {

			$num_ads = aiclassy_popular_ads_num_ads(); // SETS HOW MANY POPULAR ADS TO DISPLAY
			View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->addField('SUM('.DB_TABLE_PREFIX.'t_item_stats.i_num_views) AS total_views');
            $mSearch->addJoinTable('t_item_stats.fk_i_item_id',DB_TABLE_PREFIX."t_item_stats",DB_TABLE_PREFIX."t_item_stats.fk_i_item_id = ".DB_TABLE_PREFIX."t_item.pk_i_id",'JOIN');
            $mSearch->addGroupBy(DB_TABLE_PREFIX.'t_item_stats.fk_i_item_id');
            $mSearch->order('total_views');
            $mSearch->limit('0', $num_ads);

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);
			
			return 0;
		}
	}
	if( !function_exists('aiclassy_popular_ads_end') ) {
		function aiclassy_popular_ads_end(){
		GLOBAL $stored_items;
		   View::newInstance()->_exportVariableToView('items', $stored_items); //restore original item array
		}
	}
	/*
	 * Include the delete user js for delete user link on user pages
	 * 
	 * 
	 */
    if( !function_exists('delete_user_js') ) {
        function delete_user_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();
            if( $location === 'custom' || ($location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items','pub_profile'))) || (Params::getParam('page') ==='aiclassy' && Params::getParam('in_user_menu')==true ) ) {
                osc_enqueue_script('delete-user-js');
            }
        }
        osc_add_hook('header', 'delete_user_js', 1);
    }
	/*
	 * Include the user info object in javascript on user pages
	 * 
	 * 
	 */
    if( !function_exists('user_info_js') ) {
        function user_info_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();

            if( $location === 'custom' || ( $location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items')) )) {
                $user = User::newInstance()->findByPrimaryKey( Session::newInstance()->_get('userId') );
                View::newInstance()->_exportVariableToView('user', $user);
                ?>
<script type="text/javascript">
    aiclassy.user = {};
    aiclassy.user.id = '<?php echo osc_user_id(); ?>';
    aiclassy.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
            <?php }
        }
        osc_add_hook('header', 'user_info_js');
    }
	/*
	 * trigger actions of admin side page for theme
	 * 
	 * 
	 * 
	 * 
	 */
	
    function theme_aiclassy_actions_admin() {
        //if(OC_ADMIN)
        if( Params::getParam('file') == 'oc-content/themes/aiclassy/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'aiclassy_theme');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $footerLink  		= Params::getParam('footer_link');
                $boolenOption 		= array('yes','no');
                $boolenOption_hs	= array('show','hide');
                $layerOption 		= array('premium','carousel','newest','popular','none');
                $navbarOption 		= array('fixed','advs');
                $sliderOption		= array('items','images');
                $listOption	 		= array('gallery','list');
                $headerstyle 		= array('default','inverse');
				$map_countries		= array('US','BR','RO','ES','IN','IT','MY','AU','CH','IE','FR', 'PK','SE','LK','IR','ID','NL','BG','GB');
                
                
                
                
                osc_set_preference('defaultcolorscheme', Params::getParam('defaultcolorscheme'), 'aiclassy_theme');
                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'aiclassy_theme');
                osc_set_preference('tclink', Params::getParam('tclink'), 'aiclassy_theme');
                osc_set_preference('contact_us_map_link', Params::getParam('contact_us_map_link'), 'aiclassy_theme');
                osc_set_preference('Homepage_display_option', Params::getParam('Homepage_display_option'), 'aiclassy_theme');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'aiclassy_theme');
                osc_set_preference('languagedisplay@gen', Params::getParam('languagedisplay@gen'), 'aiclassy_theme');
                if(is_numeric(Params::getParam('noof_premium_listing')))
					osc_set_preference('noof_premium_listing', Params::getParam('noof_premium_listing'), 'aiclassy_theme');
				if(is_numeric(Params::getParam('noof_popular_listing')))
					osc_set_preference('noof_popular_listing', Params::getParam('noof_popular_listing'), 'aiclassy_theme');
				if(is_numeric(Params::getParam('noof_new_listing')))
					osc_set_preference('noof_new_listing', Params::getParam('noof_new_listing'), 'aiclassy_theme');
				if(is_numeric(Params::getParam('noof_side_listing')))
					osc_set_preference('noof_side_listing', Params::getParam('noof_side_listing'), 'aiclassy_theme');
				if(in_array(Params::getParam('layer_display_1'), $layerOption))
					osc_set_preference('layer_display_1', Params::getParam('layer_display_1'), 'aiclassy_theme');
				if(in_array(Params::getParam('layer_display_2'), $layerOption))
					osc_set_preference('layer_display_2', Params::getParam('layer_display_2'), 'aiclassy_theme');
				if(in_array(Params::getParam('layer_display_3'), $layerOption))
					osc_set_preference('layer_display_3', Params::getParam('layer_display_3'), 'aiclassy_theme');
				if(in_array(Params::getParam('layer_sidebar'), $layerOption))
					osc_set_preference('layer_sidebar', Params::getParam('layer_sidebar'), 'aiclassy_theme');
                if(in_array(Params::getParam('category@search'), $boolenOption))
					osc_set_preference('category@search', Params::getParam('category@search'), 'aiclassy_theme');
				if(in_array(Params::getParam('country@search'), $boolenOption))
					osc_set_preference('country@search', Params::getParam('country@search'), 'aiclassy_theme');
				if(in_array(Params::getParam('region@search'), $boolenOption))
					osc_set_preference('region@search', Params::getParam('region@search'), 'aiclassy_theme');
				if(in_array(Params::getParam('city@search'), $boolenOption))
					osc_set_preference('city@search', Params::getParam('city@search'), 'aiclassy_theme');
                if(in_array(Params::getParam('header@theme'), $headerstyle))
					osc_set_preference('header@theme', Params::getParam('header@theme') , 'aiclassy_theme');
                if(in_array(Params::getParam('navbar@theme'), $navbarOption))
					osc_set_preference('navbar@theme', Params::getParam('navbar@theme') , 'aiclassy_theme');
                if(in_array(Params::getParam('slider@theme'), $sliderOption))
					osc_set_preference('slider@theme', Params::getParam('slider@theme') , 'aiclassy_theme');
				if(in_array(Params::getParam('reportlisting@item'), $boolenOption_hs) && osc_get_preference('country@map', 'aiclassy_theme') != Params::getParam('reportlisting@item')){
					osc_set_preference('reportlisting@item', Params::getParam('reportlisting@item'), 'aiclassy_theme');
					osc_set_preference('region_maps', '', 'aiclassy_theme');					
				}
				if(in_array(Params::getParam('location@item'), $boolenOption_hs) )
					osc_set_preference('location@item', Params::getParam('location@item'), 'aiclassy_theme');
				if(in_array(Params::getParam('facebook@page'), $boolenOption_hs) )
					osc_set_preference('facebook@page', Params::getParam('facebook@page'), 'aiclassy_theme');
				if(in_array(Params::getParam('advertisements@dispay'), $boolenOption_hs) )
					osc_set_preference('advertisements@dispay', Params::getParam('advertisements@dispay'), 'aiclassy_theme');
				if(in_array(Params::getParam('animation@gen'), $boolenOption) )
					osc_set_preference('animation@gen', Params::getParam('animation@gen'), 'aiclassy_theme');
				if(in_array(Params::getParam('category@navbar'), $boolenOption_hs) )
					osc_set_preference('category@navbar', Params::getParam('category@navbar'), 'aiclassy_theme');
				if(in_array(Params::getParam('category@sidebar'), $boolenOption_hs) )
					osc_set_preference('category@sidebar', Params::getParam('category@sidebar'), 'aiclassy_theme');
				if(in_array(Params::getParam('country@map'), $map_countries))
					osc_set_preference('country@map', Params::getParam('country@map'), 'aiclassy_theme');
				if(in_array(Params::getParam('defaultShowAs@all'), $listOption)){
					osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'aiclassy_theme');
					osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));
				}
				osc_set_preference('sociallink@facebook', Params::getParam('sociallink@facebook'), 'aiclassy_theme');
				osc_set_preference('sociallink@twitter', Params::getParam('sociallink@twitter'), 'aiclassy_theme');
				osc_set_preference('sociallink@linkedin', Params::getParam('sociallink@linkedin'), 'aiclassy_theme');
				osc_set_preference('sociallink@googleplus', Params::getParam('sociallink@googleplus'), 'aiclassy_theme');
				
				
				osc_set_preference('position@search', Params::getParam('position@search'), 'aiclassy_theme');
                
                
                osc_add_flash_ok_message(__('Theme settings updated correctly', 'aiclassy'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/settings.php'));
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    /*$img = ImageResizer::fromFile($package['tmp_name']);
                    $ext = $img->getExt();
                    $logo_name     = 'aiclassy_logo';
                    $logo_name    .= '.'.$ext;
                    $path = osc_uploads_path() . $logo_name ;
                    $img->saveToFile($path);
                    $extension=end(explode(".", $package['name']));
                    move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . 'aiclassy_logo.'.$extension ) ;
                    */
                    $extension=end(explode(".", $package['name']));
					$logo_name="aiclassy_logo.".$extension;
                    if( move_uploaded_file($_FILES['logo']['tmp_name'], osc_uploads_path().$logo_name ) ) {
                        osc_add_flash_ok_message( __('The logo image has been uploaded correctly', 'aiclassy'), 'admin') ;
                        
                        osc_set_preference('logo', $logo_name, 'aiclassy_theme');
                    } else {
                        osc_add_flash_error_message( __("An error has occurred, please try again", 'aiclassy'), 'admin') ;
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'aiclassy'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/header.php'));
            break;
            case('remove'):
                $logo = osc_get_preference('logo','aiclassy_theme');
                $path = osc_uploads_path() . $logo ;
                if(file_exists( $path ) ) {
                    @unlink( $path );
                    osc_delete_preference('logo','aiclassy_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The logo image has been removed', 'aiclassy'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'aiclassy'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/header.php'));
            break;
            case('upload_advertise'):
				$advertise_adsense 	= Params::getParam('advertise_adsense');				
				$advertise_general 	= trim(Params::getParam('google_ads_link', false, false, false));
				$advertise_position = Params::getParam('advertise_position');
				switch($advertise_position){
							case('general_sidebar'):
								$pref_image		= 'advertise_image';
								$pref_link		= 'advertise_link';
							break;
							case('layer_top'):
								$pref_image		= 'adfile@layerTop';
								$pref_link		= 'adlink@layerTop';
							break;
							case('layer_bottom'):
								$pref_image		= 'adfile@layerBottom';
								$pref_link		= 'adlink@layerBottom';
							break;
							case('item_right_side'):
								$pref_image		= 'adfile@itemRightSide';
								$pref_link		= 'adlink@itemRightSide';
							break;
						}
				if(isset($advertise_adsense) && $advertise_adsense=='yes'){
					osc_set_preference($pref_link, "adsense", 'aiclassy_theme');
					osc_delete_preference($pref_image,'aiclassy_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message( 'The advertisement setting saved', 'admin') ;
				}elseif(isset($advertise_general) && !empty($advertise_general)){
					//osc_set_preference($pref_link, "general_ad", 'aiclassy_theme');
					osc_delete_preference($pref_image,'aiclassy_theme');
					osc_set_preference($pref_link,$advertise_general, 'aiclassy_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message( 'The advertisement setting saved', 'admin') ;
				}else{
					$package 			= Params::getFiles('advertise_image');
					$advertise_link		= '#';
					if(Params::getParam('advertise_link'))
						$advertise_link  	= Params::getParam('advertise_link');
					if( $package['error'] == UPLOAD_ERR_OK ) {
						$a_extension	= end(explode(".", $package['name']));
						$a_name 		= "advertise_image".$advertise_position.".".$a_extension;
						
						if( move_uploaded_file($_FILES['advertise_image']['tmp_name'], osc_uploads_path().$a_name ) ) {
							osc_add_flash_ok_message( 'The advertisement image has been uploaded correctly', 'admin') ;
							
							osc_set_preference($pref_image, $a_name, 'aiclassy_theme');
							osc_set_preference($pref_link, $advertise_link, 'aiclassy_theme');
						} else {
							osc_add_flash_error_message( __("An error has occurred, please try again", 'aiclassy'), 'admin') ;
						}
					} else {
						osc_add_flash_error_message(__("An error has occurred, please try again", 'aiclassy'), 'admin');
					}
				}
                
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php'));
            break;
            case('remove_advertise'):
				switch (Params::getParam('advertisement_Loc')){
					case( 'Gernal_left_sidebar'):
						aiclassy_remove_ad('Gernal_left_sidebar');
					break;
					case('layer_top'):
						aiclassy_remove_ad('layer_top');
					break;
					case('layer_bottom'):
						aiclassy_remove_ad('layer_bottom');
					break;
					case('Item_right_side'):
						aiclassy_remove_ad('Item_right_side');
					break;
				}
                
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php'));
            break;
            case('adsense_settings'):
				if(isset($_POST['idClient@adsenseAll']) && isset($_POST['type@adsenseAll'])){
					if(!empty($_POST['idClient@adsenseAll']) && !empty($_POST['type@adsenseAll']) ){
						if (preg_match("/\Apub-\d{16}\z/", $_POST['idClient@adsenseAll'])) {
							osc_set_preference('idClient@adsenseAll', Params::getParam('idClient@adsenseAll'), 'aiclassy_theme');
							osc_set_preference('type@adsenseAll', Params::getParam('type@adsenseAll'), 'aiclassy_theme');
							osc_reset_preferences();
							osc_add_flash_ok_message('Adsense settings updated correctly', 'admin');
						}else{
							osc_add_flash_error_message( 'invalide adsense client pub-id', 'admin') ;
						}
					}else{
						osc_delete_preference('idClient@adsenseAll', 'aiclassy_theme');
						osc_delete_preference('type@adsenseAll', 'aiclassy_theme');
						osc_reset_preferences();
						
						osc_add_flash_error_message( 'Adsense setting cleared', 'admin') ;
					}
				}else{
					osc_delete_preference('idClient@adsenseAll', 'aiclassy_theme');
					osc_delete_preference('type@adsenseAll', 'aiclassy_theme');
					osc_reset_preferences();
					osc_add_flash_error_message( 'Invalide form input', 'admin');
				}
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/adsense.php'));
            break;
			case('edit_region_map'):
				$regions = json_decode(osc_get_preference('region_maps', 'aiclassy_theme'), true);
				$regions[Params::getParam('target-id')] = Params::getParam('region');
				osc_set_preference('region_maps', json_encode($regions), 'aiclassy_theme');
				osc_add_flash_ok_message(__('Region saved correctly', 'aiclassy'), 'admin');
				header('Location: ' . osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/map/'.osc_get_preference('country@map', 'aiclassy_theme').'_settings.php'));
				exit;
            break;
            case('upload_logo_favicon'):
                $package = Params::getFiles('logo_favicon');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    $img = ImageResizer::fromFile($package['tmp_name']);
                    $ext = $img->getExt();
                    $path = aiclassy_upload_path_favicon() . 'favicon.'.$ext;
                    $img->saveToFile($path);
                    
                    $img_144 = $img->resizeTo(144,144);
                    $path = aiclassy_upload_path_favicon() . 'favicon-144.'.$ext;
                    $img_144->saveToFile($path);
                    
                    $img_114 = $img->resizeTo(114,114);
                    $path = aiclassy_upload_path_favicon() . 'favicon-114.'.$ext;
                    $img_114->saveToFile($path);
                    
                    $img_72 = $img->resizeTo(72,72);
                    $path = aiclassy_upload_path_favicon() . 'favicon-72.'.$ext;
                    $img_72->saveToFile($path);
                    
                    $img_57 = $img->resizeTo(57,57);
                    $path = aiclassy_upload_path_favicon() . 'favicon-57.'.$ext;
                    $img_57->saveToFile($path);
                    
                    $img_48 = $img->resizeTo(48,48);
                    $path = aiclassy_upload_path_favicon() . 'favicon-48.'.$ext;
                    $img_48->saveToFile($path);
                    
                    $img_16 = $img->resizeTo(16,16);
                    $path = aiclassy_upload_path_favicon() . 'favicon.ico';
                    $img_16->saveToFile($path);
                    
                    osc_set_preference('favicon', $ext, 'aiclassy_theme');

                    osc_add_flash_ok_message(__('The favicon image has been uploaded correctly', 'aiclassy'), 'admin');
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'aiclassy'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/Favicon.php'));
            break;
            case('remove_favicon'):
                $ext = osc_get_preference('favicon','aiclassy_theme');
                $path = aiclassy_upload_path_favicon() .'favicon.'. $ext ;
                if(file_exists( $path ) ) {
                    @unlink( $path );
                    $path = aiclassy_upload_path_favicon() . 'favicon-16.ico';
                    @unlink( $path );
                    $path = aiclassy_upload_path_favicon() . 'favicon-48.'.$ext;
                    @unlink( $path );
                    $path = aiclassy_upload_path_favicon() . 'favicon-57.'.$ext;
                    @unlink( $path );
                    $path = aiclassy_upload_path_favicon() . 'favicon-72.'.$ext;
                    @unlink( $path );
                    $path = aiclassy_upload_path_favicon() . 'favicon-114.'.$ext;
                    @unlink( $path );
                    $path = aiclassy_upload_path_favicon() . 'favicon-144.'.$ext;
                    @unlink( $path );
                    osc_delete_preference('favicon','aiclassy_theme');
                    osc_reset_preferences();
                    osc_add_flash_ok_message(__('The favicon image has been removed', 'aiclassy'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'aiclassy'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/Favicon.php'));
            break;
        }
    }
    
    /*
     * Remove ad from a postion on theme
     * 
     * @parem string  $position 
     * 
     */
    if( !function_exists('aiclassy_remove_ad') ){
		function aiclassy_remove_ad($position) {
			switch (Params::getParam('advertisement_Loc')){
				case( 'Gernal_left_sidebar'):
					$advertise_general = osc_get_preference('advertise_link','aiclassy_theme');
					if(isset($advertise_general) && !empty($advertise_general)){
						osc_delete_preference('advertise_link','aiclassy_theme');
					}elseif(osc_get_preference('advertise_link','aiclassy_theme')=='adsense'){
						osc_delete_preference('advertise_link','aiclassy_theme');
					}else{
						$advertise_image = osc_get_preference('advertise_image','aiclassy_theme');
						$path = osc_uploads_path() . $advertise_image ;
						if(file_exists( $path ) ) {
							@unlink( $path );
							osc_delete_preference('advertise_image','aiclassy_theme');
							osc_delete_preference('advertise_link','aiclassy_theme');
							osc_reset_preferences();
							osc_add_flash_ok_message('The advertisement image has been removed', 'admin');
						} else {
							osc_add_flash_error_message(__("Image not found", 'aiclassy'), 'admin');
						}
					}
				break;
				case('layer_top'):
					$advertise_general = osc_get_preference('adlink@layerTop','aiclassy_theme');
					if(isset($advertise_general) && !empty($advertise_general)){
						osc_delete_preference('adlink@layerTop','aiclassy_theme');
					}elseif(osc_get_preference('adlink@layerTop','aiclassy_theme')=='adsense'){
						osc_delete_preference('adlink@layerTop','aiclassy_theme');
					}else{
						$advertise_image = osc_get_preference('adfile@layerTop','aiclassy_theme');
						$path = osc_uploads_path() . $advertise_image ;
						if(file_exists( $path ) ) {
							@unlink( $path );
							osc_delete_preference('adfile@layerTop','aiclassy_theme');
							osc_delete_preference('adlink@layerTop','aiclassy_theme');
							osc_reset_preferences();
							osc_add_flash_ok_message('The advertisement image has been removed', 'admin');
						} else {
							osc_add_flash_error_message(__("Image not found", 'aiclassy'), 'admin');
						}
					}
				break;
				case( 'layer_bottom'):
					$advertise_general = osc_get_preference('adlink@layerBottom','aiclassy_theme');
					if(isset($advertise_general) && !empty($advertise_general)){
						osc_delete_preference('adlink@layerBottom','aiclassy_theme');
					}elseif(osc_get_preference('adlink@layerBottom','aiclassy_theme')=='adsense'){
						osc_delete_preference('adlink@layerBottom','aiclassy_theme');
					}else{
						$advertise_image = osc_get_preference('adfile@layerBottom','aiclassy_theme');
						$path = osc_uploads_path() . $advertise_image ;
						if(file_exists( $path ) ) {
							@unlink( $path );
							osc_delete_preference('adfile@layerBottom','aiclassy_theme');
							osc_delete_preference('adlink@layerBottom','aiclassy_theme');
							osc_reset_preferences();
							osc_add_flash_ok_message('The advertisement image has been removed', 'admin');
						} else {
							osc_add_flash_error_message(__("Image not found", 'aiclassy'), 'admin');
						}
					}
				break;
				case( 'Item_right_side'):
					$advertise_general = osc_get_preference('adlink@itemRightSide','aiclassy_theme');
					if(isset($advertise_general) && !empty($advertise_general)){
						osc_delete_preference('adlink@itemRightSide','aiclassy_theme');
					}elseif(osc_get_preference('adlink@itemRightSide','aiclassy_theme')=='adsense'){
						osc_delete_preference('adlink@itemRightSide','aiclassy_theme');
					}else{
						$advertise_image = osc_get_preference('adfile@itemRightSide','aiclassy_theme');
						$path = osc_uploads_path() . $advertise_image ;
						if(file_exists( $path ) ) {
							@unlink( $path );
							osc_delete_preference('adfile@itemRightSide','aiclassy_theme');
							osc_delete_preference('adlink@itemRightSide','aiclassy_theme');
							osc_reset_preferences();
							osc_add_flash_ok_message('The advertisement image has been removed', 'admin');
						} else {
							osc_add_flash_error_message(__("Image not found", 'aiclassy'), 'admin');
						}
					}
				break;
			}
			
		}
	}
	/*
	 * Redirect user to dashboard
	 * 
	 */
    function aiclassy_redirect_user_dashboard() {
        if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {
            header('Location: ' .osc_user_list_items_url());
            exit;
        }
    }
	/*
	 * include css for feature banner 
	 * 
	 * @return html (css file for feature banner)
	 */
    if( !function_exists('banner_item_style') ){
		function banner_item_style(){
			echo '<link href="'.osc_current_web_theme_url('feature_banner/css/style.css').'" rel="stylesheet" type="text/css" />';
		}
	}
	/*
	 * Print feature banner 
	 * 
	 * @return html (feature banner html code)
	 */
	if( !function_exists('banner_slide_show') ){
		function banner_slide_show(){ 
			if(osc_get_preference('slider@theme', 'aiclassy_theme') == 'images'){
				banner_slide_show_slider();
			} else {
				banner_slide_show_premium();
			}			
		}
	}
	if( !function_exists('banner_slide_show_slider') ){
		function banner_slide_show_slider(){ 
			$ban_list = ModelBanner::newInstance()->getBannerListArray() ;
			if(count($ban_list)>1){
			$ban_URL  = ModelBanner::newInstance()->getbanner_uploadURL();
				echo '<div id="sliders1"><div id="slides" u="slides">';
				foreach ($ban_list as $ban) {
					echo '<div><img u="image" alt="'.$ban['s_name'].'" src="'.$ban_URL.$ban['s_path'].'" onclick="window.open(\''.$ban['s_link'].'\')" /></div>';
				}
				echo '</div><div u="navigator" class="jssorb05">
				</div>
				<span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;"> </span>
				<!-- Arrow Right -->
				<span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;"> </span>';
				$home_page = aiclassy_default_home_page();
				if($home_page == 'slider' || $home_page == 'banner-category'){
					echo '<div class="above col-sm-6" >';
						aiclassy_draw_search_form_2('horizontal');
					echo '</div>';
				}
				echo '</div>';
			}
		}
	}
	
	if( !function_exists('banner_slide_show_premium') ){
		function banner_slide_show_premium(){ 
			osc_get_premiums(5);
			//echo '<pre>';print_r($ban_list);exit();
			if(osc_count_premiums() > 0){
				View::newInstance()->_exportVariableToView("listType", 'premiums');
				echo '<div id="sliders"><div id="slides" u="slides">';				  
				while ( osc_has_premiums() ) {
					if(osc_count_premium_resources()){
					//echo '<pre>';print_r(osc_resource_thumbnail_url());exit();
						echo '<div class="col-md-12 col-xs-12"><div class="col-md-6 col-xs-6"><img u="image" class="media-object" alt="'.osc_premium_title().'" src="'.osc_resource_url().'" /></div>';
					}
					else{
						echo '<div class="col-md-12 col-xs-12"><div class="col-md-6 col-xs-6"><img u="image" class="media-object" alt="'.osc_premium_title().'" src="'.osc_current_web_theme_url('images/no_image_available.jpg').'" /></div>';							
					}
					echo '<div class="col-md-6 col-xs-6" ><div u=caption t="CLIP|LR" du="200" class="sliderimage"  style="position:absolute;"><div style="margin: 20px;"><h2>' .osc_premium_title().'</h2><p>'.substr(osc_premium_description(),0,100).'</p><span class="captionOrange" onclick="window.open(\''.osc_esc_html(osc_premium_url()).'\')" >Read More</span></div></div></div></div>';
				}
				echo '</div><div u="navigator" class="jssorb05">
				</div>
				<span u="arrowleft" class="jssora11l" style="top: 123px; left: 8px;"> </span>
				<!-- Arrow Right -->
				<span u="arrowright" class="jssora11r" style="top: 123px; right: 8px;"> </span></div>';
			}
			View::newInstance()->_exportVariableToView("listType", '');
		}
	}
	
	//~ if( !function_exists('banner_slide_show') ){
		//~ function banner_slide_show(){ 
			//~ $ban_list = ModelBanner::newInstance()->getBannerListArray() ;
			//~ if(count($ban_list)>1){
			//~ $ban_URL  = ModelBanner::newInstance()->getbanner_uploadURL();
				//~ echo '<div id="slides">';
				  //~ 
				//~ foreach ($ban_list as $ban) {
					//~ echo '<div class="slide" ><img alt="'.$ban['s_name'].'" src="'.$ban_URL.$ban['s_path'].'" /><div class="img-caption"><h2>'.$ban['s_title'].'</h2><p>'.$ban['s_description'].'</p><span onclick="window.open(\''.$ban['s_link'].'\')" >Read More</span></div></div>';
				//~ }
				//~ echo '<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
				//~ <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
				//~ </div>';
			//~ }
		//~ }
	//~ }
	/*
	 * Uninstall theme from site
	 * 
	 * 
	 */
	function aiclassy_uninstall() {
		ModelBanner::newInstance()->uninstall();
        Preference::newInstance()->delete(array('s_section' => 'aiclassy'));
        Preference::newInstance()->delete(array('s_section' => 'aiclassy_theme'));
        aiclassy_recursiveRemoveDirectory(aiclassy_upload_path());
        profile_picture_uninstall();
        
    }
    /**

	Add hook function to theme

	*/
	osc_add_hook('main-banner', 'banner_slide_show');
	osc_add_hook('header', 'banner_item_style');

    osc_add_hook('init', 'aiclassy_redirect_user_dashboard', 2);
    osc_add_hook('init_admin', 'theme_aiclassy_actions_admin');
    osc_add_hook('theme_delete_aiclassy', 'aiclassy_uninstall');
    osc_add_hook('init_admin', 'aiclassy_admin_menu');
    
    /*
	 * include the left side menu for admin sitting of theme
	 * 
	 * 
	 */
    function aiclassy_admin_menu(){
		osc_add_admin_submenu_divider('appearance', 'AIClassy theme', 'aiclassy_theme', 'administrator');
		osc_admin_menu_appearance('Adsense', osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/adsense.php'), 'adsense_aiclassy');
		osc_admin_menu_appearance('Advertisement', osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php'), 'advertisement_aiclassy');
		osc_admin_menu_appearance('Favicon', osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/Favicon.php'), 'Favicon_aiclassy');
		osc_admin_menu_appearance('Feature banner', osc_admin_render_theme_url('oc-content/themes/aiclassy/feature_banner/conf.php'), 'banner_aiclassy');
		osc_admin_menu_appearance(__('Header logo', 'aiclassy'), osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/header.php'), 'header_aiclassy');
		if( osc_get_preference('country@map', 'aiclassy_theme') && aiclassy_default_home_page()=='map' ) {
			osc_admin_menu_appearance('Map setting', osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/map/'.osc_get_preference('country@map', 'aiclassy_theme').'_settings.php'), 'map_aiclassy');
		}
		osc_admin_menu_appearance(__('Theme settings', 'aiclassy'), osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/settings.php'), 'settings_aiclassy');
	}
    
/**

TRIGGER FUNCTIONS

*/
check_install_aiclassy_theme();



function aiclassy_sidebar_category_search($catId = null)
{
    $aCategories = array();
    if($catId==null) {
        $aCategories[] = Category::newInstance()->findRootCategoriesEnabled();
    } else {
        // if parent category, only show parent categories
        $aCategories = Category::newInstance()->toRootTree($catId);
        end($aCategories);
        $cat = current($aCategories);
        // if is parent of some category
        $childCategories = Category::newInstance()->findSubcategoriesEnabled($cat['pk_i_id']);
        if(count($childCategories) > 0) {
            $aCategories[] = $childCategories;
        }
    }

    if(count($aCategories) == 0) {
        return "";
    }

    aiclassy_print_sidebar_category_search($aCategories, $catId);
}

function aiclassy_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)
{
    $class = '';
    if(!isset($aCategories[$i])) {
        return null;
    }

    if($i===0) {
        $class = 'class="category"';
        $p_class='list-group panel ';
        $c_class='list-group-item list-group-item-success ';
    }else{
		$class = 'class=""';
		$p_class='list-subgroups in ';
		$c_class='list-group-item list-subgroup-item category sub-category ';
	}

    $c   = $aCategories[$i];
    $i++;
    if(!isset($c['pk_i_id'])) {
        //echo '<ul '.$class.'>';
        echo '<div class="'.$p_class.'">';
        if($i==1) {
            echo '<a class="'.$c_class.'" href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))).'">'.__('All categories', 'aiclassy')."</a>";
        }
        foreach($c as $key => $value) {
    ?>
            
                <a id="cat_<?php echo osc_esc_html($value['pk_i_id']);?>" class="<?php echo osc_esc_html($c_class);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $value['pk_i_id'], 'iPage'=>null))); ?>">
                <?php if(isset($current_category) && $current_category == $value['pk_i_id']){ echo '<strong>'.$value['s_name'].'</strong>'; }
                else{ echo $value['s_name']; } ?>
                </a>

    <?php
        }
        echo '</div>';
    } else {
    ?>
    <div class="<?php echo $p_class;?>">
        <?php if($i==1) { ?>
        <a class="<?php echo $c_class;?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))); ?>"><?php _e('All categories', 'aiclassy'); ?></a>
        <?php } ?>
                <a  class="<?php echo $c_class;?>"  id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id'], 'iPage'=>null))); ?>">
                <?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }
                      else{ echo $c['s_name']; } ?>
                </a>
                <?php aiclassy_print_sidebar_category_search($aCategories, $current_category, $i); ?>
        <?php if($i==1) { ?>
        <?php } ?>
    </div>
<?php
    }
}

/**

CLASSES

*/
class aiclassyBodyClass
{
    /**
    * aiclassy Class for add, remove or get body classes.
    *
    * @param string $instance used for singleton.
    * @param array $class.
    */
    private static $instance;
    private $class;

    private function __construct()
    {
        $this->class = array();
    }

    public static function newInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function add($class)
    {
        $this->class[] = $class;
    }
    public function get()
    {
        return $this->class;
    }
}

/**

HELPERS

*/
	/*
	 * get url of upload folder 
	 * 
	 * @parem string $item optional
	 * @return string upload link
	 */
if( !function_exists('osc_uploads_url') ){
    function osc_uploads_url($item = ''){
        return osc_base_url().'oc-content/uploads/'.$item;
    }
}
	/*
	 * get user country code 
	 * 
	 * @return string user country code 
	 */
    function osc_user_country_code() {
        return (string) osc_user_field("fk_c_country_code");
    }
    /*
	 * get url of aiclassy upload folder 
	 * 
	 * @return string aiclassy upload path
	 */
	function aiclassy_upload_path(){
		return osc_uploads_path().'aiclassy/';
	}
	/*
	 * get url of aiclassy favicon upload folder 
	 * 
	 * @return string aiclassy favicon upload path
	 */
    function aiclassy_upload_path_favicon(){
		return osc_uploads_path().'aiclassy/favicon/';
	}
	/*
	 * get url of aiclassy ads upload folder 
	 * 
	 * @return string aiclassy ads upload path
	 */
	function aiclassy_upload_path_ads(){
		return osc_uploads_path().'aiclassy/ads/';
	}
	/*
	 * get path of aiclassy banner upload folder 
	 * 
	 * @return string aiclassy banner upload path
	 */
	function aiclassy_upload_path_banner(){
		return osc_uploads_path().'aiclassy/banner/';
	}
	/*
	 * get url of aiclassy upload folder 
	 * 
	 * @return string aiclassy upload link
	 */
	function aiclassy_upload_url(){
		return osc_base_url().'oc-content/uploads/aiclassy/';
	}
	/*
	 * get url of aiclassy favicon upload folder 
	 * 
	 * @return string aiclassy favicon upload link
	 */
    function aiclassy_upload_url_favicon(){
		return osc_base_url().'oc-content/uploads/aiclassy/favicon/';
	}
	/*
	 * get url of aiclassy ads upload folder 
	 * 
	 * @return string aiclassy ads upload link
	 */
	function aiclassy_upload_url_ads(){
		return osc_base_url().'oc-content/uploads/aiclassy/ads/';
	}
	/*
	 * get url of aiclassy banner upload folder 
	 * 
	 * @return string aiclassy banner upload link
	 */
	function aiclassy_upload_url_banner(){
		return osc_base_url().'oc-content/uploads/aiclassy/banner/';
	}
	
	/*
	 * delete aiclassy upload folder and its all contained contents 
	 * 
	 */
	function aiclassy_recursiveRemoveDirectory($directory)
	{
		foreach(glob("{$directory}/*") as $file)
		{
			if(is_dir($file)) { 
				aiclassy_recursiveRemoveDirectory($file);
			} else {
				unlink($file);
			}
		}
		rmdir($directory);
	}

	/**
     * Shows all the pending flash messages in session and cleans up the array.
     *
     * @param $section
     * @param $class
     * @param $id
     * @return void
     */
if(!function_exists('aiclassy_show_flash_message')){
    function aiclassy_show_flash_message($section = 'pubMessages', $class = "flashmessage", $id = "flashmessage") {
        $messages = Session::newInstance()->_getMessage($section);
        if (is_array($messages)) {
            foreach ($messages as $message) {
				

                echo '<div id="flash_js"></div>';
        
                if (isset($message['msg']) && $message['msg'] != '') {
                    /*echo '<div id="' . $id . '" class="' . strtolower($class) . ' ' . strtolower($class) . '-' .$message['type'] . '"><a class="btn ico btn-mini ico-close">x</a>';
                    echo osc_apply_filter('flash_message_text', $message['msg']);
                    echo '</div>';*/
                    switch( $message['type'] ) {
						case('error'): ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <?php echo osc_apply_filter('flash_message_text', $message['msg']); ?>
							</div>
							<?php
						break;
						case('info'):?>
							<div class="alert alert-info alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <?php echo osc_apply_filter('flash_message_text', $message['msg']); ?>
							</div>
							<?php
						break;
						case('ok'):?>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <?php echo osc_apply_filter('flash_message_text', $message['msg']); ?>
							</div>
							<?php
						break;
						case('warning'):?>
							<div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <?php echo osc_apply_filter('flash_message_text', $message['msg']); ?>
							</div>
							<?php
						break;
					}
                } else if($message!='') {
                    echo '<div id="' . $id . '" class="' . $class . '">';
                    echo osc_apply_filter('flash_message_text', $message);
                    echo '</div>';
                } else {
                    echo '<div id="' . $id . '" class="' . $class . '" style="display:none;">';
                    echo osc_apply_filter('flash_message_text', '');
                    echo '</div>';
                }
            }
        }  
        Session::newInstance()->_dropMessage($section);
    }
}
	/**
     * Print user left sidebar menu
     *
     * @param $options optional
     * @return void
     */
function aiclassy_private_user_menu($options = null)
{
    if($options == null) {
        $options = array();
        $options[] = array('name' => __('Public Profile'), 'url' => osc_esc_html(osc_user_public_profile_url(osc_logged_user_id())), 'class' => 'opt_publicprofile');
        $options[] = array('name' => __('Dashboard'), 'url' => osc_esc_html(osc_user_dashboard_url()), 'class' => 'opt_dashboard');
        $options[] = array('name' => __('Manage your listings'), 'url' => osc_esc_html(osc_user_list_items_url()), 'class' => 'opt_items');
        $options[] = array('name' => __('Manage your alerts'), 'url' => osc_esc_html(osc_user_alerts_url()), 'class' => 'opt_alerts');
        $options[] = array('name' => __('My profile'), 'url' => osc_esc_html(osc_user_profile_url()), 'class' => 'opt_account');
        $options[] = array('name' => __('Logout'), 'url' => osc_esc_html(osc_user_logout_url()), 'class' => 'opt_logout');
    }

    $options = osc_apply_filter('user_menu_filter', $options);

    echo '<script type="text/javascript">';
    echo '$(".list-group > :first-child").addClass("first");';
    echo '$(".list-group > :last-child").addClass("last");';
    echo '</script>';
    echo '<ul class="list-group usermenu">';

    $var_l = count($options);
    for($var_o = 0; $var_o < ($var_l-1); $var_o++) {
        echo '<li class="list-group-item ' . $options[$var_o]['class'] . '" ><a href="' . $options[$var_o]['url'] . '" >' . $options[$var_o]['name'] . '</a></li>';
    }

    osc_run_hook('user_menu');

    echo '<li class="list-group-item ' . $options[$var_l-1]['class'] . '"><a class="" href="' . $options[$var_l-1]['url'] . '" >' . $options[$var_l-1]['name'] . '</a></li>';

    echo '</ul>';
    ?>
    <div id="dialog-delete-account" title="<?php echo osc_esc_html(__('Delete account', 'aiclassy')); ?>">
		<?php _e('Are you sure you want to delete your account?', 'aiclassy'); ?>
		</div>
		<?php
}
/**
 * Print Search pagination
 * 
 * @return void
 */
function aiclassy_search_pagination()
    {
        $params = array();
        if( View::newInstance()->_exists('search_uri') ) { // CANONICAL URL
            $params['url'] = osc_base_url().View::newInstance()->_get('search_uri') . '/{PAGE}';
            $params['first_url'] = osc_base_url().View::newInstance()->_get('search_uri');
        } else {
            $params['first_url'] = osc_update_search_url(array('iPage' => null));
        }
        $params['list_class'] = 'pagination pagination-sm';
        $params['class_selected'] = 'active';
        $params['class_non_selected'] = '';
        echo '<nav  class="text-center" >';
        $pagination = new Pagination($params);
        return $pagination->doPagination();
        echo '</nav>';
    }
/**
 * Create custom page 
 * 
 * @parem $s_internal_name
 * @parem $s_title 
 * @parem $b_link optional
 * @parem $meta optional
 * @return void
 */
    function aiclassy_make_custom_page( $s_internal_name="",$s_title='',$b_link=1,$meta=null){
		$s_internal_name = osc_sanitizeString($s_internal_name);
		$aFieldsDescription = array('en_US' => array('s_title' => $s_title ,'s_text' =>'',));
		$not_empty = true;
		Session::newInstance()->_setForm('aFieldsDescription',$aFieldsDescription);
		if( !empty($s_internal_name)) {
			if( WebThemes::newInstance()->isValidPage($s_internal_name) ) {
				$aFields = array('s_internal_name' => $s_internal_name, 'b_indelible' => '0', 's_meta' => json_encode($meta), 'b_link' => $b_link);
				Session::newInstance()->_setForm('s_internal_name',$s_internal_name);
				$page = Page::newInstance()->findByInternalName($s_internal_name);
				if(!isset($page['pk_i_id'])) {
					if($not_empty) {
						$result = Page::newInstance()->insert($aFields, $aFieldsDescription);
						Session::newInstance()->_clearVariables();
					} 
				} 
			} 
		}
	}
	function aiclassy_get_page_id($name=''){
		$page = Page::newInstance()->findByInternalName($name);
		return $page['pk_i_id'];
	}
	/**
	 * Get language direction
	 * 
	 * @return string 
	 */
	function aiclassy_language_direction(){
		$rtllang = array('ar_SY','he_HE','fa_IR');
		if(in_array(osc_current_user_locale(), $rtllang)){
			return 'rtl';
		}else{
			return 'ltr';
		}
	}
	/**
	 * get html of multiple category select
	 * 
	 * @parem $categories optional
	 * @parem $item optional
	 * @parem $default_item optional
	 * @parem $parent_selectable optional
	 * @return void
	 */
	function multiple_category_selects($categories = null, $item = null, $default_item = null, $parent_selectable = false)
	{
		$categoryID = Params::getParam('catId');
		if( osc_item_category_id() != null ) {
			$categoryID = osc_item_category_id();
		}

		if( Session::newInstance()->_getForm('catId') != '' ) {
			$categoryID = Session::newInstance()->_getForm('catId');
		}

		if ($item == null) { $item = osc_item(); }

		if(isset($item['fk_i_category_id'])) {
			$categoryID = $item['fk_i_category_id'];
		}

		$tmp_categories_tree = Category::newInstance()->toRootTree($categoryID);
		$categories_tree = array();
		foreach($tmp_categories_tree as $t) {
			$categories_tree[] = $t['pk_i_id'];
		}
		unset($tmp_categories_tree);

		if($categories == null) {
			$categories = Category::newInstance()->listEnabled();
		}
		

		generic_input_hidden("catId", $categoryID);

		?>
		<div id="select_holder"></div>
		<script type="text/javascript" charset="utf-8">
			<?php
				$tmp_cat = array();
				foreach($categories as $c) {
					if( $c['fk_i_parent_id']==null ) { $c['fk_i_parent_id'] = 0; };
					$tmp_cat[$c['fk_i_parent_id']][] = array($c['pk_i_id'], $c['s_name']);
				}
				foreach($tmp_cat as $k => $v) {
					echo 'var categories_'.$k.' = '.json_encode($v).';'.PHP_EOL;
				}
			?>

			if(osc==undefined) { var osc = {}; }
			if(osc.langs==undefined) { osc.langs = {}; }
			if(osc.langs.select_category==undefined) { osc.langs.select_category = '<?php echo osc_esc_js(__('Select category')); ?>'; }
			if(osc.langs.select_subcategory==undefined) { osc.langs.select_subcategory = '<?php echo osc_esc_js(__('Select subcategory')); ?>'; }
			osc.item_post = {};
			osc.item_post.category_id    = '<?php echo $categoryID; ?>';
			osc.item_post.category_tree_id    = <?php echo json_encode($categories_tree); ?>;

			$(document).ready(function(){
				<?php if($categoryID==array()) { ?> 
				draw_select(1,0);
				
				<?php } else { ?>
					draw_select(1,0);
					<?php for($i=0; $i<count($categories_tree)-1; $i++) { ?>
					draw_select(<?php echo ($i+2); ?> ,<?php echo $categories_tree[$i]; ?>);
					<?php } ?>
				<?php } ?>
				$('body').on("change", '[name^="select_"]', function() {
					var depth = parseInt($(this).attr("depth"));
					for(var d=(depth+1);d<=4;d++) {
						$("#select_"+d).trigger('removed');
						$("#select_"+d).remove();
					}
					$("#catId").attr("value", $(this).val());
					$("#catId").change();
					if(catPriceEnabled[$('#catId').val()] == 1) {
						$('.price').show();
					} else {
						$('.price').hide();
						$('#price').val('') ;
					}
					if((depth==1 && $(this).val()!=0) || (depth>1 && $(this).val()!=$("#select_"+(depth-1)).val())) {
						draw_select(depth+1, $(this).val());
					}
					return true;
				});
			});
			

			function draw_select(select, categoryID) {
				tmp_categories = window['categories_' + categoryID];
				if( tmp_categories!=null && $.isArray(tmp_categories) ) {
					
					$("#select_holder").before('<select class="form-control col-sm-4 " style="margin-right:5px;" id="select_'+select+'" name="select_'+select+'" depth="'+select+'"></select>');

					if(categoryID==0) {
						var options = '<option value="' + categoryID + '" >' + osc.langs.select_category + '</option>';
					}else {
						var options = '<option value="' + categoryID + '" >' + osc.langs.select_subcategory + '</option>';
					}
					$.each(tmp_categories, function(index, value){
						options += '<option value="' + value[0] + '" '+(value[0]==osc.item_post.category_tree_id[select-1]?'selected="selected"':'')+'>' + value[1] + '</option>';
					});
					osc.item_post.category_tree_id[select-2] = null;
					$('#select_'+select).html(options);
					$('#select_'+select).next("a").find(".select-box-label").text(osc.langs.select_subcategory);
					
				};
				

			}
			
		</script>
	<?php
	}
	
	function generic_input_hidden($name, $value) {
		$name = osc_esc_html($name);
		echo '<input id="' . preg_replace('|([^_a-zA-Z0-9-]+)|', '', $name) . '" type="hidden" name="' . $name . '" value="' . osc_esc_html(htmlentities($value, ENT_COMPAT, "UTF-8")) . '" />';
	}
	
	function aiclassy_sidebar_refine_category_search($catId = null)
	{
		$aCategories = array();
		if($catId==null) {
			$aCategories[] = Category::newInstance()->findRootCategoriesEnabled();
		} else {
			// if parent category, only show parent categories
			$aCategories = Category::newInstance()->toRootTree($catId);
			end($aCategories);
			$cat = current($aCategories);
			// if is parent of some category
			$childCategories = Category::newInstance()->findSubcategoriesEnabled($cat['pk_i_id']);
			if(count($childCategories) > 0) {
				$aCategories[] = $childCategories;
			}
		}
		if(count($aCategories) == 0) {
			return "";
		}
		aiclassy_print_sidebar_refine_category_search($aCategories, $catId);
	}
	
	function aiclassy_print_sidebar_refine_category_search($aCategories, $current_category = null, $i = 0)
	{
		$class = '';
		if(!isset($aCategories[$i])) {
			return null;
		}

		if($i===0) {
			$class = 'class="category"';
		}

		$c   = $aCategories[$i];
		$i++;
		if(!isset($c['pk_i_id'])) {
			echo '<ul '.$class.'>';
			if($i==1) {
				echo '<li><a href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))).'">'.__('All categories', 'aiclassy')."</a></li>";
			}
			foreach($c as $key => $value) {
		?>
				<li>
					<a id="cat_<?php echo osc_esc_html($value['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $value['pk_i_id'], 'iPage'=>null))); ?>">
					<?php if(isset($current_category) && $current_category == $value['pk_i_id']){ echo '<strong>'.$value['s_name'].'</strong>'; }
					else{ echo $value['s_name']; } ?>
					</a>

				</li>
		<?php
			}
			if($i==1) {
			echo "</ul>";
			} else {
			echo "</ul>";
			}
		} else {
		?>
		<ul <?php echo $class;?> >
			<?php if($i==1) { ?>
			<li><a href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))); ?>"><?php _e('All categories', 'aiclassy'); ?></a></li>
			<?php } ?>
				<li>
					<a id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id'], 'iPage'=>null))); ?>">
					<?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }
						  else{ echo $c['s_name']; } ?>
					</a>
					<?php aiclassy_print_sidebar_refine_category_search($aCategories, $current_category, $i); ?>
				</li>
			<?php if($i==1) { ?>
			<?php } ?>
		</ul>
	<?php
		}
	}
	
	/**
     * Gets search url given params
     *
     * @params array $params
     * @return string
     */
    function search_url($params = null) {
        if(is_array($params)) {
            osc_prune_array($params);
        }
        $countP = count($params);
        //if ($countP == 0) { $params['page'] = 'search'; };
        $base_url = osc_base_url();
        $http_url = osc_is_ssl()?"https://":"http://";
        
        if(osc_rewrite_enabled()) {
            $url = $base_url;
            if($params!=null && is_array($params)) {
                foreach($params as $k => $v) {
                    if(!is_array($v)  && $v!='') { $url .= $k.",".urlencode($v); }
                }
            }
        }
        else{
            $url = $base_url . 'index.php?';
            if($params!=null && is_array($params)) {
                foreach($params as $k => $v) {
                    if(is_array($v)) { $v = implode(",", $v); }
                        $url .= "" . $k . "=" . urlencode($v);                        
                }
            }
        }
        return str_replace('%2C', ',', $url);
    }
    /**
     * get select category box of main categories for search panel
     *
     * @parem string $c_class optional
     * @parem string $default_item optional
     * @parem string $name optional
     * @parem array  $category optional
     * @return html of select categories
     */
    function aiclassy_draw_category_select_2($c_class="", $default_item = null, $name = "sCategory",$category = null){
		$categories = Category::newInstance()->toTree();
		if($default_item == null) $default_item = __('Category','aiclassy');
        echo '<select name="' . $name . '" id="' . $name . '" class="' . $c_class . ' ' . $name . '" >';
        if(isset($default_item)  && $default_item!='') {
           echo '<option value="">' . $default_item . '</option>';
        }
        foreach($categories as $c) {
            echo '<option value="' . $c['pk_i_id'] . '"' . ( ($category['pk_i_id'] == $c['pk_i_id']) ? 'selected="selected"' : '' ) . '>' . $c['s_name'] . '</option>';
        }
        echo '</select>';
    }
    /**
     * get select category box for search panel
     *
     * @parem string $c_class optional
     * @parem string $default_item optional
     * @parem string $name optional
     * @parem array  $category optional
     * @return html of select categories
     */
    function aiclassy_draw_subcategory_select($c_class="", $default_item = null, $name = "sCategory",$category){		
		$categories = Category::newInstance()->findSubcategories($category['pk_i_id']);
		//echo '<pre>';print_r($categories);//exit();
		if($default_item == null) $default_item = __('Sub category','aiclassy');
        echo '<select name="' . $name . '" id="subcategory" class="' . $c_class . ' ' . $name . '" >';
        if(isset($default_item)  && $default_item!='') {
           echo '<option value="">' . $default_item . '</option>';
        }
        foreach($categories as $c) {
            echo '<option value="' . $c['pk_i_id'] . '"' . ( ($category['pk_i_id'] == $c['pk_i_id']) ? 'selected="selected"' : '' ) . '>' . $c['s_name'] . '</option>';
        }
        echo '</select>';
        
        //~ if(osc_count_subcategories() > 0) {
        //~ <ul>
           //~ while(osc_has_subcategories()) { 
            //~ <li>
            //~ <strong><a href="<?php echo osc_search_category_url() ">echo osc_category_name(); </a></strong></label>
            //~ </li>
            //~ } 
        //~ </ul>
        //~ }
    }
    
    function facebook_like_page(){?>
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			<?php if(osc_get_preference('sociallink@facebook', 'aiclassy_theme')!=''){?>
				<div class="fb-page col-lg-10 col-md-6  col-sm-6" data-href="<?php echo osc_get_preference('sociallink@facebook', 'aiclassy_theme'); ?>" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo osc_get_preference('sociallink@facebook', 'aiclassy_theme'); ?>"><a href="<?php echo osc_get_preference('sociallink@facebook', 'aiclassy_theme'); ?>"><?php echo osc_get_preference('sociallink@facebook', 'aiclassy_theme'); ?></a></blockquote></div></div>
			<?php } ?>
	<?php }
	
	function profile_picture_install(){
		$file = 'aiclassy/profile_picture/struct.sql';
		if (!is_dir(osc_uploads_path().'profile_picture/')) { 
			umask(0000);
			mkdir(osc_uploads_path().'profile_picture/', 0777);
		}		
		$conn = getConnection();
		$conn->autocommit(false);
		try {
			$path = osc_themes_path().$file;
			$sql = file_get_contents($path);
			$conn->osc_dbImportSQL($sql);
			$conn->commit();
		} catch (Exception $e) {
			$conn->rollback();
			echo $e->getMessage();
		}
		$conn->autocommit(true);
	}
	
	function profile_picture_uninstall() {
		$conn = getConnection();
		$conn->autocommit(false);
		try {
		$conn->osc_dbExec('DROP TABLE %st_profile_picture', DB_TABLE_PREFIX);
		$conn->commit();
		} catch (Exception $e) {
			$conn->rollback();
			echo $e->getMessage();
		}
		$conn->autocommit(true);
	}
	
	function profile_picture_upload(){
	   // Configuration - Your Options ///////////////////////////////////////////////////////

		$width = '120';
		$height = ''; // height is optional. If you use a height, *MAKE SURE* it's proportional to the WIDTH

		$allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // These will be the types of file that will pass the validation.
		$max_filesize = 524288; // Maximum filesize in BYTES (currently 0.5MB).
		$upload_path = osc_uploads_path().'profile_picture/';

		$button_text = 'Upload Profile Picture';

		////// ***** No modifications below here should be needed ***** /////////////////////

		// First, check to see if user has existing profile picture...
		$user_id = osc_logged_user_id(); // the user id of the user profile we're at
		$conn = getConnection();
		$result=$conn->osc_dbFetchResult("SELECT user_id, pic_ext FROM %st_profile_picture WHERE user_id = '%d' ", DB_TABLE_PREFIX, $user_id);

		if($result>0) //if picture exists
		{
			echo '<script language="javascript">function ShowDiv(){document.getElementById("HiddenDiv").style.display = \'\';}</script>';
			echo '<script language="javascript">function deletePhoto(){var r = confirm("Are you sure you want to delete this photo"); if(r){ document.forms["deleteForm"].submit();}}</script>';

			$modtime = filemtime($upload_path.'profile'.$user_id.$result['pic_ext']); //ensures browser cache is refreshed if newer version of picture exists
			echo '<img src="'.osc_base_url() . 'oc-content/uploads/profile_picture/profile'.$user_id.$result['pic_ext'].'?'.$modtime.'" width="'.$width.'" height="'.$height.'">'; // display picture
		}
		else { // show default photo since they haven't uploaded one
			echo '<img src="'.osc_base_url() . 'oc-content/themes/aiclassy/images/no_picture.jpg" width="'.$width.'" height="'.$height.'">';
		} 

		if( osc_is_web_user_logged_in()){
		if($result>0){
			echo '<br><a href="javascript:ShowDiv();">Upload New Picture</a> - <a href="javascript:deletePhoto();">Delete Photo</a>';
			echo '<div id="HiddenDiv" style="display:none;">'; // hides form if user already has a profile picture and displays a link to form instead
		}
		$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		echo '
			<form name="newpic" method="post" enctype="multipart/form-data"  action="'.$url.'">
			<input type="file" name="userfile" id="file"><br>
			<button class="btn btn-success" name="Submit" type="submit" >'.$button_text.'</button>
			</form>
			<form name="deleteForm" method="POST" action="'.$url.'"><input type="hidden" name="deletePhoto"></form>
		'; //echo
			if($result>0) echo '</div>';
		} //if logged-in


		if(isset($_POST['Submit'])) // Upload photo
		{
			$filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
			$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
		 
			// Check if the filetype is allowed, if not DIE and inform the user.
			if(!in_array($ext,$allowed_filetypes))
				die('The file you attempted to upload is not allowed.');
		 
			// Now check the filesize, if it is too large then DIE and inform the user.
			if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
				die('The file you attempted to upload is too large.');
		 
			// Check if we can upload to the specified path, if not DIE and inform the user.
			if(!is_writable($upload_path))
			{
				die('You cannot upload to the specified directory, please CHMOD it to 777.');
			}
			// Upload the file to your specified path.
			if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . 'profile'.$user_id.$ext)){
				if($result==0){
				$conn->osc_dbExec("INSERT INTO %st_profile_picture (user_id, pic_ext) VALUES ('%d', '%s')", DB_TABLE_PREFIX, $user_id, $ext);
				}
				else {
				$conn->osc_dbExec("UPDATE %st_profile_picture SET pic_ext = '%s' WHERE user_id = '%d' ", DB_TABLE_PREFIX, $ext, $user_id);
				}

				echo '<script type="text/javascript">window.location = document.URL;</script>';
			}

			else{
				echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
			}
		}

		if(isset($_POST['deletePhoto'])) // Delete the photo
		{
			$conn->osc_dbExec("DELETE FROM %st_profile_picture WHERE user_id = '%d' ", DB_TABLE_PREFIX, $user_id);
			echo '<script type="text/javascript">window.location = document.URL;</script>';
		}

	} // end profile_picture_upload()
	
	function profile_picture_show(){
		// Configuration - Your Options ///////////////////////////////////////////////////////

		$width = '120';
		$height = ''; // height is optional. If you use a height, *MAKE SURE* it's proportional to the WIDTH


		////// ***** No modifications below here should be needed ***** /////////////////////

		// First, check to see if user has existing profile picture...
		$user_id = osc_user_id(); // the user id of the user profile we're at

		$conn = getConnection();
		$result=$conn->osc_dbFetchResult("SELECT user_id, pic_ext FROM %st_profile_picture WHERE user_id = '%d' ", DB_TABLE_PREFIX, $user_id);

		if($result>0) //if picture exists
		{
		$upload_path = osc_uploads_path().'profile_picture/';
		$modtime = filemtime($upload_path.'profile'.$user_id.$result['pic_ext']); //ensures browser cache is refreshed if newer version of picture exists
		// This is the picture HTML code displayed on page
		echo '<img id="user-image" class=" img-circle center-block " src="'.osc_base_url() . 'oc-content/uploads/profile_picture/profile'.$user_id.$result['pic_ext'].'?'.$modtime.'" width="'.$width.'" height="'.$height.'">'; // display picture
		}
		else{
		echo '<img id="user-image" class="img-circle center-block" src="'.osc_base_url() . 'oc-content/themes/aiclassy/images/no_picture.jpg" width="'.$width.'" height="'.$height.'">';
		}
	} //end profile_picture_show()
	/**
     * Print 3 popular listing html.
     *
     * @param string $class Optional parameter.
     */
    if( !function_exists('aiclassy_draw_item_2') ) {
		function aiclassy_draw_item_2($class=""){ 
			echo '<div class="col-lg-12 col-md-6  col-sm-6 '.$class.' " >';
				echo '<h4>'.__("Popular classifieds", 'aiclassy').'</h4>';
				//newest_3_listings();
				popular_3_listings();
				if( osc_count_items() == 0) { ?>
					<div class="clear"></div>
					<p class="empty"><?php _e("There aren't listings available at this moment", 'aiclassy'); ?></p>
				<?php } else {
					View::newInstance()->_exportVariableToView("listType", 'items');
					View::newInstance()->_exportVariableToView("listClass",'aiclassy_items');
					osc_current_web_theme_path('loop.php');
					
					?>
					<p class="text-right show-more"><a href="<?php echo osc_esc_html(osc_search_show_all_url()) ; ?>"><?php _e("More", 'aiclassy'); ?></a></p>
					<div class="clear"></div>
					
				<?php } 
			echo '</div>';
			echo '<div class="clear"></div>';
			aiclassy_popular_ads_end();
        }
    }
	if( !function_exists('popular_3_listings') ) {
        function popular_3_listings($scat) {
            View::newInstance()->_exportVariableToView('items', array());
            $mSearch = new Search();
            if($scat) {
				$mSearch->addCategory($scat); 
				$mSearch->limit('0', '3');
			} else {
				$mSearch->addField('SUM('.DB_TABLE_PREFIX.'t_item_stats.i_num_views) AS total_views');
				$mSearch->addJoinTable('t_item_stats.fk_i_item_id',DB_TABLE_PREFIX."t_item_stats",DB_TABLE_PREFIX."t_item_stats.fk_i_item_id = ".DB_TABLE_PREFIX."t_item.pk_i_id",'JOIN');
				$mSearch->addGroupBy(DB_TABLE_PREFIX.'t_item_stats.fk_i_item_id');
				$mSearch->order('total_views');
				$mSearch->limit('0', osc_get_preference('noof_side_listing', 'aiclassy_theme'));
			}
            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);
			return 0;
        }
    }
    /**
     * Print 3 premium listing html.
     *
     * @param string $class Optional parameter.
     */
    if( !function_exists('aiclassy_draw_item_3') ) {
		function aiclassy_draw_item_3($class=""){ 
			echo '<div class="col-lg-12 col-md-6  col-sm-6 '.$class.' " >';
				echo '<h4>'.__("Premium classifieds", 'aiclassy').'</h4>';
				//newest_3_listings();
				premium_3_listings();
				if( osc_count_items() == 0) { ?>
					<div class="clear"></div>
					<p class="empty"><?php _e("There aren't listings available at this moment", 'aiclassy'); ?></p>
				<?php } else {
					View::newInstance()->_exportVariableToView("listType", 'items');
					View::newInstance()->_exportVariableToView("listClass",'aiclassy_items');
					osc_current_web_theme_path('loop.php');
					
					?>
					<p class="text-right show-more"><a href="<?php echo osc_esc_html(osc_search_show_all_url()) ; ?>"><?php _e("More", 'aiclassy'); ?></a></p>
					<div class="clear"></div>
					
				<?php } 
			echo '</div>';
			echo '<div class="clear"></div>';
			aiclassy_popular_ads_end();
        }
    }
    
    if( !function_exists('aiclassy_draw_item_4') ) {
		function aiclassy_draw_item_4($class="",$scat){
			switch($class){
				case 'new' : newest_3_listings($scat);
				break;
				case 'premium' : premium_3_listings();
				break;
				case 'popular' : popular_3_listings($scat);
				break;
			}
			if( osc_count_items() == 0) { ?>
				<li><p class="empty"><?php _e("There aren't listings available at this moment", 'aiclassy'); ?></p></li>
			<?php } else {
				View::newInstance()->_exportVariableToView("listType", 'items');
				View::newInstance()->_exportVariableToView("listClass",'aiclassy_items_siderbar_menu');
				osc_current_web_theme_path('loop.php');
				
				?>
				<li><p class="text-right show-more"><a href="<?php echo osc_esc_html(osc_search_show_all_url()) ; ?>"><?php _e("More", 'aiclassy'); ?></a></p></li>
				
			<?php } 
			aiclassy_popular_ads_end();
        }
    }
    
    if( !function_exists('premium_3_listings') ) {
        function premium_3_listings() {
            View::newInstance()->_exportVariableToView('items', array());
            $aItems = osc_get_premiums(intval(osc_get_preference('noof_side_listing', 'aiclassy_theme')));
            //~ echo '<pre>';print_r($mSearch);exit();
            //$aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);
			return 0;
        }
    }
    if( !function_exists('aiclassy_sidebar_listing') ) {
        function aiclassy_sidebar_listing($class="") {
			$type = osc_get_preference('layer_sidebar', 'aiclassy_theme');
            if($type == 'newest'){
				aiclassy_draw_item_1();
			}else if($type == 'popular'){
				aiclassy_draw_item_2();
			}else if($type == 'premium'){
				aiclassy_draw_item_3();
			}
        }
    }
    if( !function_exists('aiclassy_header') ) {
        function aiclassy_header() {
			if(osc_get_preference('category@navbar', 'aiclassy_theme')=='show'){ ?>
				<nav class="navbar navbar-<?=aiclassy_header_class();?> navbar-fixed-top">
				  <div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".category-navbar">
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
						 <span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse category-navbar" >
					  <ul class="nav navbar-nav navbar-justify">
						  <?php echo aiclassy_draw_panel_categories_navbar3(); ?>
					  </ul>
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container -->
				</nav>
				<div style="padding-top: 70px;"></div>
				<?php } ?>
				<div class="navigationbar container">
						<nav class="navbar navbar-<?=aiclassy_header_class();?>" role="navigation">
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#aiclassy-navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							  <?php echo logo_header(); ?>
							</div>
							
							<div class="collapse navbar-collapse" id="aiclassy-navbar">
								<?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
								<a href="<?php echo osc_esc_html(osc_item_post_url_in_category()) ; ?>" class="btn btn-success navbar-btn  navbar-left" role="button"><?php _e("Add classified", 'aiclassy');?></a>
								<?php } ?>
								
								<?php osc_run_hook('left-side-header-end'); ?>
							  <ul class="nav navbar-nav navbar-right">
								<?php osc_run_hook('right-side-header-start'); ?>
								<?php osc_show_widgets('right-side-header-start'); ?>
								<?php if(osc_get_preference('languagedisplay@gen', 'aiclassy_theme')=='header'){
									if ( osc_count_web_enabled_locales() > 1) { ?>
									<li class="dropdown lang">
										<?php osc_goto_first_locale(); ?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php _e("Language:", 'aiclassy'); ?> <b class="caret"></b></a>
										<ul class="dropdown-menu" >
											<?php $i = 0;  ?>
											<?php while ( osc_has_web_enabled_locales() ) { ?>
											<li><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_esc_html(osc_change_language_url ( osc_locale_code() )); ?>"><?php echo osc_locale_name(); ?></a></li>
												<?php $i++; ?>
											<?php } ?>
										</ul>
									</li>
								<?php }
								} ?>
								<?php if( osc_users_enabled() ) { 
									if( osc_is_web_user_logged_in() ) { ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo sprintf(__('Hi %s', 'aiclassy'), osc_logged_user_name() . '!'); ?>  <b class="caret"></b></a>
										<ul class="dropdown-menu" style="padding: 15px;min-width: 175px;">
											<li>
												<input class="btn btn-primary btn-block" type="button" onClick="parent.location='<?php echo osc_esc_html(osc_user_dashboard_url()); ?>'" value="<?php _e('My account', 'aiclassy'); ?>">
												<input class="btn btn-primary btn-block" type="button" onClick="parent.location='<?php echo osc_esc_html(osc_user_logout_url()); ?>'" value="<?php _e('Logout', 'aiclassy'); ?>">
											</li>
										</ul>
									</li>
								<?php } else { ?>
									<li><a href="<?php echo osc_esc_html(osc_register_account_url()); ?>"><?php _e("Sign Up", 'aiclassy'); ?></a></li>
									<li class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php _e("Sign In", 'aiclassy'); ?> <b class="caret"></b></a>
									  <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
										<li>
										  <div class="row">
											<div class="col-md-12">
											  <form class="form" role="form" method="post" action="<?php echo osc_base_url(true);?>" accept-charset="UTF-8" id="login-nav">
												<input type="hidden" name="page" value="login" />
												<input type="hidden" name="action" value="login_post" />
												<div id="no-has-placeholder"></div>
												<div class="form-group">
												  <label class="sr-only" for="email"><?php _e('E-mail', 'aiclassy'); ?></label>
												  <input type="email" class="form-control" id="email" name="email" placeholder="<?php _e('E-mail', 'aiclassy'); ?>" required />
												</div>
												<div class="form-group">
												  <label class="sr-only" for="password"><?php _e('Password', 'aiclassy'); ?></label>
												  <input type="password" class="form-control" id="password" name="password" placeholder="<?php _e('Password', 'aiclassy'); ?>" required />
												</div>
												<div class="checkbox">
												  <label>
													  <input type="checkbox" name="remember" id="remember" /> <?php _e('Remember me', 'aiclassy'); ?>
												  </label>
												</div>
												<div class="form-group">
												  <button type="submit" class="btn btn-success btn-block"><?php _e("Login", 'aiclassy'); ?></button>
												</div>
											  </form>
											</div>
										  </div>
										</li>
										<li class="divider"></li>
										<li>
											<?php if( function_exists('fbc_button') && function_exists('fbc_login_url') ) {
													echo '<button class="btn btn-primary btn-block btn-fb" type="button" onClick="parent.location=\'' . osc_esc_html(fbc_login_url()) . '\'" ><i class="fa fa-facebook"></i> '. __( 'Login with Facebook', 'facebook' ) . '</button>';
												} ?>
											<input type="button" onClick="parent.location='<?php echo osc_esc_html(osc_register_account_url()); ?>'"  value="<?php _e("Register for a free account", 'aiclassy'); ?>"  class="btn btn-primary btn-block" />
											<input type="button" onClick="parent.location='<?php echo osc_esc_html(osc_recover_user_password_url()); ?>'"  value="<?php _e("Forgot password?", 'aiclassy'); ?>"  class="btn btn-primary btn-block" />
										</li>
									  </ul>
									</li>
								<?php } ?>
								<?php } ?>
							  </ul>
							</div>
						  </nav>
						<script>	
							$('body').css("padding", "10px 20px");
						</script>
				</div><?php
		}
	}
	
	if( !function_exists('aiclassy_header_2') ) {
        function aiclassy_header_2() { ?>
			<div class="row topmenu">
				<nav id="navbar" class="navbar navbar-<?=aiclassy_header_class();?>" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header col-md-12">
							<div class="row">
								<div class="col-md-3">
									<h1><?php echo logo_header(); ?>
									</h1>
								</div>
								<div class="col-md-9"><?php
									if(aiclassy_check_advertisement_area('layer_top')){
										if(osc_get_preference('navbar@theme', 'aiclassy_theme') == 'advs'){
											aiclassy_draw_advertisement_area('layer_top');
										}
									} ?>
								</div>
							</div>
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".category-navbar">
							 <span class="icon-bar"></span>
							 <span class="icon-bar"></span>
							 <span class="icon-bar"></span>
						  </button>
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#aiclassy-navbar">
							 <span class="icon-bar"></span>
							 <span class="icon-bar"></span>
							 <span class="icon-bar"></span>
						  </button>
						</div>
					</div>
					<div class="clearfix"></div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<?php if(osc_get_preference('category@navbar', 'aiclassy_theme')=='show'){ ?>
					<div class="container">	
					<div id="category-navbar" class="collapse navbar-collapse category-navbar" >
							<ul class="nav navbar-nav navbar-justify">
							  <?php echo aiclassy_draw_panel_categories_navbar3(); ?>
							</ul>	
					</div>
					<?php } ?>
					<div class="collapse navbar-collapse" id="aiclassy-navbar">
								<?php osc_run_hook('left-side-header-end'); ?>
							  <ul class="nav navbar-nav navbar-right">
								<?php osc_run_hook('right-side-header-start'); ?>
								<?php osc_show_widgets('right-side-header-start'); ?>
								<?php if(osc_get_preference('languagedisplay@gen', 'aiclassy_theme')=='header'){
									if ( osc_count_web_enabled_locales() > 1) { ?>
									<li class="dropdown lang">
										<?php osc_goto_first_locale(); ?>
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php _e("Language:", 'aiclassy'); ?> <b class="caret"></b></a>
										<ul class="dropdown-menu" >
											<?php $i = 0;  ?>
											<?php while ( osc_has_web_enabled_locales() ) { ?>
											<li><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_esc_html(osc_change_language_url ( osc_locale_code() )); ?>"><?php echo osc_locale_name(); ?></a></li>
												<?php $i++; ?>
											<?php } ?>
										</ul>
									</li>
								<?php }
								} ?>
								<?php if( osc_users_enabled() ) { 
									if( osc_is_web_user_logged_in() ) { ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo sprintf(__('Hi %s', 'aiclassy'), osc_logged_user_name() . '!'); ?>  <b class="caret"></b></a>
										<ul class="dropdown-menu" style="padding: 15px;min-width: 175px;">
											<li>
												<input class="btn btn-primary btn-block" type="button" onClick="parent.location='<?php echo osc_esc_html(osc_user_dashboard_url()); ?>'" value="<?php _e('My account', 'aiclassy'); ?>">
												<input class="btn btn-primary btn-block" type="button" onClick="parent.location='<?php echo osc_esc_html(osc_user_logout_url()); ?>'" value="<?php _e('Logout', 'aiclassy'); ?>">
											</li>
										</ul>
									</li>
								<?php } else { ?>
									<li><a href="<?php echo osc_esc_html(osc_register_account_url()); ?>"><?php _e("Sign Up", 'aiclassy'); ?></a></li>
									<li class="dropdown">
									  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php _e("Sign In", 'aiclassy'); ?> <b class="caret"></b></a>
									  <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
										<li>
										  <div class="row">
											<div class="col-md-12">
											  <form class="form" role="form" method="post" action="<?php echo osc_base_url(true);?>" accept-charset="UTF-8" id="login-nav">
												<input type="hidden" name="page" value="login" />
												<input type="hidden" name="action" value="login_post" />
												<div id="no-has-placeholder"></div>
												<div class="form-group">
												  <label class="sr-only" for="email"><?php _e('E-mail', 'aiclassy'); ?></label>
												  <input type="email" class="form-control" id="email" name="email" placeholder="<?php _e('E-mail', 'aiclassy'); ?>" required />
												</div>
												<div class="form-group">
												  <label class="sr-only" for="password"><?php _e('Password', 'aiclassy'); ?></label>
												  <input type="password" class="form-control" id="password" name="password" placeholder="<?php _e('Password', 'aiclassy'); ?>" required />
												</div>
												<div class="checkbox">
												  <label>
													  <input type="checkbox" name="remember" id="remember" /> <?php _e('Remember me', 'aiclassy'); ?>
												  </label>
												</div>
												<div class="form-group">
												  <button type="submit" class="btn btn-success btn-block"><?php _e("Login", 'aiclassy'); ?></button>
												</div>
											  </form>
											</div>
										  </div>
										</li>
										<li class="divider"></li>
										<li>
											<?php if( function_exists('fbc_button') && function_exists('fbc_login_url') ) {
													echo '<button class="btn btn-primary btn-block btn-fb" type="button" onClick="parent.location=\'' . osc_esc_html(fbc_login_url()) . '\'" ><i class="fa fa-facebook"></i> '. __( 'Login with Facebook', 'facebook' ) . '</button>';
												} ?>
											<input type="button" onClick="parent.location='<?php echo osc_esc_html(osc_register_account_url()); ?>'"  value="<?php _e("Register for a free account", 'aiclassy'); ?>"  class="btn btn-primary btn-block" />
											<input type="button" onClick="parent.location='<?php echo osc_esc_html(osc_recover_user_password_url()); ?>'"  value="<?php _e("Forgot password?", 'aiclassy'); ?>"  class="btn btn-primary btn-block" />
										
										</li>
									  </ul>
									</li>
								<?php } ?>
								<?php } ?>
							  </ul>
						</div>
					</div>
				</nav>
			</div>
			<script>	
				doResizeCode();	
				window.onresize = function() {
					doResizeCode();
				}
				function doResizeCode(){
					if(window.innerWidth >= 980){
					$("#category-navbar").css("position", "absolute");
					}
					else{
						$(".category-navbar").css("position", "static");
					}
				}
			</script><?php
		}
	}
?>
