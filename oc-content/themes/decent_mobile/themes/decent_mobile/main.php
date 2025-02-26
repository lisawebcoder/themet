<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>
<?php osc_current_web_theme_path('header.php') ; ?>

<div class="post-wrap section_bg">
	<a href="<?php echo osc_item_post_url_in_category() ; ?>" class="btn btn-block post_btn_bg post_btn_color post_btn_border" ><?php _e('Publish an Ad', 'decent_mobile'); ?></a>
</div>
<div class="banner">
<?php
	if(osc_get_preference('show_main_banner', 'decent_mobile')=='1'){ 
		if(homepage_image()) { 
				echo homepage_image(); 
			} else {
			
				echo '<img src="'.osc_current_web_theme_url('images/banner.png').'" />';

			} 
	}
?>
</div>
<?php if(osc_get_preference('home_premium_slider', 'decent_mobile')=='1'){ ?>
<?php osc_get_premiums(50);
if(osc_count_premiums() > 0) { ?>
<div class="feature-section ">
	<div class="feature-title">
    	<h2 class="h_color"><?php _e('Premium Ads', 'decent_mobile'); ?></h2>
    </div>
    <div class="feature-slider-wrap section_bg" data-snap-ignore="true">
    	<div class="feature-slider">
			<div class="premium_slider">
				<div class="swiper-wrapper">
				<?php while(osc_has_premiums()) { ?>
					<?php if( osc_images_enabled_at_items() ) { ?>
					<div class="swiper-slide slide">
					<a href="<?php echo osc_premium_url() ; ?>" onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;">
						<div class="prc thm_color txt_color_1"><?php echo osc_premium_currency().osc_premium_formated_price(); ?></div>
						<div class="feature">
						<?php if(osc_count_premium_resources()) { ?>
							<div class="feature-img"><img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt=""></div>
						<?php } else { ?>
							<div class="feature-img"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt=""></div>
						<?php } ?>
							<div class="overlay thm_color txt_color_1">
								<h4><?php echo osc_premium_title(); ?></h4>
								<div class="clearfix">
									<div class="" style="text-align: center;"><span class="fa fa-map-marker"></span> <?php if(osc_premium_city()!=""){ echo osc_premium_city();} elseif(osc_premium_region()!="") {echo osc_premium_region();} else {echo osc_premium_country_code();} ?></div>
								</div>
							</div>
						</div>
						</a>
				  </div>	 
						<?php } ?>
					<?php } ?>
				</div>
            </div>
        </div>
    </div>
</div><!--feature-section -->
<?php } ?>
<?php } ?>

<?php if(osc_get_preference('category_display_style', 'decent_mobile')=='double'){ ?>
<?php if(osc_count_categories () > 0) { ?>
<div class="category-section">
	<h2 class="h_color"><?php _e('Browse By Categories', 'decent_mobile'); ?></h2>

	<div class="double_view" >
			<ul class="clearfix" id="categories">
			<?php while ( osc_has_categories() ) { ?>
					<?php $cat_title =  osc_category_name() ; ?>
					<?php $cat_id =  osc_category_id() ; ?>
					<?php $cat_link = str_replace(osc_base_url(), '', osc_search_category_url() ) ; ?>
					 <li><a  <?php if ( osc_count_subcategories() > 0 ) { echo 'href="#cat'.$cat_id.'"  data-toggle="modal" class="launch_modal section_bg txt_color_2" data-backdrop="static"';} else{ echo 'href="'.$cat_link.'" class="section_bg txt_color_2"' ; }?> ><span style="color:#<?php  $category_ico =osc_get_preference('cat-icon-'.$cat_id, 'decent_mobile_category_icon'); $category_ico=explode("|",$category_ico); echo $category_ico[0];?>" class="cat-img fa fa-<?php echo $category_ico[1];?>"></span> <span><?php echo $cat_title; ?> <?php if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){ echo $cat_id; }?></span></a></li>
					 <?php if ( osc_count_subcategories() > 0 ) { ?>
					 <!-- Modal -->
					  <div class="modal fade" id="cat<?php echo $cat_id; ?>" tabindex="-1" role="dialog">
						<div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile'); ?></span></button>
							<h4 class="modal-title"><?php echo $cat_title ?></h4>
						  </div>
						  <div class="modal-body">
						  	<div class="list-group">
							  <?php while ( osc_has_subcategories() ) { ?>
								<a  href="<?php echo str_replace(osc_base_url(), '', osc_search_category_url() ) ; ?>" class="list-group-item txt_color_2"><span class="badge"><?php echo osc_category_total_items() ; ?></span><span  class="fa fa-<?php $sub_category_ico =osc_get_preference('cat-icon-'.osc_category_id(), 'decent_mobile_category_icon'); $sub_category_ico=explode("|",$sub_category_ico); if($sub_category_ico[1]!=''){echo $sub_category_ico[1];}else{echo 'chevron-right';}?>" style="color:#<?php echo $sub_category_ico[0]?>"></span> <?php echo osc_category_name() ; ?> <?php if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){ echo osc_category_id(); }?> </a>
							 <?php } ?>
							</div>
						  </div>
						</div>
					  </div>
					</div>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
</div>
<?php }?>  
<?php }?> 

