<?php
/**
 * Template Name: Material verification
 */
$material_verification_errors = array();
$material_verification_values = array(
    'claim' => '',
    'source' => '',
    'name' => '',
    'contact' => '',
    'agree' => '',
);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['material_verification_submit'])) {
    $material_verification_values['claim'] = isset($_POST['material_verification_claim']) ? sanitize_textarea_field(wp_unslash($_POST['material_verification_claim'])) : '';
    $material_verification_values['source'] = isset($_POST['material_verification_source']) ? sanitize_textarea_field(wp_unslash($_POST['material_verification_source'])) : '';
    $material_verification_values['name'] = isset($_POST['material_verification_name']) ? sanitize_text_field(wp_unslash($_POST['material_verification_name'])) : '';
    $material_verification_values['contact'] = isset($_POST['material_verification_contact']) ? sanitize_text_field(wp_unslash($_POST['material_verification_contact'])) : '';
    $material_verification_values['agree'] = isset($_POST['material_verification_agree']) ? sanitize_key(wp_unslash($_POST['material_verification_agree'])) : '';

    if (
        !isset($_POST['material_verification_nonce'])
        || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['material_verification_nonce'])), 'material_verification_form')
    ) {
        $material_verification_errors['form'] = true;
    }

    foreach (array('claim', 'source', 'name', 'contact') as $material_verification_required_field) {
        if ($material_verification_values[$material_verification_required_field] === '') {
            $material_verification_errors[$material_verification_required_field] = true;
        }
    }

    if (!in_array($material_verification_values['agree'], array('yes', 'no'), true)) {
        $material_verification_errors['agree'] = true;
    }

    $recipient_values = array_filter(array_map('trim', explode(',', (string) get_theme_mod('verified_email'))));
    $recipients = array();

    foreach ($recipient_values as $recipient_value) {
        $recipient_email = sanitize_email($recipient_value);

        if ($recipient_email && is_email($recipient_email)) {
            $recipients[] = $recipient_email;
        }
    }

    if (empty($material_verification_errors)) {
        $agree_text = $material_verification_values['agree'] === 'yes' ? 'Yes' : 'No';
        $message = "Sender name: {$material_verification_values['name']}\n";
        $message .= "Sender contact: {$material_verification_values['contact']}\n";
        $message .= "Agree to publish name: {$agree_text}\n\n";
        $message .= "Suspicious claim:\n{$material_verification_values['claim']}\n\n";
        $message .= "Source / content link:\n{$material_verification_values['source']}\n";

        $material_verification_mail_sent = false;

        if (empty($recipients)) {
            error_log('Media.am material verification form: no valid recipient emails configured in verified_email.');
        } else {
            $material_verification_mail_sent = wp_mail(
                $recipients,
                'Verification Material Form',
                $message,
                array('Content-Type: text/plain; charset=UTF-8')
            );

            if (!$material_verification_mail_sent) {
                error_log('Media.am material verification form: wp_mail returned false for subject "Verification Material Form" to recipients: ' . implode(', ', $recipients));
            }
        }

        $material_verification_redirect_url = home_url('/');

        if (has_filter('wpml_home_url')) {
            $material_verification_redirect_url = apply_filters('wpml_home_url', $material_verification_redirect_url);
        }

        $material_verification_toast_arg = $material_verification_mail_sent ? 'material_verification_success' : 'material_verification_error';

        wp_safe_redirect(add_query_arg($material_verification_toast_arg, '1', $material_verification_redirect_url));
        exit;
    }
}

get_header();
?>

