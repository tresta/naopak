<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: Lista Template
 
 
 - TO DO:
 	- zapamietanie filtra
	- przy wyborze sposobu wyswietlania pamietac filtr
	- przycisk wyczysc filtr ?
 	- poprawic wielokrotne tagi
 
 */	
 

// global $wpdb;
session_start();

function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    //strip tags, if desired
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    //no need to trim, already shorter than trim length
    if (strlen($input) <= $length) {
        return $input;
    }
  
    //find last space within length
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);
  
    //add ellipses (...)
    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}

//******************************************************************** WHERE QUERY
//********************************************************************	
// page=2&
	$where_array = Array();
	$array_index=0;
	$tmp_value='';

	$kolor = $_GET['kolor'];
	if(isset($kolor))
	{
		if($kolor != "-1")
		{
			$tmp_value = ' s_kolor.nazwa = "'.$kolor.'" ';
			array_push($where_array, $tmp_value);
		}
	}
		
	if(isset($_GET['subcat']))
	{
		$subcat_id = $_GET['subcat'];
		$tmp_value = ' t_subcategory.subID = '.$subcat_id.' ';
		array_push($where_array, $tmp_value);
	}

	
	
	if (isset($_GET['cat']))
	{ 
		$cat_id = $_GET['cat'];
		$tmp_value = ' t_subcategory.catID = '.$cat_id.' ';
		array_push($where_array, $tmp_value);
	} 
	
	$tag_typ =$_GET['typ_tagu'];
	if (isset($tag_typ))
	{ 
		$tag_name = $_GET['nazwa_tagu'];
		
		$tmp_value = ' s_'.$tag_typ.'.nazwa = \''.$tag_name.'\'';
		array_push($where_array, $tmp_value);
	} 
	
	$cena_min = $_GET['cena_min'];
	$cena_max = $_GET['cena_max'];
	if (isset($cena_min) || isset($cena_max))
	{ 
		if($cena_min != "")
		{
			$tmp_value = ' s_produkt.cena >= '.$cena_min.' ';
			array_push($where_array, $tmp_value);
		}
		if($cena_max != "")
		{
			$tmp_value = ' s_produkt.cena <= '.$cena_max.' ';
			array_push($where_array, $tmp_value);
		}
	} 
	
	$material = $_GET['material'];
	if(isset($material))
	{
		if($material != "-1")
		{
			$tmp_value = ' s_material.nazwa = "'.$material.'" ';
			array_push($where_array, $tmp_value);
		}
	}

//print_r($where_array);
//********************************************************************
//********************************************************************


?>

