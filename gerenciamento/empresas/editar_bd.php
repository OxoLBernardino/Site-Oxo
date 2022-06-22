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
        <link rel="stylesheet" href="../../bellpar/css/estilo.css"/>
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


        <h1 class="n">Abastecimento do Banco de dados</h1>

        

        <!--<a href="kodilar/conect/processa_cadastro.php"><input type="submit" name="bt_import" VALUE="Importar db Cadastro" /></a><br><br>-->
        <a href="../update/processa_mormaii.php?num=<?php echo $n1?>" target="_self"><input class="btmenu" type="submit" name="bt_import" VALUE="BD Mormaii" /></a><br><br>
        <a href="../../boss/empresas/processa_empresas.php?num=<?php echo $n1?>" target="_self"><input class="btmenu" type="submit" name="bt_import1" VALUE="BD Empresas" /></a><br><br>
        <!--<a href="kodilar/conect/processa_taressu.php"><input type="submit" name="bt_import2" VALUE="Importar db Taressu" /></a><br><br>
        <a href="kodilar/conect/processa_bio.php"><input type="submit" name="bt_import1" VALUE="Importar db Bio" /></a><br><br>
        <a href="kodilar/conect/processa_food_service.php"><input type="submit" name="bt_import2" VALUE="Importar db Food Service" /></a><br><br>
        <a href="kodilar/conect/processa_sem_gluten.php"><input type="submit" name="bt_import2" VALUE="Importar db Sem Gluten" /></a><br><br>
        <a href="kodilar/conect/processa_pesquisa.php"><input type="submit" name="bt_import2" VALUE="Importar db Pesquisa" /></a><br><br>-->

</body>
</html>