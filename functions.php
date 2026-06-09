<?php
//add_action('wp', 'han_custom_redirects');

function han_custom_redirects()
{

    global $_SERVER, $wpdb;

    $uri = $_SERVER['REQUEST_URI'];
    $uriwithoutSlash = ltrim($uri, "\/");

    $uriwithoutSlash = ltrim($uriwithoutSlash, "hy/");
    $uriwithoutSlash = ltrim($uriwithoutSlash, "en/");
    $uriwithoutSlash = rtrim($uriwithoutSlash, "/");

    $redirect_to_home_arr = [
        "/frontpage?destination=frontpage%3Fpage%3D2&qt-trainings=0",
        "/frontpage?page=12&destination=frontpage%3Faction%3Dlogin%26qt-trainings%3D1",
        "/frontpage?page=17&qt-trainings=0",
        "/frontpage?page=18&option=com_user&view=reset&layout=confirm&qt-trainings=0",
        "/frontpage?page=5&destination=frontpage%3Fqt-trainings%3D1&qt-trainings=2",
        "/frontpage?page=5&qt-trainings=1",
        "/frontpage?page=8&destination=frontpage&qt-trainings=1",
        "/frontpage?page=9&destination=frontpage%3Fqt-trainings%3D1&qt-trainings=2",
        "/frontpage?page=9&qt-trainings=1",
        "/node/user/password?name=aaisToft",
        "/sites/default/files/imagecache/700-scale/551808_410143799033724_1064716585_n.jpg",
        "/sites/default/files/imagecache/700-scale/djvar_aprust.jpg",
        "/sites/default/files/imagecache/700-scale/levon_barseghyan.jpg",
        "/sites/default/files/monitoring_tools.jpg",
        "/sites/default/files/story_gallary/2017/04/18/freedom-of-information.jpg",
        "/sites/default/files/story_gallary/2017/05/04/pioner-kanch.jpg",
        "/sites/default/files/story_gallary/2019/01/31/hovo_1.jpg",
        "/sites/default/files/styles/story_slideshow_740x_490/public/story_gallary/2015/11/01/dict.jpg?itok=jWW2YPP8",
        "/sites/default/files/styles/story_slideshow_740x_490/public/story_gallary/2015/11/01/karoun_demirjian.jpg?itok=EDxS6lZg",
        "/students/text.asp?n=172",
        "/students/text.asp?n=173",
        "/user/login?destination=node/175%23comment-form",
        "/user/login?destination=node/389%23comment-form",
        "/user/register?destination=node/213%23comment-form",
        "/user/register?destination=node/215%23comment-form",
        "/user/register?destination=node/243%23comment-form",
        "/user/register?destination=node/281%23comment-form",
        "/user/register?destination=node/282%23comment-form",
        "/user/register?destination=node/312%23comment-form",
        "/user/register?destination=node/35%23comment-form",
        "/user/register?destination=node/419%23comment-form",
        "/verified",
        "/node/143",
        "/node/23",
        "/node/406",
        "/node/8521",
        "/node/8618",
        "/node/8619",
        "/node/8626",
        "/node/8630",
        "/node/8631",
        "/node/8633",
        "/node/8634",
        "/node/8644",
        "/node/8645",
        "/citizen-journalism-14-18-2013",
        "/en/armvote13-hashtag-and%20armenian-presidential-elections",
        "/tv-journalism-with-kevin-burden",
        "/user/382",
        "/user/297",
        "/user/272",
        "/user/6",
        "/node/7/results"
    ];
    // $uri = $_SERVER['REQUEST_URI'];

    foreach ($redirect_to_home_arr as $link) {
        if ($uri == $link) {
            wp_redirect(home_url(), 301);
            exit;
            break;
        }
    }






    //CASE 1: Test Some Statics
    switch ($uriwithoutSlash) {
        case 'mediamart':
            wp_redirect("\/mediabattle/", 301);
            die();
        case 'mediamaart':
            wp_redirect("\/mediabattle/", 301);
            die();
        case 'podcast':
            wp_redirect("/podcasts", 301);
            die();
    }


    //CASE 2: Test url exists in md_fg_redirects, DRUPAL URLs check
    if (is_404()) {
        $PostIdForOldSlugsID = $wpdb->get_var("SELECT `id` FROM `md_fg_redirect` WHERE old_url='$uri' OR old_url='$uriwithoutSlash'");
        if ($PostIdForOldSlugsID) {
            $newPermalink = get_permalink($PostIdForOldSlugsID);
            wp_redirect($newPermalink, 301);
            die();
        }
    }


    //CASE 3: Changed WP URLs check
    if (is_404()) {
        $PostIdWP = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$uriwithoutSlash' AND post_status = 'publish'");
        if ($PostIdWP) {
            $newPermalink = get_permalink($PostIdWP);
            if ($newPermalink != $uriwithoutSlash) {
                wp_redirect($newPermalink, 301);
                die();
            }
        }
    }

    //CASE 4: Redirects to category page
    redirect_to_page(array(
        "/" => [
            "/category/%D5%B0%D5%A1%D5%B5%D5%BF%D5%A1%D6%80%D5%A1%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6/page/8/",
            "/category/%D5%B0%D5%A1%D5%B5%D5%BF%D5%A1%D6%80%D5%A1%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6/page/9/",
            "/category/%D5%B4%D5%A5%D5%A4%D5%AB%D5%A1%D5%A3%D5%AC%D5%B8%D5%A2/page/2/",
            "/category/%D5%B4%D5%A5%D5%A4%D5%AB%D5%A1%D5%A3%D5%AC%D5%B8%D5%A2/page/3/",
            "/category/%D5%B4%D5%A5%D5%A4%D5%AB%D5%A1%D5%A3%D5%AC%D5%B8%D5%A2/page/4/"
        ],
        "/category/newsroom/" => [
            "/category/%D5%B6%D5%B5%D5%B8%D6%82%D5%BD%D6%80%D5%B8%D6%82%D5%B4/page/107/",
            "/category/%D5%B6%D5%B5%D5%B8%D6%82%D5%BD%D6%80%D5%B8%D6%82%D5%B4/page/108/",
            "/category/%D5%B6%D5%B5%D5%B8%D6%82%D5%BD%D6%80%D5%B8%D6%82%D5%B4/page/8/",
            "/category/%D5%B6%D5%B5%D5%B8%D6%82%D5%BD%D6%80%D5%B8%D6%82%D5%B4/page/9/",
            "/category/%D5%B6%D5%B5%D5%B8%D6%82%D5%BD%D6%80%D5%B8%D6%82%D5%B4/"
        ],
        "/category/verified/" => [
            "/category/%D5%BD%D5%BF%D5%B8%D6%82%D5%A3%D5%BE%D5%A1%D5%AE-%D5%A7/",
            "/category/%D5%BD%D5%BF%D5%B8%D6%82%D5%A3%D5%BE%D5%A1%D5%AE-%D5%A7",
            "/category/%D5%BD%D5%BF%D5%B8%D6%82%D5%A3%D5%BE%D5%A1%D5%AE-%D5%A7/page/12/",
            "/category/%D5%BD%D5%BF%D5%B8%D6%82%D5%A3%D5%BE%D5%A1%D5%AE-%D5%A7/page/13/",
            "/category/%D5%BD%D5%BF%D5%B8%D6%82%D5%A3%D5%BE%D5%A1%D5%AE-%D5%A7/page/8/",
            "/category/%D5%BD%D5%BF%D5%B8%D6%82%D5%A3%D5%BE%D5%A1%D5%AE-%D5%A7/page/9/",
        ],
        "/category/critique/" => [
            "/category/%D6%84%D5%B6%D5%B6%D5%A1%D5%A4%D5%A1%D5%BF/",
            "/category/%D6%84%D5%B6%D5%B6%D5%A1%D5%A4%D5%A1%D5%BF/page/129/",
            "/category/%D6%84%D5%B6%D5%B6%D5%A1%D5%A4%D5%A1%D5%BF/page/130/",
            "/category/%D6%84%D5%B6%D5%B6%D5%A1%D5%A4%D5%A1%D5%BF/page/8/",
            "/category/%D6%84%D5%B6%D5%B6%D5%A1%D5%A4%D5%A1%D5%BF/page/9/",
            "/category/%D6%84%D5%B6%D5%B6%D5%A1%D5%A4%D5%A1%D5%BF/page/4/"
        ],
        "/category/viewpoint/" => [
            "/category/%D5%BF%D5%A5%D5%BD%D5%A1%D5%AF%D5%A5%D5%BF/",
            "/category/%D5%BF%D5%A5%D5%BD%D5%A1%D5%AF%D5%A5%D5%BF/page/24/",
            "/category/%D5%BF%D5%A5%D5%BD%D5%A1%D5%AF%D5%A5%D5%BF/page/25/",
            "/category/%D5%BF%D5%A5%D5%BD%D5%A1%D5%AF%D5%A5%D5%BF/page/8/",
            "/category/%D5%BF%D5%A5%D5%BD%D5%A1%D5%AF%D5%A5%D5%BF/page/9/",
        ],
        "/category/announcements/" => [
            "/category/%D5%B0%D5%A1%D5%B5%D5%BF%D5%A1%D6%80%D5%A1%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6/",
            "/category/%D5%B0%D5%A1%D5%B5%D5%BF%D5%A1%D6%80%D5%A1%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6/page/48/",
            "/category/%D5%B0%D5%A1%D5%B5%D5%BF%D5%A1%D6%80%D5%A1%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6/page/47/"
        ],
        "/category/dothy/" => [
            "/category/%D5%B0%D5%A1%D5%B5",
        ],
        "/category/elections-2018/" => [
            "/category/%D5%A8%D5%B6%D5%BF%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6%D5%B6%D5%A5%D6%80-2018/page/4/",
            "/category/%D5%A8%D5%B6%D5%BF%D6%80%D5%B8%D6%82%D5%A9%D5%B5%D5%B8%D6%82%D5%B6%D5%B6%D5%A5%D6%80-2018/page/5/"
        ],
        "/category/in-the-library/" => [
            "/category/%D5%A3%D6%80%D5%A1%D5%A4%D5%A1%D6%80%D5%A1%D5%B6%D5%B8%D6%82%D5%B4/"
        ],
        "/category/on-the-scene/" => [
            "/category/%D5%A4%D5%A5%D5%BA%D6%84%D5%AB-%D5%BE%D5%A1%D5%B5%D6%80%D5%B8%D6%82%D5%B4/"
        ],
        "/category/image/" => [
            "/category/%D5%BA%D5%A1%D5%BF%D5%AF%D5%A5%D6%80/"
        ],
        "/category/OK/" => [
            "/category/%D5%AC%D5%A1%D5%A2%D5%B8%D6%80%D5%A1%D5%BF%D5%B8%D6%80%D5%AB%D5%A1/"
        ]
    ));

    //CASE 5: March 1 Posts
    // ___AM___
    if (strpos($uri, 'march-1-photo-slideshow') !== false) {
        wp_redirect("/hy/image/2016/03/01/5938/", 301);
    }
    // ___EN___
    if (strpos($uri, "march-1-2008-daily-chronicle") !== false) {
        wp_redirect("/en/image/2016/03/01/6021/", 301);
    }



    // CASE 6: Redirect To Eng Home Page
    redirect_to_page(array(
        "/" => [
            "/en/category/futured-post-en-2/page/11/",
            "/en/category/futured-post-en-2/page/12/",
            "/en/category/futured-post-en-2/page/6/",
            "/en/category/futured-post-en-2/page/7/",
            "/en/home"
        ],
    ));


    // CASE 7: Redirect Without FB parameter
    cut_fb_shit();
}
function cut_fb_shit()
{
    $uri = $_SERVER['REQUEST_URI'];
    if (strpos($uri, 'fbclid') !== false) {
        $link = explode("?fbclid", $uri);
        wp_redirect($link[0], 301);
    }
};

