<?php
/**
 * BLOCK: PBGS Editable Shortcode
 *
 * Gutenberg Custom Block assets.
 *
 * @since   1.0.0
 * @package PBGS
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'pbgs_shortcode_editor_assets' );

/**
 * Enqueue the block's assets for the editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 */
function pbgs_shortcode_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'pbgs-block-shortcode', // Handle.
		plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);

	// Styles.
	// wp_enqueue_style(
	// 'pbgs-block-shortcode-editor', // Handle.
	// plugins_url( 'editor.css', __FILE__ ), // Block editor CSS.
	// array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
	// filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	// );
} // End function pbgs_shortcode_editor_assets().

/**
 * Enqueue the block's assets for the editor.
 *
 * wp-blocks:  The registerBlockType() function to register blocks.
 * wp-element: The wp.element.createElement() function to create elements.
 * wp-i18n:    The __() function for internationalization.
 *
 * @since 1.0.0
 */
function pbgs_editable_block_example_backend_enqueue() {
	wp_enqueue_script(
		'pbgs-editable-block-example-backend-script', // Unique handle.
		plugins_url( 'block.js', __FILE__ ), // Block.js: We register the block here.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);
}
add_action( 'enqueue_block_editor_assets', 'pbgs_editable_block_example_backend_enqueue' );
// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'pbgs_shortcode_block_assets' );
/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function pbgs_shortcode_block_assets() {
	// Styles.
	wp_enqueue_style(
		'pbgs-block-shortcode-frontend', // Handle.
		plugins_url( 'style.css', __FILE__ ), // Block frontend CSS.
		array( 'wp-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
} // End function pbgs_shortcode_block_assets().