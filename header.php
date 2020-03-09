<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gbomotors
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="header__top-content">
					<?php if ( get_theme_mod( 'gbomotors_write_us' ) ) : ?>
						<a href="<?php echo get_theme_mod( 'gbomotors_write_us' ); ?>" class="header__top-item"><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 10.5"><path d="M204.25,482h-10.5a1.75,1.75,0,0,0-1.75,1.75v7a1.75,1.75,0,0,0,1.75,1.75h10.5a1.75,1.75,0,0,0,1.75-1.75v-7A1.75,1.75,0,0,0,204.25,482Zm-1.367,1.75-3.021,2.517c-.018.016-.041.022-.058.039s-.009.016-.015.022l-.79.659-3.883-3.236Zm-9.133,1.138,2.522,2.1-2.522,2.522Zm1.237,5.862,2.635-2.635.818.682a.874.874,0,0,0,1.12,0l.818-.682,2.635,2.635Zm9.263-1.237-2.522-2.522,2.522-2.1Z" transform="translate(-192 -482)" fill="currentColor"/></svg> — <span><?php _e('Напишите нам', 'gbomotors'); ?></span></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'gbomotors_sertificat' ) ) : ?>
						<a href="<?php echo get_theme_mod( 'gbomotors_sertificat' ); ?>" class="d-none d-sm-inline-block header__top-item"><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"><path d="M140.25,514.625H138.5v-.875a1.75,1.75,0,0,0-1.75-1.75h-3.5a1.75,1.75,0,0,0-1.75,1.75v.875h-1.75a1.75,1.75,0,0,0-1.75,1.75v7.875a1.75,1.75,0,0,0,1.75,1.75h10.5a1.75,1.75,0,0,0,1.75-1.75v-7.875A1.75,1.75,0,0,0,140.25,514.625Zm-7-.875h3.5v.875h-3.5Zm7,10.5h-10.5V522.5h1.75a.875.875,0,0,0,1.75,0h3.5a.875.875,0,0,0,1.75,0h1.75Zm0-3.5H138.5a.875.875,0,0,0-1.75,0h-3.5a.875.875,0,0,0-1.75,0h-1.75v-4.375h10.5Z" transform="translate(-128 -512)" fill="currentColor"/></svg> — <span><?php _e('Наши сертификаты', 'gbomotors'); ?></span></a>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'gbomotors_map' ) ) : ?>
						<a href="<?php echo get_theme_mod( 'gbomotors_map' ); ?>" class="header__top-item"><svg class="icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 13.918"><path d="M429.589,224.166a.886.886,0,0,0-.858-.035l-3.176,1.574-4.837-1.6-.006,0-.057-.024-.1-.026a1.08,1.08,0,0,0-.175-.017.794.794,0,0,0-.2.026c-.024.006-.042.02-.065.028a.87.87,0,0,0-.141.059c-.026.014-.058.02-.083.036l-3.4,1.687a.849.849,0,0,0-.481.774v10.438a.867.867,0,0,0,.411.739.888.888,0,0,0,.464.131.9.9,0,0,0,.394-.1l3.176-1.574,4.9,1.627a.9.9,0,0,0,.674-.052l3.5-1.74a.859.859,0,0,0,.481-.774V224.905A.868.868,0,0,0,429.589,224.166Zm-11.839,3.018,1.75-.869v8.49l-1.75.869Zm3.5-1.069,3.5,1.157v8.6l-3.5-1.157Zm7,8.69-1.75.869v-8.49l1.75-.869Z" transform="translate(-416 -224.035)" fill="currentColor"/></svg> — <span><?php _e('Карта заправок', 'gbomotors') ?></span></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="header__main" x-data="{ open: false }">
			<div class="container">
				<div class="header__main-container">
					<button class="header__main-burger d-lg-none" type="button" @click="open = !open">
						<svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 33 24"><g data-name="Group 12" fill="none" stroke="#1e485b" stroke-linecap="round" stroke-width="4"><path data-name="Line 67" d="M2 2h29"/><path data-name="Line 68" d="M2 12h29"/><path data-name="Line 69" d="M2 22h29"/></g></svg>
						<svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26.163 26.163"><g data-name="Group 50" fill="none" stroke="#1e485b" stroke-linecap="round" stroke-width="4"><path data-name="Line 68" d="M2.828 2.828l20.506 20.506"/><path data-name="Line 141" d="M2.828 23.334L23.334 2.828"/></g></svg>
					</button>
					<div class="header__main-logo">
						<?php the_custom_logo(); ?>
					</div>
					<button class="header__main-call d-lg-none">
						<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g data-name="Group 25"><path d="M25.898 21.626l-.77 2.319a2 2 0 0 1-1.086 1.2 10.006 10.006 0 0 1-10.761-1.741 8.658 8.658 0 0 1-.34-.326 9.507 9.507 0 0 1-1.5-1.9 8.072 8.072 0 0 1-.388-.721 9.983 9.983 0 0 1-.2-8.5 2 2 0 0 1 1.2-1.086l2.32-.77a2 2 0 0 1 2.528 1.266l1 3a2 2 0 0 1-1 2.42l-.728.364a3.962 3.962 0 0 0 1.014 1.679 3.909 3.909 0 0 0 1.667 1l.364-.727a2 2 0 0 1 2.421-1l3 1a2 2 0 0 1 1.259 2.523zM24.003 21l-3-1-1 2a6.007 6.007 0 0 1-6-6l2-1-1-3-2.32.77a7.917 7.917 0 0 0-.68 3.23 7.836 7.836 0 0 0 .85 3.579 6.013 6.013 0 0 0 .3.56 7.549 7.549 0 0 0 1.191 1.51c.09.09.18.18.28.27a8 8 0 0 0 8.609 1.4z" fill="#1e485b"/><g data-name="Ellipse 9" fill="none" stroke="#1e485b" stroke-width="2"><circle cx="18" cy="18" r="18" stroke="none"/><circle cx="18" cy="18" r="17"/></g></g></svg>
					</button>
					<div class="header__main-info d-none d-lg-block">
						<div class="header__main-info-top">
							<?php if ( get_theme_mod( 'gbomotors_address' ) ) : ?>
								<span class="header__main-city">
									<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"><path d="M103.257,239.857C103,239.755,97,237.282,97,231a7,7,0,1,1,14,0c0,6.282-6,8.754-6.257,8.857a2,2,0,0,1-1.486,0ZM99,231c0,5,5,7,5,7s5-2,5-7a5,5,0,1,0-10,0Zm2,0a3,3,0,1,1,3,3A3,3,0,0,1,101,231Zm2,0a1,1,0,1,0,1-1A1,1,0,0,0,103,231Z" transform="translate(-97 -224)"/></svg>
									— <?php echo get_theme_mod( 'gbomotors_address' ); ?>
								</span>
							<?php endif; ?>
							<div class="header__main-contact">
								<?php if ( get_theme_mod( 'gbomotors_phone_number' ) ) : ?>
									<a href="tel:<?php echo filter_phone(get_theme_mod( 'gbomotors_phone_number' )); ?>" class="header__main-phone">
										<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16.003" height="16" viewBox="0 0 16.003 16"><path d="M687.9,651.63l-.77,2.32a2,2,0,0,1-1.086,1.2,10.008,10.008,0,0,1-10.763-1.742c-.127-.114-.242-.228-.34-.326a9.5,9.5,0,0,1-1.5-1.9,8.069,8.069,0,0,1-.388-.721,9.987,9.987,0,0,1-.2-8.5,2.006,2.006,0,0,1,1.2-1.086l2.321-.77a2,2,0,0,1,2.528,1.266l1,3a2,2,0,0,1-1,2.421l-.728.364a3.962,3.962,0,0,0,1.014,1.68,3.911,3.911,0,0,0,1.667,1l.364-.727a2,2,0,0,1,2.422-1l3,1A2,2,0,0,1,687.9,651.63ZM686,651l-3-1-1,2a6.009,6.009,0,0,1-6-6l2-1-1-3-2.321.77A7.92,7.92,0,0,0,674,646a7.84,7.84,0,0,0,.85,3.58,6.032,6.032,0,0,0,.3.56,7.549,7.549,0,0,0,1.191,1.51c.09.09.18.18.28.27a8,8,0,0,0,8.611,1.4Z" transform="translate(-671.997 -640)"/></svg>
										—
										<span class="header__main-phone-number"><?php echo get_theme_mod( 'gbomotors_phone_number' ); ?></span>
									</a>
								<?php endif; ?>
								<button class="header__main-call"><?php _e('Заказать звонок', 'gbomotors'); ?></button>
							</div>
						</div>
						<?php wp_nav_menu(array(
							'theme_location' 	=> 'primary',
							'container_class' 	=> 'header__main-menu',
							'fallback_cb'     => '__return_empty_string',
							'depth'           	=> 1,
						)) ?>
					</div>
				</div>
			</div>
			<div class="header__mobile d-lg-none" :class="{ 'd-none': !open }"  @click.away="open = false">
				<div class="container">
					<?php wp_nav_menu(array(
						'theme_location' 	=> 'primary',
						'container_class' 	=> 'header__mobile-main-menu',
						'fallback_cb'     => '__return_empty_string',
						'depth'           	=> 1,
					)) ?>
					<div class="header__mobile-block">
						<?php if ( get_theme_mod( 'gbomotors_address' ) ) : ?>
							<span class="header__mobile-city">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"><path d="M103.257,239.857C103,239.755,97,237.282,97,231a7,7,0,1,1,14,0c0,6.282-6,8.754-6.257,8.857a2,2,0,0,1-1.486,0ZM99,231c0,5,5,7,5,7s5-2,5-7a5,5,0,1,0-10,0Zm2,0a3,3,0,1,1,3,3A3,3,0,0,1,101,231Zm2,0a1,1,0,1,0,1-1A1,1,0,0,0,103,231Z" transform="translate(-97 -224)"/></svg>
								— <?php echo get_theme_mod( 'gbomotors_address' ); ?>
							</span>
						<?php endif; ?>
						<?php if ( get_theme_mod( 'gbomotors_phone_number' ) ) : ?>
							<a href="tel:<?php echo filter_phone(get_theme_mod( 'gbomotors_phone_number' )); ?>" class="header__mobile-phone">
								<svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16.003" height="16" viewBox="0 0 16.003 16"><path d="M687.9,651.63l-.77,2.32a2,2,0,0,1-1.086,1.2,10.008,10.008,0,0,1-10.763-1.742c-.127-.114-.242-.228-.34-.326a9.5,9.5,0,0,1-1.5-1.9,8.069,8.069,0,0,1-.388-.721,9.987,9.987,0,0,1-.2-8.5,2.006,2.006,0,0,1,1.2-1.086l2.321-.77a2,2,0,0,1,2.528,1.266l1,3a2,2,0,0,1-1,2.421l-.728.364a3.962,3.962,0,0,0,1.014,1.68,3.911,3.911,0,0,0,1.667,1l.364-.727a2,2,0,0,1,2.422-1l3,1A2,2,0,0,1,687.9,651.63ZM686,651l-3-1-1,2a6.009,6.009,0,0,1-6-6l2-1-1-3-2.321.77A7.92,7.92,0,0,0,674,646a7.84,7.84,0,0,0,.85,3.58,6.032,6.032,0,0,0,.3.56,7.549,7.549,0,0,0,1.191,1.51c.09.09.18.18.28.27a8,8,0,0,0,8.611,1.4Z" transform="translate(-671.997 -640)"/></svg>
								—
								<span class="header__mobile-phone-number"><?php echo get_theme_mod( 'gbomotors_phone_number' ); ?></span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="site-wrapper">
