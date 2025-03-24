<?php
@session_start();
require_once ("verificar.php");
require_once ("../conexao.php");

if (@$grupos == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}


$pag = 'adicionais';
$formName = 'formOpcionais';
$formNameEdit = 'formCupomEdit';



//verificar se ele tem a permissão de estar nessa página
if (@$grupos == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}
?>


<section class="section-row">


	<!-- CONTEÚDO ESQUERDO -->
	<div id="leftSection" class="left-section">

		<div class="categorias">
			<div class="categorias-header">
				<span class="categorias-titulo">OPCIONAIS</span>

				<span id="add-new-category" class="add-plus-btn"> 
					<p>+</p>
				</span>
				
			
			</div>


		
			<div class="categorias-content">

				<div class="item-categoria actived-item" data-target="todos" draggable="false">
					<div id="categoria-texto" class="categoria-texto">Todos</div>
				</div>

				<div class="draggable-content">
<?php 


					$queryADC = $pdo->query("SELECT * FROM opcionais ORDER BY order_item ASC");
					$resADC = $queryADC->fetchAll(PDO::FETCH_ASSOC);
					$total_regADC = @count($resADC);

					if($total_regADC){
						for ($i=0; $i < $total_regADC; $i++) {

							$idCat = $resADC[$i]['id'];
							$nomeCat = $resADC[$i]['nome'];
?>							
							


				<div class="item-categoria" >
						<div class="categoria-texto"><?=  $nomeCat ?></div>
							<input id="item-category-id" type="hidden" value="<?=  $idCat ?>">
							<div id="draggable-dots" class="draggable-dots display-none">
								<svg
									xmlns="http://www.w3.org/2000/svg" version="1.0" width="17px" height="17px"
									viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
									<g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="#69757d"
										stroke="none">
										<path
											d="M811 2214 c-132 -66 -157 -229 -51 -334 105 -106 268 -81 334 51 43 88 30 176 -39 244 -68 69 -156 82 -244 39z" />
										<path
											d="M1582 2229 c-19 -6 -53 -30 -77 -53 -70 -70 -83 -155 -39 -245 67 -134 244 -158 342 -45 146 165 -11 404 -226 343z" />
										<path
											d="M820 1474 c-167 -72 -165 -318 2 -389 137 -57 297 46 298 193 1 150 -161 256 -300 196z" />
										<path
											d="M1565 1473 c-165 -87 -166 -300 -1 -385 59 -30 151 -22 208 18 138 96 118 305 -34 369 -48 19 -134 19 -173 -2z" />
										<path
											d="M848 738 c-21 -5 -58 -28 -82 -50 -113 -98 -89 -275 45 -342 88 -44 176 -30 245 39 152 152 0 411 -208 353z" />
										<path
											d="M1602 740 c-57 -13 -108 -55 -136 -111 -44 -89 -31 -175 37 -243 70 -70 157 -84 246 -40 127 64 155 219 59 328 -29 34 -53 50 -91 61 -55 16 -66 17 -115 5z" />
									</g>
								</svg>
							</div>
						<div class="edit-category">
							<svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="17px" height="22px"
								viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
								<g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" fill="#69757d"
									stroke="none">
									<path
										d="M1582 2229 c-19 -6 -53 -30 -77 -53 -70 -70 -83 -155 -39 -245 67 -134 244 -158 342 -45 146 165 -11 404 -226 343z">
									</path>
									<path
										d="M1565 1473 c-165 -87 -166 -300 -1 -385 59 -30 151 -22 208 18 138 96 118 305 -34 369 -48 19 -134 19 -173 -2z">
									</path>
									<path
										d="M1602 740 c-57 -13 -108 -55 -136 -111 -44 -89 -31 -175 37 -243 70 -70 157 -84 246 -40 127 64 155 219 59 328 -29 34 -53 50 -91 61 -55 16 -66 17 -115 5z">
									</path>
								</g>
							</svg>
						</div>
						<div class="edit-spawner-box" data-item-id="666"></div>
				</div>


							
<?php 

						}
					}

