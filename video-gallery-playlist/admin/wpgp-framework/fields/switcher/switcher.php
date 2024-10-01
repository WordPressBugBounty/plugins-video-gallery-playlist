<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: switcher
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'WPGP_Field_switcher' ) ) {
	class WPGP_Field_switcher extends WPGP_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			$active     = ( ! empty( $this->value ) ) ? ' wpgp--active' : '';
			$text_on    = ( ! empty( $this->field['text_on'] ) ) ? $this->field['text_on'] : esc_html__( 'On', 'wpgp' );
			$text_off   = ( ! empty( $this->field['text_off'] ) ) ? $this->field['text_off'] : esc_html__( 'Off', 'wpgp' );
			$text_width = ( ! empty( $this->field['text_width'] ) ) ? ' style="width: ' . esc_attr( $this->field['text_width'] ) . 'px;"' : '';

			echo wp_kses_post( $this->field_before() );

			echo '<div class="wpgp--switcher' . esc_attr( $active ) . '"' . wp_kses_post( $text_width ) . '>';
			echo '<span class="wpgp--on">' . esc_attr( $text_on ) . '</span>';
			echo '<span class="wpgp--off">' . esc_attr( $text_off ) . '</span>';
			echo '<span class="wpgp--ball"></span>';
			echo '<input type="hidden" name="' . esc_attr( $this->field_name() ) . '" value="' . esc_attr( $this->value ) . '"' . wp_kses_post( $this->field_attributes() ) . ' />';
			echo '</div>';
			echo ( ! empty( $this->field['label'] ) ) ? '<span class="wpgp--label">' . esc_attr( $this->field['label'] ) . '</span>' : '';
			echo wp_kses_post( $this->field_after() );

		}

	}
}
