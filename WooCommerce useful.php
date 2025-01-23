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



function process_custom_checkout_form($form_data) {
    // Ensure WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return new WP_Error('woocommerce_not_active', 'WooCommerce is not active.');
    }

    // Initialize the WC_Checkout class
    $checkout = WC()->checkout();

    // Prepare billing and shipping data (from your custom form)
    $checkout_data = [
        'billing_first_name'  => isset($form_data['firstname']) ? sanitize_text_field($form_data['firstname']) : '',
        'billing_last_name'   => isset($form_data['lastname']) ? sanitize_text_field($form_data['lastname']) : '',
        'billing_email'       => isset($form_data['email']) ? sanitize_email($form_data['email']) : 'info@example.com',
        'billing_phone'       => isset($form_data['phone_number']) ? sanitize_text_field($form_data['phone_number']) : '',
        'billing_address_1'   => isset($form_data['street']) ? sanitize_text_field($form_data['street']) : '',
        'billing_address_2'   => isset($form_data['house_number']) && isset($form_data['apartment_number'])
            ? sanitize_text_field($form_data['house_number'] . ' ' . $form_data['apartment_number'])
            : '',
        'billing_city'        => isset($form_data['city']) ? sanitize_text_field($form_data['city']) : '',
        'billing_postcode'    => isset($form_data['postal_code']) ? sanitize_text_field($form_data['postal_code']) : '',
        'billing_country'     => isset($form_data['country']) ? sanitize_text_field($form_data['country']) : '',
        'billing_state'       => isset($form_data['area']) ? sanitize_text_field($form_data['area']) : '',
        'shipping_first_name' => isset($form_data['firstname']) ? sanitize_text_field($form_data['firstname']) : '',
        'shipping_last_name'  => isset($form_data['lastname']) ? sanitize_text_field($form_data['lastname']) : '',
        'shipping_address_1'  => isset($form_data['street']) ? sanitize_text_field($form_data['street']) : '',
        'shipping_address_2'  => isset($form_data['house_number']) && isset($form_data['apartment_number'])
            ? sanitize_text_field($form_data['house_number'] . ' ' . $form_data['apartment_number'])
            : '',
        'shipping_city'       => isset($form_data['city']) ? sanitize_text_field($form_data['city']) : '',
        'shipping_postcode'   => isset($form_data['postal_code']) ? sanitize_text_field($form_data['postal_code']) : '',
        'shipping_country'    => isset($form_data['country']) ? sanitize_text_field($form_data['country']) : '',
        'shipping_state'      => isset($form_data['area']) ? sanitize_text_field($form_data['area']) : '',
        'payment_method'      => isset($form_data['payment_method']) ? sanitize_text_field($form_data['payment_method']) : 'bacs', // Default payment method
    ];

    // Add custom meta (if necessary)
    if (isset($form_data['company_name'])) {
        $checkout_data['billing_company'] = sanitize_text_field($form_data['company_name']);
    }

    // Process the checkout (WooCommerce will handle order creation, validation, etc.)
    try {
        $order_id = $checkout->process_checkout($checkout_data);

        // Return the created order ID
        return $order_id;
    } catch (Exception $e) {
        // Handle errors gracefully
        return new WP_Error('checkout_error', $e->getMessage());
    }
}



