<?php 
require_once("../../../conexao.php");
$tabela = 'opcionais';

$nomeAdicionalEdit = $_POST['nomeAdicionalEdit'];

$idAdicionalEdit = $_POST['idAdicionalEdit'];

$seletorProdutoEdit = $_POST['seletorProdutoEdit'];

$selectTipoEdit = $_POST['selectTipoEdit'];

$ativoEdit = @$_POST['ativoEdit'];
if($ativoEdit == ''){
  	$ativoEdit = 'Nao';
}else{
	$ativoEdit = 'Sim';
}


$escolhaObrigatorioEdit = $_POST['escolhaObrigatorioEdit'];
if($escolhaObrigatorioEdit == "Sim"){
	$quantMinEdit = $_POST['quantidadeMinEdit'];
}else{
	$quantMinEdit = 0;
}

$escolhaLimiteEdit = $_POST['escolhaLimiteEdit'];

if($escolhaLimiteEdit == "Sim"){
	$quantMaxEdit = $_POST['quantMaxEdit'];
}else{
	$quantMaxEdit = 0;
}


	$query3 = $pdo->prepare("UPDATE opcionais SET nome = :nomeAdicionalEdit, produto = :seletorProdutoEdit, tipo = :selectTipoEdit, ativo = :ativoEdit, qtd_minima = :quantMinEdit, qtd_maxima = :quantMaxEdit WHERE id = '$idAdicionalEdit'");
		
	$query3->bindValue(":nomeAdicionalEdit", "$nomeAdicionalEdit");

	$query3->bindValue(":seletorProdutoEdit", "$seletorProdutoEdit");
	$query3->bindValue(":selectTipoEdit", "$selectTipoEdit");
	$query3->bindValue(":ativoEdit", "$ativoEdit");
	$query3->bindValue(":quantMinEdit", "$quantMinEdit");
	$query3->bindValue(":quantMaxEdit", "$quantMaxEdit");
	$query3->execute();



echo 'Salvo com Sucesso';






 ?>