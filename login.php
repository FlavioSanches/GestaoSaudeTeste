<?php
    require_once("templates/header.php");
?>

<section class="bloco_principal">

    <div class="login-container">
    <button id="toggle-button" class="btn_entrar">Alternar Login</button>
       <!-- <div>
            <h2  class="titulo">LOGIN PACIENTE</h2>
        </div>-->

        <form id="paciente-form" action="<?= $BASE_URL ?>auth_paciente_process.php" method="POST">
        <div>
            <h2  class="titulo_cadastro">LOGIN PACIENTE</h2>
        </div>    
        <input type="hidden" name="type" value="login">
            <div>
                <label for="email">Email:</label>
                <input class="ipt_nome" type="email" id="email" name="email" placeholder="Digite seu e-mail">
            </div>
            <div>
                <label for="password">Senha:</label>
                <input class="ipt_senha" type="password" id="password" name="password" placeholder="Digite sua senha">
            </div>

            <input class="btn_entrar" type="submit" value="Entrar">
        </form>
       <!-- <a href="<//?= $BASE_URL ?>" class="btn_entrar">Voltar</a>-->
    </div>

    <div class="login-container">

       <!-- <div >
            <h2  class="titulo">LOGIN MÉDICO</h2>
        </div>-->

        <form id="medico-form" action="<?= $BASE_URL ?>auth_medico_process.php" method="POST">
        <div >
            <h2  class="titulo_cadastro">LOGIN MÉDICO</h2>
        </div>    
        <input type="hidden" name="type" value="login">
            <div>
                <label for="email">Email:</label>
                <input class="ipt_nome" type="email" id="email" name="email" placeholder="Digite seu e-mail">
            </div>
            <div>
                <label for="password">Senha:</label>
                <input class="ipt_senha" type="password" id="password" name="password" placeholder="Digite sua senha">
            </div>
            <input class="btn_entrar" type="submit" value="Entrar">
        </form>
        <a href="<?= $BASE_URL ?>" class="btn_entrar">Voltar</a>
    </div>
</section>



<?php
    require_once("templates/footer.php");
?>

<script>
    const pacienteForm = document.getElementById('paciente-form');
    const medicoForm = document.getElementById('medico-form');
    const toggleButton = document.getElementById('toggle-button');
    const passwordInput = document.getElementById('password');
    const passwordIcon = document.getElementById('password-icon');
    const passwordToggle = document.getElementById('password-toggle');

    // Inicialmente, exibir o formulário do paciente e ocultar o do médico
    pacienteForm.style.display = 'block';
    medicoForm.style.display = 'none';

    // Adicionar um ouvinte de evento ao botão de alternância
    toggleButton.addEventListener('click', () => {
        if (pacienteForm.style.display === 'block') {
            pacienteForm.style.display = 'none';
            medicoForm.style.display = 'block';
        } else {
            pacienteForm.style.display = 'block';
            medicoForm.style.display = 'none';
        }
    });



    passwordToggle.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('bi-eye');
            passwordIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('bi-eye-slash');
            passwordIcon.classList.add('bi-eye');
        }
    });
</script>