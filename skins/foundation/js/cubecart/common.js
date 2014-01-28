jQuery(document).ready(function() {
	
	$(".autosubmit select").change(function() {
		$(".autosubmit").submit();
	});
    
    $(".category-nav li" ).each(function(index) {
		if(!$(this).has("ul").length){
			$(this).removeClass('has-dropdown');
		}
	});
	
	$(".review_toggle").click(function() {
		$('#review_read').slideToggle(); 
		$('#review_write').slideToggle();
		return false;
	});
	
	$('input[type=radio].rating').rating({required: true});
});

function equalheight() {    
    $('.equalheight').each(function(index) {
        var maxHeight = 0;
        $(this).children().each(function(index) {
            if($(this).height() > maxHeight) 
                maxHeight = $(this).height();
        });
        $(this).children().height(maxHeight);
    });    
}

$(window).bind("load", equalheight);
$(window).bind("resize", equalheight);