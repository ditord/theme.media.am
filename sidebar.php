<?php $post->ID ?>
<aside>
    <div id="newsset">
        <?php if( (is_category('verified')) || (is_single() && get_post_meta(get_the_ID(), 'show_send_mail', true) === 'yes') ):
            include 'templates/verified-block.php';
         endif; ?>    
        <?php if(is_category() || (is_home() && !is_front_page()) || is_date()): ?>
        <div class="calendar_container">
            <?php 
                dynamic_sidebar( 'calendar-widget' );
            ?>
        </div>
        <?php endif; ?>
        <?php
        $side_Bar_Posts = new WP_Query(array(
            'posts_per_page' => 4,
            'post__not_in' => array($post->ID)
        ));
        if ($side_Bar_Posts->have_posts()) :
            while ($side_Bar_Posts->have_posts()) : $side_Bar_Posts->the_post();
                include 'templates/post-block.php';
            endwhile;
        endif;
        wp_reset_postdata()

        ?>
        
    </div>
</aside>