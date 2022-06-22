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
    include "../../../db_cad.php";
    
$objDb = new db();
$link = $objDb->conecta_mysql();
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
            
            <a href="..gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">Voltar</a>
            <h1 class="n">Excluir Usuário</h1>
            
            <?php
            
            
            
            
            
                if(isset($_POST["excolab"])){
                    $vid=filter_input(INPUT_POST,"excolaborador");
                    $sql="DELETE FROM vendedor WHERE id=$vid";
                    mysqli_query($link, $sql);
                    $linhas= mysqli_affected_rows($link);
                    if($linhas >= 1){
                            echo "<p id='lgErro'>Colaborador deletado com sucesso!</p>";
                            
                    } else {
                        echo "<p id='lgErro'>Erro ao deletar colaborador!</p>";
                    }
                }                
            ?>
            
            <form name="excolaborador" action="excluir_colaborador.php" class="fcolaborador" method="GET">
                <input type="hidden" name="num" value="<?php echo $n1 ?>">
                <label>Selecione o colaborador</label></br>
                <select name="excolaborador" size="10">  
                    
                    <?php
                        $sql="SELECT * FROM vendedor";
                        $col=mysqli_query($link, $sql);
                        //$totalcol= mysqli_num_rows($col);
                        while ($exibe= mysqli_fetch_array($col)){
                            echo "<option value='".$exibe['id']."'>".$exibe['contato']."</option>";
                        }
                    ?>
                </select></br>
                
                <p><input type="submit" name="excolab" class="btmenu" value="Excluir">
                    <img src="../drowable/logo.png" id="logom"/></p>
            </form>
        </section>
        
    </body>
</html>

