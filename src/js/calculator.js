function calculator() {
	return {
		r: 10, // расход топлива
		p: 1000, // пробег в месяц
		benz: 45, // стоимость бензина
		gaz: 20, // стоимость газа
		stoimostgbo: 20000, // стоимость ГБО
		g() {
			return this.p * 12
		}, // пробег в год
		cbg() {
			return ((this.benz * this.r) / 100) * this.g()
		}, // стоимость бензина в год
		cgg() {
			return ((this.gaz * this.r) / 100) * this.g()
		}, // стоимость газа в год
		econgod() {
			const price = this.cbg() - this.cgg()
			return `${+price.toFixed(2)} ₽`
		}, // экономия в год
		econmes() {
			const price = this.econgod() / 12
			return `${+price.toFixed(2)} ₽`
		}, // экономия в месяц
		ocup() {
			const price = this.stoimostgbo / ((this.benz * this.r) / 100 - (this.gaz * this.r) / 100)
			return `${+price.toFixed(2)} км`
		}, // окупаемость ГБО по пробегу в км
	}
}
