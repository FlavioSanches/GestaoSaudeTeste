<?php
    require_once("templates/header.php");
    require_once("models/User.php");
    require_once("dao/UserDAO.php");

    $user = new User();

    $userDao = new UserDao($conn, $BASE_URL);

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
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
<?php
    require_once("templates/footer.php");
?>
