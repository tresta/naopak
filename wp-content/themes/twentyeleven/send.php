<?php
/**

 Template Name: pm-send
 
 */
 function add_scripts()
	{
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.js"></script>';
		echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/validation.js"></script>';
		
	}

add_action('wp_head', 'add_scripts');
if ( !is_user_logged_in() ) 
{ 
	echo  '<script>location.href = "' . site_url() . '/"</script>';
}
get_header();  ?>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css" type="text/css"/>
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url')?>/css/user_account_style.css" type="text/css"/>
				
<div class="hfeed content">				
	<div id="main_content">

<?php
global $current_user;
get_currentuserinfo();
$user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
include("menu.php"); 
?>
<div id="center_content" style="margin-left:100px;">
<?php
if (isset($_GET['user'])) {
$userName = $_GET['user'];
}

$name = $current_user->user_login;
echo '<div id="name" style="display:none">' . $name . '</div>';

?>

<div class="kontakt" style="width:500px;">
	<form id="customForm" action="<?php the_permalink(); ?>" method="post">
    <div>
        <label for="temat">Temat</label> <input id="temat" type="text" name="temat" /> <span id="tematInfo"> </span>
    </div>
    <div>
        <label for="do">Do</label> <input id="do" type="text" name="do" disabled="disabled" value="<?php echo $userName ?>"/><span id="doInfo"> </span>
    </div>
    <div>
        <label for="tresc">Treść</label> <textarea rows="" cols="" id="tresc" name="tresc">Treść wiadomości...</textarea> <span id="trescInfo"> </span>
    </div>
    <div>
        <input id="submit" type="submit" name="submit" value="Wyślij" style="width:115px;" /> <input id="send" type="reset" name="anuluj" value="Anuluj" style="width:115px;" />
    </div>
	</form>
</div>

<?php
if (isset($_POST['submit'])) {

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

$temat = $_POST["temat"];
$do = $_POST["do"];
$od = $name;
$tresc = $_POST["tresc"];
$data = current_time('mysql');
if($do == "admin")
{
	$result = mysql_query("INSERT INTO s_pm (id, temat, od, do, data, tresc, od_przeczytane, do_przeczytane, od_usuniete, do_usuniete, od_admin, admin_przeczytane, admin_usuniete) VALUES (NULL, '$temat', '$od', '$do', '$data', '$tresc', 0, 0, 0, 0, 1, 0, 0);") or die(mysql_error());  
	
}
else
{
	$result = mysql_query("INSERT INTO s_pm (id, temat, od, do, data, tresc, od_przeczytane, do_przeczytane, od_usuniete, do_usuniete, od_admin, admin_przeczytane, admin_usuniete) VALUES (NULL, '$temat', '$od', '$do', '$data', '$tresc', 0, 0, 0, 0, 0, 0, 0, );") or die(mysql_error());
}
echo "Wiadomość została wysłana.";
mysql_close($connection);
}
?>				</div>
                </div>    
		</div><!-- #primary -->

<?php get_footer(); ?>