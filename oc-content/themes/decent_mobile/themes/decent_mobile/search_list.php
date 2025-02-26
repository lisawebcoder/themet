<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
	$lregion = Region::newInstance()->findByPrimaryKey(Params::getParam('sRegion'));
    $h_region = $lregion['s_name'];;
	if(isset($h_region)){
	$loc_value = $h_region;
	setcookie('decent_mobile_location', $loc_value, time()+2678400, "/"); // 2678400 = 30 day
	}
?>



<script>
   $(function (){
      $("[data-toggle = 'popover']").popover({
		  html : true,
	  });
   });
</script>


<div class="list-section clearfix section_bg">
	<div class="list-left">
    	<ul class="clearfix">
        	<li><a href="#" class="txt_color_2"><span  data-container = "body" data-toggle = "popover" data-placement = "bottom" data-content ='
				            <span class="see_by">
              <span><?php _e('Sort by', 'decent_mobile'); ?>:</span>
              <?php
              $orders = osc_list_orders();
              $current = '';
              foreach($orders as $label => $params) {
                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                  if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                      $current = $label;
                  }
              }
              ?>
              <label class="txt_color_2"><?php echo $current; ?><b class="arrow-envelope"><b class="arrow-down"></b></b></label>
              <?php $i = 0; ?>
              <ul>
                  <?php
                  foreach($orders as $label => $params) {
                      $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                      <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                          <li><a class="txt_color_2" class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                      <?php } else { ?>
                          <li><a class="txt_color_2" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                      <?php } ?>
                      <?php $i++; ?>
                  <?php } ?>
                </ul>
            </span>
			' class="glyphicon glyphicon-sort"></span></a></li>
	  
            <li><a href="#alert_box" data-toggle="modal" data-backdrop="static" class="launch_modal txt_color_2"><span class="glyphicon glyphicon-bell"></span></a></li>
        </ul>
    </div>
    <div class="list-right">
    	<ul class="clearfix">
        	<li><a href="#" class="list-view active txt_color_2"><span></span></a></li>
            <li><a href="#" class="grid-view txt_color_2"><span></span></a></li>
        </ul>
    </div>
</div><!--list-section-wrap -->



<div class="profile-article-wrap clearfix ">

<?php 
osc_get_premiums();
if(osc_count_premiums() > 0) { 
    while(osc_has_premiums()) { ?>

	<div class="profile-article ">
    	<div class="profile-article-in section_bg clearfix">
            <div class="profile-left"  onclick="location.href='<?php echo osc_premium_url() ; ?>';" style="cursor:pointer;">
				<?php if( osc_images_enabled_at_items() ) { ?>
				<?php if(osc_count_premium_resources()) { ?>
                <img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt="">
				<?php } else { ?>
                <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>">
				<?php } ?>
				<?php } ?>
                <a href="<?php echo osc_premium_url() ; ?>" class="icon-img thm_color txt_color_1"><em class="fa fa-camera"></em> <span><?php echo osc_count_premium_resources(); ?></span></a>
            </div>
            <div class="profile-right">
                <h3><a class="txt_color_2" href="<?php echo osc_premium_url() ; ?>"><?php echo osc_premium_title() ; ?></a></h3>
                <p class="txt_color_2"  onclick="location.href='<?php echo osc_premium_url() ; ?>';" style="cursor:pointer;"><span class="fa fa-map-marker"></span> <?php echo osc_premium_city(); ?></p>
                <p class="txt_color_2" ><span class="fa fa-clock-o"></span> <?php echo time_diff(osc_premium_pub_date()); ?></p>
                <div class="clearfix">
                    <div class="profile-price txt_color_2 "  onclick="location.href='<?php echo osc_premium_url() ; ?>';" style="cursor:pointer;"> <?php if( osc_price_enabled_at_items() ) { echo osc_premium_currency().osc_premium_formated_price() ; }?></div>
                    <div class="profile-price-grid txt_color_1 thm_color "  onclick="location.href='<?php echo osc_premium_url() ; ?>';" style="cursor:pointer;"> <?php if( osc_price_enabled_at_items() ) { echo osc_premium_currency().osc_premium_formated_price() ; }?></div>
                    <div class="profile-like "><span style="    padding: 10px 0px 10px 0px; cursor:pointer;" class="favoritelist txt_color_2" id="<?php echo osc_premium_id(); ?>"><span class="fa fa-heart-o ico_color"></span> <?php _e('Save Ad', 'decent_mobile'); ?></span> </div>
				</div>
            </div>
			<div class="ribbon  txt_color_1 border_rabbion" ></div>
			<div class="star txt_color_1"><i class="fa fa-star"></i></div>
        </div>    
    </div>	
    <?php } ?>
<?php } ?>
<div class="ad_list">
	<div class="myitem">

    <?php while(osc_has_items()) { ?>
			<div class="profile-article "  style="cursor:pointer;">
				<div class="profile-article-in section_bg clearfix">
					<div class="profile-left"  onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;">
						<?php if( osc_images_enabled_at_items() ) { ?>
						<?php if(osc_count_item_resources()) { ?>
						<img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt="">
						<?php } else { ?>
						<img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>">
						<?php } ?>
						<?php } ?>
						<a href="#" class="icon-img thm_color txt_color_1"><em class="fa fa-camera"></em> <span><?php echo osc_count_item_resources(); ?></span></a>
					</div>
					<div class="profile-right">
						<h3><a class="txt_color_2" href="<?php echo osc_item_url() ; ?>"><?php echo  osc_item_title(); ?></a></h3>
						<p class="txt_color_2"  onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;"><span class="fa fa-map-marker"></span> <?php echo osc_item_city();?></p>
						<p class="txt_color_2"><span class="fa fa-clock-o"></span>  <?php echo time_diff(osc_item_pub_date()); ?></p>
						<div class="clearfix">
							<div class="profile-price txt_color_2"  onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;"> <?php if( osc_price_enabled_at_items() ) { echo osc_item_formated_price() ; }?></div>
							<div class="profile-price-grid txt_color_1 thm_color"  onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;"> <?php if( osc_price_enabled_at_items() ) { echo osc_item_formated_price() ; }?></div>
							<div class="profile-like"> <span style="    padding: 10px 0px 10px 0px; cursor:pointer;" class="favoritelist txt_color_2" id="<?php echo osc_item_id(); ?>"><span class="fa fa-heart-o ico_color"></span> <?php _e('Save Ad', 'decent_mobile'); ?></span></div>
						</div>
					</div>
				</div>    
			</div>
    <?php } ?>

	</div>

	</div>
</div><!--profile-article-wrap -->



