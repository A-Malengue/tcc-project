<?php
    class Posts extends Controller{
       public function __construct(){
           if(!isloggedIn()){
            redirect('users/login');

           }

           $this->postModel = $this->model('Post');
           $this->userModel = $this->model('User');
           $this->uploadModel = $this->model('Upload');
           
       }
             
        public function index(){
            //Get Postes e  comentários
            $posts_comentario = $this->postModel->getComentario();
            $posts = $this->postModel->getPosts();
            $data = [
                'posts' => $posts,
                'comentario' => $posts_comentario
              ];
        
              $this->view('posts/index', $data);
            }
        
            public function add(){
                $posts = $this->postModel->getPosts();
                $posts_comentario = $this->postModel->getComentario();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'comentario' => $posts_comentario,
                    'posts' => $posts,
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'user_nome' => $_SESSION['user_nome'],
                    'title_err' => '',
                    'body_err' =>  '',
                 ];

                 
                 //Validate body
                 if(empty($data['body'])){
                    $data['body_err'] = 'Por favor insira um texto';
                }
                //No errors
                if(empty($data['body_err'])){
                    //Validated
                    if($this->postModel->addPost($data)){
                        flash('post_messagem', 'Reclamação feita');
                        redirect('posts');
                    }else{
                        die('Algo está errado');
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
        public function edite($id){
               
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize Post array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'id' =>  $id,
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'user_nome' => $_SESSION['user_nome'],
                    'title_err' => '',
                    'body_err' =>  '',
                 ];

                 
                 //Validate body
                 if(empty($data['body'])){
                    $data['body_err'] = 'Por favor insira um texto';
                }
                //No errors
                if(empty($data['body_err'])){
                    //Validated
                    if($this->postModel->updatePost($data)){
                        flash('post_messagem', 'Reclamação editada');
                        redirect('posts');
                    }else{
                        die('Algo está errado');
                    }}
                    else{
                    //load view with erros
                    $this->view('/posts/edite', $data);
                }
                


            } else{
                //Get existing post from model
                $post = $this->postModel->getPostById($id);
                //Check for owner
                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }
                $data = [
                    'id' => $id, 
                    'body' => $post->body
                 ];
     
                 $this->view('/posts/edite', $data);
            }
            
        }
        Public function opcoes($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/opcoes', $data);
        }
        // Delete Post
    public function apagar($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //Execute
          if($this->postModel->deletePost($id)){
            // Redirect to login
            flash('post_message', 'Reclamação eliminada');
            redirect('posts');
            } else {
              die('Algo está errado');
            }
        } else {
          redirect('posts');
        }
      }
     
      public function comentar(){
        $post = $this->postModel->getPosts();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Sanitize Post array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'comentario' => trim($_POST['comentario']),
            'user_id' => $_SESSION['user_id'],
            'posts_id' => $_POST['posts_id'],
            'comentario_err' =>  '',
         ];

         
         //Validate body
         if(empty($data['comentario'])){
            $data['comentario_err'] = 'Por favor insira um texto';
        }
        //No errors
        if(empty($data['comentario_err'])){
            //Validated
            if($this->postModel->addComment($data)){
                flash('post_messagem', 'Comentario feito');
                redirect('posts');
            }else{
                die('Algo está errado');
            }}
            else{
            //load view with erros
            $this->view('/posts/index', $data);
        }
        


    } else{
        $data = [ 
            'comentario' => '',
         ];

         $this->view('/posts/index', $data);
    }
    
}


    
}
    