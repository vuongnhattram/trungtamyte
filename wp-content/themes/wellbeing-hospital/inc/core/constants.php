<?php
/**
 * Wellbeing Hospital Constants definition file
 *
 * @package  Wellbeing Hospital
 */
// get theme data
$theme = wp_get_theme();

// theme core directory path & uri
$dir = get_template_directory();
$uri = get_template_directory_uri();

/**
 * Theme constants
 */
define( 'WELLBEING_HOSPITAL_THEME', $theme->get( 'Name' ) );
define( 'WELLBEING_HOSPITAL_VERSION', $theme->get( 'Version' ) );

/**
 * Template directory & uri
 */
define( 'WELLBEING_HOSPITAL_DIR', wp_normalize_path( $dir ) );
define( 'WELLBEING_HOSPITAL_URI', trailingslashit( $uri ) );

/**
 * Theme assets URI & DIR
 */
define( 'WELLBEING_HOSPITAL_ASSETS', WELLBEING_HOSPITAL_DIR . '/assets/' );
define( 'WELLBEING_HOSPITAL_ASSETS_URI', WELLBEING_HOSPITAL_URI . 'assets/' );
define( 'WELLBEING_HOSPITAL_CSS', WELLBEING_HOSPITAL_ASSETS_URI . 'css/' );
define( 'WELLBEING_HOSPITAL_JS', WELLBEING_HOSPITAL_ASSETS_URI . 'js/' );
define( 'WELLBEING_HOSPITAL_IMAGES', WELLBEING_HOSPITAL_ASSETS_URI . 'images/' );


/* PHP Closing tag is omitted */