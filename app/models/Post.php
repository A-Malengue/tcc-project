<?php
class Post{
    private $db;

    public function __construct(){
        $this->db = new DATABASE;
        
    }

    public function getPosts(){
        $this->db->query("SELECT *, 
                            posts.id as postId,
                            users.id as userId
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id = users.id
                            ORDER BY posts.criado_em DESC      
                            ");

        $results = $this->db->resultSet();
        return $results;

    }
    public function addPost($data){
        $this->db->query("INSERT INTO posts (title, user_id, body) VALUES(:title, :user_id, :body)");
        //Bind Values
        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":body", $data["body"]);
    

    //Execute
    if($this->db->execute()){
        return true;
    } else{
        return false;
    }
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> b64e1cbeafee073f4c4a85c1b746eb0716cfa96a
