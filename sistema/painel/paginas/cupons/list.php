<?php 
require_once("../../../conexao.php");
date_default_timezone_set('America/Sao_Paulo');

$tabela = 'cupons';

$txtbuscar = '%'.@$_POST['txtbuscar'].'%';

/*
$pagina = @$_POST['pagina'];
if($pagina == ''){
	$pagina = 1;
}


$qtd_result_pag = @$_POST['qtd_result_pag'];
if ($qtd_result_pag == ''){
	$qtd_result_pag = 10;
}
// Calculo inicio vizualização
$inicio = ($pagina * $qtd_result_pag) - $qtd_result_pag;

*/

if(isset($_POST)){

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

	$id = @$data['id'];

	$columns = implode(", ", $data['columns']);
	$columnsSTR = $id ? $id.','.$columns : $columns;

	$data1 = $data['start'];
	$data2 = $data['end'];

	if ($data1 == null) {
		$data1 = '2022-09-15';
		$data2 = date('Y-m-d');
	}

	$pagina = $data['pagina'];
	if($pagina == ''){
		$pagina = 1;
	}
	
	$qtd_result_pag = $data['qtd_result_pag'];
	if ($qtd_result_pag == ''){
		$qtd_result_pag = 10;
	}
	// Calculo inicio vizualização
	$inicio = ($pagina * $qtd_result_pag) - $qtd_result_pag;

	$result = [];
	$query = $pdo->query("SELECT $columnsSTR FROM $tabela WHERE codigo LIKE '$txtbuscar' AND dataexp BETWEEN '$data1' AND '$data2' ORDER BY id LIMIT $inicio, $qtd_result_pag");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);

	array_push($result, $res);

	// QUANTIDADE DE PAGINAS 
	$result_page =	$pdo->query("SELECT id AS num_result FROM cupons ");
	$row_pg = $result_page->fetchAll(PDO::FETCH_ASSOC);
	$totalList = count($row_pg);	

	array_push($result, $totalList);


	echo json_encode($result);

}










