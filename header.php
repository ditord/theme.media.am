<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?> | <?php
                                        if (is_home() == false) {
                                            echo return_lang('Մարդիկ են մեդիան | ', 'People are the media | ');
                                            wp_title("");
                                        }
                                        if (is_home() == true) {
                                            echo return_lang('Մարդիկ են մեդիան', 'People are the media');
                                        }
                                        ?></title>
    <link rel="shortcut icon" href="<?php full_path("images/media.am.ico") ?>" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <?php $excerpt = get_the_excerpt() ?>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <div class="background-grey"></div>

    <header class="header <?php echo is_front_page() ? 'header_expended' : 'header_compact'; ?>">
        <nav class="header_nav">
            <div class="header_top">
                <button class="hamburger" type="button" aria-label="Open menu" aria-expanded="false">
                    <img class="header_burger_icon" src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/menu-burger-with-search-icon.svg'); ?>" alt="">
                    <img class="header_close_icon" src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/close_menu.svg'); ?>" alt="">
                </button>

                <a href="<?php echo esc_url(home_url('/')); ?>" class="header_logo">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logos/media.am_logo_new.svg'); ?>" alt="<?php bloginfo('name'); ?>">
                </a>

                <?php if (function_exists('icl_get_languages')) :
                    $languages = icl_get_languages('skip_missing=0');
                    $active_language = null;
                    $other_languages = array();

                    foreach ($languages as $language) {
                        if (!empty($language['active'])) {
                            $active_language = $language;
                        } else {
                            $other_languages[] = $language;
                        }
                    }

                    $active_language_code = $active_language['language_code'] ?? $active_language['code'] ?? ICL_LANGUAGE_CODE;
                    $active_language_label = strtolower($active_language_code) === 'hy' ? 'հայ' : 'eng';
                    ?>
                    <div class="header_language_dropdown">
                        <button class="header_language_button" type="button" aria-expanded="false">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/language-switcher-icon.svg'); ?>" alt="">
                            <span><?php echo esc_html($active_language_label); ?></span>
                        </button>

                        <?php if (!empty($other_languages)) : ?>
                            <div class="header_language_options">
                                <?php foreach ($other_languages as $language) : ?>
                                    <a href="<?php echo esc_url($language['url']); ?>">
                                        <?php echo esc_html($language['native_name']); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="header_primary_menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container_class' => 'header_primary_menu_container',
                ));
                ?>
            </div>

            <div class="header_menu">
                <div class="header_menu_inner">
                    <div class="header_menu_search">
                        <?php get_template_part('searchform', 'header'); ?>
                    </div>

                    <div class="header_menu_content">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container_class' => 'header_menu_grid',
                        ));
                        ?>

                        <div class="header_verified_block">
                            <p class="header_verified_block__title"><?php lang(get_theme_mod('header_verified_title_arm', 'Ուղարկեք մեզ նյութեր, որոնք ստուգման կարիք ունեն'), get_theme_mod('header_verified_title_eng', 'Send us the materials that need to be verified.')); ?></p>
                            <a href="mailto:<?php echo esc_attr(get_theme_mod('verified_email')); ?>" class="header_verified_block__button">
                                <svg width="18" height="18" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                                    <path d="M54.6583 1.10959C54.5174 0.951418 54.3329 0.838481 54.1279 0.785011C53.9229 0.73154 53.7067 0.739927 53.5065 0.809117L4.05659 17.9792C3.88446 18.0386 3.73028 18.1408 3.60855 18.2762C3.48682 18.4117 3.40155 18.5758 3.36076 18.7533C3.31998 18.9307 3.32502 19.1157 3.37541 19.2906C3.42579 19.4656 3.51988 19.6249 3.6488 19.7535L13.2068 29.2829L16.5335 43.8274C16.5335 43.8274 16.5335 43.8918 16.5693 43.9275C16.5859 43.9865 16.6074 44.0439 16.6337 44.0992C16.6622 44.1371 16.6933 44.1729 16.7267 44.2066L16.7839 44.2781C16.8348 44.3238 16.8899 44.3645 16.9485 44.3997L17.0057 44.4426C17.0869 44.4869 17.1735 44.5206 17.2633 44.5428C17.3393 44.5512 17.4161 44.5512 17.4922 44.5428C17.573 44.552 17.6546 44.552 17.7354 44.5428L29.1822 41.6811L33.2028 44.3783C33.3308 44.4642 33.4758 44.5215 33.628 44.5463C33.7801 44.5712 33.9358 44.563 34.0845 44.5222C34.2331 44.4815 34.3713 44.4092 34.4895 44.3103C34.6078 44.2114 34.7033 44.0882 34.7696 43.949L54.83 2.28288C54.9199 2.09208 54.9515 1.87904 54.9209 1.67037C54.8904 1.4617 54.7991 1.26665 54.6583 1.10959ZM26.8642 40.1358L20.4254 41.7527L23.5447 37.9252L26.8642 40.1358ZM33.4246 41.953L24.6464 36.0579L40.8507 14.7241C41.0009 14.527 41.0782 14.2841 41.0697 14.0364C41.0611 13.7888 40.9671 13.5518 40.8037 13.3656C40.6402 13.1794 40.4174 13.0555 40.173 13.0149C39.9286 12.9744 39.6776 13.0196 39.4628 13.143L30.4127 18.2868C30.1651 18.4273 29.9834 18.6603 29.9076 18.9347C29.8318 19.209 29.8681 19.5023 30.0085 19.7499C30.1489 19.9975 30.3819 20.1792 30.6563 20.255C30.9307 20.3308 31.2239 20.2945 31.4715 20.1541L35.9787 17.5929L18.0931 41.1088L15.4103 29.2757L26.9858 22.6938C27.2334 22.5534 27.4151 22.3204 27.4909 22.046C27.5667 21.7717 27.5305 21.4784 27.39 21.2308C27.2496 20.9832 27.0166 20.8015 26.7422 20.7257C26.4679 20.6499 26.1746 20.6862 25.927 20.8266L14.3515 27.4085L6.37455 19.4101L51.7823 3.6708L33.4246 41.953Z" fill="currentColor"/>
                                </svg>
                                <span><?php lang('ուղարկել', 'send'); ?></span>
                            </a>
                            <p class="header_verified_block__email"><?php echo esc_html(get_theme_mod('verified_email')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
