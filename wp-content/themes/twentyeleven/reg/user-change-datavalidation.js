$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	
	var name = $("#name1");
	var surname = $("#surname");
	var address = $("#address");
	var city = $("#city");
		
	var nameInfo = $("#name1Info");
	var surnameInfo = $("#surnameInfo");
	var addressInfo = $("#addressInfo");
	var cityInfo = $("#cityInfo");
		
	//On blur
	name.blur(validateName);
	surname.blur(validateSurname);
	address.blur(validateAddress);
	city.blur(validateCity);

	//On Submitting
	form.submit(function(){
		if(validateName() && validateSurname() && validateAddress() && validateCity())
			return true
		else
			return false;
	});
	
	//validation functions	
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 1){
			name.addClass("error");
			nameInfo.text("To pole nie może być puste.");
			nameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			name.removeClass("error");
			nameInfo.text("");
			nameInfo.removeClass("error");
			return true;
		}
	}
	
	function validateSurname(){
		//if it's NOT valid
		if(surname.val().length < 1){
			surname.addClass("error");
			surnameInfo.text("To pole nie może być puste.");
			surnameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			surname.removeClass("error");
			surnameInfo.text("");
			surnameInfo.removeClass("error");
			return true;
		}
	}
	
	function validateAddress(){
		//if it's NOT valid
		if(address.val().length < 1){
			address.addClass("error");
			addressInfo.text("To pole nie może być puste.");
			addressInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			address.removeClass("error");
			addressInfo.text("");
			addressInfo.removeClass("error");
			return true;
		}
	}
	
	function validateCity(){
		//if it's NOT valid
		if(city.val().length < 1){
			city.addClass("error");
			cityInfo.text("To pole nie może być puste.");
			cityInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			city.removeClass("error");
			cityInfo.text("");
			cityInfo.removeClass("error");
			return true;
		}
	}

});