function redirect_to_page($old_url_arr)
{
    $home_url = home_url();
    $uri = $_SERVER['REQUEST_URI'];
    foreach ($old_url_arr as $cat_arr) {
        foreach ($cat_arr as $url) {
            $cat_url = array_keys($old_url_arr, $cat_arr)[0];
            if ($uri == $url) {
                wp_redirect($home_url . $cat_url, 301);
                exit;
            }
        }
    }
}


function myplugin_register_settings()
{

    add_option('ad_header');
    add_option('ad_sidebar');
    add_option('ad_mobile');
    register_setting('myplugin_options_group', 'ad_header', 'myplugin_callback');
    register_setting('myplugin_options_group', 'ad_sidebar', 'myplugin_callback');
    register_setting('myplugin_options_group', 'ad_mobile', 'myplugin_callback');
}
add_action('admin_init', 'myplugin_register_settings');


function myplugin_register_options_page()
{
    add_options_page('Page Title', 'Advertisement', 'manage_options', 'advertisement', 'myplugin_options_page');
}
add_action('admin_menu', 'myplugin_register_options_page'); ?>
<?php function myplugin_options_page()
{
?>
    <div>
        <h2>Advertisement</h2>
        <form method="post" action="">
            <div>
                <p> <label for="ad_header">Header</label></p>
                <textarea placeholder="<?php echo esc_html(get_option('ad_header')); ?>" type="text" id="ad_header" rows="4" cols="100" name="ad_header"><?php echo esc_html(get_option('ad_header')); ?></textarea>
            </div>
            <div>
                <p> <label for="ad_sidebar">Sidebar</label></p>
                <textarea placeholder="<?php echo esc_html(get_option('ad_sidebar')); ?>" type="text" id="ad_sidebar" rows="4" cols="100" name="ad_sidebar"><?php echo esc_html(get_option('ad_sidebar')); ?></textarea>
            </div>
            <div>
                <p><label for="ad_mobile">Mobile</label></p>
                <textarea placeholder="<?php echo esc_html(get_option('ad_mobile')); ?>" type="text" id="ad_mobile" rows="4" cols="100" name="ad_mobile"><?php echo esc_html(get_option('ad_mobile')); ?></textarea>
            </div>
            <input type="submit" value="Save settings" class="button-primary" />
        </form>
    </div>
<?php
} ?>




