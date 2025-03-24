<?php
@session_start(); 
require_once("cabecalho.php");
$sessao = @$_SESSION['sessao_usuario'];
$id_usuario = @$_SESSION['id'];

$total_carrinho = 0;
$total_carrinhoF = 0;

$query = $pdo->query("SELECT * FROM carrinho where sessao = '$sessao' and id_sabor = 0");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);

if($total_reg == 0){
  echo "<script>window.location='index'</script>";
  exit();
}else{ 
  for($i=0; $i < $total_reg; $i++){
    $id = $res[$i]['id'];
    $total_item = $res[$i]['total_item'];
    $produto = $res[$i]['produto']; 

    $total_carrinho += $total_item;    
    $total_carrinhoF = number_format($total_carrinho, 2, ',', '.');

  }
}

$esconder_opc_delivery = '';
$valor_entrega = '';
$clicar_sim = '#collapseTwo';
$numero_colapse = '4';

$taxa_entregaF = 0;
$taxa_entrega = 0;

$nome_cliente = "";
$tel_cliente = "";
$rua = "";
$numero = "";
$bairro = "";
$complemento = "";


if($id_usuario != ''){

    $valor_entrega = 'Consumir Local';  
    $tel_cliente = 'Mesa: '.$mesa_pedido;
    $esconder_opc_delivery = 'ocultar';    
    $numero_colapse = '2';
  
}
 ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link rel="stylesheet" href="./css/checkout.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.srmenu.app/domini/main.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.srmenu.app/domini/ux/inputs/ux-input.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.srmenu.app/domini/ux/modals/css/modal.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.srmenu.app/domini/ux/modals/css/dialog.css">
  </head>
  <body>

    <div class="checkout-content">   
      <div class="checkout-header">
          <span><</span>
          <span>Checkout</span>
          <span>x</span>
      </div>
          
      <div class="checkout-container">
    

        <div class="steps">

          <span class="circle active">1</span>

          <span class="circle">2</span>

          <span class="circle">3</span>

          <span class="circle">4</span>

          <div class="progress-bar">
            <span class="indicator"></span>
          </div>

      </div>



          <div class="sx">
            <span class="idt">Identificação</span>
            <span class="idt">Entrega</span>
            <span class="idt">Pagamento</span>
             <span class="idt">Confirmação</span>
          </div>


  <style>
    .sx{
      width: 90%;
      margin-top: 0;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 35px;
    }

    .idt{
      display: flex;
      width: 50px;
      font-size: 12px;
      flex-direction: column;
      align-items: center;
    }
  </style>


  <div id="s1" class="stepSection select-none active cubic-bezier-2s fade bounce-up-open">

          <div class="section" id="section-Step1">
            <div class="ui-input">
                <label class="labelTitle cubic-bezier-2s">Nome</label>
                  <input id="nome" type="text" name="phonenumber" class="appInput cubic-bezier-2s outline-0" maxlength="16"  wfd-id="id0" value="Cleyton">
            </div>
            
              <br>

            <div class="ui-input">
                <label class="labelTitle cubic-bezier-2s">Celular</label>
                  <input id="tel" type="text" data-masktype="phone" name="phonenumber" class="appInput cubic-bezier-2s outline-0" maxlength="15"  wfd-id="id0" value="31984684792">
            </div>
              
          </div>

                  <span id="open">ABRIR</span>
                  <div id="spanwww"></div>


                  <style>

