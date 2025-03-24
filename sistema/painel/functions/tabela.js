//------------------------[  PESQUISA DE TABELA  ]------------------------//


// campo de pesquisa
let campoPesquisaTabela = document.getElementById('txtbuscar');
campoPesquisaTabela.addEventListener('keyup', listarTabela);
//



function listarTabela(){

    let txtbuscar = campoPesquisaTabela.value;

    $.ajax({
        url: 'paginas/'+ pag +'/listar.php',
        method: 'POST',
        data: {txtbuscar},
        dataType: "text",
          success: function(result){
            $('#listar-'+pag).html(result)
          },
    });
}





// Paginação da listagem tabela
function paginacaoTabela(pagina, qtd_result_pag){

        if(!qtd_result_pag){
            qtd_result_pag = document.getElementById('limiteQuantSelect').value; //quantidade de registros por pagina
        }
        
        $.ajax({
        url: 'paginas/'+ pag +'/listar.php',
        method: 'POST',
        data: {pagina, qtd_result_pag},
        dataType: "html",
            success: function(result){
                $('#listar-'+pag).html(result)
        },
    })
}









