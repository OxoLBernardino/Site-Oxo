<?php

session_start();

if(isset($_SESSION["numlogin"])){
    $n1=filter_input(INPUT_GET,'num');
    $n2=$_SESSION["numlogin"];
    
    if($n1!=$n2){
        echo "<p id='lgErro'>Login não autorizado</p>";
        exit();        
    }    
    }    
    else {
        echo "<p id='lgErro'>E AEH ESPERTALHÃO??? LOGA DIREITO!!! Login não autorizado</p>";
        exit();        
    }    
    require_once('../gerenciamento/conect/db_cad.php');
    
    
    $objDb = new db();
    $link = $objDb->conecta_mysql();
  

    $id = filter_input(INPUT_GET,'ref');
    $preco = filter_input(INPUT_GET,'preco');
    $valor = filter_input(INPUT_POST,'valor');
    $qtd = filter_input(INPUT_GET,'qtd');


    $consulta = $pdo->prepare("SELECT * FROM carrinho_temporario WHERE id_temp = :id");
    $consulta->bindValue(':id', $id);
    $consulta->execute();

    $valorf = $preco * $qtd;

    if ($qtd <= 0):
        $deletar = $pdo->prepare("DELETE FROM carrinho_temporario WHERE id_temp = :id");
        $deletar->bindValue(':id', $id);
        $deletar->execute();

        if ($deletar):
            echo '<script>alert("Este produto foi deletado com sucesso!")</script>';
            echo '<script>window.location="carrinho.php?num='.$n1.'"</script>';
        else:
            echo '<script>alert("Esse produto não pode ser deletado!")</script>';
            echo '<script>window.location="carrinho.php?num='.$n1.'"</script>';
        endif;

        else:
            $altera = $pdo->prepare("UPDATE carrinho_temporario SET qtd_temp = :val, valor_temp = :preco, valor_temp = :valor WHERE id_temp = :tp");
            $altera->bindValue(':val', $qtd);
            $altera->bindValue(':preco', $preco);
            $altera->bindValue(':valor', $valorf);
            $altera->bindValue(':tp', $id);
            $altera->execute();
            
            if ($altera):
            echo '<script>alert("Item alterado com sucesso!")</script>';
	        echo '<script>window.location="carrinho.php?num='.$n1.'"</script>';
	    else:
            echo '<script>alert("Este produto não pode ser alterado!")</script>';
            echo '<script>window.location="carrinho.php?num='.$n1.'"</script>';
endif;
    endif;