<?php

switch($_GET["route"]){
    case "admin":
        require_once('../views/components/side_menu_admin.php');
        require_once('../views/inicio_view.php');
        break;
    
        case "secretaria":
        require_once('../views/components/side_menu_secretaria.php');
        require_once('../views/inicio_view.php');
        break;

        //VISTAS GENERALES
        case "docente-data-secretaria":
            require_once('../views/components/side_menu_secretaria.php');
            require_once('../views/docente_data_view.php');
        break;

        case "docente-secretaria":
            require_once('../views/components/side_menu_secretaria.php');
            require_once('../views/docente_view.php');
        break;

        case "asignatura-secretaria":
            require_once('../views/components/side_menu_secretaria.php');
            require_once('../views/asignatura_view.php');
        break;

        case "reporte-secretaria":
            require_once('../views/components/side_menu_secretaria.php');
            require_once('../views/reporte_view.php');
        break;

}



?>