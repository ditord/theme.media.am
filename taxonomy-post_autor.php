<?php
get_header();
?>
<div class="author-bio">
    <?php echo get_avatar(get_the_author_meta('ID'), 64) ?>
    <h1 class="author-name">
        <?php the_author() ?>
    </h1>
    <div class="author-desc">
        <?php the_author_meta('description') ?>
    </div>
</div>
<?php get_sidebar() ?>
<div class="posts">
    <div class="cat-name-div">
        <h1 class="cat-name">
            Articles
        </h1>
    </div>
    <div class="author-posts">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                include 'templates/post-block.php';
            endwhile;
        else :
            echo '<p>No Content Found</p>';
        endif;
        ?>
    </div>
    <div id="pages">
        <?php echo paginate_links(); ?>
    </div>
</div>


<?php get_footer(); ?>