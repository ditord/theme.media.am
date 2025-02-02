<div class="card_stacks">
 <p class="date" style="color : <?php echo get_field('color_of_overlay'); ?> ;"><?php the_date() ?></p>
<div class="image-block">
<img src="<?php full_path('images/transparent_background.png') ?>
" width="384" height="250">
</div>
    <div class="post-name-div">
        <span>
            <a href="<?php the_permalink() ?>" class="post-name" style="color : <?php echo get_field('color_of_overlay'); ?> ;">
                <?php the_title() ?>
            </a>
        </span>
    </div>
   
</div>

<style>
    .card_stacks:hover{
        background-color: <?php echo get_field('color_of_overlay'); ?>;
    }
    .card_stacks:hover  * {
    color: white !important;
    }
    </style>