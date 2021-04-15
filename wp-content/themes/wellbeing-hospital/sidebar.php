<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wellbeing Hospital
 */

if(is_archive() || is_search() || is_home()){
	$sidebar_layout = get_theme_mod('wellbeing_hospital_archive_sidebar_layout','leftsidebar');
}elseif(is_page() || is_single()){
    $sidebar_layout = get_theme_mod('wellbeing_hospital_single_sidebar_layout','leftsidebar');
}else{
	$sidebar_layout = get_theme_mod('wellbeing_hospital_archive_sidebar_layout','leftsidebar');
}
if($sidebar_layout == 'nosidebar'){
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
	if($sidebar_layout == 'rightsidebar'){
		dynamic_sidebar( 'right-sidebar' ); 
    }elseif($sidebar_layout == 'leftsidebar'){
    	dynamic_sidebar( 'left-sidebar' ); 
    }else{
    	return;
    }
	?>
</aside><!-- #secondary -->
