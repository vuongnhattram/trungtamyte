<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wellbeing Hospital
 */

?>

	</div><!-- #content -->

    <!-- Footer Section -->
    <footer>

        <!-- Top Footer Section -->
        <div class="top-footer">
            <div class="container">
                <div class="footer-info">
                    <div class="row">
                    <?php
                    $i = 0; while ( $i < 3 ) : $i++; ?>     
                    <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>  
                        <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                            <?php dynamic_sidebar( 'footer-' . intval( $i ) ); ?>
                        </div>
                    <?php endif; ?>     
                    <?php endwhile; ?>
                    </div>
                </div> 
            </div>
        </div>

        <!-- Bottom Footer Section -->
        <div class="bottom-footer">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="copyright">
                            <?php wellbeing_hospital_copyright_text(); ?> 
                                 
                        </div>
                    </div>
                 
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <?php 
                        $defaults = wellbeing_hospital_generate_defaults();
                        $footer_nav = get_theme_mod('wellbeing_hospital_footer_menu',$defaults['wellbeing_hospital_footer_menu']);
                        if($footer_nav == 1){
                        ?>
                        <div class="footer-nav">
                            <?php 
                            $args = array(
                                'theme_location' => 'footer',
                                'container'       => false,
                            );

                           if( has_nav_menu( 'footer' ) ):
                                wp_nav_menu( $args );
                            endif;
                            ?>
                        </div>
                        <?php }?>
                    </div>
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top Section -->
    <i class="icon-up return-to-top"></i>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
