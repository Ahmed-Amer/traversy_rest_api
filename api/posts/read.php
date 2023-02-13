<?php
//API Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../../config/Database.php');
require_once('../../models/Post.php');

//Instantiate Database & connect
$database = new Database();
$db_connection = $database->connect();

//Instantiate Post object & read posts
$post = new Post($db_connection);
$stmt = $post->read();

//check if any posts
if($stmt->rowCount() > 0)
{
    //Get all posts
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Posts array
    $posts_arr = array();
    $posts_arr['data'] = array();


    foreach($posts as $post)
    {
        extract($post);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'category_id' => $category_id,
            'category_name' => $category_name
        );

        //Push to posts_arr['data']
        array_push($posts_arr['data'] , $post_item);

    }


    //Turn posts_arr to json and output
     echo json_encode($posts_arr);


}else
{
    //No Posts
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}

