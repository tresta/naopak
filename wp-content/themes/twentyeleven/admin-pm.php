<?php
/**

 Template Name: pm-admin
 
 */

$users = array(); 
 
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
	global $users;
	$results = mysql_query( "SELECT DISTINCT `od` FROM `s_pm` WHERE `admin_usuniete` ='0'")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($results);
	echo '                    
						<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
	<thead> 
	<tr>
	<th class="{sorter: false}">L.p.</th>
	<th>Nazwa użytkownika</th>
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
			array_push($users, $row['od']);
			echo '<tr>';
			echo '<td id="nr' . $i . '" style="font-weight:bold">' . $i . '</td>';
			echo '<td id="nazwa_uzytkownika' . $i . '" style="font-weight:bold">' . $row['od'] . '</td>';
			echo '<td style="text-align:center" ><a href="#" class="viewusermessages" id="' . $i . '">Pokaż wiadomości użytkownika</a></td>';
			echo '</tr>';
			echo '<tr>';	
			$i++;
		}			 	 
	}
	else
	{
			echo '<tr>';
			echo '<td colspan="3">Brak wiadomośći</td>';
			echo '</tr>';
	}
	echo '   
	</tbody>
	</table>';
	$ii = 1;
	foreach ($users as $i => $value)
	{
		$iii = 1;
		$username = $users[$i];
		$result = mysql_query( "SELECT * FROM `s_pm` WHERE `od` = '$username' AND `admin_usuniete` = 0")
		or die(mysql_error());  
		$rows_num =  mysql_num_rows($result);
		echo '<div id="userMessages' . $ii . '">';
		echo '   	<table  id="myTable' . $ii . '"  class="tablesorter" border="0" cellpadding="0" cellspacing="1" style="display:none;">
					<thead> 
					<tr>
					<th class="{sorter: false}">L.p.</th>
					<th>Od</th>
					<th>Do</th>
					<th>Temat</th>
					<th>Data</th>
					<th>Przesłana</th>
					<th class="{sorter: false}"></th>
					<th class="{sorter: false}"></th>
					<th class="{sorter: false}"></th>
					<th class="{sorter: false}"></th>
					</tr>
					</thead>
					<tbody>'  ; 
		if($rows_num != NULL)
		{		
			while($rows = mysql_fetch_array($result))
			{
				if ($rows['admin_przeczytane'] == 0)
				{					
					echo '<tr id="tr' . $iii . $ii . '">';
					echo '<td id="nr_wiadomosci' . $iii . $ii . '" style="font-weight:bold">' . $iii . '</td>';
					echo '<td id="od' . $iii . $ii . '" style="font-weight:bold">' . $rows['od'] . '</td>';
					echo '<td id="do' . $iii . $ii . '" style="font-weight:bold">' . $rows['do'] . '</td>';
					echo '<td id="temat' . $iii . $ii . '" style="font-weight:bold">' . $rows['temat'] . '</td>';
					echo '<td id="data' . $iii . $ii . '" style="font-weight:bold">' . $rows['data'] . '</td>';
					if ($rows['od_admin'] == 1)
					{
						echo '<td id="przeslane' . $iii . $ii . '" style="font-weight:bold">Tak</td>';
					}
					else
					{
						echo '<td id="przeslane' . $iii . $ii . '" style="font-weight:bold">Nie</td>';
					}					
					echo '<td style="text-align:center" >' . '<a href="#" name="' . $ii . '" class="viewmessage" id="' . $iii . $ii . '">Pokaż wiadomość</a>' . '</td>';
					echo '<td style="text-align:center">' . '<a href="#" class="editmessage" id="' . $iii . $ii . '">Edytuj wiadomość</a>' . '</td>';
					echo '<td style="text-align:center">' . '<a href="#" class="sendmessage" id="' . $iii . $ii . '">Prześlij wiadomość</a>' . '</td>';
					echo '<td style="text-align:center">' . '<a href="#" class="deletemessage" id="' . $iii . $ii . '">Usuń wiadomość</a>' . '</td>';
					echo '</tr>';			
				}
				else
				{
					echo '<tr id="tr' . $iii . $ii . '">';
					echo '<td id="nr_wiadomosci' . $iii . $ii . '">' . $iii . '</td>';
					echo '<td id="od' . $iii . $ii . '">' . $rows['od'] . '</td>';
					echo '<td id="do' . $iii . $ii . '">' . $rows['do'] . '</td>';
					echo '<td id="temat' . $iii . $ii . '">' . $rows['temat'] . '</td>';
					echo '<td id="data' . $iii . $ii . '">' . $rows['data'] . '</td>';
					if ($rows['od_admin'] == 1)
					{
						echo '<td id="przeslane' . $iii . $ii . '">Tak</td>';
					}
					else
					{
						echo '<td id="przeslane' . $iii . $ii . '" >Nie</td>';
					}		
					echo '<td style="text-align:center">' . '<a href="#"  name="' . $ii . '" class="viewmessage" id="' . $iii . $ii . '">Pokaż wiadomość</a>' . '</td>';
					echo '<td style="text-align:center">' . '<a href="#" class="editmessage" id="' . $iii . $ii . '">Edytuj wiadomość</a>' . '</td>';
					echo '<td style="text-align:center">' . '<a href="#" class="sendmessage" id="' . $iii . $ii . '">Prześlij wiadomość</a>' . '</td>';
					echo '<td style="text-align:center">' . '<a href="#" class="deletemessage" id="' . $iii . $ii . '">Usuń wiadomość</a>' . '</td>';
					echo '</tr>';								
				}	
				$iii++;	
			}	
			$ii++;
					
		}
		else
		{	
			
			echo 'Brak wiadomośći';

		}
		echo '   
				</tbody>
				</table>';
		echo '</div>';
		
	}
	echo '<div id="message">';
		echo '</div>';	
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
if ( $current_user->user_login != 'admin' ) 
{ 
	echo  '<script>location.href = "' . site_url() . '/"</script>';
}
get_header(); ?>

