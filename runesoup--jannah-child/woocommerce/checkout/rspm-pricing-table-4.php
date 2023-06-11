<?php
/**
 * Template to display a pricing table in a list
 *
 * @package WooCommerce-One-Page-Checkout/Templates
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div class="rspm-opc-table rspm-opc-table-4 opc-pricing-table-wrapper opc_columns_<?php echo esc_attr( count( $products ) ); ?>">
<?php foreach( $products as $product ) : ?>
	<div class="opc-pricing-table-product product-item cart <?php if ( wcopc_get_products_prop( $product, 'in_cart' ) ) echo 'selected'; ?>">
		<div class="opc-pricing-table-product-header">
			<h3 class="opc-pricing-table-product-title"><?php echo wp_kses_post( $product->get_title() ); ?></h3>
			<div class="opc-pricing-table-product-price">
				<p><?php echo $product->get_price_html(); ?></p>
			</div>
			<div class="product-quantity">
				<?php wc_get_template( 'checkout/add-to-cart/opc.php', array( 'product' => $product ), '', PP_One_Page_Checkout::$template_path ); ?>
			</div>
		</div>

		

		<?php if ( $product->has_weight() || $product->has_dimensions() ) : ?>
			<div class="opc-pricing-table-product-dimensions">
			<?php if ( $product->has_weight() ) : ?>
				<!-- Product Weight -->
				<h4><?php esc_html_e( 'Weight', 'wcopc' ) ?></h4>
				<p class="product_weight"><?php echo wc_format_weight( $product->get_weight() ); ?></p>
			<?php endif; ?>
			<?php if ( $product->has_dimensions() ) : ?>
			<!-- Product Dimension -->
				<h4><?php esc_html_e( 'Dimensions', 'wcopc' ) ?></h4>
				<p class="product_dimensions"><?php echo wc_format_dimensions( $product->get_dimensions( false ) ); ?></p>
			<?php endif; ?>
			</div>
		<?php endif; // $product->enable_dimensions_display() ?>
	</div>
<?php endforeach; // product in product_post?>
	<div class="opc-pricing-table-product product-item cart ">
	<div class="opc-pricing-table-product-header">
			<div class="opc-pricing-table-product-price rs-price-main"><p>
				<h3 class="opc-pricing-table-product-title"> Gift Membership</h3>
				<div class="opc-pricing-table-product-price">
					<p>
						<span class="subscription-details"> Give a Rune Soup Membership as a Gift </span>
					</p>
				</div>
				<div class="product-quantity rs-opc-table-button"> 
					<a href="https://runesoup.com/gift-membership/">
							<button class="button gift-link" id="gift-link"> 
								<span>Give Now</span>
							</button>
					</a>
				</div>
		</div>
	</div>
</div>
<div class="clear"></div>
