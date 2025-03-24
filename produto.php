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

$sessao = date('Y-m-d-H:i:s-').rand(0, 1500);

if(@$_SESSION['sessao_usuario'] == ""){
	$_SESSION['sessao_usuario'] = $sessao;
}

$nova_sessao = $_SESSION['sessao_usuario'];

$separar_url = explode("_", $url_completa);
$url = $separar_url[0]; 
$item = @$separar_url[1];

//$corTema = '87, 87, 87';
//$corTema = '179, 37, 61';
$corTema = '184, 51, 74';

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


<link rel="stylesheet" href="css/produtos.css">
 



<div class="main-container">

    <div class="divImagemProd">
         <img class="imagemProd" src="sistema/painel/images/produtos/<?php echo $foto?>" alt="<?php echo $nome ?>">
    </div>

  <div class="divItens" style="background-color: #fff; position: relative; border-radius: 30px 30px 0 0">

        <div class="divInfosProd">
            <p class="infosProdNome  rubik-family color-293644"> <?php echo $nome ?></p>
            <p class="infosProdDesc rubik-family color-3b4a58"> <?php echo $descricao ?></p>
            <p class="infosProdPreco rubik-family color-293644">R$ <?php echo $valorF ?></p>    
        </div>

        <hr class="hr">

        <div id="listar-adicionais" style="border-radius: 500px;"></div>
        

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


  //-------------------------------------------------------------------------------------------------------------------------//
 //------------------------------------------------- LISTANDO OS OPCIONAIS -------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------------//

    $query10 =$pdo->query("SELECT * FROM opcionais where produto = '$id_prod'  and ativo = 'Sim'");
    $res10 = $query10->fetchAll(PDO::FETCH_ASSOC);
    $total_opcionais = @count($res10); 
 
    for($i10=0; $i10 < $total_opcionais; $i10++){    
        foreach ($res10[$i10] as $key => $value){}
         $opc = $res10[$i10]['nome'];
         $id_opc = $res10[$i10]['id'];
         $obrigatorio = $res10[$i10]['obrigatorio'];
         $qtd_minima = $res10[$i10]['qtd_minima'];
         $tipo = $res10[$i10]['tipo'];
         $qtd_maxima = $res10[$i10]['qtd_maxima'];
         $qtd_minima = $res10[$i10]['qtd_minima'];   

        
        ////////////////// IDENTIFICADORES //////////////////


            $OpcionalKey = 'OpcionalKey'.$id_opc;
            $OpcionalQtdValue = 'OpcionalQtdValue'.$id_opc;
            $OpcionalQtdTotalTxt = 'OpcionalQtdTotalTxt'.$id_opc;

            $CheckBoxVerifyKey = 'CheckBoxVerifyKey'.$id_opc;

            $plusCategoriaKey= 'plusCategoriaKey'.$id_opc;

            $OpcKeyObrigatorio = 'OpcKeyObrigatorio'.$id_opc;
            $OpcKeyObrigatorioOK = 'OpcKeyObrigatorioOK'.$id_opc;
        
        ///////////////////////////////////////////////////    
         
        if($qtd_maxima == 1){
            $textotituloopc = "opção"; 
        }else{
            $textotituloopc = "opções";   
        };      


          $query11 =$pdo->query("SELECT * FROM opcionais_itens where opcional = '$id_opc'  and ativo = 'Sim'");
          $res11 = $query11->fetchAll(PDO::FETCH_ASSOC);
          $total_itens_opcionais = @count($res11);

  //-------------------------------------------------------------------------------------------------------------------//
 //----------------------------------------- SOMANDO QUANTIDADE DE OPCIONAIS -----------------------------------------//
//-------------------------------------------------------------------------------------------------------------------//

                    $a = 1;
                    $opc_selecionados = 0;
                    $SomaTotalAdicionado = 0;


                for($i11=0; $i11 < $total_itens_opcionais; $i11++){    
                    foreach ($res11[$i11] as $key => $value){}
                                 $id_Item = $res11[$i11]['id'];

//-------------------------------------------------------------------------------------------------------------------------------------------//
                            
                            $query12 =$pdo->query("SELECT qtd_adicionada FROM temp where sessao = '$sessao' and id_item = '$id_Item' and tabela = 'opcionais' and carrinho = '0'");
                            $res9 = $query12->fetchAll(PDO::FETCH_ASSOC);  
                            $ssssss = $query12->fetchColumn(); 
                            $total_ressg8 = @count($res9); 

                                if($total_ressg8 > 0){                     
                                    foreach($res9 as $contas){
                                        $SomaTotalAdicionado += $res9[0]["qtd_adicionada"];
                                    }                                                                                  
                                }

 //-------------------------------------------------------------------------------------------------------------------------------------------//                                                   
                            $query55 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id_Item' and tabela = 'opcionais' and carrinho = '0'");
                            $res12 = $query55->fetchAll(PDO::FETCH_ASSOC);  
                            $total_reg8 = @count($res12);  

                            foreach ($res12 as $value){    
                                   $quantidade_adicionada = $a++;
                                // $opc_selecionados = $a++;      
                            }                                          
                }      

                        if($SomaTotalAdicionado > 0){
                            $quantidade_adicionada = $SomaTotalAdicionado;       
                        }else{              
                            $quantidade_adicionada = 0;               
                        }
                        
                            



//////////////////////////////////////////////-[ EDITANDO ]-//////////////////////////////////////////////

                
            echo <<<HTML


                       
                <div class="divCabecalhoOpc rubik-family">
                    <div style="width: 60%; display: inline-block; padding: 15px">               
                        <div><span style="font-weight:500; font-size: 18px;">{$opc}</span></div>
                        <input id="{$OpcionalQtdValue}" type="hidden" value="{$quantidade_adicionada}">    
                 
                HTML;

                if($qtd_maxima > 0){
                  echo <<<HTML
                    <span id="quantidademaxradio" style="font-size: 14px; font-weight:400;">Escolha até <span id="quantidademaxradio">{$qtd_maxima} {$textotituloopc}</span></span> 

                  HTML;
                }

                if ($qtd_minima == 0){

                    echo <<<HTML
                        
                     </div> 
                    
                    HTML;   

                }    

                if ($qtd_minima > 0){

                    echo <<<HTML
                        <br>
                        <span id="quantidademaxradio" style="font-size: 14px; font-weight:400;"><span id="{$OpcionalQtdTotalTxt}">{$quantidade_adicionada}</span> de  {$qtd_minima}</span> 
                        
                    HTML;

                    if ($quantidade_adicionada  >= $qtd_minima){
                                $obrigatorioStyle = 'none';
                                $obrigatorioStyleOK = ''; 
                                $VALUEKeyObrigatorioOK = '1';                 
                    }else{
                                $obrigatorioStyle = '';
                                $obrigatorioStyleOK = 'none';
                                $VALUEKeyObrigatorioOK = '0';
                    }    

                                echo <<<HTML
                                   
                                    </div>


                                    <div style="width: 35%; display: inline-block; padding: 25px 0 25px 0" class="divObrigIdent">                 
                                            <span id="{$OpcKeyObrigatorio}" class="obrigKO" style="display: {$obrigatorioStyle}; background-color: rgb({$corTema});">Item Obrigatório</span>     
                                            <span id="{$OpcKeyObrigatorioOK}" class="obrigOK" style="display: {$obrigatorioStyleOK}">   
                                                <i style="color: #fff; font-size: 17px;"class="fa-solid fa-check" ></i>
                                            </span>
                                    </div>
                                HTML;
                              
                }
    
        
        echo <<<HTML

            </div>
        
        HTML;



        for($i11=0; $i11 < $total_itens_opcionais; $i11++){    
           foreach ($res11[$i11] as $key => $value){}
             $nome_opc = $res11[$i11]['nome'];
             $valoropc = $res11[$i11]['valor'];
             $id_Item = $res11[$i11]['id'];
             $valoropcF = number_format($valoropc, 2, ',', '.');

            
            
             
////////////////////////////////-[ IDENTIFICACOES PARA ITEM ]-////////////////////////////////

                $numRandom = rand(10,10000);
                $item_Key = 'keyItem'.$numRandom.'ID'.$id_Item;

                $input_Opc_Id_Key = 'iptKeyOpcItem'.$id_Item;
                $txt_Opc_Id_Key = 'textKeyOpcItem'.$id_Item;

                // Botoes do item
                $lixeira_opc = 'lixeira'.$id_Item;
                $menos_opc = 'menos'.$id_Item;
                
                $Item_opc_key_radio = 'keyOpcionalRadio'.$id_Item;





//--------------------------------------------------[ CHECKBOX - ATIVA / DESATIVA]--------------------------------------------------//
    $query9 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id_Item' and tabela = 'opcionais' and carrinho = '0'");
    $res6 = $query9->fetchAll(PDO::FETCH_ASSOC);  
    $total_reg8 = @count($res6);


                if($total_reg8 > 0){

                    $status_checkbox = ''; 

                    $qtdItensAdicionados = $res6[0]['qtd_adicionada'];
                    $valueradio = '1';
                    $check = 'checked';
                    $acao = 'Ativo';    
                    $titulo_link = 'Remover Adicional';
                    
                    $valor_item_prod += $valoropc;

                }else{

                    if($qtd_maxima > 0){
                        if($quantidade_adicionada >= $qtd_maxima){
                            $status_checkbox = 'disabled'; 
                        }else{
                            $status_checkbox = '';
                        }
                    }

                    $qtdItensAdicionados = 0;
                    $valueradio = '0';
                    $check = '';
                    $acao = 'Desativado'; 
                    $titulo_link = 'Escolher Adicional';
                }

///////////////////// CONDIÇÕES PARA EXIBIÇÃO DE OPÇÕES ADICIONAIS /////////////////////
    
        echo <<<HTML
  
            <div id="divListagemItens" class="divListagemItens rubik-family" >

                    <div id="clickDiv" class="btn-ripple clickDiv"  data-itemid="{$item_Key}"  data-tipo="{$tipo}" data-adicionais="{$plusCategoriaKey}"></div>

                    <div class="divInfosItem flex flex-col color-505d69">
                        <span class="nomeItem">{$nome_opc}</span>                          
                        <span class="precoItem ">+ R$ {$valoropc}</span>
                    </div>

                    <div class="divBotoesItens flex flex-row align-center justify-space-between">

        HTML; 

    if($tipo == 'Opcional'){
        echo <<<HTML
            <input id="{$item_Key}" class="{$CheckBoxVerifyKey}"  style="background: rgb({$corTema}), #fff;" type="checkbox"  onclick="opcionais('{$item_Key}', '{$qtd_minima}','{$qtd_maxima}', '{$total_opcionais}', '{$id_Item}', '{$acao}', '{$OpcionalQtdValue}', '{$OpcionalQtdTotalTxt}', '{$CheckBoxVerifyKey}' , '{$OpcKeyObrigatorio}', '{$OpcKeyObrigatorioOK}', '{$id_opc}', '{$valoropc}')"  {$check} {$status_checkbox}>     
        HTML;
                
    }else if($tipo == 'Unico'){
                                                                                                                                                                                                                           
        echo <<<HTML

            <input id="{$item_Key}"  class="radioopcionais"  name="{$OpcionalKey}"  value="{$valueradio}" type="radio" onclick="opcionaisRadio('{$id_Item}', '{$OpcKeyObrigatorio}', '{$OpcKeyObrigatorioOK}','{$item_Key}', '{$id_opc}', '{$OpcionalKey}', '{$valoropc}', '{$qtd_minima}','{$qtd_maxima}')" {$check}>

            <input data-categoriaId="{$OpcionalKey}" data-distinct="{$item_Key}" data-valoritem="{$valoropc}" value="{$valueradio}" type="hidden"> 

        HTML;

    }else{

    if ($qtdItensAdicionados==0) {
        $lxr='none';
        $mns='none';
        $nmr='none';
    }elseif($qtdItensAdicionados==1) {
        $lxr='';
        $mns='none';
        $nmr='';
    }else{
       $lxr='none';
       $mns='';
       $nmr='';
    } 

        //////////////////// MUDAR PARA UNIVERSAL //////////
    if($qtd_maxima > 0){
        if($quantidade_adicionada >= $qtd_maxima){
            $plus_color = '87, 87, 87, 0.5';
            $pointEvent = 'none';
        }else{
            $plus_color = $corTema;
            $pointEvent = 'auto';
        }
    }else{
        $pointEvent = 'auto';
    }

                echo <<<HTML


   
                                    <span id="{$lixeira_opc}" data-lixeiraAdicionais="{$lixeira_opc}" style="display: {$lxr}; color: rgb({$corTema});" onclick="mudarQuantOpc('menos', '{$id_Item}' , '{$input_Opc_Id_Key}', '{$txt_Opc_Id_Key}', '{$lixeira_opc}','{$menos_opc}', '{$valoropc}', '{$OpcionalQtdValue}', '{$OpcionalQtdTotalTxt}', '{$plusCategoriaKey}', '{$id_opc}', '{$qtd_minima}', '{$qtd_maxima}', '{$OpcKeyObrigatorio}', '{$OpcKeyObrigatorioOK}')">
                                        <i class="lixeira-adc fa-solid fa-trash" style="font-size: 15px; "></i>
                                    </span>
                

                                    <span id="{$menos_opc}" data-menosAdicionais="{$menos_opc}" style="display: {$mns}; color: rgb({$corTema});" onclick="mudarQuantOpc('menos', '{$id_Item}' , '{$input_Opc_Id_Key}', '{$txt_Opc_Id_Key}', '{$lixeira_opc}','{$menos_opc}', '{$valoropc}', '{$OpcionalQtdValue}', '{$OpcionalQtdTotalTxt}', '{$plusCategoriaKey}', '{$id_opc}', '{$qtd_minima}', '{$qtd_maxima}', '{$OpcKeyObrigatorio}', '{$OpcKeyObrigatorioOK}')">
                                        <i class="btnMenos fa-solid fa-minus" style="font-size: 20px"></i>
                                    </span>


                                    <input id="{$input_Opc_Id_Key}" type="hidden"  value="{$qtdItensAdicionados}"> 
                                    <span id="{$txt_Opc_Id_Key}" class="quantItemAdicionada" style="display: {$nmr};">{$qtdItensAdicionados}</span>


                                    <span id="{$item_Key}" data-adicionais="{$plusCategoriaKey}"  style="color: rgb({$plus_color}); pointer-events: {$pointEvent}" data-dados='["mais", "{$id_Item}"]' onclick="mudarQuantOpc('mais', '{$id_Item}' , '{$input_Opc_Id_Key}', '{$txt_Opc_Id_Key}', '{$lixeira_opc}','{$menos_opc}', '{$valoropc}', '{$OpcionalQtdValue}', '{$OpcionalQtdTotalTxt}', '{$plusCategoriaKey}', '{$id_opc}', '{$qtd_minima}', '{$qtd_maxima}', '{$OpcKeyObrigatorio}', '{$OpcKeyObrigatorioOK}', '{$item_Key}')"> 
                                        <!-- <input id="{$item_Key}" type="text" > -->
                                        <i class="btnMais fa-solid fa-plus"></i>
                                    </span>
                                </span>

                HTML;

        }
    
        echo <<<HTML

                </div> 

          </div> 

        HTML;

    }  

}

  //-------------------------------------------------------------------------------------------------------//
 //--------------------------------------- FIM LISTANDO OPCIONAIS ----------------------------------------//
