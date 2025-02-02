<?php
get_header();
?>
<div class="page_content">
    <div class="main_content">
        <div class="category_posts">    
            <div class="title_container">
                <h1>
                    <?php single_cat_title();  ?>
                </h1>
            </div>
            <?php if (have_posts()) :?>
            <div class="posts_grid">
                    <?php
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
            <?php else :?>
            <div class="no_content">
                <p><?php lang('Հրապարակումներ չկան','No Content Found');?></p>
            </div>
            <?php endif; ?>
        </div>        
    </div>
    <?php get_sidebar() ?>        
</div>


<?php get_footer(); ?>