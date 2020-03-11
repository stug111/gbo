<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gbomotors
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="container">
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					?>
					<button type="button" class="site-button"><?php _e('Написать отзыв', 'gbomotors'); ?></button>
				</header><!-- .page-header -->
				<div class="row">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/archives/review' );

					endwhile;

					?>
				</div>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
