<?php
$soft_post_block_author = wp_get_object_terms(get_the_ID(), 'author_posts');
$soft_post_block_author_name = (!is_wp_error($soft_post_block_author) && !empty($soft_post_block_author)) ? $soft_post_block_author[0]->name : '';
$soft_post_block_author_link = (!is_wp_error($soft_post_block_author) && !empty($soft_post_block_author)) ? get_term_link($soft_post_block_author[0]) : '';

if (is_wp_error($soft_post_block_author_link)) {
    $soft_post_block_author_link = '';
}
?>

<article class="soft-post-block">
    <a class="soft-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <div class="soft-post-block__content">
        <?php if ($soft_post_block_author_name) : ?>
            <a class="soft-post-block__author" href="<?php echo esc_url($soft_post_block_author_link); ?>">
                <?php echo esc_html($soft_post_block_author_name); ?>
            </a>
        <?php else: ?>
            <div class="soft-post-block__author_dummy"></div>
        <?php endif; ?>

        <a class="soft-post-block__title" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>

        <time class="soft-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </div>
</article>
