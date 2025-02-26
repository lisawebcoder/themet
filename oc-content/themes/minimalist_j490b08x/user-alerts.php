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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
		<?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
		<?php osc_current_web_theme_path('header.php'); ?>
        <div class="content user_account">
            <h1><strong><?php _e('User account manager', 'minimalist'); ?></strong></h1>
            <div id="sidebar">
				<?php echo osc_private_user_menu(); ?>
            </div>
            <div id="main">
                <h2><?php _e('Your alerts', 'minimalist'); ?></h2>
				<?php
				if(osc_count_alerts() == 0)
				{
					?>
					<h3><?php _e('You do not have any alerts yet', 'minimalist'); ?>.</h3>
					<?php
				}
				else
				{
					echo '<table class="grid">';
					while($row = osc_has_alerts())
					{
						$_alert_description = clb_minimalist_format_alert_description(osc_alert());
						$_alert_delete = '<a class="button small" onclick="javascript:return confirm(\'' . osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'minimalist')) . '\');" 
									href="' . osc_user_unsubscribe_alert_url() . '">' . __('Delete this alert', 'minimalist') . '</a>';



						// alert controls
						echo '<tr class="odd">
								<td colspan="' . (osc_price_enabled_at_items() ? '3' : '2') . '">
									<h3 class="alert_title">'
						. __('Alert', 'minimalist') 
						. ' <span class="small">('
						. intval(osc_count_items()) . ' ' . __('Listings', 'minimalist')
						. ($_alert_description ? ' - "' . $_alert_description . '" ' : '')
						. ')</span> '
						. $_alert_delete
						. '
									</h3>
								</td>
							</tr>';


						if(osc_count_items() > 0)
						{
							echo'<tr class="' . $class . '">
									<th></th>
									<th>' . __('Publication date', 'minimalist') . '</th>
									' . (osc_price_enabled_at_items() ? '<th>' . __('Price', 'minimalist') . '</th>' : '') . '
								</tr>';

							while(osc_has_items())
							{

								echo '<tr class="' . $class . '">
										<td><a href="' . osc_item_url() . '">' . osc_item_title() . '</a></td>
										<td>' . osc_format_date(osc_item_pub_date()) . '</td>
										' . (osc_price_enabled_at_items() ? '<td>' . osc_format_price(osc_item_price()) . '</td>' : '') . '
									</tr>';
							}
						}
					}
					echo '</table>';
				}
				?>
			</div>
        </div>
		<?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>