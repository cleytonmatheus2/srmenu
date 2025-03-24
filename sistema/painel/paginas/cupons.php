<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

if(@$grupos == 'ocultar'){
    echo "<script>window.location='../index.php'</script>";
    exit();
}

$pag = 'cupons';
$formName = 'formCupom';
$formNameEdit = 'formCupomEdit';

//verificar se ele tem a permissão de estar nessa página
if(@$grupos == 'ocultar'){
    echo "<script>window.location='../index.php'</script>";
    exit();
}
?>


<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.srmenu.app/domini/v0.0.1/css/domini.css">
</head>





<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




<section class="section-row">


		<!-- CONTEÚDO ESQUERDO -->
	<div id="leftSection" class="left-section"> 

	


	
		<div id="domini-table"></div>	


		
	</div>   
			
	<!-- CONTEÚDO DIREITO -->
	<div id="rightSection">
		
		<div class="">      
			<a class="btn btn-primary" onclick="inserir()" class="btn btn-primary btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> Novo Cupom</a>
		</div>





		<form id="<?=$formName;?>" name="<?=$formName;?>" >

<input id="formEdit" name="formEdit" type="hidden" value="">

	<div class="modal-body" style="padding: 0 15px 15px 15px;">

		<div class="row">
			<div class="col-md-12">
					<div class="form-group">

						<label style="font-weight: 500; margin-top: -50px;">Selecione os Produtos</label><br>						
						
							<div id="BoxScrollSelect">
						
								<input id="searchCampo" class="searchProd domini w-97" value="" type="text" placeholder="Buscar produto...">					
								
								<div class="editando ">
									<input id="Todos" value="0" type="checkbox">
									<label for="Todos" class="selecionarTodos" style="font-weight: 500;">Selectionar Todos</label>
									<div class="itensSelecionados"><span id="quantItensSelecionados">0</span><span> selecionados</span> </div>
								</div>
								
								<hr style="margin: 5px 5px">	
								
								<ul>
								
								<?php
									$query31 = $pdo->query("SELECT * FROM produtos ORDER BY id desc");
									$res31 = $query31->fetchAll(PDO::FETCH_ASSOC);
									$total_reg31 = @count($res31);
									if($total_reg31 > 0){
										for($i1=0; $i1 < $total_reg31; $i1++){
										
											$nome = $res31[$i1]['nome'];
											$id_prod = $res31[$i1]['id'];

								?>	   

									<li data-checkbox="divProds" style="display: block;">
										<input  data-checkbox="blocoItens" id="<?= $id_prod;?>" value="<?= $id_prod;?>" name="itemChecked[]" type="checkbox"> 					
										<label for="<?= $id_prod;?>" class="listItensSQL" ><?= $nome;?></label><br>
									</li>
									
									<?php																		
										}
									?>

									</ul>
									
							<?php }else{  ?>

										<span>Nenhum produto encontrado.</span>

									<?php

									}

								?>	
								<span id="prodNaoEncontrado" style="display:none">Nenhum produto encontrado.</span>
											
											
						</div>

						<span id="minimoEscolha" class="alertMessage"></span>
						<br>	
						
						
					<div class="CodDivIpt">
						
							<label class="tituloInput">Código do Cupom</label>
								
						<div class="divInfo">
							<span class="popoverInfo">O código do cupom não deverá conter caracteres especiais, apenas letras e números são permitidos.</span>	
							
							
								<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
									width="18px" height="18px" viewBox="0 0 750.000000 750.000000"
									preserveAspectRatio="xMidYMid meet" data-info='info'>

									<g transform="translate(0.000000,750.000000) scale(0.100000,-0.100000)"
									stroke="none" >
									<path d="M3555 7464 c-22 -2 -96 -9 -165 -14 -616 -54 -1260 -294 -1787 -667
									-328 -232 -654 -558 -886 -886 -373 -526 -601 -1138 -669 -1787 -16 -161 -16
									-569 0 -730 76 -731 350 -1398 811 -1975 123 -155 403 -435 556 -557 578 -460
									1224 -726 1970 -810 142 -16 598 -16 740 0 746 84 1392 350 1970 810 154 123
									434 403 557 557 460 578 726 1224 810 1970 7 61 12 227 12 370 0 143 -5 310
									-12 370 -84 746 -351 1394 -811 1970 -123 155 -403 435 -556 557 -575 457
									-1243 733 -1960 808 -105 11 -511 21 -580 14z m450 -654 c805 -68 1549 -447
									2074 -1055 1001 -1160 1001 -2860 0 -4020 -862 -1000 -2267 -1335 -3491 -834
									-754 309 -1368 923 -1677 1677 -536 1309 -116 2799 1026 3645 588 435 1340
									648 2068 587z"/>
									<path d="M3791 5755 c-327 -74 -534 -394 -466 -720 68 -326 393 -539 719 -470
									407 86 610 546 399 904 -74 125 -204 228 -343 272 -85 27 -225 33 -309 14z"/>
									<path d="M3403 4155 c-102 -31 -208 -126 -257 -228 -27 -58 -332 -1403 -343
									-1512 -15 -163 72 -327 214 -398 91 -46 125 -48 833 -45 652 3 666 3 711 24
									108 50 169 143 177 268 9 145 -47 250 -165 308 l-68 33 -253 5 -254 5 -29 35
									c-16 19 -29 46 -29 60 0 14 57 264 126 555 115 481 126 536 121 595 -8 90 -32
									151 -79 205 -72 81 -93 88 -333 96 -286 10 -323 10 -372 -6z"/>
									</g>
								</svg>
						

						</div>
						<br>

								<input data-input="campo" id="codCupom" name="codCupom" type="text" class="domini w-100" placeholder="Digite o código"   required><br>	
								<input data-input="campo" id="valorConstante" name="valorConstante" type="hidden">
								<span id="codCadastrado" class="alertMessage"></span>	

							</div>
						<div>						
							<div class="divQuant"> 
								<label class="tituloInput">Quantidade</label>
								<input data-input="campo" id="quantCupom" name="quantCupom"  style="width: 95%" type="number" class="domini" placeholder="5" min="1" required> 
							</div>
							<div class="divDataEx"> 
								<label class="tituloInput">Data de Expiração</label><br>
								<input data-input="campo" id="dataExCupom" name="dataExCupom" type="date" class="domini"  required>
							</div>
						</div>

						<div class="divTipoValor">		

							<div class="divTipoDesc">
								<label class="tituloInput">Tipo de Desconto</label><br>
								<select data-idselect="tipoDesconto" onchange="tipoDesconto(this.value)" class="selectDomini" required>
									<option value="Valor">Valor</option>
									<option value="Porcentagem">Porcentagem</option>
								</select>
							</div>

							<div class="divValorDesc" id="divValorDesc">
								<label class="tituloInput">Desconto</label><br>
									<span class="input-ItemPredef-L">R$</span>
									<input data-input="campo" type="text" class="pre-def-l w-30"  id="descReal" name="descReal" data-formatMoney='real' value="">
							</div>

							<div class="divPorcDesc" id="divPorcDesc" style="display:none">
								<label class="tituloInput">Desconto</label><br>
									<input data-input="campo" type="text" class="inputDesc pre-def-r w-25"  id="inputDesc" name="descPorc" >
									<span for="inputDesc" class="input-ItemPredef-R domini">%</span>
							
							</div>
						</div>

						<div class="divCondicao">
							<label class="tituloInput">Condição</label><br>
							<select data-idselect="condicaoDesconto"  onchange="condicaoDesconto(this.value)" class="selectDomini" id="condicao" name="condicao" required>
								<option value="Nenhuma">Nenhuma</option>					
								<option value="Primeira">Primeira Compra</option>
								<option value="ValorTotal">Valor Total da Compra</option>
								<option value="Fidelidade">Fidelidade de Compras</option>
							</select> 
						</div>

						<div class="divFidelidade" id="divFidelidade" style="display: none">
							<label class="tituloInput">Quantidade Mínima</label><br>
							<input data-input="campo" type="text" class="domini w-29"  id="quantCompras" name="quantCompras" >
						</div>

						<div class="divValorTotalCompra" id="divValorTotalCompra" style="display: none">
							<label class="tituloInput">Valor Mínimo</label><br>
							<span class="input-ItemPredef-L">R$</span>
							<input data-input="campo" type="text" class="pre-def-l w-30" id="valor_compraCliente" name="valor_compraCliente" data-formatMoney="real">
						</div>

					</div> 

					<span id="teste">Sem alteração</span>

				</div>
				<hr>
				<div class="col-md-3">
					<button id="submitForm" type="submit" data-formname="<?=$formName;?>" class="btn btn-primary">Salvar</button>	
				</div>
			</div>

			<input type="hidden" name="id" id="id">

			<br>
			<small><div id="mensagem" ></div></small>

			<label class="switch">
			<input type="checkbox">
			<span class="slider"></span>
			</label>
					</div>
				</form>





		
	</div>


