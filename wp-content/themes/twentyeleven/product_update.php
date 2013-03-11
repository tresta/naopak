<?
    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);

	$params = $_POST;
	echo print_r($params);
	$output = '';
	$tagi = '';
	//$test="   <br>*** tagi na pozycjach= ";
	$end=0;
	while (current($params)) 
	{
		$key = key($params);
		$cur_par = current($params);
		
		//$test.=$key." -- ".$cur_par." == ";
		if(next($params) === false)
		{
			$end = 1;	
		}
		
		if(strpos($key,'prod_id')!==false)
		{
			continue;
		}
		if(strpos($key,'id_projektant')!==false)
		{
			continue;
		}
		if(strpos($key,'id_tag')!==false)
		{
			continue;
		}
		
		if(strpos($key,'tag_')===false)
		{
		    
			if($key==="nazwa_produktu")
				$key='nazwa';

			if($key==="kategoria")
				$key='id_kategoria';
				
			if(!is_numeric($cur_par))
			{
			  $output .= $key." = '".$cur_par."'";
			}
			else
			{
			  $output .= $key." = ".$cur_par;
			}
			
			if(current($params)&&$key!=='id_kategoria')
			{
			  $output .= ", ";
			}	
		}
		else
		{
			$key = str_replace('tag_','id_',$key);
			$tagi .= $key." = ".$cur_par.", ";
		}
		
		
	}
	
	$tagi=substr($tagi,0,-2);

$sql_update_tag_query = "UPDATE s_tag SET ";
$sql_update_tag_query .= $tagi;
$sql_update_tag_query .= " WHERE id = ".$_POST['id_tag'];

$sql_update_product_query = "UPDATE s_produkt SET "; 
$sql_update_product_query .= $output;
$sql_update_product_query .= " WHERE s_produkt.prod_id = '".$_POST['prod_id']."'";


	@mysql_query($sql_update_tag_query);
	@mysql_query($sql_update_product_query);
	
	mysql_close($connection); 



	echo $sql_update_product_query;
	//echo $sql_update_tag_query."<br>".$sql_update_product_query;
	

?>