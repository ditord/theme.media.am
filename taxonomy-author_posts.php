<?php
get_header();
$author = get_queried_object();
$filed = get_fields($author);
$filed = is_array($filed) ? $filed : array();
$image = isset($filed['author_image']['url']) ? $filed['author_image']['url'] : '';
?>
<div class="page_content category_archive">
    <div class="main_content">
        <div class="section-container author_bio_container">
            <div class="author_bio">
                <div class="author_info">
                    <?php if ($image) : ?>
                        <div class="img_container">
                            <img src="<?php echo esc_url($image); ?>" class="author_image"
                                 alt="<?php echo esc_attr($author->name); ?>">
                        </div>
                    <?php endif; ?>

                    <div>
                        <h1 class="author_name">
                            <?php echo esc_html($author->name); ?>
                        </h1>
                        <?php if (!empty($filed['author_meta'])) : ?>
                            <div class="author_meta">
                                <?php echo wp_kses_post($filed['author_meta']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($author->description)) : ?>
                            <div class="author_desc">
                                <?php echo wp_kses_post($author->description); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                $xLink = array_key_exists('author_tw_link', $filed) ? $filed['author_tw_link'] : '';
                $facebookLink = array_key_exists('author_fb_link', $filed) ? $filed['author_fb_link'] : '';
                ?>
                <?php include get_template_directory() . '/templates/author-links.php'; ?>
            </div>
        </div>

        <div class="category_posts section-container">
            <h1 class="category_posts__title">
                <?php lang('Հոդվածներ', 'Articles'); ?>
            </h1>

            <?php if (have_posts()) : ?>
                <div class="posts_grid">
                    <?php
                    while (have_posts()) : the_post();
                        include get_template_directory() . '/templates/post-blocks/category-plain-post-block.php';
                    endwhile;
                    ?>
                </div>
                <div class="posts_pagination">
                    <?php
                    the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '',
                            'next_text' => '',
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="no_content">
                    <p><?php lang('Հրապարակումներ չկան', 'No Content Found'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
