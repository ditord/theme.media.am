<?php $data_country = wp_get_post_terms($post->ID, "regions");

    $legal_name_and_status =  implode(get_post_meta($post->ID, "wpcf-legal_name_and_status", false));
    $date_of_establishment1 =  implode(get_post_meta($post->ID, "wpcf-date_of_establishment1", false));
    $founder =  implode(get_post_meta($post->ID, "wpcf-founder", false));
    $website = implode(get_post_meta($post->ID, "wpcf-website", false));
    $phone =  implode(get_post_meta($post->ID, "wpcf-phone", false));
    $email =  implode(get_post_meta($post->ID, "wpcf-email", false));
    $address =  implode(get_post_meta($post->ID, "wpcf-address", false));
    $field_facebook_url_title =  implode(get_post_meta($post->ID, "wpcf-field_facebook_url_title", false));
    $field_facebook_url_url =  implode(get_post_meta($post->ID, "wpcf-field_facebook_url_url", false));
    $field_twitter_url_title =  implode(get_post_meta($post->ID, "wpcf-field_twitter_url_title", false));
    $field_twitter_url_url =  implode(get_post_meta($post->ID, "wpcf-field_twitter_url_url", false));
    $key_contact_name =  implode(get_post_meta($post->ID, "wpcf-key_contact_name", false));
    $key_contact_title =  implode(get_post_meta($post->ID, "wpcf-key_contact_title", false));
    $phone =  implode(get_post_meta($post->ID, "wpcf-phone", false));
    $owner =  implode(get_post_meta($post->ID, "wpcf-owner", false));
    ?>
<?php
    if (count($data_country) != 0) {
        echo '<div class="outlet-div" data-country="' . $data_country[0]->name . '">';
    } else {
        echo '<div class="outlet-div" data-country="">';
    }
    ?>

<div class="outlet-div-title"><span></span>
    <h1> <?php the_title() ?> </h1>
</div>
<div class="outlet-fieldset">
    <fieldset>
        <legend><?php lang('Անվանում', 'Name') ?></legend>
        <div>
            <?php display_media_outlet($legal_name_and_status, "Իրավական անվանումն ու կարգավիճակը", "Legal name and status") ?>
        </div>
        <div>
            <?php display_media_outlet($date_of_establishment1, "Հիմնադրման տարեթիվը:", "Legal name and status:") ?>
        </div>
        <div>
            <?php display_media_outlet($founder, "Հիմնադիր:", "Founder:") ?>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php lang('Կոնտակտային տվյալներ', 'Contact details') ?></legend>
        <div>
            <?php display_media_outlet($website, "Կայքի հասցեն:", "Website:") ?>
        </div>
        <div>
            <?php display_media_outlet($phone, "Հեռախոսահամար:", "Phone:") ?>
        </div>
        <div>
            <?php display_media_outlet($founder, "Հիմնադիր:", "Founder:") ?>
        </div>
        <div>
            <?php display_media_outlet($email, "Էլ. փոստ:", "Email:") ?>
        </div>
        <div>
            <?php display_media_outlet($address, "Հասցե:", "Address:") ?>
        </div>
        <div>
            <?php display_media_outlet($field_facebook_url_url, "Facebook", "Facebook") ?>
        </div>
        <div>
            <?php display_media_outlet($field_twitter_url_url, "Twitter", "Twitter") ?>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php lang("Կոնտակտային անձինք", "Key contacts") ?></legend>
        <div>
            <?php display_media_outlet($key_contact_name, "Անուն:", "Name:") ?>
        </div>
        <div>
            <?php display_media_outlet($key_contact_title, "Պաշտոն:", "Title:") ?>
        </div>
    </fieldset>
</div>

</div>