//-------------------------------------------------------------------------------------------------------//

?>

    
    <div class="destaque-qtd rubik-family">
        <div class="flex mg-b-5px">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#505d69" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z"/>
            </svg>
            <b class="mg-l-5px " style="color: #505d69; padding-bottom:5px"> Alguma Observação?</b>
        </div>
            <div class="" >
                <textarea type="text" class="form-control widthPerc100" id="obs" maxlength="255" name="obs" placeholder="Ex: Retirar cebola, ponto da carne etc"></textarea>
            </div>	
    </div>

<br>






<?php
  //-------------------------------------------------------------------------------------------------------------------//
 //-------------------------------------------------- CÁLCULO FINAL --------------------------------------------------//
//-------------------------------------------------------------------------------------------------------------------//
$pointer_event = "auto";
$bckg_color = "#cd4349";


$query13 =$pdo->query("SELECT * FROM opcionais where produto = '$id_prod'  and qtd_minima > 0 and ativo = 'Sim'");
$res13 = $query13->fetchAll(PDO::FETCH_ASSOC);
$total_obrigatorios = @count($res13);

$itens_Obg_temp = 0;
$QtdobrigatoriaAdicionada = 0;
for($i12=0; $i12 < $total_obrigatorios; $i12++){    
    foreach ($res13[$i12] as $key => $value){}
        $opc = $res13[$i12]['id'];
        $qtd_minima = $res13[$i12]['qtd_minima'];
        $tipo = $res13[$i12]['tipo'];



                if($tipo != "Adicional"){

                        $query15 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_opcional = '$opc' and carrinho = '0'");
                        $res15 = $query15->fetchAll(PDO::FETCH_ASSOC);  
                        $total_reg9 = @count($res15);
                       
                        $c = 1;        
                        if($total_reg9 > 0){                       
                            foreach($res15 as $value){
                                            $itens_Obg_temp = $c++;         
                            }
                        }else {
                            $itens_Obg_temp = 0; 
                        }
                                              
                        if($itens_Obg_temp >= $qtd_minima  ){
                                $calc_tt = 1;
                        }else{
                            $calc_tt = 0;
                        }
                    
                 $QtdobrigatoriaAdicionada +=  $calc_tt;

                }else{

                    $query16 =$pdo->query("SELECT SUM(qtd_adicionada) FROM temp where sessao = '$sessao' and id_opcional = '$opc' and carrinho = '0'");
                    $sssssss = $query16->fetchColumn();

                    if($sssssss >= $qtd_minima  ){
                            $calc_tt = 1;
                    }else{
                        $calc_tt = 0;
                    }
                
                  $QtdobrigatoriaAdicionada +=  $calc_tt;
       
                }  


    if($QtdobrigatoriaAdicionada >= $total_obrigatorios){
        $pointer_event = "auto";
        $btnAdcOpacity = 1;
        $btnBackgroundColor = '#cd4349';

    }else{
        $pointer_event = "none";
        $btnBackgroundColor = '#cd4349';
        $btnAdcOpacity = 0.3;
    }
                                   
}


