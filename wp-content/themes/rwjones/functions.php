<?php
/**
 * RWJones functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RWJones
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rwjones_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on RWJones, use a find and replace
		* to change 'rwjones' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'rwjones', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'rwjones' ),
			'menu-2' => esc_html__('Footer Menu', 'rwjones'),
            'menu-3' => esc_html__('Sidebar Navigation', 'rwjones'),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'rwjones_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'rwjones_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rwjones_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rwjones_content_width', 640 );
}
add_action( 'after_setup_theme', 'rwjones_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rwjones_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rwjones' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rwjones' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rwjones_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rwjones_scripts() {
	wp_enqueue_style( 'rwjones-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rwjones-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rwjones-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$compiled_css = get_template_directory() . '/assets/css/styles.css';
    if (file_exists($compiled_css)) {
        wp_enqueue_style('rwjones_custom-theme', get_template_directory_uri() . '/assets/css/styles.css');
        wp_enqueue_style('sb-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array());
        wp_enqueue_script('rwjones_custom-theme-js', get_template_directory_uri() . '/assets/js/all.min.js', array(), '1.0.0', true);
        wp_localize_script('rwjones_custom-theme-js', 'theme',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'rwjones_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//get domain by passing url
function getDomain($url)
{
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
    }
    return FALSE;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{

    // update path
    $path = get_stylesheet_directory() . '/inc/acf-json';


    // return
    return $path;

}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/inc/acf-json';


    // return
    return $paths;

}
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'icon_url' => 'dashicons-art',
    ));
}
/**
 * Slider and scripts
 */
function add_slick_slider_cdn() {
    wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style('slick-theme-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css');
    wp_enqueue_script('slick-script', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'add_slick_slider_cdn');


function enqueue_my_script() {
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/my-script.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_my_script' );
/**
 * ACF block type registration
 */
acf_register_block_type(array(
    'name' => 'homepage-hero',
    'title' => __('Homepage Hero'),
    'description' => __('A custom hero block for the homepage.'),
    'render_template' => 'template-parts/blocks/homepage-hero.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'cta-img-text',
    'title' => __('Image, CTA and Text Slot'),
    'description' => __('A CTA with Image and text.'),
    'render_template' => 'template-parts/blocks/cta-img-text.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'cta-card-grid',
    'title' => __('CTA Card Grid'),
    'description' => __('CTA card with or without image'),
    'render_template' => 'template-parts/blocks/cta-card-grid.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'stat-bar-slider',
    'title' => __('Stats Bar with Slider'),
    'description' => __('CTA card with stat bar slider for homepage'),
    'render_template' => 'template-parts/blocks/stat-bar-slider.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'cta-full-width-image',
    'title' => __('CTA Full Width Image'),
    'description' => __('CTA with a full width image, title, text and button'),
    'render_template' => 'template-parts/blocks/cta-full-width-image.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'insights-grid',
    'title' => __('Insights Grid'),
    'description' => __('select insights by searching. Max of 4'),
    'render_template' => 'template-parts/blocks/insights-grid.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'related-news',
    'title' => __('Related News'),
    'description' => __('Related News'),
    'render_template' => 'template-parts/blocks/related-news.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'person-grid',
    'title' => __('Person Grid'),
    'description' => __('Person grid'),
    'render_template' => 'template-parts/blocks/person-grid.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'text-with-sidebar',
    'title' => __('Text with sidebar'),
    'description' => __('Text with sidebar'),
    'render_template' => 'template-parts/blocks/text-with-sidebar.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
acf_register_block_type(array(
    'name' => 'text-image',
    'title' => __('Text and Image'),
    'description' => __('Text and Image Block'),
    'render_template' => 'template-parts/blocks/text-image.php',
    'category' => 'formatting',
    'icon' => '',
    'align' => 'full',

));
/**
 * sidebar
 */
register_sidebar(
	array(
		'name' => esc_html__('rankin Sidebar Menu', 'rwjones'),
		'id' => 'rwjones-sidebar-menu',
		'description' => esc_html__('Add widgets here.', 'rwjones'),
		'before_widget' => '<section class="widget-content">',
		'after_widget' => "</section>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	)
);


add_filter('acf/load_field/name=menu_select', 'rwjones_nav_menus_load');
function rwjones_nav_menus_load($field)
{

    $menus = wp_get_nav_menus();

    if (!empty($menus)) {

        foreach ($menus as $menu) {
            $field['choices'][$menu->slug] = $menu->name;
        }

    }

    return $field;

}