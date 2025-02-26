<?php
    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');
    osc_current_web_theme_path('header.php') ;
    ?>
    <div class="row">
		<div class="col-md-6  col-md-offset-3 col-sm-8  col-sm-offset-2 center-text">
			<?php aiclassy_show_flash_message(); ?>
			<div class="panel panel-info">
				<div class="panel-heading">
					 <h3 class="panel-title"><?php _e('Terms & condition', 'aiclassy'); ?></h3>
				</div>
				<div class="panel-body">
					<?php osc_show_widgets('term-condition');?>
				</div>
			</div>
		</div>
	</div>
    <?php
    osc_current_web_theme_path('footer.php') ; ?>
