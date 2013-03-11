<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: User Account Template
 
 */	
?>

<?php
function add_scripts()
{

	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/reg/user-change-datavalidation.js"></script>';
}
add_action('wp_head', 'add_scripts');

get_header();

?>
	<script language="javascript">
	jQuery(document).ready(function(){
	
   jQuery('.submenu_group').each(function(){
		var div = jQuery(this).find('.submenu_active').length;		
		if(div==0)
		{
			jQuery(this).hide();
		}
	});

	// ********************************
	

	//ACCORDION BUTTON ACTION (ON CLICK DO THE FOLLOWING)
		
	jQuery('.accordionButton').click(function() {

		//REMOVE THE ON CLASS FROM ALL BUTTONS
		jQuery('.accordionButton').removeClass('on');
		  
		//NO MATTER WHAT WE CLOSE ALL OPEN SLIDES
	 	jQuery('.accordionContent').slideUp('normal');
   
		//IF THE NEXT SLIDE WASN'T OPEN THEN OPEN IT
		if(jQuery(this).next().is(':hidden') == true) {
			
			//ADD THE ON CLASS TO THE BUTTON
			jQuery(this).addClass('on');
			  
			//OPEN THE SLIDE
			jQuery(this).next().slideDown('normal');
		 } 
		  
	 });
	  
	
	/*** REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	//ADDS THE .OVER CLASS FROM THE STYLESHEET ON MOUSEOVER 
	jQuery('.accordionButton').mouseover(function() {
		jQuery(this).addClass('over');
		
	//ON MOUSEOUT REMOVE THE OVER CLASS
	}).mouseout(function() {
		jQuery(this).removeClass('over');										
	});
	
	/*** END REMOVE IF MOUSEOVER IS NOT REQUIRED ***/
	
	
	/********************************************************************************************************************
	CLOSES ALL S ON PAGE LOAD
	********************************************************************************************************************/	
	jQuery('.accordionContent').hide();
	jQuery('.submenu_active').parent().show();	
	jQuery('.submenu_active').parent().prev('.accordionButton').addClass('on');
	
	jQuery('.cat_selected').show();
	
	});
	
	</script>

<style>

#main_contetn{
	min-width:1000px;
	float:left;
	position:relative;
}

#menu_lewe{
	float:left;
	position:relative;
	padding-right:10px;
	margin-left:15px;
}

#center_content{
	float:left;
	margin-left:10px;
	position:relative;
}

dd{
	margin-bottom:0px;	
	margin-left:15px;
}


div.content a.menu{
	text-decoration:none;
	color:black;	
}

div.content .menu{
	text-decoration:none;
	color:black;	
}

