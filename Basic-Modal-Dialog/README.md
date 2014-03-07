# jQuery dialog #
Simple and minimal jQuery dialog.

## Usage ##
Include jQuery, `src/modal.min.js` and `src/modal.css`

The easiest way to use dialog is by adding HTML data atribute `data-modal-open` to a link.

	<a href="#" data-modal-open="modal-1">Show</a>

	<div id="modal-1" class="mb-modal">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		<div class="close-modal">&#215;</div>
	</div>

The alternative is using very simple Javascript API.

	$(function (){
		$('#open-dialog').click(function(e) {
		    e.preventDefault();
		    $('#modal-2').mbModal({
		        animation: 'slideFade', // fade, none is default
        		animationspeed: 600,
        		overlayClose: true, // false, true is default
        		escClose: true // false, true is default 
		    });
		});
	});

## License ##
The MIT License (MIT)