<?php if(osc_get_preference('category_display_style', 'decent_mobile')=='list'){ ?>
<?php if(osc_count_categories () > 0) { ?>
<div class="category-section">
	<h2 class="h_color"><?php _e('Browse By Categories', 'decent_mobile'); ?></h2>

	<div class="list_view" >
				<ul class="clearfix" id="categories">
				<?php while ( osc_has_categories() ) { ?>
						<?php $cat_title =  osc_category_name() ; ?>
						<?php $cat_id =  osc_category_id() ; ?>
						<?php $cat_link = str_replace(osc_base_url(), '', osc_search_category_url() ) ; ?>
						 <li><a <?php if ( osc_count_subcategories() > 0 ) { echo 'href="#cat'.$cat_id.'"  data-toggle="modal" class="launch_modal section_bg txt_color_2" data-backdrop="static"';} else{ echo 'href="'.$cat_link.'" class="section_bg txt_color_2"' ; }?> ><span style="color:#<?php  $category_ico =osc_get_preference('cat-icon-'.$cat_id, 'decent_mobile_category_icon'); $category_ico=explode("|",$category_ico); echo $category_ico[0];?>" class="cat-img fa fa-<?php echo $category_ico[1];?>"></span> <span><?php echo $cat_title; ?> <?php if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){ echo $cat_id; }?></span> <span class="cat_arrow fa fa-plus-circle"></span></a></li>
						 <?php if ( osc_count_subcategories() > 0 ) { ?>
						 <!-- Modal -->
						  <div class="modal fade" id="cat<?php echo $cat_id; ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile'); ?></span></button>
								<h4 class="modal-title"><?php echo $cat_title ?></h4>
							  </div>
							  <div class="modal-body">
								<div class="list-group">
								  <?php while ( osc_has_subcategories() ) { ?>
									<a href="<?php echo str_replace(osc_base_url(), '', osc_search_category_url() ) ; ?>" class="list-group-item  txt_color_2"><span class="badge"><?php echo osc_category_total_items() ; ?></span><span  class="fa fa-<?php $sub_category_ico =osc_get_preference('cat-icon-'.osc_category_id(), 'decent_mobile_category_icon'); $sub_category_ico=explode("|",$sub_category_ico); if($sub_category_ico[1]!=''){echo $sub_category_ico[1];}else{echo 'chevron-right';}?>" style="color:#<?php echo $sub_category_ico[0]?>"></span> <?php echo osc_category_name() ; ?> <?php if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){ echo osc_category_id(); }?> </a>
								 <?php } ?>
								</div>
							  </div>
							</div>
						  </div>
						</div>
					<?php } ?>
				<?php } ?>
			</ul>
	</div>
</div>
<?php }?>  
<?php }?> 
 
