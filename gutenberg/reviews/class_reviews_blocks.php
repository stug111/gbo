<?php

namespace Gbomotors_Blocks\Blocks;

use Gbomotors;

class Block_Reviews {
	private $post_type;

	public function __construct() {
		$this->post_type = 'review';

		add_action( 'init', array( $this, 'register_block' ) );
	}

	public function render_block($attributes) {
		$args = array(
			'posts_per_page'   => $attributes['postsToShow'],
			'post_status'      => 'publish',
			'order'            => $attributes['order'],
			'orderby'          => $attributes['orderBy'],
			'suppress_filters' => false,
			'post_type'		   => $this->post_type
		);

		$class = 'block-review';

		if ( isset( $attributes['className'] ) ) {
			$class .= ' ' . $attributes['className'];
		}

		$recent_posts = get_posts( $args );

		ob_start();
		?>
		<div class="<?php echo esc_attr( $class ); ?>">
			<div class="container">
				<div class="block-review__slider">
					<?php
						foreach ( $recent_posts as $post ) {
							echo Gbomotors::review(get_the_title($post), get_field('car_model', $post), get_the_excerpt($post));
						}
					?>
				</div>
				<div class="d-flex justify-content-center">
					<a href="<?php echo get_post_type_archive_link($this->post_type); ?>" class="block-review__button">
						<?php _e('Посмотреть все отзывы', 'gbomotors') ?>
					</a>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	public function register_block() {
		register_block_type(
			'gbomotors/reviews',
			array(
				'attributes'      => array(
					'className'       => array(
						'type' => 'string',
					),
					'postsToShow'     => array(
						'type'    => 'number',
						'default' => 3,
					),
					'order'           => array(
						'type'    => 'string',
						'default' => 'desc',
					),
					'orderBy'         => array(
						'type'    => 'string',
						'default' => 'date',
					),
				),
				'render_callback' => array( $this, 'render_block' ),
			)
		);

	}
}
