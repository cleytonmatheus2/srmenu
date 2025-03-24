<?php
@session_start();
require_once ("verificar.php");
require_once ("../conexao.php");

if (@$pedidos == 'ocultar') {
	echo "<script>window.location='../index.php'</script>";
	exit();
}


$pag = 'pedidos';
$segundos = $tempo_atualizar * 1000;

?>

<div class="main-tools-header">
	<p class="page-title">Novo Pedido</p>
</div>





<section class="section-row">

	<div class="products-content flex flex-column justify-space-between">
		<span class="atalho"> [P] PRODUTOS </span>
		<div class="products-list  flex flex-wrap">
			<div class="list-items flex flex-wrap align-start"></div>
		</div>

		<div class="products-list-footer flex flex-row align-items-center justify-space-between">

			<div class="shortcut-key-content flex flex-row align-items-center">
				<span class="shortcut-key-text"> NAVEGAR </span>
				<svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="35px" viewBox="0 0 512.000000 512.000000"
					preserveAspectRatio="xMidYMid meet">
					<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#666" stroke="none">
						<path
							d="M1864 4223 c-12 -2 -34 -18 -50 -34 l-29 -30 -3 -697 c-2 -510 1 -704 9 -725 7 -15 23 -37 37 -47 24 -19 44 -20 732 -20 688 0 708 1 732 20 14 10 30 32 37 47 8 21 11 215 9 725 l-3 698 -33 32 -32 33 -693 1 c-380 1 -702 0 -713 -3z m1256 -778 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M2505 3651 c-16 -10 -85 -75 -152 -143 -113 -115 -123 -128 -123 -162 0 -72 40 -115 109 -116 41 0 48 4 132 87 l89 87 89 -87 c84 -83 91 -87 132 -87 69 1 109 44 109 116 0 34 -10 47 -127 166 -163 165 -192 181 -258 139z" />
						<path
							d="M83 2439 c-17 -5 -43 -23 -57 -40 l-26 -31 2 -710 3 -710 33 -29 32 -29 708 0 c777 0 734 -3 767 60 13 25 15 126 15 717 0 526 -3 694 -13 712 -6 13 -25 34 -40 45 -28 21 -35 21 -710 23 -397 1 -695 -2 -714 -8z m1257 -774 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M835 1981 c-16 -10 -85 -75 -152 -143 -123 -124 -123 -125 -123 -172 l0 -48 132 -134 c150 -152 178 -169 242 -139 61 29 84 103 50 155 -9 14 -49 58 -87 97 l-71 73 87 88 c72 75 87 95 87 121 0 44 -25 88 -60 106 -39 20 -69 19 -105 -4z" />
						<path
							d="M1864 2439 c-16 -5 -41 -20 -55 -35 l-24 -26 0 -715 0 -715 33 -29 32 -29 708 0 c777 0 734 -3 767 60 13 25 15 126 15 717 0 526 -3 694 -13 712 -6 13 -25 34 -40 45 -28 21 -35 21 -710 23 -382 1 -695 -3 -713 -8z m1256 -774 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M2283 1870 c-38 -23 -53 -48 -53 -90 0 -49 21 -77 152 -206 130 -128 158 -145 214 -124 33 13 258 231 280 272 31 59 11 123 -48 154 -53 28 -90 12 -184 -78 l-84 -81 -79 76 c-103 101 -138 114 -198 77z" />
						<path
							d="M3644 2439 c-16 -5 -41 -20 -55 -35 l-24 -26 -3 -696 c-2 -510 1 -704 9 -725 7 -15 23 -37 37 -47 24 -19 44 -20 733 -20 l709 0 32 29 33 29 3 710 2 710 -25 31 c-15 17 -43 35 -63 41 -46 12 -1343 12 -1388 -1z m1256 -774 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M4178 1984 c-34 -18 -58 -62 -58 -105 0 -26 15 -46 87 -121 l87 -88 -76 -78 c-42 -42 -81 -87 -87 -99 -29 -56 3 -133 63 -153 62 -20 91 -2 235 144 l131 134 0 48 c0 47 0 47 -127 176 -161 163 -189 178 -255 142z" />
					</g>
				</svg>
			</div>

			<div class="shortcut-key-content flex flex-row align-items-center">
				<span class="shortcut-key-text"> SELECIONAR </span>
				<svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="35px" viewBox="0 0 512.000000 512.000000"
					preserveAspectRatio="xMidYMid meet">
					<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#666" stroke="none">
						<path
							d="M1864 4223 c-12 -2 -34 -18 -50 -34 l-29 -30 -3 -697 c-2 -510 1 -704 9 -725 7 -15 23 -37 37 -47 24 -19 44 -20 732 -20 688 0 708 1 732 20 14 10 30 32 37 47 8 21 11 215 9 725 l-3 698 -33 32 -32 33 -693 1 c-380 1 -702 0 -713 -3z m1256 -778 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M2505 3651 c-16 -10 -85 -75 -152 -143 -113 -115 -123 -128 -123 -162 0 -72 40 -115 109 -116 41 0 48 4 132 87 l89 87 89 -87 c84 -83 91 -87 132 -87 69 1 109 44 109 116 0 34 -10 47 -127 166 -163 165 -192 181 -258 139z" />
						<path
							d="M83 2439 c-17 -5 -43 -23 -57 -40 l-26 -31 2 -710 3 -710 33 -29 32 -29 708 0 c777 0 734 -3 767 60 13 25 15 126 15 717 0 526 -3 694 -13 712 -6 13 -25 34 -40 45 -28 21 -35 21 -710 23 -397 1 -695 -2 -714 -8z m1257 -774 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M835 1981 c-16 -10 -85 -75 -152 -143 -123 -124 -123 -125 -123 -172 l0 -48 132 -134 c150 -152 178 -169 242 -139 61 29 84 103 50 155 -9 14 -49 58 -87 97 l-71 73 87 88 c72 75 87 95 87 121 0 44 -25 88 -60 106 -39 20 -69 19 -105 -4z" />
						<path
							d="M1864 2439 c-16 -5 -41 -20 -55 -35 l-24 -26 0 -715 0 -715 33 -29 32 -29 708 0 c777 0 734 -3 767 60 13 25 15 126 15 717 0 526 -3 694 -13 712 -6 13 -25 34 -40 45 -28 21 -35 21 -710 23 -382 1 -695 -3 -713 -8z m1256 -774 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M2283 1870 c-38 -23 -53 -48 -53 -90 0 -49 21 -77 152 -206 130 -128 158 -145 214 -124 33 13 258 231 280 272 31 59 11 123 -48 154 -53 28 -90 12 -184 -78 l-84 -81 -79 76 c-103 101 -138 114 -198 77z" />
						<path
							d="M3644 2439 c-16 -5 -41 -20 -55 -35 l-24 -26 -3 -696 c-2 -510 1 -704 9 -725 7 -15 23 -37 37 -47 24 -19 44 -20 733 -20 l709 0 32 29 33 29 3 710 2 710 -25 31 c-15 17 -43 35 -63 41 -46 12 -1343 12 -1388 -1z m1256 -774 l0 -555 -560 0 -560 0 0 555 0 555 560 0 560 0 0 -555z" />
						<path
							d="M4178 1984 c-34 -18 -58 -62 -58 -105 0 -26 15 -46 87 -121 l87 -88 -76 -78 c-42 -42 -81 -87 -87 -99 -29 -56 3 -133 63 -153 62 -20 91 -2 235 144 l131 134 0 48 c0 47 0 47 -127 176 -161 163 -189 178 -255 142z" />
					</g>
				</svg>
			</div>

			<div class="navigate-buttons flex flex-row justify-between">
				<div id="back-nav-footer" class="simple-btn user-select-none back-nav-footer disabled">
					<p> VOLTAR [ BACKSPACE ] </p>
				</div>
				<div id="next-nav-footer" class="simple-btn user-select-none next-nav-footer disabled">
					<p> AVANCAR [ENTER] </p>
				</div>
			</div>

		</div>

	</div>





	<div class="order-summary-content">

		<div class="w-100">

			<div class="client-selector-content">
				<label for="client-selector">Selecionar Cliente</label>
				<div class="client-search-content">
					<input id="client-selector" class="right-btn" type="text" placeholder="Nome / Celular">
					<div class="client-selector-btn blue-border">NOVO +</div>
				</div>
			</div>




			<div class="order-summary-header">
				<div>
					<p>Itens do Pedido</p>
				</div>
				<div>
					<p>Subtotal</p>
				</div>
			</div>


			<div class="order-summary">





				<div class="product-summary-order">

					<div class="black-bkg"></div>

					<div class="edit-order-content">
						<div>
							<svg class="edit-svg" xmlns="http://www.w3.org/2000/svg" version="1.0" width="25px"
								viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
								<g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" stroke="none">
									<path
										d="M2000 2529 c-30 -5 -89 -25 -130 -45 -72 -34 -94 -54 -550 -512 -506 -508 -525 -529 -572 -672 -19 -57 -22 -92 -26 -296 l-4 -232 37 -37 37 -36 231 3 c206 3 239 6 297 26 144 48 164 65 671 572 331 330 484 490 503 525 81 146 85 302 12 450 -65 133 -200 232 -346 255 -74 11 -84 11 -160 -1z m155 -250 c25 -7 58 -29 86 -58 69 -69 88 -163 50 -247 -20 -43 -136 -174 -155 -174 -14 0 -316 301 -316 315 0 10 75 86 127 129 50 41 133 55 208 35z m-493 -961 c-266 -265 -305 -301 -365 -328 -71 -34 -153 -49 -260 -50 l-69 0 4 133 c5 208 2 202 365 569 l297 299 163 -163 164 -163 -299 -297z">
									</path>
									<path
										d="M237 2356 c-112 -47 -192 -136 -222 -251 -13 -51 -15 -173 -15 -905 0 -897 0 -892 48 -986 30 -58 121 -138 190 -166 l57 -23 765 0 765 0 67 32 c81 38 151 107 187 183 26 54 26 59 29 322 l3 267 -33 36 c-40 44 -90 55 -139 31 -62 -29 -63 -37 -69 -296 -4 -210 -7 -238 -25 -267 -39 -65 -10 -63 -792 -63 -685 0 -709 1 -740 20 -66 40 -63 -8 -63 917 0 798 1 839 19 866 41 64 27 62 471 67 444 5 436 4 465 66 19 40 19 68 0 108 -32 67 -27 66 -492 66 -417 0 -418 -1 -476 -24z">
									</path>
								</g>
							</svg>
						</div>

						<div>
							<svg xmlns="http://www.w3.org/2000/svg" class="trash-svg" version="1.0" width="30px"
								viewBox="0 0 256.000000 256.000000" preserveAspectRatio="xMidYMid meet">
								<g transform="translate(0.000000,256.000000) scale(0.100000,-0.100000)" stroke="none">
									<path
										d="M901 2434 c-39 -28 -51 -73 -51 -194 l0 -110 -225 0 c-144 0 -233 -4 -249 -11 -60 -28 -71 -122 -20 -170 l26 -24 898 0 898 0 26 24 c51 48 40 142 -20 170 -16 7 -105 11 -249 11 l-225 0 0 110 c0 121 -12 166 -51 194 -21 14 -66 16 -379 16 -313 0 -358 -2 -379 -16z m589 -249 l0 -55 -210 0 -210 0 0 55 0 55 210 0 210 0 0 -55z">
									</path>
									<path
										d="M459 1780 l-30 -29 3 -668 3 -668 33 -68 c43 -86 113 -156 199 -199 l68 -33 545 0 545 0 68 33 c86 43 156 113 199 199 l33 68 3 668 3 668 -30 29 c-48 48 -130 38 -164 -20 -15 -25 -17 -88 -17 -653 l0 -625 -28 -53 c-22 -43 -38 -59 -81 -81 l-53 -28 -478 0 -478 0 -53 28 c-43 22 -59 38 -81 81 l-28 53 0 625 c0 565 -2 628 -17 653 -34 58 -116 68 -164 20z">
									</path>
									<path
										d="M1025 1591 c-11 -5 -29 -19 -40 -31 -19 -21 -20 -36 -20 -440 l0 -418 24 -26 c48 -51 142 -40 170 20 16 36 15 813 -1 849 -20 45 -82 66 -133 46z">
									</path>
									<path
										d="M1438 1583 c-14 -9 -31 -27 -37 -40 -15 -34 -15 -813 0 -847 28 -60 122 -71 170 -20 l24 26 0 419 0 419 -26 26 c-33 33 -94 41 -131 17z">
									</path>
								</g>
							</svg>
						</div>

					</div>


					<div class="product-summary-title">
						<p>1x - Burguer Costelinha</p>
						<p>R$ 19,90</p>
					</div>




					<div class="product-summary-category">
						<p>Tamanhos</p>
					</div>
					<div class="product-summary-optional flex align-items-center justify-space-between">
						<span class="item-desc">Molho Verde</span>
						<span class="dotted-bottom"></span>
						<p class="item-desc">R$ 4,99</p>
					</div>

					<div class="product-summary-category">
						<p>Molhos</p>
					</div>

					<div class="product-summary-optional  flex align-items-center justify-space-between">
						<p class="item-desc">Molho Verde</p>
						<span class="dotted-bottom"></span>
						<p class="item-desc">R$ 4,99</p>
					</div>





				</div>


			</div>


			<div class="summary-price-content w-100 flex flex-column align-">
				<div class="flex justify-space-between">
					<p>Subtotal</p>
					<p>R$ 49,99</p>
				</div>
				<div class="flex justify-space-between">
					<p>Desconto</p>
					<p>R$ 4,50</p>
				</div>
				<div class="flex justify-space-between">
					<p>Entrega</p>
					<p>R$ 6,00</p>
				</div>
			</div>


			<div class="summary-total-content w-100 flex flex-column justify-center">
				<div class="flex justify-space-between">
					<p>Total</p>
					<p>R$ 60,49</p>
				</div>
			</div>


		</div>






		<div class="order-tools-content">

			<div class="xxx">[E] ENTREGA</div>
			<div class="xxx">[P] PAGAMENTO</div>
			<div class="xxx">[O] OBSERVACOES</div>
			<div class="xxx">[D] DESCONTO</div>

			<div class="complete-order-btn">
				<p>GERAR PEDIDO [ENTER] </p>
			</div>

		</div>



	</div>



