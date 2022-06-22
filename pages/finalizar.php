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
    <nav class="navegacao">
            
            
        <form class="categoria" action="finalizar.php?num=<?php echo $n1?>" method="POST">
                
                
        
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
    
    <body>
        
        
        <div class="container">
            <div class="car-compras">
                
               
               
            </div>
            <section class="logo_topo"></section>
            <header class="cabecalho"> 
                
                <h1>Pedido Finalizado</h1>
                <h2>Obrigado pela compra <b class="text-capitalize"><?php echo $_SESSION['contato']?></b>!</h2>
                
            </header>
            
            
            
            
        </div>
        
        
        <main class="principal">
            <div class="conteudo">

        
        <?php
$date = date_create('America/Sao_paulo');
?>
        
                
<article>
        <table class="talao">
            
            
            
            
            <a href="../pages/finalize.php?num=<?php echo $n1?>">ENVIAR PEDIDO</a>
            
            <tr id="topo_pd">
                <td colspan="1"><img id="log_pd" src="../img/logo_oxo_150.png"></td>
                <td id="text_topo"colspan="4">&nbsp;&nbsp;&nbsp;Seu Pedido nº <?= $_SESSION['pedido']?> <label id="data">São Paulo - <?php echo date_format($date, 'd/m/Y H:i:s')?></label><br>
                    &nbsp;&nbsp;&nbsp;CNPJ: <?php echo $_SESSION['cnpj']?><br>&nbsp;&nbsp;&nbsp;Nome Fantasia: <?php echo strtoupper($_SESSION['rasoc'])?><br>
                &nbsp;&nbsp;&nbsp;Telefone: <?php echo $_SESSION['celular']?><br>&nbsp;&nbsp;&nbsp;E-mail: <?php echo $_SESSION['email']?><br></td>
            </tr>
        
       

            <tr id="titulo">
                <td id="corpo">CÓDIGO</td>
                <td id="corpo">PRODUTO</td>
                <td id="corpo">QUANTIDADE</td>
                <td id="corpo">VALOR UNITÁRIO</td>
                <td id="corpo">VALOR TOTAL</td>
            </tr>
    <?php
    
    
    $sessao = $_SESSION['pedido'];
    $consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE sessao_temp = :ses");
    $consulta->bindValue(':ses', $sessao);
    $consulta->execute();

    $linhas = $consulta->rowCount();
    $total = 0;
    $total_final = 0;
    foreach ($consulta as $mostra):
        $preco = $mostra['total_temp'];
        $preco_final = $mostra['totalfd_st_temp'];
    
        $qtd_temp = $mostra['qtd_temp'];
        $valor = $qtd_temp * $preco;
        $total += $valor;
        
        $valor_final = $qtd_temp * $preco_final;
        $total_final += $valor_final;
        
        $st = $total_final - $total;


        $prod = $mostra['prod_temp'];
        $consultar = $pdo->prepare("SELECT * FROM bd_loja WHERE id = :prod");
        $consultar->bindValue(':prod', $prod);
        $consultar->execute();
        foreach ($consultar as $mostrar):
        $codigo = $mostrar['codigo'];
        $produtos = $mostrar['nome'];
        $unid_temp = $mostrar['valor_fd'];
      
        ?>
        <tr>
            <td id="corpo"><p><?=$codigo; ?></p></td>
            <td id="corpo"><p><?=$produtos; ?></p></td>
            <input type="number" name="preco" value="<?= $unid_temp?>" style="display: none;">
            <input type="number" name="id" value="<?= $mostra['id_temp']?>" style="display: none;">
            <td id="corpo"><p><?= $mostra['qtd_temp']?></p></td>
                
            <td id="corpo"><p>R$<?= number_format($preco_final, 2, ',', '.');?></p></td>

            <td id="corpo"><p>R$<?=number_format($valor, 2, ',', '.');?></p></td>     
            
        </tr>

        <?php
        endforeach;endforeach;
        ?>
            <tr>
                
                
                <td id="rod" colspan="4"><p>Total: R$ <?= number_format($total, 2, ',', '.'); ?></p></td>
                <td id="rod" colspan="1"><p>Valor St: R$ <?= number_format($st, 2, ',', '.'); ?></p></td>
        
                
        </tr>
        
       <?php
       /*
       $inserir = $pdo->prepare("INSERT INTO pedido_finalizado (carrinho_id, cnpj, data_pedido, produto_id, qnt_produto, valor_venda  ) VALUE (:carrinho_id, :cnpj, :data_pedido, :produto_id, :qnt_produto, :valor_venda)");
    $inserir->bindValue(':qnt_produto', $qtd_temp);
    $inserir->bindValue(':valor_venda', $valor);
    $inserir->bindValue(':data_pedido', $data);
    $inserir->bindValue(':produto_id', $produtos);
    $inserir->bindValue(':carrinho_id', $sessao);
    $inserir->bindValue(':cnpj', $_SESSION['cnpj'] );
    $inserir->execute();

    if ($inserir):
        echo '<script>alert("Pedido finalizado com sucesso!")</script>';
        echo '<script>window.location="pedido.php?num=' . $n1 . '"</script>';

    else:
        echo '<script>alert("Erro na finalização do pedido!")</script>';
        echo '<script>window.location="pedido.php?num=' . $n1 . '"</script>';
endif;
       
       */
       ?>
        
        </table>
    
    </article>
                
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