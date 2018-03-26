<?php
/**
 * PMPro Member Blocks Welcome Screen
 */

class PMPro_Member_Blocks_Welcome {

	/**
	 * Add the min caps used for the plugin
	 */
	const min_caps = 'manage_options';

	/**
	 * PMPro_Member_Blocks_Welcome constructor.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'verify_dependency_activation' ), 11 );
		add_action( 'admin_menu', array( $this, 'create_admin_menus' ) );
		add_action( 'admin_init', array( $this, 'member_blocks_welcome' ), 11 );
		// add_action( 'admin_head', array( $this, 'admin_head' ) );
		// add_action( 'admin_init', array( 'Admin_Notification', 'display_info' ) );
	}

	public function verify_dependency_activation() {
		if ( ! defined( 'GUTENBERG_VERSION' ) ) {
			new Admin_Notification( 'GUTENBERG must be installed and activated to support the full range of customizations', 'warning' );
		}
		// deactivate_plugins( array( 'gutenberg/gutenberg.php' ) );
		// $result = activate_plugin( 'plugin-dir/plugin-file.php' );
		// if ( is_wp_error( $result ) ) {
		// Process Error
		// }
	}

	/**
	 * Add the page to the admin area
	 */
	public function create_admin_menus() {
		add_dashboard_page(
			'Member Blocks',
			'Member Blocks Welcome Screen',
			self::min_caps,
			'pmpro-member-blocks-welcome.php',
			array( $this, 'pmpro_member_blocks_welcome_message' )
		);

		// Remove the page from the menu
		remove_submenu_page( 'index.php', 'pmpro-member-blocks-welcome.php' );

	}

	/**
	 * Display the welcome message
	 */
	public function pmpro_member_blocks_welcome_message( $levels ) {
		global $wpdb, $your_db_name;
		?>
		<div class="wrap">
			<img class="pmpro-logo" src="<?php echo plugins_url( 'inc/images/pmpro-logo.png', dirname( __FILE__ ) ); ?>" alt="PMPro logo" / >

			<h1>I know, it says Member Blocks, but it could be PMPro Member Blocks</h1>

			<h3><a href="<?php admin_url( 'index.php?page=member-blocks-admin-menu.php' ); ?>">Link to Admin Page</a></h3>
			<p class="about-text description">
				We're looking for stuff, so watch out for things to populate below.
			</p>
			<?php
				$query = "
				SELECT * FROM $wpdb->pmpro_membership_levels
				";
				$levels = $wpdb->get_results( $query );
				echo '<pre>';
				// print_r( $levels );
				echo '</pre>';
			foreach ( $levels as $level ) {

				echo '<li>Level ' . $level->name . '</li>' ;
			}
			echo '<h4> plugins_url = ' . plugins_url( '../inc/css/editor-default.css', __FILE__ ) . '</h4>';
			echo '<h4>' . plugins_url( 'inc/css/editor-default.css', dirname( __FILE__ ) ) . '</h4> <img src="' . plugins_url( 'inc/images/sidetrack25.png', dirname( __FILE__ ) ) . '" />';
			if ( pmpro_hasMembershipLevel() ) {
			?>
			<span style="color:tomato;">
			// Place your HTML or PHP code here if the user is in the required membership level ...</span>
			<span style="color:tomato;"><h3>We must have some levels on this subsite</h3></span>
			<?php
			}
			?>
		</div>

		<?php
	}

	/**
	 * Check the activated transient exists if does then redirect
	 */
	public function member_blocks_welcome() {
		if ( ! get_transient( 'pmpro_member_blocks_activated' ) ) {
			return;
		}

		// Delete the activated transient
		delete_transient( 'pmpro_member_blocks_activated' );

		wp_safe_redirect(
			add_query_arg(
				array(
					'page' => 'pmpro-member-blocks-welcome.php',
				), admin_url( 'index.php' )
			)
		);
		exit;
	}

	/**
	 *
	 */
	public function admin_head() {
		// Add custom styling to your page
		?>
		<style type="text/css">
			body #wpwrap {
				background: rgba(233, 255, 238,1);
				background: maroon;
			}
		</style>
		<?php
	}
}

new PMPro_Member_Blocks_Welcome();
