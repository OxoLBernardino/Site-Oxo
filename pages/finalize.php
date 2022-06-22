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


$consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE prod_temp = :product AND sessao_temp = :sessao");
$consulta->bindvalue(':product', $produto);
$consulta->bindvalue(':sessao', $sessao);
$consulta->execute();

$linhas = $consulta->rowCount();
foreach ($consulta as $mostra):
    $qtd = $mostra['qtd_temp'];
    $total = $mostra['total_temp'];
    $data = $mostra['data_temp'];
    $produto = $mostra['prod_temp'];


endforeach;


$consultas = $pdo->prepare("SELECT * FROM bd_loja WHERE id = :id AND nome = :nome");
$consultas->bindvalue(':nome', $nome);
$consultas->bindvalue(':id', $id);

$consultas->execute();

$linha = $consultas->rowCount();
foreach ($consultas as $mostrar):
    $nome = $mostrar['nome'];
$id_prod = $mostrar['id'];

endforeach;









$finaliza = $pdo->prepare("INSERT INTO pedido_finalizado (carrinho_id, cnpj, data_pedido, produto_id, qnt_produto, valor_venda  ) "
            . "VALUE (:carrinho_id, :cnpj, :data_pedido, :produto_id, :qnt_produto, :valor_venda)");
    $finaliza->bindValue(':carrinho_id', $sessao);
    $finaliza->bindValue(':cnpj', $_SESSION['cnpj']);
    $finaliza->bindValue(':data_pedido', $data);
    $finaliza->bindValue(':produto_id', $nome);
    $finaliza->bindValue(':qnt_produto', $qtd);
    $finaliza->bindValue(':valor_venda', $total);
    $finaliza->execute();

    if ($finaliza):
        echo '<script>alert("Pedido concluido com sucesso")</script>';
        echo '<script>window.location="finalizar.php?num=' . $n1 . '"</script>';

    else:
        echo '<script>alert("Este pedido não pode ser finalizado!")</script>';
        echo '<script>window.location="finalizar.php?num=' . $n1 . '"</script>';

    endif;