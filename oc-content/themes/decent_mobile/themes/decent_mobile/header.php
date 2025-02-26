<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php') ; ?>
    </head>
    <body class="body_bg">
        <div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
                <div>
                <div class="left-menu">
					<div class="menu-top">
						<h4 class="h_color"><?php _e('Welcome', 'decent_mobile'); ?> <?php  echo osc_logged_user_name();?></h4>
					</div>
					<ul class="border_2px">
						<li><a class="txt_color_2" href="<?php echo osc_user_dashboard_url() ; ?>"><span class="ico_color fa fa-user menu-img"></span> <span><?php _e('My Dashboard', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2"  href="<?php echo osc_item_post_url_in_category() ; ?>"><span class="ico_color fa fa-plus-square menu-img"></span> <span><?php _e('Publish an Ad', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2"  href="<?php echo osc_user_list_items_url() ; ?>"><span class="ico_color fa fa-th-list menu-img"></span> <span><?php _e('My Listings', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2"  href="<?php echo osc_user_dashboard_url(); ?><?php if ( osc_rewrite_enabled() ){echo'?my_favorites=1';}else{echo '&my_favorites=1';} ?>"><span class="ico_color fa fa-heart menu-img"></span> <span><?php _e('My Wishlist', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2"  href="<?php echo osc_user_alerts_url() ; ?>"><span class="ico_color fa fa-bell menu-img"></span> <span><?php _e('My Alerts', 'decent_mobile') ; ?></span></a></li>
						<?php if ( osc_count_web_enabled_locales() > 1) { ?>
						<li><a  href="#lang" data-toggle="modal" id="select_lang" class="launch_modal txt_color_2"><span class=" ico_color fa fa-language	 menu-img"></span>  <span><?php _e('My Language', 'decent_mobile') ; ?> <?php  
							$imgl = osc_current_web_theme_url('images/'.osc_current_user_locale().'.png');
							$file_headers = @get_headers($imgl);
							if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
							echo '('.osc_current_user_locale().')';
							}
							else {
								echo '<img src="'.$imgl.'">';
							}
							
						?></span></a></li>
						<?php } ?>
						<?php if( osc_is_web_user_logged_in() ) { ?>
						<li><a class="txt_color_2"  href="<?php echo osc_user_logout_url() ; ?>"><span class="ico_color glyphicon glyphicon-off	 menu-img"></span> <span><?php _e('Logout', 'decent_mobile') ; ?></span></a></li>
						<?php } else {?>
						<li><a class="txt_color_2"  href="<?php echo osc_user_login_url(); ?>"><span class="ico_color glyphicon glyphicon-log-in	 menu-img"></span> <span><?php _e('Login', 'decent_mobile') ; ?></span></a></li>
						<?php } ?>
					</ul>
					
					<div class="menu-top">
						<h4 class="h_color"><?php _e('Site Links', 'decent_mobile'); ?></h4>
					</div>
					<ul  class="border_2px">
						<li><a class="txt_color_2"  href="<?php echo osc_base_url(); ?>"><span class="ico_color fa fa-home menu-img"></span> <span><?php _e('Home', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2 search-r"  id="open-r" href="#"><span class="ico_color fa fa-search menu-img"></span> <span><?php _e('Search', 'decent_mobile') ; ?></span></a></li>
						
						<?php while( osc_has_static_pages() ) { ?>
							<li><a class="txt_color_2" href="<?php echo osc_static_page_url(); ?>"><span class="ico_color fa fa-hand-o-right menu-img"></span> <span><?php echo osc_static_page_title(); ?></span></a></li>
						<?php } ?>
						<li><a class="txt_color_2"  href="<?php echo osc_contact_url(); ?>"><span class="ico_color fa fa-envelope menu-img"></span> <span><?php _e('Contact Us', 'decent_mobile') ; ?></span></a></li>
					</ul>
				</div><!--left-menu -->
                </div>
            </div>
            <div class="snap-drawer snap-drawer-right">
				<div class="right-menu">
					<div class="form-section">
						<form action="<?php echo osc_base_url(true) ; ?>" method="get" class="form-inner">
							<input type="hidden" name="page" value="search" />
							<p>
								<label class="txt_color_2"><?php _e('What are you looking for?', 'decent_mobile') ; ?></label>
								<input type="text" name="sPattern" id="query" placeholder="<?php   echo osc_esc_html(__('Type here...', 'decent_mobile')) ; ?>" class="field ">
							</p>
							<p>
								<label class="txt_color_2"><?php _e('Category', 'decent_mobile') ; ?></label>
								<?php  if ( osc_count_categories() ) { ?>
									<?php osc_categories_select() ; ?>
								<?php  } ?>
							</p>
							<p>
								<label class="txt_color_2"><?php _e('Location', 'decent_mobile') ; ?></label>
								<select name="sRegion" id="sCity">
									<option value=""><?php _e('Select a Region', 'decent_mobile') ; ?></option>
								<?php while(osc_has_list_regions()) { ?>
									<option value="<?php echo osc_list_region_name();?>"><?php echo osc_list_region_name();?> <span class="badge">(<?php echo osc_list_region_items();?>)<span/></option>
								<?php } ?>
								</select>
							</p>
							<label class="txt_color_2"><?php _e('Price', 'decent_mobile') ; ?></label>
							<div class="row">
								<div class="col-xs-6">
									<input class="field" type="text" placeholder="<?php   echo osc_esc_html(__('Min', 'decent_mobile')) ; ?>" id="priceMin" name="sPriceMin" value="" size="6" maxlength="6">
								</div>
								<div class="col-xs-6">
									<input class="field" type="text" placeholder="<?php  echo osc_esc_html(__('Max', 'decent_mobile')) ; ?>" id="priceMax" name="sPriceMax" value="" size="6" maxlength="6">
								</div>
							</div>
						</div>    
						
						<div class="form-bot">
							<input type="submit" <?php   echo osc_esc_html(__('Search', 'decent_mobile')) ; ?> class="btn btn-block btn_color_2 txt_color_1">
						</div>
						<br />
					</form>
					</div>
				</div><!--left-menu -->
			</div>
<?php if(osc_get_preference('floating_header', 'decent_mobile')=='1') { ?>
	<!--Fixed header start -->
	<div id="header-wrap" class="thm_color  border_header" >
		<div class="content-width">
			<header id="header" class="clearfix">
				<div class="logo">
					<?php echo decent_mobile_logo_header(); ?>
				</div>
				<?php if(osc_get_preference('header_location', 'decent_mobile')=='1') { ?>
				<a href="#location" data-toggle="modal" class="location txt_color_1"><span class="launch_modal">
				<?php
					if(!isset($_COOKIE['decent_mobile_location'])) {?>
						<?php _e('Location', 'decent_mobile') ; ?>
					<?php } else { 
						echo $_COOKIE['decent_mobile_location'];
					}
				?>
			</span> <span class="glyphicon glyphicon-menu-down"></span></a>
				<?php } ?>
				<a href="#" id="open-left" class="menu"><span id="menu_icon" class="txt_color_1 fa fa-bars"></span></a>
				<a href="#" id="open-right" class="search"><span id="search_icon" class="txt_color_1 fa fa-search"></span></a>
			</header>
		</div>
	</div>   
	<!--Fixed header start -->
<?php } ?>
	<div id="content" class="snap-content body_bg">
	<div id="container-fluid">
<?php if(osc_get_preference('floating_header', 'decent_mobile')!='1') { ?>
	<!--Fixed header start -->
	<div id="header-wrap" class="thm_color  border_header" >
		<div class="content-width">
			<header id="header" class="clearfix">
				<div class="logo">
					<?php echo decent_mobile_logo_header(); ?>
				</div>
				<?php if(osc_get_preference('header_location', 'decent_mobile')=='1') { ?>
				<a href="#location" data-toggle="modal" class="location txt_color_1"><span class="launch_modal">
				<?php
					if(!isset($_COOKIE['decent_mobile_location'])) {?>
						<?php _e('Location', 'decent_mobile') ; ?>
					<?php } else { 
						echo $_COOKIE['decent_mobile_location'];
					}
				?>
			</span> <span class="glyphicon glyphicon-menu-down"></span></a>
				<?php } ?>
				<a href="#" id="open-left" class="menu"><span id="menu_icon" class="txt_color_1 fa fa-bars"></span></a>
				<a href="#" id="open-right" class="search"><span id="search_icon" class="txt_color_1 fa fa-search"></span></a>
			</header>
		</div>
	</div>
	<!--Fixed header start -->
<?php } ?>
<div class="head_space"></div>