<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <title>OXOREP</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/navegacao.css">        
        <link id="favicon" rel="shortcut icon" href="img/logo_oxo_1000.ico" type="image/ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="img/logo_oxo_1000.png">
        <header class="cabecalho">
            <h1>Oxo Representações Comerciais</h1>
            <h2>Seja bem vindo!</h2>
        </header>
        </div>
        <!--
        <input type="checkbox" id="bt_menu"/>
        <label for="bt_menu">&#9776;</label>-->
        <nav class="navegacao">
            <ul class="menu">
                
                <li class="#">
                    <a href="catalogo/catalogo.php">Catálogos</a>
                </li>
                <li class="#">
                    <a href="institucional/institucional.php">Institucional</a>
                </li>
                <li class="#">
                    <a href="mail/contato.php">Fale Conosco</a>
                </li>
                <li class="#">
                    <a href="gerenciamento/login/loginCliente.php">Área do Cliente</a>
                </li>
                <li class="#">
                    <a href="catalogo/construcao.php">Área do Vendedor</a>
                </li>
                <li class="#">
                    <a href="pages/pdfTest.php">PDF TESTE</a>
                </li>
                
            </ul>
        </nav>
        
        
        <main class="principal">
            <div class="conteudo">
                               
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="recursos/slides/slide_01.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="recursos/slides/slide_02.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="recursos/slides/slide_03.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_04.png" alt="Quarto Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_05.png" alt="Quinto Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_06.png" alt="Sexto Slide">
                        </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_07.png" alt="Setimo Slide">
                        </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_08.png" alt="Oitavo Slide">
                        </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_09.png" alt="Nono Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_10.png" alt="Decimo Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_11.png" alt="Decimo Primeiro Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_12.png" alt="Decimo Segundo Slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="recursos/slides/slide_13.png" alt="Decimo Terceiro Slide">
                        </div>
                        </div>
                    </div>
            </div>
        </main>
		
		
        
        <footer class="rodape">
            Todos os Direitos Reservados - by LEANDRO SILVA Copyright &copy; <?= date('Y');?>
        </footer>
        
        <script src="js/clareandro.js"></script>
        <script src="js/acoes.js"></script>
        <script src="js/card_drop.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>