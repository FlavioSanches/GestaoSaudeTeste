<?php
    require_once("templates/header.php");
?>
<div class="login-container login-config">
    <h2>Tela de Login</h2>
    <form action="<?= $BASE_URL ?>auth_process.php" method="POST">
        <input type="hidden" name="type" value="login">
            <div >
                <label for="email">Email:</label>
                <input type="email"  id="email" name="email" placeholder="digite seu e-mail">
            </div>
            <div >
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" placeholder="digite sua senha">
            </div>
        <input type="submit" value="Entrar">
    </form>
    <a href="<?= $BASE_URL ?>" class="button">Voltar</a>
</div>

<?php
    require_once("templates/footer.php");
?>
