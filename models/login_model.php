<?php
    class login_model {

        private function con(){
            include('conection.php');
            $cone = new cone();
            return $cone->con();            
        }

        public function login($data){
            try{
                $db = $this->con();
                $login = $db->prepare("SELECT u.user_name, r.rol_name, u.rol, u.user_token FROM dbo_user AS u INNER JOIN dbo_roles AS r ON u.rol = r.id WHERE u.user_dni = :dni AND u.user_password = :password ");
                $login->execute(array(":dni"=>$data['dni'], ":password"=>$data['password']));
                $data_send = $login->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($data_send) > 0){
                    return array("state"=>true,"data"=>$data_send);
                }else{
                    return array("state"=>false,"data"=>"Error en DNI o contraseña","exeption"=>null);
                }

            }catch(PDOException $err){
                return array("state"=>false,"data"=>$err->getMessage(),"exeption"=>"error");
            }
       
        }

    }
