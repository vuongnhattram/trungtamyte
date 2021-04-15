<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Wellbeing Hospital
 */

get_header();
?>

<section class="section page-single">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
				<section class="error-404 not-found text-center">
					<header class="page-header">
						<h1><span class="error-text"><?php esc_html_e('404','wellbeing-hospital'); ?></span>
							<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wellbeing-hospital' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wellbeing-hospital' ); ?></p>

						<?php
						get_search_form();
						?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</div>
	</div>
</section>				


<?php
get_footer();
