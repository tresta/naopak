<?php
/**
 * @package Template For WordPress
 *
 * @author: Wery
 * @url: http://www.CustomWeb.com
 
 Template Name: Podsumowanie Zakupow Template
 
 */
 ?>
<?php
session_start();
//$nr_zamowienia = uniqid();
function add_scripts()
{
	
	/*echo '
		<meta http-equiv="refresh" content="5; url=http://localhost/wordpress/?page_id=197">
	';*/
}
add_action('wp_head', 'add_scripts');

get_header();
?>

<?



if ( is_user_logged_in() ) {

		//include("koszyk_functions.php");
		
		global $current_user;
		$customerid=$current_user->ID;
		
		echo $_SESSION['test'];
		
		$max=count($_SESSION['cart']);
		$pid=$_SESSION['cart'][0]['productid'];
		//echo "</br>max = $max</br>id = $pid";
		
		$result = mysql_query("SELECT MAX(id) FROM `s_zamowienie`");
		$last_id=mysql_fetch_array($result);
			
		date_default_timezone_set('Europe/Warsaw');
		$nr_zamowienia = date('m/d/Y/H:i:s', time()).'/'.$customerid;

		//echo "</br>nr_zamowienia = $nr_zamowienia</br>";
		
		$projektanci =  array();
		for($i=0;$i<$max;$i++)
		{
			$pid=$_SESSION['cart'][$i]['productid'];
			$result = mysql_query("SELECT id_projektant FROM `s_produkt` WHERE id =".$pid);
			$producent=mysql_fetch_array($result);
			if(!in_array($producent[0], $projektanci))
				array_push($projektanci, $producent[0]);
		}
		
		$array_size = count($projektanci);
		$i = 0;
		//echo "</br>array_size = $array_size</br>";
		for($i; $i < $array_size ;$i++)
		{			
				mysql_query("INSERT INTO s_zamowienie (nr_zamowienia, data, id_klient, id_projektant) VALUES ('$nr_zamowienia', NOW(), '$customerid', '$projektanci[$i]')") or die(mysql_error());
		
		}
		//$orderid=mysql_insert_id();								
	
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];	

			mysql_query("INSERT INTO s_zamowione_produkty (id_zamowienia, id_produkt) VALUES ('$nr_zamowienia', '$pid')") or die(mysql_error());		
			mysql_query("UPDATE s_produkt SET dostepnosc = '0' WHERE s_produkt.id = ".$pid) or die(mysql_error());	
		}
		
		mysql_query("INSERT INTO s_historia (id_zamowienia, id_status, komentarz, data) VALUES ('$nr_zamowienia', '1', 'realizacja', NOW())") or die(mysql_error());

		

		unset($_SESSION['cart']);
		
}
else
{
	//echo '<script> location.href =
	echo "<center><b>Najpierw sie zaloguj !<b></center><br /><br />";
}
?>

<div class="hfeed content">
<?php
if ( is_user_logged_in() ) {

echo "Klient o id: $customerid dokonał zamówienia o id: $nr_zamowienia </br>";

echo "Dziękujemy za złożenie zamówienia w naszym portalu. Potwierdzenie zamówienia zostało wysłane na Twoją skrzynkę pocztową. </br>Zapraszamy ponownie !</br></br>Za 5 sekund zostaniesz przeniesiony do swojego konta.";
}
?>
</div>
<?php get_footer(); ?>