div.content a:link.on {color:#1fb5da; text-decoration:none; } /* unvisited link */
div.content a:visited.on {color:#1fb5da; text-decoration:none; } /* visited link */
div.content a:hover.on {color:#1fb5da; text-decoration:none; } /* mouse over link */
div.content a:active.on {color:#1fb5da; text-decoration:none; } /* selected link */

div.content a:link.over {color:#1fb5da; text-decoration:none; } /* unvisited link */
div.content a:visited.over {color:#1fb5da; text-decoration:none; } /* visited link */
div.content a:hover.over {color:#1fb5da; text-decoration:none; } /* mouse over link */
div.content a:active.over {color:#1fb5da; text-decoration:none; } /* selected link */
	
div.content .on{
	color:#1fb5da;
	}
	
div.content .over{
	color: #1fb5da;
	}		
	
#mapa_listowanie{
	float:left;
	position:relative;
	width:100%;
	margin-bottom:5px;
}
.mapa{
	margin-top:5px;
	float:left;
	font-size:12px;
}
#menu{
	float:left;
	position:relative;
	padding-right:10px;
	/*margin-left:15px;*/
	clear:left;
	width:211px;
}

#filter{
	font-size:10px;
	background-color:#e3e3e3;
	padding: 2px 0px 2px 4px;
}

#right_content_page{
	width: 750px;
	float:right;
	margin-left:10px;
	margin-right:12px;
	position:relative;
}	

#wrapper {
	width: 190px;
	margin-top:15px;
	margin-left: 20px;
	margin-right: auto;
	font-weight:bold;
	font-size:14px;
	}

.accordionButton {	
	width: 190px;
	float: left;
	_float: none;  /* Float works in all browsers but IE6 */
	/*background: #003366;*/
	border-bottom: 1px dashed black;
	cursor: pointer;
	
	}
.accordionButtonLink {	
	width: 190px;
	float: left;
	_float: none;  /* Float works in all browsers but IE6 */
	/*background: #003366;*/
	border-bottom: 1px dashed black;
	cursor: pointer;
	}	
div.content .accordionButtonLink a{
	text-decoration:none;
	color:#000;
}
div.content .accordionButtonLink a:hover{
	text-decoration:none;
	color:#1fb5da;
}	
div.accordionContentMenu a.submenu_inactive{
	color: black; 
	text-decoration: none; 
	}
	
div.accordionContentMenu a.submenu_active{
	color: #1fb5da; 
	text-decoration: none; 
	}

.accordionContentMenu {	
	font-weight:normal;
	width: 170px;
	margin-left:20px;
	float: left;
	_float: none; /* Float works in all browsers but IE6 */
	/*background: #95B1CE;*/
	}
.on {
	/*background: #990000;*/
	color:#1fb5da;
	}
	
.over {
	color: #1fb5da;
	/*background: #CCCCCC;*/
	}
#right_content_page #customForm .button{
	color: #FFF;
	background-color: #CCC;
	font-size:12px;
	font-weight:normal;
	text-decoration: none;	
}
#right_content_page #customForm .button:hover{
	color: #000;
	background-color: #F99D31;
	text-shadow:none;
	text-decoration: none;	
	font-size:12px;
	font-weight:normal;
}
</style>




<div class="hfeed content">
<div id="main_contetn">
<?php

if ( is_user_logged_in() ) {

function getUserData($data, $user_id)
{
	$connection = dbConnect();
	$result = mysql_query("SELECT * FROM s_dane_kontaktowe WHERE id_uzytkownik = '$user_id'")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($result))
		{
			echo $row[$data];
		}
	}
	dbDisconnect($connection);
} 
 
function dbConnect() {
	$connection = @mysql_connect('localhost','root','');
	if (!$connection) {
		die('Could not connect: ' . mysql_error());
	}
	$db = @mysql_select_db('bollo_naopak', $connection);
	mysql_set_charset('utf8',$connection); 
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	mysql_query('set names utf8;');
	return $connection;
}

function dbDisconnect($connection) {
	mysql_close($connection);
}
 
?>

<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/reg/general.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/css/user_account_style.css" type="text/css" />

<div id="mapa_listowanie">
	<div class="mapa">jesteś tutaj: <?php echo $_SERVER['REQUEST_URI']; ?></div>
</div>
<? 
global $current_user;
get_currentuserinfo();
$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);

include "menu.php"; 

?>

