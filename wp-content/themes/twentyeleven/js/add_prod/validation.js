$(document).ready(function(){
	//global vars
	var form = $("#add_product_form");

	var nazwa = $("#nazwa_produktu");
	var cena = $("#cena");
	var opis = $("#opis");
		
	var nazwaInfo = $("#nazwa_produktuInfo");
	var cenaInfo = $("#cenaInfo");
	var opisInfo = $("#opisInfo");
	
	//On blur
	nazwa.blur(validateNazwa);
	cena.blur(validateCena);
	opis.blur(validateOpis);

	//On Submitting
	form.submit(function(){
		if(validateNazwa() && validateCena() && validateOpis())
			return true
		else
			return false;
	});
	
	//validation functions
	function validateNazwa(){
		//testing regular expression
		var a = $("#nazwa_produktu").val();
		var filter = /^[0-9a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]+/;
		//if it's valid email
		if(filter.test(a)){
			nazwa.removeClass("error");
			nazwaInfo.text("");
			nazwaInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			nazwa.addClass("error");
			nazwaInfo.text("Proszę o poprawne wpisanie nazwy produktu.");
			nazwaInfo.addClass("error");
			return false;
		}
	}
	
	function validateCena(){
		//testing regular expression
		var a = $("#cena").val();
		var filter = /^[0-9]{1,}(\.[0-9]{2})?$/;
		//if it's valid email
		if(filter.test(a)){
			cena.removeClass("error");
			cenaInfo.text("");
			cenaInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			cena.addClass("error");
			cenaInfo.text("Proszę o poprawne wpisanie ceny produktu.");
			cenaInfo.addClass("error");
			return false;
		}
	}
	function validateOpis(){
		//if it's NOT valid
		if(opis.val().length < 1){
			opis.addClass("error");
			opisInfo.text("To pole nie może być puste.");
			opisInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			opis.removeClass("error");
			opisInfo.text("");
			opisInfo.removeClass("error");
			return true;
		}
	}
});