<?php
/**

 Template Name: reg-pass-remind
 
 */
function add_scripts()
{
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/reg/jquery.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/reg/loginvalidation.js"></script>';
	
}
add_action('wp_head', 'add_scripts');

if ( is_user_logged_in() ) 
{ 
	echo  '<script>location.href = "' . site_url() . '/"</script>';
}

get_header();

?>
		
<link href="<?php echo get_bloginfo('template_url') ?>/reg/general.css" rel="stylesheet" type="text/css"/>
        		
 <div id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>               
                <div class="login">                
                <div class="przypomnienieForm">
                <form id="customForm" action="<?php the_permalink(); ?>" method="post">
                <div>
                        <label for="remindPassEmail">Twój adres email:</label><input id="remindPassEmail" type="text" name="remindPassEmail" /> 
                        <br />
                        <span id="emailInfo"></span>
                    </div>
                     <div>
						<input id="submit" type="submit" name="przypomnienieForm" value="Przypomnij hasło" style="width:115px;" />
                    </div>
                        </form>
                </div>
                  <div class="echo">
                <?php
				function md5_pass($length = 6)
				{
					return substr(md5(rand().rand()), 0, $length);
				}
 				
				if (!empty($_POST['przypomnienieForm'])) {
				   $remindPassEmail = $_POST["remindPassEmail"];
				   if ( username_exists(  $remindPassEmail ) )
					{
					    $newPass = md5_pass();
						$hashedPass = wp_hash_password($newPass); 		
						$result = mysql_query( "UPDATE `wpp_users` SET `user_pass` = '$hashedPass' WHERE `user_login` = '$remindPassEmail';")
						or die(mysql_error());  
						$subject = 'NaOpak - przypomnienie hasła';
						$message = 'Witamy,<br><br>';
						$message .= 'Dla Twojego konta w NaOpak.pl został wypełniony formularz przypomnienia hasła. W celach bezpieczeństwa zostało wygenerowane dla Ciebie nowe hasło. Prosimy o jego zmianę po zalogowaniu.<br><br>';
						$message .= 'Nowe hasło:<br><br>';
						$message .= urlencode($newPass) . '<br><br>';
						$message .= 'Pozdrawiamy,<br><br>';
						$message .= 'zespół NaOpak.pl';
						$header_info = 'MIME-Version: 1.0' . "\r\n";
						$header_info .= 'Content-type: text/html; charset=utf-8' . "\r\n";
						$header_info .= 'From: NaOpak.pl \r\n';
						mail($remindPassEmail, $subject, $message, $header_info);	
						echo 'Email z przypomnieniem hasła został wysłany.';
					}
					else
					{
						echo 'Nazwa użtkownika nie istnieje!';	
					}
				}
				?></div>
                </div>    
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>