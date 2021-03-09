( function( $ ) {

	'use strict';

	var JetElementsEditor = {

		activeSection: null,

		editedElement: null,

		init: function() {
			elementor.channels.editor.on( 'section:activated', JetElementsEditor.onAnimatedBoxSectionActivated );

			window.elementor.on( 'preview:loaded', function() {
				elementor.$preview[0].contentWindow.JetElementsEditor = JetElementsEditor;
			});
		},

		onAnimatedBoxSectionActivated: function( sectionName, editor ) {
			var editedElement = editor.getOption( 'editedElementView' );

			if ( 'jet-animated-box' !== editedElement.model.get( 'widgetType' ) ) {
				var prevEditedElement = window.JetElementsEditor.editedElement;

				if ( ! prevEditedElement ) {
					return;
				}

				if ( 'jet-animated-box' !== prevEditedElement.model.get( 'widgetType' ) ) {
					return;
				}

				prevEditedElement.$el.find( '.jet-animated-box' ).removeClass( 'flipped' );
				prevEditedElement.$el.find( '.jet-animated-box' ).addClass( 'flipped-stop' );

				window.JetElementsEditor.editedElement = null;
				
				return;
			}

			window.JetElementsEditor.editedElement = editedElement;
			window.JetElementsEditor.activeSection = sectionName;

			var isBackSide = -1 !== [ 'section_back_content', 'section_action_button_style' ].indexOf( sectionName );

			if ( isBackSide ) {
				editedElement.$el.find( '.jet-animated-box' ).addClass( 'flipped' );
				editedElement.$el.find( '.jet-animated-box' ).addClass( 'flipped-stop' );
			} else {
				editedElement.$el.find( '.jet-animated-box' ).removeClass( 'flipped' );
				editedElement.$el.find( '.jet-animated-box' ).addClass( 'flipped-stop' );
			}
		}
	};

	$( window ).on( 'elementor:init', JetElementsEditor.init );

	window.JetElementsEditor = JetElementsEditor;

}( jQuery ) );
