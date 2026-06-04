<?php
$media_literacy_slider_category_slug = isset($media_literacy_slider_category_slug) ? $media_literacy_slider_category_slug : '';
$media_literacy_slider_posts_count = isset($media_literacy_slider_posts_count) ? absint($media_literacy_slider_posts_count) : 6;

if (!$media_literacy_slider_category_slug) {
    return;
}

$media_literacy_slider_category = get_category_by_slug($media_literacy_slider_category_slug);
if (!$media_literacy_slider_category) {
    return;
}

$media_literacy_slider_posts = new WP_Query(array(
    'posts_per_page' => $media_literacy_slider_posts_count,
    'category_name' => $media_literacy_slider_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$media_literacy_slider_posts->have_posts()) {
    wp_reset_postdata();
    return;
}
?>

<section class="media-literacy-slider-section">
    <div class="media-literacy-slider-section__inner section-container">
        <div class="media-literacy-slider-section__header">
            <h2><?php echo esc_html($media_literacy_slider_category->name); ?></h2>
        </div>

        <div class="media-literacy-slider-section__swiper swiper">
            <div class="swiper-wrapper">
                <?php
                while ($media_literacy_slider_posts->have_posts()) :
                    $media_literacy_slider_posts->the_post();
                    ?>
                    <div class="swiper-slide">
                        <?php include get_template_directory() . '/templates/post-blocks/media-literacy-slide-post-block.php'; ?>
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
unset($media_literacy_slider_category_slug, $media_literacy_slider_posts_count, $media_literacy_slider_category, $media_literacy_slider_posts);
?>
