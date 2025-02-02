<?php  
/* Template Name: Podcast Template */
?>
<?php
$pageID = get_the_ID();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<?php get_header() ?>
<?php 
$args = array(
    'post_type' => 'podcast',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => 6,
    'paged' => $paged  
);
$loop = new WP_Query($args); 
?>

<?php 
function sortByOrder($a, $b) {
   $autor1 = get_field('wpcf-order', $a->ID, false);
   $autor2 = get_field('wpcf-order', $b->ID, false);

   $order1 = $autor1 ? $autor1 : 1000;
   $order2 = $autor2 ? $autor2 : 1000;

   return $order1 - $order2;
}
//usort($loop->posts, 'sortByOrder');

?>
<div class="page_content"> 
    <div class="podcasts_content">
        <?php the_content() ?>
    </div>

    <div class="podcasts_main">
        <div class="podcasts_notice">
            <?php 
            $tapl = implode(get_post_meta($pageID, "wpcf-text-after-podcast-list", false)); 
            ?>
            <p><?php echo $tapl; ?></p>
        </div>
        <div class="podcasts_grid">
            <?php
               while ($loop->have_posts()) : $loop->the_post();
               include get_template_directory() . '/templates/podcast_block.php';
               endwhile;
            ?>
        </div>
        
        
        <div class="posts_pagination">
            <?php
            echo paginate_links(array(
                'total'        => $loop->max_num_pages,
                'current'      => $paged,
                'mid_size'     => 2,
                'prev_text'    => __(''),
                'next_text'    => __(''),
            ));
            ?>
        </div>
    </div>
</div>
<?php
wp_reset_postdata();  
get_footer();
?>
