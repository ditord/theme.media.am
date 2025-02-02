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


    $wp_customize->add_section('contacts',array(
        'title'=>'Contacts',
        'description'=>'Contact information',
        
    ));

    $wp_customize->add_setting('verified_email',array(
        'default'=>__('example@gmail.com')
    ));
    $wp_customize->add_control('verified_email',array(
        'label'=>'Email for sending content for verification',
        'section'=>'contacts',
        'priority'=>1,
        'type'=>'text'
    ));

}

add_action('customize_register','media_am_customize_register');