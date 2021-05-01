<?php
  class Admin extends Controller{
   /* public function __construct(){
      if(isset($_SESSION['user_id'])){
        redirect('admin/dash');
      }
    }*/

    public function dash(){
      $this->view("admin/dash");
    }
    public function reclama(){
      $this->view("admin/reclama");
    }
    public function usuario(){
      $this->view("admin/usuario");
    }
    
  
  }