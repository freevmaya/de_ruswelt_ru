<?php
/**
 * Class description
 *
 * @package   package_name
 * @author    Cherry Team
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Jet_Reviews_Settings' ) ) {

	/**
	 * Define Jet_Reviews_Settings class
	 */
	class Jet_Reviews_Settings {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * [$key description]
		 * @var string
		 */
		public $key = 'jet-reviews-settings';

		/**
		 * [$builder description]
		 * @var null
		 */
		public $builder  = null;

		/**
		 * [$settings description]
		 * @var null
		 */
		public $settings = null;

		/**
		 * Avaliable Widgets array
		 *
		 * @var array
		 */
		public $avaliable_widgets = array();

		/**
		 * Init page
		 */
		public function init() {
			add_action( 'admin_enqueue_scripts', array( $this, 'init_builder' ), 0 );

			add_action( 'admin_menu', array( $this, 'register_page' ), 99 );
			add_action( 'init', array( $this, 'save' ), 40 );
			add_action( 'admin_notices', array( $this, 'saved_notice' ) );

			foreach ( glob( jet_reviews()->plugin_path( 'includes/addons/' ) . '*.php' ) as $file ) {
				$data = get_file_data( $file, array( 'class' => 'Class', 'name' => 'Name', 'slug' => 'Slug' ) );

				$slug = basename( $file, '.php' );
				$this->avaliable_widgets[ $slug] = $data['name'];
			}
		}

		/**
		 * Initialize page builder module if required
		 *
		 * @return void
		 */
		public function init_builder() {

			if ( isset( $_REQUEST['page'] ) && $this->key === $_REQUEST['page'] ) {
				$builder_data  = jet_reviews()->framework->get_included_module_data( 'cherry-x-interface-builder.php' );
				$this->builder = new CX_Interface_Builder(
					array(
						'path' => $builder_data['path'],
						'url'  => $builder_data['url'],
					)
				);
			}
		}

		/**
		 * Show saved notice
		 *
		 * @return bool
		 */
		public function saved_notice() {

			if ( ! isset( $_GET['settings-saved'] ) ) {
				return false;
			}

			$message = esc_html__( 'Settings saved', 'jet-reviews' );

			printf( '<div class="notice notice-success is-dismissible"><p>%s</p></div>', $message );

			return true;

		}

		/**
		 * Save settings
		 *
		 * @return void
		 */
		public function save() {

			if ( ! isset( $_REQUEST['page'] ) || $this->key !== $_REQUEST['page'] ) {
				return;
			}

			if ( ! isset( $_REQUEST['action'] ) || 'save-settings' !== $_REQUEST['action'] ) {
				return;
			}

			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			$current = get_option( $this->key, array() );
			$data    = $_REQUEST;

			unset( $data['action'] );

			foreach ( $data as $key => $value ) {
				$current[ $key ] = is_array( $value ) ? $value : esc_attr( $value );
			}

			update_option( $this->key, $current );

			$redirect = add_query_arg(
				array( 'dialog-saved' => true ),
				$this->get_settings_page_link()
			);

			wp_redirect( $redirect );
			die();

		}

		/**
		 * Return settings page URL
		 *
		 * @return string
		 */
		public function get_settings_page_link() {

			return add_query_arg(
				array(
					'page' => $this->key,
				),
				esc_url( admin_url( 'admin.php' ) )
			);

		}

		public function get( $setting, $default = false ) {

			if ( null === $this->settings ) {
				$this->settings = get_option( $this->key, array() );
			}

			return isset( $this->settings[ $setting ] ) ? $this->settings[ $setting ] : $default;

		}

		/**
		 * Register add/edit page
		 *
		 * @return void
		 */
		public function register_page() {

			add_submenu_page(
				'elementor',
				esc_html__( 'JetReviews Settings', 'jet-reviews' ),
				esc_html__( 'JetReviews Settings', 'jet-reviews' ),
				'manage_options',
				$this->key,
				array( $this, 'render_page' )
			);

		}

		/**
		 * Render settings page
		 *
		 * @return void
		 */
		public function render_page() {

			foreach ( $this->avaliable_widgets as $key => $value ) {
				$default_avaliable_widgets[ $key ] = 'true';
			}

			$this->builder->register_section(
				array(
					'jet_reviews_settings' => array(
						'type'   => 'section',
						'scroll' => false,
						'title'  => esc_html__( 'JetReviews Settings', 'jet-reviews' ),
					),
				)
			);

			$this->builder->register_form(
				array(
					'jet_reviews_settings_form' => array(
						'type'   => 'form',
						'parent' => 'jet_reviews_settings',
						'action' => add_query_arg(
							array( 'page' => $this->key, 'action' => 'save-settings' ),
							esc_url( admin_url( 'admin.php' ) )
						),
					),
				)
			);

			$this->builder->register_settings(
				array(
					'settings_top' => array(
						'type'   => 'settings',
						'parent' => 'jet_reviews_settings_form',
					),
					'settings_bottom' => array(
						'type'   => 'settings',
						'parent' => 'jet_reviews_settings_form',
					),
				)
			);

			$this->builder->register_component(
				array(
					'jet_reviews_tab_vertical' => array(
						'type'   => 'component-tab-vertical',
						'parent' => 'settings_top',
					),
				)
			);

			$this->builder->register_settings(
				array(
					'general_tab' => array(
						'parent'      => 'jet_reviews_tab_vertical',
						'title'       => esc_html__( 'General settings', 'jet-reviews' ),
					),
					/*'role_tab' => array(
						'parent'      => 'jet_reviews_tab_vertical',
						'title'       => esc_html__( 'Roles', 'jet-reviews' ),
					),*/
				)
			);

			$this->builder->register_control(
				array(
					'allowed-post-types' => array(
						'type'         => 'checkbox',
						'parent'       => 'general_tab',
						'title'        => esc_html__( 'Enable Review Meta Box for:', 'jet-reviews' ),
						'placeholder'  => esc_html__( 'MailChimp API key', 'jet-reviews' ),
						'value'        => $this->get( 'allowed-post-types', array( 'post' => 'true' ) ),
						'options'      => $this->get_post_types(),
						'class'        => '',
						'label'        => '',
					),
				)
			);

			$this->builder->register_html(
				array(
					'save_button' => array(
						'type'   => 'html',
						'parent' => 'settings_bottom',
						'class'  => 'cx-control dialog-save',
						'html'   => '<button type="submit" class="button button-primary">' . esc_html__( 'Save', 'jet-reviews' ) . '</button>',
					),
				)
			);

			echo '<div class="jet-reviews-settings-page">';
				$this->builder->render();
			echo '</div>';
		}

		/**
		 * Returns post types options array
		 *
		 * @return array
		 */
		public function get_post_types() {
			$post_types = get_post_types( array( 'public' => true ), 'objects' );
			return wp_list_pluck( $post_types, 'label', 'name' );
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

/**
 * Returns instance of Jet_Reviews_Settings
 *
 * @return object
 */
function jet_reviews_settings() {
	return Jet_Reviews_Settings::get_instance();
}

jet_reviews_settings()->init();
