<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wellbeing Hospital
 */

get_header();
$sidebar = get_theme_mod('wellbeing_hospital_single_sidebar_layout','leftsidebar');
if($sidebar != 'nosidebar'){
	$class = 'col-12 col-sm-12 col-md-8 col-lg-8';
}else{
	$class = 'col-12 col-sm-12 col-md-12 col-lg-12';
}
?>

<section class="section blog-detail <?php echo esc_attr($sidebar);?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($class);?>">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
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
get_sidebar();
get_footer();
