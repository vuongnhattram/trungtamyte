<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wellbeing Hospital
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php    
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<div class="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wellbeing-hospital' ); ?></a>
    
    <header class="header header-2">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="header-info">  
                   
                            <?php 
                            $defaults = wellbeing_hospital_generate_defaults();
                            $info_text = get_theme_mod('info_text',$defaults['info_text']);
                            $phone = get_theme_mod('contact_phone',$defaults['contact_phone']);
                            $address = get_theme_mod('contact_address',$defaults['contact_address']);
                            if($info_text){
                            ?>
                            <span><?php echo esc_html($info_text);?></span> 
                            <?php } if($phone){?>
                            <a href="tel:<?php echo esc_attr($phone);?>"><i class="icon-phone"></i> <?php echo esc_html($phone);?> </a> 
                             <?php } if($address){?>
                            <span><i class="icon-location"></i> <?php echo wp_kses_post($address);?></span> 
                            <?php }?>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                          <div class="header-social-link">
                            <?php echo wellbeing_hospital_get_social_media();?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <?php wellbeing_hospital_site_brandings();?>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                                <nav class="navbar navbar-expand-lg"> 
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"> 
                                        <span class="navbar-brand"><?php echo esc_html__('Menu','wellbeing-hospital');?></span>
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="main-nav">
                                        <?php 
                                        $args = array(
                                            'theme_location' => 'primary',
                                            'menu_class' => 'navbar-nav',
                                            'container'       => false,
                                        );

                                       if( has_nav_menu( 'primary' ) ):
                                            wp_nav_menu( $args );
                                        endif;
                                        ?>

                                        <?php 
                                            $btn_text = get_theme_mod('extra_button_text',$defaults['extra_button_text']);
                                            $btn_url = get_theme_mod('extra_button_url',$defaults['extra_button_url']);
                                            if($btn_text){
                                            ?>

                                

                                            <span class="appointment-link md-appointment-link">
                                                <a href="<?php echo esc_url($btn_url);?>" class="btn btn-3"><i class="icon-clipboard"></i> <?php echo esc_html($btn_text);?></a>
                                            </span>
                                        <?php }?>
                                    </div>
                                </nav> 
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-3 lg-appointment-link">
                                 <?php 
                                    $btn_text = get_theme_mod('extra_button_text',$defaults['extra_button_text']);
                                    $btn_url = get_theme_mod('extra_button_url',$defaults['extra_button_url']);
                                    if($btn_text){
                                    ?>

                                    <div class="appointment-link">
                                        <a href="<?php echo esc_url($btn_url);?>" class="btn btn-3"><i class="icon-clipboard"></i> <?php echo esc_html($btn_text);?></a>
                                    </div> 
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php 
    if(!is_front_page()){
        wellbeing_hospital_title_banner();
    }
    ?>
	<div id="content" class="site-content">
