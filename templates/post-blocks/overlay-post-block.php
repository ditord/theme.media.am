<?php
$overlay_post_block_category = isset($overlay_post_block_category) ? $overlay_post_block_category : null;
$overlay_post_block_show_author = !empty($overlay_post_block_show_author);
$overlay_post_block_category_name = '';
$overlay_post_block_category_link = '';
$overlay_post_block_author = wp_get_object_terms(get_the_ID(), 'author_posts');
$overlay_post_block_author_name = (!is_wp_error($overlay_post_block_author) && !empty($overlay_post_block_author)) ? $overlay_post_block_author[0]->name : '';
$overlay_post_block_author_link = (!is_wp_error($overlay_post_block_author) && !empty($overlay_post_block_author)) ? get_term_link($overlay_post_block_author[0]) : '';

$overlay_post_block_display_category = media_am_get_post_display_category(get_the_ID(), $overlay_post_block_category);
if ($overlay_post_block_display_category instanceof WP_Term) {
    $overlay_post_block_category_name = $overlay_post_block_display_category->name;
    $overlay_post_block_category_link = get_term_link($overlay_post_block_display_category);
}

if (is_wp_error($overlay_post_block_category_link)) {
    $overlay_post_block_category_link = '';
}

if (is_wp_error($overlay_post_block_author_link)) {
    $overlay_post_block_author_link = '';
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
        <?php if ($overlay_post_block_show_author && $overlay_post_block_author_name) : ?>
            <a class="overlay-post-block__tag overlay-post-block__tag--author" href="<?php echo esc_url($overlay_post_block_author_link); ?>">
                <?php echo esc_html($overlay_post_block_author_name); ?>
            </a>
        <?php elseif ($overlay_post_block_category_name) : ?>
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
