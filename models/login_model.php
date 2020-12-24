<?php
    class login_model {
        
        //SE LLAMA LA CONEXION CON LA DB
        private function con(){
            include('conection.php');
            $cone = new cone();
            return $cone->con();            
        }


        public function login($data){
            try{
                //SE PREPARA EL QUERY QUE VALIDA EL LOGIN
                $db = $this->con();
                $login = $db->prepare("SELECT u.usuario_nombre, r.rol_nombre, u.rol, u.usuario_token FROM dbo_user AS u INNER JOIN dbo_roles AS r ON u.rol = r.id WHERE u.usuario_dni = :dni AND u.usuario_clave = :password ");
                $login->execute(array(":dni"=>$data['dni'], ":password"=>$data['password']));
                $data_send = $login->fetchAll(PDO::FETCH_ASSOC);
                
                //VALIDA SI EL USUARIO EXISTE O NO
                if(count($data_send) > 0){
                    return array("state"=>true,"data"=>$data_send);
                }else{
                    return array("state"=>false,"data"=>"Error en DNI o contraseña","exeption"=>null);
                }
            //DEVUELVE SI HAY UN ERROR EN LOS DATOS (POR CUESTION DE CARACTERES ESPECIALES O QUE NO SOPORTE LA DB)
            }catch(PDOException $err){
                return array("state"=>false,"data"=>$err->getMessage(),"exeption"=>"error");
            }
       
        }

    }
