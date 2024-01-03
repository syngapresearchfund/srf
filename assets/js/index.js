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
			let selectedOptionText = this.options[this.selectedIndex].innerText;
			// if value is category id
			if (this.value === '-1') {
				return;
			}

			if (this.value === '0') {
				window.location = '/blog/';
			} else {
				window.location =
					'/?tag=' +
					selectedOptionText
						.toLowerCase()
						.trim()
						.replace(/[\s\W-]+/g, '-');
			}
		};
	});
})();
