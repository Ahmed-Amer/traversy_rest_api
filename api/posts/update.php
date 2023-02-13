<?php
//API Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With');


require_once('../../config/Database.php');
require_once('../../models/Post.php');

//Instantiate Database & connect
$database = new Database();
$db_connection = $database->connect();

//Instantiate Post object & read posts
$post = new Post($db_connection);

//Get row data (PUT Method)
$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

//Create Post
if($post->update())
{
    echo json_encode(
        array('message' => 'Post Updated')
    );

}else{

    echo json_encode(
        array('message' => 'Post Can\'t Be Updated')
    );
}