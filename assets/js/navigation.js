/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	// Burger menus
	document.addEventListener( 'DOMContentLoaded', function() {
		// open
		const burger = document.querySelector( '.navbar-burger' );
		const menu = document.querySelector( '.navbar-menu' );

		if ( null === menu ) {
			return; // bail early
		}

		if ( burger ) {
			burger.addEventListener( 'click', function() {
				menu.classList.toggle( 'hidden' );
			} );
		}

		// close
		const close = document.querySelector( '.navbar-close' );
		const backdrop = document.querySelector( '.navbar-backdrop' );

		if ( close ) {
			close.addEventListener( 'click', function() {
				menu.classList.toggle( 'hidden' );
			} );
		}

		if ( backdrop) {
			backdrop.addEventListener( 'click', function() {
				menu.classList.toggle( 'hidden' );
			} );
		}
	} );
} )();
