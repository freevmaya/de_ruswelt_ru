<?php
/**
 * Mortgates functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mortgates
 */
if ( ! class_exists( 'Mortgates_Theme_Setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 */
	class Mortgates_Theme_Setup {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * A reference to an instance of cherry framework core class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private $core = null;

		/**
		 * Holder for CSS layout scheme.
		 *
		 * @since 1.0.0
		 * @var   array
		 */
		public $layout = array();

		/**
		 * Holder for current customizer module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $customizer = null;

		/**
		 * Holder for current dynamic_css module instance.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		public $dynamic_css = null;

		/**
		 * Sets up needed actions/filters for the theme to initialize.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// Set the constants needed by the theme.
			add_action( 'after_setup_theme', array( $this, 'constants' ), -1 );

			// Load the installer core.
			add_action( 'after_setup_theme', require( trailingslashit( get_template_directory() ) . 'cherry-framework/setup-theme.php' ), 0 );

			// Load the core functions/classes required by the rest of the theme.
			add_action( 'after_setup_theme', array( $this, 'get_core' ), 1 );

			// Language functions and translations setup.
			add_action( 'after_setup_theme', array( $this, 'l10n' ), 2 );

			// Handle theme supported features.
			add_action( 'after_setup_theme', array( $this, 'theme_support' ), 3 );

			// Load the theme includes.
			add_action( 'after_setup_theme', array( $this, 'includes' ), 4 );

			// Initialization of modules.
			add_action( 'after_setup_theme', array( $this, 'init' ), 10 );

			// Load admin files.
			add_action( 'wp_loaded', array( $this, 'admin' ), 1 );

			// Enqueue admin assets.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );

			// Register public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 9 );

			// Enqueue public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 20 );

			// Denqueue duplicate assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'denqueue_assets' ), 30 );

			// Overrides the load textdomain function for the 'cherry-framework' domain.
			add_filter( 'override_load_textdomain', array( $this, 'override_load_textdomain' ), 5, 3 );

		}

		/**
		 * Defines the constant paths for use within the core and theme.
		 *
		 * @since 1.0.0
		 */
		public function constants() {
			global $content_width;

			/**
			 * Fires before definitions the constants.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mortgates_constants_before' );

			$template  = get_template();
			$theme_obj = wp_get_theme( $template );

			/** Sets the theme version number. */
			define( 'MORTGATES_THEME_VERSION', $theme_obj->get( 'Version' ) );

			/** Sets the theme directory path. */
			define( 'MORTGATES_THEME_DIR', get_template_directory() );

			/** Sets the theme directory URI. */
			define( 'MORTGATES_THEME_URI', get_template_directory_uri() );

			/** Sets the path to the core framework directory. */
			defined( 'CHERRY_DIR' ) or define( 'CHERRY_DIR', trailingslashit( MORTGATES_THEME_DIR ) . 'cherry-framework' );

			/** Sets the path to the core framework directory URI. */
			defined( 'CHERRY_URI' ) or define( 'CHERRY_URI', trailingslashit( MORTGATES_THEME_URI ) . 'cherry-framework' );

			/** Sets the theme includes paths. */
			define( 'MORTGATES_THEME_CLASSES', trailingslashit( MORTGATES_THEME_DIR ) . 'inc/classes' );
			define( 'MORTGATES_THEME_WIDGETS', trailingslashit( MORTGATES_THEME_DIR ) . 'inc/widgets' );
			define( 'MORTGATES_THEME_EXT', trailingslashit( MORTGATES_THEME_DIR ) . 'inc/extensions' );

			/** Sets the theme assets URIs. */
			define( 'MORTGATES_THEME_CSS', trailingslashit( MORTGATES_THEME_URI ) . 'assets/css' );
			define( 'MORTGATES_THEME_JS', trailingslashit( MORTGATES_THEME_URI ) . 'assets/js' );

			// Sets the content width in pixels, based on the theme's design and stylesheet.
			if ( ! isset( $content_width ) ) {
				$content_width = 1170;
			}
		}

		/**
		 * Loads the core functions. These files are needed before loading anything else in the
		 * theme because they have required functions for use.
		 *
		 * @since  1.0.0
		 */
		public function get_core() {
			/**
			 * Fires before loads the core theme functions.
			 *
			 * @since 1.0.0
			 */
			do_action( 'mortgates_core_before' );

			global $chery_core_version;

			if ( null !== $this->core ) {
				return $this->core;
			}

			if ( 0 < sizeof( $chery_core_version ) ) {
				$core_paths = array_values( $chery_core_version );

				require_once( $core_paths[0] );
			} else {
				die( 'Class Cherry_Core not found' );
			}

			$this->core = new Cherry_Core( array(
				'base_dir' => CHERRY_DIR,
				'base_url' => CHERRY_URI,
				'modules'  => array(
					'cherry-js-core' => array(
						'autoload' => true,
					),
					'cherry-ui-elements' => array(
						'autoload' => false,
					),
					'cherry-interface-builder' => array(
						'autoload' => false,
					),
					'cherry-utility' => array(
						'autoload' => true,
						'args'     => array(
							'meta_key' => array(
								'term_thumb' => 'cherry_terms_thumbnails',
							),
						),
					),
					'cherry-widget-factory' => array(
						'autoload' => true,
					),
					'cherry-post-formats-api' => array(
						'autoload' => true,
						'args'     => array(
							'rewrite_default_gallery' => true,
							'gallery_args' => array(
								'size'          => 'mortgates-thumb-l',
								'base_class'    => 'post-gallery',
								'container'     => '<div class="%2$s swiper-container" id="%4$s" %3$s><div class="swiper-wrapper">%1$s</div><div class="swiper-button-prev"></div><div class="swiper-button-next"></div><div class="swiper-pagination"></div></div>',
								'slide'         => '<figure class="%2$s swiper-slide">%1$s</figure>',
								'img_class'     => 'swiper-image',
								'slider_handle' => 'jquery-swiper',
								'slider'        => 'swiper',
								'slider_init'   => array(
									'loop'    => true,
									'buttons' => true,
									'arrows'  => false,
								),
								'popup'         => 'magnificPopup',
								'popup_handle'  => 'magnific-popup',
								'popup_init'    => array(
									'type' => 'image',
								),
							),
							'image_args' => array(
								'size'         => 'mortgates-thumb-l',
								'popup'        => 'magnificPopup',
								'popup_handle' => 'magnific-popup',
								'popup_init'   => array(
									'type' => 'image',
								),
							),
						),
					),
					'cherry-customizer' => array(
						'autoload' => false,
					),
					'cherry-dynamic-css' => array(
						'autoload' => false,
					),
					'cherry-google-fonts-loader' => array(
						'autoload' => false,
					),
					'cherry-term-meta' => array(
						'autoload' => false,
					),
					'cherry-post-meta' => array(
						'autoload' => false,
					),
					'cherry-breadcrumbs' => array(
						'autoload' => false,
					),
				),
			) );

			return $this->core;
		}

		/**
		 * Loads the theme translation file.
		 *
		 * @since 1.0.0
		 */
		public function l10n() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'mortgates', trailingslashit( MORTGATES_THEME_DIR ) . 'languages' );
		}

		/**
		 * Adds theme supported features.
		 *
		 * @since 1.0.0
		 */
		public function theme_support() {

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable HTML5 markup structure.
			add_theme_support( 'html5', array(
				'comment-list',
				'comment-form',
				'search-form',
				'gallery',
				'caption',
			) );

			// Enable default title tag.
			add_theme_support( 'title-tag' );

			// Enable post formats.
			add_theme_support( 'post-formats', array(
				'aside',
				'gallery',
				'image',
				'link',
				'quote',
				'video',
				'audio',
				'status',
			) );

			// Enable custom background.
			add_theme_support( 'custom-background', array(
				'default-color' => 'f7f7f7',
			) );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Enable support Selective Refresh for widgets into customize.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Add support for mobile menu
			add_theme_support( 'tm-custom-mobile-menu' );

			// Allow copy custom sidebars into child theme on activation
			add_theme_support( 'cherry_migrate_sidebars' );
		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			/**
			 * Configurations.
			 */
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'config/layout.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'config/menus.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'config/sidebars.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'config/post-meta.php';
			require_if_theme_supports( 'post-thumbnails', trailingslashit( MORTGATES_THEME_DIR ) . 'config/thumbnails.php' );

			/**
			 * Functions.
			 */
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/template-tags.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/template-menu.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/template-meta.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/template-comment.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/template-related-posts.php';

			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/extras.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/context.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/customizer.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/hooks.php';
			require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/register-plugins.php';

			/**
			 * Third party plugins hooks.
			 */
			if ( class_exists( 'Cherry_Projects' ) ) {
				require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/plugins-hooks/cherry-projects.php';
			}

			if ( class_exists( 'Cherry_Services_List' ) ) {
				require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/plugins-hooks/cherry-services-list.php';
			}

			if ( class_exists( 'Cherry_Team_Members' ) ) {
				require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/plugins-hooks/cherry-team-members.php';
			}

			if ( class_exists( 'Cherry_Trending_Posts' ) ) {
				require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/plugins-hooks/cherry-trending-posts.php';
			}

			if ( class_exists( 'TM_Testimonials_Plugin' ) ) {
				require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/plugins-hooks/cherry-testi.php';
			}

			if ( class_exists( 'Elementor\Plugin' ) ) {
				require_once trailingslashit( MORTGATES_THEME_DIR ) . 'inc/plugins-hooks/elementor.php';
			}

			/**
			 * Widgets.
			 */
			require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'about/class-about-widget.php';
			require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'about-author/class-about-author-widget.php';
			require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'banner/class-banner-widget.php';
			require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'custom-posts/class-custom-posts-widget.php';
			require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'subscribe-follow/class-subscribe-follow-widget.php';
			require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'contact-information/class-contact-information-widget.php';

			if ( class_exists( 'Elementor\Plugin' ) ) {
				require_once trailingslashit( MORTGATES_THEME_WIDGETS ) . 'elementor-template/class-elementor-template-widget.php';
			}

			/**
			 * Classes.
			 */
			if ( ! is_admin() ) {
				require_once trailingslashit( MORTGATES_THEME_CLASSES ) . 'class-wrapping.php';
			}

			require_once trailingslashit( MORTGATES_THEME_CLASSES ) . 'class-widget-area.php';
			require_once trailingslashit( MORTGATES_THEME_CLASSES ) . 'class-tgm-plugin-activation.php';

			/**
			 * Extensions.
			 */
			require_once trailingslashit( MORTGATES_THEME_EXT ) . 'import.php';
			require_once trailingslashit( MORTGATES_THEME_EXT ) . 'elementor.php';
			require_once trailingslashit( MORTGATES_THEME_EXT ) . 'cherry-trending-posts.php';
		}

		/**
		 * Run initialization of modules.
		 *
		 * @since 1.0.0
		 */
		public function init() {
			$this->customizer  = $this->get_core()->init_module( 'cherry-customizer', mortgates_get_customizer_options() );
			$this->dynamic_css = $this->get_core()->init_module( 'cherry-dynamic-css', mortgates_get_dynamic_css_options() );
			$this->get_core()->init_module( 'cherry-google-fonts-loader', mortgates_get_fonts_options() );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'category',
				'priority' => 10,
				'fields'   => array(
					'cherry_terms_thumbnails' => array(
						'type'                => 'media',
						'value'               => '',
						'multi_upload'        => false,
						'library_type'        => 'image',
						'upload_button_text'  => esc_html__( 'Set thumbnail', 'mortgates' ),
						'label'               => esc_html__( 'Category thumbnail', 'mortgates' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-term-meta', array(
				'tax'      => 'post_tag',
				'priority' => 10,
				'fields'   => array(
					'cherry_terms_thumbnails' => array(
						'type'                => 'media',
						'value'               => '',
						'multi_upload'        => false,
						'library_type'        => 'image',
						'upload_button_text'  => esc_html__( 'Set thumbnail', 'mortgates' ),
						'label'               => esc_html__( 'Tag thumbnail', 'mortgates' ),
					),
				),
			) );
			$this->get_core()->init_module( 'cherry-post-meta', mortgates_get_post_meta_settings() );
		}

		/**
		 * Load admin files for the theme.
		 *
		 * @since 1.0.0
		 */
		public function admin() {

			// Check if in the WordPress admin.
			if ( ! is_admin() ) {
				return;
			}
		}

		/**
		 * Enqueue admin-specific assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_admin_assets( $hook ) {

			wp_enqueue_style( 'mortgates-admin-fix-style', MORTGATES_THEME_CSS . '/admin-fix.min.css', array(), MORTGATES_THEME_VERSION );

			$available_pages = array(
				'widgets.php',
			);

			if ( ! in_array( $hook, $available_pages ) ) {
				return;
			}

			wp_enqueue_style( 'mortgates-admin-style', MORTGATES_THEME_CSS . '/admin.min.css', array(), MORTGATES_THEME_VERSION );
		}

		/**
		 * Register assets.
		 *
		 * @since 1.0.0
		 */
		public function register_assets() {
			wp_register_script( 'jquery-swiper', MORTGATES_THEME_JS . '/min/swiper.jquery.min.js', array( 'jquery' ), '3.4.2', true );
			wp_register_script( 'magnific-popup', MORTGATES_THEME_JS . '/min/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
			wp_register_script( 'object-fit-images', MORTGATES_THEME_JS . '/min/ofi.min.js', array(), '3.0.1', true );
			wp_register_script( 'jquery-stretch', MORTGATES_THEME_JS . '/jquery.stretch.js', array( 'jquery' ), '1.0.0', true );

			wp_register_style( 'jquery-swiper', MORTGATES_THEME_CSS . '/swiper.min.css', array(), '3.4.2' );
			wp_register_style( 'magnific-popup', MORTGATES_THEME_CSS . '/magnific-popup.min.css', array(), '1.1.0' );
			wp_register_style( 'font-awesome', MORTGATES_THEME_CSS . '/font-awesome.min.css', array(), '4.7.0' );
			wp_register_style( 'iconsmind', MORTGATES_THEME_CSS . '/iconsmind.min.css', array(), '1.0.0' );

			wp_register_style( 'linearicons-free', MORTGATES_THEME_CSS . '/linearicons-free.css', array(), '1.0.0' );
			wp_register_style( 'materialdesignicons', MORTGATES_THEME_CSS . '/materialdesignicons.css', array(), '1.0.0' );
		}

		/**
		 * Enqueue assets.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_assets() {
			wp_enqueue_style( 'mortgates-theme-style', get_stylesheet_uri(),
				array( 'font-awesome', 'magnific-popup', 'jquery-swiper', 'iconsmind', 'linearicons-free', 'materialdesignicons' ),
				MORTGATES_THEME_VERSION
			);

			/**
			 * Filter the depends on main theme script.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$depends = apply_filters( 'mortgates_theme_script_depends', array( 'cherry-js-core', 'hoverIntent', 'jquery-swiper', 'jquery-stretch' ) );

			wp_enqueue_script( 'mortgates-theme-script', MORTGATES_THEME_JS . '/theme-script.js', $depends, MORTGATES_THEME_VERSION, true );

			/**
			 * Filter the strings that send to scripts.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$labels = apply_filters( 'mortgates_theme_localize_labels', array(
				'totop_button'  => '',
				'header_layout' => get_theme_mod( 'header_layout_type', mortgates_theme()->customizer->get_default( 'header_layout_type' ) ),
			) );

			wp_localize_script( 'mortgates-theme-script', 'mortgates', apply_filters(
				'mortgates_theme_script_variables',
				array(
					'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
					'labels'  => $labels,
				) ) );

			// Threaded Comments.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Denqueue duplicate assets.
		 *
		 * @since 1.0.0
		 */
		public function denqueue_assets() {

			/**
			 * Filter the dequeue handles.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$dequeue_handles = apply_filters( 'mortgates_dequeue_handles', array(
				'style' => array(
					'tm-pg-grid',
					'tm-pg-font-awesome',
				),

				'script' => array(
					'booked-font-awesome',
				),
			) );

			foreach ( $dequeue_handles[ 'style' ] as $handle ) {
				wp_dequeue_style( $handle );
			}

			foreach ( $dequeue_handles[ 'script' ] as $handle ) {
				wp_dequeue_script( $handle );
			}

		}

		/**
		 * Overrides the load textdomain functionality when 'cherry-framework' is the domain in use.
		 *
		 * @since  1.0.0
		 * @link   https://gist.github.com/justintadlock/7a605c29ae26c80878d0
		 *
		 * @param  bool   $override Override.
		 * @param  string $domain   Text domain.
		 * @param  string $mofile   Mofile.
		 *
		 * @return bool
		 */
		public function override_load_textdomain( $override, $domain, $mofile ) {

			// Check if the domain is our framework domain.
			if ( 'cherry-framework' === $domain ) {

				global $l10n;

				// If the theme's textdomain is loaded, assign the theme's translations
				// to the framework's textdomain.
				if ( isset( $l10n['mortgates'] ) ) {
					$l10n[ $domain ] = $l10n['mortgates'];
				}

				// Always override.  We only want the theme to handle translations.
				$override = true;
			}

			return $override;
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}
} // End if().

/**
 * Retrieve the name of the highest priority template file that exists.
 *
 * @since 1.0.0
 *
 * @param string $template_name Template file to search for, in order.
 *
 * @return string The template filename if one is located.
 */
function mortgates_get_locate_template( $template_name ) {

	return locate_template( $template_name, false, false );
}

/**
 * Load a template part into a template
 *
 * @since 1.0.0
 *
 * @param string $slug The slug name for the generic template.
 * @param string $name The name of the specialised template.
 */
function mortgates_get_template_part( $slug, $name = null ) {

	return get_template_part( $slug, $name );
}

/**
 * Returns instance of main theme configuration class.
 *
 * @since  1.0.0
 * @return object
 */
function mortgates_theme() {
	return Mortgates_Theme_Setup::get_instance();
}

mortgates_theme();

add_action( 'init', 'mortgates_plugins_wizard_config', 9 );
add_action( 'init', 'mortgates_data_importer_config', 9 );

/**
 * Register Jet Plugins Wizards config
 */
function mortgates_plugins_wizard_config() {
	if ( ! is_admin() ) {
		return;
	}
	if ( ! function_exists( 'jet_plugins_wizard_register_config' ) ) {
		return;
	}
	include get_theme_file_path( 'tm-wizard-manifest.php' );
	jet_plugins_wizard_register_config( array(
		'license' => array( 'enabled' => false ),
		'plugins' => $plugins,
		'skins'   => $skins,
		'texts'   => $texts,
	) );
}

/**
 * Register Jet Data Importer config
 */
function mortgates_data_importer_config() {
	if ( ! is_admin() ) {
		return;
	}
	if ( ! function_exists( 'jet_data_importer_register_config' ) ) {
		return;
	}
	include get_theme_file_path( 'cherry-import-manifest.php' );

	jet_data_importer_register_config( $settings );
}