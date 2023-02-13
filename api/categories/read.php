<?php
//API Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../../config/Database.php');
require_once('../../models/Category.php');

//Instantiate Database & connect
$database = new Database();
$db_connection = $database->connect();


$category = new Category($db_connection);
$stmt = $category->read();

//check if any categories
if($stmt->rowCount() > 0)
{
    //Get all categories
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Turn categories to json and output
     echo json_encode($categories);


}else
{
    //No Posts
    echo json_encode(
        array('message' => 'No Posts Found')
    );
}

