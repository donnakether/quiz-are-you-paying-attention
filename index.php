<?php
/*
  Plugin Name: Quiz AYPA
  Description: Quiz plugin exercise.
  Version: 1.1
  Author: Dev Don
  Author URI: https://devdon.com.br
*/

if ( !defined( 'ABSPATH' ) ) exit; // exist if accessed directly

class AreYouPayingAttention {

    function __construct() {
        add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    }
    
    function adminAssets() {
        wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'src/index.js' , array('wp-blocks','wp-element'));
    }
}

$areYouPayingAttention = new AreYouPayingAttention;