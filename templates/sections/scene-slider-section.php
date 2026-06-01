<?php
$scene_slider_category_slug = isset($scene_slider_category_slug) ? $scene_slider_category_slug : '';
$scene_slider_posts_count = isset($scene_slider_posts_count) ? absint($scene_slider_posts_count) : 6;

if (!$scene_slider_category_slug) {
    return;
}

$scene_slider_category = get_category_by_slug($scene_slider_category_slug);
if (!$scene_slider_category) {
    return;
}

$scene_slider_posts = new WP_Query(array(
    'posts_per_page' => $scene_slider_posts_count,
    'category_name' => $scene_slider_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$scene_slider_posts->have_posts()) {
    wp_reset_postdata();
    return;
}
?>

<section class="scene-slider-section">
    <div class="scene-slider-section__inner section-container">
        <div class="scene-slider-section__header">
            <h2><?php echo esc_html($scene_slider_category->name); ?></h2>
        </div>

        <div class="scene-slider-section__swiper swiper">
            <div class="swiper-wrapper">
                <?php
                while ($scene_slider_posts->have_posts()) :
                    $scene_slider_posts->the_post();
                    $overlay_post_block_category = $scene_slider_category;
                    ?>
                    <div class="swiper-slide">
                        <?php include get_template_directory() . '/templates/post-blocks/overlay-post-block.php'; ?>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
unset($scene_slider_category_slug, $scene_slider_posts_count, $scene_slider_category, $scene_slider_posts, $overlay_post_block_category);
?>
