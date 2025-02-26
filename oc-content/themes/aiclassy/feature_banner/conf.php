<?php if (!defined('OC_ADMIN') || OC_ADMIN!==true) exit('Access is not allowed.');

$output="";
$show_element =array();
$show_element['title'] 			= __('Insert Banner', 'feature_banner'); 
$show_element['button_value'] 	= __('Insert', 'feature_banner');
$show_element['button_name'] 	='submit';
$show_element['plugin_action'] 	='new_banner';
$show_element['banner_name'] 	= '';
$show_element['banner_path'] 	= '';
$show_element['banner_id'] 		= '';
$show_element['banner_link'] 	= '';
if(Params::getParam('plugin_action')!='') {
	$output = array();
    if(Params::getParam('plugin_action')=="delete_banner") {
        if(Params::getParam('id')!="") {
            ModelBanner::newInstance()->deleteFeatureBanner( Params::getParam('id') ) ;
            $output['result']='success';
			$output['description']=__('Banner Delete successfully', 'feature_banner');
        }
    } else if(Params::getParam('plugin_action')=="new_banner") {
        $dataItem = array();
        $request = Params::getParamsAsArray();
        if(isset($_POST['s_name']) && isset($_POST['s_link']) && isset($_FILES['s_path'])){
			if(filter_var($_POST['s_link'], FILTER_VALIDATE_URL) || $_POST['s_link']=='#'){ 
				if ($_FILES["s_path"]["error"] > 0 || !(isset($_FILES['s_path']))) {
					$output['result']='error';
					$output['description']=__('error upload', 'feature_banner').$_FILES["s_path"]["error"];
				}
				else {
					if(move_uploaded_file($_FILES['s_path']['tmp_name'],ModelBanner::newInstance()->getbanner_uploadpath().$_FILES["s_path"]["name"] )){
						$imageupload=$_FILES["s_path"]["name"];
						ModelBanner::newInstance()->insertFeatureBanner($imageupload,$_POST['s_name'],$_POST['s_link']);
						$output['result']='success';
						$output['description']=__('Banner added successfully', 'feature_banner');
					}else{
						$output['result']='error';
						$output['description']=__("Banner not added", 'feature_banner');
					}
				}
			}else{
				$output['result']='error';
				$output['description']=__("Enter a valid link for banner", 'ad_popup');
			}
        }else{
			$output['result']='error';
			$output['description']=__("Invalid arguments", 'feature_banner');}
    } else if(Params::getParam('plugin_action')=="update_banner") {
        $dataItem = array();
        $request = Params::getParamsAsArray();
        $imageupload="";
        if(isset($_POST['s_name']) && isset($_POST['s_link']) && isset($_FILES['s_path'])){
			if(filter_var($_POST['s_link'], FILTER_VALIDATE_URL) || $_POST['s_link']=='#'){ 
				///////////////////////////////////////////////////////////////
				if ($_FILES["s_path"]["error"] > 0 || !(isset($_FILES['s_path']))) {
					$output['result']='error';
					$output['description']=__('error upload', 'feature_banner').$_FILES["s_path"]["error"];
				}
				else {
					if(move_uploaded_file($_FILES['s_path']['tmp_name'],ModelBanner::newInstance()->getbanner_uploadpath().$_FILES["s_path"]["name"] )){
						$imageupload=$_FILES["s_path"]["name"];
						
					}else{
						$output['result']='error';
						$output['description']=__("Banner not updated", 'feature_banner');
					}
				}
				if($imageupload==""){
					ModelBanner::newInstance()->replaceFeatureBanner($_POST['banner_id'],$_POST['banner_file'],$_POST['s_name'],$_POST['s_link']);
					$output['result']='success';
					$output['description']=__("Banner updated successfully", 'feature_banner');
				}else{
					ModelBanner::newInstance()->replaceFeatureBanner($_POST['banner_id'],$imageupload,$_POST['s_name'],$_POST['s_link']);
					$output['result']='success';
					$output['description']=__("Banner updated successfully", 'feature_banner');
				}
				///////////////////////////////////////////////////////////////
			}else{
				$output['result']='error';
				$output['description']=__("Enter a valid link for banner", 'ad_popup');
			}
        }else{
			$output['result']='error';
			$output['description']=__("Invalid arguments", 'feature_banner');}
    } else if(Params::getParam('plugin_action')=="update_click") {
        $banner_id = Params::getParam('id');
        $banner_row = ModelBanner::newInstance()->getBannerRow($banner_id);
        $errors = array_filter($banner_row);
		if (!empty($errors)) {
			$show_element['title'] 			= __('Update Banner', 'feature_banner'); 
			$show_element['button_value'] 	= __('Update', 'feature_banner');
			$show_element['button_name'] 	='update';
			$show_element['plugin_action'] 	='update_banner';
			$show_element['banner_name'] 	= $banner_row['s_name'];
			$show_element['banner_path'] 	= $banner_row['s_path'];
			$show_element['banner_id'] 		= $banner_row['i_banner_id'];
			$show_element['banner_link'] 	= $banner_row['s_link'];
		}
    }
    if($output!=""){
		if($output['result']=='success'){
			echo '<div id="flashmessage" class="flashmessage flashmessage-ok" style="display: block;">
					<a class="btn ico btn-mini ico-close">x</a>
					'.$output['description'].'
				</div>';
		}elseif($output['result']=='error'){
			echo '<div id="flashmessage" class="flashmessage flashmessage-error" style="display: block;">
					<a class="btn ico btn-mini ico-close">x</a>
					'.$output['description'].'
				</div>';
		}
	}
}
?>
<?php
	
