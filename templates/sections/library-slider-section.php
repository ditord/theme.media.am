<?php
$library_slider_category_slug = isset($library_slider_category_slug) ? $library_slider_category_slug : '';
$library_slider_posts_count = isset($library_slider_posts_count) ? absint($library_slider_posts_count) : 6;

if (!$library_slider_category_slug) {
    return;
}

$library_slider_category = get_category_by_slug($library_slider_category_slug);
if (!$library_slider_category) {
    return;
}

$library_slider_posts = new WP_Query(array(
    'posts_per_page' => $library_slider_posts_count,
    'category_name' => $library_slider_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$library_slider_posts->have_posts()) {
    wp_reset_postdata();
    return;
}
?>

<section class="library-slider-section">
    <div class="library-slider-section__inner section-container">
        <div class="library-slider-section__header">
            <h2><?php echo esc_html($library_slider_category->name); ?></h2>
        </div>

        <div class="library-slider-section__swiper swiper">
            <div class="swiper-wrapper">
                <?php
                while ($library_slider_posts->have_posts()) :
                    $library_slider_posts->the_post();
                    $play_overlay_post_block_category = $library_slider_category;
                    ?>
                    <div class="swiper-slide">
                        <?php include get_template_directory() . '/templates/post-blocks/play-overlay-post-block.php'; ?>
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
unset($library_slider_category_slug, $library_slider_posts_count, $library_slider_category, $library_slider_posts, $play_overlay_post_block_category);
?>
