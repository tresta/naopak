$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	
	var email1 = $("#email1");
	var email2 = $("#email2");
	var pass1 = $("#pass1");
	var pass2 = $("#pass2");
	var name = $("#name1");
	var surname = $("#surname");
	var address = $("#address");
	var city = $("#city");
	var check = $("#check");
		
	var email1Info = $("#email1Info");
	var email2Info = $("#email2Info");
	var pass1Info = $("#pass1Info");
	var pass2Info = $("#pass2Info");
	var nameInfo = $("#name1Info");
	var surnameInfo = $("#surnameInfo");
	var addressInfo = $("#addressInfo");
	var cityInfo = $("#cityInfo");
	var checkInfo = $("#checkInfo");
		
	//On blur
	email1.blur(validateEmail1);
	email2.blur(validateEmail2);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	name.blur(validateName);
	surname.blur(validateSurname);
	address.blur(validateAddress);
	city.blur(validateCity);

	//On Submitting
	form.submit(function(){
		if(validateEmail1() && validateEmail2() && validatePass1() && validatePass2() && validateName() && validateSurname() && validateAddress() && validateCity() && validateCheck())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail1(){
		//testing regular expression
		var a = $("#email1").val();
		var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
		//if it's valid email
		if(filter.test(a)){
			email1.removeClass("error");
			email1Info.text("");
			email1Info.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email1.addClass("error");
			email1Info.text("Proszę o poprawne wpisanie adresu e-mail.");
			email1Info.addClass("error");
			return false;
		}
	}
	
	function validateEmail2(){
		//if it's NOT valid
		if(email2.val().length < 1){
			email2.addClass("error");
			email2Info.text("To pole nie może być puste.");
			email2Info.addClass("error");
			return false;
		}
		else if(email1.val() != email2.val()){
			email2.addClass("error");
			email2Info.text("Wpisane adresy e-mail nie zgadzają się");
			email2Info.addClass("error");
			return false;
		}
		//if it's valid
		else{
			email2.removeClass("error");
			email2Info.text("");
			email2Info.removeClass("error");
			return true;
		}
	}
	
	function validatePass1(){
		//if it's NOT valid
		if(pass1.val().length < 1){
			pass1.addClass("error");
			pass1Info.text("To pole nie może być puste.");
			pass1Info.addClass("error");
			return false;
		}
		else if(pass1.val().length < 6){
			pass1.addClass("error");
			pass1Info.text("Hasło musi mieć co najmniej sześć znaków.");
			pass1Info.addClass("error");
			return false;
		}
		//if it's valid
		else{
			pass1.removeClass("error");
			pass1Info.text("");
			pass1Info.removeClass("error");
			return true;
		}
	}
	
	function validatePass2(){
		//if it's NOT valid
		if(pass2.val().length < 1){
			pass2.addClass("error");
			pass2Info.text("To pole nie może być puste.");
			pass2Info.addClass("error");
			return false;
		}
		else if(pass1.val() != pass2.val()){
			pass2.addClass("error");
			pass2Info.text("Wpisane hasła nie zgadzają się");
			pass2Info.addClass("error");
			return false;
		}
		//if it's valid
		else{
			pass2.removeClass("error");
			pass2Info.text("");
			pass2Info.removeClass("error");
			return true;
		}
	}
	
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
	
	function validateCheck(){
		//if it's NOT valid
		if($('input[name=check]').is(':checked') != true){
			check.addClass("error");
			checkInfo.text("Regulamin nie został zaakceptowany.");
			checkInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			check.removeClass("error");
			checkInfo.text("");
			checkInfo.removeClass("error");
			return true;
		}
	}	

});