<?php
/*
Widget Name: Subscribe and Follow widget
Description: This widget is used to display blocks of Subscribe and Follow sections. List of social networks for the Follow block is same as in Social Menu
Settings:
 Enable Subscribe Box - Enable/disable the subscribe box
 Subscribe Title - This property specifies the subscribe box title
 Subscribe text message - Here you can add text description for the subscribe form
 Subscribe input placeholder - This property specifies a placeholder text “Enter Your Email Here” in the input area of the Subscribe Box
 Subscribe submit label - This property specifies a placeholder text “Submit” in the subscribe button of the Subscribe Box
 Subscribe success - This property specifies a success message text “You are successfully subscribed” in the subscribe area of the Subscribe Box
 Enable Follow Box - Hide/Show Follow Box
 Follow Title - This property specifies the follow box title
 Follow text message - Here you can add text description for the Follow block
 Enable custom background - Toggle to enable the custom background
*/

/**
 * @package Mortgates
 */

class Mortgates_Subscribe_Follow_Widget extends Cherry_Abstract_Widget {

	/**
	 * MailChimp API server
	 *
	 * @var string
	 */
	private $api_server = 'https://%s.api.mailchimp.com/2.0/';

	/**
	 * Service errors set
	 *
	 * @var array
	 */
	public $errors = array();