?>


<input id="QuantidadeObrigatoria" type="hidden" value="<?php echo $total_obrigatorios?>">
<input id="SomaFinalObrigatoriedade" type="hidden" value="<?php echo $QtdobrigatoriaAdicionada?>">

<br><br><br>

  <!----------------------------------------------------------------------------------------------------------------------
   -------------------------------------------------- FIM CÁLCULO FINAL --------------------------------------------------
  ----------------------------------------------------------------------------------------------------------------------->


<div class="div_btn_adc rubik-family" >
  
  <div class="final_adc_carrinho">

              <div class="adc_qtd_btn">
                  
                     <span id="minos_btn" class="minos_btn" onclick="mudarQuantProd('menos', <?php echo $valor ?>)">
                          <span id="minusicon">
                              <i class="fa-solid fa-minus fa-lg"></i>
                          </span>
                      </span>

                      <div class="num_result">
                          <span id="qtdprodTexto" class="qtdprodTexto">1</span>
                          <input id="quantProd" type="hidden" value="1">
                      </div>
                      
                      <span class="plus_btn" onclick="mudarQuantProd('mais', <?php echo $valor ?>)">    
                              <span id="plusicon">
                                  <i class="fa-solid fa-plus fa-lg"></i>
                              </span>                
                      </span>
              </div>

              <div id="btn_adc_carrinho" style="<?php echo 'pointer-events:'.$pointer_event.'; background-color:'.$corTema.'; opacity:'.$btnAdcOpacity ?>;"  onclick="finalizarItem()">

                  <h6 class="texto_btn_adc font-sz-16"><?php echo $texto_botao ?></h6>









