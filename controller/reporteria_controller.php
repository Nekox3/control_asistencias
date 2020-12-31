<?php

include '../models/reporteria_model.php';    
$report = new reporteria_model();
$horas = $report->obtenerCalculoHoras($_POST);
$datos = $report->obtenerRegistros($_POST);


$dom = new DOMDocument('1.0');

foreach($datos as $key => $val){
   $tr = $dom->createElement("tr");


    $td_docente =$dom->createElement("td");
    $td_hora_inicio = $dom->createElement("td");
    $td_hora_fin = $dom->createElement("td");
    $td_fecha = $dom->createElement("td");
    $td_turno = $dom->createElement("td");
    $td_observacion = $dom->createElement("td");
    
    //--------------------------

    $td_docente->textContent = $val['docente'];
    $td_hora_inicio->textContent = $val['hora_ingreso'];
    $td_hora_fin->textContent = $val['hora_salida'];
    $td_fecha->textContent = $val["fecha"];
    $td_turno->textContent = $val['turno'];
    $td_observacion->textContent = $val['observacion'];

    //-------------------------

    $tr->appendChild($td_docente);
    $tr->appendChild($td_hora_inicio);
    $tr->appendChild($td_hora_fin);
    $tr->appendChild($td_fecha);
    $tr->appendChild($td_turno);
    $tr->appendChild($td_observacion);

    //-------------------------

    $dom->appendChild($tr);
}


echo json_encode(array("horas"=>$horas[0]['horas'], "tabla"=>$dom->saveHTML()));

?>