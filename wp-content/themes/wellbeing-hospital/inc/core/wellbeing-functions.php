<?php

if( !function_exists('wellbeing_hospital_site_brandings') ){
	function wellbeing_hospital_site_brandings(){
      ?>
		<div class="logo-holder">
	        <?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo_img = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if($logo_img!=''){
            ?>
            <a class="" href="<?php echo esc_url( home_url('/') ); ?>">
                <img src="<?php echo esc_url( $logo_img[0] ); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
            <?php
            }
			if ( is_front_page() && is_home() ) : ?>
				<h1 id="logo" class="site-title"><a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
      <?php
	}
}

if(!function_exists('wellbeing_hospital_slider_banner')){
	function wellbeing_hospital_slider_banner(){
		$slider_enable = get_theme_mod('slider_enable',1);
        $slider_button_text = get_theme_mod('slider_button_text','');
		if($slider_enable == 1){
		    ?>
		    <section class="banner banner-2">
		        <div id="banner-slider" class="carousel bs-slider carousel-fade control-round indicators-line" data-ride="carousel" data-pause="" data-interval="7000">

		            <div class="carousel-inner" role="listbox">
						<?php
					    $slider_cat_id = intval( get_theme_mod( 'wellbeing_hospital_slider_cat', '0' ));
					    $posts_per_page = get_theme_mod('slider_per_page',5);
					    $slider_args = array(
					        'post_type' => 'post',
					        'tax_query' => array(
					            array(
					                'taxonomy'  => 'category',
					                'field'     => 'id', 
					                'terms'     => $slider_cat_id                                                                 
					            )),
					        'posts_per_page' => $posts_per_page
					    );
					    $slider_query = new WP_Query( $slider_args );
					    if( $slider_query->have_posts() ) { 
					    	$count = 0;
					    	while( $slider_query->have_posts() ) { $slider_query->the_post();
                                $count++;
                                if($count == 1){
                                	$class = "active";
                                }else{
                                	$class="";
                                }
                                $image_id = get_post_thumbnail_id();
							    $image_path = wp_get_attachment_image_src( $image_id , 'wellbeing-slider-image', true );	
                                $image_alt = get_post_meta( $image_id , '_wp_attachment_image_alt', true );
							    ?>
				                <div class="carousel-item <?php echo esc_attr($class);?>">
				                    <img src="<?php echo esc_url($image_path[0])?>" class="slide-image" alt="<?php echo esc_attr($image_alt);?>" >
				                    <div class="bs-slider-overlay"></div>
				                    <div class="container">
				                        <div class="row">
				                            <div class="slide-text">
				                                <h2 data-animation="animated fadeInDown"><?php the_title();?></h2>
				                                <p data-animation="animated lightSpeedIn">
                                                    <span>
                                                        <?php 
                                                        the_content();      
                                                        wp_link_pages( array(
                                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wellbeing-hospital' ),
                                                            'after'  => '</div>',
                                                        ) );
                                                        ?>   
                                                        </span>
                                                </p>
                                                <?php 
                                                    if(!empty($slider_button_text))
                                                    {
                                                ?>
				                                <a href="<?php the_permalink();?>" class="btn btn-1" data-animation="animated fadeInUp"><?php echo esc_html($slider_button_text); ?></a>

                                              <?php } else
                                              { ?>
                                                <a href="<?php the_permalink();?>" class="btn btn-1" data-animation="animated fadeInUp"><?php echo esc_html__('Meet our doctors','wellbeing-hospital'); ?></a>

                                          <?php  }?>  
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <?php
				            }
				            wp_reset_postdata();
				        }        
					    ?>
		            </div>
                    <!-- Left Control -->
                    <a class="left carousel-control" href="#banner-slider" role="button" data-slide="prev">
                        <i class="icon-left-open-big"></i>
                        <span class="sr-only"><?php echo esc_html__('Previous','wellbeing-hospital');?></span>
                    </a>

                    <!-- Right Control -->
                    <a class="right carousel-control" href="#banner-slider" role="button" data-slide="next">
                        <i class="icon-right-open-big"></i>
                        <span class="sr-only"><?php echo esc_html__('Next','wellbeing-hospital');?></span>
                    </a>
		        </div>
		    </section>
			<?php
		}
	}
}

/* Wellbeing Hospital Meta */
if( ! function_exists( 'wellbeing_hospital_entry_meta' ) ):
    function wellbeing_hospital_entry_meta() {
        global $post; 
        $author_id=$post->post_author;
        ?>
        <ul class="meta">
	        <li> 
	            <i class="icon-calendar"></i>  <?php echo get_the_date(); ?>
	        </li>

	        <li> 
	            <i class="icon-user"></i> <?php the_author_meta( 'nickname', $author_id ); ?>
	        </li>

	        <li> 
	            <i class="icon-comment-empty"></i> 
	            <a href="<?php echo esc_url( get_permalink() ) ?>#comments">
                    <?php
                    echo get_comments_number();
                    ?>
	            </a> 
	        </li>
        </ul>   
        <?php
    }
endif;

/* Tags */
if(!function_exists('wellbeing_hospital_tags')){
function wellbeing_hospital_tags(){
	?>
    <div class="tag-links pull-left">
        <?php 
        $post_tags = get_the_tags();
        if( $post_tags ):
            foreach( $post_tags as $tags ):
                $term_id = $tags->term_id;
                $name = $tags->name;
                ?>
                <a href="<?php echo esc_url( get_tag_link( $term_id ) ); ?>"><?php echo esc_html( $name ); ?></a>
                <?php
            endforeach;
        endif;
        ?>
    </div>
<?php
}   
} 

