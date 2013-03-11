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

	$od = $_POST['od'];
	$do = $_POST['do'];
	$data = $_POST['data'];
	$result = mysql_query( "UPDATE `s_pm` SET `admin_przeczytane` = 1 WHERE `od` = '$od' AND `do`= '$do'  AND `data`= '$data' AND `admin_przeczytane`= 0 ")
	or die(mysql_error());  
	
	$resultt = mysql_query( "SELECT * FROM `s_pm` WHERE `od` = '$od' AND `do`= '$do' AND `data`= '$data' AND `admin_usuniete` = 0");
	$num_rows = mysql_num_rows($resultt);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($resultt))
		{
			echo $row['tresc'];
		}	
	}
	else
	{
		echo 'Brak wiadomości do wyświetlenia';	
	}
		mysql_close($connection);

?>