<?php
function add_scripts()
{
	echo '
	<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/query.js"></script>';

	echo '
	<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/jquery.selectbox-0.2.min.js"></script>';

	echo '
	<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/jquery.selectbox.css" media="screen" />';


echo"
<script type=\"text/javascript\">
jQuery(document).ready(function(){	

		jQuery('#material').selectbox();
		jQuery('#kolor').selectbox();
		
		jQuery('.filtruj_btn').hover(function(){
			jQuery('.filtruj_btn').css('background-color', '#F99D31');
			jQuery('.filtruj_btn a').css('color', '#333');
		},function(){
			jQuery('.filtruj_btn').css('background-color', '#CCC');
			jQuery('.filtruj_btn a').css('color', '#FFF');
		});

        jQuery.extend({
            getParamValue: function (paramName) {
 
                parName = paramName.replace(/[\[]/, '\\\[').replace(/[\]]/, '\\\]');
                var pattern = '[\\?&]' + paramName + '=([^&#]*)';
                var regex = new RegExp(pattern);
                var matches = regex.exec(window.location.href);
                if (matches == null) return '';
                else return decodeURIComponent(matches[1].replace(/\+/g, ' '));
            }
        });
            
	//*******************************
	/*

   jQuery('.submenu_group').each(function(){
		var div = jQuery(this).find('.submenu_active').length;		
		if(div==0)
		{
			jQuery(this).hide();
		}
	});
		
	jQuery('.menu > dt').click(function() {
		
		var div = jQuery('.submenu_group').find('.submenu_active').parent();		
		jQuery(div).slideUp(300);
		jQuery(div).removeClass('selected');
		
				
		jQuery(this).next('.submenu_group').slideDown(300); // zamyka aktualna liste
		jQuery(this).addClass('submenu_active');

        return false;
    });
	*/
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
	
	jQuery('#filtruj').click(function() {

		var tag_exist=0;	
		var subcat_exist=0;
		var pathname = document.URL;
		var org_pathname = pathname;
		
		var url_check = pathname.indexOf('?'); 
		if ( url_check == -1 ) 
		{
			tag_exist=0;
		}
		else
		{
			tag_exist=1;
		}
			/*
		var url_check = pathname.indexOf('subcat='); 
		if ( url_check == -1 ) 
		{
			subcat_exist=0;
		}
		else
		{
			subcat_exist=1;
		}
*/
		var cena_min = jQuery('input[name=\"cena_min\"]').val();
		var cena_max = jQuery('input[name=\"cena_max\"]').val();		
		var material = jQuery('#material').val();	
		var kolor = jQuery('#kolor').val();
        	

		var url_check = pathname.indexOf('cena_min='); 
		if ( url_check == -1 )  
		{	
			if(cena_min !== undefined && cena_min !== '')
			{			
				if(tag_exist == 1)
				{
					pathname += '&cena_min='+cena_min;	// jezeli jest wiecej niz jeden tag
				}
				else
				{
					pathname += '?cena_min='+cena_min;	// jezeli jest tylko jeden tag
					tag_exist=1;
				}
			}
		}
		else
		{
			pathname = jQuery.param.querystring( pathname, 'cena_min='+cena_min );
		}
		
		
		
		var url_check = pathname.indexOf('cena_max='); 
		if ( url_check == -1 ) 
		{	
			if(cena_max !== undefined && cena_max !== '')
			{			
				if(tag_exist == 1)
				{
					pathname += '&cena_max='+cena_max;	// jezeli jest wiecej niz jeden tag
				}
				else
				{
					pathname += '?cena_max='+cena_max;	// jezeli jest tylko jeden tag
					tag_exist=1;
				}
			}
		}
		else
		{
			pathname = jQuery.param.querystring( pathname, 'cena_max='+cena_max );
		}
		
		var url_check = pathname.indexOf('kolor='); 
		if ( url_check == -1 ) 
		{			
				if(tag_exist == 1)
				{
					pathname += '&kolor='+kolor;	// jezeli jest wiecej niz jeden tag
				}
				else
				{
					pathname += '?kolor='+kolor;	// jezeli jest tylko jeden tag
					tag_exist=1;
				}
		}		
		else
		{	
			pathname = jQuery.param.querystring( pathname, 'kolor='+kolor );
		}
		
		var url_check = pathname.indexOf('material='); 
		if ( url_check == -1 ) 
		{			
				if(tag_exist == 1)
				{
					pathname += '&material='+material;	// jezeli jest wiecej niz jeden tag
				}
				else
				{
					pathname += '?material='+material;	// jezeli jest tylko jeden tag
					tag_exist=1;
				}			
		}
		else
		{		
			pathname = jQuery.param.querystring( pathname, 'material='+material );			
		}		
		
		url_check = pathname.indexOf('page=');
		if(url_check > -1)
		{
			//alert('pathname: '+pathname);
			//pathname = pathname.replace('page=','');
			pathname = pathname.replace(/(page=)(.*?)(&)+/g, '');

		}
		
		//alert('new pathname: '+pathname);
		
		if(pathname != org_pathname)
			location.href = pathname;
	});
}); // ******************************** END OF jQuery(document).ready

function enableSelectBoxes(){
    $('div.selectBox').each(function(){
        $(this).children('span.selected').html($(this).children('div.selectOptions').children('span.selectOption:first').html());
		$(this).attr('value',$(this).children('div.selectOptions').children('span.selectOption:first').attr('value'));
		
		$(this).children('span.selected,span.selectArrow').click(function(){
			if($(this).parent().children('div.selectOptions').css('display') == 'none'){
				$(this).parent().children('div.selectOptions').css('display','block');
			}
			else
			{
				$(this).parent().children('div.selectOptions').css('display','none');
			}
		});
		
		$(this).find('span.selectOption').click(function(){
			$(this).parent().css('display','none');
			$(this).closest('div.selectBox').attr('value',$(this).attr('value'));
			$(this).parent().siblings('span.selected').html($(this).html());
		});	
    });
}

</script>";


}
add_action('wp_head', 'add_scripts');

