function inserirAdicional(){
   
   /* var id_prod = document.getElementById('seletor_produto').value;

    listar_OpcionaisSelect(id_prod);*/

    $('#modalInserir').modal('show');
    limparCampos();
}





///////////////////////////////////////////////////////////////////////////////////////////////////
//// FUNCAO COPIAR OPCIONAIS EXISTENTES

let  divAdicionaisCheckboxes = document.getElementById("divListagemAdicionaisCheckboxes"); 

function funcaoCopiarAdicional(copiarOpc){ 
    
    if(copiarOpc.checked){

        $('#opcoesNovoAdc').animate({'height': '0', 'opacity': 0.0}, 800);   
        var opcoesNovoAdc = document.getElementById("opcoesNovoAdc"); 
        setTimeout(ocultar, 810);
        function ocultar(){
          opcoesNovoAdc.style.display="none";
        }

        $('#divListagemAdicionaisCheckboxes').animate({'height': '230px', 'opacity' : 1, 'display' : 'block'}, 800);
        divAdicionaisCheckboxes.style.display = "block";

        
    }else{

        $('#opcoesNovoAdc').animate({'height': '575px', 'opacity' : 1.0}, 800);
        document.getElementById('opcoesNovoAdc').style.display = "block";



        $('#divListagemAdicionaisCheckboxes').animate({'height': '0px', 'opacity' : 0}, 800);
        setTimeout(hide, 810);
        function hide(){
            divAdicionaisCheckboxes.style.display="none";
        }
    }
}





function showHideMin(sel, div, id){

    var seletor = sel.value;

    if(seletor == 'Nao'){

        document.getElementById(div).style.display = 'none';
        document.getElementById(id).removeAttribute("min");
        document.getElementById(id).required = false;
        document.getElementById(id).value = '0';


    }else{

        document.getElementById(div).style.display = 'inline-block';
        document.getElementById(id).required = true;
        document.getElementById(id).min = 1;
        document.getElementById(id).value = '1';

    }

};




function showHideMax(sel, div, id) {
                        
    var seletor = sel.value;

    if(seletor == 'Nao'){

        document.getElementById(div).style.display = 'none';
        document.getElementById(id).removeAttribute("min");
        document.getElementById(id).value = '0';
        document.getElementById(id).required = false;

    }else{
        document.getElementById(div).style.display = 'inline-block';
        document.getElementById(id).min = 1;
        document.getElementById(id).value = '1';
        document.getElementById(id).required = true;
    }
                                                                        
};




/*

// FUNÇÃO LISTAR OPCIONAIS DOS PRODUTOS MARCADOS NO SELECT com AJAX

 let produtosCheckeds = document.querySelectorAll("input[data-checkbox='blocoItens']");

 produtosCheckeds.forEach(e => {

    e.addEventListener('change', function(){

        let idProds = [];
        for(let i3 = 0; i3 < produtosCheckeds.length; i3++){

           if(produtosCheckeds[i3].checked){ 
                
            idProds.push(produtosCheckeds[i3].value)

            }    

        }   

            $.ajax({ 
                url: 'paginas/' + pag + '/listar_OpcionaisSelect.php',
                method: 'POST',
                data: {idProds},
                dataType: "html",
                success: function(result){
                    if(result != 0){       
                        $('#listagemItensADCSS').html(result)

                    }else{
                        $('#listagemItensADCSS').html('Nenhum adicional encontrado') 
        
                   }         
                },
            });



    });

});


*/



//---------[  lista Adicionais no seletor  ]---------//

function listar_OpcionaisSelect(id_prod){
    
    $.ajax({
        url: 'paginas/'+ pag +'/listar_OpcionaisSelect.php',
        method: 'POST',
        data: {id_prod},
        dataType: "html",
        success: function(result){
            if(result != 0 ){       
                   document.getElementById('itensadicionais').innerHTML += result;
            }else{

                $('#itensadicionais').html('<option>Nenhum adicional encontrado</option>') 

           }         
        },
    })
};