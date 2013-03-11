<?php

function nPAdbConnect() {
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

function nPAdbDisconnect($connection) {
	mysql_close($connection);
}

function nPAcheckNewProducentApplication() {
	$connection = nPAdbConnect();
	$result = mysql_query( "SELECT * FROM s_zgloszenia WHERE przeczytane = 0")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{	
		echo '<img src="'.get_bloginfo('template_url').'/pm/gears.png" width="50" height="50" alt="Nowe zgłoszenie!" title="Nowe zgłoszenie!"/>';
	}
	nPAdbDisconnect($connection);
}	

				
?>

<?php

if ( is_user_logged_in() ) {
    if ( $current_user->user_login == 'admin' ) {
		nPAcheckNewProducentApplication();
	}
}
?>

<?php
/* WYWOŁANIE --------------------------------------
	  	include (TEMPLATEPATH . '/newMessageScript.php');
*/
?>