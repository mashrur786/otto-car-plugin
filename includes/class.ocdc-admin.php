<?php


class OCDC_Admin {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'ocdc_admin_menu' ) );
	}


	function ocdc_admin_menu() {
		add_menu_page(
			'Otta Car Discount Calculator',
			'OCDC Page',
			'manage_options',
			'ocdc-admin-page.php',
			array( $this, 'ocdc_admin_page_output' ),
			'dashicons-tickets',
			6
		);
	}


	// admin menu callback function to create config_page
	function ocdc_admin_page_output() {
		require_once( OCDC__PLUGIN_DIR . 'admin/view.php' );
	}

}