<?php


        

///////////////////////////////////////////// BUSCAR OPCIONAIS /////////////////////////////////////
$query14 =$pdo->query("SELECT * FROM opcionais where produto = '$id_prod' and ativo = 'Sim'");
$res14 = $query14->fetchAll(PDO::FETCH_ASSOC);
$total_reg10 = @count($res14);

$vlr_adc = 0;
$itens_Obg_temp = 0;
$QtdobrigatoriaAdicionada = 0;

if ($total_reg10 > 0){
    for($i14=0; $i14 < $total_reg10; $i14++){    
        foreach ($res14[$i14] as $key => $value){}
            $opc = $res14[$i14]['id'];

            $query18 =$pdo->query("SELECT * FROM opcionais_itens where opcional = '$opc'  and ativo = 'Sim'");
            $res16 = $query18->fetchAll(PDO::FETCH_ASSOC);
            $total_reg12 = @count($res16);

                for($i16=0; $i16 < $total_reg12; $i16++){
                    foreach ($res16[$i16] as $key => $value){}

                    $id_Item = $res16[$i16]['id'];   
                    $vlr_adc = $res16[$i16]['valor'];  
                    
                
                        $query17 =$pdo->query("SELECT * FROM temp where sessao = '$sessao' and id_item = '$id_Item' and carrinho = '0'");
                        $res17 = $query17->fetchAll(PDO::FETCH_ASSOC);  
                        $total_reg9 = @count($res17);    
                         
                        if ($total_reg9 > 0){   
                                for($i17=0; $i17 < $total_reg9; $i17++){
                                    foreach ($res17[$i17] as $key => $value){}
                
                                    $qtd_adicionada = $res17[$i17]['qtd_adicionada'];   
                            
            
                                $vlr_total_itens = $vlr_adc * $qtd_adicionada;
  
                               
                                       
                                $valor_do_produto += $vlr_total_itens;



                                }  
                        }             
                            
                }        

    }

}

    $vp_f = number_format($valor_do_produto, 2, ',', '.');  
 
?>           

<!--//////////////////////////////////////////////   ARMAZENA O TOTAL DE CAUCULO DE ADICIONAIS   //////////////////////////////////////////////-->

            <input id="save_valor_total_adc_ipt" type="hidden"  value="<?php echo $valor_do_produto?>">
            <input id="valorTotal" type="hidden" value="<?php echo $valor_do_produto?>">
            <span id="show_valor_total_adc_txt" class="texto_btn_adc_vlr">R$ <?php echo $vp_f ?></span>

        </div>


    </div>
    
</div>

</div>

</body>
</html>
















<script type="text/javascript">


