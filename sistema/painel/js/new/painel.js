/*  FUNCAO PARA RECOLHER ASIDE  */ 
let btn = document.getElementById('arrow-btn');
let menuLateral = document.getElementById('menu-lateral');
let tituloMenu = document.querySelectorAll("span[class='menunome']");

btn.addEventListener('click', () => {
        menuLateral.classList.toggle('hide-aside');
        btn.classList.toggle('rotate180');

        tituloMenu.forEach(nm => {

         nm.classList.toggle('hide-nomemenu');
        
        });


        
});


/*  FUNCOES DAS OPCOES DO MENU */ 

let btnAside = document.querySelectorAll("li[id='AsideLi']");

btnAside.forEach(btn => {

        btn.onclick = function () {

        // console.log("1 For", btn)

                let btnAtivo = document.querySelector("li[id='AsideLi'][data-active='true']")
                if (btnAtivo) {
                   btnAtivo.dataset.active = 'false';    
                   btnAtivo.style.color = '#2e3133';
                }
        
  

                btn.style.color = 'antiquewhite';
                btn.dataset.active = 'true'; 


        const isClickInside = btn.contains(btn.target)
                      
                if (!isClickInside) {
                //alert("ok");
                }

        }
        
});


let arrowBtnAseide = document.querySelectorAll('img[class="arrowList"]');
addEventListener('click', ()=> {

})
