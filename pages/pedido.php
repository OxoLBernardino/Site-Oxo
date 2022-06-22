
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
        <link rel="stylesheet" href="../css/catalogo.css">        
        <link id="favicon" rel="shortcut icon" href="../img/logo_oxo_1000.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="../img/logo_oxo_1000.png">
        <header class="cabecalho">
            <h1>Produtos</h1>
                <h2>Seja bem vindo <b class="text-capitalize"><?php echo $_SESSION['contato']?></b>!</h2>
                              
        </header>
        </div>
        <nav class="navegacao">
            
            
            <form class="categoria" action="pedido.php?num=<?php echo $n1?>" method="POST">
                <?php
                 
                $sessao = $_SESSION['pedido'];
                $consultas = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE sessao_temp = :ses");
                $consultas->bindValue(':ses', $sessao);
                $consultas->execute();
                $itens = $consultas->rowCount();
                  
                ?>
                            
                <a id="carrinho" href="carrinho.php?num=<?php echo $n1?>"><img src="../img/baseline_add_shopping_cart_black_18dp (2).png">(<?php echo $itens ?>)</a>
                  
        <div class="input-group">
            <select class="selecione" id="inputGroupSelect04" name="selecione">
                <option value="Todos">Todos</option>
                        <option value="BIO ORGÂNICO">BIO ORGÂNICO</option>
                        <option value="FOOD_SERV">FOOD_SERV</option>
                        <option value="KODILAR">KODILAR</option>
                        <option value="NATURAL LIFE">NATURAL LIFE</option>
                        <option value="SEM_GLUTEN">SEM_GLUTEN</option>
                        <option value="TARESSU">TARESSU</option>
            </select>
            <div class="input-group-append">
                <button class="btsel btn-outline-secondary">Selecione</button>
            </div>
        </div>
           <ul class="menu">
                <li class="esp">
                    <a href="#">Sair</a>
                </li>
                
                <li class="esp">
                    <a href="#">Catálogos</a>
                </li>
                <li class="esp">
                    <a href="#">Fale Conosco</a>
                </li>
                <li class="#">
                    <a href="../clientes/sair.php">Sair</a>
                </li>
                <li class="esp">
                    <a href="#">Área do Vendedor</a>
                </li>
               
            </ul>
            </form>
        </nav>            
                      
        <main class="principal">
            <div class="conteudo">
            
                    <?php
                    switch (filter_input(INPUT_POST, 'selecione')){
                        case 'BIO ORGÂNICO':
                            $tipo = "1";
                            $empresa = "Bio Orgânico";
                            break;
                        case 'FOOD_SERV':
                            $tipo = "2";
                            $empresa = "Food Service";
                            break;
                        case 'KODILAR':
                            $tipo = "3";
                            $empresa = "Kodilar";
                            break;
                        case 'NATURAL LIFE':
                            $tipo = "4";
                            $empresa = "Natural Life";
                            break;
                        case 'SEM_GLUTEN':
                            $tipo = "5";
                            $empresa = "Sem Glúten";
                            break;
                        case 'TARESSU':
                            $tipo = "6";
                            $empresa = "Taressu";
                            break;
                        default:
                            $tipo = "0";
                            $empresa = "Todos Itens";
                            break;
                    }
                    
                    if($tipo == "0"){
                        $sql = "SELECT * FROM bd_loja where id";
                        $dados = mysqli_query($link, $sql);
                        
                    } else {                        
                        
                    $sql = "SELECT * FROM bd_loja where tipo = '$tipo' ";
                    $dados = mysqli_query($link, $sql);
                    }
                    
                    
                    ?>
                <div class="titulo-pesquisa"><?php echo $empresa?>
                    <form class="form-pesquisar" action="pesquisar_compra.php?num=<?php echo $n1?>" method="GET">
                    <button type="submit" class="btpesq">Pesquisar</button>
                    <div>
                        <input type="text" class="pesquisar" name="pesq" placeholder="Pesquise por tipo: (arroz, chá, glúten...)">
                    </div>
                </form>
				
                    </div>

<?php

                  
    
    
    while ($linhas= mysqli_fetch_assoc($dados)){
        
                                 
                    echo '
        <div class="col-sm">
            <div class="card">
                <li>
                    <img class="card-img-top" id="img1" style="object-fit: scale-down" src="'. $linhas["imagem"] .'" alt="'.$linhas["nome"].'" onclick="clique(this) ">
                    <div id="janelaModal" class="modalVisual">
                        <span class="fechar">X</span>
                        <img class="modalConteudo" id="imgModal" src="">
                        <div id="txtImg"></div>                                          
                    </div>
                </li>
                <div class="card-body">
                <p class="card-text">'."Código: ".' '. $linhas["codigo"] .'</p>
                    <p><a href="comprar.php?num='. $n1.'&prod='.$linhas['id'].'"><button class="btcomp">Comprar</button></a></p>
                    <p class="card-text">'. $linhas["nome"] .'</p>
                        <p class="card-text">'. "Valor unit: R$ " . number_format($linhas['valorunit_st'],2, ",",".").'</p>
                        <p class="card-text">'. "Caixa: R$ " . number_format($linhas['valor_fd'],2, ",",".").'</p>
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
        
        <script src="../js/acoes.js"></script>
        <script src="../js/card_drop.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>