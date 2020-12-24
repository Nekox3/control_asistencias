<?php

switch($_GET["route"]){
    case "inicio":

        require_once('../views/components/side_menu.php');
        require_once('../views/inicio_view.php');
        
        break;
    case "secretaria":
        
        require_once('../views/components/side_menu.php');
        require_once('../views/inicio_view.php');
        break;
}



?>