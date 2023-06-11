<?php
/**
 *RuneSoup Mailster form overwriting the Jannah theme newletter form
 *
 * @version  2.1.0
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly

function rs_in_subcat( $categories, $_post = null ) {
    foreach ( (array) $categories as $category ) {
        // get_term_children() only accepts integer ID
        $subcats = get_term_children( (int) $category, 'category' );
        if ( $subcats && in_category( $subcats, $_post ) )
            return true;
    }
    return false;
}
if ( !rs_in_subcat( array(334, 5163 ) ) ) { //member 334, hidden 5163
?>

<div class="container-wrapper">
	<div class="subscribe-widge wp-block-columns has-2-columns">
		<div class="rs-shop-preview wp-block-column" style="flex-basis:66.66%">
			<h3 class="rs-h3"><span class="fa  fa-shopping-basket" aria-hidden="true"></span> Get Rune Soup Merch!</h2>		
				<?php
			echo do_shortcode( '[products limit="4" columns="4" orderby="popularity" visibility="featured"]')
			?>
		</div>

		<div class="widget-inner-wrap wp-block-column rs-email-signup-text" style="flex-basis:33.33%">
			<h3 class="rs-h3"><span class="fa fa-envelope-o" aria-hidden="true"></span> Get Rune Soup in Your Inbox!</h2>
		<form action="https://runesoup.com/mailster/subscribe" method="post" class="rs-email-signup-form mailster-form mailster-form-submit extern mailster-form-7" novalidate><input name="_action" type="hidden" value="subscribe">
				<input name="_referer" type="hidden" value="extern">
				<input name="formid" type="hidden" value="7">
				<div class="mailster-form-fields rs-email-signup">
				<div class="mailster-wrapper mailster-firstname-wrapper"><input id="mailster-firstname-7" name="firstname" type="text" value="" placeholder="First Name *" class="input mailster-firstname mailster-required" aria-required="true" aria-label="First Name"></div>
				<div class="mailster-wrapper mailster-email-wrapper"><input id="mailster-email-7" name="email" type="email" value="" placeholder="Email *" class="input mailster-email mailster-required" aria-required="true" aria-label="Email" spellcheck="false"></div>
				<div class="mailster-wrapper mailster-lists-wrapper"><ul class="mailster-list"><li><label title=""><input type="hidden" name="lists[0]" value=""><input class="mailster-list mailster-list-the-all-red-line" type="checkbox" name="lists[0]" value="4"  checked='checked' aria-label="Newsletters &amp; Updates from Rune Soup"> Newsletters & Updates from Rune Soup</label></li><li><label title=""><input type="hidden" name="lists[1]" value=""><input class="mailster-list mailster-list-rune-soup-blog-posts" type="checkbox" name="lists[1]" value="5"  checked='checked' aria-label="Rune Soup Blog Posts"> Rune Soup Blog Posts</label></li></ul></div>
				<div class="mailster-wrapper mailster-_gdpr-wrapper"><label for="mailster-_gdpr-7"><input type="hidden" name="_gdpr" value="0"><input id="mailster-_gdpr-7" name="_gdpr" type="checkbox" value="1" class="mailster-_gdpr mailster-required" aria-required="true" aria-label="I agree to the privacy policy"> I agree to the privacy policy (<a href="https://runesoup.com/privacy-policy/" target="_top">Link</a>)</label></div>
				<div class="mailster-wrapper mailster-submit-wrapper form-submit"><input name="submit" type="submit" value="Subscribe" class="submit-button button" aria-label="Subscribe"></div>
				</div>
				</form>

		</div><!-- .widget-inner-wrap /-->
	</div><!-- .subscribe-widget /-->
</div><!-- #post-newsletter /-->


<?php
	} else {
    // nothing
}