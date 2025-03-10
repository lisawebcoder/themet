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
<!-- container -->
<div class="container">
	<!-- header -->
	<div id="header">
		<div class="c1">
			<h1 id="logo"><a href="<?php echo osc_base_url(); ?>"><?php echo clb_minimalist_logo_header(); ?></a></h1>
			<?php
			if(strlen(osc_page_description()))
			{
				echo '<span id="description">' . osc_page_description() . '</span>';
			}
			?>
		</div>
		<div id="user_menu">
			<ul>
				<?php
				if(osc_users_enabled())
				{

					if(osc_count_web_enabled_locales() > 1)
					{
						$class_first_last = '';
					}
					else
					{
						$class_first_last = ' last';
					}


					if(osc_is_web_user_logged_in())
					{
						?>
						<li class="first logged<?php echo $class_first_last;?>">
							<?php echo sprintf(__('Hi %s', 'minimalist'), osc_logged_user_name() . '!'); ?>  &middot;
							<strong><a href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'minimalist'); ?></a></strong> &middot;
							<a href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'minimalist'); ?></a>
						</li>
						<?php
					}
					else
					{
						?>
						<li class="first<?php echo $class_first_last;?>">
							<a id="login_open" href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'minimalist'); ?></a>
							<?php
							if(osc_user_registration_enabled())
							{
								?>
								&middot;
								<a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'minimalist'); ?></a>
								<?php
							}
							?>
							<form id="login" action="<?php echo osc_base_url(true); ?>" method="post">
								<fieldset>
									<input type="hidden" name="page" value="login" />
									<input type="hidden" name="action" value="login_post" />
									<label for="email"><?php _e('E-mail', 'minimalist'); ?></label><br/>
									<?php UserForm::email_login_text(); ?><br/>
									<label for="password"><?php _e('Password', 'minimalist'); ?></label><br/>
									<?php UserForm::password_login_text(); ?>
									<p class="checkbox"><?php UserForm::rememberme_login_checkbox(); ?> <label for="remember"><?php _e('Remember me', 'minimalist'); ?></label></p>
									<button type="submit"><?php _e('Log in', 'minimalist'); ?></button>
									<div class="forgot">
										<a href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'minimalist'); ?></a>
									</div>
								</fieldset>
							</form>
						</li>
						<?php
					}
				}

				if(osc_count_web_enabled_locales() > 1)
				{
					osc_goto_first_locale();
					?>
					<li class="last with_sub">
						<strong><?php _e("Language", 'minimalist'); ?></strong>
						<ul>
							<?php
							$i = 0;

							while(osc_has_web_enabled_locales())
							{
								?>
								<li <?php echo $i == 0 ? 'class="first"' : ''; ?>><a id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url(osc_locale_code()); ?>"><?php echo osc_locale_name(); ?></a></li>
								<?php
								$i++;
							}
							?>
						</ul>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
			if(osc_users_enabled() || (!osc_users_enabled() && !osc_reg_user_post() ))
			{
				?>
				<p>
					<a href="<?php echo osc_item_post_url_in_category(); ?>" class="button primary large"><?php _e("Publish your ad for free", 'minimalist'); ?></a>
				</p>
				<?php
			}
			?>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /header -->
	<?php
	osc_show_widgets('header');

	$breadcrumb = osc_breadcrumb('&raquo;', false);
	if($breadcrumb != '')
	{
		?>
		<div class="breadcrumb">
			<?php echo $breadcrumb; ?>
			<div class="clear"></div>
		</div>
		<?php
	}
	?>
	<div class="forcemessages-inline">
		<?php osc_show_flash_message(); ?>
	</div>
