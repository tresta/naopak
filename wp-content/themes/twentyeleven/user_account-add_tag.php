<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: User Account - add tags
 
 */	
?>

<?php

function add_scripts()
{
echo '<link href="'.get_bloginfo('template_url').'/js/add_prod/general2.css" rel="stylesheet" type="text/css"/>';
		
echo"
<script type=\"text/javascript\">
jQuery(document).ready(function(){	
	
	
	jQuery(\"input[id^='tag_delete']\").click(function(){
	
          var nazwa_tabeli = jQuery(this).attr(\"name\");
  
          jQuery.ajax({
              type: 'POST',
              url: '".get_bloginfo('template_url')."/tag_table_delete.php',
              data: { tabela: nazwa_tabeli },
              cache: false,
              success: function()
              { 		
				  jQuery('#table_tagi').find('td:contains(\''+nazwa_tabeli+'\')').parent().remove();
			  }
         });
     });
	 
	 
	      jQuery(\"input[id^='form_delete']\").click(function(){
  
          var nazwa_tabeli = jQuery(this).attr(\"name\");
          var nr = jQuery(\"#tag_\"+nazwa_tabeli).val();		
          
          jQuery.ajax({
              type: 'POST',
              url: '".get_bloginfo('template_url')."/tag_delete.php',
              data: { tabela: nazwa_tabeli, wiersz: nr },
              cache: false,
              success: function()
              { 			
                  jQuery(\"select#tag_\"+nazwa_tabeli+\" option[value=\" + nr+\"]\").remove();
              }
         });
     });
         
		  jQuery(\"input[id^='form_edit']\").click(function() {
          var nr = jQuery(this).attr(\"id\").substr(9);
          var nazwa_tabeli = jQuery(this).attr(\"name\");
          var wartosc = jQuery(\"select#tag_\"+nazwa_tabeli+\" option:selected\").text();
          jQuery(\"input[id^='edit_tag_tb_\"+nr+\"']\").val(wartosc);
           
          jQuery(\"input[id^='form_add\"+nr+\"']\").hide();
          jQuery(\"input[id^='form_edit\"+nr+\"']\").hide();
          jQuery(\"input[id^='form_delete\"+nr+\"']\").hide();
          
          if(jQuery('#edit_tag_tb_'+ nr).length){
          jQuery(\"input[id^='edit_tag_tb_\"+nr+\"']\").closest(\"tr\").show();
          jQuery(\"input[id^='edit_tag_btn_\"+nr+\"']\").closest(\"tr\").show();
          
          }else{
              
              jQuery(\"#tag_buttons\" + nr + \" tr:last\").after('<tr><td colspan=\"2\"><input name=\"edit_tag_tb_'+nr+'\" type=\"text\" id=\"edit_tag_tb_'+nr+'\" value=\"'+wartosc+'\" /><input type=\"button\" id=\"edit_tag_btn_'+nr+'\" name=\"edit_tag_btn_'+nr+'\" value=\"OK\"/></td></tr>');
              
          }          
      });   
      
      jQuery(\"input[id^='form_add']\").live('click', function(){
          var nr = jQuery(this).attr(\"id\").substr(8);		
          
          jQuery(\"input[id^='form_add\"+nr+\"']\").hide();
          jQuery(\"input[id^='form_edit\"+nr+\"']\").hide();
          jQuery(\"input[id^='form_delete\"+nr+\"']\").hide();
      
          // zanezpieczyc przed ponownym wstawieniem !!!
          if(jQuery('#add_tag_tb_'+ nr).length){
          jQuery(\"input[id^='add_tag_tb_\"+nr+\"']\").closest(\"tr\").show();
          jQuery(\"input[id^='add_tag_btn_\"+nr+\"']\").closest(\"tr\").show();
          }else{
              jQuery(\"#tag_buttons\" + nr + \" tr:last\").after('<tr><td colspan=\"2\"><input name=\"add_tag_tb_'+nr+'\" type=\"text\" id=\"add_tag_tb_'+nr+'\" value=\"\"/><input type=\"button\" id=\"add_tag_btn_'+nr+'\" name=\"add_tag_btn_'+nr+'\" value=\"OK\"/></td></tr>');
          }		
      });  
      
      jQuery(\"input[id^='add_tag_btn_']\").live('click', function(){
  
          jQuery(\"input[id^='edit_tag_tb_\"+nr+\"']\").val(\"\");
          var nr = jQuery(this).attr(\"id\").substr(12);
  
          jQuery(\"#tag_buttons\" + nr + \" tr:eq(1)\").hide();
          jQuery(\"#tag_buttons\" + nr + \" tr:eq(2)\").hide();
          
          jQuery(\"input[id^='form_add\"+nr+\"']\").show();
          jQuery(\"input[id^='form_edit\"+nr+\"']\").show();
          jQuery(\"input[id^='form_delete\"+nr+\"']\").show();
          
          var nazwa_tabeli = jQuery(\"input[id^='form_add\"+nr+\"']\").attr(\"name\");
          var wartosc = jQuery(\"input[id^='add_tag_tb_\"+nr+\"']\").val(); 
  
         jQuery.ajax({
              type: 'POST',
              url: '".get_bloginfo('template_url')."/tag_add.php',
              data: { tabela: nazwa_tabeli, nowa_wartosc: wartosc},
              cache: false,
              success: function(data)
              { 		
                  jQuery(\"select#tag_\"+nazwa_tabeli).append('<option value=\"'+data+'\">'+wartosc+'</option>');
                  jQuery(\"#tag_\"+nazwa_tabeli).val(data);
              }
         });
      });   
  
      jQuery(\"input[id^='edit_tag_btn_']\").live('click', function(){

          var nr = jQuery(this).attr(\"id\").substr(13);
          
          jQuery(\"#tag_buttons\" + nr + \" tr:eq(1)\").hide();
          jQuery(\"#tag_buttons\" + nr + \" tr:eq(2)\").hide();
          
          jQuery(\"input[id^='form_add\"+nr+\"']\").show();
          jQuery(\"input[id^='form_edit\"+nr+\"']\").show();
          jQuery(\"input[id^='form_delete\"+nr+\"']\").show();
          
          var nazwa_tabeli = jQuery(\"input[id^='form_add\"+nr+\"']\").attr(\"name\");
          var nr_wiersza = jQuery(\"#tag_\"+nazwa_tabeli).val();			
          var wartosc = jQuery(\"input[id^='edit_tag_tb_\"+nr+\"']\").val();

          jQuery.ajax({
              type: 'POST',
              url: '".get_bloginfo('template_url')."/tag_edit.php',
              data: { tabela: nazwa_tabeli, wiersz: nr_wiersza, nowa_wartosc: wartosc },
              cache: false,
              success: function(data)
              {
                  jQuery(\"select#tag_\"+nazwa_tabeli+\" option[value=\" + nr_wiersza+\"]\").replaceWith('<option value=\"'+nr_wiersza+'\">'+wartosc+'</option>');
                  jQuery(\"select#tag_\"+nazwa_tabeli).val(nr_wiersza);
              }
         });
      });
      
      jQuery(\"#dodaj_nowy_tag_btn\").click(function(){
  
        jQuery(\"#dodaj_nowy_tag_btn\").closest(\"tr\").hide();     
        
        if(jQuery('#dodaj_nowy_tag_tb').length){
  
              jQuery(\"#dodaj_nowy_tag_tb\").closest(\"tr\").show();
        }else{
              jQuery(\"#table_tagi tr:last\").after('<tr><td colspan=\"3\"><input type=\"text\" id=\"dodaj_nowy_tag_tb\" /><input type=\"button\" id=\"dodaj_nowy_tag_ok_btn\" name=\"dodaj_nowy_tag_ok_btn\" value=\"dodaj\"/></td></tr>');
        }	
     });
     
      jQuery(\"#dodaj_nowy_tag_ok_btn\").live('click', function(){
		  
		  var nr = parseInt(jQuery('input[id^=\"form_add\"]').last().attr(\"id\").substr(8))+1;
		  var x = nr+\"\";
		  jQuery(\"#dodaj_nowy_tag_btn\").closest(\"tr\").show();
          jQuery(\"#dodaj_nowy_tag_tb\").closest(\"tr\").hide();
        
		   var nazwa_tabeli = jQuery(\"#dodaj_nowy_tag_tb\").val();
		 
         jQuery.ajax({
              type: 'POST',
              url: '".get_bloginfo('template_url')."/tag_create_new.php',
              data: { tabela: nazwa_tabeli, kolumna_1: 'id', kolumna_2: 'nazwa' },
              cache: false,
			  success: function()
			  {
				jQuery('#table_tagi tr:last').prev().before('<tr><td>'+nazwa_tabeli+'</td><td><select name=\"tag_'+nazwa_tabeli+'\" id=\"tag_'+nazwa_tabeli+'\"></td><td><table id=\"tag_buttons'+x+'\"><tr><td><input type=\"button\" id=\"form_add'+x+'\" name=\"'+nazwa_tabeli+'\" value=\"dodaj\"/></td><td><input type=\"button\" id=\"form_edit'+x+'\" name=\"'+nazwa_tabeli+'\" value=\"edytuj\"/></td><td><input type=\"button\" id=\"form_delete'+x+'\" name=\"'+nazwa_tabeli+'\" value=\"usuń\"/></td></tr></table></td></tr>');

              }
         });
         
     });
	
	jQuery('.menu').mouseover(function() {
		jQuery(this).addClass('over');
	}).mouseout(function() {
		jQuery(this).removeClass('over');										
	});
	
	
}); // ******************************** END OF jQuery(document).ready

</script>";
}
add_action('wp_head', 'add_scripts');

get_header();

?>

<style>

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

dd{
	margin-bottom:0px;	
	margin-left:15px;
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

<div class="hfeed content">
<div id="main_contetn">
<?php

if ( is_user_logged_in() ) {

    global $current_user;
	
	//$content = 'Welcome, ';
    //$content .= 'User first name: ' . $current_user->user_firstname;
   // $content .= 'User last name: ' . $current_user->user_lastname;
	//$content .= '!<br>';
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
	$content .= '<br>';
	$content .= 'user ID: '.$current_user->ID.'<br>';
	include("menu.php");

?>
<div id="center_content">

  <table id="table_tagi" width="200" border="1">
      <tr><th>rodzaj tagu</th><th colspan="2">nazwa tagu</th></tr>
  <?php
  
  
   	global $wpdb;
		  
	 $sql_cat = $wpdb->get_results("SHOW COLUMNS FROM `s_tag`", ARRAY_N); 
       
      $output=""; 
      $x=0;
	  foreach ( $sql_cat as $s )
      {
          if($x>0)
          {		
              $nazwa_tagu = substr_replace($s[0], "", 0, 3);
              $output .= '<tr><td>'.$nazwa_tagu.'</td><td>
              <select name="tag_'.$nazwa_tagu.'" id="tag_'.$nazwa_tagu.'">';
              
              $sql_tag = $wpdb->get_results("SELECT * FROM s_".$nazwa_tagu."", ARRAY_N);			
              
             // while ($t = mysql_fetch_row($sql_tag)) 
			  foreach ( $sql_tag as $t )
              {
                  $output .= '<option value="'.$t[0].'">'.$t[1].'</option>';
              }
              
              $output .= 
              '</select>
              </td>
              <td>		
                  
              <table id="tag_buttons'.$x.'">
              <tr>
              <td>
              <input type="button" id="form_add'.$x.'" name="'.$nazwa_tagu.'" value="dodaj"/>
              </td>
              <td>
              <input type="button" id="form_edit'.$x.'" name="'.$nazwa_tagu.'" value="edytuj"/>
              </td>
              <td>			
              <input type="button" id="form_delete'.$x.'" name="'.$nazwa_tagu.'" value="usuń wpis"/>
              </td>
			  <td>
			  <input type="button" id="tag_delete" name="'.$nazwa_tagu.'" value="usuń tag"/>
			  </td>
              </tr>
              </table>
  
              </td>
              </tr>';
          }
          $x++;
      }
      
      echo $output;
     // mysql_close($connection);
  ?>
  
  
  <tr><td colspan="3">
  <input type="button" id="dodaj_nowy_tag_btn" name="dodaj_nowy_tag_btn" value="dodaj nowy rodzaj"/>
  </td></tr>
  <?php
  /*
  <tr><td colspan="3">
  <form id="dodaj_nowy_tag_form" action="" method="post">
  <input type="text" id="dodaj_nowy_tag_tb" />
  <input type="button" id="dodaj_nowy_tag_ok_btn" name="dodaj_nowy_tag_ok_btn" value="dodaj"/>
  </form>
  </td></tr>
  */
  ?>
  </table>

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