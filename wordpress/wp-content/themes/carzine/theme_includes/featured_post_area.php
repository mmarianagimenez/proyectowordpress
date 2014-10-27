<?php
/********************************************
* This is the area that holds the featured posts, 
* which number are controlled by user.
**********************/
?>
<?php
if(esc_html(carzine_option('disable_featured',OPTIONS_PREFIX.'featured_post_settings',''))=="no"):?>

<div class="carzine_featured_post_container">
<?php 
if(esc_html(carzine_option('featured_category',OPTIONS_PREFIX.'featured_post_settings','1'))):
$fcat =  esc_html(carzine_option('featured_category',OPTIONS_PREFIX.'featured_post_settings','1'));
endif ;
if(intval(carzine_option('featured_posts_number',OPTIONS_PREFIX.'featured_post_settings',''))):
$fnumber =  intval(carzine_option('featured_posts_number',OPTIONS_PREFIX.'featured_post_settings',''));
endif ;
?>
<?php $featured_args = array('post_type'=>'post',
                             'cat'=>$fcat,
                             'posts_per_page'=>$fnumber);
      $fQuery = new WP_Query($featured_args);
      ?>
<?php while($fQuery->have_posts()):$fQuery->the_post();?>
    <div class="carzine_featured_post">
        <div class="carzine_featured_post_image">
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
        <div class="carzine_featured_post_title">
        <h1><a title="<?php the_title_attribute();?>" href="<?php the_permalink();?>"><?php the_title();?></a></h1>
        <div class="carzine_featured_post_content">
            <?php 
            $content = get_the_content();
            echo carzine_return_trimmed_content($content,40);
            ?>
        </div>
        <div class="carzine_featured_post_categories">
           <i class="fi-bookmark"> </i>
           <?php echo get_the_category_list(' , ', _e(' ', 'carzine' )); ?>  
        </div>
        </div>
    </div><!--.featured_post ends here-->
    <?php endwhile; wp_reset_query();?>
</div>

<?php endif; ?>
