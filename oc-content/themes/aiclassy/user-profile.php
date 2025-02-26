<?php

    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('user user-profile');
    /*osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }*/
    osc_add_filter('meta_title_filter','aiclassy_meta_title');
    function aiclassy_meta_title($data){
        return __('Update account', 'aiclassy');
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
?>
<div class="row">
	<div class="col-lg-3">
		<button type="button" data-toggle="collapse" data-target="#responsive-sidebar" class="btn btn-info btn-sm btn-block collapsed hidden-lg">User menu</button>
		<div id="responsive-sidebar" class=" in">
		 <?php echo aiclassy_private_user_menu( get_user_menu() ); ?>
		 
		</div>
	</div>
	<div class="col-lg-9">
		<?php aiclassy_draw_breadcrumb(); ?>
		<h1><?php _e('Update account', 'aiclassy'); ?></h1>
<?php UserForm::location_javascript(); ?>
<div class="">
    <div class="resp-wrapper">
        <ul id="error_list"></ul>
        <?php profile_picture_upload(); ?> 
        <form action="<?php echo osc_base_url(true); ?>" method="post">
            <input type="hidden" name="page" value="user" />
            <input type="hidden" name="action" value="profile_post" />
            <div class="form-group">
                <label class="form-label" for="name"><?php _e('Name', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::name_text(osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="user_type"><?php _e('User type', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::is_company_select(osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="phoneMobile"><?php _e('Cell phone', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::mobile_text(osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="phoneLand"><?php _e('Phone', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::phone_land_text(osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="country"><?php _e('Country', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="region"><?php _e('Region', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="city"><?php _e('City', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="city_area"><?php _e('City area', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::city_area_text(osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label"l for="address"><?php _e('Address', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::address_text(osc_user()); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="webSite"><?php _e('Website', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::website_text(osc_user()); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="s_info"><?php _e('Description', 'aiclassy'); ?></label>
                <div class="controls">
                    <?php UserForm::info_textarea('s_info', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info']); ?>
                </div>
            </div>
            <?php osc_run_hook('user_profile_form', osc_user()); ?>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><?php _e("Update", 'aiclassy');?></button>
               
            </div>
            <div class="form-group">
                <div class="controls">
                    <?php osc_run_hook('user_form', osc_user()); ?>
                </div>
            </div>
        </form>
    </div>
</div>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
