<?php
$loopClass = '';
$type = 'items';
if(View::newInstance()->_exists('listType')){
    $type = View::newInstance()->_get('listType');
}
if(View::newInstance()->_exists('listClass')){
    $loopClass = View::newInstance()->_get('listClass');
}
?>
<?php if($loopClass=='aiclassy_items' or $loopClass=='aiclassy_items_siderbar_menu') {?>
<div class="newest-classifieds  <?php echo $loopClass; ?>">
    <?php
        $i = 0;

        if($type == 'latestItems'){
            while ( osc_has_latest_items() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,false,$loopClass);
                $i++;
            }
        } elseif($type == 'premiums'){
            while ( osc_has_premiums() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,true,$loopClass);
                $i++;
                /*if($i == 3){
                    break;
                }*/
            }
        } else {
            while(osc_has_items()) {
                $i++;
                $class = false;
                if($i%4 == 0){
                    $class = 'last';
                }
                $admin = false;
                if(View::newInstance()->_exists("listAdmin")){
                    $admin = true;
                }

                aiclassy_draw_item($class,$admin,false,$loopClass);
          }
        }
    ?>
</div>
<?php }elseif($loopClass=='carousel-grid-aiclassy_items'){ ?>
    <?php
        $i = 0;

        if($type == 'latestItems'){
            while ( osc_has_latest_items() ) {
                $class = $i.' ';
                if($i == 1){
                    $class = 'active';
                }
                aiclassy_draw_item($class,false,false,'carousel-grid-aiclassy_items');
                $i++;
            }
        } elseif($type == 'premiums'){
            while ( osc_has_premiums() ) {
                $class = $i.' ';
                if($i == 1){
                    $class = 'active';
                }
                aiclassy_draw_item($class,false,true,'carousel-grid-aiclassy_items');
                $i++;
                /*if($i == 3){
                    break;
                }*/
            }
        } else {
            while(osc_has_items()) {
                $i++;
                $class = $i.' ';
                if($i == 1){
                    $class = 'active';
                }
                $admin = false;
                if(View::newInstance()->_exists("listAdmin")){
                    $admin = true;
                }

                aiclassy_draw_item($class,$admin,false,'carousel-grid-aiclassy_items');
          }
        }
    ?>
<?php }elseif($loopClass=='listing-grid-aiclassy_items'){ ?>
<div class="row selected-classifieds <?php echo $loopClass; ?>">
    <?php
        $i = 0;

        if($type == 'latestItems'){
            while ( osc_has_latest_items() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,false,'listing-grid-aiclassy_items');
                $i++;
            }
        } elseif($type == 'premiums'){
            while ( osc_has_premiums() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,true,'listing-grid-aiclassy_items');
                $i++;
                /*if($i == 3){
                    break;
                }*/
            }
        } else {
            while(osc_has_items()) {
                $i++;
                $class = false;
                if($i%4 == 0){
                    $class = 'last';
                }
                $admin = false;
                if(View::newInstance()->_exists("listAdmin")){
                    $admin = true;
                }

                aiclassy_draw_item($class,$admin,false,'listing-grid-aiclassy_items');
          }
        }
    ?>
</div>
<?php }elseif($loopClass=='listing-grid-main premium-list'){ ?>
<div class="row selected-classifieds <?php echo $loopClass; ?>">
    <?php
        $i = 0;

        if($type == 'latestItems'){
            while ( osc_has_latest_items() ) {
                $class = '';
                if($i%4 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,false,'listing-grid-main-premium');
                $i++;
            }
        } elseif($type == 'premiums'){
            while ( osc_has_premiums() ) {
                $class = '';
                if($i%4 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,true,'listing-grid-main-premium');
                $i++;
                /*if($i == 4){
                    break;
                }*/
            }
        } else {
            while(osc_has_items()) {
                $i++;
                $class = false;
                if($i%4 == 0){
                    $class = 'last';
                }
                $admin = false;
                if(View::newInstance()->_exists("listAdmin")){
                    $admin = true;
                }

                aiclassy_draw_item($class,$admin,false,'listing-grid-main-premium');
          }
        }
    ?>
</div>
<?php }else{ ?>
<ul class="listing-card-list <?php echo $loopClass; ?>" id="listing-card-list">
    <?php
        $i = 0;

        if($type == 'latestItems'){
            while ( osc_has_latest_items() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class);
                $i++;
            }
        } elseif($type == 'premiums'){
            while ( osc_has_premiums() ) {	
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                aiclassy_draw_item($class,false,true);
                $i++;
                //~ if($i >= $aItems){
                    //~ break;
                //~ }
            }
        } else {
            while(osc_has_items()) {
                $i++;
                $class = false;
                if($i%4 == 0){
                    $class = 'last';
                }
                $admin = false;
                if(View::newInstance()->_exists("listAdmin")){
                    $admin = true;
                }

                aiclassy_draw_item($class,$admin);
                
          }
        }
    ?>
</ul>

<?php } ?>