get_header();

	if(isset($_GET['show']))
	{
		$show = $_GET['show'];
		$_SESSION["show_method"] = $show;
	}
	else
	{
		if(isset($_SESSION["show_method"]))
		{
			$show = $_SESSION["show_method"];
		}
	}
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

#lista_produktow{
	width: 750px;
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
	font-size: 18px;
	font-weight: 700;
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



#lista_produktow div.pagination {
	/*padding: 3px;*/
	margin: 3px;
	border:none;
}

#lista_produktow div.pagination a {
	border:none;
	padding:3px 2px 2px 2px;
	text-decoration: none; /* no underline */
	margin: 2px;
	font-weight: 700;
	color: #000;
}

#lista_produktow div.pagination img {
	padding: 2px;
	margin: 2px;
}

div.pagination a:hover, div.pagination a:active {
	border:none;
	background-color: #FFF;
	color: #000;
	font-weight: bold;
}

#lista_produktow div.pagination span.current {
	padding: 3px 2px 2px 2px;
	background-color: #FFF;	
	border:none;
	margin: 2px;	
	font-weight: bold;
	color:#F90;
}
#lista_produktow div.pagination span.disabled {
	border:none;
	margin: 2px;
/*	border: 1px solid #EEE;	*/
	color: #000;
	padding: 3px 2px 2px 2px;
	float:left;
	font-weight: 700;
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

/**********************************************/



</style>

<?php

	//global $wpdb;


// ************************************* PRINT GALLERY
	//$sql_tagi = $wpdb->get_results("SHOW COLUMNS FROM `s_tag`", ARRAY_N);
	//$number = $wpdb->num_rows;

	$connection = mysql_connect('localhost', 'root', '');
    $db = mysql_select_db('bollo_naopak', $connection);
	mysql_set_charset('utf8',$connection); 
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	mysql_query('set names utf8;');
	
	$query = "SHOW COLUMNS FROM `s_tag`";
	$sql_tagi = mysql_query($query);
	$number = mysql_num_rows($sql_tagi);	
	//while($row = mysql_fetch_array($result))	
	//{ 
	//}

	$query_lista_g="SELECT s_produkt.prod_id, s_produkt.nazwa AS nazwa_produktu, s_produkt.cena, s_produkt.opis, s_produkt.data_dodania, s_producenci.nazwa AS producent, t_subcategory.nazwa AS sub_nazwa, t_subcategory.catID, ";
	
	$x=0;
	//foreach ( $sql_tagi as $s )
	while($s = mysql_fetch_array($sql_tagi))	
	{
		if($x>0)
		{		
			$nazwa_tagu = substr_replace($s[0], "", 0, 3);
			if($x < $number-1)
			{
				$query_lista_g .= "s_".$nazwa_tagu.".nazwa AS ".$nazwa_tagu.", "; 
			}
			else
			{
				$query_lista_g .= "s_".$nazwa_tagu.".nazwa AS ".$nazwa_tagu." ";
			}

		}
		$x++;
	}
	
	$query_lista_g .= ' , s_produkt.dostepnosc FROM (';
	
	for($i = 0; $i < $x; $i++)
	{
		$query_lista_g .= '(';
	}
	
	$query_lista_g .= ' s_produkt INNER JOIN s_tag ON s_produkt.id_tag = s_tag.id )';
	
	$x=0;
	mysql_data_seek($sql_tagi,0);
	//foreach ( $sql_tagi as $s )
	while($s = mysql_fetch_array($sql_tagi))
	{
		if($x>0)
		{		
			$nazwa_tagu = substr_replace($s[0], "", 0, 3);
			$query_lista_g .= " INNER JOIN s_".$nazwa_tagu." ON s_tag.id_".$nazwa_tagu." = s_".$nazwa_tagu.".id) "; 
		}
		$x++;
	} 
	
	if(!empty($where_array))
	{
		$where_query = "WHERE s_produkt.dostepnosc = 1 AND ";
///		$where_query_count = "WHERE dostepnosc = 1 AND "
		$xxx = 0;
		
		foreach($where_array as $w)
		{
			if($xxx == 0)
			{
				$where_query .= $w;	
				$xxx = 1;
			}
			else
			{
				$where_query .= " AND".$w;	
			}
		}
	}
	else
	{
		$where_query = "WHERE s_produkt.dostepnosc = 1 ";
	}
	
	$query_lista_g .= ' LEFT JOIN s_producenci ON s_produkt.id_projektant = s_producenci.id) LEFT JOIN t_subcategory ON s_produkt.id_kategoria = t_subcategory.subID '.$where_query.' ORDER BY s_produkt.data_dodania DESC';