.loader {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      position: relative;
      animation: rotate 1s linear infinite
    }
    .loader::before {
      content: "";
      box-sizing: border-box;
      position: absolute;
      inset: 0px;
      border-radius: 50%;
      border: 5px solid red;
      animation: prixClipFix 3s linear infinite;
      animation-direction: alternate-reverse;


    }

    @keyframes rotate {
      100%   {transform: rotate(360deg)}
    }

    @keyframes prixClipFix {
        0%   {clip-path:polygon(50% 50%,0 0,0 0,0 0,0 0,0 0)}
        25%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 0,100% 0,100% 0)}
        50%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,100% 100%,100% 100%)}
        75%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0 100%,0 100%)}
        100% {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,0 100%,0 0)}
    }


    .loader2 {
  font-size: 48px;
  display: inline-block;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  color: red;
  letter-spacing: 2px;
  position: relative;
  box-sizing: border-box;
}
.loader2::after {
  content: 'Carregando...';
  position: absolute;
  left: 0;
  top: 0;
  color: #fff;
  text-shadow: 0 0 2px #b7b7b7, 0 0 1px #b7b7b7, 0 0 1px #b7b7b7;
  width: 100%;
  height: 100%;
  overflow: hidden;
  box-sizing: border-box;
  animation: animloader 6s linear infinite;
}

@keyframes animloader {
  0% {
    height: 100%;
  }
  100% {
    height: 0%;
  }
}




</style>


<span class="loader"></span>