function mudarQuantOpc(acao_opc, id_Item, input_Opc_Id_Key,  txt_Opc_Id_Key, lixeira_opc, menos_opc, valoropc, OpcionalQtdValue, OpcionalQtdTotalTxt, plusCategoriaKey, id_opc, qtd_minima, qtd_maxima, OpcKeyObrigatorio, OpcKeyObrigatorioOK, item_Key){

        if(item_Key){

           let array = document.getElementById(item_Key).dataset.dados;
           const dados = JSON.parse(array);
           let a = dados[1];

           console.log(a)

        }

    
                        //////////////////////////// VARIÁVEIS CORINGAS /////////////////////////////
                        var valor_do_produto = <?php echo $valor_do_produto?>;
                        var quantidade_adicionada = document.getElementById(input_Opc_Id_Key).value;

                        // total somado dos itens de cada adicional/opcional
                        var QuantTotalAdicionada =  document.getElementById(OpcionalQtdValue).value;
                        //////////////////////////////////////////////////////////////////////////

                        var QuantidadeObrigatoria = document.getElementById('QuantidadeObrigatoria').value;
                        var SomaFinalObrigatoriedade = document.getElementById('SomaFinalObrigatoriedade').value;

                    if (acao_opc == 'mais'){     
                        
                            /////////////////////// AUMENTANDO QUANTIDADE DE ADICIONAIS ///////////////////////
                                var soma_quantide_adc = parseInt(quantidade_adicionada) + parseInt(1);

                            ///////////////////// AUMENTANDO QUANTIDADE TOTAL ///////////////////////
                                var totaladicionado = parseInt(QuantTotalAdicionada) + parseInt(1);        

                                if(totaladicionado == qtd_minima){
                                   var SomaFinalObrigatoriedade = parseInt(SomaFinalObrigatoriedade) + parseInt(1);
                                   document.getElementById('SomaFinalObrigatoriedade').value = SomaFinalObrigatoriedade;    

                                        document.getElementById(OpcKeyObrigatorio).style.display = "none";
                                        document.getElementById(OpcKeyObrigatorioOK).style.display = "inline";    
                                }


                            if(totaladicionado < qtd_maxima){
    
                                document.getElementById(OpcionalQtdValue).value = totaladicionado;

                                if(qtd_minima > 0){  
                                document.getElementById(OpcionalQtdTotalTxt).innerHTML = totaladicionado;
                                } 

                                document.getElementById(input_Opc_Id_Key).value = soma_quantide_adc;
                                document.getElementById(txt_Opc_Id_Key).innerHTML = soma_quantide_adc;

                            }else if(totaladicionado == qtd_maxima){



                                document.getElementById(OpcionalQtdValue).value = totaladicionado;

                                if(qtd_minima > 0){
                                    document.getElementById(OpcionalQtdTotalTxt).innerHTML = totaladicionado;
                                }

                                let divAdd = document.querySelectorAll('div[data-adicionais="'+plusCategoriaKey+'"]');
            
                                divAdd.forEach(function(div){                                  
                                    div.style.pointerEvents = 'none'; 
                                });

                                let plusBTN = document.querySelectorAll('span[data-adicionais="'+plusCategoriaKey+'"]');
                                    
                                    plusBTN.forEach(function(el){                                  
                                        el.style.color = '#b4b4c2';
                                        el.style.pointerEvents = 'none'; 
                                });

                                
                                
                                
                                
                                    


                                $("#"+input_Opc_Id_Key).val(soma_quantide_adc)
                                $("#"+txt_Opc_Id_Key).text(soma_quantide_adc)

                            }else if(totaladicionado > qtd_maxima){    
                                
                                
                                let divAdd = document.querySelectorAll('div[data-adicionais="'+plusCategoriaKey+'"]');
                                    divAdd.forEach(function(div){                                  
                                        div.style.pointerEvents = 'none'; 
                                });

                                let plusBTN = document.querySelectorAll('span[data-adicionais="'+plusCategoriaKey+'"]');

                                plusBTN.forEach(function(x){
                                    x.style.color = '#b4b4c2';
                                    x.style.pointerEvents = 'none';        
                                });     

                            }

                            ///////////////////// VALOR TOTAL DE CADA ADICIONAL /////////////////////
                            var soma_Quant_Opc =  valoropc * soma_quantide_adc; // CORRETO
                            ////////////////////  VALOR DO PRODUTO COM ADICIONAL   ////////////////////
                            
                            var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());

                            var soma_Final_opc = parseFloat(vlr_adc_ipt) + parseFloat(valoropc);
                            
                            var FinalSoma = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
                            var vlr_final_prod_adc = soma_Final_opc.toFixed(2);

                            $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
                            $("#valorTotal").val(vlr_final_prod_adc);
                            $("#show_valor_total_adc_txt").text(FinalSoma);  
                            /////////////////////////////////////////////////////////////////////
    
                            if (quantidade_adicionada==0) {
                                //$("#"+lixeira_opc).show(); 
                                document.querySelector('span[data-lixeiraAdicionais="'+lixeira_opc+'"]').style.display = 'inline'; 

                                $("#"+menos_opc).hide();


                                $("#"+txt_Opc_Id_Key).show();

                            }else if(quantidade_adicionada==1){
                                //$("#"+lixeira_opc).hide();
                                document.querySelector('span[data-lixeiraAdicionais="'+lixeira_opc+'"]').style.display = 'none';

                                $("#"+menos_opc).show();

                            }else {
                                $("#"+menos_opc).show();
                               
                                //$("#"+lixeira_opc).hide();  
                                document.querySelector('span[data-lixeiraAdicionais="'+lixeira_opc+'"]').style.display = 'none';

                            }
        
                    }else{
                      

                            ////////////////// DIMINUINDO QUANTIDADE DE ADICIONAIS //////////////////
                            var soma_quantide_adc = parseInt(quantidade_adicionada) - parseInt(1);
                            $("#"+input_Opc_Id_Key).val(soma_quantide_adc)
                            $("#"+txt_Opc_Id_Key).text(soma_quantide_adc)                    
                            
                            ///////////////////// AUMENTANDO QUANTIDADE TOTAL ///////////////////////
                            var totaladicionado = parseInt(QuantTotalAdicionada) - 1;
                            document.getElementById(OpcionalQtdValue).value = totaladicionado;
                            //////////////////////////////////////////////////////////////////////

                            var sadwr = parseInt(qtd_minima) - parseInt(1); 
                            if(totaladicionado == sadwr){

                                   var SomaFinalObrigatoriedade = parseInt(SomaFinalObrigatoriedade) - parseInt(1);
                                   document.getElementById('SomaFinalObrigatoriedade').value = SomaFinalObrigatoriedade;   
                                   
                                   if(qtd_minima > 0){
                                   document.getElementById(OpcKeyObrigatorio).style.display = "inline";
                                   document.getElementById(OpcKeyObrigatorioOK).style.display = "none"; 
                                   }
                            }


                            if(totaladicionado < qtd_maxima){
     
                                document.getElementById(OpcionalQtdValue).value = totaladicionado;

                                if(qtd_minima > 0){
                                document.getElementById(OpcionalQtdTotalTxt).innerHTML = totaladicionado;
                                }
                                
                                document.getElementById(input_Opc_Id_Key).value = soma_quantide_adc;
                                document.getElementById(txt_Opc_Id_Key).innerHTML = soma_quantide_adc;

                                        let divAdd = document.querySelectorAll('div[data-adicionais="'+plusCategoriaKey+'"]');
                                            divAdd.forEach(function(div){                                  
                                                div.style.pointerEvents = 'auto'; 
                                        });

                                        let plusBTN = document.querySelectorAll('span[data-adicionais="'+plusCategoriaKey+'"]');
                                        plusBTN.forEach(function(e){                                  
                                            e.style.color = '#363636';
                                            e.style.pointerEvents = 'auto';   
                                        });
                            }
                           
                            ///////////////////// VALOR TOTAL DE CADA ADICIONAL /////////////////////
                        
                            var soma_Quant_Opc =  valoropc * soma_quantide_adc; // CORRETO

                            ////////////////////  VALOR DO PRODUTO COM ADICIONAL   ////////////////////
                            var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());  
                            var soma_Final_opc = parseFloat(vlr_adc_ipt) - parseFloat(valoropc);
                     
                            var ss = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });                            
                            var vlr_final_prod_adc = soma_Final_opc.toFixed(2);
                
                            $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc); 
                            $("#valorTotal").val(vlr_final_prod_adc);  
                            $("#show_valor_total_adc_txt").text(ss);  


                            
                            if (quantidade_adicionada==1){
                                //$("#"+lixeira_opc).hide();
                                document.querySelector('span[data-lixeiraAdicionais="'+lixeira_opc+'"]').style.display = 'none';  
                                $("#"+menos_opc).hide();
                                $("#"+txt_Opc_Id_Key).hide();
                            }else if(quantidade_adicionada==2){
                                //$("#"+lixeira_opc).show();
                                document.querySelector('span[data-lixeiraAdicionais="'+lixeira_opc+'"]').style.display = 'inline';  
                                $("#"+menos_opc).hide();
                            }else {
                                $("#"+menos_opc).show();
                                //$("#"+lixeira_opc).hide();
                                document.querySelector('span[data-lixeiraAdicionais="'+lixeira_opc+'"]').style.display = 'none';   
                            }


                    }


                    if(qtd_minima > 0){
                            if(SomaFinalObrigatoriedade >= QuantidadeObrigatoria){
                                document.getElementById('btn_adc_carrinho').style.opacity = 1;
                                document.getElementById('btn_adc_carrinho').style.pointerEvents = 'auto';
                            }else{
                                document.getElementById('btn_adc_carrinho').style.opacity = 0.3;
                                document.getElementById('btn_adc_carrinho').style.pointerEvents = 'none';
                            }
                    }        



            $.ajax({
                url: 'js/ajax/mudar_Quant_Opcionais.php',
                method: 'POST',
                data: {id_Item, acao_opc, soma_Quant_Opc, id_opc},
                dataType: "text",
                success: function (result) {  

                                

                },      

            });



}




