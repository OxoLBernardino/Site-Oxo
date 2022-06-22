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
require_once('../gerenciamento/conect/db_cad.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


$produto = filter_input(INPUT_GET, 'prod');

$consultas = $pdo->prepare("SELECT * FROM bd_loja WHERE id = :prod");
$consultas->bindvalue(':prod', $produto);
$consultas->execute();

$linha = $consultas->rowCount();

foreach ($consultas as $mostrar):

    $produto = $mostrar['id'];
$pedido = $mostrar['nome'];

    $qtd = 1;
    $valor = $mostrar['valorfd_st'];
    $valor_temp = $mostrar['valor_fd'];
    $total = $qtd * $valor_temp;
    $data = date('Y-m-d H:i:s');

endforeach;

$rand = rand(1000, 100000);

if (!$_SESSION['pedido']):
    $_SESSION['pedido'] = $rand;
    $sessao = $_SESSION['pedido'];
else:
    $sessao = $_SESSION['pedido'];
endif;
$consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE prod_temp = :product AND sessao_temp = :sessao");
$consulta->bindvalue(':product', $produto);
$consulta->bindvalue(':sessao', $sessao);
$consulta->execute();

$linhas = $consulta->rowCount();
foreach ($consulta as $mostra):
    $qtd_temp = $mostra['qtd_temp'];
    $qtdt = $qtd_temp + 1;
    $unid_temp = $mostra['totalfd_st_temp'];


endforeach;

if ($linhas >= 1):


    $altera = $pdo->prepare("UPDATE carrinho_temporario SET qtd_temp = :qtdm, valor_temp = :val  WHERE sessao_temp = :ses AND prod_temp = :pt");
    $altera->bindValue(':qtdm', $qtdt);
    $altera->bindValue(':val', $valor_temp);
    $altera->bindValue(':ses', $sessao);
    $altera->bindValue(':pt', $produto);
    $altera->execute();
    if ($altera):
        echo '<script>alert("Item alterado com sucesso!")</script>';
        echo '<script>window.location="pedido.php?num=' . $n1 . '"</script>';
    else:
        echo '<script>alert("Este produto não pode ser alterado!")</script>';
        echo '<script>window.location="pedido.php?num=' . $n1 . '"</script>';
    endif;

else:
    $inserir = $pdo->prepare("INSERT INTO carrinho_temporario (prod_temp, qtd_temp, valor_temp, totalfd_st_temp, total_temp, data_temp, sessao_temp  ) VALUE (:prod, :qtd, :val_temp, :st_temp, :total, :data, :sessao)");
    $inserir->bindValue(':prod', $produto);
    $inserir->bindValue(':qtd', $qtd);
    $inserir->bindValue(':val_temp', $valor_temp);
    $inserir->bindValue(':st_temp', $valor);
    $inserir->bindValue(':total', $total);
    $inserir->bindValue(':data', $data);
    $inserir->bindValue(':sessao', $sessao);
    $inserir->execute();

    if ($inserir):
        echo '<script>alert("Produto inserido no carrinho!")</script>';
        echo '<script>window.location="pedido.php?num=' . $n1 . '"</script>';

    else:
        echo '<script>alert("Este produto não foi inserido no carrinho!")</script>';
        echo '<script>window.location="pedido.php?num=' . $n1 . '"</script>';

    endif;





    
        
       

	endif;
