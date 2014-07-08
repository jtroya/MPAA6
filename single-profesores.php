<?php
/**
 * Template para Profesores
 */

get_header(); ?>

<!-- <div id="primary"> -->
	<div class="span7 single" >
		<div id="content" role="main">
			<?php //query_posts( 'post_type=unidad_docente'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'profesores' ); ?>				
			<?php endwhile; // end of the loop. ?>
			<?php wp_reset_postdata();  ?>
		</div><!-- #content -->
	</div><!-- #span7 -->	
 <!-- #primary -->
 <div  class="span2">	 
 </div>

<?php get_footer(); ?>