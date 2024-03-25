<?php
  
/**
 * 1. Register new endpoint slug to use for My Account page
 */

/**
 * 	Resave Permalinks or it will give 404 error
 */
function ts_custom_add_premium_support_endpoint() {
    add_rewrite_endpoint( 'premium-support', EP_ROOT | EP_PAGES );
}
  
add_action( 'init', 'ts_custom_add_premium_support_endpoint' );
  
  
/**
 * 2. Add new query var
 */
  
function ts_custom_premium_support_query_vars( $vars ) {
    $vars[] = 'premium-support';
    return $vars;
}
  
add_filter( 'woocommerce_get_query_vars', 'ts_custom_premium_support_query_vars', 0 );
  
  
/**
 * 3. Insert the new endpoint into the My Account menu
 */
  
function ts_custom_add_premium_support_link_my_account( $items ) {
    $items['premium-support'] = 'premium-support';
    return $items;
}
  
add_filter( 'woocommerce_account_menu_items', 'ts_custom_add_premium_support_link_my_account' );
  
  
/**
 * 4. Add content to the new endpoint
 */
  
function ts_custom_premium_support_content() {
	echo '<h3>Your Endpoint</h3><p>Some text</p>';
	
	//echo do_shortcode( ' /* your shortcode here */ ' );
}

/**
 * @important-note	"add_action" must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format
 */
add_action( 'woocommerce_account_premium-support_endpoint', 'ts_custom_premium_support_content' );
