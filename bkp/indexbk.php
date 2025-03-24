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
	
<body class="menu">



<!---------------------  [ PROJETO ]  -------------------->
<!--********************************************************-->
<!--*********  MEU PROJETO MOD CABECALHO INICIO  ***********-->
<!--********************************************************-->


<div>
	<img src="img/banner.webp" class="banner_topo" style="width: 100%; height: 100px; object-fit: cover;"> 
</div>




<div class="container text-center" style="margin-top: -15px; ">
  <div class="row">
		<div >
			<img src="img/<?php echo $logo_sistema ?>" class="logotipo">	
		</div>

    <div style="text-align: center; margin-top: 10px;">
    	<span style="font-size: 18px; font-weight: 600;"><?php echo $nome_sistema ?></span> <br>
	</div>

    <span> 
		<?php if($endereco_sistema == ""){ ?>	
					<span class="ocultar-mobile"><?php echo $nome_sistema ?></span>
				<?php }else{ ?>
					<span><?php echo $endereco_sistema ?></span>
		<?php } ?>
	</span> 









<!---------------  Previsão de Entrega  --------------->


<div align="center" style="margin-top: 20px;" ><i class="fas fa-motorcycle" style="font-size: 18px; color: #4b4b4b"></i>

<div style="color: #4b4b4b; font-size: 16px; font-weight: 600; margin-left: 3px;">Entrega:  </div>

<div style="color: #4b4b4b; font-size: 14px;"> Até <?php echo $previsao_entrega ?> min</div>

</div>

<!---------------  Aberto e Fechado  --------------->




	<div style="padding-top: 20px;">
		<img style="width: 95px; display: table; margin: 0 auto;" src="img/<?php echo $img ?>">
	</div>

	

<!---------------  BARRA SOCIAL  --------------->


<div  class="row" style="margin-top: 30px;">
  <div class="col-3 bloco2"><span><a href=" $echo"> </a></span></div>
  <div class="col-2 bloco2"><i style="margin-top: 7px; color: #4b4b4b; font-size: 20px;" class="fab fa-facebook-square
"></i></div>
 <div class="col-3 bloco2"><a target="_blank" href="<?php echo $instagram_sistema ?> " class="link-neutro"><i style="color: #4b4b4b; font-size: 20px;" class="bi bi-instagram" style="color:"></i></a></div>
 
 <div class="col-2 bloco2"><a target="_blank" href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $whatsapp_sistema ?>" class="link-neutro"><i style="color: #4b4b4b; font-size: 20px;" class="bi bi-whatsapp text-success"></i></a></div>

</div>



<!--
<?php 
	if($banner_rotativo == 'Sim'){
		$query = $pdo->query("SELECT * FROM banner_rotativo");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
 ?>


<div id="carouselExampleControls" class="carousel slide ocultar-banner-web" data-ride="carousel" data-interval="4000" >
  <div class="carousel-inner"style="width: 100%;">


  	<?php 	
			for($i=0; $i < $total_reg; $i++){
				foreach ($res[$i] as $key => $value){}
				$foto = $res[$i]['foto'];
				$categoria = $res[$i]['categoria'];


				$query2 = $pdo->query("SELECT * FROM categorias where id = '$categoria'");
				$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
				$total_reg2 = @count($res2);
				if($total_reg2 > 0){
					$url = 'categoria-'.$res2[0]['url'];
				}else{
					$url = '#';
				}



  if($i == 0){
    $ativo = 'active';
  }else{
    $ativo = '';
  }

?>
 			
    <div class="carousel-item <?php echo $ativo ?>" >
    	<a href="<?= $url ?>">		
      <img class="d-block w-100" src="sistema/painel/images/banner_rotativo/<?php echo $foto ?>" alt="First slide" width="100%" >
      </a>
    </div>
	

	<?php }  ?>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="margin-top: 18px;"></span>
    <span class="sr-only"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
    <span class="carousel-control-next-icon" aria-hidden="true" style="margin-top: 18px;"></span>
    <span class="sr-only"></span>
  </a>
</div>

<?php } } ?>

-->















<!---------------------------------------------------------------------------->
<!---------------------------  GRADE DE PRODUTOS  ---------------------------->
<!---------------------------------------------------------------------------->


<!---------------------------  Separador Titulo Menu  ---------------------------->

