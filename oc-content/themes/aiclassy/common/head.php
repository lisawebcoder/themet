<?php
    $js_lang = array(
        'delete' => __('Delete', 'aiclassy'),
        'cancel' => __('Cancel', 'aiclassy')
    );
    
osc_enqueue_style('aiclassy', osc_current_web_theme_styles_url('aiclassy.css?223') );
osc_enqueue_style('aiclassy-responsive', osc_current_web_theme_styles_url('aiclassy-responsive.css'));
osc_enqueue_style('aiclassy-carousel', osc_current_web_theme_styles_url('aiclassy-carousel.css'));

    osc_enqueue_script('jquery');
    osc_register_script('bootstrap-min', osc_current_web_theme_js_url('bootstrap-min.js'));
    osc_register_script('respond-min', osc_current_web_theme_js_url('respond-min.js'));
    //~ osc_register_script('jquery-slides-min', osc_current_web_theme_js_url('jquery-slides-min.js'));
    osc_register_script('global-theme-js', osc_current_web_theme_js_url('global.js?223'), 'jquery');
    osc_register_script('delete-user-js', osc_current_web_theme_js_url('delete_user.js'), 'jquery-ui');
    osc_enqueue_script('bootstrap-min');
    osc_enqueue_script('respond-min');
    osc_enqueue_script('jquery-ui');
    //~ osc_enqueue_script('jquery-slides-min');
    osc_enqueue_script('global-theme-js');
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo meta_title() ; ?></title>
<!--<meta name="title" content="<?php //echo osc_esc_html(meta_title()); ?>" />-->
<?php if( meta_description() != '' ) { ?>
<meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if( meta_keywords() != '' ) { ?>
<meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php if( osc_get_canonical() != '' ) { ?>
<!-- canonical -->
<link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
<!-- /canonical -->
<?php } ?>
<!--<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="0" />-->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- favicon -->
<?php aiclassy_draw_site_favicon(); ?>
<!-- /favicon -->


<script type="text/javascript">
    var aiclassy = window.aiclassy || {};
    aiclassy.base_url = '<?php echo osc_base_url(true); ?>';
    aiclassy.langs = <?php echo json_encode($js_lang); ?>;
    aiclassy.fancybox_prev = '<?php echo osc_esc_js( __('Previous image','aiclassy')) ?>';
    aiclassy.fancybox_next = '<?php echo osc_esc_js( __('Next image','aiclassy')) ?>';
    aiclassy.fancybox_closeBtn = '<?php echo osc_esc_js( __('Close','aiclassy')) ?>';
    
</script>
<link class="changetheme" href="<?php echo osc_current_web_theme_url('color_scheme/'.aiclassy_default_color_scheme().'/bootstrap.min.css') ; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/main.css') ; ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/animate.css') ; ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />

<link href="<?php echo osc_current_web_theme_url('js/jquery-ui/jquery-ui-1.10.2.custom.min.css') ; ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo osc_current_web_theme_url('css/menu.css') ; ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />

<?php osc_run_hook('header') ; ?>
<?php if(osc_get_preference('idClient@adsenseAll', 'aiclassy_theme') && osc_get_preference('type@adsenseAll', 'aiclassy_theme')){ 
	if(isset($_SERVER['HTTPS'])) {
	   if ($_SERVER['HTTPS'] == "on") {
	?>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <?php } } else { ?>
	<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>    
    <?php 
    } 
}
?>
<?php if(aiclassy_language_direction()=='rtl'){ ?>
<link href="<?php echo osc_current_web_theme_url('css/bootstrap-rtl.min.css') ; ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />
<?php } ?>
