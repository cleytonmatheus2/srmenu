<?php 
include('../../conexao.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data_hoje = utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today')));

$id = $_GET['id'];

//BUSCAR AS INFORMAÇÕES DO PEDIDO
$query = $pdo->query("SELECT * from vendas where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$id = $res[0]['id'];	
$cliente = $res[0]['cliente'];
$valor = $res[0]['valor'];
$total_pago = $res[0]['total_pago'];
$troco = $res[0]['troco'];
$data = $res[0]['data'];
$hora = $res[0]['hora'];
$status = $res[0]['status'];
$pago = $res[0]['pago'];
$obs = $res[0]['obs'];
$taxa_entrega = $res[0]['taxa_entrega'];
$tipo_pgto = $res[0]['tipo_pgto'];
$usuario_baixa = $res[0]['usuario_baixa'];
$entrega = $res[0]['entrega'];
$mesa = $res[0]['mesa'];
$nome_cliente_ped = $res[0]['nome_cliente'];

$valorF = number_format($valor, 2, ',', '.');
$total_pagoF = number_format($total_pago, 2, ',', '.');
$trocoF = number_format($troco, 2, ',', '.');
$taxa_entregaF = number_format($taxa_entrega, 2, ',', '.');
$dataF = implode('/', array_reverse(explode('-', $data)));
	//$horaF = date("H:i", strtotime($hora));	

$valor_dos_itens = $valor - $taxa_entrega;
$valor_dos_itensF = number_format($valor_dos_itens, 2, ',', '.');

$hora_pedido = date('H:i', strtotime("+$previsao_entrega minutes",strtotime($hora)));

$query2 = $pdo->query("SELECT * FROM clientes where id = '$cliente'");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
$total_reg2 = @count($res2);
if($total_reg2 > 0){
$nome_cliente = @$res2[0]['nome'].' Tel: '.@$res2[0]['telefone'];
$telefone_cliente = @$res2[0]['telefone'];
$rua_cliente = @$res2[0]['rua'];
$numero_cliente = @$res2[0]['numero'];
$complemento_cliente = @$res2[0]['complemento'];
$bairro_cliente = @$res2[0]['bairro'];
}else{

if($mesa != '0' and $mesa != ''){
	$nome_cliente = 'Mesa: '.$mesa;
}else{
	$nome_cliente = $nome_cliente_ped;
}

if($nome_cliente_ped != ""){
			$nome_cliente = $nome_cliente_ped;
		}

$telefone_cliente = '';
$rua_cliente = '';
$numero_cliente = '';
$complemento_cliente = '';
$bairro_cliente ='';
}

if($entrega == 'Retirar'){
	$entrega = 'Retirar no Local';
}

if($entrega == 'Consumir Local'){
	$entrega = 'Consumir no Local';
}


?>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php if(@$_GET['imp'] != 'Não'){ ?>
<script type="text/javascript">
	$(document).ready(function() {    		
		window.print();
		window.close(); 
	} );
</script>
<?php } ?>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<style type="text/css">
	*{
		margin:0px;

		/*Espaçamento da margem da esquerda e da Direita*/
		padding:0px;
		background-color:#ffffff;


	}
	.text {
		&-center { text-align: center; }
	}
	
	.printer-ticket {
		display: table !important;
		width: 100%;

		/*largura do Campos que vai os textos*/
		max-width: 400px;
		font-weight: light;
		line-height: 1.3em;

		/*Espaçamento da margem da esquerda e da Direita*/
		padding: 0px;
		font-family: TimesNewRoman, Geneva, sans-serif; 

		/*tamanho da Fonte do Texto*/
		font-size: <?php echo $fonte_comprovante ?>px; 



	}
	
	.th { 
		font-weight: inherit;
		/*Espaçamento entre as uma linha para outra*/
		padding:5px;
		text-align: center;
		/*largura dos tracinhos entre as linhas*/
		border-bottom: 1px dashed #000000;
	}

	.itens { 
		font-weight: inherit;
		/*Espaçamento entre as uma linha para outra*/
		padding:5px;
		
	}

	.valores { 
		font-weight: inherit;
		/*Espaçamento entre as uma linha para outra*/
		padding:2px 5px;
		
	}


	.cor{
		color:#000000;
	}
	
	
	.title { 
		font-size: 12px;
		text-transform: uppercase;
		font-weight: bold;
	}

	/*margem Superior entre as Linhas*/
	.margem-superior{
		padding-top:5px;
	}
	
</style>



<div class="printer-ticket">		
	<div  class="th title"><?php echo $nome_sistema ?></div>

	<div  class="th">
		<?php echo $endereco_sistema ?> <br />
		<small>Contato: <?php echo $telefone_sistema ?> 
		<?php if($cnpj_sistema != ""){echo ' / CNPJ '. @$cnpj_sistema; } ?>
	</small>  
</div>



<div  class="th">Cliente <?php echo $nome_cliente ?>			
<br>
Venda: <b><?php echo $id ?></b> - Data: <?php echo $dataF ?> Hora: <?php echo $hora ?>
</div>

<div  class="th title" >Comprovante de Venda</div>

<div  class="th">CUMPOM NÃO FISCAL</div>

<?php 


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$res = $pdo->query("SELECT * from carrinho where pedido = '$id' order by id asc ");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

$sub_tot;
for ($i=0; $i < count($dados); $i++){ 
	foreach ($dados[$i] as $key => $value) {}
	$id_carrinho = $dados[$i]['id']; 
	$id_produto = $dados[$i]['produto']; 
	$quantidade = $dados[$i]['quantidade'];
	$total_item = $dados[$i]['total_item'];
	$obs_item = $dados[$i]['obs'];
	$item = $dados[$i]['item'];



		$query2 = $pdo->query("SELECT * FROM produtos where id = '$id_produto'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$prods_totals = count($res2);

				$nome_produto = $res2[0]['nome'];
				$id = $res2[0]['id'];
				$foto_produto = $res2[0]['foto'];
				$cat_produto = $res2[0]['categoria'];
	?>


<div class="row itens">
	<div style="text-align: left;" class="col-9"> <?php echo $quantidade ?> - <?php echo $nome_produto ?></div>		
	<div class="col-3" style="text-align: right;">

R$ <?php		
$total_itemF = number_format($total_item , 2, ',', '.');
		// $total = number_format( $cp1 , 2, ',', '.');
echo $total_itemF;?>
</div>

<?php

				$query11 =$pdo->query("SELECT * FROM opcionais where produto = '$id_produto'");
				$res11 = $query11->fetchAll(PDO::FETCH_ASSOC);
				$resul_total_opc = @count($res11);

						for ($i2=0; $i2 < $resul_total_opc; $i2++){ 
							foreach ($res11[$i2] as $key => $value) {}
								$nome_opc = $res11[$i2]['nome'];
								$id_opc = $res11[$i2]['id'];
								$tipo = $res11[$i2]['tipo'];

?>

							<span style="margin-left: 15px"><?php echo  $nome_opc.' ('.$tipo.")<br>"; ?></span>

<?php



							$query3 = $pdo->query("SELECT * FROM temp where carrinho = '$id_carrinho'  and id_opcional = '$id_opc'");
							$res3 = $query3->fetchAll(PDO::FETCH_ASSOC);
							$total_reg2 = @count($res3);
						
								for($i10=0; $i10 < $total_reg2; $i10++){    
									foreach ($res3[$i10] as $key => $value){}
										$id_item = $res3[$i10]['id_item'];
										$id_opcional = $res3[$i10]['id_opcional'];
										$qtd_adicionada = $res3[$i10]['qtd_adicionada'];

										
								$query12 =$pdo->query("SELECT * FROM opcionais_itens where id = '$id_item'");
								$res12 = $query12->fetchAll(PDO::FETCH_ASSOC);
								$total_itens_opcionais = @count($res12);
								
											for($i12=0; $i12 < $total_itens_opcionais; $i12++){    
												foreach ($res12[$i12] as $key => $value){}
																$id_item_opc = $res12[$i12]['id'];
																$nome_item_opc = $res12[$i12]['nome'];
							
					
											}	
										
																									
?>

			<span style="margin-left: 20px"><?php echo  'x'.$qtd_adicionada.' - '.$nome_item_opc ;?></span>
														
		
<?php 
	}				 
}
 ?>

</div>

<?php
	if($obs_item != ""){
		?>	
		
		<div  style="text-align: left; margin-left: 15px">
			<small><b>Observação : </b>
				<?php echo $obs_item ?>
			</small>		
		</div>
		
<?php 
	} 
}
?>






<div class="th" style="margin-bottom: 7px"></div>

<?php if($entrega == "Delivery"){ ?>
	<div class="row valores">			
		<div class="col-6">Total</div>
		<div class="col-6" style="text-align: right;">R$ <?php echo @$valor_dos_itensF ?></div>
	</div>			
<?php } ?>	

<?php if($entrega == "Delivery"){ ?>
	<div class="row valores">			
		<div class="col-6">Frete</div>
		<div class="col-6" style="text-align: right;">R$ <?php echo @$taxa_entregaF ?></div>	
	</div>			
<?php } ?>		

<div class="row valores">			
	<div class="col-6">SubTotal</div>
	<div class="col-6" style="text-align: right;">R$ <b><?php echo @$valorF ?></b></div>	
</div>	


</tr>


<?php if($total_pago != $valor){ ?>
	<div class="row valores">			
		<div class="col-6">Valor Recebido</div>
		<div class="col-6" style="text-align: right;">R$ <?php echo @$total_pagoF ?></div>	
	</div>			
<?php } ?>

<?php if($troco > 0){ ?>
	<div class="row valores">			
		<div class="col-6">Troco</div>
		<div class="col-6" style="text-align: right;">R$ <?php echo @$trocoF ?></div>	
	</div>			
<?php } ?>	

<div class="th" style="margin-bottom: 7px"></div>

<div class="row valores">			
	<div class="col-6">Forma de Pagamento</div>
	<div class="col-6" style="text-align: right;"><?php echo @$tipo_pgto ?></div>	
</div>	

<div class="row valores">			
	<div class="col-6">Forma de Entrega</div>
	<div class="col-6" style="text-align: right;"><?php echo @$entrega ?></div>	
</div>


<div class="row valores">			
	<div class="col-6">Está Pago</div>
	<div class="col-6" style="text-align: right;"><b><?php echo @$pago ?></b></div>	
</div>

<div class="th" style="margin-bottom: 10px"></div>


<?php if($entrega == "Delivery"){ ?>
	<div class="valores" style="text-align: right;">
		<b>Endereço	para Entrega</b>		
			<br>
			<?php echo $rua_cliente ?> <?php echo $numero_cliente ?> <?php echo $complemento_cliente ?>
			<?php echo $bairro_cliente ?>
		</div>	
<div class="th" style="margin-bottom: 10px"></div>
<?php } ?>	


<?php if($obs != ""){ ?>
	<div class="valores" style="text-align: right;">
		<b>Observações do Pedido</b>		
			<br>			
			<?php echo $obs ?>
		</div>	
<div class="th" style="margin-bottom: 10px"></div>
<?php } ?>	