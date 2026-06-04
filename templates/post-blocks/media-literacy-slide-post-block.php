<article class="media-literacy-slide-post-block">
    <a class="media-literacy-slide-post-block__content" href="<?php the_permalink(); ?>">
        <span class="media-literacy-slide-post-block__title">
            <?php the_title(); ?>
        </span>

        <time class="media-literacy-slide-post-block__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </time>
    </a>

    <a class="media-literacy-slide-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
        <?php endif; ?>
    </a>
</article>
