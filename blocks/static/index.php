<?php
/**
 * BLOCK: PMB Editable
 *
 * Gutenberg Custom Block assets.
 *
 * @since   1.0.0
 * @package PMB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'pmb_static_editor_assets' );

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function pmb_static_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'pmb-static-block', // Handle.
		plugins_url( 'block2.js', __FILE__ ), // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block2.js' ) // filemtime — Gets file modification time.
	);

	// Styles.
	wp_enqueue_style(
		'pmb-static-block-editor', // Handle.
		plugins_url( 'editor.scss', __FILE__ ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.scss' ) // filemtime — Gets file modification time.
	);
} // End function pmb_static_editor_assets().


// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'pmb_static_block_assets' );

/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function pmb_static_block_assets() {
	// Styles.
	wp_enqueue_style(
		'pmb-static-block-frontend', // Handle.
		plugins_url( 'style.scss', __FILE__ ), // Block frontend CSS.
		array( 'wp-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.scss' ) // filemtime — Gets file modification time.
	);
} // End function pmb_static_block_assets().