</section>


<style>
	#back-nav-footer {}

	.back-nav-footer.disabled,
	.next-nav-footer.disabled {
		opacity: 0.8;
		pointer-events: none;
		color: #d7d7d7;
		border: 2px solid #d7d7d7;
	}
</style>


<script>




	const [getCurrentOrderPhase, setCurrentOrderPhase] = useState(null)

	const [getCurrentCategoryID, setCurrentCategoryID] = useState(null);




	const [getProductIndex, setProductIndex] = useState(0)

	const [getSelectProductedStatus, setSelectProductedStatus] = useState(null)

	const [getPreOrderProduct, setPreOrderProduct, removePreOrderProduct] = productPreOrder(null)

	const [getProductOrder, setProductOrder, editProductOrder, removeProductOrder] = productOrder(null)


	const [getOptionalIndex, setOptionalIndex] = useState(0)



	const [quandAddedProduct, setQuantAddedProduct] = useState(1)




	/*  TESTE   */
	document.addEventListener('keydown', (e) => {

		if (e.key == 'o')
			console.log(getProductOrder());

		if (e.key == 'p')
			console.log(getPreOrderProduct());

	})






	const navBackButton = document.querySelector('#back-nav-footer')
	navBackButton.addEventListener('click', () => {
		if (getCurrentOrderPhase() == 'products') {
			fetchCategories()
			setSelectProductedStatus(null)
		}
		if (getCurrentOrderPhase() == 'optionals') {
			fetchProducts(getCurrentCategoryID())
		}
	})


	const nextBackButton = document.querySelector('#next-nav-footer')
	nextBackButton.addEventListener('click', () => {
		if (getCurrentOrderPhase() == 'products') {

			const prodID = getPreOrderProduct().id

			hasOptional(prodID).then(() => {

				fetchOptional(prodID)

				

			}).catch(() => {

				setProductOrder(getPreOrderProduct())
				nextBackButton.classList.remove('active')
				nextBackButton.classList.add('disabled')
			})

		}
		if (getCurrentOrderPhase() == 'optionals') {
			fetchProducts(getCurrentCategoryID())
		}
	})







	function productOrder() {

		const order = []

		function getOrder() {
			return order
		}

		function setOrder(o) {
			console.log(o);
			order.push(o)
			setPreOrderProduct(null)
		}

		function editOrder(params) {

		}


		function removeOrder(params) {

		}

		return [getOrder, setOrder, editOrder, removeOrder]

	}



	function productPreOrder() {

		let prod = null

		function getProd() {
			return prod
		}

		function setProd(o) {
			prod = null
			prod = o
		}

		function removeProd() {
			prod = null
		}

		return [getProd, setProd, removeProd]

	}


	function hasOptional(id) {

		return new Promise((resolve, reject) => {

			fetch('./paginas/pdv/list-optionals.php', {
				method: 'POST',
				headers: {
					"Content-Type": "application/json; charset=utf-8"
				},
				body: JSON.stringify({
					category: id
				})

			}).then((res) => {
				return res.json()
			}).then((res) => {

				if (res == null || res == '' || res == undefined || res.length == 0) {
					reject(null)
					return
				}

				resolve(id)

			})

		})

	}






	function fetchOptional(id) {

		fetch('./paginas/pdv/list-optionals.php', {
			method: 'POST',
			headers: {
				"Content-Type": "application/json; charset=utf-8"
			},
			body: JSON.stringify({
				category: id
			})

		}).then((res) => {

			return res.json()

		}).then((res) => {


			if (res == null || res == '') {
				return
			}

			navBackButton.classList?.remove('disabled')
			nextBackButton.classList.add('disabled')

			const categorySpawner = document.querySelector('.list-items');
			categorySpawner.innerHTML = '';


			for (const { id, nome, qtd_minima, tipo, produto, itens } of res) {

				const optionalSelectorContent = document.createElement('div')
				optionalSelectorContent.setAttribute('class', 'optional-selector-content optional-type user-select-none')


				const optionalHeader = document.createElement('div')
				optionalHeader.setAttribute('class', 'optional-header flex justify-space-between align-center')
				optionalSelectorContent.appendChild(optionalHeader)

				const optionalName = document.createElement('p')
				optionalName.innerHTML = nome
				optionalHeader.appendChild(optionalName)


				if (qtd_minima > 0) {
					const requireTagContent = document.createElement('div')
					requireTagContent.setAttribute('class', 'flex flex-row')
					optionalHeader.appendChild(requireTagContent)

					const requireTagText = document.createElement('div')
					requireTagText.innerHTML = 'Obrigatório'
					requireTagText.setAttribute('class', 'require-item-tag')
					requireTagContent.appendChild(requireTagText)

					const requireTagQuant = document.createElement('div')
					requireTagQuant.innerHTML = '0/' + qtd_minima
					requireTagQuant.setAttribute('class', 'require-item-tag added-quant')
					requireTagContent.appendChild(requireTagQuant)
				}


				for (const { nome, valor } of itens) {



					const optionalItemContent = document.createElement('div')
					optionalItemContent.setAttribute('class', 'optional-item-content')


					const itemInfo = document.createElement('div')
					itemInfo.setAttribute('class', 'item-info flex flex-col color-505d69')
					optionalItemContent.appendChild(itemInfo)


					const itemNameInfo = document.createElement('span')
					itemNameInfo.setAttribute('class', 'optional-item-name')
					itemNameInfo.innerHTML = nome
					itemInfo.appendChild(itemNameInfo)


					const itemPriceInfo = document.createElement('span')
					itemPriceInfo.setAttribute('class', 'optional-item-price')
					itemPriceInfo.innerHTML = parseFloat(valor).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
					itemInfo.appendChild(itemPriceInfo)




					if (tipo == "Unico") {
						const radioSelector = document.createElement('input')
						radioSelector.setAttribute('type', 'radio')
						optionalItemContent.appendChild(radioSelector)
					}

					if (tipo == "Opcional") {
						const checkboxSelector = document.createElement('input')
						checkboxSelector.setAttribute('type', 'checkbox')
						optionalItemContent.appendChild(checkboxSelector)
					}

					if (tipo == "Adicional") {
						const plusMinusContent = document.createElement('div')
						plusMinusContent.setAttribute('class', 'flex flex-row align-center justify-space-between')
						optionalItemContent.appendChild(plusMinusContent)


						const minusSelector = document.createElement('div')
						minusSelector.setAttribute('class', 'btn-content remove')
						plusMinusContent.appendChild(minusSelector)

						const minusIcon = document.createElement('p')
						minusIcon.setAttribute('class', 'gg-trash')
						minusSelector.appendChild(minusIcon)



						const quantOptionals = document.createElement('p')
						quantOptionals.setAttribute('class', 'quant-opcionais')
						quantOptionals.innerHTML = 0
						plusMinusContent.appendChild(quantOptionals)


						const plusSelector = document.createElement('div')
						plusSelector.setAttribute('class', 'btn-content add')
						plusMinusContent.appendChild(plusSelector)

						const plusIcon = document.createElement('p')
						plusIcon.setAttribute('class', 'plus-btn')
						plusSelector.appendChild(plusIcon)


					}


					optionalSelectorContent.appendChild(optionalItemContent)

				}

				categorySpawner.appendChild(optionalSelectorContent)


				optionalSelectorContent.addEventListener('click', () => {

				})

			}

			keybordOptionalSelector(res, categorySpawner.childNodes)


			setCurrentOrderPhase('optionals')

		})

	}




















	document.addEventListener('keydown', (e) => {

		if (e.key == 'Backspace') {

			if (getCurrentOrderPhase() == 'products') {
				fetchCategories()
			}

			if (getCurrentOrderPhase() == 'optionals') {
				fetchProducts(getCurrentCategoryID())
			}
		}

	})









	fetchCategories()

	function fetchCategories() {

		const categorySpawner = document.querySelector('.list-items')
		categorySpawner.innerHTML = ''

		fetch('./paginas/pdv/list-categories.php', {
			method: 'POST',
			headers: {
				"Content-Type": "application/json; charset=utf-8"
			},
			body: JSON.stringify({
				teste: 123
			})

		}).then((res) => {
			return res.json()
		}).then((res) => {

			navBackButton.classList?.add('disabled')
			nextBackButton.classList.add('disabled')


			const categorySpawner = document.querySelector('.list-items')
			categorySpawner.innerHTML = ''

			let categId

			for (const { id, nome, foto } of res[0]) {

				let image = foto

				if (foto == null || foto == '' || foto == undefined) {
					image = 'no-image.webp'
				}



				const categoryContent = document.createElement('div')
				categoryContent.setAttribute('class', 'category-content border-2')


				const categoryImageContent = document.createElement('div')
				categoryImageContent.setAttribute('class', 'category-image-content')
				categoryContent.appendChild(categoryImageContent)

				const categoryImage = document.createElement('img')
				categoryImage.setAttribute('class', 'category-img')
				categoryImage.setAttribute('src', './images/categorias/' + image)
				categoryImageContent.appendChild(categoryImage)

				const categoryTitleContent = document.createElement('div')
				categoryTitleContent.setAttribute('class', 'category-title-content')
				categoryContent.appendChild(categoryTitleContent)

				const categoryTitle = document.createElement('p')
				categoryTitle.setAttribute('class', 'category-title')
				categoryTitleContent.appendChild(categoryTitle)
				categoryTitle.innerHTML = nome


				categoryContent.addEventListener('click', () => {
					fetchProducts(id)
					setCurrentCategoryID(id)
				})

				categorySpawner.appendChild(categoryContent)

			}



			keybordCategoriesSelector(res[0], categorySpawner.childNodes)


		});

	}



	function keybordCategoriesSelector(obj, el, id) {

		setCurrentOrderPhase('categories')

		const prodQtd = obj.length

		const productElement = el

		let categoryIndex = 0

		document.addEventListener("keydown", function moveOnCategories(e) {

			if (getCurrentOrderPhase() != 'categories') {
				document.removeEventListener("keydown", moveOnCategories);
				return
			}

			//----- NAVIGATION  -----//

			if (e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40) {

				const itemsContent = document.querySelector('.list-items')

				const itemsPerLine = itemsContent.offsetWidth / 226;
				const toSkip = parseInt(itemsPerLine);

				const itemPosition = categoryIndex > 0 ? categoryIndex + 1 : 1
				const missingQuant = parseInt(prodQtd - itemPosition)

				productElement.forEach(e => {
					e.classList.remove('nav')
				})

				if (prodQtd == categoryIndex) categoryIndex = 0

				if (e.keyCode == 40 && missingQuant >= toSkip) {
					categoryIndex += toSkip
				}

				if (e.keyCode == 38 && categoryIndex >= toSkip) {
					categoryIndex -= toSkip
				}

				if (e.keyCode == 39 && categoryIndex + 2 <= prodQtd) {
					categoryIndex++
				}

				if (e.keyCode == 37 && categoryIndex != 0) {
					categoryIndex--
				}

				productElement[categoryIndex].classList.add('nav')

			}

			//-----------------------  END NAVIGATION -----------------------//

			if (e.key == 'Enter') {
				fetchProducts(obj[categoryIndex].id)
				setCurrentCategoryID(obj[categoryIndex].id)
			}


		});


	}






















	function fetchProducts(id) {

		loaderProducts()


		fetch('./paginas/pdv/list-products.php', {
			method: 'POST',
			headers: {
				"Content-Type": "application/json; charset=utf-8"
			},
			body: JSON.stringify({
				category: id
			})

		}).then((res) => {
			return res.json()
		}).then((res) => {


			navBackButton.classList?.remove('disabled')
			nextBackButton.classList.add('disabled')

			let selectedID = null
			let selectedName = null
			let selectedPrice = null


			setTimeout(() => {

				const categorySpawner = document.querySelector('.list-items');
				categorySpawner.innerHTML = '';

				for (const i in res[0]) {

					const { id, nome, valor_venda, foto, estoque, nivel_estoque } = res[0][i]

					let image = foto

					if (foto == null || foto == '' || foto == undefined) {
						image = 'no-image-product.webp'
					}


					const productContainer = document.createElement('div')
					productContainer.setAttribute('class', 'product-content order-page')


					const productContent = document.createElement('div')
					productContent.setAttribute('class', 'product-element order-page user-select-none')
					productContainer.appendChild(productContent)


					const productImage = document.createElement('img')
					productImage.setAttribute('class', 'product-image')
					productImage.setAttribute('src', './images/produtos/' + image)
					productContent.appendChild(productImage)


					if (estoque <= nivel_estoque && nivel_estoque > 0) {
						const stockProductStatus = document.createElement('div')
						stockProductStatus.setAttribute('class', 'stock-product-status')

						const stockAlerticon = document.createElement('div')
						stockAlerticon.setAttribute('class', 'stock-product-icon critic')
						stockProductStatus.appendChild(stockAlerticon)
						stockAlerticon.innerHTML = '!'

						const activeProductText = document.createElement('div')
						activeProductText.setAttribute('class', 'active-product-text')
						stockProductStatus.appendChild(activeProductText)
						activeProductText.innerHTML = 'Alerta Estoque'

						productContent.appendChild(stockProductStatus)

					}


					const productInfoContent = document.createElement('div')
					productInfoContent.setAttribute('class', 'product-info-content')


					const productTitleContent = document.createElement('div')
					productTitleContent.setAttribute('class', 'product-title')

					const productTitle = document.createElement('p')
					productTitleContent.appendChild(productTitle)
					productTitle.innerHTML = nome

					productInfoContent.appendChild(productTitleContent)



					const produtcPriceText = document.createElement('div')
					produtcPriceText.setAttribute('class', 'produtc-price-text')

					const productPrice = document.createElement('p')
					produtcPriceText.appendChild(productPrice)
					productPrice.innerHTML = parseFloat(valor_venda).toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });

					productInfoContent.appendChild(produtcPriceText)

					productContent.appendChild(productInfoContent)


					categorySpawner.appendChild(productContainer)

					productContent.addEventListener('click', () => {
						productSelection.create(productContainer, categorySpawner.childNodes)
						nextBackButton.classList.remove('disabled')

						setProductIndex(parseInt(i))

						setSelectProductedStatus(true)

						selectedID = id
						selectedName = nome
						selectedPrice = valor_venda

						hasOptional(id).then(r => {
							nextBackButton.innerHTML = "AVANÇAR  [ ENTER ]"
							nextBackButton.classList.remove('active')

							

						}).catch(er => {
							nextBackButton.innerHTML = "FINALIZAR [ ENTER ]"
							nextBackButton.classList.add('active')
						})

						setPreOrderProduct({
							id: id,
							name: nome,
							price: valor_venda,
							quant: 1,
							items: []
						})


					})

				}

				nextBackButton.addEventListener('click', () => {

					productSelection.remove()
					categorySpawner.childNodes.forEach(e => {
						e.classList.remove('nav')
					});

				})


				keybordProductSelector(res[0], categorySpawner.childNodes)



			}, 500)


		})

	}










	const productSelection = {

		create: (el, arEl) => {

			arEl.forEach((e) => {
				e.classList.remove('nav')
				const bkg = e.querySelector('.bkg-add-prod')
				const psltr = e.querySelector('.add-qtd-prod-element')
				if (bkg) {
					bkg.remove()
					psltr.remove()
				}
			})

			el.classList.add('nav')

			let newProdQuant = 1

			const bkp_add_prod = document.createElement('div')
			const qtdEl = document.createElement('div')

			const removeQuantContent = document.createElement('span')
			removeQuantContent.classList.add('btn-content')
			qtdEl.appendChild(removeQuantContent)

			const minusBTN = document.createElement('span')
			minusBTN.classList.add('gg-trash')
			removeQuantContent.appendChild(minusBTN)

			const qtdd = document.createElement('span')
			qtdd.innerHTML = 1
			qtdEl.appendChild(qtdd)


			const addQuantContent = document.createElement('span')
			addQuantContent.classList.add('btn-content')
			qtdEl.appendChild(addQuantContent)

			const plusBTN = document.createElement('span')
			plusBTN.classList.add('plus-btn')
			addQuantContent.appendChild(plusBTN)

			bkp_add_prod.setAttribute('class', 'bkg-add-prod')
			el.appendChild(bkp_add_prod)

			qtdEl.setAttribute('class', 'add-qtd-prod-element')
			el.appendChild(qtdEl)

			removeQuantContent.addEventListener('click', () => {

				if (newProdQuant >= 2) {
					newProdQuant--
				}

				if (newProdQuant == 1) {
					minusBTN.classList.remove('minus-btn')
					minusBTN.classList.add('gg-trash')
				}

				qtdd.innerHTML = newProdQuant
				setQuantAddedProduct(newProdQuant)

			})

			addQuantContent.addEventListener('click', () => {
				newProdQuant++
				if (newProdQuant > 1) {
					minusBTN.classList.add('minus-btn')
					minusBTN.classList.remove('gg-trash')
				}
				qtdd.innerHTML = newProdQuant
				setQuantAddedProduct(newProdQuant)
			})


			document.addEventListener('keydown', (k) => {

				if (k.key == '+') {
					newProdQuant++
					setQuantAddedProduct(newProdQuant)
					addQuantContent.classList.add('active')
				}

				if (k.key == '-' && newProdQuant > 1) {
					newProdQuant--
					setQuantAddedProduct(newProdQuant)
					removeQuantContent.classList.add('active')
				}

				if (newProdQuant > 1) {
					minusBTN.classList.remove('gg-trash')
					minusBTN.classList.add('minus-btn')
				} else {
					minusBTN.classList.remove('minus-btn')
					minusBTN.classList.add('gg-trash')
				}

				qtdd.innerHTML = newProdQuant
			})


			document.addEventListener('keyup', (k) => {

				if (k.key == '-') {
					removeQuantContent.classList.remove('active')
				}

				if (k.key == '+') {
					addQuantContent.classList.remove('active')
				}

			})


		},


		remove: () => {
			const content = document.querySelectorAll('.product-content')
			content.forEach((el) => {
				el.classList.remove('nav')
				el.querySelector('.bkg-add-prod')?.remove()
				el.querySelector('.add-qtd-prod-element')?.remove()
			});

		}

	}











	function keybordProductSelector(obj, el) {

		setCurrentOrderPhase('products')

		const prodQtd = obj.length

		const productElement = el

		let productIndex = getProductIndex()

		document.addEventListener("keydown", function moveOnProducts(e) {

			const isSelected = getSelectProductedStatus()

			if (getCurrentOrderPhase() != 'products') {
				document.removeEventListener("keydown", moveOnProducts);
				return
			}

			//----- NAVIGATION  -----//

			if (!isSelected)
				if (e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40) {

					const produ = document.querySelector('.list-items')

					const itemsPerLine = produ.offsetWidth / 196;
					const toSkip = parseInt(itemsPerLine);

					const itemPosition = productIndex > 0 ? productIndex + 1 : 1
					const missingQuant = parseInt(prodQtd - itemPosition)



					if (e.keyCode == 40 && missingQuant >= toSkip) {
						setProductIndex(productIndex += toSkip)
					}

					if (e.keyCode == 38 && productIndex >= toSkip) {
						setProductIndex(productIndex -= toSkip)
					}

					if (e.key == 'ArrowRight' && productIndex + 2 <= prodQtd) {

						setProductIndex(productIndex++)
					}

					if (e.keyCode == 37 && productIndex != 0) {
						setProductIndex(productIndex--)
					}

					productElement.forEach(e => {
						e.classList.remove('nav')
					})

					productElement[productIndex].classList.add('nav')





					hasOptional(obj[productIndex].id).then(r => {
						nextBackButton.innerHTML = "AVANÇAR  [ ENTER ]"
						nextBackButton.classList.remove('active')
					}).catch(er => {

						nextBackButton.innerHTML = "FINALIZAR [ ENTER ]"
						nextBackButton.classList.add('active')
					})



				}

			//-----------------------  END NAVIGATION -----------------------//



			if (e.key == 'Enter') {

				const itemID = obj[productIndex].id
				const itemName = obj[productIndex].nome
				const itemPrice = obj[productIndex].valor_venda

				if (!isSelected) {
					productSelection.create(productElement[productIndex], productElement)
					setSelectProductedStatus(true)
				} else {

					hasOptional(itemID).then(r => {
						fetchOptional(itemID)
					}).catch(er => {
						setProductOrder(getPreOrderProduct())
						nextBackButton.classList.remove('active')
						nextBackButton.classList.add('disabled')
					})

					setPreOrderProduct({
						id: itemID,
						name: itemName,
						price: itemPrice,
						quant: 1,
						items: []
					})

					productSelection.remove()

					fetchOptional(itemID)

					setSelectProductedStatus(false)
				}

			}

			if (e.key == 'Escape') {
				setSelectProductedStatus(false)
			}



		});

	}









	/*---------------------------------------------------------*/


	function keybordOptionalSelector(obj, el) {




		const optionalQtd = obj.length

		const optionalElement = el

		

		document.addEventListener("keydown", function moveOnProducts(e) {

			let optionalIndex = getOptionalIndex()


			const isSelected = getSelectProductedStatus()



			/*if (getCurrentOrderPhase() != 'products') {
				document.removeEventListener("keydown", moveOnProducts);
				return
			}*/

			//----- NAVIGATION  -----//

			
				if (e.keyCode == 37 || e.keyCode == 38 || e.keyCode == 39 || e.keyCode == 40) {

					const produ = document.querySelector('.list-items')

					const itemsPerLine = produ.offsetWidth / 320;
					const toSkip = parseInt(itemsPerLine);

					const itemPosition = optionalIndex > 0 ? optionalIndex + 1 : 1
					const missingQuant = parseInt(optionalQtd - itemPosition)

					console.log(el[optionalIndex].querySelectorAll('.optional-item-content'));

					if (e.keyCode == 40 && missingQuant >= toSkip) {
						setOptionalIndex(optionalIndex += toSkip)
					}

					if (e.keyCode == 38 && optionalIndex >= toSkip) {
						setOptionalIndex(optionalIndex -= toSkip)
					}

					if (e.key == 'ArrowRight' && optionalIndex + 2 <= optionalQtd) {

						setOptionalIndex(optionalIndex++)
					}

					if (e.keyCode == 37 && optionalIndex != 0) {
						setOptionalIndex(optionalIndex--)
					}

					optionalElement.forEach(e => {
						e.classList.remove('nav')
					})

					optionalElement[optionalIndex].classList.add('nav')


					hasOptional(obj[optionalIndex].id).then(r => {
						nextBackButton.innerHTML = "AVANÇAR  [ ENTER ]"
						nextBackButton.classList.remove('active')
					}).catch(er => {

						nextBackButton.innerHTML = "FINALIZAR [ ENTER ]"
						nextBackButton.classList.add('active')
					})



				}

			//-----------------------  END NAVIGATION -----------------------//



			if (e.key == 'Enter') {

				const itemID = obj[optionalIndex].id
				const itemName = obj[optionalIndex].nome
				const itemPrice = obj[optionalIndex].valor_venda

				if (!isSelected) {

			
					setSelectProductedStatus(true)
				} else {

					hasOptional(itemID).then(r => {
						fetchOptional(itemID)
					}).catch(er => {
						setProductOrder(getPreOrderProduct())
						nextBackButton.classList.remove('active')
						nextBackButton.classList.add('disabled')
					})

					setPreOrderProduct({
						id: itemID,
						name: itemName,
						price: itemPrice,
						quant: 1,
						items: []
					})

					productSelection.remove()

					fetchOptional(itemID)

					setSelectProductedStatus(false)
				}

			}

			if (e.key == 'Escape') {
				setSelectProductedStatus(false)
			}

			

		});

	}






























	function loaderProducts() {


		const categorySpawner = document.querySelector('.list-items');
		categorySpawner.innerHTML = '';



		const res = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]

		for (const i in res) {

			const productContent = document.createElement('div')
			productContent.setAttribute('class', 'product-element  order-page margin-7')


			const productImage = document.createElement('div')
			productImage.setAttribute('class', 'product-seleton')

			const productImageLight = document.createElement('div')
			productImageLight.setAttribute('class', 'product-seleton-light')
			productImage.appendChild(productImageLight)

			productContent.appendChild(productImage)


			const productInfoContent = document.createElement('div')
			productInfoContent.setAttribute('class', 'product-info-content')





			const productTitleContent = document.createElement('div')
			productTitleContent.setAttribute('class', 'title-skeleton')

			const titleSkeletonLight = document.createElement('div')
			titleSkeletonLight.setAttribute('class', 'title-skeleton-light')
			productTitleContent.appendChild(titleSkeletonLight)

			productInfoContent.appendChild(productTitleContent)



			const produtcPriceText = document.createElement('div')
			produtcPriceText.setAttribute('class', 'price-skeleton')

			const produtcPriceLight = document.createElement('div')
			produtcPriceLight.setAttribute('class', 'price-skeleton-light')
			produtcPriceText.appendChild(produtcPriceLight)

			productInfoContent.appendChild(produtcPriceText)




			productContent.appendChild(productInfoContent)


			categorySpawner.appendChild(productContent)

		}


	}



























	function clearClasses(el, cl) {
		el.forEach(ee => {
			ee.classList.remove(cl)
		});
	}



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



	function simpleList() {
		let lockedList = []

		function get() {
			return lockedList
		}

		function set(i) {
			lockedList.push(i)
		}

		function remove(i) {
			lockedList.slice(i, 1)
		}

		function clean() {
			lockedList = []
		}


		return [get, set, remove, clean]
	}







