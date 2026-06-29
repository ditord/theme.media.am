<?php
get_header();
the_post();

$current_podcast_id = get_the_ID();
$description = implode(get_post_meta($current_podcast_id, 'wpcf-podcast-description', false));
$whooshkaa = implode(get_post_meta($current_podcast_id, 'wpcf-whooshkaa', false));
$anchor = implode(get_post_meta($current_podcast_id, 'wpcf-anchor', false));
$itunes = implode(get_post_meta($current_podcast_id, 'wpcf-itunes', false));
$youtube = implode(get_post_meta($current_podcast_id, 'wpcf-youtube', false));
$rss = implode(get_post_meta($current_podcast_id, 'wpcf-rss', false));
$web_site = implode(get_post_meta($current_podcast_id, 'wpcf-web-site', false));
$soundcloud = implode(get_post_meta($current_podcast_id, 'wpcf-soundcloud', false));
$facebook = implode(get_post_meta($current_podcast_id, 'wpcf-facebook', false));
$google_podcast = implode(get_post_meta($current_podcast_id, 'wpcf-google-podcast', false));
$embed = get_post_meta($current_podcast_id, 'wpcf-embed', false);
?>

<div class="page_content single_post_page single_podcast_page">
    <div class="main_content">
        <div class="post_section">
            <div class="post_meta">
                <div class="post_date">
                    <span class="date_span">
                        <span class="date_bold"><?php lang('Հրապարակվել է ՝','Published ')?></span>
                        <?php media_am_localized_date(get_the_date('j F Y')); ?>
                    </span>
                </div>

                <h1 class="post_title">
                    <?php the_title(); ?>
                </h1>
            </div>

            <div class="post_body">
                <div class="post_image">
                    <?php
                    $thumbnail_url = get_the_post_thumbnail_url();
                    if ($thumbnail_url && !strstr($thumbnail_url, 'transparent_background.png')) {
                        the_post_thumbnail();
                    }
                    ?>
                </div>

                <div class="podcast_content">
                    <?php
                    if (!empty($embed[0])) {
                        echo $embed[0];
                    }
                    ?>

                    <div class="podcast_players">
                        <h3><?php lang("Լսել ՝", "Listen"); ?></h3>
                        <?php if ($google_podcast !== '') : ?>
                            <a href="<?php echo esc_url($google_podcast); ?>" class="player_icon google_podcast" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($whooshkaa !== '') : ?>
                            <a href="<?php echo esc_url($whooshkaa); ?>" class="player_icon whooshkaa" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($itunes !== '') : ?>
                            <a href="<?php echo esc_url($itunes); ?>" class="player_icon itunes" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($youtube !== '') : ?>
                            <a href="<?php echo esc_url($youtube); ?>" class="player_icon youtube" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($rss !== '') : ?>
                            <a href="<?php echo esc_url($rss); ?>" class="player_icon rss" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($web_site !== '') : ?>
                            <a href="<?php echo esc_url($web_site); ?>" class="player_icon web_site" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($soundcloud !== '') : ?>
                            <a href="<?php echo esc_url($soundcloud); ?>" class="player_icon soundcloud" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($facebook !== '') : ?>
                            <a href="<?php echo esc_url($facebook); ?>" class="player_icon facebook" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                        <?php if ($anchor !== '') : ?>
                            <a href="<?php echo esc_url($anchor); ?>" class="player_icon anchor" target="_blank" rel="noopener"></a>
                        <?php endif; ?>
                    </div>

                    <?php if ($description !== '') : ?>
                        <p class="podcast_desc">
                            <?php echo wp_kses_post($description); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php include 'templates/share-buttons.php'; ?>
    </div>

    <?php
    $related_podcasts = new WP_Query(array(
        'post_type' => 'podcast',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => 3,
        'post__not_in' => array($current_podcast_id),
    ));

    if ($related_podcasts->have_posts()) : ?>
        <section class="single_podcast_related">
            <div class="single_podcast_related__grid">
                <?php
                while ($related_podcasts->have_posts()) :
                    $related_podcasts->the_post();
                    include get_template_directory() . '/templates/podcast_block.php';
                endwhile;
                ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php
wp_reset_postdata();
get_footer();
?>
