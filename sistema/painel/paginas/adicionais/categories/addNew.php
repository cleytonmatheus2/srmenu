<?php
require_once ("../../../../conexao.php");
?>



<form>

  <input id="formEdit" name="formEdit" type="hidden" value="">


  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">



        <div class="form-group">





          <div id="opcoesNovoAdc">

            <label style="font-weight: 500; margin-top: -50px;">Selecione os Produtos</label><br>



            <?php
            $campoId = '';
            ?>
            <div class="BoxScrollSelect">


              <input data-inputsearch="searchBox" data-searchid="listProds" class="searchProd inputDomini widthPerc97"
                value="" type="text" placeholder="Buscar produto...">

              <div class="editando ">
                <input id="Todos" data-todosid="Todos" data-checkbox="listProds" type="checkbox">
                <label for="Todos" class="selecionarTodos" style="font-weight: 500;">Selectionar Todos</label>
                <div class="itensSelecionados"><span id="quantItensSelecionados"
                    data-quantlist="listProds">0</span><span> selecionados</span> </div>
              </div>

              <hr style="margin: 5px 5px">

              <ul>


                <?php
                $query31 = $pdo->query("SELECT * FROM produtos ORDER BY id desc");
                $res31 = $query31->fetchAll(PDO::FETCH_ASSOC);
                $total_reg31 = @count($res31);
                if ($total_reg31 > 0) {
                  for ($i1 = 0; $i1 < $total_reg31; $i1++) {

                    $nome = $res31[$i1]['nome'];
                    $id_prod = $res31[$i1]['id'];

                    ?>

                    <li data-list="listProds" data-checkbox="divProds" style="display: block;">
                      <input data-inputlist="listProds" id="<?= $id_prod; ?>" value="<?= $id_prod; ?>"
                        name="produtChecked[]" type="checkbox">
                      <label for="<?= $id_prod; ?>" class="listItensSQL">
                        <?= $nome; ?>
                      </label><br>
                    </li>

                    <?php
                  }
                  ?>

                </ul>

              <?php } else { ?>

                <span>Nenhum produto encontrado.</span>

                <?php

                }

                ?>
              <span id="prodNaoEncontrado" style="display:none">Nenhum produto encontrado.</span>


            </div>

            <span id="minimoEscolha" class="alertMessage"></span>

            <br>








            <div style="padding-top: 10px;  widthPerc100;">
              <label data-label="labelTop " style="widthPerc100">Nome do Adicional</label>
              <input type="text" class="inputDomini" id="nome_adicional" name="nome_adicional"
                placeholder="Exemplo: Molhos, Acréscimos etc...">
            </div>

            <span id="codCadastrado"></span>


            <div class="select-title flex justify-center">TIPO DE OPCIONAL</div>


            <div class="flex flex-row justify-center wdt-100">








              






              <div class="selector-content optional-selector-content optional-type default-selected">
                <div class="selector-option-title flex justify-center">ÚNICO</div>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

                <hr>

                <div class="divListagemItens rubik-family">
                  <div id="clickDiv" class="btn-ripple clickDiv" data-itemid="keyItem422ID1" data-tipo="Unico"
                    data-adicionais="plusCategoriaKey1"></div>
                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Pequeno</span>
                    <span class="precoItem ">+ R$ 5,50</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">
                    <input class="radioopcionais" type="radio">
                  </div>
                </div>
                <hr>
                <div id="divListagemItens" class="divListagemItens rubik-family">
                  <div id="clickDiv" class="btn-ripple clickDiv" data-itemid="keyItem422ID1" data-tipo="Unico"
                    data-adicionais="plusCategoriaKey1"></div>
                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Médio</span>
                    <span class="precoItem ">+ R$ 8,60</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">
                    <input class="radioopcionais" type="radio" checked>
                  </div>
                </div>

                <hr>

                <div id="divListagemItens" class="divListagemItens rubik-family">
                  <div id="clickDiv" class="btn-ripple clickDiv" data-itemid="keyItem422ID1" data-tipo="Unico"
                    data-adicionais="plusCategoriaKey1"></div>
                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Grande</span>
                    <span class="precoItem ">+ R$ 12,90</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">
                    <input class="radioopcionais" type="radio">
                  </div>
                </div>

              </div>


              <div class="selector-content optional-selector-content optional-type ">
                <div class="selector-option-title flex justify-center">MÚLTIPLO</div>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

                <hr>

                <div id="divListagemItens" class="divListagemItens rubik-family">

                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Molho Inglês</span>
                    <span class="precoItem ">+ R$ 3,00</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">
                    <input id="keyItem3393ID11" class="CheckBoxVerifyKey3" type="checkbox" checked>
                  </div>
                </div>
                <hr>
                <div id="divListagemItens" class="divListagemItens rubik-family">

                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Molho Inglês</span>
                    <span class="precoItem ">+ R$ 3,00</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">
                    <input id="keyItem3393ID11" class="CheckBoxVerifyKey3" type="checkbox" checked>
                  </div>
                </div>
                <hr>
                <div id="divListagemItens" class="divListagemItens rubik-family">

                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Molho Inglês</span>
                    <span class="precoItem ">+ R$ 3,00</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">
                    <input id="keyItem3393ID11" class="CheckBoxVerifyKey3" type="checkbox">
                  </div>
                </div>

              </div>



              <div class="selector-content optional-selector-content  optional-type">

                <div class="selector-option-title flex justify-center">DIVERSO</div>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

                <hr>

                <div class="divListagemItens rubik-family">
                  <div class="btn-ripple clickDiv"></div>

                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Blend Acém</span>
                    <span class="precoItem ">+ R$ 6.00</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">

                    <span id="menos14" data-menosadicionais="menos14">
                      <p class="btnMenos fa-solid fa-minus">-</p>
                    </span>
                    <span class="quantItemAdicionada">2</span>
                    <p class="btnMais fa-solid fa-plus">+</p>


                  </div>
                </div>


                <hr>

                <div class="divListagemItens rubik-family">
                  <div class="btn-ripple clickDiv"></div>

                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Blend Acém</span>
                    <span class="precoItem ">+ R$ 6.00</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">

                    <span id="menos14" data-menosadicionais="menos14">
                      <p class="btnMenos fa-solid fa-minus">-</p>
                    </span>
                    <span class="quantItemAdicionada">2</span>
                    <p class="btnMais fa-solid fa-plus">+</p>


                  </div>
                </div>

                <hr>

                <div class="divListagemItens rubik-family">
                  <div class="btn-ripple clickDiv"></div>

                  <div class="divInfosItem flex flex-col color-505d69">
                    <span class="nomeItem">Blend Acém</span>
                    <span class="precoItem ">+ R$ 6.00</span>
                  </div>
                  <div class="divBotoesItens flex flex-row align-center justify-space-between">

                    <span id="menos14" data-menosadicionais="menos14">
                      <p class="btnMenos fa-solid fa-minus">-</p>
                    </span>
                    <span class="quantItemAdicionada">2</span>
                    <p class="btnMais fa-solid fa-plus">+</p>


                  </div>
                </div>



              </div>

            </div>







            <div class="select-title flex justify-center">OBRIGATÓRIO</div>

            <div class="flex flex-row justify-center wdt-100">

              <div class="selector-content flex  justify-center align-center default-selected "
                data-selector="obrigatorio">

                <span>NÃO</span>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

              </div>



              <div class="selector-content flex  justify-center align-center" data-selector="obrigatorio"
                data-modal-input="text">

                <span>SIM</span>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

              </div>

            </div>



            <div class="select-title flex justify-center">QUANTIDADE MÁXIMA</div>

            <div class="flex flex-row justify-center wdt-100">

              <div class="selector-content flex  justify-center align-center default-selected "
                data-selector="limitar-quantidade">

                <span>NÃO</span>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

              </div>



              <div class="selector-content flex  justify-center align-center" data-selector="limitar-quantidade">

                <span>25 ITENS</span>

                <span id="checked-icon-spawner">
                  <svg class="svg-select-option" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                    aria-labelledby="IcCheckOutline" focusable="false" viewBox="0 0 24 24">
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z">
                      </path>
                    </g>
                  </svg>
                </span>

              </div>

            </div>








            <select class="selectDomini" aria-label="Default select example" id="select_tipo" name="select_tipo">
              <option id="02" value="Unico">Único</option>
              <option id="03" value="Opcional">Opcional</option>
              <option id="04" value="Adicional">Adicional</option>
            </select>



            <input type="text" name="required_select" id="required_select" value="0">






            <select class="selectDomini" aria-label="Default select example" id="limit_quant_select"
              name="limit_quant_select">
              <option id="0" value="0">0</option>
              <option id="0" value="1">1</option>
            </select>
















































            <style>
              * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
              }

              .select-title {
                margin: 20px 0 7px 0px;
              }

              .selector-option-title {
                padding: 7px 0 14px 0;
              }


              .desable-event {
                pointer-events: none;
                opacity: 0.5;
              }


              .event-none {
                pointer-events: none;
              }

              .low-opacity {
                opacity: 0.5;
              }

              .justify-center {
                justify-content: center;
              }

              .wdt-100 {
                width: 100%;
              }

              .divBotoesItens {
                position: absolute;
                right: 25px;
              }

              .justify-space-between {
                justify-content: space-between;
              }

              .align-center {
                align-items: center;
              }

              .flex {
                display: flex;
              }

              .flex-row {
                flex-direction: row;
              }

              hr {
                border-top: 1px #dee2e4 solid;
                border-bottom: 0px;
              }

              .divListagemItens {
                pointer-events: none;
                display: flex;
                /* background-color: #fff; */
                position: relative;
                width: 100%;
                height: 80px;
                align-items: center;
              }


              .divInfosItem {
                height: 42px;
                padding-left: 22px;
                justify-content: space-between;
              }

              .flex-col {
                flex-direction: column;
              }

              .color-505d69 {
                color: #505d69;
              }

              span.nomeItem {
                font-size: 16px;
              }

              span.precoItem {
                font-size: 15px;
              }




              @supports (-webkit-appearance: none) or (-moz-appearance: none) {

                input[type=checkbox],
                input[type=radio] {
                  --active: #3698f3;
                  --active-inner: #fff;
                  --focus: 2px rgba(39, 94, 254, .3);
                  --border: #bfc3d6;
                  --border-hover: #275EFE;
                  --background: #fff;
                  --disabled: #eeeef5;
                  --disabled_s: #dfdfe9;
                  --disabled-inner: #bfc3d6;
                  -webkit-appearance: none;
                  -moz-appearance: none;
                  height: 21px;
                  outline: none;
                  display: inline-block;
                  vertical-align: top;
                  position: relative;
                  margin: 0;
                  cursor: pointer;
                  border: 1px solid var(--bc, var(--border));
                  background: var(--b, var(--background));
                  transition: 0.3s, border-color 0.3s, box-shadow 0.2s;
                }

                input[type=checkbox]:after,
                input[type=radio]:after {
                  content: "";
                  display: block;
                  left: 0;
                  top: 0;
                  position: absolute;
                  transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
                }

                input[type=checkbox]:checked,
                input[type=radio]:checked {
                  --b: var(--active);
                  --bc: var(--active);
                  --d-o: .3s;
                  --d-t: .6s;
                  --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
                }

                input[type=checkbox]:disabled,
                input[type=radio]:disabled {
                  --b: var(--disabled);
                  --bc: var(--disabled_s);
                  cursor: not-allowed;
                  opacity: 0.9;
                }

                input[type=checkbox]:disabled:checked,
                input[type=radio]:disabled:checked {
                  --b: var(--disabled-inner);
                  --bc: var(--border);
                }

                input[type=checkbox]:disabled+label,
                input[type=radio]:disabled+label {
                  cursor: not-allowed;
                }

                input[type=checkbox]:hover:not(:checked):not(:disabled),
                input[type=radio]:hover:not(:checked):not(:disabled) {
                  --bc: var(--border-hover);
                }

                input[type=checkbox]:focus,
                input[type=radio]:focus {
                  box-shadow: 0 0 0 var(--focus);
                }

                input[type=checkbox]:not(.switch),
                input[type=radio]:not(.switch) {
                  width: 21px;
                }

                input[type=checkbox]:not(.switch):after,
                input[type=radio]:not(.switch):after {
                  opacity: var(--o, 0);
                }

                input[type=checkbox]:not(.switch):checked,
                input[type=radio]:not(.switch):checked {
                  --o: 1;
                }

                input[type=checkbox]+label,
                input[type=radio]+label {
                  font-size: 14px;
                  line-height: 21px;
                  display: inline-block;
                  vertical-align: top;
                  cursor: pointer;
                  margin-left: 4px;
                }

                input[type=checkbox]:not(.switch) {
                  border-radius: 7px;
                }

                input[type=checkbox]:not(.switch):after {
                  width: 5px;
                  height: 9px;
                  border: 2px solid var(--active-inner);
                  border-top: 0;
                  border-left: 0;
                  left: 7px;
                  top: 4px;
                  transform: rotate(var(--r, 20deg));
                }

                input[type=checkbox]:not(.switch):checked {
                  --r: 43deg;
                }

                input[type=checkbox].switch {
                  width: 38px;
                  border-radius: 11px;
                }

                input[type=checkbox].switch:after {
                  left: 2px;
                  top: 2px;
                  border-radius: 50%;
                  width: 15px;
                  height: 15px;
                  background: var(--ab, var(--border));
                  transform: translateX(var(--x, 0));
                }

                input[type=checkbox].switch:checked {
                  --ab: var(--active-inner);
                  --x: 17px;
                }

                input[type=checkbox].switch:disabled:not(:checked):after {
                  opacity: 0.6;
                }

                input[type=radio] {
                  border-radius: 50%;
                }

                input[type=radio]:after {
                  width: 19px;
                  height: 19px;
                  border-radius: 50%;
                  background: var(--active-inner);
                  opacity: 0;
                  transform: scale(var(--s, 0.7));
                }

                input[type=radio]:checked {
                  --s: .5;
                }
              }

              .divBotoesItens {
                position: absolute;
                right: 25px;
              }

              .quantItemAdicionada {
                font-size: 15px;
                padding: 0 20px;
              }




              .optional-selector-content {
                width: 260px !important;
                padding: 10px !important;
              }

              .selector-content {
                min-width: 165px;
                min-height: 65px;
                margin: 15px;
                padding: 10px 60px;
                cursor: pointer;
                position: relative;
                transition: all .1s ease-in-out;
                border-radius: 15px;
                border: 1px #dee2e4 solid;
                box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 3px, rgba(0, 0, 0, 0.09) 0px 1px 2px;
                -webkit-user-select: none; /* Safari */
                -ms-user-select: none; /* IE 10 and IE 11 */
                user-select: none; /* Standard syntax */  
              }

              .selector-content:hover:not(.selected-option):not(.default-selected) {
                box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
              }

              .svg-select-option {
                display: none;
                position: absolute;
                top: 15px;
                right: 17px;
                width: 27px;
                height: 27px;
                fill: #3698f3;
              }

              .selected-option .svg-select-option {
                display: block;
              }

              .default-selected .svg-select-option {
                display: block;
                fill: #c9c9c9;
              }

              .selected-option {
                background: #9ddfff2b;
                box-shadow: 0 0 0 5px #36a4f3;
              }

              .default-selected {
                box-shadow: 0 0 0 5px #dddddd;
              }


              .display-none {
                display: none;
              }
            </style>



























































          </div>







          <div class="col-md-3" style="width: 100%; display: block">
            <button id="submitForm" type="submit" data-formname="<?= $formName; ?>"
              class="btn btn-primary">Salvar</button>
          </div>

        </div>

      </div>

      <input type="hidden" name="id" id="id">

      <small>
        <div id="mensagem" style="text-align:center"></div>
      </small>

    </div>

  </div>

