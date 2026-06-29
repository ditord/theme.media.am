<?php
$viewpoint_section_category_slug = isset($viewpoint_section_category_slug) ? $viewpoint_section_category_slug : '';
$viewpoint_section_posts_count = isset($viewpoint_section_posts_count) ? absint($viewpoint_section_posts_count) : 6;

if (!$viewpoint_section_category_slug) {
    return;
}

$viewpoint_section_category = get_category_by_slug($viewpoint_section_category_slug);
if (!$viewpoint_section_category) {
    return;
}

$viewpoint_section_posts = new WP_Query(array(
    'posts_per_page' => $viewpoint_section_posts_count,
    'category_name' => $viewpoint_section_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$viewpoint_section_posts->have_posts()) {
    wp_reset_postdata();
    return;
}

$viewpoint_section_large_posts = array_slice($viewpoint_section_posts->posts, 0, 2);
$viewpoint_section_compact_posts = array_slice($viewpoint_section_posts->posts, 2, 3);
?>

<section class="viewpoint-section">
    <div class="viewpoint-section__inner section-container">
        <div class="viewpoint-section__header">
            <h2><?php echo esc_html($viewpoint_section_category->name); ?></h2>
        </div>

        <div class="viewpoint-section__layout">
            <?php if (!empty($viewpoint_section_large_posts)) : ?>
                <div class="viewpoint-section__large-grid">
                    <?php
                    foreach ($viewpoint_section_large_posts as $post) :
                        setup_postdata($post);
                        $viewpoint_post_block_modifier = 'viewpoint-post-block--large';
                        include get_template_directory() . '/templates/post-blocks/viewpoint-post-block.php';
                        unset($viewpoint_post_block_modifier);
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($viewpoint_section_compact_posts)) : ?>
                <div class="viewpoint-section__compact-column">
                    <?php
                    foreach ($viewpoint_section_compact_posts as $post) :
                        setup_postdata($post);
                        $viewpoint_post_block_modifier = 'viewpoint-post-block--compact';
                        include get_template_directory() . '/templates/post-blocks/viewpoint-post-block.php';
                        unset($viewpoint_post_block_modifier);
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
unset($viewpoint_section_category_slug, $viewpoint_section_posts_count, $viewpoint_section_category, $viewpoint_section_posts, $viewpoint_section_large_posts, $viewpoint_section_compact_posts);
?>
