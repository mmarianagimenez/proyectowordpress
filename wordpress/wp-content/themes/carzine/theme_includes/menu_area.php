<?php
/**This is the area that holds the menu***/
?>
<div id="carzine_menu_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php $menu_args = 
                  array('theme_location'=>'main',
                        'menu_container'=>'false',
                        'menu_class'=>false,
                        'menu_id'=>'main-menu');
                  wp_nav_menu($menu_args);?>
            </div>
        </div>
    </div>
</div><!--#carzine_menu_area ends here-->
