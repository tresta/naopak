<?php

/**
 * @author 
 * @copyright 2012
 */


	if(isset($_GET['show']))
	{
		$show = $_GET['show'];
        echo "<br />Test:  ".$show;
	}

?>

<form action="http://naopak.com.pl/test.php" method="get" enctype="text/plain">
<input type="text" value="bla bla bla" name="cos" />
<input type="submit" value="dodaj" name="asdasd" />
</form>