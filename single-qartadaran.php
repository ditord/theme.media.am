<?php get_header() ?>
<?php the_post(); ?>
<h2><?php the_title(); ?></h2>
<?php include 'templates/shareing-buttons.php' ?>
    <div id="grid">
    <div class="single-card_stack">
<?php $stories = types_child_posts('story'); 
$iteration = 0;
    foreach($stories as $story){
        echo '<div class="cards-block" data-iter="' . ++$iteration . '">';
        echo '<h4>' . $iteration . '</h4>';
        echo "<h3>" .  get_post_meta($story->ID, 'wpcf-question', true) . "</h3>"; 
        echo "<p>"  . get_post_meta($story->ID, 'wpcf-answer', true) . "</p>"; 
        echo '</div>';
    }
?>
</div>
<div class="card_stack_sidebar">
<div class="date">
        <?php echo '<span>' .   get_the_date() .  '</span>'; ?>
    </div>
    <?php 
    $iteration2 = 0;
    foreach($stories as $story){
        echo '<div class="cards-block" data-iter="' . ++$iteration2 . '">';
        echo '<h4>' . $iteration2 . '</h4>';
        echo  '<h3>' .get_post_meta($story->ID, 'wpcf-question', true) . '</h3>' ; 
        echo '</div>';
    }
    ?>
</div>
</div>
<?php get_footer() ?>