/* Breadcrumb */
//breadcrumb sanitize
function wellbeing_hospital_sanitize_breadcrumb($input){
    $all_tags = array(
        'a'=>array(
            'href'=>array()
        )
     );
    return wp_kses($input,$all_tags);
    
}
function wellbeing_hospital_breadcrumbs() {
    global $post;
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

    $delimiter = '&gt;';

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $homeLink = esc_url( home_url() );

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1)
            echo '<div id="wellbeing-breadcrumb"><a href="' . esc_url($homeLink) . '">' . esc_attr__('Home', 'wellbeing-hospital') . '</a></div></div>';
    } else {

        echo '<div id="wellbeing-breadcrumb"><a href="' . esc_url($homeLink) . '">' . esc_attr__('Home', 'wellbeing-hospital') . '</a> ' . esc_attr($delimiter) . ' ';

        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0)
                echo get_category_parents($thisCat->parent, TRUE, ' ' . esc_attr($delimiter) . ' ');
            echo '<span class="current">' . esc_html__('Archive by category','wellbeing-hospital').' "' . single_cat_title('', false) . '"' . '</span>';
        } elseif (is_search()) {
            echo '<span class="current">' . esc_html__('Search results for','wellbeing-hospital'). '"' . get_search_query() . '"' . '</span>';
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . esc_attr($delimiter) . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . esc_attr($delimiter) . ' ';
            echo '<span class="current">' . get_the_time('d') . '</span>';
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . esc_attr($delimiter) . ' ';
            echo '<span class="current">' . get_the_time('F') . '</span>';
        } elseif (is_year()) {
            echo '<span class="current">' . get_the_time('Y') . '</span>';
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_attr($post_type->labels->singular_name) . '</a>';
                if ($showCurrent == 1)
                    echo ' ' . esc_attr($delimiter) . ' ' . '<span class="current">' . get_the_title() . '</span>';
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                if ($showCurrent == 0)
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                echo wellbeing_hospital_sanitize_breadcrumb($cats);
                if ($showCurrent == 1)
                    echo '<span class="current">' . get_the_title() . '</span>';
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if(!empty($post_type)){
                echo '<span class="current">' . esc_html($post_type->labels->name) . '</span>';
            }else{
                echo '<span class="current">'.esc_html__('Empty Post Type','wellbeing-hospital').'</span>';
            }
        } elseif (is_attachment()) {
            if ($showCurrent == 1) echo ' ' . '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo wellbeing_hospital_sanitize_breadcrumb($breadcrumbs[$i]);
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . esc_attr($delimiter). ' ';
            }
            if ($showCurrent == 1)
                echo ' ' . esc_attr($delimiter) . ' ' . '<span class="current">' . get_the_title() . '</span>';
        } elseif (is_tag()) {
            echo '<span class="current">' . esc_attr__('Posts tagged','wellbeing-hospital').' "' . single_tag_title('', false) . '"' . '</span>';
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo '<span class="current">' . esc_attr__('Articles posted by ','wellbeing-hospital'). esc_attr($userdata->display_name) . '</span>';
        } elseif (is_404()) {
            echo '<span class="current">' . 'Error 404' . '</span>';
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo esc_attr__('Page', 'wellbeing-hospital') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</div>';
    }
}

/* Header Banner */
if( ! function_exists( 'wellbeing_hospital_title_banner' ) ) {
    function wellbeing_hospital_title_banner() {
        $banner_enable = get_theme_mod('wellbeing_hospital_bread_enable',1);
        $banner_image = get_theme_mod('wellbeing_hospital_bread_banner');
        if($banner_enable == 1){
        ?>
        <section class="section page-title" style="background:url(<?php echo esc_url($banner_image);?>)">
            <div class="container">
                <?php
                if(is_home()){
                    $title = get_the_title( get_option('page_for_posts', true) );
                    if($title!=''){
                        echo '<h2>'.$title.'</h2>' ;
                    }else{
                        echo '<h2>'.esc_html__('Blog','wellbeing-hospital').'</h2>';
                    }    
                }elseif(is_archive()) {
                   the_archive_title( '<h2>', '</h2>' );

                } elseif(is_single() || is_singular('page')) {
                    wp_reset_postdata();
                    the_title('<h2>', '</h2>');

                } elseif(is_search()) {
                    ?>
                    <h2><?php printf(esc_html__( 'Search Results for: %s', 'wellbeing-hospital' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    <?php
                } elseif(is_404()) {
                    ?>
                    <h2><?php esc_html_e( '404 Error', 'wellbeing-hospital' ); ?></h2>
                    <?php
                }else{
                	the_archive_title( '<h2>', '</h2>' );
                }
                  wellbeing_hospital_breadcrumbs();	  
                ?>
            </div>
        </section>    
        <?php
        }
    }
}

/* Footer Copyright */
if(!function_exists('wellbeing_hospital_copyright_text')){
    function wellbeing_hospital_copyright_text(){
        $defaults = wellbeing_hospital_generate_defaults();
        $footer_copyright = get_theme_mod('wellbeing_hospital_footer_copyright',$defaults['wellbeing_hospital_footer_copyright']);
        if( !empty( $footer_copyright ) ) { ?>
            <?php echo wp_kses_post(apply_filters( 'wellbeing_hospital_copyright_text', $footer_copyright )); ?>   
        <?php } else ?>

        <?php if ( apply_filters( 'wellbeing_hospital_credit_link', true ) ) { 
            printf( esc_html__( '%1$s By %2$s', 'wellbeing-hospital' ), ' ', '<a href=" ' . esc_url('https://thememiles.com/') . ' " rel="designer" target="_blank">ThemeMiles</a>' ); ?>
        <?php 
        }
    }
}