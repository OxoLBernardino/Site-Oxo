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
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">-->
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/clareandro.js" type="text/javascript"></script>
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/java.js" type="text/javascript"></script>

    <title>Index</title>
    
    <link id="favicon" rel="shortcut icon" href="assets/logo_oxo.png" type="image/png" />
  </head>
  <body>
      <!-- cabeçalho -->
      
      
       <section id="logo_topo"></section>
              
       <br class="fix">

        
        <section>
            <h3>Área de Gerenciamento</h3>
        </section>
        <nav>
            <div class="menu_ger">
                <button id="menua1" class="btmenu1">Produtos</button>
                <div id="menub1" class="menub">
                    <a href="../produtos/novo_produto.php?num=<?php echo $n1?>" target="_self">Novo</a>
                    <a href="#">Editar</a>
                    <a href="../produtos/excluir_produto.php?num=<?php echo $n1?>" target="_self">Excluir</a>
                </div>
            </div>
            <div class="menu_ger">
                <button id="menua2" class="btmenu1">Clientes</button>
                <div id="menub2" class="menub">
                    <a href="../gerenciamento/clientes/crud_pdo/home_gerec_cliente.php?num=<?php echo $n1?>" target="_self">Novo</a>
                    <a href="#">Editar</a>
                    <a href="#" target="_self">Excluir</a>
                </div>
            </div>
            <?php
                if($_SESSION["acesso"]==1){
                    echo "
                        <div class='menu_ger'>
                            <button id='menua3' class='btmenu1'>Usuarios</button>
                            <div id='menub3' class='menub'>
                            <a href='../gerenciamento/update/usuarios_cadastro/consulta_colaborador.php?num=$n1' target='_self'>Consulta</a>
                            <a href='../gerenciamento/update/usuarios_cadastro/novo_colaborador.php?num=$n1' target='_self'>Novo</a>
                            <a href='../gerenciamento/update/usuarios_cadastro/editar_colaborador.php?num=$n1' target='_self'>Editar</a>
                            <a href='../gerenciamento/update/usuarios_cadastro/excluir_colaborador.php?num=$n1' target='_self'>Excluir</a>
                            </div>
                        </div>
                    ";
                }
            ?>
            <div class="menu_ger">
                <button id="menua4" class="btmenu1">Empresas</button>
                <div id="menub4" class="menub">
                    <a href="../../boss/empresas/editar_bd.php?num=<?php echo $n1?>" target="_self">Novo</a>
                    <a href="../../boss/bd/editar_bd.php?num=<?php echo $n1?>" target="_self">Editar</a>
                    <a href="#" target="_self">Excluir</a>
                </div>
            </div>
            <div class="menu_ger">
                <button id="menua5" class="btmenu1">Slider</button>
                <div id="menub5" class="menub">
                    <a href="../produtos/novo_produto.php?num=<?php echo $n1?>" target="_self">Novo</a>
                    <a href="#">Editar</a>
                    <a href="../produtos/excluir_produto.php?num=<?php echo $n1?>" target="_self">Excluir</a>
                </div>
            </div>
            <?php
                if($_SESSION["acesso"]==1){
                    echo "
                        <div class='menu_ger'>
                            <button id='menua6' class='btmenu1'>Data Base</button>
                            <div id='menub6' class='menub'>
                                <a href='index.php?num=<?php echo $n1?>' target='_self'>Atualizar BD</a>
                                <a href='../produtos/novo_produto.php?num=<?php echo $n1?>' target='_self'>Novo</a>
                                <a href='#'>Editar</a>
                                <a href='../produtos/excluir_produto.php?num=<?php echo $n1?>' target='_self'>Excluir</a>
                            </div>
                        </div>
                    ";
                }
            ?>
            
            
            <div class="menu_ger">
                <button id="menua7" class="btmenu1">Logoff</button>
                <div id="menub7" class="menub">
                    <a href="../sair.php" target="_self">Sair</a>
                </div>
            </div>
        </nav>
         
       <div>
          
       </div>
        
    </body>
</html>

