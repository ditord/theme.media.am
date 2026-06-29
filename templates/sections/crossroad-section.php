<?php
$crossroad_section_category_slug = isset($crossroad_section_category_slug) ? $crossroad_section_category_slug : '';
$crossroad_section_posts_count = isset($crossroad_section_posts_count) ? absint($crossroad_section_posts_count) : 5;

if (!$crossroad_section_category_slug) {
    return;
}

$crossroad_section_category = get_category_by_slug($crossroad_section_category_slug);
if (!$crossroad_section_category) {
    return;
}

$crossroad_section_posts = new WP_Query(array(
    'posts_per_page' => $crossroad_section_posts_count,
    'category_name' => $crossroad_section_category_slug,
    'orderby' => 'date',
    'order' => 'DESC',
));

if (!$crossroad_section_posts->have_posts()) {
    wp_reset_postdata();
    return;
}

$crossroad_section_featured_post = isset($crossroad_section_posts->posts[0]) ? $crossroad_section_posts->posts[0] : null;
$crossroad_section_small_post = isset($crossroad_section_posts->posts[1]) ? $crossroad_section_posts->posts[1] : null;
$crossroad_section_bottom_posts = array_slice($crossroad_section_posts->posts, 2, 3);
$crossroad_get_author = function ($post_id) {
    $author_terms = wp_get_object_terms($post_id, 'author_posts');

    if (is_wp_error($author_terms) || empty($author_terms)) {
        return array(
            'name' => '',
            'link' => '',
        );
    }

    $author_link = get_term_link($author_terms[0]);

    return array(
        'name' => $author_terms[0]->name,
        'link' => is_wp_error($author_link) ? '' : $author_link,
    );
};
?>

<section class="crossroad-section">
    <div class="crossroad-section__inner section-container">
        <div class="crossroad-section__header">
            <h2><?php echo esc_html($crossroad_section_category->name); ?></h2>
        </div>

        <div class="crossroad-section__top">
            <?php if ($crossroad_section_small_post) : ?>
                <?php
                $post = $crossroad_section_small_post;
                setup_postdata($post);
                $crossroad_author = $crossroad_get_author(get_the_ID());
                ?>
                <article class="crossroad-post crossroad-post--text">
                    <div class="crossroad-post__content">
                        <?php if ($crossroad_author['name']) : ?>
                            <a class="crossroad-post__author crossroad-post__author--white" href="<?php echo esc_url($crossroad_author['link']); ?>">
                                <?php echo esc_html($crossroad_author['name']); ?>
                            </a>
                        <?php endif; ?>

                        <div class="crossroad-post__body">
                            <a class="crossroad-post__title" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>

                            <time class="crossroad-post__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php media_am_localized_date(get_the_date('j F Y')); ?>
                            </time>
                        </div>
                    </div>
                </article>
            <?php endif; ?>

            <?php if ($crossroad_section_featured_post) : ?>
                <?php
                $post = $crossroad_section_featured_post;
                setup_postdata($post);
                $crossroad_author = $crossroad_get_author(get_the_ID());
                ?>
                <article class="crossroad-post crossroad-post--wide">
                    <a class="crossroad-post__image hover-image-scale" href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
                        <?php endif; ?>
                    </a>

                    <div class="crossroad-post__content">
                        <?php if ($crossroad_author['name']) : ?>
                            <a class="crossroad-post__author" href="<?php echo esc_url($crossroad_author['link']); ?>">
                                <?php echo esc_html($crossroad_author['name']); ?>
                            </a>
                        <?php endif; ?>

                        <a class="crossroad-post__title" href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>

                        <time class="crossroad-post__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                            <?php media_am_localized_date(get_the_date('j F Y')); ?>
                        </time>
                    </div>
                </article>
            <?php endif; ?>
        </div>

        <?php if (!empty($crossroad_section_bottom_posts)) : ?>
            <div class="crossroad-section__bottom-grid">
                <?php foreach ($crossroad_section_bottom_posts as $post) :
                    setup_postdata($post);
                    $crossroad_author = $crossroad_get_author(get_the_ID());
                ?>
                    <article class="crossroad-post crossroad-post--standard">
                        <div class="crossroad-post__media">
                            <a class="crossroad-post__image hover-image-scale" href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
                                <?php endif; ?>
                            </a>

                            <a class="crossroad-post__tag" href="<?php echo esc_url(get_category_link($crossroad_section_category)); ?>">
                                <?php echo esc_html($crossroad_section_category->name); ?>
                            </a>
                        </div>

                        <div class="crossroad-post__content">
                            <?php if ($crossroad_author['name']) : ?>
                                <a class="crossroad-post__author" href="<?php echo esc_url($crossroad_author['link']); ?>">
                                    <?php echo esc_html($crossroad_author['name']); ?>
                                </a>
                            <?php endif; ?>

                            <a class="crossroad-post__title" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>

                            <time class="crossroad-post__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php media_am_localized_date(get_the_date('j F Y')); ?>
                            </time>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
wp_reset_postdata();
unset($crossroad_section_category_slug, $crossroad_section_posts_count, $crossroad_section_category, $crossroad_section_posts, $crossroad_section_featured_post, $crossroad_section_small_post, $crossroad_section_bottom_posts, $crossroad_get_author, $crossroad_author);
?>
