<?php
    require_once("templates/header.php");
    require_once("models/Paciente.php");
    require_once("dao/PacienteDAO.php");

    $user = new Paciente();

    $userDao = new PacienteDao($conn, $BASE_URL);

    $userData = $userDao->verifyToken(true);

    if($userData->image == ""){
        $userData->image = "user.jpg";
    }


?>
    <section class="bloco_principal">
    <div class="login-container">
        <div >
            <form action="<?= $BASE_URL ?>paciente_process.php"  method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="update">
                <div >
                    <div >
                        <h1><?= $userData->name?></h1>
                     <p >Altere seus dados no formulário abaixo:</p>
                     <div >
                        <label for="name">Nome:</label>
                        <input class="ipt_nome" type="text"  id="name" name="name" placeholder="digite o seu nome" value="<?=$userData->name?>">
                     </div>
                        <div class="form-grup">
                            <label for="email">E-mail:</label>
                            <input class="ipt_nome" type="text" readonly  id="email" name="email" placeholder="digite o seu email" value="<?=$userData->email?>">
                        </div>
                        <div class="form-grup">
                            <label for="email">CPF:</label>
                            <input class="ipt_nome" type="text" id="cpf" name="cpf" placeholder="digite o seu CPF" value="<?=$userData->cpf?>">
                        </div>
                        <!--<div class="form-grup">
                            <label for="email">Pais:</label>
                            <input class="ipt_nome" type="text" id="pais" name="pais" placeholder="digite o seu País" value="<?=$userData->pais?>">
                        </div>-->
                        <div class="form-group col-md-4">
                            <label for="pais" class="escrita">País:</label>
                            <select name="pais" id="pais" class="form-control" required>
                                <option selected hidden value="<?=$userData->pais?>"><?=$userData->pais?></option>
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
                                <option selected hidden value="<?=$userData->estado?>"><?=$userData->estado?></option>
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
                            <input class="ipt_nome" type="text" id="cidade" name="cidade" placeholder="digite o sua Cidade" value="<?=$userData->cidade?>">
                        </div>
                        <div class="form-grup">
                            <label for="email">Rua:</label>
                            <input class="ipt_nome" type="text" id="rua" name="rua" placeholder="digite o sua Rua" value="<?=$userData->rua?>">
                        </div>
                        <!--<div class="form-grup">
                            <label for="email">Altura:</label>
                            <input class="ipt_nome" type="text" id="altura" name="altura" placeholder="digite o sua altura" value="<//?=$userData->altura?>">
                        </div>-->
                        <input class="btn_entrar" type="submit"  value="Alterar">
                    </div>
                    <div >
                        <div id="profile-image-container" style="background-image: url('<?=$BASE_URL ?>assets/usuario/<?= $userData->image?>')">
                        </div>
                        <div >
                            <label for="image">Foto:</label>
                            <input  type="file"  name="image">
                        </div>      
                    </div>

                </div> 
            </form>
            <div >
                <div >
                    <h2>Alterar a senha:</h2>
                    <p >Digite a nova senha e confirme para alterar sua senha:</p>
                    <form action="<?= $BASE_URL ?>paciente_process.php" method="POST">
                        <input type="hidden" name="type" value="changepassword">
                        <input type="hidden" name="id" value="<?=$userData->id?>">
                        <div >
                            <label for="password">Senha:</label>
                            <input class="ipt_senha" type="password"  id="password" name="password" placeholder="digite a sua nova senha"  >
                        </div>
                        <div class="form-grup">
                            <label for="confirmpassword">Confirmação de senha:</label>
                            <input class="ipt_senha" type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirme a sua nova senha" >
                        </div>
                        <input class="btn_entrar" type="submit" value="Alterar Senha">
                        <a class="btn_entrar" href="<?= $BASE_URL ?>./principal_paciente.php">Voltar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php
    require_once("templates/footer.php");
?>
