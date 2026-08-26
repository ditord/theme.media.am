<?php
$featured_slide_category = media_am_get_post_display_category();
$featured_slide_category_name = '';
$featured_slide_category_link = '';

if ($featured_slide_category instanceof WP_Term) {
    $featured_slide_category_name = $featured_slide_category->name;
    $featured_slide_category_link = get_category_link($featured_slide_category->term_id);
}
?>

<article class="featured-slide-post-block hover-image-scale">
    <a class="featured-slide-post-block__image" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('big'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <div class="featured-slide-post-block__meta">
        <div class="featured-slide-post-block__title-wrapper">
            <?php if ($featured_slide_category_name) : ?>
                <a class="featured-slide-post-block__category" href="<?php echo esc_url($featured_slide_category_link); ?>">
                    <?php echo esc_html($featured_slide_category_name); ?>
                </a>
            <?php endif; ?>

            <a class="featured-slide-post-block__title" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </div>


        <time class="featured-slide-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </div>
</article>
