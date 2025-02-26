<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'aiclassy_theme') ? '' : 'separate-top'); ?>"><?php _e('Theme settings', 'aiclassy'); ?></h2>
<form name="theme_setting" action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Search placeholder', 'aiclassy'); ?></div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html( osc_get_preference('keyword_placeholder', 'aiclassy_theme') ); ?>">
				</div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Terms & Conditions page internal name', 'aiclassy'); ?></div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="tclink" value="<?php echo osc_esc_html( osc_get_preference('tclink', 'aiclassy_theme') ); ?>">
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Show search lists as:</div>
                <div class="form-controls">
                    <select name="defaultShowAs@all">
                        <option value="gallery" <?php if(aiclassy_default_show_as() == 'gallery'){ echo 'selected="selected"' ; } ?> ><?php _e('Gallery','aiclassy'); ?></option>
                        <option value="list" 
                        <?php if(aiclassy_default_show_as() == 'list'){ 
							echo 'selected="selected"' ; } ?> 
							>
							<?php _e('List','aiclassy'); ?>
							</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Color scheme of site</div>
                <div class="form-controls">
                    <select name="defaultcolorscheme">
						<?php $sitecolorscheme = getPreference('defaultcolorscheme','aiclassy_theme'); ?>
                        <option value="flatly" <?php if($sitecolorscheme == 'flatly'){ echo 'selected="selected"' ; } ?> >Flatly</option>
                        <option value="cerulean" <?php if($sitecolorscheme == 'cerulean'){ echo 'selected="selected"' ; } ?> >Cerulean</option>
                        <option value="cosmo" <?php if($sitecolorscheme == 'cosmo'){ echo 'selected="selected"' ; } ?> >Cosmo</option>
                        <option value="cyborg" <?php if($sitecolorscheme == 'cyborg'){ echo 'selected="selected"' ; } ?> >Cyborg</option>
                        <option value="darkly" <?php if($sitecolorscheme == 'darkly'){ echo 'selected="selected"' ; } ?> >Darkly</option>
                        <option value="journal" <?php if($sitecolorscheme == 'journal'){ echo 'selected="selected"' ; } ?> >journal</option>
                        <option value="paper" <?php if($sitecolorscheme == 'paper'){ echo 'selected="selected"' ; } ?> >paper</option>
                        <option value="sandstone" <?php if($sitecolorscheme == 'sandstone'){ echo 'selected="selected"' ; } ?> >sandstone</option>
                        <option value="simplex" <?php if($sitecolorscheme == 'simplex'){ echo 'selected="selected"' ; } ?> >simplex</option>
                        <option value="slate" <?php if($sitecolorscheme == 'slate'){ echo 'selected="selected"' ; } ?> >slate</option>
                        <option value="spacelab" <?php if($sitecolorscheme == 'spacelab'){ echo 'selected="selected"' ; } ?> >spacelab</option>
                        <option value="superhero" <?php if($sitecolorscheme == 'superhero'){ echo 'selected="selected"' ; } ?> >superhero</option>
                        <option value="yeti" <?php if($sitecolorscheme == 'yeti'){ echo 'selected="selected"' ; } ?> >Yeti</option>
                        <option value="united" <?php if($sitecolorscheme == 'united'){ echo 'selected="selected"' ; } ?> >united</option>
                        <option value="lumen" <?php if($sitecolorscheme == 'lumen'){ echo 'selected="selected"' ; } ?> >lumen</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Header Style</div>
                <div class="form-controls">
                    <select name="header@theme">
						<?php $siteheaderclass=osc_get_preference('header@theme', 'aiclassy_theme'); ?>
                        <option value="default" <?php if($siteheaderclass == 'default'){ echo 'selected="selected"' ; } ?> >Default</option>
                        <option value="inverse" <?php if($siteheaderclass == 'inverse'){ echo 'selected="selected"' ; } ?> >Inverse</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Navbar Panel Style</div>
                <div class="form-controls">
                    <select name="navbar@theme">
						<?php $sitenavbar=osc_get_preference('navbar@theme', 'aiclassy_theme'); ?>
                        <option value="fixed" <?php if($sitenavbar == 'fixed'){ echo 'selected="selected"' ; } ?> >Fixed bar</option>
                        <option value="advs" <?php if($sitenavbar == 'advs'){ echo 'selected="selected"' ; } ?> >Navbar Advertisement</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Slider Style</div>
                <div class="form-controls">
                    <select name="slider@theme">
						<?php $slider=osc_get_preference('slider@theme', 'aiclassy_theme'); ?>
                        <option value="items" <?php if($slider == 'items'){ echo 'selected="selected"' ; } ?> >Featured Items</option>
                        <option value="images" <?php if($slider == 'images'){ echo 'selected="selected"' ; } ?> >Images slider</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Home page display style</div>
                <div class="form-controls">
                    <select name="Homepage_display_option" class="main-map-select-box">
                        <option value="banner" <?php if(aiclassy_default_home_page() == 'banner'){ echo 'selected="selected"' ; } ?> >Banner layout</option>
                        <option value="category" <?php if(aiclassy_default_home_page() == 'category'){ echo 'selected="selected"' ; } ?> >Category layout</option>
                        <option value="map" <?php if(aiclassy_default_home_page() == 'map'){ echo 'selected="selected"' ; } ?> >Map layout</option>
                        <option value="slider" <?php if(aiclassy_default_home_page() == 'slider'){ echo 'selected="selected"' ; } ?> >Full width slider</option>
                        <option value="banner-category" <?php if(aiclassy_default_home_page() == 'banner-category'){ echo 'selected="selected"' ; } ?> >Banner + Category layout</option>
                        <!--<option value="category-navbar" <?php if(aiclassy_default_home_page() == 'category-navbar'){ echo 'selected="selected"' ; } ?> >Navbar Category Layout</option>-->
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Animations</div>
                <div class="form-controls">
					<select name="animation@gen">
						<option value="no" <?php  if(osc_get_preference('animation@gen', 'aiclassy_theme')=='no'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="yes" <?php  if(osc_get_preference('animation@gen', 'aiclassy_theme')=='yes'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Categories on navbar</div>
                <div class="form-controls">
                    <select name="category@navbar" class="">
                        <option value="hide" <?php if(osc_get_preference('category@navbar', 'aiclassy_theme') == 'hide'){ echo 'selected="selected"' ; } ?> >Hide</option>
                        <option value="show" <?php if(osc_get_preference('category@navbar', 'aiclassy_theme') == 'show'){ echo 'selected="selected"' ; } ?> >Show</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Categories on sidebar</div>
                <div class="form-controls">
                    <select name="category@sidebar" class="">
                        <option value="hide" <?php if(osc_get_preference('category@sidebar', 'aiclassy_theme') == 'hide'){ echo 'selected="selected"' ; } ?> >Hide</option>
                        <option value="show" <?php if(osc_get_preference('category@sidebar', 'aiclassy_theme') == 'show'){ echo 'selected="selected"' ; } ?> >Show</option>
                    </select>
                </div>
            </div>
            
			<div class="form-row sub-map-select-box" <?php if(aiclassy_default_home_page()!='map'){ echo 'style="display:none;"'; } ?> >
                <div class="form-label">Country for map</div>
                <div class="form-controls"> 
					<select name="country@map">
						<option value=""><?=__('Select a country...','aiclassy');?></option>
						<option value="US" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='US'){ echo 'selected="selected"'; } ?> >USA</option>
						<option value="BR" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='BR'){ echo 'selected="selected"'; } ?> >BRAZIL</option>
						<option value="RO" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='RO'){ echo 'selected="selected"'; } ?> >ROMANIA</option>
						<option value="ES" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='ES'){ echo 'selected="selected"'; } ?> >SPAIN</option>
						<option value="IN" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='IN'){ echo 'selected="selected"'; } ?> >INDIA</option>
						<option value="IT" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='IT'){ echo 'selected="selected"'; } ?> >ITALIA</option>
						<option value="MY" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='MY'){ echo 'selected="selected"'; } ?> >MALAYSIA</option>
						<option value="AU" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='AU'){ echo 'selected="selected"'; } ?> >AUSTRALIA</option>
						<option value="CH" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='CH'){ echo 'selected="selected"'; } ?> >SWITZERLAND</option>
						<option value="IE" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='IE'){ echo 'selected="selected"'; } ?> >IRELAND</option>
						<option value="FR" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='FR'){ echo 'selected="selected"'; } ?> >FRANCE</option>
						<option value="PK" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='PK'){ echo 'selected="selected"'; } ?> >PAKISTAN</option>
						<option value="SE" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='SE'){ echo 'selected="selected"'; } ?> >SWEDEN</option>
						<option value="LK" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='LK'){ echo 'selected="selected"'; } ?> >SRILANKA</option>
						<option value="IR" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='IR'){ echo 'selected="selected"'; } ?> >IRAN</option>
						<option value="ID" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='ID'){ echo 'selected="selected"'; } ?> >INDONESIA</option>
						<option value="NL" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='NL'){ echo 'selected="selected"'; } ?> >NETHERLAND</option>
						<option value="BG" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='BG'){ echo 'selected="selected"'; } ?> >BULGARIA</option>
						<option value="GB" <?php  if(osc_get_preference('country@map', 'aiclassy_theme')=='GB'){ echo 'selected="selected"'; } ?> >UK</option>
					</select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Contact Us map link</div>
                <div class="form-controls">
					<textarea name="contact_us_map_link" style="height:50px;width:250px;"><?php echo osc_get_preference('contact_us_map_link', 'aiclassy_theme'); ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Language display on</div>
                <div class="form-controls">
					<select name="languagedisplay@gen">
						<option value="footer" <?php  if(osc_get_preference('languagedisplay@gen', 'aiclassy_theme')=='footer'){ echo 'selected="selected"'; } ?> >Footer</option>
						<option value="header" <?php  if(osc_get_preference('languagedisplay@gen', 'aiclassy_theme')=='header'){ echo 'selected="selected"'; } ?> >Header</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Report listing on single item page</div>
                <div class="form-controls">
					<select name="reportlisting@item">
						<option value="show" <?php  if(osc_get_preference('reportlisting@item', 'aiclassy_theme')=='show'){ echo 'selected="selected"'; } ?> >Show</option>
						<option value="hide" <?php  if(osc_get_preference('reportlisting@item', 'aiclassy_theme')=='hide'){ echo 'selected="selected"'; } ?> >Hide</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Location Cookies</div>
                <div class="form-controls">
					<select name="location@item">
						<option value="show" <?php  if(osc_get_preference('location@item', 'aiclassy_theme')=='show'){ echo 'selected="selected"'; } ?> >Enable</option>
						<option value="hide" <?php  if(osc_get_preference('location@item', 'aiclassy_theme')=='hide'){ echo 'selected="selected"'; } ?> >Disable</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Facebook page like</div>
                <div class="form-controls">
					<select name="facebook@page">
						<option value="hide" <?php  if(osc_get_preference('facebook@page', 'aiclassy_theme')=='hide'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="show" <?php  if(osc_get_preference('facebook@page', 'aiclassy_theme')=='show'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Advertisements</div>
                <div class="form-controls">
					<select name="advertisements@dispay">
						<option value="hide" <?php  if(osc_get_preference('advertisements@dispay', 'aiclassy_theme')=='hide'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="show" <?php  if(osc_get_preference('advertisements@dispay', 'aiclassy_theme')=='show'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <h2 class="render-title separate-top">Search form setting</h2>
            <div class="form-row">
                <div class="form-label">Search panel Position</div>
                <div class="form-controls">
                    <select name="position@search" class="">
                        <option value="vertical" <?php if(osc_get_preference('position@search', 'aiclassy_theme') == 'vertical'){ echo 'selected="selected"' ; } ?> >Vertical on sidebar</option>
                        <option value="horizontal" <?php if(osc_get_preference('position@search', 'aiclassy_theme') == 'horizontal'){ echo 'selected="selected"' ; } ?> >Horizontal before slider</option>
                        <option value="slider" <?php if(osc_get_preference('position@search', 'aiclassy_theme') == 'slider'){ echo 'selected="selected"' ; } ?> >Horizontal after slider</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Display category</div>
                <div class="form-controls">
					<select name="category@search">
						<option value="no" <?php  if(osc_get_preference('category@search', 'aiclassy_theme')=='no'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="yes" <?php  if(osc_get_preference('category@search', 'aiclassy_theme')=='yes'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Display country</div>
                <div class="form-controls">
					<select name="country@search">
						<option value="no" <?php  if(osc_get_preference('country@search', 'aiclassy_theme')=='no'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="yes" <?php  if(osc_get_preference('country@search', 'aiclassy_theme')=='yes'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Display region</div>
                <div class="form-controls">
					<select name="region@search">
						<option value="no" <?php  if(osc_get_preference('region@search', 'aiclassy_theme')=='no'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="yes" <?php  if(osc_get_preference('region@search', 'aiclassy_theme')=='yes'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Display city</div>
                <div class="form-controls">
					<select name="city@search">
						<option value="no" <?php  if(osc_get_preference('city@search', 'aiclassy_theme')=='no'){ echo 'selected="selected"'; } ?> >Hide</option>
						<option value="yes" <?php  if(osc_get_preference('city@search', 'aiclassy_theme')=='yes'){ echo 'selected="selected"'; } ?> >Show</option>
					</select>
				</div>
            </div>
            <h2 class="render-title separate-top">Home page setting</h2>
            <div class="form-row">
                <div class="form-label">Items displayed in Layer one</div>
                <div class="form-controls">
					<select name="layer_display_1" id="layer_1">
						<option value="premium" <?php  if(osc_get_preference('layer_display_1', 'aiclassy_theme')=='premium'){ echo 'selected="selected"'; } ?> >Premium Items</option>
						<option value="carousel" <?php  if(osc_get_preference('layer_display_1', 'aiclassy_theme')=='carousel'){ echo 'selected="selected"'; } ?> >Premium Items Carousel</option>
						<option value="none" <?php  if(osc_get_preference('layer_display_1', 'aiclassy_theme')=='none'){ echo 'selected="selected"'; } ?> >Hide</option>
					</select>
                </div>
            </div>            
            <div class="form-row">
                <div class="form-label">Items displayed in Layer Two</div>
                <div class="form-controls">
					<select name="layer_display_2">
						<option value="newest" <?php  if(osc_get_preference('layer_display_2', 'aiclassy_theme')=='newest'){ echo 'selected="selected"'; } ?> >Newest Items</option>
						<option value="popular" <?php  if(osc_get_preference('layer_display_2', 'aiclassy_theme')=='popular'){ echo 'selected="selected"'; } ?> >Popular Items</option>
						<option value="none" <?php  if(osc_get_preference('layer_display_2', 'aiclassy_theme')=='none'){ echo 'selected="selected"'; } ?> >Hide</option>
					</select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Items displayed in Layer Three</div>
                <div class="form-controls">
					<select name="layer_display_3">
						<option value="newest" <?php  if(osc_get_preference('layer_display_3', 'aiclassy_theme')=='newest'){ echo 'selected="selected"'; } ?> >Newest Items</option>
						<option value="popular" <?php  if(osc_get_preference('layer_display_3', 'aiclassy_theme')=='popular'){ echo 'selected="selected"'; } ?> >Popular Items</option>
						<option value="none" <?php  if(osc_get_preference('layer_display_3', 'aiclassy_theme')=='none'){ echo 'selected="selected"'; } ?> >Hide</option>
					</select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Items displayed in Sidebar</div>
                <div class="form-controls">
					<select name="layer_sidebar">
						<option value="premium" <?php  if(osc_get_preference('layer_sidebar', 'aiclassy_theme')=='premium'){ echo 'selected="selected"'; } ?> >Premium Items</option>
						<option value="newest" <?php  if(osc_get_preference('layer_sidebar', 'aiclassy_theme')=='newest'){ echo 'selected="selected"'; } ?> >Newest Items</option>
						<option value="popular" <?php  if(osc_get_preference('layer_sidebar', 'aiclassy_theme')=='popular'){ echo 'selected="selected"'; } ?> >Popular Items</option>
						<option value="none" <?php  if(osc_get_preference('layer_sidebar', 'aiclassy_theme')=='none'){ echo 'selected="selected"'; } ?> >Hide</option>
					</select>
                </div>
            </div>
            <h2 class="render-title">home page items setting</h2>
            <div class="form-row">
                <div class="form-label">No. of premium listings shown</div>
                <div class="form-controls">
					<input type="text" class="input-small" name="noof_premium_listing" value="<?php echo osc_get_preference('noof_premium_listing', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">No. of popular listings shown</div>
                <div class="form-controls">
					<input type="text" class="input-small" name="noof_popular_listing" value="<?php echo osc_get_preference('noof_popular_listing', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">No. of new listings shown</div>
                <div class="form-controls">
					<input type="text" class="input-small" name="noof_new_listing" value="<?php echo osc_get_preference('noof_new_listing', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">No. of sidebar listings shown</div>
                <div class="form-controls">
					<input type="text" class="input-small" name="noof_side_listing" value="<?php echo osc_get_preference('noof_side_listing', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <h2 class="render-title">Social Media Links</h2>
            <div class="form-row">
                <div class="form-label">Facebook</div>
                <div class="form-controls">
					<input type="text" class="" name="sociallink@facebook" value="<?php echo osc_get_preference('sociallink@facebook', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Twitter</div>
                <div class="form-controls">
					<input type="text" class="" name="sociallink@twitter" value="<?php echo osc_get_preference('sociallink@twitter', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">LinkedIn</div>
                <div class="form-controls">
					<input type="text" class="" name="sociallink@linkedin" value="<?php echo osc_get_preference('sociallink@linkedin', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-row">
                <div class="form-label">Google Plus</div>
                <div class="form-controls">
					<input type="text" class="" name="sociallink@googleplus" value="<?php echo osc_get_preference('sociallink@googleplus', 'aiclassy_theme'); ?>" />
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'aiclassy'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
$(function() {
	
	$('select.main-map-select-box').on('change', function() {
		if($(this).val()=='map'){
			if($('.sub-map-select-box').is(':hidden')) {
				$('.sub-map-select-box').fadeIn();
			}
		}else{
			if($('.sub-map-select-box').is(':visible')) {
				$('.sub-map-select-box').fadeOut();
			}
		}
	  //alert( this.value ); // or $(this).val()
	});
});
</script>
