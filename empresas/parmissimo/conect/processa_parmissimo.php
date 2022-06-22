
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
                  
                  <a href="../../../catalogo/parmissimo.php" target="_self" class="btmenu">Voltar</a>
                  
              </div>        
        <section id="main">
            <h1 class="n">Atualização BD Site</h1>
    
            <form class="fcolaborador" method="POST" action="processa.php" enctype="multipart/form-data">

            <label>Selecione o arquivo</label>
            <input type="file" name="arquivo"><br><br>
			
			<button class="btmenu">Enviar</button>
        </form>

        </section>
    </body>
</html>