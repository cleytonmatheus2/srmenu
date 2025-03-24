<?php 
@session_start();
require_once('../../sistema/conexao.php');
$id = $_POST['id'];
$valor_item = $_POST['valor'];
$valor_item_adc = $valor_item;
$quant = $_POST['quant'];
$sessao = @$_SESSION['sessao_usuario'];


$query5 =$pdo->query("SELECT SUM(qtd_max) FROM adicionais where produto = '$id' and ativo = 'Sim'");
$total = $query5->fetchColumn();


$query =$pdo->query("SELECT * FROM adicionais where produto = '$id' and ativo = 'Sim'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML

	<div class="titulo-itens">
	Inserir Adicionais?
	<br>
		<span style="font-size: 14px;"> 
			Quantidade Máxima {$total}
		</span>
	
	</div>
	<ol class="list-group" id="listar-adicionais">








		
HTML;

	for($i=0; $i < $total_reg; $i++){
		foreach ($res[$i] as $key => $value){}
			$id = $res[$i]['id'];				
		$nome_adc = $res[$i]['nome'];
		$valoradc = $res[$i]['valor'];
		$valoradcF = number_format($valoradc, 2, ',', '.');

		$query2 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id' and tabela = 'adicionais' and carrinho = '0'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);
		
		
		if($total_reg2 > 0) {

		$qtd_adc = $res2[0]['qtd_adicionada'];

		
	    }else{

			$qtd_adc = 0;
		}

		if($total_reg2 > 0){
			$icone = 'bi-check-square-fill';
			$titulo_link = 'Remover Adicional';
			$acao = 'Não';
			$valor_item += $valoradc;

		}else{
			$icone = 'bi-square';
			$titulo_link = 'Escolher Adicional';
			$acao = 'Sim';
             
			//Para os Adicionais Limitados
			

		}
        
$limite_qtd = 'sim';



if($limite_qtd == 'sim'){

	

		echo <<<HTML

			<li class="list-group-item">		    	
			{$nome_adc} <span class="valor-item">(R$ {$valoradcF})</span>
			<span class="direita">

			
		HTML;

			if($qtd_adc == 0){


					echo <<<HTML
				

				HTML;

			}elseif($qtd_adc == 1){

					echo <<<HTML
					
					<a href="#" onclick="diminuirQuantAdc('{$id}', 'menos')" value="menos" class="link-neutro">
					<i class="lixeira-adc fa-solid fa-trash" style="font-size: 15px; "></i></a>
					<span id="" class="link-neutro" style="margin-bottom: 5px">{$qtd_adc}</span>
					
				HTML;

			}else{
				
				echo <<<HTML
				
				<a href="#" onclick="diminuirQuantAdc('{$id}', 'acao_adc')" class="link-neutro">
					<i class="fa-solid fa-minus"></i></a>
					<span id="" class="link-neutro" style="margin-bottom: 5px">{$qtd_adc}</span>	

				HTML;

			}

		echo <<<HTML

		
							
					<a href="#" onclick="aumentarQuantAdc('{$id}', 'acao_adc',{$qtd_adc})" class="link-neutro">
					<i class="fa-solid fa-plus "></i>
							</a>
					</span>		
					</li>
							

		HTML;



	//SELETOR UNICO//
	}else{

		echo <<<HTML
			
			<a href="#" onclick="adicionar('{$id}', '{$acao}')" class="link-neutro" title="{$titulo_link}">
			<li class="list-group-item">		    	
			{$nome_adc} <span class="valor-item">(R$ {$valoradcF})</span>
			<i class="bi {$icone} direita"></i>			
			</li>
			</a>

	HTML;

	}
		
   
	
	
}


	$valor_itemF = number_format($valor_item, 2, ',', '.');

	$valor_item_quant = $valor_item * $quant;
	$valor_item_quantF = number_format($valor_item_quant, 2, ',', '.');


}





echo <<<HTML




</ol>

<div class="total">
	R$ <b><span id="valor_item_quantF">{$valor_item_quantF}</span></b>
</div>

<!--- VALOR TOTAL ITEM -->
<input  id="total_item_input" value="{$valor_item_quant}">

<!--- VALOR TOTAL ITEM -->
<input  id="total_item_input_adc" value="{$valor_itemF}">


HTML;

?>











