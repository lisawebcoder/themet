<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="desc-section-wrap">
		 <?php osc_reset_static_pages(); ?>
		 <div class="section_bg" style="    padding: 5px 0px;">
		 <h2 class="h_color "><?php echo osc_static_page_title(); ?></h2>
		 </div>
			 <div class="desc-section section_bg txt_color_2">
				<?php echo osc_static_page_text(); ?>
			</div>
        </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
