<?php

function nMSdbConnect() {
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

function nMSdbDisconnect($connection) {
	mysql_close($connection);
}

function nMScheckNewMessagesAdmin() {
	$connection = nMSdbConnect();
	$result = mysql_query( "SELECT * FROM `s_pm` WHERE `admin_przeczytane` = 0")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{	
		echo '<img src="'.get_bloginfo('template_url').'/pm/yellow_mail.png" width="50" height="50" alt="Nowa wiadomość!" title="Nowa wiadomość!"/>';
		echo 'Od: ';
		$i =0;
		while($rows = mysql_fetch_array($result))
		{
			if ($i != 0)
			{
			 	echo ' ,';
			}	
			echo $rows['od'];
			$i++;
		}
	}
	nMSdbDisconnect($connection);
}	

function nMScheckNewMessages($userName) {
	$connection = nMSdbConnect();
	$result = mysql_query( "SELECT * FROM `s_pm` WHERE `do` = '$userName' AND `do_przeczytane` = 0 AND `do_usuniete` = 0")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{	
		echo '<img src="'.get_bloginfo('template_url').'/pm/yellow_mail.png" width="50" height="50" alt="Nowa wiadomość!" title="Nowa wiadomość!"/>';
	}
	nMSdbDisconnect($connection);
}	
				
?>

<?php

if ( is_user_logged_in() ) {
    if ( $current_user->user_login == 'admin' ) {
		nMScheckNewMessagesAdmin();
	}
	else
	{
		nMScheckNewMessages($current_user->user_login);
	}
}
?>

<?php
/* WYWOŁANIE --------------------------------------
	  	include (TEMPLATEPATH . '/newMessageScript.php');
*/
?>