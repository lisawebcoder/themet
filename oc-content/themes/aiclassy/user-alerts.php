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
        return __('Alerts', 'aiclassy');;
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
?>
<div class="row">
	<div class="col-lg-3">
		<button type="button" data-toggle="collapse" data-target="#responsive-sidebar" class="btn btn-info btn-sm btn-block collapsed hidden-lg">User menu</button>
		<div id="responsive-sidebar" class=" in">
		 <?php echo aiclassy_private_user_menu( get_user_menu() ); ?>
		 <div id="dialog-delete-account" title="<?php echo osc_esc_html(__('Delete account', 'aiclassy')); ?>">
		<?php _e('Are you sure you want to delete your account?', 'aiclassy'); ?>
		</div>
		</div>
		
	</div>
	<div class="col-md-9">
		<h1><?php _e('Alerts', 'aiclassy'); ?></h1>
		<?php if(osc_count_alerts() == 0) { ?>
			<h3><?php _e('You do not have any alerts yet', 'aiclassy'); ?>.</h3>
		<?php } else { ?>
			<?php
			$i = 1;
			while(osc_has_alerts()) { ?>
				<div class="userItem" >
					<div class="title-has-actions">
						<h3><?php _e('Alert', 'aiclassy'); ?> <?php echo $i; ?></h3> <a onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'aiclassyw')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><?php _e('Delete this alert', 'aiclassy'); ?></a><div class="clear"></div></div>
					<div>
					<?php osc_current_web_theme_path('loop.php') ; ?>
					<?php if(osc_count_items() == 0) { ?>
							<br />
							0 <?php _e('Listings', 'aiclassy'); ?>
					<?php } ?>
					</div>
				</div>
				<br />
			<?php
			$i++;
			}
			?>
		<?php  } ?>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
