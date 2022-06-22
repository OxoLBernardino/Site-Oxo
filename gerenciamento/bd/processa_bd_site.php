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
	
    include ('conect.php');
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
        <link rel="stylesheet" href="../../css/style.css"/>
    </head>
    <body>
			<section id="logo_topo"></section>
              
              <div class="menu">
                  
                  <a href="../../pages/home_cliente.php?num=<?php echo $n1?>" target="_self" class="btmenu">Voltar</a>
                  
              </div>        
        <section id="main">
            <h1 class="n">Atualização BD Site</h1>
    
        <form class="fcolaborador" method="POST" action="processa.php?num=<?php echo $n1?>" enctype="multipart/form-data">

            <label>Selecione o arquivo</label>
            <input type="file" name="arquivo"><br><br>
			
			<button class="btmenu">Enviar</button>
        </form>

        </section>
    </body>
</html>