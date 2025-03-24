<?php
@session_start();
require_once("../../../conexao.php");
date_default_timezone_set('America/Sao_Paulo');



if (isset($_POST)) {

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    $id = @$data['category'];

    $result = [];

    $query = $pdo->query("SELECT * FROM opcionais WHERE produto = '$id' ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);

    if ($total_reg==0) {
        $result = null;
    }

    for ($i=0; $i < $total_reg; $i++) { 

        $idOpc = $res[$i]["id"];

        
        $queryOpc = $pdo->query("SELECT * FROM opcionais_itens WHERE opcional = '$idOpc' ");
        $resOpc = $queryOpc->fetchAll(PDO::FETCH_ASSOC);
        $total_regOpc = @count($resOpc);

        $res[$i]['itens'] =  $resOpc;
        

        array_push($result,  $res[$i]);


        
    }


    echo json_encode($result);


}














