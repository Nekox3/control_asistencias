<?php
    
//LOS NOMBRES DE LAS TABLAS SE AGREGAN EN LOS CONTROLADORES
if(isset($_POST["flag"])){
    if($_POST["flag"]=="get_table"){
        include '../models/crud_model.php';    
        $crud = new crud_model();
        $resp_table_rows = $crud->get_data_table("dbo_docente");

        $dom = new DOMDocument('1.0');
        $tbody = $dom->createElement("tbody");
        
        foreach($resp_table_rows as $key =>$val){

            $tr =$dom->createElement("tr");

            $td_dni = $dom->createElement("td");
            $td_dni->textContent = $val['docente_dni'];

            $td_hinicio = $dom->createElement("td");
            $td_hinicio->textContent = $val['docente_hora_inicio'];

            $td_hfin = $dom->createElement("td");
            $td_hfin->textContent = $val['docente_hora_salida'];

            $td_docente_name = $dom->createElement("td");
            $td_docente_name->textContent = $val['docente_nombre'];

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
            $tr->appendChild($td_docente_name);
            $tr->appendChild($td_hinicio);
            $tr->appendChild($td_hfin);
            $tr->appendChild($td_dni);
            $tr->appendChild($td_update);
            $tr->appendChild($td_delete);

            $dom->appendChild($tr);
        }

        echo $dom->saveHTML();
    }
}


?>