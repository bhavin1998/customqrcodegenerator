(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );

jQuery(document).ready(function(){
	//empty previous QR code
	jQuery('#qrcode').empty(); 

	/* Apply height width*/
	jQuery('#qrcode').css({
		'width' : jQuery('.qr-size').val(),
		'height' : jQuery('.qr-size').val()
		});

		// Generate and Output QR Code
		jQuery('#qrcode').qrcode({width: $('.qr-size').val(),height: jQuery('.qr-size').val(),text: jQuery('.qr-url').val()});
		
		var canvas = $('#qrcode canvas');
	    console.log(canvas);
		var img = canvas.get(0).toDataURL("image/png");
		// $('.myimg').attr("src",img);
		var orderid = jQuery('.qr-url').val();

		jQuery.ajax({
			type: "post",
			url: my_ajax_object.ajax_url,
			data: {action:"get_data", "name":"qrcodegenerated","orderid":orderid,"qrcodedata":img},
			success: function(data){
			}
		});
});
