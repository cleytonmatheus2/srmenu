<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id_opc = $_POST['id_opc'];
$id = $_POST['id_Item'];
$acao = $_POST['acao'];
$checkbox = $_POST['chkbox']; 
$sessao = @$_SESSION['sessao_usuario'];

if($checkbox == "true"){

  $pdo->query("INSERT INTO temp SET sessao = '$sessao', tabela = 'opcionais', id_opcional = '$id_opc', qtd_adicionada = '1', id_item = '$id', carrinho = '0', data = curDate()"); 

}else{
    $pdo->query("DELETE FROM temp WHERE id_item = '$id' and sessao = '$sessao' and tabela = 'opcionais' and carrinho = '0'"); 
}

echo 'Alterado com Sucesso';

 ?>