<span class="loader2">Carregando...</span>

  </div>





        
  <div id="s2" class="stepSection select-none cubic-bezier-2s fade bounce-up-open">


                  <div class="optionContent flex select-none">
                    <div class="optionSelector cubic-bezier-2s " data-deliverymethod="shipping" data-dialogmodal="modaltroco">
                          <div class="selectContent cubic-bezier-2s">
                              <img src="img/shipping.png" class="optionIcon">
                              <div class="flex flex-col">
                                <p class="optionTitle">Entrega</p>
                                <p class="optionSubTitle">Levamos até você</p> 
                              </div>
                            <img src="img/ok.png" class="markOption display-none">
                          </div>
                          <hr class="optionsDivider rubik-family">
                            
                          <div class="optionInfoContent flex flex-row align-center cubic-bezier-2s">

                              <div class="infoOption cubic-bazier">
                                <span class="addressStreetInfo">Rua Retirantes dos Franciscanos</span><br>
                                <span class="addressNumInfo">Nº 138</span>
                                <span>/ </span><span class="addressCityInfo">Contagem</span>
                                <span class="addressStateInfo"> - MG</span>
                              </div>
                              
                              <div class="editOption cubic-bazier">Alterar</div>

                          </div>
                          
                    </div>
                  </div> 

                  <div class="optionContent flex select-none">
                    <div class="optionSelector cubic-bezier-2s " data-deliverymethod="shipping" data-dialogmodal="modaltroco">
                          <div class="selectContent cubic-bezier-2s">
                          <svg class="optionIcon" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="icon-marketplace" focusable="false" viewBox="0 0 24 24"><g data-v-2551ff12=""><path data-v-2551ff12="" fill-rule="evenodd" clip-rule="evenodd" d="M4.74996 5.5C4.53746 5.5 4.35934 5.42771 4.21559 5.28313C4.07184 5.13853 3.99996 4.95936 3.99996 4.74563C3.99996 4.53188 4.07184 4.35417 4.21559 4.2125C4.35934 4.07083 4.53746 4 4.74996 4H19.3C19.5125 4 19.6906 4.07229 19.8343 4.21687C19.9781 4.36147 20.05 4.54064 20.05 4.75437C20.05 4.96812 19.9781 5.14583 19.8343 5.2875C19.6906 5.42917 19.5125 5.5 19.3 5.5H4.74996ZM4.87496 20C4.66246 20 4.48434 19.9281 4.34059 19.7844C4.19684 19.6406 4.12496 19.4625 4.12496 19.25V13.55H3.49996C3.2643 13.55 3.07205 13.4583 2.92321 13.275C2.77438 13.0917 2.72496 12.8833 2.77496 12.65L3.87496 7.6C3.9083 7.41667 3.99371 7.27083 4.13121 7.1625C4.26871 7.05417 4.42496 7 4.59996 7H19.425C19.6 7 19.7562 7.05417 19.8937 7.1625C20.0312 7.27083 20.1166 7.41667 20.15 7.6L21.25 12.65C21.3 12.8833 21.2505 13.0917 21.1017 13.275C20.9529 13.4583 20.7606 13.55 20.525 13.55H19.9V19.25C19.9 19.4625 19.8277 19.6406 19.6831 19.7844C19.5385 19.9281 19.3593 20 19.1456 20C18.9318 20 18.7541 19.9281 18.6125 19.7844C18.4708 19.6406 18.4 19.4625 18.4 19.25V13.55H13.675V19.25C13.675 19.4625 13.6031 19.6406 13.4593 19.7844C13.3156 19.9281 13.1375 20 12.925 20H4.87496ZM5.62496 18.5H12.175V13.55H5.62496V18.5ZM4.37496 12.05H19.65L18.875 8.5H5.14996L4.37496 12.05Z"></path></g></svg>
                              <div class="flex flex-col">
                                <p class="optionTitle">Retirada</p>
                                <p class="optionSubTitle">Você busca em nossa loja</p> 
                              </div>
                           <!-- <img src="img/ok.png" class="markOption display-none">-->
                            <svg class="markOption display-none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24"><g ><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z"></path></g></svg>
                          </div>

                          <hr class="optionsDivider rubik-family">
                            
                            <div class="optionInfoContent flex flex-row align-center cubic-bezier-2s">
  
                                <div class="infoOption cubic-bazier">
                                  <span class="addressStreetInfo">Av dos Retiro Imigrantes</span><br>
                                  <span class="addressNumInfo">Nº 50</span>
                                  <span>/ </span><span class="addressCityInfo">Contagem</span>
                                  <span class="addressStateInfo"> - MG</span>
                                </div>
                             
                                <div class="editOption cubic-bazier">Ver Mapa</div>

                            </div>
                          
                    </div>
                  </div>



            <button id="resultados">RESULTADO</button>

              <div id="container">
                <div id="map"></div>
                  <div id="sidebar">
                    <h3 style="flex-grow: 0">Request</h3>
                    <pre style="flex-grow: 1" id="request"></pre>
                    <h3 style="flex-grow: 0">Response</h3>
                    <pre style="flex-grow: 1" id="response"></pre>
                  </div>
              </div>

  </div>



  <div id="s3" class="stepSection select-none cubic-bezier-2s fade bounce-up-open">
      



            <div class="optionContent flex select-none">
                    <div class="optionSelector cubic-bezier-2s " data-paymentmethod="Dinheiro" data-dialogmodal="modaltroco">
                          <div class="selectContent cubic-bezier-2s">
                            <img src="img/coin.png" class="optionIcon">
                              <div class="flex flex-col">
                                <p class="optionTitle">Dinheiro</p>
                                <p class="optionSubTitle">Ganhe 5% de desconto</p> 
                              </div>
                            <img src="img/ok.png" class="markOption display-none">
                          </div>
                      <hr class="optionsDivider rubik-family">

                        <div class="optionInfoContent flex flex-row cubic-bezier-2s">

                            <div class="infoOption cubic-bezier-2s">
                            <span class="addressStreetInfo">Troco: </span>
                            <span class="addressStreetInfo">Não preciso de troco</span></div>
                     
                            <div class="editOption"></div>
                     
                        </div>



                    </div>
                  </div> 

                  <div class="optionContent flex select-none">
                    <div class="optionSelector cubic-bezier-2s " data-paymentmethod="Pix" data-dialogmodal="modaltroco">
                          <div class="selectContent cubic-bezier-2s">
                             <img src="img/pix.png" class="optionIcon">
                              <div class="flex flex-col">
                                <p class="optionTitle">Pix</p>
                                <p class="optionSubTitle">Pague diretamente pelo app</p> 
                              </div>
                            <img src="img/ok.png" class="markOption display-none">
                          </div>
                          
                    </div>
                  </div> 


                  <div class="optionContent flex select-none">
                    <div class="optionSelector cubic-bezier-2s " data-paymentmethod="Pix" data-dialogmodal="modaltroco">
                          <div class="selectContent cubic-bezier-2s">
                            <img src="img/credit-card.png" class="optionIcon">
                              <div class="flex flex-col">
                                <p class="optionTitle">Débito</p>
                                <p class="optionSubTitle">Pague na entrega</p> 
                              </div>
                            <img src="img/ok.png" class="markOption display-none">
                          </div>
                          
                    </div>
                  </div>
                  
                  
                  <div class="optionContent flex select-none">
                    <div class="optionSelector cubic-bezier-2s " data-paymentmethod="Pix" data-dialogmodal="modaltroco">
                          <div class="selectContent cubic-bezier-2s">
                            <img src="img/credit-card.png" class="optionIcon">
                              <div class="flex flex-col">
                                <p class="optionTitle">Crédito</p>
                                <p class="optionSubTitle">Pague na entrega</p> 
                              </div>
                            <img src="img/ok.png" class="markOption display-none">
                          </div>
                          
                    </div>
                  </div>



  </div>


  <div id="s4" class="stepSection select-none cubic-bezier-2s fade bounce-up-open">

          <P >Forma de Pagamendo</P><br>
          <p class="paymentMethodConfirm">Nenhum Selecionado</p>
          
          <div class="d-grid gap-2 mt-4 abaixo">
            <a href='#' onclick="finalizarPedido()" class="btn btn-primary botao-carrinho">Concluir Pedido</a>
          </div>
       
  </div>
          
      

        <div class="buttons">
          <button id="prev" disabled>Prev</button>
          <button id="next" >Next</button>
        </div>

      </div>

    <!--<script type="module">
      import {CreateModal} from 'https://cdn.srmenu.app/domini/v0.0.1/js/domini.js'

      window.createmodal = new CreateModal()
    </script>-->

  </div> 
    
  
