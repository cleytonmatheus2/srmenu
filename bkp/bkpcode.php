<?php
@session_start(); 
require_once("cabecalho.php");
$url_completa = $_GET['url'];
$sabores = @$_GET['sabores'];

if($sabores == 1){
    $texto_sabor = ' (1º Sabor)';
}else if($sabores == 2){
$texto_sabor = ' (2º Sabor)';
}else{
    $texto_sabor = '';
}

$sessao = date('Y-m-d-H:i:s-').rand(0, 1500);;

if(@$_SESSION['sessao_usuario'] == ""){
	$_SESSION['sessao_usuario'] = $sessao;
}

$nova_sessao = $_SESSION['sessao_usuario'];

$separar_url = explode("_", $url_completa);
$url = $separar_url[0]; 
$item = @$separar_url[1];


$query = $pdo->query("SELECT * FROM produtos where url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
$nome = $res[0]['nome'];
$descricao = $res[0]['descricao'];
$foto = $res[0]['foto'];
$id_prod = $res[0]['id'];
$valor = $res[0]['valor_venda'];
$valorF = number_format($valor, 2, ',', '.');
$categoria = $res[0]['categoria'];

if($item == ""){
	$valor_item_prod = $valor;

    $valor_do_produto = $valor;
    
}else{
	$query = $pdo->query("SELECT * FROM variacoes where produto = '$id_prod' and nome = '$item'");
	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$valor_item_prod = $res[0]['valor'];
    $valor_do_produto = $res[0]['valor'];

}



}
 ?>


 



<div class="main-container">

	<nav class="navbar bg-light fixed-top" style="box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.20);">
		<div class="container-fluid">
			<div class="navbar-brand">
                
            <?php 
            $query =$pdo->query("SELECT * FROM variacoes where produto = '$id_prod' and ativo = 'Sim'");
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $total_var = @count($res);


            if ($total_var>0) {?>

                   <a href="produto-<?php echo $url ?>&sabores=<?php echo $sabores ?>"><big> <img class="arrowleft" src="img/arrow_left.svg"></big></a>

                            <?php }else{?>

                     <a href="index.php"><big><img class="arrowleft" src="img/arrow_left.svg"></big></a>
                                    
                            <?php } ?>

                <span style="margin-left: 15px"><?php echo $nome ?> <?php echo $item ?> <small><small> <?php echo $texto_sabor ?></small></small></span>
			</div>

			<?php require_once("icone-carrinho.php") ?>

		</div>
	</nav>

	<div id="listar-adicionais" style='margin-top: 85px;'>


	
	</div>


	<div id="listar-ing">


	
	</div>




    <?php

$texto_botao = 'Adicionar';
$funcao_botao = 'finalizarItem()';

if($sabores == 1){
    $texto_sabor = ' (1º Sabor)';
    $texto_botao = 'Selecionar Segundo Sabor';
    $funcao_botao = 'selecionarSegundo()';
}else if($sabores == 2){
$texto_sabor = ' (2º Sabor)';
}else{
    $texto_sabor = '';
}

if(@$_SESSION['sessao_usuario'] == ""){
    $sessao = date('Y-m-d-H:i:s-').rand(0, 1500);
    $_SESSION['sessao_usuario'] = $sessao;
}else{
    $sessao = $_SESSION['sessao_usuario'];
}



if(@$_SESSION['id'] != ""){
    $id_usuario = $_SESSION['id'];
    $texto_botao = 'Adicionar ao Pedido';
    $nome_funcao = 'finalizarPedidoPainel()';
    $nome_funcao_segundo = 'selecionarSegundoPedido()';
    $nome_comprar_mais = 'comprarMaisPainel()';
}else{
    $id_usuario = '';
    $nome_funcao = 'finalizarPedido()';
    $nome_funcao_segundo = 'selecionarSegundo()';
    $nome_comprar_mais = 'comprarMais()';
}

$query = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    $id_cliente = $res[0]['cliente'];
    $mesa_carrinho = $res[0]['mesa'];
    $nome_cli_pedido = $res[0]['nome_cliente'];


    $query = $pdo->query("SELECT * FROM clientes where id = '$id_cliente'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    if(@count($res) > 0){
        $nome_cliente = $res[0]['nome'];
        $telefone_cliente = $res[0]['telefone'];
    }else{
        $nome_cliente = $nome_cli_pedido;
        $telefone_cliente = '';
    }
    
}

