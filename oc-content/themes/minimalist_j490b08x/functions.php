<?php

/*
 *      Osclass – software for creating and publishing online classified
 *                           advertising platforms
 *
 *                        Copyright (C) 2012 OSCLASS
 *
 *       This program is free software: you can redistribute it and/or
 *     modify it under the terms of the GNU Affero General Public License
 *     as published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful, but
 *         WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public
 * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define('CLB_MINIMALIST_THEME_VERSION', '3.0');



// add fineuploader if exists
if(clb_minimalist_is_fineuploader())
{
	if(!OC_ADMIN)
	{
		osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));
	}
	osc_enqueue_script('jquery-fineuploader');
}


if(!OC_ADMIN)
{
	if(!function_exists('clb_minimalist_add_close_button_action'))
	{

		function clb_minimalist_add_close_button_action()
		{
			echo '<script type="text/javascript">';
			echo '$(".flashmessage .ico-close").click(function(){';
			echo '$(this).parent().hide();';
			echo '});';
			echo '</script>';
		}

		osc_add_hook('footer', 'clb_minimalist_add_close_button_action');
	}
}

function clb_minimalist_is_fineuploader()
{
	return Scripts::newInstance()->registered['jquery-fineuploader'] && method_exists('ItemForm', 'ajax_photos');
}

function clb_minimalist_admin_actions()
{
	switch(Params::getParam('action_specific'))
	{
		case('settings'):
			$footerLink = Params::getParam('footer_link');
			osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'minimalist_theme');
			osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'minimalist_theme');
			osc_set_preference('theme_preset', Params::getParam('theme_preset'), 'minimalist_theme');
			osc_set_preference('custom_css', Params::getParam('custom_css'), 'minimalist_theme');

			osc_add_flash_ok_message(__('Theme settings updated correctly', 'minimalist'), 'admin');
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/minimalist/admin/settings.php'));
			break;
		case('upload_logo'):
			$package = Params::getFiles('logo');
			if($package['error'] == UPLOAD_ERR_OK)
			{
				if(move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg"))
				{
					osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'minimalist'), 'admin');
				}
				else
				{
					osc_add_flash_error_message(__("An error has occurred, please try again", 'minimalist'), 'admin');
				}
			}
			else
			{
				osc_add_flash_error_message(__("An error has occurred, please try again", 'minimalist'), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/minimalist/admin/header.php'));
			break;
		case('remove'):
			if(file_exists(WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg"))
			{
				@unlink(WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg");
				osc_add_flash_ok_message(__('The logo image has been removed', 'minimalist'), 'admin');
			}
			else
			{
				osc_add_flash_error_message(__("Image not found", 'minimalist'), 'admin');
			}
			osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/minimalist/admin/header.php'));
			break;
	}
}

function clb_minimalist_theme_preset_apply()
{
	$theme_preset = clb_minimalist_theme_preset();

	switch($theme_preset)
	{
		case 'dark':
			osc_enqueue_style('style_dark', osc_current_web_theme_url('style_dark.css'));
			break;
	}
}

function clb_minimalist_theme_custom_css()
{
	$custom_css = trim(osc_get_preference('custom_css', 'minimalist_theme'));
	$style_pos = strpos($custom_css, '<style');

	// if style string is not detected or is not first thing then add style wrapper
	if(strlen($custom_css))
	{
		if($style_pos === false || $style_pos > 0)
		{
			$custom_css = '<style>' . $custom_css . '</style>';
		}
		echo $custom_css;
	}
}

function clb_minimalist_theme_preset()
{
	$theme_preset = osc_get_preference('theme_preset', 'minimalist_theme');

	// override theme preset in theme demo mode
	if(defined('DEMO_THEME'))
	{
		// read theme preset from get
		if(isset($_GET['clb_theme_preset']) && clb_minimalist_theme_preset_isvalid($_GET['clb_theme_preset']))
		{
			$theme_preset = $_GET['clb_theme_preset'];
			setcookie('clb_theme_preset', $theme_preset, null, '/');
		}
		elseif(isset($_COOKIE['clb_theme_preset']) && clb_minimalist_theme_preset_isvalid($_COOKIE['clb_theme_preset']))
		{
			// read theme preset from cookie 
			$theme_preset = $_COOKIE['clb_theme_preset'];
		}
	}

	// if not valid preset then get first defined preset
	if(!clb_minimalist_theme_preset_isvalid($theme_preset))
	{
		$clb_minimalist_theme_presets = clb_minimalist_theme_presets();

		// get first preset from array
		reset($clb_minimalist_theme_presets);
		$theme_preset = key($clb_minimalist_theme_presets);
	}

	return $theme_preset;
}

function clb_minimalist_theme_preset_isvalid($theme_preset)
{
	$clb_minimalist_theme_presets = clb_minimalist_theme_presets();
	if(isset($clb_minimalist_theme_presets[$theme_preset]))
	{
		return true;
	}
	return false;
}

osc_add_hook('init_admin', 'clb_minimalist_admin_actions');
osc_add_hook('header', 'clb_minimalist_theme_preset_apply', 1);
osc_admin_menu_appearance(__('Header logo', 'minimalist'), osc_admin_render_theme_url('oc-content/themes/minimalist/admin/header.php'), 'header_modern');
osc_admin_menu_appearance(__('Theme settings', 'minimalist'), osc_admin_render_theme_url('oc-content/themes/minimalist/admin/settings.php'), 'settings_modern');

if(!function_exists('clb_minimalist_logo_header'))
{

	function clb_minimalist_logo_header()
	{
		$html = '<img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/logo.jpg') . '" />';
		if(file_exists(WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg"))
		{
			return $html;
		}
		else
		{
			return osc_page_title();
		}
	}

}

// install update options
if(!function_exists('clb_minimalist_theme_install'))
{

	function clb_minimalist_theme_install()
	{
		osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'minimalist'), 'minimalist_theme');
		osc_set_preference('version', CLB_MINIMALIST_THEME_VERSION, 'minimalist_theme');
		osc_set_preference('footer_link', true, 'minimalist_theme');
		osc_set_preference('donation', '0', 'minimalist_theme');
		osc_reset_preferences();
	}

}

if(!function_exists('clb_minimalist_check_install'))
{

	function clb_minimalist_check_install()
	{
		$current_version = osc_get_preference('version', 'minimalist_theme');
		//check if current version is installed or need an update<
		if(!$current_version)
		{
			clb_minimalist_theme_install();
		}
	}

}
clb_minimalist_check_install();



/**
 * New functions 
 */
