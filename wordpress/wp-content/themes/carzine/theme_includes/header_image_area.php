<?php if(is_home() && get_header_image() != ''):?>
<div id="carzine_header_image_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carzine_header_image_container">
                        
                         <img class="img-responsive"  src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                        
                <div id="carzine_header_image_overlay">
                    <?php if(carzine_option('header_image_link',OPTIONS_PREFIX.'general','') !=""):?>
                    <a href="<?php echo esc_url_raw(carzine_option('header_image_link',OPTIONS_PREFIX.'general','')); ?>"></a>
                    <?php endif;?>
                </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>