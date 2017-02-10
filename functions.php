<?php
/**
 * punchtheme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package punchtheme
 */


 /** Author dropdown **/

 !defined( 'ABSPATH' ) and exit;
 add_filter( 'default_hidden_meta_boxes', 'add_author_dropdown', 20, 1 );

 function add_author_dropdown ( $hidden )
 {
     foreach ( $hidden as $i => $metabox )
     {
         if ( 'authordiv' == $metabox )
         {
             unset ( $hidden[$i] );
         }
     }
     return $hidden;
 }








 /**
  * most read.
  */
 function wpb_set_post_views($postID) {
     $count_key = 'wpb_post_views_count';
     $count = get_post_meta($postID, $count_key, true);
     if($count==''){
         $count = 0;
         delete_post_meta($postID, $count_key);
         add_post_meta($postID, $count_key, '0');
     }else{
         $count++;
         update_post_meta($postID, $count_key, $count);
     }
 }
 //To keep the count accurate, lets get rid of prefetching
 remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


 function wpb_get_post_views($postID){
     $count_key = 'wpb_post_views_count';
     $count = get_post_meta($postID, $count_key, true);
     if($count==''){
         delete_post_meta($postID, $count_key);
         add_post_meta($postID, $count_key, '0');
         return "0 View";
     }
     return $count.' Views';
 }




 /**
  * Register get_excerpt.
  */
 function get_excerpt(){
 $excerpt = get_the_content();
 $excerpt = preg_replace(" ([.*?])",'',$excerpt);
 $excerpt = strip_shortcodes($excerpt);
 $excerpt = strip_tags($excerpt);
 $excerpt = substr($excerpt, 0, 150);
 $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
 $excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
 $excerpt = $excerpt.'...';
 return $excerpt;
 }



 /**
  * Register meta box(es).
  */
  /* Meta box setup function. */

  function add_post_reference() {
    add_meta_box('post-reference', 'Post Video', 'referenceCallBack', 'post');
  }
  add_action('add_meta_boxes', 'add_post_reference');

  function referenceCallBack($post) {
    wp_nonce_field( 'reference_meta_box', 'reference_nonce' );

    $name_value = get_post_meta( $post->ID, '_post_reference_name', true );
    $link_value = get_post_meta( $post->ID, '_post_reference_link', true );

    echo '<label for="reference-name">'. 'YouTube video ID' .'</label>';
    echo '<input type="text" id="reference-name" name="post_reference_name" placeholder="YouTube video ID" value="'.$name_value.'" size="25"/>';
    echo '<p class="howto">'. 'Add the id of the youtube video' .'</p>';

    echo '<label for="reference-link" style="display: none">'. 'Reference Link' .'</label>';
    echo '<input type="text" style="display: none" id="reference-link" name="post_reference_link" placeholder="http://www.example.com/" value="'.$link_value.'" size="25"/>';
    echo '<p class="howto" style="display: none">'. 'Add the link of the reference' .'</p>';
  }


  function save_post_reference( $post_id ) {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
    }

    if ( ! isset( $_POST['reference_nonce'] ) ) {
      return;
    }
    if ( ! wp_verify_nonce( $_POST['reference_nonce'], 'reference_meta_box' ) ) {
      return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
    }

    if ( ! isset( $_POST['post_reference_name'] ) || ! isset( $_POST['post_reference_link'] ) ) {
      return;
    }

    $reference_name = sanitize_text_field( $_POST['post_reference_name'] );
    $reference_link = sanitize_text_field( $_POST['post_reference_link'] );

    update_post_meta( $post_id, '_post_reference_name', $reference_name );
    update_post_meta( $post_id, '_post_reference_link', $reference_link );
  }
  add_action( 'save_post', 'save_post_reference' );














 /* Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array(
  'image',
  'video',
  'gallery',
) );


 /**
  * Register our sidebars and widgetized areas.
  *
  */
 function arphabet_widgets_init() {


   register_sidebar( array(
  		'name'          => 'Post Sidebar',
  		'id'            => 'post_sidebar',
  		'before_widget' => '<div>',
  		'after_widget'  => '</div>',
  		'before_title'  => '<div class="title-header" style="display: none;">',
  		'after_title'   => '</div>',
  	) );

  register_sidebar( array(
 		'name'          => 'Header Advert Desktop',
 		'id'            => 'header_advert_desk',
 		'before_widget' => '<div>',
 		'after_widget'  => '</div>',
 		'before_title'  => '<div class="title-header" style="display: none;">',
 		'after_title'   => '</div>',
 	) );

  register_sidebar( array(
 		'name'          => 'Header Advert Tablet',
 		'id'            => 'header_advert_tab',
 		'before_widget' => '<div>',
 		'after_widget'  => '</div>',
 		'before_title'  => '<div class="title-header" style="display: none;">',
 		'after_title'   => '</div>',
 	) );

  register_sidebar( array(
    'name'          => 'Header Advert Tablet Portrait',
    'id'            => 'header_advert_tab2',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="title-header" style="display: none;">',
    'after_title'   => '</div>',
  ) );

  register_sidebar( array(
 		'name'          => 'Header Advert Mobile',
 		'id'            => 'header_advert_mobile',
 		'before_widget' => '<div>',
 		'after_widget'  => '</div>',
 		'before_title'  => '<div class="title-header" style="display: none;">',
 		'after_title'   => '</div>',
 	) );


  register_sidebar( array(
 		'name'          => 'Home Sidebar',
 		'id'            => 'home_sidebar',
 		'before_widget' => '<div>',
 		'after_widget'  => '</div>',
 		'before_title'  => '<div class="title-header">',
 		'after_title'   => '</div>',
 	) );



 }
 add_action( 'widgets_init', 'arphabet_widgets_init' );



if ( ! function_exists( 'punchtheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


 if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
 function my_jquery_enqueue() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
 }


 if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
     //set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

     // additional image sizes
     // delete the next line if you do not need additional image sizes
     add_image_size( 'blurry', 30, 9999 ); //300 pixels wide (and unlimited height)
 }

function punchtheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on punchtheme, use a find and replace
	 * to change 'punchtheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'punchtheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'punchtheme' ),
    'section' => esc_html__( 'Section', 'punchtheme' ),
    'Footer' => esc_html__( 'Footer', 'punchtheme' ),
	) );




	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'punchtheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'punchtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function punchtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'punchtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'punchtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function punchtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'punchtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'punchtheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'punchtheme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function punchtheme_scripts() {
	wp_enqueue_style( 'punchtheme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'punchtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'punchtheme-modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '20151215', false );
	wp_enqueue_script( 'punchtheme-section', get_template_directory_uri() . '/js/section-nav.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'punchtheme-blazy', get_template_directory_uri() . '/js/blazy.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'punchtheme-plyr', get_template_directory_uri() . '/js/plyr.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'punchtheme-demo', get_template_directory_uri() . '/js/demo.js', '20151215', true );
	wp_enqueue_script( 'punchtheme-shr', get_template_directory_uri() . '/js/shr.js', '20151215', true );
	wp_enqueue_script( 'punchtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'punchtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


require get_template_directory() . '/inc/punch-widget.php';
