function tipoDesconto(a){
    if(a == 'Valor'){
        document.getElementById('divPorcDesc').style.display = "none";
        document.getElementById('divValorDesc').style.display = "inline-block";
    }else{
        document.getElementById('divValorDesc').style.display = "none";
        document.getElementById('divPorcDesc').style.display = "inline-block";
    }
}

function condicaoDesconto(a){
    
    if(a == 'Nenhuma'){

        document.getElementById('divFidelidade').style.display = "none";
        document.getElementById('quantCompras').value = ''; 
        document.getElementById('quantCompras').removeAttribute('min');

        document.getElementById('divValorTotalCompra').style.display = "none";
        document.getElementById('valor_compraCliente').value = '';    

    }else if (a == 'Fidelidade') {

        document.getElementById('divFidelidade').style.display = "inline-block";
        document.getElementById('quantCompras').value = 1; 
        document.getElementById('quantCompras').setAttribute('min', 1);

        document.getElementById('divValorTotalCompra').style.display = "inline-block";
        document.getElementById('valor_compraCliente').value = ''; 

    }else{ 
        document.getElementById('divFidelidade').style.display = "none";
        document.getElementById('quantCompras').removeAttribute('min');

        document.getElementById('divValorTotalCompra').style.display = "inline-block";
        document.getElementById('valor_compraCliente').value = '';
    }

}