<?php
get_header();
?>
<div class="page_content">
    <div class="main_content">
        <div class="category_posts">    
            <div class="title_container date_title_container">
                <h1>
                    <?php media_am_localized_date(get_the_date('F Y'))  ?>
                </h1>
            </div>
            <div class="posts_grid">
                <?php if (have_posts()) :
                    while (have_posts()) : the_post();
                        include 'templates/post-block.php';
                    endwhile; ?>
            </div>
            <div class="posts_pagination">
                <?php the_posts_pagination(array(
                        'mid_size'           => 2, 
                        'prev_text'         => '',  
                        'next_text'         => '',  
                    )); 
                ?>
            </div>
                <?php else :
                    echo '<p>No Content Found</p>';
                endif; ?>
        </div>        
    </div>
    <?php get_sidebar() ?>        
</div>


<?php get_footer(); ?>