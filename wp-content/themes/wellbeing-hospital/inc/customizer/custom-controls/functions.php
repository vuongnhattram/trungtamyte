<?php

/**
 * Enqueue scripts and styles.
 * Our sample Social Icons are using Font Awesome to display the icons so we need to include the FA CSS
 *
 * @return void
 */
if ( ! function_exists( 'wellbeing_hospital_scripts_styles' ) ) {
	function wellbeing_hospital_scripts_styles() {
		// Register and enqueue our icon font
		// We're using the awesome Font Awesome icon font. http://fortawesome.github.io/Font-Awesome
		wp_register_style( 'fontawesome', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/css/font-awesome.min.css' , array(), '4.7', 'all' );
		wp_enqueue_style( 'fontawesome' );
	}
}
add_action( 'wp_enqueue_scripts', 'wellbeing_hospital_scripts_styles' );

/**
 * Enqueue scripts for our Customizer preview
 *
 * @return void
 */
if ( ! function_exists( 'wellbeing_hospital_customizer_preview_scripts' ) ) {
	function wellbeing_hospital_customizer_preview_scripts() {
		wp_enqueue_script( 'wellbeing-hospital-customizer-preview', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/custom-controls/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
	}
}
add_action( 'customize_preview_init', 'wellbeing_hospital_customizer_preview_scripts' );

/**
 * Check if WooCommerce is active
 * Use in the active_callback when adding the WooCommerce Section to test if WooCommerce is activated
 *
 * @return boolean
 */
function wellbeing_hospital_is_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	}
	return false;
}

/**
 * Set our Social Icons URLs.
 * Only needed for our sample customizer preview refresh
 *
 * @return array Multidimensional array containing social media data
 */
