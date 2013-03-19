<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: reg-producent
 
 */	
 

// global $wpdb;
session_start();

function ProducentnameExists($name)
{
	$connection = dbConnect();
	$result = mysql_query( "SELECT nazwa FROM s_producenci WHERE nazwa ='$name'")
	or die(mysql_error()); 
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{
		return true;
	}
	else
	{
		return false;	
	}
	dbDisconnect($connection);
}
 
function dbConnect() {
	$connection = @mysql_connect('localhost', 'root', '');
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

function add_scripts()
{

echo "<link href=\"".get_bloginfo('template_url')."/reg/general.css\" rel=\"stylesheet\" type=\"text/css\"/>";

echo "
<script type=\"text/javascript\">
jQuery(document).ready(function(){	


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
	
	jQuery('.submenu_inactive').mouseenter(function() {
        jQuery(this).css({'color': '#1FB5DA'});
    })
    .mouseleave(function() {
        jQuery(this).css({'color': '#000'});
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
";

}
add_action('wp_head', 'add_scripts');


if (!is_user_logged_in() ) 
{ 
	echo  '<script>location.href = "' . site_url() . '/"</script>';
}


get_header();

?>

<style>

/* ****************** MENU *************************** */
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
	
div.accordionContent a.submenu_inactive{
	color: black; 
	text-decoration: none; 
	}
	
div.accordionContent a.submenu_active{
	color: #1fb5da; 
	text-decoration: none; 
	}

.accordionContent {	
	font-weight:normal;
	width: 170px;
	margin-left:20px;
	float: left;
	_float: none; /* Float works in all browsers but IE6 */
	/*background: #95B1CE;*/
	}
	
/***********************************************************************************************************************
 EXTRA STYLES ADDED FOR MOUSEOVER / ACTIVE EVENTS
************************************************************************************************************************/

.on {
	/*background: #990000;*/
	color:#1fb5da;
	}
	
.over {
	color: #1fb5da;
	/*background: #CCCCCC;*/
	}
/* *********************************************** */

#main_contetn{
	min-width:1000px;
	float:left;
	position:relative;
}

#menu_produktow{
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

#filtr_LB{
	font-size:10px;		
	border: 1px solid #999;
	width:80px;
	margin-left:8px;
}

#menu{
	font-size:12px;
}

#menu td{
	border-bottom:1px dashed black;	
}

#center_content{
	width: 500px;
	float:left;
	margin-left:20px;
	margin-right:12px;
	position:relative;
}

#produkt{
	border-style:solid;
	border-width:1px;
	border-color:#E9E9E9;
	padding:4px;
	margin:5px;
	background-color:#FFF;
	
}

#obraz_produktu{
	float:left;
	width:170px;
	height:170px;
}

#nazwa_produktu{
	clear:left;
	position:relative;
	font-size:13px;
	color:black;
	text-decoration: none;
}

#info_produktu{
	font-size:12px;
	clear:left;	
}

#projektant_produktu{
	display:inline;
	color:#8D8D8D;
}

#cena_produktu{
	display:inline;
	color:#1fb5da;
	position:relative;
	float:right;
	clear:none;
}

a:link {text-decoration: none; }
a:active {text-decoration: none; }
a:visited {text-decoration: none; }
a:hover {text-decoration: none; }

.produkt_lista{
/*	width:740px;*/
	width:100%;
	padding-left:10px;
	padding-right:10px;
	padding-bottom:10px;
	padding-top:10px;
	float:left;
	position:relative;
	border-bottom-style:solid;
	border-bottom-color:#CCC;
	border-bottom-width:1px;
}

.zdjecie_lista{
	float:left;
}

.info_lista{
	float:left;
}

.tytul_lista{
	float:left;
	margin-left:15px;
	font-size:13px;
}

.tytul_lista h3{
	font-weight:bold;
	font-size:14px;
}

.tytul_lista h4{
	clear:left;
	font-size:12px;
}

.dane_lista{
	float:left;
	clear:left;
	margin:15px;
	font-size:12px;
}

.opis_lista{
	float:left;
	width:450px;
}

.tagi_lista{
	float:left;
	clear:left;
	margin-top:10px;
}

.cena_lista{
	float:left;
}

div.tagi_lista a.tag_nazwa{
	color:#1fb5da;	
	text-decoration:none;
}

