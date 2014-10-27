<!DOCTYPE html>
<html <?php language_attributes();?>>
  <head>
    <meta charset="<?php echo get_bloginfo('charset'); ?>"/>
    <?php if (carzine_option('favicon',OPTIONS_PREFIX.'general','')):?>
    <link rel="icon" href="<?php echo esc_url(carzine_option('favicon',OPTIONS_PREFIX.'general','')); ?>" type="image/x-icon">
    <?php endif; ?> 
    <title><?php wp_title('|',true,'right'); ?> <?php echo get_bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php echo get_bloginfo('pingback_url'); ?>" />    
	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  
  <?php get_template_part('theme_includes/top_date_and_social_area');?>
  <?php get_template_part('theme_includes/logo_area');?>
  <?php get_template_part('theme_includes/menu_area');?>	
  <?php get_template_part('theme_includes/header_image_area');?>