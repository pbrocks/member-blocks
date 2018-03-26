<?php
/**
 * Plugin Name: PMPro Member Blocks
 * Plugin URI: https://github.com/pbrocks/pmpro-member-blocks
 * Description: PMPro Research building off FOSS Gutenberg Boilerplate.
 * Author: pbrocks
 * Author URI: https://pbrocks.com/
 * Version: 1.0.2
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package PMB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'PMB_VERSION' ) ) {
	define( 'PMB_VERSION', '1.0.0' );
}

if ( ! defined( 'PMB_NAME' ) ) {
	define( 'PMB_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'PMB_DIR' ) ) {
	define( 'PMB_DIR', WP_PLUGIN_DIR . '/' . PMB_NAME );
}

if ( ! defined( 'PMB_URL' ) ) {
	define( 'PMB_URL', WP_PLUGIN_URL . '/' . PMB_NAME );
}

register_activation_hook( __FILE__, 'install_pmpro_member_blocks' );
function install_pmpro_member_blocks() {
	set_transient( 'pmpro_member_blocks_activated', true, 30 );
}

register_deactivation_hook( __FILE__, 'uninstall_pmpro_member_blocks' );
function uninstall_pmpro_member_blocks() {
	delete_transient( 'pmpro_member_blocks_activated' );
}

/**
 * CLASS: Admin_Dev_Menus. (to be removed after dev)
 */
require_once( PMB_DIR . '/classes/class-admin-dev-menus.php' );

/**

Admin_Dev_Menus
 */
require_once( PMB_DIR . '/classes/class-admin-notification.php' );

/**
 * CLASS: PMPro_Member_Blocks_Welcome.
 */
require_once( PMB_DIR . '/classes/class-pmpro-member-blocks-welcome.php' );

/**
 * CLASS: PMPro_Member_Blocks_Setup.
 */
require_once( PMB_DIR . '/classes/class-pmpro-member-blocks-setup.php' );

/**
 * BLOCK: PMB Basic Block.
 */
require_once( PMB_DIR . '/blocks/basic-block/index.php' );

/**
 * BLOCK: PMB Editable.
 */
require_once( PMB_DIR . '/blocks/editable-block/index.php' );
/**
 * BLOCK: PMB Dynamic Block.
 */
require_once( PMB_DIR . '/unconnected/basic-block/index.php' );
/**
 * BLOCK: PMB Basic Block.
 */
// require_once( PMB_DIR . '/unconnected/button-shortcode/index.php' );
/**
 * BLOCK: PMB Basic Block ESNext + Webpack Build Process.
 */
// require_once( PMB_DIR . '/unconnected/esnext-block/index.php' );
/**
 * BLOCK: PMB Tweet.
 */
// require_once( PMB_DIR . '/unconnected/tweet-block/index.php' );
/**
 * BLOCK: PMB Editable.
 */
// require_once( PMB_DIR . '/unconnected/member-block/index.php' );
