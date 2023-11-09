<?php
        require_once("templates/header.php");
    ?>

<div class="background_img img-fluid">
            <div class="container-fluid">
                <div class="card zoom bloco_arredondado" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                    <p class="texto_bloco_arredondado">
                        <b>BUSQUE OS <br> ESPECIALISTAS <br> MAIS PRÓXIMOS</b>
                    </p>
                </div>
            </div>
        
            <div class="container-fluid">
                <div class="card zoom bloco_arredondado" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                    <p class="texto_bloco_arredondado">
                        <b>SEJA ATENDIDO<br>POR ESPECIALISTAS<br>NA ÁREA</b>
                    </p>
                </div>
            </div>
        
            <div class="container-fluid">
                <div class="card zoom bloco_arredondado" onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
                    <p class="texto_bloco_arredondado">
                        <b>GERENCIE<br>SUAS<br>CONSULTAS</b>
                    </p>
                </div>
            </div>
        </div>

        <br>
        
        <div class="carrossel">
            <h1 class="text-center" style="color: black;">Funcionalidades</h1><br>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?= $BASE_URL ?>assets/relogio.png" class="img-fluid rounded mx-auto d-block" alt="RELOGIO">
                    <br>
                    <div class="d-md-block texto_carrossel">
                        <b><p>Agende sua consulta a qualquer hora do dia</p></b>
                    </div>
                    <br>
                  </div>

                  <div class="carousel-item">
                    <img src="<?= $BASE_URL ?>assets/dinheiro.png" class="img-fluid rounded mx-auto d-block" alt="...">
                    <br>
                    <div class="d-md-block texto_carrossel">
                        <b><p>Encontre os melhores especialistas pelos melhores preços</p></b>
                    </div>
                    <br>
                  </div>
                  <div class="carousel-item">
                    <img src="<?= $BASE_URL ?>assets/calendario.png" class="img-fluid rounded mx-auto d-block" alt="...">
                    <br>
                    <div class="d-md-block texto_carrossel">
                        <b><p>Agenda Online Integrada</p></b>
                    </div>
                    <br>
                  </div>
                  <div class="carousel-item">
                    <img src="<?= $BASE_URL ?>assets/localizacao.png" class="img-fluid rounded mx-auto d-block" style="height:66px" alt="...">
                    <br>
                    <div class="d-md-block texto_carrossel">
                        <b><p>Encontre os especialitas mias próximos</p></b>
                    </div>
                    <br>
                  </div>
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <br>

            <div class="container-fluid card shadow p-3 mb-5 bg-body rounded tamanho_avaliacao" style="background:  #55AAE7;">
                <h2 class="text-center" style="color: black;"><b>Avaliações</b></h2><br>
                <div class="review container-fluid">
                  <div class="img-container container-fluid">
                    <img src="<?= $BASE_URL ?>person-1.jpeg" id="person-img" alt="" />
                  </div>
                  <h4 id="author">Dra. Aline Souza</h4>
                  <p id="job"> Médica pediatra </p>
                  <p id="info">
                    Como pediatra, é vital que os pais encontrem especialistas rapidamente para cuidar de seus filhos. 
                    Este site de agendamento de consultas tem sido um recurso incrível para minha prática. Ele permite que os pais 
                    localizem pediatras especializados em suas proximidades com facilidade. Isso torna o processo de atendimento às 
                    crianças muito mais eficiente e conveniente. Estou muito grato por esta plataforma.
                  </p>
                  <!-- prev next buttons-->
                  <div class="button-container">
                    <button class="prev-btn"><img src="<?= $BASE_URL ?>assets/arrow_left.png"></button>
                    <button class="next-btn"><img src="<?= $BASE_URL ?>assets/arrow_right.png"></button>
                </div>
                 </div>
            </div>    

</div>


    <?php
        require_once("templates/footer.php");
    ?>