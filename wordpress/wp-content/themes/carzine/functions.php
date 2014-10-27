<?php 
/*************************************************************
* MAIN FUNCTIONS FILE FOR THE CAR BLOG THEME
*
** This is the main functions.php file for this theme.
** Please do not modify it unless you are quite 
** sure what you are doing. You can always have support / premium support 
** following this url : http://example.com/
*
** TABLE OF CONTENTS
** - THEME CONSTANTS
** - THEME REQUIREMENTS
** - THEME SETUP
** - THEME SCRIPTS (CSS+JS+OTHERS)
** - THEME SIDEBARS
** - THEME COMMENTS
*****************************************************************/

/****************************************************************
* THEME CONTSTANTS
* 
** Declaring Constant Variables to use them into functions file 
** and elsewhere. "OPTIONS_PREFIX" is theme specific prefix that 
** it will be used into the theme options panel (if applicable)
*****************************************************************/
DEFINE('TEMP_PATH',get_template_directory_uri());
DEFINE('OPTIONS_PREFIX','carzine_');
DEFINE('CSS_PATH',get_template_directory_uri().'/css/');
DEFINE('JS_PATH',get_template_directory_uri().'/js/');
DEFINE('IMG_PATH',get_template_directory_uri().'/img/');
DEFINE('STYLESHEET_URI',get_stylesheet_uri());
DEFINE('THEME_INCLUDES',get_template_directory_uri().'/theme_includes/');
/****************************************************************
* THEME REQUIREMENTS
*
** Well, here we declare if there is any requirement for the 
** theme in order to function properly. If we don't need something 
* to require, then we leave it blank.
*****************************************************************/
get_template_part('theme_includes/carzine_theme_functions');
/****************************************************************
* AFTER THEME SETUP
*
** Here we use the "after_setup_theme" hook in order to use 
** functions that the theme needs to run after the setup.
** Common functions here - add_theme_support, register_nav_menu,
** custom header and custom background, load_theme_textdomain etc.
*****************************************************************/
add_action('after_setup_theme', 'carzine_theme_setup');
function carzine_theme_setup(){
    
$carzine_header_arguments = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => '1124',
        'height'                 => '291',
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => false,
        'uploads'                => true
        );
$carzine_bg_arguments = array(
'default-color' => '',
'default-image' => IMG_PATH.'default_bg.png',
'wp-head-callback' => 'carzine_custom_bg_initialize'
);
function carzine_custom_bg_initialize() {
$background = set_url_scheme( get_background_image() );
$color = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );

if (!$background && !$color )
return;

$style = $color ? "background-color: #$color;" : '';
if ($background) {
    $image = " background-image: url('$background');";
    $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );

if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' )))
    $repeat = 'repeat';
    $repeat = " background-repeat: $repeat;";

    $position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );

if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
    $position = 'left';
    $position = " background-position: top $position;";
    $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );

if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
    $attachment = 'scroll';
    $attachment = " background-attachment: $attachment;";
    $style .= $image . $repeat . $position . $attachment;
}
?>
<style type="text/css" id="custom-background-css">
body.custom-background { <?php echo trim( $style ); ?> }
</style>
<?php
}
    
if (!isset( $content_width)):
    $content_width = 765;     
endif;

add_theme_support('post-thumbnails');
add_image_size('featured_post_image','760','250,',true);
add_image_size('latest-post-image','375','9999',true);
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_theme_support('custom-background',$carzine_bg_arguments);
add_theme_support('custom-header', $carzine_header_arguments );
add_theme_support('post-formats', array('video'));
add_editor_style('');

load_theme_textdomain('carzine', get_template_directory() . '/languages');
/**Register our menu/s here***/
if(function_exists('register_nav_menus')):
register_nav_menus(
    array('main'=>'This is the Main Menu')
    );
endif;
}
/****************************************************************
* LOAD STYLES AND JS SCRIPTS
*
** You know that in order to load css and js to our theme the function we 
* should use is  wp_enqueue_script and we determine where to load each 
* script.There 2 positions available: into the head or into the footer, 
* using the wp_head or wp_footer hook respectively.
** We load CSS first,then js and lastly we load respond.js which turns enables 
** responsive bootstrap in IE 6-8 
*****************************************************************/
add_action('wp_enqueue_scripts', 'carzine_load_css');
function carzine_load_css(){ 
    wp_enqueue_style( 'bootstrap', CSS_PATH. 'bootstrap.min.css','','','all' );
    wp_enqueue_style( 'bootstrap-theme', CSS_PATH. 'bootstrap-theme.min.css','','','all' );
    wp_enqueue_style( 'slicknav',CSS_PATH.'slicknav.css','','','all');
    wp_enqueue_style( 'foundation-icons', TEMP_PATH.'/foundation-icons/foundation-icons.css','','','all' );
    wp_enqueue_style( 'style', STYLESHEET_URI,'','','all' );
}    

add_action('wp_enqueue_scripts', 'carzine_load_js');
function carzine_load_js(){  
wp_enqueue_script('jquery');
wp_enqueue_script('bootstrap', JS_PATH.'bootstrap.min.js',array('jquery'),'',true);
wp_enqueue_script('slicknav',JS_PATH.'jquery.slicknav.min.js',array('jquery'),'',true);
wp_enqueue_script('theme_init',JS_PATH.'theme_init.js',array('jquery'),'',true);
wp_localize_script('theme_init', 'init_vars', array(
            'label' => __('Menu', 'carzine')
        ));

if ( is_singular() && get_option( 'thread_comments' ))
    wp_enqueue_script( 'comment-reply' );
}

add_action('wp_head', 'carzine_add_respond_js_for_ie');
function carzine_add_respond_js_for_ie() {
echo '<!--[if lt IE 9]>';
echo '<script src="'.JS_PATH.'respond.js"></script>';
echo '<![endif]-->';
}
/****************************************************************
* THEME SIDEBARS
*
** We initialize and register of course carzine theme's sidebars.
** Use of widgets_init hook :)
*****************************************************************/
add_action('widgets_init','carzine_create_sidebars');
function carzine_create_sidebars(){
    register_sidebar(array(
        'name' => __('Sidebar', 'carzine' ),
        'id'   => 'sidebar',
        'description' => __('This is the main, widgetized sidebar.', 'carzine' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}
/****************************************************************
* THEME COMMENTS
*
** Comments callback function from WordPress.org
*****************************************************************/
function carzine_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','carzine' ); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
            /* translators: 1: date, 2: time */
            printf( __('%1$s at %2$s','carzine'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)','carzine' ), '  ', '' );
        ?>
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
    

    <?php comment_text(); ?>
    </div>

    <div class="reply">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}
/******This function uses wp_title filter*****/
function carzine_wp_title($title,$sep){
    global $page, $paged;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
        
        $title = "$title $sep " . sprintf( __( 'Page %s', 'carzine' ), max( $paged, $page ) );
        return $title;
}
add_filter( 'wp_title', 'carzine_wp_title', 10, 2 );
?>