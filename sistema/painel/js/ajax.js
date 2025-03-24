$(document).ready(function() {    
   listar();    
   listarTabela();

});


function listar(){
    $.ajax({
        url: 'paginas/' + pag + "/listar.php",
        method: 'POST',
        data: $('#form').serialize(),
        dataType: "html",
        success:function(result){
            $("#listar").html(result);
            $('#mensagem-excluir').text('');
        }
    });
}


function inserir(){
    $('#mensagem').text('');
    $('#tituloModal').text('Inserir Item');
    $('#modalForm').modal('show');
    limparCampos();
}




function limparCampos(){
    $('#nome').val('');
    $('#id').val('');
}



$("#form").submit(function (event) {

    event.preventDefault();
    var formData = new FormData(this);
   
  
        $.ajax({
            url: 'paginas/' + pag + "/salvar.php",
            type: 'POST',
            data: formData,
    
            success: function (mensagem) {

                $('#mensagem').text('');
                $('#mensagem').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso"){

                    $('#btn-fechar').click();
                    listar();          

                } else {

                    $('#mensagem').addClass('text-danger')
                    $('#mensagem').text(mensagem)
                }
    
            },
    
            cache: false,
            contentType: false,
            processData: false,
    
        });

});





// PERTENCE AO ADICIONAIS

$("#formEdit").submit(function (event) {

    event.preventDefault();

    var formData = new FormData(this);


    $.ajax({
            url: 'paginas/' + pag + "/editar.php",
            type: 'POST',
            data: formData,
    
            success: function (mensagem) {

                $('#mensagem').text('');
                $('#mensagem').removeClass()
                if (mensagem.trim() == "Salvo com Sucesso"){

                    $('#btn-fechar').click();
                    listar();          

                } else {

                    $('#mensagem').addClass('text-danger')
                    $('#mensagem').text(mensagem)
                }
    
            },
    
            cache: false,
            contentType: false,
            processData: false,
    
        });

});



function excluir(id){

    alert(id)

    $.ajax({
        url: 'paginas/' + pag + "/excluir.php",
        method: 'POST',
        data: {id},
        dataType: "text",

        success: function (mensagem) { 
            
            console.log(mensagem);  
            if (mensagem.trim() == "Excluído com Sucesso") {                
                listar();   

            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }
        },          
        error: function(mensagem){
            console.log(mensagem);
        }

    });
}











function ativar(id, acao){
    $.ajax({
        url: 'paginas/' + pag + "/mudar-status.php",
        method: 'POST',
        data: {id, acao},
        dataType: "text",

        success: function (mensagem) {            
            if (mensagem.trim() == "Alterado com Sucesso") {                
                listar();                
            } else {
                $('#mensagem-excluir').addClass('text-danger')
                $('#mensagem-excluir').text(mensagem)
            }

        },      

    });
}






function limparCampos(){
    
    $('#nome').val('');
    $('#id').val('');
}

















/*
        // CAMPO PESQUISA AJAX PRODUTOS

        let campoPesquisa1 = document.getElementById('searchProd');

        campoPesquisa1.addEventListener('keyup', pesquisaProdCampo);

        function pesquisaProdCampo(){

            let valorPesquisa = campoPesquisa1.value; 
            let url = 'paginas/cupons/listarProdutos.php';
            let xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange = function(){
                if (xhr.readyState === 4 && xhr.status === 200){
                    document.getElementById('spanListaProd').innerHTML = xhr.response;
                }
            }
            xhr.send('foo='+valorPesquisa);
        }  */
 
