<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PT_Magazine
 */

?>
<?php
	/**
	 * Hook - pt_magazine_doctype.
	 *
	 * @hooked pt_magazine_doctype_action - 10
	 */
	do_action( 'pt_magazine_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - pt_magazine_head.
	 *
	 * @hooked pt_magazine_head_action - 10
	 */
	do_action( 'pt_magazine_head' );

	wp_head(); ?>
</head>
<?php
if ( is_active_sidebar( 'custom-header-widget' ) ) : ?>
    <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'custom-header-widget' ); ?>
    </div>
<?php endif; ?>
<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){
	wp_body_open();
} ?>
	<div id="page" class="site">
		<?php
		/**
		* Hook - winsone_before_header.
		*
		* @hooked pt_magazine_before_header_action - 10
		*/
		do_action( 'pt_magazine_before_header' );

		/**
		* Hook - pt_magazine_header.
		*
		* @hooked pt_magazine_header_action - 10
		*/
		do_action( 'pt_magazine_header' );

		/**
		* Hook - pt_magazine_after_header.
		*
		* @hooked pt_magazine_after_header_action - 10
		*/
		do_action( 'pt_magazine_after_header' );

		/**
		* Hook - pt_magazine_main_content.
		*
		* @hooked pt_magazine_main_content_for_slider - 5
		* @hooked pt_magazine_main_content_for_breadcrumb - 7
		* @hooked pt_magazine_main_content_for_home_widgets - 9
		*/
		do_action( 'pt_magazine_main_content' );

		/**
		* Hook - pt_magazine_before_content.
		*
		* @hooked pt_magazine_before_content_action - 10
		*/
		do_action( 'pt_magazine_before_content' );