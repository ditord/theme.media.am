<?php
$vox_populi_section_category_slug = isset($vox_populi_section_category_slug) ? $vox_populi_section_category_slug : '';
$vox_populi_section_posts_count = isset($vox_populi_section_posts_count) ? absint($vox_populi_section_posts_count) : 6;

if (!$vox_populi_section_category_slug) {
    return;
}

$vox_populi_section_category = get_category_by_slug($vox_populi_section_category_slug);
if (!$vox_populi_section_category) {
    return;
}

$vox_populi_section_posts = new WP_Query(array(
    'posts_per_page' => $vox_populi_section_posts_count,
    'category_name' => $vox_populi_section_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$vox_populi_section_posts->have_posts()) {
    wp_reset_postdata();
    return;
}

$vox_populi_wide_posts = array_slice($vox_populi_section_posts->posts, 0, 2);
$vox_populi_compact_posts = array_slice($vox_populi_section_posts->posts, 2);
?>

<section class="vox-populi-section">
    <div class="vox-populi-section__inner section-container">
        <div class="vox-populi-section__header">
            <h2><?php echo esc_html($vox_populi_section_category->name); ?></h2>
        </div>

        <?php if (!empty($vox_populi_wide_posts)) : ?>
            <div class="vox-populi-section__wide-grid">
                <?php
                foreach ($vox_populi_wide_posts as $post) :
                    setup_postdata($post);
                    $vox_wide_post_block_category = $vox_populi_section_category;
                    include get_template_directory() . '/templates/post-blocks/vox-wide-post-block.php';
                endforeach;
                ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($vox_populi_compact_posts)) : ?>
            <div class="vox-populi-section__compact-grid">
                <?php
                foreach ($vox_populi_compact_posts as $post) :
                    setup_postdata($post);
                    include get_template_directory() . '/templates/post-blocks/vox-compact-post-block.php';
                endforeach;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
wp_reset_postdata();
unset($vox_populi_section_category_slug, $vox_populi_section_posts_count, $vox_populi_section_category, $vox_populi_section_posts, $vox_populi_wide_posts, $vox_populi_compact_posts, $vox_wide_post_block_category);
?>
