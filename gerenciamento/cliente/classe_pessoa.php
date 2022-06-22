<?php

Class Pessoa{
    
    private $pdo;
    
    //CONEXAO COM O BANCO DE DADOS
    public function __construct($dbname, $host, $user, $senha) {
        
        
        
        try{
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        } catch (PDOException $e){
            echo "Erro com o banco de dados: ".$e->getMessage();
            exit();
        
        } catch (Exception $e){
            echo "Erro generico: ".$e->getMessage();
            exit();
        }
    }
    
    //FUNÇÃO PARA BUSCAR DADOS E COLOCAR NA TELA NO CANTO DIREITO
    public function buscarDados(){
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY contato");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    //FUNÇÃO CADASTRAR PESSOA NO BANCO DE DADOS
    public function cadastrarPessoa($cnpj, $tele, $celu, $cont, $mail, $pass, $aces){
        //ANTES DE CADASTRAR VERIFICAR SE JÁ TEM O EMAIL
        $cmd = $this->pdo->prepare("SELECT id FROM pessoa WHERE comemail = :mail");
        $cmd->bindValue(":mail", $mail);
        $cmd->execute();
        if($cmd->rowCount() > 0){//email já existe
            return false;
        } else {//nao foi encontrado
            $cmd = $this->pdo->prepare("INSERT INTO pessoa (cnpj, telefone, celular, contato, comemail, senha, acesso) VALUES (:cnpj, :tele, :celu, :cont, :mail, :pass, :aces)");
            $cmd->bindValue(":cnpj",$cnpj);
            $cmd->bindValue(":tele",$tele);
            $cmd->bindValue(":celu",$celu);
            $cmd->bindValue(":cont",$cont);
            $cmd->bindValue(":mail",$mail);        
            $cmd->bindValue(":pass",$pass);
            $cmd->bindValue(":aces",$aces);
            $cmd->execute();
            return true;
        }
    }    
    
    //EXCLUIR REGISTRO    
    public function excluirPessoas($id) {
        $cmd = $this->pdo->prepare("DELETE FROM pessoa WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }
    
    //BUSCAR DADOS DE UMA PESSOA
    public function buscaDadosPessoa($id) {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    
    
        
    //ATUALIZAR DADOS NO BANCO DE DADOS
    public function atualizaDados($id, $cnpj, $tele, $celu, $cont, $mail, $pass, $aces) {
        $cmd = $this->pdo->prepare("UPDATE pessoa SET cnpj = :cnpj, telefone = :tele, celular = :celu, contato = :cont, comemail = :mail, senha = :pass, acesso = :aces, WHERE id = :id");
        $cmd->bindValue(":cnpj",$cnpj);
        $cmd->bindValue(":tele",$tele);
        $cmd->bindValue(":celu",$celu);
        $cmd->bindValue(":cont",$cont);
        $cmd->bindValue(":mail",$mail);        
        $cmd->bindValue(":pass",$pass);
        $cmd->bindValue(":aces",$aces);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        }
        
    }
