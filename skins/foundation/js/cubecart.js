jQuery(document).ready(function() {
	
	var screen = '';
	if(Modernizr.mq('(max-width: 40em)')) {
		screen = 'small';
	}
	
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
	
	$(".show-small-search").click(function() {
		if($(this).hasClass('hidden')) {
			$("#small-search").slideDown();
			$(this).removeClass('hidden');
		} else {
			$("#small-search").slideUp();
			$(this).addClass('hidden');
		}
		return;
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
		errorElement: 'small'
	});
	$.validator.addMethod("phone", function(phone, element) {
		phone = phone.replace(/\s+/g, "");
		return this.optional(element) || phone.match(/^[0-9-+()]+$/);
	}, $('#validate_phone').text());
	
	
	$("#search_form").validate({
	   rules: {
		    'search[keywords]': {
		      required: true
		    }
		  },
		  messages: {
		    'search[keywords]': {
		      required: $('#validate_search').text()
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
		      required: $('#validate_search').text()
		    }
		  }
	 });
	 
	 $("#login_form").validate({
	   rules: {
		    username: {
		      required: true,
		      email: true
		    },
		    password: {
		      required: true
		    }
		  },
		  messages: {
		    username: {
		      required: $('#validate_email').text(),
		      email: $('#validate_email').text()
		    },
		    password: {
		    	required: $('#empty_password').text()
		    }
		  }
	 });
	 
	 $("#registration_form").validate({
	   
	   errorPlacement: function(error, element) {
	    if (element.attr("name") == "terms_agree") {
	      element.removeClass("error");
	      alert(error.text());
	    } else {
	      error.insertAfter(element);
	    }
	  },
	   
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
				phone: true
			},
			mobile: {
				required: false,
				phone: true
			},
			password: {
				required: true,
				minlength: 6
			},
			passconf: {
				  equalTo: "#password"
			},
			terms_agree: {
		      required: true
		    }
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
		    mobile: {
		    	phone: $('#validate_mobile').text()
		    },
		    password: {
		    	required: $('#validate_password').text(),
		    	minlength: $('#validate_password_length').text()
		    },
		    passconf: {
		    	required: $('#validate_password_mismatch').text(),
		    	equalTo: $('#validate_password_mismatch').text()
		    },
		    terms_agree: {
		    	required: $('#validate_terms_agree').text()
		    }
		  }
	 });
	 
	 
	 $("#profile_form").validate({
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
				phone: true
			},
			mobile: {
				required: false,
				phone: true
			},
			passold: {
				minlength: 6,
			},
			passnew: {
				minlength: 6,
			},
			passconf: {
				  equalTo: "#passnew",
			}
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
		    mobile: {
		    	phone: $('#validate_mobile').text()
		    },
		    passold: {
				minlength: $('#validate_password_length').text()
			},
			passnew: {
				minlength: $('#validate_password_length').text()
			},
		    passconf: {
		    	equalTo: $('#validate_password_mismatch').text()
		    }
		  }
	 });
	 
	 $('input:reset').click(function() { $(this).parents('form:first').validate().resetForm(); });
	 
	 $('#basket-summary').click(function() {
	 		mini_basket_action();
	 	}
	 );
	 
	 
	$('form#add_to_basket').submit(function(){	
		
		//if(screen=='small') {
		//	return false;
		//}
		
		var add = $(this).serialize();
		var action = $(this).attr('action').replace(/\?.*/, '');			
		var basket = $('#mini-basket');

		var parts = action.split("?");
		if(parts.length > 1) {
			action += "&";
		} else {
			action += "?";
		}

		$.ajax({
			url: action + '_g=ajaxadd',
			type: 'POST',
			cache: false,
			data: add,
			complete: function(returned) {
				if(returned.responseText.match("Redir")) {
					window.location = returned.responseText.substr(6);
				} else {
					basket.replaceWith(returned.responseText);
					$("#gui_message").slideUp();
					mini_basket_action();
				}
			}
		});
		return false;
	});
		
});

function mini_basket_action() {
	$('#basket-detail').slideDown();
	 $('#basket-detail').delay(4000).slideUp();
}