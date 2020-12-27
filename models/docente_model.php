<?php

class docente_model{
        //SE LLAMA LA CONEXION CON LA DB
        private function con(){
            include('conection.php');
            $cone = new cone();
            return $cone->con();            
        }


        public function get_data_table(){
            
        }
}

?>