.border_bottom{
	border-bottom-style:solid;
	border-bottom-color:#CCC;
	border-bottom-width:1px;
	padding-top:10px;
	width:100%;
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

.b_listy{
float:right;	
margin-right:50px;
}

.galeria_lista{
	float:right;
	margin-right:7px;
	height:27px;
}


#kolor{
	float:right;
	clear:both;
	font-size:10px;		
	border: 1px solid #999;
	width:80px;
	margin-left:5px;
	margin-top:5px;
}

.tb_ceny{
	clear:both;
	float:right;	
	padding:0px;
	margin:0px;
}

.filtr_nazwa{
	font-size:10px;		
}
.filtr_nazwa{
	height:16px;
	margin-left: 10px;
	margin-right:5px;
	margin-top:1px;
	float:left;
}

.filtr_koloru, .filtr_materialu{
	float:right;
}

.filtr_listy{
	margin-top:2px;
	margin-right:30px;	
	margin-top:5px;
}

.filtr_listy, .filtr_ceny_od, .filtr_ceny_do{
	float:right;
}

div.content .cena{
	width:30px;
	height:15px;
	font-size:10px;
	background-color:#fff;
	float:right;
	padding:1px 5px 1px 5px;
	color:#FFF;
	background-color:#CCC;
	border:none;
	box-shadow:none;
}



#center_content div.pagination {
	/*padding: 3px;*/
	margin: 3px;
	border:none;
}

#center_content div.pagination a {
/*	padding: 2px 5px 2px 5px;	
	border: 1px solid #AAAADD;	
	color: #000099;*/
	border:none;
	padding:0px;
	text-decoration: none; /* no underline */
	margin: 2px;
	font-weight: 700;
	color: #FFF;
}
div.pagination a:hover, div.pagination a:active {
	border:none;
	background-color: #000;
	color: #000;
}

#center_content div.pagination span.current {
	padding: 2px 2px 2px 2px;
	background-color: #FFF;	
	border:none;
	margin: 2px;	
	font-weight: bold;
	color: #000;
}
#center_content div.pagination span.disabled {
	border:none;
	margin: 2px;
/*	border: 1px solid #EEE;	*/
	color: #000;
	padding: 2px 2px 2px 2px;
	float:left;
}
	
.no_result{
	width: 750px;
	text-align:center;
	color:#1FB5DA;
	font-size:14px;
	font-weight:bold;
	margin-top: 100px;
	margin-bottom: 50px;
}

div.content /* a:focus, div.content a:hover, div.content a:active */
a.link_all{
	text-decoration: none;
	color:#373737;	
}

div.content a:hover.link_all{
	color: #1fb5da; 
	text-decoration: none; 
}

.filtruj_btn{
	background-color:#CCC;	
	font-size:10px;
	padding:1px 10px 1px 10px;
	float:right;
	margin-left:15px;
	height:15px;
}
div.content .filtruj_btn a{
	color:#FFF;	
	text-decoration: none;
}	
	
/***************************/
div.selectBox {
    position:relative;
    display:inline-block;
    cursor:default;
    text-align:left;
    line-height:17px;
    clear:both;
    color:#FFF;
}
span.selected {
    width:63px;
    text-indent:5px;
	font-size:10px;
/*    border:1px solid #ccc;
    border-right:none;
    border-top-left-radius:5px;
    border-bottom-left-radius:5px;*/
    background:#CCC;
    overflow:hidden;
}
span.selectArrow {
    width:17px;
/*    border:1px solid #60abf8;
    border-top-right-radius:5px;
    border-bottom-right-radius:5px;*/
    text-align:center;
    font-size:12px;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -o-user-select: none;
    user-select: none;
    background:#CCC;
}
 
span.selectArrow,span.selected {
    position:relative;
    float:left;
    height:17px;
    z-index:1;
}

div.selectOptions {
    position:absolute;
    top:17px;
    left:0;
    width:80px;
/*    border:1px solid #ccc;
    border-bottom-right-radius:5px;
    border-bottom-left-radius:5px;*/
    overflow:hidden;
    background:#CCC;
    padding-top:2px;
    display:none;
	z-index:1;
}
     
span.selectOption {
	display: block;
	width: 80px;
	line-height: 17px;
	font-size:10px;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 5px;
}
 
span.selectOption:hover {
    color:#000;
    background:#f99d31;         
}           

div.content #center_content p{
	color: #000000;
	font-family: "Rezland";
	font-size: 18px;
	margin-left: 10px;
	text-decoration: none;	
	margin-bottom: 0px;
}
/**********************************************/

