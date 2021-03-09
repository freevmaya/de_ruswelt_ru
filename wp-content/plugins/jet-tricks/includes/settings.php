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

if ( ! class_exists( 'Jet_Tricks_Settings' ) ) {

	/**
	 * Define Jet_Tricks_Settings class
	 */
	class Jet_Tricks_Settings {

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
		public $key = 'jet-tricks-settings';

		/**
		 * [$builder description]
		 * @var null
		 */
		public $builder = null;

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
		public $avaliable_widgets = [];

		/**
		 * [$default_avaliable_extensions description]
		 * @var [type]
		 */
		public $default_avaliable_extensions = [
			'widget_parallax'   => 'true',
			'widget_satellite'  => 'true',
			'widget_tooltip'    => 'true',
			'column_sticky'     => 'true',
			'section_particles' => 'true',
		];

		/**
		 * Init page
		 */
		public function init() {

			$this->init_builder();

			add_action( 'admin_menu', array( $this, 'register_page' ), 99 );
			add_action( 'init', array( $this, 'save' ), 40 );
			add_action( 'admin_notices', array( $this, 'saved_notice' ) );

			foreach ( glob( jet_tricks()->plugin_path( 'includes/addons/' ) . '*.php' ) as $file ) {
				$data = get_file_data( $file, array( 'class'=>'Class', 'name' => 'Name', 'slug'=>'Slug' ) );

				$slug = basename( $file, '.php' );
				$this->avaliable_widgets[ $slug] = $data['name'];
			}

			add_action( 'jet-styles-manager/compatibility/register-plugin', array( $this, 'register_for_styles_manager' ) );
		}

		/**
		 * Register jet-tricks plugin for styles manager
		 *
		 * @param  object $compatibility_manager JetStyleManager->compatibility instance
		 * @return void
		 */
		public function register_for_styles_manager( $compatibility_manager ) {
			$compatibility_manager->register_plugin( 'jet-tricks', (int) $this->get( 'widgets_load_level', 100 ) );
		}

		/**
		 * Initialize page builder module if reqired
		 *
		 * @return [type] [description]
		 */
		public function init_builder() {

			if ( isset( $_REQUEST['page'] ) && $this->key === $_REQUEST['page'] ) {
				$builder_data = jet_tricks()->framework->get_included_module_data( 'cherry-x-interface-builder.php' );

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

			$message = esc_html__( 'Settings saved', 'jet-tricks' );

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
				esc_html__( 'JetTricks Settings', 'jet-tricks' ),
				esc_html__( 'JetTricks Settings', 'jet-tricks' ),
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

			$default_avaliable_widgets = [];

			foreach ( $this->avaliable_widgets as $key => $value ) {
				$default_avaliable_widgets[ $key ] = 'true';
			}

			$this->builder->register_section(
				array(
					'jet_tricks_settings' => array(
						'type'   => 'section',
						'scroll' => false,
						'title'  => esc_html__( 'JetTricks Settings', 'jet-tricks' ),
					),
				)
			);

			$this->builder->register_form(
				array(
					'jet_tricks_settings_form' => array(
						'type'   => 'form',
						'parent' => 'jet_tricks_settings',
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
						'parent' => 'jet_tricks_settings_form',
					),
					'settings_bottom' => array(
						'type'   => 'settings',
						'parent' => 'jet_tricks_settings_form',
					),
				)
			);

			$this->builder->register_component(
				array(
					'jet_tricks_tab_vertical' => array(
						'parent' => 'settings_top',
						'type'   => 'component-tab-vertical',
					),
				)
			);

			$this->builder->register_settings(
				array(
					'general_options' => array(
						'parent'      => 'jet_tricks_tab_vertical',
						'title'       => esc_html__( 'General', 'jet-tricks' ),
					),
				)
			);

			$this->builder->register_settings(
				array(
					'avaliable_widgets_options' => array(
						'parent'      => 'jet_tricks_tab_vertical',
						'title'       => esc_html__( 'Avaliable Widgets', 'jet-tricks' ),
					),
				)
			);

			$this->builder->register_settings(
				array(
					'avaliable_extensions_options' => array(
						'parent'      => 'jet_tricks_tab_vertical',
						'title'       => esc_html__( 'Avaliable Extensions', 'jet-tricks' ),
					),
				)
			);

			$this->builder->register_control(
				array(
					'widgets_load_level' => array(
						'type'        => 'slider',
						'id'          => 'widgets_load_level',
						'name'        => 'widgets_load_level',
						'parent'      => 'general_options',
						'min_value'   => 0,
						'max_value'   => 100,
						'step_value'  => 25,
						'range_label' => true,
						'value'       => $this->get( 'widgets_load_level', 100 ),
						'title'       => esc_html__( 'Editor Load Level', 'jet-tricks' ),
						'description' => __( 'Choose a certain set of options in the widget’s Style tab by moving the slider, and improve your Elementor editor performance by selecting appropriate style settings fill level (from None to Full level)', 'jet-tabs' ),
					),
				)
			);

			$this->builder->register_control(
				array(
					'avaliable_widgets' => array(
						'type'        => 'checkbox',
						'id'          => 'avaliable_widgets',
						'name'        => 'avaliable_widgets',
						'parent'      => 'avaliable_widgets_options',
						'value'       => $this->get( 'avaliable_widgets', $default_avaliable_widgets ),
						'options'     => $this->avaliable_widgets,
						'title'       => esc_html__( 'Avaliable Widgets', 'jet-tricks' ),
						'description' => esc_html__( 'List of widgets that will be available when editing the page', 'jet-tricks' ),
						'class'       => 'jet_tricks_settings_form__checkbox-group'
					),
				)
			);

			$this->builder->register_control(
				array(
					'avaliable_extensions' => array(
						'type'        => 'checkbox',
						'id'          => 'avaliable_extensions',
						'name'        => 'avaliable_extensions',
						'parent'      => 'avaliable_extensions_options',
						'value'       => $this->get( 'avaliable_extensions', $this->default_avaliable_extensions ),
						'options'     => [
							'widget_parallax'   => esc_html__( 'Parallax Widget Extension', 'jet-tricks' ),
							'widget_satellite'  => esc_html__( 'Satellite Widget Extension', 'jet-tricks' ),
							'widget_tooltip'    => esc_html__( 'Tooltip Widget Extension', 'jet-tricks' ),
							'column_sticky'     => esc_html__( 'Sticky Column', 'jet-tricks' ),
							'section_particles' => esc_html__( 'Section Particles', 'jet-tricks' ),
						],
						'title'       => esc_html__( 'Avaliable Extensions', 'jet-tricks' ),
						'description' => esc_html__( 'List of Extension that will be available when editing the page', 'jet-tricks' ),
						'class'       => 'jet_tricks_settings_form__checkbox-group'
					),
				)
			);

			$this->builder->register_html(
				array(
					'save_button' => array(
						'type'   => 'html',
						'parent' => 'settings_bottom',
						'class'  => 'cx-control dialog-save',
						'html'   => '<button type="submit" class="button button-primary">' . esc_html__( 'Save', 'jet-tricks' ) . '</button>',
					),
				)
			);

			echo '<div class="jet-tricks-settings-page">';
				$this->builder->render();
			echo '</div>';
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
 * Returns instance of Jet_Tricks_Settings
 *
 * @return object
 */
function jet_tricks_settings() {
	return Jet_Tricks_Settings::get_instance();
}
