jQuery(document).ready(function($){

$('#kod_pocztowy').keyup(function() {
    $('span.error-keyup-1').hide();
    var inputVal = $(this).val();
    var numericReg = /^[0-9]{2}-[0-9]{3}$/;
    if(!numericReg.test(inputVal)) {
        $(this).after('<span class="error error-keyup-1">Please specify a valid postal code.</span>');
    }
});

$('#nr_tel').keyup(function() {
    $('span.error-keyup-1').hide();
    var inputVal = $(this).val();
    var numericReg = /^\(?[0-9]{3}\)?[-\s]?[0-9]{3}[-\s]?[0-9]{2,3}[-\s]?[0-9]{0,3}$/;
    if(!numericReg.test(inputVal)) {
        $(this).after('<span class="error error-keyup-1">Please specify a valid phone number.</span>');
    }
});

$("#checkout_form").validate({
			debug: false,
			rules: {
				imie: {
					required: true
				},
				nazwisko: {
					required: true
				},
				ulica: {
					required: true
				},
				miasto: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				kod_pocztowy: {
					required: true
				},
				nr_tel: {
					required: true
				}				
			},
			messages: {
				email: "Podanie prawidłowego adresu email ułatwi nam kontakt z Tobą.",
			}
		});			
	});