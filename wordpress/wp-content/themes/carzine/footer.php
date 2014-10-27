<div id="carzine_footer_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carzine_footer_container">
                    <div id="carzine_footer_sidebar">
                    <div class="row">
                        <div class="col-md-3">
                        <?php if(sanitize_text_field(carzine_option('footer_column_one_header',OPTIONS_PREFIX.'footer_columns',''))):?>
                            <h1><?php echo 
                            sanitize_text_field(carzine_option('footer_column_one_header',OPTIONS_PREFIX.'footer_columns',''));?>
                            </h1>
                        <?php endif;?>
                        <?php if(wp_kses_post(carzine_option('footer_column_one',OPTIONS_PREFIX.'footer_columns',''))):?>
                        <?php echo  
                            wp_kses_post(carzine_option('footer_column_one',OPTIONS_PREFIX.'footer_columns',''));?> 
                        <?php endif;?>
                    
                        </div>
                        <div class="col-md-3">
                        <?php if(sanitize_text_field(carzine_option('footer_column_two_header',OPTIONS_PREFIX.'footer_columns',''))):?>
                            <h1><?php echo 
                            sanitize_text_field(carzine_option('footer_column_two_header',OPTIONS_PREFIX.'footer_columns',''));?>
                            </h1>
                        <?php endif;?>
                        <?php if(wp_kses_post(carzine_option('footer_column_two',OPTIONS_PREFIX.'footer_columns',''))):?>
                        <?php echo  
                            wp_kses_post(carzine_option('footer_column_two',OPTIONS_PREFIX.'footer_columns',''));?> 
                        <?php endif;?>
                        </div>
                        <div class="col-md-3">
                            <?php if(sanitize_text_field(carzine_option('footer_column_three_header',OPTIONS_PREFIX.'footer_columns',''))):?>
                            <h1><?php echo 
                            sanitize_text_field(carzine_option('footer_column_three_header',OPTIONS_PREFIX.'footer_columns',''));?>
                            </h1>
                        <?php endif;?>
                        <?php if(wp_kses_post(carzine_option('footer_column_three',OPTIONS_PREFIX.'footer_columns',''))):?>
                        <?php echo  
                            wp_kses_post(carzine_option('footer_column_three',OPTIONS_PREFIX.'footer_columns',''));?> 
                        <?php endif;?>
                        </div>
                        <div class="col-md-3">
                            <?php if(sanitize_text_field(carzine_option('footer_column_four_header',OPTIONS_PREFIX.'footer_columns',''))):?>
                            <h1><?php echo 
                            sanitize_text_field(carzine_option('footer_column_four_header',OPTIONS_PREFIX.'footer_columns',''));?>
                            </h1>
                        <?php endif;?>
                        <?php if(wp_kses_post(carzine_option('footer_column_four',OPTIONS_PREFIX.'footer_columns',''))):?>
                        <?php echo  
                            wp_kses_post(carzine_option('footer_column_four',OPTIONS_PREFIX.'footer_columns',''));?> 
                        <?php endif;?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center small">
                <?php if(carzine_option('copyright_text',OPTIONS_PREFIX.'general','')):?>
                   <?php echo wp_kses_post(carzine_option('copyright_text',OPTIONS_PREFIX.'general',''));?>
                <?php else: ?>
                    <p>
                    <a class="text-center" href="<?php echo esc_url( __( 'http://takimi.info', 'carzine' ) ); ?>">
                    <?php printf( __( 'Carzine ', 'carzine' )); ?></a> Theme, Powered by WordPress
                    </p>
                <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php
wp_footer();
?>
</body>
</html>