</script>








































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
	.title-skeleton {
		background: #d5dde2;
		width: 100%;
		height: 35px;
		margin: 7px 0;
	}

	.title-skeleton-light {
		width: 235px;
		height: 35px;
		background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgb(0 0 0 / 0%) 20%, rgb(255 255 255 / 54%) 80%, rgba(0, 0, 0, 0) 100%);
		animation: progress .8s infinite linear;
	}


	.price-skeleton {
		background: #d5dde2;
		width: 50%;
		height: 30px;
		margin: 7px 0;
	}

	.price-skeleton-light {
		width: 200px;
		height: 30px;
		background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgb(0 0 0 / 0%) 20%, rgb(255 255 255 / 54%) 80%, rgba(0, 0, 0, 0) 100%);
		animation: progress .8s infinite linear;
	}


	.product-seleton {
		width: 170px;
		height: 130px;
		border-radius: 15px;
		background: #d5dde2;
	}

	.product-seleton-light {
		width: 335px;
		height: 130px;
		background: linear-gradient(to right, rgba(0, 0, 0, 0) 0%, rgb(0 0 0 / 0%) 20%, rgb(255 255 255 / 54%) 80%, rgba(0, 0, 0, 0) 100%);
		animation: progress .8s infinite linear;
	}

	@keyframes progress {
		0% {
			left: 0;
			transform: translateX(-100%);
		}

		100% {
			left: 100%;
			transform: translateX(0%);
		}
	}
