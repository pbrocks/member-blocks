<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

class Admin_Dev_Menus {

	/**
	 * Add the min caps used for the plugin
	 */
	const min_caps = 'manage_options';

	public static function init() {
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_accordion_style' ) );
		add_action( 'admin_menu', array( __CLASS__, 'member_blocks_admin_menu' ) );
		add_action( 'admin_head', array( __CLASS__, 'print_current_screen_in_header' ) );
	}

	public static function enqueue_accordion_style() {
		wp_register_style( 'pmpro-accordion', plugins_url( 'inc/css/pmpro-accordion.css', dirname( __FILE__ ) ) );
		wp_enqueue_style( 'pmpro-accordion' );
	}

	public static function member_blocks_admin_menu() {
		add_menu_page( 'Member Blocks Admin', 'Member Blocks', self::min_caps, 'member-blocks-admin-menu.php',  array( __CLASS__, 'member_blocks_menu_page' ), 'dashicons-tickets', 13 );
		add_submenu_page( 'member-blocks-admin-menu.php', 'Member Blocks Menu 2', 'Member Blocks Arrays', self::min_caps, 'member-blocks-arrays.php',  array( __CLASS__, 'member_blocks_arrays_page' ) );
		add_submenu_page( 'member-blocks-admin-menu.php', 'Member Blocks Menu 3', 'Menus/Submenus', self::min_caps, 'member-blocks-submenu.php',  array( __CLASS__, 'member_blocks_submenu_page' ) );
		add_submenu_page( 'member-blocks-admin-menu.php', 'Member Blocks Menu 4', 'Available Shortcodes', self::min_caps, 'member-blocks-shortcodes.php',  array( __CLASS__, 'display_available_shortcodes' ) );
		add_submenu_page( 'member-blocks-admin-menu.php', 'Member Blocks Menu 5', 'Other Code', self::min_caps, 'member-blocks-othercode.php',  array( __CLASS__, 'submenu_page_callback' ) );
	}

	public static function member_blocks_menu_page() {
		echo '<h1>' . basename( __FUNCTION__ ) . '</h1>';
		echo '<pre>';
		echo 'You can find this file in  <br>';
		echo plugins_url( '/', __FILE__ );

		echo '<h3><a href="' . admin_url( 'index.php?page=pmpro-member-blocks-welcome.php' ) . '">Link to Welcome Page</a></h3>'; ?>

		<div id="tab-one" class="tab accordion">
			<input id="tab-one-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-one-input" class="accordion">More Registration Information</label>
			<div class="tab-content">
				<h2>do_action( 'pmpro_checkout_boxes' ); </h2>h2>
			</div>
		</div>
		<div id="tab-two" class="tab accordion">
			<input id="tab-two-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-two-input" class="accordion">Billing Information</label>
			<div class="tab-content">
				<?php
				echo '<br>';
				echo '<pre>';
				// print_r( get_field( 'use_cases' ) );
				echo '</pre>';
				die;
	}

	public static function member_blocks_arrays_page() {
		echo '<h1>' . basename( __FUNCTION__ ) . '</h1>';
		echo '<h1>Dev Admin Menu</h1>';
		echo '<pre>';

		echo '<p>get_stylesheet_directory => ' . get_stylesheet_directory();
		echo '<p>get_stylesheet_directory_uri => ' . get_stylesheet_directory_uri();
		echo '<p>get_stylesheet_uri => ' . get_stylesheet_uri();

		echo 'You can find this file in  <br>';
		echo esc_url( plugins_url( '/', __FILE__ ) );
		echo '<br>';
		echo '</pre>';

		$mods = get_theme_mods();
		echo '<pre>';
		var_dump( $mods );
		echo '</pre>';
	}

