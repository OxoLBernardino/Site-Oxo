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
            <h1 class="n">Excluir Produto</h1>
            
            <?php                
                if(isset($_GET["exprod"])){
                    $vid=filter_input(INPUT_GET,"exproduto");
                    $sql="DELETE FROM mormaii WHERE id=$vid";
                    mysqli_query($conect, $sql);
                    $linhas= mysqli_affected_rows($conect);
                    if($linhas >= 1){
                            echo "<p id='lgErro'>Produto deletado com sucesso!</p>";
                            
                    } else {
                        echo "<p id='lgErro'>Erro ao deletar produto!</p>";
                    }
                }                
            ?>
            
            <form name="exproduto" action="excluir_produto.php" class="fcolaborador" method="GET">
                <input type="hidden" name="num" value="<?php echo $n1 ?>">
                <label>Selecione o produto</label></br>
                <select name="exproduto" size="10">  
                    
                    <?php
                        $sql="SELECT * FROM mormaii";
                        $col=mysqli_query($conect, $sql);
                        //$totalcol= mysqli_num_rows($col);
                        while ($exibe= mysqli_fetch_array($col)){
                            echo "<option value='".$exibe['id']."'>".$exibe['TIPO']." - ".$exibe['PRODUTO']."</option>";
                        }
                    ?>
                </select></br>
                
                <p><input type="submit" name="exprod" class="btmenu" value="Excluir">
                    <img src="../drowable/logo.png" id="logom"/></p>
            </form>
        </section>
        
    </body>
</html>

