<?php
    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('contact');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
?>
<div class="row content">
        <div class="col-lg-12">
          <?php aiclassy_draw_breadcrumb(); ?>
          <h2><?php _e('Contact', 'aiclassy'); ?></h2>
          <div class="row">
            <div class="col-md-8">
              <iframe src="<?php echo osc_get_preference('contact_us_map_link', 'aiclassy_theme'); ?>" style="border: none; width: 100%; height: 400px;"></iframe>  
            </div>
            <div class="col-md-4">
              <div class="well well-sm">
				  <?php osc_show_widgets('contact-address'); ?>
              
              </div> 
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-body"> 
				  <ul id="error_list"></ul>
                  <form name="contact_form" action="<?php echo osc_base_url(true); ?>" method="post" >
					<input type="hidden" name="page" value="contact" />
					<input type="hidden" name="action" value="contact_post" />
					<input type="hidden" name="yourName" value="" />
                    <div class="form-group">
                      <label for="yourEmail"><?php _e('E-mail', 'aiclassy'); ?></label>
                      <input type="email" class="form-control no-has-placeholder" name="yourEmail" id="yourEmail" placeholder="<?php _e('Enter your email', 'aiclassy'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="subject"><?php _e('Subject', 'aiclassy'); ?></label>
                      <input type="text" class="form-control no-has-placeholder" name="subject" id="subject" placeholder="<?php _e('Enter your subject', 'aiclassy'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="InputText"><?php _e('Your text', 'aiclassy'); ?></label>
                      <textarea class="form-control" name="message" id="message" placeholder="<?php _e('Type in your message', 'aiclassy'); ?>" rows="5" style="margin-bottom:10px;"></textarea>
                    </div>
                    <?php osc_run_hook('contact_form'); ?>
                    <?php osc_show_recaptcha(); ?>
                    <button type="submit" class="btn btn-info"><?php _e("Send", 'aiclassy');?></button>
                    <?php osc_run_hook('admin_contact_form'); ?>
                  </form>
                  <?php ContactForm::js_validation(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<?php osc_current_web_theme_path('footer.php') ; ?>
