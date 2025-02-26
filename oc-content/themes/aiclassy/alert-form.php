


<div class="alert_form">
    <h3>
        <strong><?php _e('Subscribe to this search', 'aiclassy'); ?></strong>
    </h3>
    <form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert" class="nocsrf">
            <?php AlertForm::page_hidden(); ?>
            <?php AlertForm::alert_hidden(); ?>

            <?php if(osc_is_web_user_logged_in()) { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php AlertForm::email_hidden(); ?>

            <?php } else { ?>
                <?php AlertForm::user_id_hidden(); ?>
                <?php AlertForm::email_text(); ?>

            <?php }; ?>
            <button type="submit" data-loading-text="..." class="btn btn-primary btn-sm sub_button btn-disabled" ><?php _e('Subscribe now', 'aiclassy'); ?>!</button>
    </form>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(".sub_button").click(function(){
		if($('input[name=alert_email]').val() != sQuery) {
			$('.btn.sub_button').prop('disabled', true);
			$.post('<?php echo osc_base_url(true); ?>', {email:$("#alert_email").val(), userid:$("#alert_userId").val(), alert:$("#alert").val(), page:"ajax", action:"alerts"},
				function(data){
					$('.btn.sub_button').prop('disabled', false);
					if(data==1) {
						var alert_text = '<?php echo osc_esc_js(__('You have sucessfully subscribed to the alert', 'aiclassy')); ?>';
						if($('.breadcrumb').parent().find('.alert').length){
							$('.breadcrumb').parent().find('.alert').removeClass( "alert-success  alert-danger alert-info" ).addClass( "alert-success" );
							$('.breadcrumb').parent().find('.alert').html('<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text);
						}else{
							$( '<div role="alert" class="alert alert-success alert-dismissible"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text+'</div>' ).insertAfter( ".breadcrumb" );
						} //alert('<?php echo osc_esc_js(__('You have sucessfully subscribed to the alert', 'aiclassy')); ?>'); 
					}else if(data==-1) {
						var alert_text = '<?php echo osc_esc_js(__('Invalid email address', 'aiclassy')); ?>';
						if($('.breadcrumb').parent().find('.alert').length){
							$('.breadcrumb').parent().find('.alert').removeClass( "alert-success  alert-danger alert-info" ).addClass( "alert-danger" );
							$('.breadcrumb').parent().find('.alert').html('<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text);
						}else{
							$( '<div role="alert" class="alert alert-danger alert-dismissible"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text+'</div>' ).insertAfter( ".breadcrumb" );
						} //alert('<?php echo osc_esc_js(__('Invalid email address', 'aiclassy')); ?>'); 
					}else if(data==0) {
						var alert_text = '<?php echo osc_esc_js(__('You have already subscribed to the alert', 'aiclassy')); ?>';
						if($('.breadcrumb').parent().find('.alert').length){
							$('.breadcrumb').parent().find('.alert').removeClass( "alert-success  alert-danger alert-info" ).addClass( "alert-info" );
							$('.breadcrumb').parent().find('.alert').html('<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text);
						}else{
							$( '<div role="alert" class="alert alert-info alert-dismissible"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text+'</div>' ).insertAfter( ".breadcrumb" ); 
						}//alert('<?php echo osc_esc_js(__('You have already subscribed to the alert', 'aiclassy')); ?>'); 
					}else { 
						var alert_text = '<?php echo osc_esc_js(__('There was a problem with the alert', 'aiclassy')); ?>';
						if($('.breadcrumb').parent().find('.alert').length){
							$('.breadcrumb').parent().find('.alert').removeClass( "alert-success  alert-danger alert-info" ).addClass( "alert-danger" );
							$('.breadcrumb').parent().find('.alert').html('<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text);
						}else{
							$( '<div role="alert" class="alert alert-danger alert-dismissible"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text+'</div>' ).insertAfter( ".breadcrumb" );
						} //alert('<?php echo osc_esc_js(__('There was a problem with the alert', 'aiclassy')); ?>');
					};
			});
		}else{
			var alert_text = '<?php echo osc_esc_js(__('Enter valid email', 'aiclassy')); ?>';
			if($('.breadcrumb').parent().find('.alert').length){
				$('.breadcrumb').parent().find('.alert').removeClass( "alert-success  alert-danger alert-info" ).addClass( "alert-info" );
				$('.breadcrumb').parent().find('.alert').html('<button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text);
			}else{
				$( '<div role="alert" class="alert alert-info alert-dismissible"><button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'+alert_text+'</div>' ).insertAfter( ".breadcrumb" ); 
			} //alert('<?php echo osc_esc_js(__('Enter valid email', 'aiclassy')); ?>');
		}
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
