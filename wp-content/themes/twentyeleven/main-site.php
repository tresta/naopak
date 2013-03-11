<?php
/**

 Template Name: main-site
 
 */
 
function dbConnect() {
	$connection = @mysql_connect('localhost', 'root', '');
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

function generateGallery() {
	$connection = dbConnect();
	$result = mysql_query("SELECT p.prod_id AS prod_id, p.nazwa AS prod_nazwa, p.opis AS prod_opis, p.id_projektant AS prod_id_projektant, p.data_dodania AS prod_data_dodania, s_producenci.nazwa AS s_producent_nazwa, s.zdj1 AS zdj FROM s_produkt AS p INNER JOIN s_producenci ON p.id_projektant = s_producenci.id INNER JOIN s_zdjecia AS s ON s.id_produkt = p.prod_id ORDER BY RAND( )")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{	
		$ul_content = '<ul class="bxslider">';
		
		$i=0;
		while($row = mysql_fetch_array($result))
		{
			$link = 'http://naopak.com.pl/item?prod_id='. $row['prod_id'];

			$li_content .= '<li><div class="prod-content">';
            $li_content .= '<div class="proj-name"><a href="'.$link.'"><img src="http://naopak.com.pl/img/user_logo/logo_5.jpg" /><span>' . $row['s_producent_nazwa'] . '</span></a></div>';
            $li_content .= '<div class="prod-nazwa"><a href="'.$link.'">' . $row['prod_nazwa'] . '</a></div>';
			$content_opis = substr($row['prod_opis'],0,250);
			$li_content .= '<div class="prod-opis"><a href="'.$link.'">'.$content_opis.'</a></div>';
            $li_content .= '</div>';
			$li_content .= '<div class="prod-img"><a href="'.$link.'"><img src="http://naopak.com.pl/img/products/'. $row['prod_id'] . '/'. $row['zdj'] . '_b.jpg"  /></a></div>';
			$li_content .= '</li>';

			$pager_content .= '<a data-slide-index="'.$i.'" href="">'.$i;
			if ($i != $num_rows-1)
			{
				$pager_content .= '</a> | ';
			}
			else
			{
				$pager_content .= ' </a>';
			}
			$i++;
		}
		$ul_content .= $litest.$li_content . '</ul>';
		echo $ul_content.'<div id="bx-pager">';				
		echo $pager_content.'</div>';
	}
	else
	{
		echo 'pusto';
	}
	
	
	dbDisconnect($connection);
}	


function generateNewProducts() {
	$connection = dbConnect();
	$result = mysql_query("SELECT p.prod_id, p.nazwa, z.zdj1, MAX( p.data_dodania ) AS data FROM s_produkt AS p INNER JOIN s_zdjecia AS z ON z.id_produkt = p.prod_id GROUP BY prod_id ORDER BY `data` DESC LIMIT 0 , 6")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{	
		$i=1;
		while($row = mysql_fetch_array($result))
		{
			echo '<div class="new-product-item">';
			echo '<a href ="http://naopak.com.pl/item?prod_id=' . $row['prod_id'] . '" class="new-product-link"  target="_self"><img class="new-product-image" src="http://naopak.com.pl/img/products/' . $row['prod_id'] . "/" . $row['zdj1'] . '_l.jpg" alt="' . $row['nazwa'] . '" title="' . $row['nazwa'] . '" height="160px" width="160px"></a>';
			echo '</div>';		
			$i++;
		}
	}
	else
	{
		echo 'pusto';
	}
	dbDisconnect($connection);
}	

function generatePopularProducts() {
	$connection = dbConnect();
	$result = mysql_query("SELECT s_produkt.prod_id AS prod_id, s_produkt.nazwa AS prod_nazwa, s_produkt.opis AS prod_opis, s_produkt.id_projektant AS prod_id_projektant , s_produkt.data_dodania AS prod_data_dodania, p.id AS s_producent_id, p.nazwa  AS s_producent_nazwa, p.promowany  AS s_producent_promowany FROM s_producenci AS p INNER JOIN s_produkt ON p.id = s_produkt.id_projektant WHERE p.promowany = 1 ORDER BY prod_data_dodania DESC LIMIT 0 , 5")
	or die(mysql_error());  
	$num_rows = mysql_num_rows($result);
	if($num_rows != NULL)
	{	
		echo '<div class="designer-product-item">';
		echo '<a href ="http://naopak.com.pl/user?prod_id=' . $row['s_producent_id'] . '" class="newdesignerproduct-link"  target="_self"><img class="designer-product-image" src="http://naopak.com.pl/img/user/' . $row['s_producent_id'] . "/id_prod_galery_0_" . $row['s_producent_id'] . '.jpg" alt="' . $row['s_producent_nazwa'] . '" title="' . $row['s_producent_nazwa'] . '" height="160px" width="160px"></a>';
		echo '</div>';	
		$i=1;
		while($row = mysql_fetch_array($result))
		{
			echo '<div class="designer-product-item">';
			echo '<a href ="http://naopak.com.pl/item?prod_id=' . $row['prod_id'] . '" class="newdesignerproduct-link"  target="_self"><img class="designer-product-image" src="http://naopak.com.pl/img/products/' . $row['prod_id'] . "/id_prod_galery_0_" . $row['prod_id'] . '.jpg" alt="' . $row['prod_nazwa'] . '" title="' . $row['prod_nazwa'] . '" height="160px" width="160px"></a>';
			echo '</div>';		
			$i++;
		}
	}
	else
	{
		echo 'pusto';
	}
	dbDisconnect($connection);
}	

function add_scripts()
{
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/reg/loginvalidation.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/slider/jquery.galleriffic.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/slider/jquery.opacityrollover.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/bxslider/jquery.bxslider.min.js"></script>';
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/js/bxslider/jquery.bxslider.css" media="screen" />';
}

add_action('wp_head', 'add_scripts');



 get_header(); ?>



<link href="h<?php echo get_bloginfo('template_url') ?>/pm/general.css" rel="stylesheet" type="text/css"/>

		<div id="primary">                               
			<div id="content" role="main">

			<div id="demo_slider" >
               <?php generateGallery(); ?>
			</div>

				<div style="clear: both;"></div>
<div class="home-info-bar">
            <div style="width: 202px;" class="home-info-bar-item">
                <div><strong><a href="#" class="info-bar-title" style="font-size: 14px;">Pierwszy raz u nas?</a></strong></div> 
                <div class="info-bar-image"><a href="#"><img src="http://naopak.com.pl/wp-content/themes/twentyeleven/images/i3.png" height="65" width="50" border="0"></a></div>
                <div class="info-bar-text">Zakupy w DecoBazaar są łatwe i bezpieczne. Załóż konto w 5 minut!<br><a href="#" style="font-size: 9px; line-height: 30px; color:#2BB7D9">WIĘCEJ</a></div>  
            </div>
            <div style="width: 195px;" class="home-info-bar-item">
                <div><strong><a href="#" class="info-bar-title" style="font-size: 14px;">Sprzedaj swoje prace</a></strong></div>
                <div class="info-bar-image"><a href="wspolpraca.html"><img src="http://naopak.com.pl/wp-content/themes/twentyeleven/images/i2.png" height="65" width="65" border="0"></a></div>
                <div class="info-bar-text">Jeśli sam tworzysz ciekawe prace, pokaż je w DecoBazaar.<br><a href="#"  style="font-size: 9px; line-height: 30px; color:#2BB7D9">WIĘCEJ</a></div>
            </div> 
            <div style="width: 181px;" class="home-info-bar-item">
                <div><strong><a href="#" target="_blank" class="info-bar-title" style="font-size: 14px;">My na Facebooku</a></strong></div>
                <div class="info-bar-image"><a href="#" target="_blank"><img src="http://naopak.com.pl/wp-content/themes/twentyeleven/images/i1.png" height="65" width="40" border="0"></a></div>
                <div class="info-bar-text">Odwiedź nasz profil<br>i dołącz do fanów naszej galerii.<br><a href="#" target="_blank"  style="font-size: 9px; line-height: 30px; color:#2BB7D9">WIĘCEJ</a></div>        
            </div> 
                <div style="width: 189px;" class="home-info-bar-item">
                <div><strong><a href="#" class="info-bar-title" style="font-size: 14px;">Prezenty dla każdego</a></strong></div>
                <div class="info-bar-image"><a href="#"><img src="http://naopak.com.pl/wp-content/themes/twentyeleven/images/i4.png" height="65" width="50" border="0"></a></div>
                <div class="info-bar-text">Szukasz prezentu na konkretną okazję? Chętnie Ci pomożemy.<br><a href="#"  style="font-size: 9px; line-height: 30px; color:#2BB7D9">WIĘCEJ</a></div>
            </div>   
            <div style="width: 192px;" class="home-info-bar-item">
                <div class="info-bar-title"><strong  style="font-size:14px;">Zamów nasz newsletter</strong></div>
                <div class="info-bar-image"><img src="http://naopak.com.pl/wp-content/themes/twentyeleven/images/i5.png" height="65" width="55" border="0"></div>
                <div class="info-bar-text">Bądź na bieżąco!.</div> 
            </div>	
</div>

<div>
<div class="new-products-bar">
	<div class="new-product-title">nowości</div>
	<?php generateNewProducts(); ?>
</div>
<div class="designer-products-bar">
	<div class="designer-product-title">projektant dnia</div>
    	<?php generatePopularProducts(); ?>   
</div>
			</div><!-- #content -->
		</div><!-- #primary -->
        
<!-- SLIDER -->
		<script type="text/javascript">
			document.write('<style>.noscript { display: none; }</style>');
		</script>
        <script type="text/javascript">
			jQuery(document).ready(function($){
				
				 $('.bxslider').bxSlider({
				  auto: true,
				  speed: 500,
				  pause: 5000,
				  autoControls: false,
				  infiniteLoop: true,
				  pager: true,
				  pagerCustom: '#bx-pager',
				  controls: false,
				  adaptiveHeight: true
				});
 
				// We only want these styles applied when javascript is enabled
				$('div.navigation').css({'width' : '100%'});
				$('div.content').css('display', 'block');

				// Initially set opacity on thumbs and add
				// additional styling for hover effect on thumbs
				var onMouseOutOpacity = 0.67;
				$('#thumbs ul.thumbs li').opacityrollover({
					mouseOutOpacity:   onMouseOutOpacity,
					mouseOverOpacity:  1.0,
					fadeSpeed:         'fast',
					exemptionSelector: '.selected'
				});
				
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 15,
					preloadAhead:              10,
					enableTopPager:            true,
					enableBottomPager:         true,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900,
					onSlideChange:             function(prevIndex, nextIndex) {
						// 'this' refers to the gallery, which is an extension of $('#thumbs')
						this.find('ul.thumbs').children()
							.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
							.eq(nextIndex).fadeTo('fast', 1.0);
					},
					onPageTransitionOut:       function(callback) {
						this.fadeTo('fast', 0.0, callback);
					},
					onPageTransitionIn:        function() {
						this.fadeTo('fast', 1.0);
					}
				});

			});
		</script> 
<!-- SLIDER --> 

<?php get_footer(); ?>