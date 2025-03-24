<?php 
require_once("../../../conexao.php");
$tabela = 'cupons';

// Ids dos itens da lista de Checkbox
$idItens = @$_POST['itemChecked'];

// Verifica se é modal edit
$formEdit = @$_POST['formEdit'];

// - Inputs Modal - //
$codCupom = $_POST['codCupom'];
$codConstante = $_POST['valorConstante'];

$quantCupom = $_POST['quantCupom'];
$dataExCupom = $_POST['dataExCupom'];
$descPorc = @$_POST['descPorc'];
if(!$descPorc){
	$descPorc = NULL;
}

$Real = @$_POST['descReal'];
if(!$Real){
	$descReal = NULL;
}else {
	$descReal = str_replace(',', '.', $Real);
}

$condicao = @$_POST['condicao'];
$valorCompra = @$_POST['valor_compraCliente'];
$quantCompras = @$_POST['quantCompras'];



// verifica se o valor é false
if(!$formEdit){

	// Validar Codigo
	$query = $pdo->query("SELECT * from $tabela where codigo = '$codCupom'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	if(@count($res) > 0){
		echo 'Código já cadastrado, escolha outro!';
		exit();
	}

		if ($idItens) {

			for ($i=0; $i < count($idItens); $i++){ 

				$query = $pdo->prepare("INSERT INTO $tabela SET produto = :id, codigo = :codigo, quant = :quant, dataexp = :dataex, desc_porc = :descPorc, desc_real = :descReal, condicao = :condicao, valor_total_compra = :valorCompra, fidelidade_compras = :quantCompras");
				$query->bindValue(":id", $idItens[$i]);
				$query->bindValue(":codigo", $codCupom);
				$query->bindValue(":quant", $quantCupom);
				$query->bindValue(":dataex", $dataExCupom);
				$query->bindValue(":descPorc", $descPorc);
				$query->bindValue(":descReal", $descReal);
				$query->bindValue(":condicao", $condicao);
				$query->bindValue(":valorCompra", $valorCompra);
				$query->bindValue(":quantCompras", $quantCompras);
				$query->execute();

				echo 'salvo';

			}

		}else{
			echo 'Escolha no minimo 1 produto';
		}

}else{

		for ($i=0; $i < count($idItens); $i++){ 

			$query2 = $pdo->prepare("UPDATE $tabela SET produto = :produto, codigo = :codigo, quant = :quant, dataexp = :dataexp, desc_porc = :descPorc, desc_real = :descReal, condicao = :condicao, valor_total_compra = :valorCompra, fidelidade_compras = :quantCompras WHERE codigo = '$codConstante' AND produto = '$idItens[$i]'");
			$query2->bindValue(":produto", $idItens[$i]);
		    $query2->bindValue(":codigo", $codCupom);
			$query2->bindValue(":quant", $quantCupom);
			$query2->bindValue(":dataexp", $dataExCupom);
			$query2->bindValue(":descPorc", $descPorc);
			$query2->bindValue(":descReal", $descReal);
			$query2->bindValue(":condicao", $condicao);
			$query2->bindValue(":valorCompra", $valorCompra);
			$query2->bindValue(":quantCompras", $quantCompras);
			$query2->execute();

		}
		
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$query1 = $pdo->query("SELECT * from $tabela where codigo = '$codConstante'");
		$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
		$quantCupons = count($res1);

		$typ = [];
		foreach ($res1 as $key => $produtos) {
			$typ[] = $produtos['produto'];
		}


		// Adicionando novos itens selecionados
		$itensAdicionados = array_values(array_diff($idItens, $typ));

		if($itensAdicionados){

			for ($i1=0; $i1 < count($itensAdicionados); $i1++){ 
				$query3 = $pdo->prepare("INSERT INTO $tabela SET produto = :produto, codigo = :codigo, quant = :quant, dataexp = :dataexp, desc_porc = :descPorc, desc_real = :descReal, condicao = :condicao, valor_total_compra = :valorCompra, fidelidade_compras = :quantCompras");
				$query3->bindValue(":produto", $itensAdicionados[$i1]);
				$query3->bindValue(":codigo", $codCupom);
				$query3->bindValue(":quant", $quantCupom);
				$query3->bindValue(":dataexp", $dataExCupom);
				$query3->bindValue(":descPorc", $descPorc);
				$query3->bindValue(":descReal", $descReal);
				$query3->bindValue(":condicao", $condicao);
				$query3->bindValue(":valorCompra", $valorCompra);
				$query3->bindValue(":quantCompras", $quantCompras);
				$query3->execute();
			}

			echo "Adicionados: ";
			print_r($itensAdicionados);

		}


		// Removendo itens desselecionados 

		$itensRemovidos = array_values(array_diff($typ, $idItens));

		if($itensRemovidos){
			for ($i2=0; $i2 < count($itensRemovidos); $i2++){
				$pdo->query("DELETE from $tabela where produto = '$itensRemovidos[$i2]' AND codigo = '$codCupom'");
			}

			echo "Removidos: ";
			print_r($itensRemovidos);

		}

		






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			

		

		





		/*echo 'XXX: '.$xxx;

		echo 'Quant adicionada: '.count($idItens);

		echo 'Quant Banco: '. $quantCupons;

		echo 'Total: '. $quantAdicionar;*/


		//echo $xxx++;*/

		//print_r($idItens);
}

 ?>