function opcionais(item_Key, qtd_minima, qtd_maxima, total_opcionais, id_Item, acao, OpcionalQtdValue, OpcionalQtdTotalTxt, CheckBoxVerifyKey, OpcKeyObrigatorio,  OpcKeyObrigatorioOK, id_opc, valoropc){

 
    var chkbox = document.getElementById(item_Key).checked;
    var qtd_adc_opc = document.getElementById(OpcionalQtdValue).value; 



    if(chkbox == true){


            var qtd_adicionada = parseInt(qtd_adc_opc) + 1;

            document.getElementById(OpcionalQtdValue).value = qtd_adicionada;

            if(qtd_minima > 0){
            document.getElementById(OpcionalQtdTotalTxt).innerHTML = qtd_adicionada;
            }

                if(qtd_adicionada >= qtd_maxima){   
                        document.querySelectorAll('input[class="'+CheckBoxVerifyKey+'"]:not(:checked)').forEach((element) => {
                            element.disabled = true;});             
                }

            var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());
            var soma_Final_opc = parseFloat(vlr_adc_ipt) + parseFloat(valoropc); 
            var FinalSoma = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            var vlr_final_prod_adc = soma_Final_opc.toFixed(2);
            $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
            $("#valorTotal").val(vlr_final_prod_adc);
            $("#show_valor_total_adc_txt").text(FinalSoma);   


    }else{

            var qtd_adicionada = parseInt(qtd_adc_opc) - 1;

            document.getElementById(OpcionalQtdValue).value = qtd_adicionada;

            if(qtd_minima > 0){
            document.getElementById(OpcionalQtdTotalTxt).innerHTML = qtd_adicionada;
            }
 
            document.querySelectorAll('input[class="'+CheckBoxVerifyKey+'"]:not(:checked)').forEach((element) => {
            element.disabled = false;});
            
            
            var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());
            var soma_Final_opc = parseFloat(vlr_adc_ipt) - parseFloat(valoropc); 
            var FinalSoma = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            var vlr_final_prod_adc = soma_Final_opc.toFixed(2);
            $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
            $("#valorTotal").val(vlr_final_prod_adc);
            $("#show_valor_total_adc_txt").text(FinalSoma); 

    }

   



           var ObrigatorioQtd = document.getElementById('SomaFinalObrigatoriedade').value;
           var qtd_minimaEDT = parseInt(qtd_minima) - parseInt(1);

           // Ativa e desativa 
            if(qtd_minima > 0){
                if(qtd_adicionada == qtd_minima  && chkbox == true){

                    var ObrigatorioQtdF = parseInt(ObrigatorioQtd) + parseInt(1);
                    document.getElementById('SomaFinalObrigatoriedade').value = ObrigatorioQtdF;

                    document.getElementById(OpcKeyObrigatorio).style.display = "none";
                    document.getElementById(OpcKeyObrigatorioOK).style.display = "inline";
                }
    
                if(qtd_adicionada == qtd_minimaEDT && chkbox == false){

                    var ObrigatorioQtdF = parseInt(ObrigatorioQtd) - parseInt(1);
                    document.getElementById('SomaFinalObrigatoriedade').value = ObrigatorioQtdF;
    
                    document.getElementById(OpcKeyObrigatorio).style.display = "inline";
                    document.getElementById(OpcKeyObrigatorioOK).style.display = "none";        
                }
            }

            var SomaFinalObrigatoriedade = document.getElementById('SomaFinalObrigatoriedade').value;
            var QuantidadeObrigatoria = document.getElementById('QuantidadeObrigatoria').value;
           

           // Ativa e desativa o botao de adicionar ao carrinho
            if(qtd_minima > 0){
                if(SomaFinalObrigatoriedade >= QuantidadeObrigatoria){
                        document.getElementById('btn_adc_carrinho').style.opacity = 1;
                        document.getElementById('btn_adc_carrinho').style.pointerEvents = 'auto';
                    }else{
                        document.getElementById('btn_adc_carrinho').style.opacity = 0.3;
                        document.getElementById('btn_adc_carrinho').style.pointerEvents = 'none';
                    }
            }



   $.ajax({
        url: 'js/ajax/opcionais.php',
        method: 'POST',
        data: {id_Item, acao, chkbox, id_opc},
        dataType: "text",

        success: function (mensagem) {  
           
   
                  
            if (mensagem.trim() == "Alterado com Sucesso") {                
                              
            } 

        },      

    });

}





