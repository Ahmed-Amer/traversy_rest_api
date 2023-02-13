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

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get Post
if($post->read_single())
{
    //Create array
    $post_arr = array(
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
        'author' => $post->author,
        'category_id' => $post->category_id,
        'category_name' => $post->category_name
    );

    //Turn post_arr to json and output
    echo json_encode($post_arr);

}else
{
     //No Posts
     echo json_encode(
        array('message' => 'Post Not Found')
    );
}


