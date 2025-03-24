<?php 
require_once("../../../../conexao.php");

if(isset($_POST)){

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

	$id = $data['id'];

    try {
        $query = $pdo->query("DELETE FROM opcionais WHERE id = '$id' ");
    } catch (\Throwable $err) {
       echo $err;
    }

}










