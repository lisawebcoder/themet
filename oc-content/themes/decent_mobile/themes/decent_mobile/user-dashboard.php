<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/

    osc_current_web_theme_path('header.php');
?>
    <?php osc_current_web_theme_path('user_header.php') ; ?>


<?php if(Params::getParam('my_favorites')){
	include('my_favorites.php');
} else{?>
<style>
.category {
	width: 33%;
}
.border_color {
	border-bottom: 5px solid <?php echo osc_get_preference('body_background', 'decent_mobile'); ?>;
    border-right: 5px solid <?php echo osc_get_preference('body_background', 'decent_mobile'); ?>;
}
.category:hover {
 box-shadow: inset 0 0 0 2px <?php echo osc_get_preference('theme_color', 'decent_mobile'); ?>;
}
</style>
<div class="category-section">
	<h2 class="h_color"><?php _e('Useful Links', 'decent_mobile'); ?></h2>
<div class="grid_view" >
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_change_user_email_url() ; ?>';">
			<div class="pt10"><span class="ico_color cat-img fa fa-envelope-o"></span></div>
			<a href="<?php echo osc_change_user_email_url() ; ?>"><div class="ctitle txt_color_2"><?php _e('Email', 'decent_mobile'); ?></div></a>
		</td>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_change_user_password_url() ; ?>';">
			<div class="pt10"><span  class="cat-img ico_color fa fa-lock"></span></div>
			<a href="<?php echo osc_change_user_password_url() ; ?>"><div class="ctitle txt_color_2"><?php _e('Password', 'decent_mobile'); ?></div></a>
		</td>

		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_user_list_items_url() ; ?>';">
			<div class="pt10"><span  class="cat-img ico_color fa fa-th-list menu-img"></span></div>
			<a href="<?php echo osc_user_list_items_url() ; ?>"><div class="ctitle txt_color_2"><?php _e('My listings', 'decent_mobile'); ?></div></a>
		</td>
		
</tr>
<tr>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_user_dashboard_url().'&my_favorites=1' ; ?>';">
			<div class="pt10"><span  class="cat-img ico_color fa fa-heart-o menu-img"></span></div>
			<a href="<?php echo osc_user_dashboard_url().'&my_favorites=1' ; ?>"><div class="ctitle txt_color_2"><?php _e('Wishlist', 'decent_mobile'); ?></div></a>
		</td>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_user_alerts_url() ; ?>';">
			<div class="pt10"><span  class="cat-img ico_color fa fa-bell menu-img"></span></div>
			<a href="<?php echo osc_user_alerts_url() ; ?>"><div class="ctitle txt_color_2"><?php _e('Alerts', 'decent_mobile'); ?></div></a>
		</td>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_user_profile_url() ; ?>';">
			<div class="pt10"><span class="cat-img ico_color fa fa-cog menu-img"></span></div>
			<a href="<?php echo osc_user_profile_url() ; ?>"><div class="ctitle txt_color_2"><?php _e('Account', 'decent_mobile'); ?></div></a>
		</td>

</tr>

<tr>
	<td></td>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" onclick="location.href='<?php echo osc_user_logout_url() ; ?>';">
			<div class="pt10"><span  class="cat-img ico_color glyphicon glyphicon-off"></span></div>
			<a href="<?php echo osc_user_logout_url() ; ?>"><div class="ctitle txt_color_2"><?php _e('Logout', 'decent_mobile'); ?></div></a>
		</td>
</tr>

</table>
</div>
</div>
<?php } ?>


<?php osc_current_web_theme_path('footer.php') ; ?>