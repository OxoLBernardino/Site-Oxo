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
    
    include "../../inc/conexao.inc";
    ?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Gerenciamento</title>
        <link rel="stylesheet" href=""/>
    </head>
    <body>
        <header id="topo">
            <?php
                include "../../inc/topo.inc";
            ?>
        </header>
        <hr id="hr">
        
        <section id="main">
            
            <a href="../../bellpar/pagin/gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">Voltar</a>
            <h1 class="n">Atualização Cadastral</h1>
    
            <form class="fcolaborador" method="POST" action="../empresas/processa_empresas.php?num=<?php echo $n1?>" enctype="multipart/form-data">

            <label>Empresas XML</label>
            <input type="file" name="arquivo"><br><br>

            <input class="btmenu" type="submit" value="Enviar">
        </form>

        </section>
    </body>
</html>