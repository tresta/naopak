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

<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/tabela.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css"type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('template_url') ?>/css/table_style.css"/>
<? include(TEMPLATEPATH . '/pm/tc_pageNav.php'); ?> 
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
    jQuery.tablesorter.defaults.widgets = ['zebra']; 
    // extend the default setting to always sort on the first column 
    jQuery.tablesorter.defaults.sortList = [[0,0]]; 
    // call the tablesorter plugin 
    jQuery("table").tablesorter(); 
	
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
		
</style>




<div class="hfeed content">
<div id="main_contetn">
<?php

if ( is_user_logged_in() ) {

function displayUsers($id) {
	$start = $id * 30 - 30;
	$connection = dbConnect();
	$result = mysql_query("SELECT user.ID AS ID, user.user_login AS userLogin, user.user_registered AS dateRegistered, dane.id, dane.imie AS name, dane.nazwisko AS surname FROM wpp_users AS user INNER JOIN s_dane_kontaktowe AS dane ON user.ID = dane.id_uzytkownik  WHERE user.user_login != 'admin' ORDER BY user.user_login LIMIT $start, 30")
	or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	echo '<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead> 
		<tr>
		<th class="{sorter: false}">L.p.</th>
		<th>Nazwa użytkownika</th>
		<th>Data zarejestrowania</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th class="{sorter: false}"></th>
		</tr>
		</thead>
		<tbody>'; 
	if($num_rows != NULL)
	{		
		$i=1;
		while($row = mysql_fetch_array($result))
		{
			echo '<tr>';
			echo '<td id="nr' . $i . '" style="font-weight:bold">' . $i . '</td>';
			echo '<td id="login' . $i . '">' . $row['userLogin'] . '</td>';
			echo '<td>' . $row['dateRegistered'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['surname'] . '</td>';
			echo '<td style="text-align:center" ><a href="' . get_bloginfo('url') . '/user-data?id=' . $row['ID'] . '" class="viewuser" id="' . $i . '">Pokaż szczegóły</a></td>';
			echo '</tr>';
			echo '<tr>';	
			$i++;
		}
	}
	else
	{
		echo '<tr>';
		echo '<td colspan="6">Brak użytkowników do wyświetlenia</td>';
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
	 			$connection = dbConnect();
				$id = 1;
				if ($_GET['id'] != null)
				{
					$id = $_GET['id'];
				}
				$result = mysql_query("SELECT ID FROM wpp_users WHERE user_login != 'admin'")				
				or die(mysql_error());
				dbDisconnect($connection);
				$ilosc = mysql_num_rows($result);	
				echo "Ilość rekordów w bazie: $ilosc.";
				$totalRecords = mysql_num_rows($result);
				$page_nav = new tc_pageNav($totalRecords);
				$page_nav->setPerPage(30);
				$page_nav->calculate();
				$page_nav->showInactiveNavigator(false);
				$page_nav->setNavType(0);
				$strona = $page_nav->getCurentPage();
				echo($page_nav->printNavBar());
				
				displayUsers($strona);	
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