<?php
/***
* This is the latest post area.
* This section is below featured posts area
*/
?>
<div class="carzine_latest_post_container">
    <div class="row">
    <?php if(have_posts()):?>
     <?php while(have_posts()):the_post();?>
        <div class="col-md-6">
       
            <div class="carzine_latest_post">
                <div class="carzine_latest_post_image">
                <?php if(carzine_is_video_format(get_the_ID())):?>
                    <div class="carzine_post_format"><i class="fi-play-video"></i></div>
                    <?php endif;?>     
                   <a href="<?php the_permalink();?>">
                    <?php if(has_post_thumbnail()):
                    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'' );
     echo '<img width="100%" src="' . $image_src[0] . '">';
                    endif;
                    ?>
                   </a>
                                   
                </div>
                <div class="post-meta">
                    <i class="fi-calendar"> </i> 
                    <span class="date_text"><?php echo __('Date:','carzine');?> </span>
                    <span class="post_date"><?php echo get_the_date('d / M / Y');?> </span>
                    <span class="comment_number margin10">  <i class="fi-comments"> </i><?php echo get_comments_number();?>
                    </span>
                </div>
                <div class="carzine_latest_post_title">
                <h1><a title="<?php the_title_attribute();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <div class="carzine_latest_post_content">
                    <?php 
                    $content = get_the_content();
                    echo carzine_return_trimmed_content($content,15);
                    ?>
                </div>
                <div class="carzine_featured_post_categories">
                   <i class="fi-bookmark"> </i>
                   <?php echo get_the_category_list(' , ', _e(' ', 'carzine' )); ?>  
                </div>
                </div>
            </div><!--.featured_post ends here-->
            
        </div>
        <?php endwhile;?>
        
        <?php else:?>
        
        <p><?php _e('No posts found','carzine');?></p>
        <?php endif;?>
    </div>
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