?>


				</div>

			</div>

			<div class="categorias-footer">

					<div id="reorder-btn" class="regular-button reorder-button">
						<span> Reordenar </span>
						<svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="17px"
							viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
							<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000"
								stroke="none">
								<path
									d="M2921 4944 c-169 -45 -301 -180 -346 -351 -23 -86 -22 -1421 0 -1508 47 -178 197 -321 374 -355 72 -13 1389 -14 1462 0 183 34 344 195 379 379 14 73 14 1389 0 1462 -34 177 -177 327 -355 374 -85 22 -1431 21 -1514 -1z m1485 -330 c15 -11 37 -33 48 -48 21 -27 21 -36 21 -726 0 -690 0 -699 -21 -726 -11 -15 -33 -37 -48 -48 -27 -21 -36 -21 -726 -21 -690 0 -699 0 -726 21 -15 11 -37 33 -48 48 -21 27 -21 39 -24 699 -2 370 0 686 3 704 7 40 49 91 90 109 24 11 161 13 717 11 676 -2 687 -2 714 -23z" />
								<path
									d="M970 3985 c-337 -69 -587 -328 -640 -665 -8 -54 -10 -278 -8 -805 4 -788 1 -746 58 -897 66 -177 261 -372 438 -438 141 -53 147 -54 521 -58 l354 -3 -196 -197 c-108 -108 -201 -210 -207 -225 -17 -47 -12 -101 13 -138 48 -72 126 -97 200 -65 18 8 185 168 379 362 375 377 370 371 353 462 -5 32 -51 82 -358 389 -301 301 -358 353 -395 364 -116 34 -227 -77 -193 -193 11 -35 48 -78 209 -241 l196 -197 -305 0 c-169 0 -330 5 -360 10 -177 34 -327 177 -374 355 -22 87 -23 1422 0 1508 41 159 145 274 308 340 51 21 68 22 614 27 548 5 562 6 589 26 53 39 69 71 69 134 0 63 -16 95 -69 134 -27 21 -39 21 -579 23 -425 1 -567 -2 -617 -12z" />
								<path
									d="M2921 2384 c-169 -45 -301 -180 -346 -351 -23 -86 -22 -1421 0 -1508 47 -178 197 -321 374 -355 72 -13 1389 -14 1462 0 183 34 344 195 379 379 14 73 14 1389 0 1462 -34 177 -177 327 -355 374 -85 22 -1431 21 -1514 -1z m1485 -330 c15 -11 37 -33 48 -48 21 -27 21 -36 21 -726 0 -690 0 -699 -21 -726 -11 -15 -33 -37 -48 -48 -27 -21 -36 -21 -726 -21 -690 0 -699 0 -726 21 -15 11 -37 33 -48 48 -21 27 -21 39 -24 699 -2 370 0 686 3 704 7 40 49 91 90 109 24 11 161 13 717 11 676 -2 687 -2 714 -23z" />
							</g>
						</svg>
					</div>


					<div id="reorder-buttons-element" class="display-none">
						
						<div id="cancel-reorder-btn" class="regular-button cancel-btn">
							Cancelar
						</div>
						<div id="save-reorder-btn" class="regular-button">
							Salvar
						</div>

					</div>	
					

				</div>
				
		</div>


	</div>


	<style>

		:root {
			--red: #ee5151;
			--white: #ffffff;
		}


		.draggable-dots {
			height: 17px;
			padding-left: 7px;

		}

		.categoria-texto {
			padding-left: 20px;
		}

		.categoria-texto.dragmode {
			padding-left: 7px;
		}



		.categorias {
			position: relative;
			border: 1px solid #dadfe1;
			width: 300px;
			height: 84vh;
			border-radius: 15px;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.categorias-header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			border-bottom: 1px solid #dadfe1;
			padding: 10px 20px;
			background: #e7eaf0;
			border-radius: 16px 16px 0 0;

		}

		.categorias-titulo {
			
		}

		.add-plus-btn {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			cursor: pointer;
			
		}
		.add-plus-btn:hover{
			background:  #d2d4d8;
		}
		.add-plus-btn p {
			color: #757575;
			font-size: 21px;
			font-weight: 600;
		}

		.categorias-content {
			width: 300px;
			height: 660px;
			/* padding: 5px; */
		}

		.categorias-footer {
			position: absolute;
			bottom: 0;
			display: flex;
			flex-direction: row;
			justify-content: space-evenly;
			align-items: center;
			border-top: 1px solid #dadfe1;
			width: 299px;
			height: 50px;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}



		

		.regular-button {
			border-radius: 13px;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
			padding: 7px 14px;
			margin: 0 14px;
		}
		.regular-button:hover {
			background-color: #dce6e6;
		}
		.regular-button:active {
			background-color: #3698f3;
			color: #fff; 
		}

		.reorder-button span {
			margin-right: 5px;
		}


		.reorder-buttons-element {
			display: flex;
			flex-direction: row;
		}


		.cancel-btn:hover {
			background-color: var(--red);
			color: var(--white)
		}
		


		.item-categoria {
			position: relative;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			height: 50px;
			margin: 4px;
			padding: 0 14px 0 0;
			border: 1px solid #dadfe1;
			border-radius: 5px;
			background: #fff;
		}

		.item-categoria:hover:not(.unorderable):not(.cursor-grabbing):not(.cursor-grab) {
			background: #e7ecec;
			cursor: pointer;
		}

		.actived-item:not(.unorderable) {
			background: #e7ecec;
			border-left: 4px solid #3698f3;
		}

		.dragging {
			background: #e7ecec;
			border-left: 4px solid #3698f3;
			cursor: grabbing;
		}


		.unorderable {
			opacity: .5;
		}

		.display-none {
			display: none;
		}

		.cursor-grab {
			cursor: grab;
		}

		.cursor-grabbing {
			cursor: grabbing;
			cursor: -moz-grabbing;
			cursor: -webkit-grabbing;
		}


		.edit-category {
			height: 22px;
			width: 22px;
			border-radius: 50%;
		}

		.edit-category:hover {
			background-color: #d4d8d9;
		}


		/*-----[  ]----*/

		.edit-spawner-box {
			top: 85%;
			left: 90%;
			z-index: 5;
			position: absolute;
		}

		.edit-box-el {
			border-radius: 7px;
			background: #fff;
			border: 1px solid #ccc;
		}

		.edit-box-el ul {
			list-style-type: none;
		}

		.edit-box-el ul li {
			font-size: 15px;
			padding: 7px 14px;
			list-style-type: none;
		}

		.edit-box-el ul li:hover {
			background: #dce2e4;
		}
	</style>

	<script>

		// New Category

		const addNewCategoryBTN = document.querySelector('#add-new-category')
		addNewCategoryBTN.onclick = ()=> openDominiModal({
			title: 'Novo Opcional',
			fetch: 'paginas/adicionais/categories/addNew.php', 
			script: 'paginas/adicionais/categories/script.js'
		})
	

		// Edito Mode

		let editMode = false
		let selectedItem = 0;

		// DOM SELECTOR

		const itemIds = document.querySelectorAll('#item-category-id')

		const editCategoryButtons = document.querySelectorAll('.edit-category');
		const editableCategories = document.querySelectorAll('.item-categoria:not([data-target="todos"])')
		const AllCards = document.querySelectorAll('.item-categoria')

		AllCards.forEach((item, index) => {

			item.addEventListener('click', ()=> {
						
					if (!editMode) {

						cleanSelectCategory()

						let itemId = itemIds[index-1]?.value

						if(itemId){
							dominiTable.list({
							'filterCategory': {
								'column': 'opcional',
								'id': itemId
								}
							})
						}else{
							dominiTable.list()
						}

						item.classList.add('actived-item')

						console.log(itemIds[index-1]?.value);

						selectedItem = index 


					}

				})
			
		});


		

		editCategory()

		function editCategory() {


			const editSpawner = document.querySelectorAll('.edit-spawner-box')



			for (let i = 0; i < editCategoryButtons.length; i++) {

				editCategoryButtons[i].addEventListener('click', (e) => {

					editSpawner.forEach(e => {
						e.innerHTML = '';
					});

					const editBoxEl = document.createElement('div')
					editBoxEl.setAttribute('class', 'edit-box-el')
					editSpawner[i].appendChild(editBoxEl)

					const editBoxUl = document.createElement('ul')
					editBoxEl.appendChild(editBoxUl)

					const editBoxEdit = document.createElement('li')
					editBoxEdit.innerHTML = "Editar"
					editBoxUl.appendChild(editBoxEdit)

					editBoxEdit.onclick = () => {
						editBoxEl.remove()
					}

					const editBoxDelete = document.createElement('li')
					editBoxDelete.innerHTML = "Deletar"
					editBoxUl.appendChild(editBoxDelete)

					editBoxDelete.onclick = () => {

						console.log(itemId[i].value);

						fetch('paginas/adicionais/categories/delete_category.php', {
							method: 'POST',
							headers: {
								"Content-Type": "application/json; charset=utf-8"
							},
							body: JSON.stringify({
								'id': itemId[i].value
							})

						}).then((res) => {
							return res.json()
						}).then((res) => {
							console.log(res);
						}).catch((err)=>{
							console.log(err);
						})


						editBoxEl.remove()
						editableCategories[i].remove()

					}

				})
			}

		}









		// Reorder  & Save Buttons

		const reorderSVGs = document.querySelectorAll('#draggable-dots');
		const reorderButton = document.querySelector('#reorder-btn');

		const reorderCancelSave = document.querySelector('#reorder-buttons-element');


		reorderButton.addEventListener('click', () => {

			editMode = true

			cleanSelectCategory()

			dragCategory()

			reorderCancelSave.classList.remove('display-none')
			reorderCancelSave.classList.add('reorder-buttons-element')
			
			reorderButton.classList.add('display-none')

			
			const targetTodos = document.querySelector('div[data-target="todos"]')
			targetTodos.classList.add('unorderable')

			editCategoryButtons.forEach((editCat, i) => {

				editCat.classList.add('display-none')
				reorderSVGs[i].classList.remove('display-none')

				editableCategories[i].classList.add('cursor-grab')
				editableCategories[i].setAttribute('draggable', true)

			});

		})


		const cancelReorder = document.querySelector('#cancel-reorder-btn');

		cancelReorder.addEventListener('click', () => {

			editMode = false

			AllCards[selectedItem].classList.add('actived-item')

			const targetTodos = document.querySelector('div[data-target="todos"]')
			targetTodos.classList.remove('unorderable')


			reorderCancelSave.classList.add('display-none')
			reorderCancelSave.classList.remove('reorder-buttons-element')
			
			reorderButton.classList.remove('display-none')


			editCategoryButtons.forEach((editCat, i) => {

				editCat.classList.remove('display-none')
				reorderSVGs[i].classList.add('display-none')
				
				editableCategories[i].classList.remove('cursor-grab')
				editableCategories[i].setAttribute('draggable', false)

			});

})



		const saveReorder = document.querySelector('#save-reorder-btn');

		saveReorder.addEventListener('click', () => {


			editMode = false

			AllCards[selectedItem].classList.add('actived-item')

			const targetTodos = document.querySelector('div[data-target="todos"]')
			targetTodos.classList.remove('unorderable')


			reorderCancelSave.classList.add('display-none')
			reorderCancelSave.classList.remove('reorder-buttons-element')
			
			reorderButton.classList.remove('display-none')


			editCategoryButtons.forEach((editCat, i) => {

				editCat.classList.remove('display-none')
				reorderSVGs[i].classList.add('display-none')
				
				editableCategories[i].classList.remove('cursor-grab')
				editableCategories[i].setAttribute('draggable', false)

			});


		
			const newDraggableItensPosition = document.querySelectorAll('#item-category-id')
	
			let newPositionObj = []
			newDraggableItensPosition.forEach((el, i )=> {
				newPositionObj.push({'id': el.value, 'order': i})
			});


			fetch('paginas/adicionais/categories/order_category.php', {
							method: 'POST',
							headers: {
								"Content-Type": "application/json; charset=utf-8"
							},
							body: JSON.stringify(newPositionObj)

						}).then((res) => {
							return res.text()
						}).then((res) => {
							console.log('THEN', res);
						}).catch((err)=>{
							console.log(err);
						})




			console.log(newPositionObj);

		})

		// end





		


