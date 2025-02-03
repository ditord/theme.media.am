<?php
/* Template Name: Home Page */
?>

<?php
get_header();
?>
<div class="page_content">
<div class="home_posts">
    <?php

    $featured_post_id = null;
    $futured_post = new WP_Query(array(
        'posts_per_page' => 1,
        'category_name' =>'featured-post'
    ));

    if ($futured_post->have_posts()) :
        while ($futured_post->have_posts()) : $futured_post->the_post(); ?>
            <div class="posts_featured">
                <?php
                        $featured_post_id = $futured_post->ID;
                        include get_template_directory() . '/templates/post-block-featured.php';
                ?>
            </div>
    <?php endwhile;
    endif;
    wp_reset_postdata(); 
    ?>
    
    <div class="posts_add_banner">
        <?php dynamic_sidebar('advertisement-banner-1');  ?>
    </div>

    <div class="posts_grid">
        <?php
            $all_posts = new WP_Query(array(
                'posts_per_page' => 9,
               'post__not_in' => array($futured_post->posts[0]->ID)
            ));
            if ($all_posts->have_posts()) :
                while ($all_posts->have_posts()) : $all_posts->the_post();
                    include get_template_directory() . '/templates/post-block.php';
                endwhile;
            endif;
        ?>
    </div>
    <div class="home_verified">
        <?php include get_template_directory() . '/templates/verified-block.php';?>
    </div>
    <div class="posts_add_banner">
        <?php dynamic_sidebar('advertisement-banner-2');  ?>
    </div>
</div>

<div class="authors_carousel">
        <div class="title_container">
            <h3><?php lang('ՀԵՂԻՆԱԿՆԵՐ', 'AUTHORS') ?></h3>
        </div>
        <?php $users = get_terms('author_posts') ?>
            <?php 
                function sortByOrder($a, $b) {
                    $autor1 = get_fields($a);
                    $autor2 = get_fields($b);


                    $order1 = array_key_exists("author_order_in_first_page",$autor1) ? $autor1["author_order_in_first_page"] : 1000;
                    $order2 = array_key_exists("author_order_in_first_page",$autor2) ? $autor2["author_order_in_first_page"] : 1000;

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
                            $hideAuthor = (array_key_exists("author_hideinfirstpage",$filed)) ? $filed["author_hideinfirstpage"] : "";
                        ?>

                        <?php if(!$hideAuthor) { ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_term_link($author->term_id); ?>">
                                <img src="<?php echo $image ?>">

                                <p class="author_name">
                                    <?php echo $author->name ?>
                                </p>

                                <p class="author_title">
                                    <?php echo $filed['author_meta']; ?>
                                </p>
                            </a>
                        </div>
                        <?php } ?>
                        
                    <?php
                    // endif;
                    endforeach; ?>
            </div>

            <div class="swiper-button-prev swiper-button"></div>
            <div class="swiper-button-next swiper-button"></div>

        </div>          
    </div>

<div class="posts_add_banner_double">
        <?php dynamic_sidebar('advertisement-banner-3');  ?>
</div>

</div>



</div>

<?php get_footer(); ?>