?>
<div id="settings_form" style="border: 1px solid #ccc; background: #eee; ">
    <div style="padding: 20px;">
        <div style="float: left; width: 100%;">
            <fieldset style="border: 1px solid #ff0000;">
                <legend><?php _e('Warning', 'feature_banner'); ?></legend>
                <p>
                    <?php _e('Banner size must be 846 x 282 for proper view of slide bar', 'feature_banner') ; ?>.
                </p>
                <p><?php _e('Add atleast 2 Banner to show', 'feature_banner') ; ?>.</p>
            </fieldset>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>
<div id="settings_form" style="border: 1px solid #ccc; ">
	
    <div style="padding: 20px;">
		<form action="<?php echo osc_admin_base_url(true);?>?page=appearance&action=render&file=oc-content/themes/aiclassy/feature_banner/conf.php&plugin_action=<?php echo $show_element['plugin_action']; ?>" method="post" enctype="multipart/form-data" >
			<?php if($show_element['button_name']=='update'){ 
				echo '<input type="hidden" name="banner_id" value="'.$show_element['banner_id'] .'" />';
				echo '<input type="hidden" name="banner_file" value="'.$show_element['banner_path'] .'" />';
				} ?>
			<legend><?php echo $show_element['title'] ; ?></legend>
			<table style=" width: 80%;" class="table" cellspacing="0" cellpadding="0">
				<tr>
					<th><?php _e('Banner name', 'feature_banner'); ?></th>
					<th><?php _e('Banner link', 'feature_banner'); ?></th>
					<th><?php _e('Select Banner', 'feature_banner'); ?></th>
					<th><?php _e('Option', 'feature_banner'); ?></th>
				</tr>
				<tr>
					<td><input type="text" name="s_name" value="<?php echo $show_element['banner_name'] ; ?>" /></td>
					<td><textarea name="s_link" style="width: 90%; height: 70px;"><?php echo $show_element['banner_link'] ; ?></textarea></td>
					<td><input type="file" name="s_path" accept="image/*" value="<?php echo $show_element['banner_path'] ; ?>" /></td>
					<td><input type="submit" name="<?php echo $show_element['button_name'] ; ?>" value="<?php echo $show_element['button_value'] ; ?>" /></td>
				</tr>
			</table>
		</form>
		<br/>
		<br/>
		<br/>
		<div>
			<legend><?php _e('Banner List', 'feature_banner'); ?></legend>
			<table style="width: 80%; " class="table" cellspacing="0" cellpadding="0">
				<tr>
					<th><?php _e('Banner name', 'feature_banner'); ?></th>
					<th><?php _e('Banner link', 'feature_banner'); ?></th>
					<th><?php _e('Banner file', 'feature_banner'); ?></th>
					<th><?php _e('Option', 'feature_banner'); ?></th>
				</tr>
				<?php 
				$ban_list = ModelBanner::newInstance()->getBannerListArray() ;
				foreach ($ban_list as $ban) {
				?>
				<tr>
					<td><p><?php echo $ban['s_name'];  ?></p></td>
					<td><p><?php echo $ban['s_link'];  ?></p></td>
					<td><p><?php echo $ban['s_path'];  ?></p></td>
					<td>
						<a href="<?php echo osc_admin_base_url(true);?>?page=appearance&action=render&file=oc-content%2Fthemes%2Faiclassy%2Ffeature_banner%2Fconf.php&plugin_action=delete_banner&id=<?php echo $ban['i_banner_id'];  ?>">Delete</a>
						<a href="<?php echo osc_admin_base_url(true);?>?page=appearance&action=render&file=oc-content%2Fthemes%2Faiclassy%2Ffeature_banner%2Fconf.php&plugin_action=update_click&id=<?php echo $ban['i_banner_id'];  ?>">Update</a>
					</td>
				</tr>
				<?php } ?>
			</table>
        </div>
        <div style="clear: both;"></div>										
    </div>
</div>

