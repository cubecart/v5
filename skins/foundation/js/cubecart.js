jQuery(document).ready(function() {
	/*
	var screen = '';
	if(Modernizr.mq('(max-width: 40em)')) {
		screen = 'small';
	}
	*/
	$("#eu_cookie_button").click(function() {
		$('#eu_cookie_dialogue').slideUp(); 
		
		var date = new Date();
		date.setTime(date.getTime()+(63115200000));
		var expires = date.toGMTString();

		document.cookie="accept_cookies=1; expires="+expires+";";
		return false;
	});
	
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
	
	$('.address_lookup').blur(function() {
		if($("#address_form").hasClass('hide')) {
			$("#address_form").slideDown();
		}
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
	
	/* Initial setup of country/state menu */
	$('select#country-list, select.country-list').each(function(){
		if (typeof(county_list) == 'object') {
			var counties = county_list[$(this).val()];
			var target = ($(this).attr('rel') && $(this).attr('id') != 'country-list') ? '#'+$(this).attr('rel') : '#state-list';
			if (typeof(counties) == 'object') {
				var setting	= $(target).val();
				var select	= document.createElement('select');
				$(target).replaceWith($(select).attr({'name':$(target).attr('name'),'id':$(target).attr('id'),'class':$(target).attr('class')}));
				if ($(this).attr('title')) {
					var option = document.createElement('option');
					$('select'+target).append($(option).val('0').text($(this).attr('title')));
				}
				for (i in counties) {
					var option = document.createElement('option');
					if (setting == counties[i].name || setting == counties[i].id) {
						$('select'+target).append($(option).val(counties[i].id).text(counties[i].name).attr('selected', 'selected'));
					} else {
						$('select'+target).append($(option).val(counties[i].id).text(counties[i].name));
					}
				}

			} else {
				if ($(this).hasClass('no-custom-zone')) $(target).attr({'disabled': 'disabled'}).val($(this).attr('title'));
			}
		}
	}).change(function(){
		if (typeof(county_list) == 'object') {
			var list	= county_list[$(this).val()];
			var target	= ($(this).attr('rel') && $(this).attr('id') != 'country-list') ? '#'+$(this).attr('rel') : '#state-list';
			if (typeof(list) == 'object' && typeof(county_list[$(this).val()]) != 'undefined' && county_list[$(this).val()].length >= 1) {
				var setting	= $(target).val();
				var select	= document.createElement('select');
				$(target).replaceWith($(select).attr({'name':$(target).attr('name'),'id':$(target).attr('id'),'class':$(target).attr('class')}));
				if ($(this).attr('title')) {
					var option = document.createElement('option');
					$('select'+target).append($(option).val('0').text($(this).attr('title')));
				}

				for (var i=0; i<list.length; i++) {
					var option = document.createElement('option');
					$('select'+target).append($(option).val(list[i].id).text(list[i].name));
				}
				$('select'+target+' > option[value='+setting+']').attr('selected', 'selected');
			} else {
				var input		= document.createElement('input');
				var placeholder = $('label[for="'+ $(this).attr('id') +'"]').text()+' '+$('#validate_required').text();
				var replacement	= $(input).attr({'type':'text','placeholder':placeholder,'id':$(target).attr('id'),'name': $(target).attr('name'),'class': $(target).attr('class')});
				if ($(this).hasClass('no-custom-zone')) $(replacement).attr('disabled', 'disabled').val($(this).attr('title'));
				$(target).replaceWith($(replacement));
			}
		}
	});
	
	if ($('#delivery_is_billing:checkbox').is(':checked') == true) $('fieldset#address_delivery').hide();
	$('#delivery_is_billing:checkbox').change(function(){
		if ($(this).is(':checked')) {
			$('#address_delivery').hide();
		} else {
			$('#address_delivery').show();
		}
	});
	if ($('input#show-reg:checkbox').is(':checked') == false) $('#account-reg').hide();
	$('input#show-reg:checkbox').change(function(){
		if ($(this).is(':checked')) {
			$('#account-reg').show();
			$('input#reg_password').addClass('required');
			$('input#reg_passconf').addClass('required');
		} else {
			$('#account-reg').hide();
			$('input#reg_password').removeClass('required');
			$('input#reg_passconf').removeClass('required');
		}
	});	
		
});

function mini_basket_action() {
	$('#basket-detail').slideDown();
	 $('#basket-detail').delay(4000).slideUp();
}