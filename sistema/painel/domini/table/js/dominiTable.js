///////////////////////////////////////////////////////////////////////////////////////////////////////
/**-----------------------------------------[ TABLE DOM  ]-----------------------------------------**/
/////////////////////////////////////////////////////////////////////////////////////////////////////

let dominiElement = document.querySelector('div[id="domini-table"]')

let filterOptions = document.createElement('div')
filterOptions.setAttribute('class', 'filter-optins')
dominiElement.appendChild(filterOptions)

let tableSearch = document.createElement('input')

tableSearch.setAttribute('id', 'table-search')
tableSearch.setAttribute('placeholder', 'Pesquisa...')
tableSearch.setAttribute('type', 'text')
filterOptions.appendChild(tableSearch)

let searchBar = (e)=> {

    dominiTable.list({ 'filters': { 
        'search': {
            'value': e.target.value
        }
    }})
}
tableSearch.addEventListener('keyup', searchBar)



let selectContent = document.createElement('div')
selectContent.setAttribute('class', 'select-content')

let selectLabelLeft = document.createElement('label')
selectLabelLeft.setAttribute('class', 'label-select')
selectLabelLeft.innerHTML = "Mostrar"
selectContent.appendChild(selectLabelLeft)

let selectLimit = document.createElement('select')
selectLabelLeft.setAttribute('id', 'limit-quant-table')
selectLabelLeft.setAttribute('class', 'selectDomini')
selectLimit.setAttribute('onchange', 'dominiTable.list({"qtd_result_pag": this.value})')
selectContent.appendChild(selectLimit)

let selectValues = [5, 15, 30, 50]
selectValues.forEach(v => {
    let selectOption = document.createElement('option')
    selectOption.setAttribute('value', v)
    if (v == 15) {
        selectOption.setAttribute('selected', 'selected')
    }
    selectOption.innerHTML = v
    selectLimit.appendChild(selectOption)

});

let dateFilter = document.createElement('input')
dateFilter.setAttribute('name', 'daterange')
dateFilter.setAttribute('class', 'daterange')
dateFilter.setAttribute('type', 'text')
filterOptions.appendChild(dateFilter)



let selectLabelRight = document.createElement('label')
selectLabelRight.setAttribute('class', 'label-select')
selectLabelRight.innerHTML = "Itens"
selectContent.appendChild(selectLabelRight)

filterOptions.appendChild(selectContent)


let tableContent = document.createElement('div')
tableContent.setAttribute('class', 'table-content')
dominiElement.appendChild(tableContent)

let scrollableTable = document.createElement('div');
scrollableTable.setAttribute('class', 'scrollable-table')
tableContent.appendChild(scrollableTable)

let tableDOM = document.createElement('table');
scrollableTable.appendChild(tableDOM)


let theadDOM = document.createElement('thead');
tableDOM.appendChild(theadDOM)

let trHeadDOM = document.createElement('tr');
theadDOM.appendChild(trHeadDOM)


///////////////////////////////////////////////////////////////////////////////////////////////////////

// Data Configs
let table, columns, primary, firstLoad = true;

// Head Table
let labels,style 

// Rows Table
let replace, marker, dateformat

/*-----[ Table Functions ]-----*/ 

let active, actions

// date filter
let start, end

let actionsWdt

// ORDER BY
let orderColumn, orderState = 'DESC';

// PAGINATION
let pagina, total_query_result, qtd_result_pag = 15


let images


//


let tbodyDOM

let filterCategory

/*----------------------------*/ 


let tr, th, delBtn, delSvg, editBtn, editSvg


/* search */
let  search, searchColumn


