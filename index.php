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
				<img src="img/<?= $logo_sistema ?>" class="logotipo">	
				
			</div>

			<div  class="flex-col-center">

				<div  class="pd-top-7">
					 <span style="font-size: 22px;" class="rubik-family font-wgt-500"><?= $nome_sistema ?></span>
				</div>

				<div class="pd-top-10 pd-r-12 pd-l-12 flex-row-start"> 
					<svg width="22px"  fill="#4b5563" focusable="false" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C8.13 2 5 5.13 5 9c0 4.17 4.42 9.92 6.24 12.11.4.48 1.13.48 1.53 0C14.58 18.92 19 13.17 19 9c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path></svg>
					<span class="rubik-family"><?= $endereco_sistema ?> - Minas das Gerais</span>
				</div>

				<a href="">
					<div class="pd-top-10 flex-row-center">
						<span data-icongenerate="infoIcon" class="flex-row-center"></span>	
						<span class="rubik-family" style="font-weight: 500; color: #4b5563; margin-left: 5px">Mais Informções</span>
					</div>
				</a>

			</div>

			
		
	 		


					

					<!---------------  Aberto e Fechado  --------------->

						<div style="padding-top: 20px;">
							<img style="width: 95px; display: table; margin: 0 auto;" src="img/<?php echo $img ?>">
						</div>
				
			


		</div> <!--- FIM infoDeli --->


<?php 

$desc_itens = 'Para cada R$ 1,00 em compras, você ganha 1 ponto para trocar em produtos Big Lacnhes É necessário';
$desc_item2 = 'Pote de 250ml de puro sabor';

?>




<!-- PROMOS -->

	<div style="display: flex; margin: 50px 0 0 17px; "> <h2 style="color: #293644;" class="hotTitle rubik-family font-sz-20"> Destaque </h2>    <img src="img/icons/hot-ico.png" style="width: 25px; height: 25px; margin-left: 3px" alt="destaque">

	</div>

		
	<div class="scrollPromo">
		
		<div class="flex-row-center-start " style=" margin: 7px 0 15px 7px">


					<div class="bkc-white" style="background-color: #fff; width: 180px; box-sizing: border-box; border-radius: 15px; height: 285px; border: 1px rgba(187, 187, 187, 0.50) solid; margin: 5px;">	
						<div class="flex-col-center" style="width: 100%; padding: 5px; overflow: hidden;">
							<img style="width: 100%; height: 145px; object-fit: cover; border-radius: 15px;" src="sistema/painel/images/produtos/10-07-2022-11-09-20-BURGUER-COSTELINHA.jpg" alt="notices">
							<div style="display: flex; margin: 7px 7px; flex-direction: column; justify-content: space-between; height: 120px;">
								<h3 class="rubik-family" style="color: rgba(55,65,81); font-size: 15px">BURGER COSTELINHA</h3>
								<p class="rubik-family font-sz-14 default-color-1" style=" display: flex"><?= mb_strimwidth($desc_itens, 0, 65, '...')?></p>
							
								<p class="rubik-family font-sz-17 default-color-1" >R$ 23,90</p>
							</div>
						</div>				
					</div>	


					<div  style="background-color: #fff; width: 180px; box-sizing: border-box; border-radius: 15px; height: 285px; border: 1px rgba(187, 187, 187, 0.50) solid; margin: 5px;">	
						<div class="flex-col-center" style="width: 100%; padding: 5px; overflow: hidden;">
							<img style="width: 100%; height: 145px; object-fit: cover; border-radius: 15px;" src="sistema/painel/images/produtos/09-07-2022-21-16-16-FRUTAS.jpg" alt="notices">
							<div style="display: flex; margin: 7px 7px; flex-direction: column; justify-content: space-between; height: 120px;">
								<h3 class="rubik-family" style="color: rgba(55,65,81); font-size: 15px">TAÇA DE AÇAÍ</h3>
								<p class="rubik-family font-sz-14 default-color-1" style=" display: flex"><?= mb_strimwidth($desc_item2, 0, 65, '...')?></p>
							
								<p class="rubik-family font-sz-17 default-color-1" >R$ 15,90</p>
							</div>
						</div>				
					</div>



					<div  style="background-color: #fff; width: 180px; box-sizing: border-box; border-radius: 15px; height: 285px; border: 1px rgba(187, 187, 187, 0.50) solid; margin: 5px;">	
						<div class="flex-col-center" style="width: 100%; padding: 5px; overflow: hidden;">
							<img style="width: 100%; height: 145px; object-fit: cover; border-radius: 15px;" src="sistema/painel/images/produtos/10-07-2022-11-09-20-BURGUER-COSTELINHA.jpg" alt="notices">
							<div style="display: flex; margin: 7px 7px; flex-direction: column; justify-content: space-between; height: 120px;">
								<h3 class="rubik-family" style="color: rgba(55,65,81); font-size: 15px">BURGER COSTELINHA</h3>
								<p class="rubik-family font-sz-14 default-color-1" style=" display: flex"><?= mb_strimwidth($desc_itens, 0, 65, '...')?></p>
							
								<p class="rubik-family font-sz-17 default-color-1" >R$ 15,90</p>
							</div>
						</div>				
					</div>


					
					
					
				



			

				

				
		</div>

	</div>		




			<style>

				.scrollPromo{
					display: flex;
					overflow-y: auto;
	
					/*overflow-x: scroll;
					
					white-space: nowrap;

					position: absolute;
					bottom: 0px;
					left: 0px;
					-webkit-overflow-scrolling: touch;*/

				}	
				.scrollPromo::-webkit-scrollbar {
				display: none; 
				}


			</style>
			



			
			<div class="menu">



				<div method="post" id="formbusca" class="formbusca">
					<div class="elementsBusca">
						<input type="text" class="txtbuscar" id="txtbuscar"name="txtbuscar">
						<button class="btncampobuscar  rubik-family" id="btnbuscar" name="btnbuscar"><i class="fas fa-search" style="font-size: 17px"></i></button>
					</div>
				</div>


			<div class="scrollMenu">




				<button  onclick="bucarprodutos(this.value)"  class="btnbuscar rubik-family font-wgt-400" id="urlbotao" name="urlbotao" value="Todos">Todos</button>



				<?php
				$query = $pdo->query("SELECT * FROM categorias where ativo = 'Sim'");
				$res3 = $query->fetchAll(PDO::FETCH_ASSOC);
				$total_reg3 = @count($res3);
				if($total_reg > 0){
					for($i3=0; $i3 < $total_reg3; $i3++){
						foreach ($res3[$i3] as $key => $value){}
						$nomecat = $res3[$i3]['nome'];
						$urlcat = $res3[$i3]['url'];
				?>

				<button value="<?= $urlcat;?>" onclick="bucarprodutos(this.value)" class="btnbuscar rubik-family font-wgt-400 default-color"><?= $nomecat;?></button>


				<?php }  } ?>


			</div>

			<div class="progressContent">
				<div class="progress">
					<div id="bar"class="bar"></div>
				</div>
			</div>			
				
			
