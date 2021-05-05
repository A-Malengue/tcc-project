<?php 
    class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model("User");
    }

    public function cadastro(){
        //Check for posts
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // PROCESS form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            //init data
            $data =[
                "nome" =>  trim($_POST["nome"]),
                "email" => trim($_POST["email"]), 
                "senha" => trim($_POST["senha"]), 
                "confirme_senha" => trim($_POST["confirme_senha"]), 
                "nome_err" => "",
                "email_err" => "",
                "senha_err" => "",
                "confirme_senha_err" => "",
                ];
                //Validate Email
                if(empty($data["email"])){
                    $data["email_err"] = "Coloque um Email";
                }else{
                    //Check Email
                    if($this->userModel->findUserByEmail($data["email"])){
                        $data["email_err"] = "Email já está sendo usado";
                    }
                }
                //Validate nome
                if(empty($data["nome"])){
                    $data["nome_err"] = "Coloque o Nome";
                }
                //Validate Senha
                if(empty($data["senha"])){
                    $data["senha_err"] = "Coloque a senha";
                }   elseif(strlen($data["senha"]) < 6){
                    $data["senha_err"] = "Senha deve ter no minimo 6 letras";
                   }
                   //Validate Confirme Senha
                   if(empty($data["confirme_senha"])){
                    $data["confirme_senha_err"] = "confirme senha";
                }   else{
                    if($data["senha"] != $data["confirme_senha"]){
                        $data["confirme_senha_err"] = "Senha não é a mesma";
                    }
                }
                
                //Make sure errors are empty
                if(empty($data["email_err"]) && empty($data["nome_err"]) && empty($data["senha_err"]) && empty($data["confirme_senha_err"])){
                    //Validate     
                    //Hash password
                    $data["senha"] = password_hash($data["senha"], PASSWORD_DEFAULT);
                
                    //Register User
                    if($this->userModel->register($data)){
                        flash('register_success', 'Registro feito agora podes fazer o login');
                        redirect("users/login");
                    }else{
                        die("Algo está errado");
                    }
                
                } else{
                    //load view
            $this->view("users/cadastro", $data);
                }

        } else {
            //init data
            $data =[
            "nome" => "",
            "email" => "",
            "senha" => "",
            "confirme_senha" => "",
            "nome_err" => "",
            "email_err" => "",
            "senha_err" => "",
            "confirme_senha_err" => "",
            ];

            //load view 
            $this->view("users/cadastro", $data);
        }
    }

    public function login(){
        //Check for posts
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // PROCESS form

             //Sanitize POST data
             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             //init data
             $data =[
                 
                 "email" => trim($_POST["email"]), 
                 "senha" => trim($_POST["senha"]),     
                 "email_err" => "",
                 "senha_err" => "",
                 ];
 
                //Validate Email
                if(empty($data["email"])){
                    $data["email_err"] = "Coloque o email";
                }
                 //Validate Senha
                 if(empty($data["senha"])){
                    $data["senha_err"] = "Coloque a senha";
                } 

                //Check for user/email
                if($this->userModel->findUserByEmail($data["email"])){
                    //User found
                }else{
                    $data["email_err"] = "Usuário não encontrado";
                }
                
            //Make sure errors are empty
            if(empty($data["email_err"])  && empty($data["senha_err"])){
                //Validate
                //Check and set logged in user
                $loggedInUser = $this->userModel->login($data["email"], $data["senha"]);
                if($loggedInUser){
                    //Create Session
                    $this->createdUserSession($loggedInUser);
                }else{
                    $data["senha_err"] = "Senha Incorreta ";

                    $this->view("users/login", $data);

                }

            } else{
                //load view
        $this->view("users/login", $data);
            }
        } else {
            //init data
            $data =[
            "email" => "",
            "senha" => "",
            "email_err" => "",
            "senha_err" => "",
            ];

            //load view
            $this->view("users/login", $data);
        }
        
    }
    
    public function createdUserSession($user){
        $_SESSION["user_id"] = $user->id;
        $_SESSION["admin_id"] = $user->id = 10;
        $_SESSION["user_email"] = $user->email;
        $_SESSION["user_nome"] = $user->nome;
        redirect("posts");
    }

    public function logout(){
        unset($_SESSION["user_id"]);
        unset($_SESSION["user_email"]);
        unset($_SESSION["user_nome"]);
        session_destroy();
        redirect("users/login");
    }
    public function perfil(){
        $this->view("users/perfil");
      }

    
}