	public static function member_blocks_submenu_page() {
		global $menu;
		echo '<h1>' . basename( __FUNCTION__ ) . '</h1>';
		echo '<pre>';
		echo 'You can find this file in  <br>';
		echo plugins_url( '/', __FILE__ );
		print_r( $menu );
		echo '<br>';
		echo '<br>ACF path =>' . plugin_dir_path( __FILE__ ) . 'acf-json<br>';
		echo '</pre>';
	}
	/**
	 * Render submenu
	 *
	 * @return void
	 */
	public static function submenu_page_callback() {
	?>
		<div class="wrap">
			<h1><?php _e( 'PMPro Gists Reference', 'paid-memberships-pro' ); ?>
			</h1>
		<div id="col-right">
		<div class="col-wrap">
			<h3><?php esc_attr_e( 'Diagnostic Info', 'paid-memberships-pro' ); ?></h3>
			<div class="inside">
				<p class="description">Blah!! By givng this paragraph the .description class, the text is italicized by WordPress automatically.
				</p>
		<div id="tab-basic" class="tab accordion">
			<input id="tab-basic-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-basic-input" class="accordion">Basic Information</label>
			<div class="tab-content">
				<p><?php _e( 'This page is built in ' . __FILE__, 'paid-memberships-pro' ); ?></p>
				<p><?php esc_attr_e( 'info coming from <a href="https://github.com/bueltge/WordPress-Admin-Style">https://github.com/bueltge/WordPress-Admin-Style</a>', 'paid-memberships-pro' ); ?></p>
			</div>
		</div><!-- .tab.accordion -->
		<div id="tab-classes" class="tab accordion">
			<input id="tab-classes-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-classes-input" class="accordion">Active Classes</label>
			<div class="tab-content">
				<p>
					<?php
						self::dev_tools_get_declared_classes();
					?>
				</p>
			</div>
		</div><!-- .tab.accordion -->
		<div id="tab-post-types" class="tab accordion">
			<input id="tab-post-types-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-post-types-input" class="accordion">Available Post Types</label>
			<div class="tab-content">
				<style type="text/css">
					.tab > div > li {
						/*list-style: none;*/
						padding: 0 2rem;
					}
				</style>
				<p>
					<?php
					$post_types = get_post_types();
					foreach ( $post_types as $key => $post_type ) {
						echo '<li>' . $post_type . '</li>';
					}
					?>
				</p>
			</div>
		</div><!-- .tab.accordion -->
		<div id="tab-add-on-object" class="tab accordion">
			<input id="tab-add-on-object-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-add-on-object-input" class="accordion">Add Ons Object</label>
			<div class="tab-content">
				<p>
					<?php

					$args = array(
						'name' => 'add-ons',
					);

					$add_ons = get_post_types( $args, 'objects' );
						echo '<pre>';
						print_r( $add_ons );
						echo '</pre>';
					?>
				</p>
				<p>Text without that class in this area will be white.</p>
			</div>
		</div><!-- .tab.accordion -->
		<div id="tab-three" class="tab accordion">
			<input id="tab-three-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-three-input" class="accordion">Next Accordion</label>
			<div class="tab-content">
				<p>Text without that class in this area will be white.</p>
			</div>
		</div><!-- .tab.accordion -->
		<div id="tab-xyz" class="tab accordion">
			<input id="tab-xyz-input" class="accordion" type="checkbox" name="tabs">
			<label for="tab-xyz-input" class="accordion">Copy Me</label>
			<div class="tab-content">
				<p class="description">This class is also .description.</p>
				<p>Text without that class in this area will be white.</p>
			</div>
		</div><!-- .tab.accordion -->
					</div><!-- /col-wrap -->

				</div><!-- /col-right -->

			</div><!-- /col-container -->
			<div id="col-container">

				<div id="col-left">
					<div class="col-wrap">
						<?php
							// ();
							?>
						<p>
						<?php

						// $stuff = file_get_contents( 'slashed1.json', true );
						// $file = file_get_contents( plugins_url( '../js/slashed.json', __FILE__ ), true );
							// $stuff = self::array_from_json_string();
						// if ( 'Recipe' === $stuff[2]['data'][0]['type'] ) {
							echo '<pre>';
							print_r( self::get_available_shortcodes() );
							echo '</pre>';
						// }
						?>
						 </p>
					</div>

					</div>
					<!-- /col-wrap -->

				</div>
				<!-- /col-left -->

		</div><!-- .wrap -->
	<?php
	}
	/**
	 * Dev_Tools Function Comment
	 */
	public static function dev_tools_get_declared_classes() {
		echo '<pre>';
		print_r( array_reverse( get_declared_classes() ) );
		echo '</pre>';
	}

