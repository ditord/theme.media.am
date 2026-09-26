<?php
$verification_categories = array();
$verification_badge_link_target = 'category';
$verification_badge_show_single_action = !empty($verification_badge_show_single_action);
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
        <?php if ($verification_badge_show_single_action) : ?>
            <div class="verification_rating_badge verification_rating_badge--single">
                <a class="verification_rating_badge__main" href="<?php echo esc_url($badge_url); ?>">
        <?php else : ?>
            <a class="verification_rating_badge" href="<?php echo esc_url($badge_url); ?>">
        <?php endif; ?>
            <?php if ($image_id) : ?>
                <div class="verification_rating_badge__image">
                    <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                </div>
            <?php endif; ?>
            <div class="verification_rating_badge__content">
                <h2 class="verification_rating_badge__title">
                    <?php echo esc_html($verification_category->name); ?>
                </h2>
                <?php if (($description) && (!$verification_badge_show_single_action)) : ?>
                    <div class="verification_rating_badge__description">
                        <?php echo wp_kses_post($description); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($verification_badge_show_single_action) : ?>
                </a>
                <a class="verification_rating_badge__action" href="<?php echo esc_url(home_url('/verdicts/')); ?>">
                    <span><?php echo esc_html(return_lang(get_theme_mod('single_verdict_badge_action_text_arm', 'Read about this verdict'), get_theme_mod('single_verdict_badge_action_text_eng', 'Read about this verdict'))); ?></span>
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"
                         aria-hidden="true" focusable="false">
                        <path d="M20.6001 10.5996C20.6001 12.5774 20.0136 14.5108 18.9148 16.1553C17.816 17.7998 16.2542 19.0815 14.4269 19.8384C12.5997 20.5953 10.589 20.7933 8.6492 20.4075C6.70939 20.0216 4.92756 19.0692 3.52903 17.6707C2.13051 16.2722 1.1781 14.4903 0.792249 12.5505C0.406397 10.6107 0.60443 8.60004 1.36131 6.77277C2.11818 4.94551 3.39991 3.38373 5.0444 2.28491C6.68889 1.1861 8.62229 0.599609 10.6001 0.599609M20.6001 0.599609L10.6001 10.5996M20.6001 6.59961V0.599609H14.6001"
                              stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <?php else : ?>
            </a>
            <?php endif; ?>
    <?php endforeach; ?>
</div>
