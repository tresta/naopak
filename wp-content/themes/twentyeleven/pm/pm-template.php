<?php
/**

 Template Name: Private Messages
 
 */
 
 get_header(); ?>
<link rel="stylesheet" href="http://naopak.com.pl/wp-content/themes/twentyeleven/pm/tabela.css" type="text/css" />
<link href="http://naopak.com.pl/wp-content/themes/twentyeleven/pm/general.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://naopak.com.pl/wp-content/themes/twentyeleven/pm/jquery.js"></script>
<script type="text/javascript" src="http://naopak.com.pl/wp-content/themes/twentyeleven/pm/validation.js"></script>
<script type="text/javascript" src="http://naopak.com.pl/wp-content/themes/twentyeleven/pm/jquery-latest.js"></script> 
<script type="text/javascript" src="http://naopak.com.pl/wp-content/themes/twentyeleven/pm/jquery.tablesorter.js"></script> 

<script>
$(document).ready(function() { 
    // extend the default setting to always include the zebra widget. 
    $.tablesorter.defaults.widgets = ['zebra']; 
    // extend the default setting to always sort on the first column 
    $.tablesorter.defaults.sortList = [[0,0]]; 
    // call the tablesorter plugin 
    $("table").tablesorter(); 
}); 

</script>

<script language="JavaScript">
var idsp=new Array('tab1','tab2','tab3');
function switchidp(id){	
	hideallidsp();
	showdivp(id);
}
function hideallidsp(){
	for (var i=0;i<idsp.length;i++){
		hidedivp(idsp[i]);
	}		  
}
function hidedivp(id) {
		document.getElementById(id).style.display = 'none';
}
function showdivp(id) {
		document.getElementById(id).style.display = 'block';
}
</script>

		<div id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				
                <div id="tabswitcher">
                <a href="#" onclick="javascript:switchidp('tab1');">Wyślij wiadomość</a><br />
                <a href="#" onclick="javascript:switchidp('tab2');">Otrzymane wiadomości</a><br />
                <a href="#" onclick="javascript:switchidp('tab3');">Wysłane wiadomości</a><br />
                </div>
                
				<div id='tab1'>
                	Wyślij wiadomość<br />
                    <?php
					
global $current_user, $wp_roles, $mpdb;
$mydb = new wpdb('root','','bollo_naopak','localhost');

echo "rola: ";
if( $current_user->id )  {
	foreach($wp_roles->role_names as $role => $Role) {
		if (array_key_exists($role, $current_user->caps))
			echo $role;
	}
}
$name = $current_user->user_login;
echo " link: ";
echo the_permalink();

function validateTemat($temat){
		//if it's NOT valid
		if(strlen($temat) < 1)
			return false;
		//if it's valid
		else
			return true;
}

function validateTresc($tresc){
	//if it's NOT valid
	if(strlen($tresc) < 1)
		return false;
	//if it's valid
	else
		return true;
}
?>


<div class="kontakt">
	<form id="customForm" action="<?php the_permalink(); ?>" method="post">
<div>
	<label for="temat">Temat</label> <input id="temat" type="text" name="temat" /> <span id="tematInfo"> </span>
</div>
<div>
	<label for="do">Do</label> <input id="do" type="text" name="do" readonly="readonly" value="lolson"/>
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

$temat = $_POST["temat"];
$do = $_POST["do"];
$od = $name;
$tresc = $_POST["tresc"];
$data = current_time('mysql');

echo "Wiadomość została wysłana.";

$mydb->query("INSERT INTO s_pm (id, temat, od, do, data, tresc, od_przeczytane, do_przeczytane, od_usuniete, do_usuniete) VALUES (NULL, '$temat', '$od', '$do', '$data', '$tresc', NULL, NULL, NULL, NULL);");
}
?>
                </div>
                
                <div id='tab2' style="display:none">
                
                	Otrzymane wiadomości
                    
  <table id='myTable1'  class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
<thead> 
<tr>
<th class='{sorter: false}'>L.p.</th>
<th>Do</th>
<th>Data</th>
<th class='{sorter: false}'></th>
<th class='{sorter: false}'></th>
</tr>
</thead>
<tbody>    
<?php  
$do = 'do';
$results = $mydb->get_results("SELECT * FROM  s_pm WHERE `do` =  '$name'");
$i = 1;
foreach ($results as $id) 
			{
				echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . $id->$do . '</td>';
				echo '<td>' . $id->data . '</td>';
				echo '<td style="text-align:center">' . 'Pokaż wiadomość' . '</td>';
				echo '<td style="text-align:center">' . 'Usuń wiadomość' . '</td>';
				echo '</tr>';
				$i++;
			}
?>     
</tbody>
</table>      

                </div>
                <div id='tab3' style="display:none">
                	Wysłane wiadomości
                    
                    <table id='myTable1'  class='tablesorter' border='0' cellpadding='0' cellspacing='1'>
<thead> 
<tr>
<th class='{sorter: false}'>L.p.</th>
<th>Do</th>
<th>Data</th>
<th class='{sorter: false}'></th>
<th class='{sorter: false}'></th>
</tr>
</thead>
<tbody>    
<?php  
$do = 'do';
$results = $mydb->get_results("SELECT * FROM  s_pm WHERE `od` =  '$name'");
$i = 1;
foreach ($results as $id) 
			{
				echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . $id->$do . '</td>';
				echo '<td>' . $id->data . '</td>';
				echo '<td style="text-align:center">' . 'Pokaż wiadomość' . '</td>';
				echo '<td style="text-align:center">' . 'Usuń wiadomość' . '</td>';
				echo '</tr>';
				$i++;
			}
?>     
</tbody>
</table>




<p id="target"><img src="http://naopak.com.pl/wp-content/themes/twentyeleven/images/naopak_logo.png" height="100" width="100" alt="lol"  /></p>
<div id="result"></div>
  
<script>
$('#target').click(function() {
$.post("http://naopak.com.pl/wp-content/themes/twentyeleven/pm/test.php", { name: 'John' },
				function(data){
				    $('#result').html(data.returnFromValue);
				}, "json");
});
/*
$('#target').click(function() {
  $.ajax({
	url: "http://naopak.com.pl/wp-content/themes/twentyeleven/pm/test.php",
	type: 'POST',	
	data: {name : 'John'},
	dataType: "html",
	success: function(){
   	$("#result").load('http://naopak.com.pl/wp-content/themes/twentyeleven/pm/test.php');}
});
});
*/
</script>
                </div>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>