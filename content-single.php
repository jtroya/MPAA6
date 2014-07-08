<?php
/**
 * @package Toolbox
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><i class="icondpa-circle"></i> <?php the_title(); ?></h1>

		<div class="entry-meta">
			<span class="date">
			Publicado el <?php the_date(); ?>
			</span>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

		<footer class="entry-meta">
		
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'toolbox' ) );
				if ( $categories_list && toolbox_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '%1$s', 'toolbox' ), $categories_list ); ?>.
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



		<?php edit_post_link( __( 'Edit', 'toolbox' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
