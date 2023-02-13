<?php
//API Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');


require_once('../../config/Database.php');
require_once('../../models/Post.php');

//Instantiate Database & connect
$database = new Database();
$db_connection = $database->connect();

//Instantiate Post object & read posts
$post = new Post($db_connection);


 //Get row data (DELETE Method)
$data = json_decode(file_get_contents('php://input'));
$post->id = $data->id;

//Create Post
if($post->delete())
{
    echo json_encode(
        array('message' => 'Post Deleted')
    );

}else{

    echo json_encode(
        array('message' => 'Post Can\'t Be Deleted')
    );
}