$separar_url = explode("_", $url_completa);
$url = $separar_url[0]; 
$item = @$separar_url[1];


$query = $pdo->query("SELECT * FROM produtos where url = '$url'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    $nome = $res[0]['nome'];
    $descricao = $res[0]['descricao'];
    $foto = $res[0]['foto'];
    $id_prod = $res[0]['id'];
    $valor = $res[0]['valor_venda'];
    $valorF = number_format($valor, 2, ',', '.');
    $categoria = $res[0]['categoria'];
}

$query = $pdo->query("SELECT * FROM categorias where id = '$categoria'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    $url_cat = $res[0]['url'];
}

$url_itens = '2sabores-'.$url_cat.'&sabores=2';

if($item == ""){
    $valor_item = $valor;
    $valor_item_ADC =  $valor_item;
    $id_variacao = 0;
}else{
    $query = $pdo->query("SELECT * FROM variacoes where produto = '$id_prod' and nome = '$item'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $valor_item = $res[0]['valor'];
    $valor_item_ADC =  $valor_item;
    $id_variacao = $res[0]['id'];
}

$query =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and tabela = 'adicionais' and carrinho = '0'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    for($i=0; $i < $total_reg; $i++){
        foreach ($res[$i] as $key => $value){}
        $id_adc = $res[$i]['id_item'];

        $query2 =$pdo->query("SELECT * FROM adicionais where id = '$id_adc'");
        $res1 = $query2->fetchAll(PDO::FETCH_ASSOC);
        $valor_adc = $res1[0]['valor'];
        
        $valor_item += $valor_adc;  
        

}
}

$valor_itemF = number_format($valor_item, 2, ',', '.');


if($status_estabelecimento == "Fechado"){       
        echo "<script>window.alert('$texto_fechamento')</script>";
    echo "<script>window.location='index.php'</script>";
    exit();
}


$data = date('Y-m-d');
//verificar se está aberto hoje
$diasemana = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");
$diasemana_numero = date('w', strtotime($data));
$dia_procurado = $diasemana[$diasemana_numero];

//percorrer os dias da semana que ele trabalha
$query = $pdo->query("SELECT * FROM dias where dia = '$dia_procurado'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0){       
        echo "<script>window.alert('Estamos Fechados! Não funcionamos Hoje!')</script>";
    echo "<script>window.location='index.php'</script>";
    exit();
}

$hora_atual = date('H:i:s');
//verificar se o delivery está aberto dentro da hora prevista
if(strtotime($hora_atual) > strtotime($horario_abertura) and strtotime($hora_atual) < strtotime($horario_fechamento)){
    
}else{
    if(strtotime($hora_atual) > strtotime($horario_abertura) and strtotime($hora_atual) > strtotime($horario_fechamento)){
        
    }else{
            echo "<script>window.alert('$texto_fechamento_horario')</script>";
    echo "<script>window.location='index.php'</script>";
    exit();
    }
}














$query1 =$pdo->query("SELECT SUM(qtd_max) FROM adicionais where produto = '$id_prod' and ativo = 'Sim'");
$total = $query1->fetchColumn();

$query5 =$pdo->query("SELECT * FROM adicionais where produto = '$id_prod' and ativo = 'Sim'");
$res5 = $query5->fetchAll(PDO::FETCH_ASSOC);
$total_reg5 = @count($res5);

