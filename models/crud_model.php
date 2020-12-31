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
            try{
            $ata = json_decode($data);
            $data_insert = array();
            for($a =0;$a < count($ata);$a++){
                    $data_insert[] = array("column"=>$ata[$a]->column, "data"=>$ata[$a]->data);
            }
               $statement ="";
               $values = "";
                   foreach($data_insert as $keyP => $valP){
                           if(!empty($valP["data"])){
                               $statement .= $valP["column"].",";
                               $values .= "'".$valP["data"]."'".",";
                           }
                   }
               
            $fields = substr($statement,0,-1);
            $vals = substr($values,0,-1);

            $db = $this->con();
            $data_table = $db->prepare("INSERT INTO {$table} ({$fields})VALUES({$vals}) ");
            $data_table->execute();
            return array("state"=>true);  

            }catch(PDOException $err){
                return array("state"=>false, "error"=>$err->getMessage());
            }
        }
        


        public function update_data_table($data, $array, $id, $table){
            try{

                $db = $this->con();
                $data_table = $db->prepare("UPDATE {$table} SET  WHERE id = {$data['id']} ");
                $data_table->execute();
    
                }catch(PDOException $err){
                    return array();
                }
        }

        
        public function delete_data_table($id,$table){
            try{
                $db = $this->con();
                $data_table = $db->prepare("DELETE FROM {$table} WHERE id = :id");
                $data_table->execute(array(":id"=>$id));
                    return array("state"=>true);    
                }catch(PDOException $err){
                    return array("state"=>false, "error"=>$err->getMessage());
                }
        }
}

?>