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

$viewpoint_section_featured_post = isset($viewpoint_section_posts->posts[0]) ? $viewpoint_section_posts->posts[0] : null;
$viewpoint_section_side_posts = array_slice($viewpoint_section_posts->posts, 1, 3);
$viewpoint_section_bottom_posts = array_slice($viewpoint_section_posts->posts, 4, 2);
?>

<section class="viewpoint-section">
    <div class="viewpoint-section__inner section-container">
        <div class="viewpoint-section__header">
            <h2><?php echo esc_html($viewpoint_section_category->name); ?></h2>
        </div>

        <div class="viewpoint-section__layout">
            <?php if (!empty($viewpoint_section_side_posts)) : ?>
                <div class="viewpoint-section__side-column">
                    <?php
                    foreach ($viewpoint_section_side_posts as $post) :
                        setup_postdata($post);
                        include get_template_directory() . '/templates/post-blocks/viewpoint-post-block.php';
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>

            <div class="viewpoint-section__main-column">
                <?php if ($viewpoint_section_featured_post) : ?>
                    <?php
                    $post = $viewpoint_section_featured_post;
                    setup_postdata($post);
                    $viewpoint_post_block_modifier = 'viewpoint-post-block--featured';
                    include get_template_directory() . '/templates/post-blocks/viewpoint-post-block.php';
                    unset($viewpoint_post_block_modifier);
                    ?>
                <?php endif; ?>

                <?php if (!empty($viewpoint_section_bottom_posts)) : ?>
                    <div class="viewpoint-section__bottom-grid">
                        <?php
                        foreach ($viewpoint_section_bottom_posts as $post) :
                            setup_postdata($post);
                            include get_template_directory() . '/templates/post-blocks/viewpoint-post-block.php';
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
unset($viewpoint_section_category_slug, $viewpoint_section_posts_count, $viewpoint_section_category, $viewpoint_section_posts, $viewpoint_section_featured_post, $viewpoint_section_side_posts, $viewpoint_section_bottom_posts);
?>
