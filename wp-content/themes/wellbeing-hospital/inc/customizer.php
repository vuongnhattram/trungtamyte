<?php
/**
 * Wellbeing Hospital Theme Customizer
 *
 * @package Wellbeing Hospital
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wellbeing_hospital_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'wellbeing_hospital_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'wellbeing_hospital_customize_partial_blogdescription',
		) );
	}

    /**
     * Add General Settings panel
     */

    $wp_customize->add_panel( 'general_settings', array(
        'priority'         =>    1,
        'capability'       =>    'edit_theme_options',
        'theme_supports'   =>    '',
        'title'            =>    esc_html__( 'General Settings', 'wellbeing-hospital' ),
        'description'      =>    esc_html__( 'This allows to edit general theme settings', 'wellbeing-hospital' ),
    ));

    $wp_customize->get_section('title_tagline')->panel = 'general_settings';
    $wp_customize->remove_section('header_image');
    $wp_customize->get_section('background_image')->panel = 'general_settings';
    $wp_customize->get_section('static_front_page')->panel = 'general_settings';
    $wp_customize->get_section('colors')->panel = 'general_settings'; 
    $wp_customize->get_control('background_color')->section = 'background_image';
}
add_action( 'customize_register', 'wellbeing_hospital_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function wellbeing_hospital_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function wellbeing_hospital_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wellbeing_hospital_customize_preview_js() {
	wp_enqueue_script( 'wellbeing-hospital-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'wellbeing_hospital_customize_preview_js' );
