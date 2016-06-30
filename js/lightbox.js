$(window).on('load', function() {
	$(".conntact_us_btn").on('click', function() {  
		y_lightbox('.conntact_us_lightbox',".yclose");
	});
	
});

function y_lightbox(selector,close_selector)
{
	$(selector).show();
	$(selector).addClass("lightbox");
	//Click anywhere on the page to get rid of lightbox window
	$(close_selector).on('click', function() { //must use live, as the lightbox element is inserted into the DOM
		$(selector).hide();
	});
}