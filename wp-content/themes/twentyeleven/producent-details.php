<?php
/**

 Template Name: producent-details
  
 */
 
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
 
function add_scripts() {
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery-latest.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.tablesorter.js"></script>';	
}
add_action('wp_head', 'add_scripts');

get_header(); ?>


<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/tabela.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css"type="text/css"/>
<?php 
include(TEMPLATEPATH . '/pm/tc_pageNav.php'); ?>

		<div id="primary">
			<div id="content" role="main">
                <?php
if ( is_user_logged_in() ) {
    if ( $current_user->user_login == 'admin' ) {


?>
				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
             <div id="displayUserDetails">  
              <?php 
				$userId  = $_GET['id'];
				displayUserData($userId);	
			  ?>            
             </div>
<?php 
	}
} 
?>
<script>
jQuery(document).ready(function() { 
    // extend the default setting to always include the zebra widget. 
    $.tablesorter.defaults.widgets = ['zebra']; 
    // extend the default setting to always sort on the first column 
    $.tablesorter.defaults.sortList = [[0,0]]; 
    // call the tablesorter plugin 
    $("table").tablesorter(); 
}); 
</script>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>