<?php
if (isset($_POST["ad_header"])) {

    $num_elements = $_POST["ad_header"];
    $html =  explode("<script>",  $num_elements)[0];
    $js =  explode("<script>",  $num_elements)[1];
    $html = str_replace('\"', '"', $html);
    $js = str_replace('\"', '"', $js);
    $js = str_replace("\'", "'", $js);

    update_option('ad_header', $html .  "<script>" . $js);
};
if (isset($_POST["ad_sidebar"])) {
    $num_elements = $_POST["ad_sidebar"];
    $html =  explode("<script>",  $num_elements)[0];
    $js =  explode("<script>",  $num_elements)[1];
    $html = str_replace('\"', '"', $html);
    $js = str_replace('\"', '"', $js);
    $js = str_replace("\'", "'", $js);


    update_option('ad_sidebar', $html .  "<script>" . $js);
};
if (isset($_POST["ad_mobile"])) {
    $num_elements = $_POST["ad_mobile"];
    $html =  explode("<script>",  $num_elements)[0];
    $js =  explode("<script>",  $num_elements)[1];
    $html = str_replace('\"', '"', $html);
    $js = str_replace('\"', '"', $js);
    $js = str_replace("\'", "'", $js);

    update_option('ad_mobile', $html .  "<script>" . $js);
};

function lang($text1, $text2)
{
    $lang = ICL_LANGUAGE_CODE;
    if ($lang == 'hy') {
        echo $text1;
    } else {
        echo $text2;
    }
}
function getHashForEmo($postId)
{
    $drupalId = get_field('drupal_post_id');
    if ($drupalId != null) {
        echo $drupalId;
    } else {
        echo $postId;
    }
}
function getAuthorFOrEmo($user)
{
    // dump(count($user));
    if (count($user) != 0) {
        echo $user[0]->name;
    }
}
function getLangForEmo()
{
    if (ICL_LANGUAGE_CODE == 'hy') {
        echo 'am';
    } else {
        echo 'en';
    }
}
function return_lang($text1, $text2)
{
    $lang = ICL_LANGUAGE_CODE;
    if ($lang == 'hy') {
        return $text1;
    } else {
        return $text2;
    }
}
function display_media_outlet($arg, $hy, $en)
{
    if (strlen($arg) != 0) {
        echo  '<p>' .  lang($hy, $en) . '</p>';
        echo '<p>' .  $arg . '</p>';
    }
}

