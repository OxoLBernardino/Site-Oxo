<?php
session_start();

if(isset($_SESSION["numlogin"])){
    $n1=filter_input(INPUT_GET,'num');
    $n2=$_SESSION["numlogin"];
    
    if($n1!=$n2){
        echo "<p id='lgErro'>Login não autorizado</p>";
        exit();
        
    }
    
    }else {
        echo "<p id='lgErro'>E AEH ESPERTALHÃO??? LOGA DIREITO!!! Login não autorizado</p>";
        exit();
        
    }
    require_once('../gerenciamento/conect/db_cad.php');
    
?>
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
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/catalogo.css">        
        <link id="favicon" rel="shortcut icon" href="../img/logo_oxo_1000.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="../img/logo_oxo_1000.png">
        <header class="cabecalho">
            <h1>Oxo Representações Comerciais</h1>
            <h2>Área do Cliente!</h2>
            <h2>Seja bem vindo <b class="text-capitalize"><?php echo $_SESSION['contato']?></b>!</h2>
        </header>
        </div>
        <nav class="navegacao">
            <ul class="menu">
                <li class="#">
                    <a href="../index.php">Home</a>
                </li>
                <li class="#">
                    <a href="../catalogo/catalogo.php">Catálogos</a>
                </li>
                <li class="#">
                    <a href="../institucional/institucional.php">Institucional</a>
                </li>
                <li class="#">
                    <a href="../mail/contato.php">Fale Conosco</a>
                </li>
                <li class="#">
                    <a href="../catalogo/construcao.php">Área do Vendedor</a>
                </li>
                
            </ul>
        </nav>
      
                      
        <main class="principal">
            <div class="conteudo">
            
            
            <div class="conteudo_menu">
                <nav class="modulos">
                    
                    <div class="modulo cinza">
                        <h3>Menu</h3>
                        <ul>
                            <?php
                if($_SESSION["acesso"]==1){
                    echo "
                    <li><a href='../gerenciamento/bd/processa_bd_site.php?num=$n1'>Gerenciamento</a></li>
                            ";
                    }
            ?>
                            
                            <li><a href="../pages/pedido.php?num=<?php echo $n1?>" target="_self">Produtos</a></li>
                            <li><a href="sair.php?num=<?php echo $n1?>" target="_self">Sair</a></li>
                            
                        </ul>
                    </div>
                    
                    
                     
                </nav>
            </div>
            </div>
            
        </main>
           
        
        <footer class="rodape">
             Todos os Direitos Reservados - by LEANDRO SILVA Copyright &copy; <?= date('Y');?>
        </footer>
        
<script src="../js/clareandro.js"></script>
<script src="../js/java.js"></script>
<script src="../js/js.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    </body>
</html>