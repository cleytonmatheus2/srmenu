<?php 
@session_start();
require_once ("../../../verificar.php");
require_once("../../../../conexao.php");
date_default_timezone_set('America/Sao_Paulo');



if(isset($_POST)){

    $json = file_get_contents("php://input");
    $data = json_decode($json, true);

	$table = @$data['table'];


	//search
	$searchValue = '%'.@$data['search_value'].'%';
	$searchColumn = @$data['search_column'];

	
	
	$id = $data['id'];
	$columnsArray = $data['columns'];
	array_push($columnsArray, $id);

	$active = @$data['active'];
	if($active){
		array_push($columnsArray, $active);
	}

	$archive_img = @$data['archive_img'];
	if($archive_img){
		array_push($columnsArray, $archive_img);
	}


	$columnsSTR = implode(", ", $columnsArray);



	$data1 = $data['start'];
	$data2 = $data['end'];

	if ($data1 == null) {
		$data1 = '2022-09-15';
		$data2 = date('Y-m-d');
	}

	
	// ORDER BY
	$orderColumn = @$data['order_column'] ? $data['order_column'] : 'id';
	$orderState = @$data['order_state'] ? $data['order_state'] : 'ASC';


	// FILTER BY CATEGORY
	$filter_id = @$data['filter_id'];
	$filter_column = @$data['filter_column'];
	

	
	$pagina = @$data['pagina'] ? $data['pagina'] : 1;

	$qtd_result_pag = @$data['qtd_result_pag'] ? $data['qtd_result_pag'] : 15;


	// Calculo inicio vizualização
	$inicio = ($pagina * $qtd_result_pag) - $qtd_result_pag;


	$result = [];

	if($filter_id){
		$query = $pdo->query("SELECT $columnsSTR FROM $table WHERE  $filter_column = '$filter_id' AND $searchColumn LIKE '$searchValue' ORDER BY $orderColumn $orderState LIMIT $inicio, $qtd_result_pag");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
	}else{
		$query = $pdo->query("SELECT $columnsSTR FROM $table WHERE  $searchColumn LIKE '$searchValue' ORDER BY $orderColumn $orderState LIMIT $inicio, $qtd_result_pag");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
	}				

	array_push($result, $res);

	// QUANTIDADE DE PAGINAS 
	$result_page =	$pdo->query("SELECT $id AS num_result FROM $table");
	$row_pg = $result_page->fetchAll(PDO::FETCH_ASSOC);
	$totalList = count($row_pg);	

	array_push($result, $totalList);

	echo json_encode($result);

}