</section>


<!-- TABLEA 2.0  -->

<style>
	
	@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400..900;1,300..900&display=swap');
	
	.left-section{
		border-right: #d6dbde solid 1px;
        width: 80%;
        min-height: 700px;
    }
		
</style>















<style>
	
#BoxScrollSelect{
	height:198px; 
	border: 1px solid #d4d4d4; 
	padding: 7px 0 7px 10px; 
	border-radius: 5px; 
	overflow-x: hidden; 
	overflow-y: scroll;
}

#BoxScrollSelect::-webkit-scrollbar {
  width: 10px;
}
#BoxScrollSelect::-webkit-scrollbar-track {
  background:  #e8e8e8;
  border-radius: 7px;
}
#BoxScrollSelect::-webkit-scrollbar-thumb {
  background:  #a6a6a6; 
  border-radius: 7px;
}
#BoxScrollSelect::-webkit-scrollbar-thumb:hover {
  background: #878787; 
}


input[type="number"], select{
	border: 1px solid #d4d4d4; 
	padding: 7px 5px 7px 10px;
	border-radius: 7px;
	-moz-appearance: textfield;
}
/* remove seta de adicionar e diminuir quantidade  */
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;

}



.searchProd{
	display: block;
	margin: 7px 0 7px 0;
}

