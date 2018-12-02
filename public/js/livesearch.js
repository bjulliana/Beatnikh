(function () {
	'use strict';

	var searchField = document.querySelector('.search-input');

	function showResults(e) {
		let srchString = e.currentTarget.value;
		console.log(srchString);

		//$.ajax({
		//	url     : '{{ route(\'live_search.action\') }}',
		//	method  : 'GET',
		//	data    : {query: query},
		//	dataType: 'json',
		//	success : function (data) {
		//		$('tbody').html(data.table_data);
		//		$('#total_records').text(data.total_data);
		//	}
		//});
	}

	searchField.addEventListener('keyup', showResults, false);

})();