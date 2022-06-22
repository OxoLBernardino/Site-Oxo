<?php

class db {
   
    
    //host
    private $host = 'localhost';
    //usuario
    private $usuario = 'root';
    //senha
    private $senha = '';
    //banco de dados
    private $database = 'central';
    
    //ON LINE
   
    /*
    //host
    private $host = 'localhost:3306';
    //usuario
    private $usuario = 'oxorepco_leandro';
    //senha
    private $senha = 'senha15Mujub@';
    //banco de dados
    private $database = 'oxorepco_oxorep';
   
    */
    
    public function conecta_mysql() {
        
        //criar conexão
        //mysqli_connect(localização do bd, usuario de acesso, senha, banco de dados)
        $conn = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
        mysqli_set_charset($conn, 'utf8');
        
        //verificar se houve erro de conexao
        
        if(mysqli_connect_errno()){
            echo 'Erro ao tentar conectar com o BD MySQL: '. mysqli_connect_error();
        }
        return $conn;
    }
}

/*
//off-line

define("HOST", 'localhost');
define("USER", 'root');
define("PASS", '');
define("BD", 'central');
/*
//on-line
*/
define("HOST", 'localhost:3306');
define("USER", 'oxorepco_leandro');
define("PASS", 'senha15Mujub@');
define("BD", 'oxorepco_oxorep');



 function inserirDados($cod, $tp, $img, $ean, $nome, $ps, $qtd, $val, $ncm, $cest, $trib, $icms, $rems, $iva, $pis, $cofs, $vaun, $vast, $vafd, $fdst, $latr, $cmd, $qtpl){
     $banco = new mysqli(HOST, USER, PASS, BD);
     $sql = "INSERT INTO bd_loja(codigo, tipo, imagem, ean, nome, peso, qtd, val, ncm, cest, trib, icms, red_icms, iva, pis, cofins, valor_unit, valorunit_st, valor_fd, valorfd_st, lastro, camada, qtd_pallet ) "
        . "VALUES('{$cod}','{$tp}','{$img}','{$ean}','{$nome}','{$ps}','{$qtd}','{$val}','{$ncm}','{$cest}','{$trib}','{$icms}','{$rems}','{$iva}','{$pis}','{$cofs}','{$vaun}','{$vast}','{$vafd}','{$fdst}','{$latr}','{$cmd}','{$qtpl}' )";
     $banco->query($sql);
        
     $banco->close();
    
}
