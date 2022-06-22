<?php
    
    require_once('../empresas/yor/conect/conect.php');
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
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
        <link rel="stylesheet" href="../css/navegacao.css">
        <link rel="stylesheet" href="../css/catalogo.css">        
        <link id="favicon" rel="shortcut icon" href="../img/logo_oxo_1000.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="../img/logo_oxo_1000.png">
        <header class="cabecalho_yor">
            <h1>Catálogo Y&Ouml;R</h1>
            <h2>Seja bem vindo!</h2>
            <img class="log" src="../img/logo-yor-chocolate-topo.png"/>
        </header>
        </div>        
       
        <!--
        <input type="checkbox" id="bt_menu"/>
        <label for="bt_menu">&#9776;</label>
        -->
        <nav class="navegacao">
            
            <form class="categoria" action="yor.php" method="POST">
        <div class="input-group">
            <select class="selecione" id="inputGroupSelect04" name="selecione">
                <option value="Todos">Todos</option>
                <option value="btb">Bean to Bar</option>
                <option value="reg">Regionais</option>
                <option value="ori">Origens</option>
                <option value="sab">Sabores</option>
            </select>
            <div class="input-group-append">
                <button class="btsel btn-outline-secondary">Selecione</button>
            </div>
        </div>
            <ul class="menu">
                <li class="#">
                    <a href="../index.php">Home</a>
                </li>
                <li class="#">
                    <a href="../catalogo/catalogo.php">Catálogos</a>
                </li>
                <li class="#">
                    <a href="../mail/contato.php">Fale Conosco</a>
                </li>
                <li class="#">
                    <a href="../gerenciamento/login/loginCliente.php">Área do Cliente</a>
                </li>
                <li class="#">
                    <a href="../catalogo/construcao.php">Área do Vendedor</a>
                </li>
            </ul>
            </form>
        </nav>                
                      
        <main class="principal">
            <div class="conteudo">
            
                    <?php
                  switch (filter_input(INPUT_POST, 'selecione')){
                        
                        case 'btb':
                            $tipo = "1";
                            $empresa = "Bean to Bar";
                            break;
                        case 'reg':
                            $tipo = "2";
                            $empresa = "Regionais";
                            break;
                        case 'ori':
                            $tipo = "3";
                            $empresa = "Origens";
                            break;
                        case 'sab':
                            $tipo = "4";
                            $empresa = "Sabores";
                            break;
                        default:
                            $tipo = "0";
                            $empresa = "Todos Itens";
                            break;
                    }
                    
                    if($tipo == "0"){
                        $sql = "SELECT * FROM yor where id";
                        $dados = mysqli_query($link, $sql);
                        
                    } else {                        
                        
                    $sql = "SELECT * FROM yor where tipo = '$tipo' ";
                    $dados = mysqli_query($link, $sql);
                    }
                    
                    
                    ?>
                <div class="titulo-pesquisa">Pesquisar Y&Ouml;R
                    <form class="form-pesquisar" action="yor_pesquisar.php" method="GET">
                    <button type="submit" class="btpesq">Pesquisar</button>
                    <div>
                        <input type="text" class="pesquisar" name="pesq" placeholder="Pesquise por tipo: ( branco, intenso...)">
                    </div>
                </form>
				
                    </div>
				<?php
                                
                                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                                
                                if(!isset($_GET['pesq'])){
                                    header("Location: catalogos.php");
                                    
                                }else{
                                    $valor_pesquisar = $_GET['pesq'];
                                    
                                }
                                
                                $result_pesq = "SELECT * FROM yor WHERE prod LIKE '%$valor_pesquisar%'";
                                $resultado_pesquisa = mysqli_query($link, $result_pesq);
                                $total_pesquisa = mysqli_num_rows($resultado_pesquisa);
                                $quantidade_psq = 700;
                                $num_pesq = ceil($total_pesquisa/$quantidade_psq);
                                $incio = ($quantidade_psq*$pagina)-$quantidade_psq;
                                $result_psq = "SELECT * FROM yor WHERE prod LIKE '%$valor_pesquisar%' limit $incio, $quantidade_psq";
                                $resultado_psq = mysqli_query($link, $result_psq);
                                $total_psq = mysqli_num_rows($resultado_psq);
                                
                                while($rows_psq = mysqli_fetch_assoc($resultado_psq)){
                  
                           echo'
        <div class="col-sm">
            <div class="card">
                <li>
                    <img class="card-img-top" id="img1" style="object-fit: scale-down" src="'. $rows_psq["img"] .'" alt="'.$rows_psq["prod"].'" onclick="clique(this) ">
                    <div id="janelaModal" class="modalVisual">
                        <span class="fechar">X</span>
                        <img class="modalConteudo" id="imgModal" src="">
                        <div id="txtImg"></div>                                          
                    </div>
                </li>
                <div class="card-body">
                    <p class="card-text">'."Código: ".' '. $rows_psq["cod"] .'</p>
                    <p class="card-text">'. "Descrição dos Itens" .'</p>
                    <p class="card-text">'. $rows_psq["prod"] .'</p>    
                    <p class="card-text">'. "Display com: " . $rows_psq["qtd_uni"] . " unids" .'</p>
                    <p class="card-text">'. "Validade: " . $rows_psq["val"] . " dias" .'</p>
                </div>
            </div>
        </div>        
        ';
        }
                   
        mysqli_close($link);
        ?>
  </div>
        </main>
        
         <footer class="rodape">
             Todos os Direitos Reservados - by LEANDRO SILVA Copyright &copy; <?= date('Y');?>
        </footer>
        
        
        <script src="../../js/clareandro.js"></script>
<script src="../../js/java.js"></script>
<script src="../../js/js.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    </body>
</html>