<?php
//Displaying all posts page content
get_header();
?>
<div class="page_content category_archive category_archive--default">
    <div class="main_content">
        <div class="category_posts section-container">    
            <h1 class="category_posts__title">
                    <?php lang('Բոլոր Նյութերը','All Posts');  ?>
            </h1>
            <?php if (have_posts()) :?>
            <div class="posts_grid">
                    <?php
                    while (have_posts()) : the_post();
                        $category_plain_post_block_category = null;
                        include get_template_directory() . '/templates/post-blocks/category-plain-post-block.php';
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
</div>


<?php
unset($category_plain_post_block_category);
get_footer();
?>