function thumbnail_link_for_meta()
{
    $lang = ICL_LANGUAGE_CODE;
    $image_link = get_the_post_thumbnail_url();
    if ($lang == 'hy') {
        echo 'media.am' . $image_link;
    } else {
        echo $image_link;
    }
}



function get_post_primary_category($post_id, $term = 'category', $return_all_categories = false)
{
    $return = array();

    if (class_exists('WPSEO_Primary_Term')) {
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term($term, $post_id);
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)) {
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories) {
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)) {
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories) {
            $return['all_categories'] = array();

            if (!empty($categories_list)) {
                foreach ($categories_list as &$category) {
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}


function display_primary_category($withFeatured = false)
{
    $category = get_the_category();
    if (ICL_LANGUAGE_CODE == 'hy') {
        $currentID = get_the_ID();

        // Get primary (Yoast) term if it is set
        $category_display = '';
        $category_slug = '';

        if (class_exists('WPSEO_Primary_Term')) {
            // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
            $wpseo_primary_term = new WPSEO_Primary_Term('category', $currentID);

            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                // Default to first category (not Yoast) if an error is returned

                foreach ($category as $cat) {
                    if(!$withFeatured){
                        if ($cat->slug != "futured-post" && $cat->slug != "featured-post") {
                            $category_display  = $cat->name;
                            $category_slug = $cat->slug;
                            break;
                        }
                    }else{
                             $category_display  = $cat->name;
                            $category_slug = $cat->slug;
                            break;
                    }
                    
                }
            } else {
                // Check if category has parent
                $category_id = $term->term_id;
                $category_term = get_category($category_id);

                // if primary category is a child
                if ($category_term->category_parent > 0) {

                    // Get parent category object
                    $parent = $category_term->parent;
                    $parent_object = get_category($parent);
                    // Set parent category variables
                    $category_display = $parent_object->name;
                    $category_slug = $parent_object->slug;

                    // if primary cateogry is a parent
                } else {
                    // Yoast Primary category
                    $category_display = $term->name;
                    $category_slug = $term->slug;
                }
            }
        } else {
            $category_display = '';
            $category_slug = '';
            foreach ($category as $cat) {
                if ($cat->slug != "futured-post" && $cat->slug !== 'featured-post') {
                    $category_display = $cat->name;
                    $category_slug = $cat->slug;
                    break; 
                }
            }
        }
        $lang = (ICL_LANGUAGE_CODE == "en") ? "/en" : "";
        echo '<a href="' . $lang . '/category/' . $category_slug . '">' . esc_html($category_display) . '</a>';
    } else {
        foreach($category as $cat){
            if(!$withFeatured){
                if($cat->slug != "futured-post" && $cat->slug != "featured-post"){
                    echo '<a href="/en/category/' . $cat->slug . '">' . esc_html($cat->name) . '</a>';
                    break;
                }
            }else{
                echo '<a href="/en/category/' . $cat->slug . '">' . esc_html($cat->name) . '</a>';
            }
        }
        
    }
};

function display_category()
{
    $lang = (ICL_LANGUAGE_CODE == "en") ? "/en" : "";
    $catArr = [];
    foreach (get_the_category() as $category) {
        array_push($catArr, $category);
        for ($i = 0; $i < count($catArr); $i++) {
            if ($catArr[$i]->slug == 'futured-post' || $catArr[$i]->slug == 'uncategorized'  || $catArr[$i]->slug == 'uncategorized-hy' || $catArr[$i]->slug == 'futured-post-en' || $catArr[$i]->slug == "futured-post-en-2") {
                array_splice($catArr, $i, 1);
            }
        }
    }
    foreach ($catArr as $cat) {

        echo '<a href="' . $lang . '/category/' . $cat->slug . '">' . esc_html($cat->name) . '</a>';
    }
}
function display_category_name()
{
    $lang = (ICL_LANGUAGE_CODE == "en") ? "/en" : "";
    $catArr = [];
    foreach (get_the_category() as $category) {
        array_push($catArr, $category);
        for ($i = 0; $i < count($catArr); $i++) {
            if ($catArr[$i]->slug == 'critique' || $catArr[$i]->slug == 'vox-populi' || $catArr[$i]->slug == 'vox-populi-en' || $catArr[$i]->slug == '%d6%84%d5%b6%d5%b6%d5%a1%d5%a4%d5%a1%d5%bf') {
                return true;
            }
        }
    }
}
function full_path($path)
{
    //TODO change this sheat
    $path = str_replace(' ', '', $path);
    echo get_template_directory_uri() . '/' . $path;
}
function filet_color()
{
    if (strlen(get_field('color_of_overlay')) != 0) {
        return get_field('color_of_overlay');
    } else {
        return '#a01317';
    }
}
add_filter('acf/settings/remove_wp_meta_box', '__return_false');
// Navigation Menu
register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'footer' => __('Footer Menu'),
    'media-outlets' => __('Media Outlets Menu'),
    'outlets-countries' => __('Outlets Countries'),
));

// Theme Setup
function add_futured_image()
{
    add_theme_support("post-thumbnails");
    add_image_size('small', 384, 250, true);
    add_image_size('big', 740, 440, true);
    add_image_size('podcast', 260, 260, true);
}
add_action("after_setup_theme", "add_futured_image");

