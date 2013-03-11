$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	
	var fullname = $("#fullname");
	var phone = $("#phone");
	var producentname = $("#producentname");
		
	var fullnameInfo = $("#fullnameInfo");
	var phoneInfo = $("#phoneInfo");
	var producentnameInfo = $("#producentnameInfo");
		
	//On blur
	fullname.blur(validateFullname);
	phone.blur(validatePhone);
	producentname.blur(validateProducentname);

	//On Submitting
	form.submit(function(){
		if(validateFullname() && validatePhone() && validateProducentname())
			return true
		else
			return false;
	});
	
	//validation functions	
	function validateFullname(){
		//if it's NOT valid
		if(fullname.val().length < 1){
			fullname.addClass("error");
			fullnameInfo.text("To pole nie może być puste.");
			fullnameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			fullname.removeClass("error");
			fullnameInfo.text("");
			fullnameInfo.removeClass("error");
			return true;
		}
	}
	
	function validatePhone(){
		//if it's NOT valid
		if(phone.val().length < 1){
			phone.addClass("error");
			phoneInfo.text("To pole nie może być puste.");
			phoneInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			phone.removeClass("error");
			phoneInfo.text("");
			phoneInfo.removeClass("error");
			return true;
		}
	}
	
	function validateProducentname(){
		//if it's NOT valid
		if(producentname.val().length < 1){
			producentname.addClass("error");
			producentnameInfo.text("To pole nie może być puste.");
			producentnameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			producentname.removeClass("error");
			producentnameInfo.text("");
			producentnameInfo.removeClass("error");
			return true;
		}
	}
	
});