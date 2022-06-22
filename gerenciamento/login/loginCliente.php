<?php

require_once('../conect/db_cad.php');
$erro = isset($_GET['erro']) ? ($_GET['erro']) : 0;

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="pt-br">
    <head>
        <title>OXOREP</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/catalogo.css">        
        <link id="favicon" rel="shortcut icon" href="../../img/logo_oxo_1000.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="../../img/logo_oxo_1000.png">
        <header class="cabecalho">
            <h1>Oxo Representações Comerciais</h1>
            <h2>Área do Cliente!</h2>
        </header>
        </div>
        <nav class="navegacao">
            <ul class="menu">
                <li class="#">
                    <a href="../../index.php">Home</a>
                </li>
                <li class="#">
                    <a href="../../catalogo/catalogo.php">Catálogos</a>
                </li>
                <li class="#">
                    <a href="../../institucional/institucional.php">Institucional</a>
                </li>
                <li class="#">
                    <a href="../../mail/contato.php">Fale Conosco</a>
                </li>
                <li class="#">
                    <a href="../../catalogo/construcao.php">Área do Vendedor</a>
                </li>
                
            </ul>
        </nav>        
                      
        <main class="principal">
            <div class="conteudo">
            <section>
                <?php
                function anti_sql_injection($string){
                    include('conexao.php');
                    $string = stripslashes($string);
                    $string = strip_tags($string);
                    $string = mysqli_real_escape_string($conexao, $string);
                    return $string;
                    
                }
                
                $objDb = new db();
                $link = $objDb->conecta_mysql();
                
                if(isset($_POST['btnlog'])){
                    $email= addslashes (filter_input(INPUT_POST,'fnome'));
                    $senha= addslashes (md5(filter_input(INPUT_POST,'fsenha')));
                    
                    if (isset ($email) && !empty($email) && isset($senha) && !empty($senha)){
                        header('Location: loginCliente.php?erro=1');
                        
                    }
                    
                    $sql="SELECT * FROM pessoa WHERE email='". anti_sql_injection($email)."' AND senha='".anti_sql_injection($senha)."'";
                    $res=mysqli_query($link,$sql);
                    $ret=mysqli_fetch_array($res);
                    
                    if($ret == 0){
                        echo "<p id='lgErro'>Login incorreto</p>";
                        
                    }else{
                        $chave1="abcdefghijklmnopqrstuvwxyz";
                        $chave2="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                        $chave3="0123456789";
                        $chave=str_shuffle($chave1.$chave2.$chave3);
                        $tam=strlen($chave);
                        $num="";
                        $qtde=rand(20,50);
                        for($i=0;$i<$qtde;$i++){
                            $pos=rand(0,$tam);
                            $num.=substr($chave,$pos,1);
                            
                        }
                        
                        session_start();
                        $_SESSION['numlogin']=$num;
                        $_SESSION['email']=$email;
                        $_SESSION['cnpj']=$ret['cnpj'];
                        $_SESSION['rasoc']=$ret['rasoc'];
                        $_SESSION['telefone']=$ret['telefone'];
                        $_SESSION['celular']=$ret['celular'];
                        $_SESSION['contato']= $ret['contato'];                            
                        $_SESSION['acesso']=$ret['acesso'];//0=Restrito / 1=Total
                        header("Location: ../../clientes/home_cliente.php?num=$num");
                        
                        }
                        
                        }
                        mysqli_close($link);
                        
                        ?>
                
                <form class="form2" action="loginCliente.php" name="flog" method="post" >
                    <fieldset class="cad_cliente2">
                        <h2>Login</h2>
                        <label>Usúario</label>
                        <input id="digmail" type="text" name="fnome" placeholder="Digite seu e-mail" required><br>
                        <label>Senha</label>&nbsp;&nbsp;
                        <input  id="digpass" type="password" name="fsenha" placeholder="Digite sua senha" required><br>
                            <?php
                            if($erro == 1){
                                echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
                                
                            }
                            ?>
                        
                        <h6>Ainda não é cadastrado?</h6>
                        
                        <a class="cadastro" href="cadastro_cliente.php">Cadastre-se aqui</a>
                    </fieldset>
                    <div class="bt">
                        <button type="submit" class="btmenucad2" name="btnlog">Login</button>
                    </div>
                    
                </form>
            </section>
        </div>
    </main>
        
        <a href=""></a>
        
        <footer class="rodape">
             Todos os Direitos Reservados - by LEANDRO SILVA Copyright &copy; <?= date('Y');?>
        </footer>
        
        <script src="../../js/clareandro.js"></script>
        <script src="../../js/acoes.js"></script>
        <script src="../../js/card_drop.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
</html>