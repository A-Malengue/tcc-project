<?php
    class Posts extends Controller{
       public function __construct(){
           if(!isloggedIn()){
            redirect("users/login");

           }

           $this->postModel = $this->model("Post");
           $this->userModel = $this->model("User");
           
       }
       
       
        public function index(){
            //Get Posts
            $posts = $this->postModel->getPosts();

           
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    "posts" => $posts,
                    //'title' => trim($_POST['title']), 
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' =>  '',
                 ];

                 //Validate title
                 /*if(empty($data['title'])){
                     $data['title_err'] = 'Please enter title';
                 }*/
                 //Validate body
                 if(empty($data['body'])){
                    $data['body_err'] = 'Please enter title';
                }
                //No errors
                if(/*empty($data['title_err']) &&*/ empty($data['body_err'])){
                    //Validated
                    if($this->postModel->addPost($data)){
                        flash('post_messagem', 'Reclamação feita');
                        redirect('posts');
                    }else{
                        die('Algo de errado');
                    }}
                    else{
                    //load view with erros
                    $this->view('/posts/index', $data);
                }
                


            } else{
                $data = [
                    'title' => '', 
                    'body' => '',
                 ];
     
                 $this->view('/posts/index', $data);
            }
            
        }
        Public function show ($id = null){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getPostById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }
    }