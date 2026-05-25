<?php
$section_category_slug = isset($section_category_slug) ? $section_category_slug : '';
$section_posts_count = isset($section_posts_count) ? absint($section_posts_count) : 5;

if (!$section_category_slug) {
    return;
}

$section_category = get_category_by_slug($section_category_slug);
if (!$section_category) {
    return;
}

$section_posts = new WP_Query(array(
    'posts_per_page' => $section_posts_count,
    'category_name' => $section_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$section_posts->have_posts()) {
    wp_reset_postdata();
    return;
}

$section_featured_post = $section_posts->posts[0];
$section_grid_posts = array_slice($section_posts->posts, 1);
?>

<section class="category-plain-posts-section">
    <div class="category-plain-posts-section__inner section-container">
        <div class="category-plain-posts-section__header">
            <h2><?php echo esc_html($section_category->name); ?></h2>
        </div>

        <div class="category-plain-posts-section__layout">
            <div class="category-plain-posts-section__grid">
                <?php
                foreach ($section_grid_posts as $post) :
                    setup_postdata($post);
                    $plain_post_block_category = $section_category;
                    $plain_post_block_variant = 'default';
                    include get_template_directory() . '/templates/post-blocks/plain-post-block.php';
                endforeach;
                ?>
            </div>

            <div class="category-plain-posts-section__featured">
                <?php
                $post = $section_featured_post;
                setup_postdata($post);
                $plain_post_block_category = $section_category;
                $plain_post_block_variant = 'featured';
                include get_template_directory() . '/templates/post-blocks/plain-post-block.php';
                ?>
            </div>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
unset($section_category_slug, $section_posts_count, $section_category, $section_posts, $section_featured_post, $section_grid_posts, $plain_post_block_category, $plain_post_block_variant);
?>
