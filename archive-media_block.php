<?php
get_header();
include 'templates/media-outlets-filter.php';
$args = array(
    'post_type' => 'media_block',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
);
$loop = new WP_Query($args);
while ($loop->have_posts()) : $loop->the_post();
include 'templates/media-outlets.php'; ?>
    
<?php endwhile; ?>
<?php

get_footer();
