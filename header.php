<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?> | <?php
                                        if (is_home() == false) {
                                            $title = return_lang('Մարդիկ են մեդիան | ', 'People are the media | ');
                                            echo $title;
                                            wp_title("");
                                        }
                                        if (is_home() == true) {
                                            $title = return_lang('Մարդիկ են մեդիան', 'People are the media');
                                            echo $title;
                                        }
                                        ?></title>
    <link rel="shortcut icon" href="<?php full_path("images/media.am.ico") ?>" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <?php
    $excerpt = get_the_excerpt()
    ?>

    <?php wp_head() ?>

</head>

<body <?php body_class(); ?>>
    <div class="background-grey"></div>
    <nav class="header_menu">
     
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary'
        ));
        ?>
        <div class="header_menu_logos">
            <div class="header_project">
                <span>
                    <?php $project = return_lang('նախագիծը', 'project by');
                    echo $project;
                    ?>
                </span>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/mic_logo_eng.svg"
                    alt="MIC logo" width="84px" height="37px">
            </div>
            <div class="header_mediaethics">
                <a href="https://mediaethics.am/media-outlets/media-am/" target="_blank">
                    <img decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/logos/media_ethics_new.png" alt="Quality Sign BW">
                </a>              
            </div>
        </div>
    </nav>
    <header class="header">
        <nav class="header_nav">
            <div class="header_flex header_flex1">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header_logo">
                    <?php
                    $logo_srs = return_lang('images/logo_hy.png', 'images/logo_en.png') ?>
                    <img src="<?php full_path($logo_srs) ?>" alt="">
                </a>
                <div class="header_logos">
                    <div class="header_project">
                        <span>
                            <?php $project = return_lang('նախագիծը', 'project by');
                            echo $project;
                            ?>
                        </span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/mic_logo_eng.svg"
                            alt="MIC logo" width="84px" height="37px">
                    </div>
                    <div class="header_mediaethics">
                        <a href="https://mediaethics.am/media-outlets/media-am/" target="_blank">
                            <img decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/logos/media_ethics_new.png" alt="Quality Sign BW">

                        </a>              
                    </div>
                </div>
            </div>
            <div class="header_flex header_flex2">
                <?php do_action('media_am_language_switcher');?>
                
                <div class="header_search_container">
                    <button class="header_open_search">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.svg"
                            height="24px" width="24px">
                        <span><?php lang('որոնում', 'search') ?></span>
                    </button>
                    <div class="header_search_form">
                            <?php get_template_part( 'searchform','header'); ?>
                    </div>    
                </div>
                
                 
                 
                <button class="hamburger" type="button">
                    <img class="header_burger_icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/menu_burger.svg" height="48px" width="48px">
                    <img class="header_close_icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/close_menu.svg" height="48px" width="48px">
                </button>
            </div>
        </nav>
    </header>
        