function opcionaisRadio(id_Item, OpcKeyObrigatorio,  OpcKeyObrigatorioOK, item_Key, id_opc, OpcionalKey, valoropc, qtd_minima, qtd_maxima){

    var radio_value = document.getElementById(item_Key).value;
 


   // Verifica se tem algum item  selecionado
    var CheckIfWasValue = document.querySelectorAll('input[name="'+OpcionalKey+'"][value="1"]').length; 

        if(CheckIfWasValue > 0){ 
            var ValorAntigoSelecionado = document.querySelector('input[data-categoriaId="'+OpcionalKey+'"][value="1"]').dataset.valoritem;
        }

        if(radio_value == 0){
            document.getElementById(item_Key).checked = true;
            document.getElementById(item_Key).value = 1; 

            document.querySelector('input[data-distinct='+item_Key+']').value = 1; 

        }else{
            document.getElementById(item_Key).checked = false;
            document.getElementById(item_Key).value = 0;

            document.querySelector('input[data-distinct='+item_Key+']').value = 0;

        }  



// define os outros radios que não sejam 'item_Key' com o valor 0
document.querySelectorAll('input[name="'+OpcionalKey+'"]:not([id='+item_Key+'])').forEach((element) => {
    element.value = '0';
});

// define os outros radios que não sejam 'item_Key' com o valor 0
let catId = document.querySelectorAll('input[data-categoriaId="'+OpcionalKey+'"]:not([data-distinct='+item_Key+'])');

catId.forEach((element) => {    
        element.value = '0';
    });   




// Total de itens que tem a quantidade obrigatoria
        var SomaFinalObrigatoriedade = document.getElementById('SomaFinalObrigatoriedade').value; 
// Verifica se o item está checked
        var radixxxo_vsalue = document.getElementById(item_Key).checked; 


/// Soma opcional selecionado com o valor adicionado
        if(CheckIfWasValue == 0 && radixxxo_vsalue == true){

            if(qtd_minima > 0){
                var SomaFinalObrigatoriedade = parseInt(SomaFinalObrigatoriedade) + parseInt(1);
                document.getElementById('SomaFinalObrigatoriedade').value = SomaFinalObrigatoriedade;    
            }

            var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());
            var soma_Final_opc = parseFloat(vlr_adc_ipt) + parseFloat(valoropc); 
            var FinalSomaBRL = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            var vlr_final_prod_adc = soma_Final_opc.toFixed(2);
            
            $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
            $("#valorTotal").val(vlr_final_prod_adc);
            $("#show_valor_total_adc_txt").text(FinalSomaBRL);

        }else if(CheckIfWasValue == 1 && radixxxo_vsalue == true){

           var ValorAntigoSelecionado = parseFloat(ValorAntigoSelecionado);
           var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val()); 
           var SomaAdaptada  =  parseFloat(vlr_adc_ipt) - parseFloat(ValorAntigoSelecionado);
           
           var soma_Final_opc = parseFloat(SomaAdaptada) + parseFloat(valoropc); 

           var FinalSomaBRL = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
           var vlr_final_prod_adc = soma_Final_opc.toFixed(2);
           $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
           $("#valorTotal").val(vlr_final_prod_adc);
           $("#show_valor_total_adc_txt").text(FinalSomaBRL);

        }else if(CheckIfWasValue == 1 && radixxxo_vsalue == false){
         
            if(qtd_minima > 0){
                var SomaFinalObrigatoriedade = parseInt(SomaFinalObrigatoriedade) - parseInt(1);
                document.getElementById('SomaFinalObrigatoriedade').value = SomaFinalObrigatoriedade;    
            }

            var vlr_adc_ipt = Number($("#save_valor_total_adc_ipt").val());
            var soma_Final_opc = parseFloat(vlr_adc_ipt) - parseFloat(valoropc); 
            var FinalSomaBRL = soma_Final_opc.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
            var vlr_final_prod_adc = soma_Final_opc.toFixed(2);
            $("#save_valor_total_adc_ipt").val(vlr_final_prod_adc);
            $("#valorTotal").val(vlr_final_prod_adc);
            $("#show_valor_total_adc_txt").text(FinalSomaBRL);

            

        }




       // Ativa e desativa o botao de adicionar ao carrinho
            var QuantidadeObrigatoria = document.getElementById('QuantidadeObrigatoria').value;
            if(qtd_minima > 0){
                if(SomaFinalObrigatoriedade >= QuantidadeObrigatoria){
                    document.getElementById('btn_adc_carrinho').style.opacity = 1;
                    document.getElementById('btn_adc_carrinho').style.pointerEvents = 'auto';
                }else{
                    document.getElementById('btn_adc_carrinho').style.opacity = 0.3;
                    document.getElementById('btn_adc_carrinho').style.pointerEvents = 'none';
                }
            }
          
       // Mostra e oculta o Identificador de item obrigatoriio
             var radio_check = document.getElementById(item_Key).checked;
            
            if(qtd_minima > 0){
                if(radio_check == true){
                        document.getElementById(OpcKeyObrigatorio).style.display = "none";
                        document.getElementById(OpcKeyObrigatorioOK).style.display = "inline";
                }else{
                    document.getElementById(OpcKeyObrigatorio).style.display = "inline";
                    document.getElementById(OpcKeyObrigatorioOK).style.display = "none";
                }
            } 
            

           
        var new_value = document.getElementById(item_Key).value;



        $.ajax({
            url: 'js/ajax/opcionais_radio.php',
            method: 'POST',
            data: {id_Item, new_value, id_opc},
            dataType: "text",
            success: function (mensagem) {  
 
                if (mensagem.trim() == "Alterado com Sucesso") {                
                                
                } 
            },      
        });

}


