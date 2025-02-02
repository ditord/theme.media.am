<?php
    $old_host = "localhost";
    $old_database = "media_am_drupal";
    $old_username = "root";
    $old_pass = "f86b4a07c841c3ff6e04";

    $old_connection = new mysqli($old_host, $old_username, $old_pass, $old_database);
    $old_connection->set_charset("utf8");

    $old_array_autorsimported = []; 
    $old_sql_autors = "SELECT * FROM `node` WHERE type='author' AND language='hy' AND status=1";
?>



<?php
    $result = $old_connection->query($old_sql_autors);
    while($row = $result->fetch_assoc()){
        echo $row['title'];
        echo "<br>";
    }

?>




<ul>
    <?php
    global $post;
    $pageNumber = $_GET["pagenumber"];
    $postPerPage = 200;

    $myposts = get_posts( array(
        'posts_per_page' => $postPerPage,
        'offset'=>$postPerPage*$pageNumber
    ));
    
 
    if ( $myposts ) {
        foreach ( $myposts as $post ) : 
            setup_postdata( $post ); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
        endforeach;
        wp_reset_postdata();
    }
    ?>
</ul>



<?php 
    $old_connection->close();
?>