</form>







<style>
  .BoxScrollSelect {
    height: 198px;
    border: 1px solid #d4d4d4;
    padding-left: 10px;

    // PROBLEMA
    padding-top: 10px;
    border-radius: 5px;
    overflow-x: hidden;
    overflow-y: scroll;
  }

  .BoxScrollSelect::-webkit-scrollbar {
    width: 10px;
  }

  .BoxScrollSelect::-webkit-scrollbar-track {
    background: #e8e8e8;
    border-radius: 7px;
  }

  .BoxScrollSelect::-webkit-scrollbar-thumb {
    background: #a6a6a6;
    border-radius: 7px;
  }

  .BoxScrollSelect::-webkit-scrollbar-thumb:hover {
    background: #878787;
  }


  input[type="number"],
  select {
    border: 1px solid #d4d4d4;
    padding: 7px 5px 7px 10px;
    border-radius: 7px;
    -moz-appearance: textfield;
  }

  /* remove seta de adicionar e diminuir quantidade  */
  input[type="number"]::-webkit-outer-spin-button,
  input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;

  }



  .searchProd {
    display: block;
    margin: 7px 0 7px 0;
  }

  .tituloInput {
    font-weight: 500;
    margin-bottom: 5px;
  }


  div.editando {
    width: 97%;
    position: relative;
  }


  div.itensSelecionados {
    display: inline-block;
    position: absolute;
    right: 3px;
  }

  .CodDivIpt {
    margin-bottom: 15px;
  }



  label[class~="selecionarTodos"],
  label[class~="listItensSQL"] {
    -webkit-user-select: none;
    /* Safari */
    -ms-user-select: none;
    /* IE 10 and IE 11 */
    user-select: none;
    /* Standard syntax */
    font-weight: 500;
  }
</style>