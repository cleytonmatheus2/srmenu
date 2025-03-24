<?php 
require_once("cabecalho.php");

$txtbuscar = '%'.@$_POST['txtbuscar'].'%';




$url = @$_POST['urlbotao'];//







if($url=="" AND $txtbuscar=="" OR $url=="Todos"){

	$query = $pdo->query("SELECT * FROM categorias");

}elseif($txtbuscar!="" AND $url == ""){

	$query = $pdo->query("SELECT * FROM categorias where url LIKE '$txtbuscar'");

}else{
	$query = $pdo->query("SELECT * FROM categorias where url = '$url'");
}

$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
$nome = $res[0]['nome'];
$descricao = $res[0]['descricao'];
$id = $res[0]['id'];
$mais_sabores = $res[0]['mais_sabores'];
}


?>


		<?php 

		if($url=="" AND $txtbuscar=="" OR $url=="Todos"){
			$query = $pdo->query("SELECT * FROM produtos where ativo = 'Sim'");
		
		}elseif($txtbuscar!="" AND $url == ""){

			$query = $pdo->query("SELECT * FROM produtos where nome LIKE '$txtbuscar' OR  descricao LIKE '$txtbuscar' and ativo = 'Sim'");

		}else{

			$query = $pdo->query("SELECT * FROM produtos where categoria = '$id' and ativo = 'Sim'");
		}

		
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			for($i=0; $i < $total_reg; $i++){
				foreach ($res[$i] as $key => $value){}
				$id = $res[$i]['id'];
				$foto = $res[$i]['foto'];
				$nome = $res[$i]['nome'];
				$descricao = $res[$i]['descricao'];
				$url = $res[$i]['url'];
				$estoque = $res[$i]['estoque'];
				$tem_estoque = $res[$i]['tem_estoque'];
				$valor = $res[$i]['valor_venda'];
				$valorF = number_format($valor, 2, ',', '.');

				if($tem_estoque == 'Sim' and $estoque <= 0){
					$mostrar = '';
					$url_produto = '#';					
				}else{
					$mostrar = 'none';
					$url_produto = 'produto-'.$url;
				}








				?>
<a href="<?php echo $url_produto ?>" class="link-neutro">
			<div class="listagemProdutosHome">

				<div class="divImagemList">
					<img class="imagemlistProd" src="sistema/painel/images/produtos/<?php echo $foto ?>">
				</div>

				<div class="divDescProd">
					<div class="nomeProd rubik-family"><?php echo $nome ?></div>
					<div class="descricaoProd rubik-family"><?php echo mb_strimwidth($descricao, 0, 70, "...");  ?></div>

					<span class="valorProd rubik-family">
					<?php echo 'R$ '.$valorF; ?>
					</span>
				
				</div>

			

				<img class="esgotadoIMG" src="img/esgotado.png" width="75px" height="75px" style="display: <?= $mostrar ?>;">

			</div>
</a>


	<?php } } ?>


		


</div>

</body>
</html>