if(!function_exists('clb_minimalist_format_category_ad_count'))
{

	function clb_minimalist_format_category_ad_count()
	{
		return osc_category_total_items() ? '<span class="count">' . osc_category_total_items() . '</span>' : '';
	}

}

if(!function_exists('clb_minimalist_format_region_ad_count'))
{

	function clb_minimalist_format_region_ad_count()
	{
		return osc_list_region_items() ? '<span class="count">' . osc_list_region_items() . '</span>' : '';
	}

}

if(!function_exists('clb_minimalist_format_list_title'))
{

	/**
	 * Format ad title for premium and regular ad for list tables 
	 * 
	 * @param string $title
	 * @param string $url
	 * @param bool $premium
	 * @param bool $highlight searched keyword
	 * @return string
	 */
	function clb_minimalist_format_list_title($title, $url, $premium = false, $highlight = false)
	{
		if($highlight && osc_search_pattern())
		{
			$title = osc_highlight(strip_tags($title));
		}
		if($premium)
		{
			return '<span style="float:left;"><a href="' . $url . '">' . $title . '</a></span>
				<span style="float:right;" class="premium_label">' . __("Sponsored ad", "modern") . '</span>
				<span class="clear"></span>';
		}
		else
		{
			return '<a href="' . $url . '">' . $title . '</a>';
		}
	}

}


if(!function_exists('clb_minimalist_format_alert_description'))
{

	/**
	 * Format alert parameters to human readible html
	 * 
	 * @param array $alert object
	 * @return string
	 */
	function clb_minimalist_format_alert_description($alert)
	{
		// Taken from \oc-includes\osclass\classes\datatables\AlertsDataTable.php
		$pieces = array();
		$conditions = osc_get_raw_search((array) json_decode(base64_decode($alert['s_search']), true));
		if(isset($conditions['sPattern']) && $conditions['sPattern'] != '')
		{
			$pieces[] = sprintf(__("<b>Pattern:</b> %s"), $conditions['sPattern']);
		}
		if(isset($conditions['aCategories']) && !empty($conditions['aCategories']))
		{
			$l = min(count($conditions['aCategories']), 4);
			$cat_array = array();
			for($c = 0; $c < $l; $c++)
			{
				$cat_array[] = $conditions['aCategories'][$c];
			}
			if(count($conditions['aCategories']) > $l)
			{
				$cat_array[] = '<a href="#" class="more-tooltip" categories="' . osc_esc_html(implode(", ", $conditions['aCategories'])) . '" >' . __("...More") . '</a>';
			}

			$pieces[] = sprintf(__("<b>Categories:</b> %s"), implode(", ", $cat_array));
		}

		return implode($pieces, ", ");
	}

}



if(!function_exists('clb_minimalist_format_image_count'))
{

	/**
	 * Format ad image count if there are more than one image 
	 * 
	 * @return string
	 */
	function clb_minimalist_format_image_count()
	{
		if(osc_count_item_resources() > 1)
		{
			return '<span class="image_count">' . osc_count_item_resources() . '</span>';
		}
		return '';
	}

}


if(!function_exists('clb_minimalist_theme_presets'))
{

	function clb_minimalist_theme_presets()
	{
		return array(
			'light' => __('Light', 'minimalist'),
			'dark' => __('Dark', 'minimalist')
		);
	}

}

function clb_debug_info()
{
	if(defined('DEBUG'))
	{
		//$q = LogDatabase::newInstance()->queries;
		$q = LogDatabase::newInstance()->messages;
		//$q = DBCommandClass::$queries;
		echo '<a href="#" class="debug_log">[total-queries:' . LogDatabase::newInstance()->getTotalNumberQueries()
		. ', query time:' . LogDatabase::newInstance()->getTotalQueriesTime()
		. ', memory usage:' . round(memory_get_peak_usage(true) / 1024) . ' KB'
		. ', execution-time:' . (microtime(true) - $_SERVER['REQUEST_TIME']) . ']</a>
			<script>
			$(function(){$(".debug_log").click(function(){$(".debug_log_report").toggle(); return false;})});	 
			</script>
			<div class="debug_log_report" style="display:none;">';

		LogDatabase::newInstance()->printMessages();
		echo '</div>';
	}
}

osc_add_hook('footer', 'clb_debug_info');
osc_add_hook('before_user_register', 'clb_demo_theme_restriction');



if(!function_exists('clb_minimalist_theme_search_region_id'))
{

	function clb_minimalist_theme_search_region_id()
	{
		$regionID = '';
		if(osc_search_region() != '')
		{
			$aRegion = Region::newInstance()->findByName(osc_search_region());
			if(isset($aRegion['pk_i_id']))
			{
				$regionID = $aRegion['pk_i_id'];
			}
		}
		return $regionID;
	}

}
