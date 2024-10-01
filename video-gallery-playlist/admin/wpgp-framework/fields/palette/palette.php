<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: palette
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'WPGP_Field_palette' ) ) {
	class WPGP_Field_palette extends WPGP_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			$palette = ( ! empty( $this->field['options'] ) ) ? $this->field['options'] : array();

			echo wp_kses_post( $this->field_before() );

			if ( ! empty( $palette ) ) {

				echo '<div class="wpgp-siblings wpgp--palettes">';

				foreach ( $palette as $key => $colors ) {

					$active  = ( $key === $this->value ) ? ' wpgp--active' : '';
					$checked = ( $key === $this->value ) ? ' checked' : '';

					echo '<div class="wpgp--sibling wpgp--palette' . esc_attr( $active ) . '">';

					if ( ! empty( $colors ) ) {

						foreach ( $colors as $color ) {

							echo '<span style="background-color: ' . esc_attr( $color ) . ';"></span>';

						}
					}

					echo '<input type="radio" name="' . esc_attr( $this->field_name() ) . '" value="' . esc_attr( $key ) . '"' . wp_kses_post( $this->field_attributes() ) . esc_attr( $checked ) . '/>';
					echo '</div>';

				}

				echo '</div>';

			}

			echo wp_kses_post( $this->field_after() );

		}

	}
}
