<?php
@session_start();
require_once ("verificar.php");
require_once ("../conexao.php");

if (@$grupos == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}

$pag = 'produtos';
$formName = 'formCupom';

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
		<div class="categorias-titulo">CATEGORIAS</div>
		<div class="categorias-content">

			<div class="item-categoria" draggable="true">
				<div>:: </div> <div>Pizzas</div>
			</div>
			<div class="item-categoria" draggable="true">
				<div>:: </div><div>Sanduiches</div>
			</div>
			<div class="item-categoria" draggable="true">
				<div>:: </div><div>Bebidas</div>
			</div>
			<div class="item-categoria" draggable="true">
				<div>:: </div> <div>Burguers</div>
			</div>
			<div class="item-categoria" draggable="true">
				<div>:: </div> <div>Pastéis</div>
			</div>
			<div class="item-categoria" draggable="true">
				<div>:: </div> <div>Sobremesas</div>
			</div>

		</div>
	</div>


	</div>


	<style>
		.categorias {
			border: 1px solid #dadfe1;
			width: 300px;
			height: 100%;
			border-radius: 15px;
		}

		.categorias-titulo {
			border-bottom: 1px solid #dadfe1;
			padding: 15px 17px;
			background: #e7eaf0;
			border-radius:  16px 16px 0 0;
		}

		.categorias-content {
			width: 300px;
			height: 93%;
			padding: 5px;
		}
		.item-categoria {
			display: flex;
			flex-direction: row;
			align-items: center;
			width: ;
			height: 50px;
			margin: 4px;
			padding: 0  14px;
			border: 1px solid #dadfe1;
			border-radius: 5px;
			background: #fff;
			cursor: pointer;
			
		}
		.item-categoria:hover {
			background: #e7ecec;
			border-left: 4px solid #3698f3;
		}
		.dragging {
			background: #e7ecec;
			border-left: 4px solid #3698f3;
		}
		

		
	</style>

	<script>

		
		document.addEventListener('dragstart', (e)=> {
			e.target.classList.add('dragging')
		})
		
		document.addEventListener('dragend', (e)=> {
			e.target.classList.remove('dragging')
		})

		const DAsD = document.querySelector('.categorias-content')

		DAsD.addEventListener("dragover", (e)=> {
			const dragging = document.querySelector('.dragging');
			const applyAfter = getNewPosition(DAsD, e.clientY)

			if (applyAfter) {
				applyAfter.insertAdjacentElement("afterend", dragging);
			} else {
				DAsD.prepend(dragging)
			}


		})



		function getNewPosition(col, posY) {
			const cards = col.querySelectorAll('.item-categoria:not(.dragging)')
			
			let result;

			for(let refer_card of cards){
				const box =refer_card.getBoundingClientRect();
				const boxCenterY = box.y + box.height / 2;

				if (posY >= boxCenterY) {
					result =refer_card
				}
			}


			return result

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







<script type="text/javascript">

	const pag = "<?= $pag ?>";
	const tituloInserir = "Inserir Cupom";

</script>

<script src="js/ajax.js"></script>

<script src="functions/tabela.js"></script>
<script src="functions/modal.js"></script>



<script>


onload = (event) => {

dominiTable.list({
	'table': 'produtos', // OBRIGÁTORIO
	'primary': 'id',
	'columns': ['nome', 'descricao', 'estoque', 'valor_venda'],   // OBRIGATORIO
	'thead': {
		'labels': ['Produto', 'Descrição', 'Estoque', 'Valor Venda'],
		'style': [
			{
				'width': '20%'
			},
			{
				'width': '30%'
			},
			{
				'width': '12%'
			},
			{
				'width': '17%'
			}
		]
	},
	'add': {
		'text': 'Adcionar Cupom',
		'page': 'cupons'
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
		
	},*/
	'images': {
		'column': 'nome',
		'archive_img': 'foto',
		'path': 'images/produtos',
		'width': '35px'
	},
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
	'dateformat': [ 'dataexp' ]*/
	'formatter': {
		'money': {
			'columns': ['valor_venda'],
			'currency': 'BRL'
		}
	}
})

};

</script>


<script src="paginas/adicionais/funcoes.js"></script>