</style>

<?php

?> 


<div class="hfeed content">
<div id="main_contetn">
<div id="mapa_listowanie">
	<div class="mapa">jesteś tutaj: <?php echo $_SERVER['REQUEST_URI']; ?></div>


<div id="menu_produktow">
<div id="filter">Kategorie:</div>
<?php //echo $menu; ?>
	  	
        <div id="wrapper">
		<?  
		 $menu = file_get_contents(get_bloginfo('template_url').'/user_menu.php');
		 echo ($menu);
 		?>		
		</div>
        
</div>  <?php // closeing <div class="menu produktow"> ?>
<div id="center_content">
<p>Zgłoszenie Projektanta:</p>

<span class="ProdRegDesc" >Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>			
          
<div class="rejestracja">                
<div class="leftForm">
	<form id="customForm" action="<?php the_permalink(); ?>" method="post">
    <div >
        <label for="email1">Twoje imię i nazwisko</label><input id="fullname" type="text" name="fullname" /> 
        <br />
        <span id="fullnameInfo"></span>
    </div>
    <div >
        <label for="phone">Telefon kontaktowy:</label><input id="phone" type="text" name="phone" /> 
        <br />
        <span id="phoneInfo"></span>
    </div>
    <div>
        <label for="producentname">Twoja nazwa:</label><input id="producentname" type="text" name="producentname" />
        <br /> 
        <span id="producentnameInfo"></span>
    </div>
    <div>
        <label for="www">Twoja strona internetowa:</label><input id="www" type="text" name="www" /> 
        <br />
        <span id="wwwInfo"></span>
    </div>
     <div>
        <label for="about">Napisz coś o sobie i o swoich pracach:</label><textarea id="about" type="text" name="about" cols="" rows="" ></textarea>
        <br />
        <span id="aboutInfo"></span>
     </div>
     <? // DODAC WSTAWIENIE ZDJEC !!! ?>
     <div class="ProdRegZgoda">
        <input type="checkbox" name="PrzetwarzanieZgoda" class="PrzetwarzanieZgoda" checked="" style="width:10px"/>
		Wyrażam zgodę na przetwarzanie danych osobowych przez NaOpak z siedzibą w Opocznie, w celu ewidencji sprzedaży oraz realiacji zamówień, zgodnie z ustawą z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (Dz. U. z 2002 r., Nr.101, poz 926 ze zmianami).

     </div>
     
     
    <div>
	<input id="submit" type="submit" name="submit" value="Wyślij zgłoszenie" style="width:115px;" /> <input id="send" type="reset" name="anuluj" value="Anuluj" style="width:115px;" />
</div>
	</form>
<div class="echo">
<?php

if (isset($_POST['submit'])) {

	$fullname = $_POST["fullname"];
	$phone =  $_POST["phone"];
	$producentname = $_POST["producentname"];
	$www = $_POST["www"];
	$about = $_POST["about"];
	$data = current_time('mysql');
	
	if (ProducentnameExists($producentname))
	{
		echo 'Nazwa Producenta jest zajęta.';
	}
	else
	{
		global $current_user;
      	get_currentuserinfo();
		$user_id = $current_user->id;
		$email = $current_user->user_email;
		
		$result = mysql_query( "INSERT INTO s_zgloszenia(id, id_user, imie, telefon, nazwa_producenta, www, opis, data) VALUES (NULL, '$user_id', '$fullname', '$phone', '$producentname', '$www', '$about', '$data');")
		or die(mysql_error());
		
		$subject = 'NaOpak - formularz zgłoszeniowy projektanta';
		$message = 'Witamy,<br><br>';
		$message .= 'Twoje zgłoszenie zostało przyjęte, zostaniesz poinformowany o decyzji kolejnym mailem.<br><br>';
		$message .= 'Pozdrawiamy,<br><br>';
		$message .= 'zespół NaOpak.pl';
		$header_info = 'MIME-Version: 1.0' . "\r\n";
		$header_info .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$header_info .= 'From: NaOpak.pl \r\n';
		mail($email, $subject, $message, $header_info);	
		
		echo 'Formularz został wysłany, potwierdzenie zostało wysłane na twój adres e-mail.';	
	}
}
?> 
  </div>  
</div>

 </div>   

</div>  <?php // closeing <div class="center_content"> ?>
</div> <?php  // closeing <div class="main_content"> ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>