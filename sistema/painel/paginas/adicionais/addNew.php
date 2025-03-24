<?php 
require_once("../../../conexao.php");
?>



				<form >

					<input id="formEdit" name="formEdit" type="hidden" value="">


						<div class="modal-body">			
							<div class="row">
								<div class="col-md-12">

			
							
								<div class="form-group">

								



							<div id="opcoesNovoAdc" >	

								<label style="font-weight: 500; margin-top: -50px;">Selecione os Produtos</label><br>						
								


								<?php   
								$campoId = '';
								?>
								<div class="BoxScrollSelect">
									
							
									<input data-inputsearch="searchBox" data-searchid="listProds" class="searchProd inputDomini widthPerc97" value="" type="text" placeholder="Buscar produto...">					
									
									<div class="editando ">
										<input id="Todos" data-todosid="Todos" data-checkbox="listProds" type="checkbox">
										<label for="Todos" class="selecionarTodos" style="font-weight: 500;">Selectionar Todos</label>
										<div class="itensSelecionados"><span id="quantItensSelecionados"  data-quantlist="listProds">0</span><span> selecionados</span> </div>
									</div>
									
									<hr style="margin: 5px 5px">	
									
									<ul>
									

									<?php
										$query31 = $pdo->query("SELECT * FROM opcionais ORDER BY order_item ASC");
										$res31 = $query31->fetchAll(PDO::FETCH_ASSOC);
										$total_reg31 = @count($res31);
										if($total_reg31 > 0){
											for($i1=0; $i1 < $total_reg31; $i1++){
											
												$nome = $res31[$i1]['nome'];
												$id_prod = $res31[$i1]['id'];

									?>	   

										<li data-list="listProds"   data-checkbox="divProds" style="display: block;">
											<input  data-inputlist="listProds"   id="<?= $id_prod;?>" value="<?= $id_prod;?>" name="produtChecked[]" type="checkbox"> 					
											<label for="<?= $id_prod;?>" class="listItensSQL" ><?= $nome;?></label><br>
										</li>
										
										<?php																		
											}
										?>

										</ul>
										
								<?php }else{  ?>

											<span>Nenhum produto encontrado.</span>

										<?php

										}

									?>	
									<span id="prodNaoEncontrado" style="display:none">Nenhum produto encontrado.</span>
												
												
							</div>





					
					</div>

<br>

											<div style="width:73%; display: inline-block;" >
												<label data-label="labelTop" >Nome do Item</label>
												<input type="text" class="inputDomini" id="nome_item" name="nome_item" placeholder="Exemplo: Cheddar, Tomate, Cebola etc..." required>
											</div>

											<div class="divValorTotalCompra" id="divValorTotalCompra">
												<label class="tituloInput">Valor</label><br>
												<span class="input-ItemPredef-L">R$</span>
												<input data-input="campo" type="text" class="inputPredef-L widthPerc30" id="valor_item" name="valor_item" data-formatMoney="real" >
											</div>
									
											<br>
											<br>

									<div class="col-md-3" style="width: 100%; display: block">
										<button id="submitForm" type="submit" data-formname="<?=$formName;?>" class="btn btn-primary">Salvar</button>	
									</div>

								</div>
								
							</div>
					
							<input type="hidden" name="id" id="id">	
							
							<small><div id="mensagem" style="text-align:center"></div></small>
					
						</div>
				
					</div>
								
				</form>

			





<style>
	
.BoxScrollSelect{
	height:198px; 
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
  background:  #e8e8e8;
  border-radius: 7px;
}
.BoxScrollSelect::-webkit-scrollbar-thumb {
  background:  #a6a6a6; 
  border-radius: 7px;
}
.BoxScrollSelect::-webkit-scrollbar-thumb:hover {
  background: #878787; 
}


input[type="number"], select{
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



.searchProd{
	display: block;
	margin: 7px 0 7px 0;
}

.tituloInput{
	font-weight: 500;
	margin-bottom: 5px;
}


div.editando{
	width: 97%;
	position: relative;
}


div.itensSelecionados{
	display: inline-block;
	position: absolute; 
	right: 3px;
}

.CodDivIpt{
	margin-bottom: 15px;
}



label[class~="selecionarTodos"], label[class~="listItensSQL"] {
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
  font-weight: 500;
}

</style>


