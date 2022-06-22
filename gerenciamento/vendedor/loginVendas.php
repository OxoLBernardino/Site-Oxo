<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
$conn=mysqli_connect("localhost", "root", "", "central");

?>


      
            <section id="">                
                <?php
                                        
                    if(isset($_POST['btnlog'])){
                        $user=filter_input(INPUT_POST,'fnome');
                        $senha= md5(filter_input(INPUT_POST,'fsenha'));
                        
                        $sql="SELECT * FROM vendedor WHERE comemail='$user' AND senha='$senha'";
                        $res=mysqli_query($conn,$sql);
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
                            $_SESSION['comemail']=$user;
                            $_SESSION['acesso']=$ret['acesso'];//0=Restrito / 1=Total
                            header("Location: /gerenciamento.php?num=$num");
                        } 
                    }
                    
                    mysqli_close($conn);
                ?>
                <form action="login_cliente.php?dir=manager/gerenciamento/clientes&file=loginCliente" name="flog" method="POST" id="">
                    <fieldset class="cad">
                    <label>Usúario</label>
                    <input id="camp" type="text" name="fnome" placeholder="Digite seu CNPJ"></br>
                    <label>Senha</label>&nbsp;&nbsp;&nbsp;
                    <input  id="camp" type="password" name="fsenha" placeholder="Digite sua senha"></br>
                    <?php
              if($erro == 1){
                  echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
              }
              ?>            
              <p><h5>Ainda não é cadastrado?</h5></p>
              
                    <p><a href="login_cliente.php?dir=manager/gerenciamento/clientes&file=cadastro_cliente">Cadastre-se aqui</a><p>
                    </fieldset>
                    <div id="log">
                        
                    <input type="submit" class="btmenu" value="Login" name="btnlog">
                    </div>                    
                </form>
            </section>