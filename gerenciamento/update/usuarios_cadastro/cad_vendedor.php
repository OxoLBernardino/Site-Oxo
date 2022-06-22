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
require_once('../../../db_cad.php');
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();
    
    $cnpj = $_POST['cnpj'];
    $tel = $_POST['telefone'];
    $cel = $_POST['celular'];
    $cont = $_POST['contato'];
    $mail = $_POST['comemail'];
    $pass = md5($_POST['senha']);
    $acesso = $_POST['acesso'];
    
    
    
    $cnpj_existe = false;
    $tel_existe = false;
    $email_existe = false;
    
    
    
    //Verificar se o cnpj ja existe
    $sql1 = "select * from vendedor where cnpj = '$cnpj' ";
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
    $sql2 = "select * from vendedor where telefone = '$tel' ";
    if($resultado_id = mysqli_query($link, $sql2)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        
        if(isset($dados_usuario['telefone'])){
            $tel_existe =true;            
        }
    }else{
        'Erro ao tentar localizar o registro de usuario';
    }
    echo '<br><br>';
    
    //verificar se o email ja existe
    
    $sql3 = "select * from vendedor where comemail = '$mail' ";
    if($resultado_id = mysqli_query($link, $sql3)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        
        if(isset($dados_usuario['comemail'])){
           $email_existe = true;
           
        }
    }else{
        'Erro ao tentar localizar o registro de usuario';
    }
    
    if($cnpj_existe || $tel_existe || $email_existe ){
        
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
    
    header('Location: novo_colaborador.php?'.$retorno_get);
    die();
}

    $sql = "INSERT INTO vendedor(cnpj, telefone, celular, comemail, contato, senha, acesso) VALUES('$cnpj', '$tel', '$cel', '$mail', '$cont', '$pass', '$acesso' )";
    
    //executar a query
    
    if(mysqli_query($link, $sql)){
        header("Location: novo_colaborador.php?num=$n1");
        echo 'Usuário cadastrado com sucesso!';
    } else {
        header("Location: novo_colaborador.php?num=$n1");
        echo 'Erro ao cadastrar o usuário!';
}


    
    
    
    