<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/css/user_account_style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/tabela.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css"type="text/css"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/alertbox/jquery.alerts.css" type="text/css" media="screen" /> 

<div class="hfeed content">				
	<div id="main_content">

<?php
global $current_user;
get_currentuserinfo();
$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
include("menu.php"); 
?>
<div id="center_content">
		<?php 
			include (TEMPLATEPATH . '/newMessageScript.php');
			$connection = dbConnect();
			?>
         <div id="adminPm">   
		<?php
			displayMessages();		
		?>  
        <div class="hidden" style="display:none" >
            <div id="hiddenOd"></div>
            <div id="hiddenDo"></div>
            <div id="hiddenData"></div>
        </div>
    <div id="form" style="display:none">
	<form id="customForm">
    <div>
    <textarea id="editMessage" name="editMessage" cols="" rows="" ></textarea>
    </div>
    <div>
    <input class="saveEdit" type="button" id="submit"  name="submit" value="Zapisz edycję" style="width:115px;" />
    </div>
	</form>
</div>
</div>
<?php
dbDisconnect($connection);
?>  
<script>
jQuery('.viewusermessages').live('click',function() {
	var number =  ("#myTable" + $(this).attr("id"))
	$('.tablesorter').hide();
	$('#myTable').show();
	$(number).show();
});

jQuery(document).ready(function() { 
    // extend the default setting to always include the zebra widget. 
    $.tablesorter.defaults.widgets = ['zebra']; 
    // extend the default setting to always sort on the first column 
    $.tablesorter.defaults.sortList = [[0,0]]; 
    // call the tablesorter plugin 
    $("table").tablesorter(); 
}); 

jQuery('.viewmessage').live('click', function() {
	var iddo = $("#do" + $(this).attr("id")).text();
	var nrdiv = "#nr_wiadomosci" + $(this).attr("id");
	var dodiv = "#do" + $(this).attr("id");
	var iddata = $("#data" + $(this).attr("id")).text();
	var datadiv = "#data" + $(this).attr("id");
	var idod = $("#od" + $(this).attr("id")).text();
	var oddiv = "#od" + $(this).attr("id");
	var idtemat = $("#temat" + $(this).attr("id")).text();
	var tematdiv = "#temat" + $(this).attr("id");
	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/admin-view-message.php",	
			type: "POST",		
			data: {do : iddo, data : iddata, od : idod},		
			cache: false,
			success: function (html) {	
			$("#message").html(html);
			$("#form").css("display","none");
			$(dodiv).css("font-weight","normal");		
			$(datadiv).css("font-weight","normal");	
			$(oddiv).css("font-weight","normal");	
			$(tematdiv).css("font-weight","normal");		
			$(nrdiv).css("font-weight","normal");					
			}		
		});	
});

jQuery('.editmessage').live('click', function() {
	var iddo = $("#do" + $(this).attr("id")).text();
	var iddata = $("#data" + $(this).attr("id")).text();
	var idod = $("#od" + $(this).attr("id")).text();

	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/admin-view-message.php",	
			type: "POST",		
			data: {do : iddo, data : iddata, od : idod},		
			cache: false,
			success: function (html) {
			$("#hiddenOd").html(idod);
			$("#hiddenData").html(iddata);
			$("#hiddenDo").html(iddo);
			$("#message").html("");
			$("#form").css("display","block");
			$("textarea#editMessage").val(html);				
			}		
		});	
});

jQuery('.saveEdit').live('click', function() {
	var iddo = $("#hiddenDo").text();
	var iddata = $("#hiddenData").text();
	var idod = $("#hiddenOd").text();
	var idtresc = $("textarea#editMessage").val();				

	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/admin-edit-message.php",	
			type: "POST",		
			data: {tresc : idtresc, do : iddo, data : iddata, od : idod},		
			cache: false,
			success: function (html) {
			$("#message").html(html);
			$("#form").css("display","none");			
			}		
		});	
});

jQuery('.deletemessage').live('click', function() {
	var trnr = "#tr" + $(this).attr("id");
	var iddo = $("#do" + $(this).attr("id")).text();
	var iddata = $("#data" + $(this).attr("id")).text();
	var idod = $("#od" + $(this).attr("id")).text();
	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/admin-delete-message.php",	
			type: "POST",		
			data: {do : iddo, data : iddata, od : idod},		
			cache: false,
			success: function (html) {	
			$("#message").html(html);
			$(trnr).css("display","none");				
			}		
		});	
	
});

jQuery('.sendmessage').live('click', function() {
	var przeslane = "#przeslane" + $(this).attr("id");
	var iddo = $("#do" + $(this).attr("id")).text();
	var iddata = $("#data" + $(this).attr("id")).text();
	var idod = $("#od" + $(this).attr("id")).text();
	$.ajax({
			url: "<?php echo get_bloginfo('template_url') ?>/pm/admin-send-message.php",	
			type: "POST",		
			data: {do : iddo, data : iddata, od : idod},		
			cache: false,
			success: function (html) {	
			$("#message").html(html);	
			$(przeslane).text("Tak");	
			}		
		});	
	
});
</script> 
</div>
</div>      
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>