<?php
/**

 Template Name: reg-changePass
 
 */
 
function changePass($newPass, $userId)
{
	wp_update_user( array ('ID' => $userId, 'user_pass' => $newPass )) ;
} 
 
function checkOldPass($oldPass, $userLogin)
{
	$connection = dbConnect();
	$result = mysql_query( "SELECT * FROM wpp_users WHERE user_login = '$userLogin'")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{
		while($row = mysql_fetch_array($result))
		{
			$realPass = $row['user_pass'];
		}
	}
	$wp_hasher = new PasswordHash(8, TRUE);
	if($wp_hasher->CheckPassword($oldPass, $realPass)) {
	   return true;
	}
	else {
	   return false;
	}
	dbDisconnect($connection);
} 
 
function dbConnect() {
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
	return $connection;
}

function dbDisconnect($connection) {
	mysql_close($connection);
}
 
function add_scripts()
{
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/reg/jquery.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/reg/changepassvalidation.js"></script>';
	
}
$passChanged = false;
if (isset($_POST['submit'])) {

	$oldPass = $_POST["pass1"];
	$newPass =  $_POST["pass3"];

	$hashedNewPass = wp_hash_password( $newPass );
	global $current_user;
    get_currentuserinfo();
    $userLogin = $current_user->user_login;
	$userId = $current_user->ID;
	if(checkOldPass($oldPass, $userLogin))
	{
		changePass($newPass, $userId);
		$passChanged = true;	
	}
	else 
	{
		$passChanged = false;
	}
}

add_action('wp_head', 'add_scripts');
if ( !is_user_logged_in() ) 
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
<div class="rejestracja">                
<div class="rejestracjaForm">
	<form id="customForm" action="<?php the_permalink(); ?>" method="post">
    <div class="leftForm">
        <label for="pass1">Aktualne hasło:</label><input id="pass1" type="password" name="pass1" /> 
        <br />
        <span id="pass1Info"></span>
    </div>
    <div >
        <label for="pass2">Powtórz aktualne hasło:</label><input id="pass2" type="password" name="pass2" /> 
        <br />
        <span id="pass2Info"></span>
    </div>
    <div class="formclear"></div>
    <div>
        <label for="pass1">Nowe hasło:</label><input id="pass3" type="password" name="pass3" />
        <br /> 
        <span id="pass3Info"></span>
    </div>
    <div>
	<input id="submit" type="submit" name="submit" value="Zmień hasło" style="width:115px;" /> <input id="send" type="reset" name="anuluj" value="Anuluj" style="width:115px;" />
</div>
	</form>
</div>
<div class="formclear"></div>

 </div>  
 <div class="echo"> 
 <?php
if (isset($_POST['submit'])) {
	if ($passChanged)
	{
		echo 'Hasło zostało zmienione.';
	}
	else
	{
		echo 'Wprowadzone hasło jest złe, spróbuj jeszcze raz.';
	}
}
	?>
    </div>
                </div>
    
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>