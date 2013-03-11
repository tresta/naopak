$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	
	var pass1 = $("#pass1");
	var pass2 = $("#pass2");
	var pass3 = $("#pass3");
			
	var pass1Info = $("#pass1Info");
	var pass2Info = $("#pass2Info");
	var pass3Info = $("#pass3Info");
		
	//On blur
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	pass3.blur(validatePass3);

	//On Submitting
	form.submit(function(){
		if(validatePass1() && validatePass2() && validatePass3())
			return true
		else
			return false;
	});
	
	//validation functions
	function validatePass1(){
		//if it's NOT valid
		if(pass1.val().length < 1){
			pass1.addClass("error");
			pass1Info.text("To pole nie może być puste.");
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
			pass2Info.text("Wpisane hasła różnią się");
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
	function validatePass3(){
		//if it's NOT valid
		if(pass3.val().length < 1){
			pass3.addClass("error");
			pass3Info.text("To pole nie może być puste.");
			pass3Info.addClass("error");
			return false;
		}
		else if(pass1.val() == pass3.val()){
			pass3.addClass("error");
			pass3Info.text("Nowe hasło musi się różnić od starego.");
			pass3Info.addClass("error");
			return false;
		}
		//if it's valid
		else{
			pass3.removeClass("error");
			pass3Info.text("");
			pass3Info.removeClass("error");
			return true;
		}
	}

});