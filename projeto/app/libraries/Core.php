<?php
/*
*App core Class 
*Cria URL e carrega core controller
*Formato da URL - /controller/method/params
*/

class Core{
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct(){
        //print_r($this->getUrl());

        $url = $this->getUrl();

        // Ver nos controllers pelo primeiro valor  
        if(isset($url[0])){
        if(file_exists("../app/controllers/" . ucwords($url[0]). ".php")){
            // Se existir set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 index
        unset($url[0]);
    }
}
        //Exigi o Controller
        require_once "../app/controllers/" . $this->currentController . ".php";

        //instanciar a classe Controller
        $this->currentController = new $this->currentController;
        
        //Procurar pela segunda parte da url
        if(isset($url[1])) {
             //Ver se o Metodo existe
             if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            
            //unset 1 index
            
            unset($url[1]);
            
            }

    
        }  
        
        // Get params
        $this->params = $url ? array_values($url) : [];

        //Call a callback with array of params
        
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }




    public function getUrl(){
       if(isset($_GET["url"])){
        $url = rtrim($_GET["url"], "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode("/", $url);
        return $url;
        
       }
    
    }
}

