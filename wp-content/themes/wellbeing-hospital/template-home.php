<?php
/**
 * Template Name: Home
 */

get_header();
?>
<?php 
$defaults = wellbeing_hospital_generate_defaults();
wellbeing_hospital_slider_banner();
for($i=1; $i<=3; $i++){
	${'feature'.$i} = get_theme_mod('wellbeing_hospital_feature_section'.$i,$defaults['wellbeing_hospital_welcome_page']);
}
$feature_enable = get_theme_mod('feature_enable',$defaults['feature_enable']);
if($feature_enable == 1){
?>

<!-- Top Information Section -->
<section class="top-information">
    <div class="container">
        <div class="row">
        	<?php for($i=1; $i<=3; $i++){
                if(${'feature'.$i}):
                    if($i==1){
                        $icon = 'icon-medical-heart';
                    }elseif($i == 2){
                        $icon = 'icon-healthcare md-icon';
                    }else{
                        $icon = 'icon-doctor md-icon';
                    }
                ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="info-block <?php echo esc_attr('block-'.$i);?>">
                        <div class="info-block-icon">
                            <i class="<?php echo esc_attr($icon);?>"></i>
                        </div>

                        <div class="info-block-content">
                            <h4><?php echo get_the_title(${'feature'.$i})?></h4>
                            <?php echo apply_filters('the_content', get_post_field('post_content', ${'feature'.$i}));?>
                        </div>

                    </div>
                </div>
            <?php endif; }?>
        </div>
    </div>
</section>
<?php }?>
<?php 
$welcome_title = get_theme_mod('wellbeing_hospital_welcome_title',$defaults['wellbeing_hospital_welcome_title']);
$welcome_page = get_theme_mod('wellbeing_hospital_welcome_page',$defaults['wellbeing_hospital_welcome_page']);
?>
<!-- Intro Section -->
<section class="intro">
    <div class="container">
        <div class="row">
            <?php
            $welcome_args = array('p'=>$welcome_page,'post_type'=>'page');
            $welcome_query = new WP_Query( $welcome_args );
            if( $welcome_query->have_posts() ) { 
                while( $welcome_query->have_posts() ) { $welcome_query->the_post();
                    $image_alt = get_post_meta( get_post_thumbnail_id() , '_wp_attachment_image_alt', true );
                    ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 d-sm-none d-none d-md-block">
                        <div class="intro-img fadeInUp animated">
                            <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" alt="<?php echo esc_attr($image_alt);?>">
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="intro-content">
                            <div class="title">
                                <p class="t-underline"><?php echo esc_html($welcome_title);?></p>
                                <?php the_title('<h1>','</h1>'); ?>
                            </div>
                            <?php
                                the_content();       
                            ?>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            } 
            ?>
        </div>
    </div>
</section> 

<?php
$service_title = get_theme_mod('wellbeing_hospital_service_title',$defaults['wellbeing_hospital_service_title']);
?>
<!-- Service Section -->
<section class="section bg-grey service service-style-1">
    <div class="container">
        
        <?php if($service_title){?>
        <div class="title text-center">
            <h2><?php echo esc_html($service_title);?></h2>
            <span class="underline full-underline"></span>
        </div>
        <?php }?>
        <div class="service-list-block">
            <div class="row">
            <?php
            $service_cat_id = intval( get_theme_mod( 'wellbeing_hospital_service_cat', '0' ));
            $posts_per_page = get_theme_mod('service_per_page',$defaults['service_per_page']);
            $service_args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'category',
                        'field'     => 'id', 
                        'terms'     => $service_cat_id                                                                 
                    )),
                'posts_per_page' => $posts_per_page
            );
            $service_query = new WP_Query( $service_args );
            if( $service_query->have_posts() ) { 
                while( $service_query->have_posts() ) { $service_query->the_post();
                    ?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="service-list">

                            <div class="service-icon">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail('thumbnail');?></a>
                            </div>

                            <div class="service-content">
                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                <?php the_excerpt();?>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>        
            </div>
        </div>
    </div>
</section>

<?php 

$contact_subtitle = get_theme_mod('wellbeing_hospital_contact_subtitle',$defaults['wellbeing_hospital_contact_subtitle']);
$contact_page = get_theme_mod('wellbeing_hospital_contact_page',$defaults['wellbeing_hospital_welcome_page']);
?>
<!-- Appointment and Testimonials Section -->
<section class="miscellaneous">
    <div class="container">
        <div class="row">
            <!-- Appointment Form -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="appointment-block">
                    <div class="title">
                        <p><?php echo esc_html($contact_subtitle);?></p>
                        <h2><?php echo get_the_title($contact_page)?></h2>
                    </div>
                    <div class="appointment-form">
                        <div class="form">
                           <?php echo apply_filters('the_content', get_post_field('post_content', $contact_page));?>
                        </div>
                    </div>

                </div>
            </div>
            <?php 
             $testimonial_title = get_theme_mod('wellbeing_hospital_testimonial_title',$defaults['wellbeing_hospital_testimonial_title']);
             $testi_cat = get_theme_mod('wellbeing_hospital_testimonial_cat',$defaults['wellbeing_hospital_testimonial_cat']);
            ?>
            <!-- Testimonial -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                <div class="testimonial testimonial-style-1">
                    <?php if($testimonial_title){?>
                    <div class="title">
                        <h2><?php echo esc_html($testimonial_title);?></h2>
                        <i class="icon-left-quote"></i>
                    </div>
                    <?php }?>
                    <div class="owl-carousel owl-theme testimonial-slide">
                    <?php
                    $testi_args = array(
                        'post_type' => 'post',
                        'tax_query' => array(
                            array(
                                'taxonomy'  => 'category',
                                'field'     => 'id', 
                                'terms'     => $testi_cat                                                                 
                            )),
                        'posts_per_page' => -1
                    );
                    $testi_query = new WP_Query( $testi_args );
                    if( $testi_query->have_posts() ) { 
                        while( $testi_query->have_posts() ) { $testi_query->the_post();
                            ?>
                            <div class="item">
                                <div class="testimonial-list">
                                    <p><?php echo wp_kses_post(get_the_content());?></p>

                                    <div class="testimonial-bottom">
                                        <?php the_post_thumbnail('medium');?>
                                        <h5><?php the_title();?></h5>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 

<?php 
$wb_blog_title = get_theme_mod('wellbeing_hospital_blog_title',$defaults['wellbeing_hospital_blog_title']);
$blog_cat = get_theme_mod('wellbeing_hospital_blog_cat',$defaults['wellbeing_hospital_blog_cat']);
$blog_per_page = get_theme_mod('blog_per_page',$defaults['blog_per_page']);
?>
<!-- Latest Blog Section -->
<section class="section blog bg-grey">
    <div class="container">
        <?php if($wb_blog_title){?>
        <div class="title text-center">
            <h2><?php echo esc_html($wb_blog_title);?></h2>
            <span class="underline full-underline"></span>
        </div>
        <?php }?>
        <div class="row">
            <?php
            $blog_args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy'  => 'category',
                        'field'     => 'id', 
                        'terms'     => $blog_cat                                                                 
                    )),
                'posts_per_page' => $blog_per_page
            );
            $blog_query = new WP_Query( $blog_args );
            if( $blog_query->have_posts() ) { 
                while( $blog_query->have_posts() ) { $blog_query->the_post();
                    $image_alt = get_post_meta( get_post_thumbnail_id() , '_wp_attachment_image_alt', true );
                    ?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="blog-list">
                            <?php if(has_post_thumbnail()){?>
                            <div class="blog-img">
                                <a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('wellbeing-blog-image');?>" class="img-fluid" alt="<?php echo esc_attr($image_alt);?>"></a>
                            </div>
                            <?php }?>
                            <div class="blog-content">
                                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <?php wellbeing_hospital_entry_meta();?>
                                <?php the_excerpt();?>
                                <a href="<?php the_permalink();?>" class="btn btn-1"><?php echo esc_html__('View Details','wellbeing-hospital');?></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            }
            ?>        
        </div>
    </div>
</section>

<?php
get_footer();