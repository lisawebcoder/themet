<?php if($aiclassy_class=='aiclassy_items') { ?>
<div class="media">
	<?php if( osc_images_enabled_at_items() ) { ?>
        <?php if(osc_count_item_resources()) { ?>
			<a class="pull-left" href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img class="media-object" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" style="width: 64px; height: 64px;" /></a>
        <?php } else { ?>
            <a class="pull-left" href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img class="media-object" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" style="width: 64px; height: 64px;" /></a>
        <?php } ?>
    <?php } ?>
              
              <div class="media-body">
                <p><a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><strong><?php echo osc_item_title() ; ?></strong></a></p>
                <p><?php echo osc_highlight( osc_item_description() ,50) ; ?></p>
              </div>
            </div>

<?php } else if($aiclassy_class=='aiclassy_items_siderbar_menu') { ?>
              <li><a href="<?php echo osc_esc_html(osc_item_url()) ; ?>"><?php echo osc_esc_html(osc_item_title()) ; ?> <span class="fa fa-laptop"></span></a></li>
<?php } elseif($aiclassy_class=='carousel-grid-aiclassy_items') { ?>
	<div class="">
		<div class="thumbnail <?php if(osc_item_is_premium()){ echo ' premium ';  if(function_exists('ppaypal_get_class_color') ) echo ppaypal_get_class_color (osc_item_id ()); } ?>" style="margin: 5px;">
		 <?php if( osc_images_enabled_at_items() ) { ?>
		 <a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>">
			<?php if(osc_count_item_resources()) { ?>
				<img class="media-object" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"  />
			<?php } else { ?>
				<img class="media-object" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"  />
			<?php } ?>
			</a>
		<?php } ?>
		 <div class="caption text-center">
		   <p><small><a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><?php echo osc_highlight( osc_item_title() ,20) ; ?></a></small></p>
		   <p><strong><?php if( osc_price_enabled_at_items() ) { ?><?php echo osc_highlight(osc_format_price(osc_item_price()),20); ?><?php } ?></strong></p>
		 </div>
		 <div class="text-center">
		  <a href="<?php echo osc_esc_html(osc_item_url()); ?>" class="btn btn-primary btn-sm btn-search"><?php _e("detail", 'aiclassy');?></a>
		  </div>
	   </div>
	</div>
<?php } elseif($aiclassy_class=='listing-grid-aiclassy_items') { 
	$class="";
	if(aiclassy_default_home_page() == 'banner-category')
		if(osc_is_home_page()){
			$class=" col-md-2 ";
		} else {
			$class=" col-md-3 ";
		}
	else{
		$class=" col-md-3 ";
	} ?>
<div class="<?php echo $class; ?> col-sm-6">
   <div class="thumbnail <?php if(osc_item_is_premium()){ echo ' premium'; if(function_exists('ppaypal_get_class_color') ) echo ppaypal_get_class_color (osc_item_id ());  } ?>">
     <?php if( osc_images_enabled_at_items() ) { ?>
     <a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>">
        <?php if(osc_count_item_resources()) { ?>
			<img class="media-object" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"  />
        <?php } else { ?>
            <img class="media-object" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>"  />
        <?php } ?>
        </a>
    <?php } ?>
     <div class="caption">
       <p><small><a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><?php echo osc_highlight( osc_item_title() ,20) ; ?></a></small></p>
       <p><strong><?php if( osc_price_enabled_at_items() ) { ?><?php echo osc_highlight(osc_format_price(osc_item_price()),20); ?><?php } ?></strong></p>
     </div>
     <div class="text-center">
	  <a href="<?php echo osc_esc_html(osc_item_url()) ; ?>" class="btn btn-primary btn-sm btn-search"><?php _e("detail", 'aiclassy');?></a>
	  </div>
   </div>
</div>
<?php } else { ?>
<?php $size = explode('x', osc_thumbnail_dimensions()); ?>
<li class="listing-card <?php echo $class; if(osc_item_is_premium()){ echo ' premium '; if(function_exists('ppaypal_get_class_color') ) echo ppaypal_get_class_color (osc_item_id ());  } ?>">
    <?php if( osc_images_enabled_at_items() ) { ?>
        <?php if(osc_count_item_resources()) { ?>
    <a class="listing-thumb" href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>" /></a>
        <?php } else { ?>
            <a class="listing-thumb" href="<?php echo osc_esc_html(osc_item_url()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>" /></a>
        <?php } ?>
    <?php } ?>
    <div class="listing-detail">
        <div class="listing-cell">
            <div class="listing-data">
                <div class="listing-basicinfo">
                    <a href="<?php echo osc_item_url() ; ?>" class="title" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><?php echo osc_item_title() ; ?></a>
                    <div class="listing-attributes">
                        <span class="category"><?php echo osc_item_category() ; ?></span> -
                        <span class="location"><?php echo osc_item_city(); ?> <?php if( osc_item_region()!='' ) { ?> (<?php echo osc_item_region(); ?>)<?php } ?></span> <span class="g-hide">-</span> <?php echo osc_format_date(osc_item_pub_date()); ?>
                        <?php if( osc_price_enabled_at_items() ) { ?><span class="currency-value"><?php echo osc_format_price(osc_item_price()); ?></span><?php } ?>
                    </div>
                    <p><?php echo osc_highlight( osc_item_description() ,250) ; ?></p>
                </div>
                <?php if($admin){ ?>
                    <span class="admin-options">
                        <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'aiclassy'); ?></a>
                        <span>|</span>
                        <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'aiclassy')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'aiclassy'); ?></a>
                        <?php if(osc_item_is_inactive()) {?>
                        <span>|</span>
                        <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'aiclassy'); ?></a>
                        <?php } ?>
                    </span>
                <?php } ?>
            </div>
        </div>
    </div>
</li>
 <?php } ?>
