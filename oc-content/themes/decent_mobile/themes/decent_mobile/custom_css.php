<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>
	<style>
				.thm_color,.bx-next,.bx-prev {
					background: <?php echo osc_get_preference('theme_color', 'decent_mobile'); ?>!important;
				}
				.border_2px {
						border-top: 2px solid <?php echo osc_get_preference('theme_color', 'decent_mobile'); ?>!important;
				}
				.border_rabbion {
						border-top: 33px solid <?php echo osc_get_preference('theme_color', 'decent_mobile'); ?> !important;
				}
				.border_header {
						border-bottom: 2px solid <?php echo osc_get_preference('post_btn_border', 'decent_mobile'); ?> !important;
				}
				.ico_color {
					color: <?php echo osc_get_preference('theme_color', 'decent_mobile'); ?>!important;
				}
				.border_color {
					border-bottom: 5px solid <?php echo osc_get_preference('body_background', 'decent_mobile'); ?>;
					border-right: 5px solid <?php echo osc_get_preference('body_background', 'decent_mobile'); ?>;
				}
				.category:hover {
				 box-shadow: inset 0 0 0 2px <?php echo osc_get_preference('theme_color', 'decent_mobile'); ?>;
				}
				.body_bg {
					background: <?php echo osc_get_preference('body_background', 'decent_mobile'); ?>;
				}
				.paginate ul li a {
					color: <?php echo osc_get_preference('body_background', 'decent_mobile'); ?>!important;
				}
				.section_bg {
					background: <?php echo osc_get_preference('section_background', 'decent_mobile'); ?>!important;
				}
				input,select,textarea  {
					background: <?php echo osc_get_preference('section_background', 'decent_mobile'); ?>!important;
					color: <?php echo osc_get_preference('text_color_2', 'decent_mobile'); ?>!important;
				}
				.h_color {
					color: <?php echo osc_get_preference('heading_color', 'decent_mobile'); ?>!important;
				}
				.txt_color_1,.bx-next,.bx-prev, txt_color_1 a:hover {
					color: <?php echo osc_get_preference('text_color_1', 'decent_mobile'); ?> !important;
				}
				.txt_color_2,txt_color_2 a:hover {
					color: <?php echo osc_get_preference('text_color_2', 'decent_mobile'); ?>!important;
				}
				.list-right li a.active {
					border-bottom: 3px solid <?php echo osc_get_preference('text_color_2', 'decent_mobile'); ?>!important;
				}
				.border_pager,.bx-pager a {
					border-color: <?php echo osc_get_preference('post_btn_bg', 'decent_mobile'); ?> !important;
				}
				.btn_color_2 {
					background: <?php echo osc_get_preference('btn_color_2', 'decent_mobile'); ?>!important;
				}
				.post_btn_bg {
					background: <?php echo osc_get_preference('post_btn_bg', 'decent_mobile'); ?> !important;
				}
				.post_btn_color, .post_btn_color:hover {
					color: <?php echo osc_get_preference('post_btn_color', 'decent_mobile'); ?> !important;
				}
				.post_btn_border {
					border: 1px solid <?php echo osc_get_preference('post_btn_border', 'decent_mobile'); ?>!important;
				}
	
		<?php if(osc_get_preference('floating_header', 'decent_mobile')!='1') { ?>
				#header-wrap {
					position: relative !important;
					
				}
				.snap-content, .left-menu, .right-menu{
					margin-top: 0px !important;
				}
				.head_space {
					display:none;
				}
		<?php } ?>
	</style>