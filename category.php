<?php
get_header();
$category = get_queried_object();
$show_verification_badge = media_am_is_verification_subcategory($category);
?>
<div class="page_content section-container">
    <div class="main_content">
        <div class="category_posts">    
            <?php if (!$show_verification_badge) : ?>
                <div class="title_container">
                    <h1>
                        <?php single_cat_title();  ?>
                    </h1>
                </div>
            <?php endif; ?>
            <?php include 'templates/verification-rating-badge.php' ?>
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
