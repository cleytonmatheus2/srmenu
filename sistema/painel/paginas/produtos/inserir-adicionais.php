<?php 
require_once("../../../conexao.php");
$tabela = 'adicionais';

$nome = $_POST['nome'];
$produto = $_POST['id'];
$valor = $_POST['valor'];
$qtd_max = $_POST['qtd_max'];
$valor = str_replace(',', '.', $valor);

//validar sigla
$query = $pdo->query("SELECT * from $tabela where nome = '$nome' and produto = '$produto'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Adicional já Cadastrado, escolha outro!!';
	exit();
}


$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, qtd_max = :qtd_max, valor = :valor, produto = '$produto', ativo = 'Sim'");


$query->bindValue(":nome", "$nome");
$query->bindValue(":valor", "$valor");
$query->bindValue(":qtd_max", "$qtd_max");
$query->execute();

echo 'Salvo com Sucesso';