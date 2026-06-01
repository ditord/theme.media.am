<?php
$announcements_section_category_slug = isset($announcements_section_category_slug) ? $announcements_section_category_slug : '';
$announcements_section_posts_count = isset($announcements_section_posts_count) ? absint($announcements_section_posts_count) : 3;

if (!$announcements_section_category_slug) {
    return;
}

$announcements_section_category = get_category_by_slug($announcements_section_category_slug);
if (!$announcements_section_category) {
    return;
}

$announcements_section_posts = new WP_Query(array(
    'posts_per_page' => $announcements_section_posts_count,
    'category_name' => $announcements_section_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$announcements_section_posts->have_posts()) {
    wp_reset_postdata();
    return;
}
?>

<section class="announcements-section">
    <div class="announcements-section__inner section-container">
        <div class="announcements-section__header">
            <h2><?php echo esc_html($announcements_section_category->name); ?></h2>
        </div>

        <div class="announcements-section__grid">
            <?php
            while ($announcements_section_posts->have_posts()) :
                $announcements_section_posts->the_post();
                $announcement_post_block_category = $announcements_section_category;
                include get_template_directory() . '/templates/post-blocks/announcement-post-block.php';
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php
wp_reset_postdata();
unset($announcements_section_category_slug, $announcements_section_posts_count, $announcements_section_category, $announcements_section_posts, $announcement_post_block_category);
?>
