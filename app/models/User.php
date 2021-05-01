<?php
class User{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Register User
    public function register($data){
        $this->db->query("INSERT INTO users (nome, email, senha) VALUES(:nome, :email, :senha)");
        //Bind Values
        $this->db->bind(":nome", $data["nome"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":senha", $data["senha"]);
    

    //Execute
    if($this->db->execute()){
        return true;
    } else{
        return false;
    }
}

    //Login User
    public function login($email, $senha){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $email);
        
        $row = $this->db->single();

        $hashed_password = $row->senha;
        if(password_verify($senha, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }
    //Find User by Email
    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }
     //Get User by Id
     public function getUserById($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(":id", $id);

        $row = $this->db->single();

        return $row;
    }
    

}