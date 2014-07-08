<?php 
	$args = array( 
			'post_type'		 => 'profesores',							
			//'tax_query' 	 => array( 
			//						array ('taxonomy' 	=> 'proyectos',	
			//							   'field' 	=> 'slug',										
			//							   'terms' 	=> 'aula-pfc',
			//							   'operator' => 'NOT IN'
			//							  )
			//					),					
			'posts_per_page' => '-1',	
			'orderby'		 => 'title',
			'order'			 => 'ASC'								
			);

		$loop = new WP_Query( $args );	
		$metas= get_post_meta($post->ID,'_my_meta',true); 

			
?>

<div class="my_meta_control"> 
    <p>
        <label>Director Grupo Investigación</label>
        <select name="_my_meta[director-gdi]" id="director-gdi">
        	<option value="">Elegir...</option>        	
			<?php 
				while ( $loop->have_posts() ) : 
						$loop->the_post();					
						$profesor_seleccionado = "";
						if (!empty($meta['director-gdi'])) {
							//establecer el profesor seleccionado						
							if ((int)$metas['director-gdi'] == $post->ID) {
								$profesor_seleccionado = "selected";							
							}					
						} 
						echo "<option value='".$post->ID. "'" . $profesor_seleccionado. ">" . $post->post_title . "</option>";						
				endwhile; // end of the loop. 
			?>
        </select>
    </p>
</div>

<?php 	
	// Reset Post Data
	wp_reset_postdata();
?>	