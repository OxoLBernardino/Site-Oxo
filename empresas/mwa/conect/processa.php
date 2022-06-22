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
          
                $cod = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
                echo "codigo: $cod <br>";

                $tp = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
                echo "tipo: $tp <br>";

                $img = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
                echo "imagem: $img <br>";

                $ean = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                echo "ean: $ean <br>";

                $nome = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                echo "nome: $nome <br>";

                $ps = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                echo "peso: $ps <br>";

                $qtd = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                echo "qtd: $qtd <br>";
                
                $val = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                echo "val: $val <br>";
                
                $ncm = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                echo "ncm: $ncm <br>";
                
                $cest = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                echo "cest: $cest <br>";
                
                $trib = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                echo "trib: $trib <br>";
                
                $icms = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
                echo "icms: $icms <br>";
                
                $rems = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
                echo "red_icms: $rems <br>";
                
                $iva = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
                echo "iva: $iva <br>";
                
                $pis = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
                echo "pis: $pis <br>";
                
                $cofs = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
                echo "cofins: $cofs <br>";
                
                $vaun = $linha->getElementsByTagName("Data")->item(16)->nodeValue;
                echo "valor_unit: $vaun <br>";
                
                $vast = $linha->getElementsByTagName("Data")->item(17)->nodeValue;
                echo "valorunit_st: $vast <br>";
                
                $vafd = $linha->getElementsByTagName("Data")->item(18)->nodeValue;
                echo "valor_fd: $vafd <br>";
                
                $fdst = $linha->getElementsByTagName("Data")->item(19)->nodeValue;
                echo "valorfd_st: $fdst <br>";
                
                $latr = $linha->getElementsByTagName("Data")->item(20)->nodeValue;
                echo "lastro: $latr <br>";
                
                $cmd = $linha->getElementsByTagName("Data")->item(21)->nodeValue;
                echo "camada: $cmd <br>";
                
                $qtpl = $linha->getElementsByTagName("Data")->item(22)->nodeValue;
                echo "qtd_pallet: $qtpl <br>";

                echo "<hr>";
                
                
                if(inserirDados($cod, $tp, $img, $ean, $nome, $ps, $qtd, $val, $ncm, $cest, $trib, $icms, $rems, $iva, $pis, $cofs, $vaun, $vast, $vafd, $fdst, $latr, $cmd, $qtpl)){
                    
                    echo 'Não foi possivel atualizar o BD!<br>';                     
                }else{                    
                    echo 'BD atualizado com sucesso!<br>';
					
					
				}
                    
                    
                    
                    
        }
            
            $primeira_linha = false;

        }
        
        
  }
  