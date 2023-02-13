<?php


class Post
{
    //DB Stuff
    private $conn;
    private $table = 'posts';

    //Post Properities
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;


    public function __construct($db)
    {
        //initialize db connection
        $this->conn = $db;
    }


    //Get Posts
    public function read()
    {
        $query = 'SELECT
                c.name as category_name,
                p.id,
                p.category_id,
                p.title,
                p.body,
                p.author,
                p.created_at
                FROM ' .$this->table. ' p
                LEFT JOIN 
                categories c ON p.category_id = c.id
                ORDER BY
                p.created_at DESC';

        //Prepare Stmt
        $stmt = $this->conn->prepare($query);
        
        //Execute Query
        $stmt->execute();
        
        return $stmt;
    }


    //Get Single Post
    public function read_single()
    {
        $query = 'SELECT
                    c.name as category_name,
                    p.id,
                    p.category_id,
                    p.title,
                    p.body,
                    p.author,
                    p.created_at
                FROM ' .$this->table. ' p
                LEFT JOIN 
                    categories c ON p.category_id = c.id
                WHERE p.id = ?
                LIMIT 1';

        //Prepare Stmt
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute(array($this->id));
        //Execute Query
        if($stmt->rowCount() > 0){

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set Properities
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['category_name'];

            return true;
        }
        
       return false;
    }



    //Create Post
    public function create()
    {
        $query = 'INSERT INTO ' .$this->table. '(category_id , title , body , author) 
        VALUES(? , ? , ? , ?)';

        //Prepare Stmt
        $stmt = $this->conn->prepare($query);
        
        //Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

    
        //Execute Query
        if($stmt->execute(array($this->category_id , $this->title , $this->body , $this->author)))
        {
            return true;
        }
        
        printf("Error: %s.\n" , $stmt->error);
        return false;
    }



    //Update Post
    public function update()
    {
        $query = 'UPDATE ' . 
                    $this->table . '
                  SET 
                    title = ?,
                    body = ?,
                    author = ?,
                    category_id = ?
                  WHERE
                    id = ?';

        //Prepare Stmt
        $stmt = $this->conn->prepare($query);
        
        //Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        //Execute Query
        if($stmt->execute(array($this->title , $this->body , $this->author , $this->category_id , $this->id)))
        {
            return true;
        }
        
        printf("Error: %s.\n" , $stmt->error);
        return false;
    }

    

    //Delete a Post
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';

        //Prepare Stmt
        $stmt = $this->conn->prepare($query);
        
        //Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
    
        //Execute Query
        if($stmt->execute(array($this->id)))
        {
            return true;
        }
        
        printf("Error: %s.\n" , $stmt->error);
        return false;
    }

}