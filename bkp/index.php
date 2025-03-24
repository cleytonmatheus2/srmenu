<?php require_once("cabecalho.php");

$img = 'aberto.png';

if($status_estabelecimento == "Fechado"){		
	$img = 'fechado.png';
}

$modoExibicao = "listagem";

$data = date('Y-m-d');
//verificar se está aberto hoje
$diasemana = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
$diasemana_numero = date('w', strtotime($data));
$dia_procurado = $diasemana[$diasemana_numero];

//percorrer os dias da semana que ele trabalha
$query = $pdo->query("SELECT * FROM dias where dia = '$dia_procurado'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){		
	$img = 'fechado.png';
}

$hora_atual = date('H:i:s');
//verificar se o delivery está aberto dentro da hora prevista
if(strtotime($hora_atual) > strtotime($horario_abertura) and strtotime($hora_atual) < strtotime($horario_fechamento)){
	
}else{
	if(strtotime($hora_atual) > strtotime($horario_abertura) and strtotime($hora_atual) > strtotime($horario_fechamento)){
		
	}else{
			$img = 'fechado.png';
	}
}

 ?>




<html>


	
<body >

		<div>
			<img src="img/banner.webp" class="banner_topo" > 
		</div>


	<div class="menuBody">

		


		<div class="infoDeli">

			<div>
				<img src="img/<?php echo $logo_sistema ?>" class="logotipo">	
				
			</div>

			<div  class="flex-col-center">

				<div  class="pd-t7">
					 <span style="font-size: 22px; font-weight: 500;" class="menuFont"><?= $nome_sistema ?></span>
				</div>

				<div class="pd-t7"> 
					<svg width="22px"  fill="#4b5563" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 4.17 4.42 9.92 6.24 12.11.4.48 1.13.48 1.53 0C14.58 18.92 19 13.17 19 9c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path></svg>
					<span class="menuFont"><?php echo $endereco_sistema ?></span>
				</div>

				<a href="">
					<div class="pd-t7">
						<span data-icongenerate="infoIcon" ></span>	<span class="menuFont" style="font-weight: 500; color: #4b5563">Mais Informções</span>
					</div>
				</a>

			</div>

			
		
	 		


					

					<!---------------  Aberto e Fechado  --------------->

						<div style="padding-top: 20px;">
							<img style="width: 95px; display: table; margin: 0 auto;" src="img/<?php echo $img ?>">
						</div>
				
			


		</div> <!--- FIM infoDeli --->







		<div class="menu">




				<form method="post" id="formbusca" class="formbusca">
					<input type="search"   class="txtbuscar" id="txtbuscar"name="txtbuscar">
					<utton type="submit" class="btncampobuscar" id="btnbuscar" name="btnbuscar"><i class="fas fa-search"></i></button>
				</form>


				<div class="scrollMenu">




				<button  onclick="bucarprodutos(this.value)"  class="btnbuscar" id="urlbotao" name="urlbotao" value="Todos">Todos</button>



				<?php
				$query = $pdo->query("SELECT * FROM categorias where ativo = 'Sim'");
				$res3 = $query->fetchAll(PDO::FETCH_ASSOC);
				$total_reg3 = @count($res);
				if($total_reg > 0){
					for($i3=0; $i3 < $total_reg3; $i3++){
						foreach ($res3[$i3] as $key => $value){}
						$nomecat = $res3[$i3]['nome'];
						$urlcat = $res3[$i3]['url'];
				?>

				<button value="<?= $urlcat;?>" onclick="bucarprodutos(this.value)" class="btnbuscar"><?= $nomecat;?></button>


				<?php }  } ?>


				</div>


<!----------------------------------------------------------------------------------->
<!---------------------------  LISTAGEM AJAX DE PRODUTOS  ---------------------------->
<!----------------------------------------------------------------------------------->

<style>
.btnbuscar	{
border-radius: 25px;
border: solid 1px #dedede; 
padding: 7px 12px 7px 12px; 
background-color: white; 
color: rgb(46, 45, 45);  
margin-top: 2px;
transition: 0.3s;
display: inline-block;
}
.btnbuscar:active {
	padding: 5px 10px 5px 10px; 
}

