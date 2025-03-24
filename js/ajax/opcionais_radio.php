<?php 
@session_start();
require_once('../../sistema/conexao.php');

$id = $_POST['id_Item'];
$new_value = $_POST['new_value'];
$sessao = @$_SESSION['sessao_usuario'];
$id_opc = $_POST['id_opc'];


    $query = $pdo->query("SELECT * FROM temp where sessao = '$sessao' and tabela = 'opcionais' and id_opcional = '$id_opc' and carrinho = '0'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC); 
    $TOTAL = @count($res);




    if($new_value == "1" && $TOTAL == 0 ){
        
        $pdo->query("INSERT INTO temp SET sessao = '$sessao', id_opcional = '$id_opc', qtd_adicionada = '1', tabela = 'opcionais', id_item = '$id', carrinho = '0', data = curDate()"); 

    }elseif($new_value == "1"  && $TOTAL > 0){        
         
        $pdo->query("UPDATE temp SET  id_item = '$id' WHERE sessao = '$sessao' and id_opcional = '$id_opc' and  qtd_adicionada = '1' and tabela = 'opcionais' and carrinho = '0'");
        
    }else{

        $pdo->query("DELETE FROM temp WHERE id_opcional = '$id_opc' and sessao = '$sessao' and tabela = 'opcionais' and carrinho = '0'"); 

    };






echo 'Alterado com Sucesso';


 ?>