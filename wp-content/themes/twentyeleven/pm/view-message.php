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
	$result = mysql_query( "UPDATE `s_pm` SET `od_przeczytane` = 1 WHERE `od` = '$name' AND `data`= '$data' AND `od_przeczytane`= 0 ")
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
		$to = 'do';
		$i = 1;
		while($row = mysql_fetch_array($results))
		{
			if ($row['od_przeczytane'] == 0)
			{
				echo '<tr>';
				echo '<td id="wyslane' . $i . '" style="font-weight:bold">' . $i . '</td>';
				echo '<td id="od' . $i . '" style="font-weight:bold">' . $row['od'] . '</td>';
				echo '<td id="do' . $i . '" style="font-weight:bold">' . $row['do'] . '</td>';
				echo '<td id="temat' . $i . '" style="font-weight:bold">' . $row['temat'] . '</td>';
				echo '<td id="data' . $i . '" style="font-weight:bold">' . $row['data'] . '</td>';
				echo '<td style="text-align:center" >' . '<a href="#" class="viewsentmessage" id="' . $i . '">Pokaż wiadomość</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="deletesentmessage" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
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
				echo '<td style="text-align:center">' . '<a href="#" class="viewsentmessage" id="' . $i . '">Pokaż wiadomość</a>' . '</td>';
				echo '<td style="text-align:center">' . '<a href="#" class="deletesentmessage" id="' . $i . '">Usuń wiadomość</a>' . '</td>';
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
	
	$resultt = mysql_query( "SELECT * FROM `s_pm` WHERE `od` = '$name' AND `data`= '$data'");
	$num_rows = mysql_num_rows($resultt);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($resultt))
		{
			echo $row['tresc'];
			/*
		  echo '<table id="myTable3"  border="0" cellpadding="0" cellspacing="1">
	<thead> 
	<tr>
	<th>Od</th>
	<th>Do</th>
	<th>Temat</th>
	<th>Data</th>
	<th>Treść</th>
	</tr>
	</thead>
	<tbody>';  
	  echo '<tr>';
	  echo '<td>' . $row['od'] . '</td>';
	  echo '<td>' . $row['do'] . '</td>';
	  echo '<td>' . $row['temat'] . '</td>';
	  echo '<td>' . $row['data'] . '</td>';
	  echo '<td>' . $row['tresc'] . '</td>';
	  echo '</tr>';	
	echo '   
	</tbody>
	</table>';
	*/
		}	
	}
	else
	{
		echo 'Brak wiadomości do wyświetlenia';	
	}
		mysql_close($connection);
}
else if($typ == "otrzymane")
{
	$od = $_POST['od'];
	$data = $_POST['data'];
	$name = $_POST['name'];
	$result = mysql_query("UPDATE `s_pm` SET `do_przeczytane` = 1 WHERE `do` = '$name' AND `data`= '$data' AND `do_przeczytane`= 0 ")
	or die(mysql_error());  
	$results = mysql_query( "SELECT * FROM `s_pm` WHERE `do` ='$name' AND `do_usuniete` = 0  AND `od_admin` = 1")
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
		
	$result = mysql_query( "SELECT * FROM `s_pm` WHERE `do` ='$name' AND `data`='$data'");
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($result))
		{
			echo $row['tresc'];
			/*
		  echo '<table id="myTable3"  border="0" cellpadding="0" cellspacing="1">
	<thead> 
	<tr>
	<th>Od</th>
	<th>Do</th>
	<th>Temat</th>
	<th>Data</th>
	<th>Treść</th>
	</tr>
	</thead>
	<tbody>';  
	  echo '<tr>';
	  echo '<td>' . $row['od'] . '</td>';
	  echo '<td>' . $row['do'] . '</td>';
	  echo '<td>' . $row['temat'] . '</td>';
	  echo '<td>' . $row['data'] . '</td>';
	  echo '<td>' . $row['tresc'] . '</td>';
	  echo '</tr>';	
	echo '   
	</tbody>
	</table>';
	*/
		}	
	}
	else
	{
		echo 'Brak wiadomości do wyświetlenia';	
	}
		mysql_close($connection);
}
?>
