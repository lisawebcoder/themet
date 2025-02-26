<?php

    // meta tag robots
    osc_add_hook('header','aiclassy_follow_construct');

    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);

    osc_enqueue_script('jquery-validate');

    aiclassy_add_body_class('user-public-profile');
    /*osc_add_hook('after-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-public-sidebar.php');
    }*/

    osc_current_web_theme_path('header.php');
?>
<div class="row">
	<div class="col-lg-12">
		<?php aiclassy_show_flash_message(); ?>
	</div>
	<?php if(osc_logged_user_id() ==  osc_user_id()) { ?>
		<div class="col-lg-3">
			<button type="button" data-toggle="collapse" data-target="#responsive-sidebar" class="btn btn-info btn-sm btn-block collapsed hidden-lg">User menu</button>
			<div id="responsive-sidebar" class=" in">
			 <?php echo aiclassy_private_user_menu( get_user_menu() ); ?>
			 
			</div>
		</div>
	<?php } ?>
	<div class="col-md-7">
		 <div id="item-content">
			<div class="user-card">
				<?php profile_picture_show();?>
				<ul id="user_data">
					<li class="name"><?php echo osc_user_name(); ?></li>
					<?php if( osc_user_website() !== '' ) { ?>
					<li class="website"><a href="<?php echo osc_user_website(); ?>"><?php echo osc_user_website(); ?></a></li>
					<?php } ?>
					<?php if( $address !== '' ) { ?>
					<li class="adress"><?php printf(__('<strong>Address:</strong> %1$s'), $address); ?></li>
					<?php } ?>
					<?php if( $location !== '' ) { ?>
					<li class="location"><?php printf(__('<strong>Location:</strong> %1$s'), $location); ?></li>
					<?php } ?>
				</ul>
			</div>
			<?php if( osc_user_info() !== '' ) { ?>
			<h2><?php _e('User description', 'aiclassy'); ?></h2>
			<?php } ?>
			<?php echo nl2br(osc_user_info()); ?>
			<?php if( osc_count_items() > 0 ) { ?>
			<div class="similar_ads">
				<h2><?php _e('Latest listings', 'aiclassy'); ?></h2>
				<?php osc_current_web_theme_path('loop.php'); ?>
				<div class="paginate"><?php echo osc_pagination_items(); ?></div>
				<div class="clear"></div>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-md-5">
		<?php osc_current_web_theme_path('user-public-sidebar.php'); ?>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
