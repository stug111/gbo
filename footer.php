<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gbomotors
 */

?>

	</div><!-- site-wrapper -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-3 footer__column d-flex flex-column align-items-center d-lg-block">
					<div class="footer__logo">
						<?php the_custom_logo(); ?>
					</div>
					<div class="footer__address">
						<?php echo get_theme_mod( 'gbomotors_address' ); ?>
					</div>
					<div class="footer__contacts">
						<a class="footer__phone" href="tel:<?php echo filter_phone(get_theme_mod( 'gbomotors_phone_number' )); ?>"><?php echo get_theme_mod( 'gbomotors_phone_number' ); ?></a>
						<span class="d-lg-none">&nbsp;|&nbsp;</span>
						<a class="footer__email" href="mailto:<?php echo get_theme_mod( 'gbomotors_email' ); ?>"><?php echo get_theme_mod( 'gbomotors_email' ); ?></a>

						<div class="footer__copyright d-none d-lg-block">© <?php echo date('Y'); ?>, <?php echo get_theme_mod( 'gbomotors_copyright' ) ?></div>
					</div>

				</div>
				<div class="col-xl-4 col-lg-5 footer__column">
					<div class="row">
						<?php wp_nav_menu(array(
							'container_class' => 'col-6 footer__menu',
							'menu_class'      => 'menu',
							'fallback_cb'     => '__return_empty_string',
							'depth'           => 1,
							'theme_location'  => 'footer-column-1',
						)); ?>

						<?php wp_nav_menu(array(
							'container_class' => 'col-6 footer__menu',
							'menu_class'      => 'menu',
							'fallback_cb'     => '__return_empty_string',
							'depth'           => 1,
							'theme_location'  => 'footer-column-2',
						)); ?>
					</div>
					<div class="footer__feedback">
						<div class="d-flex flex-column align-items-start flex-lg-row">
							<div x-data="{ open: false }">
								<?php $shortcode = '[contact-form-7 id="340" title="Оформить заявку (футер)"]'; ?>
								<button @click.prevent="open = true" class="footer__order footer__button"><?php _e('Оформить заявку', 'gbomotors') ?></button>
								<?php include( locate_template( 'template-parts/components/modal.php', false, false ) );  ?>
							</div>
							<div x-data="{ open: false }">
								<?php $shortcode = '[contact-form-7 id="337" title="Заказать звонок (шапка/футер)"]'; ?>
								<button @click.prevent="open = true" class="footer__button"><?php _e('Заказать звонок', 'gbomotors') ?></button>
								<?php include( locate_template( 'template-parts/components/modal.php', false, false ) );  ?>
							</div>
						</div>
						<div class="footer__social">
							<?php if ( get_theme_mod( 'gbomotors_vk' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'gbomotors_vk' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><circle cx="16" cy="16" r="16" fill="#4c77a6"/><path data-name="VK" d="M21.015 17.332a20.07 20.07 0 0 1 1.421 1.473 4.287 4.287 0 0 1 .509.756c.2.391.018.821-.322.844H20.51a1.608 1.608 0 0 1-1.346-.564c-.293-.307-.564-.634-.845-.952a2.023 2.023 0 0 0-.38-.349.436.436 0 0 0-.7.176 2.348 2.348 0 0 0-.223 1.017c-.023.513-.173.648-.673.671a5.272 5.272 0 0 1-3.025-.67 6.769 6.769 0 0 1-2.039-1.964A26.682 26.682 0 0 1 8.6 12.85c-.173-.389-.045-.6.37-.6.69-.014 1.379-.013 2.069 0a.61.61 0 0 1 .574.443 13.359 13.359 0 0 0 1.4 2.679 2.262 2.262 0 0 0 .53.6c.245.173.432.116.547-.166a1.908 1.908 0 0 0 .122-.562 8.624 8.624 0 0 0-.034-1.97.811.811 0 0 0-.675-.756c-.202-.039-.176-.116-.076-.235a.753.753 0 0 1 .65-.333h2.389c.376.077.46.251.511.641v2.735c0 .151.073.6.337.7.211.071.35-.1.477-.241a8.513 8.513 0 0 0 1.347-2.135c.162-.337.3-.686.436-1.036a.512.512 0 0 1 .54-.381h2.3a1.177 1.177 0 0 1 .2.013c.387.068.494.24.374.63a5.965 5.965 0 0 1-.914 1.634c-.383.547-.794 1.075-1.174 1.625-.349.5-.322.756.112 1.192z" fill="#fff"/></svg></a>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'gbomotors_instagram' ) ) : ?>
								<a href="<?php echo get_theme_mod( 'gbomotors_instagram' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><defs><linearGradient id="a" x1=".503" x2=".5" y2="1" gradientUnits="objectBoundingBox"><stop offset="0" stop-color="#7024c4"/><stop offset=".415" stop-color="#c21975"/><stop offset=".702" stop-color="#c74c4d"/><stop offset="1" stop-color="#e09b3d"/></linearGradient></defs><circle cx="16" cy="16" r="16" fill="url(#a)"/><path data-name="Instagram" d="M19.206 22.82h-5.539a4.087 4.087 0 0 1-4.082-4.079v-5.539a4.087 4.087 0 0 1 4.082-4.082h5.539a4.087 4.087 0 0 1 4.079 4.082v5.539a4.087 4.087 0 0 1-4.079 4.079zm-5.539-12.322a2.707 2.707 0 0 0-2.7 2.7v5.543a2.707 2.707 0 0 0 2.7 2.7h5.539a2.707 2.707 0 0 0 2.7-2.7v-5.539a2.707 2.707 0 0 0-2.7-2.7zm2.77 9.022a3.544 3.544 0 1 1 3.548-3.548 3.548 3.548 0 0 1-3.548 3.548zm0-5.71a2.166 2.166 0 1 0 2.165 2.162 2.168 2.168 0 0 0-2.165-2.166zm3.551-.5a.849.849 0 1 1 .85-.849.85.85 0 0 1-.853.842z" fill="#fff"/></svg></a>
							<?php endif; ?>
						</div>
					</div>

				</div>
				<div class="col-xl-3 offset-xl-1 col-lg-4 footer__column">
					<div class="footer__sertificats">
						<span class="d-lg-none"><?php _e('Cертификаты', 'gbomotors') ?></span>
						<span class="d-none d-lg-inline"><?php _e('Наши сертификаты', 'gbomotors') ?></span>
						<div class="footer__sertificats-list">
							<?php
								if ( class_exists('Gbomotors') ) {
									Gbomotors::get_certificats();
								}
							?>
						</div>
					</div>
					<div class="footer__copyright d-lg-none">© <?php echo date('Y'); ?>, <?php echo get_theme_mod( 'gbomotors_copyright' ) ?></div>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
