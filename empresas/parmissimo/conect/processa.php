<?php    
    include 'conect.php';
    
    //$dados = $_FILES['arquivo'];
    //var_dump([$dados]);
    
    
    if (!empty($_FILES['arquivo']['tmp_name'])) {
        $arquivo = new DOMDocument();
        $arquivo->load($_FILES['arquivo']['tmp_name']);
        //var_dump($arquivo);

        $linhas = $arquivo->getElementsByTagName("Row");
        //var_dump($linhas);


      $primeira_linha = true;

        foreach ($linhas as $linha) {
            if ($primeira_linha == false) {
                
             
          
                $tipo = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                echo "tipo: $tipo <br>";
                
                $cod = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                echo "cod: $cod <br>";

                $img = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                echo "img: $img <br>";

                $produto = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                echo "produto: $produto <br>";

                $codbar = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                echo "codbar: $codbar <br>";

                $unid = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                echo "unid: $unid <br>";

                $qtd = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                echo "qtd: $qtd <br>";

                $valor_unid = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                echo "valor_unid: $valor_unid <br>";
                
                $emb = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                echo "emb: $emb <br>";
                
                $val = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                echo "val: $val <br>";
                

                echo "<hr>";
                
                
                if(inserirDados($tipo, $cod, $img, $produto, $codbar, $unid, $qtd, $valor_unid, $emb, $val)){
                    
                    echo 'Não foi possivel atualizar o BD!<br>';                     
                }else{                    
                    echo 'BD atualizado com sucesso!<br>';
					
					
				}
                    
                    
                    
                    
        }
            
            $primeira_linha = false;

        }
        
        
  }
  