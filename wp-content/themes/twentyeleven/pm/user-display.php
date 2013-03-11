<?php
/**

 Template Name: user-display
 
 */
 
function displayUsers($id) {
	$start = $id * 30 - 30;
	$connection = dbConnect();
	$result = mysql_query("SELECT * FROM wpp_posts LIMIT $start, 30")//("SELECT user.ID, user.user_login AS userLogin, user.user_registered AS dateRegistered, dane.id, dane.imie AS name, dane.nazwisko AS surname FROM wpp_users AS user INNER JOIN s_dane_kontaktowe AS dane ON user.ID = dane.id_uzytkownik  WHERE user.user_login != 'admin' ORDER BY user.user_login LIMIT $start, 30")
	or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	echo '                    
						<table id="myTable"  class="tablesorter" border="0" cellpadding="0" cellspacing="1">
		<thead> 
		<tr>
		<th class="{sorter: false}">L.p.</th>
		<th>Nazwa użytkownika</th>
		<th>Data zarejestrowania</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th class="{sorter: false}"></th>
		</tr>
		</thead>
		<tbody>'; 
	if($num_rows != NULL)
	{		
		$i=1;
		while($row = mysql_fetch_array($result))
		{
			echo '<tr>';
			echo '<td id="nr' . $i . '" style="font-weight:bold">' . $i . '</td>';
			echo '<td id="login' . $i . '">' . $row['userLogin'] . '</td>';
			echo '<td>' . $row['dateRegistered'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['surname'] . '</td>';
			echo '<td style="text-align:center" ><a href="#" class="viewuser" id="' . $i . '">Pokaż szczegóły</a></td>';
			echo '</tr>';
			echo '<tr>';	
			$i++;
		}
	}
	else
	{
		echo '<tr>';
		echo '<td colspan="6">Brak użytkowników do wyświetlenia</td>';
		echo '</tr>';
	}
	echo '   
	</tbody>
	</table>';
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
 
function add_scripts() {
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery-latest.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/pm/jquery.tablesorter.js"></script>';	
}
add_action('wp_head', 'add_scripts');

get_header(); ?>


<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/tabela.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/pm/general.css"type="text/css"/>
<?php 
include(TEMPLATEPATH . '/pm/tc_pageNav.php'); ?>

		<div id="primary">
			<div id="content" role="main">
                <?php
if ( is_user_logged_in() ) {
    if ( $current_user->user_login == 'admin' ) {


?>
				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
             <div id="displayUsers">  
              <?php 
	 			$connection = dbConnect();
				$id = 1;
				if ($_GET['id'] != null)
				{
					$id = $_GET['id'];
				}
				$result = mysql_query("SELECT * FROM wpp_posts")//("SELECT ID FROM wpp_users WHERE user_login != 'admin'")				
				or die(mysql_error());
				dbDisconnect($connection);
				$ilosc = mysql_num_rows($result);	
				$totalRecords = mysql_num_rows($result);
				$page_nav = new tc_pageNav($totalRecords);
				$page_nav->setPerPage(10);
				$page_nav->calculate();
				$page_nav->showInactiveNavigator(false);
				$page_nav->setNavType(0);
				echo($page_nav->printNavBar());
				/*
				if( !is_int($ilosc/30) )
				{
					$ile_stron = ceil($ilosc/30);
				} 
				elseif( is_int($ilosc/30) ) {
					$ile_stron = ($ilosc/30);
				}
				echo $ile_stron;
				if( $ile_stron >= ($id))
				{
					echo 'W bazie znajduje się: ' . $ilosc .  ' rekordów.  Strony z wynikami: [<a href =' . get_permalink() .  '?id=1>Pierwsza</a>]... ';
				}	
				if( $ile_stron >= ($id+1))
				{
					echo ' [<a href =' . get_permalink() .  '?id=' . ($id+1) . '>' . ($id+1) . '</a>]';
				}
				if( $ile_stron >= ($id+2))
				{
					echo ' [<a href =' . get_permalink() .  '?id=' . ($id+2) . '>' . ($id+2) . '</a>]';
				}				 
				if( $ile_stron >= ($id+3))
				{
					echo ' [<a href =' . get_permalink() .  '?id=' . ($id+3) . '>' . ($id+3) . '</a>]';
				}				 
				if( $ile_stron != '1' )
				{
					echo ' ... [<a href =' . get_permalink() .  '?id=' . $ile_stron . '>Ostatnia</a>]';
				}*/
				//displayUsers($id);	
			  ?>            
             </div>
<?php 
	}
} 
?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>