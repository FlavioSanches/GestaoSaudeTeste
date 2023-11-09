<?php
    require_once("templates/header.php");
    require_once("models/Medico.php");
    require_once("dao/MedicoDAO.php");
    require_once("dao/ClinicaDAO.php");

    $user = new Medico();

    $userDao = new MedicoDao($conn, $BASE_URL);

    $userData = $userDao->verifyToken(true);

    $clinicaDao = new ClinicaDAO($conn, $BASE_URL);

    $id = filter_input(INPUT_GET,"id");

    if(empty($id)){
        $message->setMessage("A clinica não foi encontrada", "error", "index.php"); 
     }else{
         $clinica = $clinicaDao->findById($id);
         if(!$clinica){
             $message->setMessage("A clinica não foi encontrada", "error", "index.php"); 
         }
     }
 
     
?>

<section class="logo">

        <div class="pesquisar custom-bg-blue">
            <div class="container-fluid">
                <h1>Adiconar Consultório</h1>
                <form action="<?= $BASE_URL ?>clinica_process.php" id="edit-clinica-form" method="POST">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?=$clinica->id?>">
                    <div>
                       <label for="name">Nome:</label>
                       <input class="ipt_nome" type="text"  id="name" name="name" placeholder="digite o nome da clinica" value="<?=$clinica->name ?>">
                    </div>
                    <div>
                       <label for="cnpj">CNPJ:</label>
                       <input class="ipt_nome" type="text"  id="cnpj" name="cnpj" placeholder="digite o CNPJ da clinica" value="<?=$clinica->cnpj ?>">
                    </div>

                        <div class="form-group col-md-4">
                            <label for="pais" class="escrita">País:</label>
                            <select name="pais" id="pais" class="form-control" required>
                                <option selected hidden value="<?=$clinica->pais ?>"> <?=$clinica->pais ?></option>
                                <option value="Algeria">Algeria</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Brazil">Brazil</option>
                                <option value="France">France</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Tonga">Tonga</option>
                                <option value="United States">United States</option>
                                <option value="Uruguay">Uruguay</option>
                                <!-- Add options for other states here -->
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="estado" class="escrita">Estado:</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option selected hidden value="<?=$clinica->estado ?>"><?=$clinica->estado ?> </option>
                                <option value="Acre">Acre</option>
                                <option value="Alagoas">Alagoas</option>
                                <option value="Amapá">Amapá</option>
                                <option value="Amazonas">Amazonas</option>
                                <option value="Bahia">Bahia</option>
                                <option value="Ceará">Ceará</option>
                                <option value="Distrito Federal">Distrito Federal</option>
                                <option value="Espírito Santo">Espírito Santo</option>
                                <option value="Goiás">Goiás</option>
                                <option value="Maranhão">Maranhão</option>
                                <option value="Mato Grosso">Mato Grosso</option>
                                <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                <option value="Minas Gerais">Minas Gerais</option>
                                <option value="Pará">Pará</option>
                                <option value="Pará">Pará</option>
                                <option value="Paraná">Paraná</option>
                                <option value="Pernambuco">Pernambuco</option>
                                <option value="Piauí">Piauí</option>
                                <option value="Rio de Janeiro">Rio de Janeiro</option>
                                <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                <option value="Rondônia">Rondônia</option>
                                <option value="Roraima">Roraima</option>
                                <option value="Santa Catarina">Santa Catarina</option>
                                <option value="São Paulo">São Paulo</option>
                                <option value="Sergipe">Sergipe</option>
                                <option value="Tocantins">Tocantins</option>
                                <!-- Add options for other states here -->

                            </select>
                        </div>
                        <div class="form-grup">
                            <label for="email">Cidade:</label>
                            <input class="ipt_nome" type="text" id="cidade" name="cidade" placeholder="digite o sua Cidade" value="<?=$clinica->cidade ?>">
                        </div>
                        <div class="form-grup">
                            <label for="email">Rua:</label>
                            <input class="ipt_nome" type="text" id="rua" name="rua" placeholder="digite o sua Rua" value="<?=$clinica->rua ?>">
                        </div>
                        <input class="btn_entrar" type="submit" value="Editar Clinica">
                        <a class="btn_entrar" href="<?= $BASE_URL ?>./dashboard.php">Voltar</a>

                </form>
                



            </div>
        </div>
</section>