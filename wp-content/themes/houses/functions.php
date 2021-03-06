<?php
/**
 * Houses functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Houses
 */

if ( ! function_exists( 'houses_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function houses_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Houses, use a find and replace
		 * to change 'houses' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'houses', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'houses' ),
            'header' => esc_html__( 'Header menu', 'houses' ),
            'footer-menu' => esc_html__( 'Footer menu', 'houses' ),
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
		add_theme_support( 'custom-background', apply_filters( 'houses_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'houses_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function houses_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'houses_content_width', 640 );
}
add_action( 'after_setup_theme', 'houses_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function houses_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'houses' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'houses' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'houses_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function houses_scripts() {
	wp_enqueue_style( 'houses-style', get_stylesheet_uri() );
    // font awesome
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    wp_enqueue_style('font-awesome-style', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css');
    // fonts
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic" rel="stylesheet"');
    // main css
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');

	wp_enqueue_script( 'houses-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'houses-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'houses_scripts' );

function jquery_init() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'jquery_init');

function add_my_scripts() {
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js');
}
add_action('wp_enqueue_scripts', 'add_my_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// for my Query
function my_pre_get_posts( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', 5 );
    }
}
add_action( 'pre_get_posts', 'my_pre_get_posts' );

/* Delete H2 with navigation */
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    return '
 <nav class="%1$s" role="navigation">
  <div class="nav-links">%3$s</div>
 </nav>    
 ';
}



function add_custom_child_script() {
    wp_enqueue_script( 'ajax_events', get_stylesheet_directory_uri().( '/js/ajax_events.js' ), array( 'jquery'
    ));
    wp_localize_script( 'ajax_events', 'ajaxevents', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ));

}
add_action( 'wp_enqueue_scripts', 'add_custom_child_script' );



/* Ajax load more events */
//

function true_load_posts(){

    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    // обычно лучше использовать WP_Query, но не здесь
    query_posts( $args );
    // если посты есть
    if( have_posts() ) :

        // запускаем цикл
        while( have_posts() ): the_post();

            get_template_part('template-parts/blog/content', 'blog-page');

        endwhile;

    endif;
    die();
}
// счетчик просмотров
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
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