function dragCategory() {


		document.addEventListener('dragstart', (e) => {
			//console.log(e.target);

			e.target.classList.add('dragging')
		})

		document.addEventListener('dragend', (e) => {

			e.target.classList.remove('dragging')
		})


			const draggableContent = document.querySelector('.draggable-content')

			draggableContent.addEventListener("dragover", (e) => {

				e.preventDefault()

				const dragging = document.querySelector('.dragging');
				dragging.remove()
				const applyAfter = getNewPosition(draggableContent, e.clientY)

				if (applyAfter) {
					applyAfter.insertAdjacentElement("afterend", dragging);
				} else {
					draggableContent.prepend(dragging)
				}


			})

			draggableContent.addEventListener("dragenter", e => e.preventDefault())



			function getNewPosition(col, posY) {

				const cardsDragging = col.querySelectorAll('.item-categoria:not(.dragging):not(.item-todos)')
	

				const aaaaaa = col.querySelectorAll('.item-categoria:not(.item-todos)')
				


				
				let result;

				for (let refer_card of cardsDragging) {

					const box = refer_card.getBoundingClientRect();
					const boxCenterY = box.y + box.height / 2;

					if (posY >= boxCenterY) {
						result = refer_card
					}
				}


				return result

			}



}



function cleanSelectCategory() {

	AllCards.forEach(All => {
		All.classList.remove('actived-item')
	});
	
}




