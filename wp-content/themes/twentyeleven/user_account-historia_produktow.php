<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: User Account - historia zamowien
 
 */	

 
// global $wpdb;
session_start();

function add_scripts()
{
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/table_style.css"/>';

	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/jquery.tablesorter.js"></script>';
	
echo "
<script type=\"text/javascript\">
jQuery(document).ready(function(){	

	jQuery.tablesorter.defaults.widgets = ['zebra'];   	
	jQuery('#myTable').tablesorter();
	

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
	width: 650px;
	float:right;
	margin-left:10px;
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

<? if ( is_user_logged_in() ) { ?>
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
<p>historia zamówień:</p>
<?

    global $current_user;
	$wpdb = new wpdb('root', '', 'bollo_naopak', 'localhost');

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

	$lista="";
	$query_historia = "SELECT s_zamowienie.id, s_zamowienie.data AS data_zamowienia, s_status_zamowienia.nazwa, h1.data AS data_aktualizacji, SUM( s_produkt.cena ) AS wartosc
FROM s_historia h1
INNER JOIN s_zamowienie ON h1.id_zamowienia = s_zamowienie.id
INNER JOIN s_status_zamowienia ON h1.id_status = s_status_zamowienia.id
INNER JOIN s_zamowione_produkty ON s_zamowione_produkty.id_zamowienia = s_zamowienie.id
INNER JOIN s_produkt ON s_zamowione_produkty.id_produkt = s_produkt.id
WHERE h1.data = ( 
SELECT MAX( data ) 
FROM s_historia h2
WHERE h1.id_zamowienia = h2.id_zamowienia ) 
AND s_zamowienie.id_klient = ".$current_user->ID." 
GROUP BY s_zamowienie.id
LIMIT 0 , 30";

	$sql_results = $wpdb->get_results($query_historia, ARRAY_N);
	
	$lista = '<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
<thead> 
<tr>
	<th class=\'{sorter: false}\'>Zamówienie numer</th>
	<th>Zamówienie złożono</th>
	<th>Status zamówienia</th>
	<th>Data aktualizacji</th>
	<th>Wartość zamówienia</th>
	<th></th>
</tr>
</thead>
<tbody>';

	$id_zam="";
	$data_zam="";
	$status="";
	$data_aktualizacji="";
	$wartosc=""; 
		
	foreach ( $sql_results as $row )
	{ 	
	  $id_zam=$row[0];
	  $data_zam=$row[1];
	  $status=$row[2];
	  $data_aktualizacji=$row[3];
	  $wartosc=$row[4]; 
	  $wartosc = number_format($wartosc, 2, ",", " ");	
	 // $lista .= "<tr>";
	  
		$lista .= "<tr>
		<td>$id_zam</td>
		<td>$data_zam</td>
		<td>$status</td>
		<td>$data_aktualizacji</td>
		<td>$wartosc zł</td>
		<td><a href=\"http://naopak.com.pl/szczegoly-zamowienia?id_zam=".$id_zam."\" >szczegóły</a>	
		</td>
		</tr>";

		//$lista .= "</tr>";
	
	}

	$lista .= "</tbody></table>";

	echo $lista;	
?>
</div>  <?php // closeing <div class="lista produktow"> ?>
</div> <?php  // closeing <div class="main_content"> ?>
<? 
}else
{
	// redirect do strony logowania
	
	echo "<p>Najpierw się zaloguj !</p>";	
}
 ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>