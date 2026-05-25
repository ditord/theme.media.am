<?php
$plain_post_block_variant = isset($plain_post_block_variant) ? $plain_post_block_variant : 'default';
$plain_post_block_category = isset($plain_post_block_category) ? $plain_post_block_category : null;
$plain_post_block_category_name = '';
$plain_post_block_category_link = '';
$plain_post_block_author = wp_get_object_terms(get_the_ID(), 'author_posts');
$plain_post_block_author_name = (!is_wp_error($plain_post_block_author) && !empty($plain_post_block_author)) ? $plain_post_block_author[0]->name : '';
$plain_post_block_author_link = (!is_wp_error($plain_post_block_author) && !empty($plain_post_block_author)) ? get_term_link($plain_post_block_author[0]) : '';

if ($plain_post_block_category instanceof WP_Term) {
    $plain_post_block_category_name = $plain_post_block_category->name;
    $plain_post_block_category_link = get_term_link($plain_post_block_category);
} else {
    $plain_post_block_categories = get_the_category();
    if (!empty($plain_post_block_categories)) {
        $plain_post_block_category_name = $plain_post_block_categories[0]->name;
        $plain_post_block_category_link = get_term_link($plain_post_block_categories[0]);
    }
}

if (is_wp_error($plain_post_block_category_link)) {
    $plain_post_block_category_link = '';
}
if (is_wp_error($plain_post_block_author_link)) {
    $plain_post_block_author_link = '';
}

$plain_post_block_classes = 'plain-post-block';
if ($plain_post_block_variant === 'featured') {
    $plain_post_block_classes .= ' plain-post-block--featured';
}
?>

<article class="<?php echo esc_attr($plain_post_block_classes); ?>">
    <a class="plain-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <?php if ($plain_post_block_variant !== 'featured' && $plain_post_block_category_name) : ?>
        <a class="plain-post-block__tag" href="<?php echo esc_url($plain_post_block_category_link); ?>">
            <?php echo esc_html($plain_post_block_category_name); ?>
        </a>
    <?php endif; ?>

    <div class="plain-post-block__content">
        <?php if ($plain_post_block_author_name) : ?>
            <a class="plain-post-block__author" href="<?php echo esc_url($plain_post_block_author_link); ?>">
                <?php echo esc_html($plain_post_block_author_name); ?>
            </a>
        <?php endif; ?>

        <?php if ($plain_post_block_variant === 'featured' && $plain_post_block_category_name) : ?>
            <a class="plain-post-block__tag" href="<?php echo esc_url($plain_post_block_category_link); ?>">
                <?php echo esc_html($plain_post_block_category_name); ?>
            </a>
        <?php endif; ?>

        <a class="plain-post-block__title" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>

        <time class="plain-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </div>
</article>
