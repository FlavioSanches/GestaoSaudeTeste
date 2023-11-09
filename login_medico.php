<?php
    require_once("templates/header.php");
?>

        <section class="bloco_principal">

            <div class="login-container">

                <div>

                    <h2 class="titulo">LOGIN MEDICO</h2>

                </div>

                <div>
                    

    <form action="<?= $BASE_URL ?>auth_medico_process.php" method="POST">
        <input type="hidden" name="type" value="login">
            <div >
                <label for="email">Email:</label>
                <input class="ipt_nome" type="email"  id="email" name="email" placeholder="digite seu e-mail">
            </div>
            <div >
                <label for="password">Senha:</label>
                <input class="ipt_senha" type="password" id="password" name="password" placeholder="digite sua senha">
            </div>
        <input class="btn_entrar" type="submit" value="Entrar">
        <br>
    </form>
    <a href="<?= $BASE_URL ?>" class="btn_entrar">Voltar</a>




            </div>
        
        </section>

<?php
    require_once("templates/footer.php");
?>
