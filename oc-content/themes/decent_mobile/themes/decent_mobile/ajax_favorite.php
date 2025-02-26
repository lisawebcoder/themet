<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

<?php

    if (Params::getParam('id') != '') {
        $id    = Params::getParam('id');
        $count = 0;

        if ( osc_is_web_user_logged_in() ) {
            //check if the item is not already in the watchlist
            $conn   = getConnection();
            $detail = $conn->osc_dbFetchResult("SELECT * FROM %st_item_favorite_ads WHERE fk_i_item_id = %d and fk_i_user_id = %d", DB_TABLE_PREFIX, $id, osc_logged_user_id());

            //If nothing returned then we can process
            if (!isset($detail['fk_i_item_id'])) {
                $conn = getConnection();
                $conn->osc_dbExec("INSERT INTO %st_item_favorite_ads (fk_i_item_id, fk_i_user_id) VALUES (%d, '%d')", DB_TABLE_PREFIX, $id, osc_logged_user_id());
                ?>
                    <a class="txt_color_2" href="<?php echo osc_base_url(true); ?>?page=user&action=dashboard&my_favorites=1">
                         <span class="fa fa-heart-o ico_color"></span> <?php _e(' View List', 'decent_mobile'); ?>
                    </a>
                <?php
            } else {
                //Already in watchlist !
                echo '<a class="txt_color_2" href="' . osc_base_url(true) . '?page=user&action=dashboard&my_favorites=1"> <span class="fa fa-heart-o ico_color"></span>' . __(' View List', 'decent_mobile') . '</a>';
            }
        } else {
            //error user is not login in
            echo '<span class="fa fa-heart-o ico_color"></span> <a class="txt_color_2" href="' . osc_user_login_url() . '">' . __('Please login', 'decent_mobile') . '</a>';
        }
    }

?>