<!----------------------------------------------------------------------------------->
<!---------------------------  LISTAGEM AJAX DE PRODUTOS  ---------------------------->
<!----------------------------------------------------------------------------------->

<style>
.btnbuscar	{
border-radius: 25px;
border: solid 1px #dedede; 
padding: 9px 17px 9px 17px; 
background-color: white; 
color: rgb(46, 45, 45);  
margin-top: 2px;
transition: 0.3s;
display: inline-block;
font-size: 16px;
}
.btnbuscar:active {
	padding: 7px 12px 7px 12px; 
}

.btnbuscar:hover {
color: white;
background-color: #EB4747; 
border: solid 1px #c73c3c; 
}




.formbusca{
	padding-top: 25px;
}
.formbusca .elementsBusca{
	width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.txtbuscar{
height: 47px;
padding: 0px 15px;
margin-right: -15px;
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
 	overflow-x: scroll; 
	padding: 10px;
}



.scrollMenu::-webkit-scrollbar {
  display: none; 
}


.list-group{
	padding: 10px;
}


</style>




				<ol class="list-group"  id="listar-itens-carrinho">aaaaa</ol>



				<script type="text/javascript">

				$(document).ready(function(){
					bucarprodutos();
				});			

				
				let campoSearch = document.getElementById('txtbuscar')
				campoSearch.addEventListener('keydown', ()=> {

					let x = document.getElementById('txtbuscar')
					console.log(x.value);
					let txtbuscar = x.value

					$.ajax({
						url: "itensajax.php",
						method: 'POST',
						data: {txtbuscar},
						dataType: "html",
						success: function(result){
							$('#listar-itens-carrinho').html(result)					
							},
						});



				})

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



					

				</script>


		</div>









	</div>





</body>


<script src="js/iconsGenerate.js"></script>
<script src="js/progressBar.js"></script>


</html>


