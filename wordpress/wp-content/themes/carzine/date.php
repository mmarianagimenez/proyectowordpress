<?php
/*Date Archives.*/
get_header();?>
<div id="carzine_main_content_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="breadcrumbs_and_title">
                 <?php carzine_the_breadcrumb(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="carzine_main_content_container">
                  
                  <!--Category_Loop-->  
                <div class="carzine_single_post_container">
                <?php if(have_posts()):?>
                <?php while(have_posts()):the_post();?>
                    <div id="<?php the_ID();?>" class="carzine_single_post <?php post_class();?>">
                        <div class="carzine_single_post_image">
                            <?php if(has_post_thumbnail()):the_post_thumbnail('featured_post_image',array('class'=>'img-responsive'));
                            endif;
                            ?>
                        </div>
                        <div class="post-meta">
                            <i class="fi-calendar"> </i> 
                            <span class="date_text"><?php echo __('Date:','carzine');?> </span>
                            <span class="post_date"><?php echo get_the_date('d / M / Y');?> </span>
                            <span class="comment_number margin10">  <i class="fi-comments"> </i><?php echo get_comments_number();?>
                            </span>
                        </div>
                        <div class="carzine_single_post_title">
                        <h1><a title="<?php the_title_attribute();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                        <div class="carzine_single_post_content">
                            <?php 
                            the_excerpt();
                            ?>
                        </div>
                        <div class="carzine_single_post_categories">
                           <i class="fi-bookmark"> </i>
                           <?php echo get_the_category_list(' , ', _e(' ', 'carzine' )); ?>  
                        </div>
                        <?php if(has_tag()):?>
                        <div class="carzine_single_post_tags">
                           <i class="fi-page"></i>
                          <?php the_tags('', ', ' , ' '); ?>  
                        </div>
                        <?php endif;?>
                        </div>
                    </div><!--.single_post ends here-->
                    <?php endwhile;?>
                    <?php else: ?>
                    
                    <p><?php  echo __('No posts given in this category','carzine');?></p>
                    <?php endif;?>
                    <div class="clear"></div>
                    <div class="row">
                    <div class="col-md-12">
                        <div id="carzine_pagination">
                           
                            <div id="prev_posts_link"><?php previous_posts_link(__( '&laquo; Newer posts', 'carzine' )) ?>
                            </div>
                            <div id="next_posts_link"><?php next_posts_link(__( 'Older posts &raquo;', 'carzine' )) ?>
                            </div>
                        
                        </div>
                    </div>
    </div>
                </div>
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