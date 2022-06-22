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
  $erro_cnpj = isset($_GET['erro_cnpj']) ? $_GET['erro_cnpj'] : 0;
  $erro_telefone = isset($_GET['erro_telefone']) ? $_GET['erro_telefone'] : 0;
  $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Consulta</title>
        <link rel="stylesheet" href="../../../css/style.css"/>
        <link rel="stylesheet" href="../../../css/contato.css">
    </head>
    <body>
        
        <section id="logo_topo"></section>
        
        <div class="menu">
            <a href="../../../vendas/gerenciamento.php?num=<?php echo $n1?>" target="_self" class="btmenu">Voltar</a>
        </div>
        
        <hr id="hr">
        
        <h1 class="n">Novo Usuário</h1>
        
        <div class="containercol">
            <form method="POST" action="cad_vendedor.php?num=<?php echo $n1?>" >
                
                <div class="nc">
                    <label>CNPJ</label>
                    <input name="cnpj" type="text" placeholder="Somente números" maxlength="18"  autofocus required>
                        <?php
                        if($erro_cnpj){
                            echo '<font style="color:#ff0000">CNPJ já existe</font>';                            
                        }
                        ?>
                </div>
                <div class="nc">                                    
                    <label>TELEFONE</label>
                    <input name="telefone" type="tel" placeholder="xx xxxx-xxxx" maxlength="14" required  >
                        <?php 
                        if($erro_telefone){
                            echo '<font style="color:#ff0000">Telefone já existe</font>';
                         }
                         ?>
                </div>
                <div class="nc">                                    
                    <label>CELULAR</label>
                    <input name="celular" type="tel" placeholder="xx xxxxx-xxxx" maxlength="15" required>
                </div>
                <div class="nc">                                    
                    <label>CONTATO</label>
                    <input name="contato" type="text" placeholder="Seu Nome" maxlength="15" required>
                </div>
                <div class="nc">
                    <label>EMAIL</label>
                    <input name="comemail" type="email" placeholder="Seu E-mail" maxlength="50" required  >
                         <?php 
                         if($erro_email){
                            echo '<font style="color:#ff0000">Email já existe</font>';
                         }
                         ?>
                </div>
                <div class="nc">
                    <label>SENHA</label>
                    <input name="senha" type="password" placeholder="Senha" maxlength="50" required >
                </div>
                <div class="nc">
                    <label>ACESSO</label>
                    <input name="acesso" type="text" placeholder="Acesso" maxlength="50">
                </div>
                <div class="btnc">
                    <button type="submit" class="btmenu01">Salvar</button>
                    <a href="../../../vendas/gerenciamento.php?num=<?php echo $n1?>" target="_self"><button class="btmenu01">Cancelar</button></a>
                </div>
            </form>                            
        </div>
            
            
                
        
    </body>
</html>

