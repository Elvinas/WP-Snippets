<?php submit_button(); ?>

<?php
get_woocommerce_currency_symbol
is_user_logged_in()
get_current_user_id
$order->set_user_id($user_id)
	
// Before checkout form
do_action( 'woocommerce_before_checkout_form', $checkout );

$checkout->is_registration_enabled()
// is registration enabled

$checkout->is_registration_required()
// is registration required

apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) 

$available_gateways = WC()->payment_gateways()->get_available_payment_gateways(); // get available payment methods
$gateway->get_title()
$gateway->enabled
$gateway->get_description()

value="' . esc_attr( $gateway->id ) . '"
esc_html( $gateway->get_description() )


function get_available_shipping_methods() {
	$available_methods = [];
	foreach ( WC()->cart->get_shipping_packages() as $package_id => $package ) {
    // Check if a shipping for the current package exist
    if ( WC()->session->__isset( 'shipping_for_package_'.$package_id ) ) {
        // Loop through shipping rates for the current package
        foreach ( WC()->session->get( 'shipping_for_package_'.$package_id )['rates'] as $shipping_rate_id => $shipping_rate ) {
            $rate_id     = $shipping_rate->get_id(); // same thing that $shipping_rate_id variable (combination of the shipping method and instance ID)
            $method_id   = $shipping_rate->get_method_id(); // The shipping method slug
            $instance_id = $shipping_rate->get_instance_id(); // The instance ID
            $label_name  = $shipping_rate->get_label(); // The label name of the method
            $cost        = $shipping_rate->get_cost(); // The cost without tax
            $tax_cost    = $shipping_rate->get_shipping_tax(); // The tax cost
            $taxes       = $shipping_rate->get_taxes(); // The taxes details (array)

            $available_methods[] = $shipping_rate;
        }
    }
}

	return $available_methods;
}


 $countries = WC()->countries->get_countries(); // get countries
 $selected_country = WC()->customer->get_billing_country();

WC()->customer->get_billing_state() 
WC()->customer->get_billing_city()
WC()->customer->get_billing_address_1()
WC()->customer->get_billing_address_2()
WC()->customer->get_billing_address_2()
WC()->customer->get_billing_postcode()
WC()->customer->get_billing_first_name() 
WC()->customer->get_billing_last_name()
WC()->customer->get_billing_phone()
WC()->customer->get_billing_email()
WC()->customer->get_shipping_first_name()
WC()->customer->get_shipping_last_name()
WC()->customer->get_shipping_phone()
WC()->customer->get_billing_email()
WC()->customer->get_shipping_country();

WC()->customer->get_shipping_state()
WC()->customer->get_shipping_city()
WC()->customer->get_shipping_address_1()
WC()->customer->get_shipping_address_2()
WC()->customer->get_shipping_address_2()
WC()->customer->get_shipping_postcode()
 $order->set_billing_first_name($firstname);
        $order->set_billing_last_name($lastname);
        $order->set_billing_email($email);
        $order->set_billing_phone($phone_number);
        $order->set_billing_address_1($street);
        $order->set_billing_address_2($house_number . ' ' . $apartment_number);
        $order->set_billing_city($city);
        $order->set_billing_postcode($postal_code);
        $order->set_billing_country($country);
        $order->set_billing_state($area);

$order->set_shipping_first_name($firstname);
    $order->set_shipping_last_name($lastname);
    $order->set_shipping_address_1($street);
    $order->set_shipping_address_2($house_number . ' ' . $apartment_number);
    $order->set_shipping_city($city);
    $order->set_shipping_postcode($postal_code);
    $order->set_shipping_country($country);
    $order->set_shipping_state($area);
$order->calculate_totals();
    $order->calculate_shipping();
 $order->update_status('pending');
$order->save();
 $order->get_id();
$shipping_method = WC()->session->get('chosen_shipping_methods');
$order->set_shipping_method(array($shipping_method[0]));
get_template_directory_uri() 

	wc_get_product
	 $order->add_product($product, $quantity);
WC()->cart->is_empty()
WC()->cart->get_cart()
$product->get_price_excluding_tax()
$product->get_price_including_tax()
$product->get_id()
$product->get_name()
wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' )
src="<?php echo esc_url( $product_image_url ); ?>"
<?php echo wc_price( $price_incl_tax * $quantity ); ?>
get_privacy_policy_url()
WC()->cart->get_subtotal()
WC()->cart->get_shipping_total()
WC()->cart->get_total_tax()
WC()->cart->get_total('edit')
wp_nonce_field( 'woocommerce-checkout', 'woocommerce_checkout_nonce' )

sanitize_text_field
sanitize_email
wc_create_order
