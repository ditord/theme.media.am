<?php
function media_am_customize_register($wp_customize){
    $wp_customize->add_section('footer',array(
        'title'=>'Footer',
        'description'=>'Footer customization section',
        
    ));
    

    $wp_customize->add_setting('footer_facebook',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_facebook',array(
        'label'=>'Facebook url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    $wp_customize->add_setting('footer_x',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_x',array(
        'label'=>'X url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    $wp_customize->add_setting('footer_telegram',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_telegram',array(
        'label'=>'Telegram url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    $wp_customize->add_setting('footer_youtube',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_youtube',array(
        'label'=>'Youtube url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    $wp_customize->add_setting('footer_instagram',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_instagram',array(
        'label'=>'Instagram url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    $wp_customize->add_setting('footer_tiktok',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_tiktok',array(
        'label'=>'TikTok url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    $wp_customize->add_setting('footer_vim',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_vim',array(
        'label'=>'Vim url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));
    


    $wp_customize->add_setting('footer_p1_arm',array(
        'default'=>__('Սույն կայքը հնարավոր է դարձել Ամերիկայի ժողովրդի առատաձեռն աջակցությամբ՝ ԱՄՆ Միջազգային զարգացման գործակալության (ԱՄՆ ՄԶԳ) միջոցով:')
    ));
    $wp_customize->add_control('footer_p1_arm',array(
        'label'=>'Paragraph 1 arm',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'textarea'
    ));
    $wp_customize->add_setting('footer_p1_eng',array(
        'default'=>__('This website is made possible by the generous support of the American people through the United States Agency for International Development (USAID).')
    ));
    $wp_customize->add_control('footer_p1_eng',array(
        'label'=>'Paragraph 1 eng',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'textarea'
    ));
    $wp_customize->add_setting('footer_p2_arm',array(
        'default'=>__('Բովանդակության համար պատասխանատվություն է կրում Ինտերնյուս Նեթվորքի ենթադրամաշնորհառու Մեդիա նախաձեռնությունների կենտրոնը, և այն պարտադիր չէ, որ արտահայտի ԱՄՆ ՄԶԳ-ի կամ Միացյալ Նահանգների կառավարության տեսակետները:')
    ));
    $wp_customize->add_control('footer_p2_arm',array(
        'label'=>'Paragraph 2 arm',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'textarea'
    ));
    $wp_customize->add_setting('footer_p2_eng',array(
        'default'=>__('The contents are the responsibility of the Media Initiatives Center, a subrecipient of Internews Network, and do not necessarily reflect the views of USAID or the United States Government.')
    ));
    $wp_customize->add_control('footer_p2_eng',array(
        'label'=>'Paragraph 2 eng',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('footer_internews',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_internews',array(
        'label'=>'Internews url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));

    $wp_customize->add_setting('footer_usaid',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_usaid',array(
        'label'=>'USAID url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));

    $wp_customize->add_setting('footer_mic',array(
        'default'=>__('#')
    ));
    $wp_customize->add_control('footer_mic',array(
        'label'=>'Mic url',
        'section'=>'footer',
        'priority'=>1,
        'type'=>'text'
    ));


    $wp_customize->add_panel('verified',array(
        'title'=>'Verified',
        'description'=>'Verified customization settings',
        'priority'=>160,
    ));

    $wp_customize->add_section('verified-block',array(
        'title'=>'Verified block',
        'description'=>'Contact information',
        'panel'=>'verified',
        
    ));

    $wp_customize->add_setting('verified_email',array(
        'default'=>__('example@gmail.com')
    ));
    $wp_customize->add_control('verified_email',array(
        'label'=>'Email for sending content for verification',
        'section'=>'verified-block',
        'priority'=>1,
        'type'=>'text'
    ));

    $wp_customize->add_setting('verified_title_arm',array(
        'default'=>__('Ուղարկեք մեզ նյութեր, որոնք ստուգման կարիք ունեն')
    ));
    $wp_customize->add_control('verified_title_arm',array(
        'label'=>'Verified block title arm',
        'section'=>'verified-block',
        'priority'=>2,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('verified_title_eng',array(
        'default'=>__('Send us the materials that need to be verified.')
    ));
    $wp_customize->add_control('verified_title_eng',array(
        'label'=>'Verified block title eng',
        'section'=>'verified-block',
        'priority'=>3,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('verified_description_arm',array(
        'default'=>__('Ուղարկեք մեզ այն լուրերը, լուսանկարրներն ու տեսանյութները, որոնք ձեր կարծիքով ստուգման կարիք ունեն')
    ));
    $wp_customize->add_control('verified_description_arm',array(
        'label'=>'Verified block description arm',
        'section'=>'verified-block',
        'priority'=>4,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('verified_description_eng',array(
        'default'=>__('Send us the articles, photos and videos that need to be verified by your opinion.')
    ));
    $wp_customize->add_control('verified_description_eng',array(
        'label'=>'Verified block description eng',
        'section'=>'verified-block',
        'priority'=>5,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('header_verified_title_arm',array(
        'default'=>__('Ուղարկեք մեզ նյութեր, որոնք ստուգման կարիք ունեն')
    ));
    $wp_customize->add_control('header_verified_title_arm',array(
        'label'=>'Header verified block title arm',
        'section'=>'verified-block',
        'priority'=>6,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('header_verified_title_eng',array(
        'default'=>__('Send us the materials that need to be verified.')
    ));
    $wp_customize->add_control('header_verified_title_eng',array(
        'label'=>'Header verified block title eng',
        'section'=>'verified-block',
        'priority'=>7,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('single_verdict_badge_action_text_arm',array(
        'default'=>__('Read about this verdict')
    ));
    $wp_customize->add_control('single_verdict_badge_action_text_arm',array(
        'label'=>'Single verdict badge action text arm',
        'section'=>'verified-block',
        'priority'=>8,
        'type'=>'text'
    ));

    $wp_customize->add_setting('single_verdict_badge_action_text_eng',array(
        'default'=>__('Read about this verdict')
    ));
    $wp_customize->add_control('single_verdict_badge_action_text_eng',array(
        'label'=>'Single verdict badge action text eng',
        'section'=>'verified-block',
        'priority'=>9,
        'type'=>'text'
    ));

    $wp_customize->add_section('verified-form',array(
        'title'=>'Verified form',
        'description'=>'Verified form labels',
        'panel'=>'verified',
    ));

    $verified_form_fields = array(
        'verified_form_textarea_1_label' => array(
            'label'=>'Textarea 1 label',
            'type'=>'textarea',
            'default_arm'=>'Պնդումը, որը ձեր կարծիքով կասկածելի է։',
            'default_eng'=>'The claim that you think is suspicious.',
        ),
        'verified_form_textarea_2_label' => array(
            'label'=>'Textarea 2 label',
            'type'=>'textarea',
            'default_arm'=>'Որտեղի՞ց եք այդ մասին տեղեկացել։ Ուղարկեք մեզ բովանդակության (տեսքտ, պատկեր, տեսանյութ) հղումը։',
            'default_eng'=>'Where did you learn about it? Send us the link to the content (text, image, video).',
        ),
        'verified_form_name_input_label' => array(
            'label'=>'Name input label',
            'type'=>'text',
            'default_arm'=>'Ձեր անունը։',
            'default_eng'=>'Your name.',
        ),
        'verified_form_contact_input_label' => array(
            'label'=>'Contact input label',
            'type'=>'text',
            'default_arm'=>'Ինչպես կապ հաստատել ձեզ հետ (հեռախոսահամար, էլ․ փոստի հասցե)։',
            'default_eng'=>'How to contact you (phone number, email address).',
        ),
        'verified_form_agree_input_label' => array(
            'label'=>'Agree input label',
            'type'=>'text',
            'default_arm'=>'Համաձա՞յն եք, որ ձեր անունը հրապարակվի նյութում։',
            'default_eng'=>'Do you agree to have your name published in the article?',
        ),
    );

    $verified_form_priority = 1;
    foreach ($verified_form_fields as $verified_form_setting_id => $verified_form_field) {
        $wp_customize->add_setting($verified_form_setting_id . '_arm',array(
            'default'=>__($verified_form_field['default_arm'])
        ));
        $wp_customize->add_control($verified_form_setting_id . '_arm',array(
            'label'=>$verified_form_field['label'] . ' arm',
            'section'=>'verified-form',
            'priority'=>$verified_form_priority,
            'type'=>$verified_form_field['type']
        ));
        $verified_form_priority++;

        $wp_customize->add_setting($verified_form_setting_id . '_eng',array(
            'default'=>__($verified_form_field['default_eng'])
        ));
        $wp_customize->add_control($verified_form_setting_id . '_eng',array(
            'label'=>$verified_form_field['label'] . ' eng',
            'section'=>'verified-form',
            'priority'=>$verified_form_priority,
            'type'=>$verified_form_field['type']
        ));
        $verified_form_priority++;
    }

    $wp_customize->add_section('cookie-notice',array(
        'title'=>'Cookie notice',
        'description'=>'Cookie notice text',
    ));

    $wp_customize->add_setting('cookie_notice_title_arm',array(
        'default'=>__('Մենք օգտագործում ենք քուքիներ')
    ));
    $wp_customize->add_control('cookie_notice_title_arm',array(
        'label'=>'Cookie notice title arm',
        'section'=>'cookie-notice',
        'priority'=>1,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('cookie_notice_title_eng',array(
        'default'=>__('We use cookies')
    ));
    $wp_customize->add_control('cookie_notice_title_eng',array(
        'label'=>'Cookie notice title eng',
        'section'=>'cookie-notice',
        'priority'=>2,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('cookie_notice_description_arm',array(
        'default'=>__('Մենք օգտագործում ենք քուքիներ կայքի աշխատանքը բարելավելու և բովանդակությունը հարմարեցնելու համար։')
    ));
    $wp_customize->add_control('cookie_notice_description_arm',array(
        'label'=>'Cookie notice description arm',
        'section'=>'cookie-notice',
        'priority'=>3,
        'type'=>'textarea'
    ));

    $wp_customize->add_setting('cookie_notice_description_eng',array(
        'default'=>__('We use cookies to improve the website experience and personalize content.')
    ));
    $wp_customize->add_control('cookie_notice_description_eng',array(
        'label'=>'Cookie notice description eng',
        'section'=>'cookie-notice',
        'priority'=>4,
        'type'=>'textarea'
    ));

}

add_action('customize_register','media_am_customize_register');
