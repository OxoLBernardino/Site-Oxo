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
        <title>Gerenciamento</title>
        <link rel="stylesheet" href="../css/estilo.css"/>
    </head>
    <body>
        <header id="topo">
            <?php
                include "../inc/topo.inc";
            ?>
        </header>
        <hr id="hr">
        <section id="main">
            
            <a href="../pagin/gerenciamento.php?num=<?php echo $n1; ?>" target="_self" class="btmenu">Voltar</a>
            <h1 class="n">Editar Usuário</h1>
            
            <form name="edtcolaborador" action="editar_colaborador.php" class="fcolaborador" method="GET">
                <input type="hidden" name="num" value="<?php echo $n1 ?>">
                <label>Selecione o colaborador</label></br>
                <select name="fcolaborador" size="10">       
                    <?php
                        $sql="SELECT * FROM cadusuario";
                        $col=mysqli_query($conect, $sql);
                        //$totalcol= mysqli_num_rows($col);
                        while ($exibe= mysqli_fetch_array($col)){
                            echo "<option value='".$exibe['id']."'>".$exibe['nome']."</option>";
                        }
                    ?>
                </select></br>
                
                <p><input type="submit" name="edtcolab" class="btmenu" value="Editar">
                    <img src="../drowable/logo.png" id="logom"/></p>
            </form>
            
            <?php
                if(isset($_GET["fcolaborador"])){
                    $vid=$_GET["fcolaborador"];
                    $sql="SELECT * FROM cadusuario WHERE id=$vid";
                    $col=mysqli_query($conect, $sql);
                    $exibe= mysqli_fetch_array($col);
                    if($exibe >= 1){
                        echo"
                            <form name='edtcolaborador' action='editar_colaborador.php' class='fcolaborador' method='GET'>
                            <input type='hidden' name='num' value=$n1>
                            <input type='hidden' name='id' value='".$exibe['id']."'>
                            <label>Nome</label></br>
                            <input type='text' name='fnome' maxlength='40' size='40' required='required' value='".$exibe['nome']."'></br>
                            <label>Usuário</label></br>
                            <input type='text' name='fuser' maxlength='20' size='20' required='required' value='".$exibe['usuario']."'></br>
                            <label>Senha</label></br>
                            <input type='text' name='fsenha' maxlength='20' size='20' required='required' value='".$exibe['senha']."'></br>
                            <label>Acesso</label></br>
                            <input type='text' name='facesso' maxlength='11' size='11' required='required' value='".$exibe['acesso']."' pattern='[0-1]+$' placeholder='0 ou 1' title='0 ou 1'></br>
                            <input type='submit' name='edtgvcolab' class='btmenu' value='Gravar'>
                        ";                        
                    }
                }
                        
                
                if(isset($_GET["edtgvcolab"])){
                    $id=filter_input(INPUT_GET,'id');
                    $vnome=filter_input(INPUT_GET,'fnome');
                    $vuser=filter_input(INPUT_GET,'fuser');
                    $vsenha=filter_input(INPUT_GET,'fsenha');
                    $vacesso=filter_input(INPUT_GET,'facesso');
                                        
                    $sql="UPDATE cadusuario SET nome='$vnome',usuario='$vuser',senha='$vsenha',acesso='$vacesso', modified=NOW() WHERE id='$id'";
                    $res=mysqli_query($conect, $sql);
                    $linhas= mysqli_affected_rows($conect);
                    if($linhas >= 1){
                        echo "<p id='lgErro'>Usuário atualizado com sucesso!</p>";
                        
                    }else{
                        echo "<p id='lgErro'>Erro ao atualizar usuário!</p>";                        
                    }            
                }
            
            ?>
            
            
        </section>
        
    </body>
</html>

