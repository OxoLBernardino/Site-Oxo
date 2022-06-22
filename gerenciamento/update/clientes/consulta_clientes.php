<?php
    session_start();
    if(isset($_SESSION["numlogin"])){
    $n1=filter_input(INPUT_GET,'num');
        $n2=$_SESSION["numlogin"];
        if($n1!=$n2){
            echo "<p id='lgErro'>Login não autorizado</p>";
            exit();
        }        
    } else {
        echo "<p id='lgErro'>E AEH ESPERTALHÃO??? LOGA DIREITO!!! Login não autorizado</p>";
            exit();
            
    }
    
    include '../gerenciamento/bd/conect.php';
    
    
$conexao = new PDO('mysql:host=localhost; dbname=central', "root","");

$select = $conexao->prepare("SELECT * FROM pessoa");
$select->execute();
$fetch = $select->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Consulta</title>
        <link rel="stylesheet" href="../css/estilo.css"/>
        <link rel="stylesheet" href="../css/contato.css">
    </head>
    <body>
			<section id="logo_topo"></section>
              
              <div class="menu">
                  
                  <a href="../vendas/gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">Voltar</a>
                  
              </div>

<h1>Consulta</h1>

<div class="clien">
    <table class="table">
        <tr id="tabela">
            <td>NOME</td>
            <td>E-MAIL</td>
            <td>TELEFONE</td>
            <td>CELULAR</td>
            <td>CNPJ</td>
            <td colspan="2">CRIADO EM</td>
                
                <?php
foreach ($fetch as $produto) {
    echo '<tr id="tabela1">.<td>'.$produto['contato'].'</td>'
            . '.<td>'.$produto['comemail'].'</td>'
            . '.<td>'.$produto['telefone'].'</td>'
            . '.<td>'.$produto['celular'].'</td>'
            . '.<td>'.$produto['cnpj'].'</td>'
            . '.<td colspan="2">'.$produto['created'].'</td>'
            . '.</tr>';
    }
?>
        </tr>
    </table>
</div>