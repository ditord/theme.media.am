<?php
$announcement_post_block_category = isset($announcement_post_block_category) ? $announcement_post_block_category : null;
$announcement_post_block_category_name = '';
$announcement_post_block_category_link = '';

$announcement_post_block_display_category = media_am_get_post_display_category(get_the_ID(), $announcement_post_block_category);
if ($announcement_post_block_display_category instanceof WP_Term) {
    $announcement_post_block_category_name = $announcement_post_block_display_category->name;
    $announcement_post_block_category_link = get_term_link($announcement_post_block_display_category);
}

if (is_wp_error($announcement_post_block_category_link)) {
    $announcement_post_block_category_link = '';
}
?>

<article class="announcement-post-block">
    <?php if ($announcement_post_block_category_name) : ?>
        <a class="announcement-post-block__tag" href="<?php echo esc_url($announcement_post_block_category_link); ?>">
            <?php echo esc_html($announcement_post_block_category_name); ?>
        </a>
    <?php endif; ?>

    <a class="announcement-post-block__body" href="<?php the_permalink(); ?>">
        <span class="announcement-post-block__meta">
            <span class="announcement-post-block__title">
                <?php the_title(); ?>
            </span>

            <time class="announcement-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php media_am_localized_date(get_the_date('j F Y')); ?>
            </time>
        </span>

        <span class="announcement-post-block__image hover-image-scale">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
            <?php endif; ?>
        </span>
    </a>
</article>
