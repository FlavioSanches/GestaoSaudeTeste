<?php
    require_once("templates/header.php");
    require_once("models/Clinica.php");
    require_once("dao/ClinicaDAO.php");

    $id = filter_input(INPUT_GET, "id");

    $clinica;

    $clinicaDao = new ClinicaDAO($conn, $BASE_URL);

    if(empty($id)){
       $message->setMessage("A clinica não foi encontrada", "error", "index.php"); 
    }else{
        $clinica = $clinicaDao->findById($id);
        if(!$clinica){
            $message->setMessage("A clinica não foi encontrada", "error", "index.php"); 
        }
    }

    

?>
<div>
    <div>
        <div>
            <h1><?= $clinica->name?></h1>
            <h1><?= $clinica->cnpj?></h1>
            <h1><?= $clinica->cidade?></h1>
            <h1><?= $clinica->pais?></h1>
            <h1><?= $clinica->estado ?></h1>
            <h1><?= $clinica->rua ?></h1>

        </div>
    </div>
</div>

<?php
    require_once("templates/footer.php");
?>





