<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

?>



<div class="row-fluid">

	<div class="span12">

	<footer id="colophon" role="contentinfo">

		<div id="site-generator">

			<center>

				<?php bloginfo( 'name' ); ?>

				<span class="sep"> | </span>	

				<?php bloginfo( 'description'); ?>	

				<br>

				<span class="footer-text">Diseño web: Luis Gallego Pachón // Programación web: Jorge Troya Moreno</span>

			</center>			

		</div>

	</footer><!-- #colophon -->

</div>

</div>

</div><!--container-fluid-->



<?php wp_footer(); ?>

<script src="<?php bloginfo( 'template_url' ); ?>/bootstrap/js/bootstrap.js"></script>
<!-- Fichero de analytics -->
<?php include_once("analyticstracking.php") ?>

</body>

</html>