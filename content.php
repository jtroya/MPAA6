<?php
/**
 * @package Toolbox
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Enlace a %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><i class="icondpa-circle"></i> <?php the_title(); ?></a></h1>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox' ) ); ?>
		<?php 
			if ( has_post_thumbnail()) { 
				echo "<div>";
				echo "<a href='"; the_permalink(); echo "' title='"; the_title_attribute(); echo "'>";
				the_post_thumbnail( 'full' , array('class' => 'fix-image')); 
				/* the_post_thumbnail('full'); */
				echo "</a>";
				echo "</div>";
			}
		?>
		<br/>
		<?php the_excerpt( ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
			
			<span class="date">
			<?php //the_date(); ?>
			</span>
			
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'toolbox' ) );
				if ( $categories_list && toolbox_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php //printf( __( 'en %1$s', 'toolbox' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'toolbox' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'PC: %1$s', 'toolbox' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

<span class="leer-mas">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Enlace a %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>">leer +</a>
</span>

		<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
