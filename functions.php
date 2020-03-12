<?php
/**
 * Gbomotors functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gbomotors
 */

class Gbomotors {
	protected $theme_name;
	protected $theme_version;

	public function __construct() {
		$version = wp_get_theme()->get('Version');

		$this->theme_name    = 'gbomotors';
		$this->theme_version = $version;

		load_theme_textdomain( $this->theme_name, get_template_directory() . '/languages' );

		add_action( 'after_setup_theme', array( $this, 'theme_support',  ) );
		add_action( 'after_setup_theme', array( $this, 'nav_menu',  ) );
		add_action( 'after_setup_theme', array( $this, 'image_size',  ) );
		// add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'assets_include' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'disable_assests_plugins' ), 20 );
		if( function_exists('acf_register_block_type') ) {
			add_action('acf/init', array( $this, 'register_acf_block_types' ));
		}

		add_filter( 'wpcf7_autop_or_not', '__return_false' );
		add_filter( 'get_the_archive_title', function( $title ){
			return preg_replace('~^[^:]+: ~', '', $title );
		});

		$this->includes();

		// add_action( 'admin_init', array( $this, 'settings_api_init' ) );
		// add_action( 'init', array( $this, 'register_settings' ) );
	}

	public function theme_support() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-background', apply_filters( 'gbomotors_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'custom-logo', array(
			'height'      => 296,
			'width'       => 79,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}

	public function nav_menu() {
		register_nav_menus( array(
			'primary' => esc_html__( 'Главное меню', $this->theme_name ),
			'footer-column-1' => esc_html__( 'Подвал 1 колонка', $this->theme_name ),
			'footer-column-2' => esc_html__( 'Подвал 2 колонка', $this->theme_name ),
		) );
	}

	public function image_size() {
		add_image_size( 'sertificat-small', 74, 101, false );
		add_image_size( $this->theme_name . '-work', 558, 402, false );
	}

	public function widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', $this->theme_name ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', $this->theme_name ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	public function assets_include() {
		wp_enqueue_style( $this->theme_name, get_template_directory_uri() . '/dist/style.css', array(), $this->theme_version );
		wp_enqueue_script($this->theme_name, get_template_directory_uri() . '/dist/index.js', array(), $this->theme_version, true);
		wp_enqueue_script($this->theme_name . '-function', get_template_directory_uri() . '/src/js/calculator.js', array(), $this->theme_version, true);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	public function disable_assests_plugins() {
		wp_deregister_style('wp-bootstrap-blocks-styles');
		wp_deregister_style('contact-form-7');
		wp_deregister_script('webfontloader');
		wp_deregister_script('ghostkit-fonts-loader');
		wp_deregister_script('hoverintent-js');
		wp_deregister_script('wp-embed');
	}

	public function includes() {
		require get_template_directory() . '/inc/custom-header.php';
		require get_template_directory() . '/inc/template-tags.php';
		require get_template_directory() . '/inc/template-functions.php';
		require get_template_directory() . '/inc/customizer.php';
		require get_template_directory() . '/inc/custom-function.php';
		require get_template_directory() . '/gutenberg/index.php';
	}

	static function get_certificats() {
		$args = array(
			'posts_per_page'   => 6,
			'post_status'      => 'publish',
			'suppress_filters' => false,
			'post_type'		   => 'certificates'
		);

		$certificates = get_posts( $args );

		foreach ( $certificates as $key => $certificat ) :
		?>
			<div class="footer__sertificats-item <?php if ($key > 2) echo 'd-none d-lg-block' ?>">
				<?php echo get_the_post_thumbnail( $certificat, 'sertificat-small' ); ?>
			</div>
		<?php
		endforeach;
	}

	static function review($name, $car, $excerpt) {
		?>
		<div class="block-review__item">
			<div class="block-review__header">
				<div class="block-review__name"><?php echo $name; ?></div>
				<div class="block-review__model-car"><?php echo $car; ?></div>
			</div>
			<div class="block-review__excerpt"><?php echo $excerpt; ?></div>
		</div>
	<?php
	}

	public function register_acf_block_types() {
		$this->register_block_type('block-work', 'Наши работы');
		$this->register_block_type('block-services', 'Услуги и цены');
	}

	public function register_block_type($name, $title) {
		acf_register_block_type(array(
			'name'              => $name,
			'title'             => __($title),
			'render_template'   => 'template-parts/blocks/' . $name . '.php',
			'category'          => $this->theme_name,
		));
	}
}

new Gbomotors();
