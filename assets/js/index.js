/**
 * File index.js.
 *
 * Main JS file for any custom JS.
 */
(function () {
	// Blog Dropdown Filters
	document.addEventListener('DOMContentLoaded', function () {
		const isBlog = document.body.classList.contains('blog');
		const isCategory = document.body.classList.contains('category');
		const istag = document.body.classList.contains('tag');

		if (!isBlog && !isCategory && !istag) {
			return;
		}

		const catSelect = document.getElementById('cat');
		const tagSelect = document.getElementById('tag');

		// Category filter dropdown
		catSelect.onchange = function () {
			// if value is not a cat id, bail early.
			if (this.value === '-1') {
				return;
			}

			if (this.value === '0') {
				window.location = '/blog/';
			} else {
				window.location = '/?cat=' + this.value;
			}

			tagSelect.value = '';
		};

		// Tag filter dropdown
		tagSelect.onchange = function (e) {
			if (this.value === '-1') {
				// if value is not a tag id, bail early.
				return;
			}

			if (this.value === '0') {
				window.location = '/blog/';
			} else {
				window.location = '/?tag=' + this.value;
			}

			catSelect.value = '';
		};
	});
})();
