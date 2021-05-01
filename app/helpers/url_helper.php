<?php
//Página de rediricionamento
function redirect($page){
    header("location: " . URLROOT . "/" . $page);
}
