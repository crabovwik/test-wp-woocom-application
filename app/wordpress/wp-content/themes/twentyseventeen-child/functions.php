<?php

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
function woocommerce_template_single_title() {
	wc_get_template( 'single-product/title.php' );
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_cool_percentage', 6 );
function woocommerce_template_single_cool_percentage() {
	wc_get_template( 'single-product/cool-percentage.php' );
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_secret_message', 7 );
function woocommerce_template_single_secret_message() {
	wc_get_template( 'single-product/secret-message.php' );
}


// Отображение полей
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );
function woo_add_custom_general_fields() {
	woocommerce_wp_text_input(
		array(
			'id'                => '_cool_percentage',
			'label'             => __( 'Кульность', 'woocommerce' ),
			'placeholder'       => '13.37',
			'desc_tip'          => 'true',
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

/**
 * Санитизация числа в отрезке.
 *
 * Если число выходит за какую-либо границу - возвращает эту границу.
 * В ином случае - возвращает само число.
 *
 * Если переданное значение не является числом как таковым, или не передана ни одна граница,
 * то вернётся переданное значение.
 *
 * @param mixed|number $number
 * @param null $min
 * @param null $max
 *
 * @return mixed|number
 */
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