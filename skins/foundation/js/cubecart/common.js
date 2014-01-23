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
    
});