( function () {
	'use strict';

	var STORAGE_KEY = 'wpgpyt_watch_later';

	function init() {
		// Videos load dynamically, so watch for them
		observeVideoList();
	}

	// Watch for dynamically loaded videos
	function observeVideoList() {
		var attempts = 0;
		var maxAttempts = 30;

		// Poll for the list instead of observing (safer)
		var checkInterval = setInterval( function () {
			attempts++;

			var list = document.querySelector( '#spidochetube_list' );
			if ( list && list.querySelectorAll( 'li' ).length ) {
				setupWatchLater( list );
				clearInterval( checkInterval );
			}

			// Stop after max attempts (prevent infinite loop)
			if ( attempts >= maxAttempts ) {
				clearInterval( checkInterval );
			}
		}, 500 );
	}

	function setupWatchLater( list ) {
		var items = list.querySelectorAll( 'li' );

		items.forEach( function ( li ) {
			var link = li.querySelector( 'a[data-youtubeid]' );
			if ( ! link ) {
				return;
			}

			var videoId = link.getAttribute( 'data-youtubeid' );
			if ( ! videoId ) {
				return;
			}

			// Avoid duplicate button
			if ( li.querySelector( '.wpgpyt-save-btn' ) ) {
				return;
			}

			var titleEl = li.querySelector( 'span' );
			var imgEl = li.querySelector( 'img' );
			var video = {
				id: videoId,
				title: titleEl ? titleEl.textContent : '',
				thumb: imgEl ? imgEl.getAttribute( 'src' ) : ''
			};

			var btn = document.createElement( 'button' );
			btn.className = 'wpgpyt-save-btn';
			btn.type = 'button';
			btn.setAttribute( 'aria-label', 'Save to Watch Later' );
			btn.innerHTML = '<svg viewBox="0 0 24 24"><path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/></svg>';

			if ( isSaved( videoId ) ) {
				btn.classList.add( 'wpgpyt-saved' );
			}

			li.appendChild( btn );

			btn.addEventListener( 'click', function ( e ) {
				e.preventDefault();
				e.stopPropagation();
				toggleSave( video, btn );
			} );
		} );

		injectSavedBar();
		updateCount();
	}

	function getSaved() {
		try {
			return JSON.parse( localStorage.getItem( STORAGE_KEY ) ) || [];
		} catch ( err ) {
			return [];
		}
	}

	function saveList( list ) {
		try {
			localStorage.setItem( STORAGE_KEY, JSON.stringify( list ) );
		} catch ( err ) {}
	}

	function isSaved( id ) {
		return getSaved().some( function ( item ) {
			return item.id === id;
		} );
	}

	function toggleSave( video, btn ) {
		var list = getSaved();
		var index = -1;
		for ( var i = 0; i < list.length; i++ ) {
			if ( list[ i ].id === video.id ) {
				index = i;
				break;
			}
		}

		if ( index === -1 ) {
			list.push( video );
			btn.classList.add( 'wpgpyt-saved' );
			showToast( 'Saved to Watch Later' );
		} else {
			list.splice( index, 1 );
			btn.classList.remove( 'wpgpyt-saved' );
			showToast( 'Removed from Watch Later' );
		}

		saveList( list );
		updateCount();
	}

	// === Saved Bar ===
	function injectSavedBar() {
		var wrapper = document.querySelector( '#wpgpyt-wrapper' );
		if ( ! wrapper ) {
			return;
		}

		if ( document.querySelector( '.wpgpyt-saved-bar' ) ) {
			return;
		}

		var bar = document.createElement( 'div' );
		bar.className = 'wpgpyt-saved-bar';
		bar.innerHTML =
			'<button class="wpgpyt-saved-count-btn" type="button">' +
				'<svg viewBox="0 0 24 24"><path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2z"/></svg>' +
				'<span class="wpgpyt-saved-count-text">Saved (0)</span>' +
			'</button>';

		wrapper.parentNode.insertBefore( bar, wrapper );

		bar.querySelector( '.wpgpyt-saved-count-btn' ).addEventListener( 'click', function () {
			var count = getSaved().length;
			if ( count === 0 ) {
				showToast( 'No saved videos yet' );
			} else {
				showToast( 'You have ' + count + ' saved video' + ( count > 1 ? 's' : '' ) );
			}
		} );
	}

	function updateCount() {
		var text = document.querySelector( '.wpgpyt-saved-count-text' );
		if ( text ) {
			text.textContent = 'Saved (' + getSaved().length + ')';
		}
	}

	// === Toast ===
	var toastTimer = null;
	function showToast( message ) {
		var toast = document.querySelector( '.wpgpyt-toast' );
		if ( ! toast ) {
			toast = document.createElement( 'div' );
			toast.className = 'wpgpyt-toast';
			document.body.appendChild( toast );
		}
		toast.textContent = message;
		void toast.offsetWidth;
		toast.classList.add( 'wpgpyt-toast-show' );
		clearTimeout( toastTimer );
		toastTimer = setTimeout( function () {
			toast.classList.remove( 'wpgpyt-toast-show' );
		}, 2500 );
	}

	// === DOM Ready ===
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();


// ===== Video Search Feature =====
( function () {
	'use strict';

	function initSearch() {
		var attempts = 0;
		var maxAttempts = 30;

		var checkInterval = setInterval( function () {
			attempts++;

			var list = document.querySelector( '#spidochetube_list' );
			if ( list && list.querySelectorAll( 'li' ).length ) {
				setupSearch( list );
				clearInterval( checkInterval );
			}

			if ( attempts >= maxAttempts ) {
				clearInterval( checkInterval );
			}
		}, 500 );
	}

	function setupSearch( list ) {
		// Avoid duplicate search bar
		if ( document.querySelector( '.wpgpyt-search-bar' ) ) {
			return;
		}

		var wrapper = document.querySelector( '#wpgpyt-wrapper' );
		if ( ! wrapper ) {
			return;
		}

		// Create search bar
		var searchBar = document.createElement( 'div' );
		searchBar.className = 'wpgpyt-search-bar';
		searchBar.innerHTML =
			'<input type="text" class="wpgpyt-search-input" placeholder="Search videos..." aria-label="Search videos">' +
			'<svg class="wpgpyt-search-icon" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>' +
			'<button class="wpgpyt-search-clear" type="button" aria-label="Clear search">&times;</button>';

		// Insert before wrapper (or after saved bar if exists)
		var savedBar = document.querySelector( '.wpgpyt-saved-bar' );
		if ( savedBar ) {
			savedBar.parentNode.insertBefore( searchBar, savedBar.nextSibling );
		} else {
			wrapper.parentNode.insertBefore( searchBar, wrapper );
		}

		// Create "no results" message
		var noResults = document.createElement( 'div' );
		noResults.className = 'wpgpyt-no-results';
		noResults.textContent = 'No videos found';
		wrapper.parentNode.insertBefore( noResults, wrapper.nextSibling );

		var input = searchBar.querySelector( '.wpgpyt-search-input' );
		var clearBtn = searchBar.querySelector( '.wpgpyt-search-clear' );

		// Search on input
		input.addEventListener( 'input', function () {
			var query = input.value.toLowerCase().trim();

			if ( query ) {
				searchBar.classList.add( 'wpgpyt-has-text' );
			} else {
				searchBar.classList.remove( 'wpgpyt-has-text' );
			}

			filterVideos( list, query, noResults );
		} );

		// Clear button
		clearBtn.addEventListener( 'click', function () {
			input.value = '';
			searchBar.classList.remove( 'wpgpyt-has-text' );
			filterVideos( list, '', noResults );
			input.focus();
		} );
	}

	function filterVideos( list, query, noResults ) {
		var items = list.querySelectorAll( 'li' );
		var visibleCount = 0;

		items.forEach( function ( li ) {
			var titleEl = li.querySelector( 'span' );
			var title = titleEl ? titleEl.textContent.toLowerCase() : '';

			if ( ! query || title.indexOf( query ) !== -1 ) {
				li.classList.remove( 'wpgpyt-filtered' );
				visibleCount++;
			} else {
				li.classList.add( 'wpgpyt-filtered' );
			}
		} );

		// Show/hide no results message
		if ( visibleCount === 0 && query ) {
			noResults.classList.add( 'wpgpyt-show' );
		} else {
			noResults.classList.remove( 'wpgpyt-show' );
		}
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initSearch );
	} else {
		initSearch();
	}
} )();


// ===== Sticky Player Feature =====
( function () {
	'use strict';

	function initSticky() {
		var attempts = 0;
		var maxAttempts = 30;

		var checkInterval = setInterval( function () {
			attempts++;

			var player = document.querySelector( '#spidochetube_player' );
			if ( player && player.querySelector( 'iframe' ) ) {
				setupSticky( player );
				clearInterval( checkInterval );
			}

			if ( attempts >= maxAttempts ) {
				clearInterval( checkInterval );
			}
		}, 500 );
	}

	function setupSticky( player ) {
		// Avoid duplicate setup
		if ( player.getAttribute( 'data-wpgpyt-sticky-ready' ) ) {
			return;
		}
		player.setAttribute( 'data-wpgpyt-sticky-ready', '1' );

		// Add close button
		var closeBtn = document.createElement( 'button' );
		closeBtn.className = 'wpgpyt-sticky-close';
		closeBtn.type = 'button';
		closeBtn.setAttribute( 'aria-label', 'Close sticky player' );
		closeBtn.innerHTML = '&times;';
		player.appendChild( closeBtn );

		// Add LIVE label
		var label = document.createElement( 'span' );
		label.className = 'wpgpyt-sticky-label';
		label.textContent = 'Playing';
		player.appendChild( label );

		// Create placeholder (prevents layout jump when sticky)
		var placeholder = document.createElement( 'div' );
		placeholder.className = 'wpgpyt-player-placeholder';
		player.parentNode.insertBefore( placeholder, player );

		var stickyDismissed = false;

		// Close button handler
		closeBtn.addEventListener( 'click', function () {
			player.classList.remove( 'wpgpyt-sticky' );
			placeholder.classList.remove( 'wpgpyt-active' );
			stickyDismissed = true;
		} );

		// Scroll handler
		var ticking = false;
		window.addEventListener( 'scroll', function () {
			if ( ! ticking ) {
				window.requestAnimationFrame( function () {
					handleScroll( player, placeholder, stickyDismissed );
					ticking = false;
				} );
				ticking = true;
			}
		} );

		// Reset dismiss when a new video is clicked
		var list = document.querySelector( '#spidochetube_list' );
		if ( list ) {
			list.addEventListener( 'click', function () {
				stickyDismissed = false;
			} );
		}
	}

	function handleScroll( player, placeholder, stickyDismissed ) {
		if ( stickyDismissed ) {
			return;
		}

		// Use placeholder position (since player may be fixed)
		var reference = placeholder.classList.contains( 'wpgpyt-active' ) ? placeholder : player;
		var rect = reference.getBoundingClientRect();

		// When player scrolled above viewport top
		if ( rect.top < -50 && ! player.classList.contains( 'wpgpyt-sticky' ) ) {
			// Set placeholder height to match player (prevent jump)
			placeholder.style.height = player.offsetHeight + 'px';
			placeholder.classList.add( 'wpgpyt-active' );
			player.classList.add( 'wpgpyt-sticky' );
		} else if ( player.classList.contains( 'wpgpyt-sticky' ) ) {
			// Check placeholder position to decide un-sticky
			var phRect = placeholder.getBoundingClientRect();
			if ( phRect.top >= -50 ) {
				player.classList.remove( 'wpgpyt-sticky' );
				placeholder.classList.remove( 'wpgpyt-active' );
				placeholder.style.height = '';
			}
		}
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initSticky );
	} else {
		initSticky();
	}
} )();