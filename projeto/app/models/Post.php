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
        $this->db->query("INSERT INTO posts (user_id, body) VALUES(:user_id, :body)");
        //Bind Values
        //$this->db->bind(":title", $data["title"]);
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":body", $data["body"]);
    

    //Execute
    if($this->db->execute()){
        return true;
    } else{
        return false;
    }
    }
    // Get posts by Id
    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id =:id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    // Update Post
    public function updatePost($data){
        // Prepare Query
        $this->db->query('UPDATE posts SET  body = :body WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $data['id']);
        //$this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
       // Delete Post
    public function deletePost($id){
        // Prepare Query
        $this->db->query('DELETE FROM posts WHERE id = :id');
  
        // Bind Values
        $this->db->bind(':id', $id);
        
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
      public function getComentario(){
        $this->db->query("SELECT *, 
                                  posts_comentario.id as posts_comentarioId,
                                  posts.id as postId,
                                  users.id as userId
                                  FROM posts_comentario
                                  INNER JOIN users
                                  ON posts_comentario.user_id = users.id
                                  INNER JOIN posts
                                  ON posts_comentario.posts_id = posts.id
                                  ORDER BY posts_comentario.criado_no ASC      
                                 ");
        
        $row = $this->db->resultSet();

        return $row;

    }
    public function addComment($data){
      $this->db->query("INSERT INTO posts_comentario (comentario, user_id, posts_id) VALUES(:comentario, :user_id, :posts_id)");
        //Bind Values
        $this->db->bind(":comentario", $data["comentario"]);
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":posts_id", $data["posts_id"]);
    //Execute
    if($this->db->execute()){
        return true;
    } else{
        return false;
    }
    }
           // Delete Post
           public function deletarcomentario($posts_id){
            // Prepare Query
            $this->db->query('DELETE FROM posts_comentario WHERE posts_id = :posts_id');
      
            // Bind Values
            $this->db->bind(':posts_id', $posts_id);
            
            //Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

        public function curtir($data){
          $this->db->query("INSERT posts_curtir (user_id, posts_id) VALUES (:user_id, :posts_id)");
            //Bind Values
            $this->db->bind(":user_id", $data["user_id"]);
            $this->db->bind(":posts_id", $data["posts_id"]);
        //Execute
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
      
      }
      public function getCurtir(){
        $this->db->query("SELECT COUNT(*) FROM posts_curtir where posts_id =:posts_id");
          $row = $this->db->resultSet();
          return $row;
  
    }
      public function verificarCurtir(){
        $this->db->query("SELECT id FROM posts_curtir where posts_id =:posts_id AND users_id =:users_id");
              $row = $this->db->resultSet();
              return COUNT($row);
      
      }
}