<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: User Account - add product
 */
 ?>

<?php
ob_start();
$thumb_width = "150";
$thumb_height = "150";

function getHeight($image) {
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}

function getWidth($image) {
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}
	global $wpdb;
	$row_count = $wpdb->get_row("SHOW TABLE STATUS LIKE 's_produkt'", ARRAY_N);	
	$id_count = $row_count[10];
	
function add_scripts()
{
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/css/imgareaselect-default.css" />';

	echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" /></script>';
	
	echo '<script src="http://cdn.jquerytools.org/1.2.6/all/jquery.tools.min.js" /></script>';
		
	echo '
	<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>';
	echo '
	<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />';


	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/ajaxfileupload.js"></script>';
	
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/scripts/jquery.imgareaselect.pack.js"></script>';
	
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/scripts/jquery.tinysort.js"></script>';

	echo '<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>';

	echo "<script type=\"text/javascript\" src=\"".get_bloginfo('template_url')."/js/skrypt.js\"></script>";
	

		echo '
	<script language="javascript">
	jQuery(document).ready(function(){
/*
		jQuery( "#img_list" ).sortable({
			placeholder: "ui-state-highlight",
		});
		
		jQuery("#img_list").bind( "sortupdate", function(event, ui) { 

 			var alt_prev = jQuery(ui.item).prev().attr("alt");
		    var alt_current = jQuery(ui.item).attr("alt");
			var prod_id = jQuery(\'#prod_id\').val();
			
			//jQuery(ui.item).attr({ alt: alt_prev }); // current
			//jQuery(ui.item).prev().attr({ alt: alt_current }); // prev
			// zmienic wartosci atrybutu alt miejscami
			
			jQuery("#test_div").text("alt_prev= "+alt_prev+" prod_id= "+prod_id+" current= "+ alt_current);
			
			
			
			if(typeof alt_prev != \'undefined\')
			{
				alert("defined");
				
				var i=0;
				for(i ; i<=alt_prev ; i++)
				{
					//if(i<alt_prev)
					//{
						jQuery("#img_list li:eq("+i+")").attr({ alt: i });
					}
					else
					{
						jQuery("#img_list li:eq("+i+")").attr({ alt: "z"+alt_current });
					}
				}
			}
			else
			{
				alert("undefined");
				
				
			}
			

			
			
			 jQuery.ajax({
              type: \'POST\',
              url: \'http://localhost/wordpress/wp-content/themes/twentyeleven/rename.php\',
              data: { 
			  			prev_nr: alt_prev, 
						current_nr: alt_current, 
						id_count: prod_id, 
					},
              cache: false,
              success: function(data)
              { 	
					alert("sukces zmiany nazwy");
					
              },
			  error: function(xhr, thrownError)
			  {
				
				//alert(xhr.statusText);
				//alert(\'error: \' +  thrownError);	
			  }
		});
});
*/

		jQuery("#nazwa_produktu").focus();
		
		jQuery(\'#dodaj_nowy_img_btn\').click(function(){
			jQuery("#upload_btn").focus();
		});
		
		jQuery(\'#upload_btn\').click(function(){
			jQuery("#save_thumb").focus();
		});
		
		jQuery(\'#save_thumb\').click(function(){
			jQuery("#dodaj_nowy_img_btn").focus();
		});
		
		
		jQuery(\'.menu\').mouseover(function() {
		jQuery(this).addClass(\'over\');
		
	//ON MOUSEOUT REMOVE THE OVER CLASS
	}).mouseout(function() {
		jQuery(this).removeClass(\'over\');										
	});
	});
	
	</script>
	';
}
add_action('wp_head', 'add_scripts');
?>
<style>
	#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
/*	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
	#sortable li span { position: absolute; margin-left: -1.3em; }*/
	
	
	#sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
	html>body #sortable li { height: 1.5em; line-height: 1.2em; }
	.ui-state-highlight { height: 1.5em; line-height: 1.2em; background-color:#FFC; }
	
#main_contetn{
	min-width:1000px;
	float:left;
	position:relative;
}

#menu_lewe{
	float:left;
	position:relative;
	padding-right:10px;
	margin-left:15px;
}


#center_content{
	float:left;
	margin-left:10px;
	position:relative;
}

