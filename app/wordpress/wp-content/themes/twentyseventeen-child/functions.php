<?php

define( 'WOOCOMM_TEMPLATE_PATH',
	__DIR__ . DIRECTORY_SEPARATOR . 'woocommerce' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

function woocommerce_template_single_title() {
	wc_get_template( 'single-product/title.php', array(), WOOCOMM_TEMPLATE_PATH, WOOCOMM_TEMPLATE_PATH );
}

// Отображение полей
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

function woo_add_custom_general_fields() {
	woocommerce_wp_text_input(
		array(
			'id'                => '_cool_percentage',
			'label'             => __( 'Кульность', 'woocommerce' ),
			'placeholder'       => '13.37',
			'description'       => __( 'Кульность предмета (дробное число от 0 до 100 включительно)', 'woocommerce' ),
			'type'              => 'number',
			'custom_attributes' => array(
				'step' => '0.01',
				'min'  => '0',
				'max'  => '100'
			)
		)
	);

	woocommerce_wp_text_input(
		array(
			'id'          => '_secret_message',
			'label'       => __( 'Секретное послание', 'woocommerce' ),
			'placeholder' => 'Я секретный текст, не смотри на меня!',
			'desc_tip'    => 'true',
			'description' => __( 'Секретное послание для товара', 'woocommerce' )
		)
	);
}

// Сохранение полей
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields_save( $post_id ) {
	if ( isset( $_POST['_cool_percentage'] ) && $_POST['_cool_percentage'] !== '' ) {
		$cool_percentage = sanitize_number( (double) $_POST['_cool_percentage'], 0, 100 );
		update_post_meta( $post_id, '_cool_percentage', esc_attr( $cool_percentage ) );
	}

	if ( ! empty( $_POST['_secret_message'] ) ) {
		$purchase_points = $_POST['_secret_message'];
		update_post_meta( $post_id, '_secret_message', esc_attr( $purchase_points ) );
	}
}

function sanitize_number( $number, $min = null, $max = null ) {
	if ( ! is_numeric( $number ) || ( $min === null && $max === null ) ) {
		return $number;
	}

	if ( $min !== null && $number < $min ) {
		return $min;
	}

	if ( $max !== null && $number > $max ) {
		return $max;
	}

	return $number;
}