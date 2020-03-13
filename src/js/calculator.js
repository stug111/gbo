function calculator() {
	return {
		g() {
			return this.p * 12
		}, // пробег в год
		cbg() {
			return ((this.stateBenz * this.r) / 100) * this.g()
		}, // стоимость бензина в год
		cgg() {
			return ((this.gaz * this.r) / 100) * this.g()
		}, // стоимость газа в год
		econgod() {
			const price = this.cbg() - this.cgg()
			return `${+price.toFixed(2)} ₽`
		}, // экономия в год
		econmes() {
			const price = (this.cbg() - this.cgg()) / 12
			return `${+price.toFixed(2)} ₽`
		}, // экономия в месяц
		ocup() {
			const price = this.stoimostgbo / ((this.stateBenz * this.r) / 100 - (this.gaz * this.r) / 100)
			return `${+price.toFixed(2)} км`
		}, // окупаемость ГБО по пробегу в км
		changeBenz() {
			this.isAi95 = !this.isAi95
			this.stateBenz = this.isAi95 ? this.benz95 : this.benz
		},
	}
}

function openModalOrder() {
	jQuery("#orderSlider")
		.toggleClass("d-none")
		.toggleClass("d-flex")
}

jQuery("#orderSlider .modal__overlay").on("click", function() {
	jQuery("#orderSlider")
		.toggleClass("d-none")
		.toggleClass("d-flex")
})

jQuery("#orderSlider .modal__close").on("click", function() {
	jQuery("#orderSlider")
		.toggleClass("d-none")
		.toggleClass("d-flex")
})

function openModalSale() {
	jQuery("#orderSale")
		.toggleClass("d-none")
		.toggleClass("d-flex")
}

jQuery("#orderSale .modal__overlay").on("click", function() {
	jQuery("#orderSale")
		.toggleClass("d-none")
		.toggleClass("d-flex")
})

jQuery("#orderSale .modal__close").on("click", function() {
	jQuery("#orderSale")
		.toggleClass("d-none")
		.toggleClass("d-flex")
})