// the_post_thumbnail( 'full' );
function widgetsInit()
{
    /* register_sidebar(array(
        'id' => 'sidebar1',
        'name' => 'Sidebar'
    ));
    register_sidebar(array(
        'id' => 'gallery',
        'name' => 'Gallery'
    ));
    register_sidebar(array(
        'id' => 'gallery-mediabattle',
        'name' => 'Gallery-Mediabattle'
    )); */
    register_sidebar(array(
        'id'=> 'advertisement-banner-1',
        'name' => 'Advertisement banner 1'
    ));
    register_sidebar(array(
        'id'=> 'advertisement-banner-2',
        'name' => 'Advertisement banner 2'
    ));
    register_sidebar(array(
        'id'=> 'advertisement-banner-3',
        'name' => 'Advertisement banner 3'
    ));
    register_sidebar( array(
        'id' => 'calendar-widget',
        'name' => 'News Calendar'
    ) );
}
add_action("widgets_init", "widgetsInit");

function crunchify_move_comment_form_below($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more)
{
    global $post;
    return '<a class="moretag" href="' . get_permalink($post->ID) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter('comment_form_fields', 'crunchify_move_comment_form_below');


function dump($arg)
{
    echo '<pre>';
    var_dump($arg);
    echo '</pre>';
}


// Register Custom Taxonomy
function autor_for_post()
{

    $labels = array(
        'name'                       => _x('Authors', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Author', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Authors', 'text_domain'),
        'all_items'                  => __('author', 'text_domain'),
        'parent_item'                => __('', 'text_domain'),
        'parent_item_colon'          => __('Parent Item:', 'text_domain'),
        'new_item_name'              => __('New Item Name', 'text_domain'),
        'add_new_item'               => __('Add New Item', 'text_domain'),
        'edit_item'                  => __('Edit Item', 'text_domain'),
        'update_item'                => __('Update Item', 'text_domain'),
        'view_item'                  => __('View Item', 'text_domain'),
        'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
        'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
        'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
        'popular_items'              => __('Popular Items', 'text_domain'),
        'search_items'               => __('Search Items', 'text_domain'),
        'not_found'                  => __('Not Found', 'text_domain'),
        'no_terms'                   => __('No items', 'text_domain'),
        'items_list'                 => __('Items list', 'text_domain'),
        'items_list_navigation'      => __('Items list navigation', 'text_domain'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('author_posts', array('post'), $args);
}
add_action('init', 'autor_for_post', 0);

function media_am_scripts()
{

    wp_enqueue_style('media_am_variables_css', get_template_directory_uri().'/css/variables.css',array(),'1.0');
    wp_enqueue_style('media_am_fonts_css', get_template_directory_uri().'/css/fonts.css',array('media_am_variables_css'),'1.0');
    wp_enqueue_style('media_am_main_css', get_template_directory_uri().'/css/main.css',array('media_am_variables_css'),'1.0');
    wp_enqueue_style('media_am_header_footer_css', get_template_directory_uri().'/css/header_footer.css',array(),'1.0');
    wp_enqueue_style('media_am_verification_rating_badge_css', get_template_directory_uri().'/css/verification-rating-badge.css',array('media_am_variables_css'),'1.0');
   
    if (is_page_template('page-templates/home-template.php')) {
        wp_enqueue_style('media_am_home_css', get_template_directory_uri() . '/css/home.css', array('media_am_variables_css'), '1.0');
        wp_enqueue_style('media_am_plain_post_block_css', get_template_directory_uri() . '/css/post-blocks/plain-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_category_plain_posts_section_css', get_template_directory_uri() . '/css/sections/category-plain-posts-section.css', array('media_am_variables_css', 'media_am_plain_post_block_css'), '1.0');
        wp_enqueue_style('media_am_overlay_post_block_css', get_template_directory_uri() . '/css/post-blocks/overlay-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_soft_post_block_css', get_template_directory_uri() . '/css/post-blocks/soft-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_verified_posts_section_css', get_template_directory_uri() . '/css/sections/verified-posts-section.css', array('media_am_overlay_post_block_css', 'media_am_soft_post_block_css'), '1.0');
        wp_enqueue_style('media_am_viewpoint_post_block_css', get_template_directory_uri() . '/css/post-blocks/viewpoint-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_viewpoint_section_css', get_template_directory_uri() . '/css/sections/viewpoint-section.css', array('media_am_viewpoint_post_block_css'), '1.0');
        wp_enqueue_style('media_am_play_overlay_post_block_css', get_template_directory_uri() . '/css/post-blocks/play-overlay-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_library_slider_section_css', get_template_directory_uri() . '/css/sections/library-slider-section.css', array('media_am_play_overlay_post_block_css'), '1.0');
        wp_enqueue_style('media_am_media_literacy_slide_post_block_css', get_template_directory_uri() . '/css/post-blocks/media-literacy-slide-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_media_literacy_slider_section_css', get_template_directory_uri() . '/css/sections/media-literacy-slider-section.css', array('media_am_media_literacy_slide_post_block_css'), '1.0');
        wp_enqueue_style('media_am_announcement_post_block_css', get_template_directory_uri() . '/css/post-blocks/announcement-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_announcements_section_css', get_template_directory_uri() . '/css/sections/announcements-section.css', array('media_am_announcement_post_block_css'), '1.0');
        wp_enqueue_style('media_am_scene_slider_section_css', get_template_directory_uri() . '/css/sections/scene-slider-section.css', array('media_am_overlay_post_block_css'), '1.0');
        wp_enqueue_style('media_am_crossroad_section_css', get_template_directory_uri() . '/css/sections/crossroad-section.css', array('media_am_variables_css', 'media_am_plain_post_block_css', 'media_am_viewpoint_post_block_css'), '1.0');
        wp_enqueue_style('media_am_vox_wide_post_block_css', get_template_directory_uri() . '/css/post-blocks/vox-wide-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_vox_compact_post_block_css', get_template_directory_uri() . '/css/post-blocks/vox-compact-post-block.css', array('media_am_variables_css', 'media_am_home_css'), '1.0');
        wp_enqueue_style('media_am_vox_populi_section_css', get_template_directory_uri() . '/css/sections/vox-populi-section.css', array('media_am_vox_wide_post_block_css', 'media_am_vox_compact_post_block_css'), '1.0');
        wp_enqueue_style('media_am_swiper_css',get_template_directory_uri().'/assets/swiper/swiper-bundle.min.css',array(),'1.0');
        wp_enqueue_script('media_am_swiper_script', get_template_directory_uri().'/assets/swiper/swiper-bundle.min.js', array(), true);
        wp_enqueue_script( 'media_am_home_js', get_template_directory_uri() . '/js/home.js', array(), true );
    }
    if(is_page_template('page-templates/podcasts-template.php') || is_singular('podcast')){
        wp_enqueue_style('media_am_podcasts_css', get_template_directory_uri() . '/css/podcasts.css', array(), '1.0');
    }
    if(is_page_template('page-templates/verdicts-template.php')){
        wp_enqueue_style('media_am_verdicts_css', get_template_directory_uri() . '/css/verdicts.css', array('media_am_variables_css', 'media_am_verification_rating_badge_css'), '1.0');
    }
    if (is_category() || is_tax('author_posts') || is_date() || (is_home() && !is_front_page())) {
        wp_enqueue_style('media_am_plain_post_block_css', get_template_directory_uri() . '/css/post-blocks/plain-post-block.css', array('media_am_variables_css'), '1.0');
        wp_enqueue_style('media_am_viewpoint_post_block_css', get_template_directory_uri() . '/css/post-blocks/viewpoint-post-block.css', array('media_am_variables_css'), '1.0');
        wp_enqueue_style('media_am_category_css', get_template_directory_uri() . '/css/category.css', array('media_am_plain_post_block_css', 'media_am_viewpoint_post_block_css'), '1.0');
    }

    if(is_single()){
        wp_enqueue_style('media_am_single_css', get_template_directory_uri() . '/css/single.css', array(), '1.0');
        wp_enqueue_style('media_am_swiper_css',get_template_directory_uri().'/assets/swiper/swiper-bundle.min.css',array(),'1.0');
        wp_enqueue_script('media_am_swiper_script', get_template_directory_uri().'/assets/swiper/swiper-bundle.min.js', array(), true);
    }
    if (!is_admin() && !is_page('contact-us') && !is_single()) { 
        wp_deregister_script('jquery');           
        wp_deregister_script('jquery-migrate');   
    }

    wp_enqueue_script( 'media_am_header_js', get_template_directory_uri() . '/js/header.js', array(), true );
    wp_enqueue_script( 'media_am_script_js', get_template_directory_uri() . '/js/script.js', array(), true );
   
    //wp_enqueue_script('jquery','https://code.jquery.com/jquery-3.4.1.min.js','','3.4.1');
}
add_action('wp_enqueue_scripts', 'media_am_scripts');




function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );


function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


function media_am_language_switcher () {
    if ( function_exists( 'icl_get_languages' ) ) {
    $languages = icl_get_languages('skip_missing=0');

    echo '<div class="language_switcher">';
        if($languages['hy']['active']){
            echo '<span class="active">';
        }else{
            echo '<span>';
        }
        echo '<a href="' . esc_url( $languages['hy']['url'] ) . '">' . return_lang('Հայ','Hy') . '</a>';
        echo '</span>';
        echo '<span class="language_switcher_separator">|</span>';

        if($languages['en']['active']){
            echo '<span class="active">';
        }else{
            echo '<span>';
        }
        echo '<a href="' . esc_url( $languages['en']['url'] ) . '">' . 'Eng' . '</a>';
        echo '</span>';

     echo '</div>';
    }
}

add_action('media_am_language_switcher','media_am_language_switcher');

function media_am_localized_date($date){
    $monthMap = [
        'january' => 'հունվար',
        'february' => 'փետրվար',
        'march' => 'մարտ',
        'april' => 'ապրիլ',
        'may' => 'մայիս',
        'june' => 'հունիս',
        'july' => 'հուլիս',
        'august' => 'օգոստոս',
        'september' => 'սեպտեմբեր',
        'october' => 'հոկտեմբեր',
        'november' => 'նոյեմբեր',
        'december' => 'դեկտեմբեր'
    ];
    /* var_dump($date);
    var_dump(date_i18n('j F Y')); */
    
    $engDate = strtolower( $date);
    $armDate = explode(' ',$engDate);
    if(sizeof($armDate) == 3){
        $armDate[1] = $monthMap[$armDate[1]];
    }else{
        
        $armDate[0] = $monthMap[$armDate[0]];
    }
    $armDate = implode(' ', $armDate);
    echo lang($armDate,$engDate) ;

}



require get_template_directory() . '/customizer/customizer.php';


function custom_post_block_shortcode($atts) {
    // Parse the shortcode attributes to get the post ID
    $atts = shortcode_atts(array(
        'id' => '', // ID of the post you want to display
    ), $atts, 'post_block');

    $post_id = $atts['id'];
    if (empty($post_id)) return 'No post ID specified.';
    // Get the post data
    $post_query = new WP_Query(array(
        'p' => intval($atts['id']),
        'posts_per_page' => 1,
    ));
    // Capture the output of the template if the post is found
    ob_start();
    if ($post_query->have_posts()) :
        while ($post_query->have_posts()) : $post_query->the_post();
            global $post;
            ?>
            <div class="shortcode_post">
                <?php include locate_template('templates/post-block.php'); ?>
            </div>
            <?php
        endwhile;
    endif;

    // Reset post data
    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('post_block', 'custom_post_block_shortcode');

function media_am_post_block_inserter_admin_assets($hook) {
    if (!in_array($hook, array('post.php', 'post-new.php'), true)) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'post') {
        return;
    }

    wp_enqueue_script(
        'media-am-post-block-inserter',
        get_template_directory_uri() . '/js/admin-post-block-inserter.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script(
        'media-am-post-block-inserter',
        'mediaAmPostBlockInserter',
        array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('media_am_post_block_search'),
            'strings' => array(
                'noPostsFound' => return_lang('Գրառումներ չեն գտնվել։', 'No posts found.'),
                'searching' => return_lang('Որոնում...', 'Searching...'),
                'searchFailed' => return_lang('Որոնումը ձախողվեց։', 'Search failed.'),
                'idLabel' => return_lang('ID', 'ID'),
            ),
        )
    );

    wp_enqueue_style(
        'media-am-post-block-inserter',
        get_template_directory_uri() . '/css/admin-post-block-inserter.css',
        array(),
        '1.0'
    );
}
add_action('admin_enqueue_scripts', 'media_am_post_block_inserter_admin_assets');

function media_am_post_block_inserter_button($editor_id) {
    if ($editor_id !== 'content') {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'post') {
        return;
    }
    ?>
    <button type="button" class="button media-am-post-block-open">
        <?php echo esc_html(return_lang('Տեղադրել գրառման բլոկ', 'Insert post block')); ?>
    </button>
    <div class="media-am-post-block-modal" aria-hidden="true">
        <div class="media-am-post-block-modal__backdrop"></div>
        <div class="media-am-post-block-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="media-am-post-block-title">
            <div class="media-am-post-block-modal__header">
                <h2 id="media-am-post-block-title"><?php echo esc_html(return_lang('Տեղադրել գրառման բլոկ', 'Insert post block')); ?></h2>
                <button type="button" class="button-link media-am-post-block-close" aria-label="<?php echo esc_attr(return_lang('Փակել', 'Close')); ?>">x</button>
            </div>
            <div class="media-am-post-block-modal__body">
                <label for="media-am-post-block-search"><?php echo esc_html(return_lang('Որոնել գրառում', 'Search post')); ?></label>
                <input type="search" id="media-am-post-block-search" class="widefat" placeholder="<?php echo esc_attr(return_lang('Մուտքագրեք վերնագիր կամ գրառման ID', 'Type a title or paste a post ID')); ?>">
                <div class="media-am-post-block-results" aria-live="polite"></div>
            </div>
        </div>
    </div>
    <?php
}
add_action('media_buttons', 'media_am_post_block_inserter_button');

function media_am_post_block_search_ajax() {
    check_ajax_referer('media_am_post_block_search', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_send_json_error(array('message' => 'Permission denied.'), 403);
    }

    $search = isset($_GET['search']) ? sanitize_text_field(wp_unslash($_GET['search'])) : '';

    $query_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    if ($search !== '') {
        if (ctype_digit($search)) {
            $query_args['p'] = absint($search);
        } else {
            $query_args['s'] = $search;
        }
    }

    $posts = new WP_Query($query_args);
    $results = array();

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            $results[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'date' => get_the_date('Y-m-d'),
            );
        }
    }

    wp_reset_postdata();
    wp_send_json_success($results);
}
add_action('wp_ajax_media_am_post_block_search', 'media_am_post_block_search_ajax');

