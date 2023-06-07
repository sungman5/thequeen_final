<?php
/**
 * thequeenkorea_4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thequeenkorea_4
 */

if ( ! defined( 'THEQUEENKOREA_4_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'THEQUEENKOREA_4_VERSION', '0.1.0' );
}

if ( ! defined( 'THEQUEENKOREA_4_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `thequeenkorea_4_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'THEQUEENKOREA_4_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'thequeenkorea_4_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thequeenkorea_4_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thequeenkorea_4, use a find and replace
		 * to change 'thequeenkorea_4' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thequeenkorea_4', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => __( 'primary-menu', 'thequeenkorea_4' ),
				'footer-menu' => __( 'footer-menu', 'thequeenkorea_4' ),
				'user-menu' => __( 'user-menu', 'thequeenkorea_4' ),
				
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'thequeenkorea_4_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thequeenkorea_4_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'thequeenkorea_4' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'thequeenkorea_4' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'thequeenkorea_4_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function thequeenkorea_4_scripts() {
	wp_enqueue_style( 'thequeenkorea_4-style', get_stylesheet_uri(), array(), THEQUEENKOREA_4_VERSION );
	wp_enqueue_script( 'thequeenkorea_4-script', get_template_directory_uri() . '/js/script.min.js', array(), THEQUEENKOREA_4_VERSION, true );

	// 커스텀 스크립트 추가
	wp_enqueue_style('custom-style', get_template_directory_uri() .  '/custom-style.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thequeenkorea_4_scripts' );

/**
 * Enqueue the block editor script.
 */
function thequeenkorea_4_enqueue_block_editor_script() {
	wp_enqueue_script(
		'thequeenkorea_4-editor',
		get_template_directory_uri() . '/js/block-editor.min.js',
		array(
			'wp-blocks',
			'wp-edit-post',
		),
		THEQUEENKOREA_4_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'thequeenkorea_4_enqueue_block_editor_script' );

/**
 * Create a JavaScript array containing the Tailwind Typography classes from
 * THEQUEENKOREA_4_TYPOGRAPHY_CLASSES for use when adding Tailwind Typography support
 * to the block editor.
 */
function thequeenkorea_4_admin_scripts() {
	?>
	<script>
		tailwindTypographyClasses = '<?php echo esc_attr( THEQUEENKOREA_4_TYPOGRAPHY_CLASSES ); ?>'.split(' ');
	</script>
	<?php
}
add_action( 'admin_print_scripts', 'thequeenkorea_4_admin_scripts' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function thequeenkorea_4_tinymce_add_class( $settings ) {
	$settings['body_class'] = THEQUEENKOREA_4_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'thequeenkorea_4_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**********************************************************
 * 커스텀 폰트
 ***********************************************************/
function enqueue_custom_fonts()
{
	if (!is_admin()) {
		wp_register_style('Instrument Sans', 'https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap');
		wp_enqueue_style('Instrument Sans');

		wp_register_style('SUIT Variable', 'https://cdn.jsdelivr.net/gh/sunn-us/SUIT/fonts/variable/woff2/SUIT-Variable.css');
		wp_enqueue_style('SUIT Variable');
	}
}
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');

/**
 * 우커머스 지원 선언
 */
function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

/**
 * sensei 지원 선언
 */
function declare_sensei_support()
{
	add_theme_support('sensei');
}
add_action('after_setup_theme', 'declare_sensei_support');