<div class="page_content section-container">
    <div class="about_us_page_content material_verification_page_content">
        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

        <form class="material_verification_form<?php echo isset($material_verification_errors['form']) ? ' is-danger' : ''; ?>" action="<?php echo esc_url(get_permalink()); ?>" method="post" data-material-verification-form>
            <?php wp_nonce_field('material_verification_form', 'material_verification_nonce'); ?>

            <div class="material_verification_form__field<?php echo isset($material_verification_errors['claim']) ? ' is-danger' : ''; ?>" data-required-field>
                <label for="material_verification_claim">
                    <?php echo esc_html(return_lang(get_theme_mod('verified_form_textarea_1_label_arm', 'Պնդումը, որը ձեր կարծիքով կասկածելի է։'), get_theme_mod('verified_form_textarea_1_label_eng', 'The claim that you think is suspicious.'))); ?>
                </label>
                <textarea id="material_verification_claim" name="material_verification_claim" rows="5"><?php echo esc_textarea($material_verification_values['claim']); ?></textarea>
            </div>

            <div class="material_verification_form__field<?php echo isset($material_verification_errors['source']) ? ' is-danger' : ''; ?>" data-required-field>
                <label for="material_verification_source">
                    <?php echo esc_html(return_lang(get_theme_mod('verified_form_textarea_2_label_arm', 'Որտեղի՞ց եք այդ մասին տեղեկացել։ Ուղարկեք մեզ բովանդակության (տեսքտ, պատկեր, տեսանյութ) հղումը։'), get_theme_mod('verified_form_textarea_2_label_eng', 'Where did you learn about it? Send us the link to the content (text, image, video).'))); ?>
                </label>
                <textarea id="material_verification_source" name="material_verification_source" rows="5"><?php echo esc_textarea($material_verification_values['source']); ?></textarea>
            </div>

            <div class="material_verification_form__field<?php echo isset($material_verification_errors['name']) ? ' is-danger' : ''; ?>" data-required-field>
                <label for="material_verification_name">
                    <?php echo esc_html(return_lang(get_theme_mod('verified_form_name_input_label_arm', 'Ձեր անունը։'), get_theme_mod('verified_form_name_input_label_eng', 'Your name.'))); ?>
                </label>
                <input id="material_verification_name" name="material_verification_name" type="text" value="<?php echo esc_attr($material_verification_values['name']); ?>">
            </div>

            <div class="material_verification_form__field<?php echo isset($material_verification_errors['contact']) ? ' is-danger' : ''; ?>" data-required-field>
                <label for="material_verification_contact">
                    <?php echo esc_html(return_lang(get_theme_mod('verified_form_contact_input_label_arm', 'Ինչպես կապ հաստատել ձեզ հետ (հեռախոսահամար, էլ․ փոստի հասցե)։'), get_theme_mod('verified_form_contact_input_label_eng', 'How to contact you (phone number, email address).'))); ?>
                </label>
                <input id="material_verification_contact" name="material_verification_contact" type="text" value="<?php echo esc_attr($material_verification_values['contact']); ?>">
            </div>

            <fieldset class="material_verification_form__field material_verification_form__field--choice<?php echo isset($material_verification_errors['agree']) ? ' is-danger' : ''; ?>" data-required-radio>
                <legend>
                    <?php echo esc_html(return_lang(get_theme_mod('verified_form_agree_input_label_arm', 'Համաձա՞յն եք, որ ձեր անունը հրապարակվի նյութում։'), get_theme_mod('verified_form_agree_input_label_eng', 'Do you agree to have your name published in the article?'))); ?>
                </legend>

                <div class="material_verification_form__options">
                    <label>
                        <input type="radio" name="material_verification_agree" value="yes" <?php checked($material_verification_values['agree'], 'yes'); ?>>
                        <span><?php echo esc_html(return_lang('Այո', 'Yes')); ?></span>
                    </label>
                    <label>
                        <input type="radio" name="material_verification_agree" value="no" <?php checked($material_verification_values['agree'], 'no'); ?>>
                        <span><?php echo esc_html(return_lang('Ոչ', 'No')); ?></span>
                    </label>
                </div>
            </fieldset>

            <button class="media_am_button material_verification_form__submit" type="submit">
                <?php media_am_verified_send_icon(); ?>
                <span><?php echo esc_html(return_lang('Ուղարկել', 'Send')); ?></span>
            </button>
            <input type="hidden" name="material_verification_submit" value="1">
        </form>
    </div>
</div>

<?php get_footer(); ?>
