<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 * Array of options key that would be reset to default values if there is no specific value for 
 * some version that is currently importing
 * ------------------------------------------------------------------------------------------------
 */

return apply_filters( 'woodmart_get_reset_options_version', array(
	'primary-color',
	'primary-font',
	'text-font',
	'post-titles-font',
	'navigation-font',
	'widget-titles-font',
	'blog_style',
	'products_hover',
	'prefooter_area',
	'footer-style',
	'footer-layout',
	'footer-bar-bg',
	'btns_shop_bg',
	'btns_shop_bg_hover',
	'btns_shop_style',
	'btns_accent_bg',
	'btns_accent_bg_hover',
	'btns_accent_style',
	'btns_default_style',
	'shop_categories',
	'title-background',
	'page-title-color',
	'page-title-size',
	'form_border_width',
	'shop_filters',
	'shop_layout',
	'products_columns',
	'shop_pagination',
	'shop_products_count',
	'shop_title',
	'widget_heights',
	'product-background',
	'product_summary_shadow',
	'form_fields_style',
	'header',
	'sticky_footer',
	'site_width',
	'btns_accent_color_scheme',
	'product_design',
	'shop_hide_sidebar_desktop',
	'body-background',
	'disable_copyrights',
	'disable_footer',
	
	'dark_version',
	'btns_shop_color_scheme',
	'btns_shop_color_scheme_hover',
	'btns_accent_color_scheme_hover',
	'btns_default_bg',
	'btns_default_color_scheme',
	'btns_default_bg_hover',
	'btns_default_color_scheme_hover',

	'pages-background',
	'shop-background',
	'product-background',
	'blog-background',
	'blog-post-background',
	'portfolio-background',
	'portfolio-project-background',
	
	'header_banner',
	'header_banner_bg',
	'header_banner_link',
	'header_banner_shortcode',
	'header_banner_height',
	'header_banner_mobile_height',
	
	'sticky_social',

	'single_post_design',
	'single_post_header',

	'multi_custom_fonts'
) );