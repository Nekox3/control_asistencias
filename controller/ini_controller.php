<?php
include '../models/crud_model.php';
if(isset($_POST) && $_POST["flag"]=="get_docentes"){
 $crud = new crud_model();
 $resp_table_rows = $crud->get_data_docente();

 echo json_encode(array("data"=>$resp_table_rows));

}else if(isset($_POST) && $_POST["flag"]=="save_data"){
    $crud = new crud_model();
    $resp_table_rows = $crud->insert_all($_POST['data'],"dbo_horas");
    echo json_encode($resp_table_rows);
}


?>