div.content dd{
	margin-bottom:0px;	
	margin-left:15px;
}

.modal, .croping {
		background-color:#fff;
		display:none;
		width:690px;
		padding:15px;
		text-align:center;
		border:2px solid #333;
		position:absolute;

		opacity:1;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		-moz-box-shadow: 0 0 50px #ccc;
		-webkit-box-shadow: 0 0 50px #ccc;
}

	
.modal h2 {
		background:url(/img/global/info.png) 0 50% no-repeat;
		margin:0px;
		padding:10px 0 10px 45px;
		border-bottom:1px solid #333;
		font-size:20px;
}

div.content a.menu{
	text-decoration:none;
	color:black;	
}

div.content .menu{
	text-decoration:none;
	color:black;	
}

div.content a:link.on {color:#1fb5da; text-decoration:none; } /* unvisited link */
div.content a:visited.on {color:#1fb5da; text-decoration:none; } /* visited link */
div.content a:hover.on {color:#1fb5da; text-decoration:none; } /* mouse over link */
div.content a:active.on {color:#1fb5da; text-decoration:none; } /* selected link */

div.content a:link.over {color:#1fb5da; text-decoration:none; } /* unvisited link */
div.content a:visited.over {color:#1fb5da; text-decoration:none; } /* visited link */
div.content a:hover.over {color:#1fb5da; text-decoration:none; } /* mouse over link */
div.content a:active.over {color:#1fb5da; text-decoration:none; } /* selected link */
	
div.content .on{
	/*background: #990000;*/
	color:#1fb5da;
	}
	
div.content .over{
	color: #1fb5da;
	/*background: #CCCCCC;*/
	}	
	
</style>
<?
get_header();

?>





asdasdas
<div class="hfeed content">asd
<div id="main_contetn">
<?php

if ( is_user_logged_in() ) {

    global $current_user;
	
	$content = 'Welcome, ';
    $content .= 'User first name: ' . $current_user->user_firstname;
    $content .= 'User last name: ' . $current_user->user_lastname;
	$content .= '!<br>';
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);

	include("menu.php");
?>
<div id="center_content">
<?php
	echo $content;	

// pobranie zawartosci strony z adminowego formularza
//$my_id = $_GET['page_id'];
//$post_id = get_post($my_id);
//$content2 = $post_id->post_content;
//eval($content2);


$path_to_image_directory = "img/products/"; 

		if(!file_exists($path_to_image_directory)) 
		{  
			if(!mkdir($path_to_image_directory, 0777, true)) {  
           	die("There was a problem. Please try again!");  
      		} 
		}

function list_dir($directory)
{
 $dir=opendir($directory);
 $file_list="";

 while($file_name=readdir($dir))
     {
          if(($file_name!=".")&&($file_name!=".."))
         {
         $file_list.="<LI>$file_name<br><img width=\"200\" src=\"$directory$file_name\" alt=\"image\" /></li>";
         }
     }

 closedir($dir);
 echo "
 Pliki w $directory:
 $file_list";
}

function rmdirr($dirname)
{
 // Sanity check
 if (!file_exists($dirname)) {
 return false;
 }

 // Simple delete for a file
 if (is_file($dirname)) {
 return unlink($dirname);
 }

 // Loop through the folder
 $dir = dir($dirname);
 while (false !== $entry = $dir->read()) {
 // Skip pointers
 if ($entry == '.' || $entry == '..') {
 continue;
 }

 // Recurse
 rmdirr("$dirname/$entry");
 }

 // Clean up
 $dir->close();
 return rmdir($dirname);
}

function file_sort_renamer($dirname, $id)
{
  	
 echo $dirname."  ******<br>";	
 
 $filecount = count(glob($dirname . "*_small_*.jpg"));
 echo $filecount;
 $dir=opendir($dirname);	
 
 $index=0;
 $number=0;
 
 while($old_file_name=readdir($dir))
 { 
    if(($old_file_name!=".")&&($old_file_name!=".."))
    {	
		$number=$index%$filecount;	
		$number = "$number";
		$pattern = "([0-9])";
        $new_file_name = preg_filter($pattern, $number, $old_file_name, 1);
		rename($dirname.$old_file_name, $dirname.$new_file_name);	
	
		echo $new_file_name;
		$index++;
    }
	
 }	
}

if(isset($_POST['nazwa_produktu']))
{
	$sql_tagi = $wpdb->get_results("SHOW COLUMNS FROM `s_tag`", ARRAY_N);
	$number = $wpdb->num_rows;
	$output="INSERT INTO s_tag(";

	$x=0;
	foreach ( $sql_tagi as $s )
	{
		if($x>0)
		{		
			if($x < $number-1)
			{
				$output .= $s[0].", "; 
			}
			else
			{
				$output .= $s[0];
			}

		}
		$x++;
	}
	
	$output .= ') VALUES (';

	$x=0;
	foreach ( $sql_tagi as $s )
	{
		if($x>0)
		{		
			$nazwa_tagu = substr_replace($s[0], "", 0, 3);
			
			if($x < $number-1)
			{
				$output .= $_POST['tag_'.$nazwa_tagu.''].", "; 
			}
			else
			{
				$output .= $_POST['tag_'.$nazwa_tagu.''];
			}
		}
		$x++;
	}
	
	$output .= ')';
	
	echo "</br>".$output."</br>";
	
	global $current_user;
	
	$wpdb->query($output);
	
	$id_tag = $wpdb->get_row("SELECT MAX(id) FROM `s_tag`", ARRAY_N);
	
	$projektant_id = $wpdb->get_row("SELECT id FROM s_producenci WHERE id_user = ".$current_user->ID, ARRAY_N);
	
	?>
	</br></br><h1>
    <? echo "projektant: ".$projektant_id[0]; ?>
    </h1></br></br>
	<?
	
    $insert_sql = "INSERT INTO s_produkt(nazwa, cena, opis, dostepnosc, id_projektant, id_kategoria, id_tag, data_dodania) VALUES ('"
		.$_POST['nazwa_produktu']."',"
		.$_POST['cena'].",'"		
		.$_POST['opis']."',
		1,
		".$projektant_id[0].","
		.$_POST['kategoria'].","
		.$id_tag[0].", 
		CURDATE() 
		)"; 
	$wpdb->query($insert_sql);
	
	file_sort_renamer("img/products/$id_count/", $id);

}
else
{
	//global $current_user;
	//$user_id = $current_user->ID;
	
?>
<div id="test_div" style="color:red">asd</div>
<form name="add_product_form" action="http://localhost/wordpress/?page_id=293" method="post" >
<input type="hidden" id="id_count" value="<?php echo $id_count; ?>" />
<table id="add_product_form_table" width="200" border="1">
  <tr>
    <td>nazwa:</td>
    <td><input name="nazwa_produktu" onSubmit="cleartext(); type="text" id="nazwa_produktu" /></td>
  </tr>
  <tr>
    <td>cena:</td>
    <td><input name="cena" type="text" id="cena" /></td>
  </tr>
    <tr>
    <td>opis:</td>
    <td><textarea name="opis" rows="10" id="opis"></textarea></td>
  </tr>
    </tr>
    <tr>
    <td>zdjecia:</td>
    <td>
      <button id="dodaj_nowy_img_btn" class="modalInput" rel="#add_img">Dodaj</button>
      
<ul id="img_list">

    <?php
		$path_to_image_directory = 'img/products/'.$id_count.'/';

		if(file_exists($path_to_image_directory)) 
		{  
			rmdirr($path_to_image_directory);
		}
		
    ?>
   
    </ul>
    </td>
  </tr>
  <tr>
    <td>kategoria:</td>
    <td>
	   <select name="kategoria" id="kategoria"> 
<?php    
	   $sql_cat = $wpdb->get_results("SELECT t_category.id, t_category.nazwa AS cat_nazwa, t_subcategory.subID, t_subcategory.nazwa AS sub_nazwa, t_subcategory.catID FROM `t_category` LEFT JOIN t_subcategory ON t_category.id = t_subcategory.catID", ARRAY_N); 
	   
	  $output = '';
      $x=0;
	  $i=0;
	  $nr=1;
	  $poprzednia_nazwa_kategorii = "";
	  $ooo = "";

	  foreach ( $sql_cat as $s )
      {
		    $aktualna_nazwa_kategorii = $s[1];

			if($aktualna_nazwa_kategorii != $poprzednia_nazwa_kategorii)
			{			 	        
				if($x==1 || $i>0)
				{
					$output .= '</optgroup>';
					$nr++;
					$i=0;
				}
			
              $output .= '<optgroup name="kat_'.$s[2].'" id="kat_'.$s[2].'" label="'.$aktualna_nazwa_kategorii.'">';					
			  $output .= '<option value="'.$s[2].'">'.$s[3].'</option>';

				 $poprzednia_nazwa_kategorii = $aktualna_nazwa_kategorii;
				$x=0;
				$i++;
          }
		  else
		  {
			  $x=1;
			  $i=0;
              $output .= '<option value="'.$s[2].'">'.$s[3].'</option>';			  
		  }		  		 		  
      }

      echo $output;
	 
/* *********************************************************************************  */
?>
    	</select>
    </td>
  </tr>
  
<?php
 
	$sql_tagi = @mysql_query("SHOW COLUMNS FROM `s_tag`"); 
 	 
	$output=""; 
	$x=0;
	while ($s = mysql_fetch_row($sql_tagi)) 
	{
		if($x>0)
		{		
			$nazwa_tagu = substr_replace($s[0], "", 0, 3);
			$output .= '<tr><td>'.$nazwa_tagu.'</td><td><select name="tag_'.$nazwa_tagu.'" id="tag_'.$nazwa_tagu.'">';
			
			$sql_tag = @mysql_query("SELECT * FROM s_".$nazwa_tagu."");			

			while ($t = mysql_fetch_row($sql_tag)) 
			{
				$output .= '<option value="'.$t[0].'">'.$t[1].'</option>';
			}
			echo '</select></td></tr>';
		}
		$x++;
	}
	
	echo $output;
 
    mysql_close($connection);

?>

  </tr>
  <tr>
  
    <td colspan="2"><input name="btn_dodaj_produkt" type="submit" id="btn_dodaj_produkt" value="dodaj produkt"/></td>
    </tr>
<tr style="display:none;"><td colspan="2"><input type="hidden" id="prod_id" value="<?php echo $id_count; ?>" /></td></tr>
</table>
</form>  
<?php
echo $ooo;
} // id="upload_btn"
?>

<!-- yes/no dialog -->


  <div id="add_img" class="modal">
    <div class="error_img_msg">
      <h3></h3>
      <input type="button" id="close_overlay_btn" class="close" value="ok"/>
    </div>
    <div class="uploading_form">
      <h2>
          Dodaj nowe zdjęcie:
      </h2>
      <p>
          Wybierz plik, a następnie dostosuj jego wymiary.
      </p>
      <p>
          <img id="loading" src="loading.gif" style="display:none;"/>
      <form action="" name="form" method="post" enctype="multipart/form-data">
              <input type="file" id="fileToUpload" name="fileToUpload" /> 
              <input id="upload_btn" type="button" onclick="return ajaxFileUpload();" value="Upload" rel="#croping_tool"/> 
      </form>         
      </p>
    </div>  
    <div class="croping_tool" id="croping_tool">
            <img width="500"  style="float: left; margin-right: 10px;" id="thumbnail" alt="Create Thumbnail" />

              <div style="border:1px #e5e5e5 solid; float:left; position:relative; overflow:hidden; width: <?php echo $thumb_width;?>px; height: <?php echo $thumb_height;?>px;">
                <img id="thumbnail_preview" src="" style="position: relative;" alt="Thumbnail Preview" />
              </div>
              <br style="clear:both;"/>
              <form name="thumbnail" action="" method="post">
    			<input type="hidden" name="x1" value="" id="x1" />
				<input type="hidden" name="y1" value="" id="y1" />
				<input type="hidden" name="x2" value="" id="x2" />
				<input type="hidden" name="y2" value="" id="y2" />
				<input type="hidden" name="w" value="" id="w" />
				<input type="hidden" name="h" value="" id="h" />
                <input type="button" class="close"  onclick="return check_value();" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" />
              </form>
    </div>
 </div>


</div>  <?php // closeing <div class="center produktow"> ?>
	
<?php
} else {
    echo 'Welcome, visitor!';
	echo '<br><br> tu bedzie redirect!';
}

?>
</div> <?php // closeing <div class="main_content"> ?>
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>