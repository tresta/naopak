$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	
	var email = $("#email");
	var pass = $("#pass");
		
	var emailInfo = $("#emailInfo");
	var passInfo = $("#passInfo");
		
	//On blur
	email.blur(validateEmail);
	pass.blur(validatePass);

	//On Submitting
	form.submit(function(){
		if(validateEmail() && validatePass())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//if it's NOT valid
		if(email.val().length < 1){
			email.addClass("error");
			emailInfo.text("To pole nie może być puste.");
			emailInfo.addClass("error");
			return false;
		}
		//if it's NOT valid
		else{
			email.removeClass("error");
			emailInfo.text("");
			emailInfo.removeClass("error");
			return true;
		}
	}

	function validatePass(){
		//if it's NOT valid
		if(pass.val().length < 1){
			pass.addClass("error");
			passInfo.text("To pole nie może być puste.");
			passInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			pass.removeClass("error");
			passInfo.text("");
			passInfo.removeClass("error");
			return true;
		}
	}

});