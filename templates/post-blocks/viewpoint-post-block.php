<?php
$viewpoint_post_block_author = wp_get_object_terms(get_the_ID(), 'author_posts');
$viewpoint_post_block_author_name = (!is_wp_error($viewpoint_post_block_author) && !empty($viewpoint_post_block_author)) ? $viewpoint_post_block_author[0]->name : '';
$viewpoint_post_block_author_link = (!is_wp_error($viewpoint_post_block_author) && !empty($viewpoint_post_block_author)) ? get_term_link($viewpoint_post_block_author[0]) : '';
$viewpoint_post_block_author_image = '';

if (is_wp_error($viewpoint_post_block_author_link)) {
    $viewpoint_post_block_author_link = '';
}

if (!is_wp_error($viewpoint_post_block_author) && !empty($viewpoint_post_block_author)) {
    $viewpoint_post_block_author_fields = get_fields($viewpoint_post_block_author[0]);
    if (!empty($viewpoint_post_block_author_fields['author_image']['sizes']['thumbnail'])) {
        $viewpoint_post_block_author_image = $viewpoint_post_block_author_fields['author_image']['sizes']['thumbnail'];
    }
}
?>

<article class="viewpoint-post-block <?php echo isset($viewpoint_post_block_modifier) ? esc_attr($viewpoint_post_block_modifier) : ''; ?>">
    <a class="viewpoint-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>

    <div class="viewpoint-post-block__content">
        <?php if ($viewpoint_post_block_author_name) : ?>
            <a class="viewpoint-post-block__author" href="<?php echo esc_url($viewpoint_post_block_author_link); ?>">
                <?php if ($viewpoint_post_block_author_image) : ?>
                    <img src="<?php echo esc_url($viewpoint_post_block_author_image); ?>" alt="<?php echo esc_attr($viewpoint_post_block_author_name); ?>">
                <?php endif; ?>
                <span><?php echo esc_html($viewpoint_post_block_author_name); ?></span>
            </a>
        <?php endif; ?>

        <a class="viewpoint-post-block__title" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>

        <time class="viewpoint-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </div>
</article>
