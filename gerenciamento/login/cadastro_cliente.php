<?php
  $erro_cnpj = filter_input(INPUT_GET, 'erro_cnpj') ? filter_input(INPUT_GET, 'erro_cnpj') : 0;
  $erro_telefone = filter_input(INPUT_GET, 'erro_telefone') ? filter_input(INPUT_GET, 'erro_telefone') : 0;
  $erro_email = filter_input(INPUT_GET, 'erro_email') ? filter_input(INPUT_GET, 'erro_email') : 0;
  $senha_ok = filter_input(INPUT_GET, 'erro_senha') ? filter_input(INPUT_GET, 'erro_senha') : 0;
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
                
                <form class="form2" method="POST" action="registra_cliente.php" target="_self" >
                    <fieldset class="cad_cliente2">
                        <h2>Cadastro de Cliente</h2>
                        <input class="cnpj" name="cnpj" type="text" placeholder="CNPJ: Somente números" data-mask="00.000.000/0000-00 maxlength="18"  autofocus required>
                            <?php
                            if($erro_cnpj){
                                echo '<font style="color:#ff0000">CNPJ já existe</font>';
                                
                            }
                            ?>
                        
                        <input class="razsoc" name="rasoc" type="text" placeholder="Razão Social"   autofocus required><br>
                        
                        <input class="cont" name="contato" type="text" placeholder="Nome do contato" maxlength="50" required>

                        <input class="tel" name="telefone" type="tel" placeholder="Tel: xx xxxx-xxxx" data-mask="(00) 0000-0000" maxlength="14" required>
                            <?php
                            if($erro_telefone){
                                echo '<font style="color:#ff0000">Telefone já existe</font>';

                            }
                            ?>

                        <input class="cel" name="celular" type="tel" placeholder="Cel: xx xxxxx-xxxx" data-mask="(00) 00000-0000" maxlength="15" required><br>

                        

                        <input class="mailc" name="email" type="email" placeholder="E-mail" maxlength="50" required>
                            <?php
                            if($erro_email){
                                echo '<font style="color:#ff0000">Email já existe</font>';

                            }
                            ?>

                        <input class="pass" name="senha" type="password" placeholder="Senha" maxlength="50" required>

                        <input class="passc" name="confirmasenha" type="password" placeholder="Confirme a senha" maxlength="50" required>
                            <?php
                            if($senha_ok){
                                echo '<font style="color:#ff0000">Senhas não conferem</font>';

                            }
                            ?>
                       
                    </fieldset>
                    <div class="bt">
                        <button type="submit" class="btmenucad2">Salvar</button>
                    </div>
                                        
                        
                    
                </form>
            </div>
        </main>
        
        <footer class="rodape">
             Todos os Direitos Reservados - by LEANDRO SILVA Copyright &copy; <?= date('Y');?>
        </footer>
        
        <script src="js/clareandro.js"></script>
        <script src="js/acoes.js"></script>
        <script src="js/card_drop.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    </body>
</html>