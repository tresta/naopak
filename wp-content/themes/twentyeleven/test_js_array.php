<?

 $testowy_cosik = $_POST['cosik'];
 $array = $_POST['array'];
 
 echo "\n\n";
 foreach ($array as $item) 
 { 
 	echo $item . " "; 
 } 
 
 echo "    --  ".$testowy_cosik;
 echo "\n\n";

	for($i=1;$i<=7;$i++)
    { 
	  $sql .= "zdj".($i)." = '".$array[$i-1]."', ";
    }	

	$sql .= " WHERE id_produkt = '5022efdca8b86'";
	
	echo $sql;
?>