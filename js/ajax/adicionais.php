<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id'];
$acao = $_POST['acao'];
$checkbox = $_POST['chkbox']; 
$sessao = @$_SESSION['sessao_usuario'];

if($checkbox == "true"){
  $pdo->query("INSERT INTO temp SET sessao = '$sessao', tabela = 'adicionais', qtd_adicionada = '1', id_item = '$id', carrinho = '0', data = curDate()"); 
}else{
    $pdo->query("DELETE FROM temp WHERE id_item = '$id' and sessao = '$sessao' and tabela = 'adicionais' and carrinho = '0'"); 
}

echo 'Alterado com Sucesso';

 ?>