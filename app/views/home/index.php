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
                <h2>Sección</h2>
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/aplicacionesWebTPFinal/public/img/TorneoAjedrez.png" class="d-block w-100" alt="TorneoAjedrez" height="400px" width="400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Convocatoria Toreno de Ajedréz</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="./aplicacionesWebTPFinal/public/img/becas.png" class="d-block w-100" alt="Becas" height="400px" width="400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Plan de becas</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="../public/img/EstudiantesBarbijos.jpg" class="d-block w-100" alt="EstudiantesBarbijos" height="400px" width="400px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>La nueva normalidad en UNLZ</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
            </div>
        <div class="col-6 col-md-4">
            <h2>Últimas noticias</h2><br>
            <div class="twitter">
                <a class="twitter-timeline" data-width="400" data-height="400" data-dnt="true" data-theme="light" href="https://twitter.com/UNLZoficial?ref_src=twsrc%5Etfw"></a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
    </div><br>
    <div class="row justify-content-center">
        <div class="col-6 col-md-4">
        <u>¡Visitá nuestra página escaneando el código QR!</u><img class="imgQR" src='https://chart.googleapis.com/chart?cht=qr&chl=https%3A%2F%2Fwww.unlz.edu.ar%2F&chs=180x180&choe=UTF-8&chld=L|2' alt='qr code' width="100px" height="100px">
        <a href='https://www.qr-code-generator.com' border='0' style='cursor:default'  rel='nofollow'></a>
        </div>
    </div>
    <div class="container">
    <?php 
echo $_SESSION['usuario_rol'];
    ?>

    </div>
</article>
<!-- Alta de Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>