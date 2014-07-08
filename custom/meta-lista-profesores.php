<?php 
	
		$metas= get_post_meta($post->ID,'_my_meta',true); 
			
?>

<div class="my_meta_control"> 
    <p>
        <label>Director Grupo Investigación</label>
        <select name="_my_meta[director-gdi]" id="director-gdi">
        	<option value="">Elegir...</option>        	
			<?php 
			$args = array( 
			'post_type'		 => 'profesores',					
			'posts_per_page' => '-1',	
			'orderby'		 => 'title',
			'order'			 => 'ASC'								
			);

				$loop = new WP_Query( $args );					

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