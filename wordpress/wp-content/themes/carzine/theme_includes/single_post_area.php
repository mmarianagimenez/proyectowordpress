<?php
/***WordPress Loop that brings the single Post***/
?>
<div class="carzine_single_post_container">
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
        <!--
        <div class="carzine_single_post_title">
        -->
        <div class="carzine_single_post_content">
            <?php 
            the_content();
            ?>
            <div class="clear"></div>
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
       <!--
        </div>
       -->
    </div><!--.single_post ends here-->
    <?php endwhile;?>
    <div class="carzine_post_pagination">
    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'carzine' ) . '</span>', 'after' => '</div>' ) ); ?>
    </div>
    
    <div class="clear"></div>
    <!--Comments-->
     <?php if(comments_open()):?>
        <div id="carzine_comments_section">
        <?php comments_template( '', true ); ?>
        </div>
     <?php endif; ?>
</div>