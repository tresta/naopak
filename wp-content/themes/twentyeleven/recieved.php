<?php
/**

 Template Name: pm-recieved
 
 */
 
function add_scripts()
	{
		/*echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.js"></script>';*/
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery-latest.js"></script>';
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.tablesorter.js"></script>';
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/alertbox/jquery.alerts.js"></script>';		
	}

add_action('wp_head', 'add_scripts');
if ( !is_user_logged_in() ) 
{ 
	echo  '<script>location.href = "' . site_url() . '/"</script>';
}  
 get_header(); ?>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/css/user_account_style.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/pm/tabela.css" type="text/css" />
<link href="<?php echo get_bloginfo('template_url')?>/pm/general.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/pm/alertbox/jquery.alerts.css" type="text/css" media="screen" />

<div class="hfeed content">				
	<div id="main_content">

<?php
global $current_user;
get_currentuserinfo();
$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
include("menu.php"); 
?>
<div id="center_content" style="margin-left:100px;">
 <?php
$name = $current_user->user_login;
echo '<div id="name" style="display:none">' . $name . '</div>';
?>

 <div id='tab3'>
                    <div id='recievedmessages'>
<?php  

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
$results = mysql_query( "SELECT * FROM `s_pm` WHERE `do` ='$name' AND `do_usuniete` = 0")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($results);
	echo '                    
						<table id="myTable2"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
	<thead> 
	<tr>
	<th class="{sorter: false}">L.p.</th>
	<th>Od</th>
	<th>Do</th>
	<th>Temat</th>
	<th>Data</th>
	<th class="{sorter: false}"></th>
	<th class="{sorter: false}"></th>
	</tr>
	</thead>
	<tbody>'; 
	if($num_rows != NULL)
	{
		$to = 'do';
		$i = 1;
		while($row = mysql_fetch_array($results))
		{
			if ($row['do_przeczytane'] == 0)
			{
				echo '<tr>';
				echo '<td id="wyslane' . $i . '" style="font-weight:bold">' . $i . '</td>';
				echo '<td id="od' . $i . '" style="font-weight:bold">' . $row['od'] . '</td>';
				echo '<td id="do' . $i . '" style="font-weight:bold">' . $row['do'] . '</td>';
				echo '<td id="temat' . $i . '" style="font-weight:bold">' . $row['temat'] . '</td>';
				echo '<td id="data' . $i . '" style="font-weight:bold">' . $row['data'] . '</td>';
				echo '<td style="text-align:center" >' . '<a href="#" class="viewrecievedmessage" id="' . $i . '">Pokaż wiadomość</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="deleterecievedmessage" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
				echo '</tr>';			
			}
			else
			{
				echo '<tr>';
				echo '<td id="wyslane' . $i . '">' . $i . '</td>';
				echo '<td id="od' . $i . '">' . $row['od'] . '</td>';
				echo '<td id="do' . $i . '">' . $row['do'] . '</td>';
				echo '<td id="temat' . $i . '">' . $row['temat'] . '</td>';
				echo '<td id="data' . $i . '">' . $row['data'] . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="viewrecievedmessage" id="' . $i . '">Pokaż wiadomość</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="deleterecievedmessage" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
				echo '</tr>';			
			}
			$i++;
		}			 	 
	}
	else
	{
			echo '<tr>';
			echo '<td colspan="7">Brak wiadomośći</td>';
			echo '</tr>';
	}
	echo '   
	</tbody>
	</table>';
	
	mysql_close($connection);

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

jQuery('.deleterecievedmessage').live('click',function() {
	var that = $(this).attr("id");
	jConfirm('Czy na pewno?', 'Potwierdzenie wyboru', function(r) {
		if(r == true)
		{
			
			var idod = $("#od" + that).text();
			var iddata = $("#data" + that).text();
			var name = $("#name").text();
			
			$.ajax({
			url: "http://naopak.com.pl/wp-content/themes/twentyeleven/pm/delete-message.php",	
			type: "POST",		
			data: {typ : "otrzymane", od : idod, data : iddata, name : name},		
			cache: false,
			success: function (html) {	
				$('#recievedmessages').html(html);
				
			$.tablesorter.defaults.widgets = ['zebra']; 
    		$.tablesorter.defaults.sortList = [[0,0]]; 
    		$("table").tablesorter(); 	
			}		
				});
		}
		else
		{
			
		}
	});

});

jQuery('.viewrecievedmessage').live('click',function() {
	var idod = $("#od" + $(this).attr("id")).text();
	var iddata = $("#data" + $(this).attr("id")).text();
	var name = $("#name").text();
	
	$.ajax({
			url: "http://naopak.com.pl/wp-content/themes/twentyeleven/pm/view-message.php",	
			type: "POST",		
			data: {typ : "otrzymane", od : idod, data : iddata, name : name},		
			cache: false,
			success: function (html) {	
			$('#recievedmessages').html(html);
			
			$.tablesorter.defaults.widgets = ['zebra']; 
    		$.tablesorter.defaults.sortList = [[0,0]]; 
    		$("table").tablesorter(); 					
			}		
		});
});

</script>
       </div>
       </div> 
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>