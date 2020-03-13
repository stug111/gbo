<div class="block-services__item">
	<div class="block-services__title"><?php echo strip_tags(get_the_title($post->ID)); ?></div>
	<div class="block-services__info">
		<div class="block-services__table">
			<div class="block-services__table-item">
				<?php _e('ЭБУ', 'gbomotors'); ?>
				<span><?php echo get_field('eby', $post->ID); ?></span>
			</div>
			<div class="block-services__table-item">
				<?php _e('Форсунки', 'gbomotors'); ?>
				<span><?php echo get_field('forcynki', $post->ID); ?></span>
			</div>
			<div class="block-services__table-item">
				<?php _e('Редуктор', 'gbomotors'); ?>
				<span><?php echo get_field('redyktor', $post->ID); ?></span>
			</div>
			<div class="block-services__table-item">
				<?php _e('Бак тороидальный', 'gbomotors'); ?>
				<span><?php echo get_field('bak', $post->ID); ?></span>
			</div>
			<?php if ( get_field('favorite', $post->ID) ): ?>
				<div class="block-services__marker">
					<div class="block-work__marker-block">
						<?php _e('Рекомендуем', 'gbomotors'); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="block-services__tabs">
			<div>
				<div class="block-services__tab block-services__tab--active">
					<?php _e('4 цилиндра', 'gbomotors'); ?>
					<span><?php echo get_field('4cilindra', $post->ID); ?> ₽</span>
				</div>
				<div class="block-services__tab">
					<?php _e('6 цилиндра', 'gbomotors'); ?>
					<span><?php echo get_field('6cilindra', $post->ID); ?> ₽</span>
				</div>
				<div class="block-services__tab">
					<?php _e('8 цилиндра', 'gbomotors'); ?>
					<span><?php echo get_field('8cilindra', $post->ID); ?> ₽</span>
				</div>
			</div>
			<?php if ( ! is_archive() ) : ?>
				<a href="<?php echo get_post_type_archive_link('services'); ?>"><?php _e('Посмотреть полный прайс-лист', 'gbomotors'); ?></a>
			<?php endif; ?>
		</div>
	</div>
	<div class="block-services__footer">
		<div x-data="{ open: false }">
			<?php $shortcode = '[contact-form-7 id="340" title="Оформить заявку (футер)"]'; ?>
			<button @click.prevent="open = true" type="button" class="site-button"><?php _e('Оставить заявку', 'gbomotors'); ?></button>
			<?php include( locate_template( 'template-parts/components/modal.php', false, false ) );  ?>
		</div>
		<div x-data="{ open: false }">
			<?php $shortcode = '[contact-form-7 id="341" title="Оформить рассрочку"]'; ?>
			<button @click.prevent="open = true" type="button" class="block-services__link"><?php _e('Оформить рассрочку', 'gbomotors'); ?></button>
			<?php include( locate_template( 'template-parts/components/modal.php', false, false ) );  ?>
		</div>
	</div>
</div>
