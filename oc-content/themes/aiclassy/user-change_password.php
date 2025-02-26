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
        return __('Change password', 'aiclassy');;
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
		<h1><?php _e('Change password', 'aiclassy'); ?></h1>
		<div class="">
			<div class="resp-wrapper">
				<ul id="error_list"></ul>
				<form action="<?php echo osc_base_url(true); ?>" method="post">
					<input type="hidden" name="page" value="user" />
					<input type="hidden" name="action" value="change_password_post" />
					<div class="form-group">
						<label class="form-label" for="password"><?php _e('Current password', 'aiclassy'); ?> *</label>
						<div class="controls">
							<input type="password" name="password" id="password" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="new_password"><?php _e('New password', 'aiclassy'); ?> *</label>
						<div class="controls">
							<input type="password" name="new_password" id="new_password" value="" />
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="new_password2"><?php _e('Repeat new password', 'aiclassy'); ?> *</label>
						<div class="controls">
							<input type="password" name="new_password2" id="new_password2" value="" />
						</div>
					</div>
					<div class="form-group">
						<div class="controls">
							<button type="submit" class="btn btn-success"><?php _e("Update", 'aiclassy');?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php osc_current_web_theme_path('footer.php') ; ?>
