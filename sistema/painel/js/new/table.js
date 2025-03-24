
class Insumos {

    constructor(){

        this.id = 1;
        this.arrayProduto = []

    }



    salvar(){

        let produto = this.lerDados()


        if(this.validaCampo(produto)){

            this.adicionar(produto)

        }

        this.listarTabela()

    }


    listarTabela(){

        let tbody = document.getElementById('tbody')

        tbody.innerText = ''

        for (let i = 0; i <  this.arrayProduto.length; i++) {

           let tr = document.createElement("tr")
           tbody.appendChild(tr)
           tr.setAttribute('id' , this.arrayProduto[i].id+'line')

           let th_nome = document.createElement("th")
           tr.appendChild(th_nome)
           
           let th_estoque = document.createElement("th")
           tr.appendChild(th_estoque)

           let th_medida = document.createElement("th")
           tr.appendChild(th_medida)

           let th_custo = document.createElement("th")
           tr.appendChild(th_custo)



           let th_status = document.createElement("th")
           tr.appendChild(th_status)

           let th_statusSpan = document.createElement("span")
           th_status.appendChild(th_statusSpan)

           th_statusSpan.classList.add('statusTable')



           let th_acao = document.createElement("th")
           tr.appendChild(th_acao)

           let th_excluirSpan = document.createElement("span")
           th_acao.appendChild(th_excluirSpan)
           th_excluirSpan.setAttribute('onclick',  'insumos.excluir(' + this.arrayProduto[i].id + ')')


           
           let trash_SVG =  '<svg class="trashSVG" id="Layer_1"  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110.61 122.88"><title>trash</title><path d="M39.27,58.64a4.74,4.74,0,1,1,9.47,0V93.72a4.74,4.74,0,1,1-9.47,0V58.64Zm63.6-19.86L98,103a22.29,22.29,0,0,1-6.33,14.1,19.41,19.41,0,0,1-13.88,5.78h-45a19.4,19.4,0,0,1-13.86-5.78l0,0A22.31,22.31,0,0,1,12.59,103L7.74,38.78H0V25c0-3.32,1.63-4.58,4.84-4.58H27.58V10.79A10.82,10.82,0,0,1,38.37,0H72.24A10.82,10.82,0,0,1,83,10.79v9.62h23.35a6.19,6.19,0,0,1,1,.06A3.86,3.86,0,0,1,110.59,24c0,.2,0,.38,0,.57V38.78Zm-9.5.17H17.24L22,102.3a12.82,12.82,0,0,0,3.57,8.1l0,0a10,10,0,0,0,7.19,3h45a10.06,10.06,0,0,0,7.19-3,12.8,12.8,0,0,0,3.59-8.1L93.37,39ZM71,20.41V12.05H39.64v8.36ZM61.87,58.64a4.74,4.74,0,1,1,9.47,0V93.72a4.74,4.74,0,1,1-9.47,0V58.64Z"/></svg>'



           th_nome.innerText =  this.arrayProduto[i].nomeProduto
           th_nome.innerText +=  ' - id: '+this.arrayProduto[i].id
           th_estoque.innerText =  this.arrayProduto[i].estoque
           th_medida.innerText =  this.arrayProduto[i].medida
           th_custo.innerText =  this.arrayProduto[i].custo
           th_statusSpan.innerText =  this.arrayProduto[i].status
           th_excluirSpan.innerHTML =  trash_SVG

           
        }

    }



    adicionar(produto){

        this.arrayProduto.push(produto)

        this.id++

    }




    lerDados(){

        let produto = {};

        produto.id = this.id;
        produto.nomeProduto = document.getElementById('Nome').value;
        produto.estoque = document.getElementById('Estoque').value;
        produto.medida = document.getElementById('Medida').value;
        produto.custo = document.getElementById('Custo').value;
        produto.status = document.getElementById('status').value;

        return produto

        

    }


    validaCampo(produto){
        let msg = ''

            if(produto.nomeProduto == ''){
                msg += 'Informe o nome do Produto \n'
            }

            if(produto.estoque == ''){
                msg += 'Informe o nome do estoque \n'
            }
        
        if(msg != ''){
            alert(msg)
            return false;
        } 
        
        return true
    }

    


    excluir(id){


        modal.spanwModal()


        document.getElementById('confirmarAcao').addEventListener("click", (e) => {
  
          let tbody = document.getElementById('tbody')

            for (let i = 0; i <  this.arrayProduto.length; i++) {
        
                if(this.arrayProduto[i].id == id){
                this.arrayProduto.splice(i, 1)

                tbody.deleteRow(i)

                }

            }

            modal.closeModal();

        })
       
         


    }




}









class Modal {

    constructor(){
        
    }


    confirmModal(){

        return new Promise((reposta) => {
           
            document.getElementById('cancelarAcao').addEventListener('click', () => {
                reposta(false);
                this.closeModal()
            })

            document.getElementById('confirmarAcao').addEventListener('click', () => {
                reposta(true);
                this.closeModal()
            })
            
        })

    }





     spanwModal(){

        let modal = document.getElementById('oW083');
        modal.style.display = "block";
    
    }
    
    
    closeModal(){
    
        let modal = document.getElementById('oW083');
        modal.style.display = "none";
    
    }



}




let modal = new Modal();

let insumos = new Insumos();