if ( ! function_exists( 'wellbeing_hospital_generate_social_urls' ) ) {
	function wellbeing_hospital_generate_social_urls() {
		$social_icons = array(
			array( 'url' => 'behance.net', 'icon' => 'fa-behance', 'title' => esc_html__( 'Follow me on Behance', 'wellbeing-hospital' ), 'class' => 'behance' ),
			array( 'url' => 'bitbucket.org', 'icon' => 'fa-bitbucket', 'title' => esc_html__( 'Fork me on Bitbucket', 'wellbeing-hospital' ), 'class' => 'bitbucket' ),
			array( 'url' => 'codepen.io', 'icon' => 'fa-codepen', 'title' => esc_html__( 'Follow me on CodePen', 'wellbeing-hospital' ), 'class' => 'codepen' ),
			array( 'url' => 'deviantart.com', 'icon' => 'fa-deviantart', 'title' => esc_html__( 'Watch me on DeviantArt', 'wellbeing-hospital' ), 'class' => 'deviantart' ),
			array( 'url' => 'dribbble.com', 'icon' => 'fa-dribbble', 'title' => esc_html__( 'Follow me on Dribbble', 'wellbeing-hospital' ), 'class' => 'dribbble' ),
			array( 'url' => 'etsy.com', 'icon' => 'fa-etsy', 'title' => esc_html__( 'favourite me on Etsy', 'wellbeing-hospital' ), 'class' => 'etsy' ),
			array( 'url' => 'facebook.com', 'icon' => 'fa-facebook', 'title' => esc_html__( 'Like me on Facebook', 'wellbeing-hospital' ), 'class' => 'facebook' ),
			array( 'url' => 'flickr.com', 'icon' => 'fa-flickr', 'title' => esc_html__( 'Connect with me on Flickr', 'wellbeing-hospital' ), 'class' => 'flickr' ),
			array( 'url' => 'foursquare.com', 'icon' => 'fa-foursquare', 'title' => esc_html__( 'Follow me on Foursquare', 'wellbeing-hospital' ), 'class' => 'foursquare' ),
			array( 'url' => 'github.com', 'icon' => 'fa-github', 'title' => esc_html__( 'Fork me on GitHub', 'wellbeing-hospital' ), 'class' => 'github' ),
			array( 'url' => 'instagram.com', 'icon' => 'fa-instagram', 'title' => esc_html__( 'Follow me on Instagram', 'wellbeing-hospital' ), 'class' => 'instagram' ),
			array( 'url' => 'last.fm', 'icon' => 'fa-lastfm', 'title' => esc_html__( 'Follow me on Last.fm', 'wellbeing-hospital' ), 'class' => 'lastfm' ),
			array( 'url' => 'linkedin.com', 'icon' => 'fa-linkedin', 'title' => esc_html__( 'Connect with me on LinkedIn', 'wellbeing-hospital' ), 'class' => 'linkedin' ),
			array( 'url' => 'medium.com', 'icon' => 'fa-medium', 'title' => esc_html__( 'Folllow me on Medium', 'wellbeing-hospital' ), 'class' => 'medium' ),
			array( 'url' => 'pinterest.com', 'icon' => 'fa-pinterest', 'title' => esc_html__( 'Follow me on Pinterest', 'wellbeing-hospital' ), 'class' => 'pinterest' ),
			array( 'url' => 'plus.google.com', 'icon' => 'fa-google-plus', 'title' => esc_html__( 'Connect with me on Google+', 'wellbeing-hospital' ), 'class' => 'googleplus' ),
			array( 'url' => 'reddit.com', 'icon' => 'fa-reddit', 'title' => esc_html__( 'Join me on Reddit', 'wellbeing-hospital' ), 'class' => 'reddit' ),
			array( 'url' => 'slack.com', 'icon' => 'fa-slack', 'title' => esc_html__( 'Join me on Slack', 'wellbeing-hospital' ), 'class' => 'slack.' ),
			array( 'url' => 'slideshare.net', 'icon' => 'fa-slideshare', 'title' => esc_html__( 'Follow me on SlideShare', 'wellbeing-hospital' ), 'class' => 'slideshare' ),
			array( 'url' => 'snapchat.com', 'icon' => 'fa-snapchat', 'title' => esc_html__( 'Add me on Snapchat', 'wellbeing-hospital' ), 'class' => 'snapchat' ),
			array( 'url' => 'soundcloud.com', 'icon' => 'fa-soundcloud', 'title' => esc_html__( 'Follow me on SoundCloud', 'wellbeing-hospital' ), 'class' => 'soundcloud' ),
			array( 'url' => 'spotify.com', 'icon' => 'fa-spotify', 'title' => esc_html__( 'Follow me on Spotify', 'wellbeing-hospital' ), 'class' => 'spotify' ),
			array( 'url' => 'stackoverflow.com', 'icon' => 'fa-stack-overflow', 'title' => esc_html__( 'Join me on Stack Overflow', 'wellbeing-hospital' ), 'class' => 'stackoverflow' ),
			array( 'url' => 'tumblr.com', 'icon' => 'fa-tumblr', 'title' => esc_html__( 'Follow me on Tumblr', 'wellbeing-hospital' ), 'class' => 'tumblr' ),
			array( 'url' => 'twitch.tv', 'icon' => 'fa-twitch', 'title' => esc_html__( 'Follow me on Twitch', 'wellbeing-hospital' ), 'class' => 'twitch' ),
			array( 'url' => 'twitter.com', 'icon' => 'fa-twitter', 'title' => esc_html__( 'Follow me on Twitter', 'wellbeing-hospital' ), 'class' => 'twitter' ),
			array( 'url' => 'vimeo.com', 'icon' => 'fa-vimeo', 'title' => esc_html__( 'Follow me on Vimeo', 'wellbeing-hospital' ), 'class' => 'vimeo' ),
			array( 'url' => 'youtube.com', 'icon' => 'fa-youtube', 'title' => esc_html__( 'Subscribe to me on YouTube', 'wellbeing-hospital' ), 'class' => 'youtube' ),
		);

		return apply_filters( 'wellbeing_hospital_social_icons', $social_icons );
	}
}

/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Customizer Sortable Repeater
 * This is a sample function to display some social icons on your site.
 * This sample function is also used to show how you can call a PHP function to refresh the customizer preview.
 * Add the following to header.php if you want to see the sample social icons displayed in the customizer preview and your theme.
 * Before any social icons display, you'll also need to add the relevent URL's to the Header Navigation > Social Icons section in the Customizer.
 * <div class="social">
 *	 <?php echo wellbeing_hospital_get_social_media(); ?>
 * </div>
 *
 * @return string Unordered list of linked social media icons
 */
