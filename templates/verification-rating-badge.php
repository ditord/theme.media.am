<?php
$verification_categories = array();
$verification_badge_link_target = 'category';
$queried_category = get_queried_object();

if (is_category() && $queried_category instanceof WP_Term) {
    if (media_am_is_verification_subcategory($queried_category)) {
        $verification_categories[] = $queried_category;
        $verification_badge_link_target = 'verdicts';
    }
} else {
    $post_categories = get_the_category();

    foreach ($post_categories as $category) {
        if (media_am_is_verification_subcategory($category)) {
            $verification_categories[] = $category;
        }
    }
}

if (!$verification_categories) {
    return;
}
?>

<div class="verification_rating_badges">
    <?php foreach ($verification_categories as $verification_category) :
        $image_id = absint(get_term_meta($verification_category->term_id, 'media_am_category_image_id', true));
        $description = term_description($verification_category->term_id, 'category');
        $badge_url = ($verification_badge_link_target === 'verdicts') ? home_url('/verdicts/') : get_category_link($verification_category);
    ?>
        <a class="verification_rating_badge" href="<?php echo esc_url($badge_url); ?>">
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
