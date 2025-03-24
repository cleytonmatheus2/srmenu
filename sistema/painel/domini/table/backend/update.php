<?php 
require_once("../../../../conexao.php");

if(isset($_POST)){

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

	$id = @$data['id'];
    $table = @$data['table'];
    $column = @$data['column'];
    $val = @$data['data'];

    $query = $pdo->prepare("UPDATE $table SET $column = :val where id = '$id'");
    $query->bindValue(":val", "$val");	
    $query->execute();

	echo json_encode($val);

}










