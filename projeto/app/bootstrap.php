<?php
  //Load config
  require_once "config/config.php";

  
//Carrega helpers
require_once "helpers/url_helper.php";
require_once 'helpers/session_helper.php';


  //AUTOLOAD core libraries
  spl_autoload_register(function($className){
    require_once "libraries/" . $className . ".php";
    

  });