//echo $query_lista_g;

// *************************************** MENU

	$query_menu = "SELECT t_category.id, t_category.nazwa AS cat_nazwa, t_subcategory.subID, t_subcategory.nazwa AS sub_nazwa, t_subcategory.catID FROM t_category LEFT JOIN t_subcategory ON t_category.id = t_subcategory.catID ORDER BY `t_category`.`id` ASC LIMIT 0 , 30";
	
	//$sql_menu_results = $wpdb->get_results($query_menu, ARRAY_N);
	
	$sql_menu = mysql_query($query_menu);
      $menu=""; 
	  $poprzednia_nazwa_kategorii = "";
	  $x=0;
	  $subkat = $subcat_id;

	  $link = get_permalink(). "?" .http_build_query($_GET);
	  $menu .= '<div id="wrapper">'; 
	  
	 // foreach($sql_menu_results as $s)
	  while($s = mysql_fetch_array($sql_menu))		
	  {
		 	$aktualna_nazwa_kategorii = $s[1];
		 
		 	if($aktualna_nazwa_kategorii != $poprzednia_nazwa_kategorii)
			{
				if($x>0)
				{
					$menu .= '</div>';
					$x=0;
				}
				
				//echo "<br /> --- ".$s[0]." --- ".$s[1]." --- ".$s[2]." --- ".$s[3]."<br />";
				
				if($cat_id===$s[0])
				{
					 
					$menu .= '<div class="accordionButton on">'.$aktualna_nazwa_kategorii.'</div>';
					if($s[3] != "")
					{			
						//echo "<br />asdasdasdasdasdasd";
						$menu .= '<div class="accordionContent cat_selected" style="display: block">';	
					}
				}
				else
				{
					$menu .= '<div class="accordionButton">'.$aktualna_nazwa_kategorii.'</div>';
					if($s[3] != "")
					{			
						$menu .= '<div class="accordionContent">';	
					}
				}
				
				$poprzednia_nazwa_kategorii = $aktualna_nazwa_kategorii;							
			}

			$adres = 'http://naopak.com.pl/lista';
 
			if($s[3] != "")
			{
				
				if($subkat == $s[2])
				{
					$link = $adres.'?subcat='.$s[2];
					$menu .= '<a  class="submenu_active" href="'.$link.'" id="sub_'.$s[2].'">'.$s[3].'</a><br>';
				}
				else
				{
					$link = $adres.'?subcat='.$s[2];
					$menu .= '<a class="submenu_inactive" href="'.$link.'" id="sub_'.$s[2].'">'.$s[3].'</a><br>';	
				}
				
				$x++;	
			}					
	  }
	  
  		$menu .= '<div class="accordionButton">
		<a class="link_all" href="http://naopak.com.pl/lista" >wszystkie</a>
		</div></div>';  

