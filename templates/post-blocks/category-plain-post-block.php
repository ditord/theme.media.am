<?php
$category_plain_post_block_category = isset($category_plain_post_block_category) ? $category_plain_post_block_category : null;
$category_plain_post_block_category_name = '';
$category_plain_post_block_category_link = '';
$category_plain_post_block_author = wp_get_object_terms(get_the_ID(), 'author_posts');
$category_plain_post_block_author_name = (!is_wp_error($category_plain_post_block_author) && !empty($category_plain_post_block_author)) ? $category_plain_post_block_author[0]->name : '';
$category_plain_post_block_author_link = (!is_wp_error($category_plain_post_block_author) && !empty($category_plain_post_block_author)) ? get_term_link($category_plain_post_block_author[0]) : '';

if ($category_plain_post_block_category instanceof WP_Term) {
    $category_plain_post_block_category_name = $category_plain_post_block_category->name;
    $category_plain_post_block_category_link = get_term_link($category_plain_post_block_category);
} else {
    $category_plain_post_block_categories = get_the_category();
    if (!empty($category_plain_post_block_categories)) {
        $category_plain_post_block_category_name = $category_plain_post_block_categories[0]->name;
        $category_plain_post_block_category_link = get_term_link($category_plain_post_block_categories[0]);
    }
}

if (is_wp_error($category_plain_post_block_category_link)) {
    $category_plain_post_block_category_link = '';
}
if (is_wp_error($category_plain_post_block_author_link)) {
    $category_plain_post_block_author_link = '';
}
?>

<article class="plain-post-block crossroad-section__bottom-card category-plain-post-block">
    <a class="plain-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <?php if ($category_plain_post_block_category_name) : ?>
        <a class="plain-post-block__tag" href="<?php echo esc_url($category_plain_post_block_category_link); ?>">
            <?php echo esc_html($category_plain_post_block_category_name); ?>
        </a>
    <?php endif; ?>

    <div class="plain-post-block__content">
        <?php if ($category_plain_post_block_author_name) : ?>
            <a class="viewpoint-post-block__author category-plain-post-block__author" href="<?php echo esc_url($category_plain_post_block_author_link); ?>">
                <span><?php echo esc_html($category_plain_post_block_author_name); ?></span>
            </a>
<!--        --><?php //else : ?>
<!--            <div class="category-plain-post-block__author_dummy"></div>-->
        <?php endif; ?>

        <a class="plain-post-block__title" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>

        <time class="plain-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </div>
</article>
