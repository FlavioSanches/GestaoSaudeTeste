<?php
require_once("templates/header.php");
?>

<section class="menu_principal">

    <div class="sidebar">
        <div class="sidebar-item" data-content="editar_perfil"><a href="<?= $BASE_URL ?>./edit_profile_medico.php">Editar Perfil</a></div>
        <div class="sidebar-item" data-content="cadastrar"><a href="<?= $BASE_URL ?>./newclinica.php">Cadastrar Consultório</a></div>
        <div class="sidebar-item" data-content="consultas"><a href="<?= $BASE_URL ?>./dashboard.php">Minhas Consultas</a></div>
    </div>
    <div class="content">
        <div id="editar_perfil" class="content-item">
            <a class="consultas" href="<?= $BASE_URL ?>./edit_profile_medico.php">Editar Perfil</a>
        </div>
        <div id="cadastrar" class="content-item">
            <div class="form-group col-md-6">
                <label for="inputEstado" class="escrita">Estado</label>
                <input type="text" class="form-control" id="inputEstado" placeholder="Ex: Minas Gerais" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCidade" class="escrita">Cidade</label>
                <input type="text" class="form-control" id="inputCidade" placeholder="Ex: Cataguases" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEndereco" class="escrita">Rua e Número</label>
                <input type="text" class="form-control" id="inputEndereco" placeholder="Ex: Av. Nossa Senhara, 351"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCNPJ" class="escrita">CNPJ</label>
                <input type="text" class="form-control" id="inputCNPJ" placeholder="Ex: 10.005.865-001/50" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCNPJ" class="escrita">Especialidade</label>
                <input type="text" class="form-control" id="inputEspecialidade" placeholder="Ex: Fisioterapeuta"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCNPJ" class="escrita">Valor por Consulta</label>
                <input type="text" class="form-control" id="inputValorConsulta" placeholder="Ex: R$200.00" required>
            </div>
            <button type="submit" class="button">Cadastrar Consultório</button>
        </div>
        <div id="editar" class="content-item">
            <div class="form-group col-md-6">
                <label for="inputEstado" class="escrita">Alterar estado</label>
                <input type="text" class="form-control" id="inputEstado" placeholder="Ex: Minas Gerais" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCidade" class="escrita">Alterar cidade</label>
                <input type="text" class="form-control" id="inputCidade" placeholder="Ex: Cataguases" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEndereco" class="escrita">Alterar rua e Número</label>
                <input type="text" class="form-control" id="inputEndereco" placeholder="Ex: Av. Nossa Senhora, 351"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCNPJ" class="escrita">Alterar CNPJ</label>
                <input type="text" class="form-control" id="inputCNPJ" placeholder="Ex: 10.005.865-001/50" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCNPJ" class="escrita">Alterar especialidade</label>
                <input type="text" class="form-control" id="inputEspecialidade" placeholder="Ex: Fisioterapeuta"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCNPJ" class="escrita">Alterar valor por Consulta</label>
                <input type="text" class="form-control" id="inputValorConsulta" placeholder="Ex: R$200.00" required>
            </div>
            <button type="submit" class="button">Alterar Consultório</button>
        </div>
        <div id="consultas" class="content-item">
            <div class="consultas">Informações sobre Minhas Consultas</div>
        </div>
    </div>
</section>
        <?php
        require_once("templates/footer.php");
        ?>
        <script src="menu_lateral.js"></script>