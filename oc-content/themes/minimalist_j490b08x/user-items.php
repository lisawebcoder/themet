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
            <h1>
                <strong><?php _e('User account manager', 'minimalist'); ?></strong>
            </h1>
            <div id="sidebar">
				<?php echo osc_private_user_menu(); ?>
            </div>
            <div id="main">
                <h2><?php _e('Your listings', 'minimalist'); ?> <a href="<?php echo osc_item_post_url(); ?>" class="button small primary">+ <?php _e('Post a new listing', 'minimalist'); ?></a></h2>
				<?php
				if(osc_count_items() == 0)
				{
					?>
					<h3><?php _e("You don't have any listings yet", 'minimalist'); ?></h3>
					<?php
				}
				else
				{
					echo '<table class="grid">';
					echo'<tr>
							<th></th>
							<th>' . __('Publication date', 'minimalist') . '</th>
							' . (osc_price_enabled_at_items() ? '<th>' . __('Price', 'minimalist') . '</th>' : '') . '
							<th></th>
						</tr>';
					while(osc_has_items())
					{
						$_delete = '<a class="delete" 
							onclick="javascript:return confirm(\'' . osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'minimalist')) . '\')" 
							href="' . osc_item_delete_url() . '" >' . __('Delete', 'minimalist') . '</a>';

						echo '<tr class="' . ($_row++ % 2 == 0 ? 'even' : 'odd') . '">
								<td><a href="' . osc_item_url() . '">' . osc_item_title() . '</a></td>
								<td>' . osc_format_date(osc_item_pub_date()) . '</td>
								' . (osc_price_enabled_at_items() ? '<td>' . osc_format_price(osc_item_price()) . '</td>' : '') . '
								<td class="options">
									<strong><a href="' . osc_item_edit_url() . '">' . __('Edit', 'minimalist') . '</a></strong> | 
									' . $_delete . '
									' . (osc_item_is_inactive() ? ' | <a href="' . osc_item_activate_url() . '" >' . __('Activate', 'minimalist') . '</a>' : '') . '
								</td>
							</tr>';
					}
					echo '</table>';


					if(osc_list_total_pages() > 1)
					{
						?>
						<div class="paginate" >
							<?php
							for($i = 0; $i < osc_list_total_pages(); $i++)
							{
								if($i == osc_list_page())
								{
									printf('<a class="searchPaginationSelected" href="%s">%d</a>', osc_user_list_items_url($i), ($i + 1));
								}
								else
								{
									printf('<a class="searchPaginationNonSelected" href="%s">%d</a>', osc_user_list_items_url($i), ($i + 1));
								}
							}
							?>
						</div>
						<?php
					}
				}
				?>
			</div>
        </div>
		<?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>