<?php

namespace Gbomotors_Blocks\Blocks;

class Block_Reviews {
	public function __construct() {
		add_action( 'init', array( $this, 'register_block' ) );
	}

	public function render_block($attributes) {
		$args = array(
			'posts_per_page'   => $attributes['postsToShow'],
			'post_status'      => 'publish',
			'order'            => $attributes['order'],
			'orderby'          => $attributes['orderBy'],
			'suppress_filters' => false,
			'post_type'		   => 'review'
		);

		$class = 'block-review';

		if ( isset( $attributes['className'] ) ) {
			$class .= ' ' . $attributes['className'];
		}

		$recent_posts = get_posts( $args );
		$list_items_markup = '';

		foreach ( $recent_posts as $post ) {
			$list_items_markup .= sprintf(
				'
					<div class="block-review__item">
						<div class="block-review__header">
							<div class="block-review__name">%1$s</div>
							<div class="block-review__model-car">%2$s</div>
						</div>
						<div class="block-review__excerpt">%3$s</div>
					</div>
				',
				get_the_title($post),
				get_field('car_model', $post),
				get_the_excerpt($post)
			);
		}

		return sprintf(
			'
				<div class="%2$s">
					<div class="container">
						<div class="block-review__slider">
							%1$s
						</div>
						<div class="d-flex justify-content-center">
							<a href="#" class="block-review__button">
								%3$s
							</a>
						</div>
					</div>
				</div>
			',
			$list_items_markup,
			esc_attr( $class ),
			__('Посмотреть все отзывы', 'gbomotors')
		);
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
