<?php

namespace Gbomotors_Blocks;

use Gbomotors_Blocks\Blocks\Block_Reviews;
use Gbomotors_Blocks\Blocks\Block_Form_Order;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define WP_BOOTSTRAP_BLOCKS_PLUGIN_FILE.
if ( ! defined( 'GBOMOTORS_BLOCKS_FILE' ) ) {
	define( 'GBOMOTORS_BLOCKS_FILE', __FILE__ );
}

class Gbomotors_Blocks {

	public $slug = 'gbomotors';

	public $version = '1.0.0';

	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
		$this->register_block_types();
	}

	protected function define_constants() {
		if ( ! defined( 'GBOMOTORS_BLOCKS_ABSPATH' ) ) {
			define( 'GBOMOTORS_BLOCKS_ABSPATH', trailingslashit( dirname( GBOMOTORS_BLOCKS_FILE ) ) );
		}
	}

	protected function init_hooks() {
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
		add_filter( 'block_categories', array( $this, 'register_custom_block_category' ), 10, 2 );

		add_theme_support( 'align-wide' );

		// Editor Styles
		add_theme_support( 'editor-styles' );
		// add_editor_style( 'dist/editor-style.css' );
	}

	public function register_custom_block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => $this->slug,
					'title' => __( 'Gbomotors Blocks', $this->slug ),
				),
			)
		);
	}

	public function includes() {
		require_once GBOMOTORS_BLOCKS_ABSPATH . '/reviews/class_reviews_blocks.php';
		require_once GBOMOTORS_BLOCKS_ABSPATH . '/form-order/class_form-order_blocks.php';
	}
	public function register_block_types() {

		new Block_Reviews();
		new Block_Form_Order();
	}

	public function enqueue_block_editor_assets() {
		wp_enqueue_script(
			"gbomotors-gutenberg",
			get_template_directory_uri() . '/dist/gutenberg.js',
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
			$this->version,
			true // Enqueue the script in the footer.
		);

		wp_enqueue_style( 'gbomotors-gutenberg', get_stylesheet_directory_uri() . '/dist/editor-style.css' );
	}
}

new Gbomotors_Blocks();