</script>


	<!-- CONTEÚDO DIREITO -->
	<div id="rightSection" class="right-section">



		<div id="domini-table"></div>


	</div>




</section>

<!-- TABLEA 2.0  -->

<style>
	@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400..900;1,300..900&display=swap');

	.left-section {
		border-right: #d6dbde solid 1px;
		padding-right: 15px;
		/* width: 20%; */
		min-height: 700px;
	}

	.right-section {
		padding: 15px;
		/* width: 80%; */
		min-height: 700px;
	}
</style>















<style>
	#BoxScrollSelect {
		height: 198px;
		border: 1px solid #d4d4d4;
		padding: 7px 0 7px 10px;
		border-radius: 5px;
		overflow-x: hidden;
		overflow-y: scroll;
	}

	#BoxScrollSelect::-webkit-scrollbar {
		width: 10px;
	}

	#BoxScrollSelect::-webkit-scrollbar-track {
		background: #e8e8e8;
		border-radius: 7px;
	}

	#BoxScrollSelect::-webkit-scrollbar-thumb {
		background: #a6a6a6;
		border-radius: 7px;
	}

	#BoxScrollSelect::-webkit-scrollbar-thumb:hover {
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









	.divQuant {
		width: 20%;
		display: inline-block;
		margin-right: 10px;
	}

	.divDataEx {
		width: 75%;
		display: inline-block;
		margin-bottom: 15px;
	}

	.divTipoValor {
		margin-bottom: 15px;
	}

	.divTipoDesc {
		display: inline-block;
		padding-right: 10px;
	}

	.divValorDesc,
	.divPorcDesc {
		display: inline-block;
	}

	.divCondicao {
		display: inline-block;
	}





	/* INFO */

	.divInfo {
		/* background-color: #a2bfdb; */
		border-radius: 16px;
		color: #ffff;
		cursor: default;
		display: inline-block;
		font-family: 'Helvetica', sans-serif;
		font-size: 15px;
		font-weight: bold;
		height: 17px;
		width: 17px;
		position: relative;
		text-align: center;
	}

	svg[data-info='info'] {
		fill: #98a1b3;
		transition: .1s;
		margin-bottom: -3px;
	}

	svg[data-info='info']:hover {
		fill: #5e687a;
	}

	.questInfo {}

	.popoverInfo {
		background-color: white;
		color: black;
		border-radius: 5px;
		bottom: 30px;
		box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
		display: none;
		font-size: 12px;
		font-family: 'Helvetica', sans-serif;
		left: -95px;
		padding: 7px 10px;
		position: absolute;
		width: 200px;
		z-index: 2;


		&:before {
			border-top: 7px solid rgba(0, 0, 0, 0.85);
			border-right: 7px solid transparent;
			border-left: 7px solid transparent;
			bottom: -7px;
			content: '';
			display: block;
			left: 50%;
			margin-left: -7px;
			position: absolute;

		}
	}

	.divInfo:hover {
		.popoverInfo {
			display: block;
			animation-name: example;
			animation-duration: .3s;
		}
	}

	@keyframes example {
		from {
			opacity: 0;
			bottom: 10px;
		}

		to {
			opacity: 1;
			bottom: 30px;
		}
	}

	/* INFO FIM */


	.alertMessage {
		color: rgb(184, 51, 74)
	}
