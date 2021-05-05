<?php
  session_start();

  // Flash message helper
  // EXAMPLE - flash('register_success', 'You are now registered');
  // DISPLAY IN VIEW - echo flash('register_success');
  function flash($nome = '', $messagem = '', $class = 'success'){
    if(!empty($nome)){
      if(!empty($messagem) && empty($_SESSION[$nome])){
        if(!empty($_SESSION[$nome])){
          unset($_SESSION[$nome]);
        }

        if(!empty($_SESSION[$nome. '_class'])){
          unset($_SESSION[$nome. '_class']);
        }

        $_SESSION[$nome] = $messagem;
        $_SESSION[$nome. '_class'] = $class;
      } elseif(empty($messagem) && !empty($_SESSION[$nome])){
        $class = !empty($_SESSION[$nome. '_class']) ? $_SESSION[$nome. '_class'] : '';
        echo '<div class="'.$class.'">'.$_SESSION[$nome].'</div>';
        unset($_SESSION[$nome]);
        unset($_SESSION[$nome. '_class']);
      }
    }
  }
    function isloggedIn(){
    if(isset($_SESSION["user_id"])){
        return true;
    }else{
        return false;
    }
    function isloggedOn(){
      if($_SESSION["admin_id"] = 10){
          return true;
      }else{
          return false;
      }
}}