<script type="module"  src="./js/checkout.js"></script>  


<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>

<!-- Mascaras JS -->
<script type="text/javascript" src="js/mascaras.js"></script>

<!-- Ajax para funcionar Mascaras JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 




<script type="text/javascript">

/*
  $(document).ready(function() {     
  $('#telefone').focus();     
    document.getElementById('area-endereco').style.display = "none";
    document.getElementById('area-obs').style.display = "none";
    document.getElementById('area-taxa').style.display = "none";
   
    document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "none";
} );


  function retirar(){
   document.getElementById('radio_retirar').checked = true;
   document.getElementById('radio_local').checked = false;
   document.getElementById('radio_entrega').checked = false;
   $('#colapse-3').click();
   $('#entrega').val('Retirar');
   $('#consumir-local').text('Endereço de Retirada');

   document.getElementById('area-retirada').style.display = "block";
   document.getElementById('area-endereco').style.display = "none";

   document.getElementById('area-taxa').style.display = "none";
    calcularFrete() 
  }

  function local(){
   document.getElementById('radio_retirar').checked = false;
   document.getElementById('radio_local').checked = true;
   document.getElementById('radio_entrega').checked = false;
   $('#colapse-3').click();
   $('#entrega').val('Consumir Local');
   $('#consumir-local').text('Endereço da nossa unidade');

   document.getElementById('area-retirada').style.display = "block";
   document.getElementById('area-endereco').style.display = "none";

   document.getElementById('area-taxa').style.display = "none";
    calcularFrete()
  }


    function entrega(){
   document.getElementById('radio_retirar').checked = false;
   document.getElementById('radio_local').checked = false;
   document.getElementById('radio_entrega').checked = true;
   $('#colapse-3').click();
   $('#entrega').val('Delivery');
   
   document.getElementById('area-retirada').style.display = "none";
   document.getElementById('area-endereco').style.display = "block";
  
  document.getElementById('area-taxa').style.display = "inline-block";
  calcularFrete()
 
  }





   function pix(){   
   

   document.getElementById('radio_credito').checked = false;
   document.getElementById('radio_debito').checked = false;
   document.getElementById('radio_dinheiro').checked = false;

   $('#pagamento').val('Pix');
   
   document.getElementById('pagar_pix').style.display = "block";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "none";
   document.getElementById('area-obs').style.display = "block";
  }

  function dinheiro(){  

      document.getElementById('radio_credito').checked = false;
   document.getElementById('radio_debito').checked = false;
   document.getElementById('radio_pix').checked = false;
   
   $('#pagamento').val('Dinheiro');
   
   document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "block";
   document.getElementById('area-obs').style.display = "block";
  }

  function debito(){  

      document.getElementById('radio_credito').checked = false;
   document.getElementById('radio_pix').checked = false;
   document.getElementById('radio_dinheiro').checked = false;
   
   $('#pagamento').val('Cartão de Débito');
   
   document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "block";
   document.getElementById('pagar_credito').style.display = "none";
   document.getElementById('pagar_dinheiro').style.display = "none";
   document.getElementById('area-obs').style.display = "block";
  }


  function credito(){  

      document.getElementById('radio_pix').checked = false;
   document.getElementById('radio_debito').checked = false;
   document.getElementById('radio_dinheiro').checked = false;
   
   $('#pagamento').val('Cartão de Crédito');
   
   document.getElementById('pagar_pix').style.display = "none";
   document.getElementById('pagar_debito').style.display = "none";
   document.getElementById('pagar_credito').style.display = "block";
   document.getElementById('pagar_dinheiro').style.display = "none";
   document.getElementById('area-obs').style.display = "block";
  }
*/
/*
  function finalizarPedido(){  


    var nome = $('#nome').val();
    var telefone = $('#telefone').val();    
    var mesa = $('#mesa').val();
    var id_usuario = "<?=$id_usuario?>";

    if(telefone == "" && id_usuario == ""){
    alert('Preencha seu Telefone'); 
    $('#telefone').focus();  
    return;
   }


    if(nome == ""){
    alert('Preencha seu Nome'); 
    $('#nome').focus();     
    return;
   }
  
 

    var nome_cliente = $('#nome').val();
     var tel_cliente = $('#telefone').val();
      var id_cliente = $('#id_cliente').val();

 
   var pagamento = $('#pagamento').val();
   var entrega = $('#entrega').val();
   var rua = $('#rua').val();
   var numero = $('#numero').val();
   var complemento = $('#complemento').val();
   var bairro = $('#bairro').val();
   var troco = $('#troco').val();
   var obs = $('#obs').val();
   var taxa_entrega = $('#taxa-entrega-input').val();
   var pedido_whatsapp = "<?=$status_whatsapp?>";

   if(taxa_entrega == ""){
    taxa_entrega = 0;
   }

   var dataAtual = new Date();
   var horas = dataAtual.getHours();
    var minutos = dataAtual.getMinutes();
    var hora = horas + ':'+ minutos;
  
       
   var total_compra = "<?=$total_carrinho?>";

    if(entrega == ""){
    alert('Selecione uma forma de entrega');
    $('#colapse-2').click();
    return;
   }

    if(entrega == "Delivery" && rua == ""){
    alert('Preencha o Campo Rua');
    $('#colapse-3').click();
    return;
   }

    if(entrega == "Delivery" && numero == ""){
    alert('Preencha o Campo Número');
    $('#colapse-3').click();
    return;
   }

    if(entrega == "Delivery" && bairro == ""){
    alert('Escolha um Bairro');
    $('#colapse-3').click();
    return;
   }

  

   if(pagamento == ""){
    alert('Selecione uma forma de pagamento');
    return;
   }

    if(pagamento == "Dinheiro" && troco == ""){
    alert('Digite o total a ser pago para o troco');
    
    return;
   }

   var total_compra_final = parseFloat(total_compra) + parseFloat(taxa_entrega);

   var total_compra_finalF = total_compra_final.toFixed(2)
   
   if(pagamento == "Dinheiro" && troco < total_compra_final){
    alert('Digite um valor acima do total da compra!');
    
    return;
   }

  
    $.ajax({
         url: 'js/ajax/inserir-pedido.php',
        method: 'POST',
        data: {pagamento, entrega, rua, numero, bairro, complemento, troco, obs, nome_cliente, tel_cliente, id_cliente, mesa},
        dataType: "html",

        success:function(result){
           
            setTimeout(()=>{
              alert('Pedido Finalizado!');
            window.location='index.php';

        },500);
           

           if(pedido_whatsapp == 'Sim'){
              let a = document.createElement('a');
                //a.target= '_blank';
                a.href= 'http://api.whatsapp.com/send?1=pt_BR&phone=<?=$whatsapp_sistema?>&text= *Novo Pedido*  %0A Hora: *' + hora + '* %0A Total: R$ *' + total_compra_finalF + '* %0A Entrega: *' + entrega + '* %0A Pagamento: *' + pagamento + '* %0A Cliente: *' + nome_cliente + '* %0A Previsão de Entrega: *' + result + '*';
                a.click();
           }else if(pedido_whatsapp == 'Não'){
            
             $.ajax({
                url: 'https://api.callmebot.com/whatsapp.php?phone=+553171390746&text=*Novo Pedido*  %0A Hora: *' + hora + '* %0A Total: R$ *' + total_compra_finalF + '* %0A Entrega: *' + entrega + '* %0A Pagamento: *' + pagamento + '* %0A Cliente: *' + nome_cliente + '* %0A Previsão de Entrega: *' + result + '*&apikey=320525',
                 method: 'GET',          
                 
                });
                
           }else{

           }

          
                       
        }
    });
   
  }




  function calcularFrete(){   

    var bairro = $('#bairro').val();
    var total_compra = "<?=$total_carrinho?>";
    var entrega = $('#entrega').val();

    $.ajax({
         url: 'js/ajax/calcular-frete.php',
        method: 'POST',
        data: {bairro, total_compra, entrega},
        dataType: "html",

        success:function(result){
           var split = result.split("-");
          $('#taxa-entrega').text(split[0]);
          $('#total-carrinho-finalizar').text(split[1]); 
          $('#taxa-entrega-input').val(split[0]);


        }
    });
  }





  function buscarNome(){

    var tel = $('#telefone').val(); 

    var nome = $('#nome').val(); 
        
    $.ajax({
      url: 'js/ajax/listar-nome.php',
      method: 'POST',
      data: {tel},
      dataType: "text",

      success:function(result){    

        var split = result.split("**");    

        if (nome == ""){

          $('#nome').val(split[0]);

        }
       
        $('#rua').val(split[1]); 
        $('#numero').val(split[2]); 
        $('#bairro').val(split[3]).change(); 
        $('#complemento').val(split[4]); 
        $('#taxa-entrega-input').val(split[5]); 
        $('#taxa-entrega').text(split[6]); 
        $('#id_cliente').text(split[7]); 
      }
    }); 
  }


  function dados(){

     
   var nome = $('#nome').val();
   var telefone = $('#telefone').val();   
    var id_usuario = "<?=$id_usuario?>";

    if(telefone == ""){
    alert('Preencha seu Telefone'); 
    $('#telefone').focus();  
    return;
   }


    if(nome == ""){
    alert('Preencha seu Nome'); 
    $('#telefone').focus();     
    return;
   }


   

   if(id_usuario != ""){
    $('#collapse-4').click();
  }else{
  $('#colapse-2').click();
  }

  }
  */
  function epty(params) {
    
  }
 
</script>


<script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&&callback=epty&key=AIzaSyBM-5-BiElxw4iKwAfAAZaX4c4gqCmubO4" type="text/javascript"></script>

<script src="./apis/google/distance-matrix.js" type="text/javascript"></script>