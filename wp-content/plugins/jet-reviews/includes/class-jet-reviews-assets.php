<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Jet_Reviews_Assets' ) ) {

	/**
	 * Define Jet_Reviews_Assets class
	 */
	class Jet_Reviews_Assets {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * Constructor for the class
		 */
		public function init() {

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );

			add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Admin styles
		 * @return [type] [description]
		 */
		public function admin_styles() {

			$allowed_post_types = jet_reviews_settings()->get( 'allowed-post-types', array( 'post' => 'true' ) );
			$post_type          = get_post_type();

			if ( ! $post_type ) {
				return;
			}

			if ( ! array_key_exists( $post_type, $allowed_post_types ) ) {
				return;
			}

			wp_enqueue_style(
				'jet-reviews-admin',
				jet_reviews()->plugin_url( 'assets/css/jet-reviews-admin.css' ),
				false,
				jet_reviews()->get_version()
			);

		}

		/**
		 * Enqueue public-facing stylesheets.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function enqueue_styles() {

			wp_enqueue_style(
				'jet-reviews',
				jet_reviews()->plugin_url( 'assets/css/jet-reviews.css' ),
				false,
				jet_reviews()->get_version()
			);

		}

		/**
		 * Enqueue plugin scripts only with elementor scripts
		 *
		 * @return void
		 */
		public function enqueue_scripts() {
			global $wp;

			wp_enqueue_script(
				'jet-reviews-frontend',
				jet_reviews()->plugin_url( 'assets/js/jet-reviews-frontend.js' ),
				array( 'jquery', 'elementor-frontend' ),
				jet_reviews()->get_version(),
				true
			);

			$this->localize_data['version']     = jet_reviews()->get_version();
			$this->localize_data['ajax_url']    = esc_url( admin_url( 'admin-ajax.php' ) );
			$this->localize_data['current_url'] = esc_url( home_url( add_query_arg( [], $wp->request ) ) );

			wp_localize_script(
				'jet-reviews-frontend',
				'jetReviewData',
				$this->localize_data
			);

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

}

/**
 * Returns instance of Jet_Reviews_Assets
 *
 * @return object
 */
function jet_reviews_assets() {
	return Jet_Reviews_Assets::get_instance();
}
