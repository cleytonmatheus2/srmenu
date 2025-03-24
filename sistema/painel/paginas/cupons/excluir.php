<?php 
require_once("../../../conexao.php");
$tabela = 'grupo_acessos';

$id = $_POST['id'];
$idArray = explode(',', $id);


for ($i=0; $i < count($idArray); $i++) { 
	$pdo->query("DELETE FROM cupons where id = '$idArray[$i]'");
}

echo 'Excluído com Sucesso';





?>