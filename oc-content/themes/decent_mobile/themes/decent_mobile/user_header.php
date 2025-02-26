<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

	<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('user_header.css') ?>" />

	<div class="row">
		<div class="col-lg-12 col-sm-12">

            <div class="card hovercard section_bg">
                <div class="cardheader">

                </div>
                <div class="avatar">
				     <?php if (function_exists('profile_picture_show')) {
						profile_picture_show();
					}else{?>
                    <img alt="" src="<?php echo osc_current_web_theme_url('images/no_picture.jpg'); ?>">
					<?php } ?>
                </div>
                <div class="info">
                    <div class="title">
                        <a href="#" class="txt_color_2"> <?php  echo osc_logged_user_name();?></a>
                    </div>
                    <div class="desc txt_color_2"><?php echo osc_logged_user_email(); ?></div> 
                    <div class="desc txt_color_2"><?php  echo osc_logged_user_phone();  ?></div> 
                </div>
            </div>
        </div>
	</div>
	<br>