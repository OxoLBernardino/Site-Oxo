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


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comandos</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
		<section id="logo_topo"></section>
              
              <div class="menu">
                  
                  <a href="../vendas/gerenciamento.php?num=<?php echo $n1; ?>" target="_self"><button class="btmenu01">Voltar</button></a>
                  
              </div>
                
                
                    
                <div class="containerg">
                    <h1>Abastecimento do Banco de dados</h1>
                    <a href="../vendas/gerenciamento.php?num=<?php echo $n1?>" target="_self"><button class="btmenu01">Index</button></a><br><br><br>
                    <a href="../gerenciamento/bd/processa_bd_site.php?num=<?php echo $n1?>" target="_self"><button class="btmenu01">Imp. db Loja</button></a>
                    <a href="#"><button class="btmenu01">Imp. db Kodilar</button></a>
                    <a href="#"><button class="btmenu01">Imp. db Natural Life</button></a>
                    <a href="#"><button class="btmenu01">Imp. db Taressu</button></a>
                    <a href="#"><button class="btmenu01">Imp. db Bio</button></a>
                    <a href="#"><button class="btmenu01">Imp. db Food Service</button></a>
                    <a href="#"><button class="btmenu01">Imp. db Sem Gluten</button></a>		
		</div>

</body>
</html>