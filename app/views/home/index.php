<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Alta de Usuarios -->
<article class="MainMenu">
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <!-- <h3>Inicio</h3> -->
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- <h2>Sección</h2> -->
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="<?php echo URL_ROOT ?>/img/TorneoAjedrez.png" class="d-block w-100" alt="TorneoAjedrez" height="50%" width="50%">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                            <p>Convocatoria torneo de ajedrez</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="<?php echo URL_ROOT ?>/img/EstudiantesBarbijos.jpg" class="d-block w-100" alt="EstudiantesBarbijos" height="50%" width="50%">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>La nueva normalidad en UNLZ</h5>
                            <p>Presentamos los protocolos que estarán vigentes en la vuelta a las aulas</p>
                        </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
            </div><br>
            <div class="col-6 col-md-4">
                <h2>Últimas noticias</h2><br>
                <div class="twitter">
                    <a class="twitter-timeline" data-width="400" data-height="400" data-dnt="true" data-theme="light" href="https://twitter.com/UNLZoficial?ref_src=twsrc%5Etfw"></a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
    </div><br><br>
    <div class="card text-center">
        <div class="card-header">
            <p style="font-weight: 900; color:#0c71b9">Escaneá y visitá nuestra página web para estar siempre informado.</p> 
        </div>
    <div class="card-body">
        <p class="card-text"><img src="<?php echo URL_ROOT ?>/img/QR.png" alt="QRwebpage" srcset="" width="150px" height="150px"></p>
    </div>
</div>
</article>
<!-- Alta de Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>