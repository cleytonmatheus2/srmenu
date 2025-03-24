<?php 
require_once("../../../../conexao.php");

if(isset($_POST)){

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    for ($i=0; $i < count($data); $i++) { 

        $id = $data[$i]['id'];
        $order = $data[$i]['order'];

        $query4 = $pdo->prepare("UPDATE opcionais SET order_item = :order WHERE id = '$id' ");
        $query4->bindValue(":order", "$order");
        $query4->execute();

    }
   
   


}










