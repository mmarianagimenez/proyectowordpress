<?php 
/*********************************************** 
* The main template file for the carzine theme
***********************************************/
get_header();?>
<div id="carzine_main_content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="carzine_main_content_container">
                    <?php get_template_part('theme_includes/featured_post_area');?>
                    <?php get_template_part('theme_includes/latest_post_area');?>
                </div>
            </div> 
            <div class="col-md-4">
                <div id="carzine_sidebar_container">
                    <?php get_sidebar();?>
                </div>
            </div>   
        </div>
    </div>
</div>
<?php get_footer();?>