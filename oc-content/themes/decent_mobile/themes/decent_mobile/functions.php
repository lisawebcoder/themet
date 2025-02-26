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
    define('decent_mobile_version', '1.0.0');
    define('decent_mobile', 'decent_mobile');
	
     class MblItemForm extends ItemForm {
        
        static public function title_input($name, $locale = 'en_US', $value = '')
        {
            parent::generic_input_text($name . '[' . $locale . ']', $value);
            return true;
        }

        static public function description_textarea($name, $locale = 'en_US', $value = '')
        {
            parent::generic_textarea($name . '[' . $locale . ']', $value);
            return true;
        }
        
        static public function multilanguage_title_description($locales = null, $item = null) {
            if($locales==null) { $locales = osc_get_locales(); }
            if($item==null) { $item = osc_item(); }
            $num_locales = count($locales);
	
            if($num_locales>1) { echo '<fieldset data-role="fieldcontain"><ul class="nav nav-tabs" id="myTab" style="top:auto;      left: 0;margin: 0;  position: relative;      margin-top: 14px;   border-bottom:0px;">'; };
            foreach($locales as $key=>$locale) {
                if($num_locales>1) { echo '<li class="'; if($key==0){ echo 'active';} echo '"><a href="#section'.$key.'">'.$locale['s_name'].'</a></li>'; };
			}
			 if($num_locales>1) { echo '</ul></fieldset>    <div class="tab-content">'; };
			 foreach($locales as $key=>$locale) {
                echo '<div id="section'.$key.'" class="tab-pane fade in '; if($key==0){ echo 'active';} echo '">';
                echo '<fieldset data-role="fieldcontain"><label for="title">' . __('Title', 'decent_mobile') . ' *</label>';
                $title = (isset($item) && isset($item['locale'][$locale['pk_c_code']]) && isset($item['locale'][$locale['pk_c_code']]['s_title'])) ? $item['locale'][$locale['pk_c_code']]['s_title'] : '';
                if( Session::newInstance()->_getForm('title') != "" ) {
                    $title_ = Session::newInstance()->_getForm('title');
                    if( $title_[$locale['pk_c_code']] != "" ){
                        $title = $title_[$locale['pk_c_code']];
                    }
                }
                self::title_input('title', $locale['pk_c_code'], $title);
                echo '</fieldset>';
                echo '<fieldset data-role="fieldcontain"><label for="description">' . __('Description', 'decent_mobile') . ' *</label>';
                $description = (isset($item) && isset($item['locale'][$locale['pk_c_code']]) && isset($item['locale'][$locale['pk_c_code']]['s_description'])) ? $item['locale'][$locale['pk_c_code']]['s_description'] : '';
                if( Session::newInstance()->_getForm('description') != "" ) {
                    $description_ = Session::newInstance()->_getForm('description');
                    if( $description_[$locale['pk_c_code']] != "" ){
                        $description = $description_[$locale['pk_c_code']];
                    }
                }
                self::description_textarea('description', $locale['pk_c_code'], $description);
                echo '</fieldset>';
                if($num_locales>1) { echo '</div>'; };
             }
             if($num_locales>1) { echo '</div>'; };
        }
        
        static public function region_text_hidden()
        {
            $region   = '';
            $regionId = '';
            if( Session::newInstance()->_getForm('regionId') != "" ) {
                $regionId = Session::newInstance()->_getForm('regionId');
            }
            if( Session::newInstance()->_getForm('region') != "" ) {
                $region = Session::newInstance()->_getForm('region');
            }
            parent::generic_input_hidden('region', $region) ;
            //parent::generic_input_hidden('regionId', $regionId) ;
        }
        
        static public function city_text_hidden()
        {
            $city   = '';
            $cityId = '';
            if( Session::newInstance()->_getForm('cityId') != "" ) {
                $cityId = Session::newInstance()->_getForm('cityId');
            }
            if( Session::newInstance()->_getForm('city') != "" ) {
                $city = Session::newInstance()->_getForm('city');
            }
            parent::generic_input_hidden('city', $city) ;
            //parent::generic_input_hidden('cityId', $cityId) ;
        }
         
        
        static public function location_javascript($path = "front") {
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#countryId").on("change",function(){
            var pk_c_code = $(this).val();
            
            var url = '<?php echo osc_base_url(true)."?page=ajax&action=regions&countryId="; ?>' + pk_c_code;
            
            var result = '';

            if(pk_c_code != '') {

                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    success: function(data){
                        var length = data.length;
                        if(length > 0) {
                            for(key in data) {
                                result += '<option  onchange="select_region(\''+ data[key].s_name +'\',\''+ data[key].pk_i_id +'\');" value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                            }
                        } else {
                        }
                        $("#list_regions").html(result);
                        $('#field_select_region').show();
                    }
                 });

             } else {
             }
        });

        $(".regionId").change(function(){
            var pk_c_code = $(this).val();
            
            var url = '<?php echo osc_base_url(true)."?page=ajax&action=cities&regionId="; ?>' + pk_c_code;

            var result = '';

            if(pk_c_code != '') {
                
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    success: function(data){
                        var length = data.length;
                        if(length > 0) {
                            for(key in data) {
                                result += '<option onchange="select_city(\''+ data[key].s_name +'\',\''+ data[key].pk_i_id +'\');" value="' + data[key].pk_i_id + '">' + data[key].s_name + '</option>';
                            }
                        } else {
                        }
                        $("#list_cities").html(result);
                        
                        $('#field_select_city').show();
                        $('#field_select_city_area').show();
                        $('#field_select_address').show();
                    }
                 });
             } else {
             }
        });

    });
    
    function select_region(region_name, region_id){
		$("#regionId option:selected").text( region_name );
        $('#region').val(region_name);
        $('#regionId').val(region_id).trigger('change');
        $('.ui-dialog').dialog('close');
    }
    
    function select_city(city_name, city_id){
		$("#cityId option:selected").text( city_name );
        $('#city').val(city_name);
        $('#cityId').val(city_id);
//        $('.ui-dialog').dialog('close');
    }
    
    
    /**
     * Strip HTML tags to count number of visible characters.
     */
    function strip_tags(html) {
        if (arguments.length < 3) {
            html=html.replace(/<\/?(?!\!)[^>]*>/gi, '');
        } else {
            var allowed = arguments[1];
            var specified = eval("["+arguments[2]+"]");
            if (allowed){
                var regex='</?(?!(' + specified.join('|') + '))\b[^>]*>';
                html=html.replace(new RegExp(regex, 'gi'), '');
            } else{
                var regex='</?(' + specified.join('|') + ')\b[^>]*>';
                html=html.replace(new RegExp(regex, 'gi'), '');
            }
        }
        return html;
    }
    
    function delete_image(id, item_id,name, secret) {
        //alert(id + " - "+ item_id + " - "+name+" - "+secret);
        var result = confirm('<?php echo osc_esc_js(_e('This action can\\\'t be undone. Are you sure you want to continue?', 'decent_mobile')); ?>');
        if(result) {
            $.ajax({
                type: "POST",
                url: '<?php echo osc_base_url(true); ?>?page=ajax&action=delete_image&id='+id+'&item='+item_id+'&code='+name+'&secret='+secret,
                dataType: 'json',
                success: function(data){
                    var class_type = "error";
                    if(data.success) {
                        $("div[name="+name+"]").remove();
                        class_type = "ok";
                    }
                    var flash = $("#flash_js");
                    var message = $('<div>').addClass('pubMessages').addClass(class_type).attr('id', 'FlashMessage').html(data.msg);
                    flash.html(message);
                    $("#FlashMessage").slideDown('slow').delay(3000).slideUp('slow');
                }
            });
        }
    }
    
    
