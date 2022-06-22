<?php

    include_once ("../../inc/conexao.inc");



    $dados = $_FILES['arquivo'];
    //var_dump($dados);

    if (!empty($_FILES['arquivo'] ['tmp_name'])) {
        $arquivo = new DOMDocument();
        $arquivo->load($_FILES['arquivo'] ['tmp_name']);
        //var_dump($arquivo);

        $linhas = $arquivo->getElementsByTagName("Row");
        //var_dump($linhas);


        $primeira_linha = true;

        foreach ($linhas as $linha) {
            if ($primeira_linha == false) {
          
                $ide = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                echo "id_empresas: $ide <br>";
                echo "<hr>";

                //Inserir o usuario no BD

                $sql="INSERT INTO id_empresas (id_empresas, created) VALUES ('$ide', NOW())";
                mysqli_query($conect, $sql);
                    $linhas= mysqli_affected_rows($conect);
                    if($linhas >= 1){
                        echo "<p id='lgErro'>Produto cadastrado com sucesso!</p>";
                    } else {
                        echo "<p id='lgErro'>Erro ao cadastrar novo produto!</p>";
                    }
            }
            $primeira_linha = false;

        }

    }