<div id="right_content_page" >
<?
$userId = $current_user->ID;
if (isset($_POST['submit'])) {
	$imie = $_POST["name1"];
	$nazwisko = $_POST["surname"];
	$adres = $_POST["address"];
	$miejscowosc = $_POST["city"];
	$telefon = $_POST["phone"];
	$firma = $_POST["company"];
	$kraj = $_POST["country"];
	$connection = dbConnect();
	$result = mysql_query( "UPDATE s_dane_kontaktowe SET imie = '$imie', nazwisko = '$nazwisko', adres = '$adres', miejscowosc = '$miejscowosc', telefon = '$telefon', firma = '$firma', kraj = '$kraj' WHERE id_uzytkownik = '$userId';")
	or die(mysql_error());    
	dbDisconnect($connection);
}
?>
	<form id="customForm" action="<?php the_permalink(); ?>" method="post">
    <p id="formh4">Dane adresowe:</p>
     <div class="leftForm">
        <label for="name1">Imię:</label><input id="name1" type="text" name="name1"  value="<?php getUserData('imie', $userId); ?>"/>
        <br />
        <span id="name1Info"></span>
     </div>
    <div>
        <label for="surname">Nazwisko:</label><input id="surname" type="text" name="surname"  value="<?php getUserData('nazwisko', $userId); ?>"/>
        <br />
        <span id="surnameInfo"></span>
    </div>
    <div class="formclear"></div>
     <div class="leftForm">
        <label for="company">Nazwa firmy (opcjonalnie):</label><input id="company" type="text" name="company"  value="<?php getUserData('firma', $userId); ?>"/>
    </div>
    <div>
        <label for="phone">Numer telefonu (opcjonalnie):</label><input id="phone" type="text" name="phone"  value="<?php getUserData('telefon', $userId); ?>"/>
    </div>
    <br />
    <div class="formclear"></div>
    <div>
        <label for="address">Adres (ulica, nr mieszkania, kod)</label><input id="address" type="text" name="address"  value="<?php getUserData('adres', $userId); ?>"/>
        <br />
         <span id="addressInfo"></span>
    </div>
    <div class="leftForm">
        <label for="city">Miasto:</label><input id="city" type="text" name="city"  value="<?php getUserData('miejscowosc', $userId); ?>"/>
        <br />
         <span id="cityInfo"></span>
        </div>
    <div style="margin-top:3px;">
        <label for="country">Państwo:</label>
        <select name="country" size="1" id="country" style="width:165px; font-size:11px; margin-top:-1px"><option value="Polska" >Polska</option><option value="Afganistan" >Afganistan</option><option value="Albania" >Albania</option><option value="Algieria" >Algieria</option><option value="Andora" >Andora</option><option value="Angola" >Angola</option><option value="Anguilla" >Anguilla</option><option value="Antigua i Barbuda" >Antigua i Barbuda</option><option value="Antyle Holenderskie" >Antyle Holenderskie</option><option value="Arabia Saudyjska" >Arabia Saudyjska</option><option value="Argentyna" >Argentyna</option><option value="Armenia" >Armenia</option><option value="Aruba" >Aruba</option><option value="Australia" >Australia</option><option value="Austria" >Austria</option><option value="Azerbejdżan" >Azerbejdżan</option><option value="Bahamy" >Bahamy</option><option value="Bahrajn" >Bahrajn</option><option value="Bangladesz" >Bangladesz</option><option value="Barbados" >Barbados</option><option value="Belgia" >Belgia</option><option value="Belize" >Belize</option><option value="Bermuda" >Bermuda</option><option value="Bhutan" >Bhutan</option><option value="Białoruś" >Białoruś</option><option value="Boliwia" >Boliwia</option><option value="Bośnia i Hercegowina" >Bośnia i Hercegowina</option><option value="Botswana" >Botswana</option><option value="Brazylia" >Brazylia</option><option value="Brunei" >Brunei</option><option value="Brytyjskie Terytorium Oceanu Indyjskiego" >Brytyjskie Terytorium Oceanu Indyjskiego</option><option value="Bułgaria" >Bułgaria</option><option value="Burkina Faso" >Burkina Faso</option><option value="Burundi" >Burundi</option><option value="Chile" >Chile</option><option value="Chiny" >Chiny</option><option value="Chorwacja" >Chorwacja</option><option value="Cypr" >Cypr</option><option value="Czad" >Czad</option><option value="Czarnogóra" >Czarnogóra</option><option value="Czechy" >Czechy</option><option value="Dania" >Dania</option><option value="Dominika" >Dominika</option><option value="Dominikana" >Dominikana</option><option value="Dżibuti" >Dżibuti</option><option value="Ekwador" >Ekwador</option><option value="Egipt" >Egipt</option><option value="Erytrea" >Erytrea</option><option value="Estonia" >Estonia</option><option value="Etiopia" >Etiopia</option><option value="Falklandy" >Falklandy</option><option value="Fidżi" >Fidżi</option><option value="Filipiny" >Filipiny</option><option value="Finlandia" >Finlandia</option><option value="Francja" >Francja</option><option value="Gabon" >Gabon</option><option value="Gambia" >Gambia</option><option value="Georgia Południowa i Sandwich Południowy" >Georgia Południowa i Sandwich Południowy</option><option value="Ghana" >Ghana</option><option value="Gibraltar" >Gibraltar</option><option value="Grecja" >Grecja</option><option value="Greenlandia" >Greenlandia</option><option value="Grenada" >Grenada</option><option value="Gruzja" >Gruzja</option><option value="Guam" >Guam</option><option value="Guernsey" >Guernsey</option><option value="Guinea-Bissau" >Guinea-Bissau</option><option value="Gujana Francuska" >Gujana Francuska</option><option value="Guyana" >Guyana</option><option value="Gwadelupa" >Gwadelupa</option><option value="Gwatemala" >Gwatemala</option><option value="Gwinea" >Gwinea</option><option value="Gwinea Równikowa" >Gwinea Równikowa</option><option value="Haiti" >Haiti</option><option value="Hiszpania" >Hiszpania</option><option value="Holandia" >Holandia</option><option value="Honduras" >Honduras</option><option value="Hongkong" >Hongkong</option><option value="Hungary" >Hungary</option><option value="Indie" >Indie</option><option value="Indonezja" >Indonezja</option><option value="Iran" >Iran</option><option value="Irak" >Irak</option><option value="Irlandia" >Irlandia</option><option value="Islandia" >Islandia</option><option value="Izrael" >Izrael</option><option value="Jamajka" >Jamajka</option><option value="Japonia" >Japonia</option><option value="Jemen" >Jemen</option><option value="Jersey" >Jersey</option><option value="Jordania" >Jordania</option><option value="Kajmany" >Kajmany</option><option value="Kambodża" >Kambodża</option><option value="Kamerun" >Kamerun</option><option value="Kanada" >Kanada</option><option value="Katar" >Katar</option><option value="Kazachstan" >Kazachstan</option><option value="Kenia" >Kenia</option><option value="Kiribati" >Kiribati</option><option value="Kolumbia" >Kolumbia</option><option value="Komory" >Komory</option><option value="Kongo" >Kongo</option><option value="Korea Północna" >Korea Północna</option><option value="Korea Południowa" >Korea Południowa</option><option value="Kostaryka" >Kostaryka</option><option value="Kuba" >Kuba</option><option value="Kuwejt" >Kuwejt</option><option value="Kirgistan" >Kirgistan</option><option value="Laos" >Laos</option><option value="Łotwa" >Łotwa</option><option value="Liban" >Liban</option><option value="Lesotho" >Lesotho</option><option value="Liberia" >Liberia</option><option value="Libia" >Libia</option><option value="Liechtenstein" >Liechtenstein</option><option value="Lithwa" >Lithwa</option><option value="Luksemburg" >Luksemburg</option><option value="Makau" >Makau</option><option value="Macedonia" >Macedonia</option><option value="Madagaskar" >Madagaskar</option><option value="Malawi" >Malawi</option><option value="Malediwy" >Malediwy</option><option value="Malezja" >Malezja</option><option value="Mali" >Mali</option><option value="Malta" >Malta</option><option value="Mariany Północne" >Mariany Północne</option><option value="Martynika" >Martynika</option><option value="Mauretania" >Mauretania</option><option value="Mauritius" >Mauritius</option><option value="Majotta" >Majotta</option><option value="Meksyk" >Meksyk</option><option value="Mikronezja" >Mikronezja</option><option value="Mołdawia" >Mołdawia</option><option value="Monako" >Monako</option><option value="Mongolia" >Mongolia</option><option value="Montserrat" >Montserrat</option><option value="Maroko" >Maroko</option><option value="Mozambik" >Mozambik</option><option value="Myanmar (Birma)" >Myanmar (Birma)</option><option value="Namibia" >Namibia</option><option value="Nauru" >Nauru</option><option value="Nepal" >Nepal</option><option value="Nowa Zelandia" >Nowa Zelandia</option><option value="Niemcy" >Niemcy</option><option value="Niger" >Niger</option><option value="Nigeria" >Nigeria</option><option value="Nikaragua" >Nikaragua</option><option value="Niue" >Niue</option><option value="Norfolk" >Norfolk</option><option value="Norwegia" >Norwegia</option><option value="Nowa Kaledonia" >Nowa Kaledonia</option><option value="Oman" >Oman</option><option value="Pakistan" >Pakistan</option><option value="Palau" >Palau</option><option value="Panama" >Panama</option><option value="Papua-Nowa Gwinea" >Papua-Nowa Gwinea</option><option value="Paragwaj" >Paragwaj</option><option value="Peru" >Peru</option><option value="Portoryko" >Portoryko</option><option value="Portugalia" >Portugalia</option><option value="Republika Środkowoafrykańska" >Republika Środkowoafrykańska</option><option value="Republika Zielonego Przylądka" >Republika Zielonego Przylądka</option><option value="Reunion" >Reunion</option><option value="Rumunia" >Rumunia</option><option value="Rosja" >Rosja</option><option value="RPA" >RPA</option><option value="Rwanda" >Rwanda</option><option value="Sahara Zachodnia" >Sahara Zachodnia</option><option value="Saint Kitts i Nevis" >Saint Kitts i Nevis</option><option value="Saint Lucia" >Saint Lucia</option><option value="Saint-Pierre i Miquelon" >Saint-Pierre i Miquelon</option><option value="Saint Vincent i Grenadyny" >Saint Vincent i Grenadyny</option><option value="Salvador" >Salvador</option><option value="Samoa" >Samoa</option><option value="Samoa Amerykańskie" >Samoa Amerykańskie</option><option value="San Marino" >San Marino</option><option value="Senegal" >Senegal</option><option value="Serbia" >Serbia</option><option value="Seszele" >Seszele</option><option value="Sierra Leone" >Sierra Leone</option><option value="Singapur" >Singapur</option><option value="Słowacja" >Słowacja</option><option value="Słowenia" >Słowenia</option><option value="Somalia" >Somalia</option><option value="Sri Lanka" >Sri Lanka</option><option value="State of the Vatican City" >State of the Vatican City</option><option value="Sudan" >Sudan</option><option value="Surinam" >Surinam</option><option value="Szwajcaria" >Szwajcaria</option><option value="Szwecja" >Szwecja</option><option value="Święta Helena" >Święta Helena</option><option value="Switzerland" >Switzerland</option><option value="Syria" >Syria</option><option value="Tadżykistan" >Tadżykistan</option><option value="Tajlandia" >Tajlandia</option><option value="Tajwan" >Tajwan</option><option value="Tanzania" >Tanzania</option><option value="Timor Zachodni" >Timor Zachodni</option><option value="Togo" >Togo</option><option value="Tokelau" >Tokelau</option><option value="Tonga" >Tonga</option><option value="Tunezja" >Tunezja</option><option value="Turcja" >Turcja</option><option value="Turkmenistan" >Turkmenistan</option><option value="Turks i Caicos" >Turks i Caicos</option><option value="Tuvalu" >Tuvalu</option><option value="Trynidad i Tobago" >Trynidad i Tobago</option><option value="Uganda" >Uganda</option><option value="Ukraina" >Ukraina</option><option value="Urugwaj" >Urugwaj</option><option value="Uzbekistan" >Uzbekistan</option><option value="USA" >USA</option><option value="Vanuatu" >Vanuatu</option><option value="Venezuela" >Venezuela</option><option value="Wietnam" >Wietnam</option><option value="Wallis i Futuna" >Wallis i Futuna</option><option value="Wielka Brytania" >Wielka Brytania</option><option value="Włochy" >Włochy</option><option value="Wybrzeże Kości Słoniowej" >Wybrzeże Kości Słoniowej</option><option value="Wyspy Alandzkie" >Wyspy Alandzkie</option><option value="Wyspa Bouveta" >Wyspa Bouveta</option><option value="Wyspa Bożego Narodzenia" >Wyspa Bożego Narodzenia</option><option value="Wyspy Cooka" >Wyspy Cooka</option><option value="Wyspy Dziewicze (Brytyjskie)" >Wyspy Dziewicze (Brytyjskie)</option><option value="Wyspy Dziewicze (Stanów Zjednoczonych)" >Wyspy Dziewicze (Stanów Zjednoczonych)</option><option value="Wyspy Kokosowe" >Wyspy Kokosowe</option><option value="Wyspa Man" >Wyspa Man</option><option value="Wyspy Marshalla" >Wyspy Marshalla</option><option value="Wyspy Owcze" >Wyspy Owcze</option><option value="Wyspy Pitcairn" >Wyspy Pitcairn</option><option value="Wyspy Salomona" >Wyspy Salomona</option><option value="Wyspy Świętego Tomasza i Książęca" >Wyspy Świętego Tomasza i Książęca</option><option value="Zair" >Zair</option><option value="Zambia" >Zambia</option><option value="Zimbabwe" >Zimbabwe</option><option value="Zjednoczone Emiraty Arabskie" >Zjednoczone Emiraty Arabskie</option></select>  
    </div>
    <div class="formclear"></div>
    <div>
	<input id="submit" type="submit" name="submit" value="Aktualizuj dane" style="width:115px;" class="button" /> <input id="send" type="reset" name="anuluj" value="Anuluj" style="width:115px;"  class="button" />
</div>
	</form>

<script type="text/javascript"> 
$(document).ready(function() {
    $("#country option[value='<?php getUserData('kraj', $userId); ?>']").attr('selected', 'selected');
});
</script>
 


<?php
} else {
    echo  '<script>location.href = "' . site_url() . '/"</script>';
}

?>

 <div class="echo"> 
 <?php
if (isset($_POST['submit'])) {
	echo 'Zmiany zostały zapisane.';
}

?>
</div>


</div> <?php // closeing <div class="main_content"> ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>