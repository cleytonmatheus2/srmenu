/* VERIFICA NULL

 if (document.getElementById('ID A VERIFICAR') !== null)
 
 */





  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////[  ENVIO DE DADOS FORMULÁRIO POR AJAX  ]//////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

let formName = document.querySelector('button[id="submitForm"]').dataset.formname;
const form = document.getElementById(formName);

form.addEventListener('submit', (event)=> {

        event.preventDefault();

        let formData = new FormData(form);

        let xhr = new XMLHttpRequest();
        let url = 'paginas/'+pag+'/salvar.php';

        xhr.open('POST', url, true);
        //xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200){
                
                    if(xhr.response == 'Escolha no minimo 1 produto'){

                        document.getElementById('minimoEscolha').innerHTML = xhr.response;
                        document.getElementById('codCadastrado').innerHTML = '';

                    }else if(xhr.response ==  'Código já cadastrado, escolha outro!'){

                        document.getElementById('codCadastrado').innerHTML = xhr.response;

                    }else{

                        document.getElementById('minimoEscolha').innerHTML = '';
                        document.getElementById('codCadastrado').innerHTML = '';
                        
                        listarTabela();
                        
                        document.getElementById('btn-fechar').click();

                    }
            }
        }

        xhr.send(formData);

});


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////




// FECHAR E LIMPAR MODAL

let closeModal = document.getElementById('btn-fechar');
closeModal.addEventListener('click', fecharModal);

function fecharModal() {
    limparModal();
}

function limparModal(){

    // Limpa todos os checkboxes da modal
    let allCheckBoxes = document.querySelectorAll('input[data-inputlist]');
    allCheckBoxes.forEach(e => {
        e.checked = false;  
    });

    // Limpa todos os inputs da modal
    let allInputs = document.querySelectorAll('input[data-input="campo"]')
    allInputs.forEach(e => {
        e.value = '';  
    });

}








      ////////////////////////////////////////////////////////////////////////////////////////////
     ////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////|------------------------|//////////////////////////////////
   /////////////////////////////////|     INPUTS FUNCTIONS   |/////////////////////////////////
  //////////////////////////////////|------------------------|////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////



// MASCARA - Formata digito para moeda Real

const formatter = new Intl.NumberFormat('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

function mask(e) {

    const input = e.target;

    // elimina tudo que não é dígito
    input.value = input.value.replace(/\D+/g, '');

    if (input.value.length === 0) // se não tem nada preenchido, não tem o que fazer
        return;
    // verifica se ultrapassou a quantidade máxima de dígitos (pegar o valor no dataset)
    const maxDigits = parseInt(input.dataset.maxDigits);
    if (input.value.length > maxDigits) {
        // O que fazer nesse caso? Decidi pegar somente os primeiros dígitos
        input.value = input.value.substring(0, maxDigits);
    }
    // lembrando que o valor é a quantidade de centavos, então precisa dividir por 100
    input.value = formatter.format(parseInt(input.value) / 100);
}

let divValorItem = document.querySelectorAll('input[data-formatMoney="real"]');

divValorItem.forEach(function(elem) {
    elem.addEventListener('input', mask);
});






// FILTRO DE PESQUISA COM JAVASCRIPT PURO ( SEM AJAX )

let campoPesquisa = document.querySelectorAll('input[data-inputsearch="searchBox"]');

campoPesquisa.forEach(function(campo) {

    let nomeCampo = campo.dataset.searchid;

    campo.addEventListener('keyup', pesquisaCampo);
  
    function pesquisaCampo(){

        let quant = 0;

        let campoValor = campo.value;
        let digitado = campoValor.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");

        let cards = document.querySelectorAll('li[data-list="'+nomeCampo+'"]');


        for (let i7 = 0; i7 < cards.length; i7++) {

            let resultadoLista = cards[i7].textContent.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, "");

            if(resultadoLista.includes(digitado)) {    
                cards[i7].style.display = "block";
            } else {
                cards[i7].style.display = "none";
            }

            if(cards[i7].style.display == 'block'){
                quant += 1;
            }
        }

        // MOSTRAR / OCULTAR TEXTO DE PRODUTO NÃO ENCONTRADO
        let notFindItem = document.querySelectorAll('span[id="prodNaoEncontrado"]');
        notFindItem.forEach(itemNotFound => {
            if(quant == 0){
                itemNotFound.style.display = 'block';
            }else{
                itemNotFound.style.display = 'none';
            }
        });
        

        
    }; 

});




 // FUNÇÃO PARA MARCAR TODOS OS CHECKBOXES

 let todosCk = document.querySelectorAll("input[data-todosid]");

 todosCk.forEach(btnAll => {
    

    btnAll.addEventListener('change', function(){

        
       let checkbox = btnAll.dataset.checkbox;


       let inputCheckbox = document.querySelectorAll("input[data-inputlist='"+checkbox+"']");


       for (let i2 = 0; i2 < inputCheckbox.length; i2++) {

        //alert(inputCheckbox[i2])

                if(btnAll.checked === true){
                    inputCheckbox[i2].checked = true;
                }else{
                    inputCheckbox[i2].checked = false;
                }             

       }


       let checkedVerify = document.querySelectorAll("input[data-inputlist='"+checkbox+"]:checked");
       let checkedBoxes = checkedVerify.length;
       document.querySelector('span[data-quantlist="'+checkbox+'"]').innerHTML = checkedBoxes;


    });
   


});






 // CONTAR CHECKBOXES SELECIONADOS

 inputCheckbox.forEach(e => {

    e.addEventListener('change', function(){

        let qtTotalChecked = 0;

        for(let i3 = 0; i3 < inputCheckbox.length; i3++){
                 
           if(inputCheckbox[i3].checked){ 
                // Caucula o total te Itens adicionados
                qtTotalChecked++
            }       
        }


    // ----- MARCA O TOTAL SELECIONADO 
        document.getElementById('quantItensSelecionados').innerHTML = qtTotalChecked;

    });

});


