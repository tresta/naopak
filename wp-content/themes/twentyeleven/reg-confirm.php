<?php
/**

 Template Name: reg-confirmation
 
 */
function clear_unverified_old_users()
{
	$result = mysql_query( "SELECT `ID` FROM `wpp_users` WHERE `verified` = '0' AND `user_registered` < DATE_SUB(NOW(), INTERVAL 24 HOUR)");
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($result))
		{
			$old_id = $row['ID'];
		}
	}
	$result1 = mysql_query( "DELETE FROM `wpp_users` WHERE `ID` = '$old_id'")
	or die(mysql_error());
	$result2 = mysql_query( "DELETE FROM `wpp_usermeta` WHERE `user_id` = '$old_id'")
	or die(mysql_error());
	$result3 = mysql_query( "DELETE FROM `s_dane_kontaktowe` WHERE `id_uzytkownik` = '$old_id'")
	or die(mysql_error());
}
				
get_header();

?>
				
 <div id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>               
                <div class="conf">
                <div class="echo">
                <?php
				
				
				if (isset($_GET['u'])) {
				  $var1_confirm = $_GET['u'];
				}
				$var2_confirm = "-1";
				if (isset($_GET['t'])) {
				  $var2_confirm = $_GET['t'];
				}
				
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
				$result = mysql_query( "SELECT `ID` FROM `wpp_users` WHERE `user_login` = '$var1_confirm' AND `token` = '$var2_confirm'")
				or die('Dane niepoprawne. Spróbuj zarejestrować się ponownie.');  
				$num_rows = mysql_num_rows($result);
				if($num_rows != NULL)
				{
					while($row = mysql_fetch_array($result))
					{
						$user_id = $row['ID'];
						$results = mysql_query( "UPDATE `wpp_users` SET `verified` = 1 WHERE `ID` = '$user_id'")
						or die(mysql_error());  
						echo 'Użytkownik zarejestrowany pomyślnie. Można się już logować.';
					}
				}
				
				clear_unverified_old_users();
				mysql_close($connection);
				?>
                </div>
                </div>    
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>