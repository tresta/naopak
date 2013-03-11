<?php
/**

 Template Name: producentApplication
 
 */


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

function displayMessages() {
	
	$results = mysql_query( "SELECT * FROM s_zgloszenia")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($results);
	echo '                    
						<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
	<thead> 
	<tr>
	<th class="{sorter: false}">L.p.</th>
	<th>Imię i nazwisko</th>
	<th>Telefon</th>
	<th>Nazwa producenta</th>
	<th>Adres WWW</th>
	<th>Data</th>
	<th>Zatwierdzone</th>
	<th class="{sorter: false}"></th>
	<th class="{sorter: false}"></th>
	<th class="{sorter: false}"></th>
	</tr>
	</thead>
	<tbody>'  ; 
	if($num_rows != NULL)
	{
		$i = 1;
		while($row = mysql_fetch_array($results))
		{
			if ($row['przeczytane'] == 0)
			{
				echo '<tr id="tr' . $i . '">';
				echo '<td id="wiadomosc' . $i . '" style="font-weight:bold">' . $i . '</td>';
				echo '<td id="id_user' . $i . '" style="display:none">' . $row['id_user'] . '</td>';
				echo '<td id="imie' . $i . '" style="font-weight:bold">' . $row['imie'] . '</td>';
				echo '<td id="telefon' . $i . '" style="font-weight:bold">' . $row['telefon'] . '</td>';
				echo '<td id="nazwa_producenta' . $i . '" style="font-weight:bold">' . $row['nazwa_producenta'] . '</td>';
				echo '<td id="www' . $i . '" style="font-weight:bold">' . $row['www'] . '</td>';
				echo '<td id="data' . $i . '" style="font-weight:bold">' . $row['data'] . '</td>';
				if ( $row['zatwierdzone'] == 1 )
				{
					echo '<td id="zatwierdzone' . $i . '" style="font-weight:bold">Tak</td>';
				}
				else
				{
					echo '<td id="zatwierdzone' . $i . '" style="font-weight:bold">Nie</td>';
				}
				echo '<td style="text-align:center" >' . '<a href="#" class="view" id="' . $i . '">Pokaż opis</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="delete" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="confirm" id="' . $i . '">Zatwierdź zgłoszenie</a>' . '</td>';
				echo '</tr>';			
			}
			else
			{
				echo '<tr id="tr' . $i . '">';
				echo '<td id="wiadomosc' . $i . '" >' . $i . '</td>';
				echo '<td id="id_user' . $i . '" style="display:none">' . $row['id_user'] . '</td>';
				echo '<td id="imie' . $i . '" >' . $row['imie'] . '</td>';
				echo '<td id="telefon' . $i . '" >' . $row['telefon'] . '</td>';
				echo '<td id="nazwa_producenta' . $i . '" >' . $row['nazwa_producenta'] . '</td>';
				echo '<td id="www' . $i . '" >' . $row['www'] . '</td>';
				echo '<td id="data' . $i . '" >' . $row['data'] . '</td>';
				if ( $row['zatwierdzone'] == 1 )
				{
					echo '<td id="zatwierdzone' . $i . '">Tak</td>';
				}
				else
				{
					echo '<td id="zatwierdzone' . $i . '" >Nie</td>';
				}
				echo '<td style="text-align:center" >' . '<a href="#" class="view" id="' . $i . '">Pokaż opis</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="delete" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="confirm" id="' . $i . '">Zatwierdź zgłoszenie</a>' . '</td>';
				echo '</tr>';			
			}
			$i++;
		}			 	 
	}
	else
	{
			echo '<tr>';
			echo '<td colspan="10">Brak wiadomośći</td>';
			echo '</tr>';
	}
	echo '   
	</tbody>
	</table>';
}

function dbDisconnect($connection) {
	mysql_close($connection);
}
 
function add_scripts() {
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery-latest.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.tablesorter.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/alertbox/jquery.alerts.js"></script>';		
}
add_action('wp_head', 'add_scripts');

get_header(); ?>


<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/tabela.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css"type="text/css"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/alertbox/jquery.alerts.css" type="text/css" media="screen" /> 

		<div id="primary">
			<div id="content" role="main">
                <?php
if ( is_user_logged_in() ) {
    if ( $current_user->user_login == 'admin' ) {


?>
				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>



		<?php 
			include (TEMPLATEPATH . '/newMessageScript.php');
			$connection = dbConnect();
			?>
         <div id="producentApplication">   
		<?php
			displayMessages();		
		?>  
<div class="opis"></div>
</div>
</div>
<?php
dbDisconnect($connection);
?>
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

jQuery('.view').live('click', function() {
	var nazwa = $("#nazwa_producenta" + $(this).attr("id")).text();
	var data = $("#data" + $(this).attr("id")).text();
	var imiediv = "#imie" + $(this).attr("id");
	var telefondiv = "#telefon" + $(this).attr("id");
	var wwwdiv = "#www" + $(this).attr("id");
	var datadiv = "#data" + $(this).attr("id");
	var zatwierdzonediv = "#zatwierdzone" + $(this).attr("id");
	var nazwa_producentadiv = "#nazwa_producenta" + $(this).attr("id");
	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/view-producent-application.php",	
			type: "POST",		
			data: {nazwa_producenta : nazwa, data : data},		
			cache: false,
			success: function (html) {	
			$(".opis").html(html);
			$(imiediv).css("font-weight","normal");		
			$(telefondiv).css("font-weight","normal");	
			$(wwwdiv).css("font-weight","normal");	
			$(datadiv).css("font-weight","normal");		
			$(nazwa_producentadiv).css("font-weight","normal");	
			$(zatwierdzonediv).css("font-weight","normal");					
			}		
		});	
});

jQuery('.delete').live('click', function() {
	var that = $(this).attr("id");
	jConfirm('Czy na pewno?', 'Potwierdzenie wyboru', function(r) {
	if(r == true)
	{
		
		var trnr = "#tr" + that;
		var nazwa = $("#nazwa_producenta" + that).text();
		var data = $("#data" + that).text();
	
		$.ajax({
				url: "<?php echo get_bloginfo('template_url') ?>/pm/delete-producent-application.php",	
				type: "POST",		
				data: {nazwa_producenta : nazwa, data : data},		
				cache: false,
				success: function (html) {
				$(".opis").html(html);	
				$(trnr).css("display","none");					
				}		
			});	
	}
	else
	{			
	}
	});
});

jQuery('.confirm').live('click', function() {
	var zatwierdzone = "#zatwierdzone" + $(this).attr("id");
	var nazwa = $("#nazwa_producenta" + $(this).attr("id")).text();
	var data = $("#data" + $(this).attr("id")).text();			
	var id_user = $("#id_user" + $(this).attr("id")).text();			
	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/confirm-producent-application.php",	
			type: "POST",		
			data: {nazwa_producenta : nazwa, data : data, id_user : id_user},		
			cache: false,
			success: function (html) {
			$(".opis").html(html);
			$(zatwierdzone).text("Tak");			
			}		
		});	
});

</script>       
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>