# traversy_rest_api

## This is REST API example developed in PHP

Step 1 : you need to create mysql Database to make it working Step 2 : Import SQL file in your database under mysql/blogs.sql Two tables are created just to create demo application.

Step 3 : Update database connection setting in config\Database.php

// specify your own database credentials
private $host = "localhost";
private $db_name = "blogs";
private $username = "root";
private $password = "";
public $conn;
Step 4 : Now you are ready to access data using REST API.

API will return formate in Json.

## Below API content

read all posts (GET) => http://localhost/traversy_rest_api/api/posts/read.php

read single post (GET) => http://localhost/traversy_rest_api/api/posts/read_single.php?id=[value]

create post (POST) => http://localhost/traversy_rest_api/api/posts/create.php
send with this link json data of post like this:
{
"title" : "test",
"body" : "test",
"author" : "test",
"category_id" : 1
}

update post (PUT) => http://localhost/traversy_rest_api/api/posts/update.php
send with this link json data of post like this:
{
"id" : 27
"title" : "test",
"body" : "test",
"author" : "test",
"category_id" : 1
}

delete post (DELETE) => http://localhost/traversy_rest_api/api/posts/delete.php
send with this link json data of post like this:
{
"id" : 27
}
