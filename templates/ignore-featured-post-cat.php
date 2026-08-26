<?php
$display_category = media_am_get_post_display_category();

if ($display_category instanceof WP_Term) {
    echo '<a href="' . esc_url(get_category_link($display_category->term_id)) . '">' . esc_html($display_category->name) . '</a>';
}
