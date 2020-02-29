<?php
/**
 * Gbomotors Theme Customizer
 *
 * @package Gbomotors
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gbomotors_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'gbomotors_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'gbomotors_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'gbomotors_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function gbomotors_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function gbomotors_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gbomotors_customize_preview_js() {
	wp_enqueue_script( 'gbomotors-customizer', get_template_directory_uri() . '/src/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'gbomotors_customize_preview_js' );

add_action('customize_register', function($customizer) {
	$customizer->add_section(
		'settings-site', array(
			'title'         => __( 'Настройки темы', 'gbomotors' ),
			'description'   => __( 'Контактная информация на сайте', 'gbomotors'),
			'priority'      => 11,
		)
	);

	$customizer->add_setting( 'gbomotors_phone_number', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_phone_number',
		array(
			'label'     => __('Номер телефона', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_email', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_email',
		array(
			'label'     => __('E-mail', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_address', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_address',
		array(
			'label'     => __('Адрес', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_write_us', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_write_us',
		array(
			'label'     => __('Напишите нам', 'gbomotors'),
			'description' => __('Укажите ссылку на страницу', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_sertificat', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_sertificat',
		array(
			'label'     => __('Наши сертификаты', 'gbomotors'),
			'description' => __('Укажите ссылку на страницу', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_map', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_map',
		array(
			'label'     => __('Карта заправок', 'gbomotors'),
			'description' => __('Укажите ссылку на страницу', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_copyright', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_copyright',
		array(
			'label'     => __('Copyright', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'text',
		)
	);

	$customizer->add_setting( 'gbomotors_vk', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_vk',
		array(
			'label'     => __('Вконтакте', 'gbomotors'),
			'description' => __('Укажите ссылку', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'url',
		)
	);

	$customizer->add_setting( 'gbomotors_instagram', array(
		'default' => ''
	) );
	$customizer->add_control(
		'gbomotors_instagram',
		array(
			'label'     => __('Instagram', 'gbomotors'),
			'description' => __('Укажите ссылку', 'gbomotors'),
			'section'   => 'settings-site',
			'type'      => 'url',
		)
	);
});
