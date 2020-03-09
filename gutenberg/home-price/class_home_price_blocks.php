<?php

namespace Gbomotors_Blocks\Blocks;

class Block_Home_Price {
	public function __construct() {
		add_action( 'init', array( $this, 'register_block' ) );
	}

	public function render_block($attributes) {
		$args = array(
			'post_status'      => 'publish',
			'suppress_filters' => false,
			'post_type'		   => 'services',
			'posts_per_page'   => 10,
		);

		$class = 'home-price';

		if ( isset( $attributes['className'] ) ) {
			$class .= ' ' . $attributes['className'];
		}

		$recent_posts = get_posts( $args );

		ob_start();
		?>
			<div class="<?php echo esc_attr( $class ); ?>">
				<div class="container">
					<div class="home-price__carousel">
						<?php foreach ( $recent_posts as $post ) : ?>
							<div class="home-price__item <?php if (get_field('favorite', $post->ID)) echo "home-price__item--favorite" ?>">
								<?php if ( get_field('favorite', $post->ID) ): ?>
									<div class="home-price__marker">
										<div class="home-price__marker-block">
											<?php _e('Рекомендуем', 'gbomotors'); ?>
										</div>
									</div>
								<?php endif; ?>
								<div class="home-price__title">
									<?php echo get_the_title($post->ID); ?>
								</div>
								<div class="home-price__main-price">
									<?php _e('4 цилиндра', 'gbomotors'); ?>
									<span><?php echo get_field('4cilindra', $post->ID); ?> ₽</span>
								</div>
								<div class="home-price__prices">
									<div class="home-price__price">
										<?php _e('6 цилиндров', 'gbomotors'); ?>
										<span><?php echo get_field('6cilindra', $post->ID); ?> ₽</span>
									</div>
									<div class="home-price__price">
										<?php _e('8 цилиндров', 'gbomotors'); ?>
										<span><?php echo get_field('8cilindra', $post->ID); ?> ₽</span>
									</div>
								</div>
								<div class="home-price__list">
									<div class="home-price__list-item">
										<?php _e('ЭБУ', 'gbomotors'); ?>
										<span><?php echo get_field('eby', $post->ID); ?></span>
									</div>
									<div class="home-price__list-item">
										<?php _e('Форсунки', 'gbomotors'); ?>
										<span><?php echo get_field('forcynki', $post->ID); ?></span>
									</div>
									<div class="home-price__list-item">
										<?php _e('Редуктор', 'gbomotors'); ?>
										<span><?php echo get_field('redyktor', $post->ID); ?></span>
									</div>
									<div class="home-price__list-item">
										<?php _e('Бак тороидальный', 'gbomotors'); ?>
										<span><?php echo get_field('bak', $post->ID); ?></span>
									</div>
								</div>
								<div class="home-price__footer">
									<a class="home-price__footer-price" href="<?php echo get_field('price_link', $post->ID); ?>"><?php _e('Посмотреть полный прайс-лист', 'gbomotors'); ?></a>
									<button class="home-price__footer-button"><?php _e('Оставить заявку', 'gbomotors'); ?></button>
									<a class="home-price__footer-rass" href="<?php echo get_field('rass', $post->ID); ?>"><?php _e('Оформить рассрочку', 'gbomotors'); ?></a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php
		return ob_get_clean();
	}

	public function register_block() {
		register_block_type(
			'gbomotors/home-price',
			array(
				'attributes'      => array(
					'className'       => array(
						'type' => 'string',
					)
				),
				'render_callback' => array( $this, 'render_block' ),
			)
		);

	}
}
