<?php
    require_once("templates/header.php");
?>
<section class="bloco_principal">
<div class="login-container">
    <div>
    <h2 class="titulo">Criar Conta Medico</h2>
</div>
    <form action="<?= $BASE_URL ?>auth_medico_process.php" method="POST">
        <input type="hidden" name="type" value="register">
            <div >
                <label for="email">Email:</label>
                <input class="ipt_nome"type="email"  id="email" name="email" placeholder="digite seu e-mail">
            </div>
            <div>
                <label for="name">Nome:</label>
                <input class="ipt_nome"type="text" id="name" name="name" placeholder="digite seu nome">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input class="ipt_senha"type="password" id="password" name="password" placeholder="digite sua senha">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirmação de senha:</label>
                <input class="ipt_senha"type="password" id="confirmpassword" name="confirmpassword" placeholder="confirme sua senha">
            </div>
            <input type="submit" class="btn_entrar" value="Registrar">

    </form>
    <a href="<?= $BASE_URL ?>" class="btn_entrar">Voltar</a>
</div>
</section>

<?php
    require_once("templates/footer.php");
?>
