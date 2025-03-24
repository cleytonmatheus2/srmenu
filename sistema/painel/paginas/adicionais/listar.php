<?php 
require_once("../../../conexao.php");
$tabela = 'opcionais';

$txtbuscar = '%'.@$_POST['txtbuscar'].'%';

$pagina = @$_POST['pagina'];
if($pagina == ''){
	$pagina = 1;
}

$qtd_result_pag = @$_POST['qtd_result_pag'];
if ($qtd_result_pag == ''){
	$qtd_result_pag = 10;
}

// Calculo inicio vizualização
$inicio = ($pagina * $qtd_result_pag) - $qtd_result_pag;





$query = $pdo->query("SELECT  DISTINCT opcionais.id, opcionais.nome,  opcionais.tipo,  opcionais.produto,  opcionais.ativo,  opcionais.obrigatorio,  opcionais.qtd_minima,  opcionais.qtd_maxima   FROM opcionais, opcionais_itens WHERE opcionais.id = opcionais_itens.opcional AND opcionais_itens.nome LIKE '$txtbuscar'  LIMIT $inicio, $qtd_result_pag");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res); 

if($total_reg > 0){

	echo <<<HTML

		<small>
		<table class="table table-hover" id="tabela">
		<thead> 
		<tr>
		<th>Nome</th>
		<th>Ativo</th>
		<th>Tipo</th>	
		<th>Obrigatório</th>
		<th>Limite</th>		
		<th>Ações</th>
		</tr>
		</thead> 
		<tbody>

	HTML;


/*

$connect = @mysqli_connect($localhost, $usuario, $senha, $banco);
$query0 = mysqli_query($connect, "SELECT DISTINCT opcionais.id, opcionais.nome FROM opcionais, opcionais_itens WHERE opcionais.id = opcionais_itens.opcional AND opcionais_itens.nome LIKE '$txtbuscar' ");

while($rosw = mysqli_fetch_array($query0)){

		$opcional_id = $rosw['id'];
		$nome_x = $rosw['nome'];

		echo '<br>'.$nome_x.'<br>';

		$query22 = mysqli_query($connect, "SELECT * FROM opcionais_itens WHERE opcional = '$opcional_id' AND nome LIKE '$txtbuscar'");
	
		while($ros3 = mysqli_fetch_array($query22)){

			$nomeee = $ros3['nome'];

			echo $nomeee.'<br>';
		}

}
*/



		for($i=0; $i < $total_reg; $i++){

				$id = $res[$i]['id'];
				$nome = $res[$i]['nome'];
				$tipo = $res[$i]['tipo'];
				$produto = $res[$i]['produto'];
				$ativo = $res[$i]['ativo'];
				$obrigatorio = $res[$i]['obrigatorio'];
				$qtd_minima = $res[$i]['qtd_minima'];
				$qtd_maxima = $res[$i]['qtd_maxima'];



echo <<<HTML


<tr  class="titulo-adicional" style="background-color: #f2f2f2; font-weight: 600">
<td>{$nome}</td>
<td>{$ativo}</td>
<td>{$tipo}</td>
<td>{$obrigatorio}</td>
<td>{$qtd_maxima}</td>

<td>

		<span href="#" onclick="editar('{$id}','{$nome}', '{$ativo}', '{$qtd_minima}', '{$qtd_maxima}', '{$tipo}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></span>
			<li class="dropdown head-dpdn2" style="display: inline-block;">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-trash-o text-danger"></i></a>
			<ul class="dropdown-menu" style="margin-left:-230px;">
			<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>
</td>

</tr>


HTML;

				//$query2 = $pdo->query("SELECT * FROM opcionais, opcionais_itens WHERE opcionais_itens.opcional = '$id' AND opcionais_itens.nome LIKE '$txtbuscar' OR opcionais.nome LIKE '$txtbuscar'");
				$query2 = $pdo->query("SELECT * FROM opcionais_itens WHERE opcional = '$id' AND nome LIKE '$txtbuscar'");
				$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
				$total_reg2 = @count($res2);

					if($total_reg2 > 0){
						for($i2=0; $i2 < $total_reg2; $i2++){
							$id_item = $res2[$i2]['id'];
							$nome_item = $res2[$i2]['nome'];	
							$ativo_item = $res2[$i2]['ativo'];
							$valor_item = $res2[$i2]['valor'];
							$valor_itemF = number_format($valor_item, 2, ',', '.');

					echo <<<HTML

							<tr style="background-color: #fff">
					   			<td class="titulo-adicional" >{$nome_item}</td>
								<td class="titulo-adicional" >{$ativo_item}</td>
								<td class="titulo-adicional" colspan="7">R$ {$valor_itemF}</td>
								
								
						    </tr>

					HTML;
					
						}
									
					}

		
		
		
				}
	


// PAGINAÇÃO 

$result_page =	$pdo->query("SELECT COUNT(id) AS num_result FROM opcionais");
$row_pg = $result_page->fetch(PDO::FETCH_ASSOC);

// quantidade de pagina
$ultima_pag = ceil($row_pg['num_result'] / $qtd_result_pag);

//max links
$max_links = 2;


echo <<<HTML


	</tbody>

<small><div style="text-align: center" id="mensagem-excluir"></div></small>
</table>
</small>


<!--========================[ PAGINÇÃO ]========================-->

				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li class=""><a class=""  onclick="paginacaoTabela(1, $qtd_result_pag)" >Primeira</a></li>

HTML;

		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){

			if($pag_ant >= 1){			
				echo <<<HTML
				<li class=""><a class=""   onclick="paginacaoTabela($pag_ant, $qtd_result_pag)" >{$pag_ant}</a></li>
				HTML;
			}	
};