if($total_reg5 > 0){

    

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



    for($i5=0; $i5 < $total_reg5; $i5++){
		foreach ($res5[$i5] as $key => $value){}
			$id_adc = $res5[$i5]['id'];				
		$nome_adc = $res5[$i5]['nome'];
        $valoradc = $res5[$i5]['valor'];
		$valoradcF = number_format($valoradc, 2, ',', '.');
        $lixeira_id = 'lixeira'.$id_adc;
        $menos_id = 'menos'.$id_adc;
        ////// IDENTIFICACOES PARA RESGATAR VALORES //////
        $id_adc_key_ipt = 'keyadcinput'.$id_adc;
        $id_adc_key_txt = 'keyadctxt'.$id_adc;
    
        

        
        
        

     
		$query3 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id_adc' and tabela = 'adicionais' and carrinho = '0'");
		$res2 = $query3->fetchAll(PDO::FETCH_ASSOC);
		$total_reg2 = @count($res2);

        //
       

		if($total_reg2 > 0){    
                              
			$icone = 'bi-check-square-fill';
			$titulo_link = 'Remover Adicional';
			$acao = 'Não';
			$valor_item_prod += $valoradc;
            
            
           //Para os Adicionais Limitados
            $qtd_adc = $res2[0]['qtd_adicionada'];


            $calc_mult_adc = $qtd_adc * $valoradc; //CORRETO!

		}else{
			$icone = 'bi-square';
			$titulo_link = 'Escolher Adicional';
			$acao = 'Sim';
    //Para os Adicionais Limitados
             
            $qtd_adc = 0;

            $valor_total_adc = $valoradc;

            $calc_mult_adc = $valoradc; //CORRETO!

		}



        





//////////////////////////////////////////// PARA TESTES ////////////////////////////////////////////


$limite_qtd = 'sim';
if($limite_qtd == 'sim'){

  



	
if ($qtd_adc<=0) {
    $lxr='none';
    $mns='none';
    $nmr='none';
}elseif($qtd_adc==1) {
    $lxr='';
    $mns='none';
}else{
   $lxr='none';
   $mns='';
}     

    echo <<<HTML
        <li class="list-group-item">		    	
        {$nome_adc} <span class="valor-item">(R$ {$valoradcF})</span>
        <span class="direita">

        
        

            <span id="{$lixeira_id}" style="display: {$lxr};">    
                <a href="#" onclick="diminuirQuantAdc('{$id_adc}' , '{$id_adc_key_ipt}' , '{$id_adc_key_txt}' , 'acao_adc' , '{$lixeira_id}','{$menos_id}', '{$valoradc}')" class="link-neutro">
                <i class="lixeira-adc fa-solid fa-trash" style="font-size: 15px; "></i></a>
            </span>
        
            <span id="{$menos_id}" style="display: {$mns};">
            <a href="#" onclick="diminuirQuantAdc('{$id_adc}' , '{$id_adc_key_ipt}' , '{$id_adc_key_txt}' , 'acao_adc' , '{$lixeira_id}','{$menos_id}', '{$valoradc}')" class="link-neutro">
            <i class="fa-solid fa-minus"></i></a>
            </span>


            <input id="{$id_adc_key_ipt}" type="hidden" style="width: 15px;" class="link-neutro" value="{$qtd_adc}"> 

            <span id="{$id_adc_key_txt}" class="link-neutro" style="margin-bottom: 5px">{$qtd_adc}</span>

            
            

                
                                                  
                     
                <a href="#" onclick="aumentarQuantAdc('{$id_adc}' , '{$id_adc_key_ipt}' , '{$id_adc_key_txt}' , 'acao_adc' , '{$lixeira_id}','{$menos_id}', '{$valoradc}')" class="link-neutro">
                <i class="fa-solid fa-plus "></i>
                        </a>
                </span>		
                </li>
                        

    HTML;



//SELETOR UNICO//
}else{

    echo <<<HTML
        
        <a href="#" onclick="adicionar('{$id_adc}', '{$acao}')" class="link-neutro" title="{$titulo_link}">
        <li class="list-group-item">		    	
        {$nome_adc} <span class="valor-item">(R$ {$valoradcF})</span>
        <i class="bi {$icone} direita"></i>			
        </li>
        </a>

HTML;



    }
    
    
    
}





}


        
        
        $valor_itemF = number_format($valor_item_prod, 2, ',', '.');

        $valor_item_quant = $valor_item_prod * 1; 
        $valor_item_quantF = number_format($valor_item_quant, 2, ',', '.');


?>


</ol>

<div class="total">
    R$ <b><span id="valor_item_quantF"><?php echo $valor_item_quantF; ?></span></b>
</div>

<!--- VALOR TOTAL ITEM -->
<input  id="total_item_input" value="<?php echo $valor_item_quant; ?>">

<!--- VALOR TOTAL ITEM -->
<input  id="total_item_input_adc" value="<?php echo $valor_itemF;?>">










<?php
////////////////////////////////////////////////  DESNECESSARIO //////////////////////////////////////////////// 

