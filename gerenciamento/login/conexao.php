<?php
//off-line
$conexao = mysqli_connect('localhost', 'root', '') or die("Erro de conexão!");
$banco = mysqli_select_db($conexao, 'central') or die("Erro ao selecionar o banco de dados");


/*
 //ON LINE
$conexao = mysqli_connect('localhost:3306', 'oxorepco_leandro', 'senha15Mujub@') or die("Erro de conexão!");
$banco = mysqli_select_db($conexao, 'oxorepco_oxorep') or die("Erro ao selecionar o banco de dados");

*/   