<span class="separadortitulomenuvermelho"></span><span class="separadortitulomenucinza"></span>


<!-- <div class="separadortitulomenu"></div> -->

<!----------------------------------------------------------------------------->


<style type="text/css">
	
#fontedomenu {
  background-color: #EB4747;

  height: 65px; 
  font-family: Bevan; 
  color: white;
  font-size: 35px; 
  border-radius: 0px 0px 50px 0px;  
  border-bottom: 7px #9E3333 solid; 
}
</style>
	


<div class="container text-center " style="background-color: ;">
  <div class="row">
    <div id="fontedomenu" class="col-7">
    	<div >Menu</div>
    </div>
  </div>
</div>



<!--*******************************************************************************************---->

<div id="card" style="display: <?php if ($modoExibicao !== "card"){
	echo 'none';
} ?>">

<!---------------------------  Separador Vermelho  ---------------------------->

<div class="separadorprod">
</div>
<!----------------------------------------------------------------------------->




	<div class=" cards" style="margin-bottom: 60px; margin-top: 50px;" >

		<?php 
		$query = $pdo->query("SELECT * FROM categorias where ativo = 'Sim'");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			for($i=0; $i < $total_reg; $i++){
				foreach ($res[$i] as $key => $value){}
					$cor = $res[$i]['cor'];
				$foto = $res[$i]['foto'];
				$nome = $res[$i]['nome'];
				$url = $res[$i]['url'];
				$id = $res[$i]['id'];

				$query2 = $pdo->query("SELECT * FROM produtos where categoria = '$id' and ativo = 'Sim'");
		$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
		$tem_produto = @count($res2);
		$mostrar = 'ocultar';
		if($tem_produto > 0){
			for($i2=0; $i2 < $tem_produto; $i2++){
				foreach ($res2[$i2] as $key => $value){}

					$estoque = $res2[$i2]['estoque'];
					$tem_estoque = $res2[$i2]['tem_estoque'];	

					if(($tem_estoque == 'Sim' and $estoque > 0) or ($tem_estoque == 'Não')){
						$mostrar = '';
					}

					}
		
				}else{
					$mostrar = 'ocultar';
				}

				?>



				<div class="col-md-4 col-6 <?php echo $mostrar ?>" >
					<a class="link-card" href="categoria-<?php echo $url ?>" >
						<div  class="card <?php echo $cor ?> " <?php if($tipo_miniatura == 'Foto'){ ?> style="background-image: url('sistema/painel/images/categorias/<?php echo $foto ?>'); background-size: cover; " <?php } ?> >
							<?php if($tipo_miniatura == 'Foto'){ ?>
								<div class="badge2"><?php echo $nome ?></div>
							<?php }else{ ?>
								<h3 class="card-title"><?php echo $nome ?></h3>
							<?php } ?>
						</div>
					</a>
				</div>

			<?php } } ?>		


		</div>


	</div>



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






<div id="card" style="display: <?php if ($modoExibicao !== "listagem"){ echo 'none'; } ?>">




<form method="post" id="formbusca" class="formbusca">
	<input type="search"   class="txtbuscar" id="txtbuscar"name="txtbuscar">
	<button type="submit" class="btncampobuscar" id="btnbuscar" name="btnbuscar"><i class="fas fa-search"></i></button>
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





<?php } ?>


<?php  } ?>


</div>

<!---------------------------  Separador Vermelho  ---------------------------->

<div class="separadorprod"></div>

<!----------------------------------------------------------------------------->


<ol class="list-group"  id="listar-itens-carrinho">aaaaa</ol>



<script type="text/javascript">

$(document).ready(function(){
	bucarprodutos();
 });			



function bucarprodutos(val){

			var urlbotao = val;
             
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
<footer class="rodape">	

<img src="img/logo.png" style="height: 55px; margin-top:30px; margin-bottom: 15px;">

     <div><h8 style="color: white; font-weight: 400; " >Crie hoje um Cardápio Digital <br>para seu negócio</h8></div>
    	<button class="botaosite" >Criar Hoje</button>
	</div>

</footer>



</body>


<!------------ CARRINHO FLUTUANTE INICIO [PROJETO]------------>

<div class="carrinhohome"> 
		<div style="padding-left: 13px; padding-top: 11px;"><i ><?php require_once("icone-carrinho.php") ?></i></div>
 </div>





</html>


