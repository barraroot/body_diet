const pagSeguro = {
	creditCards: {},
	getBrand: function(bin) {
		return new Promise(function(resolve, reject){
			PagSeguroDirectPayment.getBrand({
				cardBin: bin,
				success: function(res) {
					let brand = pagSeguro.creditCards[res.brand.name.toUpperCase()];
					let url = brand.images.SMALL.path
					resolve({
						result: res,
						url: 'https://stc.pagseguro.uol.com.br' + url
					});
				}
			});
		});
	},

	getPaymentMethods: function(amount) {
		return new Promise(function(resolve, reject){
			PagSeguroDirectPayment.getPaymentMethods({
				amount: amount,
				success: function(res) {
					let creditCards = pagSeguro.creditCards = res.paymentMethods.CREDIT_CARD.options;
					let brands = [];
					Object.keys(creditCards).forEach(function(key){
						let url = creditCards[key].images.MEDIUM.path;
						brands.push('https://stc.pagseguro.uol.com.br' + url);
					});

					resolve(brands);
				}
			});
		});
	},

	getPaymentMethodsDebit: function(amount) {
		return new Promise(function(resolve, reject){
			PagSeguroDirectPayment.getPaymentMethods({
				amount: amount,
				success: function(res) {
					let creditCards = pagSeguro.creditCards = res.paymentMethods.ONLINE_DEBIT.options;
					let brands = [];
					Object.keys(creditCards).forEach(function(key){
						let url = creditCards[key].images.MEDIUM.path;
						brands.push('https://stc.pagseguro.uol.com.br' + url);
					});

					resolve(brands);
				}
			});
		});
	},	

	createCardToken: function(params) {
		return new Promise(function(resolve, reject){
			params.success = function(response){
				console.log(response.card);
				resolve(response.card.token);
			}			

			PagSeguroDirectPayment.createCardToken(params);

		});
	},

	getInstallments: function(amount, brand) {
		return new Promise(function(resolve, reject){
			PagSeguroDirectPayment.getInstallments({
				amount: amount,
				brand: brand,
				maxInstallmentNoInterest: 0,
				success: function(res) {
					resolve(res.installments[brand]);
				}
			});
		});
	},

	getSenderHash: function() {
		return new Promise(function(resolve, reject){
			let data = PagSeguroDirectPayment.getSenderHash();
			resolve(data);
		});
	}
}