function media_am_get_verification_parent_slugs() {
    return array(
        'verified',
        'verification',
    );
}

function media_am_is_verification_subcategory($category) {
    if (!($category instanceof WP_Term)) {
        return false;
    }

    $verification_parent_slugs = media_am_get_verification_parent_slugs();
    $ancestors = get_ancestors($category->term_id, 'category');

    foreach ($ancestors as $ancestor_id) {
        $ancestor = get_category($ancestor_id);

        if ($ancestor && !is_wp_error($ancestor) && in_array($ancestor->slug, $verification_parent_slugs, true)) {
            return true;
        }
    }

    return false;
}

function media_am_category_image_field($term = null) {
    $image_id = 0;

    if ($term instanceof WP_Term) {
        $image_id = absint(get_term_meta($term->term_id, 'media_am_category_image_id', true));
    }

    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : '';
    wp_nonce_field('media_am_save_category_image', 'media_am_category_image_nonce');
    ?>
    <div class="media-am-category-image-field">
        <input type="hidden" name="media_am_category_image_id" value="<?php echo esc_attr($image_id); ?>" class="media-am-category-image-id">
        <div class="media-am-category-image-preview<?php echo $image_url ? ' has-image' : ''; ?>">
            <?php if ($image_url) : ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="">
            <?php endif; ?>
        </div>
        <button type="button" class="button media-am-category-image-upload">
            <?php esc_html_e('Choose image', 'textdomain'); ?>
        </button>
        <button type="button" class="button media-am-category-image-remove<?php echo $image_url ? '' : ' hidden'; ?>">
            <?php esc_html_e('Remove image', 'textdomain'); ?>
        </button>
    </div>
    <p class="description"><?php esc_html_e('This image is shown on the category archive page.', 'textdomain'); ?></p>
    <?php
}