.tituloInput{
	font-weight: 500;
	margin-bottom: 5px;
}


div.editando{
	width: 97%;
	position: relative;
}


div.itensSelecionados{
	display: inline-block;
	position: absolute; 
	right: 3px;
}

.CodDivIpt{
	margin-bottom: 15px;
}



label[class~="selecionarTodos"], label[class~="listItensSQL"] {
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
  font-weight: 500;
}









.divQuant{
	width: 20%; 
	display: inline-block;
	margin-right: 10px;
}
.divDataEx{
	width: 75%; 
	display: inline-block;
	margin-bottom: 15px;
}
.divTipoValor{
	margin-bottom: 15px;
}
.divTipoDesc{
	display: inline-block;
	padding-right: 10px;
}
.divValorDesc, .divPorcDesc{
	display: inline-block;
}

.divCondicao{
	display: inline-block;
}





/* INFO */

.divInfo{
	/* background-color: #a2bfdb; */
	border-radius: 16px;
	color: #ffff;
	cursor: default;
	display: inline-block;
	font-family: 'Helvetica',sans-serif;
	font-size: 15px;
	font-weight: bold;
	height: 17px;
	width: 17px;
	position: relative;
	text-align: center;
}

svg[data-info='info'] {
  fill: #98a1b3;
  transition: .1s;
  margin-bottom: -3px;
}
svg[data-info='info']:hover {
  fill: #5e687a;
}

.questInfo{

}

.popoverInfo{
	background-color: white;
	color: black;
    border-radius: 5px;
    bottom: 30px;
    box-shadow: 0 0 5px rgba(0,0,0,0.4);
    display: none;
    font-size: 12px;
    font-family: 'Helvetica',sans-serif;
    left: -95px;
    padding: 7px 10px;
    position: absolute;
    width: 200px;
    z-index: 2;
	

	&:before {
        border-top: 7px solid rgba(0,0,0,0.85);
        border-right: 7px solid transparent;
        border-left: 7px solid transparent;
        bottom: -7px;
        content: '';
        display: block;
        left: 50%;
        margin-left: -7px;
        position: absolute;
  
	}
}

.divInfo:hover{
	.popoverInfo{
		display: block;
		animation-name: example;
  		animation-duration: .3s;
	}	
}

@keyframes example {
	from {opacity: 0; bottom: 10px;}
	to {opacity: 1;bottom: 30px;}
}
/* INFO FIM */


.alertMessage{
  color: rgb(184, 51, 74)
}
</style>





<script src="paginas/cupons/funcoes.js"></script>

<script type="text/javascript">

const pag = "<?=$pag?>";
const tituloInserir = "Inserir Cupom";

</script>

<script src="js/ajax.js"></script>

<script src="functions/tabela.js"></script>
<script src="functions/modal.js"></script>



<script>


onload = (event) => {

	dominiTable.list({
			'table': 'cupons', // OBRIGÁTORIO
			'primary': 'id',
			'columns': ['codigo', 'quant', 'condicao', 'dataexp'],   // OBRIGATORIO
			'thead': {
				'labels': ['Código', 'Qtde', 'Condição', 'Data Expiração'],
				'style': [
					{
					    'width': '20%'
					},
         			{
					    'width': '10%'
					},
         			{
					    'width': '15%'
					},
         			{
					    'width': '17%'
					}
				]
			},
			/*'rows': {
				'replace': [
					{
						'rep': 'ValorTotal',
						'to': 'Valor Total'
					}
				],
				'marker': [
					{
						'role': 'Nenhuma',
						'type': 'red'
					},
					{
						'role': 'Primeira',
						'type': 'green'
					}
				]
				
			},*/
			
			'active': {
				'title': 'Ativar',
				'column': 'condicao',
				'toggle':  {
					'activated': 'Primeira',
					'disabled': 'Nenhuma'
				}
			},
			'actions': {
				'edit': true,
				'delete': true
			},
			'datefilter': {
				'start': null,
				'end': null
			},
			/*'dateformat': [ 'dataexp' ]*/
	})		

};

</script>


<script src="domini/table/js/dominiTable.js"></script>