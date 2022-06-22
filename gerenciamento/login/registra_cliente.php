<?php

require_once('../conect/db_cad.php');

$cnpj = addslashes(filter_input(INPUT_POST, 'cnpj'));
$rasoc = addslashes(filter_input(INPUT_POST, 'rasoc'));
$tel = addslashes(filter_input(INPUT_POST, 'telefone'));
$cel = addslashes(filter_input(INPUT_POST,'celular'));
$cont = addslashes(ucwords (filter_input(INPUT_POST, 'contato')));    
$email = addslashes(filter_input(INPUT_POST, 'email'));
$senha = addslashes(md5(filter_input(INPUT_POST, 'senha')));
$confsenha = addslashes(md5(filter_input(INPUT_POST, 'confirmasenha')));


$objDb = new db();
$link = $objDb->conecta_mysql();


$cnpj_existe = false;
$tel_existe = false;
$email_existe = false;
$senha_ok = false;

//verificar se a senha = conferesenha 

if((filter_input(INPUT_POST, 'senha')) !== (filter_input(INPUT_POST, 'confirmasenha'))){
    $senha_ok = true;
    
}
echo '<br><br>';

$sql1 = "select * from pessoa where cnpj = '$cnpj' ";

if($resultado_id = mysqli_query($link, $sql1)){
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['cnpj'])){
        $cnpj_existe =true;
        
    }
    
    }else{
        'Erro ao tentar localizar o registro de usuario';
    }
    echo '<br><br>';
    
    //Verificar se o telefone ja existe
    
    $sql2 = "select * from pessoa where telefone = '$tel' ";
    
    if($resultado_id = mysqli_query($link, $sql2)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if(isset($dados_usuario['telefone'])){
            $tel_existe =true;
            
        }
        
        }else{
            'Erro ao tentar localizar o registro de usuario';
            
        }
        echo '<br><br>';
        
        $sql3 = "select * from pessoa where email = '$email' ";
        
        if($resultado_id = mysqli_query($link, $sql3)){
            $dados_usuario = mysqli_fetch_array($resultado_id);
            if(isset($dados_usuario['email'])){
                $email_existe = true;
                
            }
            
            }else{
                'Erro ao tentar localizar o registro de usuario';
                
            }
            
            if($cnpj_existe || $tel_existe || $email_existe || $senha_ok ){
                
                $retorno_get = '';
                
                if ($cnpj_existe){
                    $retorno_get.= "erro_cnpj=1&";
                    
                }
                
                if ($tel_existe) {
                    $retorno_get.= "erro_telefone=1&";
                    
                }
                
                if ($email_existe) {
                    $retorno_get.= "erro_email=1&";
                    
                }
                
                if ($senha_ok) {
                    $retorno_get.= "erro_senha=1&";
                    
                }
                
                header('Location: cadastro_cliente.php?'.$retorno_get);
                
                die();
                
                }
                
                $sql = "INSERT INTO pessoa(cnpj, rasoc, telefone, celular, contato, email, senha, confirmasenha ) VALUES('$cnpj', '$rasoc', '$tel', '$cel', '$cont', '$email', '$senha', '$confsenha')";
                
                if(mysqli_query($link, $sql)){
                    header('Location: loginCliente.php');                    
                    echo 'Usuário cadastrado com sucesso!';
                    
                } else {
                    echo 'Erro ao cadastrar o usuário!';
                    
                }

        
 