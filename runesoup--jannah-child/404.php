<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

get_header(); ?>

	<div <?php tie_content_column_attr(); ?>>

		<div class="container-404">

			<?php
				/**
				 * tie_before_404_content hook.
				 */
				do_action( 'TieLabs/before_404_content' );
			?>

			<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', TIELABS_TEXTDOMAIN ); ?></h3>
			
			<h3><?php esc_html_e( 'If you were looking for member content, please log in first.', TIELABS_TEXTDOMAIN ); ?></h3>

			<h4><?php esc_html_e( 'Or... maybe try searching:', TIELABS_TEXTDOMAIN ); ?></h4>

			<div id="content-404">
				<?php get_search_form(); ?>
			</div><!-- #content-404 /-->

			<?php
				if( has_nav_menu( '404-menu' ) ){
					wp_nav_menu(
						array(
							'menu_id'        => 'menu-404',
							'container_id'   => 'menu-404',
							'theme_location' => '404-menu',
							'depth'          => 1,
						));
				}
			?>

			<?php
				/**
				 * tie_after_404_content hook.
				 */
				do_action( 'TieLabs/after_404_content' );
			?>

		</div><!-- .container-404 /-->

	</div><!-- .main-content /-->

<?php get_footer(); ?>
