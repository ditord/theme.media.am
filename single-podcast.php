<?php
$name =  implode(get_post_meta($post->ID, "wpcf-author-name", false));
$description =  implode(get_post_meta($post->ID, "wpcf-podcast-description", false));
$whooshkaa =  implode(get_post_meta($post->ID, "wpcf-whooshkaa", false));
$anchor = implode(get_post_meta($post->ID, "wpcf-anchor", false));
$itunes =  implode(get_post_meta($post->ID, "wpcf-itunes", false));
$youtube =  implode(get_post_meta($post->ID, "wpcf-youtube", false));
$rss =  implode(get_post_meta($post->ID, "wpcf-rss", false));
$web_site =  implode(get_post_meta($post->ID, "wpcf-web-site", false));
$soundcloud =  implode(get_post_meta($post->ID, "wpcf-soundcloud", false));
$facebook =  implode(get_post_meta($post->ID, "wpcf-facebook", false));
$google_podcast =  implode(get_post_meta($post->ID, "wpcf-google-podcast", false));


$embed =  get_post_meta($post->ID, "wpcf-embed", false);
$author = get_queried_object();
$podcasts = new WP_Query(array(
    'post_type' => 'podcast',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => 4,
    'post__not_in' => array($post->ID)
));
$filed = get_fields($the_query);
?>
<?php get_header() ?>

<div class="page_content">
    <div class="main_content">
        <div class="post_section">
            
            <div class="post_category_container">
                <h2 >
                    <?php lang('ՓՈԴՔԱՍԹ','PODCAST') ?>
                </h2>
            </div>
            <div class="post_meta">
                <span class="post_date">
                    <?php media_am_localized_date(get_the_date('j F Y')) ?>
                </span>
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
                        <div class="author_desc">
                            <?php echo $user[0]->description ?>
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
                </div>
                <div class="podcast_content">
                    <?php 
                    echo $embed[0];
                    ?>
                    <div class="podcast_players">
                        <h3><?php lang("Լսել`", "Listen") ?></h3>
                        <?php
                        if (strlen($google_podcast) != 0) {
                                echo '<a href="' . $google_podcast . '" class="player_icon google_podcast" target="_blank"></a>';
                        }
                        if (strlen($whooshkaa) != 0) {
                            echo '<a href="' . $whooshkaa . '" class="player_icon whooshkaa" target="_blank"></a>';
                        }
                        if (strlen($itunes) != 0) {
                            echo '<a href="' . $itunes . '" class="player_icon itunes" target="_blank"></a>';
                        }
                        if (strlen($youtube) != 0) {
                            echo '<a href="' . $youtube . '" class="player_icon youtube" target="_blank"></a>';
                        }
                        if (strlen($rss) != 0) {
                            echo '<a href="' . $rss . '" class="player_icon rss" target="_blank"></a>';
                        }
                        if (strlen($web_site) != 0) {
                            echo '<a href="' . $web_site . '" class="player_icon web_site" target="_blank"></a>';
                        }
                        if (strlen($soundcloud) != 0) {
                            echo '<a href="' . $soundcloud . '" class="player_icon soundcloud" target="_blank"></a>';
                        }
                        if (strlen($facebook) != 0) {
                            echo '<a href="' . $facebook . '" class="player_icon facebook" target="_blank"></a>';
                        }
                        if (strlen($anchor) != 0) {
                            echo '<a href="' . $anchor . '" class="player_icon anchor" target="_blank"></a>';
                        }
                        ?>
                    </div>  
                    <p class="podcast_desc">
                        <?php echo $description ?>
                    </p>
                    
                </div>
            </div>
        </div>
        <?php include 'templates/share-buttons.php' ?>
    </div>
    <aside>
        <div id="podcastset">
                <?php
                if ($podcasts->have_posts()) :
                    while ($podcasts->have_posts()) : $podcasts->the_post();

                     include 'templates/podcast_block.php';
                
                    endwhile;
                endif;

                ?>
        </div>
    </aside>


    <div class="posts_carousel podcasts_carousel">
         <div class="swiper">
            
            <div class="swiper-wrapper">
                <?php
                    $side_Bar_Posts = new WP_Query(array(
                        'posts_per_page' => 6,
                        'post_type' => 'podcast',
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
