<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

<section class="section page-single <?php echo esc_attr($sidebar);?>">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($class);?>">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

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
get_footer();
