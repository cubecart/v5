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
	
	var magnify_options = {lensWidth:300, lensHeight:300, link:true, delay:250};
	$('a.magnify').magnify(magnify_options);
	$('a.gallery').hover(function(){
		var id	= $(this).attr('id');
		if (typeof gallery_json == 'object') {
			$('a.magnify > img#preview').attr({src: gallery_json[id].medium});
			$('a.magnify').attr({href: gallery_json[id].source}).unbind().magnify(magnify_options);
		}
	});
	
	$.validator.setDefaults({
	  errorElement: "small"
	});
	$.validator.addMethod("phone", function(phone, element) {
	phone = phone.replace(/\s+/g, "");
	return this.optional(element) || phone.match(/^[0-9-+]+$/);
}, $('#validate_phone').text());
	
	$("#search_form").validate({
	   
	   rules: {
		    'search[keywords]': {
		      required: true
		    }
		  },
		  messages: {
		    'search[keywords]': {
		      required: "Please enter a search term"
		    }
		  }
	 });
	 
	 $("#advanced_search_form").validate({
	   rules: {
		    'search[keywords]': {
		      required: true
		    }
		  },
		  messages: {
		    'search[keywords]': {
		      required: "Please enter a search term"
		    }
		  }
	 });
	 
	 $("#login_form").validate({
	   rules: {
		    username: {
		      required: true,
		      email: true
		    }
		  },
		  messages: {
		    username: {
		      required: "Please enter an email address to login",
		      email: "Your login email address must be in the format of name@example.com"
		    }
		  }
	 });
	 
	 $("#registration_form").validate({
	   rules: {
		    first_name: {
		      required: true
		    },
		    last_name: {
		      required: true
		    },
		    email: {
		    	required: true,
		    	email: true
			},
			phone: {
				required: true,
				phone: true,
			},
			password: "required",
			  passconf: {
				  equalTo: "#password"
			},
			
  
		  },
		  messages: {
		    first_name: {
		      required: $('#validate_firstname').text()
		    },
		    last_name: {
		      required: $('#validate_lastname').text()
		    },
		    email: {
		    	required: $('#validate_email').text(),
		    	email: $('#validate_email').text()
		    },
		    phone: {
		    	required: $('#validate_phone').text(),
		    	phone: $('#validate_phone').text()
		    },
		    password: {
		    	required: $('#validate_password').text()
		    },
		    passconf: {
		    	required: $('#validate_password_mismatch').text(),
		    	equalTo: $('#validate_password_mismatch').text()
		    }
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