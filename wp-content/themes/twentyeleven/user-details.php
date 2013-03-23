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
/*	echo '
	<script language="javascript">
	jQuery(document).ready(function(){
	
	jQuery(\'.menu\').mouseover(function() {
		jQuery(this).addClass(\'over\');
	}).mouseout(function() {
		jQuery(this).removeClass(\'over\');										
	});
	
	});
	
	</script>
	';
	*/
	
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.tablesorter.js"></script>';	
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
	
	
	 // extend the default setting to always include the zebra widget. 
    $.tablesorter.defaults.widgets = ['zebra']; 
    // extend the default setting to always sort on the first column 
    $.tablesorter.defaults.sortList = [[0,0]]; 
    // call the tablesorter plugin 
    $("table").tablesorter(); 
	
	
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

div.content .back_btn{
	width:150px;
	height:25px;
	color:#FFF;	
	background-color:#CCC;
	padding:5px;
	text-decoration: none;	
}

div.content.back_btn:focus, div.content .back_btn:active, div.content .back_btn:hover { 
text-decoration: none;
}
div.content .back_btn:hover {
	color:#000;
	background-color:#F90;
}
</style>


<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/tabela.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css"type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url') ?>/css/table_style.css"/>
<?php 
include(TEMPLATEPATH . '/pm/tc_pageNav.php'); ?>

<div class="hfeed content">
<div id="main_contetn">
<?php

if ( is_user_logged_in() ) {

function displayUserData($id) {
	$connection = dbConnect();
	$result = mysql_query("SELECT user.ID, user.user_login AS userLogin, user.user_registered AS dateRegistered, dane.id, dane.imie AS name, dane.nazwisko AS surname , dane.adres AS adres, dane.miejscowosc AS miejscowosc, dane.firma AS firma, dane.kraj AS kraj,  prod.nazwa AS nazwa FROM wpp_users AS user INNER JOIN s_producenci  AS prod ON user.ID = prod.id_uzytkownik INNER JOIN s_dane_kontaktowe AS dane ON user.ID = dane.id_uzytkownik  WHERE user.ID = $id")
	or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	echo '<a href="' . get_bloginfo('url') . '/producent-display">Wstecz.</a>';
	echo '<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead> 
		<tr>
		<th>Nazwa producenta</th>
		<th>Nazwa użytkownika</th>
		<th>Data zarejestrowania</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Adres</th>
		<th>Miejscowość</th>
		<th>Kraj</th>
		</tr>
		</thead>
		<tbody>'; 
	if($num_rows != NULL)
	{		
		while($row = mysql_fetch_array($result))
		{
			echo '<tr>';
			echo '<td id="producent' . $i . '">' . $row['nazwa'] . '</td>';
			echo '<td>' . $row['userLogin'] . '</td>';
			echo '<td>' . $row['dateRegistered'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['surname'] . '</td>';
			echo '<td>' . $row['adres'] . '</td>';
			echo '<td>' . $row['miejscowosc'] . '</td>';
			echo '<td>' . $row['kraj'] . '</td>';
			echo '</tr>';
			echo '<tr>';	
		}
	}
	else
	{
		echo '<tr>';
		echo '<td colspan="8">Brak danych do wyświetlenia</td>';
		echo '</tr>';
	}
	echo '   
	</tbody>
	</table>';
	
	echo 'Zamówienia:<br><br>';
	
	$results = mysql_query("SELECT data FROM s_zamowienie WHERE id_klient = $id")
	or die(mysql_error());
	$num_row = mysql_num_rows($results);
	echo '<table id="myTable2"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead> 
		<tr>
		<th>L.p.</th>
		<th>Data zamówienia</th>
		<th></th>
		</tr>
		</thead>
		<tbody>'; 
	if($num_row != NULL)
	{		
		$i=1;	
		while($rows = mysql_fetch_array($results))
		{
			echo '<tr>';
			echo '<td id="nr' . $i . '">' . $i . '</td>';
			echo '<td>' . $rows['data'] . '</td>';
			echo '<td style="text-align:center" ><a href="' . get_bloginfo('url') . '/' . $row['ID'] . '" class="" id="' . $i . '">Pokaż szczegóły zamówienia</a></td>';
			echo '</tr>';
			echo '<tr>';
			$i++;	
		}
	}
	else
	{
		echo '<tr>';
		echo '<td colspan="3">Brak zamówień do wyświetlenia</td>';
		echo '</tr>';
	}
	echo '   
	</tbody>
	</table>';
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
 /*
    global $current_user;
	
	$content = 'Welcome, ';
    $content .= 'User first name: ' . $current_user->user_firstname;
    $content .= 'User last name: ' . $current_user->user_lastname;
	$content .= '!<br>';
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
	$content .= '<br>';
	$content .= 'user ID: '.$current_user->ID.'<br>';
	*/

?>


<? include "menu.php"; ?>
<div id="right_content_page" >
<?
	$userId  = $_GET['id'];
	displayUserData($userId);
?>
</div>

<?php
} else {
    echo 'Welcome, visitor!';
}

?>
</div> <?php // closeing <div class="main_content"> ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>