<?php
    
//LOS NOMBRES DE LAS TABLAS SE AGREGAN EN LOS CONTROLADORES
if(isset($_POST["flag"])){
    include '../models/crud_model.php';  
    if($_POST["flag"]=="get_table"){
           
        $crud = new crud_model();
        $resp_table_rows = $crud->get_data_table("dbo_cursos");

        $dom = new DOMDocument('1.0');
        $tbody = $dom->createElement("tbody");
        
        foreach($resp_table_rows as $key =>$val){

            $tr =$dom->createElement("tr");

            $td_name = $dom->createElement("td");
            $td_name->textContent = $val['curso_nombre'];

            $td_hinicio = $dom->createElement("td");
            $td_hinicio->textContent = $val['hora_inicio'];

            $td_hfin = $dom->createElement("td");
            $td_hfin->textContent = $val['hora_fin'];

            $td_dia = $dom->createElement("td");
            $td_dia->textContent = $val['dia'];

            
            $td_aula = $dom->createElement("td");
            $td_aula->textContent = $val['aula'];

            
            $td_tipo = $dom->createElement("td");
            $td_tipo->textContent = $val['tipo'];


            $td_docente_name = $dom->createElement("td");
            $td_docente_name->textContent = $val['docente_name'];

            //BOTONES------------------------------
            $td_update = $dom->createElement("td");
            $update_button = $dom->createElement("button");
            $update_button->textContent = "Actualizar";
            $update_button->setAttribute("onclick","updateItems('{$val['id']}', saveItem)");
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
            $tr->appendChild($td_name);
            $tr->appendChild($td_hinicio);
            $tr->appendChild($td_hfin);
            $tr->appendChild($td_dia);
            $tr->appendChild($td_docente_name);
            $tr->appendChild($td_aula);
            $tr->appendChild($td_tipo);
            $tr->appendChild($td_update);
            $tr->appendChild($td_delete);

            $dom->appendChild($tr);
        }

        echo $dom->saveHTML();

    }else if($_POST["flag"]=="delete"){
        $crud = new crud_model();
        $resp_table_rows = $crud->delete_data_table($_POST['id'] ,"dbo_cursos");
        echo json_encode($resp_table_rows);
    }else if($_POST["flag"]=="insert"){
        $crud = new crud_model();
        $resp_table_rows = $crud->insert_data_table($_POST['data'],"dbo_cursos");
        echo json_encode($resp_table_rows);
    }else if($_POST["flag"]=="get_update"){
        $crud = new crud_model();
        $resp_table_rows = $crud->update_get_data_table($_POST['id'],"dbo_cursos");
        echo json_encode($resp_table_rows);
    }else if($_POST["flag"]=="add_update"){
        $crud = new crud_model();
        $resp_table_rows = $crud->update_data_table($_POST['data'],$_POST['id'],"dbo_cursos");
        echo json_encode($resp_table_rows);
    }

}


?>