
<?php
session_start();

if (isset($_SESSION["numlogin"])) {
    $n1 = filter_input(INPUT_GET, 'num');
    $n2 = $_SESSION["numlogin"];

    if ($n1 != $n2) {
        echo "<p id='lgErro'>Login não autorizado</p>";
        exit();
    }
} else {
    echo "<p id='lgErro'>E AEH ESPERTALHÃO??? LOGA DIREITO!!! Login não autorizado</p>";
    exit();
}
$_SESSION['pedido'];
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
        <link rel="stylesheet" href="../css/navegacao.css">
        <link rel="stylesheet" href="../css/catalogo.css">        
        <link id="favicon" rel="shortcut icon" href="../img/logo_oxo_1000.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="../img/logo_oxo_1000.png">
            <header class="cabecalho">
                <h1>Carrinho</h1>
                <h2>Não esqueceu de nada <b class="text-capitalize"><?php echo $_SESSION['contato'] ?></b>!</h2>

            </header>
        </div>

        <nav class="navegacao">


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
                    <a href="pedido.php?num=<?php echo $n1 ?>">Continuar Comprando</a>
                </li>
                <li class="esp">
                    <a href="#">Área do Vendedor</a>
                </li>

            </ul>
        </form>
    </nav>  


</div>
<main class="principal">
    <div class="conteudo">

        <article>
            <table class="talao">

                <tr id="titulo">
                    <td id="corpo">CÓDIGO</td>
                    <td id="corpo">PRODUTO</td>
                    <td id="corpo">QUANTIDADE</td>
                    <td id="corpo">VALOR UNITÁRIO (c/st)</td>
                    <td id="corpo">VALOR TOTAL</td>
                    <td id="corpo">AÇÃO</td>
                </tr>
<?php
$sessao = $_SESSION['pedido'];
$consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE sessao_temp = :ses");
$consulta->bindValue(':ses', $sessao);
$consulta->execute();

$linhas = $consulta->rowCount();
$total = 0;
foreach ($consulta as $mostra):
    $preco_unid = $mostra['total_temp'];
    $preco = $mostra['totalfd_st_temp'];
    $qtd_temp = $mostra['qtd_temp'];
    $valor_temp = $qtd_temp * $preco;
    $valor = $qtd_temp * $preco_unid;
    $total += $valor;


    $prod = $mostra['prod_temp'];
    $consultar = $pdo->prepare("SELECT * FROM bd_loja WHERE id = :prod");
    $consultar->bindValue(':prod', $prod);
    $consultar->execute();
    foreach ($consultar as $mostrar):
        $codigo = $mostrar['codigo'];
        $produtos = $mostrar['nome'];
        $valor_unit = $mostrar['valorfd_st'];
        $valor_venda = $mostrar['valor_fd'];
        ?>
                        <tr>
                            <td id="corpo"><p><?= $codigo; ?></p></td>
                            <td id="corpo"><p><?= $produtos; ?></p></td>

                        <form method="post">
                            <input type="number" name="preco" value="<?= $mostra['total_temp'] ?>" style="display: none;">
                            <input type="number" name="id" value="<?= $mostra['id_temp'] ?>" style="display: none;">
                            <td id="corpo"><p><input id="qtd" type="number" name="quantidade" value="<?= $mostra['qtd_temp'] ?>">&nbsp;<button name="alterar" id="btn" value="Alterar">Alterar</button></p></td>
        <?php
        if (isset($_POST['alterar'])):
            $qtde = filter_input(INPUT_POST, 'quantidade');
            $preco = filter_input(INPUT_POST, 'preco');
            $valor = filter_input(INPUT_POST, 'valor');
            $id = filter_input(INPUT_POST, 'id');
            echo '<script>window.location="alterar.php?num=' . $n1 . '&qtd=' . $qtde . '&preco=' . $preco . '&valor=' . $valor . ' &ref=' . $id . '"</script>';
        endif;
        ?>

                            <td id="corpo"><p>R$<?= number_format($valor_unit, 2, ',', '.'); ?></p></td>

                            <td id="corpo"><p>R$<?= number_format($valor_temp, 2, ',', '.'); ?></p></td>

                        </form>

                        <td id="corpo"><p><a href="excluir.php?num=<?php echo $n1 ?>&ref=<?= $mostra['id_temp'] ?>"><input type="submit" name="excluir" value="Excluir"></a></p></td>

                        </tr>



        <?php
    endforeach;
endforeach;
?>

                <tr>
                    
                    <td id="final" colspan="4"><a href="finalizar.php?num=<?php echo $n1 ?>&ref=<?= $mostra['sessao_temp'] ?>"><input type="submit" name="finaliza" value="Finalizar Pedido"></a></td>
                
                    <td id="rod" colspan="2"><p>Total: R$ <?= number_format($total, 2, ',', '.'); ?></p></td>


                </tr>
            </table>
        </article>

    </div>
</main>

<footer class="rodape">
    Todos os Direitos Reservados - by LEANDRO SILVA Copyright &copy; <?= date('Y'); ?>
</footer>

<script src="../js/acoes.js"></script>
<script src="../js/card_drop.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>