function create_woocommerce_order_from_form_data($form_data) {
    // Ensure WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return new WP_Error('woocommerce_not_active', 'WooCommerce is not active.');
    }

    // Check if the cart is empty
    if (WC()->cart->is_empty()) {
        return new WP_Error('empty_cart', 'The cart is empty. Cannot create an order.');
    }

    // Collect form data (example based on your HTML form)
    $company_name = isset($form_data['company_name']) ? sanitize_text_field($form_data['company_name']) : '';
    $company_code = isset($form_data['company_code']) ? sanitize_text_field($form_data['company_code']) : '';
    $company_vat = isset($form_data['company_vat']) ? sanitize_text_field($form_data['company_vat']) : '';
    $country = isset($form_data['country']) ? sanitize_text_field($form_data['country']) : '';
    $area = isset($form_data['area']) ? sanitize_text_field($form_data['area']) : '';
    $city = isset($form_data['city']) ? sanitize_text_field($form_data['city']) : '';
    $street = isset($form_data['street']) ? sanitize_text_field($form_data['street']) : '';
    $house_number = isset($form_data['house_number']) ? sanitize_text_field($form_data['house_number']) : '';
    $apartment_number = isset($form_data['apartment_number']) ? sanitize_text_field($form_data['apartment_number']) : '';
    $postal_code = isset($form_data['postal_code']) ? sanitize_text_field($form_data['postal_code']) : '';
    $firstname = isset($form_data['firstname']) ? sanitize_text_field($form_data['firstname']) : '';
    $lastname = isset($form_data['lastname']) ? sanitize_text_field($form_data['lastname']) : '';
    $phone_number = isset($form_data['phone_number']) ? sanitize_text_field($form_data['phone_number']) : '';
    $email = isset($form_data['email']) ? sanitize_email($form_data['email']) : 'info@easyseo.lt';  // Default email

    // Create a new WooCommerce order
    $order = wc_create_order();

    // Set company-related details if applicable (for legal persons)
    if ($company_name && $company_code && $company_vat) {
        $order->set_meta_data('company_name', $company_name);
        $order->set_meta_data('company_code', $company_code);
        $order->set_meta_data('company_vat', $company_vat);
    }

    // Check if the user is logged in or guest
    if (is_user_logged_in()) {
        $user_id = get_current_user_id();  // Get logged-in user's ID
        $order->set_user_id($user_id);  // Associate the order with the logged-in user
    } else {
        // Handle guest checkout (set guest billing details)
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
    }

    // Set shipping details (same as billing, or custom shipping details)
    $order->set_shipping_first_name($firstname);
    $order->set_shipping_last_name($lastname);
    $order->set_shipping_address_1($street);
    $order->set_shipping_address_2($house_number . ' ' . $apartment_number);
    $order->set_shipping_city($city);
    $order->set_shipping_postcode($postal_code);
    $order->set_shipping_country($country);
    $order->set_shipping_state($area);

    // Add the items from the current cart to the order
    $cart_items = WC()->cart->get_cart();
    foreach ($cart_items as $cart_item_key => $cart_item) {
        $product_id = $cart_item['product_id'];
        $quantity = $cart_item['quantity'];

        // Handle variations (if the product is a variation)
        if (isset($cart_item['variation_id']) && $cart_item['variation_id'] > 0) {
            $variation_id = $cart_item['variation_id'];
            $product = wc_get_product($variation_id);
            $order->add_product($product, $quantity);
        } else {
            $product = wc_get_product($product_id);
            $order->add_product($product, $quantity);
        }
    }

    // Set payment method (adjust as necessary)
    $payment_method = 'bacs';  // Adjust payment method as necessary
    $available_gateways = WC()->payment_gateways->get_available_payment_gateways();
    $order->set_payment_method( isset( $available_gateways[ $data['payment_method'] ] ) ? $available_gateways[ $data['payment_method'] ] : $data['payment_method'] );

    // Calculate totals
    $order->calculate_totals();
    $order->calculate_shipping();  // If shipping is enabled

    // Optionally, change the order status
    $order->update_status('pending');

    // Save the order
    $order->save();

    // Return the order ID for reference
    $order->get_id();

    // Empty the cart
    WC()->cart->empty_cart();
}

  // if ( isset( $data['billing_email'] ) ) {

    //     $order->hold_applied_coupons( $data['billing_email'] );

    // }



    // $order->set_created_via( 'checkout' );

    // $order->set_cart_hash( $cart_hash );

    // $order->set_customer_id( apply_filters( 'woocommerce_checkout_customer_id', get_current_user_id() ) );

    $order->set_currency( get_woocommerce_currency() );

    // $order->set_prices_include_tax( 'yes' === get_option( 'woocommerce_prices_include_tax' ) );

    // $order->set_customer_ip_address( WC_Geolocation::get_ip_address() );

    // $order->set_customer_user_agent( wc_get_user_agent() );

    $order->set_customer_note( isset( $data['order_comments'] ) ? $data['order_comments'] : '' );


//  absint( WC()->session->get( 'order_awaiting_payment' );
//  $cart_hash          = WC()->cart->get_cart_hash();
// $order->has_cart_hash( $cart_hash )
// $order->has_status( array( 'pending', 'failed' ) ) 


// Get the chosen payment method
$chosen_payment_method = WC()->session->get('chosen_payment_method');

// Output the payment method
echo 'Chosen Payment Method: ' . $chosen_payment_method;

// Get the chosen shipping method
$chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');

// Get the first chosen shipping method (if multiple methods exist)
$chosen_shipping_method = isset($chosen_shipping_methods[0]) ? $chosen_shipping_methods[0] : '';

// Output the shipping method
echo 'Chosen Shipping Method: ' . $chosen_shipping_method;


// Get the WooCommerce shipping zones
$shipping_zones = WC_Shipping_Zones::get_zones();

// Assuming you want to get available shipping methods based on the customer's shipping address
$chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
$chosen_shipping_method = isset($chosen_shipping_methods[0]) ? $chosen_shipping_methods[0] : '';

// Get available shipping methods for the current cart
$available_shipping_methods = WC()->shipping()->get_shipping_methods();

echo 'Available Shipping Methods: <br>';
foreach ($available_shipping_methods as $method) {
    echo $method->get_title() . ' (' . $method->id . ')<br>';
}





// Get the user's shipping address (example: from the session)
$shipping_country = WC()->customer->get_shipping_country();
$shipping_state = WC()->customer->get_shipping_state();

// Get the shipping zone for the customer's shipping address
$zone = WC_Shipping_Zones::get_zone_matching_package($shipping_country, $shipping_state);

// Get the available shipping methods for that zone
$shipping_methods = $zone->get_shipping_methods();

echo 'Shipping Methods for Zone: ' . $zone->get_zone_name() . '<br>';
foreach ($shipping_methods as $method) {
    echo $method->get_title() . ' (' . $method->id . ')<br>';
}
