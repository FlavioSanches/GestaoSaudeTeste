<?php
require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");
require_once("dao/PacienteDAO.php");
require_once("dao/MedicoDAO.php");

$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();

if(!empty($flassMessage["msg"])){
    //Limpar a mensagem
    $message->clearMessage();

}

$userDao = new PacienteDAO($conn, $BASE_URL);

$userDaoMedico = new MedicoDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(false);

$userDataMedico = $userDaoMedico->verifyToken(false);


?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <link rel="icon" href="assets/logo.png">
        <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.css" integrity="sha512-r0fo0kMK8myZfuKWk9b6yY8azUnHCPhgNz/uWDl2rtMdWJlk7gmd9socvGZdZzICwAkMgfTkVrplDahQ07Gi0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="<?= $BASE_URL ?>css/styles.css">
        <title>GestaoSaude</title>

    </head>


    <body>
        <nav class="navbar navbar-expand-md area_cabecalho">
            <div class="container-fluid" >
            <a class="nome_azul" href="<?= $BASE_URL ?>">Gestão</a><b class="nome_branco">Saúde</b> 
              <div class="collapse navbar-collapse " id="navbarSupportedContent"> </div>
              <?php if($userData || $userDataMedico):?>
                <div class="area_login">
                   <!-- <div calss="botao_login">
                        <a href="<//?= $BASE_URL ?>./edit_paciente_profile.php"><//?=$userData->name?></a>
                    </div>-->
                    <div class="botao_cadastro">
                        <a href="<?= $BASE_URL ?>./logout.php">SAIR</a>
                    </div>
                </div>
                <?php else: ?>

                    
                <div class="area_login">
                    <div class="botao_login">
                        <a href="<?= $BASE_URL ?>./login.php">LOGIN</a>
                    </div>

                    <div class="botao_cadastro">
                        <a href="<?= $BASE_URL ?>./cadastrar.php">REGISTRE-SE</a>
                    </div>

                        <?php endif; ?> 


                    
   

        </nav> 



    <?php if(!empty($flassMessage["msg"])):?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="msg-container">
            <p class="msg <?=$flassMessage["type"] ?>"><?=$flassMessage["msg"] ?></p>
        </div>
    <?php endif ;?>
