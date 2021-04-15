<div class="post-single">
    <?php if(has_post_thumbnail()){
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id, 'full', true);
    ?>
    <div class="post-thumbnail">
        <img src="<?php echo esc_url($image_url[0]);?>" class="img-fluid" alt="<?php the_title_attribute();?>">
    </div>

    <?php }?>
    <div class="post-content">
        <?php wellbeing_hospital_entry_meta();?>
        <h2><?php the_title();?></h2>
        <?php the_content();?>
    </div>
    <?php wellbeing_hospital_tags();?>
</div>        