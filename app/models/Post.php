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
}