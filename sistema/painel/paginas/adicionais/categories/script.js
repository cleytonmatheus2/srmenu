let lastValue = null;










const adcType = document.querySelectorAll('.optional-type')
const typeInputSelector = document.querySelector('#select_tipo')

const requiredSelector = document.querySelectorAll('[data-selector="obrigatorio"]')
const requiredSelectorInput = document.querySelector('#required_select')

const LimitQuant = document.querySelectorAll('[data-selector="limitar-quantidade"]')
const LimitQuantInput = document.querySelector('#limit_quant_select')





const [tipoOpcional, setTipoOpcional] = useState(0);
const [obrigatorio, setObrigatorio] = useState(0);
const [qtdeMaxima, setQtdeMaxima] = useState(0);



uxSelector([adcType, requiredSelector, LimitQuant])


function uxSelector(selectorEl) {

  selectorEl.forEach((elem, iList) => {

    elem.forEach((el, idx) => {

      // selectorConstructor.push(idx)


      el.addEventListener('click', (n) => {









        if (iList == 0) {

          setTipoOpcional(idx)


          if (idx == 0) {

            addArrayClass(selectorEl[2], 'desable-event')

          } else if (idx != 0) {

            cleanArrayClass(selectorEl[2], 'desable-event')

          }



        } else if (iList == 1) {

          setObrigatorio(idx)

          if (idx == 1) {
            openInputModal({
              type: 'text',
              label: 'Mínimo Permitido'
            }).then((res) => {
              //selectorIpt.value = res;
              let nRes = res == 1 ? `${res} ITEM` : `${res} ITENS`;
              elem[idx].querySelector('span').innerHTML = nRes;
            })
          }


        } else if (iList == 2) {

          setQtdeMaxima(idx)

        }

        console.log("OPC: ", tipoOpcional());
        console.log('OBG: ', obrigatorio());
        console.log('QTD: ', qtdeMaxima());



        cleanArrayClass(elem, 'selected-option')
        cleanArrayClass(elem, 'default-selected')

        idx == 0 ? el.classList.add('default-selected') : el.classList.add('selected-option')













        if (iList == 2 && idx == 0) {
          selectorEl[0][0].classList.remove('desable-event')
        } else if (iList == 2 && idx == 1) {
          selectorEl[0][0].classList.add('desable-event')
          openInputModal({
            type: 'text',
            label: 'Máximo Permitido'
          }).then((res) => {
            //selectorIpt.value = res;
            let nRes = res == 1 ? `${res} ITEM` : `${res} ITENS`;
            elem[idx].querySelector('span').innerHTML = nRes;
          })
        }




      })


    })



  })
}


const cleanArrayClass = (el, cl) => {
  el.forEach((e) => {
    e.classList.remove(cl)
  })
}

const addArrayClass = (el, cl) => {
  el.forEach((e) => {
    e.classList.add(cl)
  })
}



/*

// Main function useState (similar to react Hook)
function useState(value) {
  // Using first func to simulate initial value
  const getValue = () => {
    return value;
  };

  // The second function is to return the new value
  const updateValue = (newValue) => {
    // console.log(`Value 1 is now: ${newValue}`);
    return value = newValue;
  };

  // Returning results in array
  return [getValue, updateValue];
}


*/



function useState(defaultValue) {
  let value = defaultValue

  function getValue() {
    return value
  }

  function setValue(newValue) {
    value = newValue
  }

  return [getValue, setValue];
}

