<?php 
require_once("../../../conexao.php");
$tabela = 'opcionais';


$id = @$_POST['idEdit'];




$copiarExistente = @$_POST['copiarExistente'];


// quando Inserir de Existentes estiver desativado
$idProdutos = $_POST['produtChecked'];

$nome_adicional = $_POST['nome_adicional'];
$tipo = $_POST['select_tipo'];

$qtd_max = $_POST['quantMax'];
$obrigatorio = $_POST['opcaolimiteqtd'];
$qtd_min = $_POST['quantMin'];



// quando Inserir de Existentes estiver ativado
$itemChecked = @$_POST['itemChecked'];


// item
$nome_item = $_POST['nome_item'];
$valor_item = $_POST['valor_item'];
$valor_item = str_replace(['R$', ' ', '.', ','], ['', '', '', '.'],  $valor_item);








//validar opcional
			
/*
$query = $pdo->query("SELECT * from opcionais where nome = '$nome_adicional'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Adicional já Cadastrado, escolha outro!!';
	exit();
}*/


if($id == ""){

		if($copiarExistente){

			for ($i=0; $i < count($itemChecked); $i++) { 
			
				$query = $pdo->prepare("INSERT INTO opcionais_itens SET nome = :nome_item, valor = :valor_item, opcional = :opcional, ativo = 'Sim'");
				$query->bindValue(":opcional", "$itemChecked[$i]");
				$query->bindValue(":nome_item", "$nome_item");
				$query->bindValue(":valor_item", "$valor_item");
				$query->execute();
			
			}

		}else{

			for ($i2=0; $i2 < count($idProdutos); $i2++){

			$query2 = $pdo->prepare("INSERT INTO opcionais SET produto = :prod_id, nome = :nome_adicional, obrigatorio = :obrigatorio, qtd_maxima = :qtd_maxima, qtd_minima = :qtd_minima, tipo = :tipo, ativo = 'Sim'");
			$query2->bindValue(":prod_id", "$idProdutos[$i2]");
			$query2->bindValue(":nome_adicional", "$nome_adicional");
			$query2->bindValue(":tipo", "$tipo");
			$query2->bindValue(":qtd_maxima", "$qtd_max");
			$query2->bindValue(":obrigatorio", "$obrigatorio");
			$query2->bindValue(":qtd_minima", "$qtd_min");
			$query2->execute();
			$id_opcional[$i2] = $pdo->lastInsertId();

			$query3 = $pdo->prepare("INSERT INTO opcionais_itens SET nome = :nome_item, valor = :valor_item, opcional = :id_opcional, ativo = 'Sim'");
			$query3->bindValue(":id_opcional", "$id_opcional[$i2]");
			$query3->bindValue(":nome_item", "$nome_item");
			$query3->bindValue(":valor_item", "$valor_item");
			$query3->execute();
	
			}

		}


}else{

			$query4 = $pdo->prepare("UPDATE opcionais SET produto = :prod_id, nome = :nome_adicional, obrigatorio = :obrigatorio, qtd_maxima = :qtd_maxima, qtd_minima = :qtd_minima, tipo = :tipo, ativo = 'Sim'");
			$query4->bindValue(":prod_id", "$prod_id");
			$query4->bindValue(":nome_adicional", "$nome_adicional");
			$query4->bindValue(":qtd_maxima", "$qtd_max");
			$query4->bindValue(":obrigatorio", "$obrigatorio");
			$query4->bindValue(":qtd_minima", "$qtd_min");
			$query4->bindValue(":tipo", "$tipo");
			$query4->execute();

}
    

// echo 'Salvo com Sucesso';


//echo 'SALVO!';




/*

			$query = $pdo->prepare("INSERT INTO opcionais SET produto = :prod_id, nome = :nome_adicional, obrigatorio = :obrigatorio, qtd_maxima = :qtd_maxima, qtd_minima = :qtd_minima, tipo = :tipo, ativo = 'Sim'");
			
			$query->bindValue(":prod_id", "$prod_id");
			$query->bindValue(":nome_adicional", "$nome_adicional");
			$query->bindValue(":qtd_maxima", "$qtd_max");
			$query->bindValue(":obrigatorio", "$obrigatorio");
			$query->bindValue(":qtd_minima", "$qtd_min");
			$query->bindValue(":tipo", "$tipo");
			$query->execute();
			$id_opcional = $pdo->lastInsertId();

			$query3 = $pdo->prepare("INSERT INTO opcionais_itens SET nome = :nome_item, valor = :valor_item, opcional = :id_opcional, ativo = 'Sim'");
			$query3->bindValue(":id_opcional", "$id_opcional");
			$query3->bindValue(":nome_item", "$nome_item");
			$query3->bindValue(":valor_item", "$valor_item");
			$query3->execute();

*/




 ?>