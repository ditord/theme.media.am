<?php
get_header();
?>

<?php $user = wp_get_object_terms($post->ID, "author_posts");
// dump($user)
?>


<?php the_post() ?>
<div class="page_content">
    <div class="main_content">
        <div class="post_section">
            
            <div class="post_category_container">
                <h2 >
                    <?php display_primary_category() ?>
                </h2>
            </div>
            <div class="post_meta">
                <div class="post_date">
                    <span class="date_span">
                        <span class="date_bold"><?php lang('Հրապարակվել է ՝ ','Published ')?></span>
                        <?php media_am_localized_date(get_the_date('j F Y')) ?>
                    </span>
                    <?php if (get_the_date('j F Y') !== get_the_modified_date('j F Y')): ?>
                    <span class="date_separator">
                        |
                    </span>
                    <span class="date_span">
                        <span class="date_bold"><?php lang('Թարմացվել է ՝ ','Updated ') ?></span>
                        <?php media_am_localized_date(get_the_modified_date('j F Y'))?>
                    </span>
                    <?php endif ?>
                </div>
                 <h1 class="post_title">
                     <?php the_title() ?>
                 </h1>
        
            </div>
            <?php if ($user) : 
                $author_url =   get_site_url() . return_lang('/hy/','/en/'). 'author_posts/' .  $user[0]->slug;
            ?>
            <div class="author_bio">
                <div class="author_info">
                    <?php
                    //   $users = get_terms('author_posts');
                    $author = get_queried_object();

                
                    $filed = get_fields($user[0]);
                    $image = $filed['author_image']['url'];
                    // dump($image);

                    ?>
                    <div class="img_container">
                        <a href="<?php echo $author_url ?>">
                            <img src="<?php echo $image ?>" class="author_image">
                        </a> 
                    </div>

                    <div>
                        <a class="author_name" href="<?php echo $author_url?>">
                            <?php echo $user[0]->name ?>
                        </a>
                        <div class="author_meta">
                            <?php echo $filed['author_meta']; ?>
                        </div>
                    </div>
                </div>
                <?php
                    $xLink = (array_key_exists('author_tw_link', $filed)) ? $filed['author_tw_link'] : "";
                    $facebookLink =  (array_key_exists('author_fb_link', $filed)) ? $filed['author_fb_link'] : "";
                 ?>
                <?php include 'templates/author-links.php' ?>
            </div>
            <?php endif ?>
            <div class="post_body">
                <div class="post_image">
                    <?php
                    if (!strstr(get_the_post_thumbnail_url(), "transparent_background.png")) {
                        the_post_thumbnail();
                    }
                    ?>
                     <?php
                        $caption = get_field("caption");
                        if($caption):?>   
                            <figcaption>
                                <?php
                                 echo $caption;
                                 ?>
                            </figcaption>
                        <?php endif ?>
                </div>
                <div class="post_content">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php include 'templates/share-buttons.php' ?>
    </div>
    <?php get_sidebar() ?>
    <?php if(get_post_meta(get_the_ID(), 'show_send_mail', true) === 'yes'): ?>
    <div class="mobile_verified">
        <?php include 'templates/verified-block.php'; ?>
    </div>
    <?php endif; ?>
    <div class="posts_carousel">
         <div class="swiper">
            
            <div class="swiper-wrapper">
                <?php
                    $side_Bar_Posts = new WP_Query(array(
                        'posts_per_page' => 6,
                        'post__not_in' => array($post->ID)
                    ));
                    if ($side_Bar_Posts->have_posts()) :
                        while ($side_Bar_Posts->have_posts()) : $side_Bar_Posts->the_post();
                        ?>
                        <div class="swiper-slide">
                            <?php include 'templates/post-block.php'; ?>
                        </div>
                         <?php   
                        endwhile;
                    endif;
                    wp_reset_postdata()
                ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer() ?>