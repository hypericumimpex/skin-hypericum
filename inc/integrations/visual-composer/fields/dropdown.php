<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) exit( 'No direct script access allowed' );

/**
* Woodmart dropdown param
*/
if ( ! function_exists( 'woodmart_get_dropdown_param' ) && function_exists( 'vc_add_shortcode_param' ) ) {
	function woodmart_get_dropdown_param( $settings, $value ) {
        $output = '<select name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-input wpb-select ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '">';
            if ( ! empty( $settings['value'] ) ) {
                foreach ( $settings['value'] as $label => $data ) {
                    $color = function_exists( 'wc_light_or_dark' ) ? wc_light_or_dark( $settings['style'][ $data ] ) : '';
                    $selected = ( $value && $value == $data ) ? ' selected="selected"' : '';
                    $style = $settings['style'][ $data ] ? 'background-color:' . $settings['style'][ $data ] . ';color:' . $color . ';' : '';

                    $output .= '<option style="' . esc_attr( $style ) . '" class="' . esc_attr( $data ) . '" value="' . esc_attr( $data ) . '"' . $selected . '>' . esc_html( $label ) . '</option>';
                }
            }
        $output .= '</select>';

	    return $output;
    }
    
	vc_add_shortcode_param( 'woodmart_dropdown', 'woodmart_get_dropdown_param' );
}