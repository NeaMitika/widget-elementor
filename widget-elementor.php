<?php
/**
 * @wordpress-plugin
 * Plugin Name:       Widget Elementor
 * Plugin URI:        https://cuneo.digital
 * Description:       Widget Elementor
 * Version:           1.0.0
 * Author:            Manoliu Luciano
 * Author URI:        https://cuneo.digital
 * Text Domain:       widget-elementor
 */


 function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/repeater-timeline-cuneo-digital-widget.php' );
	
	$widgets_manager->register( new \Elementor_repeater_timeline_cuneo_digital_widget() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );

function add_custom_style_sheet_widget_timeline() {
	wp_enqueue_style( 'widget-elementor', plugins_url( '/css/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'add_custom_style_sheet_widget_timeline' );
