<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id_opc = $_POST['id_opc'];
$id = $_POST['id_Item'];
$acao_opc = @$_POST['acao_opc'];
$qtd_adc = @$_POST['qtd_adc'];
$sessao = @$_SESSION['sessao_usuario'];



    $query3 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id' and tabela = 'opcionais' and carrinho = '0'");
    $res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
    $total_reg3 = @count($res3);
    if($total_reg3 > 0){
      $qtd_adicionada = $res3[0]['qtd_adicionada'];
      $sessao_temp = $res3[0]['sessao'];    
    }else{
      $qtd_adicionada = 0;
      $sessao_temp = '';    
    }

    


if($total_reg3 == 0 && $acao_opc == 'mais'){

  $quant = 1;

  $pdo->query("INSERT INTO temp SET sessao = '$sessao', qtd_adicionada = '$quant', tabela = 'opcionais', id_opcional = '$id_opc', id_item = '$id', carrinho = '0', data = curDate()");

}elseif($qtd_adicionada >= 0 && $acao_opc == 'mais'){

  $quant = $qtd_adicionada+1; 
  $pdo->query("UPDATE temp SET qtd_adicionada = '$quant' where sessao = '$sessao' and tabela = 'opcionais' and id_opcional = '$id_opc' and id_item = '$id' and  carrinho = '0'"); 

}elseif($qtd_adicionada >= 2 && $acao_opc == 'menos'){
  $quant = $qtd_adicionada-1; 
  $pdo->query("UPDATE temp SET qtd_adicionada = '$quant' where sessao = '$sessao' and tabela = 'opcionais' and id_opcional = '$id_opc' and id_item = '$id' and  carrinho = '0'"); 
}else{

  
  $pdo->query("DELETE FROM temp WHERE id_item = '$id' and sessao = '$sessao' and tabela = 'opcionais' and carrinho = '0'");

}

echo $id;


 ?>

 