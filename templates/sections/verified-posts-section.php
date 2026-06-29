<?php
$verified_section_category_slug = isset($verified_section_category_slug) ? $verified_section_category_slug : '';
$verified_section_posts_count = isset($verified_section_posts_count) ? absint($verified_section_posts_count) : 5;

if (!$verified_section_category_slug) {
    return;
}

$verified_section_category = get_category_by_slug($verified_section_category_slug);
if (!$verified_section_category) {
    return;
}

$verified_section_posts = new WP_Query(array(
    'posts_per_page' => $verified_section_posts_count,
    'category_name' => $verified_section_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$verified_section_posts->have_posts()) {
    wp_reset_postdata();
    return;
}

$verified_section_overlay_posts = array_slice($verified_section_posts->posts, 0, 2);
$verified_section_soft_posts = array_slice($verified_section_posts->posts, 2);
?>

<section class="verified-posts-section">
    <div class="verified-posts-section__inner section-container">
        <div class="verified-posts-section__header">
            <h2><?php echo esc_html($verified_section_category->name); ?></h2>
        </div>

        <?php if (!empty($verified_section_overlay_posts)) : ?>
            <div class="verified-posts-section__overlay-grid">
                <?php
                foreach ($verified_section_overlay_posts as $post) :
                    setup_postdata($post);
                    $overlay_post_block_category = $verified_section_category;
                    $overlay_post_block_show_author = true;
                    include get_template_directory() . '/templates/post-blocks/overlay-post-block.php';
                    unset($overlay_post_block_show_author);
                endforeach;
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($verified_section_soft_posts)) : ?>
            <div class="verified-posts-section__soft-grid">
                <?php
                foreach ($verified_section_soft_posts as $post) :
                    setup_postdata($post);
                    include get_template_directory() . '/templates/post-blocks/soft-post-block.php';
                endforeach;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
wp_reset_postdata();
unset($verified_section_category_slug, $verified_section_posts_count, $verified_section_category, $verified_section_posts, $verified_section_overlay_posts, $verified_section_soft_posts, $overlay_post_block_category);
?>
