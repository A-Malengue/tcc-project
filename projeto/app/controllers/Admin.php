<?php
  class Admin extends Controller{
    public function __construct(){
      
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
    }

    public function dash(){
      $this->view("admin/dash");
    }
    public function reclama(){
      $this->view("admin/reclama");
    }
    public function usuario(){
      $this->view("admin/usuario");
    }
    
    public function createdUserSession($user){
      $_SESSION["admin_id"] = $user->id = 10;
      $_SESSION["user_email"] = $user->email;
      $_SESSION["user_nome"] = $user->nome;
      redirect("admin/dash");
  }
  }
  