jQuery(document).ready(function() {
	
	var set_currency = $('select[name="set_currency"]');
    set_currency.change(function() {
        if(set_currency.val() !='') {
        	this.form.submit();
        } else {
        	return false;
        }
    });
    
    var set_language = $('select[name="set_language"]');
    set_language.change(function() {
        if(set_language.val() !='') {
        	this.form.submit();
        } else {
        	return false;
        }
    });
    
    $(".category-nav li" ).each(function(index) {
		if($(this).has("ul")) {
			
		}
	});
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