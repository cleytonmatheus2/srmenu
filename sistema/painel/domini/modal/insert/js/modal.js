
function openDominiModal(data) {

    let title = data.title
    let pag  = data.fetch
    let spt = data.script

    const asideModalBody = document.createElement('div')
    asideModalBody.setAttribute('id', 'modal-body')

    const asideModalEl = document.createElement('div')
    asideModalEl.setAttribute('id', 'domini-modal')
    asideModalEl.setAttribute('class', 'domini-modal')
    asideModalBody.appendChild(asideModalEl)


    // LOADER
    const loaderContent = document.createElement('div')
    loaderContent.setAttribute('class', 'loader-content')
    const loaderCSS = document.createElement('span')
    loaderCSS.setAttribute('class', 'loader')
    loaderContent.appendChild(loaderCSS)
    asideModalEl.appendChild(loaderContent)


    const DOMBody = document.querySelector('body')
    DOMBody.appendChild(asideModalBody)


    asideModalBody.addEventListener('click', event => {

        const isClickInside = asideModalEl.contains(event.target)

        if (!isClickInside) {

            asideModalBody.classList.add('hide-modal')

            setTimeout(() => {
                 asideModalBody.remove()
            }, 700)

        }
    })




    fetch(pag).then((res) => {
        return res.text()
    }).then((res) => {

        setTimeout(() => {

            loaderContent.remove()

            // HEADER
            const modalHeader = document.createElement('div')
            modalHeader.setAttribute('class', 'modal-header')
            asideModalEl.appendChild(modalHeader)
        
            const modalTitle = document.createElement('span')
            modalTitle.setAttribute('class', 'modal-header-title')
            modalHeader.appendChild(modalTitle)
            modalTitle.innerHTML = title.toUpperCase()


            // RESPONSE
            const asideModalContent = document.createElement('div')
            asideModalContent.setAttribute('id', 'modal-content')
            asideModalContent.setAttribute('class', 'modal-content')
            asideModalEl.appendChild(asideModalContent)

            asideModalContent.innerHTML = res
            


            // FOOTER
            const modalFooter = document.createElement('div')
            modalFooter.setAttribute('class', 'modal-footer')
            asideModalEl.appendChild(modalFooter)


            
        
            
            modalFooter.innerHTML = 'TESTE'


            console.log();
            const scriptEl = document.createElement('script')
            scriptEl.setAttribute('type', 'text/javascript')
            scriptEl.setAttribute('src', spt)

            document.body.appendChild(scriptEl)
            
        }, 1500)

    })


 



}

