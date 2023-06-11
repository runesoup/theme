<?php

add_action( 'wp_enqueue_scripts', 'tie_theme_child_styles_scripts', 80 );
function tie_theme_child_styles_scripts() {

	/* THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css */
	wp_enqueue_style( 'tie-theme-child-css', get_stylesheet_directory_uri().'/style.css', '' );

	/* Load the RTL.css file of the parent theme */
	if ( is_rtl() ) {
		wp_enqueue_style( 'tie-theme-rtl-css', get_template_directory_uri().'/rtl.css', '' );
	}

	/* Uncomment this line if you want to add custom javascript */
	//wp_enqueue_script( 'jannah-child-js', get_stylesheet_directory_uri() .'/js/scripts.js', '', false, true );
}


function rs_add_opc_template( $templates ) {

    $templates['my-custom-pricing-table'] = array(
        'label'       => __( 'RuneSoup Membership', 'rs-membership' ),
        'description' => __( "RuneSoup Premium Membership", 'rs-membership' ),
    );

    return $templates;
}
add_filter( 'wcopc_templates', 'rs_add_opc_template' );

	/* Sensei custom page functions */

add_action( 'rs_remove_sensei_price', 'remove_action_output_course_price' );
function remove_action_output_course_price() {
		remove_action( 'sensei_course_content_inside_before','Sensei_WC_Paid_Courses_course_price', 10 );
	}