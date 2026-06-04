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

    <header class="header">
        <nav class="header_nav">
            <div class="header_top">
                <button class="hamburger" type="button" aria-label="<?php echo esc_attr(return_lang('Բացել մենյուն', 'Open menu')); ?>" aria-expanded="false">
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

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container_class' => 'header_menu_grid',
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>
