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



 function inserirDados($tipo, $cod, $img, $prod, $ean, $peso, $val, $qtd_uni, $qtd_ped, $ncm, $cest, $icms, $iva, $vl_uni, $vl_uni_st, $vl_disp, $vl_disp_st, $vl_min, $vl_min_st){
     $banco = new mysqli(HOST, USER, PASS, BD);
     $sql = "INSERT INTO yor(tipo, cod, img, prod, ean, peso, val, qtd_uni, qtd_ped, ncm, cest, icms, iva, vl_uni, vl_uni_st, vl_disp, vl_disp_st, vl_min, vl_min_st) "
        . "VALUES('{$tipo}','{$cod}','{$img}','{$prod}','{$ean}','{$peso}','{$val}','{$qtd_uni}','{$qtd_ped}','{$ncm}','{$cest}','{$icms}','{$iva}','{$vl_uni}','{$vl_uni_st}','{$vl_disp}','{$vl_disp_st}','{$vl_min}','{$vl_min_st}')";
     $banco->query($sql);
        
     $banco->close();
    
}
