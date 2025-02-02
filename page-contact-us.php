<?php get_header() ?>

<div class="page_content">
    <div class="contact_us_content">
        <?php the_content() ?>
        <div class="form_container">
        <?php echo do_shortcode( '[ninja_form id=1]' ); ?>
        </div>
    </div>    
</div>


<?php get_footer() ?>