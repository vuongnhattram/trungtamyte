<?php
/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class wellbeing_hospital_initialise_customizer_settings {
	// Get our default values
	private $defaults;

	public function __construct() {
		// Get our Customizer defaults
		$this->defaults = wellbeing_hospital_generate_defaults();

		// Register our Panels
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_add_customizer_panels' ) );

		// Register our sections
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_add_customizer_sections' ) );

		// Register Breadcrumb Section controls
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_breadcrumb_controls' ) );

		// Register Header Section controls
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_social_controls' ) );

		// Register Homepage Section controls
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_homepage_section_controls' ) );

		// Register Archive Section controls
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_archive_controls' ) );
		
		// Register Post/Page Section controls
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_post_controls' ) );

		// Register Footer Section controls
		add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_footer_controls' ) );

		// Register our sample Custom Control controls
		//add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_sample_custom_controls' ) );

		// Register our sample default controls
		//add_action( 'customize_register', array( $this, 'wellbeing_hospital_register_sample_default_controls' ) );

	}

	/**
	 * Register the Customizer panels
	 */
	public function wellbeing_hospital_add_customizer_panels( $wp_customize ) {

        /* Header Settings */
		$wp_customize->add_panel( 'header_settings_panel',
		 	array(
				'title' => __( 'Header Settings', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Adjust your Header section.', 'wellbeing-hospital' ),
				'priority' => 2
			)
		);

        /* Header Settings */
		$wp_customize->add_panel( 'homepage_settings_panel',
		 	array(
				'title' => __( 'Homepage Settings', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure your Homepage sections.', 'wellbeing-hospital' ),
				'priority' => 3
			)
		);

	}

	/**
	 * Register the Customizer sections
	 */
	public function wellbeing_hospital_add_customizer_sections( $wp_customize ) {

		/**
		 * Breadcrumb Section
		 */
		$wp_customize->add_section( 'breadcrumb_section',
			array(
				'title' => __( 'Breadcrumb Settings', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Breadcrumb Area', 'wellbeing-hospital'  ),
				'panel' => 'general_settings'
			)
		);

		/**
		 * Add our Social Icons Section
		 */
		$wp_customize->add_section( 'social_icons_section',
			array(
				'title' => __( 'Social Icons', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Add your social media links and we\'ll automatically match them with the appropriate icons. Drag and drop the URLs to rearrange their order.', 'wellbeing-hospital' ),
				'panel' => 'header_settings_panel'
			)
		);

		/**
		 * Add our Contact Section
		 */
		$wp_customize->add_section( 'contact_section',
			array(
				'title' => __( 'Contact', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Add your phone number to the site header bar.', 'wellbeing-hospital' ),
				'panel' => 'header_settings_panel'
			)
		);

		/**
		 * Add our Extra Button Section
		 */
		$wp_customize->add_section( 'extra_button_section',
			array(
				'title' => __( 'Extra Button', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Add extra button on menu bar.', 'wellbeing-hospital' ),
				'panel' => 'header_settings_panel'
			)
		);

		/**
		 * Add Slider Section
		 */
		$wp_customize->add_section( 'slider_section',
			array(
				'title' => __( 'Slider Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Slider Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Add Feature Section
		 */
		$wp_customize->add_section( 'feature_section',
			array(
				'title' => __( 'Feature Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Feature Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Add Welcome Section
		 */
		$wp_customize->add_section( 'welcome_section',
			array(
				'title' => __( 'Welcome Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Welcome Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Add Service Section
		 */
		$wp_customize->add_section( 'service_section',
			array(
				'title' => __( 'Service Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Service Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Add Contact Section
		 */
		$wp_customize->add_section( 'contactform_section',
			array(
				'title' => __( 'Contact Form Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Contact Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Add Testimonial Section
		 */
		$wp_customize->add_section( 'testimonial_section',
			array(
				'title' => __( 'Testimonial Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Testimonial Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Add Blog Section
		 */
		$wp_customize->add_section( 'blog_section',
			array(
				'title' => __( 'Blog Section', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Blog Section', 'wellbeing-hospital' ),
				'panel' => 'homepage_settings_panel'
			)
		);

		/**
		 * Single Page/Post Section
		 */
		$wp_customize->add_section( 'single_section',
			array(
				'title' => __( 'Post/Page Settings', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Post/Page Section', 'wellbeing-hospital'  )
			)
		);

		/**
		 * Archive Section
		 */
		$wp_customize->add_section( 'archive_section',
			array(
				'title' => __( 'Archive Settings', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Archive Section', 'wellbeing-hospital'  )
			)
		);

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section( 'footer_section',
			array(
				'title' => __( 'Footer Settings', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Configure Footer Section', 'wellbeing-hospital'  )
			)
		);

		$wp_customize->add_section( 'sample_custom_controls_section',
			array(
				'title' => __( 'Sample Custom Controls', 'wellbeing-hospital' ),
				'description' => esc_html__( 'These are an example of Customizer Custom Controls.', 'wellbeing-hospital'  )
			)
		);

		$wp_customize->add_section( 'default_controls_section',
			array(
				'title' => __( 'Default Controls', 'wellbeing-hospital' ),
				'description' => esc_html__( 'These are an example of the default Customizer Controls.', 'wellbeing-hospital'  )
			)
		);

	}

	/**
	 * Register Breadcrumb Settings controls
	 */
	function wellbeing_hospital_register_breadcrumb_controls( $wp_customize ){

		$wp_customize->add_setting( 'wellbeing_hospital_bread_enable',
			array(
				'default' => $this->defaults['wellbeing_hospital_bread_enable'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wellbeing_hospital_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Toggle_Switch_Custom_control( $wp_customize, 'wellbeing_hospital_bread_enable',
			array(
				'label' => __( 'Enable Breadcrumb', 'wellbeing-hospital' ),
				'section' => 'breadcrumb_section'
			)
		) );

		$wp_customize->add_setting( 'wellbeing_hospital_bread_banner',
			array(
				'default' => $this->defaults['wellbeing_hospital_bread_banner'],
				'transport' => 'refresh',
				'sanitize_callback' => 'esc_url'
			)
		);
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wellbeing_hospital_bread_banner',
			array(
				'label' => __( 'Breadcrumb Banner', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Upload Image of size 1900x400', 'wellbeing-hospital' ),
				'section' => 'breadcrumb_section',
			)
		) );	}

	/**
	 * Register Header Settings controls
	 */
	public function wellbeing_hospital_register_social_controls( $wp_customize ) {

		// Add our Checkbox switch setting and control for opening URLs in a new tab
		$wp_customize->add_setting( 'social_newtab',
			array(
				'default' => $this->defaults['social_newtab'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wellbeing_hospital_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Toggle_Switch_Custom_control( $wp_customize, 'social_newtab',
			array(
				'label' => __( 'Open in new browser tab', 'wellbeing-hospital' ),
				'section' => 'social_icons_section'
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'social_newtab',
			array(
				'selector' => '.social',
				'container_inclusive' => false,
				'render_callback' => function() {
					echo wellbeing_hospital_get_social_media();
				},
				'fallback_refresh' => true
			)
		);

		// Add our Sortable Repeater setting and Custom Control for Social media URLs
		$wp_customize->add_setting( 'social_urls',
			array(
				'default' => $this->defaults['social_urls'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wellbeing_hospital_url_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Sortable_Repeater_Custom_Control( $wp_customize, 'social_urls',
			array(
				'label' => __( 'Social URLs', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Add your social media links.', 'wellbeing-hospital' ),
				'section' => 'social_icons_section',
				'button_labels' => array(
					'add' => __( 'Add Icon', 'wellbeing-hospital' ),
				)
			)
		) );
		$wp_customize->selective_refresh->add_partial( 'social_urls',
			array(
				'selector' => '.social',
				'container_inclusive' => false,
				'render_callback' => function() {
					echo wellbeing_hospital_get_social_media();
				},
				'fallback_refresh' => true
			)
		);

		// Add our Single Accordion setting and Custom Control to list the available Social Media icons
		$socialIconsList = array(
			'Facebook' => __( '<i class="fa fa-facebook"></i>', 'wellbeing-hospital' ),
			'Instagram' => __( '<i class="fa fa-instagram"></i>', 'wellbeing-hospital' ),
			'LinkedIn' => __( '<i class="fa fa-linkedin"></i>', 'wellbeing-hospital' ),
			'Pinterest' => __( '<i class="fa fa-pinterest"></i>', 'wellbeing-hospital' ),
			'Google+' => __( '<i class="fa fa-google-plus"></i>', 'wellbeing-hospital' ),
			'Twitter' => __( '<i class="fa fa-twitter"></i>', 'wellbeing-hospital' ),
			'YouTube' => __( '<i class="fa fa-youtube"></i>', 'wellbeing-hospital'  ),
		);
		$wp_customize->add_setting( 'social_url_icons',
			array(
				'default' => $this->defaults['social_url_icons'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Single_Accordion_Custom_Control( $wp_customize, 'social_url_icons',
			array(
				'label' => __( 'View list of available icons', 'wellbeing-hospital' ),
				'description' => $socialIconsList,
				'section' => 'social_icons_section'
			)
		) );
		// Add our Text field setting and Control for displaying the phone number
		$wp_customize->add_setting( 'info_text',
			array(
				'default' => $this->defaults['info_text'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'info_text',
			array(
				'label' => __( 'Info Text', 'wellbeing-hospital' ),
				'type' => 'text',
				'section' => 'contact_section'
			)
		);
		$wp_customize->add_setting( 'contact_phone',
			array(
				'default' => $this->defaults['contact_phone'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_filter_nohtml_kses'
			)
		);
		$wp_customize->add_control( 'contact_phone',
			array(
				'label' => __( 'Display phone number', 'wellbeing-hospital' ),
				'type' => 'text',
				'section' => 'contact_section'
			)
		);
		$wp_customize->add_setting( 'contact_address',
			array(
				'default' => $this->defaults['contact_address'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wp_kses_post'
			)
		);
		$wp_customize->add_control( 'contact_address',
			array(
				'label' => __( 'Contact Address', 'wellbeing-hospital' ),
				'type' => 'textarea',
				'section' => 'contact_section'
			)
		);
		/* Extra Button */
		$wp_customize->add_setting( 'extra_button_text',
			array(
				'default' => $this->defaults['extra_button_text'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'extra_button_text',
			array(
				'label' => __( 'Button Text', 'wellbeing-hospital' ),
				'type' => 'text',
				'section' => 'extra_button_section'
			)
		);
		$wp_customize->add_setting( 'extra_button_url',
			array(
				'default' => $this->defaults['extra_button_url'],
				'transport' => 'refresh',
				'sanitize_callback' => 'esc_url'
			)
		);
		$wp_customize->add_control( 'extra_button_url',
			array(
				'label' => __( 'Button URL', 'wellbeing-hospital' ),
				'type' => 'text',
				'section' => 'extra_button_section'
			)
		);

	}

	/**
	 * Register Homepage Section controls
	 */
	public function wellbeing_hospital_register_homepage_section_controls( $wp_customize ) {
        
        /* Enable/Disable slider */
		$wp_customize->add_setting( 'slider_enable',
			array(
				'default' => $this->defaults['slider_enable'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Toggle_Switch_Custom_control( $wp_customize, 'slider_enable',
			array(
				'label' => __( 'Show/Hide Slider', 'wellbeing-hospital' ),
				'section' => 'slider_section'
			)
		) );

		/* Choose Slider Cat */
	    $wp_customize->add_setting('wellbeing_hospital_slider_cat',array(
	         'default' => 0,
	         'capability' => 'edit_theme_options',
	         'sanitize_callback' => 'absint',
	        )
	    );

	    $wp_customize->add_control( 'wellbeing_hospital_slider_cat',
	        array(
	             'label'  => esc_html__( 'Choose Category for slider ', 'wellbeing-hospital' ),
	             'description'=> esc_html__('Choose the category of posts for homepage slider','wellbeing-hospital'),
	             'section' => 'slider_section',
	             'type' => 'select',
	             'choices' => welbeing_list_categories()
	        )
	    );

		// Slider Per page
		$wp_customize->add_setting( 'slider_per_page',
			array(
				'default' => $this->defaults['slider_per_page'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_sanitize_integer'
			)
		);
		$wp_customize->add_control( 'slider_per_page',
			array(
				'label' => __( 'Slides to show', 'wellbeing-hospital' ),
				'description' => esc_html__( 'No. of slides to show', 'wellbeing-hospital' ),
				'section' => 'slider_section',
				'type' => 'number'
			)
		);

    // Slider Button text
		$wp_customize->add_setting( 'slider_button_text',
			array(
				'default' => '',
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'slider_button_text',
			array(
				'label' => __( 'Slides Button Text', 'wellbeing-hospital' ),
				'description' => esc_html__( 'Enter Button Text', 'wellbeing-hospital' ),
				'section' => 'slider_section',
				'type' => 'text'
			)
		);


		/* Features */
        /* Enable/Disable slider */
		$wp_customize->add_setting( 'feature_enable',
			array(
				'default' => $this->defaults['feature_enable'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Toggle_Switch_Custom_control( $wp_customize, 'feature_enable',
			array(
				'label' => __( 'Show/Hide Section', 'wellbeing-hospital' ),
				'section' => 'feature_section'
			)
		) );
		for($i=1; $i<=3; $i++){
		$wp_customize->add_setting( 'wellbeing_hospital_feature'.$i,
			array(
				'default' => '',
				'transport' => 'postMessage',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Simple_Notice_Custom_control( $wp_customize, 'wellbeing_hospital_feature'.$i,
			array(
				'label' => 'Feature'.$i,
				'section' => 'feature_section'
			)
		) );
		$wp_customize->add_setting( 'wellbeing_hospital_feature_section'.$i,
			array(
				'default' => $this->defaults['wellbeing_hospital_welcome_page'],
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_feature_section'.$i,
			array(
				'label' => __( 'Choose Feature Page', 'wellbeing-hospital' ),
				'section' => 'feature_section',
				'type' => 'dropdown-pages'
			)
		);

	    }

	    /* Welcome Section */
		$wp_customize->add_setting( 'wellbeing_hospital_welcome_title',
			array(
				'default' => $this->defaults['wellbeing_hospital_welcome_title'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_welcome_title',
			array(
				'label' => __( 'Section Title', 'wellbeing-hospital' ),
				'section' => 'welcome_section',
				'type' => 'text',
			)
		);
		$wp_customize->add_setting( 'wellbeing_hospital_welcome_page',
			array(
				'default' => $this->defaults['wellbeing_hospital_welcome_page'],
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_welcome_page',
			array(
				'label' => __( 'Choose Welcome Page', 'wellbeing-hospital' ),
				'section' => 'welcome_section',
				'type' => 'dropdown-pages'
			)
		);

		/* Service Section */
		$wp_customize->add_setting( 'wellbeing_hospital_service_title',
			array(
				'default' => $this->defaults['wellbeing_hospital_service_title'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_service_title',
			array(
				'label' => __( 'Section Title', 'wellbeing-hospital' ),
				'section' => 'service_section',
				'type' => 'text',
			)
		);
	    $wp_customize->add_setting('wellbeing_hospital_service_cat',array(
	         'default' => 0,
	         'capability' => 'edit_theme_options',
	         'sanitize_callback' => 'absint',
	        )
	    );

	    $wp_customize->add_control( 'wellbeing_hospital_service_cat',
	        array(
	             'label'  => esc_html__( 'Choose Category for Services ', 'wellbeing-hospital' ),
	             'section' => 'service_section',
	             'type' => 'select',
	             'choices' => welbeing_list_categories()
	        )
	    );

		// Service Per page
		$wp_customize->add_setting( 'service_per_page',
			array(
				'default' => $this->defaults['service_per_page'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_sanitize_integer'
			)
		);
		$wp_customize->add_control( 'service_per_page',
			array(
				'label' => __( 'No. of Services', 'wellbeing-hospital' ),
				'description' => esc_html__( 'No. of slides to show', 'wellbeing-hospital' ),
				'section' => 'service_section',
				'type' => 'number'
			)
		);

		/* Contact Section */

		$wp_customize->add_setting( 'wellbeing_hospital_contact_subtitle',
			array(
				'default' => $this->defaults['wellbeing_hospital_contact_subtitle'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_contact_subtitle',
			array(
				'label' => __( 'Subtitle', 'wellbeing-hospital' ),
				'section' => 'contactform_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting( 'wellbeing_hospital_contact_page',
			array(
				'default' => $this->defaults['wellbeing_hospital_welcome_page'],
				'transport' => 'refresh',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_contact_page',
			array(
				'label' => __( 'Choose Contact Page', 'wellbeing-hospital' ),
				'section' => 'contactform_section',
				'type' => 'dropdown-pages'
			)
		);
		/* Testimonial Section */
		$wp_customize->add_setting( 'wellbeing_hospital_testimonial_title',
			array(
				'default' => $this->defaults['wellbeing_hospital_testimonial_title'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_testimonial_title',
			array(
				'label' => __( 'Section Title', 'wellbeing-hospital' ),
				'section' => 'testimonial_section',
				'type' => 'text',
			)
		);
	    $wp_customize->add_setting('wellbeing_hospital_testimonial_cat',array(
	         'default' => 0,
	         'capability' => 'edit_theme_options',
	         'sanitize_callback' => 'absint',
	        )
	    );

	    $wp_customize->add_control( 'wellbeing_hospital_testimonial_cat',
	        array(
	             'label'  => esc_html__( 'Choose Category for Testimonials ', 'wellbeing-hospital' ),
	             'section' => 'testimonial_section',
	             'type' => 'select',
	             'choices' => welbeing_list_categories()
	        )
	    );
		/* Blog Section */
		$wp_customize->add_setting( 'wellbeing_hospital_blog_title',
			array(
				'default' => $this->defaults['wellbeing_hospital_blog_title'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_blog_title',
			array(
				'label' => __( 'Section Title', 'wellbeing-hospital' ),
				'section' => 'blog_section',
				'type' => 'text',
			)
		);
	    $wp_customize->add_setting('wellbeing_hospital_blog_cat',array(
	         'default' => 0,
	         'capability' => 'edit_theme_options',
	         'sanitize_callback' => 'absint',
	        )
	    );

	    $wp_customize->add_control( 'wellbeing_hospital_blog_cat',
	        array(
	             'label'  => esc_html__( 'Choose Category for Blog ', 'wellbeing-hospital' ),
	             'section' => 'blog_section',
	             'type' => 'select',
	             'choices' => welbeing_list_categories()
	        )
	    );
		$wp_customize->add_setting( 'blog_per_page',
			array(
				'default' => $this->defaults['blog_per_page'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_sanitize_integer'
			)
		);
		$wp_customize->add_control( 'blog_per_page',
			array(
				'label' => __( 'No, of Blog', 'wellbeing-hospital' ),
				'section' => 'blog_section',
				'type' => 'number'
			)
		);

	}

	/**
	 * Register Archive controls
	 */
	function wellbeing_hospital_register_archive_controls( $wp_customize ){

		$wp_customize->add_setting( 'wellbeing_hospital_archive_sidebar_layout',
			array(
				'default' => $this->defaults['wellbeing_hospital_archive_sidebar_layout'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_radio_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Image_Radio_Button_Custom_Control( $wp_customize, 'wellbeing_hospital_archive_sidebar_layout',
			array(
				'label' => __( 'Choose Sidebar Layouts', 'wellbeing-hospital' ),
				'section' => 'archive_section',
				'choices' => array(
					'leftsidebar' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/images/sidebar-left.png',
						'name' => __( 'Left Sidebar', 'wellbeing-hospital' )
					),
					'nosidebar' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/images/sidebar-none.png',
						'name' => __( 'No Sidebar', 'wellbeing-hospital' )
					),
					'rightsidebar' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/images/sidebar-right.png',
						'name' => __( 'Right Sidebar', 'wellbeing-hospital' )
					)
				)
			)
		) );
		$wp_customize->add_setting( 'wellbeing_hospital_readmore_text',
			array(
				'default' => $this->defaults['wellbeing_hospital_readmore_text'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_text_sanitization'
			)
		);
		$wp_customize->add_control( 'wellbeing_hospital_readmore_text',
			array(
				'label' => __( 'Read More Text', 'wellbeing-hospital' ),
				'section' => 'archive_section',
				'type' => 'text',
			)
		);
	}

	function wellbeing_hospital_register_post_controls( $wp_customize ){

		$wp_customize->add_setting( 'wellbeing_hospital_single_sidebar_layout',
			array(
				'default' => $this->defaults['wellbeing_hospital_single_sidebar_layout'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_radio_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Image_Radio_Button_Custom_Control( $wp_customize, 'wellbeing_hospital_single_sidebar_layout',
			array(
				'label' => __( 'Choose Sidebar Layouts', 'wellbeing-hospital' ),
				'section' => 'single_section',
				'choices' => array(
					'leftsidebar' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/images/sidebar-left.png',
						'name' => __( 'Left Sidebar', 'wellbeing-hospital' )
					),
					'nosidebar' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/images/sidebar-none.png',
						'name' => __( 'No Sidebar', 'wellbeing-hospital' )
					),
					'rightsidebar' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/images/sidebar-right.png',
						'name' => __( 'Right Sidebar', 'wellbeing-hospital' )
					)
				)
			)
		) );	
	}

	/**
	 * Register Footer controls
	 */
	function wellbeing_hospital_register_footer_controls( $wp_customize ){

		$wp_customize->add_setting( 'wellbeing_hospital_footer_copyright',
			array(
				'default' => $this->defaults['wellbeing_hospital_footer_copyright'],
				'transport' => 'postMessage',
				'sanitize_callback' => 'wp_kses_post'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_TinyMCE_Custom_control( $wp_customize, 'wellbeing_hospital_footer_copyright',
			array(
				'label' => __( 'Copyright Text', 'wellbeing-hospital' ),
				'section' => 'footer_section',
				'input_attrs' => array(
					'toolbar2' => '',
				)
			)
		) );
		$wp_customize->add_setting( 'wellbeing_hospital_footer_menu',
			array(
				'default' => $this->defaults['wellbeing_hospital_footer_menu'],
				'transport' => 'refresh',
				'sanitize_callback' => 'wellbeing_hospital_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Wellbeing_Hospital_Toggle_Switch_Custom_control( $wp_customize, 'wellbeing_hospital_footer_menu',
			array(
				'label' => __( 'Show/Hide Menu', 'wellbeing-hospital' ),
				'section' => 'footer_section'
			)
		) );
	}

}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';

/**
 * Initialise our Customizer settings
 */
$wellbeing_hospital_settings = new wellbeing_hospital_initialise_customizer_settings();