<?php if(osc_get_preference('category_display_style', 'decent_mobile')=='grid'){ ?>
<?php if(osc_count_categories () > 0) { ?>
<style>
.category {
	width: <?php $in_row = osc_get_preference('categories_in_row', 'decent_mobile'); $w = 100/$in_row; echo $w.'%'; ?>
}

</style>
<div class="category-section">
	<h2 class="h_color"><?php _e('Browse By Categories', 'decent_mobile'); ?></h2>
<div class="grid_view" >
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<?php $i=0; ?>
	<?php while ( osc_has_categories() ) { ?>
		<?php $cat_title =  osc_category_name() ; ?>
		<?php $cat_id =  osc_category_id() ; ?>
		<?php $cat_link = str_replace(osc_base_url(), '', osc_search_category_url() ) ; ?>
		<td valign="top" class="mlink border_color section_bg center category right-border bottom-border" id="tdlink{$v.id}">
		<a <?php if ( osc_count_subcategories() > 0 ) { echo 'href="#cat'.$cat_id.'"  data-toggle="modal" class="launch_modal section_bg txt_color_2" data-backdrop="static"';} else{ echo 'href="'.$cat_link.'" class="section_bg txt_color_2"' ; }?> >

			<div class="pt10"><span style="color:#<?php  $category_ico =osc_get_preference('cat-icon-'.$cat_id, 'decent_mobile_category_icon'); $category_ico=explode("|",$category_ico); echo $category_ico[0];?>" class="cat-img fa fa-<?php echo $category_ico[1];?>"></span></div>
			<div class="ctitle txt_color_2"><?php echo $cat_title; ?> <?php if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){ echo $cat_id; }?></div>
		</a>

		</td>
	<?php if ( osc_count_subcategories() > 0 ) { ?>
		 <!-- Modal -->
		  <div class="modal fade" id="cat<?php echo $cat_id; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile'); ?></span></button>
				<h4 class="modal-title"><?php echo $cat_title ?></h4>
			  </div>
			  <div class="modal-body">
				<div class="list-group">
				  <?php while ( osc_has_subcategories() ) { ?>
					<a href="<?php echo str_replace(osc_base_url(), '', osc_search_category_url() ) ; ?>" class="list-group-item  txt_color_2"><span class="badge"><?php echo osc_category_total_items() ; ?></span><span  class="fa fa-<?php $sub_category_ico =osc_get_preference('cat-icon-'.osc_category_id(), 'decent_mobile_category_icon'); $sub_category_ico=explode("|",$sub_category_ico); if($sub_category_ico[1]!=''){echo $sub_category_ico[1];}else{echo 'chevron-right';}?>" style="color:#<?php echo $sub_category_ico[0]?>"></span> <?php echo osc_category_name() ; ?> <?php if(osc_get_preference('show_cat_id', 'decent_mobile')=='1'){ echo osc_category_id(); }?> </a>
				 <?php } ?>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	<?php } ?>
<?php if ($i%$in_row==$in_row-1){ echo '</tr>';} $i++;?>

<?php } ?>  
</table>
</div>
</div>
<?php }?> 
<?php }?> 


<?php if(osc_get_preference('home_latest_slider', 'decent_mobile')=='1'){ ?>
<?php if(osc_count_latest_items() > 0) { ?>
<div class="feature-section">
	<div class="feature-title">
    	<h2 class="h_color"><?php _e('Latest Ads', 'decent_mobile'); ?></h2>
    </div>
    <div class="feature-slider-wrap section_bg" data-snap-ignore="true">
    	<div class="feature-slider">
			<div class="latest_slider">
				<div class="swiper-wrapper">
					<?php while(osc_has_latest_items()) { ?>
						<?php if( osc_images_enabled_at_items() ) { ?>
							<div class="swiper-slide slide">
							<a href="<?php echo osc_item_url() ; ?>" onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;">
								<div class="feature">
								<div class="prc thm_color txt_color_1"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price(); }?></div>
								<?php if(osc_count_item_resources()) { ?>
									<div class="feature-img"><img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt=""></div>
								<?php } else { ?>
									<div class="feature-img"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt=""></div>
								<?php } ?>
									<a href="#" class="fa fa-heart heart"></a>
									<div class="overlay thm_color txt_color_1">
										<h4><?php echo osc_item_title() ; ?></h4>
										<div class="clearfix">
											<div class="" style="text-align: center;"><span class="fa fa-map-marker"></span> <?php if(osc_item_city()!=""){ echo osc_item_city();} elseif(osc_item_region()!="") {echo osc_item_region();} else {echo osc_item_country_code();} ?></div>
										</div>
									</div>
								</div>
							</a>
						  </div>
							<?php } ?>
						<?php } ?>
				</div>

			</div>
	    </div>
    </div>
</div><!--feature-section -->
<?php } ?>
<?php } ?>

	<?php osc_current_web_theme_path('footer.php') ; ?>

