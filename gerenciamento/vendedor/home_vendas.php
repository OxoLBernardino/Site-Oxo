<?php
    session_start();
    
    if(!isset($_SESSION['comemail'])){
        header('Location: ../index.php?erro=1');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Index</title>
    
    <link id="favicon" rel="shortcut icon" href="../assets/logo_oxo.png" type="image/png" />
  </head>
  <body>
      
       <section class="logo"><img src="../assets/logo_oxo.png"></section>
       
       
       
       <div class="container">
           <h3>Olá <?= $_SESSION['contato'] ?>!</h3>
           <p><?= $_SESSION['comemail']?></p>
           
          
               <div class="dropdown">           
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Cadastros
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Aaaa</a>
                  <a class="dropdown-item" href="#">bbb</a>
                  <a class="dropdown-item" href="../sair.php">Sair</a>
                </div>
               </div>
               <div class="dropdown1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Clientes
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="consulta_clientes.php">Consulta Clientes</a>
                  <a class="dropdown-item" href="#">ddd</a>
                  <a class="dropdown-item" href="#">##</a>
                </div>
               </div>
               <div class="dropdown2">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pedidos
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">eee</a>
                  <a class="dropdown-item" href="#">fff</a>
                  <a class="dropdown-item" href="#">ggg</a>
                </div>
               </div>
               <div class="dropdown3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Comissões
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">hhh</a>
                  <a class="dropdown-item" href="#">iii</a>
                  <a class="dropdown-item" href="#">jjj</a>
                </div>
               </div>
           
       </div>
       
       
    
    
    

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>-->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/clareandro.js"></script>
    <script src="../jquery.mask.min.js"></script>
    
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
  </body>
</html>





