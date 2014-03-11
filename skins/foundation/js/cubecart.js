jQuery(document).ready(function() {
	$("#eu_cookie_button").click(function() {
		$('#eu_cookie_dialogue').slideUp();
		$.cookie('accept_cookies', 1, { expires: 730 });
		return false;
	});
	$(".autosubmit select").change(function() {
		$(this).parents(".autosubmit").submit();
	});
	$('img.imagesubmit').each(function() {
		$(this).parents('form').submit();
	});
	$(".category-nav li").each(function(index) {
		if (!$(this).has("ul").length) {
			$(this).removeClass('has-dropdown');
		}
	});
	$(".review_toggle").click(function() {
		$('#review_read').slideToggle();
		$('#review_write').slideToggle();
		return false;
	});
	$(".show-small-search").click(function() {
		if ($(this).hasClass('hidden')) {
			$("#small-search").slideDown();
			$(this).removeClass('hidden');
		} else {
			$("#small-search").slideUp();
			$(this).addClass('hidden');
		}
		return;
	});
	$('input[type=radio].rating').rating({
		required: true
	});
	var magnify_options = {
		lensWidth: 300,
		lensHeight: 300,
		link: true,
		delay: 250
	};
	$('a.magnify').magnify(magnify_options);
	$('a.gallery').hover(function() {
		var id = $(this).attr('id');
		if (typeof gallery_json == 'object') {
			$('a.magnify > img#preview').attr({
				src: gallery_json[id].medium
			});
			$('a.magnify').attr({
				href: gallery_json[id].source
			}).unbind().magnify(magnify_options);
		}
	});
	$('#currency_switch').click(function() {
		$('#language_menu').hide();
		$('#currency_menu').slideDown();
		$('#currency_menu').delay(5000).slideUp();
	});
	$('#language_switch').click(function() {
		$('#currency_menu').hide();
		$('#language_menu').slideDown();
		$('#language_menu').delay(5000).slideUp();
	});
	
	$('#basket-summary').click(function() {
		mini_basket_action();
	});
	$('form#add_to_basket').submit(function() {
		var add = $(this).serialize();
		var action = $(this).attr('action').replace(/\?.*/, '');
		var basket = $('#mini-basket');
		var parts = action.split("?");
		if (parts.length > 1) {
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
				if (returned.responseText.match("Redir")) {
					window.location = returned.responseText.substr(6);
				} else {
					basket.replaceWith(returned.responseText);
					$("#gui_message").slideUp();
					mini_basket_action();
				}
			}
		});
		return false;
	}); /* Initial setup of country/state menu */
	$('select#country-list, select.country-list').each(function() {
		if (typeof(county_list) == 'object') {
			var counties = county_list[$(this).val()];
			var target = ($(this).attr('rel') && $(this).attr('id') != 'country-list') ? '#' + $(this).attr('rel') : '#state-list';
			if (typeof(counties) == 'object') {
				var setting = $(target).val();
				var select = document.createElement('select');
				$(target).replaceWith($(select).attr({
					'name': $(target).attr('name'),
					'id': $(target).attr('id'),
					'class': $(target).attr('class')
				}));
				if ($(this).attr('title')) {
					var option = document.createElement('option');
					$('select' + target).append($(option).val('0').text($(this).attr('title')));
				}
				for (i in counties) {
					var option = document.createElement('option');
					if (setting == counties[i].name || setting == counties[i].id) {
						$('select' + target).append($(option).val(counties[i].id).text(counties[i].name).attr('selected', 'selected'));
					} else {
						$('select' + target).append($(option).val(counties[i].id).text(counties[i].name));
					}
				}
			} else {
				if ($(this).hasClass('no-custom-zone')) $(target).attr({
					'disabled': 'disabled'
				}).val($(this).attr('title'));
			}
		}
	}).change(function() {
		if (typeof(county_list) == 'object') {
			var list = county_list[$(this).val()];
			var target = ($(this).attr('rel') && $(this).attr('id') != 'country-list') ? '#' + $(this).attr('rel') : '#state-list';
			if (typeof(list) == 'object' && typeof(county_list[$(this).val()]) != 'undefined' && county_list[$(this).val()].length >= 1) {
				var setting = $(target).val();
				var select = document.createElement('select');
				$(target).replaceWith($(select).attr({
					'name': $(target).attr('name'),
					'id': $(target).attr('id'),
					'class': $(target).attr('class')
				}));
				if ($(this).attr('title')) {
					var option = document.createElement('option');
					$('select' + target).append($(option).val('0').text($(this).attr('title')));
				}
				for (var i = 0; i < list.length; i++) {
					var option = document.createElement('option');
					$('select' + target).append($(option).val(list[i].id).text(list[i].name));
				}
				$('select' + target + ' > option[value=' + setting + ']').attr('selected', 'selected');
			} else {
				var input = document.createElement('input');
				var placeholder = $('label[for="' + $(this).attr('id') + '"]').text() + ' ' + $('#validate_required').text();
				var replacement = $(input).attr({
					'type': 'text',
					'placeholder': placeholder,
					'id': $(target).attr('id'),
					'name': $(target).attr('name'),
					'class': $(target).attr('class')
				});
				if ($(this).hasClass('no-custom-zone')) $(replacement).attr('disabled', 'disabled').val($(this).attr('title'));
				$(target).replaceWith($(replacement));
			}
		}
	});
	if ($('#delivery_is_billing:checkbox').is(':checked') == true) $('fieldset#address_delivery').hide();
	$('#delivery_is_billing:checkbox').change(function() {
		if ($(this).is(':checked')) {
			$('#address_delivery').hide();
		} else {
			$('#address_delivery').show();
		}
	});
	if ($('input#show-reg:checkbox').is(':checked') == false) $('#account-reg').hide();
	$('input#show-reg:checkbox').change(function() {
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
	
	$('.grid_view').click(function() {
		grid_view(200);
	});
	$('.list_view').click(function() {
		list_view(200);
	});
	
	set_product_view(0);
	
	$('.url_select').bind('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
    });
	
    $('#jscroll').jscroll({
	    loadingHtml: '<p class="text-center"><i class="fa fa-spinner fa-spin thickpad-topbottom"></i> '+$('#lang_loading').text()+'&hellip;<p>',
	    nextSelector: '#jscroll-next',
	    contentSelector: '#jscroll',
	    autoTrigger: false,
	    callback: function(){set_product_view(0)}
	});
	
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });
    
    $('.back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
    
    $('#checkout_login').click(function () {
      $("#checkout_login_form").slideDown();
      $("#checkout_register_form").hide();
      $("#reg_password").prop('disabled', true);
   });
   $('#checkout_register').click(function () {
      $("#checkout_login_form").hide();
      $("#checkout_register_form").slideDown();
      $("#reg_password").prop('disabled', false);
   });
	
});

