<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: User Account - historia szczegoly
 */
 ?>

<?php
	
function add_scripts()
{
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/table_style.css"/>';
    echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/jquery-latest.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/jquery.tablesorter.js"></script>';
	echo '
	<script language="javascript">
	jQuery(document).ready(function(){
	
	jQuery.tablesorter.defaults.widgets = [\'zebra\'];   	
	jQuery("#myTable").tablesorter();
	jQuery("#myTable2").tablesorter();
		
	jQuery(\'.menu\').mouseover(function() {
		jQuery(this).addClass(\'over\');
	}).mouseout(function() {
		jQuery(this).removeClass(\'over\');										
	});
	
	});
	
	</script>
	';
}
add_action('wp_head', 'add_scripts');
?>
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

div.content dd{
	margin-bottom:0px;	
	margin-left:15px;
}

.modal, .croping {
		background-color:#fff;
		display:none;
		width:690px;
		padding:15px;
		text-align:center;
		border:2px solid #333;
		position:absolute;

		opacity:1;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		-moz-box-shadow: 0 0 50px #ccc;
		-webkit-box-shadow: 0 0 50px #ccc;
}

.modal h2 {
		background:url(/img/global/info.png) 0 50% no-repeat;
		margin:0px;
		padding:10px 0 10px 45px;
		border-bottom:1px solid #333;
		font-size:20px;
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
	/*background: #990000;*/
	color:#1fb5da;
	}
	
div.content .over{
	color: #1fb5da;
	/*background: #CCCCCC;*/
	}	
	
.hfeed.content #main_contetn #center_content #myTable tr td {
	text-align: center;
}

.hfeed.content #main_contetn #center_content #myTable2 tr td {
	text-align: center;
}
</style>
<?
get_header();

?>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css" type="text/css"/>
<div class="hfeed content">
<div id="main_contetn">
<?php

if ( is_user_logged_in() ) {

    global $current_user;
	global $wpdb;
	
	$id_zamowienia = $_GET['id_zam'];
	
	//$content = 'Welcome, ';
    //$content .= 'User first name: ' . $current_user->user_firstname;
    //$content .= 'User last name: ' . $current_user->user_lastname;
	//$content .= '!<br>';
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

	include("menu.php");

	$lista="";
	$query_lista_prod = "
	SELECT s_produkt.nazwa AS produkt_nazwa, s_produkt.cena, s_producenci.nazwa AS projektant
	FROM s_zamowione_produkty
	INNER JOIN s_produkt ON s_produkt.id = s_zamowione_produkty.id_produkt
	LEFT JOIN s_producenci ON s_producenci.id = s_produkt.id_projektant
	WHERE  s_zamowione_produkty.id_zamowienia =  ".$id_zamowienia;

	$sql_results = $wpdb->get_results($query_lista_prod, ARRAY_N);
	
	$lista = 'Pozycje zamówienia</br><table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
<thead> 
<tr>
	<th class=\'{sorter: false}\'>Nazwa produktu</th>
	<th>Cena</th>
	<th>Projektant</th>
</tr>
</thead>
<tbody>';

	$nazwa="";
	$cena="";
	$projektant="";

		
	foreach ( $sql_results as $row )
	{ 	
	  $nazwa=$row[0];
	  $cena=$row[1];
	  $projektant=$row[2];
	  
		$lista .= "<tr>
		<td>$nazwa</td>
		<td>$cena zł</td>
		<td>$projektant</td>
		</tr>";	
	}

	$lista .= "</tbody></table>";

	
?>
<div id="center_content">
<?php
	echo $lista;	
?>
</br>Historia zamówienia:</br>
<?	
	$lista="";
	$query_lista_prod = "
	SELECT s_historia.data, s_status_zamowienia.nazwa, s_historia.komentarz
	FROM s_historia
	INNER JOIN s_status_zamowienia ON s_status_zamowienia.id = s_historia.id_status
	WHERE s_historia.id_zamowienia =  ".$id_zamowienia;

	$sql_results = $wpdb->get_results($query_lista_prod, ARRAY_N);
	
	$lista = '<table id="myTable2"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
<thead> 
<tr>
	<th class=\'{sorter: false}\'>Data aktualizacji</th>
	<th>Status</th>
	<th>Uwagi</th>
</tr>
</thead>
<tbody>';

	$data="";
	$status="";
	$uwagi="";

		
	foreach ( $sql_results as $row )
	{ 	
	  $data=$row[0];
	  $status=$row[1];
	  $uwagi=$row[2];
	  
		$lista .= "<tr>
		<td>$data</td>
		<td>$status</td>
		<td>$uwagi</td>
		</tr>";	
	}

	$lista .= "</tbody></table>";

	echo $lista;
	if ( $current_user->user_login == 'admin' ) 
	{ 
		$query_statusy = "SELECT nazwa FROM s_status_zamowienia";
		$sql_statusy = $wpdb->get_results($query_statusy, ARRAY_N);
		//print_r ($sql_statusy);
		//foreach ( $sql_statusy as $row ) 
		//{ 
		//	echo '<option value="'. $row[0] . '>' . $row[0] . '</option>';
		//}
	
?>
<form id="customForm" action="<?php the_permalink(); ?>" method="post">
    <div>
        <label for="status">Status zamówienia</label>
        <select name="status" size="1" id="status">
		<?php 
		print_r ($sql_statusy);
		foreach ( $sql_statusy as $row ) 
		{ 
			echo '<option value="'. $row[0] . '">' . $row[0] . '</option>';
		}
		?>
        </select>
    </div>
    <div>
        <label for="comment">Komentarz</label> <textarea rows="" cols="" id="tresc" name="tresc">Treść komentarza...</textarea> <span id="commentInfo"> </span>
    </div>
    <div>
        <input id="submit" type="submit" name="submit" value="Wyślij" style="width:115px;" /> <input id="send" type="reset" name="anuluj" value="Anuluj" style="width:115px;" />
    </div>
</form>
<?php 
}
?>
</div>  <?php // closeing <div class="center produktow"> ?>
	
<?php
} else {
    echo 'Welcome, visitor!';
	echo '<br><br> tu bedzie redirect!';
}

?>
</div> <?php // closeing <div class="main_content"> ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>