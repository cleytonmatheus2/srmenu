<?php
@session_start();
require_once("../../../conexao.php");
date_default_timezone_set('America/Sao_Paulo');



if (isset($_POST)) {

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

    $table = @$data['teste'];

    $result = [];

    $query = $pdo->query("SELECT * FROM categorias");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);




    array_push($result, $res);

    echo json_encode($result);


}