function media_am_category_image_add_field() {
    ?>
    <div class="form-field term-group">
        <label><?php esc_html_e('Category image', 'textdomain'); ?></label>
        <?php media_am_category_image_field(); ?>
    </div>
    <?php
}
add_action('category_add_form_fields', 'media_am_category_image_add_field');

function media_am_category_image_edit_field($term) {
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label><?php esc_html_e('Category image', 'textdomain'); ?></label>
        </th>
        <td><?php media_am_category_image_field($term); ?></td>
    </tr>
    <?php
}
add_action('category_edit_form_fields', 'media_am_category_image_edit_field');

function media_am_save_category_image($term_id) {
    if (!isset($_POST['media_am_category_image_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['media_am_category_image_nonce'])), 'media_am_save_category_image')) {
        return;
    }

    if (!current_user_can('manage_categories')) {
        return;
    }

    $image_id = isset($_POST['media_am_category_image_id']) ? absint($_POST['media_am_category_image_id']) : 0;

    if ($image_id) {
        update_term_meta($term_id, 'media_am_category_image_id', $image_id);
    } else {
        delete_term_meta($term_id, 'media_am_category_image_id');
    }
}
add_action('created_category', 'media_am_save_category_image');
add_action('edited_category', 'media_am_save_category_image');

function media_am_category_image_admin_assets($hook) {
    if (!in_array($hook, array('edit-tags.php', 'term.php'), true)) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || $screen->taxonomy !== 'category') {
        return;
    }

    wp_enqueue_media();

    wp_enqueue_script(
        'media-am-category-image',
        get_template_directory_uri() . '/js/admin-category-image.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_enqueue_style(
        'media-am-category-image',
        get_template_directory_uri() . '/css/admin-category-image.css',
        array(),
        '1.0'
    );
}
add_action('admin_enqueue_scripts', 'media_am_category_image_admin_assets');


function custom_word_description_shortcode($atts, $content = null) {
       
       $attributes = shortcode_atts(
        array(
            'content' => '', 
        ),
        $atts
    );
    $description = htmlspecialchars_decode($attributes['content'], ENT_QUOTES);
    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array(),
            'target' => array(),
        ),
        'strong' => array(),
        'b' => array(),
        'em' => array(),
        'i' => array(),
    );

    $description = wp_kses($description,$allowed_html);

    return '<span class="has_desc" >' . do_shortcode($content). '<span class="tooltip_desc"><span>'.$description.'</span></span>' . '</span>' ;
}
add_shortcode('word_desc', 'custom_word_description_shortcode');

