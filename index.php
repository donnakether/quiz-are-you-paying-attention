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
        add_action('init', array($this, 'adminAssets'));
    }
    
    function adminAssets() {
        wp_register_style('quizeditcss', plugin_dir_url(__FILE__) . 'build/index.css');
        wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js' , array('wp-blocks','wp-element', 'wp-editor'));
        register_block_type('ourplugin/are-you-paying-attention', array(
            'editor_script' => 'ournewblocktype',
            'editor_style' => 'quizeditcss',
            'render_callback' => array($this, 'theHTML')
        ));
    }
    
    function theHTML($attributes) {
        if (!is_admin()) {
            wp_enqueue_script('attentionFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element'), '1.0', true);
            wp_enqueue_style('attentionFrontendStyles', plugin_dir_url(__FILE__) . 'build/frontend.css');
        }

        ob_start(); ?>
        <div class="paying-attention-update-me">
            <pre style="display: none"><?php echo wp_json_encode($attributes)?></pre>
        </div>
       <?php return ob_get_clean();
    }
}

$areYouPayingAttention = new AreYouPayingAttention;