.btnbuscar:hover {
color: white;
background-color: #EB4747; 
border: solid 1px #c73c3c; 
}




.formbusca{
padding-top: 25px;
width: 100%;
}


.txtbuscar{
height: 47px;
padding: 0px 15px;

width: 80%;
border-radius: 5px;
border: solid 1px #b0b0b0;
background-color: #fafafa;
}

.btncampobuscar{
	border: none;
	border-radius: 0px  5px 5px 0px;
	background-color: #EB4747;
	color: white;
	margin-left: -7px;
	width: 50px;
	height: 47px;
}

.scrollMenu{
	white-space: nowrap; 
 	overflow-x: auto; 
	padding: 10px 0 10px 0;
}



.scrollMenu::-webkit-scrollbar {
  display: none; 
}



</style>







				<!---------------------------  Separador Vermelho  ---------------------------->

				<div class="separadorprod"></div>

				<!----------------------------------------------------------------------------->


				<ol class="list-group"  id="listar-itens-carrinho">aaaaa</ol>



				<script type="text/javascript">

				$(document).ready(function(){
					bucarprodutos();
				});			



				function bucarprodutos(urlbotao){
							
									$.ajax({
										url: "itensajax.php",
										method: 'POST',
										data: {urlbotao},
										dataType: "html",
										success: function(result){
											$('#listar-itens-carrinho').html(result)						
											
										},
					
									});

				};		



				$('#btnbuscar').click(function(event){
							event.preventDefault();

								$.ajax({
										url: "itensajax.php",
										method: 'POST',
										data: $('form').serialize(),
										dataType: "html",
											success: function(result){
												$('#listar-itens-carrinho').html(result)						

										},

					
									});

							});		

				</script>


		</div>









	</div>







	<div class="infoDeliModal" style="display: none">

		<div class="supTitle">
			<p class="menuFont" style="font-size: 20px; font-weight: 500" data-modalname> <?= $nome_sistema ?></p>
			<span class="closeBtn"><svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="17px" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)"  stroke="none"> <path d="M250 2537 c-43 -14 -182 -145 -218 -206 -36 -62 -36 -150 0 -212 15 -24 207 -224 427 -444 l401 -400 -409 -410 c-225 -225 -417 -426 -427 -445 -11 -22 -18 -58 -18 -96 0 -79 27 -126 131 -225 82 -78 124 -99 199 -99 85 1 109 21 537 448 l407 407 408 -407 c427 -427 451 -447 536 -448 75 0 117 21 199 99 104 99 131 146 131 225 0 38 -7 74 -18 96 -10 19 -202 220 -427 445 l-409 410 401 400 c220 220 412 420 427 444 20 35 26 57 26 106 0 80 -27 126 -131 226 -101 96 -163 117 -267 87 -35 -10 -104 -74 -458 -427 l-418 -415 -417 415 c-355 353 -424 417 -459 427 -50 14 -107 14 -154 -1z"/> </g> </svg></span>
		</div>


				<div class="flex-row-center">

						<!---------------  Previsão de Entrega  --------------->


						<div style="margin-top: 20px;" class="flex-col-center">
							
							<i class="fas fa-motorcycle" style="font-size: 18px; color: #4b4b4b"></i>

							<span style="color: #4b4b4b; font-size: 16px; font-weight: 600; margin-left: 3px;">Entrega:</span>

							<span style="color: #4b4b4b; font-size: 14px;"> Até <?php echo $previsao_entrega ?> min</span>

						</div>

						<div style="margin-top: 20px;" class="flex-col-center">
							
							<i class="fas fa-motorcycle" style="font-size: 18px; color: #4b4b4b"></i>

							<span style="color: #4b4b4b; font-size: 16px; font-weight: 600; margin-left: 3px;">Entrega:</span>

							<span style="color: #4b4b4b; font-size: 14px;"> Até <?php echo $previsao_entrega ?> min</span>

						</div>

				</div>


	</div><!-- fim infoDeliModal  -->




</body>


<script src="js/iconsGenerate.js"></script>


</html>


