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

osc_register_script('fancybox', osc_current_web_theme_js_url('fancybox/jquery.fancybox.js'), array('jquery'));

osc_enqueue_script('fancybox');
osc_enqueue_script('jquery-validate');

osc_enqueue_style('fancybox', osc_current_web_theme_js_url('fancybox/jquery.fancybox.css'));





$_photos = '';
$_photos_mobile = '';
if(osc_images_enabled_at_items())
{
	if(osc_count_item_resources() > 0)
	{
		for($i = 0; osc_has_item_resources(); $i++)
		{
			if($i == 0)
			{
				$_img = '<img src="' . osc_resource_url() . '" width="315" class="med" alt="' . osc_item_title() . '" title="' . osc_item_title() . '" />';


				$_img_mobile = '<img src="' . osc_resource_url() . '" alt="' . osc_item_title() . '" title="' . osc_item_title() . '" />' . clb_minimalist_format_image_count();
				$_photos_mobile .='<a href="' . osc_resource_url() . '" class="image" title="'
						. __('Image', 'minimalist') . ' ' . ($i + 1) . ' / ' . osc_count_item_resources() . '">'
						. $_img_mobile . '</a>';
			}
			else
			{
				$_img = '<img src="' . osc_resource_thumbnail_url() . '" width="75" alt="' . osc_item_title() . '" title="' . osc_item_title() . '" />';
			}


			$_photos .='<a href="' . osc_resource_url() . '" rel="image_group" title="'
					. __('Image', 'minimalist') . ' ' . ($i + 1) . ' / ' . osc_count_item_resources() . '">'
					. $_img . '</a>';
		}

		if($_photos)
		{
			$_photos = '<div id="photos">' . $_photos . '</div>';
			$_photos_mobile = '<div id="photos_mobile">' . $_photos_mobile . '</div>';
		}
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
		<?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="index, follow" />
        <meta name="googlebot" content="index, follow" />
    </head>
    <body>
		<?php osc_current_web_theme_path('header.php'); ?>
        <div class="content item">
            <div id="item_head">
                <div class="inner">
                    <h1><?php echo osc_item_title() . ' ' . osc_item_city(); ?></h1>
					<?php
					if(osc_is_web_user_logged_in() && osc_logged_user_id() == osc_item_user_id())
					{
						?>
						<p id="edit_item_view">
							<strong>
								<a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'minimalist'); ?></a>
							</strong>
						</p>
						<?php
					}
					else
					{
						?>
						<p id="report">
							<strong><?php _e('Mark as', 'minimalist'); ?></strong>
							<span>
								<a id="item_spam" href="<?php echo osc_item_link_spam(); ?>" rel="nofollow"><?php _e('spam', 'minimalist'); ?></a>
								<a id="item_bad_category" href="<?php echo osc_item_link_bad_category(); ?>" rel="nofollow"><?php _e('misclassified', 'minimalist'); ?></a>
								<a id="item_repeated" href="<?php echo osc_item_link_repeated(); ?>" rel="nofollow"><?php _e('duplicated', 'minimalist'); ?></a>
								<a id="item_expired" href="<?php echo osc_item_link_expired(); ?>" rel="nofollow"><?php _e('expired', 'minimalist'); ?></a>
								<a id="item_offensive" href="<?php echo osc_item_link_offensive(); ?>" rel="nofollow"><?php _e('offensive', 'minimalist'); ?></a>
							</span>
						</p>
					<?php }; ?>
					<div class="clear"></div>
                </div>
            </div>
            <div id="main">
				<?php echo $_photos_mobile; ?>
                <div id="type_dates">
					<?php
					if(osc_price_enabled_at_items())
					{
						?>
						<em class="price"><?php echo osc_item_formated_price(); ?></em>
						<?php
					}
					?>
                    <em class="publish"><?php if(osc_item_pub_date() != '') echo __('Published date', 'minimalist') . ': ' . osc_format_date(osc_item_pub_date()); ?></em>
                    <em class="update"><?php if(osc_item_mod_date() != '') echo __('Modified date', 'minimalist') . ': ' . osc_format_date(osc_item_mod_date()); ?></em>
                </div>
                <ul id="item_location">
					<?php
					if(osc_item_country() != "")
					{
						?>
						<li><?php _e("Country", 'minimalist'); ?>: <strong><?php echo osc_item_country(); ?></strong></li>
						<?php
					}

					if(osc_item_region() != "")
					{
						?>
						<li><?php _e("Region", 'minimalist'); ?>: <strong><?php echo osc_item_region(); ?></strong></li>
						<?php
					}
					if(osc_item_city() != "")
					{
						?>
						<li><?php _e("City", 'minimalist'); ?>: <strong><?php echo osc_item_city(); ?></strong></li>
						<?php
					}
					if(osc_item_city_area() != "")
					{
						?>
						<li><?php _e("City area", 'minimalist'); ?>: <strong><?php echo osc_item_city_area(); ?></strong></li>
						<?php
					}
					if(osc_item_address() != "")
					{
						?>
						<li><?php _e("Address", 'minimalist'); ?>: <strong><?php echo osc_item_address(); ?></strong></li>
						<?php
					}
					?>
                </ul>
                <div id="description">
                    <p><?php echo osc_item_description(); ?></p>

					<?php
					if(osc_count_item_meta() >= 1)
					{
						?>
						<div id="custom_fields">
							<br />
							<div class="meta_list">
								<?php
								while(osc_has_item_meta())
								{
									?>
									<?php
									if(osc_item_meta_value() != '')
									{
										?>
										<div class="meta">
											<strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
						<?php
					}
					osc_run_hook('item_detail', osc_item());
					?>
                    <p class="contact_button">
						<?php
						if(!osc_item_is_expired())
						{
							if(!( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ))
							{
								if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact())
								{
									?>
									<a href="#contact" class="button primary"><?php _e('Contact seller', 'minimalist'); ?></a>
									<?php
								}
							}
						}
						?>
                        <a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="button primary"><?php _e('Share', 'minimalist'); ?></a>
                    </p>
					<?php osc_run_hook('location'); ?>
                </div>
                <!-- plugins -->
                <div id="useful_info">
                    <h2><?php _e('Useful information', 'minimalist'); ?></h2>
                    <ul>
                        <li><?php _e('Avoid scams by acting locally or paying with PayPal', 'minimalist'); ?></li>
                        <li><?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'minimalist'); ?></li>
                        <li><?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'minimalist'); ?></li>
                        <li><?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'minimalist'); ?></li>
                    </ul>
                </div>
				<?php
				if(osc_comments_enabled())
				{

					if(osc_reg_user_post_comments() && osc_is_web_user_logged_in() || !osc_reg_user_post_comments())
					{
						?>
						<div id="comments">
							<h2><?php _e('Comments', 'minimalist'); ?></h2>
							<ul id="comment_error_list" class="flashmessage-error"></ul>
							<?php
							CommentForm::js_validation();
							if(osc_count_item_comments() >= 1)
							{
								?>
								<div class="comments_list">
									<?php
									while(osc_has_item_comments())
									{
										?>
										<div class="comment">
											<h3><strong><?php echo osc_comment_title(); ?></strong> <em><?php _e("by", 'minimalist'); ?> <?php echo osc_comment_author_name(); ?>:</em></h3>
											<p><?php echo nl2br(osc_comment_body()); ?> </p>
											<?php
											if(osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()))
											{
												?>
												<p>
													<a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'minimalist'); ?>"><?php _e('Delete', 'minimalist'); ?></a>
												</p>
												<?php
											}
											?>
										</div>
										<?php
									}

									if(strlen(osc_comments_pagination()) && ceil(osc_item_total_comments() / osc_comments_per_page()) > 1)
									{
										?>
										<div class="paginate" style="text-align: right;">
											<?php echo osc_comments_pagination(); ?>
										</div>
										<?php
									}
									?>
								</div>
								<?php
							}
							?>
							<form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
								<fieldset>
									<h3><?php _e('Leave your comment (spam and offensive messages will be removed)', 'minimalist'); ?></h3>
									<input type="hidden" name="action" value="add_comment" />
									<input type="hidden" name="page" value="item" />
									<input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
									<?php
									if(osc_is_web_user_logged_in())
									{
										?>
										<input type="hidden" name="authorName" value="<?php echo osc_esc_html(osc_logged_user_name()); ?>" />
										<input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email(); ?>" />
										<?php
									}
									else
									{
										?>
										<label for="authorName"><?php _e('Your name', 'minimalist'); ?>:</label> <?php CommentForm::author_input_text(); ?><br />
										<label for="authorEmail"><?php _e('Your e-mail', 'minimalist'); ?>:</label> <?php CommentForm::email_input_text(); ?><br />
										<?php
									}
									?>
									<label for="title"><?php _e('Title', 'minimalist'); ?>:</label><?php CommentForm::title_input_text(); ?><br />
									<label for="body"><?php _e('Comment', 'minimalist'); ?>:</label><?php CommentForm::body_input_textarea(); ?><br />
									<div class="clear"></div>
									<p><button type="submit"><?php _e('Send', 'minimalist'); ?></button></p>
								</fieldset>
							</form>
						</div>
						<?php
					}
				}
				?>
            </div>
            <div id="sidebar">
				<?php
				echo $_photos;
				?>
                <div id="contact">
                    <h2><?php _e("Contact publisher", 'minimalist'); ?></h2>
					<?php
					if(osc_item_is_expired())
					{
						?>
						<p>
							<?php _e("The listing is expired. You can't contact the publisher.", 'minimalist'); ?>
						</p>
						<?php
					}
					else if(( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0)
					{
						?>
						<p>
							<?php _e("It's your own listing, you can't contact the publisher.", 'minimalist'); ?>
						</p>
						<?php
					}
					else if(osc_reg_user_can_contact() && !osc_is_web_user_logged_in())
					{
						?>
						<p>
							<?php _e("You must log in or register a new account in order to contact the advertiser", 'minimalist'); ?>
						</p>
						<p class="contact_button">
							<a href="<?php echo osc_user_login_url(); ?>" class="button"><?php _e('Login', 'minimalist'); ?></a>
							<a href="<?php echo osc_register_account_url(); ?>" class="button"><?php _e('Register for a free account', 'minimalist'); ?></a>
						</p>
						<?php
					}
					else
					{

						if(osc_item_user_id() != null)
						{
							?>
							<p class="name"><?php _e('Name', 'minimalist') ?>: <a href="<?php echo osc_user_public_profile_url(osc_item_user_id()); ?>" ><?php echo osc_item_contact_name(); ?></a></p>
							<?php
						}
						else
						{
							?>
							<p class="name"><?php _e('Name', 'minimalist') ?>: <?php echo osc_item_contact_name(); ?></p>
							<?php
						}

						if(osc_item_show_email())
						{
							?>
							<p class="email"><?php _e('E-mail', 'minimalist'); ?>: <?php echo osc_item_contact_email(); ?></p>
							<?php
						}

						if(osc_user_phone() != '')
						{
							?>
							<p class="phone"><?php _e("Tel", 'minimalist'); ?>.: <?php echo osc_user_phone(); ?></p>
							<?php
						}
						?>
						<ul id="error_list" class="flashmessage-error"></ul>
						<?php ContactForm::js_validation(); ?>
						<form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
							<?php osc_prepare_user_info(); ?>
							<fieldset>
								<label for="yourName"><?php _e('Your name', 'minimalist'); ?>:</label> <?php ContactForm::your_name(); ?>
								<label for="yourEmail"><?php _e('Your e-mail address', 'minimalist'); ?>:</label> <?php ContactForm::your_email(); ?>
								<label for="phoneNumber"><?php _e('Phone number', 'minimalist'); ?> (<?php _e('optional', 'minimalist'); ?>):</label> <?php ContactForm::your_phone_number(); ?>
								<?php osc_run_hook('item_contact_form', osc_item_id()); ?>
								<label for="message"><?php _e('Message', 'minimalist'); ?>:</label> <?php ContactForm::your_message(); ?>
								<input type="hidden" name="action" value="contact_post" />
								<input type="hidden" name="page" value="item" />
								<input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
								<?php
								if(osc_recaptcha_public_key())
								{
									?>
									<script type="text/javascript">
										var RecaptchaOptions = {
											theme: 'custom',
											custom_theme_widget: 'recaptcha_widget'
										};
									</script>
									<style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:280px; } </style>
									<div id="recaptcha_widget">
										<div id="recaptcha_image"><img /></div>
										<span class="recaptcha_only_if_image"><?php _e('Enter the words above', 'minimalist'); ?>:</span>
										<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
										<div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'minimalist'); ?></a></div>
									</div>
									<?php
								}
								osc_show_recaptcha();
								?>
								<button type="submit"><?php _e('Send', 'minimalist'); ?></button>
							</fieldset>
						</form>
						<?php
					}
					?>
                </div>
            </div>
			<div class="clear"></div>
        </div>
		<?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>