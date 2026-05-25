<?php
$overlay_post_block_category = isset($overlay_post_block_category) ? $overlay_post_block_category : null;
$overlay_post_block_category_name = '';
$overlay_post_block_category_link = '';

if ($overlay_post_block_category instanceof WP_Term) {
    $overlay_post_block_category_name = $overlay_post_block_category->name;
    $overlay_post_block_category_link = get_term_link($overlay_post_block_category);
} else {
    $overlay_post_block_categories = get_the_category();
    if (!empty($overlay_post_block_categories)) {
        $overlay_post_block_category_name = $overlay_post_block_categories[0]->name;
        $overlay_post_block_category_link = get_term_link($overlay_post_block_categories[0]);
    }
}

if (is_wp_error($overlay_post_block_category_link)) {
    $overlay_post_block_category_link = '';
}
?>

<article class="overlay-post-block">
    <a class="overlay-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <div class="overlay-post-block__content">
        <?php if ($overlay_post_block_category_name) : ?>
            <a class="overlay-post-block__tag" href="<?php echo esc_url($overlay_post_block_category_link); ?>">
                <?php echo esc_html($overlay_post_block_category_name); ?>
            </a>
        <?php endif; ?>

        <a class="overlay-post-block__title" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>

        <time class="overlay-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </div>
</article>
