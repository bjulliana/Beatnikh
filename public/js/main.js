(function () {
	'use strict';

	const current = document.querySelector('#selected');
	const thumbs  = document.querySelectorAll('.image-thumbs img');
	const opacity = 0.5;

	thumbs[0].style.opacity = opacity;

	function imgActivate(e) {
		thumbs.forEach(img => (img.style.opacity = 1));
		current.src            = e.target.src;
		e.target.style.opacity = opacity;
	}

	thumbs.forEach(img => img.addEventListener('click', imgActivate));

})();