<?php
$verification_rate = 0;

for ($rate = 5; $rate >= 1; $rate--) {
    if (has_category('verification-rate-' . $rate)) {
        $verification_rate = $rate;
        break;
    }
}

if (!$verification_rate) {
    return;
}
?>

<div class="verification_rating_badge" aria-label="<?php echo esc_attr('Verification rating ' . $verification_rate . ' out of 5'); ?>">
    <span class="verification_rating_badge__label">
        Verification
    </span>
    <span class="verification_rating_badge__score">
        <?php echo esc_html($verification_rate); ?>/5
    </span>
</div>
