<?php 

$host="demo.chu2cg468910.us-east-1.rds.amazonaws.com";
$port=3306;
$socket="";
$user="admin";
$password="2192005p";
$dbname="alunoscadastro";

$conexao = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Could not connect to the database server' . mysqli_connect_error());
$dbname="modalidadesHorario";

$conexaoModalidades = new mysqli($host, $user, $password, $dbname, $port, $socket) or die ('Could not connect to the database server' . mysqli_connect_error());