function set_product_view(delay) {
	if ($.cookie('product_view') == 'grid') {
		grid_view(delay);
	}
}

function mini_basket_action() {
	$('#basket-detail').slideDown();
	$('#basket-detail').delay(4000).slideUp();
}

function grid_view(duration) {
	event.preventDefault();
	$('.product_list').fadeOut(duration, function() {
		$('.product_list').removeClass('small-block-grid-1');
		$('.product_list').addClass('small-block-grid-3');
		$('.grid_view').parent('dd').addClass('active');
		$('.list_view').parent('dd').removeClass('active');
		$('.product_list_view').addClass('hide');
		$('.product_grid_view').removeClass('hide');
	});
	$('.product_list').fadeIn(duration, function() {
		$.cookie('product_view', 'grid', { expires: 730 });
	});
	return false;
}

function list_view(duration) {
	event.preventDefault();
	$('.product_list').fadeOut(duration, function() {
		$('.product_list').removeClass('small-block-grid-3');
		$('.product_list').addClass('small-block-grid-1');
		$('.list_view').parent('dd').addClass('active');
		$('.grid_view').parent('dd').removeClass('active');
		$('.product_grid_view').addClass('hide');
		$('.product_list_view').removeClass('hide');
	});
	$('.product_list').fadeIn(duration, function() {
		$.cookie('product_view', 'list', { expires: 730 });
	});
	return false;
}

