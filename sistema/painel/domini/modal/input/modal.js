
const openInputModal = (data) => {

    return new Promise((resolve, reject) => {

        let inputs = data.type

        const asideModalBody = document.createElement('div')
        asideModalBody.setAttribute('id', 'modal-body')

        const asideModalEl = document.createElement('div')
        asideModalEl.setAttribute('id', 'input-modal')
        asideModalEl.setAttribute('class', 'input-modal')
        asideModalBody.appendChild(asideModalEl)


        const DOMBody = document.querySelector('body')
        DOMBody.appendChild(asideModalBody)


        asideModalBody.addEventListener('click', event => {

            const isClickInside = asideModalEl.contains(event.target)

            if (!isClickInside) {

                asideModalBody.classList.add('hide-input-modal')

                setTimeout(() => {
                    asideModalBody.remove()
                }, 700)

            }
        })



        // HEADER
        /*const modalHeader = document.createElement('div')
        modalHeader.setAttribute('class', 'input-modal-header')
        asideModalEl.appendChild(modalHeader)
    
        const modalTitle = document.createElement('span')
        modalTitle.setAttribute('class', 'input-modal-header-title')
        modalHeader.appendChild(modalTitle)
        modalTitle.innerHTML = title.toUpperCase()*/


        // RESPONSE
        const asideModalContent = document.createElement('div')
        asideModalContent.setAttribute('id', 'input-modal-content')
        asideModalContent.setAttribute('class', 'input-modal-content')
        asideModalEl.appendChild(asideModalContent)


        const label = document.createElement('label')
        label.innerHTML = data.label
        asideModalContent.appendChild(label)


        const input = document.createElement('input')
        input.setAttribute('type', data.type)
        input.setAttribute('style', 'width: 100%')
        asideModalContent.appendChild(input)



        // FOOTER
        const modalFooter = document.createElement('div')
        modalFooter.setAttribute('class', 'input-modal-footer')
        asideModalEl.appendChild(modalFooter)

        // SAVE BTN
        const saveButton = document.createElement('div')
        saveButton.setAttribute('class', 'blue-btn')
        saveButton.innerHTML = 'SALVAR'
        modalFooter.appendChild(saveButton)

        saveButton.addEventListener('click', () => {
            confirmData()
        })


        input.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
              event.preventDefault();
              confirmData()
            }
          });



        function confirmData() {
            
            if (input.value) {
                resolve(input.value)
                asideModalBody.classList.add('hide-input-modal')
                setTimeout(() => {
                    asideModalBody.remove()
                }, 700)
            } else {
                let x = 'Compo obrigatório.'
                asideModalContent.innerHTML += x
            }


        }







    })

}


/*
function openInputModal(data) {

    let inputs = data.type

    console.log(data.type, data.label);

    const asideModalBody = document.createElement('div')
    asideModalBody.setAttribute('id', 'modal-body')

    const asideModalEl = document.createElement('div')
    asideModalEl.setAttribute('id', 'input-modal')
    asideModalEl.setAttribute('class', 'input-modal')
    asideModalBody.appendChild(asideModalEl)


    const DOMBody = document.querySelector('body')
    DOMBody.appendChild(asideModalBody)


    asideModalBody.addEventListener('click', event => {

        const isClickInside = asideModalEl.contains(event.target)

        if (!isClickInside) {

            asideModalBody.classList.add('hide-input-modal')

            setTimeout(() => {
                 asideModalBody.remove()
            }, 700)

        }
    })



            // HEADER
            /*const modalHeader = document.createElement('div')
            modalHeader.setAttribute('class', 'input-modal-header')
            asideModalEl.appendChild(modalHeader)

            const modalTitle = document.createElement('span')
            modalTitle.setAttribute('class', 'input-modal-header-title')
            modalHeader.appendChild(modalTitle)
            modalTitle.innerHTML = title.toUpperCase()*/


// RESPONSE
/* const asideModalContent = document.createElement('div')
 asideModalContent.setAttribute('id', 'input-modal-content')
 asideModalContent.setAttribute('class', 'input-modal-content')
 asideModalEl.appendChild(asideModalContent)


 const label = document.createElement('label')
 label.innerHTML = data.label
 asideModalContent.appendChild(label)


 const input = document.createElement('input')
 input.setAttribute('type', data.type)
 input.setAttribute('style', 'width: 100%')
 asideModalContent.appendChild(input)
 


 // FOOTER
 const modalFooter = document.createElement('div')
 modalFooter.setAttribute('class', 'input-modal-footer')
 asideModalEl.appendChild(modalFooter)


 
 
 
 modalFooter.innerHTML = 'TESTE'





 



}*/

