<?php

/**
 * Enqueue scripts and styles.
 */
function wellbeing_hospital_scripts() {
    /*Wellbeing Hospital Styles */
    wp_enqueue_style('bootstrap',WELLBEING_HOSPITAL_CSS. 'bootstrap.min.css');
    wp_enqueue_style('owl',WELLBEING_HOSPITAL_CSS. 'owl.carousel.css');
    wp_enqueue_style('owl-theme',WELLBEING_HOSPITAL_CSS. 'owl.theme.css');
    wp_enqueue_style('wellbeing-hospital-banner',WELLBEING_HOSPITAL_CSS. 'banner.css');
    wp_enqueue_style('animate',WELLBEING_HOSPITAL_CSS. 'animate.css');
    wp_enqueue_style('fontello',WELLBEING_HOSPITAL_CSS. 'fontello.css'); 
    wp_enqueue_style('wellbeing-hospital-nav',WELLBEING_HOSPITAL_CSS. 'nav.css');    
    $wellbeing_hospital_font_args = array('family' => 'Cutive+Mono%7CPT+Serif:400,400i,700,700i%7CRoboto:300,300i,400,400i,500,500i,700,700i');
    wp_enqueue_style('wellbeing-hostpital-fonts', add_query_arg($wellbeing_hospital_font_args, "//fonts.googleapis.com/css"));
    wp_enqueue_style( 'wellbeing-hospital-style', get_stylesheet_uri() );
    wp_enqueue_style('wellbeing-hospital-responsive',WELLBEING_HOSPITAL_CSS. 'responsive.css');
    wp_enqueue_style('wellbeing-hospital-color',WELLBEING_HOSPITAL_CSS. 'color.css');

    /*Wellbeing Hospital Scripts */
    wp_enqueue_script( 'wellbeing-hospital-navigation', WELLBEING_HOSPITAL_JS . 'navigation.js', array(), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'wellbeing-hospital-skip-link-focus-fix', WELLBEING_HOSPITAL_JS. 'skip-link-focus-fix.js', array(), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'bootstrap', WELLBEING_HOSPITAL_JS . 'bootstrap.min.js', array('jquery'), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'bootstrap-slider', WELLBEING_HOSPITAL_JS . 'bootstrap-touch-slider.js', array('jquery'), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'popper', WELLBEING_HOSPITAL_JS . 'popper.min.js', array('jquery'), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'TouchSwipe', WELLBEING_HOSPITAL_JS . 'TouchSwipe.js', array('jquery'), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'owl-carousel', WELLBEING_HOSPITAL_JS . 'owl.carousel.min.js', array('jquery'), WELLBEING_HOSPITAL_VERSION, true );
    wp_enqueue_script( 'wellbeing-hospital-custom', WELLBEING_HOSPITAL_JS . 'custom.js', array('jquery'), WELLBEING_HOSPITAL_VERSION, true );


    /* Localize Function */

    $wellbeing_hospital_js_params = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ), 
    );
    wp_localize_script( 'wellbeing-hospital-custom', 'wellbeing_hospital_params', $wellbeing_hospital_js_params );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'wellbeing_hospital_scripts' );