// ***************************************** MENU END

	unset($_GET['show']);
	
	$a = http_build_query($_GET);
	
	if(empty($a))
	{
		$adres = get_permalink();	
	}
	else
	{
		$adres = get_permalink()."?" .http_build_query($_GET);
	}
	
	parse_str($adres);


	$query_kolor="SELECT nazwa FROM s_kolor";
	//$sql_tagi = $wpdb->get_results($query_kolor, ARRAY_N);
 	$sql_kolor = mysql_query($query_kolor);
 
	//foreach ( $sql_tagi as $s )
	while($s = mysql_fetch_array($sql_kolor))
	{
		if($kolor === $s[0])
		{
			$kolory_filtr .= "<option selected=\"selected\" value=\"$s[0]\">$s[0]</option>";
		}
		else
		{
			$kolory_filtr .= "<option value=\"$s[0]\">$s[0]</option>";
		}
	}


		$query_material="SELECT nazwa FROM s_material";
		//$sql_tagi = $wpdb->get_results($query_material, ARRAY_N);
		$sql_mat = mysql_query($query_material);
		//foreach ( $sql_tagi as $s )
		while($s = mysql_fetch_array($sql_mat))		
		{
			if($material === $s[0])
			{
				$material_filtr .= "<option selected=\"selected\" value=\"$s[0]\">$s[0]</option>";
				$material_filtr2 .= "<span class=\"selectOption\" selected=\"selected\" value=\"$s[0]\">$s[0]</span>";
			}
			else
			{
				$material_filtr .= "<option value=\"$s[0]\">$s[0]</option>";
				$material_filtr2 .= "<span class=\"selectOption\" value=\"$s[0]\">$s[0]</span>";
			}
		}
?> 


<div class="hfeed content">
<div id="main_contetn">
<div id="mapa_listowanie">
    <div class="galeria_lista">    
    <a href="
	<?php 
	if(strpos($adres, '?')) 
	{ // ? jest w linku
		$link = $adres . "&show=0";
	}
	else // ? nie ma w linku
	{
		$link = $adres . "?show=0";
	}

	echo $link;
	?>">
    <img src="http://naopak.com.pl/img/galeria.png" width="27" height="27" alt="galeria" />
    </a>
    <a href="
    <?php 
	if(strpos($adres, '?')) 
	{ // ? jest w linku
		$link = $adres . "&show=1";
	}
	else // ? nie ma w linku
	{
		$link = $adres . "?show=1";
	}
	echo $link;
	?>
    ">
    <img src="http://naopak.com.pl/img/lista.png" width="27" height="27" alt="lista" />
    </a>
	</div>
    	<div class="filtr_listy">
        
   <form action="<?php the_permalink(); ?>" id="customForm" method="get" enctype="text/plain" >
   
    <span class="filtruj_btn">
		<a id="filtruj" href="#" >filtruj</a>

    </span>
 
    <span class="filtr_ceny_do"> 
    <span class="filtr_nazwa">do:</span>
    <input name="cena_max" class="cena" type="text"
    <? 
	
		if($cena_max != '')
		{
			echo 'value="'.$cena_max.'"';
		}
	
	?>
    >
    </span>
    
    <span class="filtr_ceny_od"> 
    <span class="filtr_nazwa">od:</span>
    <input name="cena_min" class="cena" type="text" 
    <? 
	
		if($cena_min != '')
		{
			echo 'value="'.$cena_min.'"';
		}
	
	?>
    >
    </span>    
  
  <span class="filtr_koloru">
  <span class="filtr_nazwa">kolor:</span>
  <select name="kolor" id="kolor">
	  <option value="-1">wybierz</option>
	<? echo $kolory_filtr; ?>
  </select>
  </span>

  <span class="filtr_materialu"> 
  <span class="filtr_nazwa">material:</span>
  <select name="material" id="material" class="material">
  	  <option value="-1">wybierz</option>
	<? echo $material_filtr; ?>
  </select>
  </span>
    