</script>






















<script type="text/javascript">


	$(document).ready(function() { 
        
        //if(id_adc == id_adc){ 
        //$("#teste").hide();
        //}

    });




///////////////////////////////////////////////////   AUMENTAR QUANTIDADE DO PRODUTO  ///////////////////////////////////////////////////




function mudarQuantProd(acao, valorProduto){



    const quant = document.getElementById('quantProd'); 
    const textQuant = document.getElementById('qtdprodTexto');     

    const inputValorTotal =  document.getElementById('valorTotal');
    const inputValorCalculado =  document.getElementById('save_valor_total_adc_ipt'); 

    const textoValorTotal =  document.getElementById('show_valor_total_adc_txt');

    
        if(acao == 'menos' && quant.value - 1 == 1) {

            document.getElementById('minos_btn').style.opacity = 0.3;

            let novaQuant = parseInt(quant.value) - parseInt(1);
            textQuant.innerHTML  = novaQuant;
            quant.value = novaQuant;

            var totalCalc = parseFloat(inputValorCalculado.value) - parseFloat(valorProduto);


            inputValorCalculado.value = totalCalc;
            textoValorTotal.innerHTML  = totalCalc.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});


        }else if(acao == 'menos' && quant.value >= 2) {

            let novaQuant = parseInt(quant.value) - parseInt(1);
            textQuant.innerHTML  = novaQuant;
            quant.value = novaQuant;

            var totalCalc = parseFloat(inputValorCalculado.value) - parseFloat(valorProduto);

            inputValorCalculado.value = totalCalc;
            textoValorTotal.innerHTML  = totalCalc.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            
            const minusAnim = document.getElementById('minusicon'); 
            minusAnim.classList.add('minusicon');
            setTimeout(() => {
                minusAnim.classList.remove('minusicon');
            }, 250);


        }else if(acao == 'mais'){

            let novaQuant = parseInt(quant.value) + parseInt(1);
            textQuant.innerHTML  = novaQuant;
            quant.value = novaQuant;

            document.getElementById('minos_btn').style.opacity = 1;

            var totalCalc = parseFloat(inputValorTotal.value) * parseFloat(quant.value);

            inputValorCalculado.value = totalCalc;
            textoValorTotal.innerHTML  = totalCalc.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});

            const plusAnim = document.getElementById('plusicon'); 
            plusAnim.classList.add('plusicon');
            setTimeout(() => {
                plusAnim.classList.remove('plusicon');
            }, 250);

        }




   
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







    function finalizarItem(){       
        addCarrinho();
        setTimeout(redirecionarCarrinho, 1000);
    }    


    function redirecionarCarrinho(){
         window.location='carrinho';
    }


//////////////////////////////////////////////////////
    function selecionarSegundo(){
        addCarrinho();
        setTimeout(redirecionarCategoria, 1000);
    }

    function selecionarSegundoPedido(){       
        addCarrinho();
        setTimeout(redirecionarCategoria, 1000);
    }


    function redirecionarCategoria(){
        var url = "<?=$url_itens?>";
         window.location=url;
    }


//////////////////////////-[   PROVAVEL SEM FUNCAO   ]-//////////////////////////

    function redirecionar(){
         window.location='index';
    }




    function addCarrinho(){
        
        var quantidade = $('#quantidade').val();
        var total_item = $('#save_valor_total_adc_ipt').val();
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
                if (mensagem.trim() == "Inserido com Sucesso"){                

                } 

            },      

    });
    }







let divItem = document.querySelectorAll('div[id="clickDiv"]');

divItem.forEach((e)=> { e.addEventListener('click', function(){

    let itemId = e.dataset.itemid;
    let tipo = e.dataset.tipo;

    
    if(tipo == 'Adicional'){
        $('span[id="'+itemId+'"]')[0].click();  
    }else{
        $('input[id="'+itemId+'"]')[0].click();  
    }

    })

})





</script>

<script src="js/EfeitobtnHover.js"></script>


