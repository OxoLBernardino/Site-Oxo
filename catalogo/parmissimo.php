<?php
    
    require_once('../empresas/parmissimo/conect/conect.php');
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
        <header class="cabecalho_parm">
            <h1>Catálogo Parmissimo</h1>
            <h2>Seja bem vindo!</h2>            
            <img class="log" src="../img/logo-parmissimo.png"/>
        </header>
        </div>        
       
       <!-- <input type="checkbox" id="bt_menu"/>
        <label for="bt_menu">&#9776;</label>
        -->
        <nav class="navegacao">
            
            <form class="categoria" action="parmissimo.php" method="POST">
        <div class="input-group">
            <select class="selecione" id="inputGroupSelect04" name="selecione">
                <option value="Todos">Todos</option>
                <option value="zro">ZERO LACTOSE</option>
		<option value="par">PARMESÃO</option>
                <option value="mus">MUSSARELA</option>
                <option value="pro">PROVOLONE</option>
                <option value="pra">PRATO</option>
                <option value="col">COLÔNIAL</option>
                <option value="pot">POTE</option>
                <option value="mis">MISTO</option>
		<option value="gra">GRANA</option>
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
                    <a href="construcao.php">Fale Conosco</a>
                </li>
                <li class="#">
                    <a href="construcao.php">Área do Cliente</a>
                </li>
                <li class="#">
                    <a href="construcao.php">Área do Vendedor</a>
                </li>
            </ul>
            </form>
        </nav>                
                      
        <main class="principal">
            <div class="conteudo">
            
                    <?php
                    switch (filter_input(INPUT_POST, 'selecione')){
                        
                        case 'col':
                            $tipo = "1";
                            $empresa = "Colônial";
                            break;
                        case 'gra':
                            $tipo = "2";
                            $empresa = "Grana";
                            break;
                        case 'mus':
                            $tipo = "3";
                            $empresa = "Mussarelas";
                            break;
                        case 'par':
                            $tipo = "4";
                            $empresa = "Parmesão";
                            break;
						case 'pra':
                            $tipo = "5";
                            $empresa = "Prato";
                            break;
                        case 'pro':
                            $tipo = "6";
                            $empresa = "Provolone";
                            break;
						case 'zro':
                            $tipo = "7";
                            $empresa = "Zero Lactose";
                            break;
                        case 'mis':
                            $tipo = "8";
                            $empresa = "Misto";
                            break;
                        case 'pot':
                            $tipo = "9";
                            $empresa = "Pote";
                            break;
                        default:
                            $tipo = "0";
                            $empresa = "Todos Itens";
                            break;
                    }
                    
                    if($tipo == "0"){
                        $sql = "SELECT * FROM parmissimo where id";
                        $dados = mysqli_query($link, $sql);
                        
                    } else {                        
                        
                    $sql = "SELECT * FROM parmissimo where tipo = '$tipo' ";
                    $dados = mysqli_query($link, $sql);
                    }
                    
                    
                    ?>
                <div class="titulo-pesquisa"><?php echo $empresa?>
                    <form class="form-pesquisar" action="parmissimo_pesquisar.php" method="GET">
                    <button type="submit" class="btpesq">Pesquisar</button>
                    <div>
                        <input type="text" class="pesquisar" name="pesq" placeholder="Pesquise por tipo: (ralado, parmesao, lactose...)">
                    </div>
                </form>
				
                    </div>
<?php

                  
    
    
    while ($linhas= mysqli_fetch_assoc($dados)){
        
                                 
                    echo '
        <div class="col-sm">
            <div class="card">
                <li>
                    <img class="card-img-top" id="img1" style="object-fit: scale-down" src="'. $linhas["img"] .'" alt="'.$linhas["produto"].'" onclick="clique(this) ">
                    <div id="janelaModal" class="modalVisual">
                        <span class="fechar">X</span>
                        <img class="modalConteudo" id="imgModal" src="">
                        <div id="txtImg"></div>                                          
                    </div>
                </li>
                <div class="card-body">
                    <p class="card-text">'."Código: ".' '. $linhas["cod"] .'</p>
                    <p class="card-text">'. "Descrição dos Itens" .'</p>
                    <p class="card-text">'. $linhas["produto"] .'</p>    
                    <p class="card-text">'. "Embalagem com: " . $linhas["unid"] . " unids" .'<p class="card-text">'. "Caixa: R$ " . number_format($linhas['valor_uni'],2, ",",".").'</p>
                    <p class="card-text">'. "Validade: " . $linhas["val"] . " dias" .'</p>
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