</style>










<style>
	.product-content {
		position: relative;
		margin: 7px;
		border-radius: 15px;
		transition: all 0.2s ease-in-out;
	}

	.product-content.nav {
		box-shadow: 0 0 0 2px #4296f4;
		background: #e0effd;
		scale: 1.04;
	}

	.product-content:hover {
		scale: 1.04;
	}


	.product-element {
		display: flex;
		align-items: center;
		flex-direction: column;
		width: 190px;
		padding: 7px 3px;
		border: 1px solid #d5d5d5;
		border-radius: 15px;
		cursor: pointer;
	}

	.product-element:hover {
		box-shadow: 0 0 0 2px #4296f4;
	}

	.product-element.selected {
		box-shadow: 0 0 0 4px #4296f4;
		background: #e0effd;
		border: 1px solid #4296f4;
	}

	.product-element.product-page {
		height: 245px;
	}

	.product-element.order-page {
		height: 235px;
	}




	.selected-item-icon {
		box-sizing: border-box;
		background-color: #4296f4;
		border: 2px solid #fff;
		width: 30px;
		height: 30px;
		border: 2px solid #3172bd;
		border-radius: 100px;
		position: absolute;
		left: 7px;
		top: 7px;
		display: flex;
		justify-content: center;
		align-items: center;
		color: #fff;
		font-weight: 500;
	}

	.selected-item-icon::after {
		content: "";
		display: block;
		margin-top: -3px;
		width: 6px;
		height: 10px;
		border-width: 0 3px 3px 0;
		border-style: solid;
		border-color: #fff;
		transform: rotate(45deg)
	}



	.active-product-status {
		display: flex;
		align-items: center;
		flex-direction: row;
		min-width: 60px;
		height: 25px;
		padding: 0 10px 0 0;
		right: 0;
		background: #fff;
		position: absolute;
		border-radius: 15px 25px 0 15px;
	}

	.active-product-point {
		width: 12px;
		height: 12px;
		border-radius: 50%;
		margin: 5px 7px;
	}

	.active-product-point.active {
		background-color: #20cba0;
	}


	.active-product-point.desativated {
		background-color: #ff5d5d;

	}

	.active-product-point.active::after {
		content: '';
		display: block;
		width: 12px;
		height: 12px;
		border-radius: 50%;
		animation: bounce 1.5s infinite ease-out;
	}



	@keyframes bounce {
		from {
			opacity: .7;
			box-shadow: 0 0 0 0 #1fb131;
		}

		to {
			opacity: 0;
			box-shadow: 0 0 0 4px #1fb131;
		}

	}

	.active-product-text {
		font-size: 15px;
	}


	.stock-product-status {
		display: flex;
		align-items: center;
		flex-direction: row;
		padding: 0 8px 0 8px;
		min-width: 60px;
		height: 30px;
		right: 5px;
		top: 80px;
		background: #fff;
		position: absolute;
		border-radius: 15px 0 0 15px;
	}

	.stock-product-icon {
		width: 15px;
		height: 15px;
		border-radius: 50%;
		margin: 5px;
		text-align: center;
		font-size: 13px;
		color: #fff;
	}

	.stock-product-icon.critic {
		background-color: #ef6345;
	}




	.product-image {
		width: 170px;
		height: 130px;
		border-radius: 15px;
		object-fit: cover;
	}




	.product-info-content {
		width: 165px;
		height: 80px;
	}

	.product-title {
		/* display: flex;
	text-align: center;
	align-items: center;*/
	}

	.product-title p {
		margin: 5px 0;
		font-size: 17px;
		font-weight: 400;
		color: #666;
	}


	.produtc-price-text {}


	.produtc-price-text p {
		margin: 7px 0;
		font-size: 19px;
		font-weight: 500;
		color: #555;
	}





	.product-action-content {
		width: 173px;
		height: 33px;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.product-action {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 170px;
		height: 35px;
		border-radius: 15px;
		cursor: pointer;
		background: #4296f4;
		color: #fff;
		transition: all .3s ease;
	}

	.product-action:hover {
		background: #57a4f9;
	}

	.product-action:active {
		width: 167px;
		height: 32px;
	}






	/* ADICIONAL  */

	.justify-center {
		justify-content: center;
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

	.optional-item-content {
		border-top: 1px #dee2e4 solid;
		padding: 0 20px;
		width: 100%;
		height: 80px;
		display: flex;
		align-items: center;
		justify-content: space-between;
		transition: all .2s ease-in-out;
	}

	.optional-item-content.selected {
		background-color: #36a4f3;
	}

	.optional-item-content.selected span {
		color: #fff;
	}

	.optional-item-content:hover {
		background-color: #dee7eb;
	}


	.item-info {
		height: 42px;
		justify-content: space-between;
	}

	.flex-col {
		flex-direction: column;
	}

	.color-505d69 {
		color: #505d69;
	}

	span.optional-item-name {
		font-size: 16px;
	}

	span.optional-item-price {
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
			height: 24px;
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
			width: 24px;
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
			line-height: 24px;
			display: inline-block;
			vertical-align: top;
			cursor: pointer;
			margin-left: 4px;
		}

		input[type=checkbox]:not(.switch) {
			border-radius: 7px;
		}

		input[type=checkbox]:not(.switch):after {
			width: 8px;
			height: 15px;
			border: 2px solid var(--active-inner);
			border-top: 0;
			border-left: 0;
			left: 7px;
			top: 1px;
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
			width: 22px;
			height: 22px;
			border-radius: 50%;
			background: var(--active-inner);
			opacity: 0;
			transform: scale(var(--s, 0.7));
		}

		input[type=radio]:checked {
			--s: .5;
		}
	}

	.quant-opcionais {
		font-size: 18px;
		padding: 0 14px;
	}





	.gg-trash {
		box-sizing: border-box;
		position: relative;
		display: block;
		transform: scale(var(--ggs, 1));
		width: 10px;
		height: 12px;
		border: 2px solid transparent;
		box-shadow:
			0 0 0 2px,
			inset -2px 0 0,
			inset 2px 0 0;
		border-bottom-left-radius: 1px;
		border-bottom-right-radius: 1px;
		margin-top: 4px
	}

	.gg-trash::after,
	.gg-trash::before {
		content: "";
		display: block;
		box-sizing: border-box;
		position: absolute
	}

	.gg-trash::after {
		background: currentColor;
		border-radius: 3px;
		width: 16px;
		height: 2px;
		top: -4px;
		left: -5px
	}

	.gg-trash::before {
		width: 10px;
		height: 4px;
		border: 2px solid;
		border-bottom: transparent;
		border-top-left-radius: 2px;
		border-top-right-radius: 2px;
		top: -7px;
		left: -2px
	}


	.plus-btn,
	.plus-btn::after {
		display: block;
		box-sizing: border-box;
		background-color: #555;
		border-radius: 10px
	}

	.plus-btn {
		position: relative;
		transform: scale(var(--ggs, 1));
		width: 16px;
		height: 2px
	}

	.plus-btn::after {
		content: "";
		position: absolute;
		width: 2px;
		height: 16px;
		top: -7px;
		left: 7px;
	}




	.btn-content:hover {
		background-color: #d7d7d7;
	}

	.btn-content.active {
		background-color: #3698f3;
	}

	.btn-content.active .gg-trash {
		color: #fff;
	}

	.btn-content.active .minus-btn {
		background-color: #fff;
	}

	.btn-content.active .plus-btn,
	.btn-content.active .plus-btn::after {
		background-color: #fff;
	}



	.btn-content {
		margin: 0;
		display: flex;
		width: 30px;
		height: 30px;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		cursor: pointer;

	}

	.btn-content:hover {
		background: #cbd1d4;
	}

	.btn-content:active {
		background: #36a4f3;
		color: #fff;
	}

	.btn-content:active .plus-btn,
	.btn-content:active .plus-btn::after {
		background: #ffffff;
	}




	.minus-btn {
		box-sizing: border-box;
		position: relative;
		display: block;
		transform: scale(var(--ggs, 1));
		width: 16px;
		height: 2px;
		background: #555;
		border-radius: 10px;
	}

	.btn-content:active .minus-btn {
		background: #ffffff;
	}



	.checked-status-content {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 27px;
		height: 27px;
		background-color: #1eb994;
		border-radius: 50%;
	}

	.gg-check {
		box-sizing: border-box;
		position: relative;
		display: block;
		transform: scale(var(--ggs, 1));
		width: 22px;
		height: 22px;
		border: 2px solid transparent;
		border-radius: 100px
	}

	.gg-check::after {
		content: "";
		display: block;
		box-sizing: border-box;
		position: absolute;
		left: 1px;
		top: -3px;
		width: 7px;
		height: 13px;
		border-color: #fff;
		border-width: 0 2px 2px 0;
		border-style: solid;
		transform-origin: bottom left;
		transform: rotate(45deg)
	}






	.optional-selector-content {
		width: 320px;
		min-height: 65px;
		margin: 15px;
		cursor: pointer;
		position: relative;
		transition: all .1s ease-in-out;
		border-radius: 15px;
		border: 1px #dee2e4 solid;
		box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 3px, rgba(0, 0, 0, 0.09) 0px 1px 2px;
	}

	.optional-selector-content:hover:not(.selected-option) {
		box-shadow: 0 0 0 2px #36a4f3;
		border: 1px solid #36a4f3;
	}

	.optional-selector-content.nav {
		box-shadow: 0 0 0 2px #36a4f3;
		border: 1px solid #36a4f3;
		scale: 1.03;
	}

	.optional-selector-content.selected {
		box-shadow: 0 0 0 4px #36a4f3;
		border: 1px solid #36a4f3;
		background-color: #a0dfff3f;
	}


	.optional-content {
		display: flex;
		flex-direction: row;
	}


	.optional-header {
		padding: 0 21px;
		height: 50px;
		background-color: #ebebeb;
		border-radius: 14px 14px 0 0;
	}

	.require-item-tag {
		margin: 0 0 0 5px;
		color: #fff;
		font-size: 15px;
		font-weight: 400;
		border-radius: 7px;
		padding: 7px 14px;
		background-color: rgb(184, 51, 74);
	}

	.added-quant {}




	.user-select-none {
		-webkit-user-select: none;
		/* Safari */
		-ms-user-select: none;
		/* IE 10 and IE 11 */
		user-select: none;
		/* Standard syntax */
	}


	.margin-7 {
		margin: 7px;
	}

	.display-none {
		display: none;
	}
</style>





















<style>
	@import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

	* {
		font-family: "Rubik", sans-serif;
	}




	/* CATEGORY CONTENT */

	.flex {
		display: flex;
	}

	.category-content {
		width: 214px;
		height: 200px;
		border: 1px solid #d5d5d5;
		border-radius: 15px;
		font-size: 22px;
		cursor: pointer;
		position: relative;
		padding: 5px;
		margin: 7px;
	}

	.category-content:hover {
		scale: 1.03;
	}

	.category-content:active {
		scale: .9;
	}

	.category-image-content {
		border-radius: 15px;
	}

	.category-img {
		width: 200px;
		height: 142px;
		border-radius: 15px;
		object-fit: cover;
		z-index: -1;
	}

	.category-title-content {
		width: 200px;
		height: 50px;
		display: flex;
		align-items: center;
		border-radius: 0 0 14px 14px;
		justify-content: center;
		position: absolute;
		bottom: 0;
		background: #fff;
	}

	.category-title {}

	.border-2 {
		box-shadow: 0;
		transition: all 0.2s ease-in-out;
	}

	.border-2:hover {
		box-shadow: 0 0 0 2px #4296f4;
	}

	.border-2.nav {
		box-shadow: 0 0 0 4px #4296f4;
		scale: 1.03;
	}















	.dotted-bottom {
		border-bottom: 1px dotted #999;
		width: 80%;
		position: absolute;
		height: 12px;
	}

	.father-content {
		height: 100%;
	}



	.products-content {
		width: 78%;
		height: 80vh;
		border: 1px solid #d0d8df;
		border-radius: 15px;
		margin: 0 7px;
		background: #ffffff;
	}

	.products-list {
		padding: 7px;
		overflow-y: scroll;
		overflow-x: hidden;
		height: 100%;
	}

	.products-list-footer {
		padding: 0 14px;
		height: 70px;
		border-top: 1px solid var(--border);
	}



	/*EDITAR */
	body {
		background-color: rgb(230, 233, 236);
	}


	.shortcut-key-content {
		margin: 7px;
	}

	.shortcut-key-text {
		display: block;
		margin: 0 7px;
	}

	.back-item-order-btn {}


	.simple-btn {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 50px;
		border-radius: 15px;
		cursor: pointer;
		/* color: #43474a; */

		border: 2px solid var(--blue);
		color: var(--blue);
		transition: all .3s ease-in-out;

		padding: 0 22px;
		margin: 14px 5px;
	}

	.simple-btn:hover {
		background-color: var(--blue);
		color: #fff;
	}

	.simple-btn:active {
		background-color: #3382c9;
		border: 2px solid #3382c9;
		color: #fff;
	}

	.simple-btn.active {
		background-color: #3382c9;
		border: 2px solid #3382c9;
		color: #fff;
	}





	.order-summary-content {
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: space-between;
		width: 22%;
		height: 80vh;
		border: 1px solid #d0d8df;
		border-radius: 15px;
		background: #ffffff;
	}

	.client-selector-content {
		display: flex;
		flex-direction: column;
		width: 90%;
		padding: 15px;
	}

	.client-search-content {
		display: flex;
		flex-direction: row;
		width: 16vw;
	}

	.client-input-selector {
		width: 9%;
		height: 45px;
	}

	.client-selector-btn {
		width: 120px;
		height: 45px;
		margin-left: -5px;
		border: 1px solid #d0d8df;
		border-radius: 0 15px 15px 0;
		display: flex;
		align-items: center;
		justify-content: center;
		font-size: 17px;
		font-weight: 500;
		background-color: #ffffff;
		color: #666;
		cursor: pointer;
		transition: all .2s ease-in-out;
	}

	.summary-price-content {
		padding: 7px 21px 0 14px;
	}

	.summary-total-content {
		padding: 0 21px 0 14px;
		background: #d3dce3;
		height: 50px;
		margin: 7px 0;
	}

	.summary-price-content p,
	.summary-total-content p {
		margin: 4px 0;
		font-size: 16px;
	}




	.order-tools-content {
		width: 100%;
		display: flex;
		flex-wrap: wrap;
		flex-direction: row;
		justify-content: center;
	}

	.xxx {
		display: flex;
		width: 45%;
		margin: 5px;
		height: 35px;
		box-shadow: 0 0 0 1px var(--border);
		border-radius: 7px;
		justify-content: center;
		align-items: center;
		font-size: 14px;
		cursor: pointer;
		transition: all .2s ease-in-out;
	}

	.xxx:hover {
		box-shadow: 0 0 0 2px var(--blue);
		color: var(--blue);
	}

	.xxx.done {
		color: #fff;
		background-color: var(--blue);
	}



	.complete-order-btn {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 94%;
		height: 60px;
		color: #fff;
		border-radius: 15px;
		cursor: pointer;
		background-color: var(--blue);
		margin: 14px 5px;
	}


	.order-summary-header {
		width: 100%;
		height: 50px;
		margin-top: 14px;
		border-top: 1px solid var(--border);
		background: #e7eaf0;
		display: flex;
		justify-content: space-between;
		align-items: center;

	}

	.order-summary-header div {
		padding: 0 25px;
	}



	.order-summary {
		padding: 5px 0;
		width: 100%;
		height: 235px;
		border: 1px solid var(--border);
		display: flex;
		flex-direction: column;
		align-items: center;
		overflow-y: scroll;
		overflow-x: hidden;
		background: #b5c2cf;
		cursor: pointer;

	}


	.product-summary-order {
		width: 98%;
		border: 1px solid var(--border);
		border-radius: 8px;
		padding: 0 0 14px 0;
		background: #fff;
		position: relative;
		--mask: conic-gradient(from -45deg at bottom, #0000, #000 1deg 89deg, #0000 90deg) 50%/15px 100%;
		-webkit-mask: var(--mask);
		mask: var(--mask);
	}



	.edit-order-content {
		height: 100%;
		width: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		justify-content: space-evenly;
		background: #fff;
		position: absolute;
		right: 0;
		top: 0;
		border-left: 1px solid var(--border);
		border-radius: 0 7px 7px 0;
		opacity: 0;
		transition: all .2s ease-in-out;
		z-index: 3;
	}

	.black-bkg {
		top: 0;
		left: 0;
		position: absolute;
		background: #444;
		width: 100%;
		height: 100%;
		opacity: 0;
		border-radius: 10px;
		transition: all .2s ease-in-out;
		z-index: 2;
	}

	.product-summary-order:hover .edit-order-content {
		width: 50px;
		opacity: 1;
	}

	.product-summary-order:hover .black-bkg {
		opacity: .3;
	}


	.edit-svg {
		fill: var(--blue);
		cursor: pointer;
		transition: all .2s ease-in-out;
	}

	.trash-svg {
		fill: #bf4040;
		cursor: pointer;
		transition: all .2s ease-in-out;
	}



	.product-summary-title {
		height: 40px;
		padding: 0 17px;
		font-weight: 500;
		color: #555;
		display: flex;
		align-items: center;
		border-bottom: 1px solid var(--border);
		justify-content: space-between;
	}

	.product-summary-title p {
		font-size: 15px;
	}



	.product-summary-category {
		height: 30px;
		display: flex;
		align-items: center;
		padding: 7px 14px 0 14px;
		color: #444;
		font-size: 14px;
		font-weight: 500;

	}

	.product-summary-optional {
		padding: 0 14px;
		font-size: 14px;
	}

	.product-summary-optional .item-desc {

		background: #fff;
		padding: 0 3px;
		z-index: 1;
	}


	.add-qtd-prod-element {
		height: 100%;
		width: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		justify-content: space-evenly;
		background: #fff;
		position: absolute;
		right: 0;
		top: 0;
		border: 1px solid var(--border);
		border-radius: 0 15px 15px 0;
		transition: all .2s ease-in-out;
		animation: showAddPrd .2s ease-in-out;
	}

	@keyframes showAddPrd {
		from {
			opacity: 0;
			width: 0;
		}

		to {
			opacity: 1;
			width: 50px;
		}

	}

	.bkg-add-prod {
		top: 0;
		left: 0;
		position: absolute;
		background: #5aa8ff;
		width: 100%;
		height: 100%;
		border-radius: 15px;
		transition: all .2s ease-in-out;
		opacity: .3;
		animation: showBKGAddPrd .2s ease-in-out;
	}

	@keyframes showBKGAddPrd {
		from {
			opacity: 0;
		}

		to {
			opacity: .3;
		}

	}
</style>












<style>
	:root {
		--blue: #4296f4;
		--border: #d0d8df;
		--header-bkg: #e7eaf0;
	}

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}



	.blue-border {
		transition: all .2s ease-in-out;
	}

	.blue-border:hover {
		box-shadow: 0 0 0 4px var(--blue);
	}

	.blue-border:active {
		box-shadow: 0 0 0 4px var(--blue);
	}

	.blue-border:focus {
		box-shadow: 0 0 0 4px var(--blue);
	}




	input[type="text"] {
		height: 45px;
		padding: 0 14px;
		border: 1px solid #d4d4d4;
		/* border-radius: 7px; */
		-webkit-transition: all, 0.2s, ease-in;
		-moz-transition: all, 0.2s, ease-in;
		-o-transition: all, 0.2s, ease-in;
		transition: all, 0.2s, ease-in;
		outline: 0;
		font-size: 16px;
	}



	input[type="text"][class="right-btn"] {
		height: 45px;
		width: 100%;
		padding: 0 14px;
		border: 1px solid var(--border);
		border-radius: 7px 0 0 7px;
		-webkit-transition: all, 0.2s, ease-in;
		-moz-transition: all, 0.2s, ease-in;
		-o-transition: all, 0.2s, ease-in;
		transition: all, 0.2s, ease-in;
		outline: 0;
	}



	.display-none {
		display: none;
	}


	label {
		margin: 0 0 7px 0;
	}

	.w-100 {
		width: 100%;
	}

	.flex {
		display: flex;
	}

	.flex-row {
		flex-direction: row;
	}

	.flex-column {
		flex-direction: column;
	}

	.flex-wrap {
		flex-wrap: wrap;
	}


	.align-center {
		align-content: center;
	}

	.align-start {
		align-content: flex-start;
	}

	.align-end {
		align-content: flex-end;
	}

	.align-space-around {
		align-content: space-around;
	}

	.align-space-between {
		align-content: space-between;
	}

	.align-stretch {
		align-content: stretch;
	}

	.justify-center {
		justify-content: center;
	}

	.justify-start {
		justify-content: flex-start;
	}

	.justify-end {
		justify-content: flex-end;
	}

	.justify-space-between {
		justify-content: space-between;
	}

	.justify-space-around {
		justify-content: space-around;
	}

	.justify-space-evenly {
		justify-content: space-evenly;
	}

	.align-items-center {
		align-items: center;
	}

	.align-items-start {
		align-items: flex-start;
	}

	.align-items-end {
		align-items: flex-end;
	}

	.align-items-stretch {
		align-items: stretch;
	}






	.black-bkg {
		top: 0;
		left: 0;
		position: absolute;
		background: #444;
		width: 100%;
		height: 100%;
		opacity: 0;
		border-radius: 10px;
		transition: all .2s ease-in-out;
		z-index: 2;
	}
</style>