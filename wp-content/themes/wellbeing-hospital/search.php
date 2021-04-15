<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Wellbeing Hospital
 */

get_header();
$sidebar = get_theme_mod('wellbeing_hospital_archive_sidebar_layout','rightsidebar');
if($sidebar != 'nosidebar'){
	$class = 'col-12 col-sm-12 col-md-8 col-lg-8';
}else{
	$class = 'col-12 col-sm-12 col-md-12 col-lg-12';
}
?>

<section class="section search-reasult <?php echo esc_attr($sidebar);?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($class);?>">
            	<div class="row">
				<?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'archive' );

					endwhile;

					the_posts_pagination( array(
		              'prev_text' => '<i class="fa fa-chevron-left"></i>',
		              'next_text'  => '<i class="fa fa-chevron-right"></i>',
					) );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			    </div>
			</div>
			<?php if($sidebar!='nosidebar'){?>
			<div class="col-12 col-sm-12 col-md-4 col-lg-4">
				<?php get_sidebar();?>
			</div>
			<?php }?>	
		</div>
	</div>
</section>			
<?php
get_footer();
