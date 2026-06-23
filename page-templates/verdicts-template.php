<?php
/* Template Name: Verdicts Template */
?>
<?php
$verification_parent_slugs = array(
    'verified',
    'verification',
);

$verification_parent_ids = array();

foreach ($verification_parent_slugs as $verification_parent_slug) {
    $verification_parent = get_category_by_slug($verification_parent_slug);

    if ($verification_parent) {
        $verification_parent_ids[] = $verification_parent->term_id;
    }
}

$verification_categories = array();

foreach ($verification_parent_ids as $verification_parent_id) {
    $child_categories = get_categories(array(
        'taxonomy' => 'category',
        'parent' => $verification_parent_id,
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    if ($child_categories) {
        $verification_categories = array_merge($verification_categories, $child_categories);
    }
}
?>
<?php get_header() ?>

<div class="page_content section-container">
    <main class="verdicts_page">
        <?php the_post(); ?>
        <div class="verdicts_page__intro">
            <h1 class="verdicts_page__title"><?php the_title(); ?></h1>

            <div class="verdicts_page__content">
                <?php the_content(); ?>
            </div>
        </div>

        <?php if ($verification_categories) : ?>
            <div class="verification_rating_badges verdicts_page__badges">
                <?php foreach ($verification_categories as $verification_category) :
                    $image_id = absint(get_term_meta($verification_category->term_id, 'media_am_category_image_id', true));
                    $description = term_description($verification_category->term_id, 'category');
                ?>
                    <a class="verification_rating_badge" href="<?php echo esc_url(get_category_link($verification_category)); ?>">
                        <?php if ($image_id) : ?>
                            <div class="verification_rating_badge__image">
                                <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="verification_rating_badge__content">
                            <h2 class="verification_rating_badge__title">
                                <?php echo esc_html($verification_category->name); ?>
                            </h2>
                            <?php if ($description) : ?>
                                <div class="verification_rating_badge__description">
                                    <?php echo wp_kses_post($description); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</div>

<?php get_footer() ?>
