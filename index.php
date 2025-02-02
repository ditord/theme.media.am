<?php
get_header();

?>
<div class="posts">
    <?php

    $featured_post_id = null;
    $futured_post = new WP_Query(array(
        'posts_per_page' => 1,
        'category_name' =>'futured-post , futured-post-en'
    ));

    if ($futured_post->have_posts()) :
        while ($futured_post->have_posts()) : $futured_post->the_post(); ?>
            <div class="post-block-big">
                <?php
                        $featured_post_id = $futured_post->ID;
                        include 'templates/post-block-future.php';
                ?>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata(); 

    $all_posts = new WP_Query(array(
        'posts_per_page' => 9,
       'post__not_in' => array($futured_post->posts[0]->ID)
    ));
    if ($all_posts->have_posts()) :
        while ($all_posts->have_posts()) : $all_posts->the_post();
            include 'templates/post-block.php';
        endwhile;
    endif;
    ?>
</div>
<div id="han-show-more-div">
</div> 

<!-- <div style="display:none"> -->


<!-- </div> -->
<div id="dinamic_gallery">
    <?php dynamic_sidebar('gallery') ?>
</div>
<div id="dinamic_gallery_mediabattle">
    <?php dynamic_sidebar('gallery-mediabattle') ?>
</div>
<!-- <div id="organization">
    <h2><?php lang('ԼՐԱՏՎԱՄԻՋՈՑՆԵՐ', 'MEDIA OUTLETS') ?></h2>
    <div id="image-block">

        <ul>
            <li>
               <?php //echo //home_url() ?>
                <a href="<?php  lang("/media_outlet_style/onlinemedia/","/media_outlet_style/onlinemedia-en/?lang=en") ?> ">
                    <div></div>
                    <h3><?php lang('Օնլայն մեդիա', 'Online media') ?> </h3>
                </a>
            </li>
            <li>
                <a href="<?php lang('/media_outlet_style/printmedia/','/media_outlet_style/printmedia-en/?lang=en') ?>">
                    <div></div>
                    <h3> <?php lang('Տպագիր մամուլ', 'Print Media') ?> </h3>
                </a>
            </li>
            <li>
                <a href="<?php lang('/media_outlet_style/radio/','/media_outlet_style/radio-en/?lang=en') ?>">
                    <div></div>
                    <h3><?php lang('Ռադիո', 'Radio') ?> </h3>
                </a>
            </li>
            <li>
                <a href="<?php lang('/media_outlet_style/mediaorganizations/','/media_outlet_style/mediaorganizations-en/?lang=en') ?>">
                    <div></div>
                    <h3><?php lang('Մեդիա', 'Media') ?> <br> <?php lang('կազմակերպու</br>թյուններ', 'Organizations') ?> </h3>
                </a>
            </li>
            <li>
                <a href="<?php lang('/media_outlet_style/tvcompanies/','/media_outlet_style/tvcompanies-en/?lang=en') ?>">
                    <div></div>
                    <h3><?php lang('Հեռուստա ընկերություններ', 'TV Companies') ?> </h3>
                </a>
            </li>
            <li>
                <a href="<?php lang('/media_outlet_style/productionstudios/','/media_outlet_style/productionstudios-en/?lang=en') ?>">
                    <div></div>
                    <h3><?php lang('Արտադրող', 'Production') ?> <br> <?php lang('ստուդիաներ', 'Studios') ?> </h3>
                </a>
            </li>





        </ul>
    </div>
</div> -->
<?php get_footer(); ?>
