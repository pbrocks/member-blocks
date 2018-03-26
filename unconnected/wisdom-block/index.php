<?php
/**
 * BLOCK: PMB Wisdom
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


function wisdom_enqueue_block_editor_assets() {
	// Scripts.
	wp_enqueue_script(
		'wisdom-block', // Handle.
		plugin_dir_url( __FILE__ ) . 'block.js', // File.
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ), // Dependencies.
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ) // filemtime — Gets file modification time.
	);

	// Styles.
	wp_enqueue_style(
		'wisdom-block-editor', // Handle.
		plugin_dir_url( __FILE__ ) . 'editor.css', // File.
		array( 'wp-edit-blocks' ), // Dependency.
		filemtime( plugin_dir_path( __FILE__ ) . 'editor.css' ) // filemtime — Gets file modification time.
	);
}
add_action( 'enqueue_block_editor_assets', 'wisdom_enqueue_block_editor_assets' );

/**
 * Enqueue the block's assets for the frontend.
 *
 * @since 1.0.0
 */
function wisdom_enqueue_block_assets() {
	wp_enqueue_style(
		'wisdom-frontend', // Handle.
		plugin_dir_url( __FILE__ ) . 'style.css', // File.
		array( 'wp-blocks' ), // Dependency.
		filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ) // filemtime — Gets file modification time.
	);
}
add_action( 'enqueue_block_assets', 'wisdom_enqueue_block_assets' );
