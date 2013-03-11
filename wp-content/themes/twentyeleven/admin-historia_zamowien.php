<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: admin - historia zamowien
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
</style>
<?
get_header();

?>

<div class="hfeed content">
<div id="main_contetn">historia zamowien
<?php

if ( is_user_logged_in() ) {

    global $current_user;
	global $wpdb;
	
	//$content = 'Welcome, ';
   // $content .= 'User first name: ' . $current_user->user_firstname;
   // $content .= 'User last name: ' . $current_user->user_lastname;
	//$content .= '!<br>';
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

	include("menu.php");

	$lista="";
	$query_historia = "SELECT s_zamowienie.id_klient, s_zamowienie.id, s_zamowienie.data AS data_zamowienia, s_status_zamowienia.nazwa, h1.data AS data_aktualizacji, SUM( s_produkt.cena ) AS wartosc
FROM s_historia h1
INNER JOIN s_zamowienie ON h1.id_zamowienia = s_zamowienie.id
INNER JOIN s_status_zamowienia ON h1.id_status = s_status_zamowienia.id
INNER JOIN s_zamowione_produkty ON s_zamowione_produkty.id_zamowienia = s_zamowienie.id
INNER JOIN s_produkt ON s_zamowione_produkty.id_produkt = s_produkt.id
WHERE h1.data = ( 
SELECT MAX( data ) 
FROM s_historia h2
WHERE h1.id_zamowienia = h2.id_zamowienia )  
GROUP BY s_zamowienie.id
LIMIT 0 , 30";

	$sql_results = $wpdb->get_results($query_historia, ARRAY_N);
	
	$lista = '<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
<thead> 
<tr>
	<th>Kupujący</th>
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
      $id_klient=$row[0];
	  $id_zam=$row[1];
	  $data_zam=$row[2];
	  $status=$row[3];
	  $data_aktualizacji=$row[4];
	  $wartosc=$row[5]; 
	  $wartosc = number_format($wartosc, 2, ",", " ");	
	 // $lista .= "<tr>";
	  
		$lista .= "<tr>
		<td>$id_klient</td>
		<td>$id_zam</td>
		<td>$data_zam</td>
		<td>$status</td>
		<td>$data_aktualizacji</td>
		<td>$wartosc zł</td>
		<td><a href=\"http://naopak.com.pl/szczegoly-zamowienia?id_zam=".$id_zam."\" >szczegóły</a></td>
		</tr>";

		//$lista .= "</tr>";
	
	}

	$lista .= "</tbody></table>";

	
?>
<div id="center_content">
<?php
	echo $lista;	
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