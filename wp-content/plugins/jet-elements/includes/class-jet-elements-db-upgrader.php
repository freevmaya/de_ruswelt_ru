<?php
/**
 * DB upgrder class
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Jet_Elements_DB_Upgrader' ) ) {

	/**
	 * Define Jet_Elements_DB_Upgrader class
	 */
	class Jet_Elements_DB_Upgrader {

		/**
		 * Constructor for the class
		 */
		public function __construct() {
			/**
			 * Plugin initialized on new Jet_Elements_DB_Upgrader call.
			 * Please ensure, that it called only on admin context
			 */
			$this->init_upgrader();
		}

		/**
		 * Initialize upgrader module
		 *
		 * @return void
		 */
		public function init_upgrader() {

			jet_elements()->get_core()->init_module( 'cherry-db-updater',
				array(
					'slug'      => 'jet-elements',
					'version'   => '1.11.0',
					'callbacks' => array(
						'1.7.2' => array(
							array( $this, 'update_db_1_7_2' ),
						),
						'1.10.0' => array(
							array( $this, 'update_db_1_10_0' ),
						),
						'1.11.0' => array(
							array( $this, 'update_db_1_11_0' ),
						),
					),
				)
			);

		}

		/**
		 * Update db updater 1.7.2
		 *
		 * @return void
		 */
		public function update_db_1_7_2() {

			$current_version_settings = get_option( $this->key, false );

			if ( $current_version_settings ) {
				if ( isset( $current_version_settings['avaliable_widgets'] ) ) {
					if ( ! isset( $current_version_settings['avaliable_widgets']['jet-elements-progress-bar'] ) ) {
						$current_version_settings['avaliable_widgets']['jet-elements-progress-bar'] = 'true';
					}
					update_option( $this->key, $current_version_settings );
				}
			}
		}

		/**
		 * Update db updater 1.10.0
		 *
		 * @return void
		 */
		public function update_db_1_10_0() {

			$current_version_settings = get_option( $this->key, false );

			if ( $current_version_settings ) {
				if ( isset( $current_version_settings['avaliable_widgets'] ) ) {
					if ( ! isset( $current_version_settings['avaliable_widgets']['jet-elements-portfolio'] ) ) {
						$current_version_settings['avaliable_widgets']['jet-elements-portfolio'] = 'true';
					}
					update_option( $this->key, $current_version_settings );
				}

			}
		}

		/**
		 * Update db updater 1.11.0
		 *
		 * @return void
		 */
		public function update_db_1_11_0() {

			$current_version_settings = get_option( $this->key, false );

			if ( $current_version_settings ) {
				if ( isset( $current_version_settings['avaliable_widgets'] ) ) {
					if ( ! isset( $current_version_settings['avaliable_widgets']['jet-elements-timeline'] ) ) {
						$current_version_settings['avaliable_widgets']['jet-elements-timeline'] = 'true';
					}
					if ( ! isset( $current_version_settings['avaliable_widgets']['jet-elements-inline-svg'] ) ) {
						$current_version_settings['avaliable_widgets']['jet-elements-inline-svg'] = 'true';
					}
					if ( ! isset( $current_version_settings['avaliable_widgets']['jet-elements-price-list'] ) ) {
						$current_version_settings['avaliable_widgets']['jet-elements-price-list'] = 'true';
					}
					update_option( $this->key, $current_version_settings );
				}

			}
		}

	}

}
