<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

class PMPro_Member_Blocks_Setup {

	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'verify_dependency_activation' ) );
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_style' ) );

	}

	public static function enqueue_style() {
		wp_enqueue_style( 'editor-default', plugins_url( 'inc/css/editor-default.css', dirname( __FILE__ ) ) );
	}

	public static function verify_dependency_activation() {
		if ( ! defined( 'GUTENBERG_VERSION' ) ) {
			new Admin_Notification( 'GUTENBERG must be installed and activated to support the customizations of this plugin.', 'warning' );
		}
		if ( ! defined( 'PMPRO_VERSION' ) ) {
			new Admin_Notification( 'Paid Memberships Pro must be installed and activated to support the customizations of this plugin.', 'warning' );
		}
	}

}

	PMPro_Member_Blocks_Setup::init();
