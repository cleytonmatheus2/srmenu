import uxDialog from "https://cdn.srmenu.app/domini/ux/modals/dialog.js"
import uxInput from "https://cdn.srmenu.app/domini/ux/inputs/ux-input.js"
import mask from "https://cdn.srmenu.app/domini/js/mask.js"
import uxModal from "https://cdn.srmenu.app/domini/ux/modals/modal.js"

uxInput.load

let openFullModal = document.getElementById('open')
openFullModal.onclick = () => {

    uxInput.new({
      inner: 'spanwww',
      label: '',
      id: '',
      type: '',
      value: ''
    })

    
   //uxModal.new()

}





//DOM Elements
const circles = document.querySelectorAll(".circle"),
    progressBar = document.querySelector(".indicator"),
    buttons = document.querySelectorAll("button"), 
    stepSection = document.querySelectorAll(".stepSection");

 // PAYMENT 
 
 const paymentOptions = document.querySelectorAll('[data-paymentmethod]'),
 deliveryOptions = document.querySelectorAll('[data-deliverymethod]');

 

 

let currentStep = 1;

// function that updates the current step and updates the DOM
const updateSteps = (e) => {
  

    let paymentMethod = null

    currentStep = e.target.id === "next" ? ++currentStep : --currentStep ;

   

    let pageToVerfify = currentStep-1;

    if(pageToVerfify===1){

         let nomeCliente = document.getElementById('nome'), 
         telCliente = document.getElementById('tel');

          currentStep = nomeCliente.value == "" || telCliente.value == "" ? 1 : currentStep;

          if(!nomeCliente.value){
              nomeCliente.style.border = '1px solid red'
          }else{
             nomeCliente.style.border = ''
          }
          if(!telCliente.value){
              telCliente.style.border = '1px solid red'
          }else{
            telCliente.style.border = ''
          }



    }else if(pageToVerfify===2){

             

    }else if(pageToVerfify===3){

      paymentMethod = paymentCheck()
      currentStep = paymentMethod != false ? currentStep : 3;

    }



      document.getElementsByClassName('paymentMethodConfirm')[0].innerHTML = paymentMethod

    




    // loop through all circles and add/remove "active" class based on their index and current step
    circles.forEach((circle, index) => {
      circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
      
      let newIndex = index + 1,
       okSVG = '&#10003';
       
      circle.innerHTML = (newIndex < currentStep) ? okSVG : newIndex;

    });

    stepSection.forEach((section, index) => {
      index++
      section.classList[`${index == currentStep ? "add" :  "remove" }`]("active");
      section.classList[`${index == currentStep ? "add" :  "remove" }`]("bounce-up");
    });



    // update progress bar width based on current step
    progressBar.style.width = `${((currentStep - 1) / (circles.length - 1))  * 100}%`;


    // check if current step is last step or first step and disable corresponding buttons
    if (currentStep === circles.length) {
      buttons[1].disabled = true;
    } else if (currentStep === 1) {
      buttons[0].disabled = true;
    } else {
      buttons.forEach((button) => (button.disabled = false));
    }


  
    
};



// add click event listeners to all buttons
buttons.forEach((button) => {
  button.addEventListener("click", updateSteps);

});










// FUNÇÕES DE ENTREGA

for (let i = 0; i < deliveryOptions.length; i++) {

  deliveryOptions[i].addEventListener("click", (e)=>{
  
      deliveryOptions.forEach((e, i) => {
        e.removeAttribute('data-checkedoption')
        e.classList.remove('active')
      });

      let method = deliveryOptions[i].dataset.deliverymethod

      deliveryOptions[i].dataset.checkedoption = "true";
      deliveryOptions[i].classList.add('active');

      if(method=='shipping'){

      //    createmodal.size.width = 75
      //   createmodal.size.height = 25
      //  createmodal.new()
      }
           
    })
}






//  OPCEOS PAGAMENTO 


for (let i = 0; i < paymentOptions.length; i++) {

  paymentOptions[i].addEventListener("click", (e)=>{
  
    paymentOptions.forEach((e, i) => {
        e.removeAttribute('data-checkedoption')
        e.classList.remove('active')
      });

      let selectedMethod = paymentOptions[i].dataset.paymentmethod

        if(selectedMethod=='Dinheiro'){
          
            
            uxDialog.new({
              title: 'Deseja Troco?', 
              height: 15,
              width: 75,
              confirm: 'SIM',
              cancel: 'NÃO'
            }).then( res => {
              
              console.log(res);

              alert("DEFINE FUNCTION")

            }).catch(rej => {

              console.log(rej);

              paymentOptions[i].dataset.checkedoption = "true";
              paymentOptions[i].classList.add('active');

            })

        }else{
          paymentOptions[i].dataset.checkedoption = "true";
          paymentOptions[i].classList.add('active');
        }

      

    })
   
}








/*----------[ VALIDAÇÕES ]----------*/

/*  Valida Pagamento  */
const paymentCheck = (x) => {

  let selectedMethod = document.querySelectorAll('[data-paymentcheck="true"]')
     selectedResult = parseInt(selectedMethod.length)

      if(selectedResult == 1) {
        return selectedMethod[0].dataset.paymentmethod
      }

    return false

}







/*-------------------------------------------------------------*/

/*


const Test = function(car) {
  
  this.car = 'Ford Ka'
  this.price = 23.00000
  this.year = 2014
   
}

Test.prototype.juros = function() {
    return this.price * 1.6
}

const teste = new Test()

const juros = teste.juros()


console.log(juros.toFixed(5))







const test2 = (car) => {
  
  car = 'Ford'


//const teste2 = new Test2()

console.log(test2().car)

   
}*/