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
    
    require_once 'classe_pessoa.php';
    $p = new Pessoa("central","localhost","root","")
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro Pessoas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
        if(isset($_POST['cnpj'])){//CLICOU NO BOTAO CADASTRAR OU EDITAR
            //---------------------EDITAR-----------------------
            if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
                $id_upd = addslashes($_GET['id_up']);
                $cnpj = addslashes($_POST['cnpj']);
                $tele = addslashes($_POST['telefone']);
                $celu = addslashes($_POST['celular']);
                $cont = addslashes($_POST['contato']);
                $mail = addslashes($_POST['comemail']);
                $pass = md5(addslashes($_POST['senha']));
                $aces = addslashes($_POST['acesso']);
                if(!empty($cnpj) && !empty($tele) && !empty($mail)){
                //EDITAR
                $p->atualizaDados($id_upd, $cnpj, $tele, $celu, $cont, $mail, $pass, $aces);
                header("Location: home_gerec_cliente.php?num=$n1");
                } else {
                            ?>
                                <div class="aviso">
                                    <img src="aviso.png">
                                    <h4>&nbsp;&nbsp;Preencha todos os campos</h4>
                                </div>
                           
                            <?php
                }
                
            }
            //---------------------CADASTRAR--------------------
            else {
                $cnpj = addslashes($_POST['cnpj']);
                $rasoc = addslashes($_POST['rasoc']);
                $tele = addslashes($_POST['telefone']);
                $celu = addslashes($_POST['celular']);
                $cont = addslashes($_POST['contato']);
                $mail = addslashes($_POST['comemail']);
                $pass = md5(addslashes($_POST['senha']));
                $aces = addslashes($_POST['acesso']);
                if(!empty($cnpj) && !empty($tele) && !empty($come)){
                //cadastrar
                    if(!$p->cadastrarPessoa($cnpj, $rasoc, $tele, $celu, $cont, $mail, $pass, $aces)){
                        
                            ?>
                                <div class="aviso">
                                    <img src="aviso.png">
                                    <h4>&nbsp;&nbsp;E-mail já cadastrado!</h4>
                                </div>
                           
                            <?php
                    }
                        } else {
                            ?>
                                <div class="aviso">
                                    <img src="aviso.png">
                                    <h4>&nbsp;&nbsp;Preencha todos os campos</h4>
                                </div>
                           
                            <?php
                        }

                }
            
        }        
    ?>
    <?php
        if(isset($_GET['id_up'])){
            $id_update = addslashes($_GET['id_up']);
            $res = $p->buscaDadosPessoa($id_update);
        }
    ?>
    <section id="esquerda">
        <form method="POST">
            <h2>CADASTRAR PESSOAS</h2>
            <label for="nome">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" value="<?php if(isset($res)){echo $res['cnpj'];}?>">
            
            <label for="nome">Telefone</label>
            <input type="text" name="rasoc" id="rasoc" value="<?php if(isset($res)){echo $res['rasoc'];}?>">
            
            <label for="nome">Telefone</label>
            <input type="tel" name="telefone" id="tele" value="<?php if(isset($res)){echo $res['telefone'];}?>">
            
            <label for="tel">Celular</label>
            <input type="tel" name="celular" id="celu" value="<?php if(isset($res)){echo $res['celular'];}?>">
            
            <label for="mail">Contato</label>
            <input type="text" name="contato" id="cont" value="<?php if(isset($res)){echo $res['contato'];}?>">
            
            <label for="nome">E-mail</label>
            <input type="email" name="comemail" id="mail" value="<?php if(isset($res)){echo $res['comemail'];}?>">
            
            <label for="nome">Senha</label>
            <input type="password" name="senha" id="pass" value="<?php if(isset($res)){echo $res['senha'];}?>">
            
            <label for="nome">Nível de Acesso</label>
            <input type="text" name="acesso" id="aces" value="<?php if(isset($res)){echo $res['acesso'];}?>">
            
            <input type="submit" value="<?php if(isset($res)){echo "Atualizar";} else {
            echo "Cadastrar";}?>">
        </form>
    </section>
    <section id="direita">
        <table>
            <tr id="titulo">
                <td>CNPJ</td>
                <td>Razão Social</td>
                <td>TELEFONE</td>
                <td>CELULAR</td>
                <td>CONTATO</td>
                <td>E-MAIL</td>
                <td>SENHA</td>
                <td>ACESSO</td>
                <td colspan="2">DATA</td>
            </tr>
        <?php
            $dados = $p->buscarDados();
            if(count($dados) > 0){//tem pessoas no banco de dados
                for($i=0; $i < count($dados); $i++){
                    echo "<tr>";
                    foreach ($dados[$i] as $k => $v){
                        if($k != "id"){
                            echo "<td>".$v."</td>";                          
                        }                            
                    }
                    ?>
                        <td>
                            <a href="home_gerec_cliente.php?num=<?php echo $n1?>?id_up=<?php echo $dados[$i]['id']?>">Editar</a>
                            <a href="home_gerec_cliente.php?num=<?php echo $n1?>?id=<?php echo $dados[$i]['id']?>">Excluir</a>
                        </td>
                        <?php
                            echo "</tr>";                            
                }
            } else {// o banco está vazio
                ?>
                          
        </table>
                
                    <div class="aviso">
                        <h4>Ainda não há pessoas cadastradas!</h4>
                    </div>
                    
                <?php
            }
            ?>
                        
            
    </section>
</body>    
</html>

<?php
    if(isset($_GET['id'])){
        $id_pessoa = addslashes($_GET['id']);
        $p->excluirPessoas($id_pessoa);
        header("Location: home_gerec_cliente.php?num=$n1");
    }
