/**
 * File index.js.
 *
 * Main JS file for any custom JS.
 */
(function () {
	// Blog Dropdown Filters
	document.addEventListener('DOMContentLoaded', function () {
		// Category filter dropdown
		document.getElementById('cat').onchange = function () {
			// if value is not a cat id, bail early.
			if (this.value === '-1') {
				return;
			}

			if (this.value === '0') {
				window.location = '/blog/';
			} else {
				window.location = '/?cat=' + this.value;
			}
		};

		// Tag filter dropdown
		document.getElementById('tag').onchange = function (e) {
			const selectedOptionText = this.options[this.selectedIndex].innerText;
			const selectedOptionSlug = selectedOptionText
				.toLowerCase()
				.trim()
				.replace(/[\s\W-]+/g, '-');

			if (this.value === '-1') {
				// if value is not a tag id, bail early.
				return;
			}

			if (this.value === '0') {
				window.location = '/blog/';
			} else {
				window.location = '/?tag=' + selectedOptionSlug;
			}
			a;
		};
	});
})();