</script>
<?php
        }
        
     }

     // ------------------------------------------------------------------------



    if(!function_exists('mbl_search_pagination')){
        function mbl_search_pagination() {

            $pagination = new mlb_pagination();
            return $pagination->doPagination();
        }
    }

    class mlb_pagination extends Pagination{

        public function get_links()
        {
            $pages = $this->get_pages();
            $links = array();

            $links[] = '<li>';
            if( !isset($pages['prev']) && isset($pages['next']) ) {
                $links[] = '';
                $links[] = '<a class="searchPaginationNext" id="'.$pages['next'].'" href="' . str_replace('{PAGE}', $pages['next'], str_replace(urlencode('{PAGE}'), $pages['next'], $this->url)) . '" ><span>'.$pages['next'].'</span></a>';
            }
            if( isset($pages['prev']) && isset($pages['next']) ) {
                $links[] = '<a href="' . str_replace('{PAGE}', $pages['prev'], str_replace(urlencode('{PAGE}'), $pages['prev'], $this->url)) . '" ></a>';
                $links[] = '<div><a class="searchPaginationNext" id="'.$pages['next'].'" href="' . str_replace('{PAGE}', $pages['next'], str_replace(urlencode('{PAGE}'), $pages['next'], $this->url)) . '" ><span>'.$pages['next'].'</span></a>';
            }
            if( isset($pages['prev']) && !isset($pages['next']) ) {
                $links[] = '<a href="' . str_replace('{PAGE}', $pages['prev'], str_replace(urlencode('{PAGE}'), $pages['prev'], $this->url)) . '" ></a>';
            }
            $links[] = '</li>';
            return $links;
        }
    }
    
    function time_diff($s)
    {
        $s = substr($s, 0, -3);
        $_s = strtotime($s);
        
        $s = time()-$_s;
        
        $m=0;$hr=0;$d=0;
        $td="now";
        if($s>59) {
            $m = (int)($s/60);
            $s = $s-($m*60); // sec left over
            $td = "$m min";
        }
        if($m>59){
            $hr = (int)($m/60);
            $m = $m-($hr*60); // min left over
            $td = "$hr hr"; if($hr>1) $td .= "s";
            if($m>0) $td .= ", $m min";
        }
        if($hr>23){
            $d = (int)($hr/24);
            $hr = $hr-($d*24); // hr left over
            $td = "$d day"; if($d>1) $td .= "s";
            if($d<3){
                if($hr>0) $td .= ", $hr hr"; if($hr>1) $td .= "s";
            } 
        }
        return $td;
    }

    if( !function_exists('related_listings') ) {
        function related_listings() {
            View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addRegion(osc_item_region());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '3');

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == 3 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '3');

            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            return 0;
        }
    }



?>