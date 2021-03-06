<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) exit( 'No direct script access allowed' );

/**
* ------------------------------------------------------------------------------------------------
* Testimonials shortcodes
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_testimonials' ) ) {
	function woodmart_shortcode_testimonials($atts = array(), $content = null) {
		$output = $class = $wrapper_classes = $owl_atts = $autoplay = '';

		$parsed_atts = shortcode_atts( array_merge( woodmart_get_owl_atts(), array(
			'layout' => 'slider', // grid slider
			'style' => 'standard', // standard boxed
			'align' => 'center', // left center
			'text_size' => '', 
			'columns' => 3,
			'spacing' => 30,
			'name' => '',
			'title' => '',
			'stars_rating' => 'no',
			'el_class' => ''
		) ), $atts );

		extract( $parsed_atts );

		$wrapper_classes .= ' testimonials-' . $layout;
		$wrapper_classes .= ' testimon-style-' . $style;
		$wrapper_classes .= ' testimon-align-' . $align;
		$wrapper_classes .= ' testimon-text-size-' . $text_size;

		if ( $stars_rating == 'yes' ) $wrapper_classes .= ' testimon-with-rating';

		$wrapper_classes .= ' ' . $el_class;

		$carousel_id = 'carousel-' . rand( 1000, 10000 );

		if ( $layout == 'slider' ) {
			$custom_sizes = apply_filters( 'woodmart_testimonials_shortcode_custom_sizes', false );

			$parsed_atts['carousel_id'] = $carousel_id;
			$parsed_atts['custom_sizes'] = $custom_sizes;

			$owl_atts = woodmart_get_owl_attributes( $parsed_atts );
			$class .= ' owl-carousel ' . woodmart_owl_items_per_slide( $slides_per_view, array(), false, false, $custom_sizes );
			
			$wrapper_classes .= ' woodmart-carousel-container';
			$wrapper_classes .= ' woodmart-carousel-spacing-' . $spacing;
		} else {
			$class .= ' row';
			$class .= ' woodmart-spacing-' . $spacing;
			$class .= ' woodmart-columns-' . $columns;
		}

		ob_start(); ?>
			<div id="<?php echo esc_attr( $carousel_id ); ?>" class="testimonials testimonials-wrapper<?php echo esc_attr( $wrapper_classes ); ?>" <?php echo $owl_atts; ?>>
				<?php if ( $title != '' ): ?>
					<h2 class="title slider-title"><?php echo esc_html( $title ); ?></h2>
				<?php endif ?>
				<div class="<?php echo esc_attr( $class ); ?>" >
					<?php echo do_shortcode( $content ); ?>
				</div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}	
	add_shortcode( 'testimonials', 'woodmart_shortcode_testimonials' );
}

if( ! function_exists( 'woodmart_shortcode_testimonial' ) ) {
	function woodmart_shortcode_testimonial($atts, $content) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$output = $class = '';
		extract(shortcode_atts( array(
			'image' => '',
			'img_size' => '100x100',
			'name' => '',
			'title' => '',
			'el_class' => ''
		), $atts ));

		$img_id = preg_replace( '/[^\d]/', '', $image );

		$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => 'testimonial-avatar-image' ) );

		$class .= ' ' . $el_class;

		ob_start(); ?>

			<div class="testimonial<?php echo esc_attr( $class ); ?>" >
				<div class="testimonial-inner">
					<?php if ( $img['thumbnail'] != ''): ?>
						<div class="testimonial-avatar">
							<?php echo $img['thumbnail']; ?>
						</div>
					<?php endif ?>
					<div class="testimonial-content">
						<div class="testimonial-rating">
							<span class="star-rating">
								<span style="width:100%"></span>
							</span>
						</div>
						<?php echo do_shortcode( $content ); ?>
						<footer>
							<?php echo esc_html( $name ); ?>
							<?php if ( $title ): ?>
								<span><?php echo esc_html( $title ); ?></span>
							<?php endif ?>
						</footer>
					</div>					
				</div>
			</div>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'testimonial', 'woodmart_shortcode_testimonial' );
}