<?php

    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('user user-aiclassy');
    /*osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }*/
    osc_current_web_theme_path('header.php') ;
?>
    
    <div class="row">
	<div class="col-lg-3">
		<button type="button" data-toggle="collapse" data-target="#responsive-sidebar" class="btn btn-info btn-sm btn-block collapsed hidden-lg">User menu</button>
		<div id="responsive-sidebar" class=" in">
			 <?php echo aiclassy_private_user_menu( get_user_menu() ); ?>
			
		</div>
	</div>
	<div class="col-lg-9">
		<?php osc_render_file(); osc_run_hook('search_ads_listing_top'); ?>
		
	</div>
</div>
<?php
    osc_current_web_theme_path('footer.php');
?>
