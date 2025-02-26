<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

<script type="text/javascript">
$(document).ready(function(){
    $(".sub_button").click(function(){
        $.post('<?php echo osc_base_url(true); ?>', {email:$("#alert_email").val(), userid:$("#alert_userId").val(), alert:$("#alert").val(), page:"ajax", action:"alerts"}, 
            function(data){
                if(data==1) { alert('<?php echo osc_esc_js(__('You have successfully subscribed to the alert', 'decent_mobile')); ?>'); }
                else if(data==-1) { alert('<?php echo osc_esc_js(__('Invalid email address', 'decent_mobile')); ?>'); }
                else { alert('<?php echo osc_esc_js(__('There was a problem with the alert', 'decent_mobile')); ?>');
                };
        });
        return false;
    });

    var sQuery = '<?php echo osc_esc_js(AlertForm::default_email_text()); ?>';

    if($('input[name=alert_email]').val() == sQuery) {
        $('input[name=alert_email]').css('color', 'gray');
    }
    $('input[name=alert_email]').click(function(){
        if($('input[name=alert_email]').val() == sQuery) {
            $('input[name=alert_email]').val('');
            $('input[name=alert_email]').css('color', '');
        }
    });
    $('input[name=alert_email]').blur(function(){
        if($('input[name=alert_email]').val() == '') {
            $('input[name=alert_email]').val(sQuery);
            $('input[name=alert_email]').css('color', 'gray');
        }
    });
    $('input[name=alert_email]').keypress(function(){
        $('input[name=alert_email]').css('background','');
    })
});
</script>

<div class="alert_form">
    <h3 class="h_color">
        <strong><?php _e('Subscribe to this search', 'decent_mobile'); ?></strong>
    </h2>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert">
        <fieldset>
            <?php AlertForm::page_hidden(); ?>
            <?php AlertForm::alert_hidden(); ?>

            <?php if(osc_is_web_user_logged_in()) { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php AlertForm::email_hidden(); ?>

            <?php } else { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php AlertForm::email_text(); ?>

            <?php }; ?>
            <button type="submit" class="btn btn_color_2 txt_color_1 btn-block sub_button"><?php echo osc_esc_html(__('Subscribe now', 'decent_mobile')); ?></button>
        </fieldset>
    </form>
</div>