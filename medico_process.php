<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Medico.php");
require_once("models/Message.php");
require_once("dao/MedicoDAO.php");

$message = new Message($BASE_URL);

$userDao = new MedicoDAO($conn, $BASE_URL);

//Resgata o tipo de formulario
$type = filter_input(INPUT_POST, "type");

//Atualizar usuario
if($type === "update"){
    //Resgata dados do usuário

    //print_r($_POST);exit;
    
    $userData = $userDao->verifyToken();

    //print_r($userData);exit;

    //recebe dados do post
    $name = filter_input(INPUT_POST, "name");
    $email = filter_input(INPUT_POST, "email");
    $crm = filter_input(INPUT_POST, "crm");
    $cpf = filter_input(INPUT_POST, "cpf");
    $especialidade = filter_input(INPUT_POST, "especialidade");
    

    //criar um novo objeto de usuário
    $user = new Medico();

    //Preencher os dados de usuário
    $userData->name = $name;
    $userData->email = $email;
    $userData->crm = $crm;
    $userData->cpf = $cpf;
    $userData->especialidade = $especialidade;




    //Upload da imagem
    if(isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])){
        //print_r($_POST);exit;
       // print_r($_FILES);exit;

        $image = $_FILES["image"];
        $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg", "image/jpg"];

        //Checagem de tipo de imagem
        if(in_array($image["type"], $imageTypes)){

            //Checar se jpg
            if(in_array($image, $jpgArray)){

                $imageFile = imagecreatefromjpeg($image["tmp_name"]);

            //imagem é png
            }else{
                $imageFile = imagecreatefrompng($image["tmp_name"]);
            }

            $imageName = $user->imageGenerateName();

            if($imageFile !== false) {
                imagejpeg($imageFile, "./assets/usuario/" . $imageName, 100);
            } else {
                $message->setMessage("Falha ao processar a imagem.", "error", "back");
            }

            $userData->image = $imageName;


        }else{

            $message->setMessage("Tipo invalido de imagem,insira png ou jpg!", "error", "index.php" );

        }

    }

    $userDao->update($userData);

    //Atualizar senha do usario
}else if($type === "changepassword"){
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");
    
    $id = filter_input(INPUT_POST, "id");

    if($password == $confirmpassword)
    {
        $user = new Medico();

        $finalPassword = $user->generatePassword($password);

        $user->password = $finalPassword;
        $user->id = $id;

        $userDao->changePassoword($user);



    }else{
        $message->setMessage("As senhas não são iguais!", "error", "back" );
    }



}else{
    $message->setMessage("Informações inválidas!", "error", "index.php" );
}

