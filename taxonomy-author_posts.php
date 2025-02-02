<?php
get_header();
?>
<div class="page_content">
    <div class="main_content">
        <div class="author_bio">
            <div class="author_info">
                <?php
                //   $users = get_terms('author_posts');
                $author = get_queried_object();

                $filed = get_fields($author);
                $image = $filed['author_image']['url'];
                // dump($image);

                ?>
                <div class="img_container">
                    <img src="<?php echo $image ?>" class="author_image"> 
                </div>
                
                <div>
                    <h1 class="author_name">
                        <?php echo $author->name ?>
                    </h1>
                    <div class="author_meta">
                        <?php echo $filed['author_meta'] ?>
                    </div>
                    <div class="author_desc">
                        <?php echo $author->description ?>
                    </div>
                </div>
            </div>
            <?php
                $xLink = (array_key_exists('author_tw_link', $filed)) ? $filed['author_tw_link'] : "";
                $facebookLink =  (array_key_exists('author_fb_link', $filed)) ? $filed['author_fb_link'] : "";
            ?>
            <?php include 'templates/author-links.php' ?>
        </div>

        <div class="category_posts">
            
            <div class="title_container">
                <h1 >
                    <?php lang('Հոդվածներ', 'Articles') ?>
                </h1>
            </div>
            <div class="posts_grid">

                <?php
                $author_posts = new WP_Query(array(
                    'posts_per_page' => 8,
                )); 
                // dump( the_post());
                // dump(count($author_posts->posts));
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        include 'templates/post-block.php';
                    endwhile;
                else :
                    echo '<p>No Content Found</p>';
                endif;
                ?>
            </div>
            <div class="posts_pagination">
                 <?php the_posts_pagination(array(
                        'mid_size'           => 2, 
                        'prev_text'         => '', 
                        'next_text'         => '', 
                    )); 
                ?>
            </div>
        </div>
    </div>
    <?php get_sidebar() ?>
</div>







<?php get_footer(); ?>