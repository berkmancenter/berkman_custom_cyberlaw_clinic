<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon" style="padding: 0 0 5px;">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

            <div id="footer-menu" style="padding:5px;margin-bottom:5px;text-align:center;border-bottom:1px dotted #BBB;"></div>
			<div id="site-generator">
				<?php do_action( 'twentyten_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyten' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyten' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'twentyten' ), 'WordPress' ); ?></a>
			</div><!-- #site-generator -->

        <div style="font-size: 11px;">
            <div id="privacy" style="float:left; width:100px;"><a style="font-size:11px;" href="/about/privacy-policy">Privacy Policy</a></div>
            <div id="footer-contact" style="float:right;width:100px;text-align:right"><a style="font-size:11px;" href="/contact">Contact</a></div>
            <div id="street-address" style="text-align:center;">
                23 Everett Street, 2nd Floor, Cambridge, MA 02138<br>
            </div>
            <div id="telephone" style="text-align:center;">
                +1 (617) 495-7547 (Phone)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+1 (617) 495-7641 (Fax)<br>
            </div>
            <div id="license" style="padding: 2px;text-align:center;">
                Unless otherwise noted this site and its contents are licensed under a <a style="font-size: 11px; margin: 0;" href="http://creativecommons.org/licenses/by/3.0/" style="margin: 0">Creative Commons Attribution 3.0 Unported</a> license.
            </div>
        </div>
		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