const dominiTable = {

    list: (data) => {


        // RESULT PER PAGE & PAGINATION 
        qtd_result_pag = data?.qtd_result_pag ? data?.qtd_result_pag : qtd_result_pag
        
        if (data?.pagination) {
            pagina = data?.pagination[0]
        }else{
            pagina = 1
        }


        filterCategory = data?.filterCategory

        
        date = data?.datefilter

        // ORDER 
        if (data?.order) {

            orderColumn = data.order.column
            orderState = orderState == 'DESC' ? 'ASC' : 'DESC'

            dominiTable.list()

        }



        if (firstLoad) {

            // SAVE DATA CONFIG ON FIRST LOAD

            table = data.table
            columns = data?.columns
            primary = data?.primary

            //Head
            labels = data.thead?.labels
            style = data.thead?.style

            active = data?.active

            actions = data?.actions

            //Rows
            replace = data.rows?.replace
            marker = data.rows?.marker
            dateformat = data.dateformat

            moneyformat = data.formatter?.money

            images = data?.images    
            
             /* search */
            searchColumn = data?.filters?.search?.column


            addItem = data?.add


        }


        search = data?.filters?.search?.value
        search = search ? search : '';


        


        if (firstLoad) {

            let theadActionsWdt = 0
            let activeWidth = 0
            for (let i = 0; i < labels.length; i++) {

                let theadWdtS = style[i].width
                let theadWFlot = theadWdtS.replace(/%/g, '')
                let wdtNum = parseFloat(theadWFlot)

                theadActionsWdt = wdtNum + theadActionsWdt


                thHeadDOM = document.createElement('th');
                thHeadDOM.setAttribute('class', 'table-head')
                thHeadDOM.setAttribute('width', style[i].width)



                pHeadDOM = document.createElement('p');
                pHeadDOM.innerHTML = labels[i]



                let sortEl = document.createElement('span')
                
                let sortSVG = '<svg class="tableSort arrow-sort" version="1.0" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 500.000000 380.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,380.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M1105 3771 c-48 -22 -79 -54 -100 -103 -13 -33 -15 -209 -15 -1563 0 -839 -2 -1525 -5 -1525 -2 0 -162 117 -355 259 -192 143 -366 265 -386 271 -46 15 -113 5 -156 -23 -97 -66 -114 -200 -35 -282 42 -44 989 -743 1046 -772 52 -27 97 -29 147 -8 20 8 208 142 418 297 608 450 654 486 672 521 10 18 18 57 18 89 1 47 -4 63 -29 99 -58 83 -153 110 -235 67 -25 -13 -195 -135 -378 -271 -183 -136 -335 -247 -337 -247 -3 0 -5 683 -5 1518 0 1013 -4 1529 -10 1554 -21 76 -102 138 -180 138 -19 0 -53 -9 -75 -19z"/> <path d="M3739 3767 c-56 -29 -1015 -738 -1051 -777 -56 -61 -59 -157 -7 -229 54 -76 150 -100 229 -59 25 13 195 135 378 271 183 136 335 247 337 247 3 0 5 -683 5 -1517 0 -1014 4 -1530 10 -1555 21 -76 102 -138 180 -138 43 0 107 29 137 61 56 61 53 -33 53 1624 0 839 2 1525 5 1525 3 0 162 -117 355 -259 192 -143 366 -265 386 -271 70 -24 160 8 208 73 30 41 30 173 0 214 -26 34 -1013 768 -1069 794 -54 25 -102 24 -156 -4z"/> </g> </svg>'
                let sortSVGActivated = '<svg class="tableSort activated arrow-sort" version="1.0" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 500.000000 380.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,380.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M1105 3771 c-48 -22 -79 -54 -100 -103 -13 -33 -15 -209 -15 -1563 0 -839 -2 -1525 -5 -1525 -2 0 -162 117 -355 259 -192 143 -366 265 -386 271 -46 15 -113 5 -156 -23 -97 -66 -114 -200 -35 -282 42 -44 989 -743 1046 -772 52 -27 97 -29 147 -8 20 8 208 142 418 297 608 450 654 486 672 521 10 18 18 57 18 89 1 47 -4 63 -29 99 -58 83 -153 110 -235 67 -25 -13 -195 -135 -378 -271 -183 -136 -335 -247 -337 -247 -3 0 -5 683 -5 1518 0 1013 -4 1529 -10 1554 -21 76 -102 138 -180 138 -19 0 -53 -9 -75 -19z"/> <path d="M3739 3767 c-56 -29 -1015 -738 -1051 -777 -56 -61 -59 -157 -7 -229 54 -76 150 -100 229 -59 25 13 195 135 378 271 183 136 335 247 337 247 3 0 5 -683 5 -1517 0 -1014 4 -1530 10 -1555 21 -76 102 -138 180 -138 43 0 107 29 137 61 56 61 53 -33 53 1624 0 839 2 1525 5 1525 3 0 162 -117 355 -259 192 -143 366 -265 386 -271 70 -24 160 8 208 73 30 41 30 173 0 214 -26 34 -1013 768 -1069 794 -54 25 -102 24 -156 -4z"/> </g> </svg>'

                sortEl.innerHTML = sortSVG

                //let sortSVG = '<svg class="tableSort btn-sort" xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" stroke="none"> <path d="M1276 4090 c-43 -13 -90 -49 -117 -88 l-24 -36 -3 -1218 c-1 -670 -6 -1218 -10 -1218 -4 0 -68 61 -142 136 -144 145 -187 174 -260 174 -159 0 -256 -176 -172 -311 11 -19 168 -181 349 -360 340 -338 354 -349 434 -349 80 0 91 9 441 358 186 185 345 351 354 369 64 136 -34 292 -184 293 -73 0 -109 -24 -259 -172 l-143 -142 -2 1210 -3 1211 -30 49 c-48 77 -150 119 -229 94z"/> <path d="M2696 3675 c-76 -27 -135 -110 -136 -190 0 -61 41 -139 91 -172 l43 -28 878 -3 c855 -2 879 -2 917 17 69 35 121 115 121 185 0 81 -73 174 -152 194 -73 19 -1709 16 -1762 -3z"/> <path d="M2670 2637 c-147 -77 -144 -281 4 -360 41 -22 46 -22 501 -22 457 0 460 0 502 22 67 36 113 113 113 187 0 54 -44 132 -91 163 l-43 28 -471 3 -471 3 -44 -24z"/> <path d="M2685 1621 c-140 -66 -166 -238 -52 -338 54 -48 94 -55 259 -51 144 3 147 3 190 33 61 43 88 95 88 170 0 75 -27 127 -88 170 -44 30 -44 30 -200 33 -137 2 -162 0 -197 -17z"/> </g> </svg>'
                
                let countClick = 0
                sortEl.onclick = (e)=> {
                    countClick = countClick == 0 ? 1 : 0;
                    sortEl.innerHTML = countClick == 1 ? sortSVGActivated : sortSVG
                    dominiTable.list({ 'order': { column: columns[i], 'state': orderState } } )
                }


                thHeadDOM.appendChild(sortEl)

                thHeadDOM.appendChild(pHeadDOM)


                trHeadDOM.appendChild(thHeadDOM)
            }



            if(addItem){
                let newItemBtn = document.createElement('div');
                newItemBtn.setAttribute('class', 'new-item');
                newItemBtn.innerHTML = addItem.text;

                newItemBtn.onclick = ()=>{
                    openDominiModal(addItem.fetch, addItem.text)
                }
            
                filterOptions.appendChild(newItemBtn)
            }
            



            if (active) {
                actionsWdt = 8

                thHeadActive = document.createElement('th');
                thHeadActive.setAttribute('class', 'table-head')
                thHeadActive.setAttribute('width', actionsWdt + '%')
                let activeP = document.createElement('p');
                thHeadActive.appendChild(activeP)
                activeP.innerHTML = active ? active.title : "Ativar";

                trHeadDOM.appendChild(thHeadActive)

            }



            actionsWdt = 100 - actionsWdt - theadActionsWdt
            if (data.actions) {
                thHeadActDOM = document.createElement('th');
                thHeadActDOM.setAttribute('class', 'table-head')
                thHeadActDOM.setAttribute('width', actionsWdt + '%')


                pHeadActDOM = document.createElement('p');
                pHeadActDOM.innerHTML = "Ações";
                thHeadActDOM.appendChild(pHeadActDOM)

                thHeadActDOM.appendChild(pHeadActDOM)

                trHeadDOM.appendChild(thHeadActDOM)


            }

        }





        if (date) {
            start = date.start
            end = date.end
        } else {
            start = null
            end = null
        }

        fetch('domini/table/backend/list.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify({
                'table': table,
                'id': primary,
                'columns': columns,
                'active': active.column,
                'pagina': pagina,
                'qtd_result_pag': qtd_result_pag,
                'order_column': orderColumn,
                'order_state': orderState,
                'archive_img': images?.archive_img,
                'filter_id': filterCategory?.id,
                'filter_column': filterCategory?.column,
                'search_column': searchColumn,
                'search_value': search,
                'start': null,
                'end': null
            })

        }).then((res) => {
            return res.json()
        }).then((res) => {

            
            dominiTable.createListDOM(res)

        });

        dominiTable.createPaginationDOM()



    },

    update: (e) => {

        let toggle = e.target.checked ? active.toggle.activated : active.toggle.disabled;

        fetch('domini/table/backend/update.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify({
                'id': e.target.id,
                'table': table,
                'column': active.column,
                'data': toggle,
            })

        }).then((res) => {
            return res.json()
        }).then((res) => {


            if (res) {
                //setTimeout(dominiTable.list, 1000)
            }

        })



    },

    delete: (primary) => {

        alert(`deseja deletar o item ${primary}`)

    },

    createListDOM: (res)=>{

        total_query_result = res[1]


        // TBODY DOM CLEAN
        if (!firstLoad) {
            document.querySelector('tbody[name="tbody-dom"]').remove()
        }


        tbodyDOM = document.createElement('tbody')
        tbodyDOM.setAttribute('name', 'tbody-dom')
        tableDOM.appendChild(tbodyDOM)

        for (let i = 0; i < res[0].length; i++) {

            tr = document.createElement('tr');

            columns.forEach((tab, ind) => {

                td = document.createElement('td');
                let tdSpan = document.createElement('span');



                if(images){
                    if(tab == images.column){
                        let image = document.createElement('img');  
                        image.setAttribute('src', images.path+'/'+res[0][i][images.archive_img])
                        image.setAttribute('class', 'table-img ')
                        tdSpan.appendChild(image)
                    }

                }

                
                let dataStr = res[0][i][tab];
                dataStr = dataStr.length > 30 ? dataStr.substring(0,30)+'...' : dataStr;

                if (moneyformat) {
                    moneyformat.columns.forEach(mcol => {
                        if (tab == mcol) {
                            dataStr = parseFloat(dataStr).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'})
                        }
                    })
                }
               
                td.appendChild(tdSpan)
                tdSpan.innerHTML += dataStr;

                if(marker){
                    marker.forEach((mkr) => {
                        if (mkr.role == res[0][i][tab] && mkr.type == 'green' ) {
                            tdSpan.classList.add('green-table-marker')
                        }
                        if (mkr.role == res[0][i][tab] && mkr.type == 'red') {
                            tdSpan.classList.add('red-table-marker')
                        }

                    })
                }
                
                if(dateformat){
                    dateformat.forEach((cl) => {
                        if (cl == tab) {
                            let parts = res[0][i][tab].split('-');
                            tdSpan.innerHTML = parts[2] + '/' + parts[1] + '/' + parts[0];
                        }
                    })
                }  
                
                if(replace){
                    replace.forEach((er, x) => {
                        if (er.rep == res[0][i][tab]) {
                            tdSpan.innerHTML = er.to;
                        }
                    })
                }

                

                tr.appendChild(td)

            });


            if (active) {
                td = document.createElement('td')
                td.setAttribute('class', 'active-switch')

                centerTD = document.createElement('span')
                centerTD.setAttribute('class', 'center-td')


                labeSwitch = document.createElement('label')
                labeSwitch.setAttribute('class', 'switch')
                centerTD.appendChild(labeSwitch)

                inputSwitch = document.createElement('input')

                let switchID = (Math.random() + 1).toString(36).substring(7);
                inputSwitch.addEventListener('click', dominiTable.update)
                inputSwitch.setAttribute('id', res[0][i][primary])


                inputSwitch.setAttribute('type', 'checkbox')
                labeSwitch.appendChild(inputSwitch)

                if (res[0][i][active.column] == active.toggle.activated) {
                    inputSwitch.checked = true
                }


                spanSwitch = document.createElement('span')
                spanSwitch.setAttribute('class', 'slider')
                labeSwitch.appendChild(spanSwitch)

                ballSwitch = document.createElement('span')
                ballSwitch.setAttribute('class', 'switch-ball')
                spanSwitch.appendChild(ballSwitch)

                td.appendChild(centerTD)

                tr.appendChild(td)

            }


            if (actions) {
                td = document.createElement('td')
                td.setAttribute('class', 'actions-btn')
                //////   td.setAttribute('width', actionsWdt+'%')

                if (actions.edit) {
                    editBtn = document.createElement('span')
                    editBtn.setAttribute('class', 'action-icon')
                    editBtn.onclick = ()=> {
                        dominiTable.delete(res[0][i][primary])
                    }
                    editSvg = `<svg class="edit-svg" xmlns="http://www.w3.org/2000/svg" version="1.0" width="18px" height="18px" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" stroke="none">
                        <path d="M2000 2529 c-30 -5 -89 -25 -130 -45 -72 -34 -94 -54 -550 -512 -506 -508 -525 -529 -572 -672 -19 -57 -22 -92 -26 -296 l-4 -232 37 -37 37 -36 231 3 c206 3 239 6 297 26 144 48 164 65 671 572 331 330 484 490 503 525 81 146 85 302 12 450 -65 133 -200 232 -346 255 -74 11 -84 11 -160 -1z m155 -250 c25 -7 58 -29 86 -58 69 -69 88 -163 50 -247 -20 -43 -136 -174 -155 -174 -14 0 -316 301 -316 315 0 10 75 86 127 129 50 41 133 55 208 35z m-493 -961 c-266 -265 -305 -301 -365 -328 -71 -34 -153 -49 -260 -50 l-69 0 4 133 c5 208 2 202 365 569 l297 299 163 -163 164 -163 -299 -297z"/>
                        <path d="M237 2356 c-112 -47 -192 -136 -222 -251 -13 -51 -15 -173 -15 -905 0 -897 0 -892 48 -986 30 -58 121 -138 190 -166 l57 -23 765 0 765 0 67 32 c81 38 151 107 187 183 26 54 26 59 29 322 l3 267 -33 36 c-40 44 -90 55 -139 31 -62 -29 -63 -37 -69 -296 -4 -210 -7 -238 -25 -267 -39 -65 -10 -63 -792 -63 -685 0 -709 1 -740 20 -66 40 -63 -8 -63 917 0 798 1 839 19 866 41 64 27 62 471 67 444 5 436 4 465 66 19 40 19 68 0 108 -32 67 -27 66 -492 66 -417 0 -418 -1 -476 -24z"/>
                        </g></svg>`
                    editBtn.innerHTML = editSvg

                    td.appendChild(editBtn)
                }


                if (actions.delete) {
                    delBtn = document.createElement('span')
                    delBtn.setAttribute('class', 'action-icon')
                    delBtn.onclick = (e)=> {
                        dominiTable.delete(res[0][i][primary])
                    }
                    delSvg = `<svg xmlns="http://www.w3.org/2000/svg" class="trash-svg" version="1.0" width="23px" height="23px" viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)"  stroke="none">
                        <path d="M901 2434 c-39 -28 -51 -73 -51 -194 l0 -110 -225 0 c-144 0 -233 -4 -249 -11 -60 -28 -71 -122 -20 -170 l26 -24 898 0 898 0 26 24 c51 48 40 142 -20 170 -16 7 -105 11 -249 11 l-225 0 0 110 c0 121 -12 166 -51 194 -21 14 -66 16 -379 16 -313 0 -358 -2 -379 -16z m589 -249 l0 -55 -210 0 -210 0 0 55 0 55 210 0 210 0 0 -55z"/>
                        <path d="M459 1780 l-30 -29 3 -668 3 -668 33 -68 c43 -86 113 -156 199 -199 l68 -33 545 0 545 0 68 33 c86 43 156 113 199 199 l33 68 3 668 3 668 -30 29 c-48 48 -130 38 -164 -20 -15 -25 -17 -88 -17 -653 l0 -625 -28 -53 c-22 -43 -38 -59 -81 -81 l-53 -28 -478 0 -478 0 -53 28 c-43 22 -59 38 -81 81 l-28 53 0 625 c0 565 -2 628 -17 653 -34 58 -116 68 -164 20z"/>
                        <path d="M1025 1591 c-11 -5 -29 -19 -40 -31 -19 -21 -20 -36 -20 -440 l0 -418 24 -26 c48 -51 142 -40 170 20 16 36 15 813 -1 849 -20 45 -82 66 -133 46z"/>
                        <path d="M1438 1583 c-14 -9 -31 -27 -37 -40 -15 -34 -15 -813 0 -847 28 -60 122 -71 170 -20 l24 26 0 419 0 419 -26 26 c-33 33 -94 41 -131 17z"/>
                        </g></svg>`
                    delBtn.innerHTML = delSvg

                    td.appendChild(delBtn)
                }



                tr.appendChild(td)
            }

            ///


            tbodyDOM.appendChild(tr)

        }




        dataFunction = JSON.stringify(columns)



        firstLoad = false


    },

    createPaginationDOM: () => {

        if (!pagina) {
            pagina = 1
        }


        //$totalList
        let total_query_r = firstLoad ? 30 : total_query_result
        let ultima_pag = Math.ceil(total_query_r / qtd_result_pag);


        //max links
        let max_links = 2;


        if (!firstLoad) {
            document.querySelector('div[class="pagination-content"]').remove()
        }

        let buttonContent = document.createElement('div');
        buttonContent.setAttribute('class', 'pagination-content');


        let left2ArrowVal = pagina - 1 != 1 && pagina != 1 ? pagina - 2 : pagina
        let left2ArrowEl = document.createElement('div')
        left2ArrowEl.setAttribute('class', 'pag-btn')
        left2ArrowEl.classList.add('class', 'page-arrow')
        let left2ArrowSp = document.createElement('span')
        left2ArrowSp.innerText = '<<';
        left2ArrowEl.onclick = (e)=> {
            dominiTable.list({'pagination': [left2ArrowVal, qtd_result_pag]})
        }
        left2ArrowEl.appendChild(left2ArrowSp)

        buttonContent.appendChild(left2ArrowEl)



        let leftArrowEl = document.createElement('div')
        leftArrowEl.setAttribute('class', 'pag-btn')
        leftArrowEl.classList.add('class', 'page-arrow')
        let leftArrowSp = document.createElement('span')
        leftArrowSp.innerText = '<';
        leftArrowEl.onclick = (e)=> {
            dominiTable.list({'pagination': [1, qtd_result_pag]})
        }
        leftArrowEl.appendChild(leftArrowSp)

        buttonContent.appendChild(leftArrowEl)



        for (let pag_ant = pagina - max_links; pag_ant <= pagina - 1; pag_ant++) {


            if (pag_ant >= 1) {

                let pagAntEl = document.createElement('div')
                pagAntEl.setAttribute('class', 'pag-btn')
                pagAntEl.classList.add('class', 'unselect-page')
                let pagAntSp = document.createElement('span')
                pagAntSp.innerHTML = pag_ant;
                pagAntEl.onclick = (e)=> {
                    dominiTable.list({'pagination': [pag_ant, qtd_result_pag]})
                }
                pagAntEl.appendChild(pagAntSp)

                buttonContent.appendChild(pagAntEl)

            }
        }

        let curBtnEl = document.createElement('div')
        curBtnEl.setAttribute('class', 'pag-btn')
        curBtnEl.classList.add('class', 'cur-page')
        let curBtnSp = document.createElement('span')
        curBtnSp.innerHTML = pagina;
        curBtnEl.appendChild(curBtnSp)

        buttonContent.appendChild(curBtnEl)





        for (let pag_post = pagina + 1; pag_post <= pagina + 2; pag_post++) {

            if (pag_post <= ultima_pag) {


                let pagPostEl = document.createElement('div')
                pagPostEl.setAttribute('class', 'pag-btn')
                pagPostEl.classList.add('class', 'unselect-page')
                let pagPostSp = document.createElement('span')
                pagPostSp.innerHTML = pag_post;
                pagPostEl.onclick = (e)=> {
                    dominiTable.list({'pagination': [pag_post, qtd_result_pag]})
                }
                pagPostEl.appendChild(pagPostSp)

                buttonContent.appendChild(pagPostEl)



            }

        }

        let rightArrowVal = pagina != ultima_pag ? pagina + 1 : pagina
        let rightArrowEl = document.createElement('div')
        rightArrowEl.setAttribute('class', 'pag-btn')
        rightArrowEl.classList.add('class', 'page-arrow')
        let rightArrowSp = document.createElement('span')
        rightArrowSp.innerText = '>';
        rightArrowEl.onclick = (e)=> {
            dominiTable.list({'pagination': [rightArrowVal, qtd_result_pag]})
        }
        rightArrowEl.appendChild(rightArrowSp)

        buttonContent.appendChild(rightArrowEl)


        let right2ArrowVal = pagina + 1 != ultima_pag && pagina != ultima_pag ? pagina + 2 : pagina
        let right2ArrowEl = document.createElement('div')
        right2ArrowEl.setAttribute('class', 'pag-btn')
        right2ArrowEl.classList.add('class', 'page-arrow')
        let right2ArrowSp = document.createElement('span')
        right2ArrowSp.innerText = '>>';
        right2ArrowEl.onclick = (e)=> {
            dominiTable.list({'pagination': [right2ArrowVal, qtd_result_pag]})
        }
        right2ArrowEl.appendChild(right2ArrowSp)

        buttonContent.appendChild(right2ArrowEl)


        tableContent.appendChild(buttonContent)


        
    }

}



$(function () {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        "autoApply": true,
        "locale": {
            "direction": "ltr",
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "fromLabel": "De",
            "toLabel": "até",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Dom",
                "Seg",
                "Ter",
                "Qua",
                "Qui",
                "Sex",
                "Sáb"
            ],
            "monthNames": [
                "Janeiro",
                "Fevereiro",
                "Março",
                "Abril",
                "Maio",
                "Junho",
                "Julho",
                "Agosto",
                "Setembro",
                "Outubro",
                "Novembro",
                "Dezembro"
            ]
        },
    }, function (start, end, label) {

        let date = {
            "datafilter": {
                "start": start.format('YYYY-MM-DD'),
                "end": end.format('YYYY-MM-DD')
            }

        }

        dominiTable.list(date)

    });
});