</form>
    </div>
</div>
<div id="menu_produktow">
<div id="filter">Kategorie:
<!--filtruj według-->  
<!--<select name="filtr_LB" id="filtr_LB">
	<option value="kategori">kategori</option>
	<option value="ceny">ceny</option>
	<option value="koloru">koloru</option></option>
	<option value="materialu">materialu</option>
</select>-->
</div>
<?php echo $menu; ?>

<!--

<form id="filtr_form" method="get">
<input type="hidden" name="page_id" value="256" />

</form>
-->
</div>  <?php // closeing <div class="menu produktow"> ?>
<div id="lista_produktow">

<?php

$dni = 21;
$data = date("Y-m-d");
	

	$tbl_name="s_produkt";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = $query_lista_g;
	$total_pages = mysql_query($query);
	$total_pages = mysql_num_rows($total_pages);
		
	//echo "<br><br>total pages: ".$total_pages."<br><br>";
	//echo "<br><br>query total number pages: ".$query."<br><br>";
	//echo "<br><br>query string: ".$_SERVER['QUERY_STRING']."<br><br>";
	
	$query_string = $_SERVER['QUERY_STRING'];
	
	/* Setup vars for query. */
	$targetpage = 'http://naopak.com.pl/lista';//the_permalink();//"test.php"; 	//your file name  (the name of this file)
	$limit = 16; 								//how many items to show per page
	$page = $_GET['page'];
	/*
	?>
    <br />
	<h1>
    <?*/
    	//echo "Query string: ".$query_string."<br />";
    	//echo "Page nr: ".$page."<br />";		

		
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	if($page)
	{		
		$xcxc  =  preg_match("/(page=)([0-9]*)(&)?/",  $query_string, $matches);
		//echo "in if(page) xcxc: ".$xcxc."<br />";	
		if ($xcxc) 
		{
		  $pagenumber  =  $matches[1];  //1,  2,  or  1337...
		  $pagestring  =  $matches[0];     //page=1,  page=2,  or  page=1337
		  $query_string = str_replace($pagestring, "", $query_string);
		}  
		//echo "in if(page) qs: ".$query_string."<br />";	 
	}
/*
	?>
    </h1>
    <br />
    <?*/
	if(!($query_string == ""))	
		$query_string="&".$query_string;
	//echo "<br>url no 'page=': $query_string<br>";
	
	/* Get data. */
	$sql = $query_lista_g." LIMIT $start, $limit";
	
	//echo $sql;
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	

	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) // wywalic "page=" ??????
			$pagination.= "<a href=\"$targetpage?page=$prev$query_string\"><img src=\"http://naopak.com.pl/img/prev.jpg\"></a>";
		else
			$pagination.= "<span class=\"disabled\"><img src=\"http://naopak.com.pl/img/prev.jpg\"></span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter$query_string\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$query_string\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1$query_string\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage$query_string\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1$query_string\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2$query_string\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$query_string\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1$query_string\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage$query_string\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1$query_string\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2$query_string\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$query_string\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next$query_string\"><img src=\"http://naopak.com.pl/img/next.jpg\"></a>";
		else
			$pagination.= "<span class=\"disabled\"><img src=\"http://naopak.com.pl/img/next.jpg\"></span>";
		$pagination.= "</div>\n";		
	}	
	else
	{
		$pagination .= "<div class=\"pagination\">";
		$pagination.= "<span class=\"disabled\"><img src=\"http://naopak.com.pl/img/prev.jpg\"></span>";	
		$pagination.= "<span class=\"disabled\">1</span>";
		$pagination.= "<span class=\"disabled\"><img src=\"http://naopak.com.pl/img/next.jpg\"></span>";
		$pagination.= "</div>\n";	
	}
	
