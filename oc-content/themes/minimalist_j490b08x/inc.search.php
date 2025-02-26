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

$sQuery = osc_get_preference('keyword_placeholder', 'modern_theme');
?>
<script type="text/javascript">
	var sQuery = '<?php echo osc_esc_js($sQuery); ?>';

	$(document).ready(function() {
		if ($('input[name=sPattern]').val() == sQuery) {
			$('input[name=sPattern]').css('color', 'gray');
		}
		$('input[name=sPattern]').click(function() {
			if ($('input[name=sPattern]').val() == sQuery) {
				$('input[name=sPattern]').val('');
				$('input[name=sPattern]').css('color', '');
			}
		});
		$('input[name=sPattern]').blur(function() {
			if ($('input[name=sPattern]').val() == '') {
				$('input[name=sPattern]').val(sQuery);
				$('input[name=sPattern]').css('color', 'gray');
			}
		});
		$('input[name=sPattern]').keypress(function() {
			$('input[name=sPattern]').css('background', '');
		})
	});
</script>

<form action="<?php echo osc_base_url(true); ?>" method="get" class="search" onsubmit="javascript:return doSearch();">
    <input type="hidden" name="page" value="search" />
    <fieldset class="main">
		<span class="<?php echo osc_count_categories() ? 'c1' : 'c2' ?>">
			<input type="text" name="sPattern"  id="query" value="<?php echo osc_esc_html(( osc_search_pattern() != '' ) ? osc_search_pattern() : $sQuery ); ?>" />
		</span>
		<?php
		if(osc_count_categories())
		{
			echo '<span class="c1">';
			osc_categories_select('sCategory', null, __('Select a category', 'minimalist'));
			echo '</span>';
		}
		?>
		<span class="c1 last">
			<button type="submit" class="button"><?php _e('Search', 'minimalist'); ?></button>
		</span>
    </fieldset>
    <div id="search-example"></div>
</form>