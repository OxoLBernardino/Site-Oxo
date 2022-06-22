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
    include "../inc/conexao.inc";
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
        <title>CADASTRO</title>
        <link rel="stylesheet" href="../css/estilo.css">
        
    </head>

    <body>
        <?php
            include "../inc/topo.inc";
        ?>
        <section class="caixa">            
            <form method="POST" action="../pagin/processa.php" enctype="multipart/form-data">
                <fieldset><legend><b>Cadastro de Clientes</b></legend>
                    
                <p><label>CNPJ</label>&nbsp;&nbsp;
                <input id="num" name="CNPJ" type="text" placeholder="Somente números" maxlength="14" required autofocus>&nbsp;&nbsp;

                <label>INSCRIÇÃO ESTADUAL</label>&nbsp;&nbsp;
                <input id="num"name="INS_EST" type="text" placeholder="Somente números" maxlength="12" required></p>

                <p><label>RAZÃO SOCIAL</label>&nbsp;&nbsp;
                <input id="rs" name="RAZAO_SOCIAL" type="text" placeholder="" maxlength="220" required>&nbsp;&nbsp;

                <label>NOME FANTASIA</label>&nbsp;&nbsp;
                <input id="nf" name="NOME_FANTASIA" type="text" placeholder="" maxlength="220" required></p>

                <p><label>ENDEREÇO</label>&nbsp;&nbsp;
                <input id="end" name="ENDERECO" type="text" placeholder="" maxlength="150" required>&nbsp;&nbsp;

                <label>NÚMERO</label>&nbsp;&nbsp;
                <input id="no" name="NUMERO" type="text" placeholder="" maxlength="5" required>&nbsp;&nbsp;

                <label>COMPLEMENTO</label>&nbsp;&nbsp;
                <input name="COMPLEMENTO" type="text" placeholder="(...andar, bloco,conjunto, ramal...)" maxlength="50" ></p>

                <p><label>CEP</label>&nbsp;&nbsp;
                <input id="cep" name="CEP" type="text" placeholder="Somente números" maxlength="8" required>&nbsp;&nbsp;

                <label>BAIRRO</label>&nbsp;&nbsp;
                <input id="ba" name="BAIRRO" type="text" placeholder="" maxlength="50" required>&nbsp;&nbsp;

                <label>CIDADE</label>&nbsp;&nbsp;
                <input id="cid" name="CIDADE" type="text" placeholder="" maxlength="50" required></p>

                <p><label>EXPEDIENTE</label>&nbsp;&nbsp;
                <input id="ex" name="RECEBIMENTO" type="text" placeholder="" maxlength="50" required>&nbsp;&nbsp;

                <label>TELEFONE</label>&nbsp;&nbsp;
                <input id="tel" name="TELEFONE" type="tel" placeholder="xx xxxx-xxxx" maxlength="10" required>&nbsp;&nbsp;

                <label>CELULAR</label>&nbsp;&nbsp;
                <input id="tel" name="CELULAR" type="tel" placeholder="xx xxxxx-xxxx" maxlength="11"></p>

                <p><label>EMAIL NFE</label>&nbsp;&nbsp;
                <input id="mail" name="NFEMAIL" type="email" placeholder="" maxlength="50"required>&nbsp;&nbsp;

                <label>EMAIL XML</label>&nbsp;&nbsp;
                <input id="mail" name="XMLEMAIL" type="email" placeholder="" maxlength="50" required></p>

                <p><label>EMAIL COMERCIAL</label>&nbsp;&nbsp;
                <input id="mail" name="COMEMAIL" type="email" placeholder="" maxlength="50" required>&nbsp;&nbsp;

                <label>CONTATO</label>&nbsp;&nbsp;
                <input id="cont" name="CONTATO" type="text" placeholder="Nome do contato"maxlength="50" required></p>
                
                <p><label>PRAZO DE PAGAMENTO</label>&nbsp;&nbsp;
                <input id="cont" name="PZPAGTO" type="text" placeholder="Prazo de pagamento"maxlength="50" required></p>
                </fieldset><br/>
            
                <button type="submit" class="btmenu">Salvar</button>
                <button class="btmenu">Cancelar</button></a>
                
            </form><br/><br/>
                
        </section>
        
        <?php
                include "../inc/foot.inc";
            ?>
    </body>
</html>
