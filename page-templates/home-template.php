<?php
/* Template Name: Home Page */
?>

<?php
get_header();
?>
<div class="page_content">
    <div class="home_posts">
        <div class="section-container">
            <?php

            $featured_posts = new WP_Query(array(
                    'posts_per_page' => 6,
                    'category_name' => 'featured-post',
                    'orderby' => 'date',
                    'order' => 'DESC',
            ));

            if ($featured_posts->have_posts()) : ?>
                <div class="posts_featured">
                    <div class="posts_featured__swiper swiper">
                        <div class="swiper-wrapper">
                            <?php while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                                <div class="swiper-slide">
                                    <?php include get_template_directory() . '/templates/post-blocks/featured-slide-post-block.php'; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            wp_reset_postdata();
            ?>

            <div class="posts_add_banner banner-1">
                <?php dynamic_sidebar('advertisement-banner-1'); ?>
            </div>
        </div>

        <?php
        $section_category_slug = 'newsroom';
        $section_posts_count = 5;
        include get_template_directory() . '/templates/sections/category-plain-posts-section.php';
        ?>

        <?php
        $viewpoint_section_category_slug = 'critique';
        $viewpoint_section_posts_count = 6;
        include get_template_directory() . '/templates/sections/viewpoint-section.php';
        ?>

        <?php
        $verified_section_category_slug = 'verified';
        $verified_section_posts_count = 5;
        include get_template_directory() . '/templates/sections/verified-posts-section.php';
        ?>

        <?php
        $library_slider_category_slug = 'in-the-library';
        $library_slider_posts_count = 6;
        include get_template_directory() . '/templates/sections/library-slider-section.php';
        ?>

        <?php
        $viewpoint_section_category_slug = 'crossroad';
        $viewpoint_section_posts_count = 6;
        include get_template_directory() . '/templates/sections/viewpoint-section.php';
        ?>

        <?php
        $vox_populi_section_category_slug = 'vox-populi';
        $vox_populi_section_posts_count = 6;
        include get_template_directory() . '/templates/sections/vox-populi-section.php';
        ?>

        <div class="section-container">
            <div class="posts_add_banner">
                <?php dynamic_sidebar('advertisement-banner-2'); ?>
            </div>
        </div>
    </div>

    <?php
    $scene_slider_category_slug = 'on-the-scene';
    $scene_slider_posts_count = 6;
    include get_template_directory() . '/templates/sections/scene-slider-section.php';
    ?>

    <?php
    $media_literacy_slider_category_slug = 'viewpoint';
    $media_literacy_slider_posts_count = 6;
    include get_template_directory() . '/templates/sections/media-literacy-slider-section.php';
    ?>


    <?php
    $announcements_section_category_slug = 'announcements';
    $announcements_section_posts_count = 3;
    include get_template_directory() . '/templates/sections/announcements-section.php';
    ?>

    <div class="authors_carousel">
        <div class="authors_carousel__inner section-container">
            <div class="title_container">
                <h3><?php lang('ՀԵՂԻՆԱԿՆԵՐ', 'AUTHORS') ?></h3>
            </div>
            <?php $users = get_terms('author_posts') ?>
            <?php
            function sortByOrder($a, $b)
            {
                $autor1 = get_fields($a);
                $autor2 = get_fields($b);


                $order1 = array_key_exists("author_order_in_first_page", $autor1) ? $autor1["author_order_in_first_page"] : 1000;
                $order2 = array_key_exists("author_order_in_first_page", $autor2) ? $autor2["author_order_in_first_page"] : 1000;

                //$a1 = property_exists($a,"author_order_in_first_page") ? $a->author_order_in_first_page : 1000;
                //$b1 = property_exists($b,"author_order_in_first_page") ? $b->author_order_in_first_page : 1000;
                return $order1 - $order2;
            }

            usort($users, 'sortByOrder');
            ?>


            <div class="swiper">

                <div class="swiper-wrapper">
                    <?php foreach ($users as $author) : ?>
                        <?php
                        $filed = get_fields($author);
                        $image = $filed['author_image']['sizes']['thumbnail'];
                        //dump($filed);
                        $hideAuthor = (array_key_exists("author_hideinfirstpage", $filed)) ? $filed["author_hideinfirstpage"] : "";
                        ?>

                        <?php if (!$hideAuthor) { ?>
                            <div class="swiper-slide">
                                <a href="<?php echo get_term_link($author->term_id); ?>">
                                    <div class="author_info_container">
                                        <span class="author_image hover-image-scale">
                                            <img src="<?php echo $image ?>">
                                        </span>

                                        <div class="author_meta_container">
                                            <p class="author_name">
                                                <?php echo $author->name ?>
                                            </p>

                                            <p class="author_title">
                                                <?php echo $filed['author_meta']; ?>
                                            </p>
                                        </div>

                                    </div>


                                </a>
                            </div>
                        <?php } ?>

                    <?php
                        // endif;
                    endforeach; ?>
                </div>

            </div>
        </div>
    </div>

    <div class="posts_add_banner_double">
        <?php dynamic_sidebar('advertisement-banner-3'); ?>
    </div>

</div>


<?php get_footer(); ?>
