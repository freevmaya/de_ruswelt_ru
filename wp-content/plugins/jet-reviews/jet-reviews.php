<?php
/**
 * Plugin Name: JetReviews For Elementor
 * Plugin URI:  https://jetreviews.zemez.io/
 * Description: JetReviews - Reviews Widget for Elementor Page Builder
 * Version:     1.2.2
 * Author:      Zemez
 * Author URI:  https://zemez.io/zemezjet/
 * Text Domain: jet-reviews
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// If class `Jet_Reviews` doesn't exists yet.
if ( ! class_exists( 'Jet_Reviews' ) ) {

	/**
	 * Sets up and initializes the plugin.
	 */
	class Jet_Reviews {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * Holder for base plugin URL
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string
		 */
		private $plugin_url = null;

		/**
		 * Plugin version
		 *
		 * @var string
		 */
		private $version = '1.2.2';

		/**
		 * Holder for base plugin path
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    string
		 */
		private $plugin_path = null;

		/**
		 * Framework component
		 *
		 * @since  1.2.1
		 * @access public
		 * @var    object
		 */
		public $framework;

		/**
		 * Sets up needed actions/filters for the plugin to initialize.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {

			// Load framework
			add_action( 'after_setup_theme', array( $this, 'framework_loader' ), -20 );

			// Internationalize the text strings used.
			add_action( 'init', array( $this, 'lang' ), -999 );
			// Load files.
			add_action( 'init', array( $this, 'init' ), -999 );

			// Register activation and deactivation hook.
			register_activation_hook( __FILE__, array( $this, 'activation' ) );
			register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );
		}

		/**
		 * Load framework modules
		 *
		 * @since  1.2.1
		 * @access public
		 * @return void
		 */
		public function framework_loader() {
			require $this->plugin_path( 'framework/loader.php' );

			$this->framework = new Jet_Reviews_CX_Loader(
				array(
					$this->plugin_path( 'framework/modules/interface-builder/cherry-x-interface-builder.php' ),
					$this->plugin_path( 'framework/modules/post-meta/cherry-x-post-meta.php' ),
				)
			);
		}

		/**
		 * Returns plugin version
		 *
		 * @return string
		 */
		public function get_version() {
			return $this->version;
		}

		/**
		 * Manually init required modules.
		 *
		 * @return void
		 */
		public function init() {

			$this->load_files();

			jet_reviews_assets()->init();
			jet_reviews_integration()->init();
			jet_reviews_settings()->init();
			jet_reviews_meta()->init();
			jet_reviews_ajax_handlers()->init();

			if ( is_admin() ) {

				require $this->plugin_path( 'includes/updater/class-jet-reviews-plugin-update.php' );

				jet_reviews_updater()->init( array(
					'version' => $this->get_version(),
					'slug'    => 'jet-reviews',
				) );

				// Init plugin changelog
				require $this->plugin_path( 'includes/updater/class-jet-reviews-plugin-changelog.php' );

				jet_reviews_plugin_changelog()->init( array(
					'name'     => 'JetReviews For Elementor',
					'slug'     => 'jet-reviews',
					'version'  => $this->get_version(),
					'author'   => '<a href="https://zemez.io/zemezjet/">Zemez</a>',
					'homepage' => 'https://jetreviews.zemez.io/',
					'banners'  => array(
						'high' => $this->plugin_url( 'assets/images/banner.png' ),
						'low'  => $this->plugin_url( 'assets/images/banner.png' ),
					),
				) );

				if ( ! $this->has_elementor() ) {
					$this->required_plugins_notice();
				}

			}

		}

		/**
		 * Show recommended plugins notice.
		 *
		 * @return void
		 */
		public function required_plugins_notice() {
			require $this->plugin_path( 'includes/lib/class-tgm-plugin-activation.php' );
			add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
		}

		/**
		 * Register required plugins
		 *
		 * @return void
		 */
		public function register_required_plugins() {

			$plugins = array(
				array(
					'name'     => 'Elementor',
					'slug'     => 'elementor',
					'required' => true,
				),
			);

			$config = array(
				'id'           => 'jet-reviews',
				'default_path' => '',
				'menu'         => 'tgmpa-install-plugins',
				'parent_slug'  => 'plugins.php',
				'capability'   => 'manage_options',
				'has_notices'  => true,
				'dismissable'  => true,
				'dismiss_msg'  => '',
				'is_automatic' => false,
				'strings'      => array(
					'notice_can_install_required'     => _n_noop(
						'JetReviews for Elementor requires the following plugin: %1$s.',
						'JetReviews for Elementor requires the following plugins: %1$s.',
						'jet-reviews'
					),
					'notice_can_install_recommended'  => _n_noop(
						'JetReviews for Elementor recommends the following plugin: %1$s.',
						'JetReviews for Elementor recommends the following plugins: %1$s.',
						'jet-reviews'
					),
				),
			);

			tgmpa( $plugins, $config );

		}

		/**
		 * Check if theme has elementor
		 *
		 * @return boolean
		 */
		public function has_elementor() {
			return defined( 'ELEMENTOR_VERSION' );
		}

		/**
		 * Load required files.
		 *
		 * @return void
		 */
		public function load_files() {
			require $this->plugin_path( 'includes/class-jet-reviews-settings.php' );
			require $this->plugin_path( 'includes/class-jet-reviews-meta.php' );
			require $this->plugin_path( 'includes/class-jet-reviews-assets.php' );
			require $this->plugin_path( 'includes/class-jet-reviews-tools.php' );
			require $this->plugin_path( 'includes/class-jet-reviews-integration.php' );
			require $this->plugin_path( 'includes/class-jet-review-ajax-handlers.php' );
		}

		/**
		 * Returns path to file or dir inside plugin folder
		 *
		 * @param  string $path Path inside plugin dir.
		 * @return string
		 */
		public function plugin_path( $path = null ) {

			if ( ! $this->plugin_path ) {
				$this->plugin_path = trailingslashit( plugin_dir_path( __FILE__ ) );
			}

			return $this->plugin_path . $path;
		}
		/**
		 * Returns url to file or dir inside plugin folder
		 *
		 * @param  string $path Path inside plugin dir.
		 * @return string
		 */
		public function plugin_url( $path = null ) {

			if ( ! $this->plugin_url ) {
				$this->plugin_url = trailingslashit( plugin_dir_url( __FILE__ ) );
			}

			return $this->plugin_url . $path;
		}

		/**
		 * Loads the translation files.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function lang() {
			load_plugin_textdomain( 'jet-reviews', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		/**
		 * Get the template path.
		 *
		 * @return string
		 */
		public function template_path() {
			return apply_filters( 'jet-reviews/template-path', 'jet-reviews/' );
		}

		/**
		 * Returns path to template file.
		 *
		 * @return string|bool
		 */
		public function get_template( $name = null ) {

			$template = locate_template( $this->template_path() . $name );

			if ( ! $template ) {
				$template = $this->plugin_path( 'templates/' . $name );
			}

			if ( file_exists( $template ) ) {
				return $template;
			} else {
				return false;
			}
		}

		/**
		 * Do some stuff on plugin activation
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function activation() {
		}

		/**
		 * Do some stuff on plugin activation
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function deactivation() {
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
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
}

if ( ! function_exists( 'jet_reviews' ) ) {

	/**
	 * Returns instanse of the plugin class.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function jet_reviews() {
		return Jet_Reviews::get_instance();
	}
}

jet_reviews();
