<?php
/**
 * Output Callbacks WPAC tab.
 *
 * @package WPAC
 */

namespace DLXPlugins\WPAC\Admin\Tabs;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct access.' );
}

use DLXPlugins\WPAC\Functions as Functions;
use DLXPlugins\WPAC\Options as Options;

/**
 * Output the callbacks tab and content.
 */
class Callbacks {
	/**
	 * Constructor.
	 */
	public function __construct() {
		add_filter( 'ajaxify_comments_admin_tabs', array( $this, 'add_callbacks_tab' ), 1, 1 );
		add_filter( 'ajaxify_comments_admin_sub_tabs', array( $this, 'add_callbacks_sub_tab' ), 1, 3 );
		add_filter( 'ajaxify_comments_output_callbacks', array( $this, 'output_callbacks_content' ), 1, 3 );
		add_action( 'wpac_admin_enqueue_scripts_callbacks', array( $this, 'admin_scripts' ) );
		add_action( 'wp_ajax_wpac_get_callbacks_options', array( $this, 'ajax_get_options' ) );
	}

	/**
	 * Include admin scripts for the home screen.
	 */
	public function admin_scripts() {
		$deps = require_once Functions::get_plugin_dir( 'dist/wpac-admin-callbacks-js.asset.php' );
		wp_enqueue_script(
			'wpac-admin-callbacks',
			Functions::get_plugin_url( 'dist/wpac-admin-callbacks-js.js' ),
			$deps['dependencies'],
			$deps['version'],
			true
		);
		wp_localize_script(
			'wpac-admin-callbacks',
			'wpacAdminCallbacks',
			array(
				'getNonce'  => wp_create_nonce( 'wpac-admin-callbacks-retrieve-options' ),
				'saveNonce' => wp_create_nonce( 'wpac-admin-callbacks-save-options' ),
				'resetNonce' => wp_create_nonce( 'wpac-admin-callbacks-reset-options' ),
			)
		);
	}

	/**
	 * Retrieve options via Ajax for the home options.
	 */
	public function ajax_get_options() {
		$nonce = sanitize_text_field( filter_input( INPUT_POST, 'nonce', FILTER_DEFAULT ) );
		// Security.
		if ( ! wp_verify_nonce( $nonce, 'wpac-admin-callbacks-retrieve-options' ) || ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error(
				array(
					'message' => __( 'Could not verify nonce.', 'wp-ajaxify-comments' ),
				)
			);
		}

		$options = Options::get_options();
		$options = Functions::sanitize_array_recursive( $options );
		wp_send_json_success( $options );
	}

	/**
	 * Add the main tab and callback actions.
	 *
	 * @param array $tabs Array of tabs.
	 *
	 * @return array of tabs.
	 */
	public function add_callbacks_tab( $tabs ) {
		$tabs[] = array(
			'get'    => 'callbacks',
			'action' => 'ajaxify_comments_output_callbacks',
			'url'    => Functions::get_settings_url( 'callbacks' ),
			'label'  => _x( 'Callbacks', 'Tab label as Callbacks', 'wp-ajaxify-comments' ),
			'icon'   => 'icon-tower-broadcast',
		);
		return $tabs;
	}

	/**
	 * Add the main main tab and callback actions.
	 *
	 * @param array  $tabs        Array of tabs.
	 * @param string $current_tab The current tab selected.
	 * @param string $sub_tab     The current sub-tab selected.
	 *
	 * @return array of tabs.
	 */
	public function add_callbacks_sub_tab( $tabs, $current_tab, $sub_tab ) {
		if ( ( ! empty( $current_tab ) || ! empty( $sub_tab ) ) && 'callbacks' !== $current_tab ) {
			return $tabs;
		}
		return $tabs;
	}

	/**
	 * Begin Main routing for the various outputs.
	 *
	 * @param string $tab     Main tab.
	 * @param string $sub_tab Sub tab.
	 */
	public function output_callbacks_content( $tab, $sub_tab = '' ) {
		if ( 'callbacks' === $tab ) {
			if ( empty( $sub_tab ) || 'callbacks' === $sub_tab ) {
				?>
					<div id="wpac-tab-callbacks"></div>
				<?php
			}
		}
	}
}
