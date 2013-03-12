<?php

/**
 * @author 
 * @copyright 2013
 */


function Delete_folder($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            Delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}

   $path = "http:\\naopak.com.pl/img.products/".$_POST['id'];
   Delete_folder($path);

    $connection = @mysql_connect('localhost', 'root', '');
    $db = @mysql_select_db('bollo_naopak', $connection);

	$sql_kat = @mysql_query("DELETE FROM t_subcategory WHERE subID = ".$wiersz."");

	mysql_close($connection);

?>