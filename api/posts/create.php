<?php
//API Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once('../../config/Database.php');
require_once('../../models/Post.php');

//Instantiate Database & connect
$database = new Database();
$db_connection = $database->connect();

//Instantiate Post object 
$post = new Post($db_connection);

/*
php://input: This is a read-only stream that allows us to read raw data from the request body. 
             It returns all the raw data after the HTTP headers of the request, regardless of 
             the content type.
file_get_contents() function: This function in PHP is used to read a file into a string.
json_decode() function: This function takes a JSON string and converts it into a PHP variable 
                        that may be an array or an object.
*/



//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;



//Get form data posted through Post request
// $post->title = $_POST['title'];
// $post->body = $_POST['body'];
// $post->author = $_POST['author'];
// $post->category_id = $_POST['category_id'];


//Create Post
if ($post->create()) {
    echo json_encode(
        array('message' => 'Post Created')
    );
} else {

    echo json_encode(
        array('message' => 'Post Can\'t Be Created')
    );
}
