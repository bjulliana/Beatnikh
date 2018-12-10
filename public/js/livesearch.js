(function () {
	'use strict';

	console.log('loaded');
	let searchField = document.querySelector('.search-input'),
	    resultList  = document.querySelector('.result-list'),
	    content;

	function showResults(e) {
		let srchString       = e.currentTarget.value;
		resultList.innerHTML = '';

		if (srchString.length === 0) {
			resultList.classList.remove('active');
			return;
		}

		if (srchString != null) {
			let url = '/search?str=' + srchString;

			srchString = srchString.trim().toLowerCase();

			fetch(url)
				.then(function (response) {
					return response.json();

				}).then(function (data) {
				console.log(data);
				resultList.classList.add('active');

				if (data.length === 0) {
					resultList.innerHTML = '<div class="column-small-12">No Items Match your Query</div>';
				}

				data.forEach(function (item) {
					content = '<li class="list-group-item list-group-item-action">' +
					          '<a href="/products/show/' + item.id + '" id="' + item.id + '">' +
					          '<img src="/uploads/products/' + item.images[0].file_name + '" class="product-thumbnail" />' + item.title + '</a>' +
					          '</li>';

					resultList.innerHTML += content;
				});

				//for (let i = 0; i < data.length; i++) {
				//	content = '<li class="result-item">' +
				//	          '<a href="#" id="">' +
				//	          '<img src="/uploads/products" height="40" width="40" class="img-thumbnail" /></a>' +
				//	          '</li>';
				//
				//	content = `<li class="result-item">
				////	          <a href="products/show/${data[i].id}" id="${data[i].id}">`;
				//	for (let p = 0; p < data[i].images.length; p++) {
				//		`<img src="/uploads/products/${data[i].images[0].file_name}" height="40" width="40" class="img-thumbnail" />`;
				//	}
				//	`${data[i].title}</a></li>`;
				//	resultList.innerHTML += content;
				//
				//	//'<div class="column-large-3 column-medium-4 column-small-6 product-' + data[i].id + '">' +
				//	//     '<div class="product">' +
				//	//     '<a href="product-details.php?id=' + data[i].id + '" class="product-link">' +
				//	//     '<div class="product__image">' +
				//	//     '<div class="overlay"></div>' +
				//	//     '<img src="images/products/' + data[i].image + '" alt="' + data[i].image + ' Image">' +
				//	//     '</div></a>' +
				//	//     '<div class="product__details">' +
				//	//     '<h3><a href="#" class="product-link">' + data[i].title + '</a></h3>' +
				//	//     '<span class="product__price">$' + data[i].price + '</span>' +
				//	//     '</div>' +
				//	//     '</div>' +
				//	//     '</div>';
				//	resultList.innerHTML += content;
				//}

			}).catch(function (err) {
				console.log(err);
			});
		}
	}

	searchField.addEventListener('keyup', showResults, false);

})();