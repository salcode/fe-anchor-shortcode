(function() {
	/**
	 * Helper function to convert an arbitrary string into a slug appropriate for a URL (or anchor) using wpFeSanitizeTitle.
	 *
	 * @param  string Text An arbitrary string of text.
	 * @return string The original string of text converted to a string with a non-numeric leading character.
	 */
	function convertToSlug( Text ) {
		// Confirm helper function wpFeSanitizeTitle() is loaded before applying.
		if ( 'function' === typeof wpFeSanitizeTitle ) {
			Text = wpFeSanitizeTitle( Text );
		}
		return Text
			// If the string does NOT start with a lower-case letter, prefix with 'my-'.
			.replace(/^[^a-z]/,'my-$&');
	}

	// Create plugin 'fe_anchor'.
	tinymce.create('tinymce.plugins.fe_anchor', {
		/**
		 * On plugin initialization.
		 *
		 * @param editor Instance of TinyMCE.
		 * @param url    The url of the directory where this plugin
		 *               JS file is loaded from (without a trailing slash).
		 */
		init : function(editor, url) {
			/**
			 * Add Button fe_anchor to this instance of TinyMCE.
			 *
			 * @param string Button name.
			 * @param object Configuration for button.
			 */
			editor.addButton( 'fe_anchor', {
				// Image displayed in the button.
				image : url + '/anchor.svg',
				// Label displayed when hovering over the button.
				title : 'Anchor',
				onclick : function() {
					// When the button is clicked.

					// Load JavaScript dependency wpFeSanitizeTitle().
					tinymce.ScriptLoader.add( url + '/wp-fe-sanitize-title.js' );
					tinymce.ScriptLoader.loadQueue();

					// Open a popup window in this editor.
					editor.windowManager.open({

						// Title of the popup window, displayed at the top.
						title: 'Enter Anchor ID',

						// Configuration of the popup window.
						body: [{
							// Type of input box.
							type: 'textbox',
							// Name of the field. Used later to access values.
							name: 'anchorId',
							// Label displayed next to the input box.
							label: 'ID'
						}],
						onsubmit: function(e) {
							// Insert content when the window form is submitted.
							var anchorId = convertToSlug( e.data.anchorId );

							editor.insertContent('[anchor id="' + anchorId + '"]');
						}
					});
				},
			});
		}
	});
	tinymce.PluginManager.add('fe_anchor', tinymce.plugins.fe_anchor);
})();
