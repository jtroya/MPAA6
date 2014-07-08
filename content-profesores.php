<?php
/**
 * Permite ver la información de los profesores
 * 
 */

//get_header(); ?>

<?php
	$metas=get_post_meta($post->ID,'_my_meta',true);	

	$connected = new WP_Query( array(
	  'connected_type' => 'gdi_to_profesor',
	  'connected_items' => get_queried_object(),
	  'nopaging' => true,
	) );
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<!-- Display profesores contents -->
	<div class="entry-content">
		<div class="row-fluid">
			<div class="span8">
			<header class="entry-header">					       
		        <h1 class="entry-title"><?php the_title(); ?></h1>        
			</header>
				<?php the_post_thumbnail( array( 125, 125 ) ); ?>
				<br>
				<p></p>
				<?php the_content(); ?>

			</div>
			<div class="span4">
				<header class="entry-header">
					<h3 class="entry-title"><i class="icondpa-circle"></i> Contacto</h3>												
				</header>
					<ul>
						<?php if (!empty($metas['email-profesor'])) { echo "<li>" . $metas['email-profesor'] ."</li>" ; } ?>
						<?php if (!empty($metas['blog-profesor']))  { echo "<li>" . $metas['blog-profesor'] ."</li>" ; } ?>
					</ul>

				<header>
					<h3 class="entry-title"><i class="icondpa-circle"></i> Grupos de Investigación</h3>
					
				</header>
					<?php 
						if ($connected->have_posts()) {														
						 	while ($connected->have_posts() ) :
						 		$connected->the_post();	
						 		echo "<a href='";						 		
						 		the_permalink(); 
						 		echo "'>";
						 		the_title();
						 		echo "</a>";
						 	endwhile;
						} else {
							echo "Actualmente no pertenece a ningún grupo<br>";
						}
						// Prevent weirdness
						wp_reset_postdata();
					?>

			</div>
		</div>
	</div>
</article>					