	/**
	 * Nonce field
	 *
	 * @var string
	 */
	public $nonce = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget-subscribe';
		$this->widget_description = esc_html__( 'Display subscribe form and follow links.', 'mortgates' );
		$this->widget_id          = 'mortgates_widget_subscribe_follow';
		$this->widget_name        = esc_html__( 'Subscribe and Follow', 'mortgates' );
		$this->settings           = array(
			'enable_subscribe' => array(
				'type'   => 'checkbox',
				'value'  => array(
					'enable_subscribe' => 'true',
				),
				'options' => array(
					'enable_subscribe' => esc_html__( 'Enable Subscribe Box', 'mortgates' ),
				),
			),
			'subscribe_title' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Subscribe', 'mortgates' ),
				'label' => esc_html__( 'Subscribe Title', 'mortgates' ),
			),
			'subscribe_message' => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Subscribe text message', 'mortgates' ),
			),
			'subscribe_input' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Enter your email', 'mortgates' ),
				'label' => esc_html__( 'Subscribe input placeholder', 'mortgates' ),
			),
			'subscribe_submit_type' => array(
				'type'    => 'radio',
				'value'   => 'text',
				'options' => array(
					'text' => array(
						'label' => esc_html__( 'Text', 'mortgates' ),
						'slave' => 'subscribe_submit_type_text',
					),
					'icon' => array(
						'label' => esc_html__( 'Icon', 'mortgates' ),
						'slave' => 'subscribe_submit_type_icon',
					),
				),
				'label'   => esc_html__( 'Subscribe Submit Type', 'mortgates' ),
			),
			'subscribe_submit' => array(
				'type'   => 'text',
				'value'  => esc_html__( 'Subscribe', 'mortgates' ),
				'label'  => esc_html__( 'Subscribe submit label', 'mortgates' ),
				'master' => 'subscribe_submit_type_text',
			),
			'subscribe_submit_icon' => array(
				'type'      => 'iconpicker',
				'label'     => esc_html__( 'Choose icon', 'mortgates' ),
				'value'     => 'fa-envelope',
				'width'     => 'full',
				'icon_data' => mortgates_get_fa_icons_data(),
				'master'    => 'subscribe_submit_type_icon',
			),
			'subscribe_success' => array(
				'type'  => 'text',
				'value' => esc_html__( 'You successfully subscribed', 'mortgates' ),
				'label' => esc_html__( 'Subscribe success', 'mortgates' ),
			),
			'subscribe_style' => array(
				'type'   => 'checkbox',
				'value'  => array(
					'subscribe_style' => 'false',
				),
				'options' => array(
					'subscribe_style' => array(
						'label' => esc_html__( 'Use Custom Subscribe Form Style', 'mortgates' ),
						'slave' => 'subscribe_style'
					),
				),
			),
			'subscribe_input_bg' => array(
				'type'   => 'colorpicker',
				'label'  => esc_html__( 'Subscribe Input Background Color', 'mortgates' ),
				'value'  => '',
				'master' => 'subscribe_style',
			),
			'subscribe_input_bg_alpha' => array(
				'type'       => 'slider',
				'label'      => esc_html__( 'Subscribe Input Background Color Alpha', 'mortgates' ),
				'value'      => 100,
				'max_value'  => 100,
				'min_value'  => 0,
				'step_value' => 1,
				'master'     => 'subscribe_style',
			),
			'subscribe_input_color' => array(
				'type'   => 'colorpicker',
				'label'  => esc_html__( 'Subscribe Input Text Color', 'mortgates' ),
				'value'  => '',
				'master' => 'subscribe_style',
			),
			'subscribe_btn_style' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Subscribe Button Style', 'mortgates' ),
				'value'   => 'primary',
				'options' => mortgates_get_btn_style_presets(),
				'master'  => 'subscribe_style',
			),
			'enable_follow' => array(
				'type'   => 'checkbox',
				'value'  => array(
					'enable_follow' => 'false',
				),
				'options' => array(
					'enable_follow' => esc_html__( 'Enable Follow Box', 'mortgates' ),
				),
			),
			'follow_title' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Follow', 'mortgates' ),
				'label' => esc_html__( 'Follow Title', 'mortgates' ),
			),
			'follow_message' => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Follow text message', 'mortgates' ),
			),
			'enable_background' => array(
				'type'   => 'checkbox',
				'value'  => array(
					'enable_background' => 'false',
				),
				'options' => array(
					'enable_background' => array(
						'label' => esc_html__( 'Enable Custom Background', 'mortgates' ),
						'slave' => 'background_image'
					),
				),
			),
			'background_color' => array(
				'type'   => 'colorpicker',
				'label'  => esc_html__( 'Background Color', 'mortgates' ),
				'value'  => '#f7f7f7',
				'master' => 'background_image',
			),
			'background_image' => array(
				'type'               => 'media',
				'label'              => esc_html__( 'Background Image', 'mortgates' ),
				'upload_button_text' => esc_html__( 'Choose Image', 'mortgates' ),
				'multi_upload'       => false,
				'master'             => 'background_image',
			),
			'invert_text_colorscheme' => array(
				'type'  => 'checkbox',
				'value' => array(
					'invert_text_colorscheme' => 'false',
				),
				'master'  => 'background_image',
				'options' => array(
					'invert_text_colorscheme' => esc_html__( 'Use "Invert scheme" for text color', 'mortgates' ),
				),
			),
			'background_position' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Background Position', 'mortgates' ),
				'value'   => 'center',
				'options' => array(
					'top-left'      => esc_html__( 'Top Left', 'mortgates' ),
					'top-center'    => esc_html__( 'Top Center', 'mortgates' ),
					'top-right'     => esc_html__( 'Top Right', 'mortgates' ),
					'center-left'   => esc_html__( 'Middle Left', 'mortgates' ),
					'center'        => esc_html__( 'Middle Center', 'mortgates' ),
					'center-right'  => esc_html__( 'Middle Right', 'mortgates' ),
					'bottom-left'   => esc_html__( 'Bottom Left', 'mortgates' ),
					'bottom-center' => esc_html__( 'Bottom Center', 'mortgates' ),
					'bottom-right'  => esc_html__( 'Bottom Right', 'mortgates' ),
				),
				'master' => 'background_image',
			),
			'background_repeat' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Background Position', 'mortgates' ),
				'value'   => 'no-repeat',
				'options' => array(
					'repeat'    => esc_html__( 'Repeat', 'mortgates' ),
					'repeat-x'  => esc_html__( 'Repeat X', 'mortgates' ),
					'repeat-y'  => esc_html__( 'Repeat Y', 'mortgates' ),
					'no-repeat' => esc_html__( 'No repeat', 'mortgates' ),
				),
				'master' => 'background_image',
			),
			'background_size' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Background Size', 'mortgates' ),
				'value'   => 'inherit',
				'options' => array(
					'cover'   => esc_html__( 'Cover', 'mortgates' ),
					'contain' => esc_html__( 'Contain', 'mortgates' ),
					'auto'    => esc_html__( 'Auto', 'mortgates' ),
				),
				'master' => 'background_image',
			),
		);

		add_action( 'wp_ajax_mortgates_subscribe', array( $this, 'process_subscribe' ) );
		add_action( 'wp_ajax_nopriv_mortgates_subscribe', array( $this, 'process_subscribe' ) );

		$this->errors = array(
			'nonce'     => esc_html__( 'Security validation failed', 'mortgates' ),
			'mail'      => esc_html__( 'Please, provide valid mail', 'mortgates' ),
			'mailchimp' => esc_html__( 'Please, set up MailChimp API key and List ID', 'mortgates' ),
			'internal'  => esc_html__( 'Internal error. Please, try again later', 'mortgates' ),
		);

		$this->nonce = wp_create_nonce( 'mortgates-subscribe-nonce' );

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		$follow_template            = mortgates_get_locate_template( 'inc/widgets/subscribe-follow/view/follow-view.php' );
		$subscribe_template         = mortgates_get_locate_template( 'inc/widgets/subscribe-follow/view/subcribe-view.php' );
		$background_styles_template = locate_template( 'inc/widgets/subscribe-follow/view/background-styles-view.php', false, false );

		if ( empty( $follow_template ) && empty( $subscribe_template ) ) {
			return;
		}

		ob_start();

		$this->setup_widget_data( $args, $instance );
		$this->widget_start( $args, $this->instance );

		$classes = array( 'subscribe-follow__wrap' );

		if ( 'true' === $this->instance['enable_background']['enable_background'] ) {
			$classes[] = 'subscribe-follow__custom-bg';
		}

		if ( 'true' === $this->instance['invert_text_colorscheme']['invert_text_colorscheme'] && 'true' === $this->instance['enable_background']['enable_background'] ) {
			$classes[] = 'invert';
		}

		echo '<div class="' . join( ' ', $classes ) . '">';

		$subscribe_enabled = ( ! empty( $this->instance['enable_subscribe'] ) ) ? $this->instance['enable_subscribe'] : false;

		if ( is_array( $subscribe_enabled ) && 'true' === $subscribe_enabled['enable_subscribe'] ) {
			$subscribe_enabled = true;
		} else {
			$subscribe_enabled = false;
		}

		$follow_enabled = ( ! empty( $this->instance['enable_follow'] ) ) ? $this->instance['enable_follow'] : false;

		if ( is_array( $follow_enabled ) && 'true' === $follow_enabled['enable_follow'] ) {
			$follow_enabled = true;
		} else {
			$follow_enabled = false;
		}

		$api_key = get_theme_mod( 'mailchimp_api_key' );
		$list_id = get_theme_mod( 'mailchimp_list_id' );

		// Load subscribe tamplate
		if ( $subscribe_enabled && $subscribe_template && $api_key && $list_id ) {
			include $subscribe_template;

			$this->custom_subscribe_input_style();

		} elseif ( ! $api_key || ! $list_id ) {
			esc_html_e( 'Please set up MailChimp API key and List ID', 'mortgates' );
		}

		// Load follow template
		if ( $follow_template && $follow_enabled ) {
			include $follow_template;
		}

		echo '</div>';

		$background_enabled = ( ! empty( $this->instance['enable_background'] ) ) ? $this->instance['enable_background'] : false;

		if ( is_array( $background_enabled ) && 'true' === $background_enabled['enable_background'] ) {

			if ( $background_styles_template ) {
				include $background_styles_template;
			}
		}

		if ( $this->is_css_required() ) {
			$dynamic_css = mortgates_theme()->dynamic_css;

			add_filter( 'cherry_dynamic_css_collector_localize_object', array( $this, 'fix_preview_css' ) );
			$dynamic_css::$collector->print_style();
			remove_filter( 'cherry_dynamic_css_collector_localize_object', array( $this, 'fix_preview_css' ) );
		}

		$this->widget_end( $args );
		$this->reset_widget_data();

		echo $this->cache_widget( $args, ob_get_clean() );
	}

	/**
	 * Custom subscribe input style.
	 */
	public function custom_subscribe_input_style() {
		if ( 'false' === $this->instance['subscribe_style']['subscribe_style'] ) {
			return;
		}

		$input_bg       = $this->instance['subscribe_input_bg'];
		$input_bg_alpha = $this->instance['subscribe_input_bg_alpha'];
		$input_color    = $this->instance['subscribe_input_color'];

		$input_style    = array();
		$btn_icon_style = array();

		if ( $input_bg ) {

			$dynamic_utilities = mortgates_theme()->dynamic_css->get_css_functions();
			$alpha_functions   = $dynamic_utilities['alpha'];

			$args = array(
				$input_bg,
				$input_bg_alpha,
			);

			$rgba = call_user_func_array( $alpha_functions, $args );

			$input_style['background-color'] = $rgba;
		}

		if ( $input_color ) {
			$input_style['color'] = $input_color;
			$btn_icon_style['color'] = $input_color;
		}

		if ( ! $input_style ) {
			return;
		}

		mortgates_theme()->dynamic_css->add_style(
			$this->add_selector( '.subscribe-block__input' ),
			$input_style
		);

		mortgates_theme()->dynamic_css->add_style(
			$this->add_selector( '.subscribe-block__submit--icon:not(:hover)' ),
			$btn_icon_style
		);
	}
	/**
	 * Check if need to insert custom CSS.
	 *
	 * @return boolean
	 */
	public function is_css_required() {

		$allowed_actions = array( 'elementor_render_widget', 'elementor' );

		if ( isset( $_REQUEST['action'] ) && in_array( $_REQUEST['action'], $allowed_actions ) ) {

			return true;
		}

		return false;
	}

	/**
	 * Fix preview styles.
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	public function fix_preview_css( $data = array() ) {

		if ( ! empty( $data['css'] ) ) {
			printf( '<style>%s</style>', html_entity_decode( $data['css'] ) );
		}

		return $data;
	}

	/**
	 * Get social navigation menu.
	 *
	 * @return string
	 */
	public function get_social_nav() {
		return mortgates_get_social_list( 'widget' );
	}

	/**
	 * Get subscribe button HTML.
	 *
	 * @param  string $class CSS class.
	 * @return string
	 */
	public function get_subscribe_submit( $class ) {
		$subscribe_submit = $this->use_wpml_translate( 'subscribe_submit' );
		$subscribe_submit = mortgates_render_icons( $subscribe_submit );

		if ( 'icon' === $this->instance['subscribe_submit_type'] ) {
			$subscribe_submit_icon_format = apply_filters( 'mortgates_subscribe_submit_icon_format', '<i class="fa %s"></i>' );
			$subscribe_submit_icon        = $this->instance['subscribe_submit_icon'];

			$subscribe_submit = sprintf( $subscribe_submit_icon_format, $subscribe_submit_icon );
		}

		return '<a href="#" class="subscribe-block__submit ' . esc_attr( $class ) . '"><span class="submit-inner">' . wp_kses_post( $subscribe_submit ) . '</span></a>';
	}

	/**
	 * Get subscribe or follow block title.
	 *
	 * @param  string $block Block name to get title for.
	 * @return string
	 */
	public function get_block_title( $block = 'follow' ) {
		$setting = $block . '_title';
		$title   = $this->use_wpml_translate( $setting );

		if ( ! empty( $title ) ) {
			return $this->args['before_title'] . $title . $this->args['after_title'];
		}
	}

	/**
	 * Get subscribe or follow block title.
	 *
	 * @param  string $block Block name to get title for.
	 * @return string
	 */
	public function get_block_message( $block = 'follow' ) {
		$setting = $block . '_message';
		$message = $this->use_wpml_translate( $setting );

		if ( ! empty( $message ) ) {
			return '<div class="' . $block . '-block__message">' . wp_kses( $message, wp_kses_allowed_html( 'post' ) ) . '</div>';
		}
	}

	/**
	 * Get subscribe form input.
	 *
	 * @return string
	 */
	public function get_subscribe_input() {
		return '<input class="subscribe-block__input" type="email" name="subscribe-mail" value="" placeholder="' . esc_attr( $this->use_wpml_translate( 'subscribe_input' ) ) . '">';
	}

	/**
	 * Get nonce field HTML.
	 *
	 * @return string
	 */
	public function get_nonce_field() {
		return sprintf( '<input type="hidden" name="nonce" value="%s">', $this->nonce );
	}

	/**
	 * Get subscribe form service messages.
	 *
	 * @return string
	 */
	public function get_subscribe_messages() {
		$success = $this->use_wpml_translate( 'subscribe_success' );

		return '<div class="subscribe-block__messages">
					<div class="subscribe-block__success hidden">' . esc_html( $success ) . '</div>
					<div class="subscribe-block__error hidden"></div>
				</div>';
	}

	/**
	 * Process subscribtion form.
	 *
	 * @return void
	 */
	public function process_subscribe() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'mortgates-subscribe-nonce' ) ) {
			wp_send_json_error( array( 'message' => $this->errors['nonce'] ) );
		}

		$mail = ( ! empty( $_POST['mail'] ) ) ? esc_attr( $_POST['mail'] ) : false;

		if ( ! is_email( $mail ) ) {
			wp_send_json_error( array( 'message' => $this->errors['mail'] ) );
		}

		$args = array(
			'email' => array(
				'email' => $mail,
			),
			'double_optin' => false,
		);

		$response = $this->api_call( 'lists/subscribe', $args );

		if ( false === $response ) {
			wp_send_json_error( array( 'message' => $this->errors['mailchimp'] ) );
		}

		$response = json_decode( $response, true );

		if ( empty( $response ) ) {
			wp_send_json_error( array( 'message' => $this->errors['internal'] ) );
		}

		if ( isset( $response['status'] ) && 'error' == $response['status'] ) {
			wp_send_json_error( array( 'message' => esc_html( $response['error'] ) ) );
		}

		wp_send_json_success();
	}

	/**
	 * Make remote request to mailchimp API.
	 *
	 * @param  string $method API method to call.
	 * @param  array  $args   API call arguments.
	 * @return array|bool
	 */
	public function api_call( $method, $args = array() ) {

		if ( ! $method ) {
			return false;
		}

		$api_key = get_theme_mod( 'mailchimp_api_key' );
		$list_id = get_theme_mod( 'mailchimp_list_id' );

		if ( ! $api_key || ! $list_id ) {
			return false;
		}

		$key_data = explode( '-', $api_key );

		if ( empty( $key_data ) || ! isset( $key_data[1] ) ) {
			return false;
		}

		$this->api_server = sprintf( $this->api_server, $key_data[1] );

		$url      = esc_url( trailingslashit( $this->api_server . $method ) );
		$defaults = array( 'apikey' => $api_key, 'id' => $list_id );
		$data     = json_encode( array_merge( $defaults, $args ) );

		$request = wp_remote_post( $url, array( 'body' => $data ) );

		return wp_remote_retrieve_body( $request );
	}
}

add_action( 'widgets_init', 'mortgates_register_subscribe_follow_widgets' );
/**
 * Register subscribe-follow widget.
 */
function mortgates_register_subscribe_follow_widgets() {
	register_widget( 'Mortgates_Subscribe_Follow_Widget' );
}