if($total_pages > 0 )	
{
if($show == 0)
//	echo $galeria;
{
	//$sql_results = $wpdb->get_results($query_lista_g, ARRAY_N);

	$id_prod="";
	$nazwa="";
	$cena="";
	$opis="";
	$projektant="";
	$wymiary=""; 
	$kategoria="";
	$data_dodania="";
	$nazwa_projektanta="";
	$dostepnosc=0;

	$i=0;
	$j=0;
	$number+=7;
	$galeria = "<table>";	

	
	while($row = mysql_fetch_array($result))	
	{ 	

	  $id_prod=$row[0];
	  $nazwa=$row[1];
	  $cena=$row[2];
	  $opis=$row[3];
	  $data_dodania=$row[4];
	  $projektant=$row[5];
	  $kategoria=$row[6];
	  
	  $nazwa = (strlen($nazwa) > 22) ? substr($nazwa,0,22).'...' : $nazwa;
	  
	  for($j=7;$j<$number;$j++)
	  {	
		  $tagi.=$row[$j];
	  }
	  
	  if(($i%4)==0)
	  {
		  $galeria .= "<tr>";
	  }
	  
	  	$projektant_tmp = "brak nazwy";
		if($projektant == "")
		{
			$projektant = $projektant_tmp;
		}
		
		$sql = "SELECT * FROM s_zdjecia WHERE id_produkt = '".$id_prod."'";
		$id_sql = mysql_query($sql);
		$sql_result = mysql_fetch_row($id_sql);

		$pic = "img/products/$id_prod/$sql_result[2]_l.jpg";
		//echo "<br />$pic<br />";
		
	  	if (!file_exists($pic)) 
		{ 	 
			$pic = "img/no_pic.png"; 
		}

	$pozostalo = (strtotime($data) - strtotime($data_dodania)) / (60*60*24);
	if($pozostalo < $dni)
	{
		$img_tag = "<img src=\"http://naopak.com.pl/img/nowe.png\" alt=\"image\" style=\"display: block; background-image: url(http://naopak.com.pl/$pic); opacity: 1;\" />";
	}
	else
	{
		$img_tag = "<img src=\"http://naopak.com.pl/$pic\" alt=\"image\" />";
	}

		$galeria .= "<td><div id=\"produkt\">
		<a class=\"link_css\" href=\"http://naopak.com.pl/item?prod_id=".$id_prod."\">		
		<div id=\"obraz_produktu\">$img_tag</div> 
		<div id=\"nazwa_produktu\">$nazwa</div>  
		<div id=\"info_produktu\">
		<div id=\"projektant_produktu\">$projektant</div>
		<div id=\"cena_produktu\">$cena zł</div>
		</div></a>
		</div></td>";

		if(($i%4)==3)
		{
			$galeria .= "</tr>";
		}

		$i++;		
	}

	$galeria .= "</table>";
	echo $galeria;
// ************************************* PRINT GALLERY END	
}
else if($show == 1)	
//	echo $prod_list;
{
	
	//************************************** PRINT LIST

	//$sql_results = $wpdb->get_results($query_lista_g, ARRAY_N);

	$id_prod="";
	$nazwa="";
	$cena="";
	$opis="";
	$projektant="";
	$wymiary=""; 
	$kategoria="";
	$data_dodania="";
	$nazwa_projektanta="";
	$tagi="";
	$dostepnosc=0;
	$number+=7;
	$i=0;
	$j=0;
	
	$prod_list = "<table>";
	
	$sql_query = mysql_query("SHOW COLUMNS FROM `s_tag`");
	$nazwy_tagow = array();
	while($tmp = mysql_fetch_array($sql_query)){		
		array_push($nazwy_tagow, $tmp['Field']);
	}
	
	//foreach ( $sql_results as $row )
	while($row = mysql_fetch_array($result))		
	{ 	
	
	  $id_prod=$row[0];
	  $nazwa=$row[1];
	  $cena=$row[2];
	  $opis=$row[3];
	  $data_dodania=$row[4];
	  $projektant=$row[5];
	  $kategoria=$row[6];
	  
 	  $nazwa = (strlen($nazwa) > 22) ? substr($nazwa,0,22).'...' : $nazwa;
	  
 	  $dostepnosc=$row[$number];
	  if($dostepnosc == 0)
	  	continue;
		
	 //$opis = substr($opis, 0, 201);
		$prod_list .= "<tr>";
	  
	  	$projektant_tmp = "brak nazwy";
		if($projektant == "")
		{
			$projektant = $projektant_tmp;
		}
		
		$sql = "SELECT * FROM s_zdjecia WHERE id_produkt = '".$id_prod."'";
		$id_sql = mysql_query($sql);
		$sql_result = mysql_fetch_row($id_sql);

		$pic = "img/products/$id_prod/$sql_result[2]_l.jpg";
	
	  	
		if (!file_exists($pic)) 
		{ 	 
			$pic = "img/no_pic.png"; 
		}
		
		$pozostalo = (strtotime($data) - strtotime($data_dodania)) / (60*60*24);
		if($pozostalo < $dni)
		{
			$img_tag = "<img src=\"http://naopak.com.pl/img/nowe.png\" alt=\"image\" style=\"display: block; background-image: url(http://naopak.com.pl/$pic); opacity:1;\" />";
		}
		else
		{
			$img_tag = "<img src=\"http://naopak.com.pl/$pic\" alt=\"image\" />";
		}
		
		$your_desired_width=220;
		if (strlen($opis) > $your_desired_width) 
		{
			$opis = trim_text($opis,$your_desired_width);
		}	
			
		$prod_list .= '<td class="">	
<div class="produkt_lista">
	<div class="zdjecie_lista">
		<a href="http://naopak.com.pl/item?prod_id='.$id_prod.'">			
			'.$img_tag.'</div>
		</a>
	<div class="info_lista">
	    <div class="tytul_lista">
	    	<h3>'.$nazwa.'</h3>        
			<h4>'.$projektant.'</h4>
	    </div>
	    <div class="dane_lista">
	    	<div class="opis_lista">'.$opis.'</div>
       		<div class="tagi_lista">';
	
	  $adres = 'http://naopak.com.pl/lista';

	  $tagi="";
	  $i=1;
	  for($j=8;$j<$number;$j++)
	  {	
	  	  $nazwa_tagu = substr_replace($nazwy_tagow[$i], "", 0, 3);

     	  $link=$adres."?typ_tagu=".$nazwa_tagu."&nazwa_tagu=".$row[$j];
		  
		  $prod_list.=  $nazwa_tagu . ":
		  <a class=\"tag_nazwa\" href=\"".$link."\">".$row[$j]."</a></br>";
		  $i++;
	  }			
	  

			$prod_list.='</div>
    	</div>
		<div class="cena_lista">'.$cena.' zł</div>
	</div>	
</div>
		</td>';

		$prod_list .= "</tr>";
	}

	$prod_list .= "</table>";
	echo $prod_list;


//**************************************** PRINT LIST END
}
}
else
{
?>
<div class="no_result">Wyszukiwanie nie przyniosło żadnych rezultatów !<br />
Zmień kryteria wyszukiwania i spróbój ponownie.</div>
<?
}
?>
<?=$pagination?>

</div>  <?php // closeing <div class="lista produktow"> ?>
</div> <?php  // closeing <div class="main_content"> ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>