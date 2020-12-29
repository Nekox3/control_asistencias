<?php

class crud_model{
        //SE LLAMA LA CONEXION CON LA DB
        private function con(){
            include('conection.php');
            $cone = new cone();
            return $cone->con();            
        }


        public function get_data_table($table){
            $db = $this->con();
            $data_table = $db->prepare("SELECT * FROM {$table}");
            $data_table->execute();
            $table_result_rows = $data_table->fetchAll(PDO::FETCH_ASSOC);
            return $table_result_rows;
        }

        public function insert_data_table($data,$table){
            
        }

        public function update_data_table($data,$table){
            
        }

        public function delete_data_table($id,$table){
            
        }
}

?>