//verificar se o produto tem adicionais ou ingredientes
$query = $pdo->query("SELECT * FROM adicionais where produto = '$id_prod'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_adc = @count($res);

$query = $pdo->query("SELECT * FROM ingredientes where produto = '$id_prod'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_ing = @count($res);


?>






<hr>

<?php if($sabores != 2 and $sabores != 1){ ?>
    <div class="destaque-qtd" id="teste">
        <b>QUANTIDADE</b>
        <span class="direita">
            <span>
                <span><a href="#" onclick="diminuirQuant()"><i class="fa-solid fa-square-minus botao_menos"></i></a></span>
                <span> <b><span id="quant" style="margin-bottom: 5px"></span></b> </span>
                <span><a href="#" onclick="aumentarQuant()"><i class="fa-solid fa-square-plus botao_mais"></i></a></span>
            </span>
        </span>
    </div>
    <?php } ?>

    <input type="hidden" id="quantidade" value="1">
    


    <div class="destaque-qtd">
        <i class="bi bi-chat-square-text-fill" style="color: #545659;"></i><b style="color: #545659;"> Alguma Observação?</b>
        <div class="form-group mt-3" >
            <textarea type="text" class="form-control" id="obs" maxlength="255" name="obs" placeholder="Ex: Retirar cebola, ponto da carne etc"></textarea>

    </div>	



</div>






<style>

.div_btn_adc {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: white;   
    border-top: 1px solid #dbdbdb;
    padding: 7px 7px 7px 7px;
    vertical-align: middle;
    overflow: hidden;  
    
}




.final_adc_carrinho {
    display: flex;
    text-align: center;
}














.adc_qtd_btn{
      background-color: #ebebeb;
      border-radius: 7px;
      height: 50px;
      width:35%;
      color: #646464;
      margin-right: 7px;
      position: relative;
 
}


.adc_qtd_btn .num_result{
    text-align: center;
    z-index: 300;


}


.adc_qtd_btn .minos_btn{
    padding: 14px 15px 14px 25px;
    margin: -14px 15px -14px -10px; 
    position: absolute;
    left: 0;
    
}

.minusicon{
transition: 0.2s;
background-color: #ebebeb;

padding: 7px 0;
position: relative;

}


.minos_btn:active .minusicon{

    box-shadow: -5px 0 20px 50px #ffffff; 
      border-radius: 50px; 
      background-color: #ffffff;     

}



.adc_qtd_btn .plus_btn{
    width: 70px;
    height: 100%;
    /*padding: 14px 25px 14px 25px;*/
    
    position: absolute;
    right: 0;
    border: 1px solid red;*/

     
      
}

.plusicon{
transition: 0.2s;
background-color: #ebebeb;
margin-right: -5px;
position:relative;

}


.plus_btn:active .plusicon {
      
      box-shadow: 3px 0 0 30px #fafafa; 
      border-radius: 50px; 
      background-color: #ffffff;        

}




.num_result {
    display: inline-block;  
    
    padding: 12px 20px 12px 20px;
    margin: -12px -20px -12px -20px;
    z-index: 300;

}
.num_result .nswt{
    text-align: center; 
    z-index: 300;

}




/*====================================================*/



.btn_adc_carrinho {
    background-color: #cd4349; 
    color: white;  
    width: 65%;
    border-radius: 7px;
    cursor: pointer;
    padding: 13px 0;
    position: relative;
    
}

.btn_adc_carrinho:hover {
    background-color: #af2626;      
}



.btn_adc_carrinho .texto_btn_adc_vlr{
    right:20px;
    position: absolute;
    color: white;
    font-family: 'Roboto', sans-serif;
    font-weight: 500;
    
}

.btn_adc_carrinho .texto_btn_adc{
    padding: 1px 0;
    left:20px;
    position: absolute;
    color: white;  
    display: inline-block;
    font-family: 'Roboto', sans-serif;
    font-weight: 400;

}

</style>



<div class="div_btn_adc" >
  
    <div class="final_adc_carrinho">


                <div class="adc_qtd_btn">
                    
                       <span class="minos_btn">
                            <span class="minusicon">
                                <i class="fa-solid fa-minus fa-lg"></i>
                            </span>
                        </span>
                    
                        <div class="num_result">
                            <span class="nswt"> 1 </span>
                        </div>

                        <span class="plus_btn">    
                                <span class="plusicon">
                                    <i class="fa-solid fa-plus fa-lg"></i>
                                </span>                
                        </span>
                </div>
                
              
          

                 <div class="btn_adc_carrinho" onclick="<?php echo $funcao_botao ?>">

                    <h6 class="texto_btn_adc "><?php echo $texto_botao ?></h6>









<?php 
        
        $query66 =$pdo->query("SELECT SUM(qtd_max) FROM adicionais where produto = '$id_prod' and ativo = 'Sim'");
        $tota = @$query66->fetchColumn();
        
        


        ////// SOMANDO TOTAL DE ADICIONAIS //////
        $query6 =$pdo->query("SELECT SUM(valor_total_adc) FROM temp where sessao = '$sessao' and tabela = 'adicionais' and carrinho = '0'");
        $total_adc_vlr = @$query6->fetchColumn();

        ////// VARIFICANDO SE TEM ADICIONAIS //////
        $query7 =$pdo->query("SELECT valor_total_adc FROM temp where sessao = '$sessao' and tabela = 'adicionais' and carrinho = '0'");
        $res7 = $query7->fetchAll(PDO::FETCH_ASSOC);
        $total_reg7 = @count($res7);
 
        if($total_reg7 > 0){ 
            $vlr_f = $valor_do_produto +  $total_adc_vlr;

            $vp_adc = number_format($vlr_f, 2, ',', '.');
         ?>            
            
             <!--///////////////////////   ARMAZENA O TOTAL DE CAUCULO DE ADICIONAIS   ///////////////////////-->   
            <input id="save_valor_total_adc_ipt" type="hidden" class="link-neutro" value="<?php echo $vlr_f?>">      
            <span id="show_valor_total_adc_txt" class="texto_btn_adc_vlr">R$ <?php echo $vp_adc?></span>

<?php  }else{  

                    $vp = number_format($valor_do_produto, 2, ',', '.');

    ?>            
             

            <input id="save_valor_total_adc_ipt" type="hidden" class="link-neutro" value="<?php echo $valor_do_produto?>">
            <span id="show_valor_total_adc_txt" class="texto_btn_adc_vlr">R$ <?php echo $vp?></span>

        </div>
    
    </a>


    </div>
    
</div>




<?php  }  ?>





</body>
</html>






<script type="text/javascript">


	$(document).ready(function() { 
        
        //if(id_adc == id_adc){ 
        //$("#teste").hide();
        //}

    });




/////////////////   PROJETO  ////////////////////////////////////////////////////////////////////////////////////////////
//----------    adcionar adioonais   -----------//

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






function aumentarQuantAdc(id_adc, id_adc_key_ipt,  id_adc_key_txt, acao_adc,  lixeira_id, menos_id, valoradc){

                //////////////////// VARIÁVEIS CORINGAS ////////////////////
  
                var valor_do_produto = <?php echo $valor_do_produto?>;
                var quantidade_de_adc = $("#"+id_adc_key_ipt).val();

                ////////////////// AUMENTANDO QUANTIDADE DE ADICIONAIS //////////////////
                var soma_quantide_adc = parseInt(quantidade_de_adc) + parseInt(1);
                $("#"+id_adc_key_ipt).val(soma_quantide_adc)
                $("#"+id_adc_key_txt).text(soma_quantide_adc)
                //////////////////////////////////////////////////////////////////////
 
                ///////////////////// VALOR TOTAL DE CADA ADICIONAL /////////////////////
               
                var soma_vlradc_qtdadc =  valoradc * soma_quantide_adc; /// CORRETO
               
                //////////////////////////////////////////////////////////////////////           
 
                                         
               
                ////////////////////  VALOR DO PRODUTO COM ADICIONAL   ////////////////////
                var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());
                var soma_qtd_adc = soma_vlradc_qtdadc + valor_do_produto;
                var ss = soma_qtd_adc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                var vlr_final_prod_adc = soma_qtd_adc.toFixed(2);
                //var vp = number_format(soma_qtd_adc, 2, ',', '.');
                $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
                $("#show_valor_total_adc_txt").text(ss);  
                /////////////////////////////////////////////////////////////////////

                


                alert(ss)


   



                if (quantidade_de_adc==0) {
                    $("#"+lixeira_id).show();  
                    $("#"+menos_id).hide();

                 }else if(quantidade_de_adc==1){
                    $("#"+lixeira_id).hide();  
                    $("#"+menos_id).show();

                 }else {
                    $("#"+menos_id).show();
                    $("#"+lixeira_id).hide();   
                 }

                var acao_adc = 'mais';

            $.ajax({
                url: 'js/ajax/aumentar_qtd_adc.php',
                method: 'POST',
                data: {id_adc, acao_adc, soma_vlradc_qtdadc},
                dataType: "text",
                success: function (result) {  
                     
                             

                },      

            });



}




function diminuirQuantAdc(id_adc, id_adc_key_ipt,  id_adc_key_txt, acao_adc,  lixeira_id, menos_id, valoradc){


                var valor_do_produto = <?php echo $valor_do_produto?>;
                var quantidade_de_adc = $("#"+id_adc_key_ipt).val();

                ////////////////// AUMENTANDO QUANTIDADE DE ADICIONAIS //////////////////
                var soma_quantide_adc = parseInt(quantidade_de_adc) - parseInt(1);
                $("#"+id_adc_key_ipt).val(soma_quantide_adc)
                $("#"+id_adc_key_txt).text(soma_quantide_adc)
                //////////////////////////////////////////////////////////////////////////
 
                ///////////////////// VALOR TOTAL DE CADA ADICIONAL /////////////////////
               
                var soma_vlradc_qtdadc =  valoradc * soma_quantide_adc; /// CORRETO
               
                //////////////////////////////////////////////////////////////////////           
 
                                         
               
                ////////////////////  VALOR DO PRODUTO COM ADICIONAL   ////////////////////
                var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());
                var soma_qtd_adc = soma_vlradc_qtdadc + valor_do_produto;
                var ss = soma_qtd_adc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                var vlr_final_prod_adc = soma_qtd_adc.toFixed(2);
                //var vp = number_format(soma_qtd_adc, 2, ',', '.');
                $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
                $("#show_valor_total_adc_txt").text(ss);  
                /////////////////////////////////////////////////////////////////////
       

                alert(soma_qtd_adc)
  
                if (quantidade_de_adc==1) {
                    $("#"+lixeira_id).hide();  
                    $("#"+menos_id).hide();

                 }else if(quantidade_de_adc==2){
                    $("#"+lixeira_id).show();  
                    $("#"+menos_id).hide();

                 }else {
                    $("#"+menos_id).show();
                    $("#"+lixeira_id).hide();   
                 }
             

            var acao_adc = 'menos';

            $.ajax({
                url: 'js/ajax/aumentar_qtd_adc.php',
                method: 'POST',
                data: {id_adc, acao_adc, soma_vlradc_qtdadc},
                dataType: "text",
                success: function (result) {  					
                
                             

                },      

            });




}





