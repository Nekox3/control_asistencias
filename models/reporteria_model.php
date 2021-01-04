<?php

class reporteria_model{
        //SE LLAMA LA CONEXION CON LA DB
        private function con(){
            require_once('conection.php');
            $cone = new cone();
            return $cone->con();            
        }

        
        public function obtenerCalculoHoras($info){
            $db = $this->con();
            $data_table = $db->prepare("SELECT SUM(HOUR(TIMEDIFF(hora_ingreso, hora_salida)) + CASE WHEN MINUTE(TIMEDIFF(hora_ingreso, hora_salida)) % 60 > 20 THEN 1 ELSE 0 END )as horas FROM dbo_horas WHERE fecha BETWEEN :inicio AND :fin AND dni LIKE :dni ");
            $data_table->execute(array(":dni"=>$info['dni'], ":inicio"=>$info['hora_inicio'],":fin"=>$info['hora_fin']));
            $data = $data_table->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }


        public function obtenerRegistros($info){
            $db = $this->con();
            $data_table = $db->prepare("SELECT * FROM dbo_horas WHERE fecha BETWEEN :inicio AND :fin AND dni LIKE :dni ");
            $data_table->execute(array(":dni"=>$info['dni'], ":inicio"=>$info['hora_inicio'],":fin"=>$info['hora_fin']));
            $data = $data_table->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        

    }





?>