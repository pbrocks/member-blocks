<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

class PMPro_Member_Blocks_Help_Menus {

	public static function init() {
		add_action( 'admin_head', array( __CLASS__, 'add_help_screen_to_pmpro' ) );
		add_action( 'admin_head', array( __CLASS__, 'add_context_menu_help' ) );
		add_action( 'admin_head', array( __CLASS__, 'add_help_sidebar' ) );
		// add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_parent_dashboard_style' ) );
	}

	// adds a sidebar to the help context menu
	public static function add_help_sidebar() {

		// get the current screen object
		$current_screen = get_current_screen();

		// show only on listing / single post type screens
		if ( $current_screen->base == 'edit' || $current_screen->base == 'post' ) {
			$current_screen->add_help_tab(
				array(
					'id'        => 'member_block_sample',
					'title'     => __( 'Book Help Tab' ),
					'content'   => '<p>This is a simple help tab, hi </p>',
				)
			);
			// add the help sidebar (outputs a simple list)
			$current_screen->set_help_sidebar(
				'<ul><li>Here is a list item</li><li>Here is a second item</li><li>Final item</li></ul>'
			);
		}
	}

	public static function add_context_menu_help() {

		// get the current screen object
		$current_screen = get_current_screen();

		// content for help tab
		$content = '<p>Im a help tab, woo!</p>';

		// register our main help tab
		$current_screen->add_help_tab(
			array(
				'id'        => 'sp_basic_help_tab',
				'title'     => __( 'Basic Help Tab' ),
				'content'   => $content,
			)
		);

		// register our secondary help tab (with a callback instead of content)
		$current_screen->add_help_tab(
			array(
				'id'        => 'sp_help_tab_callback',
				'title'     => __( 'Help Tab With Callback' ),
				'callback'  => 'display_help_tab',
			)
		);
	}

	// function used to display the second help tab
	public static function display_help_tab() {
		$content = '<p>This is text from our output function</p>';
		echo $content;
	}
	public static function display_help_tab1() {
		$content = '<p>This is text from our output function</p>';
		echo $content;
	}
	public static function display_help_tab2() {
		$content = '<p>This is text from our output function</p>';
		echo $content;
	}

	public static function add_help_screen_to_pmpro() {

		// get the current screen object
		$current_screen = get_current_screen();

		// show only on book listing page
		if ( 'toplevel_page_pmpro-membershiplevels' === $current_screen->id ) {
			$content = '';
			$content .= '<p>This is a help tab, you can add <strong><em>whatever</em></strong> it is you like here, such as instructions</p>';
			$current_screen->add_help_tab(
				array(
					'id'        => 'member_block_help_tab',
					'title'     => __( 'PMPro Help Tab' ),
					'content'   => $content,
				)
			);
		}
	}
}
