<?php
    session_start();
    if(isset($_SESSION["numlogin"])){
    $n1=filter_input(INPUT_GET,'num');
        $n2=$_SESSION["numlogin"];
        if($n1!=$n2){
            echo "<p id='lgErro'>Login não autorizado</p>";
            exit();
        }
    }
    include "../inc/conexao.inc";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerenciamento</title>
        <link rel="stylesheet" href="../css/estilo.css"/>
    </head>
    <body>
        <header id="topo">
            <?php
                include "../inc/topo.inc";
            ?>
        </header>
        <hr id="hr">
        
        <section id="main">
            
            <a href="../pagin/gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">Voltar</a>
            <h1 class="n">Cadastro de Novo Produto</h1>
            
            <?php
            
                
                
               if(isset($_GET["btbd"])){
                    $vimg=filter_input(INPUT_GET,'img');
                    $ftipo=filter_input(INPUT_GET,'ftipo');
                    $fproduto=filter_input(INPUT_GET,'fproduto');
                    $fvalid=filter_input(INPUT_GET,'fvalid');
                    $funid=filter_input(INPUT_GET,'funid');
                    $fvunid=filter_input(INPUT_GET,'fvunid');
                    $fvfd=filter_input(INPUT_GET,'fvfd');
                    
                    $sql="INSERT INTO mormaii (IMAGEM, TIPO, PRODUTO, VALIDADE, QUANTIDADE, UNIDADE, FARDO, Created) VALUES ('$vimg','$ftipo','$fproduto','$fvalid','$funid','$fvunid','$fvfd',NOW())";
                    mysqli_query($conect, $sql);
                    $linhas= mysqli_affected_rows($conect);
                    if($linhas >= 1){
                        echo "<p id='lgErro'>Produto cadastrado com sucesso!</p>";
                    } else {
                        echo "<p id='lgErro'>Erro ao cadastrar novo produto!</p>";
                    }
                            
                }
            
            ?>
            
            <form name="novo_prod" action="novo_produto.php" class="fcolaborador" method="GET">
                <input type="hidden" name="num" value="<?php echo $n1 ?>">
                <label>IMAGEM</label></br>
                <input type="file" name="img" required="required"></br>
                <label>TIPO</label></br>
                <input type="text" name="ftipo" maxlength="20" size="20" required="required"></br>
                <label>PRODUTO</label></br>
                <input type="text" name="fproduto" maxlength="20" size="20" required="required"></br>
                <label>VALIDADE</label></br>
                <input type="text" name="fvalid" maxlength="11" size="11" required="required" placeholder="meses"></br>
                <label>QUANTIDADE</label></br>
                <input type="text" name="funid" maxlength="20" size="20" required="required"></br>
                <label>UNIDADE</label></br>
                <input type="text" name="fvunid" maxlength="20" size="20" required="required"></br>
                <label>FARDO</label></br>
                <input type="text" name="fvfd" maxlength="20" size="20" required="required"></br>
                <input type="submit" name="btbd" class="btmenu" value="Cadastrar">
                <img src="../drowable/logo.png" id="logom"/>
            </form>
        </section>
        
    </body>
</html>

