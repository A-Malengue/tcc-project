<?php
/*
 *Base Controller
 *Carrega o Model e view
 */
class Controller{
    //Carrega o Model
     public function model($model){
     // Require ficheiro do model
     require_once "../app/models/" . $model . ".php";
    
    // Instaciar model
    return new $model();
    }

    // carrega view
    public function view($view, $data = []){
    //Procura pelo ficheiro view
    if(file_exists("../app/views/" . $view . ".php")){
        require_once "../app/views/" .$view . ".php";

    }
    else{
        //A view não existe
        die("View não existe");
    }

    }

}
