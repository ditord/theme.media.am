<?php get_header() ?>
<?php $args = array(
    'post_type' => 'qartadaran',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
);
$loop = new WP_Query($args); ?>
<div id="all_card_stacks">
    <?php while ($loop->have_posts()) : $loop->the_post();
        include 'templates/card_stacks_block.php';
    endwhile; ?>
</div>
<?php get_footer() ?>