echo <<<HTML

				<li class="page-item active"><a class="">{$pagina}</a></li>
HTML;

		for($pag_post = $pagina + 1; $pag_post <= $pagina + 2; $pag_post++){

			if($pag_post <= $ultima_pag){		
				echo <<<HTML
				<li class=""><a class=""   onclick="paginacaoTabela($pag_post, $qtd_result_pag)" >{$pag_post}</a></li>
				HTML;
			}	
		};
		

		echo <<<HTML
						
						<li class=""><a class="" onclick="paginacaoTabela($ultima_pag, $qtd_result_pag)" >Última</a></li>
				
					</ul>
				</nav>


		HTML;



}else{
	echo '<small style="padding-left: 10px">Não possui nenhum registro Cadastrado!</small>';
}



?>




<script type="text/javascript">



function editar(id, nome, ativo, qtd_minima, qtd_maxima, tipo){


    ///$('#idAdicionalEdit').val(id);
	document.getElementById('seletorProdutoEdit').value = id;
	document.getElementById('selectTipoEdit').value = tipo;
	document.getElementById('nomeAdicionalEdit').value = nome;
	


	//botao ativo adicional/opcional
	if(ativo == 'Sim'){
		document.getElementById('ativoEdit').checked = true;
	}else{
		document.getElementById('ativoEdit').checked = false;
	}

	
    //quantidade minima
	if(qtd_minima > 0){
		document.getElementById('escolhaObrigatorioEdit').value = 'Sim';
		document.getElementById('quantMinDivEdit').style.display = 'inline-block';
		document.getElementById('quantidadeMinEdit').setAttribute('min', '1');
		document.getElementById('quantidadeMinEdit').value = qtd_minima;
	}else{
		document.getElementById('escolhaObrigatorioEdit').value = 'Nao';
		document.getElementById('quantMinDivEdit').style.display = 'none';
		document.getElementById('quantidadeMinEdit').value = 0;
	}

    //limite de quantidade
	if(qtd_maxima > 0){
		document.getElementById('escolhaLimiteEdit').value = 'Sim';
		document.getElementById('quantMaxDivEdit').style.display = 'inline-block';
		document.getElementById('quantMaxEdit').setAttribute('min', '1');
		document.getElementById('quantMaxEdit').value = qtd_maxima;
	}else{
		document.getElementById('escolhaLimiteEdit').value = 'Nao';
		document.getElementById('quantMaxDivEdit').style.display = 'none';
		document.getElementById('quantMaxEdit').value = 0;
	}

	$('#modalEditar').modal('show');

	//$('#titulo_inserir').text('Editar Registro');

	
	

}
	








</script>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #ebebeb;
  text-align: left;
  padding: 8px;
}

</style>