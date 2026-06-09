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
                $crossroad_author = wp_get_object_terms(get_the_ID(), 'author_posts');
                $crossroad_author_name = (!is_wp_error($crossroad_author) && !empty($crossroad_author)) ? $crossroad_author[0]->name : '';
                $crossroad_author_link = (!is_wp_error($crossroad_author) && !empty($crossroad_author)) ? get_term_link($crossroad_author[0]) : '';
                if (is_wp_error($crossroad_author_link)) {
                    $crossroad_author_link = '';
                }
                ?>
                <article class="crossroad-section__small-card">
                    <a class="crossroad-section__category" href="<?php echo esc_url(get_category_link($crossroad_section_category)); ?>">
                        <?php echo esc_html($crossroad_section_category->name); ?>
                    </a>
                    <a class="crossroad-section__small-title" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <time class="crossroad-section__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <?php media_am_localized_date(get_the_date('j F Y')); ?>
                    </time>
                    <?php if ($crossroad_author_name) : ?>
                        <a class="viewpoint-post-block__author crossroad-section__author" href="<?php echo esc_url($crossroad_author_link); ?>">
                            <span><?php echo esc_html($crossroad_author_name); ?></span>
                        </a>
                    <?php endif; ?>
                </article>
            <?php endif; ?>

            <?php if ($crossroad_section_featured_post) : ?>
                <?php
                $post = $crossroad_section_featured_post;
                setup_postdata($post);
                $viewpoint_post_block_modifier = 'viewpoint-post-block--featured crossroad-section__featured';
                include get_template_directory() . '/templates/post-blocks/viewpoint-post-block.php';
                unset($viewpoint_post_block_modifier);
                ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($crossroad_section_bottom_posts)) : ?>
            <div class="crossroad-section__bottom-grid">
                <?php foreach ($crossroad_section_bottom_posts as $post) :
                    setup_postdata($post);
                    $crossroad_author = wp_get_object_terms(get_the_ID(), 'author_posts');
                    $crossroad_author_name = (!is_wp_error($crossroad_author) && !empty($crossroad_author)) ? $crossroad_author[0]->name : '';
                    $crossroad_author_link = (!is_wp_error($crossroad_author) && !empty($crossroad_author)) ? get_term_link($crossroad_author[0]) : '';
                    if (is_wp_error($crossroad_author_link)) {
                        $crossroad_author_link = '';
                    }
                ?>
                    <article class="plain-post-block crossroad-section__bottom-card">
                        <a class="plain-post-block__image hover-image-scale" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/images/transparent_background.png'); ?>" alt="">
                            <?php endif; ?>
                        </a>

                        <a class="plain-post-block__tag" href="<?php echo esc_url(get_category_link($crossroad_section_category)); ?>">
                            <?php echo esc_html($crossroad_section_category->name); ?>
                        </a>

                        <div class="plain-post-block__content">
                            <?php if ($crossroad_author_name) : ?>
                                <a class="viewpoint-post-block__author crossroad-section__author" href="<?php echo esc_url($crossroad_author_link); ?>">
                                    <span><?php echo esc_html($crossroad_author_name); ?></span>
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
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
wp_reset_postdata();
unset($crossroad_section_category_slug, $crossroad_section_posts_count, $crossroad_section_category, $crossroad_section_posts, $crossroad_section_featured_post, $crossroad_section_small_post, $crossroad_section_bottom_posts, $crossroad_author, $crossroad_author_name, $crossroad_author_link);
?>
