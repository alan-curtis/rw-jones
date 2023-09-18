<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RWJones
 */

$subtitle = get_field('subtitle');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="title-section">
	<div class="page-banner-clipper clipper-svg">
			<div class="title-container">
			<?= the_title(); ?>
			<?php if( !empty( $subtitle ) ): ?>
			<div class="subtitle">
				<?= $subtitle; ?>
			</div>
			<?php endif; ?>
			</div>
			<svg width="1440" height="90" viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V90H1440V0C1440 49.7056 1117.65 90 720 89.9999C322.355 89.9999 0.000531296 49.7056 7.86869e-06 0H0Z" fill="#D9D9D9"/>
            </svg>
		</div>
	</div>
	<?php rwjones_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rwjones' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'rwjones' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
