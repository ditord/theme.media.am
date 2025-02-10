<?php
$autor = wp_get_object_terms($post->ID, "author_posts");
?>

<div class="post_block" data-category="<?php echo isset($cat->name) ? esc_attr($cat->name) : ''; ?>" data-url="<?php echo esc_url(get_permalink()); ?>">

    <div class="post_image">
        <?php the_post_thumbnail('big'); ?>
    </div>

    <div class="post_meta">
        <div class="post_category">
            <div class="category_background">
                <?php include 'ignore-featured-post-cat.php'; ?>
            </div>
        </div>

        <?php if ($autor[0] && isset($autor[0]->term_id, $autor[0]->name)): ?>
            <a href="<?php echo get_term_link($autor[0]->term_id) ?>" class="post_author">
                <?php echo $autor[0]->name ?>
            </a>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="post_title">
            <h1><?php the_title(); ?></h1>
        </a>

        <span class="post_date">
            <?php media_am_localized_date(get_the_date('j F Y')); ?>
        </span>
    </div>

</div>