	/**
	 * Add the page to the admin area
	 */
	public static function pmpro_member_blocks_admin_notices() {
		echo 'Testing Info Notification ' . new Admin_Notification( 'Testing Info Notification', 'success', true );
	}

	public static function print_current_screen_in_header() {
		$current_screen = get_current_screen();
		echo '<h2 class="screen">' . $current_screen->id . ' is the current_screen</h2>';
	}

	public static function get_available_shortcodes() {
		global $shortcode_tags;
		echo '<h4><b>[shortcode-name] => [shortcode_function]</b></h4>';
		foreach ( $shortcode_tags as $code => $function ) {
			echo '<h4>[' . $code . '] => ' . $function . '</h4>';
		}
	}

	public static function display_available_shortcodes() {
		global $shortcode_tags;
		?>
		<div class="wrap">
		<div id="icon-options-general" class="icon32">
			<br>
		</div>          
		<h2>
			List of All Available Shortcodes
		</h2>
		<div class="section panel">
			<p class="description">
				This page will display all of the available shortcodes that you can use on your WordPress blog.
			</p>
			<h3>Available Shortcodes</h3>
			<div class="cssgrid-wrapper">
				<?php
				foreach ( $shortcode_tags as $code => $function ) {
					?>
					<div class="grid-element">
						[<?php echo $code; ?>]
						</div>
						<?php
				}
				?>
				</div>
				<div class="cssgrid-wrapper">			
				<div class="grid-element">A</div>
				<div class="grid-element">B</div>
				<div class="grid-element">C</div>
				<div class="grid-element">D</div>
				<div class="grid-element">E</div>
				<div class="grid-element">F</div>
				</div>
				</div>
				<?php
	}

	public static function my_formatter( $content ) {
		$new_content = '';
		$pattern_full = '{([raw].*?[/raw])}is';
		$pattern_contents = '{[raw](.*?)[/raw]}is';
		$pieces = preg_split( $pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE );

		foreach ( $pieces as $piece ) {
			if ( preg_match( $pattern_contents, $piece, $matches ) ) {
				$new_content .= $matches[1];
			} else {
				$new_content .= wptexturize( wpautop( $piece ) );
			}
		}

		return $new_content;

	}

	public static function add_wp_filters_pmpro() {
		global $wp_filter;
		echo '<pre>' . print_r( $wp_filter, true ) . '</pre>';
	}

	public static function print_hooked_functions() {
		echo 'Hooked functions';
	}

	public static function list_hooked_functions( $tag = false ) {
		global $wp_filter;
		if ( $tag ) {
			$hook[ $tag ] = $wp_filter[ $tag ];
			if ( ! is_array( $hook[ $tag ] ) ) {
				trigger_error( "Nothing found for '$tag' hook", E_USER_WARNING );
				return;
			}
		} else {
			$hook = $wp_filter;
			ksort( $hook );
		}
		echo '<pre>';
		foreach ( $hook as $tag => $priority ) {
			echo "<br>Hook => <strong>$tag</strong><br>";
			// ksort( $priority );
			echo '<div style="padding-left:3rem;">';
			foreach ( $priority as $priority => $function ) {
				echo '$priority = ' . $priority;
				foreach ( $function as $name => $properties ) {
					echo " $name<br>";
				}
			}
			echo '</div>';
		}
		echo '</pre>';
		return;
	}

}

	Admin_Dev_Menus::init();
