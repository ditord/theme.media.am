<?php
foreach (get_the_category() as $cat) {
    if ($cat->slug != 'featured-post' && $cat->slug !=  'uncategorized' && $cat->slug != 'uncategorized-hy') {
        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' .
            esc_html($cat->name)
            . '</a>';    
    }
}
