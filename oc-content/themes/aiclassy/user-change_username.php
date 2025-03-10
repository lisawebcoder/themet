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
        return __('Change username', 'aiclassy');;
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
		<h1><?php _e('Change username', 'aiclassy'); ?></h1>
		<script type="text/javascript">
		$(document).ready(function() {
			$('form#change-username').validate({
				rules: {
					s_username: {
						required: true
					}
				},
				messages: {
					s_username: {
						required: '<?php echo osc_esc_js(__("Username: this field is required", "aiclassy")); ?>.'
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

			var cInterval;
			$("#s_username").keydown(function(event) {
				if($("#s_username").attr("value")!='') {
					clearInterval(cInterval);
					cInterval = setInterval(function(){
						$.getJSON(
							"<?php echo osc_base_url(true); ?>?page=ajax&action=check_username_availability",
							{"s_username": $("#s_username").attr("value")},
							function(data){
								clearInterval(cInterval);
								if(data.exists==0) {
									$("#available").text('<?php echo osc_esc_js(__("The username is available", "aiclassy")); ?>');
								} else {
									$("#available").text('<?php echo osc_esc_js(__("The username is NOT available", "aiclassy")); ?>');
								}
							}
						);
					}, 1000);
				}
			});

		});
		</script>
		<div class="">
			<div class="resp-wrapper">
				<ul id="error_list"></ul>
				<form action="<?php echo osc_base_url(true); ?>" method="post" id="change-username">
					<input type="hidden" name="page" value="user" />
					<input type="hidden" name="action" value="change_username_post" />
					<div class="form-group">
						<label class="form-label" for="s_username"><?php _e('Username', 'aiclassy'); ?></label>
						<div class="controls">
							<input type="text" name="s_username" id="s_username" value="" />
							<div id="available"></div>
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
