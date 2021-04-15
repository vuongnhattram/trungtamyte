<?php 
$sidebar = get_theme_mod('wellbeing_hospital_archive_sidebar_layout','rightsidebar');
$readmore = get_theme_mod('wellbeing_hospital_readmore_text','Read More');
if($sidebar != 'nosidebar'){
    $class='col-12 col-sm-12 col-md-6 col-lg-6';
}else{
    $class='col-12 col-sm-12 col-md-6 col-lg-4';
}
?>
<div class="<?php echo esc_attr($class);?>">
    <div class="archive-list">
        <?php if(has_post_thumbnail()){
          $image_id = get_post_thumbnail_id();
         $image_url = wp_get_attachment_image_src($image_id, 'wellbeing-blog-image', true);
        ?>
        <div class="blog-img">
            <a href="<?php the_permalink();?>"><img src="<?php echo esc_url($image_url[0]);?>" class="img-fluid" alt="<?php the_title_attribute();?>"></a>
        </div>
        <?php }?>
        <div class="archive-content">
            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <?php wellbeing_hospital_entry_meta();?>
            <?php the_excerpt();?>
            <a href="<?php the_permalink();?>" class="btn btn-1"><?php echo esc_html($readmore);?></a>
        </div>
    </div>
</div>