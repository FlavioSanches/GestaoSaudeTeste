<?php
require_once("templates/header.php");
?>
<section class="bloco_principal">

    <div class="login-container">
        <button id="toggle-button" class="btn_entrarpacienete active">Paciente</button>
        <button id="toggle-button2" class="btn_entrarmedico   ">Medico</button>
        <form id="paciente-form" action="<?= $BASE_URL ?>auth_paciente_process.php" method="POST">
            <div>
                <h2 class="titulo_cadastro">Criar Conta Paciente</h2>
            </div>
            <input type="hidden" name="type" value="register">
            <div>
                <label for="email">Email:</label>
                <input class="ipt_nome" type="email" id="email" name="email" placeholder="digite seu e-mail">
            </div>
            <div>
                <label for="name">Nome:</label>
                <input class="ipt_nome" type="text" id="name" name="name" placeholder="digite seu nome">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input class="ipt_senha" type="password" id="password" name="password" placeholder="digite sua senha">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirmação de senha:</label>
                <input class="ipt_senha" type="password" id="confirmpassword" name="confirmpassword"
                    placeholder="confirme sua senha">
            </div>
            <input type="submit" class="btn_entrar" value="Registrar">

        </form>
    </div>

    <div class="login-container">
        <form id="medico-form" action="<?= $BASE_URL ?>auth_medico_process.php" method="POST">
            <div>
                <h2 class="titulo_cadastro">Criar Conta Medico</h2>
            </div>
            <input type="hidden" name="type" value="register">
            <div>
                <label for="email">Email:</label>
                <input class="ipt_nome" type="email" id="email" name="email" placeholder="digite seu e-mail">
            </div>
            <div>
                <label for="name">Nome:</label>
                <input class="ipt_nome" type="text" id="name" name="name" placeholder="digite seu nome">
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input class="ipt_senha" type="password" id="password" name="password" placeholder="digite sua senha">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirmação de senha:</label>
                <input class="ipt_senha" type="password" id="confirmpassword" name="confirmpassword"
                    placeholder="confirme sua senha">
            </div>
            <input type="submit" class="btn_entrar" value="Registrar">

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
    const toggleButton2 = document.getElementById('toggle-button2');


    // Inicialmente, exibir o formulário do paciente e ocultar o do médico
    pacienteForm.style.display = 'block';
    medicoForm.style.display = 'none';

    // Adicionar um ouvinte de evento ao botão de alternância
    toggleButton2.addEventListener('click', () => {
        
            pacienteForm.style.display = 'none';
            medicoForm.style.display = 'block';


            

      
    });

    toggleButton.addEventListener('click', () => {
       
            medicoForm.style.display = 'none';
            pacienteForm.style.display = 'block';
            

            
 
            
 
    
    });

    toggleButton.addEventListener('click', () => {
        toggleButton.classList.add('active');
        toggleButton2.classList.remove('active');
    });

    toggleButton2.addEventListener('click', () => {
        toggleButton2.classList.add('active');
        toggleButton.classList.remove('active');
    });




</script>