if ( ! function_exists( 'wellbeing_hospital_get_social_media' ) ) {
	function wellbeing_hospital_get_social_media() {
		$defaults = wellbeing_hospital_generate_defaults();
		$output = '';
		$social_icons = wellbeing_hospital_generate_social_urls();
		$social_urls = [];
		$social_newtab = 0;
		$social_alignment = '';
		$contact_phone = '';

		$social_urls = explode( ',', get_theme_mod( 'social_urls', $defaults['social_urls'] ) );
		$social_newtab = get_theme_mod( 'social_newtab', $defaults['social_newtab'] );

		foreach( $social_urls as $key => $value ) {
			if ( !empty( $value ) ) {
				$domain = str_ireplace( 'www.', '', parse_url( $value, PHP_URL_HOST ) );
				$index = array_search( $domain, array_column( $social_icons, 'url' ) );
				if( false !== $index ) {
					$output .= sprintf( '<li class="%1$s"><a href="%2$s" title="%3$s"%4$s><i class="fa %5$s"></i></a></li>',
						$social_icons[$index]['class'],
						esc_url( $value ),
						$social_icons[$index]['title'],
						( !$social_newtab ? '' : ' target="_blank"' ),
						$social_icons[$index]['icon']
					);
				}
				else {
					$output .= sprintf( '<li class="nosocial"><a href="%2$s"%3$s><i class="fa %4$s"></i></a></li>',
						$social_icons[$index]['class'],
						esc_url( $value ),
						( !$social_newtab ? '' : ' target="_blank"' ),
						'fa-globe'
					);
				}
			}
		}

		if ( !empty( $output ) ) {
			$output = '<ul class="sociallink">' . $output . '</ul>';
		}

		return $output;
	}
}


/*
* List all Categories
 */
function welbeing_list_categories(){

	$wellbeing_hospital_args = array(
	 'type'                     => 'post',
	 'orderby'                  => 'name',
	 'taxonomy'                 => 'category'
	);
	$wellbeing_hospital_option_categories = array();
	$wellbeing_hospital_category_lists = get_categories( $wellbeing_hospital_args );
	foreach( $wellbeing_hospital_category_lists as $wellbeing_hospital_category ){
	  $wellbeing_hospital_option_categories[$wellbeing_hospital_category->term_id] = $wellbeing_hospital_category->name;
	}
	return $wellbeing_hospital_option_categories;
}

/**
* Set our Customizer default options
*/
if ( ! function_exists( 'wellbeing_hospital_generate_defaults' ) ) {
	function wellbeing_hospital_generate_defaults() {
		$customizer_defaults = array(
			'social_newtab' => 0,
			'social_urls' => '',
			'social_url_icons' => '',
			'info_text' => '',
			'contact_phone' => '',
			'contact_address' => '',
			'extra_button_text' => '',
			'extra_button_url' => '',
			'slider_enable' => 1,
			'slider_per_page' => 5,
			'feature_enable' => 1,
			'wellbeing_hospital_welcome_title' => '',
			'wellbeing_hospital_welcome_page' => '',
			'wellbeing_hospital_service_title' => '',
			'wellbeing_hospital_service_cat' => '',
			'service_per_page' => 6,
			'wellbeing_hospital_contact_subtitle' => '',
			'wellbeing_hospital_testimonial_title' => '',
			'wellbeing_hospital_testimonial_cat' => '',
			'wellbeing_hospital_blog_title' => '',
			'wellbeing_hospital_blog_cat' => '',
			'blog_per_page' => 3,
			'wellbeing_hospital_footer_copyright' => '',
			'wellbeing_hospital_footer_menu' => 1,
			'wellbeing_hospital_bread_enable' => 1,
			'wellbeing_hospital_bread_banner' => '',
			'wellbeing_hospital_archive_sidebar_layout' => 'leftsidebar',
			'wellbeing_hospital_readmore_text' => 'Read More',
			'wellbeing_hospital_excerpt_length' => 20,
			'exclude_cat_blog' => array(),
			'wellbeing_hospital_single_sidebar_layout' => 'leftsidebar'


		);

		return apply_filters( 'wellbeing_hospital_customizer_defaults', $customizer_defaults );
	}
}

/**
* Load all our Customizer options
*/
include_once trailingslashit( dirname(__FILE__) ) . 'inc/customizer.php';
