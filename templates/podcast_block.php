<?php
$author_name = implode(get_post_meta($post->ID, "wpcf-author-name", false));
$description = implode(get_post_meta($post->ID, "wpcf-podcast-description", false));
// $tags =  get_the_tag_list('<button class="h_tag">', '</button><button class="h_tag">', '</button>');
$excerpt = get_the_excerpt();
$anchor = implode(get_post_meta($post->ID, "wpcf-anchor", false));
$whooshkaa = implode(get_post_meta($post->ID, "wpcf-whooshkaa", false));
$itunes = implode(get_post_meta($post->ID, "wpcf-itunes", false));
$youtube = implode(get_post_meta($post->ID, "wpcf-youtube", false));
$soundcloud = implode(get_post_meta($post->ID, "wpcf-soundcloud", false));
$rss = implode(get_post_meta($post->ID, "wpcf-rss", false));
$web_site = implode(get_post_meta($post->ID, "wpcf-web-site", false));
$facebook = implode(get_post_meta($post->ID, "wpcf-facebook", false));
$tags = get_the_tags();
$order = implode(get_post_meta($post->ID, "wpcf-order", false));
if($order == ''){
    $order = 1000;
}   
?>
<div class="podcast_block" data-id="<?php echo $post->ID  ?>" data-url="<?php echo esc_url(get_permalink()); ?>">
    
    <a href="<?php echo get_permalink($post); ?>" class="img_container">
        <?php the_post_thumbnail('podcast') ?>
    </a>
    <div class="meta_container">
        <a href="<?php echo esc_url(get_permalink()); ?>" class="excerpt"> <?php the_excerpt(); ?></a>
        <div class="tags_container">
            <?php 
                foreach($tags as $tag){
                    echo('<span class="podcast_tag">' . $tag->name .' </span>');
                }
            ?>
        </div>    
    </div>
</div>
