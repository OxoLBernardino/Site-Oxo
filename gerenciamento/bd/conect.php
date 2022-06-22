<?php
   

//off-line

define("HOST", 'localhost');
define("USER", 'root');
define("PASS", '');
define("BD", 'central');
/*
//on-line

define("HOST", 'localhost:3306');
define("USER", 'oxorepco_leandro');
define("PASS", 'senha15Mujub@');
define("BD", 'oxorepco_oxorep');

*/


 function inserirDados($cod, $tp, $img, $ean, $nome, $ps, $qtd, $val, $ncm, $cest, $trib, $icms, $rems, $iva, $pis, $cofs, $vaun, $vast, $vafd, $fdst, $latr, $cmd, $qtpl){
     $banco = new mysqli(HOST, USER, PASS, BD);
     $sql = "INSERT INTO bd_loja(codigo, tipo, imagem, ean, nome, peso, qtd, val, ncm, cest, trib, icms, red_icms, iva, pis, cofins, valor_unit, valorunit_st, valor_fd, valorfd_st, lastro, camada, qtd_pallet ) "
        . "VALUES('{$cod}','{$tp}','{$img}','{$ean}','{$nome}','{$ps}','{$qtd}','{$val}','{$ncm}','{$cest}','{$trib}','{$icms}','{$rems}','{$iva}','{$pis}','{$cofs}','{$vaun}','{$vast}','{$vafd}','{$fdst}','{$latr}','{$cmd}','{$qtpl}' )";
     $banco->query($sql);
        
     $banco->close();
    
}
