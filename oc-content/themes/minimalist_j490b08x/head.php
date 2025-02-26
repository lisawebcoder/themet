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
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo meta_title(); ?></title>
<meta name="viewport" content="width=device-width" />
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php
if(meta_description() != '')
{
	?>
	<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
	<?php
}
if(function_exists('meta_keywords'))
{
	if(meta_keywords() != '')
	{
		?>
		<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
		<?php
	}
}

if(osc_get_canonical() != '')
{
	?>
	<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
	<?php
}
?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />

<script type="text/javascript">
	var fileDefaultText = '<?php echo osc_esc_js(__('No file selected', 'minimalist')); ?>';
	var fileBtnText = '<?php echo osc_esc_js(__('Choose File', 'minimalist')); ?>';
</script>

<?php
osc_enqueue_style('style', osc_current_web_theme_url('style.css?v=2014.02.08'));

osc_register_script('global', osc_current_web_theme_js_url('global.js'));

osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');

osc_enqueue_script('tabber');
osc_enqueue_script('global');

// add theme switcher bar
if(defined('DEMO_THEME'))
{
	?>
	<script type="text/javascript">
		clb_theme = '<?php echo WebThemes::newInstance()->getCurrentTheme(); ?>';
		clb_theme_preset = '<?php echo clb_minimalist_theme_preset(); ?>';
		clb_theme_base_url = '<?php echo osc_base_url(); ?>';
	</script>
	<?php
	//osc_register_script('classibase_theme_bar', 'http://osclass-demo.classibase.com/classibase_theme_bar.js');
	osc_register_script('classibase_theme_bar', osc_assets_url('js/classibase_theme_bar.js'));
	osc_enqueue_script('classibase_theme_bar');
}

osc_run_hook('header');
clb_minimalist_theme_custom_css();
?>