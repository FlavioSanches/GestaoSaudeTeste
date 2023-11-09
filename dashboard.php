<?php
    require_once("templates/header.php");
    require_once("models/Medico.php");
    require_once("dao/MedicoDAO.php");
    require_once("dao/ClinicaDAO.php");

    $user = new Medico();

    $userDao = new MedicoDao($conn, $BASE_URL);
    $clinicaDao = new ClinicaDAO($conn, $BASE_URL);

    $userData = $userDao->verifyToken(true);

    $medicoClinica =$clinicaDao->getClinicasBYMedicoId($userData->id); 

?>


<div>
    <h1>Consultórios</h1>
    <p>Adcione ou atualize as informações dos seus consultorios</p>
    <div>
        <table>
            <thead>
                <th >#</th>
                <th >Nome</th>
                <th >CNPJ</th>
                <th >Acoes</th>
            </thead>
            <tbody>
                <?php foreach ($medicoClinica as $clinica): ?> 
                <tr >

                <td><?=$clinica->id ?></td>
                    <td><?=$clinica->name ?></td>
                    <td><?=$clinica->cnpj ?></td>
                    <td  class="actions">
                    <a class="ver" href="<?= $BASE_URL ?>clinica.php?id=<?=$clinica->id ?>">Ver</a>
                        <a class="edit" href="<?= $BASE_URL ?>editclinica.php?id=<?=$clinica->id ?>">Editar</a>
                        <form action="<?= $BASE_URL ?>clinica_process.php" method="POST">
                        <input type="hidden" name="type" value="delete">
                        <input type="hidden" name="id" value="<?=$clinica->id ?>">
                            <button  class="delete"  type="submit" >Deletar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
                    
            </tbody>    
        </table>
        <a class="btn_entrar" href="<?= $BASE_URL ?>./principal_medico.php">Voltar</a>

    </div>


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php
    require_once("templates/footer.php");
?>