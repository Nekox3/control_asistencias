<?php
    
//LOS NOMBRES DE LAS TABLAS SE AGREGAN EN LOS CONTROLADORES
if(isset($_POST["flag"])){
    include '../models/crud_model.php';  
    
    if($_POST["flag"]=="get_table"){
          
        $crud = new crud_model();
        $resp_table_rows = $crud->get_data_table("dbo_user","WHERE rol = 1");

        $dom = new DOMDocument('1.0');
        $tbody = $dom->createElement("tbody");
        
        foreach($resp_table_rows as $key =>$val){

            $tr =$dom->createElement("tr");

            $td_nombre = $dom->createElement("td");
            $td_nombre->textContent = $val['usuario_nombre'];

            $td_apellidos = $dom->createElement("td");
            $td_apellidos->textContent = $val['usuario_apellidos'];

            $td_docente_telefono = $dom->createElement("td");
            $td_docente_telefono->textContent = $val['usuario_telefono'];

            $td_docente_correo = $dom->createElement("td");
            $td_docente_correo->textContent = $val['usuario_correo'];

            $td_docente_dni = $dom->createElement("td");
            $td_docente_dni->textContent = $val['usuario_dni'];

            //BOTONES------------------------------
            $td_update = $dom->createElement("td");
            $update_button = $dom->createElement("button");
            $update_button->textContent = "Actualizar";
            $update_button->setAttribute("onclick","updateItems('{$val['id']}',saveItem)");
            $update_button->setAttribute("data-toggle","modal");
            $update_button->setAttribute("data-target","#myModal");
            $update_button->setAttribute("class","btn btn-warning");
            $td_update->appendChild($update_button);

            $td_delete = $dom->createElement("td");
            $delete_button = $dom->createElement("button");
            $delete_button->textContent = "Eliminar";
            $delete_button->setAttribute("onclick","deleteitems('{$val['id']}')");
            $delete_button->setAttribute("class","btn btn-danger");
            $td_delete->appendChild($delete_button);
            //BOTONES------------------------------


            //SE AGREGAN AL TR
            $tr->appendChild($td_nombre);
            $tr->appendChild($td_apellidos);
            $tr->appendChild($td_docente_telefono);
            $tr->appendChild($td_docente_correo);
            $tr->appendChild($td_docente_dni);
            $tr->appendChild($td_update);
            $tr->appendChild($td_delete);

            $dom->appendChild($tr);
        }
        
        echo $dom->saveHTML();

    }else if($_POST["flag"]=="delete"){
        $crud = new crud_model();
        $resp_table_rows = $crud->delete_data_table($_POST['id'] ,"dbo_user","AND rol = 1");
        echo json_encode($resp_table_rows);
    }else if($_POST["flag"]=="insert"){
            $crud = new crud_model();
            $resp_table_rows = $crud->insert_data_table($_POST['data'],"dbo_user");
            echo json_encode($resp_table_rows);

    }else if($_POST["flag"]=="get_update"){
        $crud = new crud_model();
        $resp_table_rows = $crud->update_get_data_table($_POST['id'],"dbo_user");
        echo json_encode($resp_table_rows);
    }else if($_POST["flag"]=="add_update"){
        $crud = new crud_model();
        $resp_table_rows = $crud->update_data_table($_POST['data'],$_POST['id'],"dbo_user");
        echo json_encode($resp_table_rows);
    }



}


?>