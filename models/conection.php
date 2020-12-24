<?php

class cone{

    public function con(){
        $cone = new PDO('mysql:host=localhost;dbname=control_asistencias;charset=utf8;', 'root', '');
        $cone->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $cone->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
       return $cone;
    }
}

?>
