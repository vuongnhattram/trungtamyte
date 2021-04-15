<?php

if( ! defined( 'ABSPATH' ) ) {
	exit; 	// exit if accessed directly
}

add_action( 'tgmpa_register', 'wellbeing_hospital_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */

function wellbeing_hospital_register_required_plugins() {	

	$plugins = array(
		
		// Contact form 7
		array(
			'name'      => esc_html__( 'Contact Form 7', 'wellbeing-hospital' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),	


		// Contact form 7
		array(
			'name'      => esc_html__( 'Thememiles Toolset', 'wellbeing-hospital' ),
			'slug'      => 'thememiles-toolset',
			'required'  => false,
		),	

	);

	// Settings for plugin installation screen
	$config = array(
		'id'           => 'tgmpa-wellbeing',
		'default_path' => '',
		'menu'         => 'wellbeing-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',		
	);

	tgmpa( $plugins, $config );

}

/* PHP Closing tag is omitted */