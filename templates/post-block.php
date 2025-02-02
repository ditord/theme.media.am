<?php $autor = wp_get_object_terms($post->ID, "author_posts");
// dump($post);
$catname_han = "";
if(is_object($cat) && property_exists($cat,"name")){
    $catname_han = $cat->name;
}

// dump($post->ID);
?>
<div class="post-block"  data-category="<?php echo $catname_han; ?>" data-url="<?php echo esc_url(get_permalink()); ?>">
    <div class="post_primary_category">
        <?php 
        if (get_post_type() == 'podcast'):?>
            <a href="<?php lang(get_site_url().'/hy/'.'podcasts',get_site_url().'/en/'.'podcasts') ?>"><?php lang('ՓՈԴՔԱՍԹ','PODCAST')?></a>
        <?php
        else:
          display_primary_category();
         endif ?>
    </div>
    <a href="<?php the_permalink() ?>" class="post_img_container">
        <?php
           $e =  get_the_post_thumbnail($post->ID);
           $fullPath = get_template_directory_uri() . "/images/transparent_background.png";
           echo $e;
           if($e == ''){
               echo '<img width="600" height="386" src="' . $fullPath  .'" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="wc" srcset="https://media.am/wp-content/uploads/2016/01/transparent_background.png 600w,  300w" sizes="(max-width: 600px) 100vw, 600px">';
           }
        ?>   
    </a>
    <div class="post_meta_container">
        <div class="post_meta_container_child">
        <?php
        // dump($autor);
        if ($autor) {  ?>
        <a href="<?php echo get_term_link($autor[0]->term_id) 
                        ?>" class="post_author">

        <?php $name = $autor[0]->name;
            echo $name;
        } 
        ?>
        </a>

        <a href="<?php the_permalink() ?>" class="post_title">
            <?php the_title() ?>
        </a>
          
        </div>  
        <span class="post_date"> 
            <?php media_am_localized_date(get_the_date('j F Y')) ?>
        </span>
    </div>
</div>
