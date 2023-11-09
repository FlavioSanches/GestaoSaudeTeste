<?php
    require_once("templates/header.php");
?>

<section class="logo">
<a href="<?= $BASE_URL ?>./edit_profile_paciente.php">Editar Perfil</a>
        <div class="cabecalho">
            <a class="nome_azul" href="principal_paciente.html">Gestão</a><a class="nome_branco" href="principal_paciente.html">Saúde</a>
        </div>
        <div class="pesquisar custom-bg-blue">
            <div class="container-fluid">
                <form class="d-flex custom-search" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search" style="width: 100%;">
                    <button class="btn btn-outline-primary custom-btn" type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
</section>


<?php
    require_once("templates/footer.php");
?>