function custom_search_query( $query ) {
    
    if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
        
        $query->set( 'post_type', array( 'post', 'podcast' ) ); 
        if ( isset($_GET['lang']) && !empty($_GET['lang']) ) {
            do_action( 'wpml_switch_language', $_GET['lang'] );
        }
        
    }
}
add_action( 'pre_get_posts', 'custom_search_query' );

function media_am_category_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'media_am_category_posts_per_page');

add_filter('get_calendar', function ($calendar_output) {
    if (is_category()) {
        // Get the current category slug
        $category = get_queried_object();
        if ($category && isset($category->slug)) {
            $category_slug = $category->slug;

            // Replace default links with links including the category slug
            $calendar_output = preg_replace_callback(
                '/href="([^"]+)"/',
                function ($matches) use ($category_slug) {
                    $url = $matches[1];
                    // Add the category slug before the date in the URL
                    return 'href="' . trailingslashit(home_url($category_slug)) . str_replace(home_url('/'), '', $url) . '"';
                },
                $calendar_output
            );
        }
    }
    return $calendar_output;
});



// 1. Add Meta Box in the Post Editor
function add_show_send_mail_meta_box() {
    add_meta_box(
        'show_send_mail_meta_box',    // ID
        __('Verified', 'textdomain'), // Title
        'render_show_send_mail_meta_box', // Callback function
        'post',                       // Screen to display (posts)
        'side',                       // Context (side column)
        'default'                     // Priority
    );
}
add_action('add_meta_boxes', 'add_show_send_mail_meta_box');

// 2. Render Meta Box HTML
function render_show_send_mail_meta_box($post) {
    // Retrieve current value of 'show_send_mail'
    $show_send_mail = get_post_meta($post->ID, 'show_send_mail', true);
    $checked = ($show_send_mail === 'yes') ? 'checked' : ''; // Checkbox checked if 'yes'

    // Nonce field for security
    wp_nonce_field('show_send_mail_meta_box_nonce', 'show_send_mail_nonce');

    // Render the checkbox
    ?>
    <p>
        <label>
            <input type="checkbox" name="show_send_mail" value="yes" <?php echo $checked; ?>>
            <?php _e('Show send materials for verification', 'textdomain'); ?>
        </label>
    </p>
    <?php
}

// 3. Save Meta Box Data
function save_show_send_mail_meta_box($post_id) {
    // Security checks
    if (!isset($_POST['show_send_mail_nonce']) || !wp_verify_nonce($_POST['show_send_mail_nonce'], 'show_send_mail_meta_box_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Check if checkbox is set
    if (isset($_POST['show_send_mail']) && $_POST['show_send_mail'] === 'yes') {
        update_post_meta($post_id, 'show_send_mail', 'yes'); // Add post meta
    } else {
        delete_post_meta($post_id, 'show_send_mail'); // Remove post meta
    }
}
add_action('save_post', 'save_show_send_mail_meta_box');
