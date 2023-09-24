<?php
/**
 * Plugin Name:     Test Plugin
 * Plugin URI:      https://wzymedia.com
 * Description:     A boilerplate for a simple single file plugin
 * Author:          w33zy
 * Author URI:      https://wzymedia.com
 * Text Domain:     wzy-media
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Test_Plugin
 */

class Test_Plugin {

	public static function start() {

		static $started = false;

		if ( ! $started ) {
			self::add_filters();
			self::add_actions();

			$started = true;
		}
	}

	public static function add_filters() {}    

	public static function add_actions() {
        add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_scripts' ), 10 );
		add_action( 'wp_footer', array( __CLASS__, 'wp_footer' ), 10 );
	}

    public static function enqueue_scripts() {
        // Enqqueue jQuery
        wp_enqueue_script( 'jquery' );
    }

	public static function wp_footer() { ?>
        <script>
            console.log( 'Hello World!' );

            jQuery( document ).ready( function( $ ) {
                $( '.wp-footer-message' ).html( 'Hello World!' );
            } );
        </script>
        <div class="wp-footer-message"></div>
        <style>
            .wp-footer-message {
                color: red;
                text-align: center;
            }
        </style>

	<?php 
    }

}

Test_Plugin::start();
