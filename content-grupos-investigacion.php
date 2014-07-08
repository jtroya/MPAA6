<?php
/**
 * Permite ver la información de los grupos de investigación
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
		<div class="row-fluid header-gdi">
			<div class="span1">
				<div class="logo-gdi">
					<?php the_post_thumbnail(array(60,60)); ?>
				</div>				
			</div>
			<div class="span11">				
				<header class="entry-header">					       
			        <h1 class="title-gdi"><?php the_title(); ?></h1>
			        <p>
			        	<?php 
			        		if (!empty($metas['website-gdi'])) {
			        			echo "<i class='icon-world'></i>";
			        			echo "<a class='link-gdi' target='_blank' href='". $metas['website-gdi'] ."'>".  $metas['website-gdi'] ."</a>";
			        		}
			        	?>			        	
			        </p>        
				</header>
				<div class="row-fluid">
					<?php if ($connected->have_posts()) { $connected->the_post(); } else { echo ":-("; } ?>	
					<div class="span6">
						<article>
							<div class="row-fluid">
								<div class="span3">
									<div class="avatar-director-gdi">
										<?php the_post_thumbnail();  ?>
									</div>
								</div>
								<div class="span8 inv-responsable">
									<h4>Investigador Responsable</h4>
									<h3>
										<?php
										    /***
											echo "<a href='";
											the_permalink();
						 					echo "'>";
											the_title(); 
											echo "</a>";
											***/
										?> 
										<?php the_title(); ?>
									</h3>
									<!--  <p>Tipo de Profesor</p> -->
								</div>
							</div>
						</article>
					</div>
					
				</div>
				<br>
				<header>
					<h4 class="entry-title">Investigadores Asociados</h4>					
				</header>

				<div class="row-fluid">
					<?php 
						if ($connected->have_posts()) {							
						 	while ($connected->have_posts() ) :
						 		$connected->the_post();	
						 		echo "<div class='box-miembro-gdi'>";
						 		echo "<div class='box-avatar-miembro-gdi'>";
						 		the_post_thumbnail(array(60, 60));
						 		echo "</div>";
						 		echo "<div class='box-nom-miembro-gdi'>";						 		
						 		/***
						 		echo "<h5><a href='";
						 		the_permalink();
						 		echo "'>";
						 		the_title();
						 		echo "</a></h5>";
						 		***/
						 		
						 		echo "<h5>";
						 		the_title();
						 		echo "</h5>";

						 		//echo "<p>Tipo Profesor</p>";
						 		echo "</div></div>";
						 		
						 	endwhile;
						 	
						} else {
							echo "Actualmente no tienen ningún miembro :-( <br>";
						}
						// Prevent weirdness
						wp_reset_postdata();
					?>	
					<!--					
					<div class='box-miembro-gdi'>
						<div class='box-avatar-miembro-gdi'></div>
						<div class='box-nom-miembro-gdi'>
							<h5>Nombre y Apellidos</h5>
							<p>Tipo Profesor</p>
						</div>
					</div>		
					-->

				</div>

					<?php /***
						if ($connected->have_posts()) {
							echo "<ul>";
						 	while ($connected->have_posts() ) :
						 		$connected->the_post();	
						 		echo "<li><a href='";						 		
						 		the_permalink(); 
						 		echo "'>";
						 		echo "<div class='logo-gdi'>";
						 		the_post_thumbnail(array(60, 60));
						 		echo "</div>";
						 		the_title();						 		
						 		//echo "<br>" . p2p_get_meta( get_post()->p2p_id, 'role', true );
						 		echo "</a></li>";
						 	endwhile;
						 	echo "</ul>";
						} else {
							echo "Actualmente no tienen ningún miembro :-( <br>";
						}
						// Prevent weirdness
						wp_reset_postdata();
						***/
					?>						
				
			</div>
		</div>
	</div>
</article>					
