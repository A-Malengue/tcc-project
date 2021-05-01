<?php
  class Pages extends Controller {
    public function __construct(){
    
    }

    public function index(){
      if(isloggedIn()){
        redirect('posts');
      }
        $data =  [ 'title' => "Portal de Reclamações do Kilamba"];
        
      $this->view('pages/index', $data);
    }

    public function about(){
        $data =  [
          'title' => "Sobre",
          'description'  => "Portal para os moradores do Kilamba expressarem as suas reclamações."
      
      ];
        $this->view('pages/about', $data);
    }
        
    }
  
