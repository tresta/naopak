<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>
            <div class="footer_links">
            	 <div class="hr">&nbsp;</div>
                 <div class="footer_left">
                 	Copyright &#169; 2012 NaOpak. Korzystanie z serwisu oznacza akceptację <a class="footer-link" href="http://naopak.com.pl/regulamin">regulaminu</a>
                 </div>
                 <div class="footer_right">
                 	<a href="#" class="footer_link">Stoły</a> | <a href="#" class="footer_link">Krzesła</a> | <a href="#" class="footer_link">Ceramika</a> | <a href="#" class="footer_link">Oświetlenie</a> | <a href="#" class="footer_link">Kanapy i sofy</a> | <a href="#" class="footer_link">Łóżka</a> | <a href="#" class="footer_link">Regały</a> | <a href="#" class="footer_link">Szafy</a> | <a href="#" class="footer_link">Dodatki</a> 
               </div>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php // wp_footer(); ?>


     
</body>
</html>