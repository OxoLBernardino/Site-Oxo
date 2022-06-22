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
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/navegacao.css">        
        <link id="favicon" rel="shortcut icon" href="img/logo_oxo_1000.png" type="image/png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <img class="responsive-logo_topo" src="img/logo_oxo_1000.png">
        <header class="cabecalho">
            <h1>Oxo Representações Comerciais</h1>
            <h2>Seja bem vindo!</h2>
        </header>
        </div>
        <nav class="navegacao">
            <ul class="menu">
                <li class="#">
                    <a href="../index.php">Home</a>
                </li>
                <li class="#">
                    <a href="../catalogo/catalogo.php">Catálogos</a>
                </li>
                <li class="#">
                    <a href="../institucional/institucional.php">Institucional</a>
                </li>
                <li class="#">
                    <a href="../gerenciamento/login/loginCliente.php">Área do Cliente</a>
                </li>
                <li class="#">
                    <a href="../catalogo/construcao.php">Área do Vendedor</a>
                </li>
                
            </ul>
        </nav>
        
        <main class="principal">
            <div class="conteudomail">
                <div class="carta">
                    <h3 class="mail">Fale Conosco - www.oxorep.com.br</h3><br>
                
                <?php
                if (isset($_POST['email']) && !empty($_POST['email'])){
                    $dia = date("d");
                    $mes = date("m");
                    $ano = date("Y");
                    $meses = array("Janeiro","fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
                    $hora = date("H");
                    $minuto = date("i");
                    $segundo = date("s");
                    $nome = addslashes($_POST['nome']);
                    $telefone = addslashes($_POST['telefone']);
                    $email = addslashes($_POST['email']);
                    $mensagem = addslashes($_POST['assunto']);
                    
                    $to = "contato@oxorep.com.br";
                    $subjet = "Contato Site Oxo";
                    $body = "<b>Data: </b>".$dia." de ".$meses[$mes-1]." de ".$ano."\r\n".$hora.":".$minuto.":".$segundo."\r\n<br>".
                            "<b>Nome: </b>".$nome."\r\n<br>".
                            "<b>Telefone: </b>".$telefone."\r\n<br>".
                            "<b>E-mail: </b>".$email."\r\n<br><br>".
                            "<b>Mensagem: </b>".$mensagem;
                    $header = "From:contato@oxorep.com.br"."\r\n"."Reply-to: ".$email."\e\n"."X=Mailer:PHP/".phpversion();
                    
                    echo "$body";
                    
                }
                ?>
                </div>
                <h2>
                    
                    <?php
                    if(mail($to,$subjet,$body,$header)){
                        ?>
                    <script>
                        alert("Fale conosco - www.oxorep.com.br \n E-mail enviado com sucesso! Obrigado pelo seu contato.");
                        //history.go(-1);
                    </script>
                                            
                        <?php
                        
                    }else{
                                                
                        ?>
                    
                    <script>
                        alert("Fale conosco - www.oxorep.com.br \n Ocorreu um erro!Tente enviar diretamente para o e-mail: contato@oxorep.com.br.");
                        history.go(-1);
                    </script>
                                            
                        <?php
                        
                    }
                    
                    ?>
                </h2>
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

