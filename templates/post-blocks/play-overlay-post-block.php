<?php
$play_overlay_post_block_category = isset($play_overlay_post_block_category) ? $play_overlay_post_block_category : null;
$play_overlay_post_block_category_name = '';

if ($play_overlay_post_block_category instanceof WP_Term) {
    $play_overlay_post_block_category_name = $play_overlay_post_block_category->name;
} else {
    $play_overlay_post_block_categories = get_the_category();
    if (!empty($play_overlay_post_block_categories)) {
        $play_overlay_post_block_category_name = $play_overlay_post_block_categories[0]->name;
    }
}
?>

<article class="play-overlay-post-block">
    <a class="play-overlay-post-block__link hover-image-scale" href="<?php the_permalink(); ?>">
        <span class="play-overlay-post-block__image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
            <?php endif; ?>
        </span>

        <span class="play-overlay-post-block__icon" aria-hidden="true">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/play.svg'); ?>" alt="">
        </span>

        <span class="play-overlay-post-block__content">
            <?php if ($play_overlay_post_block_category_name) : ?>
                <span class="play-overlay-post-block__tag">
                    <?php echo esc_html($play_overlay_post_block_category_name); ?>
                </span>
            <?php endif; ?>

            <span class="play-overlay-post-block__title">
                <?php the_title(); ?>
            </span>

            <time class="play-overlay-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php media_am_localized_date(get_the_date('j F Y')); ?>
            </time>
        </span>
    </a>
</article>
