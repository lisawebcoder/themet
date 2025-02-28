<?php


    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('user user-items');
    /*osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }*/
    osc_current_web_theme_path('header.php') ;

    $listClass = '';
    $buttonClass = '';
    if(Params::getParam('ShowAs') == 'gallery'){
        $listClass = 'listing-grid';
        $buttonClass = 'active';
    }
?>
<div class="row">
	<div class="col-lg-3">
		<button type="button" data-toggle="collapse" data-target="#responsive-sidebar" class="btn btn-info btn-sm btn-block collapsed hidden-lg">User menu</button>
		<div id="responsive-sidebar" class=" in">
			 <?php echo aiclassy_private_user_menu( get_user_menu() ); ?>
			 
		</div>
	</div>
	<div class="col-lg-9">
		<?php osc_run_hook('search_ads_listing_top'); ?>
		<h1><?php _e('My listings', 'aiclassy'); ?></h1>
		
		<?php if(osc_count_items() == 0) { ?>
			<p class="empty" ><?php _e('No listings have been added yet', 'aiclassy'); ?></p>
		<?php } else { ?>
        <div class="actions">
            <span class="doublebutton <?php echo $buttonClass; ?>">
                <a href="<?php echo osc_user_list_items_url(); ?>?ShowAs=list" class="list-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span>Lista</span></a>
                <a href="<?php echo osc_user_list_items_url(); ?>?ShowAs=gallery" class="grid-button" data-class-toggle="listing-grid" data-destination="#listing-card-list"><span>Grid</span></a>
            </span>
        </div>
		<?php
			View::newInstance()->_exportVariableToView("listClass",$listClass);
			View::newInstance()->_exportVariableToView("listAdmin", true);
			osc_current_web_theme_path('loop.php');
		?>
		<div class="clear"></div>
		<?php
		if(osc_rewrite_enabled()){
			$footerLinks = osc_search_footer_links();
			?>
			<ul class="footer-links">
				<?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
					<?php if($f['total'] < 3) continue; ?>
					<li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
				<?php } ?>
			</ul>
		<?php } ?>
		<div class="paginate" >
			<?php echo osc_pagination_items(); ?>
		</div>
		<?php } ?>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