/////////////////////////////////////////////////
////////////////////////////////////////////////

























	
function adicionar(id, acao){

    $.ajax({
        url: 'js/ajax/adicionais.php',
        method: 'POST',
        data: {id, acao},
        dataType: "text",

        success: function (mensagem) {  
                  
            if (mensagem.trim() == "Alterado com Sucesso") {                
                              
            } 

        },      

    });
}


 


function adicionarIng(id, acao){	

    $.ajax({
        url: 'js/ajax/adicionar-ing.php',
        method: 'POST',
        data: {id, acao},
        dataType: "text",

        success: function (mensagem) {  
                  
            if (mensagem.trim() == "Alterado com Sucesso") {                
                listarIng();                
            } 

        },      

    });
}

</script>




<script type="text/javascript">  


    function finalizarItem(){       
        addCarrinho();
        setTimeout(redirecionarCarrinho, 1000);
    }    


    function selecionarSegundo(){
        addCarrinho();
        setTimeout(redirecionarCategoria, 1000);
    }



    function selecionarSegundoPedido(){       
        addCarrinho();
        setTimeout(redirecionarCategoria, 1000);
    }


    function redirecionar(){
         window.location='index';
    }


    function redirecionarCarrinho(){
         window.location='carrinho';
    }


    function redirecionarCategoria(){
        var url = "<?=$url_itens?>";
         window.location=url;
    }


    function addCarrinho(){
        
        var quantidade = $('#quantidade').val();
        var total_item = $('#total_item_input').val();
        var produto = "<?=$id_prod?>";
        var obs = $('#obs').val();
        var sabores = "<?=$sabores?>";
        var variacao = "<?=$id_variacao?>";
       

         $.ajax({
        url: 'js/ajax/add-carrinho.php',
        method: 'POST',
        data: {quantidade, total_item, produto, obs, sabores, variacao},
        dataType: "text",

        success: function (mensagem) {                  
            if (mensagem.trim() == "Inserido com Sucesso") {                
                          
            } 

        },      

    });
    }
</script>

















