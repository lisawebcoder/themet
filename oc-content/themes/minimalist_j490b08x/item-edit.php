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

        <!-- only item-edit.php -->
        <?php ItemForm::location_javascript_new(); ?>
        <?php if(osc_images_enabled_at_items()) ItemForm::photos_javascript(); ?>
        <script type="text/javascript">
            function uniform_input_file(){
                photos_div = $('div.photos');
                $('div',photos_div).each(
                    function(){
                        if( $(this).find('div.uploader').length == 0  ){
                            divid = $(this).attr('id');
                            if(divid != 'photos'){
                                divclass = $(this).hasClass('box');
                                if( !$(this).hasClass('box') & !$(this).hasClass('uploader') & !$(this).hasClass('row')){
                                    $("div#"+$(this).attr('id')+" input:file").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});
                                }
                            }
                        }
                    }
                );
            }

            setInterval("uniform_plugins()", 250);
            function uniform_plugins() {

                var content_plugin_hook = $('#plugin-hook').text();
                content_plugin_hook = content_plugin_hook.replace(/(\r\n|\n|\r)/gm,"");
                if( content_plugin_hook != '' ){

                    var div_plugin_hook = $('#plugin-hook');
                    var num_uniform = $("div[id*='uniform-']", div_plugin_hook ).size();
                    if( num_uniform == 0 ){
                        if( $('#plugin-hook input:text').size() > 0 ){
                            $('#plugin-hook input:text').uniform();
                        }
                        if( $('#plugin-hook select').size() > 0 ){
                            $('#plugin-hook select').uniform();
                        }
                    }
                }
            }
            <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
            $().ready(function(){
                $("#price").blur(function(event) {
                    var price = $("#price").attr("value");
                    <?php if(osc_locale_thousands_sep()!='') { ?>
                    while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                        price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
                    }
                    <?php }; ?>
                    <?php if(osc_locale_dec_point()!='') { ?>
                    var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
                    if(tmp.length>2) {
                        price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
                    }
                    <?php }; ?>
                    $("#price").attr("value", price);
                });
            });
            <?php }; ?>
        </script>
        <!-- end only item-edit.php -->
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content add_item">
            <h1><strong><?php _e('Update your listing', 'minimalist'); ?></strong></h1>
            <ul id="error_list" class="flashmessage-error"></ul>
                <form name="item" action="<?php echo osc_base_url(true)?>" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="action" value="item_edit_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                    <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                        <div class="box general_info">
                            <h2><?php _e('General Information', 'minimalist'); ?></h2>
                            <div class="row">
                                <label><?php _e('Category', 'minimalist'); ?> *</label>
                                <?php ItemForm::category_select(null, null, __('Select a category', 'minimalist')); ?>
                            </div>
                            <div class="row">
                                <?php ItemForm::multilanguage_title_description(osc_get_locales()); ?>
                            </div>
                            <?php if( osc_price_enabled_at_items() ) { ?>
                            <div class="row price">
                                <label><?php _e('Price', 'minimalist'); ?></label>
                                <?php ItemForm::price_input_text(); ?>
                                <?php ItemForm::currency_select(); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if( osc_images_enabled_at_items() ) { ?>
                        <div class="box photos">
                            <h2><?php _e('Photos', 'minimalist'); ?></h2>
                            <?php ItemForm::photos(); ?>
                            <div id="photos">
                                <?php if(osc_max_images_per_item()==0 || (osc_max_images_per_item()!=0 && osc_count_item_resources()<  osc_max_images_per_item())) { ?>
                                <div class="row">
                                    <input type="file" name="photos[]" />
                                </div>
                                <?php }; ?>
                            </div>
                            <a href="#" onclick="addNewPhoto(); uniform_input_file(); return false;"><?php _e('Add new photo', 'minimalist'); ?></a>
                        </div>
                        <?php } ?>

                        <div class="box location">
                            <h2><?php _e('Location', 'minimalist'); ?></h2>
                            <div class="row">
                                <label><?php _e('Country', 'minimalist'); ?></label>
                                <?php ItemForm::country_select(); ?>
                            </div>
                            <div class="row">
                                <label><?php _e('Region', 'minimalist'); ?></label>
                                <?php ItemForm::region_text(); ?>
                            </div>
                            <div class="row">
                                <label><?php _e('City', 'minimalist'); ?></label>
                                <?php ItemForm::city_text(); ?>
                            </div>
                            <div class="row">
                                <label><?php _e('City area', 'minimalist'); ?></label>
                                <?php ItemForm::city_area_text(); ?>
                            </div>
                            <div class="row">
                                <label><?php _e('Address', 'minimalist'); ?></label>
                                <?php ItemForm::address_text(); ?>
                            </div>
                        </div>
                        <?php ItemForm::plugin_edit_item(); ?>
                        <?php if( osc_recaptcha_items_enabled() ) {?>
                        <div class="box">
                            <div class="row">
                                <?php osc_show_recaptcha(); ?>
                            </div>
                        </div>
                        <?php }?>
                    <button class="itemFormButton" type="submit"><?php _e('Update', 'minimalist'); ?></button>
                    <a href="javascript:history.back(-1)" class="go_back"><?php _e('Cancel', 'minimalist'); ?></a>
                </fieldset>
            </form>
        </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>