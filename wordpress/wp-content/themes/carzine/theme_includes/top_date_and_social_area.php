<div id="carzine_top_date_and_social_area">
    <div class="container">
        <div class="row">
            <div class="col-md-2" id="carzine_top_date_container">
                <p>
                <?php echo carzine_get_current_daytime(); ?>
                </p>
            </div><!--#carzine_top_date_container-->
            <div class="col-md-offset-3 col-md-3">
                <?php if(carzine_option('top_area_text', OPTIONS_PREFIX.'general','')): ?>
                    <p><?php echo sanitize_text_field(carzine_option('top_area_text', OPTIONS_PREFIX.'general',''));?></p>
                <?php endif;?>
            </div>
            <div class="col-md-4" id="carzine_top_social_container">
                <ul>
                
                <?php if(carzine_option('facebook', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Our facebook" href="<?php echo esc_url(carzine_option('facebook', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-facebook"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('twitter', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Follow us on Twitter" href="<?php echo esc_url(carzine_option('twitter', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-twitter"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('google_plus', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Our Google Plus Profile" href="<?php echo esc_url(carzine_option('google_plus', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-google-plus"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('pinterest', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Pinterest" href="<?php echo esc_url(carzine_option('pinterest', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-pinterest"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('linkedin', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="View our Linkedin Profile" href="<?php echo esc_url(carzine_option('linkedin', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-linkedin"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('dribbble', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="View our dribbble profile" href="<?php echo esc_url(carzine_option('pinterest', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-dribbble"></i></a></li>
                <?php endif;?>

                <?php if(carzine_option('instagram', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Our Instagram Page" href="<?php echo esc_url(carzine_option('instagram', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-instagram"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('youtube', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Our Youtube Channel" href="<?php echo esc_url(carzine_option('youtube', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-social-youtube"></i></a></li>
                <?php endif;?>
                
                <?php if(carzine_option('rss', OPTIONS_PREFIX.'socials','')): ?>
                <li><a target="_blank" title="Subscribe to our RSS feed" href="<?php echo esc_url(carzine_option('rss', OPTIONS_PREFIX.'socials','')); ?>">
                <i class="fi-rss"></i></a></li>
                <?php endif;?>
                
                </ul>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div> <!--#top_date_and_social_area_ends_here--> 
        