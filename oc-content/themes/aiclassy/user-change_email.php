<?php

    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    aiclassy_add_body_class('user user-profile');
    /*osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }*/
    osc_add_filter('meta_title_filter','aiclassy_meta_title');
    function aiclassy_meta_title($data){
        return __('Change e-mail', 'aiclassy');;
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
		<h1><?php _e('Change e-mail', 'aiclassy'); ?></h1>
		<div class="">
			<div class="resp-wrapper">
				<ul id="error_list"></ul>
				<form action="<?php echo osc_base_url(true); ?>" method="post">
					<input type="hidden" name="page" value="user" />
					<input type="hidden" name="action" value="change_email_post" />
					<div class="form-group">
						<label for="email"><?php _e('Current e-mail', 'aiclassy'); ?></label>
						<div class="controls">
							<?php echo osc_logged_user_email(); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="new_email"><?php _e('New e-mail', 'aiclassy'); ?> *</label>
						<div class="controls">
							<input type="text" name="new_email" id="new_email" value="" />
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
		<script type="text/javascript">
			$(document).ready(function() {
				$('form#change-email').validate({
					rules: {
						new_email: {
							required: true,
							email: true
						}
					},
					messages: {
						new_email: {
							required: '?php echo osc_esc_js(__("Email: this field is required", "aiclassy")); ?>.',
							email: '<?php echo osc_esc_js(__("Invalid email address", "aiclassy")); ?>.'
						}
					},
					errorLabelContainer: "#error_list",
					wrapper: "li",
					invalidHandler: function(form, validator) {
						$('html,body').animate({ scrollTop: $('h1').offset().top }, { duration: 250, easing: 'swing'});
					},
					submitHandler: function(form){
						$('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
						form.submit();
					}
				});
			});
		</script>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
