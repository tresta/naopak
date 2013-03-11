<?php

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);
		
	$tabela = $_POST['tabela'];
	$kol1 = $_POST['kolumna_1'];
	$kol2 = $_POST['kolumna_2'];

	$sql_tag_table = @mysql_query("CREATE TABLE IF NOT EXISTS s_".$tabela." (
  							".$kol1." int(11) NOT NULL AUTO_INCREMENT,
  							".$kol2." varchar(20) NOT NULL,
  							PRIMARY KEY (id)
							) ENGINE=InnoDB  DEFAULT CHARSET=latin2");
							
	$sql_tag_kolumn = @mysql_query("ALTER TABLE s_tag ADD id_".$tabela." INT NOT NULL");	
						
/*
CREATE TABLE IF NOT EXISTS s_".$tabela." (
  ".$wartosc." int(11) NOT NULL AUTO_INCREMENT,
  ".$wiersz." varchar(20) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2


ALTER TABLE `s_tag` ADD `rozmiar` INT NOT NULL
*/	
	
	//echo json_encode(array("nazwa" => $tabela, "kolumna1" => $kol1, "kolumna2" => $kol2));
	
	//mysql_close($connection);
?>