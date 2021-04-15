<?php
/**
 * Wellbeing Hospital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wellbeing Hospital
 */

if ( ! function_exists( 'wellbeing_hospital_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wellbeing_hospital_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wellbeing Hospital, use a find and replace
		 * to change 'wellbeing-hospital' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wellbeing-hospital', get_template_directory() . '/languages' );

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
		add_image_size( 'wellbeing-slider-image', 1600, 750, true );
		add_image_size( 'wellbeing-blog-image', 350, 240, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'wellbeing-hospital' ),
			'footer' => esc_html__( 'Footer', 'wellbeing-hospital' ),
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
		add_theme_support( 'custom-background', apply_filters( 'wellbeing_hospital_custom_background_args', array(
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
add_action( 'after_setup_theme', 'wellbeing_hospital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wellbeing_hospital_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wellbeing_hospital_content_width', 640 );
}
add_action( 'after_setup_theme', 'wellbeing_hospital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wellbeing_hospital_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'wellbeing-hospital' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'wellbeing-hospital' ),
		'before_widget' => '<div id="%1$s" class="aside-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="titletext">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'wellbeing-hospital' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'wellbeing-hospital' ),
		'before_widget' => '<div id="%1$s" class="aside-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="titletext">',
		'after_title'   => '</h3>',
	) );

    $footer_widget_regions = 3;
    for ( $i = 1; $i <= intval( $footer_widget_regions ); $i++ ) {
        register_sidebar(array(
            'id'            =>      sprintf( 'footer-%d', $i ),
            'name'          =>      sprintf( __( 'Footer Widget Area %d', 'wellbeing-hospital' ), $i ),
            'description'   =>      esc_html__( 'This is a Footer Sidebar Area.', 'wellbeing-hospital' ),
            'before_widget' =>      '<div id="%1$s" class="footer-widget %2$s ">',
            'after_widget'  =>      '</div>',
            'before_title'  =>      '<h4>',
            'after_title'   =>      '</h4>'
        ));  
    }
}
add_action( 'widgets_init', 'wellbeing_hospital_widgets_init' );

/* Require theme files*/
$file_paths = array(
	'/inc/core/enqueue.php',
	'/inc/core/constants.php',
    '/inc/core/wellbeing-functions.php',
	'/inc/custom-header.php',
	'/inc/template-tags.php',
	'/inc/template-functions.php',
	'/inc/customizer.php',
	'/inc/customizer/custom-controls/functions.php',
    '/inc/core/tgm-plugin-activation.php',
    '/inc/core/plugins-config.php',
    '/inc/customizer-pro/class-customize.php',




);

foreach ($file_paths as $file_path) {
	require get_parent_theme_file_path() . $file_path;
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

