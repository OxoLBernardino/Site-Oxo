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


$pdo = new PDO("mysql: host=localhost; dbname=central","root","");