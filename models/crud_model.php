<?php

class crud_model{
        //SE LLAMA LA CONEXION CON LA DB
        private function con(){
            include('conection.php');
            $cone = new cone();
            return $cone->con();            
        }


        public function get_data_table($table,$where=""){
            $db = $this->con();
            $data_table = $db->prepare("SELECT * FROM {$table} {$where}");
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
        

        public function update_get_data_table($id, $table){
                $db = $this->con();
                $data_table = $db->prepare("SELECT * FROM {$table} WHERE id = {$id} ");
                $data_table->execute();
                $rows = $data_table->fetchAll(PDO::FETCH_ASSOC);

                $data = array();
                $elements = $rows[0];
                foreach($elements as $key => $val){
                    $data[] = array("id"=>$key, "val"=>$val);
                }
                return $data;    
        }


        public function update_data_table($data, $id, $table){
            try{

                $ata = json_decode($data);
                $data_insert = array();
                for($a =0;$a < count($ata);$a++){
                        $data_insert[] = array("column"=>$ata[$a]->column, "data"=>$ata[$a]->data);
                }
                   $statement ="";
                       foreach($data_insert as $keyP => $valP){
                               if(!empty($valP["data"])){
                                   $statement .= $valP["column"]."='{$valP["data"]}',";
                                 }
                       }
                $fields = substr($statement,0,-1);
                $query = "UPDATE {$table} SET {$fields} WHERE id = {$id} ";
                //echo $query;
                //exit();

                $db = $this->con();
                $data_table = $db->prepare($query);
                $data_table->execute();

                    return array("state"=>true);  
                }catch(PDOException $err){
                    return array("state"=>false, "error"=>$err->getMessage());
                }
        }

        
        public function delete_data_table($id,$table,$op=""){
            try{
                $db = $this->con();
                $data_table = $db->prepare("DELETE FROM {$table} WHERE id = :id {$op}");
                $data_table->execute(array(":id"=>$id));
                    return array("state"=>true);    
                }catch(PDOException $err){
                    return array("state"=>false, "error"=>$err->getMessage());
                }
        }

        public function get_data_docente(){
            $db = $this->con();
            $data_table = $db->prepare("SELECT * FROM dbo_user WHERE rol = 1");
            $data_table->execute();
            $table_result_rows = $data_table->fetchAll(PDO::FETCH_ASSOC);
            return $table_result_rows;
        }

        public function insert_all($data, $table){
            try{
                $ata = json_decode($data);

                $statement ="";
                foreach($ata as $key =>$val){
                    $statement .= "('{$val->fecha}','{$val->ingreso}','{$val->salida}','{$val->dni}','{$val->docente}','{$val->turno}','{$val->observacion}'),";
                }
                $fields = substr($statement,0,-1);
                //echo $fields;
                $query = "INSERT INTO {$table} (fecha,hora_ingreso,hora_salida,dni,docente,turno,observacion)VALUES{$fields}";
                //echo $query;
                //exit();
    
                $db = $this->con();
                $data_table = $db->prepare($query);
                $data_table->execute();
                return array("state"=>true);  
    
                }catch(PDOException $err){
                    return array("state"=>false, "error"=>$err->getMessage());
                }
        }

}

?>