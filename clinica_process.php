<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Clinica.php");
require_once("models/Message.php");
require_once("dao/MedicoDAO.php");
require_once("dao/ClinicaDAO.php");


$message = new Message($BASE_URL);
$userDao = new MedicoDAO($conn, $BASE_URL);
$clinicaDao = new ClinicaDAO($conn, $BASE_URL);

$type = filter_input(INPUT_POST, "type");

$userData = $userDao->verifyToken(true);

if($type === "create"){

    $name = filter_input(INPUT_POST, "name");
    $cnpj = filter_input(INPUT_POST, "cnpj");
    $cidade = filter_input(INPUT_POST, "cidade");
    $pais = filter_input(INPUT_POST, "pais");
    $estado = filter_input(INPUT_POST, "estado");
    $rua = filter_input(INPUT_POST, "rua");
    
    $clinica = new Clinica();

    if(!empty($name) && !empty($cnpj)){
        $clinica->name = $name;
        $clinica->cnpj = $cnpj;
        $clinica->cidade = $cidade;
        $clinica->pais = $pais;
        $clinica->estado = $estado;
        $clinica->rua = $rua;
        $clinica->medico_id = $userData->id;


        $clinicaDao->create($clinica);


    }else{
        $message->setMessage("Falta adcionar o nome e o cnpj da clinica!", "error", "back"); 
    }


}
else if($type === "delete"){
    $id = filter_input(INPUT_POST, "id");

    $clinicaDao->destroy($id);

}else if($type === "update"){
    $name = filter_input(INPUT_POST, "name");
    $cnpj = filter_input(INPUT_POST, "cnpj");
    $cidade = filter_input(INPUT_POST, "cidade");
    $pais = filter_input(INPUT_POST, "pais");
    $estado = filter_input(INPUT_POST, "estado");
    $rua = filter_input(INPUT_POST, "rua");
    $id = filter_input(INPUT_POST, "id");

    $clinicaData = $clinicaDao->findById($id);

    if(!empty($name) && !empty($cnpj)){
    $clinicaData->name = $name;
    $clinicaData->cnpj = $cnpj;
    $clinicaData->cidade = $cidade;
    $clinicaData->pais = $pais;
    $clinicaData->estado = $estado;
    $clinicaData->cidade = $cidade;
    $clinicaData->rua = $rua;

    $clinicaDao->updade($clinicaData);

    }else{
        $message->setMessage("Falta adcionar o nome e o cnpj da clinica!", "error", "back"); 
    }

}else{
    $message->setMessage("Informações invalidas!", "error", "back");
}

