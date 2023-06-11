<?php
/**
 * BuddyPress - Members Loop
 *
 * @since 3.0.0
 * @version 3.0.0
 */

bp_nouveau_before_loop(); ?>

<?php if ( bp_get_current_member_type() ) : ?>
	<p class="current-member-type"><?php bp_current_member_type_message(); ?></p>
<?php endif; ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>
	<?php bp_nouveau_pagination( 'top' ); ?>

	<ul id="members-list" class="<?php bp_nouveau_loop_classes(); ?>">

	<?php while ( bp_members() ) : bp_the_member();	
		
		?>

		<li <?php bp_member_class( array( 'item-entry' ) ); ?> data-bp-item-component="members">
			<div class="list-wrap">
			<?php
		$rs_bus_name = xprofile_get_field_data( 673, bp_get_member_user_id() );
		$rs_bus_description = xprofile_get_field_data( 674, bp_get_member_user_id() );				
		$rs_bus_website = xprofile_get_field_data( 675, bp_get_member_user_id(), $multi_format = 'comma' );
		$rs_bus_website_replace = array('<a href rel=\"nofollow\">','</a>','">');
		$rs_bus_website_raw = str_replace($rs_bus_website_replace,"zz",$rs_bus_website); 
		$rs_bus_location = xprofile_get_field_data( 676, bp_get_member_user_id() );
		$rs_bus_type = xprofile_get_field_data( 678, bp_get_member_user_id() );			
		$rs_bus_img_replace =  array ("<img src=\"","\" alt=\"\" class=\"bpxcftr-image\" />");
		$rs_bus_logo = xprofile_get_field_data( 677, bp_get_member_user_id() );
		$rs_bus_logo_raw = str_replace($rs_bus_img_replace,"",$rs_bus_logo); 
		$rs_bus_logo_raw_cdn = str_replace("runesoup.com","cdn3.runesoup.com",$rs_bus_logo_raw); 
		$rs_bus_image1 = xprofile_get_field_data( 679, bp_get_member_user_id() );	
		$rs_bus_image1_raw = str_replace($rs_bus_img_replace,"",$rs_bus_image1);
		$rs_bus_image1_raw_cdn = str_replace("runesoup.com","cdn3.runesoup.com",$rs_bus_image1_raw); 
		$rs_bus_image2 = xprofile_get_field_data( 680, bp_get_member_user_id() );	
		$rs_bus_image2_raw = str_replace($rs_bus_img_replace,"",$rs_bus_image2); 
		$rs_bus_image2_raw_cdn = str_replace("runesoup.com","cdn3.runesoup.com",$rs_bus_image2_raw); 
		$rs_bus_image3 = xprofile_get_field_data( 681, bp_get_member_user_id() );	
		$rs_bus_image3_raw = str_replace($rs_bus_img_replace,"",$rs_bus_image3);
		$rs_bus_image3_raw_cdn = str_replace("runesoup.com","cdn3.runesoup.com",$rs_bus_image3_raw); 
		$rs_bus_mail = bp_core_get_user_domain(get_current_user_id()) . 'messages/compose?r='.bp_core_get_username(bp_get_member_user_id());
				
		if( !empty($rs_bus_logo)){
			echo "<div class=\"item-avatar rs-business-logo\">";
			echo "<img src=\"" . $rs_bus_logo_raw_cdn . "\" class=\"rs-business-logo\" alt=\"Logo for " . $rs_bus_name ."\"></a>";
			echo "</div>";
		};
		echo "<div class=\"item\">";
		echo "<div class=\"item-block\">";
		echo "<h1 class=\"list-title rs-business rs-business-name\">". $rs_bus_name . "</h1>";
		echo "<ul class=\"item-meta rs-business rs-business-ul\">";
		if( !empty($rs_bus_type)) {
				echo "<li class=\"item-meta rs-business rs-business-type\"> <span class=\"fa fa-tags\" aria-hidden=\"true\"></span> <p>"  . $rs_bus_type . "</p></li>";
		};
		
		if( !empty($rs_bus_location)) {
			echo "<li class=\"item-meta rs-business rs-business-location\"> <span class=\"fa fa-map-marker\" aria-hidden=\"true\"></span> <p>" . $rs_bus_location . "</p></li>";
		};
		if( !empty($rs_bus_website_raw)) {
			echo "<li class=\"item-meta rs-business rs-business-website\"> <span class=\"fa fa-link\" aria-hidden=\"true\"></span> <p>" . $rs_bus_website . "</p></li>";
		};
		echo "<li class=\"item-meta rs-business rs-business-contact\"> <span class=\"fa fa-envelope-o\" aria-hidden=\"true\"></span> <a href=\"".$rs_bus_mail."\">Contact ".$rs_bus_name."</a></li>";
		echo "</ul>";
		if( !empty($rs_bus_description)) {
			echo "<p class=\"item-meta rs-business rs-business-description\">" . $rs_bus_description . "</p>";
		echo "<br/>";
		};
		if( !empty($rs_bus_image1)) {
			echo "<a href=\"".$rs_bus_image1_raw_cdn ."\" target=\"_blank\"> <img src=\"" . $rs_bus_image1_raw_cdn . "\" class=\"rs-business-image\" alt=\"Image for " . $rs_bus_name . "\"></a>";
		};
		if( !empty($rs_bus_image2)) {
			echo "<a href=\"".$rs_bus_image2_raw_cdn ."\" target=\"_blank\"> <img src=\"" . $rs_bus_image2_raw_cdn . "\" class=\"rs-business-image\" alt=\"Image for " . $rs_bus_name . "\"></a>";
		};
		if( !empty($rs_bus_image3)) {
			echo "<a href=\"".$rs_bus_image3_raw_cdn ."\" target=\"_blank\"> <img src=\"" . $rs_bus_image3_raw_cdn . "\" class=\" rs-business-image\" alt=\"Image for " . $rs_bus_name . "\"></a>";
		};
				?>
				<?php
				bp_nouveau_members_loop_buttons(
							array(
								'container'      => 'ul',
								'button_element' => 'button',
							)
						);
?>

					</div>
					
				</div><!-- // .item -->



			</div>
		</li>

	<?php endwhile; ?>

	</ul>

	<?php bp_nouveau_pagination( 'bottom' ); ?>

<?php
else :

	bp_nouveau_user_feedback( 'members-loop-none' );

endif;
?>

<?php bp_nouveau_after_loop(); ?>
