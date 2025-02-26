<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<style>

.d_header {
    background: #00BCD4;
    padding: 10px 20px 10px 20px;
    border-radius: 5px;
    overflow: hidden;
}
.d_left_section {
	float:left;
}
.d_left_section .d_logo img {
	max-height: 110px;
}
.d_right_section {
	float: right;
}
.d_right_section ul {
	padding: 0px 0px 0px 23px;
    margin: 5px 0px 0px 0px;
}
.d_right_section ul li {
		float: left;
	    margin: 0px 5px 0px 5px;
}
.d_right_section ul li img {
	float: left;

}
.d_right_section ul li a {
	color: #fff;
	text-decoration: none;
}
.d_right_section .live_support img {
    width: 175px;
    margin: 0px 0px 5px 0px;
}
.tabs-menu {
    clear: both;
    padding: 0px;
}

.tabs-menu li {
    height: 30px;
    line-height: 30px;
    float: left;
    margin-right: 10px;
    background-color: #474749;
}

.tabs-menu li.current {
    position: relative;
    background-color: #84C225;
    border-bottom: 1px solid #fff;
}

.tabs-menu li a {
    padding: 10px;
    text-transform: uppercase;
    color: #fff;
    text-decoration: none; 
}

.tabs-menu .current a {
    color: #FFFFFF;
}

.tab {
    border: 1px solid #d4d4d1;
    background-color: #fff;
    float: left;
    margin-bottom: 20px;
    width: 100%;
}

.tab-content {
    padding: 20px;
    display: none;
}

#tab-1 {
 display: block;   
}
.form-horizontal .form-label {
	width: 25%;
    text-align: left;
}
.fieldset {
	    padding: 30px 50px;
    border-bottom: 1px solid #ddd; 
}

</style>
<div class="d_header">
	<div class="d_left_section">
		<div class="d_logo"><a href="http://osclassmobile.com" target="_blank" title="www.osclassmobile.com"><img src="<?php echo osc_base_url();?>oc-content/plugins/<?php echo osc_plugin_folder(__FILE__);?>images/logo.png"  alt="<?php echo osc_esc_html(__('osclassmobile.com', 'decent_mobile')); ?>"></a></div>
	</div>
	<div class="d_right_section">
			<div class="live_support"><a href="http://osclassmobile.com" target="_blank" title="<?php echo osc_esc_html(__('Live Support', 'decent_mobile')); ?>"><img alt="<?php echo osc_esc_html(__('Live Support', 'decent_mobile')); ?>" src="<?php echo osc_base_url();?>oc-content/plugins/<?php echo osc_plugin_folder(__FILE__);?>images/button-live-support.png"></a></div>

		<ul>
			<li> <a href="http://osclassmobile.com/#supportContainer" target="_blank"><img src="<?php echo osc_base_url();?>oc-content/plugins/<?php echo osc_plugin_folder(__FILE__);?>images/friend-mail.png"></a></li>
			<li> <a href="https://facebook.com/Osclass-Mobile-Theme-App-948806945237684" target="_blank"><img src="<?php echo osc_base_url();?>oc-content/plugins/<?php echo osc_plugin_folder(__FILE__);?>images/icon-facebook.png"></a></li>
			<li> <a href="https://plus.google.com/109921288235496018043" target="_blank"><img src="<?php echo osc_base_url();?>oc-content/plugins/<?php echo osc_plugin_folder(__FILE__);?>images/icon-googleplus.png"></a></li>
		</ul>
	</div>
</div>
<?php $decent_mobile_path = osc_admin_render_plugin_url().osc_plugin_folder(__FILE__)."index.php"; ?>
<div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1"><?php _e('General',  'decent_mobile') ?></a></li>
        <li><a href="#tab-6"><?php _e('Theme Setting',  'decent_mobile') ?></a></li>
        <li><a href="#tab-5"><?php _e('Sliders Setting',  'decent_mobile') ?></a></li>
        <li><a href="#tab-2"><?php _e('Mobile Logo',  'decent_mobile') ?></a></li>
        <li><a href="#tab-3"><?php _e('Home Banner',  'decent_mobile') ?></a></li>
        <li><a href="#tab-4"><?php _e("Categories Icon's",  'decent_mobile') ?></a></li>
        <li><a href="#tab-7"><?php _e('Support',  'decent_mobile') ?></a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
			<?php include('general.php') ?>
        </div>
        <div id="tab-2" class="tab-content">
			<?php include('logo.php') ?>
        </div>
        <div id="tab-3" class="tab-content">
			<?php include('home_banner.php') ?>
        </div>
        <div id="tab-4" class="tab-content">
			<?php include('category_icons.php') ?>        
		</div>
        <div id="tab-5" class="tab-content">
			<?php include('slider_settings.php') ?>        
		</div>
        <div id="tab-6" class="tab-content">
			<?php include('theme_setting.php') ?>        
		</div>
        <div id="tab-7" class="tab-content">
			<?php include('support.php') ?>        
		</div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>
