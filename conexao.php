<?php
$hostname="localhost";
$bd="db_dexters";
$usuario="root";
$senha="root3258";

$mysqli = new mysqli($hostname, $usuario, $senha, $bd);

if($mysqli->connect_errno){
    echo "falha ao conectar ao banco";
    
}

?>