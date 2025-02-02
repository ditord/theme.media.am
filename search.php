<?php get_header(); ?>
<div class="page_content">
    <div class="search_content">
        <div class="title_container">
            <span><?php lang('ՈՐՈՆՈՒՄ','SEARCH') ?></span>
        </div>
        <div class="search_form">
            <?php
           get_search_form();
           ?>
        </div>    
        
         <?php if (have_posts()) :?>
            <div class="search_results">
                <?php
                 while (have_posts()) : the_post();
                     include 'templates/post-block.php';
                 endwhile; ?>
            </div>
             <?php else: ?>
             <div class="not_found_container">
                <span><?php lang('Արդյունք չկա ... ','Nothing found ... ') ?></span>
             </div>
             <?php endif ?>
        
        
         <div class="posts_pagination">
             <?php the_posts_pagination(array(
                     'mid_size'           => 2, 
                     'prev_text'         => '',  
                     'next_text'         => '',  
                 )); 
             ?>
         </div>
    </div>
    <?php get_sidebar() ?>        
</div>
<?php get_footer(); ?>