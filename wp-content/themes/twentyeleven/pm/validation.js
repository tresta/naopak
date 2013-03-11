/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	var to = $("#do");
	var toInfo = $("#doInfo");
	var temat = $("#temat");
	var tematInfo = $("#tematInfo");
	var tresc = $("#tresc");
	var trescInfo = $("#trescInfo");
	//On blur
	temat.blur(validateTemat);
	tresc.blur(validateTresc);

	//On Submitting
	form.submit(function(){
		if(validateTresc() && validateTemat() && validateTo())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateTo(){
		//if it's NOT valid
		if(to.val().length < 1){
			to.addClass("error");
			toInfo.text("To pole nie może być puste.");
			toInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			to.removeClass("error");
			toInfo.text("");
			toInfo.removeClass("error");
			return true;
		}
	}
	function validateTresc(){
		//if it's NOT valid
		if(tresc.val().length < 1){
			tresc.addClass("error");
			trescInfo.text("To pole nie może być puste.");
			trescInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			tresc.removeClass("error");
			trescInfo.text("");
			trescInfo.removeClass("error");
			return true;
		}
	}
	function validateTemat(){
		//if it's NOT valid
		if(temat.val().length < 1){
			temat.addClass("error");
			tematInfo.text("To pole nie może być puste.");
			tematInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			temat.removeClass("error");
			tematInfo.text("");
			tematInfo.removeClass("error");
			return true;
		}
	}

});