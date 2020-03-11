<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$title = get_field('testimonial') ;
$image = get_field('image');
$eby = get_field('eby');
$forsunki = get_field('forsunki');
$reductor = get_field('reductor');
$bak = get_field('bak');
$gbo = get_field('gbo');
$econom = get_field('econom');

?>


<div id="<?php echo esc_attr($id); ?>" class="block-work <?php echo esc_attr($className); ?>">
	<div class="block-work__title">Установка ГБО на LADA Vesta</div>
	<div class="block-work__info row">
		<div class="block-work__image col-lg-6">
			<?php echo wp_get_attachment_image( $image, 'gbomotors-work' ); ?>
		</div>
		<div class="block-work__content col-lg-6">
			<div class="block-work__table">
				<div class="block-work__item">
					<?php _e('ЭБУ', 'gbomotors'); ?>
					<span><?php echo $eby; ?></span>
				</div>
				<div class="block-work__item">
					<?php _e('Форсунки', 'gbomotors'); ?>
					<span><?php echo $forsunki; ?></span>
				</div>
				<div class="block-work__item">
					<?php _e('Редуктор', 'gbomotors'); ?>
					<span><?php echo $reductor; ?></span>
				</div>
				<div class="block-work__item">
					<?php _e('Бак тороидальный', 'gbomotors'); ?>
					<span><?php echo $bak; ?></span>
				</div>
				<div class="block-work__marker">
					<div class="block-work__marker-block">
						<?php _e('Рекомендуем', 'gbomotors'); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="block-work__element">
						<?php _e('Пробег c ГБО', 'gbomotors'); ?>
						<span><?php echo $gbo; ?></span>
					</div>
				</div>
				<div class="col-6">
					<div class="block-work__element">
						<?php _e('Экономия', 'gbomotors'); ?>
						<span><?php echo $econom; ?></span>
					</div>
				</div>
			</div>
			<div>
				<button type="button" class="site-button block-work__button"><?php _e('Записаться на установку', 'gbomotors'); ?></button>
			</div>
		</div>
	</div>
</div>
