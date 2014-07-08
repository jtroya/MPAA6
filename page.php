<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

<div class="span5" id="primary">
	<div  id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php //comments_template( '', false ); ?>

		<?php endwhile; // end of the loop. ?>
	
	</div><!-- #content -->
</div><!-- #primary -->

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

<?php get_footer(); ?>