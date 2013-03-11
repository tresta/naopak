<?php header('Content-Type: text/html; charset=utf-8'); 
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
$typ = $_POST['typ'];
if($typ == "wyslane")
{
	$do = $_POST['do'];
	$data = $_POST['data'];
	$name = $_POST['name'];
	
	$result = mysql_query( "UPDATE `s_pm` SET `od_usuniete` = 1 WHERE `od` = '$name' AND `data`= '$data' AND `od_usuniete`= 0 ")
	or die(mysql_error());  
	$results = mysql_query( "SELECT * FROM `s_pm` WHERE `od` ='$name' AND `od_usuniete` = 0")
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
	<tbody>'  ; 
	if($num_rows != NULL)
	{
		
		$i = 1;
		while($row = mysql_fetch_array($results))
		{
		echo '<tr>';
		echo '<td id="wyslane' . $i . '">' . $i . '</td>';
		echo '<td id="od' . $i . '">' . $row['od'] . '</td>';
		echo '<td id="do' . $i . '">' . $row['$do'] . '</td>';
		echo '<td id="temat' . $i . '">' . $row['temat'] . '</td>';
		echo '<td id="data' . $i . '">' . $row['data'] . '</td>';
		echo '<td style="text-align:center">' . '<a href="#" class="viewsentmessage" id="' . $i . '">Pokaż wiadomość</a>' . '</td>';
		echo '<td style="text-align:center">' . '<a href="#" class="deletesentmessage" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
		echo '</tr>';
		$i++;
		}			 
	}
	else
	{
		echo 'pusto';	
	}
	echo '   
	</tbody>
	</table>';
	
	echo 'Wiadomość usunięta.';
	mysql_close($connection);
	echo
'<script>
 
    // extend the default setting to always include the zebra widget. 
    $.tablesorter.defaults.widgets = ["zebra"]; 
    // extend the default setting to always sort on the first column 
    $.tablesorter.defaults.sortList = [[0,0]]; 
    // call the tablesorter plugin 
    $("table").tablesorter(); 
	
</script>';
}
else if($typ == "otrzymane")
{
	
}

?>