</style>











<script>


	onload = (event) => {

		dominiTable.list({
			'table': 'opcionais_itens', // OBRIGÁTORIO
			'primary': 'id',
			'columns': ['nome', 'valor', 'opcional'],   // OBRIGATORIO
			'thead': {
				'labels': ['Nome', 'Valor', 'Opcional'],
				'style': [
					{
						'width': '20%'
					},
					{
						'width': '15%'
					},
					{
						'width': '12%'
					},
					{
						'width': '15%'
					},
					{
						'width': '15%'
					}
				]
			},
			'add': {
				'text': 'Adicionar Novo',
				'fetch': 'paginas/adicionais/addNew.php',
			},
			/*'rows': {
				'replace': [
					{
						'rep': 'ValorTotal',
						'to': 'Valor Total'
					}
				],
				'marker': [
					{
						'role': 'Nenhuma',
						'type': 'red'
					},
					{
						'role': 'Primeira',
						'type': 'green'
					}
				]
				
			},
			'images': {
				'column': 'nome',
				'archive_img': 'foto',
				'path': 'images/produtos',
				'width': '35px'
			},*/
			'active': {
				'title': 'Ativar',
				'column': 'ativo',
				'toggle': {
					'activated': 'Sim',
					'disabled': 'Nao'
				}
			},
			'filters': {
				'search': {
					'column': 'nome'
				}
			},
			'actions': {
				'edit': true,
				'delete': true
			},
			/*'datefilter': {
				'start': null,
				'end': null
			},
			'dateformat': [ 'dataexp' ]
			'formatter': {
				'money': {
					'columns': ['valor_venda'],
					'currency': 'BRL'
				}
			}*/
		})

	};

</script>


<script src="paginas/adicionais/funcoes.js"></script>




