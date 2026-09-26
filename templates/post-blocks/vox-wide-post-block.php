<?php
$vox_wide_post_block_category = isset($vox_wide_post_block_category) ? $vox_wide_post_block_category : null;
$vox_wide_post_block_category_name = '';
$vox_wide_post_block_category_link = '';

$vox_wide_post_block_display_category = media_am_get_post_display_category(get_the_ID(), $vox_wide_post_block_category);
if ($vox_wide_post_block_display_category instanceof WP_Term) {
    $vox_wide_post_block_category_name = $vox_wide_post_block_display_category->name;
    $vox_wide_post_block_category_link = get_term_link($vox_wide_post_block_display_category);
}

if (is_wp_error($vox_wide_post_block_category_link)) {
    $vox_wide_post_block_category_link = '';
}
?>

<article class="vox-wide-post-block">
    <a class="vox-wide-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <?php if ($vox_wide_post_block_category_name) : ?>
        <a class="vox-wide-post-block__tag" href="<?php echo esc_url($vox_wide_post_block_category_link); ?>">
            <?php echo esc_html($vox_wide_post_block_category_name); ?>
        </a>
    <?php endif; ?>

    <a class="vox-wide-post-block__content" href="<?php the_permalink(); ?>">
        <span class="vox-wide-post-block__title">
            <?php the_title(); ?>
        </span>

        <time class="vox-wide-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </a>
</article>
