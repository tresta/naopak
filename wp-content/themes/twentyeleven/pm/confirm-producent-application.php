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
	
	$nazwa = $_POST['nazwa_producenta'];
	$data = $_POST['data'];
	$id_user = $_POST['id_user'];
	$wp_capabilities = 'a:1:{s:9:"producent";s:1:"1";}';
	$result1 = mysql_query("INSERT INTO s_producenci (id, nazwa, id_uzytkownik) VALUES (NULL, '$nazwa', '$id_user');")
	or die(mysql_error());  
	$result2 = mysql_query("UPDATE s_zgloszenia SET zatwierdzone = 1 WHERE id_user = '$id_user'")
	or die(mysql_error());  	
	$result2 = mysql_query("UPDATE wpp_usermeta SET meta_value = '$wp_capabilities' WHERE user_id = '$id_user' AND meta_key = 'wpp_capabilities'")
	or die(mysql_error());  	
	$result = mysql_query( "SELECT user_email FROM wpp_users WHERE ID = '$id_user'")
	or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($result))
		{
			$email = $row['user_email'];
		}
	}  
	$subject = 'NaOpak - formularz zgłoszeniowy projektanta';
	$message = 'Witamy,<br><br>';
	$message .= 'Twoje zgłoszenie zostało zaakceptowane, po zalogwaniu na stronie NaOpak.pl możesz modyfikować swój profil i wystawiać przedmioty na sprzedaż.<br><br>';
	$message .= 'Pozdrawiamy,<br><br>';
	$message .= 'zespół NaOpak.pl';
	$header_info = 'MIME-Version: 1.0' . "\r\n";
	$header_info .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$header_info .= 'From: NaOpak.pl \r\n';
	mail($email, $subject, $message, $header_info);	
	echo 'Zgłoszenie przyjęte, nowy producent utworzony. Powiadomienie do zainteresowanej osoby zostało wysłane e-mailem.';
	mysql_close($connection);

?>