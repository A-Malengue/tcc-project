<?php
    class Posts extends Controller{
       public function __construct(){
           if(!isloggedIn()){
            redirect("users/login");

           }

           $this->postModel = $this->model("Post");
           
       }
       
       
        public function index(){
            //Get Posts
            $posts = $this->postModel->getPosts();

            $data = [
               "posts" => $posts 
            ];

            $this->view("posts/index", $data);
        }

        public function add(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    "title" => trim($_POST["title"]), 
                    "body" => trim($_POST["body"]),
                    "user_id" => $_SESSION["user_id"],
                    "title_err" => "",
                    "body_err" =>  "",
                 ];

                 //Validate title
                 if(empty($data["title"])){
                     $data["title_err"] = "Please enter title";
                 }
                 //Validate body
                 if(empty($data["body"])){
                    $data["body_err"] = "Please enter title";
                }

                if(empty($data["title_err"]) && empty($data["body_err"])){
                    if($this->postModel->addPost($data)){
                        redirect("posts");
                    }else{
                        die("Algo de errado");
                    }

                }else{
                    //load view with erros
                    $this->view("posts/index", $data);
                }

            } else{
                $data = [
                    "title" => "", 
                    "body" => "",
                 ];
     
                 $this->view("posts/index", $data);
            }
            
        }
    }
