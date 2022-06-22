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

                $prod = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
                echo "prod: $prod <br>";

                $ean = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
                echo "ean: $ean <br>";

                $peso = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
                echo "peso: $peso <br>";

                $val = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
                echo "val: $val <br>";
                
                $qtd_uni = $linha->getElementsByTagName("Data")->item(7)->nodeValue;
                echo "qtd_uni: $qtd_uni <br>";
                
                $qtd_ped = $linha->getElementsByTagName("Data")->item(8)->nodeValue;
                echo "qtd_ped: $qtd_ped <br>";
                
                $ncm = $linha->getElementsByTagName("Data")->item(9)->nodeValue;
                echo "ncm: $ncm <br>";
                
                $cest = $linha->getElementsByTagName("Data")->item(10)->nodeValue;
                echo "cest: $cest <br>";
                
                $icms = $linha->getElementsByTagName("Data")->item(11)->nodeValue;
                echo "icms: $icms <br>";
                
                $iva = $linha->getElementsByTagName("Data")->item(12)->nodeValue;
                echo "iva: $iva <br>";
                
                $vl_uni = $linha->getElementsByTagName("Data")->item(13)->nodeValue;
                echo "vl_uni: $vl_uni <br>";
                
                $vl_uni_st = $linha->getElementsByTagName("Data")->item(14)->nodeValue;
                echo "vl_uni_st: $vl_uni_st <br>";
                
                $vl_disp = $linha->getElementsByTagName("Data")->item(15)->nodeValue;
                echo "vl_disp: $vl_disp <br>";
                
                $vl_disp_st = $linha->getElementsByTagName("Data")->item(16)->nodeValue;
                echo "vl_disp_st: $vl_disp_st <br>";
                
                $vl_min = $linha->getElementsByTagName("Data")->item(17)->nodeValue;
                echo "vl_min: $vl_min <br>";
                
                $vl_min_st = $linha->getElementsByTagName("Data")->item(18)->nodeValue;
                echo "vl_min_st: $vl_min_st <br>";
                

                echo "<hr>";
                
                
                if(inserirDados($tipo, $cod, $img, $prod, $ean, $peso, $val, $qtd_uni, $qtd_ped, $ncm, $cest, $icms, $iva, $vl_uni, $vl_uni_st, $vl_disp, $vl_disp_st, $vl_min, $vl_min_st)){
                    
                    echo 'Não foi possivel atualizar o BD!<br>';                     
                }else{                    
                    echo 'BD atualizado com sucesso!<br>';
					
					
				}
                    
                    
                    
                    
        }
            
            $primeira_linha = false;

        }
        
        
  }
  