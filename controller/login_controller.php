<?php

    if(isset($_POST["flag"]) && $_POST["flag"] == "login"){

    include '../models/login_model.php';
    $data = new login_model();
    $resp_login = $data->login($_POST);

    $response["datos"] = $resp_login;
    $response["url"] = "../controller/routes_controller.php?route=inicio";
    echo json_encode($response);
}else{
    require_once('../views/login_view.php');
}

