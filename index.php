<?php get_header(); ?>

<div class="span5">

			<?php if ( have_posts() ) : ?>

				<?php //toolbox_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>

				<?php 
					$args = array(
						'post_type' => 'post',
						'orderby' 	=> 'dtmf',
						'order'		=> 'desc',
						'paged' 	=> $paged
					);
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						while ( have_posts() ) : the_post();
							/* Include the Post-Format-specific template for the content.
							 * If you want to overload this in a child theme then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );							
						endwhile;	
					}
				?>
				
				<div id="pagination"><p>
					<?php 
						$big = 999999999; // need an unlikely integer
						$pagination=paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $query->max_num_pages,
							'prev_next' => false
						) );
						echo $pagination; 
					?></p>
				</div>

				<?php //toolbox_content_nav( 'nav-below' ); ?>


			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'No hay noticias', 'toolbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Parece que no encuentras lo que estas buscando.', 'toolbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

</div><!-- span5-->


<div class="span2" id="agenda">
	<h1 class="widget-title"><i class="icondpa-circle"></i>
		Agenda MPAA
	</h1>

	<?php			
		$args = array(
			'post_type' => 'post',
			'cat' => '261',
			'meta_key' => 'fechaevento',
		    'orderby' => 'meta_value',
		    'posts_per_page' => -1,
		    'order' => 'ASC',
		    'meta_query' => array(
		       array(
		           'key' => 'fechaevento',
		           'value' => date('Y').'-'.date('m').'-'.date('d').'-'.date('H').date('i'),
		           'compare' => '>=',
		       )
		  	)
			
		);
		$query = new WP_Query( $args );
		$diasem=array(0,'L','M','X','J','V','S','D');
		$meses=array(0,'ENE','FEB','MAR','ABR','MAY','JUN','JUL','AGO','SEP','OCT','NOV','DIC');
		$agenda=array();
		$agenda[0]=array(); //esta semana
		$agenda[1]=array(); //semana que viene
		$agenda[2]=array(); //otros
		$semanaahora=date('W');
		
		if ( $query->have_posts() ) : 			
	?>
	<?php $i=0; ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); 
				$fecha=get_post_meta(get_the_ID(),'fechaevento',true);
				$arrfecha=explode('-',$fecha); 
				$diasemana=date("N", mktime(0, 0, 0, $arrfecha[1], $arrfecha[2], $arrfecha[0]));
				$semana=date("W", mktime(0, 0, 0, $arrfecha[1], $arrfecha[2], $arrfecha[0]));
				if ($semana==$semanaahora) { $voyen=0; } else if ($semana==($semanaahora+1)) { $voyen=1; } else { $voyen=2; }
				$agenda[$voyen][$i]=array();
				$agenda[$voyen][$i]['diasem']=$diasem[$diasemana];
				$agenda[$voyen][$i]['dia']=$arrfecha[2];
				$agenda[$voyen][$i]['mes']=$meses[intval($arrfecha[1])];
				$agenda[$voyen][$i]['ano']=$arrfecha[0];
				$agenda[$voyen][$i]['hora']=substr($arrfecha[3],0,2).':'.substr($arrfecha[3],2,2);
				$agenda[$voyen][$i]['title']=get_post_meta(get_the_ID(),'tituloevento',true);
				$agenda[$voyen][$i]['lugar']=get_post_meta(get_the_ID(),'lugarevento',true);
				$agenda[$voyen][$i]['link']=get_permalink();
				$i++;
	?>			
	<?php endwhile; ?>
	<?php else : ?>
		<p class="cuando">No hay eventos programados</p>
	<?php endif;
		if (count($agenda[0])) { 
	?>
	<p class="cuando">ESTA SEMANA</p>
	<?php
		foreach($agenda[0] as $ev) {
	?>
			<div class="agendaelem big">
				<div class="evento">
					<div class="ratio"></div>
					<div class="datos">
						<p class="dia"><?php echo $ev['diasem'].$ev['dia'] ?></p>
						<p class="hora"><?php echo $ev['hora'] ?></p>
					</div>
				</div>
				<div class="info">
					<h5><a href="<?php echo $ev['link']; ?>"><?php echo $ev['title']; ?></a></h5>
					<p><?php echo $ev['lugar']; ?></p>
				</div>
			</div>
			<?php
				} }
			if (count($agenda[1])) {
			?>
			<p class="cuando">PR&Oacute;XIMA SEMANA</p>
			<?php
				if (date('N')>=5) { $como='big'; } else { $como='small'; }
				foreach($agenda[1] as $ev) {
			?>
			<div class="agendaelem <?php echo $como; ?>">
				<div class="evento">
					<div class="ratio"></div>
					<div class="datos">
						<p class="dia"><?php echo $ev['diasem'].$ev['dia'] ?></p>
						<p class="hora"><?php echo $ev['hora'] ?></p>
					</div>
				</div>
				<div class="info">
					<h5><a href="<?php echo $ev['link']; ?>"><?php echo $ev['title']; ?></a></h5>
					<p><?php echo $ev['lugar']; ?></p>
				</div>
			</div>
			<?php
			} }
	  		if (count($agenda[2])) {
	  		?>
	  		<p class="cuando">M&Aacute;S ADELANTE</p>
	  		<?php
				foreach($agenda[2] as $ev) {
			?>
			
			<div class="agendaelem <?php echo $como; ?>">
				<div class="evento">
					<div class="ratio"></div>
					<div class="datos">
						<p class="dia"><?php echo $ev['diasem'].$ev['dia'] ?></p>
						<p class="hora"><?php echo $ev['hora'] ?></p>
					</div>
				</div>
				<div class="info">
					<h5><a href="<?php echo $ev['link']; ?>"><?php echo $ev['title']; ?></a></h5>
					<p><?php echo $ev['lugar']; ?></p>
				</div>
			</div>			

	 <?php }} ?>	
</div>


<div class="span2">	
	<?php get_sidebar(); ?>		
</div>

</div><!--row-fluid-->
<?php get_footer(); ?>