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

osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
		<?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />

        <!-- only item-post.php -->
		<?php ItemForm::location_javascript_new(); ?>
		<?php
		if(osc_images_enabled_at_items() && !clb_minimalist_is_fineuploader())
		{
			ItemForm::photos_javascript();
		}
		?>
        <script type="text/javascript">
			function uniform_input_file() {
				photos_div = $('div.photos');
				$('div', photos_div).each(
						function() {
							if ($(this).find('div.uploader').length == 0) {
								divid = $(this).attr('id');
								if (divid != 'photos') {
									divclass = $(this).hasClass('box');
									if (!$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')) {
										$("div#" + $(this).attr('id') + " input:file").uniform({fileDefaultText: fileDefaultText, fileBtnText: fileBtnText});
									}
								}
							}
						}
				);
			}

			setInterval("uniform_plugins()", 250);
			function uniform_plugins() {

				var content_plugin_hook = $('#plugin-hook').text();
				content_plugin_hook = content_plugin_hook.replace(/(\r\n|\n|\r)/gm, "");
				if (content_plugin_hook != '') {

					var div_plugin_hook = $('#plugin-hook');
					var num_uniform = $("div[id*='uniform-']", div_plugin_hook).size();
					if (num_uniform == 0) {
						if ($('#plugin-hook input:text').size() > 0) {
							$('#plugin-hook input:text').uniform();
						}
						if ($('#plugin-hook select').size() > 0) {
							$('#plugin-hook select').uniform();
						}
					}
				}
			}
<?php
if(osc_locale_thousands_sep() != '' || osc_locale_dec_point() != '')
{
	?>
				$().ready(function() {
					$("#price").blur(function(event) {
						var price = $("#price").attr("value");
	<?php
	if(osc_locale_thousands_sep() != '')
	{
		?>
							while (price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep()); ?>') != -1) {
								price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep()); ?>', '');
							}
		<?php
	}

	if(osc_locale_dec_point() != '')
	{
		?>
							var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point()) ?>');
							if (tmp.length > 2) {
								price = tmp[0] + '<?php echo osc_esc_js(osc_locale_dec_point()) ?>' + tmp[1];
							}
		<?php
	}
	?>
						$("#price").attr("value", price);
					});
				});
	<?php
}
?>
        </script>
        <!-- end only item-post.php -->
    </head>
    <body>
		<?php osc_current_web_theme_path('header.php'); ?>
        <div class="content add_item">
            <h1><strong><?php _e('Publish a listing', 'minimalist'); ?></strong></h1>
            <ul id="error_list" class="flashmessage-error"></ul>
            <form name="item" action="<?php echo osc_base_url(true); ?>" method="post" enctype="multipart/form-data">
                <fieldset>
					<input type="hidden" name="action" value="item_add_post" />
					<input type="hidden" name="page" value="item" />
                    <div class="box general_info">
                        <h2><?php _e('General Information', 'minimalist'); ?></h2>
                        <div class="row">
                            <label for="catId"><?php _e('Category', 'minimalist'); ?> *</label>
							<?php ItemForm::category_select(null, null, __('Select a category', 'minimalist')); ?>
                        </div>
                        <div class="row">
							<?php ItemForm::multilanguage_title_description(); ?>
                        </div>
                    </div>
					<?php
					if(osc_price_enabled_at_items())
					{
						?>
						<div class="box price">
							<label for="price"><?php _e('Price', 'minimalist'); ?></label>
							<?php ItemForm::price_input_text(); ?>
							<?php ItemForm::currency_select(); ?>
						</div>
					<?php } ?>
					<?php
					if(osc_images_enabled_at_items())
					{
						if(clb_minimalist_is_fineuploader())
						{
							// new ajax photo upload 
							ItemForm::ajax_photos();
						}
						else
						{
							?>
							<div class="box photos">
								<h2><?php _e('Photos', 'minimalist'); ?></h2>
								<div id="photos">
									<div class="row">
										<input type="file" name="photos[]" />
									</div>
								</div>
								<a href="#" onclick="addNewPhoto();
										uniform_input_file();
										return false;"><?php _e('Add new photo', 'minimalist'); ?></a>
							</div>
							<?php
						}
					}
					?>
                    <div class="box location">
                        <h2><?php _e('Listing Location', 'minimalist'); ?></h2>
                        <div class="row">
                            <label for="countryId"><?php _e('Country', 'minimalist'); ?></label>
							<?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="regionId"><?php _e('Region', 'minimalist'); ?></label>
							<?php ItemForm::region_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city"><?php _e('City', 'minimalist'); ?></label>
							<?php ItemForm::city_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city"><?php _e('City Area', 'minimalist'); ?></label>
							<?php ItemForm::city_area_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="address"><?php _e('Address', 'minimalist'); ?></label>
							<?php ItemForm::address_text(osc_user()); ?>
                        </div>
                    </div>
                    <!-- seller info -->
					<?php
					if(!osc_is_web_user_logged_in())
					{
						?>
						<div class="box seller_info">
							<h2><?php _e("Seller's information", 'minimalist'); ?></h2>
							<div class="row">
								<label for="contactName"><?php _e('Name', 'minimalist'); ?></label>
								<?php ItemForm::contact_name_text(); ?>
							</div>
							<div class="row">
								<label for="contactEmail"><?php _e('E-mail', 'minimalist'); ?> *</label>
								<?php ItemForm::contact_email_text(); ?>
							</div>
							<div class="row">
								<?php ItemForm::show_email_checkbox(); ?>
								<label for="showEmail"><?php _e('Show e-mail on the listing page', 'minimalist'); ?></label>
							</div>
						</div>
					<?php }; ?>
					<?php ItemForm::plugin_post_item(); ?>
					<?php
					if(osc_recaptcha_items_enabled())
					{
						?>
						<div class="box">
							<div class="row">
								<?php osc_show_recaptcha(); ?>
							</div>
						</div>
					<?php } ?>
					<div class="clear"></div>
					<button  type="submit"><?php _e('Publish', 'minimalist'); ?></button>
                </fieldset>
            </form>
        </div>
		<?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>