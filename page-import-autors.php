<?php

    $old_host = "localhost";
    $old_database = "media_am_drupal";
    $old_username = "root";
    $old_pass = "f86b4a07c841c3ff6e04";

    $old_connection = new mysqli($old_host, $old_username, $old_pass, $old_database);
    $old_connection->set_charset("utf8");

    $old_array_autorsimported = []; 
    $old_sql_autors = "SELECT n.nid, n.title, fc.field_characteristic_value as descr 
                       FROM node as n
                       LEFT JOIN `field_data_field_characteristic` as fc on n.nid = fc.entity_id
                       WHERE n.type='author' 
                       AND n.language='en'
                       AND n.status=1 ORDER BY n.title";
?>


<ul>
    <?php
    global $post;
    $pageNumber = $_GET["pagenumber"];
    $postPerPage = 500;

    $myposts = get_posts( array(
        'posts_per_page' => $postPerPage,
        'offset'=>$postPerPage*$pageNumber
    ));
    
    $pageNumber+=1;
    echo "<a href = 'http://104.248.205.211/import-autors/?pagenumber=$pageNumber'>next is $pageNumber</a>";
    echo "<br><hr><br>";

    if ( $myposts ) {
        foreach ( $myposts as $post ) : 
            setup_postdata( $post ); 
            //dump($post);
            ?>

            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php $info =  getDrupalIdByTitle(get_the_title($post)); 
                      dump($info);
                      $drid = $info["nid"];
                      //update_field
                      update_field('drupal_post_id', $drid);
                      dump(get_field("drupal_post_id"))
                    /*$idOfAutorInDroopal = $info["field_author_target_id"];
                    $termon = getAuthorByCustomField($idOfAutorInDroopal);
                    if($termon){
                        dump($post->ID);
                        dump($termon->name);
                        wp_set_post_terms( $post->ID, array($termon->term_id), "author_posts", false);
                        dump($termon);
                    }
                    */
                ?>
            </li>
            

        <?php
        endforeach;
        wp_reset_postdata();
    }
    ?>
</ul>



<?php 
    die();
    $terms = get_terms("author_posts");
    
    foreach ($terms as $term) {
        dump($term);
        $fields = get_fields("author_posts_".$term->term_id);
        $drupalID = $fields["id_drupal"];
        
        $urlfb = getFbTwFromDrupalByDrupalID($drupalID,"fb");
        if($urlfb){
            update_field("author_fb_link",$urlfb["url"],"author_posts_".$term->term_id);
        }
        
        $urltw = getFbTwFromDrupalByDrupalID($drupalID,"tw");
        if($urltw){
            update_field("author_tw_link",$urltw["url"],"author_posts_".$term->term_id);
        }

        dump($urlfb);
        dump($urltw);
        dump($drupalID);
    }

?>



<ul>
    <?php
    global $post;
    die();
    $pageNumber = $_GET["pagenumber"];
    $postPerPage = 500;

    $myposts = get_posts( array(
        'posts_per_page' => $postPerPage,
        'offset'=>$postPerPage*$pageNumber
    ));
    
 
    if ( $myposts ) {
        foreach ( $myposts as $post ) : 
            setup_postdata( $post ); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php $info =  getRealAuthorByTitleFromDrupal(get_the_title($post)); 
                    $idOfAutorInDroopal = $info["field_author_target_id"];
                    $termon = getAuthorByCustomField($idOfAutorInDroopal);
                    if($termon){
                        dump($post->ID);
                        dump($termon->name);
                        wp_set_post_terms( $post->ID, array($termon->term_id), "author_posts", false);
                        dump($termon);
                    }
                ?>
            </li>
            

        <?php
        endforeach;
        wp_reset_postdata();
    }
    ?>
</ul>



<?php 
    $old_connection->close();
?>



<?php

function getRealAuthorByTitleFromDrupal($title){
    global $old_connection;

    $sql = 'SELECT n.title , na.title, fa.field_author_target_id
    FROM `node` as n
    INNER JOIN `field_data_field_author` as fa ON fa.entity_id = n.nid 
    INNER JOIN `node` as na ON na.nid = fa.field_author_target_id
    WHERE n.title LIKE "%'.$title.'%" 
    AND na.type="author"';

    $result = $old_connection->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


//dump(getAuthorByCustomField(808));

function getAuthorByCustomField($drupalID){
    $data=null;

    $terms = get_terms( 'author_posts', array(
        'hide_empty' => false,
    ) );
    
    foreach ($terms as $term) {
        $value = get_field( 'id_drupal', "author_posts_".$term->term_id);
        if($drupalID==$value){
            $data=$term;
            break;
        }
    }

    return $data;
    
    //return get_term_by( $field, $drupalID, "autor_for_post")
}


function updateDescriptions(){
    global $old_connection;
    $old_sql_autors = "SELECT n.nid, n.title, fc.field_characteristic_value as descr 
    FROM node as n
    LEFT JOIN `field_data_field_characteristic` as fc on n.nid = fc.entity_id
    WHERE n.type='author' 
    AND n.language='en'
    AND n.status=1 ORDER BY n.title";


    $result = $old_connection->query($old_sql_autors);
    while($row = $result->fetch_assoc()){
        echo $row["nid"]." ".$row['title']." " .$row['descr'];
        echo "<br>";

        $autor = getAuthorByCustomField($row["nid"]);
        if($autor){
            $dsc = $row['descr'];
            $aid = $autor->term_id;

            wp_update_term($aid,'author_posts',array(
                'description' => $dsc,
            ));
            

        }
        dump($autor);
    }

}



function getFbTwFromDrupalByDrupalID($drupalID, $fbOrTw){
    global $old_connection;
    
    if($fbOrTw=="fb"){
        $sql = "SELECT field_facebook_account_link_url as url
                FROM `field_data_field_facebook_account_link`
                WHERE entity_id = $drupalID"; 
    }
    else {
        $sql = "SELECT field_twitter_account_link_url as url
                FROM `field_data_field_twitter_account_link`
                WHERE entity_id = $drupalID"; 
    }
    

    $result = $old_connection->query($sql);
    if($result){
        $row = $result->fetch_assoc();
        return $row; 
    }
    else{
        return null;
    }
}

function getDrupalIdByTitle($title){
    global $old_connection;
    $sql = "SELECT nid
    FROM `node` 
    WHERE title LIKE '%$title%'
    AND type='story'";

    $result = $old_connection->query($sql);
    if($result){
            $row = $result->fetch_assoc();
            return $row; 
    }
    else{
            return null;
    }

}

?>