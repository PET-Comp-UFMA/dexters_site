<?php
$hostname="localhost";
$bd="bd_dexters";
$usuario="root";
$senha="";

$mysqli = new mysqli($hostname, $usuario, $senha, $bd);

if($mysqli->connect_errno){
    echo "falha ao conectar ao banco";
}

?>