<?php
/**
 * Estonian (EE) Language Configuration
 * Noriks Estonia Store
 */

// Translate WooCommerce attribute labels
add_filter( 'gettext', 'translate_attribute_labels_ee', 20, 3 );
function translate_attribute_labels_ee( $translated_text, $text, $domain ) {
    $translations = array(
        'Choose your size' => 'Valige suurus',
        'Choose an option' => 'Valige valik',
        'Add to cart' => 'Lisa ostukorvi',
        'Select options' => 'Vali',
        'View cart' => 'Vaata ostukorvi',
        'Checkout' => 'Vormista tellimus',
        'Proceed to checkout' => 'Jätka vormistamist',
        'Update cart' => 'Uuenda ostukorvi',
        'Apply coupon' => 'Rakenda kupong',
        'Coupon code' => 'Kupongi kood',
        'Cart totals' => 'Ostukorvi kogusumma',
        'Subtotal' => 'Vahesumma',
        'Total' => 'Kokku',
        'Shipping' => 'Tarne',
        'Free shipping' => 'Tasuta tarne',
    );
    
    if ( isset( $translations[$text] ) ) {
        return $translations[$text];
    }
    return $translated_text;
}

// Checkout phone placeholder
add_filter( 'woocommerce_checkout_fields', 'custom_billing_phone_placeholder_ee' );
function custom_billing_phone_placeholder_ee( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Telefon (näide: 51234567)';
    return $fields;
}

// Order number prefix
add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number_ee' );
function change_woocommerce_order_number_ee( $order_id ) {
    $prefix = 'NORIKS-EE-';
    return $prefix . $order_id;
}

// Force country to Estonia
add_filter( 'default_checkout_billing_country', '__return_ee' );
add_filter( 'default_checkout_shipping_country', '__return_ee' );
function __return_ee() {
    return 'EE';
}

// Force country to Estonia and hide country fields
add_filter( 'woocommerce_checkout_fields', 'fix_country_to_estonia_and_hide' );
function fix_country_to_estonia_and_hide( $fields ) {
    WC()->customer->set_billing_country( 'EE' );
    WC()->customer->set_shipping_country( 'EE' );
    
    unset( $fields['billing']['billing_country'] );
    unset( $fields['shipping']['shipping_country'] );
    
    return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'hide_checkout_fields_ee' );
function hide_checkout_fields_ee( $fields ) {
    unset( $fields['billing']['billing_state'] );
    unset( $fields['shipping']['shipping_state'] );
    unset( $fields['shipping']['shipping_address_2'] );
    return $fields;
}

/**
 * Estonian translations for hardcoded strings
 */
function noriks_ee_translations() {
    return array(
        // Hero section
        'Tričko, které řeší všechny problémy.' => 'T-särk, mis lahendab kõik probleemid.',
        'KOUPIT TEĎ' => 'OSTA KOHE',
        
        // Collections
        'Nakupujte podle kolekce' => 'Osta kollektsioonide kaupa',
        'Všechny produkty' => 'Kõik tooted',
        
        // Category names
        'Trička' => 'T-särgid',
        'Boxerky' => 'Bokserid',
        'Sady' => 'Komplektid',
        'Startovací balíček' => 'Stardikomplekt',
        
        // Category descriptions
        'Pohodlí po celý den. Bez vytahování.' => 'Mugavus terve päeva. Ei venita.',
        'Měkké. Prodyšné. Spolehlivé.' => 'Pehmed. Hingavad. Usaldusväärsed.',
        'Nejlepší poměr ceny a kvality v setu.' => 'Parim hinna ja kvaliteedi suhe komplektis.',
        'Vyzkoušej NORIKS výhodněji.' => 'Proovi NORIKS soodsamalt.',
        
        // Header marquee
        'Doprava zdarma pro objednávky nad 1700 Kč' => 'Tasuta tarne tellimustele üle 70 €',
        'Doprava zdarma při objednávkách nad 1700 Kč' => 'Tasuta tarne tellimustele üle 70 €',
        '30 dní bez rizika – vyzkoušej bez obav' => '30 päeva riskivabalt – proovi muretult',
        
        // Product page features
        'Platba na dobírku' => 'Maksmine kättesaamisel',
        'Vyzkoušejte 30 dní, bez rizika' => 'Proovige 30 päeva riskivabalt',
        
        // Shipping/delivery
        'Objednejte během následujících' => 'Telli järgmise',
        'Doručení od' => 'Tarne alates',
        'do' => 'kuni',
        
        // Cart
        'Prosím, pospěš si! Někdo si právě objednal jeden z produktů ve tvém košíku. Rezervace platí už jen' => 'Palun kiirusta! Keegi just tellis ühe toote sinu ostukorvist. Broneering kehtib veel ainult',
        'minut' => 'minutit',
    );
}

/**
 * Estonian weekday names
 */
function noriks_ee_weekdays() {
    return array(
        'Pühapäev',     // Sunday
        'Esmaspäev',    // Monday
        'Teisipäev',    // Tuesday
        'Kolmapäev',    // Wednesday
        'Neljapäev',    // Thursday
        'Reede',        // Friday
        'Laupäev'       // Saturday
    );
}
